@extends('layouts.app') @section('style')
<style>
    .table-hover tr:hover {
        cursor: default !important;
    }


</style>
@endsection @section('content')

    <div class="row jobcard-container">
        <a href="/jobcards/1/viewers" class="btn btn-primary mt-3 ml-2 mb-2">
            <i class="icon-arrow-left icons"></i>
            Go Back
        </a>
        <div class="col-lg-12 d-flex flex-column">
            <div class="row flex-grow">
                <div class="col-12 col-md-12 col-lg-12 grid-margin stretch-card">
                    <div class="card card-hoverable">
                        <div class="card-body p-3 pt-4">
                            <div class="row">
                                <div class="col-12">
                                    <b>Job: </b><div class="badge badge-danger">Installation Of New Aircons In Offices</div>
                                    <h3 class="card-title mb-3 mt-4"><b>Viewer: </b><a href="/staff/1">Kgosi Mosimane</a> </h3>
                                    <div class="table-responsive table-hover">
                                        <table class="table mt-3 border-top">
                                            <thead>
                                                <tr>
                                                    <th>Time</th>
                                                    <th>Date</th>
                                                    <th><i class="mdi mdi-clock text-muted mr-1"></i></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>09:05AM</td>
                                                    <td>22 May 2017</td>
                                                    <td>3 days ago</td>
                                                </tr>
                                                <tr>
                                                    <td>11:15AM</td>
                                                    <td>19 May 2017</td>
                                                    <td>6 days ago</td>
                                                </tr>
                                                <tr>
                                                    <td>08:23AM</td>
                                                    <td>18 May 2017</td>
                                                    <td>7 days ago</td>
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

@endsection @section('js') 

@endsection