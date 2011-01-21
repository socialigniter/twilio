<?php 
$i=0; 
	foreach ($responses->ResponseXml->Recordings->Recording as $message): 
		$i++;		
?>
<script type="text/javascript">
$(document).ready(function(){

	var jpPlayTime = $("#jplayer_play_time<?= $i ?>");
	var jpTotalTime = $("#jplayer_total_time<?= $i ?>");

	$("#jquery_jplayer<?= $i ?>").jPlayer({
		ready: function () {
			this.element.jPlayer("setFile", "<?= $recording_url.'/'.$message->Sid.'.mp3'; ?>", "").jPlayer("play");
		},
		oggSupport: true
	})
	.jPlayer("onProgressChange", function(loadPercent, playedPercentRelative, playedPercentAbsolute, playedTime, totalTime) {
		jpPlayTime.text($.jPlayer.convertTime(playedTime));
		jpTotalTime.text($.jPlayer.convertTime(totalTime));
	})
	.jPlayer("onSoundComplete", function() {
		$("#jquery_jplayer<?= $i ?>").jPlayer("playHead", 0); // Crossover the players here
	});

	$("#jquery_jplayer<?= $i ?>").jPlayer({
		ready: function () {
			this.element.jPlayer("setFile", "<?= $recording_url.'/'.$message->Sid.'.mp3'; ?>");
		},
		nativeSupport: false,
		customCssIds: true
	})
	.jPlayer("cssId", "play", "jplayer_play<?= $i ?>")
	.jPlayer("cssId", "pause", "jplayer_pause<?= $i ?>")
	.jPlayer("cssId", "stop", "jplayer_stop<?= $i ?>")
	.jPlayer("cssId", "loadBar", "jplayer_load_bar<?= $i ?>")
	.jPlayer("cssId", "playBar", "jplayer_play_bar<?= $i ?>")
	.jPlayer("onProgressChange", function(loadPercent, playedPercentRelative, playedPercentAbsolute, playedTime, totalTime) {
		jpPlayTime<?= $i ?>.text($.jPlayer.convertTime(playedTime));
		jpTotalTime<?= $i ?>.text($.jPlayer.convertTime(totalTime));
	})
	.jPlayer("onSoundComplete", function() {
		$("#jquery_jplayer<?= $i ?>").jPlayer("playHead", 0); // Crossover the players here
	});
});
</script>

<div id="jquery_jplayer<?= $i ?>"></div>
<div class="jp-single-player">
	<div class="jp-interface">
		<ul class="jp-controls">
			<li><a href="#" id="jplayer_play<?= $i ?>" class="jp-play" tabindex="1">play</a></li>
			<li><a href="#" id="jplayer_pause<?= $i ?>" class="jp-pause" tabindex="1">pause</a></li>
			<li><a href="#" id="jplayer_stop<?= $i ?>" class="jp-stop" tabindex="1">stop</a></li>
		</ul>
		<div class="jp-progress">
			<div id="jplayer_load_bar<?= $i ?>" class="jp-load-bar">
				<div id="jplayer_play_bar<?= $i ?>" class="jp-play-bar"></div>
			</div>
		</div>
		<div id="jplayer_play_time<?= $i ?>" class="jp-play-time"></div>
		<div id="jplayer_total_time<?= $i ?>" class="jp-total-time"></div>
	</div>
</div>
<div class="clear"></div>
<?php endforeach ?>
