<?php $this->load->view('header_admin'); ?>

<h3> UNION</h3>
<div class="union-container map-search-container">
		
				<h5 class="title">SEARCH FOR UNIONS<span href="#search-map-collapse" data-toggle="collapse" class="collapse-basic pull-right"></span></h5>
		
		<!--------START SEARCH MAP-------->
		<div id="search-map-collapse" class="collapse  in">
			<div  class="heading ">
					<!-- NOTE: REMOVE POSITION RELATIVE FROM DIV WHEN DONE USING DUMMY MAP POINTS -->
					<div class="map-inner" style="position:relative">	
					
					
						<a href="#map-result-modal" data-toggle="modal">
							<img class="dot description" style="position:absolute; top:57%; ; left:76%" src="<?php echo $base;?>img/equip/equip-dot.png"  data-toggle="popover" data-content="LiUna! Local 183 Couborg" data-original-title="Branch" data-placement="bottom" data-trigger="hover"/>
						</a>
						<a href="#map-result-modal" data-toggle="modal">
							<img class="dot description" style="position:absolute; top:70%; ; left:60%" src="<?php echo $base;?>img/equip/equip-dot.png"   data-toggle="popover" data-content="LiUna! Local 183 Toronto" data-original-title="Headquarter" data-placement="bottom" data-trigger="hover"/>
						</a>
						<img src="<?php echo $base;?>img/union/ontario-map.jpg"/>
					
					</div>
				
			</div>
		</div>
		<!--------END SEARCH MAP-------->
		
		
		
			<!-- START MODAL -->
				<div id="map-result-modal" class="modal fade hide">
				 <div  class="heading-item text-center clearfix large-block">
			   			<span data-dismiss="modal" class="remove"><i class="icon-remove icon-white"></i></span>
			   			<h4 class="title-light">LIUNA LOCAL 183</h4>
						<img class="union-logo" src="<?php echo $base;?>img/union/local183.jpg"/>
						<hr/>
						<div class="content-margin">
							<h6>TORONTO, ONTARIO</h6>
							<a class="btn btn-warning btn-small" href="<?php echo $base;?>admin/view_union">VISIT PROFILE</a>
							<a class="btn btn-danger btn-small" href="<?php echo $base;?>admin/view_union">REQUEST CONNECTION</a>
						</div>
			   	    </div>	
			   	</div>
			<!-- END MODAL -->
				
	
		<div class="module">
			
				
			<!--------START SEARCH FORM-------->
			<div class="search">
				 <form method="post" id="filterfrm">
					<fieldset>
						 <div class="controls controls-row ">
							<select id="cmb_industry_id" name="cmb_industry_id" class="span4 selectpicker" data-style="btn-warning">
								<option value="">-Industry-</option>
								<?php 
								$industries = $this->users->getMetaDataList('industry', 'date_start<=CURDATE() AND (date_end="" OR date_end>CURDATE())');
								foreach($industries as $in) {
									$selected = ($industry_id == $in['id'])?'selected="selected"':'';
									?>
									<option value="<?php echo $in['id'];?>" <?php echo $selected;?>><?php echo $in['industryname'];?></option>
								<?php 
								}?>
							</select>
							<input type="text" id="txt_union_text" name="txt_union_text" value="<?php echo $txt_union_text;?>" class="span5"  placeholder="SEARCH by NAME"/>
							<button class="span1 btn btn-warning" id="btn-go"  type="button" >Go!</button>
						 </div>
					</fieldset>	 
				 </form>
			</div>
			<!--------END SEARCH FORM-------->

			<!--------START SEARCH RESULST LIST-------->
				<div style="display:none;" id="img_data_loader" align="center"><img width="65" height="65" src="<?php echo $base."img/loading_icon.gif";?>"></div>
				<div class="results">
					<!-- AJAX Union search-->
					<?php echo "<h5>".$display_msg."</h5>";?>
				</div>
			<!--------END SEARCH RESULTS LIST-------->			
		</div>
</div>
<?php $this->load->view('footer_admin'); ?>

<script type="text/javascript">
	$(document).ready(function () {         
        $('.description').popover({html: true});
    });
	
	$(document).on('click', '#btn-go', function(){
		$industry_id 	= $("#cmb_industry_id").val();
		$union_text 	= $("#txt_union_text").val();
		
		$("#img_data_loader").show();
		$(".results").hide();
		
		$($.post(
			'<?php echo $base;?>ajax/ajaxSearchUnion',
			{'cmb_industry_id': $industry_id, 'txt_union_text':$union_text},
			function(data) {
				$(".results").show();
				$(".results").html(data);
				$("#img_data_loader").hide();
			})
		)
	})
</script>
