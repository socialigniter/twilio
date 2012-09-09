<?php
class Twiml extends MY_Controller
{
    function __construct()
    {
        parent::__construct();         
	}

	function make_recording()
	{
		$this->output->set_header('text/xml');
		$this->load->view('../modules/twilio/views/twiml/make_recording');		
	}

	function transcribe()
	{
		$content_data = array(
			'transcription_status'	=> $this->input->post('TranscriptionStatus'),
			'recording_url'			=> $this->input->post('RecordingUrl')
		);

	    if (strtolower($this->input->post('TranscriptionStatus')) != "completed")
	    {
			$content_data['message_text'] = 'Transcription not completed';
	    }
	    else
	    {
	    	$content_data['message_text'] = $this->input->post('TranscriptionText');
	    }

		$insert = $this->db->insert('voicemails', $content_data);

		if ($content_id = $this->db->insert_id())
		{
			echo $content_id;	
    	}
    	else
    	{
	    	echo 'Could not create';    	
    	}
	}

	function good_bye()
	{
		$this->output->set_header('text/xml');
		$this->load->view('../modules/twilio/views/twiml/good_bye');
	}
	
}