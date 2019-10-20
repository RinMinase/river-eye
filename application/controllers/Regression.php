<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
class Regression extends CI_Controller {
	public function __construct(){ parent::__construct(); getRegresion(); }
    
    private function getMonthlyData($station_name, $year) {
        $data_query = $this->db->query("SELECT * FROM river_data WHERE station='" . $station_name . "' AND YEAR(collection_datetime)='" . $year . "' ORDER BY collection_datetime");
        
        $months = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($data_query->result() as $row) {
            $tempmonth = (int)date("m", strtotime($row->collection_datetime));
            for ($tempvar = 1; $tempvar <= 12; $tempvar++) {
                if($tempmonth == $tempvar) $months[$tempvar-1] = $row->BOD;
            }
        }
        
        return $months;
    }
    
    private function getN($months) {
        return count($months);
    }
    
    private function getD($months) {
        $reg_d = 0;
        for($t_months = 0; $t_months < count($months); $t_months++) {
            $reg_d = $reg_d + $months[$t_months];
        }
        
        return $reg_d;
    }
    
    private function getDT($months) {
        $reg_dT = [0, 0, 0];
        for($t_dT = 0; $t_dT < count($reg_dT); $t_dT++) {
            for($t_months = 0; $t_months < count($months); $t_months++) {
                $reg_dT[$t_dT] += $months[$t_months] * pow(($t_months + 1), ($t_dT + 1));
            }
        }
        
        return $reg_dT;
    }
    
    private function getT($months) {
        $reg_T = [0, 0, 0, 0, 0, 0];
        for($t_T = 0; $t_T < count($reg_T); $t_T++) {
            for($t_months = 0; $t_months < count($months); $t_months++) {
                $reg_T[$t_T] += pow(($t_months + 1), ($t_T + 1));
            }
        }
        
        return $reg_T;
    }
    
    private function getRegressionMatrix($reg_n, $reg_T) {
        $reg_matrix_regression =  [[0, 0, 0, 0], [0, 0, 0, 0], [9, 0, 0, 0], [0, 0, 0, 0]];
        
        $reg_matrix_regression[0][0] = $reg_n;
        $reg_matrix_regression[0][1] = $reg_matrix_regression[1][0] = $reg_T[0];
        $reg_matrix_regression[0][2] = $reg_matrix_regression[1][1] = $reg_matrix_regression[2][0] = $reg_T[1];
        $reg_matrix_regression[0][3] = $reg_matrix_regression[1][2] = $reg_matrix_regression[2][1] = $reg_matrix_regression[3][0] = $reg_T[2];
        $reg_matrix_regression[1][3] = $reg_matrix_regression[2][2] = $reg_matrix_regression[3][1] = $reg_T[3];
        $reg_matrix_regression[2][3] = $reg_matrix_regression[3][2] = $reg_T[4];
        $reg_matrix_regression[3][3] = $reg_T[5];
        
        return $reg_matrix_regression;
    }
    
    private function getMatrixDeterminant($reg_matrix_regression) {
        $reg_det_positive = [0, 0, 0, 0];
        $reg_det_negative = [0, 0, 0, 0];
        $reg_determinant = 0;
        
        $A1 = $reg_matrix_regression[0][0];
        $A2 = $reg_matrix_regression[0][1];
        $A3 = $reg_matrix_regression[0][2];
        $A4 = $reg_matrix_regression[0][3];

        $B1 = $reg_matrix_regression[1][0];
        $B2 = $reg_matrix_regression[1][1];
        $B3 = $reg_matrix_regression[1][2];
        $B4 = $reg_matrix_regression[1][3];

        $C1 = $reg_matrix_regression[2][0];
        $C2 = $reg_matrix_regression[2][1];
        $C3 = $reg_matrix_regression[2][2];
        $C4 = $reg_matrix_regression[2][3];

        $D1 = $reg_matrix_regression[3][0];
        $D2 = $reg_matrix_regression[3][1];
        $D3 = $reg_matrix_regression[3][2];
        $D4 = $reg_matrix_regression[3][3];

        $reg_det_positive[0] = $A1*(($B2*$C3*$D4)+($C2*$D3*$B4)+($D2*$B3*$C4));
        $reg_det_positive[1] = $B1*(($A2*$D3*$C4)+($C2*$A3*$D4)+($D2*$C3*$A4));
        $reg_det_positive[2] = $C1*(($A2*$B3*$D4)+($B2*$D3*$A4)+($D2*$A3*$B4));
        $reg_det_positive[3] = $D1*(($A2*$C3*$B4)+($B2*$A3*$C4)+($C2*$B3*$A4));

        $reg_det_negative[0] = ((-1)*$A1)*(($B2*$D3*$C4)+($C2*$B3*$D4)+($D2*$C3*$B4));
        $reg_det_negative[1] = ((-1)*$B1)*(($A2*$C3*$D4)+($C2*$D3*$A4)+($D2*$A3*$C4));
        $reg_det_negative[2] = ((-1)*$C1)*(($A2*$D3*$B4)+($B2*$A3*$D4)+($D2*$B3*$A4));
        $reg_det_negative[3] = ((-1)*$D1)*(($A2*$B3*$C4)+($B2*$C3*$A4)+($C2*$A3*$B4));

        $reg_determinant = $reg_det_positive[0] + $reg_det_negative[0] + $reg_det_positive[1] + $reg_det_negative[1] + $reg_det_positive[2] + $reg_det_negative[2] + $reg_det_positive[3] + $reg_det_negative[3];
        
        return $reg_determinant;
    }
    
