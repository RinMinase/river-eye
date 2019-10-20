<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DBFunctionsController extends CI_Controller {
	public function __construct(){ parent::__construct(); $this->load->helper("security"); }
	
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
		
		// echo $river . "<br>" . $station . "<br>" . $barangay . "<br>" . $sDate . "<br>" . $sTime . "<br>" . $BOD . "<br>" . $DO . "<br>" . $TSS . "<br>" . $pH . "<br>" . $Temp . "<br><br>";
		
		$pattern_date = "/^((0[13578]|1[02])[\/.]31[\/.](19|20)[0-9]{2})|((01|0[3-9]|1[1-2])[\/.](29|30)[\/.](19|20)[0-9]{2})|((0[1-9]|1[0-2])[\/.](0[1-9]|1[0-9]|2[0-8])[\/.](19|20)[0-9]{2})|((02)[\/.]29[\/.](((19|20)(04|08|[2468][048]|[13579][26]))|2000))/";

		$pattern_time = "/^(2[0-3]|1[0-9]|0[0-9]|[^0-9][0-9]):([0-5][0-9]|[0-9])/";

		$pattern_bod = "/^([1-9][0-9]{0,2}|1000)$/";
		$pattern_do = "/^[1-9][0-9]?$|^100$/";
		$pattern_tss = "/^([1-9][0-9]{0,2}|1000)$/";
		$pattern_ph = "/^(([1-9]|1[0-3])(\.\d\d?)?|14(\.00?)?)$/";
		$pattern_tmp = "/^([1-4][0-9])(\.[0-9])?$/";
		
		$rgx_date = preg_match($pattern_date, $sDate);
		$rgx_time = preg_match($pattern_time, $sTime);
		$rgx_bod = preg_match($pattern_bod, $BOD);
		$rgx_do = preg_match($pattern_do, $DO);
		$rgx_tss = preg_match($pattern_tss, $TSS);
		$rgx_ph = preg_match($pattern_ph, $pH);
		$rgx_tmp = preg_match($pattern_tmp, $Temp);

		if ( $rgx_date && $rgx_time && $rgx_bod && $rgx_do && $rgx_tss && $rgx_ph && $rgx_tmp  ) 
		{   
			$river = $this->security->xss_clean($river);
			$station = $this->security->xss_clean($station);
			$barangay = $this->security->xss_clean($barangay);
			$sTime = $this->security->xss_clean($sTime);
			$BOD = $this->security->xss_clean($BOD);
			$DO = $this->security->xss_clean($DO);
			$TSS = $this->security->xss_clean($TSS);
			$pH = $this->security->xss_clean($pH);
			$Temp = $this->security->xss_clean($Temp);
			
			$this->load->model("DBModel");
			$this->DBModel->insertWaterData($river, $station, $barangay, $sDate, $sTime, $BOD, $DO, $TSS, $pH, $Temp);
			redirect('index'); // SUCCESS
		} else {
			$rgx = array (
				'date' => $rgx_date,
				'time' => $rgx_time,
				'bod' => $rgx_bod,
				'do' => $rgx_do,
				'tss' => $rgx_tss,
				'ph' => $rgx_ph,
				'tmp' => $rgx_tmp
			); // 0 error

			// if($rgx['date'] == 0) $msg = "Date is invalid";
			// if($rgx['time'] == 0) echo "Time is invalid";
			// if($rgx['bod'] == 0) echo "Biological Oxygen Demand is invalid";
			// if($rgx['do'] == 0) echo "Dissolved Oxygen is invalid";
			// if($rgx['tss'] == 0) echo "Total Suspended Solids is invalid";
			// if($rgx['ph'] == 0) echo "pH is invalid";

			$this->load->view('input', $rgx);
			// redirect('input'); // FAIL
		}
	}

	public function update() {
		$updateValue = $this->input->post('submit_update');
		$deleteValue = $this->input->post('submit_delete');
		if (isset($updateValue)) {
			$this->db->select('*');
			$this->db->where('id', $updateValue);
			$query['data'] = $this->db->get('river_data')->result();

			$this->load->view('update', $query);
		} else if (isset($deleteValue)) {
			$this->db->where('id', $deleteValue);
			$this->db->delete('river_data');

			redirect('chart');
		} else {
			redirect('chart');
		}
	}

	public function update_database() {
		$id = $this->input->post("id");
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
		
		// echo $river . "<br>" . $station . "<br>" . $barangay . "<br>" . $sDate . "<br>" . $sTime . "<br>" . $BOD . "<br>" . $DO . "<br>" . $TSS . "<br>" . $pH . "<br>" . $Temp . "<br><br>";
		
		$pattern_date = "/^((0[13578]|1[02])[\/.]31[\/.](19|20)[0-9]{2})|((01|0[3-9]|1[1-2])[\/.](29|30)[\/.](19|20)[0-9]{2})|((0[1-9]|1[0-2])[\/.](0[1-9]|1[0-9]|2[0-8])[\/.](19|20)[0-9]{2})|((02)[\/.]29[\/.](((19|20)(04|08|[2468][048]|[13579][26]))|2000))/";

		$pattern_time = "/^(2[0-3]|1[0-9]|0[0-9]|[^0-9][0-9]):([0-5][0-9]|[0-9])/";

		$pattern_bod = "/^([1-9][0-9]{0,2}|1000)$/";
		$pattern_do = "/^[1-9][0-9]?$|^100$/";
		$pattern_tss = "/^([1-9][0-9]{0,2}|1000)$/";
		$pattern_ph = "/^(([1-9]|1[0-3])(\.\d\d?)?|14(\.00?)?)$/";
		$pattern_tmp = "/^([1-4][0-9])(\.[0-9])?$/";
		
		$rgx_date = preg_match($pattern_date, $sDate);
		$rgx_time = preg_match($pattern_time, $sTime);
		$rgx_bod = preg_match($pattern_bod, $BOD);
		$rgx_do = preg_match($pattern_do, $DO);
		$rgx_tss = preg_match($pattern_tss, $TSS);
		$rgx_ph = preg_match($pattern_ph, $pH);
		$rgx_tmp = preg_match($pattern_tmp, $Temp);

		if ($rgx_date && $rgx_time && $rgx_bod && $rgx_do && $rgx_tss && $rgx_ph && $rgx_tmp) {   
			$river = $this->security->xss_clean($river);
			$station = $this->security->xss_clean($station);
			$barangay = $this->security->xss_clean($barangay);
			$sTime = $this->security->xss_clean($sTime);
			$BOD = $this->security->xss_clean($BOD);
			$DO = $this->security->xss_clean($DO);
			$TSS = $this->security->xss_clean($TSS);
			$pH = $this->security->xss_clean($pH);
			$Temp = $this->security->xss_clean($Temp);
			
			$this->load->model("DBModel");
			$this->DBModel->updateWaterData($id, $river, $station, $barangay, $sDate, $sTime, $BOD, $DO, $TSS, $pH, $Temp);
			redirect('index'); // SUCCESS
		} else {
			$this->load->view("update"); // FAIL
		}
	}
	
	public function pConsole($data) {
		if(is_array($data)) $output = "<script>console.log('" . implode(',', $data) . "'</script>";
		else $output = "<script>console.log('" . $data . "'</script>";
		
		echo $output;
	}
}
