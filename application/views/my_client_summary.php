<?php
$address 	= isset($usermeta['street_number'])?$usermeta['street_number']:"";
$address 	.= isset($usermeta['street_name'])?", ".$usermeta['street_name']:"";
$address 	.= isset($usermeta['apt_number'])?", ".$usermeta['apt_number']:"";
$country 	= $this->users->getMetaDataList('country', 'id="'.$usermeta['country_id'].'" AND date_start<=CURDATE() AND (date_end="" OR date_end>CURDATE())', '', 'countryname');
$country 	= isset($country[0]['countryname']) ? $country[0]['countryname'] : '';
$province 	= $this->users->getMetaDataList('province', 'country_id = "'.$usermeta['country_id'].'" AND id="'.$usermeta['province_id'].'" AND date_start<=CURDATE() AND (date_end="" OR date_end>CURDATE())', '', 'provincename');
$province 	= isset($province[0]['provincename']) ? $province[0]['provincename'] : '';
$city 		= $this->users->getMetaDataList('city', 'country_id="'.$usermeta['country_id'].'" AND province_id="'.$usermeta['province_id'].'"  AND id="'.$usermeta['city_id'].'" AND date_start<=CURDATE() AND (date_end="" OR date_end>CURDATE())', '', 'cityname');
$city 		= isset($city[0]['cityname']) ? $city[0]['cityname'] : '';
$zip 		= isset($usermeta['zip'])?$usermeta['zip']:"";

$my_profile_info= $this->users->getMyDataOfUser($clientID, 'user_wallet');
$industry 		= isset($my_profile_info['user_wallet']['industry']) ? $my_profile_info['user_wallet']['industry'] : '';

// Points //
	$points = $this->points->getS1Points($clientID, $userdata['type_id']);
// Credits //
	$credits = $this->points->getS1Credits("",$clientID);

$points_level 	= $this->users->getMetaDataList('users_points_level', 'in_user_id="'.$clientID.'"', '', 'in_points_level');
$points_level 	= isset($points_level[0]['in_points_level']) ? $points_level[0]['in_points_level'] : '0';

$my_workers 	= $this->users->getMyDataOfUser($clientID, 'my_client_workers');
$my_workers 	= $my_workers['user_libraries']['my_client_workers']['total'];

$my_supervisors	= 0;
$my_instructor = 'N/A';

foreach( $instructors AS $val_instructors ) {
	if( $val_instructors['in_employer_client_id'] == $clientID ){
		$my_instructor = $val_instructors['firstname']."&nbsp;".$val_instructors['lastname'];
	}
}
?>
<!--************BEGIN TAB MENU***************-->
<ul class="nav nav-tabs " style="margin-right: 10px;">
	<li class="profile active"><a href="#client_info" data-toggle="tab" class="fg-white fg-hover-black">Client Info</a></li>
    <li class="profile" style="position:relative;"><a href="#client_tools" data-toggle="tab" class="fg-white fg-hover-black" >Tools Summary &nbsp; 
    <?php 
	$rows_open_client_library = $this->users->getMetaDataList('librarytool_performed_by_consultant', 'in_consultant_id="'.$this->sess_userid.'" AND st_library_perform_status="inprogress"', '', 'COUNT(id) AS open_client_library');
	$open_client_library = $rows_open_client_library[0]['open_client_library'];
	if($open_client_library>0) {?>
		<div class="badge bg-white fg-red pull-right badge-counting"><?php echo "<b>".$open_client_library."</b>";?></div>
		<?php 
	}?>
    
    </a> 
    </li>
    
    <li class="profile " ><a href="#client_projects" data-toggle="tab" class="fg-white fg-hover-black">Active Projects</a></li>
	
    <li class="profile " ><a href="#client_description" data-toggle="tab" class="fg-white fg-hover-black">Description</a></li>
	
	
	
</ul>
<!--************END TAB MENU***************-->

