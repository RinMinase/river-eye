<!DOCTYPE html>

<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<!--		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css" integrity="sha384-4FeI0trTH/PCsLWrGCD1mScoFu9Jf2NdknFdFoJhXZFwsvzZ3Bo5sAh7+zL8Xgnd" crossorigin="anonymous">-->
		
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/bootstrap-2.3.2/bootstrap.min.css">

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
				<div class="span12">
					<h2>Input Data</h2>
					<hr>
<!--					<form>-->
					<?php echo form_open('validateWaterData') ?>
						<div class="row">
							<div class="span4">
								<label for="river-location">River Location</label>
								<select id="river-location" name="river-location">
									<option value="Mahiga">Mahiga</option>
									<option value="Butuanon">Butuanon</option>
									<option value="Lahug">Lahug</option>
									<option value="Kinalumsan">Kinalumsan</option>
									<option value="Guadalupe">Guadalupe</option>
								</select>
							</div>
							<div class="span4">
								<label for="station-location">Bridge / Station Location</label>
								<select id="station-location" name="station-location">
									<option value='Gaisano, Bowlingplex Bridge'>Gaisano, Bowlingplex Bridge</option>
								</select>
							</div>
							<div class="span4">
								<label for="barangay-location">Barangay Name</label>
								<input type="text" name=barangay-location id="barangay-location" value="Banilad" disabled />
							</div>
							
						</div>
						<div class="row">
							<div class="span4">
								<label for="sampling-date">Sampling Date (MM/DD/YYYY)</label>
								<input type="text" name="sampling-date" onblur="validateMMDDYYYY(this);">
							</div>
							<div class="span4">
								<label for="collection-time">Collection Time (HH:MM) [24 Hour Format]</label>
								<input type="text" name="collection-time"  onchange="validateHHMM(this);" onkeydown="validateHHMM(this);" onkeypress="validateHHMM(this);" onkeyup="validateHHMM(this);" onblur="validateHHMM(this);">
							</div>
						</div>
					
						<div class="row">
							<div class="span4">
								<label for="bod">Biological Oxygen Demand (BOD)</label>
								<input type="text" name="bod" onblur="validateNumber(this)">
							</div>
							<div class="span4">
								<label for="do">Dissolved Oxygen (DO)</label>
								<input type="text" name="do" onblur="validateNumber(this)">
							</div>
							<div class="span4">
								<label for="tss">Total Suspended Solids (TSS)</label>
								<input type="text" name="tss" onblur="validateNumber(this)">
							</div>
							<div class="span4">
								<label for="ph">pH Level</label>
								<input type="text" name="ph" onblur="validateNumber(this)">
							</div>
							<div class="span4">
								<label for="temp">Temperature (&deg;C)</label>
								<input type="text" name="temp" onblur="validateNumber(this)">
							</div>
						</div>
                        
                        <div class="row margin-top-20px">
							<div class="span10">
                                <div id="captcha" data-callback="recaptchaCallback"></div>
                            </div>
                        </div>
                        
                        <div class="row margin-top-20px">
							<div class="span10">
                                <input type="checkbox" name="humanity" id="humanity" style="margin-top: -2px;" onclick="validateHumanity();">
                                <span>I am a human being</span>
                            </div>
                        </div>
                    
                        
                        
						<div class="row margin-top-20px">
							<div class="span10">
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
//                    'theme' : 'dark',
					'callback' : recaptchaCallback
                });
            };
			
			function recaptchaCallback() {
				$('#submit_button').removeAttr('disabled').removeClass('btn-disabled').addClass('btn-warning');
			};
		</script>
		
