<?php $this->load->view('data_collection/header_data_admin'); ?>
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
				<h1>Due Diligence<small></small></h1>
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
			</div>
			<!-- END PAGE TOOLBAR -->
		</div>
	</div>
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				<li><a href="<?php echo $base."admin/my_data_collection?design=1";?>">Home</a><i class="fa fa-circle"></i></li>
				<li class="active">Due Diligence</li>
			</ul>
			<!-- BEGIN DASHBOARD STATS -->
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<a class="dashboard-stat dashboard-stat-light green-soft" href="<?php echo $base."admin/safetytalks_admindata";?>">
					<div class="visual">
						<i class="fa fa-credit-card"></i>
					</div>
					<div class="details">
						<div class="number">
							 65%
						</div>
						<div class="desc">
							 Safety Talks
						</div>
					</div>
					<div class="view-more-tab">
						<div class="view-more-details">
							View Table
							<i class="fa fa-arrow-circle-right"></i>
						</div>
					</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<a class="dashboard-stat dashboard-stat-light blue-soft" href="<?php echo $base."admin/investigation_admindata";?>">
					<div class="visual">
						<i class="fa fa-money"></i>
					</div>
					<div class="details">
						<div class="number">
							 10%
						</div>
						<div class="desc">
							 Investigations
						</div>
					</div>
					<div class="view-more-tab">
						<div class="view-more-details">
							View Table
							<i class="fa fa-arrow-circle-right"></i>
						</div>
					</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<a class="dashboard-stat dashboard-stat-light red-flamingo" href="<?php echo $base."admin/inspection_admindata";?>">
					<div class="visual">
						<i class="fa fa-line-chart"></i>
					</div>
					<div class="details">
						<div class="number">
							 25%
						</div>
						<div class="desc">
							 Inspections
						</div>
					</div>
					<div class="view-more-tab">
						<div class="view-more-details">
							View Table
							<i class="fa fa-arrow-circle-right"></i>
						</div>
					</div>
					</a>
				</div>
			</div>
			<!-- END DASHBOARD STATS -->
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN LIGHT TABLES -->
			<div class="row">
				<div class="col-md-4">
					<div class="row">
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
									<table class="table table-hover table-light" >
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
											 Inspections
										</td>
										<td>
											<span class="bold theme-font">9,141</span>
										</td>
									</tr>
									<tr>
										<td>
											 Investigations
										</td>
										<td>
											<span class="bold theme-font">4,000</span>
										</td>
									</tr>
									<tr>
										<td>
											 Safety Talks
										</td>
										<td>
											<span class="bold theme-font">11,417</span>
										</td>
									</tr>
									<tr>
										<td>
											 Procedures
										</td>
										<td>
											<span class="bold theme-font">5,198</span>
										</td>
									</tr>
									</tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- END SAMPLE TABLE PORTLET-->
					</div>
					<div class="row">
						<a class="dashboard-stat dashboard-stat-light red-flamingo" href="<?php echo $base."admin/injuries_admindata";?>">
							<div class="visual">
								<i class="fa fa-line-chart"></i>
							</div>
							<div class="details">
								<div class="number">
									 Injuries
								</div>
								<div class="desc">
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
				<div class="col-md-8">
					<!-- BEGIN CHART PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-pie-chart font-red-flamingo"></i>
								<span class="caption-subject bold uppercase font-red-flamingo"> Investigation Types</span>
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
								<img src="<?php echo $base;?>admin1/img/loading.gif" alt="loading"/>
							</div>
							<div class="site_pie_activities_content" class="display-none">
								<div id="pie_third" class="site_pie_activities" style="height: 228px;">
								</div>
							</div>
						</div>
					</div>
					<!-- END CHART PORTLET-->
				</div>
			</div>
			<!-- END LIGHT TABLES
			<!-- BEGIN TABLE-->
			<div class="row">
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
									 User
								</th>
								<th>
									 User Type
								</th>
								<th>
									 Inspection
								</th>
								<th>
									 Investigation
								</th>
								<th>
									 Safety Talks
								</th>
							</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										 John Mario
									</td>
									<td>
										 Worker
									</td>
									<td>
										 274
									</td>
									<td>
										 423
									</td>
									<td>
										27 
									</td>									
								</tr>
								<tr>
									<td>
										 Welligton Lima
									</td>
									<td>
										 Consultant
									</td>
									<td>
										 381
									</td>
									<td>
										 415
									</td>
									<td>
										33 
									</td>									
								</tr>	
								<tr>
									<td>
										 Richard Lins
									</td>
									<td>
										 Employer
									</td>
									<td>
										 396
									</td>
									<td>
										 501
									</td>
									<td>
										39
									</td>									
								</tr>									
							</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- END SAMPLE TABLE PORTLET-->
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
<?php $this->load->view('data_collection/footer_data_admin'); ?>
</body>
<!-- END BODY -->
</html>