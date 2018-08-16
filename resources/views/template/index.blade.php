@extends('layouts.app') 

@section('style')

<link rel="stylesheet" href="{{ asset('css/plugins/icheck/skins/all.css') }}">

@endsection 

@section('content')

    <div class="row mt-4">
        <div class="col-lg-12 d-flex flex-column">
            <div class="row flex-grow">
                <div class="col-12 col-md-12 col-lg-12 grid-margin stretch-card">
                    <div class="card card-hoverable">
                        <div class="card-body bg-inverse-info shadow">
                            <i class="float-left icon-loop icons icon-sm ml-3"></i>
                            @if( COUNT($jobcardForms) )
                                <h6 class="card-title float-left mb-0 ml-2">Process Forms</h6>
                                <div class="d-flex table-responsive">
                                    <div class="btn-group ml-auto mr-2 border-0">
                                        <input type="text" class="form-control" placeholder="Search Here">
                                        <button class="btn btn-sm btn-primary"><i class="icon-magnifier icons"></i> Search</button>
                                        <a href="{{ route('jobcard.processForm.create') }}" class="btn btn-primary ml-2">
                                            + Create Form
                                        </a>
                                    </div>
                                </div>
                                <div class="table-responsive table-hover">
                                    <table class="table mt-3 border-top">
                                        <thead>
                                            <tr>
                                                <td>Active</td>
                                                <th style="width: 20%">Name</th>
                                                <th style="width: 50%">Description</th>
                                                <th style="width: 30%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($jobcardForms as $jobcardForm)
                                                <tr class='clickable-row'>
                                                    <td>
                                                        <form method="POST" action="{{ route('jobcard-select-process-form', [$jobcardForm->id]) }}">
                                                            {{ method_field('PUT') }}
                                                            @csrf

                                                            @if(!empty($jobcardForm->selected) && $jobcardForm->selected == 1)
                                                                <input class="icheck" type="checkbox" name="selected_process_form" checked>
                                                            @else
                                                                <input class="icheck" type="checkbox" name="selected_process_form">
                                                            @endif

                                                        </form>
                                                    </td>
                                                    <td><span class="badge badge-primary rounded">{{ $jobcardForm->name ? $jobcardForm->name:'____' }}</span></td>
                                                    <td>{{ $jobcardForm->description ? $jobcardForm->description:'____' }}</td>
                                                    <td>
                                                        <form method="POST" action="#">
                                                            {{ method_field('DELETE') }}
                                                            @csrf
                                                            <a href="{{ route('jobcard.processForm.edit', [$jobcardForm->id]) }}" class="btn btn-primary btn-sm float-left mr-1">View</a>
                                                            <a href="{{ route('jobcard.processForm.edit', [$jobcardForm->id]) }}" class="btn btn-success btn-sm float-left mr-1">Edit</a>
                                                            <button type="submit" class="btn btn-danger btn-sm float-left">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex align-items-center justify-content-between flex-column flex-sm-row mt-4">
                                        <p class="mb-3 ml-3 mb-sm-0"><strong>{{ $jobcardForms->total() }}</strong>{{ $jobcardForms->total() == 1 ? ' result': '  results' }} found</p>
                                    <nav>
                                        {{ $jobcardForms->links() }}
                                    </nav>
                                </div>
                            @else
                                <h6 class="card-title float-left mb-0 ml-2">No Jobcards</h6>
                                <div class="col-4 offset-4">
                                    <div data-toggle="tooltip" data-placement="top" title="Create a new jobcard">
                                        <a href="/jobcards/create" class="btn btn-success p-5 w-100 animated-strips">                                            
                                            <i class="d-block icon-sm icon-flag icons" style="font-size: 25px;"></i>
                                            <span class="d-block mt-4">Create Process Form</span>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js') 

    <script src="{{ asset('js/plugins/icheck/icheck.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $('input.icheck').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square',
                increaseArea: '20%' // optional
              });

              $('input.icheck').on('ifToggled', function(event){
                $(this).closest('form').submit();
              });

        });
    </script>

@endsection