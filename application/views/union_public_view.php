<?php $this->load->view('header_admin'); ?>

<h3> UNION</h3>
<div class="union-container ">
		
		<!--------START UNION PROFILE HEAD-------->
		<div class="heading ad-heading">
			<span class="ad-tab " >
			
				<a data-toggle="modal" class="btn btn-warning" href="#ad-modal">ADVERTISING</a>
			
			</span>
			<!-- START ADVERTISING MODAL -->
			<div id="ad-modal" class="modal fade hide">
				<span data-dismiss="modal" class="remove"><i class="icon-remove icon-white"></i></span>
				<img src="<?php echo $base;?>img/ad-examples/nissan_1024x724.jpg"/>
			</div>
			<!-- END MODAL -->
			
			
	    <div class="row-fluid">	
	    	<div class="span3">
				<div class="u-img">	
					<img src="<?php echo $base;?>img/union/local183.jpg"/>
				</div>
			</div>
	    	<div class="span9">
	    		<div class="u-details">
					<h3 class="u-name">LIUNA LOCAL 183</h3>
					<h5 class="u-trade">CONSTRUCTION TRADES</h5>
					<h6 class="u-loc">ONTARIO, CANADA</h6>
	    		</div>
			</div>
	    </div>
		</div>
		<!--------END UNION PROFILE HEAD-------->
		
		
		
		<!--------START REP SEARCH-------->
		<div class="module map-search-container">
			
			
			<h5 class="title">SEARCH FOR REPS<span href="#search-map-collapse" data-toggle="collapse" class="collapse-basic collapsed pull-right"></span></h5>
		
			<!--------START SEARCH MAP-------->
		<div id="search-map-collapse" class="collapse">
			<div  class="heading ">
					<!-- NOTE: REMOVE POSITION RELATIVE FROM DIV WHEN DONE USING DUMMY MAP POINTS -->
					<div class="map-inner" style="position:relative">	
						<a href="#map-result-modal" data-toggle="modal">
							<img class="dot" style="position:absolute; top:57%; ; left:76%" src="<?php echo $base;?>img/equip/equip-dot.png"/>
						</a>
						<a href="#map-result-modal" data-toggle="modal">
							<img class="dot" style="position:absolute; top:70%; ; left:60%" src="<?php echo $base;?>img/equip/equip-dot.png"/>
						</a>
						<img src="<?php echo $base;?>img/union/ontario-map.jpg"/>					
					</div>
			</div>
		</div>
		<!--------END SEARCH MAP-------->
			<div class="search">
				 <form method="post" id="filterfrm">
					<fieldset>
						 <div class="controls controls-row ">																	   
							<select name="cmb_sector" id="cmb_sector" class="span3 selectpicker" data-style="btn-warning">
								<option value="">-Sector-</option>
								<?php 
								$sectors = $this->users->getMetaDataList('sector', 1, 'ORDER BY sector');
								foreach($sectors as $sect) {
									$selected = ($cmb_sector == $sect['id'])?'selected="selected"':'';
									?>
									<option value="<?php echo $sect['id'];?>" <?php echo $selected;?>><?php echo $sect['sector'];?></option>
								<?php 
								}?>
							</select>
							<select name="cmb_job_title" id="cmb_job_title" class="span3 selectpicker" data-style="btn-warning">
								<option value="">-Role Title-</option>
								<?php 
								$job_titles = $this->users->getMetaDataList('job_title', 1, 'ORDER BY job_title');
								foreach($job_titles as $jt) {
									$selected = ($cmb_job_title == $jt['id'])?'selected="selected"':'';
									?>
									<option value="<?php echo $jt['id'];?>" <?php echo $selected;?>><?php echo $jt['job_title'];?></option>
								<?php 
								}?>
							</select>
							<input type="text" name="txt_unionreps_text" id="txt_unionreps_text" value="<?php echo $txt_unionreps_text;?>" class="span5"  placeholder="TYPE NAME"/>
							<button class="span1 btn btn-warning"  id="btn-go" type="button" >Go!</button>
						 </div>
					</fieldset>	 
				 </form>								 
			</div>
			<div style="display:none;" id="img_data_loader" align="center"><img width="65" height="65" src="<?php echo $base."img/loading_icon.gif";?>"></div>
			<div class="results">
				<!-- AJAX Union search-->
				<?php echo "<h5>".$display_msg."</h5>";?>
			</div>
		</div>
		<!--------END REP SEARCH-------->
		
		
		<!--------START UPCOMING EVENTS, NEWS AND UPCOMING TRAINING-------->
		<div class="row-fluid">
			
			<div class="span8 module-2-3">
			<!--------START UPCOMING EVENTS-------->
				<div class="module">
					<h5  class="title">UPCOMING EVENTS</h5>
					
					<div class="module-inner">
					<div class="row-fluid">
						<div class="span7">
							<h4 class=" item-title">Monthly meeting</h4>
					</div>
						<div class="span5 u-time">
							<i class="icon-time "></i> September 24 2013
						</div>
					</div>
				
					<div class="content-margin">	
					<p>Monthly General Membership Meetings will be held on the first (1st) Sunday of every month (except where noted) and will commence at 9:00 am.</p>

					<p>Members are strongly encouraged to attend these meetings in order to remain informed about current events within the Local.</p>
				
						<a href="<?php echo $base;?>admin/union_events" class="btn btn-warning">all events</a>
					
				</div>
				</div>
				</div>
			<!--------END UPCOMING EVENTS-------->	
			<!-- START NEWS -->
				<div class="module">

					<h5  class="title">NEWS</h5>
					<div class="module-inner">
					<div class="row-fluid">
					<div class="span7">
						<h4 class="item-title">Scotiabank Offers for LIUNA Local 183 Members </h4>
					</div>
					
					<div class="span5 u-time">
						<i class="icon-time "></i> 9/6/2013 6:09 PM
					</div>
					</div>
			
					<div class="content-margin">	
					<p>As a Member of LiUNA Local 183, Scotiabank would like to offer you a series of special benefits by signing up for any of the following services offered:</p>
					
						<a href="<?php echo $base;?>admin/union_news" class="btn btn-warning">more news</a>
					
				</div>
					</div>
				</div>
			<!-- END NEWS -->
			</div>
			
			
			
			<!--------START UPCOMING TRAINING-------->
			<div class="span4 module-1-3">
				
				<h5  class="title">UPCOMING TRAINING</h5>
			
				
				<ul>
					<li class="clearfix">	
					
					
							
							<span class="btn-warning pull-left">
								<i class="sprite-welding sprite-white"></i>
							</span>
							
						
						
						<div class="training-details">
							<h5>WELDING</h5>
							<p><i class="icon-time "></i> October 30 2013</p>
						</div>
					</li>
					<li class="clearfix">	
					
					
							
							<span class="btn-warning pull-left">
								<i class="sprite-utility sprite-white"></i>
							</span>
							
						
						
						<div class="training-details">
							<h5>UTILITY</h5>
							<p><i class="icon-time "></i> October 30 2013</p>
						</div>
					</li>
					<li class="clearfix">	
	
							
							<span class="btn-warning pull-left">
								<i class="sprite-rail sprite-white"></i>
							</span>
							
						
						
						<div class="training-details">
							<h5>RAILROAD LEVEL1</h5>
							<p><i class="icon-time "></i> October 30 2013</p>
						</div>
					</li>
					<li class="clearfix">	
						<span class="btn-warning pull-left">
							<i class="sprite-rail sprite-white"></i>
						</span>
			
						<div class="training-details">
							<h5>RAILROAD LEVEL 2</h5>
							<p><i class="icon-time "></i> October 30 2013</p>
						</div>
					</li>
					<li class="clearfix">	
							<span class="btn-warning pull-left">
								<i class="sprite-rail sprite-white"></i>
							</span>

						<div class="training-details">
							<h5>RAILROAD LEVEL 3</h5>
							<p><i class="icon-time "></i> October 30 2013</p>
						</div>
					</li>
				
					<!-- buton to link to all upcoming training // Felipe 25 Oct 2013 -->
					<li class="clearfix">
						<div>
							<a class="btn btn-warning " href="<?php echo $base;?>admin/union_training">All Trainings</a>
						</div>
					</li>
					<!-- end button to link to all upcoming training -->
				</ul>
			</div>
			<!--------END UPCOMING TRAINING-------->
			
		</div>
		<!--------END UPCOMING EVENTS AND UPCOMING TRAINING-------->
</div>
<?php $this->load->view('footer_admin'); ?>
<script type="text/javascript">
	$(window).load(function(){
		
		var collapseCont = $("#search-map-collapse");
		
		collapseCont
		.collapse(1000);
		
		collapseCont
		.prev(".title")
		.find("span")
		.removeClass("collapsed")
	});

	$(document).on('click', '#btn-go', function(){
		$sector 		= $("#cmb_sector").val();
		$job_title 		= $("#cmb_job_title").val();
		$unionreps_text = $("#txt_unionreps_text").val();
		
		$("#img_data_loader").show();
		$(".results").hide();
		
		$($.post(
			'<?php echo $base;?>ajax/ajaxPublicUnion',
			{'cmb_sector':$sector, 'cmb_job_title':$job_title, 'txt_unionreps_text':$unionreps_text},
			function(data) {
				$(".results").show();
				$(".results").html(data);
				$("#img_data_loader").hide();
			})
		)
	})
</script>