<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PageController extends CI_Controller {
	public function __construct(){ parent::__construct(); }
	
	public function index() { $this->load->view('index'); }
	public function input() { $this->load->view('input'); }
	public function chart() { $this->load->view('chart'); }
	public function add_station() { $this->load->view('add_station'); }
	public function edit_wqstd() { $this->load->view('edit_wqstd'); }
	public function test() { $this->load->view('test'); }
    
	public function page_404() { $this->load->view('404'); }
}
