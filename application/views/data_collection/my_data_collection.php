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
			<div class="page-title">
				<h1>Home<small>myS1</small></h1>
			</div>
			<!-- END PAGE TITLE -->
			<!-- BEGIN PAGE TOOLBAR -->
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
					<a href="#">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Site
				</li>
			</ul>
			<!-- BEGIN DASHBOARD STATS -->
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<a class="dashboard-stat dashboard-stat-light blue-soft" href="<?php echo $base;?>admin/purchases_admindata">
					<div class="visual">
						<i class="fa fa-shopping-cart"></i>
					</div>
					<div class="details">
						<div class="number">
							 Purchases
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
					<a class="dashboard-stat dashboard-stat-light red-flamingo" href="<?php echo $base;?>admin/duediligence_admindata">
					<div class="visual">
						<i class="fa fa-search"></i>
					</div>
					<div class="details">
						<div class="number">
							 Due Diligence
						</div>
						<div class="desc">
						</div>
					</div>
					<div class="view-more-tab">
						<div class="view-more-details">
							View Statistics
							<i class="fa fa-arrow-circle-right"></i>
						</div>
					</div>
					</a>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<a class="dashboard-stat dashboard-stat-light green-soft" href="<?php echo $base;?>admin/user_admindata">
					<div class="visual">
						<i class="fa fa-users"></i>
					</div>
					<div class="details">
						<div class="number">
							 Users
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
					<a class="dashboard-stat dashboard-stat-light yellow" href="<?php echo $base;?>admin/union_admindata">
					<div class="visual">
						<i class="fa fa-line-chart"></i>
					</div>
					<div class="details">
						<div class="number">
							 Public Page Instructor
						</div>
						<div class="desc">
							/Participant Portal
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
			<!-- END PAGE CONTENT INNER -->
		</div>

		<!-- BEGIN QUICK SIDEBAR -->
		<a href="javascript:;" class="page-quick-sidebar-toggler"><i class="icon-login"></i></a>
		<!-- END QUICK SIDEBAR -->
	</div>
	<!-- END PAGE CONTENT -->
</div>
<div class="scroll-to-top">
	<i class="icon-arrow-up"></i>
</div>
<?php $this->load->view('data_collection/footer_data_admin'); ?>