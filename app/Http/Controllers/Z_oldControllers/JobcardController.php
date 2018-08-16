<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use Storage;
use Redirect;
use Validator;
use App\Jobcard;
use App\CompanyBranch;
use App\JobcardPriority;
use App\JobcardCategory;
use App\JobcardCostCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

class JobcardController extends Controller
{
    public function index()
    {
        return view('jobcard/index');
    }

    public function create()
    {
        return view('jobcard/create');
    }

    public function show($jobcard_id)
    {
        $jobcard = Jobcard::find($jobcard_id);

        // Get the users last time of viewing this jobcard
        $last_viewed = $jobcard->createdBy->jobcardViews()
                            ->where('user_id', $jobcard->createdBy->id)
                            ->where('jobcard_id', $jobcard->id)
                            ->orderBy('created_at', 'desc')
                            ->first()
                            ->created_at;

        // Calculate how many days until deadline
        $deadline = round((strtotime($jobcard->end_date)   // Deadline time in seconds
                         - strtotime(\Carbon\Carbon::now()->toDateTimeString()))  // Minus current time in seconds
                        / (60 * 60 * 24)); //Divide 24hrs for days left till deadline

        // Calculate how long ago they viewed from now
        $last_viewed = (strtotime(\Carbon\Carbon::now()->toDateTimeString() // Current time in seconds
                        ) - strtotime($last_viewed))  // Minus time last viewed in seconds
                        / 60; //Divide by 60 to give number of minutes since last view

        // If the jobcard exists
        if ($jobcard) {
            // If the user last viewed this atleast 60mins ago (1hour) then record their new view
            if ($jobcard && $last_viewed > 60) {
                $jobcardView = Auth::user()->jobcardViews()->create([
                    'jobcard_id' => $jobcard_id,
                    'user_id' => Auth::id(),
                ]);
            }

            return view('jobcard/show', compact('jobcard', 'deadline'));
        }
    }

    public function edit()
    {
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $imageFile = $request->only('image')['image'];
        } else {
            $imageFile = [];
            $image_url = null;
        }

        $priority_raw = $request->input('priority');
        $cost_center_raw = $request->input('cost_center');
        $category_raw = $request->input('category');
        $branch_raw = $request->input('branch');

        if (strpos($priority_raw, '%&%&') !== false) {
            $priority = explode('%&%&', $priority_raw);
            $request->merge(['priority' => $priority[0]]);
        }

        if (strpos($cost_center_raw, '%&%&') !== false) {
            $cost_center = explode('%&%&', $cost_center_raw);
            $request->merge(['cost_center' => $cost_center[0]]);
        }

        if (strpos($category_raw, '%&%&') !== false) {
            $category = explode('%&%&', $category_raw);
            $request->merge(['category' => $category[0]]);
        }

        if (strpos($branch_raw, '%&%&') !== false) {
            $branch = explode('%&%&', $branch_raw);
            $request->merge(['branch' => $branch[0]]);
        }

        // Add all uploads for validation
        $fileArray = array_merge(array('image' => $imageFile), $request->all());

        // Rules for form data
        $rules = array(
            //General Validation
            'title' => 'required|max:255|min:3',
            'description' => 'required|max:255|min:3',
            'start_date' => 'date_format:"Y-m-d"|required',
            'end_date' => 'date_format:"Y-m-d"|required|after:today',
            //The priority (name & company_id) must be unique per row
            'priority' => 'required|unique:jobcard_priotity,name,null,created_by,company_id,'.Auth::user()->company->id,
            //The cost center (name & company_id) must be unique per row
            'cost_center' => 'required|unique:jobcard_cost_centers,name,null,created_by,company_id,'.Auth::user()->company->id,
            //The category (name & company_id) must be unique per row
            'category' => 'required|unique:jobcard_category,name,null,created_by,company_id,'.Auth::user()->company->id,
            //The branch (name & company_id) must be unique per row
            'branch' => 'required|unique:company_branches,destination,null,created_by,company_id,'.Auth::user()->company->id,
        );

        //If we have the image then validate it
        if ($request->hasFile('image')) {
            $rules = array_merge($rules, [
                    // Rules for image data
                    'image' => 'mimes:jpeg,jpg,png,gif|max:2000', // max 2000Kb/2Mb
                ]
            );
        }

