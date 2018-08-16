<!DOCTYPE html>
<html>
<head>
<title>Bubble SignUp Form a Flat Responsive Widget Template :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Bubble SignUp Form template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/normalize.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font --> 
<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
        <h1>Payment</h1>
        @if(Session::has('alert'))
            <div class="col-6 offset-3 mt-4">
                <div class="alert alert-{{ Session::get('alert')[1] }}" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true" class="d-block mt-1 text-small">×</span>
                    </button>
                    {!! Session::get('alert')[0] !!}
                </div>
            </div>
        @endif
		<div class="main-registration-container" style="min-height: 300px;">
			<div class="registration-box" style="min-height: 300px;"> 
                <div id="section_A" class="section_box">

                    @if (Session::exists('user') && Session::exists('transaction') ) 
                        <h4 class="mb-2">
                            <b style="font-weight: 600;color: #229c06;">Paying Customer: {{ Session::get('user')->first_name }} {{ Session::get('user')->last_name }}</b>
                        </h4>
                        <div class="section-header">
                            <h3><i class="fa fa-exclamation-circle mr-2" aria-hidden="true"></i>PAYMENT UNSUCCESSFUL!</h3>
                        </div>  
                        <p class="mb-4" style="font-weight: 300;">Your payment was not processed. Please try again</p>
                        <form action="/register" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" id="email" name="email" value="{{ Session::get('user')->email }}">
                            <button type="submit" class="btn">Try Again</button>
                        </form>
                            
                    @else
                        <div class="input-box">
                            <div class="input-highlight">
                                <span style="font-size:20px !important;line-height: 14px;display: block;padding: 10px;margin: 10px 0 10px 0;">NOTE:</span> 
                                <h4 style="margin: 15px 0 15px 0;">If you have registered before but haven't paid then enter your email below to view payment options. Otherwise click <a href="/">Here</a> to register.</h4>
                            </div>
                            <form action="/register" method="POST">
                                {{ csrf_field() }}
                                <input class="text" type="email" id="email" name="email" placeholder="Email Address*">
                                <input type="hidden" name="abortRegistration" value="1"> 
                                <button type="submit" class="btn">Proceed To Payment</button>
                            </form>
                        </div>
                        
                    @endif

                </div> 
			</div>	
		</div>
		<ul class="w3lsg-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>	 
	<!-- copyright -->
	<div class="w3copyright-agile">
		<p><span>© International Data Week 2018. All rights reserved</span><br> Design by <a href="http://www.optimumqbw.com" target="_blank">Optimum Q</a></p>
	</div>
	<!-- //copyright -->
		
		
	<!-- //main --> 

	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
	</body>
</html>