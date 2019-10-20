<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DBModel extends CI_Model {
	public function __construct(){ parent::__construct(); }
	
	public function insertWaterData($river, $station, $barangay, $sDate, $sTime, $BOD, $DO, $TSS, $pH, $Temp) {
		$newDate = date("Y-m-d", strtotime($sDate));
		$sampleDateTime = $newDate . " " . $sTime;

		$data = array(
			'river' => $river,
			'station' => $station,
			'barangay' => $barangay,
			'collection_datetime' => $sampleDateTime,
			'BOD' => $BOD,
			'DO' => $DO,
			'TSS' => $TSS,
			'pH' => $pH,
			'TMP' => $Temp
		);
		
		$this->db->select('*');
		$this->db->insert('river_data', $data);
		
		redirect('index');
	}


	public function updateWaterData($id, $river, $station, $barangay, $sDate, $sTime, $BOD, $DO, $TSS, $pH, $Temp) {
		$newDate = date("Y-m-d", strtotime($sDate));
		$sampleDateTime = $newDate . " " . $sTime;

		$data = array(
			'river' => $river,
			'station' => $station,
			'barangay' => $barangay,
			'collection_datetime' => $sampleDateTime,
			'BOD' => $BOD,
			'DO' => $DO,
			'TSS' => $TSS,
			'pH' => $pH,
			'TMP' => $Temp
		);
		
		$this->db->set($data);
		$this->db->where('id', $id);
		$this->db->update('river_data');
	}
}