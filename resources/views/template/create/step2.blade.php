@extends('layouts.app') 

@section('style')
    <link rel="stylesheet" href="{{ asset('css/plugins/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <style>
            body.dragging, body.dragging {
                cursor: move !important;
            }

            .form-box{
                border: 1px solid #e8e8e8;
                box-shadow: 0px 2px 5px #00000014;
            }

            .process-form-container,
            .draggable-form-box{
                min-height: 100px;
                padding: 10px;
                margin: 0 0 15px 0;
            }

            li.section-container h4 {
                padding: 10px;
                transition: background .35s ease-in-out;
            }

            li.section-container:hover h4 {
                background: #ffd2a2;
                transition: background .35s ease-in-out;
            }

            /*  The item being dragged   */
            li.section-container:not(.breadcrumb-item) {
                border: 1px dotted transparent;
                padding: 5px 5px 0 5px;
            }

            /*  The item being dragged on hover   */
           li.section-container:not(.breadcrumb-item):hover {
                border: 1px dotted #000000 !important;
                box-shadow: 1px 1px 5px #cecece;
            }

            /*  The item being dragged on a dragged state   */
            li.dragged,
            li.dragged {
                background: #ffbe0061;
                position: absolute;
                right:0;
                opacity: 0.5;
                z-index: 1000;
            }

            /*  The dragger button, delete column button, increase column button and decrease column button   */
    
            li.section-container .delete-section-btn,
            li.section-container .edit-section-btn,
            li.section-container .increase-section-btn,
            li.section-container .decrease-section-btn,
            li.section-container .section-handle,

            .field-handle,
            .delete-column-btn,
            .edit-column-btn,
            .increase-column-btn,
            .decrease-column-btn
            {
                display:none;
            }

            /*  The dragger button, delete column button, increase column button and decrease column button,
                when the draggable item is being hovered   
            */
            li.section-container:hover .delete-section-btn,
            li.section-container:hover .edit-section-btn,
            li.section-container:hover .increase-section-btn,
            li.section-container:hover .decrease-section-btn,
            li.section-container:hover .section-handle,

            li:hover .field-handle,
            li:hover .delete-column-btn,
            li:hover .edit-column-btn,
            li:hover .increase-column-btn,
            li:hover .decrease-column-btn
            {
                display: block;
                cursor: move !important;
                z-index: 10;
                position: absolute;
                right: 50%;
                top: 10px;
            }

            /*  The dragger button, delete column button, increase column button and decrease column button on hover state
                while the draggable item is also being hovered   
            */
            li.section-container .delete-section-btn:hover,
            li.section-container .edit-section-btn:hover,
            li.section-container .increase-section-btn:hover,
            li.section-container .decrease-section-btn:hover,

            li .field-handle:hover,
            li .delete-column-btn:hover,
            li .edit-column-btn:hover,
            li .increase-column-btn:hover,
            li .decrease-column-btn:hover
            {
                color: #fba200;
            }

            /*  The increase column button on hover state
                when the draggable item is being hovered   
            */
            li:hover .increase-column-btn{
                right: 15px;
                cursor: pointer !important;
            }

            /*  The decrease column button on hover state
                when the draggable item is being hovered   
            */
            li:hover .decrease-column-btn{
                right: 35px;
                cursor: pointer !important;
            }

            li.section-container:hover .edit-section-btn,
            li:hover .edit-column-btn{
                right: 55px;
                cursor: pointer !important;
            }

            /*  The delete column button on hover state
                when the draggable item is being hovered   
            */
            li.section-container:hover .delete-section-btn,
            li:hover .delete-column-btn{
                right: 75px;
                cursor: pointer !important;
            }
            
            /*  The draggable item when the  
            */
            li.placeholder {
                position: relative;
                margin-left:0 !important;
                padding-left:0 !important;
                left:0 !important;
                /** More li styles **/
            }
            li.placeholder:before{
                position: absolute;
                /** Define arrowhead **/
                content: "";
                width: 0;
                height: 0;
                margin-top: -8px;
                left: -10px;
                top: 50%;
                border-top: 5px solid transparent;
                border-right: 10px solid transparent;
                border-left: 10px solid transparent;
                border-bottom: 5px solid transparent;
                border-left-color: #004e26;
                border-right: none;
            }

            .options_holder{
                border: 1px solid #d2d2d2;
                padding: 10px;
                max-height: 210px;
                overflow-y: auto;
                overflow-x: hidden;
            }

    </style>

