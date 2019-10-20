<!DOCTYPE html>

<html>
	<head>
		<title>Regression (Index)</title>

<!--
		<script type="text/javascript">
		var onloadCallback = function() {
			grecaptcha.render('html_element', {
				'sitekey' : '6Lcl0hIUAAAAAPG44lohE979o_ff8V1bclGYIl-x',
				'theme' : 'dark'
			});
		};
		</script>
-->
	</head>
	<body>
		<?php 
			echo anchor('input', 'Insert Values');
		?>
        <br>
		<?php 
			echo anchor('chart', 'Show Chart');
		?>
        <br>
		<?php 
			echo anchor('add_station', 'Add Station');
		?>
        <br>
		<?php 
			echo anchor('edit_wqstd', 'Edit Water Quality Standard Level');
		?>
        
<!--
        <form action="?" method="POST">
			<div id="html_element"></div>
			<br>
			<input type="submit" value="Submit">
		</form>
		<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
		async defer></script>
-->
	</body>
</html>