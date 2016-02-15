<?php 
$this->load->view('header_admin');
$crew_label = (isset($arr_crew_workers['st_crew_label']) && $arr_crew_workers['st_crew_label']) ? " - ".strtoupper($arr_crew_workers['st_crew_label']) : '';
?>
<div class="homebg metro ">
	<!--BEGIN PAGE TITLE-->
    <div class="container">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter">
        <em class="margin20">ADD MORE WORKERS TO MY CREW <?php echo $crew_label;?> <a href="<?php echo $base;?>admin/my_crew?crew_id=<?php echo $crew_id;?>" class="icon-arrow-left  fg-white" title="Back"></a></em>
        </div>
    </div>
    <!--END PAGE TITLE-->
    <div class="container">
        <div class="main-content padding-metro-home clearfix"> 
			<div class="tile-group six no-margin no-padding" >
				<form class="form-inline no-margin" method="post">
					<fieldset>
					<div class="input-control text size3" style="height:30px">
						<input type="text" name="txt_workername" id="txt_workername" placeholder="Search Worker"/>
						<button type="button" class="btn-search fg-gray"></button>
					</div>
					</fieldset>
				</form>
				<?php 
				if( isset($all_connected_workers) && sizeof($all_connected_workers) ) {
					foreach( $all_connected_workers AS $ln ) {
						$cls_workericon = in_array($ln['worker_id'], explode(",", $my_crew_workers)) ? 'icon-checkmark' : 'icon-cancel';
						$not_myworker = ("icon-cancel"==$cls_workericon) ? 'not_myworker' : ''
						?>
						<div class="tile half-library bg-black myworker <?php echo $not_myworker;?>" id="<?php echo "is_selected".$ln['worker_id'];?>" workerid="<?php echo $ln['worker_id'];?>" workertile-title="<?php echo strtolower($ln['firstname']." ".$ln['lastname']);?>">
							<div class="tile-content email">								
								<div class="email-image" style="height:36px; width:36px;">
									<?php $img_worker =(!empty($ln['profile_image'])) ? $base.$this->path_upload_profiles.$ln['profile_image'] : $base."img/default.png";?>
									<a href='#modal_worker_profile' data-toggle='modal' onclick="javascript:ajaxMyWorkers('<?php echo $ln['firstname']." ".$ln['lastname'];?>');" data-toggle='modal'><img src="<?php echo $img_worker;?>"/></a>
								</div>			
								<div class="email-data" style="margin-left:40px;margin-top:-5px;"><span class="email-data-text"><?php echo $ln['firstname']." ".$ln['lastname'];?></span></div>
							</div>
							<div class="brand"><div class="badge no-margin fg-white bg-transparent"><span class="<?php echo $cls_workericon;?>"></span></div></div>
						</div>               
						<script type="text/javascript">
							$('#<?php echo "is_selected".$ln['worker_id'];?>.not_myworker').click(function(){
								if($('#<?php echo "is_selected".$ln['worker_id'];?>').hasClass('selected')) {
									$('#<?php echo "is_selected".$ln['worker_id'];?>').removeClass('selected');
								}
								else {
									$('#<?php echo "is_selected".$ln['worker_id'];?>').addClass('selected');
								}
							});
						</script>
						<?php
					}
				}
				else {
					echo "<h5 class='fg-black'>No workers available</h5>";
				}?>
				<div id="modal_worker_profile" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-header bg-red">
						<h3 id="myModalLabel">My Workers<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
					</div>
					<div class="modal-body"><div class="charities-container cls_myworkers" style="padding:0px 0px 0px 0px;box-shadow: none;"></div></div>
					<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
				</div>
			</div>
            <!--START SECON column ASSIGN/CONNECTION tiles-->
			<div class="tile-group no-margin no-padding clearfix span2">  
				<div class="bg-transparent " style="height:40px;box-shadow: 0px 0px 0px inset;"></div>
				<a class="tile double profile-content-box tab-content" id="id_btn_addmore_crew"><img src="<?php echo $base;?>img/my_crew/save.png"></a>
				<!--<div class="tile triple-vertical double profile-content-box tab-content"><img src="< ?php echo $base;?>img/my_crew/my_crew_double_ads.png"></div> -->
			</div>
			<!--END SECOND column ASSIGN/CONNECTION tiles-->					
		</div>
	</div>
	<div>&nbsp;</div>
</div>
<?php $this->load->view('footer_admin');?>
<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script>
<script type="text/javascript">
	$('#txt_workername').keyup(function(){
		if( '' == $(this).val() ) {
			$('.myworker').show();
		}
		else {
			$('.myworker').hide();
			$('.myworker[workertile-title*='+$(this).val().toLowerCase().replace(" ","")+']').show();
		}
	});
	
	function ajaxMyWorkers(workerName) 
	{
		$.ajax({
			url: '<?php echo $base;?>ajax/ajaxMyWorkers',  
			type: 'post',
			data: {'workerName': workerName },
			success: function(output) {
				$(".cls_myworkers").html(output);
			},
			error: function(errMsg) {
				alert( errMsg.responseText );
				return false;
			}
		});
	}

	$(document).ready(function () {
		$("#id_btn_addmore_crew").click(function() {
			var crew_id			= '<?php echo $crew_id;?>';
			var len_myworker 	= $(".myworker.not_myworker.selected").length;

			if( len_myworker == 0 ) {
				alert( "Please select atleast 1 worker from the list" );
				return false;
			}
			var arr_workers = new Array();
			var cnt_myworker = 0;
			if( confirm("Are you sure you want to add selected Worker(s)?") ) {
				$(".myworker.not_myworker.selected").each(function() {
					arr_workers[cnt_myworker] = $(this).attr('workerid');
					cnt_myworker++;
				});
				$(".myworker").not(".not_myworker").each(function() {
					arr_workers[cnt_myworker] = $(this).attr('workerid');
					cnt_myworker++;
				});
				$.post(js_base_path+'ajax/ajaxSaveCrewWorkers', {'arrWorkers':arr_workers, 'crew_id':crew_id}, function(data){
					if(data.trim() != '') {
						alert(data);
					}
					else {
						window.location.reload();
					}
				});
			}
		});
	});
</script>
