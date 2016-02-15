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
				<h1>Injuries<small></small></h1>
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
					 Injuries
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN LIGHT TABLES -->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet light">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-table font-red-flamingo"></i>
								<span class="caption-subject font-red-flamingo bold uppercase">Injury Types</span>
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
								<table class="table table-hover table-light" id="sample_3">
								<thead>
									<tr class="uppercase">
										<th>
											 Type of Injuries
										</th>
										<th>
											 Counts
										</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											 Head
										</td>
										<td>
											<span class="bold theme-font">9,141</span>
										</td>
									</tr>
									<tr>
										<td>
											 Eye R
										</td>
										<td>
											<span class="bold theme-font">4,000</span>
										</td>
									</tr>
									<tr>
										<td>
											Shoulder R
										</td>
										<td>
											<span class="bold theme-font">11,417</span>
										</td>
									</tr>
									<tr>
										<td>
											 Shoulder L
										</td>
										<td>
											<span class="bold theme-font">5,198</span>
										</td>
									</tr>
									<tr>
										<td>
											 Torso
										</td>
										<td>
											<span class="bold theme-font">9,141</span>
										</td>
									</tr>
									<tr>
										<td>
											 Upper Back
										</td>
										<td>
											<span class="bold theme-font">4,000</span>
										</td>
									</tr>
									<tr>
										<td>
											Lower Back
										</td>
										<td>
											<span class="bold theme-font">11,417</span>
										</td>
									</tr>
									<tr>
										<td>
											 Elbow R
										</td>
										<td>
											<span class="bold theme-font">5,198</span>
										</td>
									</tr>
									<tr onclick="document.location = 'injuries-detail.html';" style="cursor: pointer;">
										<td>
											 Elbow L
										</td>
										<td>
											<span class="bold theme-font">9,141</span>
										</td>
									</tr>
									<tr>
										<td>
											 Hip
										</td>
										<td>
											<span class="bold theme-font">4,000</span>
										</td>
									</tr>
									<tr>
										<td>
											Thigh R
										</td>
										<td>
											<span class="bold theme-font">11,417</span>
										</td>
									</tr>
									<tr>
										<td>
											 Thigh L
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