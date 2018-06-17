<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use Storage;
use Redirect;
use Validator;
use App\Jobcard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

class ContractorController extends Controller
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
        if ($request->hasFile('new_client_logo')) {
            $logoFile = $request->only('new_client_logo')['new_client_logo'];
        } else {
            $logoFile = [];
            $logo_url = null;
        }

        // Add all uploads for validation
        $fileArray = array_merge(array('new_client_logo' => $logoFile), $request->all());

        // Rules for form data
        $rules = array(
            //General Validation
            'new_client_name' => 'required|max:255|min:3|unique:clients,name,null,created_by,company_id,'.Auth::user()->company->id,
            'new_client_email' => 'unique:clients,email,null,created_by,company_id,'.Auth::user()->company->id,
            'new_client_phone_ext' => 'max:3',
            'new_client_phone_num' => 'max:13',
        );

        //If we have the new client logo then validate it
        if ($request->hasFile('new_client_logo')) {
            $rules = array_merge($rules, [
                    // Rules for logo image data
                    'new_client_logo' => 'mimes:jpeg,jpg,png,gif|max:2000', // max 2000Kb/2Mb
                ]
            );
        }

        //Customized error messages
        $messages = [
            //General Validation
            'new_client_name.required' => 'Enter company name',
            'new_client_name.max' => 'Company name cannot be more than 255 characters',
            'new_client_name.min' => 'Company name must be atleast 3 characters',
            'new_client_email.unique' => 'This company email is already being used',
            'new_client_phone_ext.max' => 'Company phone number extension cannot be more than 3 characters',
            'new_client_phone_num.max' => 'Company phone number cannot be more than 13 characters',

            //Logo image Validation
            'new_client_logo.mimes' => 'Company logo must be an image format e.g) jpeg,jpg,png,gif',
            'new_client_logo.max' => 'Company logo should not be more than 2MB in size',
          ];

        // Now pass the input and rules into the validator
        $validator = Validator::make($fileArray, $rules, $messages);

        // Check to see if validation fails or passes
        if ($validator->fails()) {
            //Alert update error
            $request->session()->flash('alert', array('Couldn\'t create client, check your information!', 'icon-exclamation icons', 'danger'));

            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            //If we have the new client logo and has been approved, then save it to Amazon S3 bucket
            if ($request->hasFile('new_client_logo')) {
                $logo = Input::file('new_client_logo');

                $logo_resized = Image::make($logo->getRealPath())->resize(250, 250, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $logo_name = 'client_logos/cl_'.time().uniqid().'.'.$logo->guessClientExtension();

                Storage::disk('s3')->put($logo_name, $logo_resized->stream()->detach(), 'public');

                $logo_url = env('AWS_URL').$logo_name;
            }
        }

        //Create the client
        $client = Client::create([
            'name' => $request->input('new_client_name'),
            'city' => $request->input('new_client_city'),
            'state_or_region' => $request->input('new_client_state_or_region'),
            'address' => $request->input('new_client_address'),
            'logo_url' => $logo_url,
            'phone_ext' => $request->input('new_client_phone_ext'),
            'phone_num' => $request->input('new_client_phone_num'),
            'email' => $request->input('new_client_email'),
            'company_id' => Auth::user()->company->id,
            'created_by' => Auth::id(),
        ]);

        //If the client was created successfully
        if ($client) {
            //Save the client to the jobcard
            $jobcard = Jobcard::find($request->input('jobcard_id'));
            $jobcard->client_id = $client->id;
            $jobcard->save();
        }

        //Alert update success
        $request->session()->flash('alert', array('Client added successfully!', 'icon-check icons', 'success'));

        return redirect()->route('jobcard-show', $request->input('jobcard_id'));
    }

    public function update(Request $request, $client_id)
    {
    }

    public function delete(Request $request, $client_id)
    {
    }
}
