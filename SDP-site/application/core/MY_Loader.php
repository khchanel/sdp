<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Loader extends CI_Loader {

    function view($view, $vars = array(), $return = FALSE) {
		$ci =& get_instance();
		$ci->load->library('user_agent');

		if ($ci->agent->is_mobile()) {
			//Mobile device 
            $view = 'mobile/'.$view;
        } else { 
			// Desktop
			$view = 'mobile/'.$view;
        }

        return $this->_ci_load(array(
            '_ci_view' => $view,
            '_ci_vars' => $this->_ci_object_to_array($vars),
            '_ci_return' => $return)
        );
    }
}
