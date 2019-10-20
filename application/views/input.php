<!DOCTYPE html>

<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<!--		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css" integrity="sha384-4FeI0trTH/PCsLWrGCD1mScoFu9Jf2NdknFdFoJhXZFwsvzZ3Bo5sAh7+zL8Xgnd" crossorigin="anonymous">-->
		
<!--		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/_bootstrap-2.3.2/bootstrap.min.css">-->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/bootstrap-3.3.7/bootstrap.min.css">

		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

		<style type="text/css">
			.margin-left-20px {
				margin-left: 20px;
			}
            
            .margin-top-20px {
                margin-top: 20px;
            }
		</style>

		<title>Input New values</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2>Input Data</h2>
					<hr>
					<?php echo form_open('validateWaterData') ?>
						<div class="row">
							<div class="col-md-12" id="div_errors">
								<?php
									// echo $rgx['date'];
									// if(isset($rgx)) {
									// 	if($rgx['date'] == 0) echo "Date is invalid<br>";
									// 	if($rgx['time'] == 0) echo "Time is invalid<br>";
									// 	if($rgx['bod'] == 0) echo "Biological Oxygen Demand is invalid<br>";
									// 	if($rgx['do'] == 0) echo "Dissolved Oxygen is invalid<br>";
									// 	if($rgx['tss'] == 0) echo "Total Suspended Solids is invalid<br>";
									// 	if($rgx['ph'] == 0) echo "pH is invalid<br>";
									// }
									// else {
									// 	echo 0;
									// }
									
									// 	print_r($rgx);
								?>
							</div>
							<div class="col-md-4">
								<label for="river-location">River Location</label>
								<select class="form-control" id="river-location" name="river-location">
									<option value="Mahiga">Mahiga</option>
									<option value="Butuanon">Butuanon</option>
									<option value="Lahug">Lahug</option>
									<option value="Kinalumsan">Kinalumsan</option>
									<option value="Guadalupe">Guadalupe</option>
								</select>
							</div>
							<div class="col-md-4">
								<label for="station-location">Bridge / Station Location</label>
								<select class="form-control" id="station-location" name="station-location">
                                    <option disabled="disabled" style="font-weight:bold;">Mahiga River</option>
									<option value='Gaisano, Bowlingplex Bridge'>Gaisano, Bowlingplex Bridge</option>
                                    
                                    <option disabled="disabled"></option>
                                    <option disabled="disabled" style="font-weight:bold;">Butuanon River</option>
									<option value='Canduman Bridge'>Canduman Bridge</option>
									<option value='Bacayan Bridge'>Bacayan Bridge</option>
									<option value='Sta. Lucia Bridge'>Sta. Lucia Bridge</option>
									<option value='Binaliw II Bridge'>Binaliw II Bridge</option>
									<option value='Candarong Bridge'>Candarong Bridge</option>
                                    
                                    <option disabled="disabled"></option>
                                    <option disabled="disabled" style="font-weight:bold;">Lahug River</option>
									<option value='Sudlon Bridge'>Sudlon Bridge</option>
									<option value='Kamputhaw Bridge'>Kamputhaw Bridge</option>
									<option value='Gen. Maxillom Bridge'>Gen. Maxillom Bridge</option>
									<option value='Imus Bridge'>Imus Bridge</option>
                                    
                                    <option disabled="disabled"></option>
                                    <option disabled="disabled" style="font-weight:bold;">Kinalumsan River</option>
									<option value='F. Llama Bridge'>F. Llama Bridge</option>
									<option value='Kinalumsan Bridge 1'>Kinalumsan Bridge 1</option>
                                    
                                    <option disabled="disabled"></option>
                                    <option disabled="disabled" style="font-weight:bold;">Guadalupe River</option>
									<option value='Sandayong Bridge'>Sandayong Bridge</option>
									<option value='Sanciangko Bridge'>Sanciangko Bridge</option>
									<option value='Tupaz Bridge'>Tupaz Bridge</option>
								</select>
							</div>
							<div class="col-md-4">
								<label for="barangay-location">Barangay Name</label>
                                <select class="form-control" id="barangay-location" name="barangay-location">
                                    <option disabled="disabled" style="font-weight:bold;">Mahiga River</option>
									<option value='Banilad'>Banilad</option>
                                    
                                    <option disabled="disabled"></option>
                                    <option disabled="disabled" style="font-weight:bold;">Butuanon River</option>
									<option value='Talamban'>Talamban</option>
									<option value='Bacayan'>Bacayan</option>
									<option value='Pulangbato'>Pulangbato</option>
                                    
                                    <option disabled="disabled"></option>
                                    <option disabled="disabled" style="font-weight:bold;">Lahug River</option>
									<option value='Lahug'>Lahug</option>
									<option value='Kamputhaw'>Kamputhaw</option>
									<option value='Lorega San Miguel'>Lorega San Miguel</option>
                                    
                                    <option disabled="disabled"></option>
                                    <option disabled="disabled" style="font-weight:bold;">Kinalumsan River</option>
									<option value='Tisa'>Tisa</option>
									<option value='Labangon'>Labangon</option>
                                    
                                    <option disabled="disabled"></option>
                                    <option disabled="disabled" style="font-weight:bold;">Guadalupe River</option>
									<option value='Guadalupe'>Guadalupe</option>
									<option value='Pahina Central'>Pahina Central</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<label for="sampling-date">Sampling Date (MM/DD/YYYY)</label>
								<input class="form-control" type="text" name="sampling-date" id="sampling-date" oninput="validateEverything();">
							</div>
							<div class="col-md-4">
								<label for="collection-time">Collection Time (HH:MM) [24 Hour Format]</label>
								<input class="form-control" type="text" name="collection-time" id="collection-time" oninput="validateEverything();">
							</div>
						</div>
					
						<div class="row">
							<div class="col-md-4">
								<label for="bod">Biological Oxygen Demand (BOD)</label>
								<input class="form-control" type="text" name="bod" id="bod" oninput="validateEverything();">
							</div>
							<div class="col-md-4">
								<label for="do">Dissolved Oxygen (DO)</label>
								<input class="form-control" type="text" name="do" id="do" oninput="validateEverything();">
							</div>
							<div class="col-md-4">
								<label for="tss">Total Suspended Solids (TSS)</label>
								<input class="form-control" type="text" name="tss" id="tss" oninput="validateEverything();">
							</div>
							<div class="col-md-4">
								<label for="ph">pH Level</label>
								<input class="form-control" type="text" name="ph" id="ph" oninput="validateEverything();">
							</div>
							<div class="col-md-4">
								<label for="temp">Temperature (&deg;C)</label>
								<input class="form-control" type="text" name="temp" id="temp" oninput="validateEverything();">
							</div>
						</div>
                        
                        <div class="row margin-top-20px">
							<div class="col-md-12">
                                <div id="captcha" data-callback="recaptchaCallback"></div>
                            </div>
                        </div>
                        
