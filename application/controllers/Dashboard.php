<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('dashboard');
		$this->load->view('/includes/html_footer');
	}
}
