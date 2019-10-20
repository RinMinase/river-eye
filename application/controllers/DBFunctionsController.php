<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DBFunctionsController extends CI_Controller {
	public function __construct(){ parent::__construct(); }
	
//	public function insertWaterData() {
//		$river = $this->input->post("river-location");
//		$station = $this->input->post("station-location");
//		$barangay = $this->input->post("barangay-location");
//		$sDate = $this->input->post("sampling-date");
//		$sTime = $this->input->post("collection-time");
//		$BOD = $this->input->post("bod");
//		$DO = $this->input->post("do");
//		$TSS = $this->input->post("tss");
//		$pH = $this->input->post("ph");
//		$Temp = $this->input->post("temp");
		
//		INSERT INTO `riverdata` (`id`, `river`, `station`, `barangay`, `collection_datetime`, `BOD`, `DO`, `TSS`, `pH`, `TMP`) VALUES ('0', 'Guadalupe', 'Sancianko Bridge', 'Pahina Central', '2016-12-15 12:00:00', '30', '2', '40', '8.2', '25');
		
//		$newDate = date("Y-m-d", strtotime($sDate));
//		$sampleDateTime = $newDate . " " . $sTime;
//		
//		$sql = "INSERT INTO riverdata (river, station, barangay, collection_datetime, BOD, DO, TSS, pH, TMP) VALUES ('".$river."', '".$station."', '".$barangay."', '".$sampleDateTime."', '".$BOD."', '".$DO."', '".$TSS."', '".$pH."', '".$Temp."')";
//		$this->db->query($sql);
//		echo $this->db->affected_rows();
//	}
    
    public function validateWaterData() {
        $river = $this->input->post("river-location");
		$station = $this->input->post("station-location");
		$barangay = $this->input->post("barangay-location");
		$sDate = $this->input->post("sampling-date");
		$sTime = $this->input->post("collection-time");
		$BOD = $this->input->post("bod");
		$DO = $this->input->post("do");
		$TSS = $this->input->post("tss");
		$pH = $this->input->post("ph");
		$Temp = $this->input->post("temp");
        
        $this->load->model("DBModel");
        $this->DBModel->insertWaterData($river, $station, $barangay, $sDate, $sTime, $BOD, $DO, $TSS, $pH, $Temp);
    }
}
