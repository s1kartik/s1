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
			<div class="page-title"><h1><?php echo $course_name;?><small></small></h1></div>
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
	<div id="entire-page-content" class="page-content">
		<div class="container">
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				<?php if( "public"==$redirectfrom ) {
					echo "<li><a href=".$base."admin/s1_public_page_union?id=".$union['id'].">".$union['firstname'].$union['lastname']." Public Page</a><i class='fa fa-circle'></i></li>";
				}?>
				<li><a href="<?php echo $base."admin/union_datacollection?id=".$union['id']."&design=1";?><?php echo ("public"==$redirectfrom) ? "&redirectfrom=".$redirectfrom : '';?>"><?php echo $union['firstname'].$union['lastname']." Details";?></a><i class="fa fa-circle"></i></li>
				<li><a href="<?php echo $base."admin/courses?id=".$union['id'];?><?php echo ("public"==$redirectfrom) ? "&redirectfrom=".$redirectfrom : '';?>">Courses</a><i class="fa fa-circle"></i></li>
				<li class="active"><?php echo $course_name;?></li>
			</ul>
			<!-- BEGIN DASHBOARD STATS -->
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 drag">
					<a class="dashboard-stat dashboard-stat-light red-flamingo" href="javascript:;">
					<div class="visual"></div>
					<div class="details">
						<div class="number">Instructor/Participant Portal</div>
						<div class="desc"></div>
					</div>
					<div class="view-more-tab"></div>
					</a>
				</div>
			</div>
			<!-- END DASHBOARD STATS -->
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN LIGHT TABLES -->
			<div class="row">
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-12 drag">
							<!-- BEGIN SAMPLE TABLE PORTLET-->
							<div class="portlet light">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-table font-red-flamingo"></i>
										<span class="caption-subject font-red-flamingo bold uppercase"><?php echo $course_name;?></span>
									</div>
									<div class="tools">
										<a href="javascript:;" class="collapse" data-original-title="" title=""></a>
										<a href="javascript:;" class="reload" data-original-title="" title=""></a>
									</div>
								</div>
								<div class="portlet-body">
									<div class="table-scrollable table-scrollable-borderless">
										<table class="table table-hover table-light">
										<tbody>
										<tr>
											<td>STUDENTS</td>
											<td><span class="bold theme-font"><?php echo $total_course_students;?></span></td>
										</tr>
										<tr>
											<td>INSTRUCTOR</td>
											<td><span class="bold theme-font"><?php echo $course_instructor;?></span></td>
										</tr>
										</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- END SAMPLE TABLE PORTLET-->
						</div>
						<div class="col-md-12 drag">
							<a class="dashboard-stat dashboard-stat-light red-flamingo" href="javascript:;">
							<div class="visual"><i class="fa fa-line-chart"></i></div>
							<div class="details">
								<div class="number"><?php echo $avaerage_grade."%";?></div>
								<div class="desc">Average Grade</div>
							</div>
							<div class="view-more-tab"></div>
							</a>
						</div>
						<div class="col-md-12">
							<a class="dashboard-stat dashboard-stat-light green-soft" href="javascript:;">
							<div class="visual">
								<i class="fa fa-line-chart"></i>
							</div>
							<div class="details">
								<div class="number"><?php echo $attendee_percentage."%";?></div>
								<div class="desc">Attendance</div>
							</div>
							<div class="view-more-tab"></div>
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
								<a href="javascript:;" class="collapse" data-original-title="" title=""></a>
								<a href="javascript:;" class="reload" data-original-title="" title=""></a>
								<a href="javascript:;" class="fullscreen" data-original-title="" title=""></a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="site_pie_activities_loading">
								<img src="<?php echo $base."source/img/loading.gif";?>" alt="loading"/>
							</div>
							<div class="site_pie_activities_content" class="display-none">
								<div id="pie_second" class="site_pie_activities" style="height: 228px;"></div>
							</div>
						</div>
					</div>
					<!-- END CHART PORTLET-->
				</div>
			</div>
			<div class="row">
			</div>
			<!-- END LIGHT TABLES
			<!-- BEGIN TABLE-->
			<div class="row">
				<div class="col-md-12 drag">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-table font-red-flamingo"></i>
								<span class="caption-subject font-red-flamingo bold uppercase">Course</span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse" data-original-title="" title=""></a>
								<a href="javascript:;" class="reload" data-original-title="" title=""></a>
							</div>
						</div>
						<div class="portlet-body" style="display: block;">
							<div class="table-scrollable table-scrollable-borderless">
								<table class="table table-hover" id="sample_3">
								<thead>
								<tr>
									<th></th>
									<th>Student Name</th>
									<th>Type</th>
									<th>Languages</th>
									<th>Status</th>
								</tr>
								</thead>
								<tbody>
									<?php 
									// common::pr($union_courses);
										if( isset($union_courses[0]['participants']) && sizeof($union_courses[0]['participants']) ){
											$participants_union_courses = $union_courses[0]['participants'];											
											foreach( $participants_union_courses AS $val_participants ) {
												$participant_worker_id 	= $val_participants['participant_worker_id'];
												$participant_name 	 	= $val_participants['participant_name'];
												$participant_type 	 	= $val_participants['participant_type'];
												$participant_language	= isset($val_participants['language']) ? $val_participants['language'] : '';
												$participant_language	= $this->users->get_user_meta($participant_worker_id,'preferred_language',1);
												$participant_language	= isset($participant_language['meta_value']) ? $participant_language['meta_value'] : 'N/A';
												$quiz_answers_ratio 	= $this->points->getQuizAnswersRatio($participant_worker_id, $course_id, 'instructor_library');
												// $average_course_grade 	= ($quiz_answers_ratio>0) ? ($quiz_answers_ratio/$cnt_participants) : 0;
												// $participant_course_status= ($average_course_grade<75) ? 'Failed' : 'Passed';
												$participant_course_status= ($quiz_answers_ratio<75) ? 'Failed' : 'Passed';
												?>
												<tr>
													<td>&nbsp;</td>
													<td><?php echo $participant_name;?></td>
													<td><?php echo $participant_type;?></td>
													<td><?php echo $participant_language;?></td>
													<td><?php echo $participant_course_status;?></td>
												</tr>
												<?php
											}
										}?>
								</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END TABLE-->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="clearfix">
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>

	</div>
	<!-- END PAGE CONTENT -->
</div>
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
}
?>
<script type="text/javascript">var strDataSet = <?php echo "[ ".$strDataSet." ]";?>;</script>
</body>
<?php $this->load->view('data_collection/footer_data_union');?>