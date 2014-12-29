<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage extends Common_Auth_Controller {
	
	function Manage()
	{
		parent::__construct();	
		define('CLOSED', 1);
	}
	
	function index() 
	{		
		//Getting data from database
		$this->db->select('*');
		
		//Get only the users reports if they are not staff
		if(!$this->ion_auth->is_admin()) {
			$this->db->where('TenantID', $this->user->id);
		}
		$this->db->join('categories', 'jobs.CategoryId = categories.CategoryID');
		$this->db->join('statuses', 'jobs.StatusID = statuses.StatusId');
		$this->db->where('jobs.StatusID !=', CLOSED);
		$this->db->from('jobs');
		$this->db->order_by('jobs.DateReported', 'desc');
		

		//forward data to view
		$this->data['job_list'] = $this->db->get()->result();
		$this->data['title'] = "Manage Requests";
		$this->data['headerBar'] = "manage";
				
		//Loading the views with the required data		
		$this->data['mainContent'] = "manage_view";
		$this->load->view("includes/template", $this->data);
	}
	
}

?>