<?php $this->load->view('header_admin');
if( isset($arr_connections[1]) && "crew" == $arr_connections[1] ) {
	$connected_username = $this->users->getMetaDataList('crew_of_employers', 'in_crew_status=1 AND in_crew_id="'.$arr_connections[0].'"', '', 'st_crew_label AS username' );
	$connected_username = (isset($connected_username[0]['username'])&&$connected_username[0]['username']) ? "<b>Crew: </b>".$connected_username[0]['username'] : '';
}
else if( isset($arr_connections[1]) && "worker" == $arr_connections[1] ) {
	$connected_username = $this->users->getMetaDataList('user', 'status=1 AND id="'.$arr_connections[0].'"', '', 'CONCAT(firstname, " ", lastname) AS username' );
	$connected_username = (isset($connected_username[0]['username'])&&$connected_username[0]['username']) ? "<b>User: </b>".$connected_username[0]['username'] : '';
}
?>
<div class="homebg metro ">
	<!--BEGIN PAGE TITLE-->
    <div class="container"><div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter"><em class="margin20">ASSIGN DIGITAL RECORDS OF TRAINING</em></div></div>
    <!--END PAGE TITLE-->
    <div class="container">
        <div class="main-content padding-metro-home clearfix"> 
        <!-------BEGIN THIRD COLUMN BADGE TILES------>
        <div class="tile-group six no-margin no-padding" >
			<form class="form-inline no-margin" method="post" >
				<?php echo "<div class='fg-white'>".$connected_username."</div><br>";?>
				<fieldset>
					<select id="cmb_industry_id" name="cmb_industry_id" class="f13 span2">
						<option value="">-Industry-</option>
						<?php 
						$industries = $this->users->getMetaDataList('industry', 'date_start<=CURDATE() AND (date_end="" OR date_end>CURDATE())');
						foreach($industries as $in) {
							$selected = (isset($_POST['cmb_industry_id'])&&$_POST['cmb_industry_id']==$in['id'])?'selected="selected"':'';?>
							<option value="<?php echo $in['id'];?>" <?php echo $selected;?>><?php echo $in['industryname'];?></option>
							<?php 
						}?>
					</select>
					<select id="cmb_sector_id" name="cmb_sector_id" class="f13 span2">
						<option value="">-Sector-</option>
						<?php 
						if(isset($_POST['cmb_industry_id']) && (int)$_POST['cmb_industry_id']>0) {
							$sections = $this->users->getRelatedElement('tbl_section', 'industry_id', $_POST['cmb_industry_id']);
							foreach($sections as $sc) {
								$selected = (isset($_POST['cmb_sector_id'])&&$_POST['cmb_sector_id']==$sc['id'])?'selected="selected"':'';?>
								<option value="<?php echo $sc['id'];?>" <?php echo $selected;?>><?php echo $sc['sectionname'];?></option>
								<?php 
							}
						}?>
					</select>
					<select id="cmb_trade_id" name="cmb_trade_id" class="f13 span2">
						<option value="">-Trade-</option>
						<?php 
						if(isset($_POST['cmb_industry_id']) && (int)$_POST['cmb_industry_id']>0 && isset($_POST['cmb_sector_id']) && (int)$_POST['cmb_sector_id']>0){
							$trades = $this->users->getRelatedElementTwo('tbl_section2trade_view', 'industry_id', $_POST['cmb_industry_id'], 'section_id', $_POST['cmb_sector_id']);
							foreach($trades as $sc) {
								$selected = (isset($_POST['cmb_trade_id'])&&$_POST['cmb_trade_id']==$sc['trade_id'])?'selected="selected"':'';?>
								<option value="<?php echo $sc['trade_id'];?>" <?php echo $selected;?>><?php echo $sc['tradename'];?></option>
								<?php 
							}
						}?>
					</select>
					<div class="input-control text size2 f13" style="height:30px;">
						<input type="text" name="txt_badge_title" id="txt_badge_title" value="<?php echo $this->input->post('txt_badge_title');?>" placeholder="Badge Title">
						<button type="submit" class="btn-search fg-gray"></button>
					</div>
				</fieldset>
			</form>
			<?php 
			if( isset($my_badges) && is_array($my_badges) && sizeof($my_badges) ) {
				foreach($my_badges as $mybadge) {
					$badge_id 		= $mybadge['id'];
					$badge_title	= $mybadge['st_badge_title'];
					$badge_image	= $mybadge['st_badge_image'];
					?>

					<div class="tile bg-black badge mybadge description" badge_id='<?php echo $badge_id;?>' id="<?php echo $badge_id;?>" badge_title="<?php echo str_replace(" ","",strtolower($badge_title));?>" title="<?php echo $badge_title;?>">
						<?php $badge_image = (!empty($badge_image)) ? $base."img/badges/".$badge_image : $base."img/no_image.jpg";?>
						<a href='#' data-toggle='modal'><img src='<?php echo $badge_image;?>' width="120" height="110"></a>
					</div>
					<?php 
				}
			}
			else {
				echo "<h5 class='fg-black'>No inventory available</h5>";
			}?>
        </div>
        <!-------END THIRD COLUMN BADGE TILES------>
	   
        <!--START SECON column ASSIGN/CONNECTION tiles-->  
		<div class="tile-group two no-margin no-padding" >
       		<!--begin Select Users tile -->
				<div class=" input-control text bg-transparent fg-white" style="height:30px;width:250px;text-align:center;vertical-align: bottom;"></div>
            <!--end select users tile-->
            <!--begin assign tile -->
				<div class="tile double bg-gray assign-badges" ><img src="<?php echo $base;?>img/assign/assign.png"></div>
			<!--end Assign tile--> 
			<div class="tile triple-vertical double profile-content-box tab-content"><img src="<?php echo $base;?>img/my_worker/my_worker_ads.png"></div>
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
		$('#cmb_industry_id').change(function(){
			$industry_id = $(this).val();
			$.post('<?php echo $base;?>admin/getRelatedElement', {'table': 'tbl_section', 'field': 'industry_id', 'value': $industry_id, 'field_fetch': 'sectionname'}, function(data){
				$("#cmb_sector_id").html(data);
			});
		});
		$('#cmb_sector_id').change(function(){
			$industry_id = $('#cmb_industry_id').val();
			$section_id = $('#cmb_sector_id').val();
			$.post('<?php echo $base;?>admin/getRelatedElementTwo', {'table': 'tbl_section2trade_view', 'field1': 'industry_id', 'value1': $industry_id, 'field2': 'section_id', 'value2': $section_id, 'field_fetch': 'tradename'}, function(data){
				$("#cmb_trade_id").html(data);
			});
		}); 
	
		$(".description").click(function(){
			if($(this).hasClass('selected')) {
				$(this).removeClass('selected');
			}
			else {
				$(this).addClass('selected');
			}
		});

		$(".assign-badges").click(function() {
			var len_libcontent 		= $(".description.selected").length;
			if( len_libcontent == 0 ) {
				alert( "Please select atleast 1 D.R.O.T." );
				return false;
			}
			else if( len_libcontent > 1 ) {
				alert( "You can Assign only 1 D.R.O.T at a time." );
				return false;
			}
			
			var arr_badges 	= new Array();
			cnt_badge	 	= 0;
			$(".description.selected").each(function() {
				arr_badges[cnt_badge] = $(this).attr('id');
				cnt_badge++;
			});
			jq201.post('<?php echo $base;?>admin/assign_badge', {'arr_badges':arr_badges}, function(data){
				if(data.trim() != '') {
					alert(data);
				}
				else {
					window.location.href='<?php echo $base;?>admin/myworkers_metro';
				}
			});
		});
	});
	</script>