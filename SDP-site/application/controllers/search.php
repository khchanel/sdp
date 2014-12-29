<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends Common_Auth_Controller {
	
	function Search()
	{
		parent::__construct();	
		$this->load->library('form_validation');
	}
	
	function valid_date($date) {
		if($date != null || $date != "") {
			if (preg_match('/([0-9]{2}-[0-9]{2}-[0-9]{4})/', $date)) {
				return true;
			}
			$this->form_validation->set_message('valid_date', 'Please enter a valid %s (DD-MM-YYYY).');
			return false;
		}
	}
	
	//settings menu
	function index() 
	{
		$this->form_validation->set_rules('username', 'username', 'trim');
		$this->form_validation->set_rules('roomNum', 'room number', 'trim');
		$this->form_validation->set_rules('startDate', 'start date', 'trim|callback_valid_date');
		$this->form_validation->set_rules('endDate', 'end date', 'trim|callback_valid_date');
		$this->form_validation->set_rules('searchClosed', 'search closed', 'trim');
		
		$this->db->from('jobs');
		$this->db->join('categories', 'jobs.CategoryId = categories.CategoryID');
		$this->db->join('statuses', 'jobs.StatusID = statuses.StatusId');
		$this->db->join('users', 'jobs.TenantID = users.id');
		if(isset($_POST['searchClosed'])) $_POST['searchClosed'] = "on";
		$this->data['search_info'] = array('username' => $this->input->post('username'),
										   'roomNum' => $this->input->post('roomNum'),
										   'endDate' => $this->input->post('endDate'),
										   'startDate' => $this->input->post('startDate'),
										   'searchClosed' => $this->input->post('searchClosed'));
		//forward data to view
		$this->data['title'] = "Manage Requests";
		$this->data['headerBar'] = "manage";
					
		//Loading the views with the required data		
		$this->data['mainContent'] = "manage_view";
		
		//Run the validation
		if ($this->form_validation->run() == FALSE)
		{
			//Redirect the index function when the validation fails
			$this->data['job_list'] = $this->db->get()->result();
			$this->load->view("includes/template", $this->data);
		}
		else
		{
			if($this->input->post('username')) {
				$this->db->like('users.username', $this->input->post('username'));	
			}
			if($this->input->post('roomNum')) {
				$this->db->like('users.room_num', $this->input->post('roomNum'));	
			}
			if(!isset($_POST['searchClosed'])) {
				$this->db->where('jobs.StatusID !=', 1);	
			}
			if($this->input->post('startDate') && $this->input->post('endDate')) {
				$this->db->where("jobs.DateReported >= ",$this->input->post('startDate'));
				$this->db->where("jobs.DateReported <=", $this->input->post('endDate'));
			}
			else if($this->input->post('startDate')) {
				$date = new DateTime($this->input->post('startDate'));
				$this->db->like("jobs.DateReported", $date->format('Y-m-d'));
			}
			else if($this->input->post('endDate')) {
				$date = new DateTime($this->input->post('endDate'));
				$this->db->like("jobs.DateReported", $date->format('Y-m-d'));
			}
			if($this->input->post('SortField')) {
				if($this->input->post('SortField') == "DateReported") {
					$this->db->order_by($this->input->post('SortField'), "desc");
				} 
				else {
					$this->db->order_by($this->input->post('SortField'));
				}
			}
			$this->data['job_list'] = $this->db->get()->result();
			$this->load->view("includes/template", $this->data);
		}

	}
	
}