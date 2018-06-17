<?php

namespace App\Http\Controllers;

use Auth;
use Redirect;
use Validator;
use App\ClientContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ContactController extends Controller
{
    public function index()
    {
    }

    public function show()
    {
    }

    public function edit()
    {
    }

    public function store(Request $request)
    {
        // Rules for form data
        $rules = array(
            //General Validation
            'new_reference_first_name' => 'required|max:255|min:3',
            'new_reference_last_name' => 'max:255',
            'new_reference_email' => 'unique:client_contact,email,null,created_by,company_id,'.Auth::user()->company->id,
            'new_reference_phone_ext' => 'max:3',
            'new_reference_phone_num' => 'max:13',
        );

        //Customized error messages
        $messages = [
            //General Validation
            'new_reference_first_name.required' => 'Enter contact first name',
            'new_reference_first_name.max' => 'First name cannot be more than 255 characters',
            'new_reference_first_name.min' => 'First name must be atleast 3 characters',
            'new_reference_last_name.max' => 'Last name cannot be more than 255 characters',
            'new_reference_email.unique' => 'This contacts email is already being used',
            'new_reference_phone_ext.max' => 'Contacts phone number extension cannot be more than 3 characters',
            'new_reference_phone_num.max' => 'Contacts phone number cannot be more than 13 characters',
          ];

        // Now pass the input and rules into the validator
        $validator = Validator::make($request->all(), $rules, $messages);

        // Check to see if validation fails or passes
        if ($validator->fails()) {
            //Alert update error
            $request->session()->flash('alert', array('Couldn\'t create contact, check your information!', 'icon-exclamation icons', 'danger'));

            return Redirect::back()->withErrors($validator)->withInput();
        }

        //Create the client contact
        $ClientContact = ClientContact::create([
            'first_name' => $request->input('new_reference_first_name'),
            'last_name' => $request->input('new_reference_last_name'),
            'position' => $request->input('new_reference_position'),
            'mobile_ext' => $request->input('new_reference_phone_ext'),
            'mobile_num' => $request->input('new_reference_phone_num'),
            'email' => $request->input('new_reference_email'),
            'client_id' => $request->input('client_id'),
            'company_id' => Auth::user()->company->id,
            'created_by' => Auth::id(),
        ]);

        //Alert update success
        $request->session()->flash('alert', array('Contact added successfully!', 'icon-check icons', 'success'));

        return redirect()->route('jobcard-show', $request->input('jobcard_id'));
    }

    public function update(Request $request, $client_id)
    {
    }

    public function delete(Request $request, $client_id)
    {
    }
}
