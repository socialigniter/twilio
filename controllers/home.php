<?php
class Home extends Dashboard_Controller
{
    function __construct()
    {
        parent::__construct();
        
		$this->load->config('twilio');
		$this->load->library('Twilio');        

		$this->data['page_title'] = 'Twilio';
	}
 
	function index()
	{		
		redirect('home');
	}
    
    function voicemails()
    {
		$recordings_url 			= config_item('twilio_api_version')."/Accounts/".config_item('twilio_account_sid')."/Recordings";
	    $recordings_response 		= $this->twilio->request($recordings_url, "GET", array("To" => config_item('twilio_phone_number')));
	    $this->data['sub_title']	= 'Voicemails';
	    $this->data['recording_url']= 'https://api.twilio.com/'.$recordings_url; 
	    $this->data['responses'] 	= $recordings_response;
	    	    
	    $this->render();    
    }

    function sms()
    {
	    $this->data['sub_title']	= 'SMS';
	    $this->data['responses'] 	= $this->twilio->request('/'.config_item('twilio_api_version').'/Accounts/'.config_item('twilio_account_sid').'/SMS/Messages', "GET", array("To" => config_item('twilio_phone_number')));
	    	    	    	    
	    $this->render();
    }
    
    function send_sms()
    {

		$from 		= '3104023675';
		$to 		= '9712211599';
		$message 	= 'This is a test...';

		$response = $this->twilio->sms($from, $to, $message);

		if($response->IsError)
			echo 'Error: ' . $response->ErrorMessage;
		else
			echo 'Sent message to ' . $to;    
    
    }
  
  	function check_number()
  	{

		$avail_url 				= config_item('twilio_api_version')."/Accounts/".config_item('twilio_account_sid')."/AvailablePhoneNumbers/US/Local";
	    $avail_response 		= $this->twilio->request($avail_url, "GET", array("InRegion" => "503"));
  	
  		echo '<pre>';
  		print_r($avail_response);
  		echo '</pre>';
  	}
  
}
