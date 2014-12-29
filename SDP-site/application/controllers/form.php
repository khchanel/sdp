<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Form extends User_Controller {
	
	function Form()
	{
		parent::__construct();	
		$this->load->library('form_validation');
		define('COMPLETED', 5);
	}
	
	function index() 
	{
		//Add the required data to the array
		$this->data['title'] = "Submit Request Form";
		$this->data['categories'] = $this->db->get('categories');
		
		//Load the views and pass through the required data
		$this->data['mainContent'] = "create_request_view";
		$this->data['headerBar'] = "request_form";
		$this->data['message'] = $this->session->flashdata('message');
		$this->load->view("includes/template", $this->data);
	}
	
	function report_insert() 
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['remove_spaces'] = FALSE;
		$config['max_size']	= '2000';

		$this->load->library('upload', $config);
		
		//Set the validation rules for each field
		$this->form_validation->set_rules('Description', 'description', 'trim|required');
		$this->form_validation->set_rules('Title', 'title', 'trim|required');
		$this->form_validation->set_rules('CategoryId', 'category', 'trim|required|greater_than[0]');
		
		//Set the unique messages for each rule
		$this->form_validation->set_message('required', 'The %s field is required ');
		$this->form_validation->set_message('greater_than', 'Please select a %s');
		
		//Run the validation
		if ($this->form_validation->run() == FALSE)
		{
			//Redirect the index function when the validation fails
			$this->index();	
		}
		else
		{
			if($_FILES['ImageName']['name'] != "") {
				if(!$this->upload->do_upload('ImageName')) {
					$this->session->set_flashdata (
						'message',
						$this->upload->display_errors()
					);
					$this->index();
					return;
				}
			}
			$data = array ('Title' => $this->input->post('Title'),
						   'Description' =>	$this->input->post('Description'),
						   'CategoryID' => $this->input->post('CategoryId'),
						   'StatusID' => $this->input->post('StatusID'),
						   'TenantID' => $this->input->post('TenantID')
			);
			if($this->input->post('ImageName')) {
				$data['ImageName'] = $this->input->post('ImageName');
			} else if($_FILES['ImageName']["name"]) {
				$data['ImageName'] = $_FILES['ImageName']["name"];
			}	
			//Insert the job into the jobs table if validation passes
			$this->db->insert('jobs', $data);	
			redirect('manage');
		}
	}
	
	function view_request($id)
	{
		//Retrieves all the comment from the DB
		$this->db->from("comments");
		$this->db->where("JobID", $id);
		$this->data['comments'] = $this->db->get();
		if($this->data['comments']->num_rows() > 0) {
			$this->data['comments']->result();	
		}
		
		//Retrieves all the job information from the DB
		$this->db->from("jobs");
		$this->db->where("JobId", $id);
		$this->db->join('categories', 'jobs.CategoryId = categories.CategoryID');
		$this->db->join('statuses', 'jobs.StatusID = statuses.StatusId');
		$this->db->join('users', 'users.id = jobs.TenantID');
		$this->data['query'] = $this->db->get()->result();
				
		//Passes the other required data to the loaded view.
		$this->data['title'] = "View Request";
		$this->data['mainContent'] = "view_request_view";
		$this->data['headerBar'] = "view_request_view";
		$this->data['message'] = $this->session->flashdata('message');
		$this->load->view("includes/template", $this->data);	
	}
	
	function edit_request($id) 
	{
		//Add the required data to the array
		$this->data['title'] = "Edit Request Form";
		
		//Get Categories
		$this->data['categories'] = $this->db->get('categories');
		
		//Get Job Information
		$this->db->from('jobs');
		$this->db->where('jobID', $id);
		$this->data['jobData'] = $this->db->get();
		
		$statusID = $this->data['jobData']->row()->StatusID;
		//Get Statuses
		if($statusID != COMPLETED && $this->ion_auth->is_admin()){
			$this->db->where('StatusID !=', COMPLETED);	
		}
		$this->db->from('statuses');
		$this->data['status'] = $this->db->get();
		
		//Load the views and pass through the required data
		$this->data['mainContent'] = "edit_request_view";
		$this->data['headerBar'] = "request_form";
		$this->data['message'] = $this->session->flashdata('message');
		$this->load->view("includes/template", $this->data);
	}
	
	function update_request($id)
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['remove_spaces'] = FALSE;
		$config['max_size']	= '2000';

		$this->load->library('upload', $config);
		
		//Set the validation rules for each field
		$this->form_validation->set_rules('Description', 'description', 'trim|required');
		$this->form_validation->set_rules('Title', 'title', 'trim|required');
		$this->form_validation->set_rules('CategoryId', 'category', 'trim|greater_than[0]');
		$this->form_validation->set_rules('StatusID', 'status', 'trim|greater_than[0]');
		
		//Set the unique messages for each rule
		$this->form_validation->set_message('required', 'The %s field is required ');
		$this->form_validation->set_message('greater_than', 'Please select a %s');
		
		//Run the validation
		if ($this->form_validation->run() == FALSE)
		{
			//Redirect the index function when the validation fails
			$this->edit_request($id);
		}
		else
		{
			if($_FILES['ImageName']['name'] != "") {
				if(!$this->upload->do_upload('ImageName')) {
					$this->session->set_flashdata (
						'message',
						$this->upload->display_errors()
					);
					$this->edit_request($id);
					return;
				}
			}
			$data = array ('Title' => $this->input->post('Title'),
						   'Description' =>	$this->input->post('Description'),
						   'CategoryID' => $this->input->post('CategoryId'),
						   'StatusID' => $this->input->post('StatusID'),
						   'TenantID' => $this->input->post('TenantID'),						   
						   'RoomNum' => $this->input->post('RoomNum')	
			);
			if($this->input->post('ImageName')) {
				$data['ImageName'] = $this->input->post('ImageName');
			} else if($_FILES['ImageName']["name"]) {
				$data['ImageName'] = $_FILES['ImageName']["name"];
			}	
			//Insert the job into the jobs table if validation passes
			$this->db->from('jobs');
			$this->db->where('jobID', $id);
			$this->db->update('jobs', $_POST);	
			redirect('form/view_request/'.$id);
		}
	}
	
	function delete_request($id)
	{
		// TODO validate user
		
		// delete from database
		$this->db->where('JobID', $id);
		$this->db->delete('comments');
		
		$this->db->where('JobId', $id); // note the different JobId field name 
		$this->db->delete('jobs');
		
		// finish delete, redirect back to list
		redirect('manage');
		
	}
	
	function submit_comment()
	{
		$this->form_validation->set_rules('Body', 'comment', 'trim|required');
		
		if ($this->form_validation->run() == FALSE)
		{
			redirect('form/view_request/'.$this->input->post('JobID'));
		}
		else
		{
			$this->db->insert('comments', $_POST);	
			redirect('form/view_request/'.$this->input->post('JobID'));
		}
	}
}

?>
