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

<!--		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css" integrity="sha384-4FeI0trTH/PCsLWrGCD1mScoFu9Jf2NdknFdFoJhXZFwsvzZ3Bo5sAh7+zL8Xgnd" crossorigin="anonymous">-->
		
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/bootstrap-2.3.2/bootstrap.min.css">

		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

		<!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"> -->

		<!-- <link rel="stylesheet" href="./bootstrap-2.3.2/bootstrap.min.css"> -->
        
		<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>resources/css/chart-styles.css">
        
		<style type="text/css"></style>

		<title>Chart</title>

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
                            
                            <?php
                                
                                $info_query = $this->db->query("SELECT * FROM river_info");
                                $i = 0;
                                $guadalupe_cnt = 1;
                                $butuanon_cnt = 1;
                                $mahiga_cnt = 1;
                                $lahug_cnt = 1;
                                $kinalumsan_cnt = 1;
              
                                foreach ($info_query->result() as $row) {
                                    echo "<li";
                                    if ($i++ == 0) {
                                        switch ($row->river_name) {
                                            case 'Guadalupe River': echo " class=\"active\""; break;
                                            case 'Butuanon River': echo " class=\"active\""; break;
                                            case 'Mahiga River': echo " class=\"active\""; break;
                                            case 'Lahug River': echo " class=\"active\""; break;
                                            case 'Kinalumsan River': echo " class=\"active\""; break;
                                        }
                                    }
                                    switch ($row->river_name) {
                                        case 'Guadalupe River': echo "><a class=\"guadalupe\" href=\"#guadalupe" . $guadalupe_cnt++; break;
                                        case 'Butuanon River': echo "><a class=\"butuanon\" href=\"#butuanon" . $butuanon_cnt++; break;
                                        case 'Mahiga River': echo "><a class=\"mahiga\" href=\"#mahiga" . $mahiga_cnt++; break;
                                        case 'Lahug River': echo "><a class=\"lahug\" href=\"#lahug" . $lahug_cnt++; break;
                                        case 'Kinalumsan River': echo "><a class=\"kinalumsan\" href=\"#kinalumsan" . $kinalumsan_cnt++; break;
                                    }
                                    echo  "\"><p class=\"city-name\">" . $row->barangay_name . "</p><p class=\"station-name\">" . $row->station_name . "</p></a></li>";
                                }
                            ?>
						</ul>
						<div class="tab-content">
                            
                            
                            
                            
                            <!--  BULLSHIT CODE!!! -->
                            
                            <?php
                            
                                $i = 0;
                                $guadalupe_cnt = 1;
                                $butuanon_cnt = 1;
                                $mahiga_cnt = 1;
                                $lahug_cnt = 1;
                                $kinalumsan_cnt = 1;
                            
                                foreach ($info_query->result() as $row) {
                                    echo "<div class=\"tab-pane fade ";
                                    
                                    if ($i++ == 0) echo "active ";

                                    echo "in id=\"";
                                    switch ($row->river_name) {
                                        case "Guadalupe River": echo "guadalupe" . $guadalupe_cnt++; break;
                                        case "Butuanon River": echo "butuanon" . $butuanon_cnt++; break;
                                        case "Mahiga River": echo "mahiga" . $mahiga_cnt++; break;
                                        case "Lahug River": echo "lahug" . $lahug_cnt++; break;
                                        case "Kinalumsan River": echo "kinalumsan" . $kinalumsan_cnt++; break;
                                    }

                                    echo "\">";
                                        echo "<div class=\"tabbable\">";
                                        echo "<ul class=\"nav nav-tabs top-tabs\" style=\"margin-bottom: 0px;\" id=\"";
                                        switch ($row->river_name) {
                                            case "Guadalupe River": echo "guadalupe"; break;
                                            case "Butuanon River": echo "butuanon"; break;
                                            case "Mahiga River": echo "mahiga"; break;
                                            case "Lahug River": echo "lahug"; break;
                                            case "Kinalumsan River": echo "kinalumsan"; break;
                                        }
                                        echo "_years\">";

                                        $header_query = $this->db->query("SELECT collection_datetime FROM river_data WHERE station=\"" . $row->station_name . "\"");

                                        $years = [];
                                        foreach ($header_query->result() as $header_query_row) {
                                            array_push($years, date("Y", strtotime($header_query_row->collection_datetime)));
                                        }

                                        $years = array_unique($years);
                                        usort($years, "neg_cmp");

                                        $i = 0;
                                        $tempStationName = explode(" ", strtolower(trim($row->station_name)));
                                        foreach ($years as $x) {
                                            echo "<li";
                                            if ($i++ == 0) echo " class=\"active\"";
                                            echo "><a href=\"#";
                                            switch ($row->river_name) {
                                                case "Guadalupe River": echo "guadalupe"; break;
                                                case "Butuanon River": echo "butuanon"; break;
                                                case "Mahiga River": echo "mahiga"; break;
                                                case "Lahug River": echo "lahug"; break;
                                                case "Kinalumsan River": echo "kinalumsan"; break;
                                            }

                                            echo "_" . $tempStationName[0] . "_". $x . "\">" . $x . "</a></li>";

                                        }

                                        echo "<li class=\"dropdown\" style=\"float: right;\"><a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" style=\"margin-right: 0px;\">More&nbsp;&nbsp;<span class=\"caret\"></span></a><ul class=\"dropdown-menu\" role=\"menu\" id=\"guadalupe_more\"></ul></li></ul>";
                                            echo "<div class=\"tab-content\" style=\"padding-top: 10px; background-color: #ffffff;\">";
//                                          $i = 0;
//                                          foreach ($years as $x) {
//
                                                echo "<div class=\"tab-pane fade ";
                                                if ($i++ == 0) echo "active "; 
                                                echo "in\" id=\"guadalupe_sandayong_" . $x . "\">";
                                                    echo "<div class=\"span10\" style=\"color: #555555; margin-bottom: 25px;\">";
                                                    echo "<h3 style=\"margin: 0px;\">Guadalupe River (Year " . $x . ")</h3>";
                                                    echo "<h4 style=\"margin: 0px;\">Barangay Guadalupe</h4>";
                                                    echo "<h5 style=\"margin: 0px;\">Sandayong Bridge</h5></div>";

                                                    $query = $this->db->query("SELECT * FROM river_data WHERE station='Sandayong Bridge' AND YEAR(collection_datetime)='" . $x . "'");

                                                    for($temp = 0; $temp < 5; $temp++) {
                                                    
                                                        echo "<div class=\"span10\"><canvas id=\"chart_";

                                                        switch($temp) {
                                                            case 0: echo "bod"; break;
                                                            case 1: echo "do"; break;
                                                            case 2: echo "tss"; break;
                                                            case 3: echo "ph"; break;
                                                            case 4: echo "temp"; break; 
                                                        }

                                                        echo "_sandayong_" . $x . "\" style=\"display: none;\"></canvas><h3>";

                                                        switch($temp) {
                                                            case 0: echo "Biological Oxygen Demand (BOD)"; break;
                                                            case 1: echo "Dissolved Oxygen (DO)"; break;
                                                            case 2: echo "Total Suspended Solids (TSS)"; break;
                                                            case 3: echo "pH Level (pH)"; break;
                                                            case 4: echo "Temperature (&deg;C)"; break; 
                                                        }

                                                        echo "</h3>";
                                                            echo "<div class=\"span4\" style=\"margin-left: 0px;\">";
                                                            echo "<table class=\"table table-bordered\">";
                                                            echo "<thead><tr><th colspan=\"2\" style=\"text-align: center;\">Initial Points / Values</th></tr><tr><th>Date</th><th>Value</th></tr></thead><tbody>";

                                                            foreach ($query->result() as $row) {
                                                                echo "<tr><td>".date("F d", strtotime($row->collection_datetime))."</td><td>";

                                                                switch($temp) {
                                                                    case 0: echo $row->BOD; break;
                                                                    case 1: echo $row->DO; break;
                                                                    case 2: echo $row->TSS; break;
                                                                    case 3: echo $row->pH; break;
                                                                    case 4: echo $row->TMP; break; 
                                                                }
                                                                echo "</td></tr>";
                                                            }
                                                            echo "</tbody></table>";
                                                            echo "</div>"; //span4
                                                        echo "</div>"; //span10
                                                        }
                                                echo "</div>"; //tab-pane active
                                             echo "</div>"; //tab-content
                                        echo "</div>"; //tabbable
                                    echo "</div>"; //tab-pane active
                                }

                            ?>
