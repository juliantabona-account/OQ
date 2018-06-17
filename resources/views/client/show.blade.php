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
                <div class="col-12 col-md-8 col-lg-8 grid-margin stretch-card">
                    <div class="card card-hoverable">
                        <div class="card-body p-3 pt-4">
                            <div class="row">
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
                                                        <a class="btn btn-primary p-1 pl-4 pr-4" href="/downloadables/jobcard-default.pdf" target="_blank"><i class="icon-cloud-download icons"></i></a>
                                                    </td>
                                                </tr>
                                                <tr class='clickable-row' data-href='/jobcards/1'>
                                                    <td>Repair & Maintenance of elevators</td>
                                                    <td>------</td>
                                                    <td>closed</td>
                                                    <td data-toggle="tooltip" data-placement="top" data-html="true" title="<b>Kgosi Mosimane<b><br>Mobile: +267 76548921<br>Email: kgosi@tagola.co.bw" class="d-none d-md-table-cell">Mr Mosimane</td>
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
                <div class="col-12 col-md-4 col-lg-4 grid-margin stretch-card">
                    <div class="card card-hoverable">
                        <div class="card-body p-3 pt-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="bg-primary p-2 text-white">
                                        <i class="float-left icon-user icon-sm icons ml-3 mr-2"></i>
                                        <h6 class="card-title mb-0 ml-2 text-white">Client Details</h6>
                                    </div>
                                    <div class="mt-3 ml-3 reference-details">
                                        <span class="lower-font">
                                            <b>Client Name: </b>Ministry Of Health</span>
                                        <span class="lower-font mb-3">
                                            <b>City/Town: </b>Gaborone</span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="bg-primary p-2 text-white">
                                        <i class="float-left icon-user icon-sm icons ml-3 mr-2"></i>
                                        <h6 class="card-title mb-0 ml-2 text-white">Reference Details</h6>
                                    </div>
                                    <div class="mt-3 ml-3 reference-details">
                                        <span class="lower-font">
                                            <b>Full Name: </b>Stanley Busang</span>
                                        <span class="border-bottom lower-font mb-1 pb-1">
                                            <b>Position: </b>Matron</span>
                                        <span class="lower-font">
                                            <b>Tel: </b>+267 3909210</span>
                                        <span class="lower-font">
                                            <b>Email: </b>stanley@moh.gov
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- Modal starts -->
<div class="modal fade" id="exampleModal-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-1">You Are Rolling Back</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="">
                <div class="modal-body pt-3">
                    <p>Are you sure you want to move the jobcard backwards from state of
                        <b class="text-primary">Open</b> to
                        <b class="text-primary">UnAuthorised</b>? Please state your reason below.
                    </p>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon bg-primary border-primary" id="colored-addon2">
                                    <i class="icon-exclamation icons text-white"></i>
                                </span>
                                <input id="rollback-reason" type="text" maxlength="160" class="form-control" name="reason" required placeholder="Type your reason...">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        Continue
                        <i class="icon-arrow-right-circle icons ml-1"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Ends -->

<!-- Modal starts -->
<div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-2">About DropHill (PTY) LTD</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pt-3">
                <span class="lower-font mr-4">
                    <b>Tel: </b>+267 3902321</span>
                <span class="lower-font">
                    <b>Email: </b>enquiries@drophill.co.bw</span>
                <br/>
                <span class="lower-font">
                    <b>Website: </b>
                    <a href="#">www.drophill.co.bw</a>
                </span>
                <br/>
                <span class="lower-font">
                    <b>Job Price: </b>P4,560.00</span>
                <br/>
                <p class="mt-4">
                    <a href="/downloadables/quotation.pdf" target="_blank" class="btn btn-primary">
                        <i class="icon-cloud-download icons"></i>
                        Quotation
                    </a>

                    <a href="/downloadables/company-profile.pdf" target="_blank" class="btn btn-primary">
                        <i class="icon-cloud-download icons"></i>
                        Company Profile
                    </a>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">
                    View Company
                    <i class="icon-arrow-right-circle icons ml-1"></i>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Ends -->


<!-- content-wrapper ends -->

@endsection @section('js') @endsection