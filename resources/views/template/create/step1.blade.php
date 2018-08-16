@extends('layouts.app') 

@section('content')

    <div class="row">
        <div class="col-lg-12 d-flex flex-column">
            <div class="row flex-grow">
                <div class="col-12 col-lg-8 col-md-8 grid-margin offset-1 stretch-card mb-2">
                    <div class="card">
                        <div class="card-body pb-2">
                            <h3 class="float-left">Create Jobcard Template</h3>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-8 col-md-8 grid-margin offset-1 stretch-card mb-2">
                    <div class="card">
                        <div class="card-body pb-2">
                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb breadcrumb-custom pt-2 mb-2">
                                    <li data-toggle="tooltip" data-placement="top" title="" class="breadcrumb-item progress-status-tabs selected" data-target="#exampleModal-1" data-original-title="Define template name, description, category, e.t.c">
                                        <span>General</span>
                                    </li>
                                    <li data-toggle="tooltip" data-placement="top" title="" class="breadcrumb-item progress-status-tabs" data-target="#exampleModal-1" data-original-title="Define template form fields">
                                        <span>Create Fields</span>
                                    </li>
                                    <li data-toggle="tooltip" data-placement="top" title="" class="breadcrumb-item progress-status-tabs" data-target="#exampleModal-1" data-original-title="Assign template form fields to contract layout">
                                        <span>Assign Fields</span>
                                    </li>
                                    <li data-toggle="tooltip" data-placement="top" title="" class="breadcrumb-item progress-status-tabs" data-target="#exampleModal-1" data-original-title="Verify the final output">
                                        <span>Verify</span>
                                    </li>                                           
                                </ol>
                                <div class="progress" data-toggle="tooltip" data-placement="top" title="" data-original-title="0% completed">
                                    <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-8 col-md-8 grid-margin offset-1 stretch-card">
                    <div class="card card-hoverable">
                        <div class="card-body p-3 pt-4">
                            <form method="POST" action="{{ route('jobcard.processForm.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input data-toggle="tooltip" data-placement="top" title="Template name/title"
                                                           type="text" id="name" name="name" placeholder="Enter template name..." value="{{ old('name') }}" class="form-control{{ $errors->has('name') ? '  is-invalid' : '' }}" required autocomplete="false">
                                                    @if ($errors->has('name'))
                                                        <span class="help-block invalid-feedback d-block">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <input data-toggle="tooltip" data-placement="top" title="Template short description"
                                                           type="text" id="description" name="description" placeholder="Enter template description..." value="{{ old('description') }}" class="form-control{{ $errors->has('description') ? '  is-invalid' : '' }}" required autocomplete="false">
                                                    @if ($errors->has('description'))
                                                        <span class="help-block invalid-feedback d-block">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary pr-2 mr-2 float-right">
                                            Next Step
                                            <i class="icon-arrow-right icons"></i>
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

@endsection 

@section('js') 

@endsection