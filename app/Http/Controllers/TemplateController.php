<?php

namespace App\Http\Controllers;

use Auth;
use Redirect;
use Validator;
use App\ProcessForm;
//use App\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobcardForms = Auth::user()->companyBranch->company->processForms()->where('type', 'jobcard')->paginate(10);

        return view('template/index', compact('jobcardForms'));
    }

    /**
     * Show the view for creating a new template.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('template.create.step1');
    }

    /**
     * Show the view for creating the template form structure.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStep2(ProcessForm $processForm)
    {
        return view('template.create.step2', compact('processForm'));
    }

    /**
     * Show the view for creating the template contract document structure.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStep3(Template $template)
    {
        return view('template.create.step3', compact('template'));
    }

    /**
     * Show the view for verifying the template details.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStep4(Template $template)
    {
        return view('template.create.step4', compact('template'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Rules for creating a template
        $rules = array(
            //  Name is required and must be minimum of 3 characters and maximum of 255 characters
            'name' => 'required|max:255|min:3',
        );

        //Customized error messages
        $messages = [
            //  Name messages
            'name.required' => 'Enter the template name',
          ];

        // Now pass the request inputs and rules into the validator
        $validator = Validator::make($request->all(), $rules, $messages);

        // Check to see if validation fails or passes
        if ($validator->fails()) {
            //  Alert update error
            $request->session()->flash('alert', array('Couldn\'t create template, check your information!', 'icon-exclamation icons', 'danger'));

            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            //  Update the template
            $processForm = processForm::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'type' => 'jobcard',
                'company_id' => Auth::user()->company,
            ]);

            //  Alert update success
            $request->session()->flash('alert', array('Template created successfully!', 'icon-check icons', 'success'));

            //  Go to step 2
            return redirect()->route('jobcard.processForm.create.step2', $processForm->id);
        }
    }

    public function updateStep2(Request $request, ProcessForm $processForm)
    {
        //  Get the form field template
        $form_fields_template = json_decode($request->input('formBuild'), true)[0];
        //  Update the template
        $processForm->form_structure = $form_fields_template;
        $processForm->save();

        //  Alert update success
        $request->session()->flash('alert', array('Form updated successfully!', 'icon-check icons', 'success'));

        //  Go to index
        return redirect()->route('jobcard.processForm.create.step2', $processForm->id);
    }

    public function updateStep3(Request $request, Template $template)
    {
        //  Get the document structure template
        $doc_structure_template = $request->input('document_structure_file');

        //  Update the document structure template
        $template->doc_structure = $doc_structure_template;
        $template->save();

        //  Alert update success
        $request->session()->flash('alert', array('Document updated successfully! Now lets verify the structure.', 'icon-check icons', 'success'));

        //  Go to step 4
        return redirect()->route('template.create.step4', $template->id);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Template $template
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Template $template)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Template $template
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(ProcessForm $processForm)
    {
        return view('template.edit', compact('processForm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Template            $template
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProcessForm $processForm)
    {
        // Rules for creating a template
        $rules = array(
            //  Name is required and must be minimum of 3 characters and maximum of 255 characters
            'name' => 'required|max:255|min:3',
        );

        //Customized error messages
        $messages = [
            //  Name messages
            'name.required' => 'Enter the template name',
          ];

        // Now pass the request inputs and rules into the validator
        $validator = Validator::make($request->all(), $rules, $messages);

        // Check to see if validation fails or passes
        if ($validator->fails()) {
            //  Alert update error
            $request->session()->flash('alert', array('Couldn\'t create template, check your information!', 'icon-exclamation icons', 'danger'));

            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            //  Update the template
            $updated = $processForm->update([
                'name' => $request->input('name'),
            ]);

            //  Alert update success
            $request->session()->flash('alert', array('Template updated successfully!', 'icon-check icons', 'success'));

            //  Go to step 2
            return redirect()->route('jobcard.processForm.create.step2', $processForm->id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Template $template
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Template $template)
    {
    }

    public function selectTemplate(Request $request, ProcessForm $processForm)
    {
        if ($request->input('selected_process_form') == 'on') {
            $value = 1;
        } else {
            $value = null;
        }
        //  Unselect all selected process forms
        $unselect_all = ProcessForm::where('company_id', Auth::user()->companyBranch->company->id)->where('selected', 1)->update([
            'selected' => null,
        ]);

        //  Only select the current choice
        $updated = $processForm->update([
            'selected' => $value,
        ]);

        //  If update successfully
        if ($updated) {
            //  Capture the activity
            $jobcardActivity = $processForm->recentActivities()->create([
                'activity' => [
                                'type' => 'new_selection',
                                'template' => $processForm,
                            ],
                'created_by' => Auth::id(),
                'company_branch_id' => Auth::user()->company_branch_id,
            ]);

            //Alert update success
            $request->session()->flash('alert', array('Changes saved successfully!', 'icon-check icons', 'success'));
        } else {
            //Alert update success
            $request->session()->flash('alert', array('Something went wrong updating. Try again', 'icon-check icons', 'danger'));
        }

        return redirect()->route('jobcard.processForm.index');
    }
}
