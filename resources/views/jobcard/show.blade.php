@extends('layouts.app') 

@section('style')

<link rel="stylesheet" href="{{ asset('css/plugins/lightgallery/dist/css/lightgallery.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/plugins/dropify/dist/css/dropify.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">

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

    .client-logo{
        width: auto !important;
        max-width: 80px;
        height: 80px !important;
    }

    .modal-content-max-height {
        overflow-y: auto;
        overflow-x: hidden;
        max-height: 320px;
        padding: 20px 15px;
    }

    .animated-strips,
    .animated-strips:hover {
        background-size: 30px 30px;
        background-image: -webkit-linear-gradient(135deg,#f6f6f630 25%,transparent 25%,transparent 50%,#f6f6f630 50%,#f6f6f630 75%,transparent 75%,transparent);
        background-image: linear-gradient(-45deg,#f6f6f630 25%,transparent 25%,transparent 50%,#f6f6f630 50%,#f6f6f630 75%,transparent 75%,transparent);
        -webkit-animation: stripes 2s linear infinite;
        animation: stripes 2s linear infinite;
    }

</style>

@endsection 

@section('content')
    <div class="row jobcard-container">
        <a href="/jobcards" class="btn btn-primary mt-3 ml-2 mb-2">
            <i class="icon-arrow-left icons"></i>
            Go Back
        </a>
        <a href="/jobcards/1/viewers" class="btn btn-inverse-light mt-3 ml-2 mb-2">
            <i class="icon-eye icons"></i>
            4 viewers
        </a>

        <div class="col-lg-12 d-flex flex-column">
            <div class="row flex-grow">
                <div class="col-12 col-md-8 col-lg-8 grid-margin stretch-card">
                    <div class="card card-hoverable">
                        <div class="card-body p-3 pt-4">
                            <div class="row">
                                <div class="col-12">
                                    @if($deadline > 0)
                                        <div class="badge badge-warning">{{ $deadline == 1 ? $deadline.' day': $deadline.' days' }} until deadline</div>
                                    @else
                                    <div class="badge badge-danger">Deadline passed</div>
                                    @endif
                                    <nav aria-label="breadcrumb" role="navigation">
                                        <ol class="breadcrumb breadcrumb-custom pt-2">
                                            @if($jobcard->processInstructions)
                                                @foreach($jobcard->processInstructions->first()->process_form as $instruction)
                                                    <li data-toggle="tooltip" data-placement="top" title="{{ $instruction['description'] }}"
                                                        class="breadcrumb-item progress-status-tabs{{ ($instruction['active'] || $instruction['updated']) ? ' active': '' }}" 
                                                        data-toggle="modal" data-target="#exampleModal-{{ $instruction['id'] }}">
                                                        <span>
                                                                {{ $instruction['name'] }}
                                                                @if($instruction['updated'])
                                                                    <i class="icon-check icons"></i>
                                                                @endif
                                                        </span>
                                                        <input type="hidden" class="process_step_id" value="{{ $instruction['id'] }}">
                                                        <input type="hidden" class="plugin" value="{{ json_encode( $instruction['plugin'] ) }}">
                                                    </li>
                                                @endforeach
                                                <input type="hidden" id="processInstructions" value="{{ json_encode( $jobcard->processInstructions ) }}">
                                            @endif
                                        </ol>
                                        <div class="progress" data-toggle="tooltip" data-placement="top" title="{{ $jobcardProgressPercentage }}% completed">
                                            <div class="progress-bar" role="progressbar" style="width: {{ $jobcardProgressPercentage }}%" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </nav>
                                </div>
                                <div class="col-12">
                                    <h3 class="card-title mb-3 mt-4 border-bottom pb-3">{{ $jobcard->title }}</h3>
                                    <b>Description: </b>
                                    <p class="mt-2">{{ $jobcard->description }}</p>
                                    <span class="lower-font mr-4">
                                        <b>Start Date: </b>{{ $jobcard->start_date ? Carbon\Carbon::parse($jobcard->start_date)->format('d M Y'):'____' }}</span>
                                    <span class="lower-font">
                                        <b>End Date: </b>{{ $jobcard->end_date ? Carbon\Carbon::parse($jobcard->end_date)->format('d M Y'):'____' }}</span>
                                    <br/>
                                    <span data-toggle="tooltip" data-placement="top" title="{{ $jobcard->category->description }}"
                                          class="lower-font mr-4">
                                          <b>Catergory: </b>{{ $jobcard->category ? $jobcard->category->name:'____' }}</span>
                                    <br/>
                                    <span class="lower-font" data-toggle="tooltip" data-placement="top" title="{{ $jobcard->costCenter ? $jobcard->costCenter->description:'' }}">
                                        <b>Cost Center: </b>{{ $jobcard->costCenter ? $jobcard->costCenter->name:'____' }}
                                    </span>
                                    <br/>
                                    <div class="row">
                                        <div class="col-6">
                                            <span class="lower-font">
                                                <b>Created By: </b>
                                                @if($jobcard->createdBy)
                                                    <a href="/staff/1">{{ $jobcard->createdBy->first_name.' '.$jobcard->createdBy->last_name }}</a> 
                                                    <a href="/jobcards/1/views/1"> 
                                                        - viewed({{ 
                                                                $jobcard->views()
                                                                        ->where('viewed_by', $jobcard->createdBy->id)
                                                                        ->get()->count() 
                                                                }})
                                                    </a>
                                                @else
                                                    ____
                                                @endif
                                            </span>
                                        </div>
                                        <div class="col-6">
                                            <span class="lower-font">
                                                <b>Assigned: </b><a href="/staff/1">Kgosi Mosimane</a> <a href="/jobcards/1/views/1"> - viewed(3)</a>
                                            </span>
                                        </div>
                                    </div>
                                    <span class="lower-font mt-3 d-block">
                                        <b>Priority: </b>
                                        <div  data-toggle="tooltip" data-placement="top" title="{{ $jobcard->priority ? $jobcard->priority->description:'' }}"
                                            class="badge badge-success" style="{{ $jobcard->priority ? 'background:'.$jobcard->priority->color_code.';' : '' }}">{{ $jobcard->priority ? $jobcard->priority->name:'____' }}</div>
                                    </span>
                                    <div>
                                        @if($jobcard->img_url)
                                        <div class="lightgallery mt-3">
                                            <a href="{{ $jobcard->img_url }}">
                                                <img class = "w-50" src="{{ $jobcard->img_url }}" />
                                            </a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mt-0">
                                        <a class="btn btn-primary mr-2 float-right" href="/downloadables/jobcard-default.pdf" target="_blank" class="btn btn-primary">
                                            <i class="icon-cloud-download icons"></i>
                                            Download Jobcard
                                        </a>
                                        <a href="#" class="btn btn-primary mr-2 float-right" data-toggle="modal" data-target="#exampleModal-3">
                                            Send Jobcard
                                            <i class="icon-paper-plane icons"></i>
                                        </a>
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
                                @if($jobcard->client)
                                    <div class="col-12">
                                        <div class="bg-primary p-2 text-white">
                                            <i class="float-left icon-emotsmile icon-sm icons ml-3 mr-2"></i>
                                            <h6 class="card-title mb-0 ml-2 text-white">Client Details</h6>
                                        </div>
                                        <div class="mt-3 ml-3 reference-details">
                                            @if($jobcard->client->logo_url)
                                                <div class="lightgallery">
                                                    <a href="{{ $jobcard->client->logo_url }}">
                                                        <img class="client-logo img-thumbnail mb-2 p-2 rounded rounded-circle w-50" src="{{ $jobcard->client->logo_url }}" />
                                                    </a>
                                                </div>
                                            @endif
                                            <span class="lower-font">
                                                <b>Client Name: </b>{{ $jobcard->client->name ? $jobcard->client->name:'____' }}</span>
                                            <span class="lower-font mb-3">
                                                <b>City/Town: </b>{{ $jobcard->client->city ? $jobcard->client->city:'____' }}</span>
                                                <span class="lower-font">
                                                <b>Phone: </b>
                                                    {{ $jobcard->client->phone_ext ? '+'.$jobcard->client->phone_ext.'-':'___-' }}
                                                    {{ $jobcard->client->phone_num ? $jobcard->client->phone_num:'____' }}
                                                </span>
                                                <span class="lower-font mb-3">
                                                <b>Email: </b>{{ $jobcard->client->city ? $jobcard->client->email:'____' }}</span>
                                        </div>
                                    </div>

                                    @if(COUNT($jobcard->client->contacts))
                                        <div class="col-12 mb-2">
                                            <div class="bg-primary p-2 text-white">
                                                <i class="float-left icon-user icon-sm icons ml-3 mr-2"></i>
                                                <h6 class="card-title mb-0 ml-2 text-white">Reference Details ({{ COUNT($jobcard->client->contacts) }})</h6>
                                            </div>
                                            @foreach($jobcard->client->contacts as $contact)
                                                <div class="mt-3 ml-3 reference-details">
                                                    <span class="lower-font">
                                                        <b>Full Name: </b>{{ $contact->first_name ? $contact->first_name:'____' }} {{ $contact->last_name ? $contact->last_name:'____' }}</span>
                                                    <span class="border-bottom lower-font mb-1 pb-1">
                                                        <b>Position: </b>Matron</span>
                                                    <span class="lower-font">
                                                        <b>Tel: </b>
                                                        {{ $contact->mobile_ext ? '+'.$contact->mobile_ext.'-':'___-' }}
                                                        {{ $contact->mobile_num ? $contact->mobile_num:'____' }}
                                                    </span>
                                                    <span class="lower-font">
                                                        <b>Email: </b>{{ $contact->email ? $contact->email:'____' }}
                                                    </span>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="col-12">
                                        <div data-toggle="tooltip" data-placement="top" title="Add another contact/reference working at this company or organisation" >
                                            <button type="button" class="btn btn-success pt-3 pb-3 w-100 animated-strips" data-toggle="modal" data-target="#add-reference-modal">                                            
                                                <i class="d-block icon-sm icon-user icons"></i>
                                                <span class="d-block mt-3">Add Reference</span>
                                            </button>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-12">
                                        <div data-toggle="tooltip" data-placement="top" title="Add a company or organisation corresponding to this jobcard">
                                            <button type="button" class="btn btn-success p-5 w-100 animated-strips" data-toggle="modal" data-target="#add-client-modal">                                            
                                                <i class="d-block icon-sm icon-emotsmile icons" style="font-size: 25px;"></i>
                                                <span class="d-block mt-4">Add Client</span>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-12 grid-margin stretch-card">
                    <div class="card card-hoverable">
                        <div class="card-body p-3 pt-4">
                            <div class="row">
                                @if($jobcard->select_contractor_id)
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
                                                        <td>P4,560.00</td>
                                                        <td>
                                                            <div class="badge badge-danger">Highest</div>
                                                        </td>
                                                    </tr>
                                                    <tr class='clickable-row' data-toggle="modal" data-target="#exampleModal-2">
                                                        <td>Electrohive (PTY) LTD</td>
                                                        <td>+267 3909218</td>
                                                        <td>enquiries@electrohive.co.bw</td>
                                                        <td>21 May 2017</td>
                                                        <td>P3,820.00</td>
                                                        <td>...</td>
                                                    </tr>
                                                    <tr class='clickable-row' data-toggle="modal" data-target="#exampleModal-2">
                                                        <td>Powerdrive (PTY) LTD</td>
                                                        <td>+267 3909895</td>
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
                                @else
                                    <div class="col-4 offset-4">
                                            <div data-toggle="tooltip" data-placement="top" title="Add a contractor aligned with this job. You can add more than one">
                                                <button type="button" class="btn btn-success p-5 w-100 animated-strips" data-toggle="modal" data-target="#add-contractor-modal">                                         
                                                    <i class="d-block icon-briefcase icon-md icons" style="font-size: 25px;"></i>
                                                    <span class="d-block mt-4">Add Contractor</span>
                                                </button>
                                            </div>
                                    </div>
                                @endif
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

    @include('jobcard.modals.update_process_status')
    @include('jobcard.modals.add_client')

@endsection @section('js') 

    <script src="{{ asset('js/plugins/dropify/dist/js/dropify.min.js') }}"></script>
    <script src="{{ asset('js/custom/dropify.js') }}"></script>
    <script src="{{ asset('js/plugins/lightgallery/dist/js/lightgallery-all.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".lightgallery").lightGallery({
                'share':false,
                'download':false,
                'actualSize':false
            }); 

            $("body").on("click",".breadcrumb-item", buildProgressModal);
            $("body").on("click","#progress-status-btn", submitProgressModal); 

            function buildProgressModal(){
                //Get all the progress tabs
                var progress_tabs = $('.progress-status-tabs');
                //Remember the current tab
                var curr = $(this);
                
                //Foreach of the progress status tabs
                $(progress_tabs).each(function( index, tab ) {
                    //Get the current position of the clicked tab
                    var current_index = $(curr).parent().children().index(curr);
                    //If we have reached the position of the active class
                    if( $(tab).hasClass('active') ){
                        //Check if we are moving forward or backward of the active tab
                        if( current_index - index > 0 ){
                            //Get the plugin data
                            var process_step_id = $(curr).find('.process_step_id').val();
                            var plugin = $(curr).find('.plugin');
                            //If it exists lets build it
                            if( $(plugin).length ){
                                //Get the build content
                                console.log('building...'); 
                                var pluginData = $(plugin).val();
                                var build = JSON.parse( pluginData );
                                
                                //If the build contents are available
                                if(build != '' && build != undefined){
                                    //Prepare data fields to store
                                    var data = '';
                                    
                                    $.each(build, function(index, tab) {
                                        //  Build for alerts
                                        if(tab.tag == "alert"){
                                            data +=  '<div class="'+(tab.full_width ? 'col-12': 'col-6' )+'">'+
                                                        '<div id="'+tab.id+'" class="alert alert-'+tab.type+'" role="alert">'+
                                                            '<i class="'+tab.icon+' icons mr-1" style="font-size: 12px;"></i>'+
                                                            '<span style="font-size: 12px;">'+tab.message+'</span>'+
                                                        '</div>'+
                                                    '</div>';
                                        
                                        //  Build for text inputs                                                    
                                        }else if(tab.tag == "input"){
                                            data +=  '<div class="'+(tab.full_width ? 'col-12': 'col-6' )+'">'+
                                                        '<div class="form-group">'+
                                                            '<label for="'+tab.id+'">'+tab.label+'</label>'+
                                                            '<input id="'+tab.id+'" type="text"'+
                                                                'placeholder="'+tab.placeholder+'"'+
                                                                'value="'+tab.update.response+'" class="form-control fillable'+(tab.optional ? ' optional-field': '' )+'">'+
                                                        '</div>'+
                                                    '</div>';

                                        //  Build for select inputs                                        
                                        }else if(tab.tag == "select"){
                                            var options = '';

                                            $.each(tab.options, function(index, option) {
                                                options += '<option value="'+option.id+'" '+( option.id == tab.update.response ? ' selected':'' )+'>'+option.label+'</option>';
                                            });

                                            data +=  '<div class="'+(tab.full_width ? 'col-12': 'col-6' )+'">'+
                                                        '<div class="form-group">'+
                                                            '<label for="'+tab.id+'">'+tab.label+'</label>'+
                                                            '<select id="'+tab.id+'" class="form-control fillable'+(tab.optional ? ' optional-field': '' )+'">'+    
                                                                options+
                                                            '</select>'+
                                                        '</div>'+
                                                    '</div>';

                                        //  Build for textareas
                                        }else if(tab.tag == "textarea"){    
                                            data +=  '<div class="'+(tab.full_width ? 'col-12': 'col-6' )+'">'+
                                                        '<div class="form-group">'+
                                                            '<label for="'+tab.id+'">'+tab.label+'</label>'+
                                                            '<textarea id="'+tab.id+'" placeholder="'+tab.placeholder+'"'+
                                                                       'class="form-control fillable'+(tab.optional ? ' optional-field': '' )+'">'+
                                                                        tab.update.response+
                                                            '</textarea>'+
                                                        '</div>'+
                                                    '</div>';

                                        //  Build for date pickers                                        
                                        }else if(tab.tag == "date"){
                                            data +=  '<div class="'+(tab.full_width ? 'col-12': 'col-6' )+'">'+
                                                        '<p class="m-0 mb-0">'+tab.label+'</p>'+    
                                                        '<div class="input-group date datepicker p-0 mb-3">'+
                                                            '<input id="'+tab.id+'" type="text"'+
                                                                'placeholder="'+tab.placeholder+'"'+
                                                                'value="'+tab.update.response+'"'+
                                                                'class="date-picker form-control form-control-sm fillable'+(tab.optional ? ' optional-field': '' )+'"'+
                                                                'autocomplete="off" />'+
                                                            '<div class="input-group-addon">'+
                                                                '<span class="mdi mdi-calendar"></span>'+
                                                            '</div>'+
                                                        '</div>'+
                                                    '</div>';

                                        //  Build for file attachments
                                        }else if(tab.tag == "attach"){
                                            data +=  '<div class="'+(tab.full_width ? 'col-12': 'col-6' )+'">'+
                                                        '<div class="form-group">'+
                                                            '<label for="'+tab.id+'">'+tab.label+'</label>'+
                                                            '<input id="'+tab.id+'" type="file" data-height="75"'+
                                                                'data-default-file="'+tab.update.response+'"'+
                                                                'class="dropify form-control'+(tab.optional ? 'optional-field': '' )+'"'+
                                                                'name="upload_'+tab.id+'">'+
                                                        '</div>'+
                                                    '</div>';
                                        }

                                    });

                                    //  Attach data fields to modal
                                    //  Also attach the position of the currently clicked step
                                    $('#progress-status-modal .modal-body')
                                        .html( data )
                                        .append('<input type="hidden" id="plugin_step" name="plugin_step" value="'+current_index+'">');

                                    //  Record the instruction step id [This is the unique ID for each plugin build]
                                    $('#progress-status-modal .modal-body')
                                        .append('<input type="hidden" id="process_step_id" name="process_step_id" value="'+process_step_id+'">');
                                        
                                    //Show modal with data fields
                                    $('#progress-status-modal').modal('show');
                                    
                                    //Initialize data field file dropbox
                                    $('.dropify').dropify();
                                    
                                    //Initialize data field date picker
                                    $('.date-picker').datepicker({
                                        format: "yyyy-mm-dd",
                                        enableOnReadonly: true,
                                        todayHighlight: true
                                    });

                                }
                                
                            }

                            console.log('Moving forward');

                            

                        }else if( current_index - index < 0 ){

                            console.log('Are you sure you want to rollback? State your reason');
                        }

                    }
                    
                });

            }

            function submitProgressModal(){
                //Get the instructions of the whole complete process
                var processInstructions = $('#processInstructions').val();
                var pluginPosition = $('#plugin_step').val();
                //Get the current build
                var selectedTab = $('.progress-status-tabs')[pluginPosition];
                var build = JSON.parse( $(selectedTab).find('.plugin').val() );
                var upload, value = [], responses = [], errors = 0, errorHeading;
                
                //Get all the fillable data input fields
                var dataFields = $('#progress-status-modal').find('.fillable');

                $('#progress-status-modal').find('.invalid-feedback').remove();
                $('#progress-status-modal').find('.modal-form-error').remove();

                //  If we have fillables then lets extract data
                if( build.length ){
                    //Foreach component in the build
                    $(build).each(function( index, component ) {
                        //  Confirm if its a fillable component [Means the user can add data to it]
                        if( component.fillable ){
                            //  Find the related component using the unique id assigned
                            var fillable = $('#'+component.id);
                            
                            //  If the fillable component is not empty
                            //  Or is empty but optional
                            //  Or is empty but already has older data [in the case of dropify files]      
                            if(     $(fillable).val() != '' 
                                || ($(fillable).val() == '' && $(fillable).hasClass('optional-field') )
                                || ($(fillable).val() == '' && $(fillable).attr('data-default-file') ) != ''
                            ){
                                console.log('Stage 3');
                                //  If the component is an text input, textarea or select input
                                if( $(fillable).is( "input" ) || $(fillable).is( "textarea" ) || $(fillable).is( "select" ) ){
                                    //  Update done status to true [Means it has been updated]
                                    build[index].update.done = true;
                                    
                                    //  If the component is a dropify/attachment fillable, and is empty [No new file attached]
                                    if( $(fillable).hasClass('dropify') && $(fillable).val() == '' ){
                                        //  Then update dropify component with the current file
                                        build[index].update.response = $(fillable).attr('data-default-file');
                                    }else{
                                        //  Then update dropify component with the new uploaded file
                                        //  Also update input/textarea/select values aswell 
                                        build[index].update.response = $(fillable).val();
                                    }
                                }
                            }else{
                                console.log(fillable);
                                //  Increment the error count value
                                errors++;
                                
                                //  Update the modal header with the error count
                                modalHeading = $(fillable).closest('.modal-content').find('.modal-header');
                                modalErrorHeading = $(modalHeading).find('.modal-form-error')
                                $(modalErrorHeading).remove();

                                $('<span class="modal-form-error">'+
                                        '<span class="badge badge-danger text-white ml-2">'+(errors == 1 ? errors+' error found': errors+' errors found' )+'</span>'+
                                  '</span>').insertAfter( $(modalHeading).find('h5') );

                                //  Update the fillable field with the associated error
                                if( !$(fillable).parent().find('.invalid-feedback').length ){
                                    console.log('Stage 5');
                                    //  If this is a dropify attachment
                                    if( $(fillable).parent().hasClass('dropify-wrapper') ){
                                        console.log('Stage 6');
                                        //  Use this error for the dropify attachment field
                                        $('<span class="help-block invalid-feedback d-block">'+
                                                '<strong>Attach file</strong>'+
                                            '</span>').insertBefore( $(fillable).parent() );
                                                
                                    }else{
                                        console.log('Stage 7');
                                        //  Otherwise for normal input/textarea or select fields use this error
                                        $(fillable).parent().append(
                                            '<span class="help-block invalid-feedback d-block">'+
                                                '<strong>Enter field above</strong>'+
                                            '</span>'
                                        );
                                    }


                                }
                            }
                        }
                    });

                    //  If we do not have any errors then lets submit data
                    if(!errors){
                        console.log('submitting form!');
                        //var data = JSON.stringify( JSON.decycle( build, true) );

                        //  Update the new process instructions data using the build information
                        var updatedProcessInstructions = JSON.parse( processInstructions );
                        updatedProcessInstructions[0]['process_form'][pluginPosition]['plugin'] = build;

                        $('#progress-status-modal .modal-body')
                            .append('<input type="hidden" name="updated_process_instructions" value="'+ encodeURIComponent(JSON.stringify( updatedProcessInstructions )) +'">');
                        
                        //  Submit the form and make button show loading state
                        //  "makeSubmitableBtn()" is found in js/custom/misc.js

                        makeSubmitableBtn(this);  

                        //$( "#progress-status-form" ).submit();

                    }
                }

            }

            @if(COUNT($errors))
                $('#{{ old('modal_id') }}').modal('show');

                var errors = $('#{{ old('modal_id') }} .help-block.invalid-feedback');

                $.each(errors, function( index, value ) {
                    var tabId = $(value).closest('.tab-pane').attr('id');
                    var tabNavItem = $('#myTab .nav-item #'+tabId+'-tab');
                    var currCount = $(tabNavItem).parent('li').attr('data-error');
                    var count = (currCount == undefined) ? 1 : parseInt(currCount) + 1;
                    var tabNavText = $(tabNavItem).text();

                    console.log('count value: ' + count);
                    var msg = (count == 1) ? count+' error here': count+' errors here';
                    console.log('$(tabNavItem).text() value: ' + $(tabNavItem).text());
                    
                    $(tabNavItem).html(
                        tabNavText + 
                        '<div class="badge badge-danger rounded" style="position: absolute;top: -4px;transform: rotate;">'
                            +msg+
                        '</div>'
                    );

                    $(tabNavItem).parent('li').attr('data-error', count);

                    
                });

            @endif

        });
    </script>

@endsection