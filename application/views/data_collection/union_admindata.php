<?php $this->load->view('data_collection/header_data_admin'); ?>
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
				<li class="active">Union</li>
			</ul>
			<!-- BEGIN DASHBOARD STATS -->
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 drag">
					<a class="dashboard-stat dashboard-stat-light red-flamingo"  href="javascript:void(0);">
					<div class="visual"></div>
					<div class="details"><div class="number">Union</div><div class="desc"></div></div>
					<div class="view-more-tab"><div class="view-more-details">View Page<i class="fa fa-arrow-circle-right"></i></div></div>
					</a>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 drag">
					<a class="dashboard-stat dashboard-stat-light dark-soft" href="<?php echo $base."admin/consultants?design=1";?>">
					<div class="visual">
					</div>
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
									<th>Union Name</th>
									<th>Connections</th>
									<th>Languages</th>
									<th>Advertising</th>
								</tr>
								</thead>
								<tbody>
									<?php 
									foreach( $all_unions AS $key_unions => $val_unions ) {
										$union_name = $val_unions['username'];
										$id_union 	= $val_unions['id'];
										$peo_links 	= $this->users->getMyConnectionsByUserId( 'PEOPLE',$id_union,NULL,'id,email_addr,type_id,CONCAT(firstname," ",lastname) AS username');
										$org_links	= $this->users->getMyConnectionsByUserId( 'ORGANIZATION',$id_union,NULL,'id,email_addr,type_id,CONCAT(firstname," ",lastname) AS username');				
										$total_all_connections = sizeof( array_merge($peo_links,$org_links) );
										?>
										<tr onclick="document.location='<?php echo $base."admin/union_datacollection?id=".$id_union."&design=1";?>'" style="cursor: pointer;">
											<td><?php echo $union_name;?></td>
											<td><?php echo $total_all_connections;?></td>
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
											<td>Employers</td>
											<td><span class="bold theme-font"><?php echo $total_employers_connected;?></span></td>
										</tr>
										<tr>
											<td>Workers</td>
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
							<a class="dashboard-stat dashboard-stat-light red-flamingo" href="<?php echo $base."admin/consultants?id=".$union_id;?>">
							<div class="visual"><i class="fa fa-book"></i></div>
							<div class="details">
								<div class="number">Courses</div><div class="desc"><?php echo sizeof($total_union_courses);?></div>
							</div>
							<div class="view-more-tab"><div class="view-more-details">View More<i class="fa fa-arrow-circle-right"></i></div>S</div>
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
<?php
$strDataSet = '';
foreach( $connection_languages AS $val_lang => $noof_lang ) {
	$strDataSet .= '{label: "'.$val_lang.'", data: '.$noof_lang.', color: "#00A36A"}, ';
}?>
<script type="text/javascript">var strDataSet = <?php echo "[ ".$strDataSet." ]";?>;</script>
</body>
<!-- END BODY -->
<?php $this->load->view('data_collection/footer_data_admin'); ?>