@extends('layouts.app') @section('style')
<style>

</style>
@endsection @section('content')

    <div class="row jobcard-container">
        <a href="/jobcards/1" class="btn btn-primary mt-3 ml-2 mb-2">
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
                                    <h3 class="card-title mb-3 mt-4">Viewers: 6</h3>
                                    <div class="table-responsive table-hover">
                                        <table class="table mt-3 border-top">
                                            <thead>
                                                <tr>
                                                    <th>Names</th>
                                                    <th><i class="mdi mdi-clock text-muted mr-1"></i> Last viewed</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="clickable-row" data-href="/jobcards/1/viewers/1">
                                                    <td>Tebogo Mosinyi</td>
                                                    <td>22 May 2017 @ 09:05AM</td>
                                                </tr>
                                                <tr class="clickable-row" data-href="/jobcards/1/viewers/1">
                                                    <td>Lesley Mosinyi</td>
                                                    <td>19 May 2017 @ 08:36AM</td>
                                                </tr>
                                                <tr class="clickable-row" data-href="/jobcards/1/viewers/1">
                                                    <td>Kgosi Mosimane</td>
                                                    <td>18 May 2017 @ 11:26AM</td>
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