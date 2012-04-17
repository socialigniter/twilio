<form method="post" id="status_update" action="<?= base_url() ?>api/content/create">
	<p><input type="text" name="to_number" placeholder="5051110000" id="to_number"></p>
	<textarea id="status_update_text" placeholder="Yo dawg, I herd you like messages..." name="sms_message"></textarea>
	<div id="status_update_post">
		<input type="submit" name="post" id="status_post" value="Send" />
		<span id="character_count"></span>
	</div>
	<div class="clear"></div>
</form>

<?php foreach ($responses->ResponseXml->SMSMessages->SMSMessage as $message): ?>
<p><b><a href="#"><?= $message->From; ?></a></b> <?= $message->Body; ?><span class="status_meta"><?= $message->DateCreated; ?></span></p>
<?php endforeach; ?>

<div class="clear"></div>
<div class="content_norm_separator"></div>

<script type="text/javascript">
$(document).ready(function()
{
	// Character Counter
	$('#status_update_text').NobleCount('#character_count',
	{
		on_negative: 'color_red'
	});	

	// Update Status
	$('#status_update').bind('submit', function(e)
	{
		e.preventDefault();
		$.validator(
		{
			elements : 
				[{
					'selector' 	: '#status_update_text',
					'rule'		: 'require', 
					'field'		: 'Please write something...',
					'action'	: 'element'
				}],
			message	 : '',
			success	 : function()
			{			
				var sms_data	= $('#status_update').serializeArray();
		
				$.oauthAjax(
				{
					oauth 		: user_data,
					url			: base_url + 'api/twilio/sms_send',
					type		: 'POST',
					dataType	: 'json',
					data		: sms_data,
				  	success		: function(result)
				  	{		  		  	
						if (result.status == 'success')
						{
							$('#status_update_text').val('');
							
						}
						
						$('#content_message').notify({status:result.status,message:result.message});
					}
				});
				
			
			}
		});
	});

});
</script>