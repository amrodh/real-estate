<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
		$this->load->view('home.php');
	}

	function sahrawy() 
	{ 
		$this->load->view('sahrawy.php');
	}

	function contact() 
	{ 
		$this->load->view('contact.php');
	}
}