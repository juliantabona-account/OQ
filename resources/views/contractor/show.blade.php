@extends('layouts.app') @section('style')
<style>
    .jobcard-container .card {
        border: 1px solid #dbe3e6;
    }

    .lower-font {
        font-size: 14px;
    }

    .reference-details span {
        padding-top: 3px;
        display: block;
    }
</style>
@endsection @section('content')

    <div class="row jobcard-container">
        <div class="col-lg-12 d-flex flex-column">
            <div class="row flex-grow">
            <div class="col-12 grid-margin stretch-card">
                    <div class="card card-hoverable">
                        <div class="card-body p-3 pt-4">
                            <div class="row border-bottom">
                                <div class="col-6">
                                    <div class="bg-primary p-2 text-white">
                                        <i class="float-left icon-user icon-sm icons ml-3 mr-2"></i>
                                        <h6 class="card-title mb-0 ml-2 text-white">Company Details</h6>
                                    </div>
                                    <div class="mt-3 ml-3 reference-details">
                                        <span class="lower-font">
                                            <b>Company Name: </b>DropHill (PTY) LTD</span>
                                        <span class="lower-font mb-0">
                                            <b>City/Town: </b>Gaborone</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-3 mt-3 ml-3 reference-details">
                                            <span class="lower-font">
                                            <b>Tel: </b>+267 3909210</span>
                                        <span class="lower-font">
                                            <b>Email: </b>stanley@moh.gov
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <p>
                                        <a href="/downloadables/company-profile.pdf" target="_blank" class="btn btn-primary float-right">
                                            <i class="icon-cloud-download icons"></i>
                                            Company Profile
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 grid-margin stretch-card">
                    <div class="card card-hoverable">
                        <div class="card-body p-3 pt-4">
                            <div class="row">
                                <div class="col-12 mb-2">
                                <i class="float-left icon-flag icon-sm icons ml-3"></i>
                                <h6 class="card-title float-left mb-0 ml-2">Jobs Assigned</h6>
                                </div>
                                <div class="col-12">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item text-behance">4 Total Jobs</li>
                                        <li class="breadcrumb-item text-black">3 Closed</li>
                                        <li class="breadcrumb-item text-black">1 Open</li>
                                        <li class="breadcrumb-item text-reddit">0 Pending</li>
                                    </ol>
                                    </nav>
                                </div>
                                <div class="col-12">
                                    <div class="table-responsive table-hover">
                                        <table class="table mt-3 border-top">
                                            <thead>
                                                <tr>
                                                    <th style="width: 30%">Job</th>
                                                    <th style="width: 15%">Due</th>
                                                    <th style="width: 15%">Status</th>
                                                    <th style="width: 15%">Assigned</th>
                                                    <th style="width: 15%">Quotation</th>
                                                    <th style="width: 15%">Jobcard</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class='clickable-row' data-href='/jobcards/1'>
                                                    <td>Installation of new aircons in offices.</td>
                                                    <td>3 days</td>
                                                    <td><div class="badge badge-success badge-fw">Open</div></td>
                                                    <td data-toggle="tooltip" data-placement="top" data-html="true" title="<b>Kgosi Mosimane<b><br>Mobile: +267 76548921<br>Email: kgosi@tagola.co.bw" class="d-none d-md-table-cell">Mr Mosimane</td>
                                                    <td></td>
                                                </tr>
                                                <tr class='clickable-row' data-href='/jobcards/1'>
                                                    <td>Repair of broken water pipe</td>
                                                    <td>------</td>
                                                    <td>closed</td>
                                                    <td data-toggle="tooltip" data-placement="top" data-html="true" title="<b>Bonolo Sesiane<b><br>Mobile: +267 76548921<br>Email: bonolosesiane@gmail.com" class="d-none d-md-table-cell">Ms Sesiane</td>
                                                    <td>
                                                        <a class="btn btn-primary p-1 pl-4 pr-4" href="/downloadables/quotation.pdf" target="_blank"><i class="icon-cloud-download icons"></i></a>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-primary p-1 pl-4 pr-4" href="/downloadables/jobcard-default.pdf" target="_blank"><i class="icon-cloud-download icons"></i></a>
                                                    </td>
                                                </tr>
                                                <tr class='clickable-row' data-href='/jobcards/1'>
                                                    <td>Repair & Maintenance of elevators</td>
                                                    <td>------</td>
                                                    <td>closed</td>
                                                    <td data-toggle="tooltip" data-placement="top" data-html="true" title="<b>Kgosi Mosimane<b><br>Mobile: +267 76548921<br>Email: kgosi@tagola.co.bw" class="d-none d-md-table-cell">Mr Mosimane</td>
                                                    <td>
                                                        <a class="btn btn-primary p-1 pl-4 pr-4" href="/downloadables/quotation.pdf" target="_blank"><i class="icon-cloud-download icons"></i></a>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-primary p-1 pl-4 pr-4" href="/downloadables/jobcard-default.pdf" target="_blank"><i class="icon-cloud-download icons"></i></a>
                                                    </td>
                                                </tr>
                                                <tr class='clickable-row' data-href='/jobcards/1'>
                                                    <td>Repair of basement generators</td>
                                                    <td>------</td>
                                                    <td>closed</td>
                                                    <td data-toggle="tooltip" data-placement="top" data-html="true" title="<b>Bonolo Sesiane<b><br>Mobile: +267 76548921<br>Email: bonolosesiane@gmail.com" class="d-none d-md-table-cell">Ms Sesiane</td>
                                                    <td>
                                                        <a class="btn btn-primary p-1 pl-4 pr-4" href="/downloadables/quotation.pdf" target="_blank"><i class="icon-cloud-download icons"></i></a>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-primary p-1 pl-4 pr-4" href="/downloadables/jobcard-default.pdf" target="_blank"><i class="icon-cloud-download icons"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection @section('js') @endsection