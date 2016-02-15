<?php $this->load->view('data_collection/header_data_admin'); ?>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
<!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->
<!-- END HEADER -->
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	<div class="page-head">
		<div class="container">
			<!-- BEGIN PAGE TITLE -->
			<div class="page-title">
				<h1>Users<small> All site user data</small></h1>
			</div>
			<!-- END PAGE TITLE -->
			<!-- BEGIN PAGE TOOLBAR -->
			<div class="page-toolbar">
				<!-- BEGIN THEME PANEL -->
				<div id="tree-button" class="btn-group btn-theme-panel">
					<a href="javascript:;" class="btn dropdown-toggle" data-toggle="dropdown">
					<i class="icon-settings"></i>
					</a>
					<!-- <div class="dropdown-menu theme-panel pull-right dropdown-custom hold-on-click"> -->
					<div id="tree-container" class="dropdown-tree" style="display: none;">
						<div class="row">
							<div class="col-md-12">
								<div class="portlet blue-hoki box">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-cogs"></i>Industries
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
											<a href="javascript:;" class="reload">
											</a>
										</div>
									</div>
									<div class="portlet-body">
										<div id="tree_2" class="tree-demo jstree-checkbox-selection">
												<!-- <ul>
												<li data-jstree='{ "selected" : true, "icon" : "fa fa-building-o icon-state-successs" }'>
													Constructions
													<ul>
														<li data-jstree='{"icon" : "fa fa-database" }'>
															Sector 1 
														</li>
														<li data-jstree='{"icon" : "fa fa-database" }'>
															Sector 2 
														</li>
														<li data-jstree='{"icon" : "fa fa-database" }'>
															Sector 3 
														</li>
													</ul>
												</li>
												<li data-jstree='{ "icon" : "fa fa-building-o icon-state-successs" }'>
													Mining
													<ul>
														<li data-jstree='{"icon" : "fa fa-database" }'>
															Sector 1 
														</li>
														<li data-jstree='{"icon" : "fa fa-database" }'>
															Sector 2 
														</li>
														<li data-jstree='{"icon" : "fa fa-database" }'>
															Sector 3 
														</li>
													</ul>
												</li>
												<li data-jstree='{ "icon" : "fa fa-building-o icon-state-successs" }'>
													Industrial
													<ul>
														<li data-jstree='{"icon" : "fa fa-database" }'>
															Sector 1 
														</li>
														<li data-jstree='{"icon" : "fa fa-database" }'>
															Sector 2 
														</li>
														<li data-jstree='{"icon" : "fa fa-database" }'>
															Sector 3 
														</li>
													</ul>
												</li>
												<li data-jstree='{ "icon" : "fa fa-building-o icon-state-successs" }'>
													Farming
													<ul>
														<li data-jstree='{"icon" : "fa fa-database" }'>
															Sector 1 
														</li>
														<li data-jstree='{"icon" : "fa fa-database" }'>
															Sector 2 
														</li>
														<li data-jstree='{"icon" : "fa fa-database" }'>
															Sector 3 
														</li>
													</ul>
												</li>
											</ul>-->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- END THEME PANEL -->
				<div id="dashboard-report-range" class="tooltips btn btn-fit-height btn-sm red-flamingo btn-dashboard-daterange btn-margin" data-container="body" data-placement="left" data-original-title="Change dashboard date range" >
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
				<li><a href="<?php echo $base."admin/my_data_collection?design=1";?>">Home</a><i class="fa fa-circle"></i></li>
				<li class="active">User</li>
			</ul>
			<!-- BEGIN DASHBOARD STATS -->
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 drag">
					<a class="dashboard-stat dashboard-stat-light dark-soft" href="javascript:;">
					<div class="visual">
						<i class="fa fa-users"></i>
					</div>
					<div class="details">
						<div class="number">
							 30,000
						</div>
						<div class="desc">
							 Members
						</div>
					</div>
					</a>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 drag">
					<a class="dashboard-stat dashboard-stat-light red-flamingo" href="javascript:;">
					<div class="visual">
						<i class="fa fa-line-chart"></i>
					</div>
					<div class="details">
						<div class="number">
							 13%
						</div>
						<div class="desc">
							 Increase
						</div>
					</div>
					</a>
				</div>
			</div>
			<!-- END DASHBOARD STATS -->
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="clearfix">
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 drag">
					<!-- BEGIN PORTLET-->
					<div class="portlet light ">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-share font-red-sunglo hide"></i>
								<span class="caption-subject font-red-sunglo bold uppercase">Stats</span>
								<span class="caption-helper">monthly stats...</span>
							</div>
						</div>
						<div class="portlet-body">
							<div id="site_activities_loading">
								<img src="<?php echo $base;?>admin1/img/loading.gif" alt="loading"/>
							</div>
							<div id="site_activities_content" class="display-none">
								<div id="site_activities" style="height: 228px;">
								</div>
							</div>
							<div style="margin: 20px 0 10px 30px">
								<div class="row">
									<div class="col-md-3 col-sm-3 col-xs-6 text-stat">
										<span class="label label-sm label-danger">
										Employers </span>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-6 text-stat">
										<span class="label label-sm label-primary">
										Workers </span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
			</div>
			<div class="row margin-top-10">
				<a class="col-lg-3 col-md-3 col-sm-6 col-xs-12 drag" href="Employer.php">
					<div class="dashboard-stat2">
						<div class="display">
							<div class="number">
								<h3 class="font-red-flamingo company-section">22 Employers<small class="font-green-sharp"></small></h3>
								<small>Inactive: 06</small>
							</div>
							<div class="icon">
								<i class="fa fa-arrow-up font-green-sharp"></i>
							</div>
						</div>
						<div class="progress-info">
							<div class="progress">
								<span style="width: 13%;" class="progress-bar progress-bar-success green-sharp">
								<span class="sr-only">13% Increase</span>
								</span>
							</div>
							<div class="status">
								<div class="status-title">
									 Increase
								</div>
								<div class="status-number">
									 13%
								</div>
							</div>
						</div>
					</div>
				</a>
				<a class="col-lg-3 col-md-3 col-sm-6 col-xs-12 drag" href="worker.php">
					<div class="dashboard-stat2">
						<div class="display">
							<div class="number">
								<h3 class="font-purple-medium company-section">14 Workers</h3>
								<small>Inactive: 12</small>
							</div>
							<div class="icon">
								<i class="fa fa-arrow-down font-red-haze"></i>
							</div>
						</div>
						<div class="progress-info">
							<div class="progress">
								<span style="width: 7%;" class="progress-bar progress-bar-success red-haze">
								<span class="sr-only">7% change</span>
								</span>
							</div>
							<div class="status">
								<div class="status-title">
									 Decrease
								</div>
								<div class="status-number">
									 7%
								</div>
							</div>
						</div>
					</div>
				</a>
				<a class="col-lg-3 col-md-3 col-sm-6 col-xs-12 drag" href="consultants.php">
					<div class="dashboard-stat2">
						<div class="display">
							<div class="number">
								<h3 class="font-yellow-gold company-section">37 Consultants</h3>
								<small>Inactive: 15</small>
							</div>
							<div class="icon">
								<i class="fa fa-arrow-up font-green-sharp"></i>
							</div>
						</div>
						<div class="progress-info">
							<div class="progress">
								<span style="width: 21%;" class="progress-bar progress-bar-success green-sharp">
								<span class="sr-only">21% Increase</span>
								</span>
							</div>
							<div class="status">
								<div class="status-title">
									 Increase
								</div>
								<div class="status-number">
									 21%
								</div>
							</div>
						</div>
					</div>
				</a>
				<a class="col-lg-3 col-md-3 col-sm-6 col-xs-12 drag" href="union.php">
					<div class="dashboard-stat2">
						<div class="display">
							<div class="number">
								<h3 class="font-yellow-crusta company-section">08 Union</h3>
								<small>Inactive: 07</small>
							</div>
							<div class="icon">
								<i class="fa fa-arrow-up font-green-sharp"></i>
							</div>
						</div>
						<div class="progress-info">
							<div class="progress">
								<span style="width: 13%;" class="progress-bar progress-bar-success green-sharp">
								<span class="sr-only">13% change</span>
								</span>
							</div>
							<div class="status">
								<div class="status-title">
									 Increase
								</div>
								<div class="status-number">
									 13%
								</div>
							</div>
						</div>
					</div>
				</a>
				<a class="col-lg-3 col-md-3 col-sm-6 col-xs-12 drag" href="union.php">
					<div class="dashboard-stat2">
						<div class="display">
							<div class="number">
								<h3 class="font-blue company-section">12 S1 Public Pages</h3>
								<small>Inactive: 07</small>
							</div>
							<div class="icon">
								<i class="fa fa-arrow-up font-green-sharp"></i>
							</div>
						</div>
						<div class="progress-info">
							<div class="progress">
								<span style="width: 27%;" class="progress-bar progress-bar-success green-sharp">
								<span class="sr-only">27% change</span>
								</span>
							</div>
							<div class="status">
								<div class="status-title">
									 Increase
								</div>
								<div class="status-number">
									 27%
								</div>
							</div>
						</div>
					</div>
				</a>
				<a class="col-lg-3 col-md-3 col-sm-6 col-xs-12 drag" href="associations.php">
					<div class="dashboard-stat2">
						<div class="display">
							<div class="number">
								<h3 class="font-blue-dark company-section">26 Associations</h3>
								<small>Inactive: 09</small>
							</div>
							<div class="icon">
								<i class="fa fa-arrow-down font-red-haze"></i>
							</div>
						</div>
						<div class="progress-info">
							<div class="progress">
								<span style="width: 02%;" class="progress-bar progress-bar-success red-haze">
								<span class="sr-only">02% Decrease</span>
								</span>
							</div>
							<div class="status">
								<div class="status-title">
									 Decrease
								</div>
								<div class="status-number">
									 2%
								</div>
							</div>
						</div>
					</div>
				</a>
				<a class="col-lg-3 col-md-3 col-sm-6 col-xs-12 drag" href="government.php">
					<div class="dashboard-stat2">
						<div class="display">
							<div class="number">
								<h3 class="font-purple-studio company-section">07 Government</h3>
								<small>Inactive: 13</small>
							</div>
							<div class="icon">
								<i class="fa fa-arrow-up font-green-sharp"></i>
							</div>
						</div>
						<div class="progress-info">
							<div class="progress">
								<span style="width: 15%;" class="progress-bar progress-bar-success green-sharp">
								<span class="sr-only">15% change</span>
								</span>
							</div>
							<div class="status">
								<div class="status-title">
									 Increase
								</div>
								<div class="status-number">
									 15%
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
			<!-- BEGIN LIGHT TABLES -->
			<!-- BEGIN ui tree view CONTENT-->
			<div class="row">
				<div class="col-md-12 drag">
					<!-- BEGIN CHART PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-pie-chart font-red-flamingo"></i>
								<span class="caption-subject bold uppercase font-red-flamingo"> Unions</span>
							</div>
							<div class="tools">
								<div class="btn-group dropdown-user">
									<a href="" class="dropdown-header btn grey-salsa btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
									Workers<span class="fa fa-angle-down" style="margin-left: 10px">
									</span>
									</a>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="javascript:;">
											Workers
											</a>
										</li>
										<li>
											<a href="javascript:;">
											Employers 
											</a>
										</li>
										<!-- <li class="active">
											<a href="javascript:;">
											Employers <span class="label label-sm label-default">
											</span>
											</a>
										</li> -->
									</ul>
								</div>
								<a href="javascript:;" class="collapse" data-original-title="" title="">
								</a>
								<a href="javascript:;" class="reload" data-original-title="" title="">
								</a>
								<a href="javascript:;" class="fullscreen" data-original-title="" title="">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div id="site_pie_activities_loading">
								<img src="<?php echo $base;?>admin1/img/loading.gif" alt="loading"/>
							</div>
							<div id="site_pie_activities_content" class="display-none">
								<div id="site_pie_activities" style="height: 228px;">
								</div>
							</div>
							<div style="margin: 20px 0 10px 30px">
								<div class="row">
									<div class="col-md-3 col-sm-3 col-xs-6 text-stat">
										<span class="label label-sm label-danger">
										Union </span>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-6 text-stat">
										<span class="label label-sm label-primary">
										No Union </span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END CHART PORTLET-->
				</div>
			</div>
			<div class="row">
			</div>
			<!-- END LIGHT TABLES
			<!---- PIE CHARTS ROW-->
			<div class="row">
				<div class="col-md-6 drag">
					<!-- BEGIN CHART PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-pie-chart font-red-flamingo"></i>
								<span class="caption-subject bold uppercase font-red-flamingo"> First Language</span>
							</div>
							<div class="tools">
								<div class="btn-group dropdown-user">
									<a href="" class="dropdown-header btn grey-salsa btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
									Workers<span class="fa fa-angle-down" style="margin-left: 10px">
									</span>
									</a>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="javascript:;">
											Workers
											</a>
										</li>
										<li>
											<a href="javascript:;">
											Employers 
											</a>
										</li>
										<!-- <li class="active">
											<a href="javascript:;">
											Employers <span class="label label-sm label-default">
											</span>
											</a>
										</li> -->
									</ul>
								</div>
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
								<div id="pie_first" class="site_pie_activities" style="height: 228px;">
								</div>
							</div>
						</div>
					</div>
					<!-- END CHART PORTLET-->
				</div>
				<div class="col-md-6 drag">
					<!-- BEGIN CHART PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-pie-chart font-red-flamingo"></i>
								<span class="caption-subject bold uppercase font-red-flamingo"> Second Language</span>
							</div>
							<div class="tools">
								<div class="btn-group dropdown-user">
									<a href="" class="dropdown-header btn grey-salsa btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
									Workers<span class="fa fa-angle-down" style="margin-left: 10px">
									</span>
									</a>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="javascript:;">
											Workers
											</a>
										</li>
										<li>
											<a href="javascript:;">
											Employers 
											</a>
										</li>
										<!-- <li class="active">
											<a href="javascript:;">
											Employers <span class="label label-sm label-default">
											</span>
											</a>
										</li> -->
									</ul>
								</div>
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
								<div id="pie_second" class="site_pie_activities" style="height: 228px;">
								</div>
							</div>
						</div>
					</div>
					<!-- END CHART PORTLET-->
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 drag">
					<!-- BEGIN CHART PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-pie-chart font-red-flamingo"></i>
								<span class="caption-subject bold uppercase font-red-flamingo"> Age Groups</span>
							</div>
							<div class="tools">
								<div class="btn-group dropdown-user">
									<a href="" class="dropdown-header btn grey-salsa btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
									Workers<span class="fa fa-angle-down" style="margin-left: 10px">
									</span>
									</a>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="javascript:;">
											Workers
											</a>
										</li>
										<li>
											<a href="javascript:;">
											Employers 
											</a>
										</li>
										<!-- <li class="active">
											<a href="javascript:;">
											Employers <span class="label label-sm label-default">
											</span>
											</a>
										</li> -->
									</ul>
								</div>
								<a href="javascript:;" class="collapse" data-original-title="" title="">
								</a>
								<a href="javascript:;" class="reload" data-original-title="" title="">
								</a>
								<a href="javascript:;" class="fullscreen" data-original-title="" title="">
								</a>
							</div>
						</div>
						<div class="portlet-body">
								<div class="row">
									<div class="col-md-4">
										<div class="row">
											<div class="col-md-3 col-sm-3 col-xs-6 text-stat margin-top-10">
												<span class="label label-sm label-danger" style="background-color: #005CDE;">
												18-25 Years </span>
											</div>
											<div class="col-md-3 col-sm-3 col-xs-6 text-stat margin-top-10">
												<span class="label label-sm label-primary" style="background-color: #00A36A">
												25-30 Years </span>
											</div>
											<div class="col-md-3 col-sm-3 col-xs-6 text-stat margin-top-10">
												<span class="label label-sm label-primary" style="background-color: #7D0096;">
												30-35 Years </span>
											</div>
											<div class="col-md-3 col-sm-3 col-xs-6 text-stat margin-top-10">
												<span class="label label-sm label-danger" style="background-color: #992B00;">
												35-40 Years </span>
											</div>
											<div class="col-md-3 col-sm-3 col-xs-6 text-stat margin-top-10">
												<span class="label label-sm label-primary" style="background-color: #DE000F;">
												40-45 Years </span>
											</div>
											<div class="col-md-3 col-sm-3 col-xs-6 text-stat margin-top-10">
												<span class="label label-sm label-primary" style="background-color: #ED7B00;">
												45-50 Years </span>
											</div>
										</div>
									</div>
									<div class="col-md-8 margin-top-50">
										<div class="site_pie_activities_loading">
											<img src="<?php echo $base;?>admin1/img/loading.gif" alt="loading"/>
										</div>
										<div class="site_pie_activities_content" class="display-none">
											<div id="pie_third" class="site_pie_activities" style="height: 228px;">
											</div>
										</div>
									</div>
								</div>
						</div>
					</div>
					<!-- END CHART PORTLET-->
				</div>
			</div>			
			<!--- END PIE CHARTS ROW-->
			<!-- END PAGE CONTENT INNER -->
		</div>
	</div>
	<!-- END PAGE CONTENT -->
	<div id="page-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	  <div class="modal-dialog modal-lg" style="width: 100%">
	    <div class="modal-content">
	    	<div class="text-center">
	    		<h1> Print Following <button id="print-content" class="btn red-flamingo"> <i class="icon-printer"></i></button> </h1>
	    		
	    	</div>
	    	<div id="printer-modal" class="">
	    	</div>
	    </div>
	  </div>
	</div>
</div>
<?php $this->load->view('data_collection/footer_data_admin'); ?>
</body>
<!-- END BODY -->
</html>