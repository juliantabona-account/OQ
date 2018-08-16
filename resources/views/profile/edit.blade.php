@extends('layouts.app') 

@section('style') 

    <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/dropify/dist/css/dropify.min.css') }}">

    <style>

        .tooltip-inner {
            background-color: #f12727;
        }

        .tooltip.bs-tooltip-top .arrow::before, .tooltip.bs-tooltip-auto[x-placement^="top"] .arrow::before {
            border-top-color: #f23d3d;
        }

    </style>

@endsection 

@section('content')

    <div class="row user-profile">
        <div class="col-lg-4 side-left">
            <div class="row">
                <div class="col-12">
                    <div class="card card-hoverable">
                        <div class="card-body avatar">
                            <img src="{{ $profile->avatar }}" alt="Profile Image" class="profile-img">
                            <p class="name">{{ $profile->first_name }} {{ $profile->last_name }}</p>
                            <p class="designation">{{ $profile->position  != ''? '-- '.$profile->position.' --':'' }}</p>
                            <span href="#" class="d-block text-center text-dark">{{ $profile->email ? $profile->email:'____' }}</span>
                            <span class="d-block text-center text-dark">
                                @if($profile->phone_num)
                                    <i class="icon-phone icons"></i>
                                @endif
                                {{ $profile->phone_ext ? '+'.$profile->phone_ext.'-':'___-' }}
                                {{ $profile->phone_num ? $profile->phone_num:'____' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 side-right stretch-card">
            <div class="card card-hoverable">
                <div class="row">
                    <div class="col-12">
                    <a href="/profiles/{{ $profile->id }}" class="btn btn-primary mt-3 ml-2 mb-2">
                        <i class="icon-arrow-left icons"></i>
                        Go Back
                    </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="wrapper d-block d-sm-flex align-items-center justify-content-between">
                        <h4 class="card-title mb-0">Details</h4>
                        <ul id="myTab" role="tablist" class="nav nav-tabs tab-solid tab-solid-primary mb-0">
                            <li class="nav-item">
                                <a id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-expanded="true"
                                    class="nav-link{{ app('request')->input('tab') == "" ? ' active': '' }}"><i class="icon-user icons"></i>General</a>
                            </li>
                            <li class="nav-item">
                                <a id="avatar-tab" data-toggle="tab" href="#avatar" role="tab" aria-controls="avatar" 
                                    class="nav-link{{ app('request')->input('tab') == "avatar" ? ' active': '' }}"><i class="icon-picture icons"></i>Avatar</a>
                            </li>
                            <li class="nav-item">
                                <a id="security-tab" data-toggle="tab" href="#security" role="tab" aria-controls="security" 
                                    class="nav-link{{ app('request')->input('tab') == "security" ? ' active': '' }}"><i class="icon-lock icons"></i>Security</a>
                            </li>
                            <li class="nav-item">
                                <a id="docs-tab" data-toggle="tab" href="#docs" role="tab" aria-controls="docs" 
                                    class="nav-link{{ app('request')->input('tab') == "docs" ? ' active': '' }}"><i class="icon-docs icons"></i>Docs</a>
                            </li>
                        </ul>
                    </div>
                    <form method="POST" action="{{ route('profile-update', [$profile->id]) }}" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="wrapper">
                            <hr>
                            <div id="myTabContent" class="tab-content">
                                <div id="info" role="tabpanel" aria-labelledby="info" class="tab-pane fade{{ app('request')->input('tab') == "" ? ' show active': '' }}">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="first_name">First Name</label>
                                                <input type="text" id="first_name" name="first_name" placeholder="Enter first name..."
                                                    value="{{ old('first_name', ($profile->first_name ? $profile->first_name:'') ) }}"  class="form-control{{ $errors->has('first_name') ? '  is-invalid' : '' }}">
                                                    @if ($errors->has('first_name'))
                                                        <span class="help-block invalid-feedback d-block">
                                                            <strong>{{ $errors->first('first_name') }}</strong>
                                                        </span>
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="last_name">Last Name</label>
                                                <input type="text" id="last_name" name="last_name" placeholder="Enter last name..."
                                                    value="{{ old('last_name', ($profile->last_name ? $profile->last_name:'') ) }}"  class="form-control{{ $errors->has('last_name') ? '  is-invalid' : '' }}">
                                                    @if ($errors->has('last_name'))
                                                        <span class="help-block invalid-feedback d-block">
                                                            <strong>{{ $errors->first('last_name') }}</strong>
                                                        </span>
                                                    @endif                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <p class="m-0 mb-0">Date Of Birth</p>
                                                <div class="input-group date datepicker p-0">
                                                    <input id="date_of_birth" 
                                                            type="text" placeholder="DD/MM/YYYY..."
                                                            value="{{ old('date_of_birth', ($profile->date_of_birth ? $profile->date_of_birth:'') ) }}"
                                                            name="date_of_birth"  
                                                            class="date-picker form-control{{ $errors->has('date_of_birth') ? '  is-invalid' : '' }} form-control-sm"
                                                            autocomplete="off" />
                                                    <div class="input-group-addon"><span class="mdi mdi-calendar"></span></div>
                                                    @if ($errors->has('date_of_birth'))
                                                        <span class="help-block invalid-feedback d-block">
                                                            <strong>{{ $errors->first('date_of_birth') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" id="email" name="email" placeholder="Enter email address"
                                                    value="{{ old('email', ($profile->email ? $profile->email:'') ) }}"  class="form-control{{ $errors->has('email') ? '  is-invalid' : '' }}">
                                                    @if ($errors->has('email'))
                                                        <span class="help-block invalid-feedback d-block">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="phone_info" class="mb-0">Mobile Number</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">+</span>
                                                </div>
                                                <input id="phone_info" type="text"  class="form-control{{ $errors->has('phone_ext') ? '  is-invalid' : '' }}" name="phone_ext" value="{{ old('phone_ext', ($profile->phone_ext ? $profile->phone_ext:'') ) }}" placeholder="Country code...">
                                                <input type="text"  class="form-control{{ $errors->has('phone_num') ? '  is-invalid' : '' }}" name="phone_num" value="{{ old('phone_num', ($profile->phone_num ? $profile->phone_num:'') ) }}" placeholder="Phone number...">
                                                @if ($errors->has('phone_ext'))
                                                    <span class="help-block invalid-feedback d-block">
                                                        <strong>{{ $errors->first('phone_ext') }}</strong>
                                                    </span>
                                                    <br/>
                                                @endif
                                                @if ($errors->has('phone_num'))
                                                    <span class="help-block invalid-feedback d-block">
                                                        <strong>{{ $errors->first('phone_num') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group mb-3">
                                                <label for="gender" class="m-0 p-0 w-100">Gender</label>
                                                <select id="gender" class="form-control custom-select{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender">
                                                    <option value = "Male" {{ $profile->gender == "Male" ? 'selected':'' }}>Male</option>
                                                    <option value = "Female" {{ $profile->gender == "Female" ? 'selected':'' }}>Female</option>
                                                </select>
                                                @if ($errors->has('gender'))
                                                    <span class="help-block invalid-feedback d-block">
                                                        <strong>{{ $errors->first('gender') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="address">Physical Address</label>
                                                <textarea id="address" name="address" rows="1" placeholder="Enter physical address..."
                                                    class="form-control{{ $errors->has('address') ? '  is-invalid' : '' }}">{{ old( 'address', ($profile->address ? $profile->address:'') ) }}</textarea>
                                                @if ($errors->has('address'))
                                                    <span class="help-block invalid-feedback d-block">
                                                        <strong>{{ $errors->first('address') }}</strong>
                                                    </span>
                                                @endif    
                                            </div>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row">
                                        @if($profile->companyBranch)
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="company_branch">Company Branch</label>
                                                <select id="company_branch" class="form-control custom-select{{ $errors->has('company') ? ' is-invalid' : '' }}" name="company_branch_id">
                                                    <option value = "{{ $profile->companyBranch->id ? $profile->companyBranch->id:'' }}">{{ $profile->companyBranch->name ? $profile->companyBranch->name:'' }}</option>
                                                </select>
                                                @if ($errors->has('company'))
                                                    <span class="help-block invalid-feedback d-block">
                                                        <strong>{{ $errors->first('company') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        @endif
                                        @if($profile->company)
                                            @if($profile->company->positions)
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="company_position">Company Position</label>
                                                    <select id="company_position" class="form-control custom-select{{ $errors->has('company_position') ? ' is-invalid' : '' }}" name="position">
                                                        @foreach($profile->company->positions as $position)
                                                            <option value = "{{ $position->id }}" {{ $profile->position == $position->name ? 'selected':'' }}>{{ $position->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('company_position'))
                                                        <span class="help-block invalid-feedback d-block">
                                                            <strong>{{ $errors->first('company_position') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="form-group mt-0">
                                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                                    </div>
                                </div>
                                <div id="avatar" role="tabpanel" aria-labelledby="avatar-tab" class="tab-pane fade{{ app('request')->input('tab') == "avatar" ? ' show active': '' }}">
                                    <div class="alert alert-info" role="alert">
                                        <i class="icon-info icons mr-1" style="font-size: 12px;"></i>
                                        <span style="font-size: 12px;">This is where you can change your profile image. <br/>Image size is limited to not greater than <b>2MB</b>. Only <b>jpeg, jpg, png and gif</b> are accepted.</span>
                                    </div>
                                    <div class="form-group">
                                            @if ($errors->has('avatar'))
                                                <span class="help-block invalid-feedback d-block">
                                                    <span class="badge badge-danger text-white mr-2">Error : </span>
                                                    <strong>{{ $errors->first('avatar') }}</strong>
                                                </span>
                                            @endif  
                                            <input type="file" data-max-file-size="2mb" data-default-file="{{ $profile->avatar }}"
                                            class="dropify form-control {{ $errors->has('avatar') ? ' is-invalid' : '' }}" name="avatar">                                      
                                    </div>
                                    <div class="form-group mt-5">
                                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                                    </div>
                                </div>
                                <div id="security" role="tabpanel" aria-labelledby="security-tab" class="tab-pane fade{{ app('request')->input('tab') == "security" ? ' show active': '' }}">
                                    <div class="alert alert-info" role="alert">
                                        <i class="icon-info icons mr-1" style="font-size: 12px;"></i>
                                        <span style="font-size: 12px;">This is where you can change your profile passwords. <br/>Make sure your new passowrd is atleast <b>6 characters</b>. You can reset your password if you forgot it.</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="current_password">Change password</label>
                                        <input type="password" id="current_password" name="current_password" placeholder="Enter you current password"
                                                class="form-control{{ $errors->has('current_password') ? '  is-invalid' : '' }}">
                                        @if ($errors->has('current_password'))
                                            <span class="help-block invalid-feedback d-block">
                                                <strong>{{ $errors->first('current_password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="password" name="password" placeholder="Enter you new password" 
                                                class="form-control{{ $errors->has('password') ? '  is-invalid' : '' }}">
                                        @if ($errors->has('password'))
                                            <span class="help-block invalid-feedback d-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Enter you new password" 
                                                class="form-control{{ $errors->has('password_confirmation') ? '  is-invalid' : '' }}">
                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block invalid-feedback d-block">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group mt-5">
                                        <button type="submit" class="btn btn-primary mr-2">Update</button>
                                    </div>
                                </div>
                                <div id="docs" role="tabpanel" aria-labelledby="docs-tab" class="tab-pane fade{{ app('request')->input('tab') == "docs" ? ' show active': '' }}">
                                    <div class="alert alert-info" role="alert">
                                        <i class="icon-info icons mr-1" style="font-size: 12px;"></i>
                                        <span style="font-size: 12px;">This is where you can upload important documents that relate to this profile. This can be copies of identity, agreements, licences, medical & police reports, e.t.c. Document file size is limited to not greater than <b>2MB</b>. Only <b>jpeg, jpg, png, gif, pdf, doc, ppt, xls, docx, pptx, xlsx, rar and zip are accepted.</b></span>
                                    </div>
                                    <div class="docs-content">
                                        <p><b>Add new document</b></p>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text bg-primary text-white">Document Name: </div>
                                                        </div>                                                                
                                                        <input type="text" id="doc_name" name="doc_name" placeholder="Enter document name..."
                                                        value="{{ old('doc_name', ($profile->doc_name ? $profile->doc_name:'') ) }}" 
                                                        class="form-control{{ $errors->has('doc_name') ? '  is-invalid' : '' }}">
                                                        @if ($errors->has('doc_name'))
                                                            <span class="help-block invalid-feedback d-block">
                                                                <strong>{{ $errors->first('doc_name') }}</strong>
                                                            </span>
                                                        @endif     
                                                    </div>                                           
                                                </div>
                                                <div class="form-group">
                                                    @if ($errors->has('doc_file'))
                                                        <span class="help-block invalid-feedback d-block">
                                                            <span class="badge badge-danger text-white mr-2">Error : </span>
                                                            <strong>{{ $errors->first('doc_file') }}</strong>
                                                        </span>
                                                    @endif  
                                                    <input type="file" data-max-file-size="2mb" data-default-file="{{ old('doc_file', ($profile->doc_file ? $profile->doc_file:'') ) }}"
                                                    class="dropify form-control {{ $errors->has('doc_file') ? ' is-invalid' : '' }}" name="doc_file">                                      
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-1">
                                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection 

@section('js') 

  <script src="{{ asset('js/plugins/dropify/dist/js/dropify.min.js') }}"></script>
  <script src="{{ asset('js/custom/dropify.js') }}"></script>
  <script src="{{ asset('js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

    <script>

        $(document).ready(function(){

            (function($) {
                'use strict';
                if ($(".date-picker").length) {
                  $('.date-picker').datepicker({
                    format: "yyyy-mm-dd",
                    enableOnReadonly: true,
                    todayHighlight: true,
                    startView: 2
                  });
                }
              })(jQuery);

            var errors = $('.help-block.invalid-feedback');

            $.each(errors, function( index, value ) {
                var tabId = $(value).closest('.tab-pane').attr('id');
                var currCount = $('#myTab .nav-item #'+tabId+'-tab').parent('li').attr('data-error');
                var count = (currCount == undefined) ? 1 : parseInt(currCount) + 1;
                var msg = (count == 1) ? count+' error here': count+' errors here';
                
                var tabNavItem = $('#myTab .nav-item #'+tabId+'-tab').parent('li')
                                .attr('data-error', count)
                                .attr('data-toggle', 'tooltip')
                                .attr('data-placement', 'top')
                                .attr('data-title',  msg)
            });

            $('#myTab .nav-item').tooltip('show')

        });
            
    </script>


@endsection