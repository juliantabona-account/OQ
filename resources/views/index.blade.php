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
		<h1>Registration</h1>
		<div class="main-registration-container">
			<div class="registration-box"> 
				<a href="/payment-options" style="float: right;">Already Registered?</a><br>
				<form action="/register" method="POST"> 
					{{ csrf_field() }}
					<div id="section_A" class="section_box">
						<div class="section-header">
							<h3>SECTION A</h3>
							<p>'*' Indicates A Required Field</p>
						</div>
						<div class="input-box">
							<span>1) Please select which days you will be attending International Data Week (check all that apply).*</span>
							<div class="input-highlight">
								<span>NOTE:</span> 
								<span>Side/Business events will also be scheduled for the days before and after the below dates and will be published publicly once dates are finalized; please plan accordingly when booking your travel.</span>
							</div>
							<div class="wthree-text mt-2">  
								<label class="anim">
									<input type="checkbox" name = "days_attending" value ="Monday, 5 November 2018" class="days_attending checkbox">
									<span>Monday, 5 November 2018</span> 
								</label>  
								<div class="clear"> </div>
							</div>
							<div class="wthree-text">  
								<label class="anim">
									<input type="checkbox" name = "days_attending" value ="Tuesday, 6 November 2018" class="days_attending checkbox">
									<span>Tuesday, 6 November 2018</span> 
								</label>  
								<div class="clear"> </div>
							</div>
							<div class="wthree-text">  
								<label class="anim">
									<input type="checkbox" name = "days_attending" value ="Wednesday, 7 November 2018" class="days_attending checkbox">
									<span>Wednesday, 7 November 2018</span> 
								</label>  
								<div class="clear"> </div>
							</div>
							<div class="wthree-text">  
								<label class="anim">
									<input type="checkbox" name = "days_attending" value ="Thursday, 8 November 2018" class="days_attending checkbox">
									<span>Thursday, 8 November 2018</span> 
								</label>  
								<div class="clear"> </div>
							</div>
						</div>
						<div class="input-box">
							<span class="mb-2 d-block">2) Indicate which of the following you are going to attend.*</span>
							<div class="wthree-text">  
								<label class="anim">
									<input type="checkbox" name = "event_attending" value ="Welcome Reception, 4 November 2018 (evening)" class="event_attending checkbox" >
									<span>Welcome Reception, 4 November 2018 (evening)</span> 
								</label>  
								<div class="clear"> </div>
							</div>  
							<div class="wthree-text">  
								<label class="anim">
									<input type="checkbox" name = "event_attending" value ="Dinner Reception, 5 November 2018" class="event_attending checkbox" >
									<span>Dinner Reception, 5 November 2018</span> 
								</label>  
								<div class="clear"> </div>
							</div>  
						</div>   
					
						<button type="button" class="btn btn-next">NEXT</button>
					</div>
					<div id="section_B" class="section_box hide">
						<div class="section-header">
							<h3>SECTION B</h3>
							<p>'*' Indicates A Required Field</p>
						</div>
						<div class="input-box">
							<input class="text" type="text" id="first_name" name="first_name" placeholder="First Name*">
						</div> 
						<div class="input-box">
							<input class="text" type="text" id="last_name" name="last_name" placeholder="Last Name*">
						</div>  

						<div class="input-box">
							<span class="mb-2 d-block">Gender</span>
							<div class="wthree-text">  
								<label class="anim">
									<input type="radio" name="gender" value="Male" class="gender checkbox">
									<span>Male</span> 
								</label>  
								<div class="clear"> </div>
							</div>  
							<div class="wthree-text">  
								<label class="anim">
									<input type="radio" name="gender" value="Female" class="gender checkbox">
									<span>Female</span> 
								</label>  
								<div class="clear"> </div>
							</div> 
							<div class="wthree-text">  
								<label class="anim">
									<input type="radio" name="gender" value="Prefer not to disclose" class="gender checkbox">
									<span>Prefer not to disclose</span> 
								</label>  
								<div class="clear"> </div>
							</div> 

						</div>   

						<div class="input-box">
							<input class="text" type="text" id="affiliation" name="affiliation" placeholder="Affiliation*" >
						</div> 
						<div class="input-box">
							<input class="text" type="text" id="position" name="position" placeholder="Position/Title*" >
						</div> 

						<div class="input-box">

							<span class="mb-2 d-block">Organisation Type*</span>
							<div class="wthree-text">  
								<label class="anim">
									<input type="radio" name="organisation_type" value="Large Enterprise" class="organisation_type checkbox">
									<span>Large Enterprise</span> 
								</label>  
								<div class="clear"> </div>
							</div>  
							<div class="wthree-text">  
								<label class="anim">
									<input type="radio" name="organisation_type" value="Small and Medium Enterprise" class="organisation_type checkbox">
									<span>Small and Medium Enterprise</span> 
								</label>  
								<div class="clear"> </div>
							</div> 
							<div class="wthree-text">  
								<label class="anim">
									<input type="radio" name="organisation_type" value="IT Consultancy/Development" class="organisation_type checkbox">
									<span>IT Consultancy/Development</span> 
								</label>  
								<div class="clear"> </div>
							</div> 
							<div class="wthree-text">  
								<label class="anim">
									<input type="radio" name="organisation_type" value="Policy/Funding Agency" class="organisation_type checkbox">
									<span>Policy/Funding Agency</span> 
								</label>  
								<div class="clear"> </div>
							</div> 
							<div class="wthree-text">  
								<label class="anim">
									<input type="radio" name="organisation_type" value="Press and Media" class="organisation_type checkbox">
									<span>Press &amp; Media</span> 
								</label>  
								<div class="clear"> </div>
							</div> 
							<div class="wthree-text">  
								<label class="anim">
									<input type="radio" name="organisation_type" value="Government Agency" class="organisation_type checkbox">
									<span>Government Agency</span> 
								</label>  
								<div class="clear"> </div>
							</div> 
							<div class="wthree-text">  
								<label class="anim">
									<input type="radio" name="organisation_type" value="University" class="organisation_type checkbox">
									<span>University</span> 
								</label>  
								<div class="clear"> </div>
							</div> 
							<div class="input-box mt-2">
								<input class="text" type="text" id="organisation_type_other" name="organisation_type_other" placeholder="Other, please specify..." >
							</div> 

						</div>   
						<div class="input-box">
							<span class="mb-2 d-block">Country*</span>
							<select id="country" name="country">
								<option value="" selected="selected"></option>
								<option value="Afghanistan">Afghanistan</option>
								<option value="Albania">Albania</option>
								<option value="Algeria">Algeria</option>
								<option value="Andorra">Andorra</option>
								<option value="Antigua and Barbuda">Antigua and Barbuda</option>
								<option value="Argentina">Argentina</option>
								<option value="Armenia">Armenia</option>
								<option value="Australia">Australia</option>
								<option value="Austria">Austria</option>
								<option value="Azerbaijan">Azerbaijan</option>
								<option value="Bahamas">Bahamas</option>
								<option value="Bahrain">Bahrain</option>
								<option value="Bangladesh">Bangladesh</option>
								<option value="Barbados">Barbados</option>
								<option value="Belarus">Belarus</option>
								<option value="Belgium">Belgium</option>
								<option value="Belize">Belize</option>
								<option value="Benin">Benin</option>
								<option value="Bhutan">Bhutan</option>
								<option value="Bolivia">Bolivia</option>
								<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
								<option value="Botswana" selected>Botswana</option>
								<option value="Brazil">Brazil</option>
								<option value="Brunei">Brunei</option>
								<option value="Bulgaria">Bulgaria</option>
								<option value="Burkina Faso">Burkina Faso</option>
								<option value="Burundi">Burundi</option>
								<option value="Cambodia">Cambodia</option>
								<option value="Cameroon">Cameroon</option>
								<option value="Canada">Canada</option>
								<option value="Cape Verde">Cape Verde</option>
								<option value="Central African Republic">Central African Republic</option>
								<option value="Chad">Chad</option>
								<option value="Chile">Chile</option>
								<option value="China">China</option>
								<option value="Colombia">Colombia</option>
								<option value="Comoros">Comoros</option>
								<option value="Congo">Congo</option>
								<option value="Costa Rica">Costa Rica</option>
								<option value="Cote d'Ivoire">Cote d'Ivoire</option>
								<option value="Croatia">Croatia</option>
								<option value="Cuba">Cuba</option>
								<option value="Cyprus">Cyprus</option>
								<option value="Czech Republic">Czech Republic</option>
								<option value="Denmark">Denmark</option>
								<option value="Djibouti">Djibouti</option>
								<option value="Dominica">Dominica</option>
								<option value="Dominican Republic">Dominican Republic</option>
								<option value="East Timor">East Timor</option>
								<option value="Ecuador">Ecuador</option>
								<option value="Egypt">Egypt</option>
								<option value="El Salvador">El Salvador</option>
								<option value="Equatorial Guinea">Equatorial Guinea</option>
								<option value="Eritrea">Eritrea</option>
								<option value="Estonia">Estonia</option>
								<option value="Ethiopia">Ethiopia</option>
								<option value="Fiji">Fiji</option>
								<option value="Finland">Finland</option>
								<option value="France">France</option>
								<option value="Gabon">Gabon</option>
								<option value="Gambia">Gambia</option>
								<option value="Georgia">Georgia</option>
								<option value="Germany">Germany</option>
								<option value="Ghana">Ghana</option>
								<option value="Greece">Greece</option>
								<option value="Grenada">Grenada</option>
								<option value="Guatemala">Guatemala</option>
								<option value="Guinea">Guinea</option>
								<option value="Guinea-Bissau">Guinea-Bissau</option>
								<option value="Guyana">Guyana</option>
								<option value="Haiti">Haiti</option>
								<option value="Honduras">Honduras</option>
								<option value="Hong Kong">Hong Kong</option>
								<option value="Hungary">Hungary</option>
								<option value="Iceland">Iceland</option>
								<option value="India">India</option>
								<option value="Indonesia">Indonesia</option>
								<option value="Iran">Iran</option>
								<option value="Iraq">Iraq</option>
								<option value="Ireland">Ireland</option>
								<option value="Israel">Israel</option>
								<option value="Italy">Italy</option>
								<option value="Jamaica">Jamaica</option>
								<option value="Japan">Japan</option>
								<option value="Jordan">Jordan</option>
								<option value="Kazakhstan">Kazakhstan</option>
								<option value="Kenya">Kenya</option>
								<option value="Kiribati">Kiribati</option>
								<option value="North Korea">North Korea</option>
								<option value="South Korea">South Korea</option>
								<option value="Kuwait">Kuwait</option>
								<option value="Kyrgyzstan">Kyrgyzstan</option>
								<option value="Laos">Laos</option>
								<option value="Latvia">Latvia</option>
								<option value="Lebanon">Lebanon</option>
								<option value="Lesotho">Lesotho</option>
								<option value="Liberia">Liberia</option>
								<option value="Libya">Libya</option>
								<option value="Liechtenstein">Liechtenstein</option>
								<option value="Lithuania">Lithuania</option>
								<option value="Luxembourg">Luxembourg</option>
								<option value="Macedonia">Macedonia</option>
								<option value="Madagascar">Madagascar</option>
								<option value="Malawi">Malawi</option>
								<option value="Malaysia">Malaysia</option>
								<option value="Maldives">Maldives</option>
								<option value="Mali">Mali</option>
								<option value="Malta">Malta</option>
								<option value="Marshall Islands">Marshall Islands</option>
								<option value="Mauritania">Mauritania</option>
								<option value="Mauritius">Mauritius</option>
								<option value="Mexico">Mexico</option>
								<option value="Micronesia">Micronesia</option>
								<option value="Moldova">Moldova</option>
								<option value="Monaco">Monaco</option>
								<option value="Mongolia">Mongolia</option>
								<option value="Montenegro">Montenegro</option>
								<option value="Morocco">Morocco</option>
								<option value="Mozambique">Mozambique</option>
								<option value="Myanmar">Myanmar</option>
								<option value="Namibia">Namibia</option>
								<option value="Nauru">Nauru</option>
								<option value="Nepal">Nepal</option>
								<option value="Netherlands">Netherlands</option>
								<option value="New Zealand">New Zealand</option>
								<option value="Nicaragua">Nicaragua</option>
								<option value="Niger">Niger</option>
								<option value="Nigeria">Nigeria</option>
								<option value="Norway">Norway</option>
								<option value="Oman">Oman</option>
								<option value="Pakistan">Pakistan</option>
								<option value="Palau">Palau</option>
								<option value="Panama">Panama</option>
								<option value="Papua New Guinea">Papua New Guinea</option>
								<option value="Paraguay">Paraguay</option>
								<option value="Peru">Peru</option>
								<option value="Philippines">Philippines</option>
								<option value="Poland">Poland</option>
								<option value="Portugal">Portugal</option>
								<option value="Puerto Rico">Puerto Rico</option>
								<option value="Qatar">Qatar</option>
								<option value="Romania">Romania</option>
								<option value="Russia">Russia</option>
								<option value="Rwanda">Rwanda</option>
								<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
								<option value="Saint Lucia">Saint Lucia</option>
								<option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
								<option value="Samoa">Samoa</option>
								<option value="San Marino">San Marino</option>
								<option value="Sao Tome and Principe">Sao Tome and Principe</option>
								<option value="Saudi Arabia">Saudi Arabia</option>
								<option value="Senegal">Senegal</option>
								<option value="Serbia and Montenegro">Serbia and Montenegro</option>
								<option value="Seychelles">Seychelles</option>
								<option value="Sierra Leone">Sierra Leone</option>
								<option value="Singapore">Singapore</option>
								<option value="Slovakia">Slovakia</option>
								<option value="Slovenia">Slovenia</option>
								<option value="Solomon Islands">Solomon Islands</option>
								<option value="Somalia">Somalia</option>
								<option value="South Africa">South Africa</option>
								<option value="Spain">Spain</option>
								<option value="Sri Lanka">Sri Lanka</option>
								<option value="Sudan">Sudan</option>
								<option value="Suriname">Suriname</option>
								<option value="Swaziland">Swaziland</option>
								<option value="Sweden">Sweden</option>
								<option value="Switzerland">Switzerland</option>
								<option value="Syria">Syria</option>
								<option value="Taiwan">Taiwan</option>
								<option value="Tajikistan">Tajikistan</option>
								<option value="Tanzania">Tanzania</option>
								<option value="Thailand">Thailand</option>
								<option value="Togo">Togo</option>
								<option value="Tonga">Tonga</option>
								<option value="Trinidad and Tobago">Trinidad and Tobago</option>
								<option value="Tunisia">Tunisia</option>
								<option value="Turkey">Turkey</option>
								<option value="Turkmenistan">Turkmenistan</option>
								<option value="Tuvalu">Tuvalu</option>
								<option value="Uganda">Uganda</option>
								<option value="Ukraine">Ukraine</option>
								<option value="United Arab Emirates">United Arab Emirates</option>
								<option value="United Kingdom">United Kingdom</option>
								<option value="United States">United States</option>
								<option value="Uruguay">Uruguay</option>
								<option value="Uzbekistan">Uzbekistan</option>
								<option value="Vanuatu">Vanuatu</option>
								<option value="Vatican City">Vatican City</option>
								<option value="Venezuela">Venezuela</option>
								<option value="Vietnam">Vietnam</option>
								<option value="Yemen">Yemen</option>
								<option value="Zambia">Zambia</option>
								<option value="Zimbabwe">Zimbabwe</option>
							</select>
						</div>
						<div class="input-box">
							<input class="text" type="text" id="address" name="address" placeholder="Address 1*" >
						</div> 

						<div class="input-box">
							<input class="text" type="text" id="address_2" name="address_2" placeholder="Address 2" >
						</div> 

					
						<div class="input-box">
							<input class="text" type="text" id="city" name="city" placeholder="City*" >
						</div> 

						<div class="input-box">
							<input class="text" type="text" id="state" name="state" placeholder="State">
						</div> 

						<div class="input-box">
							<input class="text" type="text" id="zip_code" name="zip_code" placeholder="Zip Code/Postal Code*" >
						</div> 

						<div class="input-box">
							<input class="text" type="text" id="phone" name="phone" placeholder="Phone*" >
						</div> 

						<div class="input-box">
							<input class="text" type="text" id="email" name="email" placeholder="Email Address*" >
						</div> 

						<div class="input-box">
							<input class="text" type="text" id="confirm_email" name="confirm_email" placeholder="Confirm Email*" >
						</div> 

						<div class="input-box">
							<input class="text" type="text" id="additional_email" name="additional_email" placeholder="Additional Email">
						</div> 

						<div class="input-box">
							<input class="text" type="text" name="twitter_handle" placeholder="Twitter Handle (@xxx)">
						</div> 

						<button type="button" class="btn btn-half btn-prev">PREV</button>
						<button type="button" class="btn btn-half btn-next">NEXT</button>
					</div>	
					<div id="section_C" class="section_box hide">
						<div class="section-header">
							<h3>SECTION C</h3>
							<p>'*' Indicates A Required Field</p>
						</div>  

						<div class="input-box">
							<span class="mb-2 d-block">I am affiliated with the following organisations (check all that apply)*</span>
							<div class="wthree-text">  
								<label class="anim">
									<input type="checkbox" name="organisation_affiliation" value="RDA" class="organisation_affiliation checkbox">
									<span>RDA</span> 
								</label>  
								<div class="clear"> </div>
							</div>  
							<div class="wthree-text">  
								<label class="anim">
									<input type="checkbox" name="organisation_affiliation" value="CODATA" class="organisation_affiliation checkbox">
									<span>CODATA</span> 
								</label>  
								<div class="clear"> </div>
							</div> 
							<div class="wthree-text">  
								<label class="anim">
									<input type="checkbox" name="organisation_affiliation" value="WDS" class="organisation_affiliation checkbox">
									<span>WDS</span> 
								</label>  
								<div class="clear"> </div>
							</div>  
							<div class="wthree-text">  
								<label class="anim">
									<input type="checkbox" name="organisation_affiliation" value="AOSP" class="organisation_affiliation checkbox">
									<span>AOSP</span> 
								</label>  
								<div class="clear"> </div>
							</div> 

						</div>   

						<div class="input-box">
							<span class="mb-2 d-block">How did you hear about the conference?*</span>
							<div class="wthree-text">  
								<label class="anim">
									<input type="checkbox" name="communication_channel" value="Email notification" class="communication_channel checkbox">
									<span>Email notification</span> 
								</label>  
								<div class="clear"> </div>
							</div>  
							<div class="wthree-text">  
								<label class="anim">
									<input type="checkbox" name="communication_channel" value="Social media post" class="communication_channel checkbox">
									<span>Social media post</span> 
								</label>  
								<div class="clear"> </div>
							</div> 
							<div class="wthree-text">  
								<label class="anim">
									<input type="checkbox" name="communication_channel" value="Website posting" class="communication_channel checkbox">
									<span>Website posting</span> 
								</label>  
								<div class="clear"> </div>
							</div>  
							<div class="wthree-text">  
								<label class="anim">
									<input type="checkbox" name="communication_channel" value="AOSP" class="communication_channel checkbox">
									<span>AOSP</span> 
								</label>  
								<div class="clear"> </div>
							</div> 
							<div class="input-box mt-2">
								<input class="text" type="text" id="communication_channel_other" name="communication_channel_other" placeholder="Other, please specify..." >
							</div> 
						</div> 

						<div class="input-box mt-2">
							<span class="mb-2 d-block">Please indicate if you have accessibility needs for which you need support or special arrangements.</span>
							<textarea class="text" name="accessibility">N/A</textarea>
						</div>

						<div class="input-box mt-2">
							<span class="mb-2 d-block">Please indicate whether you have dietary restrictions and/or food allergies.</span>
							<textarea class="text" name="allergies">N/A</textarea>
						</div>

						<button type="button" class="btn btn-half btn-prev">PREV</button>
						<button type="button" class="btn btn-half btn-next">NEXT</button>
					</div>
					<div id="section_D" class="section_box hide">
						<div class="section-header">
							<h3>SECTION D</h3>
							<p>'*' Indicates A Required Field</p>
						</div>  

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
							<span class="mb-2 d-block">Do you give permission to the organisers of International Data Week to send you information about this event, side/business meetings and future International Data Week events?</span>
							<div class="wthree-text">  
								<label class="anim">
									<input type="radio" name="send_future_updates" value="YES" class="send_future_updates checkbox">
									<span>YES</span> 
								</label>  
								<div class="clear"> </div>
							</div>  
							<div class="wthree-text">  
								<label class="anim">
									<input type="radio" name="send_future_updates" value="NO" class="send_future_updates checkbox" checked="">
									<span>NO</span> 
								</label>  
								<div class="clear"> </div>
							</div> 
						</div>  
						
						<div class="input-box">
							<span class="mb-2 d-block">Do you give permission to the organisers of International Data Week to send you information related to <a href="https://datascience.codata.org"><i>Data Science Journal</i></a> contributions?</span>
							<div class="wthree-text">  
								<label class="anim">
									<input type="radio" name="send_data_science_journal_updates" value="YES" class="send_data_science_journal_updates checkbox">
									<span>YES</span> 
								</label>  
								<div class="clear"> </div>
							</div>  
							<div class="wthree-text">  
								<label class="anim">
									<input type="radio" name="send_data_science_journal_updates" value="NO" class="send_data_science_journal_updates checkbox" checked="">
									<span>NO</span> 
								</label>  
								<div class="clear"> </div>
							</div> 
						</div>  

						<div class="input-box">
							<span class="mb-2 d-block">Do you agree to having all of your details included in an attendee list that will be shared across the organizers (RDA, CODATA, WDS, ASOP)?</span>
							<div class="wthree-text">  
								<label class="anim">
									<input type="radio" name="agree_to_addon_list" value="YES" class="agree_to_addon_list checkbox">
									<span>YES</span> 
								</label>  
								<div class="clear"> </div>
							</div>  
							<div class="wthree-text">  
								<label class="anim">
									<input type="radio" name="agree_to_addon_list" value="NO" class="agree_to_addon_list checkbox" checked="">
									<span>NO</span> 
								</label>  
								<div class="clear"> </div>
							</div> 
						</div> 

						<div class="input-box">
							<span class="mb-2 d-block">Do you agree to have ONLY your name, affiliation and country included in the event attendee list, which will be published on the International Data Week website?</span>
							<div class="wthree-text">  
								<label class="anim">
									<input type="radio" name="agree_to_details_on_list" value="YES" class="agree_to_details_on_list checkbox">
									<span>YES</span> 
								</label>  
								<div class="clear"> </div>
							</div>  
							<div class="wthree-text">  
								<label class="anim">
									<input type="radio" name="agree_to_details_on_list" value="NO" class="agree_to_details_on_list checkbox" checked="">
									<span>NO</span> 
								</label>  
								<div class="clear"> </div>
							</div> 
						</div> 

						<button type="button" class="btn btn-half btn-prev">PREV</button>
						<button type="submit" class="btn btn-half btn-next">Proceed To Payment</button>
					</div> 
				</form>
			</div>			</div>
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

			$(document).on("click",".btn-next",function(e){
				var section = $(this).closest('.section_box');
				var section_id = $(section).attr('id');
				var next_section = $(section).next();
				var regContainerWidth = $('.main-registration-container').width();
				var errorCount = 0;

				/*	Scroll the content to the top
				*/
				$('.main-registration-container').animate({
					scrollTop: 0
				}, 500);
				
				removeAllErrors();

				if( section_id == 'section_A' ){
					errorCount = validateSectionA();
				}else if( section_id == 'section_B' ){
					errorCount = validateSectionB()
				}else if( section_id == 'section_C' ){
					errorCount = validateSectionC()
				}else if( section_id == 'section_D' ){
					errorCount = validateSectionD(e)
				}

				if(next_section.length != 0 && errorCount == 0){

					setTimeout(
						function() 
						{   
						//	Immediately unhide the next section
						$( next_section ).removeClass('hide');

						/*	Prepare the current section to slide
						*/
						$( section ).css({ "width": $(section).width()+"px" });

						/*	Slide the current section to the left
						*/
						$( section ).animate({  
							"left": "-"+regContainerWidth+"px"
						}, 500 );

						/*	Prepare the next section to slide
						*/
						$( next_section ).css({ 
							"width": $(section).width()+"px", 
							"left": "+"+regContainerWidth+"px" 
						});

						/*	Slide the next section from the right to the left
						*/
						$( next_section ).animate({  
							"left": "0px"
						}, 500 );

					//	Only hide the current section after 1/2second
					setTimeout(
						function() 
						{   
							$( section ).addClass('hide');
							
						}, 500 );

					}, 500 );
				}

				if(errorCount != 0){
					alert('Complete all fields before proceeding');
				}
				
			});

			$(document).on("click",".btn-prev",function(){
				var section = $(this).closest('.section_box');
				var prev_section = $(section).prev();
				var regContainerWidth = $('.main-registration-container').width();
				
				if(prev_section.length != 0){

					$('.main-registration-container').animate({
						scrollTop: 0
					}, 500);

					setTimeout(
						function() 
						{   
							$( prev_section ).removeClass('hide');
							/*	Slide the current section to the right
							*/
							$( section ).animate({  
								"left": regContainerWidth+"px"
							}, 500 );

							/*	Slide the previous section from the left to the right
							*/
							console.log(prev_section)
							$( prev_section ).animate({  
								"left": "0px"
							}, 500 );

							//	Only hide the current section after 1/2second
							setTimeout(
								function() 
								{   
									$( section ).addClass('hide');
									
								}, 500 );

						}, 500 );

					}

			});

			function validateSectionA(){
				var proceed = true;
				var days_attending = $('.days_attending:checked');
				var event_attending =$('.event_attending:checked');
				var err_count = 0;

				if(days_attending.length == 0){
					$('.days_attending:first').closest('.wthree-text').prepend( errMsg('Please select a date') );
					err_count++;
				}

				if(event_attending.length == 0){
					$('.event_attending:first').closest('.wthree-text').prepend( errMsg('Please select an event') );
					err_count++;
				}

				return err_count;
			}

			function validateSectionB(){
				var proceed = true;
				var first_name = $('#first_name').val();
				var last_name = $('#last_name').val();
				var affiliation = $('#affiliation').val(); 
				var position = $('#position').val();
				var organisation_type = $('.organisation_type:checked');
				var organisation_type_other = $('#organisation_type_other').val();
				var country = $('#country').val();
				var address = $('#address').val();
				var city = $('#city').val();
				var zip_code = $('#zip_code').val();
				var phone = $('#phone').val();
				var email = $('#email').val();
				var confirm_email = $('#confirm_email').val();
				var err_count = 0;

				if(first_name == ''){
					$('#first_name').closest('.input-box').prepend( errMsg('Please enter your first name') );
					err_count++;
				}

				if(last_name == ''){
					$('#last_name').closest('.input-box').prepend( errMsg('Please enter your last name') );
					err_count++;
				}

				if(affiliation == ''){
					$('#affiliation').closest('.input-box').prepend( errMsg('Please enter your affiliation') );
					err_count++;
				}

				if(position == ''){
					$('#position').closest('.input-box').prepend( errMsg('Please enter your position/title') );
					err_count++;
				}

				if(organisation_type.length == 0 && organisation_type_other == ''){
					$('.organisation_type:first').closest('.wthree-text').prepend( errMsg('Please select your organisation type') );
					err_count++;
				}

				if(address == ''){
					$('#country').prepend( errMsg('Please select your country') );
					err_count++;
				}

				if(address == ''){
					$('#address').closest('.input-box').prepend( errMsg('Please enter your address') );
					err_count++;
				}

				if(city == ''){
					$('#city').closest('.input-box').prepend( errMsg('Please enter your city') );
					err_count++;
				}

				if(zip_code == ''){
					$('#zip_code').closest('.input-box').prepend( errMsg('Please enter your zip code/postal code') );
					err_count++;
				}

				if(phone == ''){
					$('#phone').closest('.input-box').prepend( errMsg('Please enter your phone number') );
					err_count++;
				}

				if(email == ''){
					$('#email').closest('.input-box').prepend( errMsg('Please enter your email') );
					err_count++;
				}

				if(confirm_email == ''){
					$('#confirm_email').closest('.input-box').prepend( errMsg('Please confirm your email') );
					err_count++;
				}

				if(email != confirm_email){
					$('#email').closest('.input-box').prepend( errMsg('Email does not match with confirmation email') );
					err_count++;
				}
				
				return err_count;
			}

			function validateSectionC(){
				var organisation_affiliation = $('.organisation_affiliation:checked');
				var communication_channel = $('.communication_channel:checked'); 
				var communication_channel_other = $('#communication_channel_other').val();
				var err_count = 0;

				if(organisation_affiliation.length == 0){
					$('.organisation_affiliation:first').closest('.wthree-text').prepend( errMsg('Please select affiliated organisation') );
					err_count++;
				}

				if(communication_channel.length == 0 && communication_channel_other == ''){
					$('.communication_channel:first').closest('.wthree-text').prepend( errMsg('Please select communication channel') );
					err_count++;
				}
				
				return err_count;
			}
			
			function validateSectionD(e){
				var terms_and_conditions = $('.terms_and_conditions:checked');
				var err_count = 0;

				if(terms_and_conditions.length == 0 || $(terms_and_conditions).val() == 'NO'){
					e.preventDefault();
					$('.terms_and_conditions:first').closest('.wthree-text').prepend( errMsg('Please accept the Terms and Conditions & Privacy Policy') );
					err_count++;
				}
				
				return err_count;
			}

			function removeAllErrors(){
				$('.errMsg').remove();
			}

			function errMsg(msg){
				return '<p class="errMsg"><i class="fa fa-exclamation-circle mr-2"></i>'+msg+'</p>';
			}

		});
	</script>
	
	</body>
</html>