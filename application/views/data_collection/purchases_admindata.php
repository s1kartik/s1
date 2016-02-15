<?php $this->load->view('data_collection/header_data_admin');
$str_purchase_data = "[";
$str_purchase_points = "[";
foreach( $ret_graph_purchase_points['2015'] AS $key_month => $val_month ) {
	$str_purchase_data .= '["'.$key_month.'", '.$val_month[0]['noof_purchase'].'], ';
	$str_purchase_points .= '["'.$key_month.'", '.$val_month[0]['total_points'].'], ';
}
$str_purchase_data .= "]";
$str_purchase_points .= "]";
?>
<script type="text/javascript">
var str_purchase_data = <?php echo $str_purchase_data;?>;
var str_purchase_points = <?php echo $str_purchase_points;?>;
</script>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed -->
<!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed -->
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
				<h1>Purchases<small></small></h1>
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
				<li class="active">Purchases</li>
			</ul>
			<!--- BEGIN GOLD BRONZE STATS -->
			<?php 
			// Get Total gold,silver,bronze purchases //
				$userid 			= ("1"==$this->sess_usertype) ? '' : $this->sess_userid;
				$rows_user_purchase = $this->users->getUserPurchase($userid);
				$total_gold_pkg 	= $total_silver_pkg = $total_bronze_pkg = 0;

				foreach( $rows_user_purchase AS $val_user_purchase ) {
					$total_gold_pkg 	+= (isset($val_user_purchase['total_gold_pkg'])&&$val_user_purchase['total_gold_pkg']) 
											? $val_user_purchase['total_gold_pkg'] : 0;
					$total_silver_pkg 	+= (isset($val_user_purchase['total_silver_pkg'])&&$val_user_purchase['total_silver_pkg']) 
											? $val_user_purchase['total_silver_pkg'] : 0;
					$total_bronze_pkg 	+= (isset($val_user_purchase['total_bronze_pkg'])&&$val_user_purchase['total_bronze_pkg']) 
											? $val_user_purchase['total_bronze_pkg'] : 0;
				}?>
			<div class="row">
				<div class="col-md-4 drag">
					<!-- BEGIN WIDGET THUMB -->
					<div class="widget-thumb widget-bg-color-black text-uppercase rounded-3 margin-bottom-30">
						<h4 class="widget-thumb-heading">GOLD</h4>
						<div class="widget-thumb-wrap">
							<i class="widget-thumb-icon widget-bg-color-yellow icon-layers"></i>
							<div class="widget-thumb-body">
								<span class="widget-thumb-subtitle"></span>
								<span class="counter widget-thumb-body-stat"><?php echo number_format($total_gold_pkg,0,'',',');?></span>
							</div>
						</div>
					</div>
					<!-- END WIDGET THUMB -->
				</div>
				<div class="col-md-4 drag">
					<!-- BEGIN WIDGET THUMB -->
					<div class="widget-thumb widget-bg-color-black text-uppercase rounded-3 margin-bottom-30">
						<h4 class="widget-thumb-heading">SILVER</h4>
						<div class="widget-thumb-wrap">
							<i class="widget-thumb-icon widget-bg-color-dark-light icon-layers"></i>
							<div class="widget-thumb-body">
								<span class="widget-thumb-subtitle"></span>
								<span class="counter widget-thumb-body-stat"><?php echo number_format($total_silver_pkg,0,'',',');?></span>
							</div>
						</div>
					</div>
					<!-- END WIDGET THUMB -->
				</div>
				<div class="col-md-4 drag">
					<!-- BEGIN WIDGET THUMB -->
					<div class="widget-thumb widget-bg-color-black text-uppercase rounded-3 margin-bottom-30">
						<h4 class="widget-thumb-heading">BRONZE</h4>
						<div class="widget-thumb-wrap">
							<i class="widget-thumb-icon widget-bg-color-red icon-layers"></i>
							<div class="widget-thumb-body">
								<span class="widget-thumb-subtitle"></span>
								<span class="counter widget-thumb-body-stat"><?php echo number_format($total_bronze_pkg,0,'',',');?></span>
							</div>
						</div>
					</div>
					<!-- END WIDGET THUMB -->
				</div>
			</div>
			<!---- END GOLD BRONZE STATS -->
			<!-- BEGIN DASHBOARD STATS -->
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 drag">
					<a class="dashboard-stat dashboard-stat-light green-soft" href="javascript:;">
					<div class="visual"><i class="fa fa-credit-card"></i></div>
					<?php 
					$arr_highest_points 	= $this->points->getHighestS1Points();
					$arr_highest_credits 	= $this->points->getHighestS1Credits();
					?>
					<div class="details">
						<div class="number"><?php echo $arr_highest_credits['credits']." Credits";?></div>
						<div class="desc"><?php echo $arr_highest_credits['username'];?></div>
					</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 drag">
					<a class="dashboard-stat dashboard-stat-light blue-soft" href="javascript:;">
					<div class="visual"><i class="fa fa-money"></i></div>
					<div class="details">
						<?php 
						$highest_purchase = $rows_user_purchase[0]['total_library_purchased']+$rows_user_purchase[0]['total_credits_purchased'];
						$firstname 	= isset($rows_user_purchase[0]['firstname']) ? $rows_user_purchase[0]['firstname'] : '';
						$lastname 	= isset($rows_user_purchase[0]['lastname']) ? $rows_user_purchase[0]['lastname'] : '';
						$highest_purchase_username = $firstname." ".$lastname;
						?>
						<div class="number"><?php echo "$".round($highest_purchase,2)." Purchases";?></div>
						<div class="desc"><?php echo $highest_purchase_username;?></div>
					</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 drag">
					<a class="dashboard-stat dashboard-stat-light red-flamingo" href="javascript:;">
					<div class="visual"><i class="fa fa-line-chart"></i></div>
					<div class="details">
						<div class="number"><?php echo $arr_highest_points['points']." Points";?></div>
						<div class="desc"><?php echo $arr_highest_points['username'];?></div>
					</div>
					</a>
				</div>
			</div>
			<!-- END DASHBOARD STATS -->
			
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN TABLE-->
			<div class="row">
				<div class="col-md-12  drag">
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
									<th>First Name</th>
									<th>Last Name</th>
									<th>Purchases</th>
									<th>Points</th>
									<th>Credits</th>
									<th>Industry</th>
									<th>Sector</th>
								</tr>
								</thead>
								<tbody>
								<?php
								$rows_user_purchase = $this->users->getUserPurchase();
								// common::pr($rows_user_purchase);
								foreach($rows_user_purchase AS $val_user_purchase) {
									$userid = $val_user_purchase['userid'];
									$type_id = $val_user_purchase['type_id'];
									
									$total_points 			= $this->points->getS1Points($userid, $type_id);
									$total_available_credits= $this->points->getS1Credits('',$userid);
									
									$firstname = $val_user_purchase['firstname'];
									$lastname = $val_user_purchase['lastname'];
									
									$total_library_purchased = (isset($val_user_purchase['total_library_purchased'])&&$val_user_purchase['total_library_purchased']) ? $val_user_purchase['total_library_purchased'] : 0;
									$total_credits_purchased = (isset($val_user_purchase['total_credits_purchased'])&&$val_user_purchase['total_credits_purchased']) ? $val_user_purchase['total_credits_purchased'] : 0;
									
									$industry 	= $val_user_purchase['industry'];
									$sector 	= $val_user_purchase['sector'];

									if( (($total_library_purchased+$total_credits_purchased)+$total_points+$total_available_credits)>0 ) {?>
										<tr>
											<td><?php echo $firstname;?></td>
											<td><?php echo $lastname;?></td>
											<td><span class="label label-sm label-info"><?php echo "$".($total_library_purchased+$total_credits_purchased);?><span></td>
											<td><span class="label label-sm label-danger"><?php echo $total_points;?></span></td>
											<td><span class="label label-sm label-success"><?php echo $total_available_credits;?></span></td>
											<td><?php echo $industry;?></td>
											<td><?php echo $sector;?></td>
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
			<div class="row">
				<div class="col-md-12 col-sm-12 drag">
					<!-- BEGIN PORTLET-->
					<div class="portlet light ">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-share font-red-sunglo hide"></i>
								<span class="caption-subject font-red-sunglo bold uppercase">Purchases</span>
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
										<span class="label label-sm label-primary">
										Purchases </span>
									</div>
									<div class="col-md-3 col-sm-3 col-xs-6 text-stat">
										<span class="label label-sm label-danger">
										Points </span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END PORTLET-->
				</div>
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