<?php $this->load->view('header_admin');?>
<div class="homebg metro ">
	<!--BEGIN PAGE TITLE-->
    <div class="container"><div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter"><em class="margin20">ASSIGN LIBRARY</em></div></div>
    <!--END PAGE TITLE-->
    <div class="container">
        <div class="main-content padding-metro-home assgined-library-container clearfix"> 
        <!-------BEGIN THIRD COLUMN LIBRARIES TILES------>
        <div class="tile-group six no-margin no-padding" >
			<form class="form-inline no-margin" method="post" >
				<fieldset>
				<div class="input-control select size2">
					<select class="f13" name="cmb_libtype" id="cmb_libtype">
						<option value="" <?php echo (""==$this->input->post('cmb_libtype'))?"selected":"";?>>All</option>
						<option value="1" <?php echo (1==$this->input->post('cmb_libtype'))?"selected":"";?>>Training</option>
						<option value="2" <?php echo (2==$this->input->post('cmb_libtype'))?"selected":"";?>>SAFETY TALKS</option>
						<option value="3" <?php echo (3==$this->input->post('cmb_libtype'))?"selected":"";?>>HAZARDS</option>
						<option value="4" <?php echo (4==$this->input->post('cmb_libtype'))?"selected":"";?>>PROCEDURES</option>
						<option value="5" <?php echo (5==$this->input->post('cmb_libtype'))?"selected":"";?>>INSPECTIONS</option>
						<option value="6" <?php echo (6==$this->input->post('cmb_libtype'))?"selected":"";?>>INVESTIGATIONS</option>
					</select>
				</div>
				<div class="input-control text size4" style="height:30px">
					<input type="text" name="txt_libtitle" id="txt_libtitle" value="<?php echo $this->input->post('txt_libtitle');?>" placeholder="Title" class="" />
					<button type="button" class="btn-search fg-gray"></button>
				</div>
				</fieldset>
			</form>
			<?php 
			if( isset($inventories) && is_array($inventories) && sizeof($inventories) ) {
				foreach($inventories as $in) {
					$library_type_id= isset($in['library_type_id']) ? $in['library_type_id'] : '';
					switch( $library_type_id ) {
						case "1": {
							$imgname = "training";
							break;
						}
						case "2": {
							$imgname = "safety_talks";
							break;
						}
						case "3": {
							$imgname = "hazards";
							break;
						}
						case "4": {
							$imgname = "procedures";
							break;
						}
						case "5": {
							$imgname = "inspections";
							break;
						}
						case "6": {
							$imgname = "investigations";
							break;
						}
						default: {
							$imgname = "icon-en";
							break;
						}
					}
					$language 		= isset($in['language']) ? $in['language'] : $in['st_language'];

					if( "6" == $library_type_id ) { // INVESTIGATION //
						$rows_invforms 		= $this->users->getMetaDataList('inv_investigation_forms', 'in_inv_form_id="'.$in['in_inv_form_id'].'"', '',  'in_inv_form_id, st_inv_form_no');
						$inv_form_id 		= $inv_form_no = '';
						if( isset($rows_invforms) && sizeof($rows_invforms) ) {
							$inv_form_id 	= $rows_invforms[0]['in_inv_form_id'];
							$inv_form_no 	= $rows_invforms[0]['st_inv_form_no'];
							$row_id 		= $inv_form_id."-".$library_type_id."-".$in['lib_id'];
						}?>
						<div class="tile half-library bg-darker description" libtitle="<?php echo str_replace(" ","",strtolower($inv_form_no));?>" libtypeid="<?php echo $library_type_id;?>" id="<?php echo $row_id;?>" libtype_section="<?php echo $in['libtype_section'];?>" title="<?php echo $inv_form_no;?>">
							<div class="tile-content email">
								<div class="email-image" style="height:36px; width:36px;">
								<!--<img src='<?php echo $base."img/icons/icon-".strtolower($language).".png";?>'/>-->
								<img src='<?php echo $base."img/library/".$imgname.".png";?>'/>
								</div>
								<div class="email-data" style="margin-left:40px;margin-top:-5px;"><span class="email-data-text"><?php echo $inv_form_no;?></span></div>
							</div>
						</div>
						<?php 
					}
					else {
						$qty_ordered 	= isset($in['qty_ordered']) ? $in['qty_ordered'] : '0';
						$qty_assigned 	= isset($in['qty_assigned']) ? $in['qty_assigned'] : '0';
						// $qty_completed 	= isset($in['qty_completed']) ? $in['qty_completed'] : '0';
						$inventory 		= ($qty_ordered) ? ($qty_ordered-$qty_assigned) : $in['inventory'];

						if( $inventory > 0 ) {
							$row_id 	= $in['lib_id'];
							$lib_title = $in['lib_title'];
							if( "2" == $in['library_type_id'] ) {
								$safetytalks_title = $this->users->getMetaDataList('safetytalks_information', 'in_safetytalks_id="'.$row_id.'"', '', 'st_title');
								$lib_title = (isset($safetytalks_title[0]['st_title'])&&$safetytalks_title[0]['st_title']) ? $safetytalks_title[0]['st_title'] : $lib_title;
							}?>
							<div class="tile half-library bg-darker description" libtitle="<?php echo str_replace(" ","",strtolower($in['lib_title']));?>" libtypeid="<?php echo $library_type_id;?>" id="<?php echo $row_id;?>" libtype_section="<?php echo $in['libtype_section'];?>" title="<?php echo $in['lib_title'];?>">
								<div class="tile-content email">
									<div class="email-image" style="height:36px; width:36px;">
									<!--<img src='<?php echo $base."img/icons/icon-".strtolower($language).".png";?>'/>-->
									<img src='<?php echo $base."img/library/".$imgname.".png";?>'/>
									</div>
									<div class="email-data" style="margin-left:40px;margin-top:-5px;"><span class="email-data-text"><?php echo $lib_title;?></span></div>
								</div>
								<div class="brand">
									<div class="badge no-margin fg-white bg-transparent">
										<span class="badge bg-red" id="balance<?php echo $in['lib_id'];?>"><?php echo (int)$inventory;?></span>
									</div>
								</div>
							</div>							
							<?php 
						}
					}
				}
			}
			else {
				echo "<h5 class='fg-black'>No inventory available</h5>";
			}?>
        </div>
        <!-------END THIRD COLUMN LIBRARIES TILES------>

		   
        <!--START SECON column ASSIGN/CONNECTION tiles-->  
		<div class="tile-group two no-margin no-padding" >
       		<!--begin Select Users tile -->
				<div class=" input-control text bg-transparent fg-white" style="height:30px;width:250px;text-align:center;vertical-align: bottom;"></div>
            <!--end select users tile-->
            <!--begin assign tile -->
				<div class="tile double bg-gray assign-contents" ><img src="<?php echo $base;?>img/assign/assign.png"></div>
			<!--end Assign tile--> 
			<!--<div class="tile triple-vertical double profile-content-box tab-content">
					<img src="< ?php echo $base;?>img/my_worker/my_worker_ads.png">
			</div> -->		
        </div>
        <!--END SECOND column ASSIGN/CONNECTION tiles-->       
