<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use Storage;
use Redirect;
use Validator;
use App\User;
use App\Company;
use App\Jobcard;
use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $profiles = User::paginate(5, ['*'], 'page');

        return view('profile.index', compact('profiles'));
    }

    public function show($profile_id)
    {
        $profile = User::find($profile_id);

        return view('profile.show', compact('profile'));
    }

    public function edit($profile_id)
    {
        $profile = User::find($profile_id);
        $general_fields = ['first_name', 'last_name', 'gender', 'date_of_birth', 'address', 'phone_ext', 'phone_num', 'email', 'company_id', 'position'];
        $avatar_fields = ['avatar'];
        $security_fields = ['current_password', 'password', 'password_confirmation'];

        return view('profile.edit', compact('profile', 'general_fields', 'avatar_fields', 'security_fields'));
    }

    public function store(Request $request)
    {
        // Rules for form data
        $rules = array(
            //General Validation
            'user_first_name' => 'required|max:255|min:3',
            'user_last_name' => 'max:255',
            'user_phone_ext' => 'max:3',
            'user_phone_num' => 'max:13',
        );

        // This will check for empty string and any null values for the provided email
        // If it is empty save as NULL, because empty strings cause issues when saving for
        // fields that should be UNIQUE in the database, but NULL values are allowed even
        // when you have duplicate entries
        if (!empty($request->input('user_email'))) {
            // Rules for password changes
            $rules = array_merge($rules, [
                'user_email' => 'unique:users,email',
                ]
            );
        } else {
            $request->merge(['user_email' => null]);
        }

        //Customized error messages
        $messages = [
            //General Validation
            'user_first_name.required' => 'Enter first name',
            'user_first_name.max' => 'First name cannot be more than 255 characters',
            'user_first_name.min' => 'First name must be atleast 3 characters',
            'user_last_name.max' => 'Last name cannot be more than 255 characters',
            'user_email.unique' => 'This email is already being used',
            'user_phone_ext.max' => 'Phone number extension cannot be more than 3 characters',
            'user_phone_num.max' => 'Phone number cannot be more than 13 characters',
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
        $user = User::create([
            'first_name' => $request->input('user_first_name'),
            'last_name' => $request->input('user_last_name'),
            'position' => $request->input('user_position'),
            'phone_ext' => $request->input('user_phone_ext'),
            'phone_num' => $request->input('user_phone_num'),
            'email' => $request->input('user_email'),
            'created_by' => Auth::id(),
        ]);

        //If the contact was created successfully
        if ($user) {
            if (!empty($request->input('client_id'))) {
                //Save the contact to the client company
                $client = Company::find($request->input('client_id'));
                $client->contacts()->attach([$user->id => ['created_by' => Auth::id()]]);
                //  Record contact added to company activity
                $companyActivity = $client->recentActivities()->create([
                    'activity' => [
                                    'type' => 'contact_added',
                                    'contact' => $user,
                                ],
                    'created_by' => Auth::id(),
                ]);
            }
        }

        //Alert update success
        $request->session()->flash('alert', array('Contact added successfully!', 'icon-check icons', 'success'));

        if (!empty($request->input('jobcard_id'))) {
            //  Record contact added at this jobcard
            $jobcard = Jobcard::find($request->input('jobcard_id'));
            $jobcardActivity = $jobcard->recentActivities()->create([
                'activity' => [
                                'type' => 'contact_added',
                                'contact' => $user,
                            ],
                'created_by' => Auth::id(),
            ]);

            return redirect()->route('jobcard-show', $request->input('jobcard_id'));
        } else {
            return Redirect::back();
        }
    }

    public function update(Request $request, $profile_id)
    {
        if ($request->hasFile('avatar')) {
            $avatarFile = $request->only('avatar')['avatar'];
        } else {
            $avatarFile = [];
        }

        if ($request->hasFile('doc_file')) {
            $doc_file = $request->only('doc_file')['doc_file'];
        } else {
            $doc_file = [];
        }

        // Add all uploads for validation
        $fileArray = array_merge(array('avatar' => $avatarFile), $request->all());
        $fileArray = array_merge(array('doc_file' => $doc_file), $request->all());

        // Rules for form data
        $rules = array(
            //General Validation
            'first_name' => 'required|max:255|min:3',
            'last_name' => 'required|max:255|min:3',
            'gender' => 'required',
            'email' => 'required|max:255',
            'phone_ext' => 'required|max:3|min:3',
            'phone_num' => 'required|max:13',
        );

        //If we have the date of birth then validate entries
        if ($request->input('date_of_birth')) {
            // Rules for password changes
            $rules = array_merge($rules, [
                'date_of_birth' => 'date_format:"Y-m-d"|required|before:today',
                ]
            );
        }

        //If we have the image then validate it
        if ($request->hasFile('avatar')) {
            $rules = array_merge($rules, [
                    // Rules for image data
                    'avatar' => 'mimes:jpeg,jpg,png,gif|max:2000', // max 2000Kb/2Mb
                ]
            );
        }

        //If we have the document then validate it
        if ($request->hasFile('doc_file')) {
            $rules = array_merge($rules, [
                    // Rules for document data
                    'doc_name' => 'required|min:3',
                    'doc_file' => 'mimes:jpeg,jpg,png,gif,pdf,doc,ppt,xls,docx,pptx,xlsx,rar,zip|max:2000', // max 2000Kb/2Mb
                ]
            );
        }

        //If we have new password make sure to validate entries
        if ($request->input('current_password') || $request->input('password') || $request->input('password_confirmation')) {
            // Rules for password changes
            $rules = array_merge($rules, [
                    'current_password' => 'required|min:6',
                    'password' => 'required|min:6|confirmed|different:current_password',
                    'password_confirmation' => 'required|min:6',
                ]
            );
        }

        //Customized error messages
        $messages = [
            //General Validation
            'first_name.required' => 'Enter your first name',
            'first_name.max' => 'First name cannot be more than 255 characters',
            'first_name.min' => 'First name must be atleast 3 characters',
            'last_name.required' => 'Enter your last name',
            'last_name.max' => 'Last name cannot be more than 255 characters',
            'last_name.min' => 'Last name must be atleast 3 characters',
            'gender.required' => 'Select Gender',
            'date_of_birth.required' => 'Enter your date of birth',
            'date_of_birth.date' => 'Enter a valid date of birth',
            'date_of_birth.before' => 'Date of birth must be a past date',
            'email.required' => 'Enter your email',
            'email.max' => 'Email cannot be more than 255 characters',
            'phone_ext.required' => 'Enter your phone number extension',
            'phone_ext.max' => 'Phone number extension cannot be more than 3 characters',
            'phone_ext.min' => 'Phone number extension must be atleast 3 characters',
            'phone_num.required' => 'Enter your phone number',
            'phone_num.max' => 'Phone number cannot be more than 13 characters',
            //Avatar Validation
            'avatar.mimes' => 'Avatar must be an image e.g) jpeg,jpg,png,gif',
            'avatar.max' => 'Avatar should not be more than 2MB in size',
            //Document Validation
            'doc_name.required' => 'Enter document name',
            'doc_name.min' => 'Document name must be atleast 3 characters',
            'doc_file.mimes' => 'Document must be a proper file e.g) pdf,doc,ppt,xls,docx,pptx,xlsx,rar,zip',
            'doc_file.max' => 'Document should not be more than 2MB in size',
          ];

        // Now pass the input and rules into the validator
        $validator = Validator::make($fileArray, $rules, $messages);

        // Check to see if validation fails or passes
        if ($validator->fails()) {
            //Alert update error
            $request->session()->flash('alert', array('Couldn\'t save profile, check your information!', 'icon-exclamation icons', 'danger'));

            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            //If we have new password make sure to check if match with database
            if ($request->input('current_password') || $request->input('password') || $request->input('password_confirmation')) {
                if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
                    // The passwords do not match
                    return Redirect::back()
                                    ->withInput()
                                    ->withErrors(['current_password' => 'Incorrect password provided. Please try again.']);
                }
            }

            //If we have the avatar and has been approved, then save it to Amazon S3 bucket
            if ($request->hasFile('avatar')) {
                //If we already have an avatar, then delete it
                if (Auth::user()->avatar) {
                    $old_avatar_path = str_replace(env('AWS_URL'), '', Auth::user()->avatar);

                    if (Storage::disk('s3')->exists($old_avatar_path)) {
                        Storage::disk('s3')->delete($old_avatar_path);
                    }
                }

                $avatar = Input::file('avatar');

                $avatar_resized = Image::make($avatar->getRealPath())->resize(250, 250, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });

                $avatar_name = 'profiles/pr_'.time().uniqid().'.'.$avatar->guessClientExtension();

                Storage::disk('s3')->put($avatar_name, $avatar_resized->stream()->detach(), 'public');

                $avatar_name = env('AWS_URL').$avatar_name;
            }

            //If we have the document and has been approved, then save it to Amazon S3 bucket
            if ($request->hasFile('doc_file')) {
                $doc_file = Input::file('doc_file');

                $doc_file_name = Storage::disk('s3')->putFile('profile_docs', $doc_file, 'public');

                $doc_file_name = env('AWS_URL').$doc_file_name;
            }
        }

        //Get the users profile
        $profile = User::find($profile_id);
        //Update profile
        $profile->first_name = $request->input('first_name');
        $profile->last_name = $request->input('last_name');
        $profile->gender = $request->input('gender');
        $profile->date_of_birth = $request->input('date_of_birth');
        //$profile->bio = $request->input('bio');
        $profile->address = $request->input('address');
        $profile->phone_ext = $request->input('phone_ext');
        $profile->phone_num = $request->input('phone_num');
        $profile->email = $request->input('email');

        //If we have new password, update it as well
        if ($request->input('current_password') || $request->input('password') || $request->input('password_confirmation')) {
            $profile->password = Hash::make($request->input('password'));
        }

