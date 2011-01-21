<?php foreach ($responses->ResponseXml->SMSMessages->SMSMessage as $message): ?>
<p><b><a href="#"><?= $message->From; ?></a></b> <?= $message->Body; ?><span class="status_meta"><?= $message->DateCreated; ?></span></p>
<?php endforeach; ?>

<div class="clear"></div>
<div class="content_norm_separator"></div>