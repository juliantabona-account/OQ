@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-md-12 col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body p-3">
                                <h6 class="card-title mb-0">Overview</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                        <div class="card card-clickable" data-href='/jobcards'>
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-md-center">
                                    <i class="icon-lg icon-flag icons"></i>
                                    <div class="ml-3">
                                        <p class="mb-0">Open Jobs</p>
                                        <h6>48</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                        <div class="card card-clickable" data-href='/jobcards/pending'>
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-md-center">
                                    <i class="icon-lg icon-refresh icons"></i>
                                    <div class="ml-3">
                                        <p class="mb-0">Pending Jobs</p>
                                        <h6>19</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                        <div class="card card-clickable" data-href='/jobcards/unpaid'>
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-md-center">
                                    <i class="icon-wallet icons icon-lg"></i>
                                    <div class="ml-3">
                                        <p class="mb-0">Unpaid Jobs</p>
                                        <h6>22</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                        <div class="card card-clickable" data-href='/jobcards/overdue'>
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-md-center">
                                    <i class="icon-exclamation icons icon-lg"></i>
                                    <div class="ml-3">
                                        <p class="mb-0">Overdue Jobs</p>
                                        <h6>12</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                        <div class="card card-clickable">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-md-center">
                                    <i class="icon-emotsmile icons icon-lg"></i>
                                    <div class="ml-3">
                                        <p class="mb-0">Closed Jobs</p>
                                        <h6>36</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                        <div class="card card-clickable">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-md-center">
                                    <i class="icon-layers icons icon-lg"></i>
                                    <div class="ml-3">
                                        <p class="mb-0">Reopened Jobs</p>
                                        <h6>12</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                        <div class="card card-clickable" data-href='/clients'>
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-md-center">
                                    <i class="icon-lg icon-user-follow icons"></i>
                                    <div class="ml-3">
                                        <p class="mb-0">Clients</p>
                                        <h6>48</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                        <div class="card card-clickable" data-href='/contractors'>
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-md-center">
                                    <i class="icon-lg icon-briefcase icons"></i>
                                    <div class="ml-3">
                                        <p class="mb-0">Contractors</p>
                                        <h6>19</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 d-flex flex-column">
                <div class="row flex-grow">
                    <div class="col-12 col-md-4 col-lg-12 grid-margin stretch-card">
                        <div class="card card-hoverable">
                            <div class="card-body">
                                <h6 class="card-title">Recent Jobcards</h6>
                                <div class="table-responsive table-hover">
                                    <table class="table mt-3 border-top">
                                        <thead>
                                            <tr>
                                                <th>Customer</th>
                                                <th style="width: 18%">Start Date</th>
                                                <th style="width: 18%">End Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class='clickable-row' data-href='jobcards/1'>
                                                <td>Ministry Of Health</td>
                                                <td>22 May 2017</td>
                                                <td>28 May 2017</td>
                                                <td>
                                                    <div class="badge badge-success badge-fw">Open</div>
                                                </td>
                                            </tr>
                                            <tr class='clickable-row' data-href='jobcards/1'>
                                                <td>The Commissioner of Labour</td>
                                                <td>24 May 2017</td>
                                                <td>25 May 2017</td>
                                                <td>
                                                    <div class="badge badge-warning badge-fw">Pending</div>
                                                </td>
                                            </tr>
                                            <tr class='clickable-row' data-href='jobcards/1'>
                                                <td>Gaborone City Council</td>
                                                <td>26 May 2017</td>
                                                <td>30 May 2017</td>
                                                <td>
                                                    <div class="badge badge-default badge-fw">Closed</div>
                                                </td>
                                            </tr>
                                            <tr class='clickable-row' data-href='jobcards/1'>
                                                <td>Malete Land Board</td>
                                                <td>01 June 2017</td>
                                                <td>04 May 2017</td>

                                                <td>
                                                    <div class="badge badge-danger badge-fw">Overdue</div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex align-items-center justify-content-between flex-column flex-sm-row mt-4">
                                    <p class="mb-3 mb-sm-0">Showing 1 to 20 of 20 entries</p>
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
            <div class="col-md-6 col-lg-4 grid-margin stretch-card">
                <div class="card card-hoverable">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h6 class="card-title">Recent Activity</h6>
                        </div>
                        <p class="card-description">Activity by staff members</p>
                        <div class="list d-flex align-items-center border-bottom py-3">
                            <img class="img-sm rounded-circle" src="{{ asset('images/profile_placeholder.svg') }}" alt="">
                            <div class="wrapper w-100 ml-3">
                                <p class="mb-0">
                                    <a href="#">Kgomotso </a>posted a new jobcard for
                                    <a href="#">Gaborone City Council</a>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-clock text-muted mr-1"></i>
                                        <small class="text-muted ml-auto">14 May 2017 - 08:26AM</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list d-flex align-items-center border-bottom py-3">
                            <img class="img-sm rounded-circle" src="{{ asset('images/profile_placeholder.svg') }}" alt="">
                            <div class="wrapper w-100 ml-3">
                                <p class="mb-0">
                                    <a href="#">Tumisang </a>posted a new jobcard for
                                    <a href="#">Malete Land Board</a>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-clock text-muted mr-1"></i>
                                        <small class="text-muted ml-auto">15 May 2017 - 10:24AM</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list d-flex align-items-center border-bottom py-3">
                            <img class="img-sm rounded-circle" src="{{ asset('images/profile_placeholder.svg') }}" alt="">
                            <div class="wrapper w-100 ml-3">
                                <p class="mb-0">
                                    <a href="#">Tebogo </a>posted a new jobcard for
                                    <a href="#">Water Utilities Cooperation</a>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-clock text-muted mr-1"></i>
                                        <small class="text-muted ml-auto">17 May 2017 - 13:45PM</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="list d-flex align-items-center border-bottom py-3">
                            <img class="img-sm rounded-circle" src="{{ asset('images/profile_placeholder.svg') }}" alt="">
                            <div class="wrapper w-100 ml-3">
                                <p class="mb-0">
                                    <a href="#">Lesley </a>posted a new jobcard for
                                    <a href="#">Gaborone City Council</a>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="mdi mdi-clock text-muted mr-1"></i>
                                        <small class="text-muted ml-auto">19 May 2017 - 15:26PM</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4 grid-margin">
                <div class="card card-hoverable">
                    <div class="card-body">
                        <h6 class="card-title">Jobcard Status</h6>
                        <p class="card-description">Statistics of job created from all locations and their statuses.</p>
                        <canvas id="barChart" width="982" height="1000" style="display: block; width: 982px; height: 1000px;"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-4 grid-margin">
                <div class="card card-hoverable">
                    <div class="card-body">
                        <h6 class="card-title">Closed Jobs</h6>
                        <p class="card-description">Statistics of jobs closed by departments in their respective locations.</p>
                        <canvas id="barChart2" width="982" height="1000" style="display: block; width: 982px; height: 1000px;"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-4 grid-margin">
                <div class="card card-hoverable">
                    <div class="card-body">
                        <h6 class="card-title">Overdue Jobs</h6>
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
            $(".clickable-row").click(function () {
                window.location = $(this).data("href");
            });
        });
    </script>
    <!-- End custom js for this page-->

@endsection