@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 d-flex flex-column">
            <div class="row flex-grow">
                <div class="col-12 col-md-12 col-lg-12 grid-margin stretch-card">
                    <div class="card card-hoverable">
                        <div class="card-body">
                            <i class="float-left icon-flag icon-sm icons ml-3"></i>
                            <h6 class="card-title float-left mb-0 ml-2">Open Jobs</h6>
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
                                        <tr class='clickable-row' data-href='/jobcards/1'>
                                            <td data-toggle="tooltip" data-placement="top" title="Installation of new aircons in offices">Ministry Of Health</td>
                                            <td>22 May 2017</td>
                                            <td>25 May 2017</td>
                                            <td data-toggle="tooltip" data-placement="top" data-html="true" title="<b>Katlo Sesiane<b><br>Mobile: +267 76548921<br>Email: bonolosesiane@gmail.com" class="d-none d-md-table-cell">Mr Sesiane</td>
                                            <td data-toggle="tooltip" data-placement="top" data-html="true" title="<b>Stanley Busang<b><br>Mobile: +267 76902134<br>Email: stanley@trioptimum.co.bw" class="d-none d-md-table-cell">TriOptimum (PTY) LTD</td>      
                                            <td class="d-none d-md-table-cell">6 days</td>                                              
                                            <td class="d-none d-md-table-cell">High</td>                                              
                                            <td>
                                                <div class="badge badge-danger badge-fw">Overdue</div>
                                            </td>
                                        </tr>
                                        <tr class='clickable-row' data-href='/jobcards/1'>
                                            <td data-toggle="tooltip" data-placement="top" title="Repair of broken water pipe">The Commissioner of Labour</td>
                                            <td>24 May 2017</td>
                                            <td>25 May 2017</td>
                                            <td data-toggle="tooltip" data-placement="top" data-html="true" title="<b>Sesebogo Mosinyi<b><br>Mobile: +267 76548921<br>Email: sesebogomosinyi@gmail.com" class="d-none d-md-table-cell">Mrs. Mosinyi</td>
                                            <td data-toggle="tooltip" data-placement="top" data-html="true" title="<b>Jerry Majaga<b><br>Mobile: +267 75902134<br>Email: jerry@drophill.co.bw" class="d-none d-md-table-cell">DropHill (PTY) LTD</td>      
                                            <td class="d-none d-md-table-cell text-reddit">1 day</td>   
                                            <td class="d-none d-md-table-cell">Medium</td>   
                                            <td>
                                                <div class="badge badge-primary badge-fw">Open</div>
                                            </td>
                                        </tr>
                                        <tr class='clickable-row' data-href='/jobcards/1'>
                                            <td data-toggle="tooltip" data-placement="top" title="Repair & Maintenance of elevators">Gaborone City Council</td>
                                            <td>26 May 2017</td>
                                            <td>30 May 2017</td>
                                            <td data-toggle="tooltip" data-placement="top" data-html="true" title="<b>Lebogang Kenosi<b><br>Mobile: +267 76548921<br>Email: lebogangkenosi@gmail.com" class="d-none d-md-table-cell">Mr. Kenosi</td>
                                            <td data-toggle="tooltip" data-placement="top" data-html="true" title="<b>Kenneth Jacobs<b><br>Mobile: +267 71563212<br>Email: kenneth@electrohive.co.bw" class="d-none d-md-table-cell">Electrohive (PTY) LTD</td>      
                                            <td class="d-none d-md-table-cell">4 days</td>   
                                            <td class="d-none d-md-table-cell">Low</td>   
                                            <td>
                                            <div class="badge badge-warning badge-fw">Pending</div>
                                            </td>
                                        </tr>
                                        <tr class='clickable-row' data-href='/jobcards/1'>
                                            <td data-toggle="tooltip" data-placement="top" title="Repair of basement generators">Malete Land Board</td>
                                            <td>01 June 2017</td>
                                            <td>04 May 2017</td>
                                            <td data-toggle="tooltip" data-placement="top" data-html="true" title="<b>Keneilwe Monekwe<b><br>Mobile: +267 76548921<br>Email: keneilwemonekwe@gmail.com" class="d-none d-md-table-cell">Ms Monekwe</td>
                                            <td data-toggle="tooltip" data-placement="top" data-html="true" title="<b>Heather Moila<b><br>Mobile: +267 74902321<br>Email: heather@powerdrive.co.bw" class="d-none d-md-table-cell">Powerdrive (PTY) LTD</td>      
                                            <td class="d-none d-md-table-cell">3 days</td>   
                                            <td class="d-none d-md-table-cell">High</td>   
                                            <td>
                                                <div class="badge badge-warning badge-fw">Unpaid</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex align-items-center justify-content-between flex-column flex-sm-row mt-4">
                                <p class="mb-3 mb-sm-0">Showing 1 to 5 of 20 entries</p>
                                <nav>
                                    <ul class="pagination pagination-info mb-0">
                                        <li class="page-item">
                                            <a class="page-link">
                                                <i class="mdi mdi-chevron-left"></i>
                                            </a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="bg-secondary border-dark page-link text-dark">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link">2</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link">4</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link">
                                                <i class="mdi mdi-chevron-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="d-flex float-right mt-4">
                                <button class="btn btn-primary btn-sm">View All
                                    <i class="icon-arrow-right-circle icons ml-1"></i>
                                </button>
                            </div>
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