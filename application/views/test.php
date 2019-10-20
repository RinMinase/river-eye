<?php

$data_query = $this->db->query("SELECT * FROM river_data WHERE station='Tupaz Bridge' AND YEAR(collection_datetime)='2012' ORDER BY collection_datetime");

$months = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
foreach ($data_query->result() as $row) {
    $tempmonth = (int)date("m", strtotime($row->collection_datetime));
    for ($tempvar = 1; $tempvar <= 12; $tempvar++) {
        if($tempmonth == $tempvar) $months[$tempvar-1] = $row->BOD;
    }
}

for ($tempvar = 0; $tempvar < 12; $tempvar++) {
    echo $tempvar;
    if ($tempvar < 11) echo "- ";
}

echo "<br>";

for ($tempvar = 0; $tempvar < 12; $tempvar++) {
    echo $months[$tempvar];
    if ($tempvar < 11) echo ", ";
}


?>