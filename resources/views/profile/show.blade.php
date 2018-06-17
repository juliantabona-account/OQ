@extends('layouts.app') 

@section('style') 

    <link rel="stylesheet" href="{{ asset('css/plugins/lightgallery/dist/css/lightgallery.min.css') }}">

@endsection 

@section('content')

    <div class="row user-profile">
        <div class="col-lg-4 side-left">
            <div class="row">
                <div class="col-12">
                    <div class="card card-hoverable">
                        <div class="card-body avatar">
                            <div class="lightgallery">
                                <a href="{{ Auth::user()->avatar }}">
                                    <img src="{{ Auth::user()->avatar }}" alt="Profile Image" class="profile-img"/>
                                </a>
                            </div>
                            <p class="name">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
                            <p class="designation">{{ Auth::user()->position  != ''? '-- '.Auth::user()->position->name.' --':'' }}</p>
                            <span href="#" class="d-block text-center text-dark">{{ Auth::user()->email ? Auth::user()->email:'____' }}</span>
                            <span class="d-block text-center text-dark">
                                @if(Auth::user()->phone_num)
                                    <i class="icon-phone icons"></i>
                                @endif
                                {{ Auth::user()->phone_ext ? '+'.Auth::user()->phone_ext.'-':'___-' }}
                                {{ Auth::user()->phone_num ? Auth::user()->phone_num:'____' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 side-right stretch-card">
            <div class="card card-hoverable">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <a href="/profiles/{{ Auth::id() }}/edit" class="btn btn-primary float-right">
                                <i class="icon-pencil icons"></i>
                                Edit Profile
                            </a>
                        </div>
                    </div>
                    <div class="wrapper d-block d-sm-flex align-items-center justify-content-between">
                        <h4 class="card-title mb-0">Details</h4>
                    </div>
                    <div class="wrapper">
                        <hr>
                        <div class="row mb-3">
                            <div class="col-6">
                                <h6>
                                    <b>First Name: </b>
                                    <span class="font-weight-normal">{{ Auth::user()->first_name ? Auth::user()->first_name:'____' }}</span>
                                </h6>
                            </div>
                            <div class="col-6">
                                <h6>
                                    <b>Last Name: </b>
                                    <span class="font-weight-normal">{{ Auth::user()->last_name ? Auth::user()->last_name:'____' }}</span>
                                </h6>           
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <h6>
                                    <b>Mobile Number: </b>
                                    <span class="font-weight-normal">
                                        {{ Auth::user()->phone_ext ? '+'.Auth::user()->phone_ext.'-':'___-' }}
                                        {{ Auth::user()->phone_num ? Auth::user()->phone_num:'____' }}
                                    </span>
                                </h6>
                            </div>
                            <div class="col-6">
                                <h6>
                                    <b>Email: </b>
                                    <span class="font-weight-normal">{{ Auth::user()->email ? Auth::user()->email:'____' }}</span>
                                </h6>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <h6>
                                    <b>Date Of Birth: </b>
                                    <span class="font-weight-normal">{{ Auth::user()->date_of_birth ? Carbon\Carbon::parse(Auth::user()->date_of_birth)->format('d M Y'):'____' }}</span>
                                </h6>
                            </div>
                            <div class="col-6">
                                <h6>
                                    <b>Gender: </b>
                                    <span class="font-weight-normal">{{ Auth::user()->gender ? Auth::user()->gender:'____' }}</span>
                                </h6>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <h6>
                                    <b>Mobile Number: </b>
                                    <span class="font-weight-normal">
                                        {{ Auth::user()->phone_ext ? '+'.Auth::user()->phone_ext.'-':'___-' }}
                                        {{ Auth::user()->phone_num ? Auth::user()->phone_num:'____' }}
                                    </span>
                                </h6>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <h6>
                                    <b>Physical Address: </b>
                                    <span class="font-weight-normal">{{ Auth::user()->address ? Auth::user()->address:'____' }}</span>
                                </h6>
                            </div>
                        </div>
                        <hr />
                        <div class="row mb-3">
                            <div class="col-6">
                                <h6>
                                    <b>Company: </b>
                                    <span class="font-weight-normal">{{ Auth::user()->company ? Auth::user()->company->name:'____' }}</span>
                                </h6>
                            </div>
                            <div class="col-6">
                                <h6>
                                    <b>Company Position: </b>
                                    <span class="font-weight-normal">{{ Auth::user()->position ? Auth::user()->position->name:'____' }}</span>
                                </h6>
                            </div>
                        </div>
                        
                        <hr />
                        
                        <div class="row bg-inverse-info shadow">
                            <div class="col-12">
                                <h4 class="mt-3 ml-3"><b>Profile Documents</b></h4>
                                @if(COUNT(Auth::user()->documents))
                                    <table class="table mt-3 border-top">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(Auth::user()->documents as $document)
                                                <tr>
                                                    <td>{{ $document->name }}</td>
                                                    <td>{{ pathinfo($document->url, PATHINFO_EXTENSION) }}</td>
                                                    <td>
                                                        <form method="POST" action="{{ route('profile-doc-delete', [Auth::id(), $document->id]) }}">
                                                            {{ method_field('DELETE') }}
                                                            @csrf
                                                            <a href="{{ $document->url }}" class="btn btn-primary btn-sm float-left mr-1" target="_blank">View</a>
                                                            <button type="button" class="btn btn-success btn-sm float-left mr-1">Share</button>
                                                            <button type="submit" class="btn btn-danger btn-sm float-left">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p class="ml-3 mt-4 mb-0 text-muted text-center"><i class="icon-docs icons"></i> No documents uploaded.</p>
                                @endif
                                <a href="/profiles/{{ Auth::id() }}/edit?tab=docs" class="btn btn-primary float-right mr-2 mt-4 mb-4">
                                    <i class="icon-plus icons"></i>
                                    Add Document
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection 

@section('js') 

    <script src="{{ asset('js/plugins/lightgallery/dist/js/lightgallery-all.min.js') }}"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $(".lightgallery").lightGallery({
                'share':false,
                'download':false,
                'actualSize':false
            }); 
        }); 
    </script>

@endsection