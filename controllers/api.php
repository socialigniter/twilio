<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends Oauth_Controller
{
    function __construct()
    {
        parent::__construct();
        
		$this->load->config('twilio');
		$this->load->library('twilio');
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
	
	function sms_send_authd_post()
	{
		// Send a new outgoing SMS */
		$from 		= config_item('twilio_phone_number');
		$to			= $this->input->post('to_number');
		$message 	= $this->input->post('sms_message');

		$send_sms = $this->twilio->sms($from, $to, $message);

		if ($send_sms)
		{
            $message = array('status' => 'success', 'message' => 'Yay, your SMS was sent');
        }
        else
        {
            $message = array('status' => 'error', 'message' => 'Dang your SMS could not be sent');
        }		
		
		$this->response($message, 200);		
	}
	
}