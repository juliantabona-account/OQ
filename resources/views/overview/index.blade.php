@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="row overview-summary">
=======
        <div class="row">
            <div class="col-md-12 col-lg-12">
>>>>>>> d0320244a16f691a5d0934a7b2fa14720f9c1278
                <div class="row overview-summary">
                    <div class="col-md-12 col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body p-3">
                                <h6 class="card-title mb-0">Overview</h6>
                            </div>
                        </div>
                    </div>
<<<<<<< HEAD
                                            <div class="summary-card col-md-6 col-lg-3 grid-margin stretch-card">
                            <div class="card card-clickable" data-href="/jobcards/overdue">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-md-center">
                                        <i class="icon-social-dropbox icons icon-lg"></i>
                                        <div class="ml-3">
                                            <p class="mb-0">Requests</p>
                                            <h6>215</h6>
=======
                    @foreach($jobcardProcessSteps as $processStep)
                        <div class="summary-card col-md-6 col-lg-3 grid-margin stretch-card">
                            <div class="card card-clickable" data-href="{{ route('show-step-jobcard', [$processStep->id]) }}">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-md-center">
                                        <i class="icon-lg {{ $processStep->step_instruction['icon'] }}"></i>
                                        <div class="ml-3">
                                            <p class="mb-0">{{ $processStep->step_instruction['name'] }}</p>
                                            <h6>{{ $processStep->jobcards->count() }}</h6>
>>>>>>> d0320244a16f691a5d0934a7b2fa14720f9c1278
                                        </div>
                                    </div>
                                </div>
                            </div>
<<<<<<< HEAD
                        </div><div class="summary-card col-md-6 col-lg-3 grid-margin stretch-card">
                            <div class="card card-clickable" data-href="http://127.0.0.1:8000/jobcards/step/1">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-md-center">
                                        <i class="icon-lg icon-layers icons"></i>
                                        <div class="ml-3">
                                            <p class="mb-0">Authorized</p>
                                            <h6>187</h6>
                                        </div>
=======
                        </div>
                    @endforeach
                    <div class="summary-card col-md-6 col-lg-3 grid-margin stretch-card">
                        <div class="card card-clickable" data-href='/jobcards/overdue'>
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-md-center">
                                    <i class="icon-exclamation icons icon-lg"></i>
                                    <div class="ml-3">
                                        <p class="mb-0">Overdue Jobs</p>
                                        <h6>---</h6>
>>>>>>> d0320244a16f691a5d0934a7b2fa14720f9c1278
                                    </div>
                                </div>
                            </div>
                        </div>
<<<<<<< HEAD
                                            <div class="summary-card col-md-6 col-lg-3 grid-margin stretch-card">
                            <div class="card card-clickable" data-href="http://127.0.0.1:8000/jobcards/step/2">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-md-center">
                                        <i class="icon-lg icon-eye icons"></i>
                                        <div class="ml-3">
                                            <p class="mb-0">Currently Reviewed</p>
                                            <h6>126</h6>
=======
                    </div>
                    <div class="summary-card col-md-6 col-lg-3 grid-margin stretch-card">
                            <div class="card card-clickable" data-href='/jobcards/overdue'>
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-md-center">
                                        <i class="icon-social-dropbox icons icon-lg"></i>
                                        <div class="ml-3">
                                            <p class="mb-0">UnAuthorized</p>
                                            <h6>---</h6>
>>>>>>> d0320244a16f691a5d0934a7b2fa14720f9c1278
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<<<<<<< HEAD
                                            <div class="summary-card col-md-6 col-lg-3 grid-margin stretch-card">
                            <div class="card card-clickable" data-href="http://127.0.0.1:8000/jobcards/step/5">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-md-center">
                                        <i class="icon-lg icon-eyeglass icons"></i>
                                        <div class="ml-3">
                                            <p class="mb-0">Inspection</p>
                                            <h6>107</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><div class="summary-card col-md-6 col-lg-3 grid-margin stretch-card">
                            <div class="card card-clickable" data-href="http://127.0.0.1:8000/jobcards/step/5">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-md-center">
                                        <i class="icon-lg icon-note icons"></i>
                                        <div class="ml-3">
                                            <p class="mb-0">Waiting Signoff</p>
                                            <h6>88</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><div class="summary-card col-md-6 col-lg-3 grid-margin stretch-card">
                            <div class="card card-clickable" data-href="http://127.0.0.1:8000/jobcards/step/5">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-md-center">
                                        <i class="icon-lg icon-like icons"></i>
                                        <div class="ml-3">
                                            <p class="mb-0">Completed</p>
                                            <h6>301</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><div class="summary-card col-md-6 col-lg-3 grid-margin stretch-card">
                        <div class="card card-clickable" data-href="/jobcards/overdue">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-md-center">
                                    <i class="icon-exclamation icons icon-lg"></i>
                                    <div class="ml-3">
                                        <p class="mb-0">Overdue</p>
                                        <h6>24</h6>
