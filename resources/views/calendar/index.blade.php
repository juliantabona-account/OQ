@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/plugins/fullcalendar/dist/fullcalendar.min.css') }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card px-3">
                <div class="card-body">
                    <h4 class="card-title">Jobs Calendar</h4>
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

    <!-- Custom js for this page-->
    <script src="{{ asset('js/plugins/moment/moment.js') }}"></script>
    <script src="{{ asset('js/plugins/fullcalendar/dist/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('js/custom/calendar.js') }}"></script>
    <!-- End custom js for this page-->

@endsection