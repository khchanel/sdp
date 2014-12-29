<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Admin_Controller {

    function __construct() {
        parent::__construct();
    }
    function index() {
		//Getting data from database
		$this->db->select('*');
		$this->db->from('users');
		
		//forward data to view
		$this->data['title'] = "User List";
		$this->data['user_list'] = $this->db->get()->result();
		
		//Loading the views with the required data		
		$this->data['mainContent'] = "admin_view";
		$this->data['headerBar'] = "admin";
		$this->data['message'] = $this->session->flashdata('message');
		$this->load->view("includes/template", $this->data);	
    }
	/**
     *  Add User into database
     **/
	function register() {
		// get data from register form
		$username = $this->input->post('username', true);
		$password = $this->input->post('password', true);
		$email = $this->input->post('email', true);
		$phone = $this->input->post('phone', true);
		$room_num = $this->input->post('room_num',true);
		$additional_data = array(
									'first_name' => $this->input->post('first_name', true),
									'last_name' => $this->input->post('last_name', true),
									'phone' => $this->input->post('phone',true),
									'room_num' => $this->input->post('room_num',true)
									);
									
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('username', 'username', 'trim|required|callback_username_check');
		$this->form_validation->set_rules('first_name', 'first name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'last name', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'required|matches[passconf]');
		$this->form_validation->set_rules('passconf', 'password confirmation', 'required');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email|callback_email_check');
		$this->form_validation->set_rules('room_num', 'room number', 'required');
		$this->form_validation->set_rules('phoneNumber', 'phone number', 'callback_valid_phone_number_or_empty');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->add_user();
		}
		else
		{
			$this->ion_auth->register($username, $password, $email, $additional_data);
			$this->session->set_flashdata (
				'message',
				'The user has been added.'
			);
			redirect(site_url('admin/admin'));
		}							
	}
	
	function add_user() {
		$this->data['title'] = "Register User";
		$this->data['mainContent'] = "register_view";
		$this->data['headerBar'] = "default";
		$this->data['message'] = $this->session->flashdata('message');
		$this->load->view("includes/template", $this->data);
	}
	
	function view_user($id){
		//Getting data from database
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id',$id);
		
		//forward data to view
		$this->data['title'] = "User List";
		$this->data['query'] = $this->db->get()->result();
		
		$this->data['title'] = "View User";
		$this->data['mainContent'] = "view_user_view";
		$this->data['headerBar'] = "view_user_view";
		$this->load->view("includes/template", $this->data);	
	}
	
	function edit_user ($id){
		//Getting data from database
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id',$id);
		
		$this->data['query'] = $this->db->get()->result();
		
		$this->data['title'] = "Edit User";
		$this->data['mainContent'] = "edit_user_view";
		$this->data['headerBar'] = "edit_back";
		$this->data['message'] = $this->session->flashdata('message');
		$this->load->view("includes/template", $this->data);	
	
	}
	
	function update_user()
	{
		$emailAddress = $this->input->post('emailAddress', true);
		$phoneNumber = $this->input->post('phoneNumber', true);
		$firstName = $this->input->post('firstName', true);
		$lastName = $this->input->post('lastName', true);
		$username = $this->input->post('username', true);
		$room = $this->input->post('room_num', true);
		$id = $this->input->post('id', true);

		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('username', 'username', 'callback_username_check');
		$this->form_validation->set_rules('emailAddress', 'email address', 'required|valid_email|callback_email_check');
		$this->form_validation->set_rules('phoneNumber', 'phone number', 'callback_valid_phone_number_or_empty');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->edit_user($id);
		}
		else
		{ 
			$data = array(
							'email' => $emailAddress,
							'phone' => $phoneNumber,
							'first_name' => $firstName,
							'last_name' => $lastName,
							'username' => $username,
							'room_num' => $room
						  );		  
			$this->ion_auth->update($id, $data);
			$this->session->set_flashdata (
				'message',
				'The user data has been updated.'
			);
			redirect('admin/view_user/'.$id);
		}
	}
	
	function valid_phone_number_or_empty($value)
	{
        $value = trim($value);
        if ($value == '') {
        	return TRUE;
        }
        else
        {
            if (preg_match('/^0\d{9}$/', $value))
            {
            	return TRUE;
            }
            else
            {
            	$this->form_validation->set_message('valid_phone_number_or_empty', 'Please Enter a valid Australia mobile phone numbers.');
				return FALSE;
            }
        }

	}
	
	function del_user()
	{
		$id = $this->input->post('id', true);
		$this->ion_auth->delete_user($id);	
		
		$this->session->set_flashdata (
			'message',
			'The user has been deleted.'
		);
		
		redirect('/admin');		
	}
	
	function username_check($value) {
		$user = $this->ion_auth->user($this->input->post('id'))->row();
		$username = $user->username;
		if($username != $value) {
			if($this->ion_auth->username_check($value)) {
				$this->form_validation->set_message('username_check', 'The username has already been taken.');
				return false;
			} 
		}
		return true;
		
	}
	
	function email_check($value)  {
		$user = $this->ion_auth->user($this->input->post('id'))->row();
		$email = $user->email;
		if($email != $value) {
			if($this->ion_auth->email_check($value)) {
				$this->form_validation->set_message('email_check', 'The email has already been used before.');
				return false;
			} 
		}
		return true;
	}
}
?>
