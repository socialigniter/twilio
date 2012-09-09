<Response>
    <Say>Hello. This is a call from the Twilio voicemail transcription. Please leave a voicemail after the beep, and remember to speak clearly.</Say>
    <Record transcribe="true" transcribeCallback="<?= base_url().'twilio/twiml/transcribe' ?>" action="<?= base_url().'twilio/twiml/good_bye' ?>" maxLength="30" />
</Response>