@extends('layouts.app') 

@section('style')

    <style>

        .loader {
            border-top: 2px solid #c2894b;
            border-left: 2px solid #c2894bd4;
            border-radius: 100%;
            width: 15px;
            height: 15px;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

    </style>

@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12 d-flex flex-column">
            <div class="row flex-grow">
                <div class="col-12 mb-2">
                    <div class="card">
                        <div class="card-body pb-2">
                            <h3>Create Contract Template</h3>
                            <p>Name: {{ $template->name }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-2">
                    <div class="card">
                        <div class="card-body pb-2">
                            <div class="row">
                                <div class="col-9">
                                    <nav aria-label="breadcrumb" role="navigation">
                                        <ul class="breadcrumb breadcrumb-custom mb-2 pt-2">
                                            <li data-toggle="tooltip" data-placement="top" title="" class="breadcrumb-item progress-status-tabs active" data-target="#exampleModal-1" data-original-title="Define template name, description, category, e.t.c">
                                                <span>General</span>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="" class="breadcrumb-item progress-status-tabs active" data-target="#exampleModal-1" data-original-title="Define template form fields">
                                                <span>Create Fields</span>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="" class="breadcrumb-item progress-status-tabs selected" data-target="#exampleModal-1" data-original-title="Assign template form fields to contract layout">
                                                <span>Assign Fields</span>
                                            </li>
                                            <li data-toggle="tooltip" data-placement="top" title="" class="breadcrumb-item progress-status-tabs" data-target="#exampleModal-1" data-original-title="Verify the final output">
                                                <span>Verify</span>
                                            </li>  
                                        </ul>
                                        <div class="progress" data-toggle="tooltip" data-placement="top" title="" data-original-title="50% completed">
                                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 stretch-card">
                    <div class="card card-hoverable">
                        <div class="card-body p-3 pt-4">
                            <form method="POST" action="{{ route('template.update.step3', [$template->id]) }}">
                                {{ method_field('PUT') }}
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="pl-2 pb-2">Document Structure</h4>
                                        <div class="mb-2">
                                            @foreach($template->form_structure as $field)
                                                <button type="button" class="form-field-btn btn btn-success btn-sm mb-2">
                                                    <input id="{{ $field['id'] }}" type="hidden" value="{{ $field['name'] }}">
                                                    {{ $field['label'] }}
                                                </button>
                                            @endforeach
                                        </div>
                                        <div class="mt-3 editor-loader">
                                            <div class="alert alert-warning" role="alert">
                                                <div class="d-inline-block mr-1 loader"></div>
                                                <span>Loading Editor...</span>
                                            </div>
                                        </div>
                                        <div id="document_structure_box" class="mb-5">
                                            <textarea id = "document_structure_file" name = "document_structure_file" class="d-none"></textarea>
                                        </div>

                                        <button id="submittionBtn" type="submit" class="btn btn-primary pr-2 mr-2 float-right">
                                            Next Step
                                            <i class="icon-arrow-right icons"></i>
                                        </button>
                                        <a href="{{ route('template.create.step2', $template->id) }}" class="btn btn-success pl-2 pr-3 mr-2 float-right">
                                            <i class="icon-arrow-left icons"></i>
                                            Back
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
@endsection 

@section('js') 
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=yzpugovhcr8rirn4ok2qg1vs8bbbpuvemqng6k59tgf1x4f4"></script>
    <script src="{{ asset('js/plugins/jquery-sortable/jquery-sortable.js')}}"></script> 

    <script>

        tinymce.init({
            selector: '#document_structure_file',
            height: 500,
            theme: 'modern',
            plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
            toolbar1: 'formatselect | bold italic strikethrough forecolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
            templates: [
                { title: 'Test template 1', content: 'Test 1' },
                { title: 'Test template 2', content: 'Test 2' }
            ],
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css'
            ],
            setup: function (ed) {
                //  When the editor has completed loading the content
                ed.on('LoadContent', function(e) {
                    //  Hide the loader
                    $('.editor-loader').hide();
                    //  Show the editor
                    $('#document_structure_file').removeClass('d-none');
                });
            },
            init_instance_callback: function (editor) {
                editor.on('Change, KeyDown, KeyUp', function (e) {
                    //  Code when the editor is being typed or changed
                });
              }
            });

            $('.form-field-btn').click(function(){
                console.log('clicked!');
                //  Get the editor
                var curr_editor = tinyMCE.editors[$('#document_structure_file').attr('id')];
                //  Get the attributes of clicked button
                var btn_name = $(this).find('input').val();
                //  Build the output
                var output = '[['+btn_name+']]';
                //  Place output at current cursor/selection position
                curr_editor.execCommand('insertHTML', false, output);
            
            });

    </script>

@endsection