<!--
                        <div class="row margin-top-20px">
							<div class="col-md-12 checkbox">
                                <label><input type="checkbox" name="humanity" id="humanity" style="margin-top: -2px;" onclick="validateHumanity();">I am a human being</label>
                            </div>
                        </div>
-->
                        
						<div class="row" style="margin-bottom: 20px; margin-top: 20px;">
							<div class="col-md-12">
								<button class="btn btn-large" id="submit_button" disabled>Submit</button>
							</div>
						</div>
					<?php echo form_close() ?>
				</div>
			</div>
		</div>

		<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
        
        <script type="text/javascript">
            var onloadCallback = function() {
                grecaptcha.render('captcha', {
                    'sitekey' : '6Lcl0hIUAAAAAPG44lohE979o_ff8V1bclGYIl-x',
					'callback' : recaptchaCallback,
                    'expired-callback' : recaptchaExpiredCallback
                });
            };
			
			function recaptchaCallback() {
                $('#submit_button').removeAttr('disabled').removeClass('btn-disabled').addClass('btn-warning');
			};
            
			function recaptchaExpiredCallback() {
                var submitButton = document.getElementById('submit_button');
                
                submitButton.setAttribute('disabled', 'disabled');
                
                submitButton.setAttribute('class', 'btn btn-large btn-disabled');
			};
		</script>
		