<!--		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js" integrity="sha384-rKTMvx/cWxvpt3eeURe6VQURnDwC89gOVv+ZTXUh9EdIAN8FamukwzYJFY0GsrbN" crossorigin="anonymous"></script>-->
		
		<script src="<?php echo base_url() ?>resources/jquery-3.1.1/jquery-3.1.1.min.js"></script>
		
		<script>
			$(document).ready(function() {
				$("#river-location").change(function() {
					var riverValue = $(this).val();
					if (riverValue == "Mahiga") {
						$("#station-location").html("<option value='Gaisano, Bowlingplex Bridge'>Gaisano, Bowlingplex Bridge</option>");
						$("#barangay-location").val('Banilad');
					} else if (riverValue == "Butuanon") {
						$("#station-location").html("<option value='Canduman Bridge'>Canduman Bridge</option><option value='Bacayan Bridge'>Bacayan Bridge</option><option value='Sta. Lucia Bridge'>Sta. Lucia Bridge</option><option value='Binaliw II Bridge'>Binaliw II Bridge</option><option value='Candarong Bridge'>Candarong Bridge</option>");
						$("#barangay-location").val('Talamban');
					} else if (riverValue == "Guadalupe") {
						$("#station-location").html("<option value='Sandayong Bridge'>Sandayong Bridge</option><option value='Sanciangko Bridge'>Sanciangko Bridge</option><option value='Tupaz Bridge'>Tupaz Bridge</option>");
						$("#barangay-location").val('Guadalupe');
					} else if (riverValue == "Kinalumsan") {
						$("#station-location").html("<option value='F. Llama Bridge'>F. Llama Bridge</option><option value='Kinalumsan Bridge'>Kinalumsan Bridge</option>");
						$("#barangay-location").val('Tisa');
					} else if (riverValue == "Lahug") {
						$("#station-location").html("<option value='Sudlon Bridge'>Sudlon Bridge</option><option value='Kamputhaw Bridge'>Kamputhaw Bridge</option><option value='Gen. Maxilom Bridge'>Gen. Maxilom Bridge</option><option value='Imus Bridge'>Imus Bridge</option>");
						$("#barangay-location").val('Lahug');
					}
				});
			});
		</script>
		
		<script>
			$(document).ready(function() {
				$("#station-location").change(function() {
					var stationValue = $(this).val();
					if (stationValue == "Gaisano Bowlingplex Bridge") $("#barangay-location").val('Banilad');
					else if (stationValue == "Canduman Bridge") $("#barangay-location").val('Talamban');
					else if (stationValue == "Bacayan Bridge") $("#barangay-location").val('Bacayan');
					else if (stationValue == "Sta. Lucia Bridge") $("#barangay-location").val('Pulangbato');
					else if (stationValue == "Binaliw II Bridge") $("#barangay-location").val('Pulangbato');
					else if (stationValue == "Candarong Bridge") $("#barangay-location").val('Pulangbato');
					else if (stationValue == "Sandayong Bridge") $("#barangay-location").val('Guadalupe');
					else if (stationValue == "Sanciangko Bridge") $("#barangay-location").val('Pahina Central');
					else if (stationValue == "Tupaz Bridge") $("#barangay-location").val('Pahina Central');
					else if (stationValue == "F.Llama Bridge") $("#barangay-location").val('Tisa');
					else if (stationValue == "Kinalumsan Bridge") $("#barangay-location").val('Labangon');
					else if (stationValue == "Sudlon Bridge") $("#barangay-location").val('Lahug');
					else if (stationValue == "Kamputhaw Bridge") $("#barangay-location").val('Kamputhaw');
					else if (stationValue == "Gen. Maxilom Bridge") $("#barangay-location").val('Kamputhaw');
					else if (stationValue == "Imus Bridge") $("#barangay-location").val('Lorega San Miguel');
				});
			});
		
		</script>
        
        <script>                                      
            function validateHumanity(humanityField) {
                var submitButton = document.getElementById('submit_button');

                if (humanity.checked == true) {
                    submitButton.removeAttribute('disabled');
                    submitButton.setAttribute('class', 'btn btn-large btn-warning')
                } else {
                    submitButton.setAttribute('disabled', 'disabled');
                    submitButton.setAttribute('class', 'btn btn-large');
                }
            }
        </script>
		
		<script>
			function validateHHMM(inputField) {
                var submitButton = document.getElementById('submit_button');
				var isValid = /^([01]\d|2[0-3]):?([0-5]\d)$/.test(inputField.value);
				if (isValid) { 
                    inputField.style.borderColor = '#4CAF50';
//                    submitButton.removeAttribute('disabled');
                } else { 
                    inputField.style.borderColor = '#F44336';
                    submitButton.setAttribute('disabled', 'disabled');
                }
				return isValid;
			}
			
			function validateMMDDYYYY(inputField) {
//				31 day (0[13578]|1[02])[\/.](0[1-9]|[12][0-9]|3[01])[\/.](18|19|20)[0-9]{2}
//				30 day (0[469]|11)[\/.](0[1-9]|[12][0-9]|30)[\/.](18|19|20)[0-9]{2}
//				feb nonleapyr (02)[\/.](0[1-9]|1[0-9]|2[0-8])[\/.](18|19|20)[0-9]{2}
//				feb leapyr (02)[\/.]29[\/.](((18|19|20)(04|08|[2468][048]|[13579][26]))|2000)
//				merged* ((0[13578]|1[02])[\/.](0[1-9]|[12][0-9]|3[01])[\/.](18|19|20)[0-9]{2})|((0[469]|11)[\/.](0[1-9]|[12][0-9]|30)[\/.](18|19|20)[0-9]{2})|((02)[\/.](0[1-9]|1[0-9]|2[0-8])[\/.](18|19|20)[0-9]{2})|((02)[\/.]29[\/.](((18|19|20)(04|08|[2468][048]|[13579][26]))|2000))
//				shorterVersion* ((0[13578]|1[02])[\/.]31[\/.](18|19|20)[0-9]{2})|((01|0[3-9]|1[1-2])[\/.](29|30)[\/.](18|19|20)[0-9]{2})|((0[1-9]|1[0-2])[\/.](0[1-9]|1[0-9]|2[0-8])[\/.](18|19|20)[0-9]{2})|((02)[\/.]29[\/.](((18|19|20)(04|08|[2468][048]|[13579][26]))|2000))
				
//				var isValid = /^(0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])[- \/.](19|20)\d\d$/.test(inputField.value);
				
                var submitButton = document.getElementById('submit_button');
				var isValid = /^((0[13578]|1[02])[\/.]31[\/.](19|20)[0-9]{2})|((01|0[3-9]|1[1-2])[\/.](29|30)[\/.](19|20)[0-9]{2})|((0[1-9]|1[0-2])[\/.](0[1-9]|1[0-9]|2[0-8])[\/.](19|20)[0-9]{2})|((02)[\/.]29[\/.](((19|20)(04|08|[2468][048]|[13579][26]))|2000))$/.test(inputField.value);
				if (isValid) {
                    inputField.style.borderColor = '#4CAF50';
//                    submitButton.removeAttribute('disabled');
                } else { 
                    inputField.style.borderColor = '#F44336'; 
                    submitButton.setAttribute('disabled', 'disabled');
                }

				return isValid;
			}
			
			function validateNumber(inputField) {
                var submitButton = document.getElementById('submit_button');
				var isValid = /^(?:[1-9]\d*|0)?(?:\.\d+)?$/.test(inputField.value);
				if (isValid) {
                    inputField.style.borderColor = '#4CAF50';
//                    submitButton.removeAttribute('disabled');
                } else {
                    inputField.style.borderColor = '#F44336';
                    submitButton.setAttribute('disabled', 'disabled');
                }

				return isValid;
			}
		</script>
		
<!--		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js" integrity="sha384-vOWIrgFbxIPzY09VArRHMsxned7WiY6hzIPtAIIeTFuii9y3Cr6HE6fcHXy5CFhc" crossorigin="anonymous"></script>-->
		
		<script src="<?php echo base_url() ?>resources/bootstrap-2.3.2/bootstrap.min.js"></script>
	</body>
</html>