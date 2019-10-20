<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DBModel extends CI_Model {
	public function __construct(){ parent::__construct(); }
	
	public function insertWaterData($river, $station, $barangay, $sDate, $sTime, $BOD, $DO, $TSS, $pH, $Temp) {

        $newDate = date("Y-m-d", strtotime($sDate));
		$sampleDateTime = $newDate . " " . $sTime;
		
//		$sql = "INSERT INTO river_data (river, station, barangay, collection_datetime, BOD, DO, TSS, pH, TMP) VALUES ('".$river."', '".$station."', '".$barangay."', '".$sampleDateTime."', '".$BOD."', '".$DO."', '".$TSS."', '".$pH."', '".$Temp."')";
//		$this->db->query($sql);
        
        $data = array(
            'river' => $river,
            'station' => $station,
            'barangay' => $barangay,
            'collection_datetime' => $sampleDateTime,
            'BOD' => $BOD,
            'DO' => $DO,
            'TSS' => $TSS,
            'pH' => $pH,
            'TMP' => $TMP
        );
        
        $this->db->select('*');
        $this->db->insert('river_data', $data);
        
        redirect('index');
        
//		echo $this->db->affected_rows();
        
        
    }
}