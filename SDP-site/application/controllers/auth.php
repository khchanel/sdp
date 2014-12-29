<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
		/*
		 * if the user is already logged in, redirect to homepage
		 * otherwise show login pgae
		 */
		if ($this->ion_auth->logged_in()) {
			redirect(site_url('manage'));
		} else {
			$this->data['title'] = "Login Form";
			$this->data['message'] = $this->session->flashdata('message');
			$this->data['mainContent'] = "login_view";
			$this->data['headerBar'] = "default";
			$this->load->view("includes/template", $this->data);
		}	
    }

    /**
     * login function to authenticate user and redirect to page
     **/
    function login() {
        if($_POST) {
			// gather data from POST input
            $identity = $this->input->post('identity', true);
            $password = $this->input->post('password', true);
			$remember = $this->input->post('remember');

			// check login
            if($this->ion_auth->login($identity, $password, $remember)) {
				// login successful, redirect to home page
				redirect(site_url('manage'));
            } else {
				//set error message in flashdata
                $this->session->set_flashdata(
                    'message',
                    'Your login attempt failed.'
                );

                //$this->index();
				redirect(site_url('/'));
            }
        } 
		
		// user try to access without usingthe login form
		redirect(site_url('/'));
    }

    /**
     * logout function to destroy user session
     **/
    function logout() {
        $this->ion_auth->logout();
		
		// set flash message
		$this->session->set_flashdata (
			'message',
			'You have been logged out'
		);
		
		//redirect to login page
		redirect('/');
    }
	
		//forgot password
	function forgot_password()
	{
		$this->form_validation->set_rules('email', 'Email Address', 'required');
		if ($this->form_validation->run() == false)
		{
			//setup the input
			$this->data['email'] = array('name' => 'email',
				'id' => 'email',
				'data-theme' => 'b',
				'data-mini' => 'true',
			);

			//set any errors and display the form
			$this->data['title'] = "Forgot Password";
			$this->data['mainContent'] = "auth/forgot_password";
			$this->data['headerBar'] = "forgot_pass";
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->load->view("includes/template", $this->data);
		}
		else
		{
			//run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($this->input->post('email'));

			if ($forgotten)
			{ 
				//if there were no errors
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("auth/forgot_password", 'refresh');
			}
		}
	}

	//reset password - final step for forgotten password
	public function reset_password($code = NULL)
	{
		if (!$code)
		{
			show_404();
		}

		$user = $this->ion_auth->forgotten_password_check($code);

		if ($user)
		{  
			//if the code is valid then display the password reset form

			$this->form_validation->set_rules('new', 'New Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', 'Confirm New Password', 'required');

			if ($this->form_validation->run() == false)
			{
				//display the form

				//set the flash data error message if there is one
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
				$this->data['new_password'] = array(
					'name' => 'new',
					'id'   => 'new',
					'type' => 'password',
					'data-theme' => 'b',
					'data-mini' => 'true',
					'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
				);
				$this->data['new_password_confirm'] = array(
					'name' => 'new_confirm',
					'id'   => 'new_confirm',
					'type' => 'password',
					'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
					'data-theme' => 'b',
					'data-mini' => 'true',
				);
				$this->data['user_id'] = array(
					'name'  => 'user_id',
					'id'    => 'user_id',
					'type'  => 'hidden',
					'value' => $user->id,
					
				);
				$this->data['csrf'] = $this->_get_csrf_nonce();
				$this->data['code'] = $code;

				//render
				$this->data['title'] = "Reset Password";
				$this->data['mainContent'] = "auth/reset_password";
				$this->data['headerBar'] = "forgot_pass";
				$this->load->view("includes/template", $this->data);
			}
			else
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id')) 
				{

					//something fishy might be up
					$this->ion_auth->clear_forgotten_password_code($code);

					show_error('This form post did not pass our security checks.');

				} 
				else 
				{
					// finally change the password
					$identity = $user->{$this->config->item('identity', 'ion_auth')};

					$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

					if ($change)
					{ 
						//if the password was successfully changed
						$this->session->set_flashdata('message', $this->ion_auth->messages());
						$this->logout();
					}
					else
					{
						$this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('auth/reset_password/' . $code, 'refresh');
					}
				}
			}
		}
		else
		{ 
			//if the code is invalid then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}
	
	function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key   = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	function _valid_csrf_nonce()
	{
		if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
			$this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}
?>
