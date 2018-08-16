@extends('layouts.app') 

@section('style')
    <style>
        .input-group-append:hover{
            text-decoration: none;
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
                            <p>Name: {{ $template->name }}</p>
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
                                            <li data-toggle="tooltip" data-placement="top" title="" class="breadcrumb-item progress-status-tabs active" data-target="#exampleModal-1" data-original-title="Define template form fields">
                                                <span>Create Fields</span>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="" class="breadcrumb-item progress-status-tabs active" data-target="#exampleModal-1" data-original-title="Assign template form fields to contract layout">
                                                <span>Assign Fields</span>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="" class="breadcrumb-item progress-status-tabs selected" data-target="#exampleModal-1" data-original-title="Verify the final output">
                                                <span>Verify</span>
                                            </li>  
                                        </ul>
                                        <div class="progress" data-toggle="tooltip" data-placement="top" title="" data-original-title="75% completed">
                                            <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 stretch-card">
                    <div class="card card-hoverable">
                        <div class="card-body p-3 pt-4">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="pl-2 pb-2">Template Created!</h4>
                                        <div class="alert alert-warning" role="alert">
                                            <span>The contract template was built successfully. Follow the link below to handle requests.</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" aria-label="Application link" value="{{ route('application.show', $template->id) }}">
                                                    <a href="{{ route('application.show', $template->id) }}" class="input-group-append" target="_blank">
                                                        <span class="input-group-text btn btn-dark">
                                                            <i class="icon-share-alt icons mr-1"></i>
                                                            <span>Open Link</span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="{{ route('template.create.step3', $template->id) }}" class="btn btn-success pl-2 pr-3 mr-2 float-right">
                                            <i class="icon-arrow-left icons"></i>
                                            Back
                                        </a>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
@endsection 

@section('js') 
    /*
        Clipboard plugin for copying the link
    */
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script>

    <srcipt>
        var clipboard = new ClipboardJS('#form_link_copy_btn');



    </script>
@endsection