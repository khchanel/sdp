<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Information extends User_Controller {
	
	function Information()
	{
		parent::__construct();	
		$this->load->library('form_validation');
	}
	
	function index() 
	{
		//Add the required data to the array
		$this->data['title'] = "Instruction Guide";
		
		//Load the views and pass through the required data
		$this->data['mainContent'] = "information_view";
		$this->data['headerBar'] = "default";
		$this->load->view("includes/template", $this->data);
	}
}

?>