    private function getMatrixInverse($reg_determinant, $reg_matrix_regression) {
        $A1 = $reg_matrix_regression[0][0];
        $A2 = $reg_matrix_regression[0][1];
        $A3 = $reg_matrix_regression[0][2];
        $A4 = $reg_matrix_regression[0][3];

        $B1 = $reg_matrix_regression[1][0];
        $B2 = $reg_matrix_regression[1][1];
        $B3 = $reg_matrix_regression[1][2];
        $B4 = $reg_matrix_regression[1][3];

        $C1 = $reg_matrix_regression[2][0];
        $C2 = $reg_matrix_regression[2][1];
        $C3 = $reg_matrix_regression[2][2];
        $C4 = $reg_matrix_regression[2][3];

        $D1 = $reg_matrix_regression[3][0];
        $D2 = $reg_matrix_regression[3][1];
        $D3 = $reg_matrix_regression[3][2];
        $D4 = $reg_matrix_regression[3][3];
        
        $reg_mat_inv_positive = [[0, 0, 0, 0], [0, 0, 0, 0], [0, 0, 0, 0], [0, 0, 0, 0]];
        $reg_mat_inv_negative = [[0, 0, 0, 0], [0, 0, 0, 0], [0, 0, 0, 0], [0, 0, 0, 0]];
        $reg_matrix_inverse =  [[0, 0, 0, 0], [0, 0, 0, 0], [0, 0, 0, 0], [0, 0, 0, 0]];

        $reg_mat_inv_positive[0][0] = $B2*$C3*$D4+$C2*$D3*$B4+$D2*$B3*$C4;
        $reg_mat_inv_positive[0][1] = $B1*$D3*$C4+$C1*$B3*$D4+$D1*$C3*$B4;
        $reg_mat_inv_positive[0][2] = $B1*$C2*$D4+$C1*$D2*$B4+$D1*$B2*$C4;
        $reg_mat_inv_positive[0][3] = $B1*$D2*$C3+$C1*$B2*$D3+$D1*$C2*$B3;

        $reg_mat_inv_positive[1][0] = $A2*$D3*$C4+$C2*$A3*$D4+$D2*$C3*$A4;
        $reg_mat_inv_positive[1][1] = $A1*$C3*$D4+$C1*$D3*$A4+$D1*$A3*$C4;
        $reg_mat_inv_positive[1][2] = $A1*$D2*$C4+$C1*$A2*$D4+$D1*$C2*$A4;
        $reg_mat_inv_positive[1][3] = $A1*$C2*$D3+$C1*$D2*$A3+$D1*$A2*$C3;

        $reg_mat_inv_positive[2][0] = $A2*$B3*$D4+$B2*$D3*$A4+$D2*$A3*$B4;
        $reg_mat_inv_positive[2][1] = $A1*$D3*$B4+$B1*$A3*$D4+$D1*$B3*$A4;
        $reg_mat_inv_positive[2][2] = $A1*$B2*$D4+$B1*$D2*$A4+$D1*$A2*$B4;
        $reg_mat_inv_positive[2][3] = $A1*$D2*$B3+$B1*$A2*$D3+$D1*$B2*$A3;

        $reg_mat_inv_positive[3][0] = $A2*$C3*$B4+$B2*$A3*$C4+$C2*$B3*$A4;
        $reg_mat_inv_positive[3][1] = $A1*$B3*$C4+$B1*$C3*$A4+$C1*$A3*$B4;
        $reg_mat_inv_positive[3][2] = $A1*$C2*$B4+$B1*$A2*$C4+$C1*$B2*$A4;
        $reg_mat_inv_positive[3][3] = $A1*$B2*$C3+$B1*$C2*$A3+$C1*$A2*$B3;

        $reg_mat_inv_negative[0][0] = (-1)*($B2*$D3*$C4+$C2*$B3*$D4+$D2*$C3*$B4);
        $reg_mat_inv_negative[0][1] = (-1)*($B1*$C3*$D4+$C1*$D3*$B4+$D1*$B3*$C4);
        $reg_mat_inv_negative[0][2] = (-1)*($B1*$D2*$C4+$C1*$B2*$D4+$D1*$C2*$B4);
        $reg_mat_inv_negative[0][3] = (-1)*($B1*$C2*$D3+$C1*$D2*$B3+$D1*$B2*$C3);

        $reg_mat_inv_negative[1][0] = (-1)*($A2*$C3*$D4+$C2*$D3*$A4+$D2*$A3*$C4);
        $reg_mat_inv_negative[1][1] = (-1)*($A1*$D3*$C4+$C1*$A3*$D4+$D1*$C3*$A4);
        $reg_mat_inv_negative[1][2] = (-1)*($A1*$C2*$D4+$C1*$D2*$A4+$D1*$A2*$C4);
        $reg_mat_inv_negative[1][3] = (-1)*($A1*$D2*$C3+$C1*$A2*$D3+$D1*$C2*$A3);

        $reg_mat_inv_negative[2][0] = (-1)*($A2*$D3*$B4+$B2*$A3*$D4+$D2*$B3*$A4);
        $reg_mat_inv_negative[2][1] = (-1)*($A1*$B3*$D4+$B1*$D3*$A4+$D1*$A3*$B4);
        $reg_mat_inv_negative[2][2] = (-1)*($A1*$D2*$B4+$B1*$A2*$D4+$D1*$B2*$A4);
        $reg_mat_inv_negative[2][3] = (-1)*($A1*$B2*$D3+$B1*$D2*$A3+$D1*$A2*$B3);

        $reg_mat_inv_negative[3][0] = (-1)*($A2*$B3*$C4+$B2*$C3*$A4+$C2*$A3*$B4);
        $reg_mat_inv_negative[3][1] = (-1)*($A1*$C3*$B4+$B1*$A3*$C4+$C1*$B3*$A4);
        $reg_mat_inv_negative[3][2] = (-1)*($A1*$B2*$C4+$B1*$C2*$A4+$C1*$A2*$B4);
        $reg_mat_inv_negative[3][3] = (-1)*($A1*$C2*$B3+$B1*$A2*$C3+$C1*$B2*$A3);

        for($t_row = 0; $t_row < count($reg_matrix_inverse); $t_row++) {
            for($t_col = 0; $t_col < count($reg_matrix_inverse[$t_row]); $t_col++) {
                $reg_matrix_inverse[$t_row][$t_col] = (1/$reg_determinant)*($reg_mat_inv_positive[$t_row][$t_col] + $reg_mat_inv_negative[$t_row][$t_col]);
            }
        }
        
        return $reg_matrix_inverse;
    }
    
