<div id="modal_drot_earned" class="modal metro hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header bg-red"><h3 id="myModalLabel"><strong>Congratulations <?php echo ucfirst($user['firstname']);?>!</strong><!--?php echo $points_level;?--><i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3></div>
	<div class="modal-body">
		
		<div class="tile-content text-center ">
		<p class="s1content_title">You have completed</p>
		<p class="s1content_title">*[Worker/Supervisor]* Awareness Training</p>
		<p class="s1content_subtitle">Your D.R.O.T</p>
		</div>
		<div class="tile-content text-center"><p><img src="<?php echo $base."img/badges/badges-33.png";?>" width="120" ></p> </div>
		<div class="tile-content text-center">
			<p class="s1content_subtitle">has been assigned</p>

		</div>
		
	</div>
	<!--div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div-->
</div>
<script type="text/javascript">
$('#modal_drot_earned').modal('show');
$('#modal_drot_earned').css({'max-width':'500px'});
</script>

