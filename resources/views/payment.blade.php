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
		<div class="main-registration-container" style="min-height: 600px;">
			<div class="registration-box"> 
                @if (Session::exists('user') && Session::exists('transaction') ) 
                <form  method="POST" action="https://www.vcs.co.za/vvonline/vcspay.aspx"  class="form">
					{{ csrf_field() }}
					<div id="section_A" class="section_box">
                            <h4 class="mb-2">
                                <b style="font-weight: 600;color: #229c06;">Paying Customer: {{ Session::get('user')->first_name }} {{ Session::get('user')->last_name }}</b>
                            </h4>
						<div class="section-header">
							<h3>PAYMENT OPTIONS</h3>
						</div>  
						<h4>EARLY BIRD RATE</h4>
						<p class="mb-4">Deadline 30 September 2018</p>
						<div class="input-box">
							<span class="mb-2 d-block">I have Read and Agree to the <a href="#" >Terms and Conditions, Privacy Policy and Disclaimer*</a></span>
							<div class="wthree-text">  
								<label class="anim">
									<input type="radio" name="terms_and_conditions" value="YES" class="terms_and_conditions checkbox">
									<span>YES</span> 
								</label>  
								<div class="clear"> </div>
							</div>  
							<div class="wthree-text">  
								<label class="anim">
									<input type="radio" name="terms_and_conditions" value="NO" class="terms_and_conditions checkbox" checked="">
									<span>NO</span> 
								</label>  
								<div class="clear"> </div>
							</div>
						</div>  
						<div class="input-box">
							<div class="wthree-text">  
								<label class="anim">
									<input type="hidden" name="p1" value="3463"> 
                                    <input type="hidden" name="p2" value="{{ Session::get('transaction')->id }}"> 
                                    <input type="hidden" name="p3" value="Early Ticket"> 
									<select class="form-control" name="p4" data-cesta-feira-attribute="" >
										<option value="2064">Students: 2,000 (BWP)</option>
										<option value="2064">LMIC COUNTRIES: 2,000 (BWP)</option>
										<option value="6192">All Others: 6,000 (BWP)</option>
									</select>
									<input type="hidden" name="UrlsProvided" value="Y">  
									<input type="hidden" name="ApprovedUrl" value="https://idw2018.optimumqbw.com/paymentSuccessfull">  
									<input type="hidden" name="DeclinedUrl" value="http://idw2018.optimumqbw.com/paymentUnSuccessfull">   
									<input type="hidden" name="p10" value="http://idw2018.optimumqbw.com/paymentUnSuccessfull"> 			
								</label>  
								<div class="clear"> </div>
							</div>  
						</div>  
						<div class="input-box">
							<div class="wthree-text mb-3">  
								<label class="anim">
									<input type="radio" name="payment_type" value="visa" class="payment_type checkbox" checked="">
									<span><strong>VISA/MasterCard</strong></span>
									<span>(Note: An handling fee of 3.2% will be charged)</span> 
								</label>  
								<div class="clear"> </div>
							</div>  
							<div class="wthree-text">  
								<label class="anim">
									<input type="radio" name="payment_type" value="Bank Transfer" class="payment_type checkbox">
									<span><strong>Bank Transfer</strong></span>
									<span>(Payment will be received within 2 - 4 working days)</span> 
								</label>   
								<div class="clear"> </div>
							</div> 
						</div>   
						
						<span>Information on cancellation and reimbursement can be found in the<a target="_blank" href="/pdf/TnCs%20-%20Privacy%20Policy%20-%20Disclaimer.pdf">Terms and Conditions, Privacy Policy and Disclaimer.</a></span>
						<p class="mt-3 mb-2">Notes:</p>
						<span>1. Rates include attendance at all sessions throughout the meeting, the welcome reception and the event dinner, as well as morning/afternoon tea and lunches on each day of the meeting.</span>
						<br><br> 
						<span> 
							2. The selected cost will be compared with your registration information and if deemed inappropriate, your registration will be cancelled.
						</span>
						<br>
						<button type="submit" class="btn pay_now">PAY</button>
					</div> 
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
	
	<script>
		$(document).ready(function(){

			$(document).on("click",".pay_now",function(e){
				var terms_and_conditions = $('.terms_and_conditions:checked');
				var err_count = 0;

				$('.errMsg').remove();

				if(terms_and_conditions.length == 0 || $(terms_and_conditions).val() == 'NO'){
					e.preventDefault();
					$('.terms_and_conditions:first').closest('.wthree-text').prepend( errMsg('Please accept the Terms and Conditions & Privacy Policy') );
					err_count++;
				}
				
				if(err_count != 0){
					alert('Complete all fields before proceeding');
				}

				$('.main-registration-container').animate({
					scrollTop: 0
				}, 500);
			});

            $(".pay_now").click(function (e) {
                var payment_type = $('.payment_type:checked').val();

                if(payment_type == 'Bank Transfer'){
                    e.preventDefault();
                    window.location = 'pdf/Bank%20Transfer%20Details.pdf';
                }
			});
			
			function errMsg(msg){
				return '<p class="errMsg"><i class="fa fa-exclamation-circle mr-2"></i>'+msg+'</p>';
			}

		});
	</script>
	
	</body>
</html>