    private function getRegressionEquation($reg_matrix_inverse, $reg_d, $reg_dT) {
        $reg_line_equation = array (
            'c' => 0,
            'x' => 0,
            'x2' => 0,
            'x3' => 0,
        );
    
        $t_d = [$reg_d, $reg_dT[0], $reg_dT[1], $reg_dT[2]];
        for($temp = 0; $temp < 4; $temp++) {
            $reg_line_equation['c'] += $reg_matrix_inverse[0][$temp] * $t_d[$temp];
            $reg_line_equation['x'] += $reg_matrix_inverse[1][$temp] * $t_d[$temp];
            $reg_line_equation['x2'] += $reg_matrix_inverse[2][$temp] * $t_d[$temp];
            $reg_line_equation['x3'] += $reg_matrix_inverse[3 ][$temp] * $t_d[$temp];
        }
        
        return $reg_line_equation;
    }

    private function getCountMonths($months) {
        $reg_months = 0;
        while($reg_months < count($months) && $months[$reg_months] != 0) $reg_months++;
        return $reg_months;
    }

    private function getRegresionPoints($reg_line_equation, $reg_months) {
        $reg_points = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        if($reg_months < 7) $reg_points = 0;
        else {
            for($t_reg_points = 0; $t_reg_points < $reg_months; $t_reg_points++) {
                $reg_points[$t_reg_points] = ($reg_line_equation['x3']  * pow(($reg_months + $t_reg_points + 1), 3)) + ($reg_line_equation['x2']  * pow(($reg_months + $t_reg_points + 1), 2)) + ($reg_line_equation['x']  * ($reg_months + $t_reg_points + 1)) + ($reg_line_equation['c']);
            }

            for($temp = 0; $temp < count($reg_points); $temp++) {
                $reg_points[$temp] = ((int)round(($reg_points[$temp] * 100))) / 100;
            }
        }
        
        return $reg_points;
    }
    
