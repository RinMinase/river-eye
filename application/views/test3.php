<?php

// function query_time_server () {
// echo "<br>XX" . date('Y-m-d H:i:s', time());

// 	date_default_timezone_set("Asia/Manila"); //ntp.pads.ufrj.br
// 	if($fs = @fsockopen("24.56.178.140", 37, $err, $err_str, 5)) {
// 		$timevalue = fread($fs, 49);
// 		fclose($fs);

// 		$timevalue = bin2hex($timevalue);
// 		$timevalue = (abs(HexDec('7fffffff') - HexDec($timevalue) - HexDec('7fffffff')));
// 		$timevalue = $timevalue - 2208988800; # convert to UNIX time stamp

// 		$timevalue = date('Y-m-d H:i:s', $timevalue);
// 	} else { $timevalue = "-1"; }
// 	return($timevalue);
// }

// echo query_time_server();

// echo "<br>" . date('Y-m-d H:i:s', time());


// echo getHostByName(getHostName());
// $value = $this->input->get('submit_delete');
// if (!isset($value)) {
// 	echo 'beeeeeetch';
// } else {
// 	echo $value;
// }

echo date('m/d/y', '2021-03-31 17:00:00');

?>