</div>
</div>
</div>
<?php $this->load->view('footer_admin');?>
<script type="text/javascript" src="<?php echo $base;?>js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script>
<script type="text/javascript">
	var jq201 = jQuery.noConflict();
	jq201(document).ready(function () {	
		$(".description").click(function(){
			if($(this).hasClass('selected')) {
				$(this).removeClass('selected');
			}
			else {
				$(this).addClass('selected');
			}
		});

		$(".assign-contents").click(function() {
			var len_libcontent 		= $(".description.selected").length;
			if( len_libcontent == 0 ) {
				alert( "Please select atleast 1 Library Content." );
				return false;
			}

			if( confirm("Are you sure you want to Assign?") ) {
				var arr_library = new Array();
				var arr_libtype = new Array();
				cnt_library = 0;
				$(".description.selected").each(function() {
					arr_library[cnt_library] = $(this).attr('id');
					$libtype_section = $(this).attr('libtype_section')
					arr_libtype[cnt_library] = $libtype_section;

					cnt_library++;
				});
				jq201.post(js_base_path+'admin/assign_library', {'arr_library':arr_library, 'arr_libtype':arr_libtype, 'libtype_section':$libtype_section}, function(data){
					var data = data.trim();
					if(data != '') {
						if( "1" == data ) {
							alert("Successfully Assigned.");
							window.location.reload();
						}
						else if( "2" == data ) {
							alert("Failed! Duplicated assignment!");
						}
					}
					else {
						window.location.href = js_base_path+'admin/connections_metro';
					}
				});
			}
		});
		
		$('#cmb_libtype').change(function(){
            if( '' == $(this).val() ) {
				$('.description').show();
			}
			else {
				$('.description').hide();
				$('.description[libtypeid='+$(this).val()+']').show();
            }
        });
		
		$('#txt_libtitle').keyup(function(){
            if( '' == $(this).val() ) {
				$('.description').show();
			}
			else {
				$('.description').hide();
				$('.description[libtitle*='+$(this).val().toLowerCase().replace(" ","")+']').show();
            }
        });
	});
	</script>