<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Controller extends CI_Controller {

    protected $user;

    public function __construct() {

        parent::__construct();

        if($this->ion_auth->is_admin()) {
            $this->user = $this->ion_auth->user()->row();
            $data['user'] = $this->user;
            $this->load->vars($data);
        } else {
			$this->session->set_flashdata('message', 'Illegal access');
            redirect(site_url("/"));
        }
    }
}

class User_Controller extends CI_Controller {

    protected $user;

    public function __construct() {

        parent::__construct();

        if($this->ion_auth->in_group('members')) {
            $this->user = $this->ion_auth->user()->row();
            $data['user'] = $this->user;
            $this->load->vars($data);
        } else {
			$this->session->set_flashdata('message', 'Illegal access');
            redirect(site_url("/"));
        }
    }
}

class Common_Auth_Controller extends CI_Controller {

    protected $user;

    public function __construct() {

        parent::__construct();

        if($this->ion_auth->logged_in()) {
			$this->user = $this->ion_auth->user()->row();
            $data['user'] = $this->user;
            $this->load->vars($data);
        } else {
			$this->session->set_flashdata('message', 'Illegal access');
            redirect(site_url("/"));
        }
    }
}

