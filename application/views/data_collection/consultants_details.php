<?php include('header_data_admin.php'); ?>
<!-- END HEAD -->
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
			<div class="page-title">
				<h1>Consultants Details<small></small></h1>
			</div>
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
				<li>
					<a href="../../index.html">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 <a href="consultants.php">Consultants</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Consultants Details
				</li>
			</ul>
			<!-- BEGIN DASHBOARD STATS -->
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 drag">
					<a class="dashboard-stat dashboard-stat-light red-flamingo" href="javascript:;">
					<div class="visual">
					</div>
					<div class="details">
						<div class="number">
							 Consultants
						</div>
						<div class="desc">
						</div>
					</div>
					<div class="view-more-tab">
					</div>
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
										<!-- <thead>
											<tr class="uppercase">
												<th colspan="2">
													 MEMBER
												</th>
												<th>
													 Earnings
												</th>
												<th>
													 CASES
												</th>
												<th>
													 CLOSED
												</th>
												<th>
													 RATE
												</th>
											</tr>
										</thead> -->
										<tbody>
										<tr>
											<td>
												 Connections
											</td>
											<td>
												<span class="bold theme-font">437,000</span>
											</td>
										</tr>
										<tr>
											<td>
												 Employers
											</td>
											<td>
												<span class="bold theme-font">225,000</span>
											</td>
										</tr>
										<tr>
											<td>
												 Workers
											</td>
											<td>
												<span class="bold theme-font">212,000</span>
											</td>
										</tr>
										</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- END SAMPLE TABLE PORTLET-->
						</div>
						<div class="col-md-12 drag">
							<a class="dashboard-stat dashboard-stat-light red-flamingo" href="consultants-courses.php">
							<div class="visual">
								<i class="fa fa-book"></i>
							</div>
							<div class="details">
								<div class="number">
									 Courses
								</div>
								<div class="desc">
									16
								</div>
							</div>
							<div class="view-more-tab">
								<div class="view-more-details">
									View More
									<i class="fa fa-arrow-circle-right"></i>
								</div>
							</div>
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
								<img src="../source/img/loading.gif" alt="loading"/>
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
									<th>

									</th>
									<th>
										 User Name
									</th>
									<th>
										 Type
									</th>
									<th>
										 Languages
									</th>
									<th>
										 H&S Rep
									</th>
									<th>
										 Union Rep
									</th>
									<th>
										 JHSC
									</th>									
								</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<i class="fa fa-user"></i>
										</td>
										<td>
											 Jade Arantes
										</td>
										<td>
											 Worker
										</td>
										<td>
											 Portuguese
										</td>
										<td>
											 Column 1
										</td>
										<td>
											 Column 1
										</td>
										<td>
											 Column 1
										</td>									
									</tr>
									<tr>
										<td>
											<i class="fa fa-user"></i>
										</td>
										<td>
											 Samuel Silva
										</td>
										<td>
											 Worker
										</td>
										<td>
											 Italian
										</td>
										<td>
											 Column 2
										</td>
										<td>
											 Column 2
										</td>
										<td>
											 Column 2
										</td>									
									</tr>
									<tr>
										<td>
											<i class="fa fa-user"></i>
										</td>
										<td>
											 Brianne Santos
										</td>
										<td>
											 Employer
										</td>
										<td>
											 Greek
										</td>
										<td>
											 Column 3
										</td>
										<td>
											 Column 3
										</td>
										<td>
											 Column 3
										</td>									
									</tr>							
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
<?php include('footer_data_admin.php'); ?>
</body>
<!-- END BODY -->
</html>