<?php
class Home extends Dashboard_Controller
{
    function __construct()
    {
        parent::__construct();
        
		$this->load->config('twilio');
		$this->load->library('twilio');        

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
	    
	    echo '<pre>';
	    print_r($recordings_response);
	    
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
    
    function transcriptions()
    {
		$transcriptions_url 		= config_item('twilio_api_version')."/Accounts/".config_item('twilio_account_sid')."/Transcriptions/REe9790b2556e38f8a3da456a8aa8b6f20";
	    $transcriptions_response 	= $this->twilio->request($transcriptions_url, "GET");

	    echo '<pre>';
	    print_r($transcriptions_response);
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