<!--		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js" integrity="sha384-rKTMvx/cWxvpt3eeURe6VQURnDwC89gOVv+ZTXUh9EdIAN8FamukwzYJFY0GsrbN" crossorigin="anonymous"></script>-->
		
		<script src="<?php echo base_url() ?>resources/jquery-3.1.1/jquery-3.1.1.min.js"></script>
		
		<script>
			$(document).ready(function() {
				$("#river-location").change(function() {
					var riverValue = $(this).val();
                    switch(riverValue) {
                        case "Mahiga":
                            document.getElementById('station-location').value='Gaisano, Bowlingplex Bridge';
                            document.getElementById('barangay-location').value='Banilad';
                            break;
                        case "Butuanon":
                            document.getElementById('station-location').value='Canduman Bridge';
                            document.getElementById('barangay-location').value='Talamban';
                            break;
                        case "Guadalupe":
                            document.getElementById('station-location').value='Sandayong Bridge';
                            document.getElementById('barangay-location').value='Guadalupe';
                            break;
                        case "Kinalumsan":
                            document.getElementById('station-location').value='F. Llama Bridge';
                            document.getElementById('barangay-location').value='Tisa';
                            break;
                        case "Lahug":
                            document.getElementById('station-location').value='Sudlon Bridge';
                            document.getElementById('barangay-location').value='Lahug';
                            break;
                    }
				});
                
				$("#station-location").change(function() {
					var stationValue = $(this).val();
                    switch(stationValue) {
                        case "Gaisano, Bowlingplex Bridge":
                            document.getElementById('river-location').value='Mahiga';
                            document.getElementById('barangay-location').value='Banilad';
                            break;
                        case "Canduman Bridge":
                            document.getElementById('river-location').value='Butuanon';
                            document.getElementById('barangay-location').value='Talamban';
                            break;
                        case "Bacayan Bridge":
                            document.getElementById('river-location').value='Butuanon';
                            document.getElementById('barangay-location').value='Bacayan';
                            break;
                        case "Sta. Lucia Bridge":
                            document.getElementById('river-location').value='Butuanon';
                            document.getElementById('barangay-location').value='Pulangbato';
                            break;
                        case "Binaliw II Bridge":
                            document.getElementById('river-location').value='Butuanon';
                            document.getElementById('barangay-location').value='Pulangbato';
                            break;
                        case "Candarong Bridge":
                            document.getElementById('river-location').value='Butuanon';
                            document.getElementById('barangay-location').value='Pulangbato';
                            break;
                        case "Sandayong Bridge":
                            document.getElementById('river-location').value='Guadalupe';
                            document.getElementById('barangay-location').value='Guadalupe';
                            break;
                        case "Sanciangko Bridge":
                            document.getElementById('river-location').value='Guadalupe';
                            document.getElementById('barangay-location').value='Pahina Central';
                            break;
                        case "Tupaz Bridge":
                            document.getElementById('river-location').value='Guadalupe';
                            document.getElementById('barangay-location').value='Pahina Central';
                            break;
                        case "F. Llama Bridge":
                            document.getElementById('river-location').value='Kinalumsan';
                            document.getElementById('barangay-location').value='Tisa';
                            break;
                        case "Kinalumsan Bridge 1":
                            document.getElementById('river-location').value='Kinalumsan';
                            document.getElementById('barangay-location').value='Labangon';
                            break;
                        case "Sudlon Bridge":
                            document.getElementById('river-location').value='Lahug';
                            document.getElementById('barangay-location').value='Lahug';
                            break;
                        case "Kamputhaw Bridge":
                            document.getElementById('river-location').value='Lahug';
                            document.getElementById('barangay-location').value='Kamputhaw';
                            break;
                        case "Gen. Maxilom Bridge":
                            document.getElementById('river-location').value='Lahug';
                            document.getElementById('barangay-location').value='Kamputhaw';
                            break;
                        case "Imus Bridge":
                            document.getElementById('river-location').value='Lahug';
                            document.getElementById('barangay-location').value='Lorega San Miguel';
                            break;
                    }
				});
                
				$("#barangay-location").change(function() {
					var stationValue = $(this).val();
                    switch(stationValue) {
                        case "Banilad":
                            document.getElementById('river-location').value='Mahiga';
                            document.getElementById('station-location').value='Gaisano, Bowlingplex Bridge';
                            break;
                        case "Talamban":
                            document.getElementById('river-location').value='Butuanon';
                            document.getElementById('station-location').value='Canduman Bridge';
                            break;
                        case "Bacayan":
                            document.getElementById('river-location').value='Butuanon';
                            document.getElementById('station-location').value='Bacayan Bridge';
                            break;
                        case "Pulangbato":
                            document.getElementById('river-location').value='Butuanon';
                            document.getElementById('station-location').value='Sta. Lucia Bridge';
                            break;
                        case "Guadalupe":
                            document.getElementById('river-location').value='Guadalupe';
                            document.getElementById('station-location').value='Bacayan Bridge';
                            break;
                        case "Pahina Central":
                            document.getElementById('river-location').value='Guadalupe';
                            document.getElementById('station-location').value='Sanciangko Bridge';
                            break;
                        case "Lahug":
                            document.getElementById('river-location').value='Lahug';
                            document.getElementById('station-location').value='Sudlon Bridge';
                            break;
                        case "Kamputhaw":
                            document.getElementById('river-location').value='Lahug';
                            document.getElementById('station-location').value='Kamputhaw Bridge';
                            break;
                        case "Lorega San Miguel":
                            document.getElementById('river-location').value='Lahug';
                            document.getElementById('station-location').value='Imus Bridge';
                            break;
                        case "Tisa":
                            document.getElementById('river-location').value='Kinalumsan';
                            document.getElementById('station-location').value='F. Llama Bridge';
                            break;
                        case "Labangon":
                            document.getElementById('river-location').value='Kinalumsan';
                            document.getElementById('station-location').value='Kinalumsan Bridge 1';
                            break;
                    }
				});
			});
		</script>
        
        <script>                                      
