@extends('layouts.app') 

@section('style') 

@endsection @section('content')

    <div class="row">
        <div class="col-lg-12 d-flex flex-column">
            <div class="row flex-grow">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body pt-3 pl-3 pr-3 pb-2">
                            <div class="align-items-center d-flex float-left justify-content-between mr-3 mt-0">
                                <div class="d-inline-block">
                                    <div class="bg-success px-md-4 rounded">
                                        <i class="d-inline-block icon-md icon-user pb-2 pt-3 text-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="d-inline-block pt-1">
                                    <span class="text-success card-title mb-0 d-block">Statistics</span>
                                    <div class="d-lg-flex">
                                        <h4 class="mb-0">{{ $profiles->total() }} Staff Members</h4>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-primary btn-sm float-right mt-2">
                                    + Create Staff
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-12 grid-margin stretch-card">
                    <div class="card card-hoverable">
                        <div class="card-body p-3 pt-4">

                            @if( COUNT($profiles) )

                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="card-title mb-3 mt-4">Staff Members</h3>
                                        <div class="d-flex table-responsive">
                                            <div class="btn-group ml-auto mr-2 border-0">
                                                <input type="text" placeholder="Search Here" class="form-control">
                                                <div class="btn-group mr-2">
                                                    <button class="btn btn-sm btn-primary">
                                                        <i class="icon-magnifier icons"></i> Search</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive table-hover">
                                            <table class="table mt-3 border-top">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>First Name</th>
                                                        <th>Last Name</th>
                                                        <th>Phone</th>
                                                        <th>Email</th>
                                                        <th>Branch</th>
                                                        <th>Position</th>
                                                        <th>Created On</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($profiles as $profile)
                                                        <tr class='clickable-row' data-href="{{ route('profile-show', [$profile->id]) }}">
                                                            <td>
                                                                <div class="lightgallery">
                                                                    <a href="{{ $profile->avatar }}">
                                                                        <img src="{{ $profile->avatar }}" alt="Profile Image" class="profile-img "/>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                            <td>{{ $profile->first_name ? $profile->first_name:'____'  }}</td>
                                                            <td>{{ $profile->last_name ? $profile->last_name:'____' }}</td>
                                                            <td>
                                                                {{ $profile->phone_ext ? '+'.$profile->phone_ext.'-':'___-' }}
                                                                {{ $profile->phone_num ? $profile->phone_num:'____' }}
                                                            </td>
                                                            <td>{{ $profile->email ? $profile->email:'____' }}</td>
                                                            <td>{{ $profile->companyBranch ? $profile->companyBranch->name:'____' }}</td>
                                                            <td>{{ $profile->position ? $profile->position:'____' }}</td>
                                                            <td>{{ $profile->created_at ? Carbon\Carbon::parse($profile->created_at)->format('d M Y'):'____' }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between flex-column flex-sm-row mt-4">
                                            @if($profiles->total() != 0)
                                                <p class="mb-3 ml-3 mb-sm-0">
                                                    <strong>{{ $profiles->total() }}</strong>{{ $profiles->total() == 1 ? ' result': '  results' }} found
                                                </p>
                                            @else
                                                <div class="col-6 offset-3" data-toggle="tooltip" data-placement="top" title="Create a new staff member">
                                                    <a href="#" class="btn btn-success p-5 w-100 animated-strips">                                            
                                                        <i class="d-block icon-sm icon-user icons" style="font-size: 25px;"></i>
                                                        <span class="d-block mt-4">Create Staff</span>
                                                    </a>
                                                </div>
                                            @endif
                                            <nav>
                                                {{ $profiles->links() }}
                                            </nav>
                                        </div>
                                    </div>
                                </div>

                            @else
                                <h6 class="card-title float-left mb-0 ml-2">No Clients</h6>
                                <div class="col-4 offset-4">
                                    <div data-toggle="tooltip" data-placement="top" title="Create a new jobcard">
                                        <a href="#" class="btn btn-success p-5 w-100 animated-strips">                                            
                                            <i class="d-block icon-sm icon-flag icons" style="font-size: 25px;"></i>
                                            <span class="d-block mt-4">Create Client</span>
                                        </a>
                                    </div>
                                </div>
                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection @section('js') 

@endsection