<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends Common_Auth_Controller {
	
	function Manage()
	{
		parent::__construct();	
	}
	
	//settings menu
	function index() 
	{
		$this->data['title'] = "User Settings";
		$this->data['mainContent'] = "settings_view";
		$this->data['headerBar'] = "default";
		$this->load->view("includes/template", $this->data);
	}
	
	//change password page
	function changePassword()
	{
		$this->data['title'] = "Change Password";
		$this->data['mainContent'] = "changePassword_view";
		$this->data['headerBar'] = "default";
		$this->data['message'] = $this->session->flashdata('message');
		$this->load->view("includes/template", $this->data);
	}
	
	/** changes the users password **/
	function changeUserPassword()
	{
		/* Check password is current disable because of fail to compare 
		 * the input from form and encrypted  password in database. 
		 * But, checking the newpassword and update to database is functionally.
		 */

		$password = $this->input->post('oldPassword', true);
		$newPassword = $this->input->post('newPassword', true);
		$newPasswordConfirm = $this->input->post('newPasswordConfirm', true);
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('oldPassword', 'old password', 'required');
		$this->form_validation->set_rules('newPassword', 'new password', 'required|matches[newPasswordConfirm]');
		$this->form_validation->set_rules('newPasswordConfirm', 'new password confirm', 'required');
	
		
			
		if ($this->form_validation->run() == FALSE)
		{
			$this->changePassword();
		}
		else 
		{	
			$identity = $this->session->userdata($this->config->item('identity', 'ion_auth'));	
			$change = $this->ion_auth->change_password($identity, $password, $newPassword);

			if ($change)
			{ 
				//if the password was successfully changed
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				$this->ion_auth->logout();
				redirect('/');
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('settings/changePassword', 'refresh');
			}
		}		
	}
	
	//change account contact details page
	function contactDetails()
	{
		$this->data['title'] = "User Contact Details";
		$this->data['mainContent'] = "contactDetails_view";
		$this->data['headerBar'] = "default";
		$this->data['message'] = $this->session->flashdata('message');
		$this->load->view("includes/template", $this->data);
	}
	
	//changes contact details
	function changeContactDetails()
	{
		$emailAddress = $this->input->post('emailAddress', true);
		$phoneNumber = $this->input->post('phoneNumber', true);
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('emailAddress', 'email address', 'required|valid_email');
		$this->form_validation->set_rules('phoneNumber', 'phone number', 'callback_valid_phone_number_or_empty');
		
		if ($this->form_validation->run() == FALSE)
		{
		$this->data['title'] = "User Contact Details";
		$this->data['mainContent'] = "contactDetails_view";
		$this->data['headerBar'] = "default";
		$this->data['message'] = $this->session->flashdata('message');
		$this->load->view("includes/template", $this->data);
		}
		else
		{ 
			$data = array(
							'email' => $emailAddress,
							'phone' => $phoneNumber
						  );
						  
			$this->ion_auth->update($this->user->id, $data);
					redirect('/settings');
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
            	return True;
            }
            else
            {
            	$this->form_validation->set_message('valid_phone_number_or_empty', 'Please Enter a valid Australia mobile phone numbers.');
				return FALSE;
            }
        }

	}
}

?>