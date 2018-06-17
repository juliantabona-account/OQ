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
                                    <div class="bg-primary px-md-4 rounded">
                                        <i class="d-inline-block icon-md icon-user pb-2 pt-3 text-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h6 class="card-title mb-0">Statistics</h6>
                                <div class="d-inline-block pt-3">
                                    <div class="d-lg-flex">
                                        <h4 class="mb-0">23 Members</h4>
                                        <span class="ml-2 mr-2">|</span>
                                        <span class="mb-0 text-black-50">15 Males</span>
                                        <span class="ml-2 mr-2">|</span>
                                        <span class="mb-0 text-black-50">8 Females</span>
                                        <div class="d-flex align-items-center ml-lg-2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-12 grid-margin stretch-card">
                    <div class="card card-hoverable">
                        <div class="card-body p-3 pt-4">
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
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Phone</th>
                                                    <th>Email</th>
                                                    <th>Location</th>
                                                    <th>Position</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class='clickable-row' data-href='/profiles/1'>
                                                    <td>Keitumetse </td>
                                                    <td>Mosinyi</td>
                                                    <td>+267 3902321</td>
                                                    <td>keitumetse@tagola.co.bw</td>
                                                    <td>Gaborone</td>
                                                    <td>Operations Manager</td>
                                                </tr>
                                                <tr class='clickable-row' data-href='/profiles/1'>
                                                    <td>Kgosi </td>
                                                    <td>Mosimane</td>
                                                    <td>+267 3989321</td>
                                                    <td>keitumetse@tagola.co.bw</td>
                                                    <td>Serowe</td>
                                                    <td>Sales personnel</td>
                                                </tr>
                                                <tr class='clickable-row' data-href='/profiles/1'>
                                                    <td>Junior </td>
                                                    <td>Molema</td>
                                                    <td>+267 3908672</td>
                                                    <td>junior@tagola.co.bw</td>
                                                    <td>Lobatse</td>
                                                    <td>Marketing Director</td>
                                                </tr>
                                                <tr class='clickable-row' data-href='/profiles/1'>
                                                    <td>Tebogo </td>
                                                    <td>Lesedi</td>
                                                    <td>+267 3901232</td>
                                                    <td>tebogo@tagola.co.bw</td>
                                                    <td>Gaborone</td>
                                                    <td>Administrator</td>
                                                </tr>
                                                <tr class='clickable-row' data-href='/profiles/1'>
                                                    <td>Kelebogile </td>
                                                    <td>Botshelo</td>
                                                    <td>+267 3975893</td>
                                                    <td>kelebogile@tagola.co.bw</td>
                                                    <td>Palapye</td>
                                                    <td>Operations Manager</td>
                                                </tr>
                                                <tr class='clickable-row' data-href='/profiles/1'>
                                                    <td>Dikeledi </td>
                                                    <td>Mosweu</td>
                                                    <td>+267 3978432</td>
                                                    <td>dikeledi@tagola.co.bw</td>
                                                    <td>Lobatse</td>
                                                    <td>Sales personnel</td>
                                                </tr>
                                                <tr class='clickable-row' data-href='/profiles/1'>
                                                    <td>Gorata </td>
                                                    <td>Segomotso</td>
                                                    <td>+267 3908672</td>
                                                    <td>junior@tagola.co.bw</td>
                                                    <td>Serowe</td>
                                                    <td>Marketing Director</td>
                                                </tr>
                                                <tr class='clickable-row' data-href='/profiles/1'>
                                                    <td>Masego</td>
                                                    <td>Obone</td>
                                                    <td>+267 3901232</td>
                                                    <td>tebogo@tagola.co.bw</td>
                                                    <td>Gaborone</td>
                                                    <td>Administrator</td>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection @section('js') 

@endsection