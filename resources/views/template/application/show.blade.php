@extends('layouts.app-guest') 

@section('style')
    <link rel="stylesheet" href="{{ asset('css/plugins/dropify/dist/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">

@endsection

@section('content')

    <div class="row">
        <div class="col-lg-8 offset-2 d-flex flex-column">
            <div class="row flex-grow">
                <div class="col-12 mb-2">
                    <div class="card">
                        <div class="card-body pb-2">
                            <h3>Application Details</h3>
                            <p>{{ $template->description }}</p>
                            <p>Please read our <a href="#" style="text-decoration: underline;">Terms &amp; Conditions</a></p>
                            <div class="alert alert-warning" role="alert">
                                <i class="icon-bulb icons mr-2"></i><span>Make sure to compleete all fields and upload all attachments required before submitting</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 stretch-card">
                    <div class="card card-hoverable">
                        <div class="card-body p-3 pt-5">
                            <div class="row">
                                <div class="col-12">
                                    <div id="application-form-box" class="row">
                                        <input id="form_structure" type="hidden" value="{{ $template->form_structure }}">
                                    </div>
                                    
                                    <button id="submittionBtn" type="submit" class="btn btn-primary mr-2 float-right">
                                        Submit Request
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
@endsection 

@section('js')

    <script src="{{ asset('js/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dropify/dist/js/dropify.min.js') }}"></script>

    <script>
        $( document ).ready(function() {

            //Get the build content
            console.log('building...'); 
            
            var build = JSON.parse( $('#form_structure').val() ); 

            //  If the build contents are available
            if(build != '' && build != undefined){

                //Prepare data fields to store
                var data = '';
                
                $.each(build, function(index, element) {
                    
                    element.width == undefined ? element.width = 'col-12' : element.width;
                    element.description == undefined ? element.description = '' : element.description;
                    element.classes != '' ? element.classes = ' '+element.classes: element.classes = '';

                    //  If the required field is not set to true or does not exist at all,
                    //  then say that the field is not really required (its optional) by setting it to false. 
                    if(element.required != true){
                        element.required = false;
                    }

                    //  Build for text inputs  
                    if(element.tag == "INPUT" && element.type == 'text'){
                        
                        data +=  '<div class="'+element.width+'">'+
                                    '<div class="form-group">'+
                                        '<label for="'+element.id+'" class="field-label">'+element.label+'</label>'+
                                        '<input field-required="'+element.required+'" class="form-control'+element.classes+'" data-toggle="tooltip" data-placement="top" title="'+element.description+'"'+
                                                'type="text" id="'+element.id+'" name="'+element.name+'" placeholder="'+element.placeholder+'">'+
                                        '</div>'+
                                    '</div>';

                    //  Build for file inputs                                        
                    }else if(element.tag == "INPUT" && element.type == 'file'){
                        data +=  '<div class="'+element.width+'">'+
                                        '<div class="form-group">'+
                                            '<label for="'+element.id+'" class="badge badge-warning text-white field-label">'+element.label+'</label>'+
                                            '<div class="wrapper mb-3">'+
                                                '<p class="d-inline text-muted">File size is limited to not greater than <b>2MB</b>. Only <b>pdf/jpeg</b> are accepted.</p>'+
                                            '</div>'+
                                            '<input data-toggle="tooltip" data-max-file-size="2mb" data-placement="top" title="'+element.description+'"'+
                                                'type="file" id="'+element.id+'" name="'+element.name+'" value="" class="dropify form-control" data-default-file="" data-height="70">';
                                    '</div>'+
                                '</div>';
                    //  Build for select inputs 
                    }else if(element.tag == "SELECT"){
                        var options = '';

                        $.each(element.options, function(index, option) {
                            options += '<option value="'+option.id+'" '+( option.id == element.update.response ? ' selected':'' )+'>'+option.label+'</option>';
                        });

                        data +=  '<div class="'+element.width+'">'+
                                    '<div class="input-group mb-3">'+
                                        '<label for="'+element.id+'" class="m-0 p-0 w-100 field-label">'+element.label+'</label>'+
                                        '<select id="'+element.id+'" class="form-control custom-select" name="'+element.name+'">'+
                                            options+
                                        '</select>'+
                                    '</div>'+
                                '</div>';
                    }

                });

                //  Attach data fields to modal
                //  Also attach the position of the currently clicked step
                $('#application-form-box').html( data );

                //  Initialize date field file dropbox
                $('.date-picker').datepicker({
                    format: "yyyy-mm-dd",
                    enableOnReadonly: true,
                    todayHighlight: true,
                });

                //  Initialize file/dropbox field
                $('.dropify').dropify();

                $('#form_structure').remove();
                
                /*

                //Initialize data field file dropbox
                $('.dropify').dropify();
                
                //Initialize data field date picker
                $('.date-picker').datepicker({
                    format: "yyyy-mm-dd",
                    enableOnReadonly: true,
                    todayHighlight: true
                });

                */

            }

        });
    </script>
@endsection