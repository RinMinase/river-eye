<!DOCTYPE html>

<?php
    function cmp($a,$b) {
        if ($a==$b) return 0;
        return ($a<$b)?-1:1;
    }

    function neg_cmp($a,$b) {
        if ($a==$b) return 0;
        return ($a<$b)?1:-1;
    }
?>


<html>
	<head>
	
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<!-- https://www.srihash.org/ -->
		<!--   -->

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css" integrity="sha384-4FeI0trTH/PCsLWrGCD1mScoFu9Jf2NdknFdFoJhXZFwsvzZ3Bo5sAh7+zL8Xgnd" crossorigin="anonymous">
		
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/bootstrap-2.3.2/bootstrap.min.css">

		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

		<!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"> -->

		<!-- <link rel="stylesheet" href="./bootstrap-2.3.2/bootstrap.min.css"> -->

		<title>Chart</title>

		<style type="text/css">

			body {
				background-color: #0e223d;
				color: #000;
			}

			.nav.nav-tabs.top-tabs > li > a {
				border-radius: 8px 8px 0 0;
				padding: 8px 8px;
				color: black;
			}

			.nav.nav-tabs.top-tabs > li:not(.active) > a {
				background-color: #e0e0e0;
			}

			.nav.nav-tabs.top-tabs > li.active > a {
				background-color: #ffffff;
			}

			.tabs-left > .nav-tabs {
				border-bottom: 0;
			}

			.tab-content > .tab-pane {
				display: none;
			}

			.tab-content > .active {
				display: block;
			}

			.tabs-left > .nav-tabs > li {
				float: none;
			}

			.tabs-left > .nav-tabs > li > a {
				min-width: 74px;
				margin-right: 0;
				margin-bottom: 3px;
			}

			.tabs-left > .nav-tabs {
				float: left;
				margin-right: 0px;
				margin-top: 37px;
				border-right: 1px solid #ddd;
			}

			.tabs-left > .nav-tabs > li > a {
				margin-right: -1px;
				border-radius: 8px 0 0 8px;
			}

			.tabs-left > .nav-tabs > li > a:hover,
			.tabs-left > .nav-tabs > li > a:focus {
				border-color: #eeeeee #dddddd #eeeeee #eeeeee;
			}

			.tabs-left > .nav-tabs .active > a,
			.tabs-left > .nav-tabs .active > a:hover,
			.tabs-left > .nav-tabs .active > a:focus {
				border-color: #ddd transparent #ddd #ddd;
				*border-right-color: #ffffff;
			}

			.tab-pane > p {
				margin: 5px 15px;
			}

			li > a.guadalupe {
				background-color: #B3E5FC;
			}

			li.active > a.guadalupe,
			li.active > a.guadalupe:focus,
			li.active > a.guadalupe:hover {
				background-color: #E1F5FE;
			}

			li > a.butuanon {
				background-color: #EF9A9A;
			}

			li.active > a.butuanon,
			li.active > a.butuanon:focus,
			li.active > a.butuanon:hover {
				background-color: #FFCDD2;
			}

			li > a.mahiga {
				background-color: #A5D6A7;
			}

			li.active > a.mahiga,
			li.active > a.mahiga:focus,
			li.active > a.mahiga:hover {
				background-color: #C8E6C9;
			}

			li > a.lahug {
				background-color: #E1BEE7;
			}

			li.active > a.lahug,
			li.active > a.lahug:focus,
			li.active > a.lahug:hover {
				background-color: #F3E5F5;
			}

			li > a.kinalumsan {
				background-color: #F8BBD0;
			}

			li.active > a.kinalumsan,
			li.active > a.kinalumsan:focus,
			li.active > a.kinalumsan:hover {
				background-color: #FCE4EC;
			}

			ul.nav > li p {
				margin-bottom: 0px;
				color: #555555
			}

			ul.nav > li p.station-name {
				font-size: smaller;
				font-style: italic;
				margin-left: 8px;
			}

			ul.nav > li.active p.city-name {
				font-weight: bold;
			}

			.indicator {
				display: inline-block;
				width: 42px;
				height: 12px;
				border: 1px solid #dddddd;
			}

			.indicator-text {
				display: inline-block;
				font-size: small;
				color: #eeeeee;
			}

			.indicator.guadalupe {
				background-color: #B3E5FC;
			}

			.indicator.butuanon {
				background-color: #EF9A9A;
			}

			.indicator.mahiga {
				background-color: #A5D6A7;
			}

			.indicator.lahug {
				background-color: #E1BEE7;
			}

			.indicator.kinalumsan {
				background-color: #F8BBD0;
			}

			h3 {
				color: #555555;
			}

			table th,
			table td {
				color: #777777
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<h1 style="color: #fff">River Data</h1>
			</div>
			<div class="row">
				<div class="span12">
					<div class="row">
						<div class="span2">
							<div class="indicator guadalupe"></div>
							<div class="indicator-text guadalupe">Guadalupe River</div>
						</div>
						<div class="span2">
							<div class="indicator butuanon"></div>	
							<div class="indicator-text guadalupe">Butuanon River</div>
						</div>
						<div class="span2">
							<div class="indicator mahiga"></div>
							<div class="indicator-text guadalupe">Mahiga River</div>
						</div>
						<div class="span2">
							<div class="indicator lahug"></div>
							<div class="indicator-text guadalupe">Lahug River</div>
						</div>
						<div class="span2">
							<div class="indicator kinalumsan"></div>
							<div class="indicator-text guadalupe">Kinalumsan River</div>
						</div>
					</div>
				</div>

				<div class="span12" style="margin-top: 25px;">
					<div class="tabbable tabs-left">
						<ul class="nav nav-tabs">
							<li class="active">
								<a class="guadalupe" href="#guadalupe1">
									<p class="city-name">Guadalupe</p>
									<p class="station-name">Sandayong Bridge</p>
								</a>
							</li>
							<li>
								<a class="guadalupe" href="#guadalupe2">
									<p class="city-name">Pahina Central</p>
									<p class="station-name">Sanciangko Bridge</p>
								</a>
							</li>
							<li>
								<a class="guadalupe" href="#guadalupe3">
									<p class="city-name">Pahina Central</p>
									<p class="station-name">Tupaz Bridge</p>
								</a>
							</li>
							<li>
								<a class="butuanon" href="#butuanon1">
									<p class="city-name">Talamban</p>
									<p class="station-name">Canduman Bridge</p>
								</a>
							</li>
							<li>
								<a class="butuanon" href="#butuanon2">
									<p class="city-name">Bacayan</p>
									<p class="station-name">Bacayan Bridge</p>
								</a>
							</li>
							<li>
								<a class="butuanon" href="#butuanon3">
									<p class="city-name">Pulangbato</p>
									<p class="station-name">Sta. Lucia Bridge</p>
								</a>
							</li>
							<li>
								<a class="butuanon" href="#butuanon4">
									<p class="city-name">Pulangbato</p>
									<p class="station-name">Binaliw II Bridge</p>
								</a>
							</li>
							<li>
								<a class="butuanon" href="#butuanon5">
									<p class="city-name">Pulangbato</p>
									<p class="station-name">Candarong Bridge</p>
								</a>
							</li>
							<li>
								<a class="mahiga" href="#mahiga1">
									<p class="city-name">Banilad</p>
									<p class="station-name">Gaisano, Bowlingplex<br>Bridge</p>
								</a>
							</li>
							<li>
								<a class="lahug" href="#lahug1">
									<p class="city-name">Lahug</p>
									<p class="station-name">Sudlon Bridge</p>
								</a>
							</li>
							<li>
								<a class="lahug" href="#lahug2">
									<p class="city-name">Kamputhaw</p>
									<p class="station-name">Kamputhaw Bridge</p>
								</a>
							</li>
							<li>
								<a class="lahug" href="#lahug3">
									<p class="city-name">Kamputhaw</p>
									<p class="station-name">Gen. Maxilom Bridge</p>
								</a>
							</li>
							<li>
								<a class="lahug" href="#lahug4">
									<p class="city-name">Lorega San Miguel</p>
									<p class="station-name">Imus Bridge</p>
								</a>
							</li>
							<li>
								<a class="kinalumsan" href="#kinalumsan1">
									<p class="city-name">Tisa</p>
									<p class="station-name">F. Llama Bridge</p>
								</a>
							</li>
							<li>
								<a class="kinalumsan" href="#kinalumsan2">
									<p class="city-name">Labangon</p>
									<p class="station-name">Kinalumsan Bridge 1</p>
								</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="guadalupe1">
								<div class="tabbable">
									<ul class="nav nav-tabs top-tabs" style="margin-bottom: 0px;" id="guadalupe_years">
										<li class="active">
											<a href="#guadalupe_2014">(s) 2014</a>
										</li>
										<li>
											<a href="#guadalupe_2012">(s) 2012</a>
										</li>
                                        
                                        <?php
                                            $header_query = $this->db->query("SELECT collection_datetime FROM riverdata WHERE station='Sandayong Bridge'");
              
                                            $years = [];
              
                                            foreach ($header_query->result() as $row) {
                                                array_push($years, date("Y", strtotime($row->collection_datetime)));
                                            }
                                            
                                            $years = array_unique($years);
                                            usort($years, "neg_cmp");
                                            
//                                            $i = 0;
                                            foreach ($years as $x) {
//                                                if ($i == 0) {
//                                                    echo "<li class='active'><a href='#guadalupe_sandayong_". $x . "'>" . $x . "</a></li>";
//                                                } else {
                                                    echo "<li><a href='#guadalupe_sandayong_". $x . "'>" . $x . "</a></li>";
//                                                }
//                                                $i++;
                                            }
    
                                        ?>
										
										<li class="dropdown" style="float: right;">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="margin-right: 0px;">More&nbsp;&nbsp;<!-- <i class="fa fa-chevron-down" aria-hidden="true"></i> --><span class="caret"></span></a>
											<ul class="dropdown-menu" role="menu" id="guadalupe_more_years"></ul>
										</li> 

										
									</ul>
									<div class="tab-content" style="padding-top: 10px; background-color: #ffffff;">
										<div class="tab-pane fade active in" id="guadalupe_2014">
											<div class="span10" style="color: #555555; margin-bottom: 25px;">
												<h3 style="margin: 0px;">Guadalupe River (Year 2014)</h3>
												<h4 style="margin: 0px;">Barangay Guadalupe</h4>
												<h5 style="margin: 0px;">Sandayong Bridge</h5>
											</div>

											<div class="span10">
												<!-- <canvas id="chart-bod"></canvas> -->

												<?php
													$query = $this->db->query("SELECT * FROM riverdata WHERE station='Sandayong Bridge'");
												?>

												<h3>Biological Oxygen Demand (BOD)</h3>

												<div class="span4" style="margin-left: 0px;">
													<table class="table table-bordered">
														<thead>
															<tr>
																<th colspan="2" style="text-align: center;">Initial Points / Values</th>
															</tr>
															<tr>
																<th>Date</th>
																<th>Value</th>
															</tr>
														</thead>
														<tbody>
															<?php
																foreach ($query->result() as $row) {
																	echo "<tr><td>".date("F d Y", strtotime($row->collection_datetime))."</td>";
																	echo "<td>".$row->BOD."</td></tr>";
																}
															?>

															<!-- <tr>
																<td>January 2014</td>
																<td>4.0</td>
															</tr>
															<tr>
																<td>February 2014</td>
																<td>3.0</td>
															</tr>
															<tr>
																<td>March 2014</td>
																<td>5.0</td>
															</tr>
															<tr>
																<td>April 2014</td>
																<td>5.2</td>
															</tr>
															<tr>
																<td>May 2014</td>
																<td>4.6</td>
															</tr>
															<tr>
																<td>June 2014</td>
																<td>4.9</td>
															</tr>
															<tr>
																<td>July 2014</td>
																<td>4.2</td>
															</tr> -->
														</tbody>
													</table>
												</div>

												<div class="span4">
													<table class="table table-bordered">
														<thead>
															<tr>
																<th colspan="2" style="text-align: center; color: orange;">Regression Points / Values</th>
															</tr>
															<tr>
																<th>Date</th>
																<th>Value</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>August 2014</td>
																<td>4.0</td>
															</tr>
															<tr>
																<td>September 2014</td>
																<td>4.1</td>
															</tr>
															<tr>
																<td>October 2014</td>
																<td>4.6</td>
															</tr>
															<tr>
																<td>November 2014</td>
																<td>4.2</td>
															</tr>
															<tr>
																<td>December 2014</td>
																<td>4.5</td>
															</tr>
															<tr>
																<td>January 2015</td>
																<td>4.9</td>
															</tr>
															<tr>
																<td>February 2015</td>
																<td>4.3</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>

											<div class="span10">
												<!-- <canvas id="chart-bod"></canvas> -->

												<h3>Dissolved Oxygen (DO)</h3>

												<div class="span4" style="margin-left: 0px;">
													<table class="table table-bordered">
														<thead>
															<tr>
																<th colspan="2" style="text-align: center;">Initial Points / Values</th>
															</tr>
															<tr>
																<th>Date</th>
																<th>Value</th>
															</tr>
														</thead>
														<tbody>
															<?php
																foreach ($query->result() as $row) {
																	echo "<tr><td>".date("F d", strtotime($row->collection_datetime))."</td>";
																	echo "<td>".$row->DO."</td></tr>";
																}
															?>

															<!-- <tr>
																<td>January 2014</td>
																<td>4.0</td>
															</tr>
															<tr>
																<td>February 2014</td>
																<td>3.0</td>
															</tr>
															<tr>
																<td>March 2014</td>
																<td>5.0</td>
															</tr>
															<tr>
																<td>April 2014</td>
																<td>5.2</td>
															</tr>
															<tr>
																<td>May 2014</td>
																<td>4.6</td>
															</tr>
															<tr>
																<td>June 2014</td>
																<td>4.9</td>
															</tr>
															<tr>
																<td>July 2014</td>
																<td>4.2</td>
															</tr> -->
														</tbody>
													</table>
												</div>

												<div class="span4">
													<table class="table table-bordered">
														<thead>
															<tr>
																<th colspan="2" style="text-align: center; color: orange;">Regression Points / Values</th>
															</tr>
															<tr>
																<th>Date</th>
																<th>Value</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>August 2014</td>
																<td>4.0</td>
															</tr>
															<tr>
																<td>September 2014</td>
																<td>4.1</td>
															</tr>
															<tr>
																<td>October 2014</td>
																<td>4.6</td>
															</tr>
															<tr>
																<td>November 2014</td>
																<td>4.2</td>
															</tr>
															<tr>
																<td>December 2014</td>
																<td>4.5</td>
															</tr>
															<tr>
																<td>January 2015</td>
																<td>4.9</td>
															</tr>
															<tr>
																<td>February 2015</td>
																<td>4.3</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>

											<div class="span10">
												<!-- <canvas id="chart-bod"></canvas> -->

												<h3>Total Suspended Solids (TSS)</h3>

												<div class="span4" style="margin-left: 0px;">
													<table class="table table-bordered">
														<thead>
															<tr>
																<th colspan="2" style="text-align: center;">Initial Points / Values</th>
															</tr>
															<tr>
																<th>Date</th>
																<th>Value</th>
															</tr>
														</thead>
														<tbody>
															<?php
																foreach ($query->result() as $row) {
																	echo "<tr><td>".date("F d", strtotime($row->collection_datetime))."</td>";
																	echo "<td>".$row->TSS."</td></tr>";
																}
															?>

															<!-- <tr>
																<td>January 2014</td>
																<td>4.0</td>
															</tr>
															<tr>
																<td>February 2014</td>
																<td>3.0</td>
															</tr>
															<tr>
																<td>March 2014</td>
																<td>5.0</td>
															</tr>
															<tr>
																<td>April 2014</td>
																<td>5.2</td>
															</tr>
															<tr>
																<td>May 2014</td>
																<td>4.6</td>
															</tr>
															<tr>
																<td>June 2014</td>
																<td>4.9</td>
															</tr>
															<tr>
																<td>July 2014</td>
																<td>4.2</td>
															</tr> -->
														</tbody>
													</table>
												</div>

												<div class="span4">
													<table class="table table-bordered">
														<thead>
															<tr>
																<th colspan="2" style="text-align: center; color: orange;">Regression Points / Values</th>
															</tr>
															<tr>
																<th>Date</th>
																<th>Value</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>August 2014</td>
																<td>4.0</td>
															</tr>
															<tr>
																<td>September 2014</td>
																<td>4.1</td>
															</tr>
															<tr>
																<td>October 2014</td>
																<td>4.6</td>
															</tr>
															<tr>
																<td>November 2014</td>
																<td>4.2</td>
															</tr>
															<tr>
																<td>December 2014</td>
																<td>4.5</td>
															</tr>
															<tr>
																<td>January 2015</td>
																<td>4.9</td>
															</tr>
															<tr>
																<td>February 2015</td>
																<td>4.3</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>

											<div class="span10">
												<!-- <canvas id="chart-bod"></canvas> -->

												<h3>pH Level</h3>

												<div class="span4" style="margin-left: 0px;">
													<table class="table table-bordered">
														<thead>
															<tr>
																<th colspan="2" style="text-align: center;">Initial Points / Values</th>
															</tr>
															<tr>
																<th>Date</th>
																<th>Value</th>
															</tr>
														</thead>
														<tbody>
															<?php
																foreach ($query->result() as $row) {
																	echo "<tr><td>".date("F d", strtotime($row->collection_datetime))."</td>";
																	echo "<td>".$row->pH."</td></tr>";
																}
															?>

															
															<!-- <tr>
																<td>January 2014</td>
																<td>4.0</td>
															</tr>
															<tr>
																<td>February 2014</td>
																<td>3.0</td>
															</tr>
															<tr>
																<td>March 2014</td>
																<td>5.0</td>
															</tr>
															<tr>
																<td>April 2014</td>
																<td>5.2</td>
															</tr>
															<tr>
																<td>May 2014</td>
																<td>4.6</td>
															</tr>
															<tr>
																<td>June 2014</td>
																<td>4.9</td>
															</tr>
															<tr>
																<td>July 2014</td>
																<td>4.2</td>
															</tr> -->
														</tbody>
													</table>
												</div>

												<div class="span4">
													<table class="table table-bordered">
														<thead>
															<tr>
																<th colspan="2" style="text-align: center; color: orange;">Regression Points / Values</th>
															</tr>
															<tr>
																<th>Date</th>
																<th>Value</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>August 2014</td>
																<td>4.0</td>
															</tr>
															<tr>
																<td>September 2014</td>
																<td>4.1</td>
															</tr>
															<tr>
																<td>October 2014</td>
																<td>4.6</td>
															</tr>
															<tr>
																<td>November 2014</td>
																<td>4.2</td>
															</tr>
															<tr>
																<td>December 2014</td>
																<td>4.5</td>
															</tr>
															<tr>
																<td>January 2015</td>
																<td>4.9</td>
															</tr>
															<tr>
																<td>February 2015</td>
																<td>4.3</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>

											<div class="span10">
												<!-- <canvas id="chart-bod"></canvas> -->

												<h3>Temperature (&deg;C)</h3>

												<div class="span4" style="margin-left: 0px;">
													<table class="table table-bordered">
														<thead>
															<tr>
																<th colspan="2" style="text-align: center;">Initial Points / Values</th>
															</tr>
															<tr>
																<th>Date</th>
																<th>Value</th>
															</tr>
														</thead>
														<tbody>
															<?php
																foreach ($query->result() as $row) {
																	echo "<tr><td>".date("F d", strtotime($row->collection_datetime))."</td>";
																	echo "<td>".$row->TMP."</td></tr>";
																}
															?>

															
															<!-- <tr>
																<td>January 2014</td>
																<td>4.0</td>
															</tr>
															<tr>
																<td>February 2014</td>
																<td>3.0</td>
															</tr>
															<tr>
																<td>March 2014</td>
																<td>5.0</td>
															</tr>
															<tr>
																<td>April 2014</td>
																<td>5.2</td>
															</tr>
															<tr>
																<td>May 2014</td>
																<td>4.6</td>
															</tr>
															<tr>
																<td>June 2014</td>
																<td>4.9</td>
															</tr>
															<tr>
																<td>July 2014</td>
																<td>4.2</td>
															</tr> -->
														</tbody>
													</table>
												</div>

												<div class="span4">
													<table class="table table-bordered">
														<thead>
															<tr>
																<th colspan="2" style="text-align: center; color: orange;">Regression Points / Values</th>
															</tr>
															<tr>
																<th>Date</th>
																<th>Value</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>August 2014</td>
																<td>4.0</td>
															</tr>
															<tr>
																<td>September 2014</td>
																<td>4.1</td>
															</tr>
															<tr>
																<td>October 2014</td>
																<td>4.6</td>
															</tr>
															<tr>
																<td>November 2014</td>
																<td>4.2</td>
															</tr>
															<tr>
																<td>December 2014</td>
																<td>4.5</td>
															</tr>
															<tr>
																<td>January 2015</td>
																<td>4.9</td>
															</tr>
															<tr>
																<td>February 2015</td>
																<td>4.3</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>

											<!-- <div class="span6"> -->
												<!-- <canvas id="chart-do"></canvas> -->
											<!-- </div> -->
											<!-- <div class="span6"> -->
												<!-- <canvas id="chart-tss"></canvas> -->
											<!-- </div> -->
											<!-- <div class="span6"> -->
												<!-- <canvas id="chart-ph"></canvas> -->
											<!-- </div> -->
											<!-- <div class="span6"> -->
												<!-- <canvas id="chart-temp"></canvas> -->
											<!-- </div> -->
										</div>
										<div class="tab-pane fade in" id="guadalupe_2012">
											<p>Guadlupe 2012 data</p>
										</div>
										<div class="tab-pane fade in" id="guadalupe_2010">
											<p>Guadlupe 2010 data</p>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="mahiga">
								<div class="tabbable">
									<ul class="nav nav-tabs">
										<li class="active"><a href="#mahiga-2010">2010</a>
										</li>
										<li><a href="#mahiga-2012">2012</a>
										</li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane fade active in" id="mahiga-2010">
											<p>Mahiga 2010 data</p>
										</div>
										<div class="tab-pane fade" id="mahiga-2012">
											<p>Mahiga 2012 data</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				
				</div>
			</div>
		</div>

		<!-- // <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script> -->

		
<!--		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js" integrity="sha384-rKTMvx/cWxvpt3eeURe6VQURnDwC89gOVv+ZTXUh9EdIAN8FamukwzYJFY0GsrbN" crossorigin="anonymous"></script>-->

<!--		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js" integrity="sha384-vOWIrgFbxIPzY09VArRHMsxned7WiY6hzIPtAIIeTFuii9y3Cr6HE6fcHXy5CFhc" crossorigin="anonymous"></script>-->
		
<!--		<script src="https://maxcdn.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js" integrity="sha384-vOWIrgFbxIPzY09VArRHMsxned7WiY6hzIPtAIIeTFuii9y3Cr6HE6fcHXy5CFhc" crossorigin="anonymous"></script>-->
		
		<script src="<?php echo base_url() ?>resources/jquery-3.1.1/jquery-3.1.1.min.js"></script>
<!--		<script src="<?php echo base_url() ?>resources/bootstrap-2.3.2/bootstrap.min.js"></script>-->
		<script src="<?php echo base_url() ?>resources/_bootstrap-3.3.7/bootstrap.min.js"></script>

		<script type="text/javascript">
			$("ul.nav-tabs a").click(function (e) {
				e.preventDefault();	
				$(this).tab('show');
			});	
			
			$('.dropdown-toggle').dropdown();
		</script>

		<script type="text/javascript">
			var autocollapse = function() {
				var tabs = $('#guadalupe_years');
				var tabsHeight = tabs.innerHeight();
//				console.log(tabsHeight);
				
				if (tabsHeight >= 50) {
			// 		while(tabsHeight > 50) {
//						console.log("new"+tabsHeight);
						
						var children = tabs.children('li:not(:last-child)');
//						var count = children.size();
						var count = children.length;
						$(children[count-1]).prependTo('#guadalupe_more_years');
						
						tabsHeight = tabs.innerHeight();
			// 		}
				} else {
			// 		while(tabsHeight < 50 && (tabs.children('li').size()>0)) {
						
						var collapsed = $('#guadalupe_more_years').children('li');
//						var count = collapsed.size();
						var count = collapsed.length;
						$(collapsed[0]).insertBefore(tabs.children('li:last-child'));
						tabsHeight = tabs.innerHeight();
			// 		}
					if (tabsHeight>50) { // double check height again
						autocollapse();
					}
				}
				
			};

			$(document).ready(function() {
				autocollapse(); // when document first loads
				$(window).on('resize', autocollapse); // when window is resized
				
			});

		</script>

		<!-- // <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js" integrity="sha384-MlYoi0MMUQgjPyUdOF4UEVGAa0ciSFUZS6wU3C+/tpTBTVeSgD/r0vN+oqI75XSx" crossorigin="anonymous"></script> -->

		<!--script type="text/javascript">
			var ctx_bod = document.getElementById('chart-bod').getContext('2d');
			var chart_bod = new Chart(ctx_bod, {
				type: 'line',
				data: {
					labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
					datasets: [
						{
							label: 'Biological Oxygen Demand',
							data: [12, 19, 3, 17, 22, 11, 7],
							borderColor: "rgba(53,51,255,0.4)",
							backgroundColor: "rgba(53,51,155,0.2)"
						}, {
							label: '(Forecast) Biological Oxygen Demand',
							data: [, , , , , , 7, 6, 3, 7, 9],
							borderColor: "rgba(53,51,255,0.4)",
							backgroundColor: "rgba(53,51,155,0.2)",
							borderDash: [5, 5]
						}
					]
				}
			});

			var ctx_do = document.getElementById('chart-do').getContext('2d');
			var chart_do = new Chart(ctx_do, {
				type: 'line',
				data: {
					labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
					datasets: [
						{
							label: 'Dissolved Oxygen',
							data: [12, 19, 3, 17, 6, 3, 7],
							backgroundColor: "rgba(53,151,255,0.4)"
						}
					]
				}
			});

			var ctx_tss = document.getElementById('chart-tss').getContext('2d');
			var chart_tss = new Chart(ctx_tss, {
				type: 'line',
				data: {
					labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
					datasets: [
						{
							label: 'Total Suspended Solids',
							data: [12, 19, 3, 17, 6, 3, 7],
							backgroundColor: "rgba(153,51,155,0.4)"
						}
					]
				}
			});

			var ctx_ph = document.getElementById('chart-ph').getContext('2d');
			var chart_ph = new Chart(ctx_ph, {
				type: 'line',
				data: {
					labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
					datasets: [
						{
							label: 'PH',
							data: [12, 19, 3, 17, 6, 3, 7],
							backgroundColor: "rgba(153,251,55,0.4)"
						}
					]
				}
			});

			var ctx_temp = document.getElementById('chart-temp').getContext('2d');
			var chart_temp = new Chart(ctx_temp, {
				type: 'line',
				data: {
					labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
					datasets: [
						{
							label: 'Temperature',
							data: [12, 19, 3, 17, 6, 3, 7],
							backgroundColor: "rgba(253,51,55,0.4)"
						}
					]
				}
			});
		</script-->

	</body>
</html>