    public function getRegresion() {
        $station_name = "Sandayong Bridge";
        $year = "2020";
        
        $months = getMonthlyData($station_name, $year);
        
        $reg_n = getN($months);
        $reg_d = getD($months);
        $reg_dT = getDT($months);
        $reg_T = getT($months);
        
        $reg_matrix_regression = getRegressionMatrix($reg_n, $reg_T);
        $reg_determinant = getMatrixDeterminant($reg_matrix);
        $reg_matrix_inverse = getMatrixInverse($reg_determinant, $reg_matrix_regression);
        $reg_line_equation = getRegressionEquation($reg_matrix_inverse, $reg_d, $reg_dT);
        $reg_months = getCountMonths($months);
        $reg_points = getRegresionPoints($reg_line_equation, $reg_months);
            
        echo "<br><br><span style='color: orange'>VARIABLES</span><br>";
        echo "n = $reg_n<br>";
        echo "d = $reg_d<br>";
        for($x = 0; $x < 3; $x++) echo "dT" . ($x + 1) . " = $reg_dT[$x]<br>";
        for($x = 0; $x < 6; $x++) echo "T" . ($x + 1) . " = $reg_T[$x]<br>";

        echo "<br><br><span style='color: orange'>REGESSION INPUT MATRIX</span><br>";
        foreach($reg_matrix_regression as $x) {
            foreach($x as $y) echo "<div style='float: left; width: 90px;'>" . $y . "</div>";
            echo "<br>";
        }

        echo "<br><br><span style='color: orange'>DETERMINANT</span><br>";
        echo $reg_determinant;

        echo "<br><br><span style='color: orange'>REGESSION INVERTED MATRIX (1/DET)(POS_B + NEG_B)</span><br>";
        foreach($reg_matrix_inverse as $x) {
            foreach($x as $y) echo "<div style='float: left; width: 180px;'>" . $y . "</div>";
            echo "<br>";
        }

        echo "<br><br><span style='color: orange'>REGESSION EQUATION</span><br>";
        echo $reg_line_equation['x3'] . "x^3 + " . $reg_line_equation['x2'] . " + x^2 + " . $reg_line_equation['x'] . " + x + " . $reg_line_equation['c'];


        echo "<br><br><span style='color: orange'>REGESSION POINTS</span><br>";
        foreach($reg_points as $x) echo $x . "<br>";
    }
}



//$cnt = 0;
//while($cnt < count($months) && $months[$cnt] == 0) $cnt++;
//echo $cnt . "<br>" . "<br>";

//for ($tempvar = 0; $tempvar < 12; $tempvar++) {
//    echo $tempvar;
//    if ($tempvar < 11) echo "- ";
//}

//echo "<br>";

//for ($tempvar = 0; $tempvar < 12; $tempvar++) {
//    echo $months[$tempvar];
//    if ($tempvar < 11) echo ", ";
//}

//$regression = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]; // UNUSED


 //.count($reg_matrix_inverse[0]);
//for($i = 0; $i < count($reg_matrix_inverse); $i++) {
//    for($j = 0; $j < count($reg_matrix_inverse[$i]); $j++) echo $reg_matrix_inverse[$i][$j] . ", ";
//}

*/

?>