@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 d-flex flex-column">
            <div class="row flex-grow">
                <div class="col-12 col-md-12 col-lg-12 grid-margin stretch-card">
                    <div class="card card-hoverable">
                        <div class="card-body">
                            <i class="float-left icon-flag icon-sm icons ml-3"></i>
                            @if( COUNT($jobcards) )
                                <h6 class="card-title float-left mb-0 ml-2">All Jobs</h6>
                                <div class="d-flex table-responsive">
                                    <div class="btn-group ml-auto mr-2 border-0">
                                    <input type="text" class="form-control" placeholder="Search Here">
                                    <button class="btn btn-sm btn-primary"><i class="icon-magnifier icons"></i> Search</button>
                                    </div>
                                    <div class="btn-group">
                                    <button type="button" class="btn btn-light"><i class="mdi mdi-printer"></i></button>
                                    <button type="button" class="btn btn-light"><i class="mdi mdi-dots-vertical"></i></button>
                                    </div>
                                </div>
                                <div class="table-responsive table-hover">
                                    <table class="table mt-3 border-top">
                                        <thead>
                                            <tr>
                                                <th style="width: 30%">Customer</th>
                                                <th style="width: 15%">Start Date</th>
                                                <th style="width: 15%">End Date</th>
                                                <th style="width: 14%" class="d-sm-none d-md-table-cell">Reference</th>
                                                <th style="width: 18%" class="d-sm-none d-md-table-cell">Contractor</th>
                                                <th style="width: 10%">Due</th>
                                                <th class="d-sm-none d-md-table-cell">Priority</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($jobcards as $jobcard)
                                                <tr class='clickable-row' data-href='/jobcards/{{ $jobcard->id }}'>
                                                    <td data-toggle="tooltip" data-placement="{{ COUNT($jobcards) >= 3 ? 'top':'bottom' }}" title="Installation of new aircons in offices">{{ $jobcard->title ? $jobcard->title:'____' }}</td>
                                                    <td>{{ $jobcard->start_date ? Carbon\Carbon::parse($jobcard->start_date)->format('d M Y'):'____' }}</td>
                                                    <td>{{ $jobcard->end_date ? Carbon\Carbon::parse($jobcard->end_date)->format('d M Y'):'____' }}</td>
                                                    <td data-toggle="tooltip" data-placement="{{ COUNT($jobcards) >= 3 ? 'top':'bottom' }}" data-html="true" title="<b>Katlo Sesiane<b><br>Mobile: +267 76548921<br>Email: bonolosesiane@gmail.com" class="d-none d-md-table-cell">??Mr Sesiane</td>
                                                    <td data-toggle="tooltip" data-placement="{{ COUNT($jobcards) >= 3 ? 'top':'bottom' }}" data-html="true" title="<b>Stanley Busang<b><br>Mobile: +267 76902134<br>Email: stanley@trioptimum.co.bw" class="d-none d-md-table-cell">??TriOptimum (PTY) LTD</td>      
                                                    <td class="d-none d-md-table-cell">
                                                        {{ 
                                                            round((strtotime($jobcard->end_date)  
                                                                        - strtotime(\Carbon\Carbon::now()->toDateTimeString()))  
                                                                        / (60 * 60 * 24)) 

                                                        }}
                                                    </td>                                              
                                                    <td class="d-none d-md-table-cell">{{ $jobcard->priority->name }}</td>                                           
                                                    <td>
                                                        <div class="badge badge-success badge-fw">Open</div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex align-items-center justify-content-between flex-column flex-sm-row mt-4">
                                    <p class="mb-3 mb-sm-0">Showing 1 to 5 of 20 entries</p>
                                    <nav>
                                        {{ $jobcards->links() }}
                                    </nav>
                                </div>
                                <div class="d-flex float-right mt-4">
                                    <button class="btn btn-primary btn-sm">View All
                                        <i class="icon-arrow-right-circle icons ml-1"></i>
                                    </button>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

    <!-- Custom js for this page-->
    <script src="{{ asset('js/custom/dashboard.js') }}"></script>
    <script src="{{ asset('js/custom/chart.js') }}"></script>
    <!-- End custom js for this page-->

@endsection