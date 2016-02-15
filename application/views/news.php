<?php $this->load->view('header_admin'); ?>
<div class="homebg">
	<div class="container">
	<div class="wrapper">
	
	<!-- START - RSS from Ministry of Labour -->
		<div name="news-feed">
			<div class="row-fluid">
				<div id="news-feed" class="span12">
					<div class="text-center header-container"><h3><?php echo $rss_heading;?></h3></div>
					<!--<div class="heading"><h3>< ?php echo $rss_heading;?>ddd</h3></div> -->
					<?php 
					//$XMLFILE = "http://news.ontario.ca/newsroom/en/rss/";
					//$TEMPLATE = "inc/body/rss/rss.php";
					//$MAXITEMS = "10";
					//include("inc/body/rss/rss2html.php");
					//$this->rssparser->feed_uri = $XMLFILE
					$this->load->view('rss.php');
					?>
				</div>
			</div>
		</div>
	<!-- END - RSS from Ministry of Labour -->
	
	
	<div class="row-fluid">
		<!-- Bottom Banner Ad -->
			<?php $this->load->view('center-leaderboard.php'); ?>    
		<!-- end bottom banner ad -->
	</div>
	</div>
</div>
</div>
<?php $this->load->view('footer_admin'); ?>