@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/plugins/fullcalendar/dist/fullcalendar.min.css') }}">

    <style>
        .fc-time{
            display : none;
            }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card px-3">
                <div class="card-body pt-3">
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
    <script>
        (function($) {
            $(function() {
                $(document).ready(function(){
                    $('#calendar').fullCalendar({
                        height: 590,
                        header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'month,basicWeek,basicDay'
                        },
                        //defaultDate: '2018-07-01',
                        navLinks: true, // can click day/week names to navigate views
                        editable: false,
                        //eventLimit: true, // allow "more" link when too many events
                        eventRender: function(eventObj, $el) {
                            $el.popover({
                                title: eventObj.title,
                                content: eventObj.description,
                                trigger: 'hover',
                                placement: 'top',
                                container: 'body'
                            });
                        },
                        events: [
                            @foreach($jobcards as $key => $jobcard)
                                {{ $key != 0 ? ', ':'' }}
                                {
                                    title: '{{ $jobcard->title }}',
                                    description: '{{ $jobcard->description }}',
                                    url: '{{ '/jobcards/'.$jobcard->id }}',
                                    start: '{{ $jobcard->start_date }}',
                                    end: '{{ Carbon\Carbon::parse($jobcard->end_date)->addDays(1) }}'
                                }
                            @endforeach
                        ]
                    })
                });
            });
        })(jQuery);            
    </script>
    <!-- End custom js for this page-->

@endsection