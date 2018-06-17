@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 d-flex flex-column">
            <div class="row flex-grow">

                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body pt-3 pl-3 pr-3 pb-2">
                            <div class="align-items-center d-flex float-left justify-content-between mr-3 mt-0">
                                <div class="d-inline-block">
                                    <div class="bg-primary px-md-4 rounded">
                                        <i class="d-inline-block icon-md icon-user pb-2 pt-3 text-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h6 class="card-title mb-0">Statistics</h6>
                                <div class="d-inline-block pt-3">
                                    <div class="d-lg-flex">
                                        <h4 class="mb-0">52 Clients</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-12 grid-margin stretch-card">
                    <div class="card card-hoverable">
                        <div class="card-body">
                            <h3 class="card-title mb-3 mt-4">Clients</h3>
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
                                            <th style="width: 15%">City/Town</th>
                                            <th style="width: 15%">Reference</th>
                                            <th style="width: 15%">Added On</th>
                                            <th style="width: 15%">Added By</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class='clickable-row' data-href='/clients/1'>
                                            <td data-toggle="tooltip" data-placement="top" title="Installation of new aircons in offices">Ministry Of Health</td>
                                            <td>Gaborone</td>
                                            <td data-toggle="tooltip" data-placement="top" data-html="true" title="<b>Katlo Sesiane<b><br>Mobile: +267 76548921<br>Email: bonolosesiane@gmail.com" class="d-none d-md-table-cell">Mr Sesiane</td>
                                            <td>21 May 2018</td>
                                            <td><a href="/staff/1">Kgosi Mosimane</a></td>
                                        </tr>
                                        <tr class='clickable-row' data-href='/clients/1'>
                                            <td data-toggle="tooltip" data-placement="top" title="Repair of broken water pipe">The Commissioner of Labour</td>
                                            <td>Francistown</td>
                                            <td data-toggle="tooltip" data-placement="top" data-html="true" title="<b>Sesebogo Mosinyi<b><br>Mobile: +267 76548921<br>Email: sesebogomosinyi@gmail.com" class="d-none d-md-table-cell">Mrs. Mosinyi</td>
                                            <td>15 Apr 2018</td>
                                            <td><a href="/staff/1">Tirelo Mosinyi</a></td>
                                        </tr>
                                        <tr class='clickable-row' data-href='/clients/1'>
                                            <td data-toggle="tooltip" data-placement="top" title="Repair & Maintenance of elevators">Gaborone City Council</td>
                                            <td>Lobatse</td>
                                            <td data-toggle="tooltip" data-placement="top" data-html="true" title="<b>Lebogang Kenosi<b><br>Mobile: +267 76548921<br>Email: lebogangkenosi@gmail.com" class="d-none d-md-table-cell">Mr. Kenosi</td>
                                            <td>09 Jun 2018</td>
                                            <td><a href="/staff/1">Keletso Montso</a></td>
                                        </tr>
                                        <tr class='clickable-row' data-href='/clients/1'>
                                            <td data-toggle="tooltip" data-placement="top" title="Repair of basement generators">Malete Land Board</td>
                                            <td>Gaborone</td>
                                            <td data-toggle="tooltip" data-placement="top" data-html="true" title="<b>Keneilwe Monekwe<b><br>Mobile: +267 76548921<br>Email: keneilwemonekwe@gmail.com" class="d-none d-md-table-cell">Ms Monekwe</td>     
                                            <td>12 Jan 2018</td>
                                            <td><a href="/staff/1">Mompati Kelebogile</a></td>
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