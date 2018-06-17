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
    <div class="row">
        <div class="col-lg-12 d-flex flex-column">
            <div class="row flex-grow">
                <div class="col-12 col-md-8 col-lg-8 grid-margin stretch-card">
                    <div class="card card-hoverable">
                        <div class="card-body p-3 pt-4">
                            <div class="row">
                                <div class="col-12">
                                    <nav aria-label="breadcrumb" role="navigation">
                                        <ol class="breadcrumb breadcrumb-custom">
                                            <li class="breadcrumb-item" data-toggle="modal" data-target="#exampleModal-1">
                                                <span>UnAuthorized</span>
                                            </li>
                                            <li class="breadcrumb-item active">
                                                <span>Open</span>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <span>Deposit Paid</span>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <span>Job Started</span>
                                            </li>
                                            <li class="breadcrumb-item" aria-current="page">
                                                <span>Closed</span>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                                <div class="col-12">
                                    <h3 class="card-title mb-3 mt-4 border-bottom pb-3">Installation of new aircons in offices</h3>
                                    <b>Description: </b>
                                    <p class="mt-2">Installation of new split air conditioners at Peleng East Clinic</p>
                                    <span class="lower-font mr-4">
                                        <b>Start Date: </b>22 May 2017</span>
                                    <span class="lower-font">
                                        <b>End Date: </b>25 May 2017</span>
                                    <br/>
                                    <span class="lower-font mr-4">
                                        <b>Catergory: </b>Air-conditioning work (Mechanical)</span>
                                    <br/>
                                    <span class="lower-font">
                                        <b>Cost Center: </b>Facility Maintenance & Repairs</span>
                                    <br/>                                    <span class="lower-font">
                                        <b>Assigned: </b><a href="/staff/1">Kgosi Mosimane</a></span>
                                    <br/>
                                    <span class="lower-font mt-3 d-block">
                                        <b>Priority: </b>
                                        <div class="badge badge-danger">High</div>
                                    </span>
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
                                            <b>Email: </b>Facility Maintenance Repairs
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-12 grid-margin stretch-card">
                    <div class="card card-hoverable">
                        <div class="card-body">
                            <div class="form-group mt-0">
                                <button type="submit" class="btn btn-primary mr-2 float-right">
                                    <i class="icon-cloud-download icons"></i>
                                    Download Jobcard
                                </button>
                                <button type="submit" class="btn btn-primary mr-2 float-right">
                                    Send Jobcard
                                    <i class="icon-paper-plane icons"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-12 grid-margin stretch-card">
                    <div class="card card-hoverable">
                        <div class="card-body p-3 pt-4">
                            <div class="row">
                                <div class="col-12">
                                    <h3 class="card-title mb-3 mt-4">Contractors</h3>
                                    <div class="table-responsive table-hover">
                                        <table class="table mt-3 border-top">
                                            <thead>
                                                <tr>
                                                    <th>Company Name</th>
                                                    <th style="min-width: 18%">Tel</th>
                                                    <th style="min-width: 18%">Email</th>
                                                    <th>Submitted On</th>
                                                    <th class="d-sm-none d-md-table-cell">Price</th>
                                                    <th class="d-sm-none d-md-table-cell">Compare</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class='clickable-row' data-toggle="modal" data-target="#exampleModal-2">
                                                    <td>DropHill (PTY) LTD</td>
                                                    <td>+267 3902321</td>
                                                    <td>enquiries@drophill.co.bw</td>
                                                    <td>22 May 2017</td>
                                                    <td>P3,820.00</td>
                                                    <td>
                                                        <div class="badge badge-danger">Highest</div>
                                                    </td>
                                                </tr>
                                                <tr class='clickable-row' data-toggle="modal" data-target="#exampleModal-2">
                                                    <td>Electrohive (PTY) LTD</td>
                                                    <td>+267 39092189</td>
                                                    <td>enquiries@electrohive.co.bw</td>
                                                    <td>21 May 2017</td>
                                                    <td>P4,560.00</td>
                                                    <td>...</td>
                                                </tr>
                                                <tr class='clickable-row' data-toggle="modal" data-target="#exampleModal-2">
                                                    <td>Powerdrive (PTY) LTD</td>
                                                    <td>+267 39098954</td>
                                                    <td>enquiries@powerdrive.co.bw</td>
                                                    <td>20 May 2017</td>
                                                    <td>P3,440.00</td>
                                                    <td>
                                                        <div class="badge badge-success">Lowest</div>
                                                    </td>
                                                </tr>
                                                <tr class='clickable-row' data-toggle="modal" data-target="#exampleModal-2">
                                                    <td>Easymoves (PTY) LTD</td>
                                                    <td>+267 3923784</td>
                                                    <td>enquiries@easymoves.co.bw</td>
                                                    <td>22 May 2017</td>
                                                    <td>P3,950.00</td>
                                                    <td>...</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-12 grid-margin stretch-card">
                    <div class="card card-hoverable">
                        <div class="card-body">
                            <h4 class="card-title text-center">Jobcard Timeline</h4>
                            <div>
                                <p class="mt-3 p-2 text-center">Today</p>
                                <div class="timeline">
                                    <div class="timeline-wrapper timeline-inverted timeline-wrapper-primary">
                                        <div class="timeline-badge"></div>
                                        <div class="timeline-panel">
                                            <div class="timeline-body">
                                                <p>Status update from
                                                    <b>Job Started</b> to
                                                    <b>Closed</b> by
                                                    <a href="#">Tebogo Mosinyi</a>
                                                </p>
                                            </div>
                                            <div class="timeline-footer d-flex align-items-center">
                                                <span class="ml-auto font-weight-bold mt-2">
                                                    <i class="icon-clock icons"></i> 21 Jun 2017 09:28AM</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timeline-wrapper timeline-wrapper-primary">
                                        <div class="timeline-badge"></div>
                                        <div class="timeline-panel">
                                            <div class="timeline-body">
                                                <p>Status update from
                                                    <b>Deposit Paid</b> to
                                                    <b>Job Started</b> by
                                                    <a href="#">Tebogo Mosinyi</a>
                                                </p>
                                            </div>
                                            <div class="timeline-footer d-flex align-items-center">
                                                <span class="ml-auto font-weight-bold mt-2">
                                                    <i class="icon-clock icons"></i> 20 Jun 2017 12:55PM</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timeline-wrapper timeline-inverted timeline-wrapper-primary">
                                        <div class="timeline-badge"></div>
                                        <div class="timeline-panel">
                                            <div class="timeline-body">
                                                <p>Status update from
                                                    <b>Open</b> to
                                                    <b>Deposit Paid</b> by
                                                    <a href="#">Tebogo Mosinyi</a>
                                                </p>
                                            </div>
                                            <div class="timeline-footer d-flex align-items-center">
                                                <span class="ml-auto font-weight-bold mt-2">
                                                    <i class="icon-clock icons"></i> 19 Jun 2017 08:12AM</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timeline-wrapper timeline-wrapper-primary">
                                        <div class="timeline-badge"></div>
                                        <div class="timeline-panel">
                                            <div class="timeline-body">
                                                <p>
                                                    <b>Authorised</b> by
                                                    <a href="#">Poloko Maphalala</a>
                                                </p>
                                            </div>
                                            <div class="timeline-footer d-flex align-items-center">
                                                <span class="ml-auto font-weight-bold mt-2">
                                                    <i class="icon-clock icons"></i> 18 Jun 2017 13:45PM</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timeline-wrapper timeline-inverted timeline-wrapper-primary">
                                        <div class="timeline-badge"></div>
                                        <div class="timeline-panel">
                                            <div class="timeline-body">
                                                <p>
                                                    <b>Edited</b> by
                                                    <a href="#">Lesley Mosinyi</a>
                                                </p>
                                            </div>
                                            <div class="timeline-footer d-flex align-items-center">
                                                <span class="ml-auto font-weight-bold mt-2">
                                                    <i class="icon-clock icons"></i> 17 Jun 2017 11:22AM</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timeline-wrapper timeline-wrapper-primary">
                                        <div class="timeline-badge"></div>
                                        <div class="timeline-panel">
                                            <div class="timeline-body">
                                                <p>
                                                    <b>Created</b> by
                                                    <a href="#">Kgosi Mosimane</a>
                                                </p>
                                            </div>
                                            <div class="timeline-footer d-flex align-items-center">
                                                <span class="ml-auto font-weight-bold mt-2">
                                                    <i class="icon-clock icons"></i> 15 Jun 2017 09:05AM</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 p-2 text-center">Start</p>
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