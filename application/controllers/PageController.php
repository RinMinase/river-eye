<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PageController extends CI_Controller {
	public function __construct(){ parent::__construct(); }
	
	public function index() { $this->load->view('index'); }
	public function input() { $this->load->view('input'); }
	public function chart() { $this->load->view('chart'); }
	public function update() { $this->load->view('update'); }
	public function test3() { $this->load->view('test3'); }
    
	public function page_404() { $this->load->view('404'); }
}
