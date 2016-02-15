<?php 
$this->load->view('header_admin');
$st_title 			= isset($safetytalks_info[0]['st_title']) ? $safetytalks_info[0]['st_title'] : '';
$st_location 		= isset($safetytalks_info[0]['st_location']) ? $safetytalks_info[0]['st_location'] : '';

$dt_datetime_safetytalk = '';
if( isset($safetytalks_info[0]['dt_datetime_safetytalk']) && $safetytalks_info[0]['dt_datetime_safetytalk']!='0000-00-00 00:00:00') {
	$dt_datetime_safetytalk = date('Y-m-d H:i', strtotime($safetytalks_info[0]['dt_datetime_safetytalk']));
}
$st_workforce 			= isset($safetytalks_info[0]['st_workforce']) ? $safetytalks_info[0]['st_workforce'] : '';

$dt_datetime_next_talk = '';
if( isset($safetytalks_info[0]['dt_datetime_next_talk']) && $safetytalks_info[0]['dt_datetime_next_talk']!='0000-00-00 00:00:00') {
	$dt_datetime_next_talk = date('Y-m-d H:i', strtotime($safetytalks_info[0]['dt_datetime_next_talk']));
}
$my_employer 		= isset($safetytalks_info[0]['in_myemployer_id']) ? json_decode($safetytalks_info[0]['in_myemployer_id']) : '';
$safetytalk_topics 	= isset($safetytalks_info[0]['st_topics_selected']) ? json_decode($safetytalks_info[0]['st_topics_selected']) : array();
$st_notes 			= isset($safetytalks_info[0]['st_notes']) ? trim($safetytalks_info[0]['st_notes']) : '';

$nons1_attendees= isset($safetytalks_attendees[0]['st_attendee_nons1users'])&&$safetytalks_attendees[0]['st_attendee_nons1users'] 
																			? json_decode($safetytalks_attendees[0]['st_attendee_nons1users']) : array();
$s1_workers 	= isset($safetytalks_attendees[0]['st_attendee_s1worker'])&&$safetytalks_attendees[0]['st_attendee_s1worker'] 
																			? explode(",",$safetytalks_attendees[0]['st_attendee_s1worker']) : array();
$s1_employers 	= isset($safetytalks_attendees[0]['st_attendee_s1employer'])&&$safetytalks_attendees[0]['st_attendee_s1employer'] 
																			? explode(",",$safetytalks_attendees[0]['st_attendee_s1employer']) : array();

$is_readonly = ('completed'==$safetytalks_status) ? "readonly" : '';?>
<!-- Start - Fancy box image --> 
	<!-- Add fancyBox main JS and CSS files -->
		<script type="text/javascript" src="<?php echo $base."plugin/fancybox/source/jquery.fancybox.js?v=2.1.5";?>"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo $base."plugin/fancybox/source/jquery.fancybox.css?v=2.1.5";?>" media="screen" />
<!-- End - Fancy box image --> 

<div class="homebg">
<div class="container-fluid">
<div class="wrapper">
<?php 
if(!isset($message)) {?>
	<div id="modal_saftytalks_info" class="modal hide fade metro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-header bg-red"><h3 id="myModalLabel">SAFETY TALKS<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3></div>
		<div class="modal-body"><div class="charities-container" style="padding:10px 10px 0px 20px;box-shadow: none;"><?php $this->load->view("safetytalks_details_text");?></div></div>
		<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
	</div>
	<?php 
}?>

