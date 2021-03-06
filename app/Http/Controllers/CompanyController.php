<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use Storage;
use Redirect;
use Validator;
use App\Company;
use App\Jobcard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    public function index()
    {
    }

    public function getClients()
    {
        $clients = Auth::user()->companyBranch->company->clients()->paginate(3, ['*'], 'clients');

        return view('company.client.index', compact('clients'));
    }

    public function getContractors()
    {
        $contractors = Auth::user()->companyBranch->company->contractors()->paginate(3, ['*'], 'contractors');

        return view('company.contractor.index', compact('contractors'));
    }

    public function showClient($client_id)
    {
        $client = Company::find($client_id);
        $jobcards = Jobcard::where('client_id', $client_id)->paginate(10, ['*'], 'jobcards');
        if ($client) {
            $contacts = $client->contacts()->paginate(3, ['*'], 'contacts');
        } else {
            $contacts = null;
        }
        $jobcardProcessSteps = Auth::user()->companyBranch->company->processForms->where('selected', 1)->where('type', 'jobcard')->first()->steps;

        return view('company.client.show', compact('client', 'contacts', 'jobcards', 'jobcardProcessSteps'));
    }

    public function showContractor($contractor_id)
    {
        $contractor = Company::find($contractor_id);

        $jobcards = $contractor->assignedJobcards()->paginate(10, ['*'], 'jobcards');

        if ($contractor) {
            $contacts = $contractor->contacts()->paginate(3, ['*'], 'contacts');
        } else {
            $contacts = null;
        }
        $jobcardProcessSteps = Auth::user()->companyBranch->company->processForms->where('selected', 1)->where('type', 'jobcard')->first()->steps;

        return view('company.contractor.show', compact('contractor', 'contacts', 'jobcards', 'jobcardProcessSteps'));
    }

    public function create()
    {
        return view('company.create');
    }

    public function edit($company_id)
    {
        $company = Company::find($company_id);

        return view('company.edit', compact('company'));
    }

    public function store(Request $request)
    {
        //  If the company logo was provided, then get the file
        if ($request->hasFile('new_company_logo')) {
            $logoFile = $request->only('new_company_logo')['new_company_logo'];
        } else {
            //  Otherwise remember that we don't have a logo file or url to the file
            $logoFile = [];
            $logo_url = null;
        }

        //  Find out if the user has a company branch
        if (Auth::user()->companyBranch) {
            //  Find out if the user has a company at all
            if (Auth::user()->companyBranch->company) {
                $userHasCompany = Auth::user()->companyBranch->company;
            } else {
                $userHasCompany = false;
            }
        } else {
            $userHasCompany = false;
        }

        //  If the user does not have a company/branch but is trying to create a client or contractor
        if (!$userHasCompany && $request->input('new_company_type') == 'client' ||
            !$userHasCompany && $request->input('new_company_type') == 'contractor') {
            //  Alert update error denying user from going ahead and creating the company
            $url = route('company-create').'?type=user';
            $request->session()->flash('alert', array('You are not assigned to any company/branch. Please create you company first. <a href="'.$url.'">Create Company</a>', 'icon-exclamation icons', 'danger'));

            //  Return back with the old form inputs
            return Redirect::back()
                            ->withInput();
        }

        //  Assume that the company the user is trying to create does not already exist
        $CompanyAlreadyExists = false;

        //  If the type is client, then check to see if the company already exists as a client in relation to the users company
        if ($request->input('new_company_type') == 'client') {
            $CompanyAlreadyExists = Auth::user()->companyBranch->company->clients()
                                            ->where('name', $request->input('new_company_name'))->first();
        //  If the type is contractor, then check to see if the company already exists as a contractor in relation to the users company
        } elseif ($request->input('new_company_type') == 'contractor') {
            $CompanyAlreadyExists = Auth::user()->companyBranch->company->contractors()
                                            ->where('name', $request->input('new_company_name'))->first();
        }

        //  If company already exists either as client/contractor
        if ($CompanyAlreadyExists) {
            // Return error with old input fields
            return Redirect::back()
                            ->withInput()
                            ->withErrors(['new_company_name' => 'A '.$request->input('new_company_type').' with the name "'.$request->input('new_company_name').'" already exists. Try searching for it instead.']);
        }

        // Add all uploads for validation, in this case the company logo
        $fileArray = array_merge(array('new_company_logo' => $logoFile), $request->all());

        // Rules for form data
        $rules = array(
            //  General Validation

            'new_company_name' => 'required|max:255|min:3',
            'new_company_phone_ext' => 'max:3',
            'new_company_phone_num' => 'max:13',
            'new_company_email' => 'email',
        );

        //  If we have the new company logo then validate it
        if ($request->hasFile('new_company_logo')) {
            $rules = array_merge($rules, [
                    // Rules for logo image data
                    'new_company_logo' => 'mimes:jpeg,jpg,png,gif|max:2000', // max 2000Kb/2Mb
                ]
            );
        }

        //  Customized error messages
        $messages = [
            //  General Validation
            'new_company_name.required' => 'Enter company name',
            'new_company_name.max' => 'Company name cannot be more than 255 characters',
            'new_company_name.min' => 'Company name must be atleast 3 characters',
            'new_company_email.email' => 'Company email is not a valid format',
            'new_company_email.unique' => 'This company email is already being used',
            'new_company_phone_ext.max' => 'Company phone number extension cannot be more than 3 characters',
            'new_company_phone_num.max' => 'Company phone number cannot be more than 13 characters',

            //  Logo image Validation
            'new_company_logo.mimes' => 'Company logo must be an image format e.g) jpeg,jpg,png,gif',
            'new_company_logo.max' => 'Company logo should not be more than 2MB in size',
          ];

        // Now pass the input and rules into the validator
        $validator = Validator::make($fileArray, $rules, $messages);

        // Check to see if validation fails or passes
        if ($validator->fails()) {
            //  If the type is client or contractor, then use the same type for the alert
            if ($request->input('new_company_type') == 'client' ||
                $request->input('new_company_type') == 'contractor') {
                $type = $request->input('new_company_type');
            } else {
                //  Otherwise the type is default to company
                $type = 'company';
            }

            //  Alert update error
            $request->session()->flash('alert', array('Couldn\'t create '.$type.', check your information!', 'icon-exclamation icons', 'danger'));

            return Redirect::back()->withErrors($validator)->withInput();
        }

        //  If we have the new company logo and has been approved, then save it to Amazon S3 bucket
        if ($request->hasFile('new_company_logo')) {
            $logo = Input::file('new_company_logo');

            $logo_resized = Image::make($logo->getRealPath())->resize(250, 250, function ($constraint) {
                $constraint->aspectRatio();
            });

            $logo_name = 'company_logos/cl_'.time().uniqid().'.'.$logo->guessClientExtension();

            Storage::disk('s3')->put($logo_name, $logo_resized->stream()->detach(), 'public');

            $logo_url = env('AWS_URL').$logo_name;
        }

        //  Create the new company
        $company = Company::create([
            'name' => $request->input('new_company_name'),
            'city' => $request->input('new_company_city'),
            'state_or_region' => $request->input('new_company_state_or_region'),
            'address' => $request->input('new_company_address'),
            'logo_url' => $logo_url,
            'phone_ext' => $request->input('new_company_phone_ext'),
            'phone_num' => $request->input('new_company_phone_num'),
            'email' => $request->input('new_company_email'),
            'created_by' => Auth::id(),
        ]);

        //  If the company was created successfully
        if ($company) {
            //  If the user did not have a company, we will assign this new company and a new branch for the new company
            if (!$userHasCompany) {
                //  Get the branch name to create a new company branch
                if (!empty($request->input('new_company_city'))) {
                    $branchName = $request->input('new_company_city').'('.$request->input('new_company_state_or_region').')';
                } elseif (!empty($request->input('new_company_state_or_region'))) {
                    $branchName = $request->input('new_company_state_or_region');
                } else {
                    $branchName = 'Default Branch';
                }

                // Create the new compant branch
                $companyBranch = $company->branches()->create([
                    'destination' => $branchName,
                    'company_id' => $company->id,
                    'created_by' => Auth::id(),
                ]);

                if ($companyBranch) {
                    //  Save the new company and branch to the user
                    $user = Auth::user();
                    $user->company_id = $company->id;
                    $user->company_branch_id = $companyBranch->id;
                    $user->save();
                }
            }

            //  If we did not create a branch since the user already had a company assigned,
            //  then use the users current company
            if ($userHasCompany) {
                $companyBranch = Auth::user()->companyBranch;
            }

            $companyActivity = $companyBranch->recentActivities()->create([
                'activity' => [
                                'type' => 'created',
                                'company' => $company,
                            ],
                'created_by' => Auth::id(),
                'company_branch_id' => $companyBranch->id,
            ]);

            //  If we have the jobcard ID
            if (!empty($request->input('jobcard_id'))) {
                //Get the associated jobcard
                $jobcard = Jobcard::find($request->input('jobcard_id'));
                //  If we are adding a new client
                if ($request->input('new_company_type') == 'client') {
                    //  Save the company to the jobcard as the current client
                    $jobcard->client_id = $company->id;
                    $jobcard->save();
                    //  Save the company as part of the companies client directory
                    $jobcard->owningBranch->company->clients()->attach([$company->id => ['created_by' => Auth::id()]]);

                    $jobcardActivity = $jobcard->recentActivities()->create([
                        'activity' => [
                                        'type' => 'client_added',
                                        'company' => $company,
                                    ],
                        'created_by' => Auth::id(),
                        'company_branch_id' => Auth::user()->companyBranch,
                    ]);
                } elseif ($request->input('new_company_type') == 'contractor') {
                    //  Save the company as part of the companies contractor directory
                    $jobcard->owningBranch->company->contractors()->attach([$company->id => ['created_by' => Auth::id()]]);
                    //  Save the contractory for this jobcard list of potential contractors

                    //If we have the quotation, then save it to Amazon S3 bucket
                    if ($request->hasFile('new_company_quote')) {
                        $doc_file = Input::file('new_company_quote');

                        //  Store the file to Amazon s3 and retrieve the new file name
                        $doc_file_name = Storage::disk('s3')->putFile('jobcard_quotations', $doc_file, 'public');

                        //  Construct the URL to the new uploaded file
                        $doc_file_url = env('AWS_URL').$doc_file_name;
                    } else {
                        $doc_file_url = null;
                    }

                    $jobcard->contractorsList()->attach([$company->id => [
                        'amount' => $request->input('new_company_total_price'),
                        'quotation_doc_url' => $doc_file_url,
                        'created_by' => Auth::id(),
                    ]]);

                    $jobcardActivity = $jobcard->recentActivities()->create([
                        'activity' => [
                                        'type' => 'contractor_added',
                                        'company' => $company,
                                    ],
                        'created_by' => Auth::id(),
                        'company_branch_id' => Auth::user()->companyBranch,
                    ]);
                }
            }
        }

        //Alert update success
        $request->session()->flash('alert', array($request->input('new_company_type').' added successfully!', 'icon-check icons', 'success'));

        //  If we have the jobcard ID
        if (!empty($request->input('jobcard_id'))) {
            return redirect()->route('jobcard-show', $request->input('jobcard_id'));
        //  If we added a new client
        } elseif ($request->input('new_company_type') == 'client') {
            return redirect()->route('client-show', $company->id);
        //  If we added a new contractor
        } elseif ($request->input('new_company_type') == 'contractor') {
            return redirect()->route('contractor-show', $company->id);
        } elseif ($request->input('new_company_type') == 'user') {
            return redirect()->route('overview');
        }
    }

    public function update(Request $request, $company_id)
    {
        $company = Company::find($company_id);

        if ($request->hasFile('new_company_logo')) {
            $logoFile = $request->only('new_company_logo')['new_company_logo'];
        } else {
            $logoFile = [];
            $logo_url = $company->logo_url ? $company->logo_url : null;
        }

        // Add all uploads for validation
        $fileArray = array_merge(array('new_company_logo' => $logoFile), $request->all());

        // Rules for form data
        $rules = array(
            //General Validation

            'new_company_name' => 'required',
            'new_company_phone_ext' => 'max:3',
            'new_company_phone_num' => 'max:13',
        );

        //If we have the new company logo then validate it
        if ($request->hasFile('new_company_logo')) {
            $rules = array_merge($rules, [
                    // Rules for logo image data
                    'new_company_logo' => 'mimes:jpeg,jpg,png,gif|max:2000', // max 2000Kb/2Mb
                ]
            );
        }

        //Customized error messages
        $messages = [
            //General Validation
            'new_company_name.required' => 'Enter company name',
            'new_company_name.max' => 'Company name cannot be more than 255 characters',
            'new_company_name.min' => 'Company name must be atleast 3 characters',
            'new_company_email.unique' => 'This company email is already being used',
            'new_company_phone_ext.max' => 'Company phone number extension cannot be more than 3 characters',
            'new_company_phone_num.max' => 'Company phone number cannot be more than 13 characters',

            //Logo image Validation
            'new_company_logo.mimes' => 'Company logo must be an image format e.g) jpeg,jpg,png,gif',
            'new_company_logo.max' => 'Company logo should not be more than 2MB in size',
          ];

        // Now pass the input and rules into the validator
        $validator = Validator::make($fileArray, $rules, $messages);

        // Check to see if validation fails or passes
        if ($validator->fails()) {
            //Alert update error
            $request->session()->flash('alert', array('Couldn\'t save '.$request->input('new_company_type').', check your information!', 'icon-exclamation icons', 'danger'));

            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            //If we have the new company logo and has been approved, then save it to Amazon S3 bucket
            if ($request->hasFile('new_company_logo')) {
                $logo = Input::file('new_company_logo');

                $logo_resized = Image::make($logo->getRealPath())->resize(250, 250, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $logo_name = 'company_logos/cl_'.time().uniqid().'.'.$logo->guessClientExtension();

                Storage::disk('s3')->put($logo_name, $logo_resized->stream()->detach(), 'public');

                $logo_url = env('AWS_URL').$logo_name;
            }
        }

        //Update the company
        $updated = $company->update([
            'name' => $request->input('new_company_name'),
            'city' => $request->input('new_company_city'),
            'state_or_region' => $request->input('new_company_state_or_region'),
            'address' => $request->input('new_company_address'),
            'logo_url' => $logo_url,
            'phone_ext' => $request->input('new_company_phone_ext'),
            'phone_num' => $request->input('new_company_phone_num'),
            'email' => $request->input('new_company_email'),
            'website_link' => $request->input('new_company_web_link'),
            'created_by' => Auth::id(),
        ]);

        //If the company was updated successfully
        if ($updated) {
            $companyActivity = Auth::user()->companyBranch->recentActivities()->create([
                'activity' => [
                                'type' => 'updated',
                                'company' => $company,
                            ],
                'created_by' => Auth::id(),
                'company_branch_id' => Auth::user()->companyBranch,
            ]);
        }

        //Alert update success
        $request->session()->flash('alert', array($request->input('new_company_type').' updated successfully!', 'icon-check icons', 'success'));

        //  If we updated a client
        if ($request->input('new_company_type') == 'client') {
            return redirect()->route('client-show', $company->id);
        //  If we updated a contractor
        } elseif ($request->input('new_company_type') == 'contractor') {
            return redirect()->route('contractor-show', $company->id);
        } else {
            return redirect()->route('company-edit', $company->id);
        }
    }

    public function delete(Request $request, $company_id)
    {
    }
}