<!--
										<div class="tab-pane fade in" id="guadalupe_2012">
											<p>Guadlupe 2012 data</p>
										</div>
										<div class="tab-pane fade in" id="guadalupe_2010">
											<p>Guadlupe 2010 data</p>
										</div>
-->
<!--
									</div>
								</div>
							</div>
-->
<!--
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
-->
						</div>
					</div>
				
				</div>
			</div>
		</div>

<!--		 <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script> -->
        
		<script src="<?php echo base_url() ?>resources/jquery-3.1.1/jquery-3.1.1.min.js"></script>

<!--		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js" integrity="sha384-vOWIrgFbxIPzY09VArRHMsxned7WiY6hzIPtAIIeTFuii9y3Cr6HE6fcHXy5CFhc" crossorigin="anonymous"></script>-->
		
<!--		<script src="https://maxcdn.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js" integrity="sha384-vOWIrgFbxIPzY09VArRHMsxned7WiY6hzIPtAIIeTFuii9y3Cr6HE6fcHXy5CFhc" crossorigin="anonymous"></script>-->
		
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
//				var tabs = $('ul.top-tabs');
				var tabsHeight = tabs.innerHeight();
				
                if (tabsHeight >= 50) {
			 		while(tabsHeight > 50) {
                        var children = tabs.children('li:not(:last-child)');
                        var count = children.length;
                        $(children[count-1]).prependTo('#guadalupe_more');

                        tabsHeight = tabs.innerHeight();
			 		}
				} else {
			 		while(tabsHeight < 50 && ($('#guadalupe_more').children('li').length>0)) {
                        var collapsed = $('#guadalupe_more').children('li');
                        var count = collapsed.length;
                        $(collapsed[0]).insertBefore(tabs.children('li:last-child'));
                        tabsHeight = tabs.innerHeight();
			 		}
                    
					if (tabsHeight>50) { autocollapse(); } // for rechecking height
				}
                
                if ($('#guadalupe_more').children('li').length > 0) {
                    document.getElementById('guadalupe_more').setAttribute('class', 'dropdown-menu');
                } else {
                    document.getElementById('guadalupe_more').setAttribute('class', 'dropdown-menu hidden');
                    
                }
				
			};

			$(document).ready(function() {
				autocollapse(); // when document first loads
				$(window).on('resize', autocollapse); // when window is resized
			});

		</script>

<!--		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js" integrity="sha384-MlYoi0MMUQgjPyUdOF4UEVGAa0ciSFUZS6wU3C+/tpTBTVeSgD/r0vN+oqI75XSx" crossorigin="anonymous"></script> -->
        
<!--		<script src="<?php echo base_url() ?>resources/chartjs-2.4.0/chart.min.js"></script>-->

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