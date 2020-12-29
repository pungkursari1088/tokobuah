<?php

class Welcome extends CI_Controller {
	
	public function index()
	{
		$this->load->view('homepage.php');
	}

	public function about()
	{
		$this->load->view('about.php');
	}

	public function contact()
	{
		$this->load->view('contact.php');
	}
}
