<?php $this->load->view('data_collection/header_data_admin');?>
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
			<div class="page-title"><h1>Consultants<small></small></h1></div>
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
				<li><a href="<?php echo $base."admin/my_data_collection?design=1";?>">Home</a><i class="fa fa-circle"></i></li>
				<li class="active">Consultants</li>
			</ul>
			<!-- BEGIN DASHBOARD STATS -->
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 drag">
					<a class="dashboard-stat dashboard-stat-light dark-soft" href="<?php echo $base."admin/union_admindata?design=1";?>">
					<div class="visual"></div>
					<div class="details">
						<div class="number">Union</div>
						<div class="desc"></div>
					</div>
					<div class="view-more-tab">
						<div class="view-more-details">View Page<i class="fa fa-arrow-circle-right"></i></div>
					</div>
					</a>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 drag">
					<a class="dashboard-stat dashboard-stat-light red-flamingo" href="javascript:;">
					<div class="visual"></div>
					<div class="details">
						<div class="number">Consultants</div>
						<div class="desc"></div>
					</div>
					<div class="view-more-tab">
						<div class="view-more-details">View Page<i class="fa fa-arrow-circle-right"></i></div>
					</div>
					</a>
				</div>
			</div>
			<!-- END DASHBOARD STATS -->
			<!-- END PAGE BREADCRUMB -->
			
			<!-- BEGIN TABLE-->
			<div class="row">
				<div class="col-md-12 drag">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-table font-red-flamingo"></i>
								<span class="caption-subject font-red-flamingo bold uppercase">Consultants</span>
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
									<th>Consultant Name</th>
									<th>Connections</th>
									<th>Languages</th>
									<th>Advertising</th>
								</tr>
								</thead>
								<tbody>
									<?php 
									foreach( $all_consultants AS $key_consultants => $val_consultants ) {
										$consultant_name= $val_consultants['username'];
										$id_consultant 	= $val_consultants['id'];
										$peo_links 		= $this->users->getMyConnectionsByUserId( 'PEOPLE',$id_consultant,NULL,'id,email_addr,type_id,CONCAT(firstname," ",lastname) AS username');
										$org_links		= $this->users->getMyConnectionsByUserId( 'ORGANIZATION',$id_consultant,NULL,'id,email_addr,type_id,CONCAT(firstname," ",lastname) AS username');				
										$total_consultant_connections = sizeof( array_merge($peo_links,$org_links) );
										?>
										<tr onclick="document.location='<?php echo $base."admin/consultants_details?id=".$id_consultant."&design=1";?>'" style="cursor: pointer;">
											<td><?php echo $consultant_name;?></td>
											<td><?php echo $total_consultant_connections;?></td>
											<td>4</td>
											<td>$24,258</td>									
										</tr>
										<?php
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
											<td>Employers</td><td><span class="bold theme-font"><?php echo $total_employers_connected;?></span></td>
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
						<?php /*
						<div class="col-md-12">
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
					*/?>
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
								<a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""></a>
								<a href="javascript:;" class="reload" data-original-title="" title=""></a>
								<a href="javascript:;" class="fullscreen" data-original-title="" title=""></a>
								<a href="javascript:;" class="remove" data-original-title="" title=""></a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="site_pie_activities_loading"><img src="<?php echo $base;?>admin/img/loading.gif" alt="loading"/></div>
							<div class="site_pie_activities_content" class="display-none">
								<div id="pie_second" class="site_pie_activities" style="height: 228px;"></div>
							</div>
						</div>
					</div>
					<!-- END CHART PORTLET-->
				</div>
			</div>
			<div class="row"></div>
			<!-- END LIGHT TABLES
			
			<!-- BEGIN TABLE-->
			<?php /*
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-table font-red-flamingo"></i>
								<span class="caption-subject font-red-flamingo bold uppercase">Courses</span>
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse" data-original-title="" title=""></a>
								<a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""></a>
								<a href="javascript:;" class="reload" data-original-title="" title=""></a>
								<a href="javascript:;" class="remove" data-original-title="" title=""></a>
							</div>
						</div>
						<div class="portlet-body" style="display: block;">
							<div class="table-scrollable table-scrollable-borderless">
								<table class="table table-hover" id="sample_3">
								<thead>
								<tr>
									<th>Course Name</th>
									<th>Date</th>
									<th># Students</th>
									<th>Attendance</th>
									<th>Average Score</th>
									<th>Passing Score</th>
									<th>Prefer. Language</th>
									<th>Instructor</th>
								</tr>
								</thead>
								<tbody>
									<?php 
										// common::pr($union_courses);
										if( isset($union_courses) && sizeof($union_courses) ) {
										foreach( $union_courses AS $val_union_courses ) {										
											$course_name 	= $val_union_courses['in_course_code'];
											$course_date 	= $val_union_courses['dt_start_time'];
											$total_course_participants = sizeof($val_union_courses['participant_id']);

											
											// Attendance means the percentage of attendees related to the total of connections //
												$attendee_course_percentage = ($total_connec>0)?($total_course_participants/$total_connec)*100:0;
												
											// Average score is the average Grade percentage for all users who attended the course //
												$avaerage_course_grade = ($all_users>0) ? round(((sizeof($total_course_participants)/$all_users)*100)/$all_users, 2) : 0;

											$course_passing_score 	= '75%';
											$course_instructor 		= $val_union_courses['in_instructor_id'];
											$course_language = $this->users->get_user_meta($course_instructor, "second_language");
											$course_language = isset($course_language['meta_value'])?$course_language['meta_value']:'English';
											$course_instructor 	= $val_union_courses['in_instructor_id'];
											$course_instructor 	= $this->users->getMetaDataList('user','id="'.$course_instructor.'"', '', "CONCAT(firstname,' ',lastname) AS username");
											$course_instructor 	= isset($course_instructor[0]['username']) ? $course_instructor[0]['username'] : '';
											?>
											<tr onclick="#document.location = 'consultants-detail.html';" style="cursor: pointer;">
												<td><?php echo $course_name;?></td>
												<td><?php echo $course_date;?></td>
												<td><?php echo $total_course_participants;?></td>
												<td><?php echo $attendee_course_percentage."%";?></td>
												<td><?php echo $avaerage_course_grade."%";?></td>
												<td><?php echo $course_passing_score;?></td>
												<td><?php echo $course_language;?></td>
												<td><?php echo $course_instructor;?></td>
											</tr>
											<?php
											}
										}?>
								</tbody>
								</table>
								<?php
								if(sizeof($union_courses)<=0) {
									echo "<div align='center'><br>No data available</div>";
								}
								?>
							</div>
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
				</div>
			</div>
			*/ ?>
			<!-- END TABLE-->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="clearfix">
			</div>
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<!-- BEGIN PRE-FOOTER -->
<!-- END PRE-FOOTER -->
<!-- BEGIN FOOTER -->
<div class="scroll-to-top">
	<i class="icon-arrow-up"></i>
</div>
<?php
$strDataSet = '';
foreach( $connection_languages AS $val_lang => $noof_lang ) {
	$strDataSet .= '{label: "'.$val_lang.'", data: '.$noof_lang.', color: "#00A36A"}, ';
}?>
<script type="text/javascript">var strDataSet = <?php echo "[ ".$strDataSet." ]";?>;</script>
</body>
<!-- END BODY -->
<?php $this->load->view('data_collection/footer_data_admin');?>