<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'PageController';
$route['404_override'] = 'PageController/page_404';
$route['translate_uri_dashes'] = FALSE;

$route['index'] = "PageController/index";
$route['input'] = "PageController/input";
$route['chart'] = "PageController/chart";
$route['update'] = "PageController/update";

$route['validateWaterData'] = "DBFunctionsController/validateWaterData";
$route['update'] = "DBFunctionsController/update";
$route['update_database'] = "DBFunctionsController/update_database";

$route['test'] = "PageController/test";
$route['test2'] = "PageController/test2";
$route['test3'] = "PageController/test3";
// $route['regression'] = "Regression";