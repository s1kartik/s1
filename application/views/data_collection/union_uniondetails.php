<?php $this->load->view('data_collection/header_data_union');?>
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
<!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->
<body>
<!-- BEGIN HEADER -->
<div class="page-header">
	<!-- BEGIN HEADER MENU -->
	<!-- END HEADER MENU -->
</div>
<!-- END HEADER -->
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title"><h1><?php echo $union['firstname'].$union['lastname'];?> Details<small></small></h1></div>
			<!-- END PAGE TITLE -->
			<!-- BEGIN PAGE TOOLBAR -->
			<div class="page-toolbar">
				<div id="dashboard-report-range" class="tooltips btn btn-fit-height btn-sm red-flamingo btn-dashboard-daterange btn-margin" data-container="body" data-placement="left" data-original-title="Change dashboard date range">
					<i class="icon-calendar"></i>
					&nbsp;&nbsp; <i class="fa fa-angle-down"></i>
					<!-- uncomment this to display selected daterange in the button 
					&nbsp; <span class="thin uppercase visible-lg-inline-block"></span>&nbsp;
					<i class="fa fa-angle-down"></i>
					-->
				</div>
				<div id="dashboard-printer" class="tooltips btn btn-fit-height btn-sm red-flamingo btn-dashboard-daterange btn-margin" data-container="body" data-placement="left" data-original-title="Change dashboard date range" data-toggle="modal" data-target=".bs-example-modal-lg">
					<i class="icon-printer"></i>
				</div>
			</div>
			<!-- END PAGE TOOLBAR -->
		</div>
	</div>
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content" id="entire-page-content">
		<div class="container">
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				<!--<li><a href="<?php echo $base."admin/my_data_collection?design=1";?>">Home</a><i class="fa fa-circle"></i></li>
				<li class="active"><a href="<?php echo $base."admin/union_admindata?id=".$union['id'];?>"><?php echo $union['firstname'].$union['lastname'];?></a><i class="fa fa-circle"></i></li>
				-->
				<?php if( "public"==$redirectfrom ) {
					echo "<li><a href=".$base."admin/s1_public_page_union?id=".$union['id'].">".$union['firstname'].$union['lastname']." Public Page</a><i class='fa fa-circle'></i></li>";
				}?>
				<li class="active"><?php echo $union['firstname'].$union['lastname']."&nbsp; Details";?></li>
			</ul>
			<?php
			?>
			<!-- BEGIN DASHBOARD STATS -->
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 drag">
					<!--<a class="dashboard-stat dashboard-stat-light red-flamingo" href="<?php echo $base."admin/union_admindata?id=".$union['id'];?>">
					-->
					<a class="dashboard-stat dashboard-stat-light red-flamingo" href="javascript:;">
					<div class="visual">
						<?php 
						// echo FCPATH.$this->path_upload_profiles.$union['profile_image'];
						$pimg = (!empty($union['profile_image']) && file_exists(FCPATH.$this->path_upload_profiles.$union['profile_image'])) ? $base.$this->path_upload_profiles.$union['profile_image'] : $base."img/default.png";?>
						<img src="<?php echo $pimg;?>" width="98" height="98">
					</div>
					<div class="details">
						<div class="number">
							<?php echo isset($union['firstname']) ? strtoupper($union['firstname']) : '';?>
							<?php echo isset($union['lastname']) ? strtoupper($union['lastname']) : '';?>
						</div>
						<div class="desc"></div>
					</div>
					<!--<div class="view-more-tab">
						<div class="view-more-details">View Page<i class="fa fa-arrow-circle-right"></i></div>
					</div>
					-->
					</a>
				</div>
			</div>
			
			
			<!-- END DASHBOARD STATS -->
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN TABLE-->
			<div class="row">
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-12 drag">
							<!-- BEGIN SAMPLE TABLE PORTLET-->
							<div class="portlet light">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-table font-red-flamingo"></i>
										<span class="caption-subject font-red-flamingo bold uppercase">STATUS</span>
									</div>
									<div class="tools">
										<a href="javascript:;" class="collapse" data-original-title="" title="">
										</a>
										<a href="javascript:;" class="reload" data-original-title="" title="">
										</a>
									</div>
								</div>
								<div class="portlet-body">
									<div class="table-scrollable table-scrollable-borderless">
										<table class="table table-hover table-light">
										<tbody>
										<tr>
											<td>Connections</td>
											<td><span class="bold theme-font"><?php echo $total_connections;?></span></td>
										</tr>
										<tr>
											<td>Employers</td>
											<td><span class="bold theme-font"><?php echo $total_employers_connected;?></span></td>
										</tr>
										<tr>
											<td workers_connected="<?php echo $total_workers_connected;?>">Workers</td>
											<td><span class="bold theme-font"><?php echo $total_workers_connected;?></span></td>
										</tr>
										</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- END SAMPLE TABLE PORTLET-->
						</div>
						<div class="col-md-12 drag">
							<a class="dashboard-stat dashboard-stat-light red-flamingo" href="<?php echo $base."admin/courses?id=".$union['id'];?><?php echo ("public"==$redirectfrom) ? "&redirectfrom=".$redirectfrom : '';?>">
							<div class="visual"><i class="fa fa-book"></i></div>
							<div class="details">
								<div class="number">Courses</div>
								<div class="desc"><?php echo sizeof($union_courses);?></div>
							</div>
							<div class="view-more-tab"><div class="view-more-details">View More<i class="fa fa-arrow-circle-right"></i></div></div>
							</a>
						</div>						
					</div>
				</div>
				<div class="col-md-8 drag">
					<!-- BEGIN CHART PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-pie-chart font-red-flamingo"></i>
								<span class="caption-subject bold uppercase font-red-flamingo"> Languages</span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse" data-original-title="" title="">
								</a>
								<a href="javascript:;" class="reload" data-original-title="" title="">
								</a>
								<a href="javascript:;" class="fullscreen" data-original-title="" title="">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="site_pie_activities_loading">
								<img src="<?php echo $base;?>source/img/loading.gif" alt="loading"/>
							</div>
							<div class="site_pie_activities_content" class="display-none">
								<div id="pie_second" class="site_pie_activities" style="height: 228px;">
								</div>
							</div>
						</div>
					</div>
					<!-- END CHART PORTLET-->
				</div>
			</div>
			<!-- END TABLE-->
			<!-- BEGIN TABLE-->
			<div class="row">
				<div class="col-md-12 drag">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-table font-red-flamingo"></i>
								<span class="caption-subject font-red-flamingo bold uppercase">Users</span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse" data-original-title="" title="">
								</a>
								<a href="javascript:;" class="reload" data-original-title="" title="">
								</a>
							</div>
						</div>
						<div class="portlet-body" style="display: block;">
							<div class="table-scrollable table-scrollable-borderless">
								<table class="table table-hover" id="sample_3">
								<thead>
								<tr>
									<th></th>
									<th>User Name</th>
									<th>Type</th>
									<th>Languages</th>
									<th>H&S Rep</th>
									<th>Union Rep</th>
									<th>JHSC</th>									
								</tr>
								</thead>
								<tbody>
									<?php 
									if( isset($union_connections) && sizeof($union_connections) ) {
									foreach( $union_connections AS $val_union_connections ) {
										$usertype = '';
										$type_id = $val_union_connections['type_id'];
											$username 	= $val_union_connections['username'];
											$userid 	= $val_union_connections['id'];
											$language 	= $this->users->get_user_meta($userid, "preferred_language");
											$language 	= (isset($language['meta_value'])&&$language['meta_value']) ? $language['meta_value'] : 'N/A';
											
											// Get REP from union designations table //
												$rows_user_designations = $this->users->getMetaDataList('union_designations', 'in_union_id="'.$union['id'].'" AND in_worker_id="'.$userid.'"', '', 'st_designation, st_status');
												$rows_user_designations = (isset($rows_user_designations) && sizeof($rows_user_designations)) ? $rows_user_designations : array();
												$user_designation = isset($rows_user_designations[0]['st_designation']) ? $rows_user_designations[0]['st_designation'] : '';
												$user_status= isset($rows_user_designations[0]['st_status']) ? $rows_user_designations[0]['st_status'] : '';

												$is_hsrep 	= $is_union_instructor = $is_jhsc = '';
												if( "y"==$user_status ) {
													switch( $user_designation ) {
														case 'hsrep': { $is_hsrep='checked';break;}
														case 'union_instructor': {$is_union_instructor='checked';break;}
														case 'jhsrep': {$is_jhsc='checked';break;}
													}
												}

											switch($val_union_connections['type_id']) {
												case "8":{$usertype = 'Employer';break;}
												case "9":{$usertype = 'Worker';break;}
												case "11":{$usertype = 'Student';break;}
												case "7":{$usertype = 'Union';break;}
											}?>
											<tr>
												<td><i class="fa fa-user"></i></td>
												<td><?php echo $username;?></td>
												<td><?php echo $usertype;?></td>
												<td><?php echo $language;?></td>
												<td><input disabled type="checkbox" <?php echo $is_hsrep;?>></td>
												<td><input disabled type="checkbox" <?php echo $is_union_instructor;?>></td>
												<td><input disabled type="checkbox" <?php echo $is_jhsc;?>></td>
											</tr>
											<?php 
										}
									}
									?>									
								</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END TABLE-->
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

<?php 
$strDataSet = '';
$cnt_jslang = 0;
foreach( $connection_languages AS $val_lang => $noof_lang ) {
	($val_lang=='') ? $val_lang = "N/A" : '';
	$cnt_jslang++;
	switch($cnt_jslang) {
		case 1: { $lang_color="#005CDE";break; }
		case 2: { $lang_color="#00A36A";break; }
		case 3: { $lang_color="#7D0096";break; }
		case 3: { $lang_color="#992B00";break; }
		case 4: { $lang_color="#DE000F";break; }
		case 5: { $lang_color="#ED7B00";break; }
	}
	$strDataSet .= '{label: "'.$val_lang.'", data: '.$noof_lang.', color: "'.$lang_color.'"}, ';
}?>
<script type="text/javascript">
	var strDataSet = <?php echo "[ ".$strDataSet." ]";?>;
</script>
</body>
<!-- END BODY -->
<?php $this->load->view('data_collection/footer_data_union'); ?>


<script type="text/javascript">
	$(document).ready(function() {
		$(".applyBtn").click(function() {
			var range_filter = $("div.ranges ul li.active").html();
			$.post(
		});
	});
</script>
