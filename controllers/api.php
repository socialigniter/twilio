<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends Oauth_Controller
{
    function __construct()
    {
        parent::__construct();
        
		$this->load->config('twilio');
	}

    /* Install App */
	function install_get()
	{
		// Load
		$this->load->library('installer');
		$this->load->config('install');        

		// Settings & Create Folders
		$settings = $this->installer->install_settings('twilio', config_item('twilio_settings'));
	
		if ($settings == TRUE)
		{
            $message = array('status' => 'success', 'message' => 'Yay, the Twilio App was installed');
        }
        else
        {
            $message = array('status' => 'error', 'message' => 'Dang Twilio could not be uninstalled');
        }		
		
		$this->response($message, 200);
	}
	
}