<?php 
$this->load->view('header_admin');
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8">
	<title>MyS1 Admin</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<meta content="" name="description">
	<meta content="" name="author">
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
	<link href="<?php echo $base;?>global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $base;?>global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?php echo $base;?>global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $base;?>global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
	<!-- BEGIN TABLE STYLES -->
	<link rel="stylesheet" type="text/css" href="<?php echo $base;?>global/plugins/select2/select2.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo $base;?>global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo $base;?>global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo $base;?>global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
	<!-- END TABLE STYLES -->
	<link rel="stylesheet" type="text/css" href="<?php echo $base;?>global/plugins/jstree/dist/themes/default/style.min.css"/>
	<link href="<?php echo $base;?>global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $base;?>global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $base;?>global/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo $base;?>global/plugins/morris/morris.css" rel="stylesheet" type="text/css">
	<!-- END PAGE LEVEL PLUGIN STYLES -->
	<!-- BEGIN PAGE STYLES -->
	<link href="<?php echo $base;?>admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
	<!-- END PAGE STYLES -->
	<!-- BEGIN THEME STYLES -->
	<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
	<link href="<?php echo $base;?>global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css">
	<link href="<?php echo $base;?>global/css/plugins.css" rel="stylesheet" type="text/css">
	<link href="layout.css" rel="stylesheet" type="text/css">
	<!-- <link href="<?php echo $base;?>admin/css/layout.css" rel="stylesheet" type="text/css"> -->
	<link href="<?php echo $base;?>admin/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
	<link href="<?php echo $base;?>admin/css/custom.css" rel="stylesheet" type="text/css">
	<link href="style.css" rel="stylesheet" type="text/css">
	<!-- END THEME STYLES -->
	<link rel="shortcut icon" href="favicon.ico">

</head>
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
				<h1>Union<small></small></h1>
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
				<li>
					<a href="../index.html">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Union
				</li>
			</ul>
			<!-- BEGIN DASHBOARD STATS -->
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<a class="dashboard-stat dashboard-stat-light red-flamingo" href="javascript:;">
					<div class="visual">
					</div>
					<div class="details">
						<div class="number">
							 Union
						</div>
						<div class="desc">
						</div>
					</div>
					<div class="view-more-tab">
						<div class="view-more-details">
							View Page
							<i class="fa fa-arrow-circle-right"></i>
						</div>
					</div>
					</a>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<a class="dashboard-stat dashboard-stat-light dark-soft" href="consultants.html">
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
						<div class="view-more-details">
							View Page
							<i class="fa fa-arrow-circle-right"></i>
						</div>
					</div>
					</a>
				</div>
			</div>
			<!-- END DASHBOARD STATS -->
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN TABLE-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-table font-red-flamingo"></i>
								<span class="caption-subject font-red-flamingo bold uppercase">Unions</span>
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
										 Union Name
									</th>
									<th>
										 Connections
									</th>
									<th>
										 Languages
									</th>
									<th>
										 Advertising
									</th>
								</tr>
								</thead>
								<tbody>
									<tr onclick="document.location = 'union-detail.html';" style="cursor: pointer;">
										<td>
											 Union One
										</td>
										<td>
											 4,785
										</td>
										<td>
											 4
										</td>
										<td>
											 $24,258
										</td>									
									</tr>
									<tr>
										<td>
											 Union Two
										</td>
										<td>
											 5,164
										</td>
										<td>
											 4
										</td>
										<td>
											 $29,007
										</td>									
									</tr>
									<tr>
										<td>
											 Union Three
										</td>
										<td>
											 5,186
										</td>
										<td>
											 4
										</td>
										<td>
											 $32,125
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
			<!-- BEGIN LIGHT TABLES -->
			<div class="row">
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-12">
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
						<div class="col-md-12">
							<a class="dashboard-stat dashboard-stat-light red-flamingo" href="consultants.html">
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
				<div class="col-md-8">
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
								<img src="<?php echo $base;?>admin/img/loading.gif" alt="loading"/>
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
			</div>
			<!-- END LIGHT TABLES
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
<div class="scroll-to-top">
	<i class="icon-arrow-up"></i>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS (Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?php echo $base;?>global/plugins/respond.min.js"></script>
<script src="<?php echo $base;?>global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="<?php echo $base;?>global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="<?php echo $base;?>global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<!-- <script src="<?php echo $base;?>global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script> -->
<!-- <script src="<?php echo $base;?>global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script> -->
<!-- <script src="<?php echo $base;?>global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script> -->
<!-- <script src="<?php echo $base;?>global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script> -->
<!-- <script src="<?php echo $base;?>global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script> -->
<!-- <script src="<?php echo $base;?>global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script> -->
<!-- <script src="<?php echo $base;?>global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script> -->
<script src="<?php echo $base;?>global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/flot/jquery.flot.pie.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
<script src="<?php echo $base;?>global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/plugins/jstree/dist/jstree.min.js"></script>

<script type="text/javascript" src="<?php echo $base;?>global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo $base;?>global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo $base;?>global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="<?php echo $base;?>global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="<?php echo $base;?>global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="<?php echo $base;?>global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo $base;?>admin/pages/ui-tree.js"></script>
<script src="<?php echo $base;?>global/scripts/project.js" type="text/javascript"></script>
<script src="<?php echo $base;?>admin/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo $base;?>admin/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="<?php echo $base;?>admin/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo $base;?>admin/pages/index.js" type="text/javascript"></script>
<script src="<?php echo $base;?>admin/pages/tasks.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/table-advanced.js"></script>
<script src="<?php echo $base;?>global/Jquery.print.js" type="text/javascript"></script>
<script src="<?php echo $base;?>global/html2canvas.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   project.init(); // init project core componets
   Layout.init(); // init layout
   Demo.init(); // init demo features
   QuickSidebar.init(); // init quick sidebar
   Index.init();   
   Index.initDashboardDaterange();
   Index.initJQVMAP(); // init index page's custom scripts
   Index.initCalendar(); // init index page's custom scripts
   Index.initCharts(); // init index page's custom scripts
   Index.initChat();
   Index.initMiniCharts();
   Tasks.initDashboardWidget();
   TableAdvanced.init(); 
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
<?php $this->load->view('footer_admin');?>