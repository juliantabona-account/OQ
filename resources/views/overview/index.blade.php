@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="row overview-summary">
                    <div class="col-md-12 col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body p-3">
                                <h6 class="card-title mb-0">Overview</h6>
                            </div>
                        </div>
                    </div>
                    @if($userHasCompany)
                        @foreach($jobcardProcessSteps as $processStep)
                            <div class="summary-card col-md-6 col-lg-3 grid-margin stretch-card">
                                <div class="card card-clickable" data-href="{{ route('show-step-jobcard', [$processStep->id]) }}">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-md-center">
                                            <i class="icon-lg {{ $processStep->icon }}"></i>
                                            <div class="ml-3">
                                                <p class="mb-0">{{ $processStep->name }}</p>
                                                <h6>{{ $processStep->jobcards->count() }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="summary-card col-md-6 col-lg-3 grid-margin stretch-card">
                                <div class="card card-clickable" data-href='/jobcards/overdue'>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-md-center">
                                            <i class="icon-social-dropbox icons icon-lg"></i>
                                            <div class="ml-3">
                                                <p class="mb-0">UnAuthorized</p>
                                                <h6>---</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="summary-card col-md-6 col-lg-3 grid-margin stretch-card">
                            <div class="card card-clickable" data-href='/contractors'>
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-md-center">
                                        <i class="icon-lg icon-user icons"></i>
                                        <div class="ml-3">
                                            <p class="mb-0">Staff</p>
                                            <h6>---</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="summary-card col-md-6 col-lg-3 grid-margin stretch-card">
                            <div class="card card-clickable" data-href='/contractors'>
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-md-center">
                                        <i class="icon-lg icon-notebook icons"></i>
                                        <div class="ml-3">
                                            <p class="mb-0">Contacts</p>
                                            <h6>---</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="summary-card col-md-6 col-lg-3 grid-margin stretch-card">
                            <div class="card card-clickable" data-href='/contractors'>
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-md-center">
                                        <i class="icon-lg icon-organization icons"></i>
                                        <div class="ml-3">
                                            <p class="mb-0">Branches</p>
                                            <h6>---</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                    <div class="summary-card col-md-9 offset-1 grid-margin stretch-card">
                        <div class="card card-clickable card-error" data-href="{{ route('company-create') }}?type=user">
                            <div class="card-body">
                                <div class="mt-3 text-center">
                                    <i class="icon-ghost icon-sm icons ml-3"></i>
                                    <h6 class="card-title mt-2 mb-3 ml-2">We could not find your company or branch. <br/>Click here to fix this</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 d-flex flex-column">
                <div class="row flex-grow">
                    <div class="col-12 col-md-4 col-lg-12 grid-margin stretch-card">
                        <div class="card card-hoverable">
                            <div class="card-body">
                                @if($userHasCompany)
                                    @if( COUNT($jobcards) )
                                        <div class="d-flex justify-content-between">
                                            <h6 class="card-title">Recent Jobcards</h6>
                                        </div>
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
                                @else
                                    <div class="d-flex justify-content-between">
                                        <h6 class="card-title">Recent Jobcards</h6>
                                    </div>
                                    <p>......................................................</p>
                                    <p>..............................</p>
                                    <p>.............</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 grid-margin stretch-card">
                <div class="card card-hoverable">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h6 class="card-title">Recent Activity</h6>
                        </div>
                        @if($userHasCompany)
                            <p class="card-description">Activity by staff members</p>
                        
                            @foreach($recentActivities as $position => $recentActivity)
                                                    
                                @include('layouts.recentActivity.activity-layout-2')
                                
                            @endforeach
                            <div class="d-flex float-right mt-2">
                                <button class="btn btn-primary btn-sm">View All
                                    <i class="icon-arrow-right-circle icons ml-1"></i>
                                </button>
                            </div>
                        @else
                            <p>......................................................</p>
                            <p>..............................</p>
                            <p>.............</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4 grid-margin">
                <div class="card card-hoverable">
                    <div class="card-body">
                        <h6 class="card-title">Jobcard Status</h6>
                        @if($userHasCompany)
                            <p class="card-description">Statistics of job created from all locations and their statuses.</p>
                            <canvas id="barChart" width="982" height="1000" style="display: block; width: 982px; height: 1000px;"></canvas>
                        @else
                            <p>......................................................</p>
                            <p>..............................</p>
                            <p>.............</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-4 grid-margin">
                <div class="card card-hoverable">
                    <div class="card-body">
                        <h6 class="card-title">Closed Jobs</h6>
                        @if($userHasCompany)
                            <p class="card-description">Statistics of jobs closed by departments in their respective locations.</p>
                            <canvas id="barChart2" width="982" height="1000" style="display: block; width: 982px; height: 1000px;"></canvas>
                        @else
                            <p>......................................................</p>
                            <p>..............................</p>
                            <p>.............</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-4 grid-margin">
                <div class="card card-hoverable">
                    <div class="card-body">
                        <h6 class="card-title">Overdue Jobs</h6>
                        @if($userHasCompany)
                            <p class="card-description">Products that are creating the most revenue and their sales throughout the year and the variation in
                                behavior of sales.</p>
                            <canvas id="barChart3" width="982" height="1000" style="display: block; width: 982px; height: 1000px;"></canvas>
                        @else
                            <p>......................................................</p>
                            <p>..............................</p>
                            <p>.............</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @if($userHasCompany)
            <a href="/jobcards" class="btn btn-primary ml-2 m-auto d-block w-25">
                <i class="icon-pie-chart icons"></i>
                View Reports
            </a>
        @endif
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