//            function validateHumanity(humanityField) {
//                var submitButton = document.getElementById('submit_button');
//
//                if (humanity.checked == true) {
//                    submitButton.removeAttribute('disabled');
//                    submitButton.setAttribute('class', 'btn btn-large btn-warning')
//                } else {
//                    submitButton.setAttribute('disabled', 'disabled');
//                    submitButton.setAttribute('class', 'btn btn-large');
//                }
//            }
        </script>
        
        <script>
            $(document).ready(function() {
                validateEverything();
            });
        </script>
		
		<script>
            function validateEverything() {
                var isValidDate = validateMMDDYYYY(document.getElementById('sampling-date'));
                var isValidTime = validateHHMM(document.getElementById('collection-time'));
                var isValidBOD = validateBOD_TSS(document.getElementById('bod'));
                var isValidDO = validateDO(document.getElementById('do'));
                var isValidTSS = validateBOD_TSS(document.getElementById('tss'));
                var isValidpH = validatePH(document.getElementById('ph'));
                var isValidTemp = validateTemp(document.getElementById('temp'));
                
                if(isValidDate && isValidTime && isValidBOD && isValidDO && isValidTSS && isValidpH && isValidTemp) {
                    $('#captcha').show();
                    $('#submit_button').show();
                    return 0; //valid
                } else {
                    $('#captcha').hide();
                    $('#submit_button').hide();
                    return 1; //invalid
                }
            }
            
			function validateHHMM(inputField) {
				var isValid = /^([01]\d|2[0-3]):?([0-5]\d)$/.test(inputField.value);
				if (isValid) inputField.style.borderColor = '#4CAF50';
                else inputField.style.borderColor = '#F44336';
                return isValid;
			}
			
			function validateMMDDYYYY(inputField) {
				var isValid = /^((0[13578]|1[02])[\/.]31[\/.](19|20)[0-9]{2})$|^((01|0[3-9]|1[1-2])[\/.](29|30)[\/.](19|20)[0-9]{2})$|^((0[1-9]|1[0-2])[\/.](0[1-9]|1[0-9]|2[0-8])[\/.](19|20)[0-9]{2})$|^((02)[\/.]29[\/.](((19|20)(04|08|[2468][048]|[13579][26]))|2000))$/.test(inputField.value);
				if (isValid) inputField.style.borderColor = '#4CAF50';
                else inputField.style.borderColor = '#F44336'; 
				return isValid;
			}
            
            function validateBOD_TSS(inputField) {
                var isValid = /^([1-9][0-9]{0,2}|1000)$/.test(inputField.value);
                if (isValid) inputField.style.borderColor = '#4CAF50';
                else inputField.style.borderColor = '#F44336';
				return isValid;
            }
            
            function validateDO(inputField) {
                var isValid = /^[1-9][0-9]?$|^100$/.test(inputField.value);
                if (isValid) inputField.style.borderColor = '#4CAF50';
                else inputField.style.borderColor = '#F44336';
				return isValid;
            }
            
            function validatePH(inputField) {
                var isValid = /^(([1-9]|1[0-3])(\.\d\d?)?|14(\.00?)?)$/.test(inputField.value);
                if (isValid) inputField.style.borderColor = '#4CAF50';
                else inputField.style.borderColor = '#F44336';
				return isValid;
            }
            
            function validateTemp(inputField) {
                var isValid = /^([1-4][0-9])(\.[0-9])?$/.test(inputField.value);
                if (isValid) inputField.style.borderColor = '#4CAF50';
                else inputField.style.borderColor = '#F44336';
				return isValid;
            }
		</script>
		
<!--		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js" integrity="sha384-vOWIrgFbxIPzY09VArRHMsxned7WiY6hzIPtAIIeTFuii9y3Cr6HE6fcHXy5CFhc" crossorigin="anonymous"></script>-->
		
		<script src="<?php echo base_url() ?>resources/bootstrap-3.3.7/bootstrap.min.js"></script>
	</body>
</html>