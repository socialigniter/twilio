<form name="settings" method="post" action="<?= base_url() ?>settings/update" enctype="multipart/form-data">

<div class="content_wrap_inner">
	
	<div class="content_inner_top_right">
		<h3>Module</h3>
		<p><?= form_dropdown('enabled', config_item('enable_disable'), $settings['twilio']['enabled']) ?></p>
	</div>		
	
	<h3>Application Keys</h3>

	<p>Twilio is a paid service, read about it and <a href="https://twilio.com" target="_blank">signup</a></p>
				
	<p><input type="text" name="account_sid" value="<?= $settings['twilio']['account_sid'] ?>"> Account SID </p> 

	<p><input type="text" name="auth_token" value="<?= $settings['twilio']['auth_token'] ?>"> Auth Token</p> 

</div>

<span class="item_separator"></span>

<div class="content_wrap_inner">

	<h3>Setup</h3>

	<p><input type="text" name="phone_number" value="<?= $settings['twilio']['phone_number'] ?>"> Phone Number</p> 

</div>

<span class="item_separator"></span>

<div class="content_wrap_inner">

	<h3>SMS</h3>

	<p>Signup
	<?= form_dropdown('sms_signup', config_item('yes_or_no'), $settings['twilio']['sms_signup']) ?>
	</p>

	<p>Sending
	<?= form_dropdown('sms_sending', config_item('yes_or_no'), $settings['twilio']['sms_sending']) ?>
	</p>

	<p>Receiving
	<?= form_dropdown('sms_receiving', config_item('yes_or_no'), $settings['twilio']['sms_receiving']) ?>
	</p>

	<input type="hidden" name="module" value="twilio">

	<p><input type="submit" name="save" value="Save" /></p>

</div>

</form>