<!--************BEGIN  PANELS***************-->
<div class="tab-content " style="overflow:hidden">
<!--************begin Client Info***********-->
<div class="tab-pane fade in active" id="client_info">
<div class="grid fluid">
<span class="span2">NAME : </span><span class="span4"> <strong><?php echo isset($userdata['nickname']) ? $userdata['nickname'] : "";?></strong></span>
</div>
<div class="grid fluid">
<span class="span2">EMAIL : </span><span class="span4"> <strong><?php echo isset($userdata['email_addr']) ? $userdata['email_addr'] : "";?></strong></span>
</div>    
<div class="grid fluid">
<span class="span2">ADDRESS : </span><span class="span4"> <strong><?php echo $address;?></strong></span>
</div>
<div class="grid fluid">
<span class="span2">COUNTRY : </span><span class="span4"> <strong><?php echo $country;?></strong></span>
</div>
<div class="grid fluid">
<span class="span2">PROVINCE : </span><span class="span4"> <strong><?php echo $province;?></strong></span>
</div>
<div class="grid fluid">
<span class="span2">CITY : </span><span class="span4"> <strong><?php echo $city;?></strong></span>
</div>
<div class="grid fluid">
<span class="span2">POSTAL CODE : </span><span class="span4"> <strong><?php echo $zip;?></strong></span>
</div>
<div class="grid fluid">
<span class="span2">INDUSTRY : </span><span class="span4"> <strong><?php echo $industry;?></strong></span>
</div>
<div class="grid fluid">
<span class="span2">WORKERS : </span><span class="span4"> <strong><?php echo $my_workers;?></strong></span>
</div>
<div class="grid fluid"><span class="span2">SUPERVISORS : </span><span class="span4"> <strong><?php echo $my_supervisors;?></strong></span></div>
<div class="grid fluid"><span class="span2"># OF POINTS : </span><span class="span4"> <strong><?php echo $points;?></strong></span></div>
<div class="grid fluid"><span class="span2"># OF CREDITS : </span><span class="span4"> <strong><?php echo $credits;?></strong></span></div>
<div class="grid fluid"><span class="span2">LEVEL : </span><span class="span4"> <strong><?php echo $points_level;?></strong></span></div>
<div class="grid fluid"><span class="span2">CONSULTANT : </span><span class="span3"> <strong><?php echo $my_instructor;?></strong></span>
<div style="float:right; width:100%; margin-top:10px;"><a href='#myConsultantModal' data-toggle='modal' class="fg-white" title="Add Instrctor to this Client"><span class="span1"><button class="image-button primary" >Add<i style="padding: 3px;" class="icon-plus bg-cobalt"></i></button></span></a></div>
</div>
</div>

                  <!--start modal Consultant-->
					<div id="myConsultantModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    					<div class="modal-header bg-red">
							<h3 id="myModalLabel">My Consultant<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
					    </div>
						<div class="modal-body">
							<div class="row-fluid">
								<form class="form-inline no-margin" method="post" action="<?php echo $this->base;?>admin/addInstructorToClient?id=<?php echo $clientID ?>">
									<fieldset>
										<input type="hidden" id="searchflag" name="searchflag" value="">
										<div class="input-control text size3" style="height:30px">
											<input type="text" value="<?php echo $this->input->post('txt_username');?>" name="txt_workername" id="txt_workername" placeholder="User Name"/>
											<button type="button" class="btn-search fg-gray" id="searchInstructor"></button>
										</div>
									</fieldset>
								<p><b>Current Consultant: </b><?php echo $user['firstname'].$user['lastname'];?></p>
								<p>Select Worker to assign as Instructor</p>
								<span id="containerInstructor">
									<select id="consultant_instructor" name="consultant_instructor[]" > 
									<?php 
									$sizeof_instructor 	= sizeof($instructors);
									$selected 			= "";
									if( isset($instructors) && $sizeof_instructor ) {
										foreach($instructors as $worker) {
											$selected = $worker['in_employer_client_id'] == $clientID ? "selected" : "";?>
											<option value="<?php echo $worker['in_worker_id']?>" <?php echo $selected;?>><?php echo $worker['firstname'].$worker['lastname']?></option>
											<?php 
										}
									}
									else {
										echo "<option value=''></option>";
									}?>
									</select>
							   </span>
								<div class="model-add-button" style="padding-top: 5px"><button class="image-button primary cls_add_instructor" >Add<i style="padding: 3px;" class="icon-plus bg-cobalt"></i></button></div>
								<script type="text/javascript">
									$(".cls_add_instructor").click(function() {
										var val_consultant_instructor = $("#consultant_instructor").val();
										if( val_consultant_instructor == '' || val_consultant_instructor == 'null' ) {
											alert('No instructor selected');
											$("#txt_workername").focus();
											return false;
										}
									});
								</script>
							  </form>  
							</div>
						</div>
						<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
                    </div>
                    <script type="text/javascript">
						/*$('#myConsultantModal').width('300px');*/
                        $('#searchflag').val('');
                    </script>
					<!--end modal Consultant-->
                  
                  <!--************end client info panel***********-->
                  <!--************begin Tools panel***********-->                  
                  <div class="tab-pane fade myclient-tools-data" id="client_tools">
                    <form class="form-inline no-margin" method="post" name="frm_tools_summary" id="frm_tools_summary">
						<fieldset>
						<div class="input-control text" style="height:30px">
							<span>From:</span><input type="text" name="txt_summary_startdate" id="txt_summary_startdate" placeholder="--/--/--" class="datestamp"/>
						</div>
						<!--span class="span1"></span-->
						<div class="input-control text " style="height:30px">
							<span>To:</span><input type="text" name="txt_summary_enddate" id="txt_summary_enddate" placeholder="--/--/--" class="datestamp"/>
						</div>
						<button type="submit" class="bg-red fg-white"><strong>Go!</strong></button>
						</fieldset>
						<input type="hidden" name="client_id" id="client_id" value="<?php echo $clientID;?>">
					</form>
					<script type="text/javascript">
						$(function() { $( ".datestamp" ).datepicker(); });
						$('#frm_tools_summary').validate({
							submitHandler: function(form) {
								$.ajax({
									url: js_base_path+'ajax/getToolsSummary',
									type: 'post', 
									data: $('#frm_tools_summary').serialize(),
									success: function(output) {
										$("#id_tools_summary").html(output);
									},
									error: function(errMsg) {
										alert( errMsg.responseText );
										return false;
									}
								});
							}
						});
					</script>
					<div id="id_tools_summary">
					
					<div class="grid fluid">
					<span class="span4">PROCEDURES : </span>
					<span class="span1 "><strong><a href='#procedureModal' data-toggle='modal' class="fg-white"><?php echo $total_procedure;?></a></strong></span>
		 <!--start modal PROCEDURE page-->
			<div id="procedureModal" class="modal hide fade fg-white" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-header bg-red">
					<h3 id="myModalLabel">PROCEDURE<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
				</div>
			  <div class="modal-body bg-black">
				<div class="row-fluid">
					<?php 
					if( $total_procedure ) {?>
						<table class="table table-bordered">
							<thead class="bg-black"><tr><th>Title</th><th>Date Opened</th><th>Total hrs spend</th></tr></thead>
							<?php 
							foreach( $consultant_libraries as $val_consultant_libraries ) {
								$library_section 	= isset($val_consultant_libraries->st_library_section) ? $val_consultant_libraries->st_library_section : '';
								if( "new_procedure" == $library_section ) {
									$library_title 	= isset($val_consultant_libraries->library_title) ? $val_consultant_libraries->library_title : 'New';
									$hours_spend 	= isset($val_consultant_libraries->in_hours_spend) ? $val_consultant_libraries->in_hours_spend : '';
									$date_performed = isset($val_consultant_libraries->dt_date_performed) ? $val_consultant_libraries->dt_date_performed : '';
									$id 			= isset($val_consultant_libraries->id) ? $val_consultant_libraries->id : '';?>
									<tr>
										<td class="bg-black"><?php echo $library_title;?></td>
										<td class="bg-black"><?php echo $date_performed;?></td>
										<td class="bg-black">
										<span class="proc_hrs_spend<?php echo $id;?>"><?php echo $hours_spend;?></span>&nbsp;
										<a href="#" class="fg-white" onclick="javascript:change_tools_hrsspend('proc','edit','<?php echo $id;?>');">Edit</a>&nbsp;|&nbsp;<a href="#" class="fg-white" onclick="javascript:change_tools_hrsspend('proc','save', '<?php echo $id;?>');">Save</a>
										</td>
									</tr>
									<?php 
								}
							}?>
						</table>
						<?php 
					}
					else {
						echo "<p class='fg-white'>No Procedures found.</p>";
					}?>
				</div>
			</div>
			<div class="modal-footer bg-red"><button class="btn" data-dismiss="modal">Close</button></div>
			</div>
		
		  <!--end modal PROCEDURE page--> 
			
			<span class="span1 "> <strong><a href='<?php echo ($total_procedure) ? "#procedureStatModal" : '';?>' data-toggle='modal' class="fg-white">STAT</a></strong></span>
			<!--start modal Procedure STAT page-->
			<div id="procedureStatModal" class="modal hide fade bg-black" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-header bg-red">
					<h3 id="myModalLabel">PROCEDURE<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
				</div>
				<div class="modal-body">
				<div id="id_chart_procedure" class="bg-black"></div>
				</div>
				<div class="modal-footer bg-black"><button class="btn" data-dismiss="modal">Close</button></div>
				<script type="text/javascript" src="https://www.google.com/jsapi"></script>	
				 <script type="text/javascript">
					google.load("visualization", "1", {packages:["corechart"]});
					google.setOnLoadCallback(drawChart);
					function drawChart() {
					var data = google.visualization.arrayToDataTable([
					  ['Task', 'PROCEDURE'],
					  ['Open', <?php echo $open_procedure;?>],
					  ['Closed', <?php echo $closed_procedure;?>]
					]);
					var options = {
					  backgroundColor: '#000000',
					  pieHole: 0.4,
					  width:500, height:300,
					  legend: {textStyle: {color: '#ffffff'}},
					  colors: ['#222222', '#e51400'], 
					  pieSliceText: 'value',
					  pieSliceTextStyle: {fontSize: 14, color: '#ffffff'},
					};
					var chart = new google.visualization.PieChart(document.getElementById('id_chart_procedure'));
					chart.draw(data, options);
					}
				</script>
			</div>
			<!--end modal Procedure STAT page--> 
			

					
					</div>

					<div class="grid fluid">
					<span class="span4">SAFETY TALKS : </span>
					<span class="span1 "><strong><a href='#saftalksModal' data-toggle='modal' class="fg-white"><?php echo $total_safetytalks;?></a></strong></span>
					<!--start modal SAFETY TALKS page-->
			<div id="saftalksModal" class="modal hide fade fg-white" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-header bg-red">
					<h3 id="myModalLabel">SAFETY TALKS<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
				</div>
			  <div class="modal-body bg-black">
				<div class="row-fluid">
					<?php 
					if( $total_safetytalks ) {?>
						<table class="table table-striped table-bordered table-condensed table-hover">
							<thead class="bg-black"><tr><th>Title</th><th>Date Opened</th><th>Total hrs spend</th></tr></thead>
							<?php 
							foreach( $consultant_libraries as $val_consultant_libraries ) {
								$library_section 	= isset($val_consultant_libraries->st_library_section) ? $val_consultant_libraries->st_library_section : '';
								if( "normal_safetytalks" == $library_section ) {
									$library_id 	= isset($val_consultant_libraries->in_library_id) ? $val_consultant_libraries->in_library_id : '';
									$safetytalks_title = $this->users->getMetaDataList('safetytalks_information', 'in_safetytalks_id="'.$library_id.'"', '', 'st_title');
									$safetytalks_title = (isset($safetytalks_title[0]['st_title'])&&$safetytalks_title[0]['st_title']) ? $safetytalks_title[0]['st_title'] : "New Safetytalks";
									
									$hours_spend 	= isset($val_consultant_libraries->in_hours_spend) ? $val_consultant_libraries->in_hours_spend : '';
									$date_performed = isset($val_consultant_libraries->dt_date_performed) ? $val_consultant_libraries->dt_date_performed : '';
									$id 			= isset($val_consultant_libraries->id) ? $val_consultant_libraries->id : '';?>
									<tr>
										<td class="bg-black"><?php echo $safetytalks_title;?></td>
										<td class="bg-black"><?php echo $date_performed;?></td>
										<td class="bg-black">
										<span class="safety_hrs_spend<?php echo $id;?>"><?php echo $hours_spend;?></span>&nbsp;
										<a href="#" class="fg-white" onclick="javascript:change_tools_hrsspend('safety', 'edit', '<?php echo $id;?>');">Edit</a>&nbsp;|&nbsp;<a href="#" class="fg-white" onclick="javascript:change_tools_hrsspend('safety','save','<?php echo $id;?>');">Save</a>
										</td>
									</tr>
									<?php
								}
							}?>
						</table>
						<?php 
					}
					else {
						echo "<p class='fg-white'>No Safetytalks found.</p>";
					}?>
				</div>
			</div>
			<div class="modal-footer bg-red"><button class="btn" data-dismiss="modal">Close</button></div>
			</div>
			<!--end modal SAFETY TALKS page--> 
					<span class="span1 "> <strong><a href='<?php echo ($total_safetytalks) ? "#saftalksStatModal" : '';?>' data-toggle='modal' class="fg-white">STAT</a></strong></span>
					<!--start modal SAFETY TALKS STAT page-->
			<div id="saftalksStatModal" class="modal hide fade bg-black" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-header bg-red">
					<h3 id="myModalLabel">SAFETY TALKS<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
				</div>
				<div class="modal-body">
					<div id="id_chart_safetytalks" class="bg-black"></div>
				</div>
				<div class="modal-footer bg-black"><button class="btn" data-dismiss="modal">Close</button></div>
				<script type="text/javascript" src="https://www.google.com/jsapi"></script>
				<script type="text/javascript">
					google.load("visualization", "1", {packages:["corechart"]});
					google.setOnLoadCallback(drawChart);
					function drawChart() {
					var data = google.visualization.arrayToDataTable([
					  ['Task', 'SAFETY TALKS'],
					  ['Open', <?php echo $open_safetytalks;?>],
					  ['Closed', <?php echo $closed_safetytalks;?>]
					]);
					var options = {
					  backgroundColor: '#000000',
					  pieHole: 0.4,
					  width:500, height:300,
					  legend: {textStyle: {color: '#ffffff'}},
					  colors: ['#222222', '#e51400'], 
					  pieSliceText: 'value',
					  pieSliceTextStyle: {fontSize: 14, color: '#ffffff'},
					};
					var chart = new google.visualization.PieChart(document.getElementById('id_chart_safetytalks'));
					chart.draw(data, options);
					}
				</script>
			</div>
			<!--end modal SAFETY TALKS STAT page--> 
					</div>
								
					<div class="grid fluid">
					<span class="span4">INVESTIGATIONS : </span>
					<span class="span1 "> <strong><a href='#investigationModal' data-toggle='modal' class="fg-white"><?php echo $total_investigations;?></a></strong></span>
					<!--start modal Investigation page-->
			<div id="investigationModal" class="modal hide fade fg-white" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-header bg-red">
					<h3 id="myModalLabel">INVESTIGATIONS<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
				</div>
			  <div class="modal-body bg-black">
				<div class="row-fluid">
					<?php 
					if( $total_investigations ) {?>
						<table class="table table-striped table-bordered table-condensed table-hover">
							<thead class="bg-black"><tr><th>Title</th><th>Date Opened</th><th>Total hrs spend</th></tr></thead>
							<?php 
							foreach( $consultant_libraries as $val_consultant_libraries ) {
								$library_section 	= isset($val_consultant_libraries->st_library_section) ? $val_consultant_libraries->st_library_section : '';
								if( "Investigations" == $library_section ) {
									$library_title 	= isset($val_consultant_libraries->library_title) ? $val_consultant_libraries->library_title : 'New';
									$hours_spend 		= isset($val_consultant_libraries->in_hours_spend) ? $val_consultant_libraries->in_hours_spend : '';
									$date_performed 	= isset($val_consultant_libraries->dt_date_performed) ? $val_consultant_libraries->dt_date_performed : '';
									$id 			= isset($val_consultant_libraries->id) ? $val_consultant_libraries->id : '';?>
									<tr>
										<td class="bg-black"><?php echo $library_title;?></td>
										<td class="bg-black"><?php echo $date_performed;?></td>
										<td class="bg-black">
										<span class="inv_hrs_spend<?php echo $id;?>"><?php echo $hours_spend;?></span>&nbsp;
										<a href="#" class="fg-white" onclick="javascript:change_tools_hrsspend('inv', 'edit', '<?php echo $id;?>');">Edit</a>&nbsp;|&nbsp;<a href="#" class="fg-white" onclick="javascript:change_tools_hrsspend('inv','save','<?php echo $id;?>');">Save</a>
										</td>
									</tr>
									<?php
								}
							}?>
						</table>
						<?php 
					}
					else {
						echo "<p class='fg-white'>No Investigations found.</p>";
					}?>
				</div>
			</div>
			<div class="modal-footer bg-red"><button class="btn" data-dismiss="modal">Close</button></div>
			</div>
			<!--end modal Investigation page--> 
					<span class="span1 "><strong><a href='<?php echo ($total_investigations) ? "#investigationStatModal" : '';?>' data-toggle='modal' class="fg-white">STAT</a></strong></span>
					<!--start modal Investigation STAT page-->
			<div id="investigationStatModal" class="modal hide fade bg-black" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-header bg-red">
					<h3 id="myModalLabel">INVESTIGATIONS<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
				</div>
				<div class="modal-body">
					<div id="id_chart_investigation" class="bg-black"></div>
				</div>
				<div class="modal-footer bg-black"><button class="btn" data-dismiss="modal">Close</button></div>
				<script type="text/javascript" src="https://www.google.com/jsapi"></script>
				 <script type="text/javascript">
					google.load("visualization", "1", {packages:["corechart"]});
					google.setOnLoadCallback(drawChart);
					function drawChart() {
					var data = google.visualization.arrayToDataTable([
					  ['Task', 'INVESTIGATIONS'],
					  ['Open', <?php echo $open_investigation;?>],
					  ['Closed', <?php echo $closed_investigation;?>]
					]);
					var options = {
					  backgroundColor: '#000000',
					  pieHole: 0.4,
					  width:500, height:300,
					  legend: {textStyle: {color: '#ffffff'}},
					  colors: ['#222222', '#e51400'], 
					  pieSliceText: 'value',
					  pieSliceTextStyle: {fontSize: 14, color: '#ffffff'},
					};
					var chart = new google.visualization.PieChart(document.getElementById('id_chart_investigation'));
					chart.draw(data, options);
					}
				</script>
			</div>
			<!--end modal Inspections STAT page--> 
					</div>

					<div class="grid fluid">
					<span class="span4">INSPECTIONS : </span>
					<span class="span1 "><strong><a href='#inspectionsModal' data-toggle='modal' class="fg-white"><?php echo $total_inspections;?></a></strong></span>
								<!--start modal Inspections page-->
			<div id="inspectionsModal" class="modal hide fade fg-white" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-header bg-red">
				<h3 id="myModalLabel">INSPECTIONS<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
				</div>
			  <div class="modal-body bg-black">
				<div class="row-fluid">
					<?php 
					if( $total_inspections ) {?>
						<table class="table table-striped table-bordered table-condensed table-hover">
							<thead class="bg-black"><tr><th>Title</th><th>Date Opened</th><th>Total hrs spend</th></tr></thead>
							<?php 
							foreach( $consultant_libraries as $val_consultant_libraries ) {
								$library_section 	= isset($val_consultant_libraries->st_library_section) ? $val_consultant_libraries->st_library_section : '';
								if( "new_inspection" == $library_section ) {
									$library_title 	= isset($val_consultant_libraries->library_title) ? $val_consultant_libraries->library_title : 'New';
									$hours_spend 		= isset($val_consultant_libraries->in_hours_spend) ? $val_consultant_libraries->in_hours_spend : '';
									$date_performed 	= isset($val_consultant_libraries->dt_date_performed) ? $val_consultant_libraries->dt_date_performed : '';
									$id 			= isset($val_consultant_libraries->id) ? $val_consultant_libraries->id : '';?>
									<tr>
										<td class="bg-black"><?php echo $library_title;?></td>
										<td class="bg-black"><?php echo $date_performed;?></td>
										<td class="bg-black">
										<span class="insp_hrs_spend<?php echo $id;?>"><?php echo $hours_spend;?></span>&nbsp;
										<a href="#" class="fg-white" onclick="javascript:change_tools_hrsspend('insp', 'edit', '<?php echo $id;?>');">Edit</a>&nbsp;|&nbsp;<a href="#" class="fg-white" onclick="javascript:change_tools_hrsspend('insp','save','<?php echo $id;?>');">Save</a>
										</td>
									</tr>
									<?php
								}
							}?>
						</table>
					<?php 
					}
					else {
						echo "<p class='fg-white'>No Inspections found.</p>";
					}?>
				</div>
			</div>
			<div class="modal-footer bg-red"><button class="btn" data-dismiss="modal">Close</button></div>
			</div>
			<!--end modal Inspections page--> 
					<span class="span1"><strong><a href='<?php echo ($total_inspections) ? "#inspectionsStatModal" : '';?>' data-toggle='modal' class="fg-white">STAT</a></strong></span>
					<!--start modal Inspections STAT page-->
					<div id="inspectionsStatModal" class="modal hide fade bg-black" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-header bg-red"><h3 id="myModalLabel">INSPECTIONS<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3></div>
						<div class="modal-body">
						<div id="id_chart_inspection" class="bg-black"></div>
						</div>
						<div class="modal-footer bg-black" ><button class="btn" data-dismiss="modal">Close</button></div>
						<script type="text/javascript" src="https://www.google.com/jsapi"></script>
						<script type="text/javascript">
							google.load("visualization", "1", {packages:["corechart"]});
							google.setOnLoadCallback(drawChart);
							function drawChart() {
							var data = google.visualization.arrayToDataTable([
							  ['Task', 'INSPECTIONS'],
							  ['Open', <?php echo $open_inspection;?>],
							  ['Closed', <?php echo $closed_inspection;?>]
							]);
							var options = {
							  backgroundColor: '#000000',
							  pieHole: 0.4,
							  width:500, height:300,
							  legend: {textStyle: {color: '#ffffff'}},
							  colors: ['#222222', '#e51400'], 
							  pieSliceText: 'value',
							  pieSliceTextStyle: {fontSize: 14, color: '#ffffff'},
							};
							var chart = new google.visualization.PieChart(document.getElementById('id_chart_inspection'));
							chart.draw(data, options);
							}
						</script>
					</div>
					<!--end modal Inspections STAT page--> 
					</div>
					</div>
                  </div>
                  <!--************end tools panel***********-->

                  <!--************begin project panel***********-->
                  <div class="tab-pane fade" id="client_projects">
                  	<div class="grid fluid">
					<!--begin SAFETY BOARD tile -->
						<a href="#" class="tile bg-black">
							<div class="tile-content icon"><img src="<?php echo $base;?>img/profile-home/digital_project.png"></i></div>
							<div class="tile-status"><span class="name"><small>PROJECT 01</small></span></div>
						</a>
						<!--end SAFETY BOARD tile-->
						<!--begin RNEW WORKER tile -->
						<a class="tile bg-black">
							<div class="tile-content icon"><img src="<?php echo $base;?>img/profile-home/digital_project.png"></i></div>
							<div class="tile-status"><span class="name"><small>PROJECT 02</small></span></div>
						</a>
						<!--end NEW WORKER tile-->
						<!--begin DATA tile -->
						<a href="#" class="tile bg-black">
							<div class="tile-content icon"><img src="<?php echo $base;?>img/profile-home/digital_project.png"></i></div>
							<div class="tile-status"><span class="name"><small>PROJECT 03</small></span></div>
						</a>
						<!--end  DATA tile-->
						<!--begin DATA tile -->
						<a href="#" class="tile bg-black">
							<div class="tile-content icon"><img src="<?php echo $base;?>img/profile-home/digital_project.png"></i></div>
							<div class="tile-status"><span class="name"><small>PROJECT 04</small></span></div>
						</a>
						<!--end  DATA tile-->
                  </div>
                   
                  </div>
                  <!--************end project panel***********-->
                  <!--************begin Description panel***********-->
                  <div class="tab-pane fade" id="client_description" style="height:500px;">
                  	<div class="grid fluid">
                    <span class="span6" style="border:1px #ffffff solid;padding:8px;">
                	<?php 
					$rows_description = $this->users->getMetaDataList('consultant_employers', "employer_id='".$clientID."' AND consultant_id='".$this->sess_userid."' AND status=1 AND designate_status=1", '', 'client_description');
					$show_client_description = isset($rows_description[0]['client_description']) ? $rows_description[0]['client_description'] : '';
					echo $client_description = isset($rows_description[0]['client_description']) ? Common::subString( nl2br($rows_description[0]['client_description']), 170) : '';
					?>
                    </span>
                    </div>
                    <div class="grid fluid">
						<span class="span6 text-right">
							<p></p><a href='#descriptionModal' data-toggle='modal' class="fg-white" title="Edit"><button class="image-button primary" >Edit<i style="padding: 3px;" class="icon-enter bg-cobalt" id="openInstModel"></i></button><!--i class="icon-enter" id="openInstModel"></i--></a>
						</span>
					</div>
                  </div>
				  
                  <!--start description Modal-->
					<div id="descriptionModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    					<div class="modal-header bg-red"><h3 id="myModalLabel">DESCRIPTION<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3></div>
							<div id="errors"></div>
							<div class="modal-body">
								<div class="row-fluid">
								<form method="post" name="frm_client_description" id="frm_client_description">
									<div id=""></div>
									<!-- Text input-->
									<label>(MAX OF 1000 CHARACTERS)</label>
									<div class="input-control textarea size5">
										<textarea name="txtarea_client_description" id="txtarea_client_description" rows="11"  placeholder="(MAX OF 1000 CHARACTERS)"><?php echo $show_client_description;?></textarea>
									</div>
									<div class="inline size4">
										<button class="image-button primary" id="btn_save_purpose" name="btn_save">Save<i style="padding: 3px;" class="icon-enter bg-cobalt"></i></button>
										<button class="image-button danger btn-cancel" name="btn_cancel" onclick="javscript:location.href='<?php echo $base."admin/my_client_page?id=".$clientID;?>'">Cancel<i style="padding: 3px 4px 2px 2px;" class="icon-cancel-2 bg-red"></i></button>
									</div>
									<input type="hidden" name="hidn_client_id" value="<?php echo $clientID;?>">
								</form>
								</div>
							</div>
							<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
                    </div>
                    <script type="text/javascript">$('#descriptionModal').width('400px');</script>
					<script>
					  $('#frm_client_description').validate({
						highlight: function(element) { $(element).parent('div').addClass('fgred') }, 
						rules: {
							txtarea_client_description: {
								required: true, 
								maxlength: 1000
							}
						}, 
						messages: {
							txtarea_client_description: {
								required: "Please enter Description."
							}
						}, 
						submitHandler: function(form) {
							$.ajax({
								url: js_base_path+'admin/my_client_page',
								type: 'post', 
								data: $('#frm_client_description').serialize(),
								success: function(output) {
									alert( "Description successfully saved." );
									window.location.href=js_base_path+"admin/my_client_page?id=<?php echo $clientID;?>";
								},
								error: function(errMsg) {
									alert( errMsg.responseText );
									return false;
								}
							});
						}
					});
					
	function change_tools_hrsspend(section, actionName, tool_libid) 
	{
		var txt_hrs_spend = $('#txt_'+section+'_hrs_spend').val();
		if( typeof txt_hrs_spend !== "undefined" ) {
			$val_hrs_spend = $('#txt_'+section+'_hrs_spend').val();
		}
		else {
			$val_hrs_spend = $('.'+section+'_hrs_spend'+tool_libid).html();
		}
		if( 'edit' == actionName ) {
			$("."+section+"_hrs_spend"+tool_libid).html("<input type='text' name='txt_"+section+"_hrs_spend' id='txt_"+section+"_hrs_spend' class='input-small' value='"+$val_hrs_spend+"'>");
		}
		else {
			if( isNaN(txt_hrs_spend) ) {
				alert("Enter numeric value");
				$('#txt_'+section+'_hrs_spend').focus();
				return false;
			}
			else {
				$("."+section+"_hrs_spend"+tool_libid).html($('#txt_'+section+'_hrs_spend').val());
			}
			$.ajax({
				url: js_base_path+'ajax/saveHrsSpend', 
				type: 'post', 
				data: {'tool_libid': tool_libid, 'hrs_spend': txt_hrs_spend},
				success: function(output) {
					return true;
				},
				error: function(errMsg) {
					alert( errMsg.responseText );
					return false;
				}
			});
		}
	}
				</script>
					<!--end modal Description-->
                  <!--************end Description panel***********-->
			<!--************END PANELS***************-->
			</div>