@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12 d-flex flex-column">
            <div class="row flex-grow">
                <div class="col-12 mb-2">
                    <div class="card">
                        <div class="card-body pb-2">
                            <h3>Create Contract Template</h3>
                            <p>Name: <span class="badge badge-primary rounded">{{ $processForm->name }}</span></p>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-2">
                    <div class="card">
                        <div class="card-body pb-2">
                            <div class="row">
                                <div class="col-9">
                                    <nav aria-label="breadcrumb" role="navigation">
                                        <ul class="breadcrumb breadcrumb-custom mb-2 pt-2">
                                            <li data-toggle="tooltip" data-placement="top" title="" class="breadcrumb-item progress-status-tabs active" data-target="#exampleModal-1" data-original-title="Define template name, description, category, e.t.c">
                                                <span>General</span>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="" class="breadcrumb-item progress-status-tabs selected" data-target="#exampleModal-1" data-original-title="Define template form fields">
                                                <span>Create Fields</span>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="" class="breadcrumb-item progress-status-tabs" data-target="#exampleModal-1" data-original-title="Assign template form fields to contract layout">
                                                <span>Assign Fields</span>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="" class="breadcrumb-item progress-status-tabs" data-target="#exampleModal-1" data-original-title="Verify the final output">
                                                <span>Verify</span>
                                            </li>  
                                        </ul>
                                        <div class="progress" data-toggle="tooltip" data-placement="top" title="" data-original-title="25% completed">
                                            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </nav>
                                </div>
                                <div class="col-3">
                                    <button type="button" id="field-creation-box-btn-1" class="field-creation-box-btn btn btn-success pl-2 pr-3 mt-4 float-right">
                                        <i class="icon-plus icons"></i>Add Field
                                    </button>
                                    <button type="button" id="section-creation-box-btn" class="btn btn-warning pl-2 pr-3 mt-4 mr-1 float-right" data-toggle="modal" data-target="#add-section-modal">
                                        <i class="icon-plus icons"></i>Add Section
                                    </button> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 stretch-card">
                    <div class="card card-hoverable">
                        <div class="card-body p-3 pt-4">
                            <form method="POST" action="{{ route('jobcard.processForm.create.step2',[$processForm->id]) }}">
                                {{ method_field('PUT') }}
                                @csrf
                                <input id="formBuild" type="hidden" value="{{ json_encode( $processForm->form_structure ) }}" name="formBuild">
                                <div class="row">
                                    <ol id = "target_container" class="col-12"><input type="hidden" value="{{ json_encode( $processForm->form_structure ) }}"></ol>
                                    <div class="col-12">
                                        <button id="submittionBtn" type="button" class="btn btn-primary pr-2 mr-2 float-right">
                                            {!! !empty( $processForm->form_structure ) ? '<span class="pr-3">Save</span>' : 'Next Step <i class="icon-arrow-right icons"></i>' !!}
                                        </button>

                                        <button type="button" class="btn btn-success pl-2 pr-3 mr-2 float-right" data-toggle="modal" data-target="#add-field-modal">
                                            <i class="icon-arrow-left icons"></i>
                                            Back
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
    <div class="modal" id="add-field-modal">
        <div class="modal-dialog">
            <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Field</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row input-types-box">

                    <div class="col-4 grid-margin stretch-card">
                        <div class="card card-clickable" field-type="text">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-md-center">
                                    <i class="icon-pencil icons icon-lg"></i>
                                    <div class="mt-2 ml-2">
                                        <h6>Text</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-4 grid-margin stretch-card">
                        <div class="card card-clickable" field-type="dropdown">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-md-center">
                                    <i class="icon-list icons icon-lg"></i>
                                    <div class="mt-2 ml-2">
                                        <h6>Dropdown</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-4 grid-margin stretch-card">
                        <div class="card card-clickable" field-type="checkbox">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-md-center">
                                    <i class="icon-check icons icon-lg"></i>
                                    <div class="mt-2 ml-2">
                                        <h6>Checkbox</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-4 grid-margin stretch-card">
                        <div class="card card-clickable" field-type="radio">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-md-center">
                                    <i class="icon-options icons icon-lg"></i>
                                    <div class="mt-2 ml-2">
                                        <h6>Radio</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-4 grid-margin stretch-card">
                        <div class="card card-clickable" field-type="date">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-md-center">
                                    <i class="icon-clock icons icon-lg"></i>
                                    <div class="mt-2 ml-2">
                                        <h6>Date</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-4 grid-margin stretch-card">
                        <div class="card card-clickable" field-type="attach">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-md-center">
                                    <i class="icon-cloud-upload icons icon-lg"></i>
                                    <div class="mt-2 ml-2">
                                        <h6>Attach</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row input-options-box d-none">

                    <div class="col-12">
                        <div class="row">
                            <div class="col-3 pr-0">
                                <button type="button" class="show-input-types-box-btn btn btn-success pl-2 pr-3 mb-0">
                                    <i class="icon-arrow-left icons"></i>
                                    Back
                                </button>
                            </div>
                            <div class="col-9 pl-0">
                                <div class="bg-white" field-type="text">
                                    <div class="d-flex align-items-center pb-1 pl-5">
                                        <i class="icon-pencil icons icon-sm"></i>
                                        <h6 class="input-type-heading mt-2 ml-2"></h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr/>

                        <div id="field_name_box" class="field_params form-group">
                            <label for="field_name">Field Name</label>
                            <input data-toggle="tooltip" data-placement="top" title="Name of the field label"
                                type="text" id="field_name" placeholder="Enter field name..." class="form-control">
                        </div>

                        <div id="field_placeholder_box" class="field_params form-group">
                            <label for="field_placeholder">Field Placeholder (optional)</label>
                            <input data-toggle="tooltip" data-placement="top" title="Placeholder for the field when empty"
                                type="text" id="field_placeholder" placeholder="Enter placeholder..." class="form-control">
                        </div>

                        <div id="field_select_options_box" class="field_params form-group">
                            <label>Select Options</label>
                            <div class="options_holder">
                                <div class="input-group mb-1">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="radio" name="field_options">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Enter value...">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text p-0">
                                            <button type="button" class="delete-field-option-btn btn btn-danger pl-2 pr-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add a new priority">
                                                <i class="icon-close icons m-0"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="button" class="add-field-option-btn btn btn-rounded btn-success d-block mb-3 ml-auto mr-auto mt-2 p-1">
                                    <i class="d-block icon-md icon-plus icons m-0"></i>
                                </button>
                            </div>
                        </div>

                        <div id="field_radio_options_box" class="field_params form-group">
                            <label>Radio Options</label>
                            <div class="options_holder">
                                <div class="input-group mb-1">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <input type="radio" name="field_options">
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Enter value...">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text p-0">
                                            <button type="button" class="delete-field-option-btn btn btn-danger pl-2 pr-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add a new priority">
                                                <i class="icon-close icons m-0"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="button" class="add-field-option-btn btn btn-rounded btn-success d-block mb-3 ml-auto mr-auto mt-2 p-0">
                                    <i class="d-block icon-md icon-plus icons m-0"></i>
                                </button>
                            </div>
                        </div>

                        <div id="field_checkbox_options_box" class="field_params form-group">
                            <label>Checkbox Options</label>
                            <div class="options_holder">
                                <div class="input-group mb-1">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <input type="checkbox" name="field_options" checked>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Enter value...">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text p-0">
                                            <button type="button" class="delete-field-option-btn btn btn-danger pl-2 pr-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add a new priority">
                                                <i class="icon-close icons m-0"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="button" class="add-field-option-btn btn btn-rounded btn-success d-block mb-3 ml-auto mr-auto mt-2 p-0">
                                    <i class="d-block icon-md icon-plus icons m-0"></i>
                                </button>
                            </div>
                        </div>

                        <div id="addional_field_accordion" class="field_params">
                            <div class="card">
                                <div class="card-header p-0" id="addional_field_header">
                                    <h5 class="mb-0">
                                        <button class="btn btn-success" data-toggle="collapse" data-target="#addional_field_accordion_content" aria-expanded="true" aria-controls="collapseOne">
                                            <i class="icons icon-settings"></i><span>Additional Options</span>
                                        </button>
                                    </h5>
                                </div>
                                <div id="addional_field_accordion_content" class="collapse" aria-labelledby="addional_field_header" data-parent="#addional_field_accordion">
                                    <div class="card-body p-3">

                                        <div id="field_description_box" class="field_params form-group">
                                            <label for="field_description">Field Description/example (optional)</label>
                                            <input data-toggle="tooltip" data-placement="top" title="Description for the field helper tip"
                                                type="text" id="field_description" placeholder="Enter field description/example..." class="form-control">
                                        </div>

                                        <div id="field_required_box" class="field_params form-group">
                                            <hr>
                                            <p>Define if this field is required and should always be filled</p>
                                            <div class="checkbox" data-toggle="tooltip" data-placement="top" title="This means the field cannot be blank">
                                                <label><input id="field_required" type="checkbox" class="mr-2">Required</label>
                                            </div>
                                        </div>

                                        <div id="field_error_msg_box" class="field_params form-group">
                                            <hr>
                                            <p>Define the error message to show if this field is not completed</p>
                                            <label for="field_error_msg" class="text-danger"><i class="icon-exclamation icons mr-2"></i><span>Error Message</span></label>
                                            <input data-toggle="tooltip" data-placement="top" title="Error message for the field if not completed"
                                                    type="text" id="field_error_msg" placeholder="Enter field error message..." class="form-control">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <input id="selectedFieldInput" type="hidden" value="">
                        <input id="activatedBtn" type="hidden" value="">
                              
                    </div> 
        
                </div>
            </div>
        
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="add-field-btn btn btn-primary d-none">
                    <i class="icon-plus icons"></i>
                    <span>Add</span>
                </button>
            </div>
        
            </div>
        </div>
    </div>

    <div class="modal" id="add-section-modal">
        <div class="modal-dialog">
            <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Section</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
            <!-- Modal body -->
            <div class="modal-body">

                <div class="row">

                    <div class="col-12">

                        <div class="form-group">
                            <label for="section_name">Section Name</label>
                            <input data-toggle="tooltip" data-placement="top" title="Name of the section"
                                type="text" id="section_name" placeholder="Enter section name..." class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="section_description">Section Description (optional)</label>
                            <input data-toggle="tooltip" data-placement="top" title="Description for the section"
                                type="text" id="section_description" placeholder="Enter section description..." class="form-control">
                        </div>
                              
                    </div> 
        
                </div>
            </div>
        
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="add-section-btn btn btn-primary">
                    <i class="icon-plus icons"></i>
                    <span>Add</span>
                </button>
            </div>
        
            </div>
        </div>
    </div>

@endsection 

@section('js') 

    
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('js/plugins/jquery-sortable/jquery-sortable.js')}}"></script> 
    <script src="{{ asset('js/plugins/dropify/dist/js/dropify.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/custom/oq-process-forms/jquery.oq-process-forms.js') }}"></script>

    <script>

            
        
            $( document ).ready(function() {
                
                $('#target_container').processForm();

            });

    </script>

@endsection