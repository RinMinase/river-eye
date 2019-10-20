<!DOCTYPE html>

<html>
	<head>
        <style type="text/css">
            .container {
                width: 100%;
                height: 90%;
                vertical-align: middle;
            }
        </style>
        
		<title>404 Not Found</title>

	</head>
	<body>
		<?php 
			echo anchor('index', 'Go Back');
		?>
        <br>
        
        <div class="container">
            <img src="<?php echo base_url() ?>resources/img/404_img.png" />
        </div>
        
        
	</body>
</html>