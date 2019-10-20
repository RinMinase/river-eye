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
        
        echo $river . "<br>" . $station . "<br>" . $barangay . "<br>" . $sDate . "<br>" . $sTime . "<br>" . $BOD . "<br>" . $DO . "<br>" . $TSS . "<br>" . $pH . "<br>" . $Temp . "<br><br>";
        
        $pattern_date = "/^((0[13578]|1[02])[\/.]31[\/.](19|20)[0-9]{2})|((01|0[3-9]|1[1-2])[\/.](29|30)[\/.](19|20)[0-9]{2})|((0[1-9]|1[0-2])[\/.](0[1-9]|1[0-9]|2[0-8])[\/.](19|20)[0-9]{2})|((02)[\/.]29[\/.](((19|20)(04|08|[2468][048]|[13579][26]))|2000))/";

        //$pattern_time = "/^([01]\d|2[0-3]):([0-9]\d|[1-5][0-9]\d)/";
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
            $this->load->model("DBModel");
            $this->DBModel->insertWaterData($river, $station, $barangay, $sDate, $sTime, $BOD, $DO, $TSS, $pH, $Temp);
            redirect('index'); // SUCCESS
//            echo "succ";
        } else {
//            echo $rgx_date . "<br>" . $rgx_time . "<br>" . $rgx_bod . "<br>" . $rgx_do . "<br>" . $rgx_tss . "<br>" . $rgx_ph . "<br>" . $rgx_tmp;
            
            redirect('input'); // FAIL
//            echo "fail";
        }
        
        
        
        
    }
    
    public function pConsole($data) {
        if(is_array($data)) $output = "<script>console.log('" . implode(',', $data) . "'</script>";
        else $output = "<script>console.log('" . $data . "'</script>";
        
        echo $output;
    }
}
