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
			<div class="page-title"><h1>Courses<small></small></h1></div>
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
				<?php if( "public"==$redirectfrom ) {
					echo "<li><a href=".$base."admin/s1_public_page_union?id=".$union['id'].">".$union['firstname'].$union['lastname']." Public Page</a><i class='fa fa-circle'></i></li>";
				}?>
				<li><a href="<?php echo $base."admin/union_datacollection?id=".$union['id']."&design=1";?><?php echo ("public"==$redirectfrom) ? "&redirectfrom=".$redirectfrom : '';?>"><?php echo $union['firstname'].$union['lastname']." Details";?></a><i class="fa fa-circle"></i></li>
				<li class="active">Courses</li>
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
										<span class="caption-subject font-red-flamingo bold uppercase">PUBLIC PAGE</span>
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
						<div class="col-md-12 drag">
							<a class="dashboard-stat dashboard-stat-light red-flamingo" href="javascript:;">
							<div class="visual"><i class="fa fa-line-chart"></i></div>
							<div class="details">
								<div class="number"><?php echo $average_grade."%";?></div>
								<div class="desc">Average Grade</div>
							</div>
							<div class="view-more-tab"></div>
							</a>
						</div>
						<div class="col-md-12 drag">
							<a class="dashboard-stat dashboard-stat-light green-soft" href="javascript:;">
							<div class="visual"><i class="fa fa-line-chart"></i></div>
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
								<span class="caption-subject font-red-flamingo bold uppercase">Courses</span>
							</div>
							<div class="tools">
								<div class="btn-group dropdown-user">
									<a href="" class="dropdown-header btn grey-salsa btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">Location<span class="fa fa-angle-down" style="margin-left: 10px"></span>
									</a>
									<ul class="dropdown-menu pull-right">
										<?php 
										foreach( $union_courses AS $val_union_courses ) {
											$course_id 		= isset($val_union_courses['library_id']) ? $val_union_courses['library_id'] : '';
											/*$rows_course_location	= $this->users->getMetaDataList('library', 'status=1 AND library_id="'.$course_id.'"', '', 'country_id, province_id');
											*/
											$rows_course_location = $this->libraries->getCourseLocation($course_id);
											$country 	= isset($rows_course_location[0]->countryname) ?  $rows_course_location[0]->countryname : '';
											$province 	= isset($rows_course_location[0]->provincename) ?  $rows_course_location[0]->provincename : '';
											?>
											<li><a href="javascript:;"><?php echo $province." - ".$country;?></a></li>
											<!-- <li class="active"><a href="javascript:;">Employers <span class="label label-sm label-default"></span></a></li> -->
											<?php
										}
										?>
									</ul>
								</div>

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
										$course_passing_score 	= '75%';
										if( isset($union_courses) && sizeof($union_courses) ) {
										foreach( $union_courses AS $val_union_courses ) {
											$course_participants 	= isset($val_union_courses['participants']) ? $val_union_courses['participants'] : array();
											$tot_course_participants= isset($val_union_courses['participants'])?sizeof($val_union_courses['participants']):'0';

											$course_id 		= isset($val_union_courses['library_id']) ? $val_union_courses['library_id'] : '';
											$course_name 	= isset($val_union_courses['title']) ? $val_union_courses['title'] : '';
											$course_language= isset($val_union_courses['language']) ? $val_union_courses['language'] : '';
											$course_language= $this->users->getMetaDataList('language','abbr="'.$course_language.'"', '', "language");
											$course_language = isset($course_language[0]['language']) ? $course_language[0]['language'] : 'N/A';
											$course_date 	= $val_union_courses['date_start'];

											$cnt_participants = $tot_average_grade_ratio = 0;

											// Attendance means the percentage of attendees related to the total of connections //
												$attendee_course_percentage = '0';
												if( $tot_course_participants > 0 ) {
													$attendee_course_percentage = ($total_connections>0)?round( ($tot_course_participants/$total_connections)*100, 2):'0';
												}

											foreach( $course_participants AS $key_course_participants => $val_course_participants ){
												$cnt_participants++;
												$participant_id 	= $val_course_participants['participant_id'];
												$quiz_answers_ratio = $this->points->getQuizAnswersRatio($participant_id, $course_id, 'instructor_library');
												$tot_average_grade_ratio += $quiz_answers_ratio;
											}

											
											// Average score is the average Grade percentage for all users who attended the course //
												$average_course_grade = ($tot_average_grade_ratio>0) ? ($tot_average_grade_ratio/$cnt_participants) : 0;

											// Get Course Instructor //
												$course_instructor = $this->users->getMetaDataList('union_courses', 'in_status="1" AND is_course_active="yes" AND in_library_id="'.$course_id.'" AND in_union_id="'.$union_id.'"', '', 'in_instructor_id');
												$course_instructors = array();
												foreach( $course_instructor AS $val_course_instructor ) {
													$instructor_id = isset($val_course_instructor['in_instructor_id']) ? $val_course_instructor['in_instructor_id'] : '';
													$instructor_name = $this->users->getMetaDataList('user','id="'.$instructor_id.'"', '', "CONCAT(firstname,' ',lastname) AS username");
													$instructor_name = isset($instructor_name[0]['username']) ? $instructor_name[0]['username'] : '';
													array_push($course_instructors,$instructor_name);
												}?>
												<tr onclick="document.location='<?php echo $base."admin/courses_details?id=".$union_id."&courseid=".$course_id;?><?php echo ("public"==$redirectfrom) ? "&redirectfrom=".$redirectfrom : '';?>'" style="cursor: pointer;">
													<td><?php echo $course_name;?></td>
													<td><?php echo $course_date;?></td>
													<td><?php echo $tot_course_participants;?></td>
													<td><?php echo $attendee_course_percentage."%";?></td>
													<td><?php echo $average_course_grade."%";?></td>
													<td><?php echo $course_passing_score;?></td>
													<td><?php echo $course_language;?></td>
													<td><?php echo (isset($course_instructors)&&is_array($course_instructors)) ? implode(", ",$course_instructors) : '';?></td>
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
}
?>
<script type="text/javascript">var strDataSet = <?php echo "[ ".$strDataSet." ]";?>;</script>
</body>
<?php $this->load->view('data_collection/footer_data_union');?>