<<<<<<< HEAD
<<<<<<< HEAD
        $profile->company_branch_id = $request->input('company_id');
=======
        /*
            FIX THE CODE BELOW TO SAVE THE USERS CURRENT BRACNCH
            WE USED TO SAVE THE USERS COMPANY BUT NOW WE WANT TO
            SAVE THE USERS BRANCH ID INSTEAD

            $profile->company_branch_id = $request->input('company_id');
        */

>>>>>>> d0320244a16f691a5d0934a7b2fa14720f9c1278
=======
        $profile->company_branch_id = $request->input('company_id');
>>>>>>> parent of d032024... General Fix For Jobcard, Client, Contractor
        $profile->position = $request->input('position');

        //If we have the image, update it as well
        if ($request->hasFile('avatar')) {
            $profile->avatar = $avatar_name;
        }

        $profile->save();

        //If we have a new document, reference it as well
        if ($request->hasFile('doc_file')) {
            $comment = $profile->documents()->create([
                'url' => $doc_file_name,
                'name' => $request->input('doc_name'),
                'created_by' => $profile->id,
            ]);
        }

        //Alert update success
        $request->session()->flash('alert', array('Profile updated successfully!', 'icon-check icons', 'success'));

        return redirect('/profiles/'.$profile->id);

        return redirect()->route('profile-show', $profile->id);
    }

    public function delete()
    {
        //return view('home');
    }

    public function deleteDocument(Request $request, $profile_id, $doc_id)
    {
        $document = Document::find($doc_id);

        if ($document) {
            $document_file = str_replace(env('AWS_URL'), '', $document->url);

            if (Storage::disk('s3')->exists($document_file)) {
                Storage::disk('s3')->delete($document_file);
            }

            //Auth::user()->notify(new CourseTrashed($course));

            $document->delete();

            //Alert update success
            $request->session()->flash('alert', array('Document deleted successfully!', 'icon-trash icons', 'success'));
        }

        return redirect()->route('profile-show', [Auth::id()]);
    }
}
