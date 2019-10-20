<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'PageController';
$route['404_override'] = 'PageController/page_404';
$route['translate_uri_dashes'] = FALSE;

$route['index'] = "PageController/index";
$route['input'] = "PageController/input";
$route['chart'] = "PageController/chart";
$route['add_station'] = "PageController/add_station";
$route['edit_wqstd'] = "PageController/edit_wqstd";

$route['validateWaterData'] = "DBFunctionsController/validateWaterData";

$route['test'] = "PageController/test";