        //Customized error messages
        $messages = [
            //General Validation
            'title.required' => 'Enter your title',
            'title.max' => 'Title name cannot be more than 255 characters',
            'title.min' => 'Title name must be atleast 3 characters',
            'description.required' => 'Enter your description',
            'description.max' => 'Description cannot be more than 255 characters',
            'description.min' => 'Description must be atleast 3 characters',
            'start_date.required' => 'Enter job start date',
            'start_date.date' => 'Enter a valid start date',
            'end_date.required' => 'Enter job end date',
            'end_date.date' => 'Enter a valid end date',
            'end_date.after' => 'End date must be a future date',
            'priority.required' => 'Select or create a new priority level',
            'priority.unique' => 'The new priority ('.$request->input('priority').') you tried to create already exists',
            'cost_center.required' => 'Select or create a new cost center',
            'cost_center.unique' => 'The new cost center ('.$request->input('cost_center').') you tried to create already exists',
            'category.required' => 'Select or create a new category',
            'category.unique' => 'The new category ('.$request->input('category').') you tried to create already exists',
            'branch.required' => 'Select or create a new company branch',
            'branch.unique' => 'The new company branch ('.$request->input('branch').') you tried to create already exists',

            //image Validation
            'image.mimes' => 'Image must be an image format e.g) jpeg,jpg,png,gif',
            'image.max' => 'Image should not be more than 2MB in size',
          ];

        // Now pass the input and rules into the validator
        $validator = Validator::make($fileArray, $rules, $messages);

        // Check to see if validation fails or passes
        if ($validator->fails()) {
            //Alert update error
            $request->session()->flash('alert', array('Couldn\'t create jobcard, check your information!', 'icon-exclamation icons', 'danger'));

            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            //If we have the image and has been approved, then save it to Amazon S3 bucket
            if ($request->hasFile('image')) {
                $image = Input::file('image');

                $image_resized = Image::make($image->getRealPath()) /*  ->resize(250, 250 , function ($constraint) {
                    $constraint->aspectRatio();
                })  */ ;

                $image_url = 'jobcards/jb_'.time().uniqid().'.'.$image->guessClientExtension();

                Storage::disk('s3')->put($image_url, $image_resized->stream()->detach(), 'public');

                $image_url = env('AWS_URL').$image_url;
            }
        }

        //Check if we have any new priority
        if (strpos($priority_raw, '%&%&') !== false) {
            //Save the new priority and assign it back to the request input value
            $request->merge([
                    'priority' => JobcardPriority::create([
                            'name' => $priority[0],
                            'description' => $priority[1],
                            'company_id' => Auth::user()->company->id,
                            'created_by' => Auth::id(),
                        ])->id,
            ]);
        }

        //Check if we have any new cost center
        if (strpos($cost_center_raw, '%&%&') !== false) {
            //Save the new cost center and assign it back to the request input value
            $request->merge([
                    'cost_center' => JobcardCostCenter::create([
                            'name' => $cost_center[0],
                            'description' => $cost_center[1],
                            'company_id' => Auth::user()->company->id,
                            'created_by' => Auth::id(),
                        ])->id,
            ]);
        }

        //Check if we have any new category
        if (strpos($category_raw, '%&%&') !== false) {
            //Save the new category and assign it back to the request input value
            $request->merge([
                    'category' => JobcardCategory::create([
                            'name' => $category[0],
                            'description' => $category[1],
                            'company_id' => Auth::user()->company->id,
                            'created_by' => Auth::id(),
                        ])->id,
            ]);
        }

        //Check if we have any new company branch
        if (strpos($branch_raw, '%&%&') !== false) {
            //Save the new branch and assign it back to the request input value
            $request->merge([
                    'branch' => CompanyBranch::create([
                            'destination' => $branch[0],
                            'company_id' => Auth::user()->company->id,
                            'created_by' => Auth::id(),
                        ])->id,
            ]);
        }

        //Create the jobcard
        $jobcard = Jobcard::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'status_id' => 1,
            'priority_id' => $request->input('priority'),
            'cost_center_id' => $request->input('cost_center'),
            'branch_id' => $request->input('branch'),
            'category_id' => $request->input('category'),
            'img_url' => $image_url,
            'created_by' => Auth::id(),
        ]);

        if ($jobcard) {
            $jobcardView = Auth::user()->jobcardViews()->create([
                'jobcard_id' => $jobcard->id,
                'user_id' => Auth::id(),
            ]);
        }

        //Alert update success
        $request->session()->flash('alert', array('Jobcard created successfully!', 'icon-check icons', 'success'));

        return redirect()->route('jobcard-show', $jobcard->id);
    }

    public function update(Request $request, $user_id)
    {
    }

    public function delete()
    {
    }
}
