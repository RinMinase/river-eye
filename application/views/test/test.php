<?php

$station_name = "Sandayong Bridge";
$reg_data_query = $this->db->query("SELECT BOD FROM river_data WHERE station='" . $station_name . "'");

echo "SELECT BOD FROM river_data WHERE station='" . $station_name . "' <br><br>";

if (isset($reg_data_query)) {
    $reg_months = [];
    $reg_data_query_cnt = 0;
    foreach($reg_data_query->result() as $x) {
        $reg_months[$reg_data_query_cnt++] = $x->BOD;
    }
    
    $reg_input_months = 0;
    while($reg_input_months < count($reg_months) && $reg_months[$reg_input_months] != 0) $reg_input_months++;

    if($reg_input_months >= 7) {
        $reg_n = $reg_input_months;
        $reg_d = 0;
        $reg_dT = [0, 0, 0];
        $reg_T = [0, 0, 0, 0, 0, 0];

        $reg_matrix_regression =  [[0, 0, 0, 0], [0, 0, 0, 0], [9, 0, 0, 0], [0, 0, 0, 0]];

        $reg_det_positive = [0, 0, 0, 0];
        $reg_det_negative = [0, 0, 0, 0];
        $reg_determinant = 0;

        $reg_mat_inv_positive = [[0, 0, 0, 0], [0, 0, 0, 0], [0, 0, 0, 0], [0, 0, 0, 0]];
        $reg_mat_inv_negative = [[0, 0, 0, 0], [0, 0, 0, 0], [0, 0, 0, 0], [0, 0, 0, 0]];
        $reg_matrix_inverse =  [[0, 0, 0, 0], [0, 0, 0, 0], [0, 0, 0, 0], [0, 0, 0, 0]];

        $reg_line_equation = array (
            'c' => 0,
            'x' => 0,
            'x2' => 0,
            'x3' => 0,
        );

        $reg_points = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

        for($t_months = 0; $t_months < count($reg_months); $t_months++) {
            $reg_d = $reg_d + $reg_months[$t_months];
        }

        for($t_dT = 0; $t_dT < count($reg_dT); $t_dT++) {
            for($t_months = 0; $t_months < count($reg_months); $t_months++) {
                $reg_dT[$t_dT] += $reg_months[$t_months] * pow(($t_months + 1), ($t_dT + 1));
            }
        }

        for($t_T = 0; $t_T < count($reg_T); $t_T++) {
            for($t_months = 0; $t_months < count($reg_months); $t_months++) {
                $reg_T[$t_T] += pow(($t_months + 1), ($t_T + 1));
            }
        }


        /** Getting the Regression Matrix **/

        $reg_matrix_regression[0][0] = $reg_n;
        $reg_matrix_regression[0][1] = $reg_matrix_regression[1][0] = $reg_T[0];
        $reg_matrix_regression[0][2] = $reg_matrix_regression[1][1] = $reg_matrix_regression[2][0] = $reg_T[1];
        $reg_matrix_regression[0][3] = $reg_matrix_regression[1][2] = $reg_matrix_regression[2][1] = $reg_matrix_regression[3][0] = $reg_T[2];
        $reg_matrix_regression[1][3] = $reg_matrix_regression[2][2] = $reg_matrix_regression[3][1] = $reg_T[3];
        $reg_matrix_regression[2][3] = $reg_matrix_regression[3][2] = $reg_T[4];
        $reg_matrix_regression[3][3] = $reg_T[5];


        /** Getting the Matrix Determinant **/

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


        /** Getting the Inverse Matrix **/

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


        /** Getting the Regression Line Equation **/

        $t_d = [$reg_d, $reg_dT[0], $reg_dT[1], $reg_dT[2]];
        for($temp = 0; $temp < 4; $temp++) {
            $reg_line_equation['c'] += $reg_matrix_inverse[0][$temp] * $t_d[$temp];
            $reg_line_equation['x'] += $reg_matrix_inverse[1][$temp] * $t_d[$temp];
            $reg_line_equation['x2'] += $reg_matrix_inverse[2][$temp] * $t_d[$temp];
            $reg_line_equation['x3'] += $reg_matrix_inverse[3 ][$temp] * $t_d[$temp];
        }


        /** Getting the Regression Points **/

        for($t_reg_points = 0; $t_reg_points < $reg_input_months; $t_reg_points++) {
            $reg_points[$t_reg_points] = ($reg_line_equation['x3']  * pow(($reg_input_months + $t_reg_points + 1), 3)) + ($reg_line_equation['x2']  * pow(($reg_input_months + $t_reg_points + 1), 2)) + ($reg_line_equation['x']  * ($reg_input_months + $t_reg_points + 1)) + ($reg_line_equation['c']);
        }

        for($temp = 0; $temp < count($reg_points); $temp++) {
            $reg_points[$temp] = ((int)round(($reg_points[$temp] * 100))) / 100;
        }
    //}
    //
    //if($reg_input_months >= 7) {
        echo "<span style='color: orange'>DATA</span><br>";
        for ($tempvar = 0; $tempvar < count($reg_months); $tempvar++) echo "<div style='float: left; width: 50px; color: blue;'>" . $tempvar . "</div>";
        echo "<br>";
        for ($tempvar = 0; $tempvar < count($reg_months); $tempvar++) echo "<div style='float: left; width: 50px;'>" . $reg_months[$tempvar] . "</div>";

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
        foreach($reg_points as $x) echo "<div style='float: left; width: 80px;'>" . $x . "</div>";

        echo "<br><br><span style='color: orange'>CHART FORMAT</span><br>";
        for ($tempvar = 0; $tempvar < count($reg_points); $tempvar++) {
            echo $reg_points[$tempvar];
            if ($tempvar < (count($reg_months)-1)) echo ", ";
        }
    } else {
        echo "<span style='color: orange; font-size: 21px;'>Points are lacking (less than 7) to create a regression line.</span><br>";

        echo "<br><br><span style='color: orange'>DATA</span><br>";
        for ($tempvar = 0; $tempvar < 12; $tempvar++) echo "<div style='float: left; width: 50px; color: blue;'>" . $tempvar . "</div>";
        echo "<br>";
        for ($tempvar = 0; $tempvar < 12; $tempvar++) echo "<div style='float: left; width: 50px;'>" . $reg_months[$tempvar] . "</div>";
    }
} else {
    echo "<span style='color: orange; font-size: 21px;'>There is no data yet.</span><br>";
}

?>