<div class="union-container">
	<div class="module">
			<!--------START SAFETYTALKS INFORMATION-------->
				<div class="bglightred fgred"><?php echo isset($message) ? $message : "";?></div>
				<button  href="#acc-1" id="id_inv_cover" data-toggle="collapse" class="btn collapse-btn collapsed">
					<div class="row-fluid"><div class="span8 item-title"><h4 class="collapse-basic">SAFETY TALKS</h4></div></div>
				</button>
				<?php 
				if(isset($message)){ $class_acc = 'collapse'; } else $class_acc = '';?>
				<div id="acc-1" class="module-inner <?php echo $class_acc;?>">
					<div class="row-fluid collapse-inner">
						<div class="span12 pull-left">
							<form class="form-large" id="frm_safetytalk" name="frm_safetytalk" method="post" action="">
								<div class="row-fluid">
								  <div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Title</label></div>
								  <div class="span7">
									<input type="text" name="txt_title" class="selectpicker form-large-select span10" <?php echo $is_readonly;?> value="<?php echo $st_title;?>"  placeholder="TYPE"/>
								  </div>
								</div>
								<div class="row-fluid">
								  <div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Location</label></div>
								  <div class="span7">
									<input type="text" name="txt_location" class="selectpicker form-large-select span10" <?php echo $is_readonly;?> value="<?php echo $st_location;?>"  placeholder="TYPE"/>
								  </div>
								</div>
								<div class="row-fluid">
								  <div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Date & Time</label></div>
								  <div class="span7">
									<input id="txt_datetime_safetytalk" name="txt_datetime_safetytalk" <?php echo $is_readonly;?> value="<?php echo $dt_datetime_safetytalk;?>" type="text" placeholder="yy-mm-dd --:--" class="required selectpicker form-large-select span10 datestamp"/>
								  </div>
								</div>
								
								<div class="row-fluid">
								  <div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>My Employer</label></div>
								  <div class="span7">
									<p class="cls-employer fgred"></p>
									<?php 
									if( sizeof($my_employers) ) {?>
										<select name="cmb_myemployer" id="cmb_myemployer" multiple <?php echo $is_readonly;?>>
											<?php 
											foreach( $my_employers AS $val_myemployers ) {
												$selected = (trim($my_employer)!='' && $val_myemployers['id']==$my_employer) ? 'selected="selected"' : '';?>
												<option value="<?php echo $val_myemployers['id'];?>" <?php echo $selected;?>><?php echo (trim($val_myemployers['firstname'])." ".trim($val_myemployers['lastname']));?></option>
												<?php 
											}?>
										</select>
										<script type="text/javascript">
											var emp_warning = $(".cls-employer");
											var is_readonly = '<?php echo $is_readonly;?>';
											$(function(){
												$("#cmb_myemployer").multiselect({
												 header: "Select only 1 option!",
												 checkAllText: '', 
												 uncheckAllText: '', 
												 click: function(e){
													if( $(this).multiselect("widget").find("input:checked").length > 1 ){
													   emp_warning.addClass("error").removeClass("success").html("You can only select 1 option!");
													   return false;
												    }
													else {
														emp_warning.addClass("success").removeClass("error").html("");
													}
												},
												selectedList: "<?php echo sizeof($my_employers);?>"
												}).multiselectfilter();
												
												if( "readonly" == is_readonly ) {
													$("#cmb_myemployer").multiselect('disable');
												}
											});
											
										</script>
										<?php 
									} 
									else {?>
										<h5>No Employer Found</h5>
										<?php
									}?>
								  </div>
								</div>
								
								<div class="row-fluid">
								  <div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Number of Workers</label></div>
								  <div class="span7">
									<input type="text" name="txt_workforce" class="selectpicker form-large-select span10" <?php echo $is_readonly;?> value="<?php echo $st_workforce;?>"  placeholder="TYPE"/>
								  </div>
								</div>
								<div class="row-fluid">
								  <div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Date of Next Talk</label></div>
								  <div class="span7">
									<input id="txt_datetime_nexttalk" name="txt_datetime_nexttalk" <?php echo $is_readonly;?> value="<?php echo $dt_datetime_next_talk;?>" type="text" placeholder="yy-mm-dd --:--" class="required selectpicker form-large-select span10 datestamp"/>
								  </div>
								</div>
								<div class="row-fluid">
								  <div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Choose Topic(s)</label></div>
								  <div class="span7">
									<p class="cls-safetytopics fgred"></p>
									<?php 
									if( sizeof($safetytalks_topics) ) {?>
										<select name="cmb_safetytalk_topics[]" id="cmb_safetytalk_topics" multiple <?php echo $is_readonly;?>>
											<?php 
											foreach( $safetytalks_topics AS $val_saftytopics ) {
												$selected1 = in_array($val_saftytopics['safetytalks_id'],$safetytalk_topics) ? 'selected="selected"' : '';?>
												<option value="<?php echo $val_saftytopics['safetytalks_id'];?>" <?php echo $selected1;?>><?php echo $val_saftytopics['st_safetytalks_topic'];?></option>
												<?php 
											}?>
										</select>
										<script type="text/javascript">
											var warning = $(".cls-safetytopics");
											$(function(){ $("#cmb_safetytalk_topics").multiselect({
												 header: "Select only 3 options!",
												 checkAllText: '', 
												 uncheckAllText: '', 
												 click: function(e){
													if( $(this).multiselect("widget").find("input:checked").length > 3 ){
													   warning.addClass("error").removeClass("success").html("You can only select 3 options!");
													   return false;
												    }
													else {
														warning.addClass("success").removeClass("error").html("");
													}
												}, 
												selectedList: "<?php echo sizeof($safetytalks_topics);?>"
												}).multiselectfilter();
											});
										</script>
										<?php 
									} else {?>
										<h5>No Topics Found</h5>
									<?php
									}?>
								  </div>
								</div>
								<div id="id_safetytalks_items"></div>
								
								<style>
								.multSelImg span{position: relative;top: 10px;vertical-align: middle;display: inline-flex;}
								.multSelImg img {position: relative;height:20px;width:25px;margin: 2px 6px;top: -10px;}
								
								.icon_connection span{position: relative;vertical-align: middle;display: inline-flex;}
								.icon_connection img {position: relative;height:20px;width:20px;margin: 2px 6px;top: -10px;}
								
								</style>
								<div class="row-fluid">
								  <div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Select Attendees</label></div>
								  <div class="span3">
									<?php 
									if( sizeof($all_workers) ) {?>
										<select name="cmb_safetytalk_allworkers[]" class="cmb_safetytalk_allworkers" id="cmb_safetytalk_allworkers" multiple <?php echo $is_readonly;?>>
											<?php 
											foreach( $all_workers AS $val_allworkers ) {
												if( $val_allworkers['id'] != $this->sess_userid ) {
												$worker_image = (file_exists(FCPATH.$this->path_upload_profiles.$val_allworkers['profile_image'])&&$val_allworkers['profile_image']) 
															? $this->path_upload_profiles.$val_allworkers['profile_image'] : 'img/default.png';
												
												$is_worker_connected = $this->users->getMetaDataList( 'connection', 'employer_id="'.$this->sess_userid.'" 
																					AND worker_id="'.$val_allworkers['id'].'"', '', 'connection_id' );
												$img_worker_connec = (!isset($is_worker_connected[0]['connection_id'])) ? $this->path_img_icons."/wrong.png" : $this->path_img_icons."/right.png";

												$selected = in_array($val_allworkers['id'],$s1_workers) ? 'selected="selected"' : '';?>
												<option image="<?php echo $base.$worker_image;?>" title="<?php echo $val_allworkers['username'];?>" image_connection="<?php echo $base.$img_worker_connec;?>" class="multSelImg icon_connection" value="<?php echo $val_allworkers['id'];?>" <?php echo $selected;?>>
													<?php echo Common::subString(trim($val_allworkers['username']),12);?>
												</option>
												<?php 
												}
											}?>
										</select>
										<script type="text/javascript">
											var emp_warning = $(".cls-worker");
											var is_readonly = '<?php echo $is_readonly;?>';
											$(function(){
												$("#cmb_safetytalk_allworkers").multiselect({
													noneSelectedText: "Select Worker", 
													click: function(e){
													},
													// selectedList: "<?php echo sizeof($all_workers);?>"
												}).multiselectfilter();
												
												if( "readonly" == is_readonly ) {
													$("#cmb_safetytalk_allworkers").multiselect('disable');
												}
											});
										</script>										
										<?php 
									} 
									else {?>
										<h5>No Worker(s) Found</h5>
										<?php
									}?>
								  </div>
								  <div class="span3 padl10">
									<?php 
									if( sizeof($all_employers) ) {?>
										<select name="cmb_safetytalk_allemployers[]" id="cmb_safetytalk_allemployers" multiple <?php echo $is_readonly;?>>
											<?php 
											foreach( $all_employers AS $val_allemployers ) {
												if( $val_allemployers['id'] != $this->sess_userid ) {
												$employer_image = (file_exists(FCPATH.$this->path_upload_profiles.$val_allemployers['profile_image'])&&$val_allemployers['profile_image']) 
															? $this->path_upload_profiles.$val_allemployers['profile_image'] : 'img/default.png';
												
												$is_employer_connected = $this->users->getMetaDataList( 'connection', 'employer_id="'.$val_allemployers['id'].'" 
																					AND worker_id="'.$this->sess_userid.'"', '', 'connection_id' );
												$img_employer_connec = (!isset($is_employer_connected[0]['connection_id'])) ? $this->path_img_icons."/wrong.png" : $this->path_img_icons."/right.png";

												$selected = in_array($val_allemployers['id'], $s1_employers) ? 'selected="selected"' : '';?>
												<option title="<?php echo $val_allemployers['username'];?>" image="<?php echo $base.$employer_image;?>" image_connection="<?php echo $base.$img_employer_connec;?>" class="multSelImg icon_connection" value="<?php echo $val_allemployers['id'];?>" <?php echo $selected;?>>
													<?php echo Common::subString(trim($val_allemployers['username']),12);?>
												</option>
												<?php 
												}
											}?>
										</select>
										<script type="text/javascript">
											var emp_warning = $(".cls-employer");
											var is_readonly = '<?php echo $is_readonly;?>';
											$(function(){
												$("#cmb_safetytalk_allemployers").multiselect({
													// header: "Select Employer",
													noneSelectedText: "Select Employer", 
													click: function(e){
													},
													// selectedList: "<?php echo sizeof($all_employers);?>"
												}).multiselectfilter();
												if( "readonly" == is_readonly ) {
													$("#cmb_safetytalk_allemployers").multiselect('disable');
												}
											});
										</script>
										<?php 
									} 
									else {?>
										<h5>No Employer(s) Found</h5>
										<?php 
									}?>
								  </div>
								</div>

								<div id="id_attendees"></div>

								<div id="id_safetytalks_bucket">									
									<?php 
									$cnt_nons1_atten=0;
									if( sizeof($nons1_attendees) ) {
										foreach( $nons1_attendees AS $key_nons1_atten => $val_nons1_atten ) {										
											$firstname 	= $val_nons1_atten->firstname;
											$lastname 	= $val_nons1_atten->lastname;
											$employer 	= $val_nons1_atten->employer;?>
											<div class="row-fluid padt10" id="id_div_safety_attendee<?php echo ($cnt_nons1_atten+1);?>">
												<?php if( "0"==$cnt_nons1_atten ) { echo "<h5>&nbsp;NON S1 MEMBERS</h5>"; }?>
												<input type="text" name="txt_atten_firstname[]" value="<?php echo $firstname;?>" id="txt_atten_firstname<?php echo ($cnt_nons1_atten+1);?>" class="span4" <?php echo $is_readonly;?> value="" placeholder="TYPE FIRST NAME"/>
												<input type="text" name="txt_atten_lastname[]" value="<?php echo $lastname;?>" id="txt_atten_lastname<?php echo ($cnt_nons1_atten+1);?>" class="span4" <?php echo $is_readonly;?> value="" placeholder="TYPE LAST NAME"/>
												<input type="text" name="txt_atten_employer[]" value="<?php echo $employer;?>" id="txt_atten_employee<?php echo ($cnt_nons1_atten+1);?>" class="span3" <?php echo $is_readonly;?> value="" placeholder="TYPE EMPLOYER"/>
												
												<a href="javascript:void(0);" class="fgred" title="Delete Attendee" onclick="javascript:deleteSection('id_div_safety_attendee<?php echo ($cnt_nons1_atten+1);?>')";>Delete</a>
											</div>
											<?php 
											$cnt_nons1_atten++;
										}
									}?>
								</div>
								<?php 
								if( '' == $is_readonly ) {?>
									<div class="row-fluid"><a id="btn_add_safetyattendee" onclick="addMoreSafetytalksAttendee();" class="btn pull-right btn-warning">Add New Attendee</a></div>
									<?php
								}?>
								<div class="row-fluid">
								  <div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Notes</label></div>
								  <div class="span7">
									<textarea name="txt_notes" cols="20" rows="5" class="selectpicker form-large-select span10" <?php echo $is_readonly;?> placeholder="TYPE NOTES"/><?php echo $st_notes;?></textarea>
								  </div>
								</div>
								
								<?php 
								if( '' == $is_readonly ) {?>
									<div class="row-fluid"><br>&nbsp;</div>
									<div class="row-fluid" align="right">
										<button type="submit" name="btn_save" id="btn_save" class="btn btn-warning" value="save">SAVE</button>
										&nbsp;<button type="button" name="btn_dosubmit" id="btn_dosubmit" class="btn btn-warning" value="submit">SUBMIT</button>
										<input type="hidden" name="btn_submit" id="btn_submit" value="">
									</div>
									<script>
										$("#btn_dosubmit").click(function() {
											if( confirm("You are no longer be able to edit this Safety Talks.") ) {
												$("#btn_submit").val('submit');
												$("#frm_safetytalk").submit();
											}
										});
										
									</script>
									<?php 
								}?>
								<input type="hidden" name="hidn_safetytalks_attendee" id="hidn_safetytalks_attendee" value="<?php echo $cnt_nons1_atten;?>">
							</form>
						</div>
					</div>
				</div>
			<!--------END WORKPLACE INFORMATION-------->

			
	</div>	
</div>
</div><!--end class wrapper-->
</div><!--end div container-fluid-->
</div><!--end div homebg-->
<!-- Place in the <head>, after the three links -->

<script type="text/javascript" src="<?php echo $base;?>js/common.js"></script>

<!-- Start - For Datetime Picker -->
	<link rel="stylesheet" href="<?php echo $base;?>css/jquery-ui.css" />
	<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script>
	<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui-timepicker.js"></script>
<!-- End - For Datetime Picker -->

<script type="text/javascript" src="<?php echo $base;?>js/jquery.form.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/regulation.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo $base."css/jquery-multiselect/jquery.multiselect.css";?>" />
<link rel="stylesheet" type="text/css" href="<?php echo $base."css/jquery-multiselect/jquery.multiselect.filter.css";?>" />
<!--<link rel="stylesheet" type="text/css" href="<?php echo $base."css/jquery.ui.css";?>" />-->
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-lightness/jquery-ui.css" />
<script type="text/javascript" src="<?php echo $base."js/jquery-ui.js";?>"></script>
<script type="text/javascript" src="<?php echo $base."js/jquery/jquery-multiselect/jquery.multiselect.js";?>"></script>
<script type="text/javascript" src="<?php echo $base."js/jquery/jquery-multiselect/jquery.multiselect.filter.js";?>"></script>
	
<script type="text/javascript" charset="utf-8">
	var cnt_nons1_atten = "<?php echo $cnt_nons1_atten;?>";
	if( cnt_nons1_atten <= 0) {
		jQuery(window).load(function() {
			addMoreSafetytalksAttendee();
		});
	}

	function addMoreSafetytalksAttendee()
	{
		var val_nons1_atten	= $('#hidn_safetytalks_attendee').val();
		cnt_safety_attendee 	= parseInt(val_nons1_atten)+1; // the numeric ID of the new input field being added

		safetyAttendeeAppend = '<div class="row-fluid padt10" id="id_div_safety_attendee'+cnt_safety_attendee+'">';
		if( "1"==cnt_safety_attendee ) { safetyAttendeeAppend += "<h5>&nbsp;NON S1 MEMBERS</h5>"; }
		safetyAttendeeAppend += '<input type="text" name="txt_atten_firstname[]" id="txt_atten_firstname'+cnt_safety_attendee+'" class="span4" placeholder="TYPE FIRST NAME"/>';
		safetyAttendeeAppend += '&nbsp;<input type="text" name="txt_atten_lastname[]" id="txt_atten_lastname'+cnt_safety_attendee+'" class="span4" placeholder="TYPE LAST NAME"/>';
		safetyAttendeeAppend += '&nbsp;<input type="text" name="txt_atten_employer[]" id="txt_atten_employee'+cnt_safety_attendee+'" class="span3" placeholder="TYPE EMPLOYER"/>';
		safetyAttendeeAppend += '&nbsp;<a href="javascript:void(0);" class="fgred" title="Delete Attendee" onclick=javascript:deleteSection("id_div_safety_attendee'+cnt_safety_attendee+'");>Delete</a>';
		safetyAttendeeAppend += '</div>';

		$('#hidn_safetytalks_attendee').val(cnt_safety_attendee);
		$('#id_safetytalks_bucket').append(safetyAttendeeAppend);
	}

	function callAjaxSafetytalksItems(safetytalks_id)
	{
		$.ajax({
			url: js_base_path+'admin/getSafetytalksTopicsWithItems',
			type: 'post', 
			data: 'safetytalks_id='+safetytalks_id,
			success: function(output) {
				//alert( output );
				$("#id_safetytalks_items").html(output);
			}, 
			error: function(errMsg) {
				alert( errMsg.responseText );
				return false;
			}
		});
	}

	$(window).load(function() {	
		$('#modal_saftytalks_info').modal('show');
 
		var arr_load_sfttopics = [];
		$("#cmb_safetytalk_topics :selected").each(function(i, data){
			arr_load_sfttopics.push( $(data).val() );
		});
		(arr_load_sfttopics.length > 0) ? callAjaxSafetytalksItems(arr_load_sfttopics) : $("#id_safetytalks_items").html("");
		$('.datestamp').datetimepicker({dateFormat: "yy-mm-dd"});
	});
	
	<?php 
	if( '' ==$is_readonly ) {?>
		$("#cmb_safetytalk_topics").change(function(){
			var arr_sfttopics = [];
			$("#cmb_safetytalk_topics :selected").each(function(i, data){
				arr_sfttopics.push( $(data).val() );
			});
			(arr_sfttopics.length > 0) ? callAjaxSafetytalksItems(arr_sfttopics) : $("#id_safetytalks_items").html("");
		});
		<?php
	}?>
</script>

<?php $this->load->view('footer_admin'); ?>