=======
                    <div class="summary-card col-md-6 col-lg-3 grid-margin stretch-card">
                        <div class="card card-clickable" data-href='/clients'>
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-md-center">
                                    <i class="icon-lg icon-emotsmile icons"></i>
                                    <div class="ml-3">
                                        <p class="mb-0">Clients</p>
                                        <h6>{{ $clientsCount }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="summary-card col-md-6 col-lg-3 grid-margin stretch-card">
                        <div class="card card-clickable" data-href='/contractors'>
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-md-center">
                                    <i class="icon-lg icon-briefcase icons"></i>
                                    <div class="ml-3">
                                        <p class="mb-0">Contractors</p>
                                        <h6>{{ $contractorsCount }}</h6>
>>>>>>> d0320244a16f691a5d0934a7b2fa14720f9c1278
                                    </div>
                                </div>
                            </div>
                        </div>
<<<<<<< HEAD
                    </div><div class="summary-card col-md-6 col-lg-3 grid-margin stretch-card">
                        <div class="card card-clickable" data-href="/clients">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-md-center">
                                    <i class="icon-lg icon-emotsmile icons"></i>
                                    <div class="ml-3">
                                        <p class="mb-0">Clients</p>
                                        <h6>984</h6>
=======
                    </div>
                    <div class="summary-card col-md-6 col-lg-3 grid-margin stretch-card">
                        <div class="card card-clickable" data-href='/contractors'>
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-md-center">
                                    <i class="icon-lg icon-user icons"></i>
                                    <div class="ml-3">
                                        <p class="mb-0">Staff</p>
                                        <h6>---</h6>
>>>>>>> d0320244a16f691a5d0934a7b2fa14720f9c1278
                                    </div>
                                </div>
                            </div>
                        </div>
<<<<<<< HEAD
                    </div><div class="summary-card col-md-6 col-lg-3 grid-margin stretch-card" style="">
                        <div class="card card-clickable" data-href="/contractors">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-md-center">
                                    <i class="icon-lg icon-user icons"></i>
                                    <div class="ml-3">
                                        <p class="mb-0">Staff</p>
                                        <h6>1027</h6>
=======
                    </div>
                    <div class="summary-card col-md-6 col-lg-3 grid-margin stretch-card">
                        <div class="card card-clickable" data-href='/contractors'>
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-md-center">
                                    <i class="icon-lg icon-notebook icons"></i>
                                    <div class="ml-3">
                                        <p class="mb-0">Contacts</p>
                                        <h6>---</h6>
>>>>>>> d0320244a16f691a5d0934a7b2fa14720f9c1278
                                    </div>
                                </div>
                            </div>
                        </div>
<<<<<<< HEAD
                    </div><div class="summary-card col-md-6 col-lg-3 grid-margin stretch-card" style="">
                        <div class="card card-clickable" data-href="/contractors">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-md-center">
                                    <i class="icon-lg icon-notebook icons"></i>
                                    <div class="ml-3">
                                        <p class="mb-0">Contacts</p>
                                        <h6>5734</h6>
=======
                    </div>
                    <div class="summary-card col-md-6 col-lg-3 grid-margin stretch-card">
                        <div class="card card-clickable" data-href='/contractors'>
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-md-center">
                                    <i class="icon-lg icon-organization icons"></i>
                                    <div class="ml-3">
                                        <p class="mb-0">Branches</p>
                                        <h6>---</h6>
>>>>>>> d0320244a16f691a5d0934a7b2fa14720f9c1278
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="toggle-summary-cards-btn col-12"><button class="btn btn-dark d-block mr-auto ml-auto mb-3  rounded"><i class="icons icon-arrow-down-circle"></i><span>Show More</span></button></div></div>
            </div>
        </div>
<<<<<<< HEAD
    </div>
    <div class="row">
        <div class="col-lg-8 d-flex flex-column">
            <div class="row flex-grow">
                <div class="col-12 col-md-4 col-lg-12 grid-margin stretch-card">
                    <div class="card card-hoverable">
                        <div class="card-body">
                            <h6 class="card-title float-left mb-0 ml-2">Recent Requests</h6>
                            <div class="table-responsive table-hover">
                                <table class="table mt-3 border-top">
                                    <thead>
                                        <tr>
                                            <th>Customer</th>
                                            <th>Category</th>
                                            <th>Contact</th>
                                            <th>Submitted</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>                                            
                                        <tr class="clickable-row" data-href="#">
                                            <td data-toggle="tooltip" data-placement="top" title="" data-original-title="This is a sample job card with details describing work to be done by a particular contractor for a specific clientile">kgosi Mapila</td>
                                            <td>ISP</td>
                                            <td>+267 75990021</td>                                                 
                                            <td class="d-none d-md-table-cell">03 Jul 2018</td>  
                                        </tr><tr class="clickable-row" data-href="#">
                                            <td data-toggle="tooltip" data-placement="top" title="" data-original-title="This is a sample job card with details describing work to be done by a particular contractor for a specific clientile">Bame Mpenge</td>
                                            <td>Internet</td>
                                            <td>+267 74892320</td>                                                
                                            <td class="d-none d-md-table-cell">02 Jul 2018</td>  
                                        </tr><tr class="clickable-row" data-href="#">
                                            <td data-toggle="tooltip" data-placement="top" title="" data-original-title="This is a sample job card with details describing work to be done by a particular contractor for a specific clientile">Gaone Kgolo</td>
                                            <td>Internet</td>
                                            <td>+267 76879098</td>                                             
                                            <td class="d-none d-md-table-cell">02 Jul 2018</td>  
                                        </tr><tr class="clickable-row" data-href="#">
                                            <td data-toggle="tooltip" data-placement="top" title="" data-original-title="This is a sample job card with details describing work to be done by a particular contractor for a specific clientile">Ronald Bay</td>
                                            <td>ISP</td>
                                            <td>+267 72456732</td>                                                 
                                            <td class="d-none d-md-table-cell">02 Jul 2018</td>  
                                        </tr><tr class="clickable-row" data-href="#">
                                            <td data-toggle="tooltip" data-placement="top" title="" data-original-title="This is a sample job card with details describing work to be done by a particular contractor for a specific clientile">Karabo Monna</td>
                                            <td>Internet</td>
                                            <td>+267 75990021</td>                                                 
                                            <td class="d-none d-md-table-cell">01 Jul 2018</td>  
                                        </tr>
                                                                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex align-items-center justify-content-between flex-column flex-sm-row mt-4">
                            <p class="mb-3 ml-3 mb-sm-0"><strong>5</strong>  results found</p>
                            <nav>
                                
                            </nav>
                        </div>
                        <div class="d-flex float-right mt-2">
                            <a href="http://127.0.0.1:8000/jobcards" class="btn btn-primary btn-sm">View All
                                <i class="icon-arrow-right-circle icons ml-1"></i>
                            </a>
=======
        <div class="row">
            <div class="col-lg-8 d-flex flex-column">
                <div class="row flex-grow">
                    <div class="col-12 col-md-4 col-lg-12 grid-margin stretch-card">
                        <div class="card card-hoverable">
                            <div class="card-body">
                                @if( COUNT($jobcards) )
                                    <h6 class="card-title float-left mb-0 ml-2">Recent Jobcards</h6>
                                    <div class="table-responsive table-hover">
                                        <table class="table mt-3 border-top">
                                            <thead>
                                                <tr>
                                                    <th style="width: 30%">Customer</th>
                                                    <th style="width: 20%">Start Date</th>
                                                    <th style="width: 20%">End Date</th>
                                                    <th style="width: 14%">Due</th>
                                                    <th class="d-sm-none d-md-table-cell">Priority</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($jobcards as $jobcard)
                                                    <tr class='clickable-row' data-href='/jobcards/{{ $jobcard->id }}'>
                                                        <td data-toggle="tooltip" data-placement="{{ COUNT($jobcards) >= 3 ? 'top':'bottom' }}" title="{{ $jobcard->description }}">{{ $jobcard->title ? $jobcard->title:'____' }}</td>
                                                        <td>{{ $jobcard->start_date ? Carbon\Carbon::parse($jobcard->start_date)->format('d M Y'):'____' }}</td>
                                                        <td>{{ $jobcard->end_date ? Carbon\Carbon::parse($jobcard->end_date)->format('d M Y'):'____' }}</td>    
                                                        <td class="d-none d-md-table-cell">
                                                            @php
                                                                $deadline = round((strtotime($jobcard->end_date)  
                                                                                - strtotime(\Carbon\Carbon::now()->toDateTimeString()))  
                                                                                / (60 * 60 * 24)) 
                                                            @endphp
                                                            @if($deadline > 0)
                                                                {{ $deadline == 1 ? $deadline.' day' : $deadline.' days'  }}
                                                            @else
                                                                <i class="icon-exclamation icons mr-1 text-danger"></i>
                                                                <span class="text-danger">due</span>
                                                            @endif
                                                        </td>                                              
                                                        <td class="d-none d-md-table-cell">
                                                            @if($jobcard->priority)
                                                                <div  data-toggle="tooltip" data-placement="top" title="{{ $jobcard->priority->description }}"
                                                                    class="badge badge-success" style="min-width: 80px;background:{{ $jobcard->priority->color_code }};">{{ $jobcard->priority ? $jobcard->priority->name:'____' }}</div>
                                                            @else
                                                                ____
                                                            @endif    
                                                        </td>  
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between flex-column flex-sm-row mt-4">
                                        <p class="mb-3 ml-3 mb-sm-0"><strong>{{ $jobcards->total() }}</strong>{{ $jobcards->total() == 1 ? ' result': '  results' }} found</p>
                                        <nav>
                                            {{ $jobcards->links() }}
                                        </nav>
                                    </div>
                                    <div class="d-flex float-right mt-2">
                                        <a href= "{{ route('jobcards') }}" class="btn btn-primary btn-sm">View All
                                            <i class="icon-arrow-right-circle icons ml-1"></i>
                                        </a>
                                    </div>
                                @else
                                    <h6 class="card-title float-left mb-0 ml-2">No Jobcards</h6>
                                    <div class="col-4 offset-4">
                                        <div data-toggle="tooltip" data-placement="top" title="Create a new jobcard">
                                            <a href="/jobcards/create" class="btn btn-success p-5 w-100 animated-strips">                                            
                                                <i class="d-block icon-sm icon-flag icons" style="font-size: 25px;"></i>
                                                <span class="d-block mt-4">Create Jobcard</span>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            </div>
>>>>>>> d0320244a16f691a5d0934a7b2fa14720f9c1278
                        </div>
                    </div>
                    </div>
                </div>
            </div>
<<<<<<< HEAD
        </div>
        <div class="col-md-6 col-lg-4 grid-margin stretch-card">
            <div class="card card-hoverable">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="card-title">Recent Activity</h6>
                    </div>
                    <p class="card-description">Activity by staff members</p>
                                                                
                    <div class="recent-activities-box list d-flex align-items-center border-bottom py-3">
                        <img class="img-sm rounded-circle" src="/images/profile_placeholder.png" alt="">
                        <div class="wrapper w-100 ml-3">
                            <p class="mb-0"> Request  from <a href="http://127.0.0.1:8000/profiles/1">Karabo Monei
                            </a> for <a href="http://127.0.0.1:8000/profiles/1">Home Internet Package
                            </a><b>accepted</b>  by <a href="http://127.0.0.1:8000/jobcards/49" data-toggle="tooltip" data-placement="top" title="" data-original-title="____">Kealeboga Mooketsi</a> 
                            from </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-clock text-muted mr-1"></i>
                                    <span class="text-muted ml-auto">05 Jul 2018 @ 06:07</span>
                                </div>
                            </div>
                        </div>
                    </div>                        
                                                                                    
                    <div class="recent-activities-box list d-flex align-items-center border-bottom py-3">
                        <img class="img-sm rounded-circle" src="/images/profile_placeholder.png" alt="">
                        <div class="wrapper w-100 ml-3">
                            <p class="mb-0">
                                
                        <a href="http://127.0.0.1:8000/profiles/1">Contract #304</a><b> marked </b> as <b>overdue</b>
                            by <a href="http://127.0.0.1:8000/jobcards/50" data-toggle="tooltip" data-placement="top" title="" data-original-title="____">Karabo Mabelo</a></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-clock text-muted mr-1"></i>
                                    <span class="text-muted ml-auto">05 Jul 2018 @ 07:07</span>
                                </div>
                            </div>
                        </div>
                    </div>                        
                                                                                    
                    <div class="recent-activities-box list d-flex align-items-center border-bottom py-3">
                        <img class="img-sm rounded-circle" src="/images/profile_placeholder.png" alt="">
                        <div class="wrapper w-100 ml-3">
                            <p class="mb-0"><a href="#">Corporate Internet</a> 
                                contract template created by <a href="#">Lesedi Tabona</a> 
                                waiting approval
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="mdi mdi-clock text-muted mr-1"></i>
                                    <span class="text-muted ml-auto">05 Jul 2018 @ 08:07</span>
                                </div>
                            </div>
=======
            <div class="col-md-6 col-lg-4 grid-margin stretch-card">
                <div class="card card-hoverable">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h6 class="card-title">Recent Activity</h6>
                        </div>
                        <p class="card-description">Activity by staff members</p>
                        @foreach($recentActivities as $position => $recentActivity)
                                                
                            @include('layouts.recentActivity.activity-layout-2')
                            
                        @endforeach
                        <div class="d-flex float-right mt-2">
                            <button class="btn btn-primary btn-sm">View All
                                <i class="icon-arrow-right-circle icons ml-1"></i>
                            </button>
>>>>>>> d0320244a16f691a5d0934a7b2fa14720f9c1278
                        </div>
                    </div>                        
                    <div class="d-flex float-right mt-2">
                        <button class="btn btn-primary btn-sm">View All
                            <i class="icon-arrow-right-circle icons ml-1"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4 grid-margin">
            <div class="card card-hoverable">
                <div class="card-body">
                    <h6 class="card-title">Contract Status</h6>
                    <p class="card-description">Statistics of job created from all locations and their statuses.</p>
                    <canvas id="barChart" width="982" height="1000" style="display: block; width: 982px; height: 1000px;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-4 grid-margin">
            <div class="card card-hoverable">
                <div class="card-body">
                    <h6 class="card-title">Completed Contracts</h6>
                    <p class="card-description">Statistics of jobs closed by departments in their respective locations.</p>
                    <canvas id="barChart2" width="982" height="1000" style="display: block; width: 982px; height: 1000px;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-4 grid-margin">
            <div class="card card-hoverable">
                <div class="card-body">
                    <h6 class="card-title">Overdue Contracts</h6>
                    <p class="card-description">Products that are creating the most revenue and their sales throughout the year and the variation in
                        behavior of sales.</p>
                    <canvas id="barChart3" width="982" height="1000" style="display: block; width: 982px; height: 1000px;"></canvas>
                </div>
            </div>
        </div>
    </div>
    <a href="/jobcards" class="btn btn-primary ml-2 m-auto d-block w-25">
        <i class="icon-pie-chart icons"></i>
        View Reports
    </a>
@endsection

@section('js')

    <!-- Custom js for this page-->
    <script src="{{ asset('js/custom/dashboard.js') }}"></script>
    <script src="{{ asset('js/custom/chart.js') }}"></script>
    <script>
        $(document).ready(function ($) {

            toggleExcessContent();

            $('.toggle-summary-cards-btn').click(function(){
                toggleExcessContent();
            });

        });

        function toggleExcessContent(){
            console.log('arranging...');
            //  Show only 8 cards on the overview summary container
            var showOnly = 8;
            //  Get the overview container
            var overviewSummary = $('.overview-summary');
            //  Get the total number of actual summary cards on the screen
            var summaryCards = $(overviewSummary).find('.summary-card');
            //  Get the number of excess cards showing
            var remainder = showOnly - summaryCards.length;
            //  Target the toggle button for hide/show excess summary cards
            var togglebtn = $('.overview-summary > .toggle-summary-cards-btn');

            
            //  If not expanded before then toggle show excess content
            if( $(overviewSummary).hasClass('hidden-content') ){
                console.log('stage 1');
                //  Show all content
                $('.overview-summary > .summary-card').slice(remainder).slideDown();                
                //  Idicate that the content is shown
                $('.overview-summary').removeClass('hidden-content');
                $(togglebtn).find('i').removeClass('icon-arrow-down-circle').addClass('icon-arrow-up-circle');
                $(togglebtn).find('span').text('Show Less');

            //If expanded before or not at all then hide only if excess content exists
            }else{
                console.log('stage 2');
                //  If we have too many cards on display than the showOnly
                if(remainder < 0){
                    //  Hide all those exceeding the limit
                    $('.overview-summary > .summary-card').slice(remainder).slideUp('slow');
                    //  If we already have the button then don't show add it again
                    //  Otherwise add it just after the last showing summary-card
                    if(!togglebtn.length){
                        $('.overview-summary').append('<div class="toggle-summary-cards-btn col-12">'+
                                '<button class="btn btn-dark d-block mr-auto ml-auto mb-3  rounded">'+
                                    '<i class="icon-arrow-down-circle icons"></i><span>Show All</span>'+
                                '</button>'+
                            '</div>');
                    }else{
                        $(togglebtn).find('i').removeClass('icon-arrow-up-circle').addClass('icon-arrow-down-circle'); 
                        $(togglebtn).find('span').text('Show All');
                    }
                    //  Idicate that the content is hidden
                    $('.overview-summary').addClass('hidden-content');
                }
            }
        }
        
    </script>
    <!-- End custom js for this page-->

@endsection