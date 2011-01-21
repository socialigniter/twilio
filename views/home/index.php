<ol class="repeating_content" id="timeline">
	<?php $i=0; foreach ($responses->ResponseXml->Calls->Call as $call): $i++; ?>
	<li class="repeating_item" id="status_<?= $i; ?>">
		<span class="status_thumbnail">
			<img src="<?= asset_profiles() ?>medium_nopicture.png" border="0" />
		</span>
		<span class="status_text">
			<b><a href="#"><?= $call->Caller; ?></a></b> Call lasted for <?= $call->Duration; ?> seconds<br>
			<?= $call->Sid ?>
			<span class="status_meta"><?= $call->StartTime; ?></span>
		</span>
		<div class="clear"></div>
		<ul class="status_actions">
			<li><span class="status_actions reply"><a href="#">Call</a></span></li>
		</ul>		
	</li>
	<?php endforeach; ?>
</ol>

<div class="clear"></div>
<div class="content_norm_separator"></div>