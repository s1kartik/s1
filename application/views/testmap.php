<?php $this->load->view('header_admin'); ?>

<h3> UNION</h3>
<div class="union-container map-search-container">
		
				<h5 class="title">SEARCH FOR UNIONS<span href="#search-map-collapse" data-toggle="collapse" class="collapse-basic pull-right"></span></h5>
		
		<!--------START SEARCH MAP-------->
		<div id="search-map-collapse" class="collapse  in">
			<div  class="heading ">
					<!-- NOTE: REMOVE POSITION RELATIVE FROM DIV WHEN DONE USING DUMMY MAP POINTS -->
					<div id="googleMap" >	
					
					
						<!--<a href="#map-result-modal" data-toggle="modal">
							<img class="dot" style="position:absolute; top:57%; ; left:76%" src="<?php echo $base;?>img/equip/equip-dot.png"/>
						</a>
						<a href="#map-result-modal" data-toggle="modal">
							<img class="dot" style="position:absolute; top:70%; ; left:60%" src="<?php echo $base;?>img/equip/equip-dot.png"/>
						</a>
						<img src="<?php echo $base;?>img/union/ontario-map.jpg"/>-->
					
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
									
								    <select class="span2 selectpicker" data-style="btn-warning">
										 <option  value="">-Industry-</option>
									</select>
									<select class="span2 selectpicker" data-style="btn-warning">
										 <option value="">-Industry-</option>
									</select>
									<select class="span2 selectpicker" data-style="btn-warning">
										 <option value="">-Industry-</option>
									</select>
									<input type="text" class="span5"  placeholder="SEARCH"/>
									<button class="span1 btn btn-warning"  type="submit" >Go!</button>
									
								 </div>
							</fieldset>	 
						 </form>
								 
			</div>
			
			<!--------END SEARCH FORM-------->
			
			<!--------START SEARCH RESULST LIST-------->
			<div class="results">
				<ul class="clearfix">
					
					
					<li>
					  
						<div class="u-img">
						<img src="<?php echo $base;?>img/union/local183.jpg"/>
						<span class="u-tag btn-inverse">UNION</span>
						</div>
							
						
							<div class="u-results-details">
								<span class="pull-right u-action">
									<a class="btn btn-mini btn-danger">Not Linked</a>
									<a class="btn btn-mini btn-warning">Visit Profile</a>
							    </span>
								
								<div class="u-name">LIUNA Local 183</div>
								<div class="u-trade"><i class="icon-wrench"></i> Construction Trades</div>
								<div class="u-loc" ><i class="icon-map-marker"></i> Ontario, Canada</div>
								
								
							</div>
							
					</li>
					<li>
					  
						<div class="u-img">
						<img src="<?php echo $base;?>img/union/local183.jpg"/>
						<span class="u-tag btn-inverse">UNION</span>
						</div>
							
						
							<div class="u-results-details">
								<span class="pull-right u-action">
									<a class="btn btn-mini btn-danger">Not Linked</a>
									<a class="btn btn-mini btn-warning">Visit Profile</a>
							    </span>
								
								<div class="u-name">LIUNA Local 183</div>
								<div class="u-trade"><i class="icon-wrench"></i> Construction Trades</div>
								<div class="u-loc" ><i class="icon-map-marker"></i> Ontario, Canada</div>
								
								
							</div>
							
					</li>
					<li>
					  
						<div class="u-img">
						<img src="<?php echo $base;?>img/union/local183.jpg"/>
						<span class="u-tag btn-inverse">UNION</span>
						</div>
							
						
							<div class="u-results-details">
								<span class="pull-right u-action">
									<a class="btn btn-mini btn-danger">Not Linked</a>
									<a class="btn btn-mini btn-warning">Visit Profile</a>
							    </span>
								
								<div class="u-name">LIUNA Local 183</div>
								<div class="u-trade"><i class="icon-wrench"></i> Construction Trades</div>
								<div class="u-loc" ><i class="icon-map-marker"></i> Ontario, Canada</div>
								
								
							</div>
							
					</li>
					<li>
					  
						<div class="u-img">
						<img src="<?php echo $base;?>img/union/local183.jpg"/>
						<span class="u-tag btn-inverse">UNION</span>
						</div>
							
						
							<div class="u-results-details">
								<span class="pull-right u-action">
									<a class="btn btn-mini btn-danger">Not Linked</a>
									<a class="btn btn-mini btn-warning">Visit Profile</a>
							    </span>
								
								<div class="u-name">LIUNA Local 183</div>
								<div class="u-trade"><i class="icon-wrench"></i> Construction Trades</div>
								<div class="u-loc" ><i class="icon-map-marker"></i> Ontario, Canada</div>
								
								
							</div>
							
					</li>
					<li>
					  
						<div class="u-img">
						<img src="<?php echo $base;?>img/union/local183.jpg"/>
						<span class="u-tag btn-inverse">UNION</span>
						</div>
							
						
							<div class="u-results-details">
								<span class="pull-right u-action">
									<a class="btn btn-mini btn-danger">Not Linked</a>
									<a class="btn btn-mini btn-warning">Visit Profile</a>
							    </span>
								
								<div class="u-name">LIUNA Local 183</div>
								<div class="u-trade"><i class="icon-wrench"></i> Construction Trades</div>
								<div class="u-loc" ><i class="icon-map-marker"></i> Ontario, Canada</div>
								
								
							</div>
							
					</li>
					
					
					
				
					
					
				
				</ul>
			
			</div>
			<!--------END SEARCH RESULTS LIST-------->
			
		</div>
		
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false">
</script> 
<script type="text/javascript">
  function initialize() {
 

   var zoom = 6;
  
   
   var myOptions = {
   			zoom: zoom,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            disableDefaultUI: true,
           
            
        };
	
	
	
    // Create the map 
    // No need to specify zoom and center as we fit the map further down.
    var map = new google.maps.Map(document.getElementById("googleMap"), myOptions);
    
    var pos = new google.maps.LatLng(43.722757 , -79.492234);
    map.setCenter(pos);
   	
   	var data = { 
 "items": [{"item_id": 27932, "item_title": "Atardecer en Embalse", "item_url": "http://www.panoramio.com/photo/27932", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/27932.jpg", "longitude": -64.404945, "latitude": -32.202924, "width": 500, "height": 375, "upload_date": "25 June 2006", "owner_id": 4483, "owner_name": "Miguel Coranti", "owner_url": "http://www.panoramio.com/user/4483"}
,
{"item_id": 522084, "item_title": "In Memoriam Antoine de Saint ExupÃ©ry", "item_url": "http://www.panoramio.com/photo/522084", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/522084.jpg", "longitude": 17.470493, "latitude": 47.867077, "width": 500, "height": 350, "upload_date": "21 January 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 1578881, "item_title": "Rosina Lamberti,Sunset,Templestowe , Victoria, Australia", "item_url": "http://www.panoramio.com/photo/1578881", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1578881.jpg", "longitude": 145.141754, "latitude": -37.766372, "width": 500, "height": 474, "upload_date": "01 April 2007", "owner_id": 140796, "owner_name": "rosina lamberti", "owner_url": "http://www.panoramio.com/user/140796"}
,
{"item_id": 97671, "item_title": "kin-dza-dza", "item_url": "http://www.panoramio.com/photo/97671", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/97671.jpg", "longitude": 30.785408, "latitude": 46.639301, "width": 500, "height": 375, "upload_date": "09 December 2006", "owner_id": 13058, "owner_name": "Kyryl", "owner_url": "http://www.panoramio.com/user/13058"}
,
{"item_id": 25514, "item_title": "Arenal", "item_url": "http://www.panoramio.com/photo/25514", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/25514.jpg", "longitude": -84.693432, "latitude": 10.479372, "width": 500, "height": 375, "upload_date": "17 June 2006", "owner_id": 4112, "owner_name": "Roberto Garcia", "owner_url": "http://www.panoramio.com/user/4112"}
,
{"item_id": 57823, "item_title": "Maria Alm", "item_url": "http://www.panoramio.com/photo/57823", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/57823.jpg", "longitude": 12.900009, "latitude": 47.409968, "width": 500, "height": 333, "upload_date": "05 October 2006", "owner_id": 8060, "owner_name": "Norbert MAIER", "owner_url": "http://www.panoramio.com/user/8060"}
,
{"item_id": 532693, "item_title": "Wheatfield in afternoon light", "item_url": "http://www.panoramio.com/photo/532693", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/532693.jpg", "longitude": 11.272659, "latitude": 59.637472, "width": 500, "height": 333, "upload_date": "22 January 2007", "owner_id": 39160, "owner_name": "Snemann", "owner_url": "http://www.panoramio.com/user/39160"}
,
{"item_id": 57819, "item_title": "Burg Hohenwerfen", "item_url": "http://www.panoramio.com/photo/57819", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/57819.jpg", "longitude": 13.189259, "latitude": 47.483221, "width": 500, "height": 333, "upload_date": "05 October 2006", "owner_id": 8060, "owner_name": "Norbert MAIER", "owner_url": "http://www.panoramio.com/user/8060"}
,
{"item_id": 1282387, "item_title": "Thunderstorm in Martinique", "item_url": "http://www.panoramio.com/photo/1282387", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1282387.jpg", "longitude": -61.013432, "latitude": 14.493688, "width": 500, "height": 400, "upload_date": "12 March 2007", "owner_id": 49870, "owner_name": "Jean-Michel Raggioli", "owner_url": "http://www.panoramio.com/user/49870"}
,
{"item_id": 945976, "item_title": "Al tard", "item_url": "http://www.panoramio.com/photo/945976", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/945976.jpg", "longitude": 0.490866, "latitude": 40.903783, "width": 335, "height": 500, "upload_date": "21 February 2007", "owner_id": 3022, "owner_name": "Arcadi", "owner_url": "http://www.panoramio.com/user/3022"}
,
{"item_id": 73514, "item_title": "Hintersee bei Ramsau", "item_url": "http://www.panoramio.com/photo/73514", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/73514.jpg", "longitude": 12.852459, "latitude": 47.609519, "width": 500, "height": 333, "upload_date": "30 October 2006", "owner_id": 8060, "owner_name": "Norbert MAIER", "owner_url": "http://www.panoramio.com/user/8060"}
,
{"item_id": 298967, "item_title": "Antelope Canyon, Ray of Light", "item_url": "http://www.panoramio.com/photo/298967", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/298967.jpg", "longitude": -111.407890, "latitude": 36.894037, "width": 500, "height": 375, "upload_date": "04 January 2007", "owner_id": 64388, "owner_name": "Artusi", "owner_url": "http://www.panoramio.com/user/64388"}
,
{"item_id": 88151, "item_title": "Val Verzasca - Switzerland", "item_url": "http://www.panoramio.com/photo/88151", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/88151.jpg", "longitude": 8.838158, "latitude": 46.257746, "width": 500, "height": 375, "upload_date": "28 November 2006", "owner_id": 11098, "owner_name": "Michele Masnata", "owner_url": "http://www.panoramio.com/user/11098"}
,
{"item_id": 6463, "item_title": "Guggenheim and spider", "item_url": "http://www.panoramio.com/photo/6463", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6463.jpg", "longitude": -2.933736, "latitude": 43.269159, "width": 500, "height": 375, "upload_date": "09 January 2006", "owner_id": 414, "owner_name": "Sonia Villegas", "owner_url": "http://www.panoramio.com/user/414"}
,
{"item_id": 107980, "item_title": "Mostar", "item_url": "http://www.panoramio.com/photo/107980", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/107980.jpg", "longitude": 17.815200, "latitude": 43.337255, "width": 369, "height": 500, "upload_date": "10 December 2006", "owner_id": 12954, "owner_name": "ZiÄ™bol", "owner_url": "http://www.panoramio.com/user/12954"}
,
{"item_id": 9439, "item_title": "Bora Bora", "item_url": "http://www.panoramio.com/photo/9439", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/9439.jpg", "longitude": -151.750000, "latitude": -16.500000, "width": 500, "height": 375, "upload_date": "02 February 2006", "owner_id": 1600, "owner_name": "heavenearth", "owner_url": "http://www.panoramio.com/user/1600"}
,
{"item_id": 673131, "item_title": "Nivane in Ã˜rsta", "item_url": "http://www.panoramio.com/photo/673131", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/673131.jpg", "longitude": 6.108742, "latitude": 62.226676, "width": 500, "height": 334, "upload_date": "03 February 2007", "owner_id": 56091, "owner_name": "Kjetil Vaage Ã˜ie", "owner_url": "http://www.panoramio.com/user/56091"}
,
{"item_id": 346269, "item_title": "italy-toscany", "item_url": "http://www.panoramio.com/photo/346269", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/346269.jpg", "longitude": 11.616282, "latitude": 43.064389, "width": 500, "height": 334, "upload_date": "08 January 2007", "owner_id": 69671, "owner_name": "illusandpics.com", "owner_url": "http://www.panoramio.com/user/69671"}
,
{"item_id": 290039, "item_title": "Gentoo Penguins at Sunrise", "item_url": "http://www.panoramio.com/photo/290039", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/290039.jpg", "longitude": -59.070311, "latitude": -52.430295, "width": 500, "height": 284, "upload_date": "03 January 2007", "owner_id": 61890, "owner_name": "enriquevidalphoto.com", "owner_url": "http://www.panoramio.com/user/61890"}
,
{"item_id": 1870141, "item_title": "Les Mines", "item_url": "http://www.panoramio.com/photo/1870141", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1870141.jpg", "longitude": 1.314712, "latitude": 45.922199, "width": 500, "height": 379, "upload_date": "21 April 2007", "owner_id": 372189, "owner_name": "PhilÂ©", "owner_url": "http://www.panoramio.com/user/372189"}
,
{"item_id": 516809, "item_title": "Az Å‘rszem", "item_url": "http://www.panoramio.com/photo/516809", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/516809.jpg", "longitude": 18.239279, "latitude": 47.535341, "width": 500, "height": 286, "upload_date": "21 January 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 67347, "item_title": "Amanecer en el Salar de Uyuni", "item_url": "http://www.panoramio.com/photo/67347", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/67347.jpg", "longitude": -67.549438, "latitude": -20.552438, "width": 500, "height": 375, "upload_date": "20 October 2006", "owner_id": 9080, "owner_name": "Marco Teodonio", "owner_url": "http://www.panoramio.com/user/9080"}
,
{"item_id": 405822, "item_title": "tulip", "item_url": "http://www.panoramio.com/photo/405822", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/405822.jpg", "longitude": 139.011619, "latitude": 37.871500, "width": 500, "height": 386, "upload_date": "13 January 2007", "owner_id": 86411, "owner_name": "ä¸­æ‘è„©-Osamu nakamura", "owner_url": "http://www.panoramio.com/user/86411"}
,
{"item_id": 233619, "item_title": "Warsaw Bridge 01 [www.wierzchon.com]", "item_url": "http://www.panoramio.com/photo/233619", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/233619.jpg", "longitude": 21.035728, "latitude": 52.242353, "width": 500, "height": 500, "upload_date": "25 December 2006", "owner_id": 47836, "owner_name": "Andrzej Wierzchon", "owner_url": "http://www.panoramio.com/user/47836"}
,
{"item_id": 1516726, "item_title": "ÐžÐ±Ð»Ð°ÐºÐ¾ Ð½Ð°Ð´ Ð²ÑƒÐ»ÐºÐ°Ð½Ð¾Ð¼ ÐšÐ°Ð¼ÐµÐ½ÑŒ. www.photo-sturm.ru", "item_url": "http://www.panoramio.com/photo/1516726", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1516726.jpg", "longitude": 160.587502, "latitude": 56.081999, "width": 414, "height": 500, "upload_date": "27 March 2007", "owner_id": 268724, "owner_name": "Korotnev AV", "owner_url": "http://www.panoramio.com/user/268724"}
,
{"item_id": 70975, "item_title": "Hospiz", "item_url": "http://www.panoramio.com/photo/70975", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/70975.jpg", "longitude": 8.024461, "latitude": 46.245801, "width": 500, "height": 500, "upload_date": "26 October 2006", "owner_id": 9379, "owner_name": "Davide Bernacchi", "owner_url": "http://www.panoramio.com/user/9379"}
,
{"item_id": 882660, "item_title": "icy_chains_1_hdr_web", "item_url": "http://www.panoramio.com/photo/882660", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/882660.jpg", "longitude": -79.798197, "latitude": 43.321353, "width": 500, "height": 333, "upload_date": "18 February 2007", "owner_id": 17488, "owner_name": "John Gillett", "owner_url": "http://www.panoramio.com/user/17488"}
,
{"item_id": 9363990, "item_title": "Marble Cave", "item_url": "http://www.panoramio.com/photo/9363990", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/9363990.jpg", "longitude": -72.607527, "latitude": -46.647138, "width": 500, "height": 375, "upload_date": "14 April 2008", "owner_id": 947917, "owner_name": "Dejah", "owner_url": "http://www.panoramio.com/user/947917"}
,
{"item_id": 1884507, "item_title": "fukushimagata", "item_url": "http://www.panoramio.com/photo/1884507", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1884507.jpg", "longitude": 139.243813, "latitude": 37.909669, "width": 500, "height": 384, "upload_date": "22 April 2007", "owner_id": 86411, "owner_name": "ä¸­æ‘è„©-Osamu nakamura", "owner_url": "http://www.panoramio.com/user/86411"}
,
{"item_id": 1343502, "item_title": "Ð²ÑƒÐ»ÐºÐ°Ð½ ÐšÐ°Ñ€Ñ‹Ð¼ÑÐºÐ¸Ð¹", "item_url": "http://www.panoramio.com/photo/1343502", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1343502.jpg", "longitude": 159.480114, "latitude": 54.025419, "width": 500, "height": 334, "upload_date": "16 March 2007", "owner_id": 268724, "owner_name": "Korotnev AV", "owner_url": "http://www.panoramio.com/user/268724"}
,
{"item_id": 97723, "item_title": "Torrent de pareis", "item_url": "http://www.panoramio.com/photo/97723", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/97723.jpg", "longitude": 2.805762, "latitude": 39.852352, "width": 401, "height": 500, "upload_date": "09 December 2006", "owner_id": 13121, "owner_name": "Andreas G.M.", "owner_url": "http://www.panoramio.com/user/13121"}
,
{"item_id": 537672, "item_title": "Sr. da Pedra", "item_url": "http://www.panoramio.com/photo/537672", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/537672.jpg", "longitude": -8.659008, "latitude": 41.068821, "width": 500, "height": 366, "upload_date": "23 January 2007", "owner_id": 115618, "owner_name": "Paulo J Moreira", "owner_url": "http://www.panoramio.com/user/115618"}
,
{"item_id": 204924, "item_title": "zaldiak", "item_url": "http://www.panoramio.com/photo/204924", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/204924.jpg", "longitude": -1.806951, "latitude": 43.245140, "width": 500, "height": 346, "upload_date": "21 December 2006", "owner_id": 2575, "owner_name": "mikel ortega", "owner_url": "http://www.panoramio.com/user/2575"}
,
{"item_id": 114795, "item_title": "TIBAUM-BIZZAR", "item_url": "http://www.panoramio.com/photo/114795", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/114795.jpg", "longitude": 7.706180, "latitude": 51.665741, "width": 334, "height": 500, "upload_date": "11 December 2006", "owner_id": 13121, "owner_name": "Andreas G.M.", "owner_url": "http://www.panoramio.com/user/13121"}
,
{"item_id": 1287881, "item_title": "Aurora borealis", "item_url": "http://www.panoramio.com/photo/1287881", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1287881.jpg", "longitude": 44.215508, "latitude": 65.829148, "width": 500, "height": 205, "upload_date": "12 March 2007", "owner_id": 75359, "owner_name": "Andrey Larin", "owner_url": "http://www.panoramio.com/user/75359"}
,
{"item_id": 1781717, "item_title": "Water Cuts Rock", "item_url": "http://www.panoramio.com/photo/1781717", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1781717.jpg", "longitude": -113.047771, "latitude": 37.312154, "width": 333, "height": 500, "upload_date": "15 April 2007", "owner_id": 376395, "owner_name": "JeffSullivan (www.MyPhotoGuides.com)", "owner_url": "http://www.panoramio.com/user/376395"}
,
{"item_id": 196103, "item_title": "albufera", "item_url": "http://www.panoramio.com/photo/196103", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/196103.jpg", "longitude": -0.323882, "latitude": 39.349166, "width": 332, "height": 500, "upload_date": "20 December 2006", "owner_id": 38804, "owner_name": "www.oscarsanchez.net", "owner_url": "http://www.panoramio.com/user/38804"}
,
{"item_id": 266224, "item_title": "Boulzojavri", "item_url": "http://www.panoramio.com/photo/266224", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/266224.jpg", "longitude": 24.373169, "latitude": 68.908534, "width": 500, "height": 334, "upload_date": "30 December 2006", "owner_id": 56091, "owner_name": "Kjetil Vaage Ã˜ie", "owner_url": "http://www.panoramio.com/user/56091"}
,
{"item_id": 6126294, "item_title": "Richmond Deer", "item_url": "http://www.panoramio.com/photo/6126294", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6126294.jpg", "longitude": -0.275195, "latitude": 51.445890, "width": 489, "height": 500, "upload_date": "25 November 2007", "owner_id": 1130880, "owner_name": "marksimms", "owner_url": "http://www.panoramio.com/user/1130880"}
,
{"item_id": 168032, "item_title": "Buci Seine - Looking Up", "item_url": "http://www.panoramio.com/photo/168032", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/168032.jpg", "longitude": 2.336990, "latitude": 48.853891, "width": 500, "height": 357, "upload_date": "16 December 2006", "owner_id": 5684, "owner_name": "Brent Townshend", "owner_url": "http://www.panoramio.com/user/5684"}
,
{"item_id": 1370932, "item_title": "Mercury Bay Sunrise", "item_url": "http://www.panoramio.com/photo/1370932", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1370932.jpg", "longitude": 175.699196, "latitude": -36.817685, "width": 500, "height": 470, "upload_date": "17 March 2007", "owner_id": 286729, "owner_name": "jimwitkowski", "owner_url": "http://www.panoramio.com/user/286729"}
,
{"item_id": 120844, "item_title": "Adelie-Prat- Kratzmaier", "item_url": "http://www.panoramio.com/photo/120844", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/120844.jpg", "longitude": -59.683228, "latitude": -62.485684, "width": 500, "height": 351, "upload_date": "12 December 2006", "owner_id": 19856, "owner_name": "Juan Kratzmaier", "owner_url": "http://www.panoramio.com/user/19856"}
,
{"item_id": 940294, "item_title": "Infrared Mediterranean Heat", "item_url": "http://www.panoramio.com/photo/940294", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/940294.jpg", "longitude": 25.376015, "latitude": 36.461537, "width": 500, "height": 332, "upload_date": "21 February 2007", "owner_id": 66847, "owner_name": "Lukas Novak", "owner_url": "http://www.panoramio.com/user/66847"}
,
{"item_id": 4446084, "item_title": "VizivarÃ¡zs", "item_url": "http://www.panoramio.com/photo/4446084", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4446084.jpg", "longitude": 17.504482, "latitude": 47.842773, "width": 367, "height": 500, "upload_date": "06 September 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 498352, "item_title": "Wave", "item_url": "http://www.panoramio.com/photo/498352", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/498352.jpg", "longitude": -112.005315, "latitude": 36.995972, "width": 500, "height": 333, "upload_date": "20 January 2007", "owner_id": 40260, "owner_name": "Don Albonico", "owner_url": "http://www.panoramio.com/user/40260"}
,
{"item_id": 775893, "item_title": "Leoparden", "item_url": "http://www.panoramio.com/photo/775893", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/775893.jpg", "longitude": 36.046829, "latitude": -3.818353, "width": 500, "height": 336, "upload_date": "11 February 2007", "owner_id": 164434, "owner_name": "Achim Mittler", "owner_url": "http://www.panoramio.com/user/164434"}
,
{"item_id": 665502, "item_title": "Sunset Beach Walker", "item_url": "http://www.panoramio.com/photo/665502", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/665502.jpg", "longitude": -124.077530, "latitude": 44.519888, "width": 500, "height": 340, "upload_date": "03 February 2007", "owner_id": 107359, "owner_name": "Ron Cooper", "owner_url": "http://www.panoramio.com/user/107359"}
,
{"item_id": 9021415, "item_title": "Wat  Suwan  Kuha  or  Wat  Tham, Phang Nga, Winner Unusual Location April 2008", "item_url": "http://www.panoramio.com/photo/9021415", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/9021415.jpg", "longitude": 98.471628, "latitude": 8.428840, "width": 500, "height": 334, "upload_date": "31 March 2008", "owner_id": 1077251, "owner_name": "picsonthemove", "owner_url": "http://www.panoramio.com/user/1077251"}
,
{"item_id": 287244, "item_title": "Landwasser-Viadukt - This is an unofficial photo point. Just follow the footpath up from the official one, until the clearing.", "item_url": "http://www.panoramio.com/photo/287244", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/287244.jpg", "longitude": 9.675007, "latitude": 46.681229, "width": 337, "height": 500, "upload_date": "03 January 2007", "owner_id": 57869, "owner_name": "NAGY Albert", "owner_url": "http://www.panoramio.com/user/57869"}
,
{"item_id": 677366, "item_title": "Oak tree in winter", "item_url": "http://www.panoramio.com/photo/677366", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/677366.jpg", "longitude": 10.771065, "latitude": 59.663926, "width": 358, "height": 500, "upload_date": "03 February 2007", "owner_id": 39160, "owner_name": "Snemann", "owner_url": "http://www.panoramio.com/user/39160"}
,
{"item_id": 196086, "item_title": "albufera", "item_url": "http://www.panoramio.com/photo/196086", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/196086.jpg", "longitude": -0.323882, "latitude": 39.349166, "width": 500, "height": 332, "upload_date": "20 December 2006", "owner_id": 38804, "owner_name": "www.oscarsanchez.net", "owner_url": "http://www.panoramio.com/user/38804"}
,
{"item_id": 4340931, "item_title": "Cold morning", "item_url": "http://www.panoramio.com/photo/4340931", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4340931.jpg", "longitude": 12.113349, "latitude": 49.342559, "width": 500, "height": 333, "upload_date": "31 August 2007", "owner_id": 696605, "owner_name": "Â© alfredschaffer", "owner_url": "http://www.panoramio.com/user/696605"}
,
{"item_id": 488, "item_title": "Lagos de Montebello, MÃ©xico", "item_url": "http://www.panoramio.com/photo/488", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/488.jpg", "longitude": -91.677904, "latitude": 16.111297, "width": 500, "height": 345, "upload_date": "31 August 2005", "owner_id": 7, "owner_name": "Eduardo ManchÃ³n", "owner_url": "http://www.panoramio.com/user/7"}
,
{"item_id": 723666, "item_title": "Majestically Still", "item_url": "http://www.panoramio.com/photo/723666", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/723666.jpg", "longitude": -116.175613, "latitude": 51.327608, "width": 500, "height": 332, "upload_date": "07 February 2007", "owner_id": 66847, "owner_name": "Lukas Novak", "owner_url": "http://www.panoramio.com/user/66847"}
,
{"item_id": 1081710, "item_title": "Gjevilvatnet lake in Oppdal", "item_url": "http://www.panoramio.com/photo/1081710", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1081710.jpg", "longitude": 9.412537, "latitude": 62.686749, "width": 500, "height": 333, "upload_date": "28 February 2007", "owner_id": 223406, "owner_name": "Sigmund Rise", "owner_url": "http://www.panoramio.com/user/223406"}
,
{"item_id": 22575, "item_title": "Lijiang River, near Yangshuo, China", "item_url": "http://www.panoramio.com/photo/22575", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/22575.jpg", "longitude": 110.454826, "latitude": 24.962716, "width": 500, "height": 333, "upload_date": "05 June 2006", "owner_id": 3557, "owner_name": "Placebo", "owner_url": "http://www.panoramio.com/user/3557"}
,
{"item_id": 2735754, "item_title": "DespuÃ©s de la lluvia", "item_url": "http://www.panoramio.com/photo/2735754", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2735754.jpg", "longitude": -73.241998, "latitude": -39.809583, "width": 360, "height": 500, "upload_date": "13 June 2007", "owner_id": 327310, "owner_name": "Erwin Woenckhaus", "owner_url": "http://www.panoramio.com/user/327310"}
,
{"item_id": 73515, "item_title": "Kloster HÃ¶glwÃ¶rth", "item_url": "http://www.panoramio.com/photo/73515", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/73515.jpg", "longitude": 12.850227, "latitude": 47.815575, "width": 500, "height": 333, "upload_date": "30 October 2006", "owner_id": 8060, "owner_name": "Norbert MAIER", "owner_url": "http://www.panoramio.com/user/8060"}
,
{"item_id": 723015, "item_title": "Cape Flattery (infrared)", "item_url": "http://www.panoramio.com/photo/723015", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/723015.jpg", "longitude": -124.726700, "latitude": 48.385898, "width": 500, "height": 332, "upload_date": "07 February 2007", "owner_id": 66847, "owner_name": "Lukas Novak", "owner_url": "http://www.panoramio.com/user/66847"}
,
{"item_id": 1288595, "item_title": "O'Keeffe ?", "item_url": "http://www.panoramio.com/photo/1288595", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1288595.jpg", "longitude": 72.920637, "latitude": 4.038162, "width": 332, "height": 500, "upload_date": "12 March 2007", "owner_id": 232099, "owner_name": "mabut", "owner_url": "http://www.panoramio.com/user/232099"}
,
{"item_id": 1008304, "item_title": "nyhavn", "item_url": "http://www.panoramio.com/photo/1008304", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1008304.jpg", "longitude": 12.591190, "latitude": 55.679762, "width": 500, "height": 333, "upload_date": "24 February 2007", "owner_id": 2659, "owner_name": "ozalph", "owner_url": "http://www.panoramio.com/user/2659"}
,
{"item_id": 19547, "item_title": "Embarcador 1", "item_url": "http://www.panoramio.com/photo/19547", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/19547.jpg", "longitude": 0.493140, "latitude": 40.904172, "width": 500, "height": 335, "upload_date": "07 May 2006", "owner_id": 3022, "owner_name": "Arcadi", "owner_url": "http://www.panoramio.com/user/3022"}
,
{"item_id": 98115, "item_title": "FREE-SPIRIT", "item_url": "http://www.panoramio.com/photo/98115", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/98115.jpg", "longitude": 9.908917, "latitude": 50.487112, "width": 500, "height": 304, "upload_date": "10 December 2006", "owner_id": 13121, "owner_name": "Andreas G.M.", "owner_url": "http://www.panoramio.com/user/13121"}
,
{"item_id": 9822056, "item_title": "Reflection under the Bridge", "item_url": "http://www.panoramio.com/photo/9822056", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/9822056.jpg", "longitude": 103.853851, "latitude": 1.286973, "width": 333, "height": 500, "upload_date": "01 May 2008", "owner_id": 1465912, "owner_name": "funtor", "owner_url": "http://www.panoramio.com/user/1465912"}
,
{"item_id": 9117094, "item_title": "Baron's Haugh, Scotland", "item_url": "http://www.panoramio.com/photo/9117094", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/9117094.jpg", "longitude": -3.986835, "latitude": 55.773532, "width": 500, "height": 337, "upload_date": "05 April 2008", "owner_id": 165346, "owner_name": "Alan Knox", "owner_url": "http://www.panoramio.com/user/165346"}
,
{"item_id": 5342534, "item_title": "Åszi pompa", "item_url": "http://www.panoramio.com/photo/5342534", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5342534.jpg", "longitude": 15.964594, "latitude": 47.875426, "width": 500, "height": 334, "upload_date": "16 October 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 2346129, "item_title": "PipacsÃ¡lom", "item_url": "http://www.panoramio.com/photo/2346129", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2346129.jpg", "longitude": 17.521820, "latitude": 47.748558, "width": 500, "height": 378, "upload_date": "22 May 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 3749005, "item_title": "Once in a Blue Moon....", "item_url": "http://www.panoramio.com/photo/3749005", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3749005.jpg", "longitude": -105.654080, "latitude": 40.294560, "width": 374, "height": 500, "upload_date": "05 August 2007", "owner_id": 87752, "owner_name": "Richard Ryer", "owner_url": "http://www.panoramio.com/user/87752"}
,
{"item_id": 1360629, "item_title": "Frente a la Cascada de Gujuli -103 m.-", "item_url": "http://www.panoramio.com/photo/1360629", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1360629.jpg", "longitude": -2.909800, "latitude": 42.976199, "width": 333, "height": 500, "upload_date": "17 March 2007", "owner_id": 129297, "owner_name": "Enrique Ortiz de ZÃ¡rate", "owner_url": "http://www.panoramio.com/user/129297"}
,
{"item_id": 6129915, "item_title": "A vadon szava", "item_url": "http://www.panoramio.com/photo/6129915", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6129915.jpg", "longitude": 17.521133, "latitude": 47.854408, "width": 500, "height": 325, "upload_date": "25 November 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 67183, "item_title": "Laguna verde e Vulcano Licancabur", "item_url": "http://www.panoramio.com/photo/67183", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/67183.jpg", "longitude": -67.819161, "latitude": -22.787696, "width": 500, "height": 370, "upload_date": "20 October 2006", "owner_id": 9080, "owner_name": "Marco Teodonio", "owner_url": "http://www.panoramio.com/user/9080"}
,
{"item_id": 507571, "item_title": "Mikor a harangszÃ³ is szebben hallik", "item_url": "http://www.panoramio.com/photo/507571", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/507571.jpg", "longitude": 17.684383, "latitude": 47.587873, "width": 396, "height": 500, "upload_date": "20 January 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 6685422, "item_title": "Dawn at Bagan, Myanmar (Burma)", "item_url": "http://www.panoramio.com/photo/6685422", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6685422.jpg", "longitude": 94.860935, "latitude": 21.169045, "width": 500, "height": 333, "upload_date": "25 December 2007", "owner_id": 1221287, "owner_name": "TS Jeung", "owner_url": "http://www.panoramio.com/user/1221287"}
,
{"item_id": 3513121, "item_title": "BÃ¡lÃ¡im", "item_url": "http://www.panoramio.com/photo/3513121", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3513121.jpg", "longitude": 17.481651, "latitude": 47.457576, "width": 419, "height": 500, "upload_date": "24 July 2007", "owner_id": 689769, "owner_name": "Ponty IstvÃ¡n", "owner_url": "http://www.panoramio.com/user/689769"}
,
{"item_id": 10574161, "item_title": "Silhouette", "item_url": "http://www.panoramio.com/photo/10574161", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/10574161.jpg", "longitude": 148.662905, "latitude": -35.304724, "width": 500, "height": 346, "upload_date": "25 May 2008", "owner_id": 766550, "owner_name": "VFedele", "owner_url": "http://www.panoramio.com/user/766550"}
,
{"item_id": 89190, "item_title": "Mount Ararat, Yerevan, Armenia", "item_url": "http://www.panoramio.com/photo/89190", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/89190.jpg", "longitude": 44.483900, "latitude": 40.195299, "width": 500, "height": 375, "upload_date": "30 November 2006", "owner_id": 11226, "owner_name": "Ardani", "owner_url": "http://www.panoramio.com/user/11226"}
,
{"item_id": 1182305, "item_title": "Dobel, Albrecht-HÃ¼tte", "item_url": "http://www.panoramio.com/photo/1182305", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1182305.jpg", "longitude": 8.500500, "latitude": 48.793465, "width": 500, "height": 375, "upload_date": "05 March 2007", "owner_id": 66229, "owner_name": "Mast", "owner_url": "http://www.panoramio.com/user/66229"}
,
{"item_id": 4258015, "item_title": "FÃ©nyÃ¶zÃ¶n", "item_url": "http://www.panoramio.com/photo/4258015", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4258015.jpg", "longitude": 16.391602, "latitude": 46.851269, "width": 333, "height": 500, "upload_date": "28 August 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 1413, "item_title": "Champlain Lookout", "item_url": "http://www.panoramio.com/photo/1413", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1413.jpg", "longitude": -75.912872, "latitude": 45.507640, "width": 500, "height": 375, "upload_date": "06 October 2005", "owner_id": 273, "owner_name": "JC", "owner_url": "http://www.panoramio.com/user/273"}
,
{"item_id": 1526763, "item_title": "Gizeh Pyramids, Cairo", "item_url": "http://www.panoramio.com/photo/1526763", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1526763.jpg", "longitude": 31.133537, "latitude": 29.966721, "width": 500, "height": 333, "upload_date": "27 March 2007", "owner_id": 59919, "owner_name": "xflo:w (http://www.xflo.net)", "owner_url": "http://www.panoramio.com/user/59919"}
,
{"item_id": 8802900, "item_title": "Martigues, miroir aux oiseaux", "item_url": "http://www.panoramio.com/photo/8802900", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/8802900.jpg", "longitude": 5.054559, "latitude": 43.405079, "width": 387, "height": 500, "upload_date": "24 March 2008", "owner_id": 629243, "owner_name": "Olivier Faugeras", "owner_url": "http://www.panoramio.com/user/629243"}
,
{"item_id": 459515, "item_title": "fire works", "item_url": "http://www.panoramio.com/photo/459515", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/459515.jpg", "longitude": 138.423271, "latitude": 38.069312, "width": 500, "height": 385, "upload_date": "16 January 2007", "owner_id": 86411, "owner_name": "ä¸­æ‘è„©-Osamu nakamura", "owner_url": "http://www.panoramio.com/user/86411"}
,
{"item_id": 749464, "item_title": "Gondola", "item_url": "http://www.panoramio.com/photo/749464", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/749464.jpg", "longitude": 12.336917, "latitude": 45.434053, "width": 500, "height": 332, "upload_date": "09 February 2007", "owner_id": 159455, "owner_name": "Â©Franco Truscello", "owner_url": "http://www.panoramio.com/user/159455"}
,
{"item_id": 422608, "item_title": "tanada", "item_url": "http://www.panoramio.com/photo/422608", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/422608.jpg", "longitude": 139.047089, "latitude": 37.449787, "width": 383, "height": 500, "upload_date": "14 January 2007", "owner_id": 86411, "owner_name": "ä¸­æ‘è„©-Osamu nakamura", "owner_url": "http://www.panoramio.com/user/86411"}
,
{"item_id": 85617, "item_title": "Parque Natural de Calblanque", "item_url": "http://www.panoramio.com/photo/85617", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/85617.jpg", "longitude": -0.739861, "latitude": 37.594104, "width": 332, "height": 500, "upload_date": "24 November 2006", "owner_id": 10969, "owner_name": "Juanra", "owner_url": "http://www.panoramio.com/user/10969"}
,
{"item_id": 1089235, "item_title": "NyÃ¡ridÃ©zÅ‘", "item_url": "http://www.panoramio.com/photo/1089235", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1089235.jpg", "longitude": 18.207092, "latitude": 47.318578, "width": 500, "height": 282, "upload_date": "28 February 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 505229, "item_title": "Etangs prÃ¨s de Dijon", "item_url": "http://www.panoramio.com/photo/505229", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/505229.jpg", "longitude": 5.168552, "latitude": 47.312642, "width": 350, "height": 500, "upload_date": "20 January 2007", "owner_id": 78506, "owner_name": "Philippe Stoop", "owner_url": "http://www.panoramio.com/user/78506"}
,
{"item_id": 679343, "item_title": "melbourne sunset over the yarra river", "item_url": "http://www.panoramio.com/photo/679343", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/679343.jpg", "longitude": 144.968119, "latitude": -37.819616, "width": 500, "height": 500, "upload_date": "04 February 2007", "owner_id": 146092, "owner_name": "sid1662", "owner_url": "http://www.panoramio.com/user/146092"}
,
{"item_id": 436336, "item_title": "myoujyousan", "item_url": "http://www.panoramio.com/photo/436336", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/436336.jpg", "longitude": 137.831554, "latitude": 36.911608, "width": 500, "height": 362, "upload_date": "15 January 2007", "owner_id": 86411, "owner_name": "ä¸­æ‘è„©-Osamu nakamura", "owner_url": "http://www.panoramio.com/user/86411"}
,
{"item_id": 9733680, "item_title": "Sydney", "item_url": "http://www.panoramio.com/photo/9733680", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/9733680.jpg", "longitude": 151.209834, "latitude": -33.848588, "width": 333, "height": 500, "upload_date": "28 April 2008", "owner_id": 1465912, "owner_name": "funtor", "owner_url": "http://www.panoramio.com/user/1465912"}
,
{"item_id": 7415625, "item_title": "NÃ« fushÃ« tÃ« PallaticesÃ«", "item_url": "http://www.panoramio.com/photo/7415625", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/7415625.jpg", "longitude": 21.077271, "latitude": 42.011550, "width": 437, "height": 500, "upload_date": "28 January 2008", "owner_id": 695042, "owner_name": "Neim Sejfuli â™¦", "owner_url": "http://www.panoramio.com/user/695042"}
,
{"item_id": 5358174, "item_title": "Morning Glory", "item_url": "http://www.panoramio.com/photo/5358174", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5358174.jpg", "longitude": -110.843537, "latitude": 44.475020, "width": 500, "height": 348, "upload_date": "16 October 2007", "owner_id": 66847, "owner_name": "Lukas Novak", "owner_url": "http://www.panoramio.com/user/66847"}
,
{"item_id": 316199, "item_title": "A lake on Gasherbrum glacier", "item_url": "http://www.panoramio.com/photo/316199", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/316199.jpg", "longitude": 76.732550, "latitude": 35.877298, "width": 500, "height": 375, "upload_date": "06 January 2007", "owner_id": 65672, "owner_name": "www.turclubmai.ru", "owner_url": "http://www.panoramio.com/user/65672"}
,
{"item_id": 400536, "item_title": "Half Dome Mtn, Yosemite Nat Park,  CA", "item_url": "http://www.panoramio.com/photo/400536", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/400536.jpg", "longitude": -119.495888, "latitude": 37.811411, "width": 500, "height": 333, "upload_date": "12 January 2007", "owner_id": 85489, "owner_name": "Bruce MacIver", "owner_url": "http://www.panoramio.com/user/85489"}
,
{"item_id": 2942693, "item_title": "Tulips and Windmills", "item_url": "http://www.panoramio.com/photo/2942693", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2942693.jpg", "longitude": 4.864798, "latitude": 52.594393, "width": 500, "height": 500, "upload_date": "25 June 2007", "owner_id": 588149, "owner_name": "Adam Salwanowicz", "owner_url": "http://www.panoramio.com/user/588149"}
,
{"item_id": 9733633, "item_title": "Oper-Sydney", "item_url": "http://www.panoramio.com/photo/9733633", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/9733633.jpg", "longitude": 151.216968, "latitude": -33.851702, "width": 500, "height": 333, "upload_date": "28 April 2008", "owner_id": 1465912, "owner_name": "funtor", "owner_url": "http://www.panoramio.com/user/1465912"}
,
{"item_id": 1800454, "item_title": "Bombay Beach, Salton Sea, CA", "item_url": "http://www.panoramio.com/photo/1800454", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1800454.jpg", "longitude": -115.729235, "latitude": 33.347316, "width": 500, "height": 407, "upload_date": "16 April 2007", "owner_id": 107613, "owner_name": "Tom Grubbe", "owner_url": "http://www.panoramio.com/user/107613"}
,
{"item_id": 2558057, "item_title": "Kin-dza-dza 2", "item_url": "http://www.panoramio.com/photo/2558057", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2558057.jpg", "longitude": 30.785751, "latitude": 46.639301, "width": 500, "height": 375, "upload_date": "03 June 2007", "owner_id": 13058, "owner_name": "Kyryl", "owner_url": "http://www.panoramio.com/user/13058"}
,
{"item_id": 7768089, "item_title": "Isteni szÃ­njÃ¡tÃ©k", "item_url": "http://www.panoramio.com/photo/7768089", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/7768089.jpg", "longitude": 17.507057, "latitude": 47.776425, "width": 500, "height": 334, "upload_date": "12 February 2008", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 1213006, "item_title": "Twilight Drive", "item_url": "http://www.panoramio.com/photo/1213006", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1213006.jpg", "longitude": -114.481916, "latitude": 51.095841, "width": 500, "height": 335, "upload_date": "07 March 2007", "owner_id": 66847, "owner_name": "Lukas Novak", "owner_url": "http://www.panoramio.com/user/66847"}
,
{"item_id": 395800, "item_title": "Pic de Bure depuis le Pic de Gleize", "item_url": "http://www.panoramio.com/photo/395800", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/395800.jpg", "longitude": 6.055870, "latitude": 44.610146, "width": 500, "height": 350, "upload_date": "12 January 2007", "owner_id": 78506, "owner_name": "Philippe Stoop", "owner_url": "http://www.panoramio.com/user/78506"}
,
{"item_id": 11073609, "item_title": "Sunrise in Koroni, by Kostas Andreopoulos", "item_url": "http://www.panoramio.com/photo/11073609", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/11073609.jpg", "longitude": 21.952747, "latitude": 36.797775, "width": 500, "height": 375, "upload_date": "09 June 2008", "owner_id": 1690483, "owner_name": "k.andre", "owner_url": "http://www.panoramio.com/user/1690483"}
,
{"item_id": 6564418, "item_title": "Baron's Haugh, Scotland", "item_url": "http://www.panoramio.com/photo/6564418", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6564418.jpg", "longitude": -3.989239, "latitude": 55.772808, "width": 500, "height": 337, "upload_date": "19 December 2007", "owner_id": 165346, "owner_name": "Alan Knox", "owner_url": "http://www.panoramio.com/user/165346"}
,
{"item_id": 10158925, "item_title": "Lluvia pÃºrpura ( Purple rain )", "item_url": "http://www.panoramio.com/photo/10158925", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/10158925.jpg", "longitude": -0.476360, "latitude": 39.612565, "width": 500, "height": 333, "upload_date": "12 May 2008", "owner_id": 787217, "owner_name": "â™£ VÃ­ctor S de Lara â™£", "owner_url": "http://www.panoramio.com/user/787217"}
,
{"item_id": 121574, "item_title": "MoscÃº/Moscow - Catedral de San Basilio", "item_url": "http://www.panoramio.com/photo/121574", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/121574.jpg", "longitude": 37.621951, "latitude": 55.753033, "width": 500, "height": 375, "upload_date": "12 December 2006", "owner_id": 17212, "owner_name": "javier herranz", "owner_url": "http://www.panoramio.com/user/17212"}
,
{"item_id": 6012915, "item_title": "Erleuchtung in Venedig", "item_url": "http://www.panoramio.com/photo/6012915", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6012915.jpg", "longitude": 12.340747, "latitude": 45.433364, "width": 500, "height": 333, "upload_date": "19 November 2007", "owner_id": 8060, "owner_name": "Norbert MAIER", "owner_url": "http://www.panoramio.com/user/8060"}
,
{"item_id": 346687, "item_title": "namibia desert", "item_url": "http://www.panoramio.com/photo/346687", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/346687.jpg", "longitude": 15.408325, "latitude": -24.729370, "width": 500, "height": 334, "upload_date": "08 January 2007", "owner_id": 69671, "owner_name": "illusandpics.com", "owner_url": "http://www.panoramio.com/user/69671"}
,
{"item_id": 1913758, "item_title": "Cortona - Via Gino Severini", "item_url": "http://www.panoramio.com/photo/1913758", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1913758.jpg", "longitude": 11.988916, "latitude": 43.273659, "width": 500, "height": 498, "upload_date": "24 April 2007", "owner_id": 193913, "owner_name": "Klesitz Piroska", "owner_url": "http://www.panoramio.com/user/193913"}
,
{"item_id": 405843, "item_title": "siroiwa", "item_url": "http://www.panoramio.com/photo/405843", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/405843.jpg", "longitude": 138.789682, "latitude": 37.726398, "width": 500, "height": 338, "upload_date": "13 January 2007", "owner_id": 86411, "owner_name": "ä¸­æ‘è„©-Osamu nakamura", "owner_url": "http://www.panoramio.com/user/86411"}
,
{"item_id": 91375, "item_title": "Burj Al Arab At Night", "item_url": "http://www.panoramio.com/photo/91375", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/91375.jpg", "longitude": 55.187416, "latitude": 25.140312, "width": 255, "height": 500, "upload_date": "03 December 2006", "owner_id": 1295, "owner_name": "Matthew Walters", "owner_url": "http://www.panoramio.com/user/1295"}
,
{"item_id": 940792, "item_title": "Moraine Branch", "item_url": "http://www.panoramio.com/photo/940792", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/940792.jpg", "longitude": -116.177502, "latitude": 51.325946, "width": 500, "height": 332, "upload_date": "21 February 2007", "owner_id": 66847, "owner_name": "Lukas Novak", "owner_url": "http://www.panoramio.com/user/66847"}
,
{"item_id": 58287, "item_title": "SchloÃŸ Anif", "item_url": "http://www.panoramio.com/photo/58287", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/58287.jpg", "longitude": 13.068817, "latitude": 47.744540, "width": 500, "height": 333, "upload_date": "07 October 2006", "owner_id": 8060, "owner_name": "Norbert MAIER", "owner_url": "http://www.panoramio.com/user/8060"}
,
{"item_id": 194118, "item_title": "Mount Fuji: Fuji-San", "item_url": "http://www.panoramio.com/photo/194118", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/194118.jpg", "longitude": 138.727455, "latitude": 35.377294, "width": 500, "height": 332, "upload_date": "20 December 2006", "owner_id": 27882, "owner_name": "taoy", "owner_url": "http://www.panoramio.com/user/27882"}
,
{"item_id": 5158892, "item_title": "prati di Tires Alto Adige SÃ¼dtirol south tyrol", "item_url": "http://www.panoramio.com/photo/5158892", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5158892.jpg", "longitude": 11.557188, "latitude": 46.471044, "width": 500, "height": 429, "upload_date": "08 October 2007", "owner_id": 578163, "owner_name": "Margherita-Italy", "owner_url": "http://www.panoramio.com/user/578163"}
,
{"item_id": 280123, "item_title": "kaouki05", "item_url": "http://www.panoramio.com/photo/280123", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/280123.jpg", "longitude": -9.799418, "latitude": 31.355662, "width": 328, "height": 500, "upload_date": "01 January 2007", "owner_id": 58867, "owner_name": "Lachaud Franck", "owner_url": "http://www.panoramio.com/user/58867"}
,
{"item_id": 6789223, "item_title": "Exploding sky", "item_url": "http://www.panoramio.com/photo/6789223", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6789223.jpg", "longitude": -69.930505, "latitude": 12.522579, "width": 500, "height": 333, "upload_date": "30 December 2007", "owner_id": 89499, "owner_name": "Michael Braxenthaler", "owner_url": "http://www.panoramio.com/user/89499"}
,
{"item_id": 3722547, "item_title": "Morning fog in the Alps", "item_url": "http://www.panoramio.com/photo/3722547", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3722547.jpg", "longitude": 10.591164, "latitude": 47.521142, "width": 500, "height": 333, "upload_date": "04 August 2007", "owner_id": 89499, "owner_name": "Michael Braxenthaler", "owner_url": "http://www.panoramio.com/user/89499"}
,
{"item_id": 9530458, "item_title": "Castillian cereal fields from Atienza walls", "item_url": "http://www.panoramio.com/photo/9530458", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/9530458.jpg", "longitude": -2.874470, "latitude": 41.198451, "width": 500, "height": 470, "upload_date": "20 April 2008", "owner_id": 134279, "owner_name": "4ullas", "owner_url": "http://www.panoramio.com/user/134279"}
,
{"item_id": 2935974, "item_title": "Atardecer tras el Anboto desde el Aitzgorri", "item_url": "http://www.panoramio.com/photo/2935974", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2935974.jpg", "longitude": -2.324982, "latitude": 42.951240, "width": 500, "height": 331, "upload_date": "25 June 2007", "owner_id": 129297, "owner_name": "Enrique Ortiz de ZÃ¡rate", "owner_url": "http://www.panoramio.com/user/129297"}
,
{"item_id": 38587, "item_title": "Blitz", "item_url": "http://www.panoramio.com/photo/38587", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/38587.jpg", "longitude": 7.949853, "latitude": 48.489947, "width": 500, "height": 375, "upload_date": "13 August 2006", "owner_id": 6002, "owner_name": "Paul Feiler", "owner_url": "http://www.panoramio.com/user/6002"}
,
{"item_id": 9312247, "item_title": "Idrija - High water after rain", "item_url": "http://www.panoramio.com/photo/9312247", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/9312247.jpg", "longitude": 13.965683, "latitude": 45.955625, "width": 500, "height": 375, "upload_date": "12 April 2008", "owner_id": 763995, "owner_name": "Samo T.", "owner_url": "http://www.panoramio.com/user/763995"}
,
{"item_id": 110409, "item_title": "Laguna de Yanganuco", "item_url": "http://www.panoramio.com/photo/110409", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/110409.jpg", "longitude": -77.640553, "latitude": -9.071585, "width": 330, "height": 500, "upload_date": "11 December 2006", "owner_id": 16323, "owner_name": "Luis Torres", "owner_url": "http://www.panoramio.com/user/16323"}
,
{"item_id": 7609439, "item_title": "FÃ©nyfÃ¼rdÅ‘", "item_url": "http://www.panoramio.com/photo/7609439", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/7609439.jpg", "longitude": 15.965366, "latitude": 47.877556, "width": 500, "height": 312, "upload_date": "05 February 2008", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 8599453, "item_title": "Realidad comprimida", "item_url": "http://www.panoramio.com/photo/8599453", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/8599453.jpg", "longitude": -2.780957, "latitude": 43.033953, "width": 500, "height": 387, "upload_date": "17 March 2008", "owner_id": 129297, "owner_name": "Enrique Ortiz de ZÃ¡rate", "owner_url": "http://www.panoramio.com/user/129297"}
,
{"item_id": 233921, "item_title": "Mount Titlis,  Engelberg,  Switzerland  www.titlis.ch  /  www.engelberg.ch/ www.berghuette.ch /www.brunnihuette.ch", "item_url": "http://www.panoramio.com/photo/233921", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/233921.jpg", "longitude": 8.410742, "latitude": 46.841583, "width": 500, "height": 375, "upload_date": "25 December 2006", "owner_id": 47930, "owner_name": "werni", "owner_url": "http://www.panoramio.com/user/47930"}
,
{"item_id": 561386, "item_title": "the country", "item_url": "http://www.panoramio.com/photo/561386", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/561386.jpg", "longitude": 138.871393, "latitude": 37.602196, "width": 500, "height": 383, "upload_date": "24 January 2007", "owner_id": 86411, "owner_name": "ä¸­æ‘è„©-Osamu nakamura", "owner_url": "http://www.panoramio.com/user/86411"}
,
{"item_id": 1195112, "item_title": "Tolar Grande", "item_url": "http://www.panoramio.com/photo/1195112", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1195112.jpg", "longitude": -67.361984, "latitude": -24.545249, "width": 500, "height": 342, "upload_date": "06 March 2007", "owner_id": 232099, "owner_name": "mabut", "owner_url": "http://www.panoramio.com/user/232099"}
,
{"item_id": 5466129, "item_title": "\"Lasciate ogne speranza, voi châ€™intrate\". (\"Abandon all hope, ye who enter here\" ; \"Toi qui entre ici, abandonne toute espÃ©rance\".) Dante e il primo girone dell'Inferno (o Virgilio nella selva oscura, accanto all'ingresso dell'Inferno) (ou encore, plus prosaÃ¯quement, pÃªche dans le Jaunay en VendÃ©e, le 21 octobre 2007 Ã  l'aube d'un trÃ¨s froid matin d'automne). #129", "item_url": "http://www.panoramio.com/photo/5466129", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5466129.jpg", "longitude": -1.901300, "latitude": 46.663398, "width": 500, "height": 281, "upload_date": "22 October 2007", "owner_id": 666755, "owner_name": "Armagnac", "owner_url": "http://www.panoramio.com/user/666755"}
,
{"item_id": 57820, "item_title": "Hallstatt 2", "item_url": "http://www.panoramio.com/photo/57820", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/57820.jpg", "longitude": 13.649054, "latitude": 47.555040, "width": 500, "height": 333, "upload_date": "05 October 2006", "owner_id": 8060, "owner_name": "Norbert MAIER", "owner_url": "http://www.panoramio.com/user/8060"}
,
{"item_id": 798312, "item_title": "Riflettendo...", "item_url": "http://www.panoramio.com/photo/798312", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/798312.jpg", "longitude": 7.677534, "latitude": 45.069925, "width": 500, "height": 332, "upload_date": "12 February 2007", "owner_id": 159455, "owner_name": "Â©Franco Truscello", "owner_url": "http://www.panoramio.com/user/159455"}
,
{"item_id": 7401432, "item_title": "07-12-18_\"Arterias del Bosque\" PIXELECTA", "item_url": "http://www.panoramio.com/photo/7401432", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/7401432.jpg", "longitude": -2.775679, "latitude": 43.005338, "width": 500, "height": 333, "upload_date": "27 January 2008", "owner_id": 163655, "owner_name": "[[[   PIXELECTA   ]]]", "owner_url": "http://www.panoramio.com/user/163655"}
,
{"item_id": 2584132, "item_title": "Farm Tomita", "item_url": "http://www.panoramio.com/photo/2584132", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2584132.jpg", "longitude": 142.426586, "latitude": 43.418889, "width": 500, "height": 375, "upload_date": "05 June 2007", "owner_id": 532882, "owner_name": "wisdomcomplex", "owner_url": "http://www.panoramio.com/user/532882"}
,
{"item_id": 4670499, "item_title": "El despertar de la naturaleza", "item_url": "http://www.panoramio.com/photo/4670499", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4670499.jpg", "longitude": -73.227739, "latitude": -39.821285, "width": 500, "height": 371, "upload_date": "15 September 2007", "owner_id": 327310, "owner_name": "Erwin Woenckhaus", "owner_url": "http://www.panoramio.com/user/327310"}
,
{"item_id": 5133875, "item_title": "Lumi Vardar", "item_url": "http://www.panoramio.com/photo/5133875", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5133875.jpg", "longitude": 21.075597, "latitude": 42.006671, "width": 500, "height": 375, "upload_date": "06 October 2007", "owner_id": 695042, "owner_name": "Neim Sejfuli â™¦", "owner_url": "http://www.panoramio.com/user/695042"}
,
{"item_id": 8309167, "item_title": "Cueva de los Verdes", "item_url": "http://www.panoramio.com/photo/8309167", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/8309167.jpg", "longitude": -13.439734, "latitude": 29.161137, "width": 333, "height": 500, "upload_date": "05 March 2008", "owner_id": 1465912, "owner_name": "funtor", "owner_url": "http://www.panoramio.com/user/1465912"}
,
{"item_id": 1756166, "item_title": "The Pantheon, Rome, Italy", "item_url": "http://www.panoramio.com/photo/1756166", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1756166.jpg", "longitude": 12.476842, "latitude": 41.898540, "width": 376, "height": 500, "upload_date": "13 April 2007", "owner_id": 140796, "owner_name": "rosina lamberti", "owner_url": "http://www.panoramio.com/user/140796"}
,
{"item_id": 1831309, "item_title": "Oak in blue - last one", "item_url": "http://www.panoramio.com/photo/1831309", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1831309.jpg", "longitude": 10.771322, "latitude": 59.664143, "width": 326, "height": 500, "upload_date": "18 April 2007", "owner_id": 39160, "owner_name": "Snemann", "owner_url": "http://www.panoramio.com/user/39160"}
,
{"item_id": 626487, "item_title": "A harag napja", "item_url": "http://www.panoramio.com/photo/626487", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/626487.jpg", "longitude": 15.919275, "latitude": 43.589468, "width": 500, "height": 333, "upload_date": "30 January 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 202162, "item_title": "Monument Valley", "item_url": "http://www.panoramio.com/photo/202162", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/202162.jpg", "longitude": -110.094552, "latitude": 36.976810, "width": 500, "height": 333, "upload_date": "21 December 2006", "owner_id": 40260, "owner_name": "Don Albonico", "owner_url": "http://www.panoramio.com/user/40260"}
,
{"item_id": 791016, "item_title": "Sossusvlei", "item_url": "http://www.panoramio.com/photo/791016", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/791016.jpg", "longitude": 15.289364, "latitude": -24.730656, "width": 500, "height": 333, "upload_date": "12 February 2007", "owner_id": 12736, "owner_name": "www.sliwi.de", "owner_url": "http://www.panoramio.com/user/12736"}
,
{"item_id": 9760518, "item_title": "Eglise Notre-Dame de la Couture", "item_url": "http://www.panoramio.com/photo/9760518", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/9760518.jpg", "longitude": 0.596437, "latitude": 49.082510, "width": 375, "height": 500, "upload_date": "29 April 2008", "owner_id": 1275480, "owner_name": "Nicolas AubÃ©", "owner_url": "http://www.panoramio.com/user/1275480"}
,
{"item_id": 2097684, "item_title": "", "item_url": "http://www.panoramio.com/photo/2097684", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2097684.jpg", "longitude": -79.793916, "latitude": 43.299447, "width": 500, "height": 333, "upload_date": "06 May 2007", "owner_id": 17488, "owner_name": "John Gillett", "owner_url": "http://www.panoramio.com/user/17488"}
,
{"item_id": 6851021, "item_title": "Lumi Vardar-Sunset", "item_url": "http://www.panoramio.com/photo/6851021", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6851021.jpg", "longitude": 21.077871, "latitude": 42.007532, "width": 458, "height": 500, "upload_date": "02 January 2008", "owner_id": 695042, "owner_name": "Neim Sejfuli â™¦", "owner_url": "http://www.panoramio.com/user/695042"}
,
{"item_id": 8137868, "item_title": "Sunset Trace at Kotchi, Korea", "item_url": "http://www.panoramio.com/photo/8137868", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/8137868.jpg", "longitude": 126.333847, "latitude": 36.498597, "width": 500, "height": 500, "upload_date": "27 February 2008", "owner_id": 1221287, "owner_name": "TS Jeung", "owner_url": "http://www.panoramio.com/user/1221287"}
,
{"item_id": 382104, "item_title": "Meteora", "item_url": "http://www.panoramio.com/photo/382104", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/382104.jpg", "longitude": 21.616974, "latitude": 39.743626, "width": 500, "height": 500, "upload_date": "11 January 2007", "owner_id": 16880, "owner_name": "evgenidinev.com", "owner_url": "http://www.panoramio.com/user/16880"}
,
{"item_id": 3399014, "item_title": "Vue du Schneibstein vers l'Est", "item_url": "http://www.panoramio.com/photo/3399014", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3399014.jpg", "longitude": 13.055191, "latitude": 47.562396, "width": 500, "height": 328, "upload_date": "19 July 2007", "owner_id": 78506, "owner_name": "Philippe Stoop", "owner_url": "http://www.panoramio.com/user/78506"}
,
{"item_id": 29596, "item_title": "Ciudad de Los Cielos", "item_url": "http://www.panoramio.com/photo/29596", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/29596.jpg", "longitude": -72.545900, "latitude": -13.165304, "width": 500, "height": 375, "upload_date": "01 July 2006", "owner_id": 4483, "owner_name": "Miguel Coranti", "owner_url": "http://www.panoramio.com/user/4483"}
,
{"item_id": 1269713, "item_title": "Rainbow over OlskÃ¥rdvatnet near Kiberg, Finnmark, Norway", "item_url": "http://www.panoramio.com/photo/1269713", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1269713.jpg", "longitude": 30.906601, "latitude": 70.295137, "width": 361, "height": 500, "upload_date": "11 March 2007", "owner_id": 66734, "owner_name": "Svein Solhaug", "owner_url": "http://www.panoramio.com/user/66734"}
,
{"item_id": 507631, "item_title": "Egy Ã¡brÃ¡ndos reggelen", "item_url": "http://www.panoramio.com/photo/507631", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/507631.jpg", "longitude": 17.466667, "latitude": 47.866667, "width": 500, "height": 334, "upload_date": "20 January 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 722974, "item_title": "Airdrie Vortex", "item_url": "http://www.panoramio.com/photo/722974", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/722974.jpg", "longitude": -114.087481, "latitude": 51.048544, "width": 500, "height": 323, "upload_date": "07 February 2007", "owner_id": 66847, "owner_name": "Lukas Novak", "owner_url": "http://www.panoramio.com/user/66847"}
,
{"item_id": 1118007, "item_title": "Moraine Lake, Banff NP (Canada)", "item_url": "http://www.panoramio.com/photo/1118007", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1118007.jpg", "longitude": -116.177673, "latitude": 51.328091, "width": 500, "height": 326, "upload_date": "02 March 2007", "owner_id": 229005, "owner_name": "mypictures4u.com", "owner_url": "http://www.panoramio.com/user/229005"}
,
{"item_id": 1343943, "item_title": "Andes Mountains.Patagonia.Argentina", "item_url": "http://www.panoramio.com/photo/1343943", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1343943.jpg", "longitude": -72.422905, "latitude": -49.381814, "width": 500, "height": 375, "upload_date": "16 March 2007", "owner_id": 281428, "owner_name": "avni_", "owner_url": "http://www.panoramio.com/user/281428"}
,
{"item_id": 5637365, "item_title": "Northen lights", "item_url": "http://www.panoramio.com/photo/5637365", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5637365.jpg", "longitude": 28.599129, "latitude": 66.247365, "width": 500, "height": 333, "upload_date": "30 October 2007", "owner_id": 897591, "owner_name": "markku pirttimaa www.karhukuusamo.com", "owner_url": "http://www.panoramio.com/user/897591"}
,
{"item_id": 241562, "item_title": "SÃ¼d-Ostisland", "item_url": "http://www.panoramio.com/photo/241562", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/241562.jpg", "longitude": -17.512207, "latitude": 63.954261, "width": 500, "height": 326, "upload_date": "26 December 2006", "owner_id": 14774, "owner_name": "Frank Block", "owner_url": "http://www.panoramio.com/user/14774"}
,
{"item_id": 48899, "item_title": "Bellagio Fountain", "item_url": "http://www.panoramio.com/photo/48899", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/48899.jpg", "longitude": -115.174227, "latitude": 36.112778, "width": 500, "height": 375, "upload_date": "16 September 2006", "owner_id": 7190, "owner_name": "Perry Tang", "owner_url": "http://www.panoramio.com/user/7190"}
,
{"item_id": 49822, "item_title": "BaÃ±os termales en Alhama de Granada", "item_url": "http://www.panoramio.com/photo/49822", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/49822.jpg", "longitude": -3.983274, "latitude": 37.018248, "width": 374, "height": 500, "upload_date": "19 September 2006", "owner_id": 5477, "owner_name": "errece", "owner_url": "http://www.panoramio.com/user/5477"}
,
{"item_id": 8248490, "item_title": "Emmerald river", "item_url": "http://www.panoramio.com/photo/8248490", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/8248490.jpg", "longitude": 13.650362, "latitude": 46.340336, "width": 375, "height": 500, "upload_date": "02 March 2008", "owner_id": 763995, "owner_name": "Samo T.", "owner_url": "http://www.panoramio.com/user/763995"}
,
{"item_id": 459528, "item_title": "gassan", "item_url": "http://www.panoramio.com/photo/459528", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/459528.jpg", "longitude": 139.895782, "latitude": 38.282391, "width": 500, "height": 379, "upload_date": "16 January 2007", "owner_id": 86411, "owner_name": "ä¸­æ‘è„©-Osamu nakamura", "owner_url": "http://www.panoramio.com/user/86411"}
,
{"item_id": 50203, "item_title": "Die HÃ¼tte in Nyidalur an einem Septembermorgen ....", "item_url": "http://www.panoramio.com/photo/50203", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/50203.jpg", "longitude": -18.132935, "latitude": 64.762124, "width": 500, "height": 299, "upload_date": "20 September 2006", "owner_id": 7434, "owner_name": "baldinger reisen ag, waedenswil/switzerland", "owner_url": "http://www.panoramio.com/user/7434"}
,
{"item_id": 51502, "item_title": "eclipse", "item_url": "http://www.panoramio.com/photo/51502", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/51502.jpg", "longitude": -0.121665, "latitude": 51.500969, "width": 500, "height": 375, "upload_date": "24 September 2006", "owner_id": 6645, "owner_name": "JesusVillalba", "owner_url": "http://www.panoramio.com/user/6645"}
,
{"item_id": 3671663, "item_title": "Urbia traspuesta de sol, desde Aizkorri", "item_url": "http://www.panoramio.com/photo/3671663", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3671663.jpg", "longitude": -2.324831, "latitude": 42.951271, "width": 500, "height": 298, "upload_date": "02 August 2007", "owner_id": 129297, "owner_name": "Enrique Ortiz de ZÃ¡rate", "owner_url": "http://www.panoramio.com/user/129297"}
,
{"item_id": 1928780, "item_title": "God is looking", "item_url": "http://www.panoramio.com/photo/1928780", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1928780.jpg", "longitude": 19.952137, "latitude": 50.106075, "width": 500, "height": 379, "upload_date": "25 April 2007", "owner_id": 12954, "owner_name": "ZiÄ™bol", "owner_url": "http://www.panoramio.com/user/12954"}
,
{"item_id": 10068109, "item_title": "#2 Steinerne BrÃ¼cke Ã¼ber Lendkanal, Stone Bridge over Lendkanal, Klagenfurt, Austria", "item_url": "http://www.panoramio.com/photo/10068109", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/10068109.jpg", "longitude": 14.284313, "latitude": 46.620436, "width": 376, "height": 500, "upload_date": "09 May 2008", "owner_id": 1077251, "owner_name": "picsonthemove", "owner_url": "http://www.panoramio.com/user/1077251"}
,
{"item_id": 8730264, "item_title": "Large wave hits the North Pier, Tynemouth - Easter 2008", "item_url": "http://www.panoramio.com/photo/8730264", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/8730264.jpg", "longitude": -1.420702, "latitude": 55.020727, "width": 434, "height": 500, "upload_date": "22 March 2008", "owner_id": 1107262, "owner_name": "bobpercy", "owner_url": "http://www.panoramio.com/user/1107262"}
,
{"item_id": 330436, "item_title": "bolivia salar-de-uyuni", "item_url": "http://www.panoramio.com/photo/330436", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/330436.jpg", "longitude": -67.876625, "latitude": -20.180046, "width": 500, "height": 334, "upload_date": "07 January 2007", "owner_id": 69671, "owner_name": "illusandpics.com", "owner_url": "http://www.panoramio.com/user/69671"}
,
{"item_id": 10287647, "item_title": "A moment of silence   * Honorable mention may contest*", "item_url": "http://www.panoramio.com/photo/10287647", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/10287647.jpg", "longitude": 6.177192, "latitude": 52.218099, "width": 500, "height": 413, "upload_date": "16 May 2008", "owner_id": 523564, "owner_name": "Luud Riphagen", "owner_url": "http://www.panoramio.com/user/523564"}
,
{"item_id": 436323, "item_title": "zeikan", "item_url": "http://www.panoramio.com/photo/436323", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/436323.jpg", "longitude": 139.057925, "latitude": 37.930016, "width": 500, "height": 381, "upload_date": "15 January 2007", "owner_id": 86411, "owner_name": "ä¸­æ‘è„©-Osamu nakamura", "owner_url": "http://www.panoramio.com/user/86411"}
,
{"item_id": 298350, "item_title": "What are you looking at ?", "item_url": "http://www.panoramio.com/photo/298350", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/298350.jpg", "longitude": -109.276510, "latitude": -27.125567, "width": 500, "height": 332, "upload_date": "04 January 2007", "owner_id": 57893, "owner_name": "ThoiryK", "owner_url": "http://www.panoramio.com/user/57893"}
,
{"item_id": 85618, "item_title": "Minas de MazarrÃ³n", "item_url": "http://www.panoramio.com/photo/85618", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/85618.jpg", "longitude": -1.331406, "latitude": 37.599544, "width": 500, "height": 334, "upload_date": "24 November 2006", "owner_id": 10969, "owner_name": "Juanra", "owner_url": "http://www.panoramio.com/user/10969"}
,
{"item_id": 3804107, "item_title": "_Feloeka on the Nile_    (Aswan - Egypt)", "item_url": "http://www.panoramio.com/photo/3804107", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3804107.jpg", "longitude": 32.887723, "latitude": 24.095443, "width": 500, "height": 350, "upload_date": "08 August 2007", "owner_id": 366746, "owner_name": "T NL", "owner_url": "http://www.panoramio.com/user/366746"}
,
{"item_id": 369885, "item_title": "Monarque on the beach", "item_url": "http://www.panoramio.com/photo/369885", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/369885.jpg", "longitude": -70.563126, "latitude": 43.308816, "width": 500, "height": 371, "upload_date": "10 January 2007", "owner_id": 78738, "owner_name": "Nicola Vachon", "owner_url": "http://www.panoramio.com/user/78738"}
,
{"item_id": 4819425, "item_title": "Zeeland Magic, 1", "item_url": "http://www.panoramio.com/photo/4819425", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4819425.jpg", "longitude": 3.479254, "latitude": 51.501169, "width": 492, "height": 500, "upload_date": "22 September 2007", "owner_id": 213866, "owner_name": "Nicolas Mertens", "owner_url": "http://www.panoramio.com/user/213866"}
,
{"item_id": 88122, "item_title": "Arpy Lake - Aosta Valley - Italy", "item_url": "http://www.panoramio.com/photo/88122", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/88122.jpg", "longitude": 6.999636, "latitude": 45.723008, "width": 375, "height": 500, "upload_date": "28 November 2006", "owner_id": 11098, "owner_name": "Michele Masnata", "owner_url": "http://www.panoramio.com/user/11098"}
,
{"item_id": 10219582, "item_title": "MITTENS ALONG THE ROAD", "item_url": "http://www.panoramio.com/photo/10219582", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/10219582.jpg", "longitude": -110.091248, "latitude": 36.970810, "width": 500, "height": 462, "upload_date": "14 May 2008", "owner_id": 864987, "owner_name": "antorenz", "owner_url": "http://www.panoramio.com/user/864987"}
,
{"item_id": 558167, "item_title": "TÃ¡ltostÃ¡nc", "item_url": "http://www.panoramio.com/photo/558167", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/558167.jpg", "longitude": 18.001614, "latitude": 47.409038, "width": 417, "height": 500, "upload_date": "24 January 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 7113068, "item_title": "BÃ¡lavÃ¡r", "item_url": "http://www.panoramio.com/photo/7113068", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/7113068.jpg", "longitude": 17.522507, "latitude": 47.775560, "width": 500, "height": 336, "upload_date": "14 January 2008", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 2920885, "item_title": "Rainbow", "item_url": "http://www.panoramio.com/photo/2920885", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2920885.jpg", "longitude": 10.620818, "latitude": 47.770960, "width": 375, "height": 500, "upload_date": "24 June 2007", "owner_id": 123698, "owner_name": "Â© Kojak", "owner_url": "http://www.panoramio.com/user/123698"}
,
{"item_id": 2499825, "item_title": "Rosina lamberti,sunset, templestowe", "item_url": "http://www.panoramio.com/photo/2499825", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2499825.jpg", "longitude": 145.143299, "latitude": -37.770104, "width": 500, "height": 359, "upload_date": "01 June 2007", "owner_id": 140796, "owner_name": "rosina lamberti", "owner_url": "http://www.panoramio.com/user/140796"}
,
{"item_id": 4536639, "item_title": "Lago di Carezza", "item_url": "http://www.panoramio.com/photo/4536639", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4536639.jpg", "longitude": 11.575298, "latitude": 46.410227, "width": 500, "height": 393, "upload_date": "09 September 2007", "owner_id": 578163, "owner_name": "Margherita-Italy", "owner_url": "http://www.panoramio.com/user/578163"}
,
{"item_id": 314957, "item_title": "\"He it is, who coming after me...\" -    St. John Baptist on the Charles Bridge ", "item_url": "http://www.panoramio.com/photo/314957", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/314957.jpg", "longitude": 14.410307, "latitude": 50.086597, "width": 335, "height": 500, "upload_date": "06 January 2007", "owner_id": 57869, "owner_name": "NAGY Albert", "owner_url": "http://www.panoramio.com/user/57869"}
,
{"item_id": 507214, "item_title": "A vÃ¡ltozÃ¡s ideje", "item_url": "http://www.panoramio.com/photo/507214", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/507214.jpg", "longitude": 17.980499, "latitude": 47.390912, "width": 500, "height": 335, "upload_date": "20 January 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 5551561, "item_title": "New light old trees26-10-2007", "item_url": "http://www.panoramio.com/photo/5551561", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5551561.jpg", "longitude": -5.663366, "latitude": 55.390130, "width": 338, "height": 500, "upload_date": "26 October 2007", "owner_id": 599676, "owner_name": "mossip", "owner_url": "http://www.panoramio.com/user/599676"}
,
{"item_id": 67338, "item_title": "Salar de Uyuni", "item_url": "http://www.panoramio.com/photo/67338", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/67338.jpg", "longitude": -67.539825, "latitude": -20.439882, "width": 375, "height": 500, "upload_date": "20 October 2006", "owner_id": 9080, "owner_name": "Marco Teodonio", "owner_url": "http://www.panoramio.com/user/9080"}
,
{"item_id": 436354, "item_title": "oonogame", "item_url": "http://www.panoramio.com/photo/436354", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/436354.jpg", "longitude": 138.461380, "latitude": 38.311760, "width": 387, "height": 500, "upload_date": "15 January 2007", "owner_id": 86411, "owner_name": "ä¸­æ‘è„©-Osamu nakamura", "owner_url": "http://www.panoramio.com/user/86411"}
,
{"item_id": 10068358, "item_title": "#08 Reflections in Lendkanal, Klagenfurt, Scenery June 2008", "item_url": "http://www.panoramio.com/photo/10068358", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/10068358.jpg", "longitude": 14.294415, "latitude": 46.622326, "width": 375, "height": 500, "upload_date": "09 May 2008", "owner_id": 1077251, "owner_name": "picsonthemove", "owner_url": "http://www.panoramio.com/user/1077251"}
,
{"item_id": 1440137, "item_title": "Horseshoe Bend", "item_url": "http://www.panoramio.com/photo/1440137", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1440137.jpg", "longitude": -111.510887, "latitude": 36.882641, "width": 500, "height": 391, "upload_date": "22 March 2007", "owner_id": 286729, "owner_name": "jimwitkowski", "owner_url": "http://www.panoramio.com/user/286729"}
,
{"item_id": 4809439, "item_title": "Going Nowhere Fast", "item_url": "http://www.panoramio.com/photo/4809439", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4809439.jpg", "longitude": -119.013970, "latitude": 38.211420, "width": 375, "height": 500, "upload_date": "21 September 2007", "owner_id": 376395, "owner_name": "JeffSullivan (www.MyPhotoGuides.com)", "owner_url": "http://www.panoramio.com/user/376395"}
,
{"item_id": 7806281, "item_title": "Moon&Mosque", "item_url": "http://www.panoramio.com/photo/7806281", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/7806281.jpg", "longitude": 21.138296, "latitude": 41.960958, "width": 500, "height": 344, "upload_date": "13 February 2008", "owner_id": 695042, "owner_name": "Neim Sejfuli â™¦", "owner_url": "http://www.panoramio.com/user/695042"}
,
{"item_id": 821388, "item_title": "Aurora Borealis with frosty fog from the sea in front", "item_url": "http://www.panoramio.com/photo/821388", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/821388.jpg", "longitude": 23.229733, "latitude": 69.962616, "width": 500, "height": 256, "upload_date": "14 February 2007", "owner_id": 56091, "owner_name": "Kjetil Vaage Ã˜ie", "owner_url": "http://www.panoramio.com/user/56091"}
,
{"item_id": 946841, "item_title": "Maroon Bells", "item_url": "http://www.panoramio.com/photo/946841", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/946841.jpg", "longitude": -106.948385, "latitude": 39.095030, "width": 500, "height": 375, "upload_date": "21 February 2007", "owner_id": 163881, "owner_name": "faisasy", "owner_url": "http://www.panoramio.com/user/163881"}
,
{"item_id": 3719882, "item_title": "Puesta de Sol(Oest.Portugal)", "item_url": "http://www.panoramio.com/photo/3719882", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3719882.jpg", "longitude": -9.286709, "latitude": 39.392428, "width": 375, "height": 500, "upload_date": "04 August 2007", "owner_id": 83865, "owner_name": "Epi F.Villanueva", "owner_url": "http://www.panoramio.com/user/83865"}
,
{"item_id": 3418114, "item_title": "FÃ©ny-KÃ©p", "item_url": "http://www.panoramio.com/photo/3418114", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3418114.jpg", "longitude": 17.511692, "latitude": 47.837127, "width": 500, "height": 333, "upload_date": "20 July 2007", "owner_id": 689769, "owner_name": "Ponty IstvÃ¡n", "owner_url": "http://www.panoramio.com/user/689769"}
,
{"item_id": 255257, "item_title": "Croatia, Brela - Sunset on the Beach - near  \"Kamen Brela\" rock, symbol of this adriatic town", "item_url": "http://www.panoramio.com/photo/255257", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/255257.jpg", "longitude": 16.922604, "latitude": 43.372309, "width": 500, "height": 332, "upload_date": "28 December 2006", "owner_id": 52119, "owner_name": "RomanV", "owner_url": "http://www.panoramio.com/user/52119"}
,
{"item_id": 2346040, "item_title": "Huncut fÃ©nyek", "item_url": "http://www.panoramio.com/photo/2346040", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2346040.jpg", "longitude": 15.539217, "latitude": 47.670589, "width": 500, "height": 334, "upload_date": "22 May 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 1235900, "item_title": "Fog, Hemlocks and Cedars ", "item_url": "http://www.panoramio.com/photo/1235900", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1235900.jpg", "longitude": -131.682816, "latitude": 52.885706, "width": 500, "height": 352, "upload_date": "09 March 2007", "owner_id": 232099, "owner_name": "mabut", "owner_url": "http://www.panoramio.com/user/232099"}
,
{"item_id": 111554, "item_title": "Lahna", "item_url": "http://www.panoramio.com/photo/111554", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/111554.jpg", "longitude": 27.557831, "latitude": 42.550551, "width": 500, "height": 357, "upload_date": "11 December 2006", "owner_id": 16880, "owner_name": "evgenidinev.com", "owner_url": "http://www.panoramio.com/user/16880"}
,
{"item_id": 280112, "item_title": "dune02", "item_url": "http://www.panoramio.com/photo/280112", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/280112.jpg", "longitude": -3.985291, "latitude": 31.156408, "width": 500, "height": 338, "upload_date": "01 January 2007", "owner_id": 58867, "owner_name": "Lachaud Franck", "owner_url": "http://www.panoramio.com/user/58867"}
,
{"item_id": 5984, "item_title": "Chott El Jerid", "item_url": "http://www.panoramio.com/photo/5984", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5984.jpg", "longitude": 8.358536, "latitude": 33.715202, "width": 347, "height": 500, "upload_date": "17 December 2005", "owner_id": 989, "owner_name": "Mrgud", "owner_url": "http://www.panoramio.com/user/989"}
,
{"item_id": 25513, "item_title": "Catarata Rio Celeste", "item_url": "http://www.panoramio.com/photo/25513", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/25513.jpg", "longitude": -85.046539, "latitude": 10.643400, "width": 375, "height": 500, "upload_date": "17 June 2006", "owner_id": 4112, "owner_name": "Roberto Garcia", "owner_url": "http://www.panoramio.com/user/4112"}
,
{"item_id": 35502, "item_title": "roques", "item_url": "http://www.panoramio.com/photo/35502", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/35502.jpg", "longitude": -66.774902, "latitude": 11.802834, "width": 500, "height": 375, "upload_date": "29 July 2006", "owner_id": 3360, "owner_name": "ozzy", "owner_url": "http://www.panoramio.com/user/3360"}
,
{"item_id": 1656020, "item_title": "Palmeras", "item_url": "http://www.panoramio.com/photo/1656020", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1656020.jpg", "longitude": -1.211929, "latitude": 37.935804, "width": 500, "height": 333, "upload_date": "06 April 2007", "owner_id": 10969, "owner_name": "Juanra", "owner_url": "http://www.panoramio.com/user/10969"}
,
{"item_id": 58341, "item_title": "Lio Piccolo - Palazzetto BoldÃº", "item_url": "http://www.panoramio.com/photo/58341", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/58341.jpg", "longitude": 12.489095, "latitude": 45.490615, "width": 500, "height": 333, "upload_date": "07 October 2006", "owner_id": 8060, "owner_name": "Norbert MAIER", "owner_url": "http://www.panoramio.com/user/8060"}
,
{"item_id": 416310, "item_title": "Lake of Glass Falls", "item_url": "http://www.panoramio.com/photo/416310", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/416310.jpg", "longitude": -105.664272, "latitude": 40.283192, "width": 500, "height": 374, "upload_date": "13 January 2007", "owner_id": 87752, "owner_name": "Richard Ryer", "owner_url": "http://www.panoramio.com/user/87752"}
,
{"item_id": 8148031, "item_title": "Der Morgen in der Camargue .....", "item_url": "http://www.panoramio.com/photo/8148031", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/8148031.jpg", "longitude": 4.451180, "latitude": 43.507102, "width": 500, "height": 351, "upload_date": "27 February 2008", "owner_id": 7434, "owner_name": "baldinger reisen ag, waedenswil/switzerland", "owner_url": "http://www.panoramio.com/user/7434"}
,
{"item_id": 1088575, "item_title": "Lampion", "item_url": "http://www.panoramio.com/photo/1088575", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1088575.jpg", "longitude": 17.698631, "latitude": 47.521374, "width": 500, "height": 397, "upload_date": "28 February 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 771169, "item_title": "Bloodred evening sky, near Zutphen", "item_url": "http://www.panoramio.com/photo/771169", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/771169.jpg", "longitude": 6.110770, "latitude": 52.113681, "width": 500, "height": 500, "upload_date": "11 February 2007", "owner_id": 161254, "owner_name": "fotoartistry", "owner_url": "http://www.panoramio.com/user/161254"}
,
{"item_id": 2334149, "item_title": "", "item_url": "http://www.panoramio.com/photo/2334149", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2334149.jpg", "longitude": 0.493269, "latitude": 40.904204, "width": 500, "height": 304, "upload_date": "21 May 2007", "owner_id": 3022, "owner_name": "Arcadi", "owner_url": "http://www.panoramio.com/user/3022"}
,
{"item_id": 41688, "item_title": "Unbelieveable sunrise colors at Lofoten", "item_url": "http://www.panoramio.com/photo/41688", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/41688.jpg", "longitude": 14.256134, "latitude": 68.239368, "width": 500, "height": 375, "upload_date": "26 August 2006", "owner_id": 3404, "owner_name": "Csongor BÃ¶rÃ¶czky", "owner_url": "http://www.panoramio.com/user/3404"}
,
{"item_id": 6953, "item_title": "Last moment of the day", "item_url": "http://www.panoramio.com/photo/6953", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6953.jpg", "longitude": 2.191944, "latitude": 41.578599, "width": 500, "height": 320, "upload_date": "16 January 2006", "owner_id": 414, "owner_name": "Sonia Villegas", "owner_url": "http://www.panoramio.com/user/414"}
,
{"item_id": 10895432, "item_title": "ÐšÐ°Ñ€Ð°Ð³Ð°Ð¹ÑÐºÐ°Ñ ÑÐ¾ÑÐ½Ð°", "item_url": "http://www.panoramio.com/photo/10895432", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/10895432.jpg", "longitude": 57.886791, "latitude": 51.644708, "width": 333, "height": 500, "upload_date": "04 June 2008", "owner_id": 904057, "owner_name": "Ð‘.Ð¯Ñ€Ñ†ÐµÐ²", "owner_url": "http://www.panoramio.com/user/904057"}
,
{"item_id": 1446812, "item_title": "Elfland", "item_url": "http://www.panoramio.com/photo/1446812", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1446812.jpg", "longitude": 17.808323, "latitude": 47.349408, "width": 345, "height": 500, "upload_date": "22 March 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 4898495, "item_title": "Elfendel", "item_url": "http://www.panoramio.com/photo/4898495", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4898495.jpg", "longitude": 17.724380, "latitude": 47.261058, "width": 500, "height": 325, "upload_date": "25 September 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 911298, "item_title": "View from NordenskiÃ¶ldtoppen, Svalbard", "item_url": "http://www.panoramio.com/photo/911298", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/911298.jpg", "longitude": 15.314941, "latitude": 78.179588, "width": 500, "height": 287, "upload_date": "20 February 2007", "owner_id": 66734, "owner_name": "Svein Solhaug", "owner_url": "http://www.panoramio.com/user/66734"}
,
{"item_id": 2169236, "item_title": "sunset", "item_url": "http://www.panoramio.com/photo/2169236", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2169236.jpg", "longitude": 145.128708, "latitude": -37.759859, "width": 333, "height": 500, "upload_date": "11 May 2007", "owner_id": 140796, "owner_name": "rosina lamberti", "owner_url": "http://www.panoramio.com/user/140796"}
,
{"item_id": 237466, "item_title": "wierzchon.com warsaw podzamcze", "item_url": "http://www.panoramio.com/photo/237466", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/237466.jpg", "longitude": 21.011347, "latitude": 52.253852, "width": 335, "height": 500, "upload_date": "26 December 2006", "owner_id": 47836, "owner_name": "Andrzej Wierzchon", "owner_url": "http://www.panoramio.com/user/47836"}
,
{"item_id": 355519, "item_title": "chile laguna miscanti", "item_url": "http://www.panoramio.com/photo/355519", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/355519.jpg", "longitude": -67.798347, "latitude": -23.758010, "width": 500, "height": 334, "upload_date": "09 January 2007", "owner_id": 69671, "owner_name": "illusandpics.com", "owner_url": "http://www.panoramio.com/user/69671"}
,
{"item_id": 58360, "item_title": "Castello di Toblino", "item_url": "http://www.panoramio.com/photo/58360", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/58360.jpg", "longitude": 10.966415, "latitude": 46.054173, "width": 500, "height": 333, "upload_date": "07 October 2006", "owner_id": 8060, "owner_name": "Norbert MAIER", "owner_url": "http://www.panoramio.com/user/8060"}
,
{"item_id": 10511168, "item_title": "NÃ« Fush tÃ« PallaticÃ«s", "item_url": "http://www.panoramio.com/photo/10511168", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/10511168.jpg", "longitude": 21.075296, "latitude": 42.007692, "width": 500, "height": 413, "upload_date": "23 May 2008", "owner_id": 695042, "owner_name": "Neim Sejfuli â™¦", "owner_url": "http://www.panoramio.com/user/695042"}
,
{"item_id": 572526, "item_title": "Farm by Osafjorden in the first sun of the day", "item_url": "http://www.panoramio.com/photo/572526", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/572526.jpg", "longitude": 6.998119, "latitude": 60.563101, "width": 500, "height": 353, "upload_date": "25 January 2007", "owner_id": 39160, "owner_name": "Snemann", "owner_url": "http://www.panoramio.com/user/39160"}
,
{"item_id": 5303687, "item_title": "FÃ¡tyoltÃ¡nc", "item_url": "http://www.panoramio.com/photo/5303687", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5303687.jpg", "longitude": 15.934725, "latitude": 47.915997, "width": 500, "height": 334, "upload_date": "14 October 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 370324, "item_title": "Rainbow_by_bkm", "item_url": "http://www.panoramio.com/photo/370324", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/370324.jpg", "longitude": 6.453094, "latitude": 62.636926, "width": 500, "height": 344, "upload_date": "10 January 2007", "owner_id": 78923, "owner_name": "bj00rn", "owner_url": "http://www.panoramio.com/user/78923"}
,
{"item_id": 7996369, "item_title": "Bled - Church on the island", "item_url": "http://www.panoramio.com/photo/7996369", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/7996369.jpg", "longitude": 14.084473, "latitude": 46.360671, "width": 375, "height": 500, "upload_date": "21 February 2008", "owner_id": 763995, "owner_name": "Samo T.", "owner_url": "http://www.panoramio.com/user/763995"}
,
{"item_id": 498385, "item_title": "Rainbow Falls in Sun", "item_url": "http://www.panoramio.com/photo/498385", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/498385.jpg", "longitude": -119.084823, "latitude": 37.601771, "width": 407, "height": 500, "upload_date": "20 January 2007", "owner_id": 107613, "owner_name": "Tom Grubbe", "owner_url": "http://www.panoramio.com/user/107613"}
,
{"item_id": 571110, "item_title": "Nordlys - Aurora Borealis - over VadsÃ¸", "item_url": "http://www.panoramio.com/photo/571110", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/571110.jpg", "longitude": 29.815350, "latitude": 70.075649, "width": 500, "height": 332, "upload_date": "25 January 2007", "owner_id": 121482, "owner_name": "Jens Gressmyr", "owner_url": "http://www.panoramio.com/user/121482"}
,
{"item_id": 3904502, "item_title": "Una notte di fuoco - a night of fire ", "item_url": "http://www.panoramio.com/photo/3904502", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3904502.jpg", "longitude": 11.337290, "latitude": 46.461257, "width": 500, "height": 360, "upload_date": "13 August 2007", "owner_id": 578163, "owner_name": "Margherita-Italy", "owner_url": "http://www.panoramio.com/user/578163"}
,
{"item_id": 1835001, "item_title": "Ð’ÑƒÐ»ÐºÐ°Ð½ Ð–ÑƒÐ¿Ð°Ð½Ð¾Ð²ÑÐºÐ¸Ð¹. Ð Ð°ÑÑÐ²ÐµÑ‚", "item_url": "http://www.panoramio.com/photo/1835001", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1835001.jpg", "longitude": 158.595543, "latitude": 53.496828, "width": 500, "height": 341, "upload_date": "19 April 2007", "owner_id": 268724, "owner_name": "Korotnev AV", "owner_url": "http://www.panoramio.com/user/268724"}
,
{"item_id": 91931, "item_title": "Plitvice (Croacia)", "item_url": "http://www.panoramio.com/photo/91931", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/91931.jpg", "longitude": 15.599556, "latitude": 44.851975, "width": 500, "height": 375, "upload_date": "04 December 2006", "owner_id": 11403, "owner_name": "ArnÃ¡iz", "owner_url": "http://www.panoramio.com/user/11403"}
,
{"item_id": 515905, "item_title": "A figyelÅ‘", "item_url": "http://www.panoramio.com/photo/515905", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/515905.jpg", "longitude": 17.625675, "latitude": 47.565060, "width": 500, "height": 345, "upload_date": "21 January 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 7444056, "item_title": "RagyogÃ¡s II.", "item_url": "http://www.panoramio.com/photo/7444056", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/7444056.jpg", "longitude": 16.385422, "latitude": 46.850095, "width": 333, "height": 500, "upload_date": "29 January 2008", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 1674082, "item_title": "STATUA LIBERTA'", "item_url": "http://www.panoramio.com/photo/1674082", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1674082.jpg", "longitude": -74.042444, "latitude": 40.689229, "width": 500, "height": 375, "upload_date": "07 April 2007", "owner_id": 135078, "owner_name": "Fabio Belli FABIOSO", "owner_url": "http://www.panoramio.com/user/135078"}
,
{"item_id": 798846, "item_title": "Panther Rock, Antelope Canyon, AZ", "item_url": "http://www.panoramio.com/photo/798846", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/798846.jpg", "longitude": -111.391668, "latitude": 36.878728, "width": 376, "height": 500, "upload_date": "12 February 2007", "owner_id": 52440, "owner_name": "Hank Waxman", "owner_url": "http://www.panoramio.com/user/52440"}
,
{"item_id": 21458, "item_title": "The way of dreams (Aletschgletsher)", "item_url": "http://www.panoramio.com/photo/21458", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/21458.jpg", "longitude": 7.976074, "latitude": 46.544694, "width": 500, "height": 375, "upload_date": "29 May 2006", "owner_id": 3404, "owner_name": "Csongor BÃ¶rÃ¶czky", "owner_url": "http://www.panoramio.com/user/3404"}
,
{"item_id": 691681, "item_title": "PANORAMIO - Ilha das Cabras - by Wolfgang Wodeck", "item_url": "http://www.panoramio.com/photo/691681", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/691681.jpg", "longitude": -48.628750, "latitude": -26.989624, "width": 500, "height": 333, "upload_date": "04 February 2007", "owner_id": 103166, "owner_name": "Wolfgang Wodeck", "owner_url": "http://www.panoramio.com/user/103166"}
,
{"item_id": 564451, "item_title": "Gewitter Ã¼ber Schutterwald", "item_url": "http://www.panoramio.com/photo/564451", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/564451.jpg", "longitude": 7.887470, "latitude": 48.453409, "width": 500, "height": 333, "upload_date": "25 January 2007", "owner_id": 121083, "owner_name": "Alexandra Buss", "owner_url": "http://www.panoramio.com/user/121083"}
,
{"item_id": 1430151, "item_title": "Burano", "item_url": "http://www.panoramio.com/photo/1430151", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1430151.jpg", "longitude": 12.416686, "latitude": 45.485966, "width": 500, "height": 365, "upload_date": "21 March 2007", "owner_id": 193913, "owner_name": "Klesitz Piroska", "owner_url": "http://www.panoramio.com/user/193913"}
,
{"item_id": 3156915, "item_title": "Brussels - Grand Place", "item_url": "http://www.panoramio.com/photo/3156915", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3156915.jpg", "longitude": 4.352152, "latitude": 50.846658, "width": 500, "height": 375, "upload_date": "07 July 2007", "owner_id": 138691, "owner_name": "Josep Maria Alegre", "owner_url": "http://www.panoramio.com/user/138691"}
,
{"item_id": 6126516, "item_title": "Richmond Deer", "item_url": "http://www.panoramio.com/photo/6126516", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6126516.jpg", "longitude": -0.279776, "latitude": 51.448565, "width": 500, "height": 294, "upload_date": "25 November 2007", "owner_id": 1130880, "owner_name": "marksimms", "owner_url": "http://www.panoramio.com/user/1130880"}
,
{"item_id": 679356, "item_title": "sulphur crested cockatoos", "item_url": "http://www.panoramio.com/photo/679356", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/679356.jpg", "longitude": 150.363181, "latitude": -33.718234, "width": 500, "height": 500, "upload_date": "04 February 2007", "owner_id": 146092, "owner_name": "sid1662", "owner_url": "http://www.panoramio.com/user/146092"}
,
{"item_id": 462324, "item_title": "Yucca", "item_url": "http://www.panoramio.com/photo/462324", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/462324.jpg", "longitude": -106.259680, "latitude": 32.797448, "width": 500, "height": 500, "upload_date": "17 January 2007", "owner_id": 93560, "owner_name": "Alex Petrov", "owner_url": "http://www.panoramio.com/user/93560"}
,
{"item_id": 9528831, "item_title": "maldives", "item_url": "http://www.panoramio.com/photo/9528831", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/9528831.jpg", "longitude": 73.454686, "latitude": 3.845837, "width": 500, "height": 335, "upload_date": "20 April 2008", "owner_id": 647076, "owner_name": "garethohara", "owner_url": "http://www.panoramio.com/user/647076"}
,
{"item_id": 11825351, "item_title": "  ARC Buque Escuela Gloria. ARC School Ship Gloria. by (((Jose Daniel))) ", "item_url": "http://www.panoramio.com/photo/11825351", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/11825351.jpg", "longitude": -75.539761, "latitude": 10.410917, "width": 500, "height": 392, "upload_date": "05 July 2008", "owner_id": 1611883, "owner_name": "(((Jose Daniel)))", "owner_url": "http://www.panoramio.com/user/1611883"}
,
{"item_id": 459614, "item_title": "seaside line", "item_url": "http://www.panoramio.com/photo/459614", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/459614.jpg", "longitude": 138.801785, "latitude": 37.756669, "width": 500, "height": 383, "upload_date": "16 January 2007", "owner_id": 86411, "owner_name": "ä¸­æ‘è„©-Osamu nakamura", "owner_url": "http://www.panoramio.com/user/86411"}
,
{"item_id": 771974, "item_title": "Retired Boat", "item_url": "http://www.panoramio.com/photo/771974", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/771974.jpg", "longitude": 25.427610, "latitude": 36.427576, "width": 500, "height": 332, "upload_date": "11 February 2007", "owner_id": 66847, "owner_name": "Lukas Novak", "owner_url": "http://www.panoramio.com/user/66847"}
,
{"item_id": 1781649, "item_title": "Fall in Yosemite Valley", "item_url": "http://www.panoramio.com/photo/1781649", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1781649.jpg", "longitude": -119.609270, "latitude": 37.735290, "width": 500, "height": 400, "upload_date": "15 April 2007", "owner_id": 376395, "owner_name": "JeffSullivan (www.MyPhotoGuides.com)", "owner_url": "http://www.panoramio.com/user/376395"}
,
{"item_id": 8491500, "item_title": "Horsetail Falls at Sunset", "item_url": "http://www.panoramio.com/photo/8491500", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/8491500.jpg", "longitude": -119.623947, "latitude": 37.723512, "width": 333, "height": 500, "upload_date": "12 March 2008", "owner_id": 376395, "owner_name": "JeffSullivan (www.MyPhotoGuides.com)", "owner_url": "http://www.panoramio.com/user/376395"}
,
{"item_id": 9505599, "item_title": "#9 Penguins at Boulders Beach, Simonâ€™s Town, Scenery May08", "item_url": "http://www.panoramio.com/photo/9505599", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/9505599.jpg", "longitude": 18.450642, "latitude": -34.196443, "width": 500, "height": 489, "upload_date": "19 April 2008", "owner_id": 1077251, "owner_name": "picsonthemove", "owner_url": "http://www.panoramio.com/user/1077251"}
,
{"item_id": 1320563, "item_title": "Pirates on anchor", "item_url": "http://www.panoramio.com/photo/1320563", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1320563.jpg", "longitude": 39.311485, "latitude": -5.724799, "width": 316, "height": 500, "upload_date": "14 March 2007", "owner_id": 232099, "owner_name": "mabut", "owner_url": "http://www.panoramio.com/user/232099"}
,
{"item_id": 2381962, "item_title": "Uluru,Northern Territory,Australia-Rosina lamberti", "item_url": "http://www.panoramio.com/photo/2381962", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2381962.jpg", "longitude": 131.054878, "latitude": -25.326959, "width": 500, "height": 274, "upload_date": "25 May 2007", "owner_id": 140796, "owner_name": "rosina lamberti", "owner_url": "http://www.panoramio.com/user/140796"}
,
{"item_id": 92102, "item_title": "Briksdalsbreen (Norway)", "item_url": "http://www.panoramio.com/photo/92102", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/92102.jpg", "longitude": 6.887054, "latitude": 61.664788, "width": 500, "height": 375, "upload_date": "05 December 2006", "owner_id": 11403, "owner_name": "ArnÃ¡iz", "owner_url": "http://www.panoramio.com/user/11403"}
,
{"item_id": 7012377, "item_title": "KanyarfÃ©nyek", "item_url": "http://www.panoramio.com/photo/7012377", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/7012377.jpg", "longitude": 17.517700, "latitude": 47.760445, "width": 500, "height": 334, "upload_date": "09 January 2008", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 422769, "item_title": "hazaki2", "item_url": "http://www.panoramio.com/photo/422769", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/422769.jpg", "longitude": 138.862553, "latitude": 37.711410, "width": 500, "height": 333, "upload_date": "14 January 2007", "owner_id": 86411, "owner_name": "ä¸­æ‘è„©-Osamu nakamura", "owner_url": "http://www.panoramio.com/user/86411"}
,
{"item_id": 4558763, "item_title": "Corsica - West Coast", "item_url": "http://www.panoramio.com/photo/4558763", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4558763.jpg", "longitude": 8.640404, "latitude": 42.255205, "width": 500, "height": 342, "upload_date": "10 September 2007", "owner_id": 49870, "owner_name": "Jean-Michel Raggioli", "owner_url": "http://www.panoramio.com/user/49870"}
,
{"item_id": 374479, "item_title": "Corinthos", "item_url": "http://www.panoramio.com/photo/374479", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/374479.jpg", "longitude": 22.997131, "latitude": 37.925514, "width": 375, "height": 500, "upload_date": "10 January 2007", "owner_id": 74407, "owner_name": "Yeoman", "owner_url": "http://www.panoramio.com/user/74407"}
,
{"item_id": 2421991, "item_title": "\"Different\" Arch", "item_url": "http://www.panoramio.com/photo/2421991", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2421991.jpg", "longitude": -109.499032, "latitude": 38.744118, "width": 500, "height": 333, "upload_date": "27 May 2007", "owner_id": 66847, "owner_name": "Lukas Novak", "owner_url": "http://www.panoramio.com/user/66847"}
,
{"item_id": 945978, "item_title": "L'Ebre", "item_url": "http://www.panoramio.com/photo/945978", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/945978.jpg", "longitude": 0.495501, "latitude": 40.905015, "width": 500, "height": 377, "upload_date": "21 February 2007", "owner_id": 3022, "owner_name": "Arcadi", "owner_url": "http://www.panoramio.com/user/3022"}
,
{"item_id": 48449, "item_title": "Montserrat", "item_url": "http://www.panoramio.com/photo/48449", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/48449.jpg", "longitude": 1.840060, "latitude": 41.593702, "width": 500, "height": 337, "upload_date": "15 September 2006", "owner_id": 5477, "owner_name": "errece", "owner_url": "http://www.panoramio.com/user/5477"}
,
{"item_id": 572483, "item_title": "wheatfield in autumn", "item_url": "http://www.panoramio.com/photo/572483", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/572483.jpg", "longitude": 11.278152, "latitude": 59.644760, "width": 500, "height": 351, "upload_date": "25 January 2007", "owner_id": 39160, "owner_name": "Snemann", "owner_url": "http://www.panoramio.com/user/39160"}
,
{"item_id": 2060897, "item_title": "Mid Coolum", "item_url": "http://www.panoramio.com/photo/2060897", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2060897.jpg", "longitude": 153.097685, "latitude": -26.540052, "width": 500, "height": 336, "upload_date": "04 May 2007", "owner_id": 411736, "owner_name": "Nixpix", "owner_url": "http://www.panoramio.com/user/411736"}
,
{"item_id": 6327146, "item_title": "Winterwald beim \"Widi\" - a thin sheet of ice  (messi 06)", "item_url": "http://www.panoramio.com/photo/6327146", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6327146.jpg", "longitude": 7.381070, "latitude": 47.015670, "width": 500, "height": 363, "upload_date": "06 December 2007", "owner_id": 162722, "owner_name": "Â©polytropos", "owner_url": "http://www.panoramio.com/user/162722"}
,
{"item_id": 36476, "item_title": "Bergbach", "item_url": "http://www.panoramio.com/photo/36476", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/36476.jpg", "longitude": 13.911953, "latitude": 47.634164, "width": 375, "height": 500, "upload_date": "02 August 2006", "owner_id": 5703, "owner_name": "dancer", "owner_url": "http://www.panoramio.com/user/5703"}
,
{"item_id": 436366, "item_title": "sunset", "item_url": "http://www.panoramio.com/photo/436366", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/436366.jpg", "longitude": 138.857231, "latitude": 37.828497, "width": 500, "height": 351, "upload_date": "15 January 2007", "owner_id": 86411, "owner_name": "ä¸­æ‘è„©-Osamu nakamura", "owner_url": "http://www.panoramio.com/user/86411"}
,
{"item_id": 701842, "item_title": "Singapore Skyline @ Night", "item_url": "http://www.panoramio.com/photo/701842", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/701842.jpg", "longitude": 103.855486, "latitude": 1.288897, "width": 500, "height": 324, "upload_date": "05 February 2007", "owner_id": 20398, "owner_name": "boerx", "owner_url": "http://www.panoramio.com/user/20398"}
,
{"item_id": 6086623, "item_title": "LÃ¡ngolÃ³ repce", "item_url": "http://www.panoramio.com/photo/6086623", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6086623.jpg", "longitude": 17.784977, "latitude": 47.660994, "width": 500, "height": 334, "upload_date": "23 November 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 1595617, "item_title": "Rosina lamberti,Templestowe,Victoria,Australia", "item_url": "http://www.panoramio.com/photo/1595617", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1595617.jpg", "longitude": 145.137978, "latitude": -37.774785, "width": 500, "height": 354, "upload_date": "02 April 2007", "owner_id": 140796, "owner_name": "rosina lamberti", "owner_url": "http://www.panoramio.com/user/140796"}
,
{"item_id": 74727, "item_title": "ama dablam in background", "item_url": "http://www.panoramio.com/photo/74727", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/74727.jpg", "longitude": 86.826496, "latitude": 27.904631, "width": 500, "height": 334, "upload_date": "02 November 2006", "owner_id": 9812, "owner_name": "wsm earp", "owner_url": "http://www.panoramio.com/user/9812"}
,
{"item_id": 36086, "item_title": "Ð Ð¸Ð¼. Ð´Ð²Ð¾Ñ€ Ð’Ð°Ñ‚Ð¸ÐºÐ°Ð½Ð°", "item_url": "http://www.panoramio.com/photo/36086", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/36086.jpg", "longitude": 12.454505, "latitude": 41.905695, "width": 500, "height": 444, "upload_date": "31 July 2006", "owner_id": 5641, "owner_name": "sergey duhanin", "owner_url": "http://www.panoramio.com/user/5641"}
,
{"item_id": 2066940, "item_title": "Unbelievable ice sculptures", "item_url": "http://www.panoramio.com/photo/2066940", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2066940.jpg", "longitude": -73.264389, "latitude": -50.009063, "width": 500, "height": 333, "upload_date": "04 May 2007", "owner_id": 3316, "owner_name": "kristine hannon (www.traveltheglobe.be)", "owner_url": "http://www.panoramio.com/user/3316"}
,
{"item_id": 1759754, "item_title": "On the way for the heat wave", "item_url": "http://www.panoramio.com/photo/1759754", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1759754.jpg", "longitude": -12.734528, "latitude": 20.208079, "width": 500, "height": 331, "upload_date": "13 April 2007", "owner_id": 121377, "owner_name": "Philippe Buffard", "owner_url": "http://www.panoramio.com/user/121377"}
,
{"item_id": 5717808, "item_title": "Moonlight @ Eglisau", "item_url": "http://www.panoramio.com/photo/5717808", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5717808.jpg", "longitude": 8.521459, "latitude": 47.575035, "width": 500, "height": 331, "upload_date": "05 November 2007", "owner_id": 436351, "owner_name": "Sunpixx", "owner_url": "http://www.panoramio.com/user/436351"}
,
{"item_id": 44853, "item_title": "Airfocus20050501DSC_3416l", "item_url": "http://www.panoramio.com/photo/44853", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/44853.jpg", "longitude": 7.663361, "latitude": 50.287009, "width": 500, "height": 332, "upload_date": "02 September 2006", "owner_id": 6703, "owner_name": "Peter Jansen", "owner_url": "http://www.panoramio.com/user/6703"}
,
{"item_id": 57403, "item_title": "Burano 2", "item_url": "http://www.panoramio.com/photo/57403", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/57403.jpg", "longitude": 12.420173, "latitude": 45.485365, "width": 500, "height": 331, "upload_date": "04 October 2006", "owner_id": 8060, "owner_name": "Norbert MAIER", "owner_url": "http://www.panoramio.com/user/8060"}
,
{"item_id": 13130, "item_title": "Agde - Painted wall", "item_url": "http://www.panoramio.com/photo/13130", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/13130.jpg", "longitude": 3.471251, "latitude": 43.312314, "width": 500, "height": 375, "upload_date": "25 February 2006", "owner_id": 1981, "owner_name": "Eric Medvet", "owner_url": "http://www.panoramio.com/user/1981"}
,
{"item_id": 7375236, "item_title": "le Loir en crue Ã  Briollay, janvier 2008. #276", "item_url": "http://www.panoramio.com/photo/7375236", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/7375236.jpg", "longitude": -0.500618, "latitude": 47.557827, "width": 500, "height": 338, "upload_date": "26 January 2008", "owner_id": 666755, "owner_name": "Armagnac", "owner_url": "http://www.panoramio.com/user/666755"}
,
{"item_id": 3851701, "item_title": "Mailbox", "item_url": "http://www.panoramio.com/photo/3851701", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3851701.jpg", "longitude": -73.475790, "latitude": 44.528271, "width": 500, "height": 333, "upload_date": "10 August 2007", "owner_id": 17488, "owner_name": "John Gillett", "owner_url": "http://www.panoramio.com/user/17488"}
,
{"item_id": 1235904, "item_title": "Ripples", "item_url": "http://www.panoramio.com/photo/1235904", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1235904.jpg", "longitude": -131.616211, "latitude": 52.834299, "width": 330, "height": 500, "upload_date": "09 March 2007", "owner_id": 232099, "owner_name": "mabut", "owner_url": "http://www.panoramio.com/user/232099"}
,
{"item_id": 50646, "item_title": "Ice Cave", "item_url": "http://www.panoramio.com/photo/50646", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/50646.jpg", "longitude": -118.052559, "latitude": 52.678620, "width": 500, "height": 375, "upload_date": "21 September 2006", "owner_id": 7190, "owner_name": "Perry Tang", "owner_url": "http://www.panoramio.com/user/7190"}
,
{"item_id": 617458, "item_title": "Pescador", "item_url": "http://www.panoramio.com/photo/617458", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/617458.jpg", "longitude": 0.492368, "latitude": 40.904091, "width": 500, "height": 334, "upload_date": "29 January 2007", "owner_id": 3022, "owner_name": "Arcadi", "owner_url": "http://www.panoramio.com/user/3022"}
,
{"item_id": 52724, "item_title": "Sunrise Gythio", "item_url": "http://www.panoramio.com/photo/52724", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/52724.jpg", "longitude": 22.574501, "latitude": 36.755665, "width": 500, "height": 333, "upload_date": "26 September 2006", "owner_id": 7464, "owner_name": "Pieter", "owner_url": "http://www.panoramio.com/user/7464"}
,
{"item_id": 289855, "item_title": "Coronation Island Colours", "item_url": "http://www.panoramio.com/photo/289855", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/289855.jpg", "longitude": -45.703125, "latitude": -60.705448, "width": 500, "height": 335, "upload_date": "03 January 2007", "owner_id": 61890, "owner_name": "enriquevidalphoto.com", "owner_url": "http://www.panoramio.com/user/61890"}
,
{"item_id": 5649263, "item_title": "Naab im Herbst", "item_url": "http://www.panoramio.com/photo/5649263", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5649263.jpg", "longitude": 12.070885, "latitude": 49.298711, "width": 500, "height": 329, "upload_date": "31 October 2007", "owner_id": 696605, "owner_name": "Â© alfredschaffer", "owner_url": "http://www.panoramio.com/user/696605"}
,
{"item_id": 110750, "item_title": "The Peter and Paul Fortress. Panoramic view (180Â°) from The Palace Quay. â€” Ð‘Ð¾Ð»ÑŒÑˆÐ°Ñ (180Â°) Ð¿Ð°Ð½Ð¾Ñ€Ð°Ð¼Ð° ÐŸÐµÑ‚Ñ€Ð¾Ð¿Ð°Ð²Ð»Ð¾Ð²ÑÐºÐ¾Ð¹ ÐºÑ€ÐµÐ¿Ð¾ÑÑ‚Ð¸ Ñ Ð”Ð²Ð¾Ñ€Ñ†Ð¾Ð²Ð¾Ð¹ Ð½Ð°Ð±ÐµÑ€ÐµÐ¶Ð½Ð¾Ð¹.", "item_url": "http://www.panoramio.com/photo/110750", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/110750.jpg", "longitude": 30.317802, "latitude": 59.946930, "width": 500, "height": 31, "upload_date": "11 December 2006", "owner_id": 12103, "owner_name": "Roman Sobolenko", "owner_url": "http://www.panoramio.com/user/12103"}
,
{"item_id": 1870028, "item_title": "Tour Moretti", "item_url": "http://www.panoramio.com/photo/1870028", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1870028.jpg", "longitude": 2.247775, "latitude": 48.889175, "width": 500, "height": 395, "upload_date": "21 April 2007", "owner_id": 372189, "owner_name": "PhilÂ©", "owner_url": "http://www.panoramio.com/user/372189"}
,
{"item_id": 52752, "item_title": "Sun and Clouds in Naphlion", "item_url": "http://www.panoramio.com/photo/52752", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/52752.jpg", "longitude": 22.792425, "latitude": 37.562405, "width": 333, "height": 500, "upload_date": "26 September 2006", "owner_id": 7464, "owner_name": "Pieter", "owner_url": "http://www.panoramio.com/user/7464"}
,
{"item_id": 2256672, "item_title": "En algÃºn punto", "item_url": "http://www.panoramio.com/photo/2256672", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2256672.jpg", "longitude": -2.579153, "latitude": 42.493436, "width": 500, "height": 331, "upload_date": "17 May 2007", "owner_id": 129297, "owner_name": "Enrique Ortiz de ZÃ¡rate", "owner_url": "http://www.panoramio.com/user/129297"}
,
{"item_id": 519209, "item_title": "Armageddon", "item_url": "http://www.panoramio.com/photo/519209", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/519209.jpg", "longitude": 17.627563, "latitude": 47.664809, "width": 500, "height": 334, "upload_date": "21 January 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 10175554, "item_title": "Vessel to eternity", "item_url": "http://www.panoramio.com/photo/10175554", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/10175554.jpg", "longitude": 119.670467, "latitude": 11.089976, "width": 500, "height": 363, "upload_date": "13 May 2008", "owner_id": 232099, "owner_name": "mabut", "owner_url": "http://www.panoramio.com/user/232099"}
,
{"item_id": 11138384, "item_title": "Lac des Joncs, reflets", "item_url": "http://www.panoramio.com/photo/11138384", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/11138384.jpg", "longitude": 6.946986, "latitude": 46.513176, "width": 500, "height": 375, "upload_date": "12 June 2008", "owner_id": 1430484, "owner_name": "tiopepe8", "owner_url": "http://www.panoramio.com/user/1430484"}
,
{"item_id": 204255, "item_title": "Old farm by Osafjorden", "item_url": "http://www.panoramio.com/photo/204255", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/204255.jpg", "longitude": 6.998978, "latitude": 60.564197, "width": 500, "height": 368, "upload_date": "21 December 2006", "owner_id": 39160, "owner_name": "Snemann", "owner_url": "http://www.panoramio.com/user/39160"}
,
{"item_id": 3871571, "item_title": "St. BartholomÃ¤ am KÃ¶nigssee", "item_url": "http://www.panoramio.com/photo/3871571", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3871571.jpg", "longitude": 12.973351, "latitude": 47.545220, "width": 500, "height": 375, "upload_date": "11 August 2007", "owner_id": 424589, "owner_name": "PeSchn", "owner_url": "http://www.panoramio.com/user/424589"}
,
{"item_id": 5358166, "item_title": "Mooney Falls", "item_url": "http://www.panoramio.com/photo/5358166", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5358166.jpg", "longitude": -112.709148, "latitude": 36.262849, "width": 500, "height": 335, "upload_date": "16 October 2007", "owner_id": 66847, "owner_name": "Lukas Novak", "owner_url": "http://www.panoramio.com/user/66847"}
,
{"item_id": 600797, "item_title": "Living (?) in Hong Kong", "item_url": "http://www.panoramio.com/photo/600797", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/600797.jpg", "longitude": 113.935831, "latitude": 22.279794, "width": 500, "height": 334, "upload_date": "28 January 2007", "owner_id": 20398, "owner_name": "boerx", "owner_url": "http://www.panoramio.com/user/20398"}
,
{"item_id": 6459385, "item_title": "Alternativ Future", "item_url": "http://www.panoramio.com/photo/6459385", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6459385.jpg", "longitude": 17.598467, "latitude": 47.645846, "width": 500, "height": 325, "upload_date": "13 December 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 522010, "item_title": "Hyperion", "item_url": "http://www.panoramio.com/photo/522010", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/522010.jpg", "longitude": 17.562933, "latitude": 47.632545, "width": 500, "height": 353, "upload_date": "21 January 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 4942642, "item_title": "FÃ¶rgeteg elÃ¶tt", "item_url": "http://www.panoramio.com/photo/4942642", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4942642.jpg", "longitude": 17.807121, "latitude": 47.646887, "width": 500, "height": 334, "upload_date": "27 September 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 223798, "item_title": "Kachemak Bay Moonrise", "item_url": "http://www.panoramio.com/photo/223798", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/223798.jpg", "longitude": -151.426835, "latitude": 59.680146, "width": 500, "height": 333, "upload_date": "24 December 2006", "owner_id": 45308, "owner_name": "Mike Cavaroc", "owner_url": "http://www.panoramio.com/user/45308"}
,
{"item_id": 1946961, "item_title": "HÃ¡rom \"GrÃ¡cia\"", "item_url": "http://www.panoramio.com/photo/1946961", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1946961.jpg", "longitude": 18.273354, "latitude": 47.577684, "width": 500, "height": 290, "upload_date": "27 April 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 821342, "item_title": "Northern Lights seen from Alta", "item_url": "http://www.panoramio.com/photo/821342", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/821342.jpg", "longitude": 23.234882, "latitude": 69.962969, "width": 500, "height": 346, "upload_date": "14 February 2007", "owner_id": 56091, "owner_name": "Kjetil Vaage Ã˜ie", "owner_url": "http://www.panoramio.com/user/56091"}
,
{"item_id": 9831100, "item_title": "RepcepÃ¡sztor", "item_url": "http://www.panoramio.com/photo/9831100", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/9831100.jpg", "longitude": 18.213100, "latitude": 47.567956, "width": 500, "height": 334, "upload_date": "01 May 2008", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 8294907, "item_title": "Winds of Change", "item_url": "http://www.panoramio.com/photo/8294907", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/8294907.jpg", "longitude": -112.007847, "latitude": 36.993299, "width": 333, "height": 500, "upload_date": "04 March 2008", "owner_id": 107292, "owner_name": "Kevin Mikkelsen", "owner_url": "http://www.panoramio.com/user/107292"}
,
{"item_id": 7388668, "item_title": "jak dobrze wstaÄ‡ ...", "item_url": "http://www.panoramio.com/photo/7388668", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/7388668.jpg", "longitude": 15.746498, "latitude": 51.848929, "width": 500, "height": 353, "upload_date": "27 January 2008", "owner_id": 889535, "owner_name": "yossarian01", "owner_url": "http://www.panoramio.com/user/889535"}
,
{"item_id": 617471, "item_title": "Rio", "item_url": "http://www.panoramio.com/photo/617471", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/617471.jpg", "longitude": 0.493505, "latitude": 40.904318, "width": 500, "height": 335, "upload_date": "29 January 2007", "owner_id": 3022, "owner_name": "Arcadi", "owner_url": "http://www.panoramio.com/user/3022"}
,
{"item_id": 259612, "item_title": "Miss Liberty, NY/NJ Harbor", "item_url": "http://www.panoramio.com/photo/259612", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/259612.jpg", "longitude": -74.039698, "latitude": 40.687472, "width": 357, "height": 500, "upload_date": "29 December 2006", "owner_id": 52440, "owner_name": "Hank Waxman", "owner_url": "http://www.panoramio.com/user/52440"}
,
{"item_id": 2282545, "item_title": "San Remo Scorcio di San Siro", "item_url": "http://www.panoramio.com/photo/2282545", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2282545.jpg", "longitude": 7.773911, "latitude": 43.818234, "width": 500, "height": 459, "upload_date": "18 May 2007", "owner_id": 60898, "owner_name": "esseil", "owner_url": "http://www.panoramio.com/user/60898"}
,
{"item_id": 84795, "item_title": "0032", "item_url": "http://www.panoramio.com/photo/84795", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/84795.jpg", "longitude": 25.830574, "latitude": -20.889688, "width": 500, "height": 334, "upload_date": "22 November 2006", "owner_id": 10637, "owner_name": "Carles Campsolinas Dresaire", "owner_url": "http://www.panoramio.com/user/10637"}
,
{"item_id": 6205, "item_title": "Valencia III", "item_url": "http://www.panoramio.com/photo/6205", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6205.jpg", "longitude": -0.352764, "latitude": 39.456143, "width": 500, "height": 375, "upload_date": "28 December 2005", "owner_id": 414, "owner_name": "Sonia Villegas", "owner_url": "http://www.panoramio.com/user/414"}
,
{"item_id": 5255997, "item_title": "Az alkonyvigyÃ¡zÃ³", "item_url": "http://www.panoramio.com/photo/5255997", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5255997.jpg", "longitude": 17.417107, "latitude": 46.942762, "width": 500, "height": 334, "upload_date": "12 October 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 4214336, "item_title": "èˆ¹å®¶ ship On Li river", "item_url": "http://www.panoramio.com/photo/4214336", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4214336.jpg", "longitude": 110.342388, "latitude": 25.215347, "width": 500, "height": 313, "upload_date": "26 August 2007", "owner_id": 161470, "owner_name": "John Su", "owner_url": "http://www.panoramio.com/user/161470"}
,
{"item_id": 611660, "item_title": "Tikehau Ile aux oiseaux JC", "item_url": "http://www.panoramio.com/photo/611660", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/611660.jpg", "longitude": -148.098224, "latitude": -14.974528, "width": 375, "height": 500, "upload_date": "29 January 2007", "owner_id": 131113, "owner_name": "Lair Jean Claude", "owner_url": "http://www.panoramio.com/user/131113"}
,
{"item_id": 9822041, "item_title": "Singapore", "item_url": "http://www.panoramio.com/photo/9822041", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/9822041.jpg", "longitude": 103.855219, "latitude": 1.288907, "width": 500, "height": 333, "upload_date": "01 May 2008", "owner_id": 1465912, "owner_name": "funtor", "owner_url": "http://www.panoramio.com/user/1465912"}
,
{"item_id": 126820, "item_title": "Taj Mahal -  colores", "item_url": "http://www.panoramio.com/photo/126820", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/126820.jpg", "longitude": 78.042165, "latitude": 27.172871, "width": 500, "height": 385, "upload_date": "12 December 2006", "owner_id": 10456, "owner_name": "eulogio", "owner_url": "http://www.panoramio.com/user/10456"}
,
{"item_id": 112504, "item_title": "V-01009", "item_url": "http://www.panoramio.com/photo/112504", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/112504.jpg", "longitude": 12.335946, "latitude": 45.438213, "width": 500, "height": 500, "upload_date": "11 December 2006", "owner_id": 17599, "owner_name": "Dmitry Andreev", "owner_url": "http://www.panoramio.com/user/17599"}
,
{"item_id": 1898139, "item_title": "Ein sehr menschenÃ¤hnlicher Baum (http://www.redbubble.com/products/configure/1935618)", "item_url": "http://www.panoramio.com/photo/1898139", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1898139.jpg", "longitude": 13.158177, "latitude": 52.456836, "width": 375, "height": 500, "upload_date": "23 April 2007", "owner_id": 311327, "owner_name": "www.einkauf.tk", "owner_url": "http://www.panoramio.com/user/311327"}
,
{"item_id": 57813, "item_title": "Hallstatt 1", "item_url": "http://www.panoramio.com/photo/57813", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/57813.jpg", "longitude": 13.652229, "latitude": 47.551274, "width": 500, "height": 333, "upload_date": "05 October 2006", "owner_id": 8060, "owner_name": "Norbert MAIER", "owner_url": "http://www.panoramio.com/user/8060"}
,
{"item_id": 533476, "item_title": "Comet McNaught 220107 02", "item_url": "http://www.panoramio.com/photo/533476", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/533476.jpg", "longitude": 18.371286, "latitude": -33.964363, "width": 328, "height": 500, "upload_date": "22 January 2007", "owner_id": 2748, "owner_name": "WirelessMonkey", "owner_url": "http://www.panoramio.com/user/2748"}
,
{"item_id": 507370, "item_title": "The Silence", "item_url": "http://www.panoramio.com/photo/507370", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/507370.jpg", "longitude": 17.497959, "latitude": 47.781328, "width": 465, "height": 500, "upload_date": "20 January 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 2422269, "item_title": "Grand Trees", "item_url": "http://www.panoramio.com/photo/2422269", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2422269.jpg", "longitude": -112.124019, "latitude": 36.062942, "width": 500, "height": 333, "upload_date": "27 May 2007", "owner_id": 66847, "owner_name": "Lukas Novak", "owner_url": "http://www.panoramio.com/user/66847"}
,
{"item_id": 2808348, "item_title": "Blind River reflection", "item_url": "http://www.panoramio.com/photo/2808348", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2808348.jpg", "longitude": -82.973557, "latitude": 46.193141, "width": 500, "height": 305, "upload_date": "18 June 2007", "owner_id": 555551, "owner_name": "Marilyn Whiteley", "owner_url": "http://www.panoramio.com/user/555551"}
,
{"item_id": 2534183, "item_title": "", "item_url": "http://www.panoramio.com/photo/2534183", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2534183.jpg", "longitude": -69.934587, "latitude": -37.382844, "width": 500, "height": 335, "upload_date": "02 June 2007", "owner_id": 527160, "owner_name": "legui83", "owner_url": "http://www.panoramio.com/user/527160"}
,
{"item_id": 1008446, "item_title": "budamist", "item_url": "http://www.panoramio.com/photo/1008446", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1008446.jpg", "longitude": 19.078649, "latitude": 47.516737, "width": 500, "height": 341, "upload_date": "24 February 2007", "owner_id": 2659, "owner_name": "ozalph", "owner_url": "http://www.panoramio.com/user/2659"}
,
{"item_id": 2935385, "item_title": "temporale sul mare di riccione", "item_url": "http://www.panoramio.com/photo/2935385", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2935385.jpg", "longitude": 12.644491, "latitude": 43.964836, "width": 333, "height": 500, "upload_date": "25 June 2007", "owner_id": 267377, "owner_name": "Valter Galvani", "owner_url": "http://www.panoramio.com/user/267377"}
,
{"item_id": 7586398, "item_title": "Al vuelo", "item_url": "http://www.panoramio.com/photo/7586398", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/7586398.jpg", "longitude": -73.152337, "latitude": -37.114747, "width": 375, "height": 500, "upload_date": "04 February 2008", "owner_id": 327310, "owner_name": "Erwin Woenckhaus", "owner_url": "http://www.panoramio.com/user/327310"}
,
{"item_id": 7624042, "item_title": "Fairyland 11", "item_url": "http://www.panoramio.com/photo/7624042", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/7624042.jpg", "longitude": 6.067650, "latitude": 52.224684, "width": 352, "height": 500, "upload_date": "06 February 2008", "owner_id": 523564, "owner_name": "Luud Riphagen", "owner_url": "http://www.panoramio.com/user/523564"}
,
{"item_id": 1186930, "item_title": "Ð’Ð¸Ð´ Ñ Ð³Ð¾Ñ€Ñ‹ Ð”ÐµÐ¼ÐµÑ€Ð´Ð¶Ð¸ - Demergi mountain view", "item_url": "http://www.panoramio.com/photo/1186930", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1186930.jpg", "longitude": 34.413729, "latitude": 44.749903, "width": 500, "height": 338, "upload_date": "05 March 2007", "owner_id": 244932, "owner_name": "Andrey Jitkov", "owner_url": "http://www.panoramio.com/user/244932"}
,
{"item_id": 565512, "item_title": "The staircase star", "item_url": "http://www.panoramio.com/photo/565512", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/565512.jpg", "longitude": 5.646222, "latitude": 46.261262, "width": 500, "height": 331, "upload_date": "25 January 2007", "owner_id": 121377, "owner_name": "Philippe Buffard", "owner_url": "http://www.panoramio.com/user/121377"}
,
{"item_id": 3566705, "item_title": "Pattaya - Big Buddha and seven headed Naga", "item_url": "http://www.panoramio.com/photo/3566705", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3566705.jpg", "longitude": 100.868155, "latitude": 12.915027, "width": 500, "height": 375, "upload_date": "28 July 2007", "owner_id": 716245, "owner_name": "â€”Dragon-64â€” âœˆ", "owner_url": "http://www.panoramio.com/user/716245"}
,
{"item_id": 50113, "item_title": "New York Skyline Panorama", "item_url": "http://www.panoramio.com/photo/50113", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/50113.jpg", "longitude": -73.997775, "latitude": 40.696581, "width": 500, "height": 55, "upload_date": "20 September 2006", "owner_id": 4957, "owner_name": "Ken Gibson", "owner_url": "http://www.panoramio.com/user/4957"}
,
{"item_id": 74726, "item_title": "nuptse 1 sunset", "item_url": "http://www.panoramio.com/photo/74726", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/74726.jpg", "longitude": 86.865978, "latitude": 27.979243, "width": 500, "height": 334, "upload_date": "02 November 2006", "owner_id": 9812, "owner_name": "wsm earp", "owner_url": "http://www.panoramio.com/user/9812"}
,
{"item_id": 10552400, "item_title": "Second Prize \"Travel\" May Contest, HDR, May 2008", "item_url": "http://www.panoramio.com/photo/10552400", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/10552400.jpg", "longitude": -3.705075, "latitude": 47.787960, "width": 500, "height": 333, "upload_date": "24 May 2008", "owner_id": 979901, "owner_name": "DiggaTwigga", "owner_url": "http://www.panoramio.com/user/979901"}
,
{"item_id": 1605229, "item_title": "HoldfÃ©nyÃ¡hÃ­tat", "item_url": "http://www.panoramio.com/photo/1605229", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1605229.jpg", "longitude": 17.748413, "latitude": 47.555214, "width": 400, "height": 500, "upload_date": "02 April 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 34669, "item_title": "Paisaje otoÃ±al - La Rioja - EspaÃ±a", "item_url": "http://www.panoramio.com/photo/34669", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/34669.jpg", "longitude": -2.864685, "latitude": 42.328664, "width": 500, "height": 326, "upload_date": "26 July 2006", "owner_id": 5487, "owner_name": "JoaquÃ­n Ramirez", "owner_url": "http://www.panoramio.com/user/5487"}
,
{"item_id": 4596134, "item_title": "Le vieux Nice, mars 2007", "item_url": "http://www.panoramio.com/photo/4596134", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4596134.jpg", "longitude": 7.277198, "latitude": 43.696704, "width": 368, "height": 500, "upload_date": "12 September 2007", "owner_id": 629243, "owner_name": "Olivier Faugeras", "owner_url": "http://www.panoramio.com/user/629243"}
,
{"item_id": 10576294, "item_title": "Plaza de BolÃ­var, BogotÃ¡. 1st. prize Panoramio Contest, May 08.(((Jose Daniel)))", "item_url": "http://www.panoramio.com/photo/10576294", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/10576294.jpg", "longitude": -74.075629, "latitude": 4.597867, "width": 500, "height": 338, "upload_date": "25 May 2008", "owner_id": 1611883, "owner_name": "(((Jose Daniel)))", "owner_url": "http://www.panoramio.com/user/1611883"}
,
{"item_id": 522151, "item_title": "JÃ³ volt ott", "item_url": "http://www.panoramio.com/photo/522151", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/522151.jpg", "longitude": 17.611084, "latitude": 47.602401, "width": 500, "height": 354, "upload_date": "21 January 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 4247476, "item_title": "Blick vom Zuckerhut", "item_url": "http://www.panoramio.com/photo/4247476", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4247476.jpg", "longitude": -43.156872, "latitude": -22.948909, "width": 500, "height": 375, "upload_date": "28 August 2007", "owner_id": 496676, "owner_name": "Quasebart", "owner_url": "http://www.panoramio.com/user/496676"}
,
{"item_id": 5472461, "item_title": "Lapland", "item_url": "http://www.panoramio.com/photo/5472461", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5472461.jpg", "longitude": 29.187653, "latitude": 66.189241, "width": 500, "height": 327, "upload_date": "22 October 2007", "owner_id": 912031, "owner_name": "Kimmo LyytikÃ¤inen", "owner_url": "http://www.panoramio.com/user/912031"}
,
{"item_id": 472802, "item_title": "Golden Gate Bridge", "item_url": "http://www.panoramio.com/photo/472802", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/472802.jpg", "longitude": -122.481366, "latitude": 37.827644, "width": 500, "height": 305, "upload_date": "18 January 2007", "owner_id": 100907, "owner_name": "Julia Wahl", "owner_url": "http://www.panoramio.com/user/100907"}
,
{"item_id": 506118, "item_title": "Overcast Pier, Hearst State Beach", "item_url": "http://www.panoramio.com/photo/506118", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/506118.jpg", "longitude": -121.187868, "latitude": 35.643016, "width": 500, "height": 343, "upload_date": "20 January 2007", "owner_id": 107613, "owner_name": "Tom Grubbe", "owner_url": "http://www.panoramio.com/user/107613"}
,
{"item_id": 1420841, "item_title": "Poland ", "item_url": "http://www.panoramio.com/photo/1420841", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1420841.jpg", "longitude": 20.630060, "latitude": 52.073123, "width": 500, "height": 377, "upload_date": "20 March 2007", "owner_id": 234038, "owner_name": "Jacek M.", "owner_url": "http://www.panoramio.com/user/234038"}
,
{"item_id": 4088401, "item_title": "Bird at Hogsback - 198812", "item_url": "http://www.panoramio.com/photo/4088401", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4088401.jpg", "longitude": -124.339828, "latitude": 47.440860, "width": 500, "height": 355, "upload_date": "21 August 2007", "owner_id": 765658, "owner_name": "Larry Workman QIN", "owner_url": "http://www.panoramio.com/user/765658"}
,
{"item_id": 8049018, "item_title": "Eastern Sierra Sunset", "item_url": "http://www.panoramio.com/photo/8049018", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/8049018.jpg", "longitude": -119.220543, "latitude": 38.031698, "width": 500, "height": 333, "upload_date": "23 February 2008", "owner_id": 376395, "owner_name": "JeffSullivan (www.MyPhotoGuides.com)", "owner_url": "http://www.panoramio.com/user/376395"}
,
{"item_id": 103324, "item_title": "Lua em SÃ£o Paulo", "item_url": "http://www.panoramio.com/photo/103324", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/103324.jpg", "longitude": -46.652606, "latitude": -23.545394, "width": 500, "height": 333, "upload_date": "10 December 2006", "owner_id": 14733, "owner_name": "Luiz Henrique AssunÃ§Ã£o", "owner_url": "http://www.panoramio.com/user/14733"}
,
{"item_id": 5694626, "item_title": "Lake of Varese - Moon and Venus before dawn", "item_url": "http://www.panoramio.com/photo/5694626", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5694626.jpg", "longitude": 8.717716, "latitude": 45.839025, "width": 339, "height": 500, "upload_date": "02 November 2007", "owner_id": 933456, "owner_name": "Â© Marco De Candido", "owner_url": "http://www.panoramio.com/user/933456"}
,
{"item_id": 1235876, "item_title": "Logs on Lake Moraine", "item_url": "http://www.panoramio.com/photo/1235876", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1235876.jpg", "longitude": -116.180420, "latitude": 51.326321, "width": 330, "height": 500, "upload_date": "09 March 2007", "owner_id": 232099, "owner_name": "mabut", "owner_url": "http://www.panoramio.com/user/232099"}
,
{"item_id": 6999770, "item_title": "Mountain range of Pindos", "item_url": "http://www.panoramio.com/photo/6999770", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6999770.jpg", "longitude": 21.553481, "latitude": 39.498345, "width": 500, "height": 333, "upload_date": "09 January 2008", "owner_id": 242446, "owner_name": "Ntinos Lagos", "owner_url": "http://www.panoramio.com/user/242446"}
,
{"item_id": 405727, "item_title": "awagatake", "item_url": "http://www.panoramio.com/photo/405727", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/405727.jpg", "longitude": 139.042454, "latitude": 37.563222, "width": 500, "height": 380, "upload_date": "13 January 2007", "owner_id": 86411, "owner_name": "ä¸­æ‘è„©-Osamu nakamura", "owner_url": "http://www.panoramio.com/user/86411"}
,
{"item_id": 1488363, "item_title": "", "item_url": "http://www.panoramio.com/photo/1488363", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1488363.jpg", "longitude": 138.454514, "latitude": 38.308932, "width": 500, "height": 384, "upload_date": "25 March 2007", "owner_id": 86411, "owner_name": "ä¸­æ‘è„©-Osamu nakamura", "owner_url": "http://www.panoramio.com/user/86411"}
,
{"item_id": 841001, "item_title": "Central Balkan", "item_url": "http://www.panoramio.com/photo/841001", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/841001.jpg", "longitude": 24.963917, "latitude": 42.679306, "width": 500, "height": 357, "upload_date": "16 February 2007", "owner_id": 16880, "owner_name": "evgenidinev.com", "owner_url": "http://www.panoramio.com/user/16880"}
,
{"item_id": 57406, "item_title": "Burano 4", "item_url": "http://www.panoramio.com/photo/57406", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/57406.jpg", "longitude": 12.419465, "latitude": 45.484567, "width": 500, "height": 333, "upload_date": "04 October 2006", "owner_id": 8060, "owner_name": "Norbert MAIER", "owner_url": "http://www.panoramio.com/user/8060"}
,
{"item_id": 1900891, "item_title": "Peggys Cove, Nova Scotia  La barca ...", "item_url": "http://www.panoramio.com/photo/1900891", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1900891.jpg", "longitude": -63.918285, "latitude": 44.490873, "width": 375, "height": 500, "upload_date": "24 April 2007", "owner_id": 401966, "owner_name": "Syl de Canada", "owner_url": "http://www.panoramio.com/user/401966"}
,
{"item_id": 2135721, "item_title": " Coteau Landing  (prÃ¨s de Valleyfield 3)", "item_url": "http://www.panoramio.com/photo/2135721", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2135721.jpg", "longitude": -74.211960, "latitude": 45.253622, "width": 500, "height": 375, "upload_date": "08 May 2007", "owner_id": 401966, "owner_name": "Syl de Canada", "owner_url": "http://www.panoramio.com/user/401966"}
,
{"item_id": 426155, "item_title": "2007'01'14-Aucanada-0233", "item_url": "http://www.panoramio.com/photo/426155", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/426155.jpg", "longitude": 3.169695, "latitude": 39.837627, "width": 500, "height": 335, "upload_date": "14 January 2007", "owner_id": 61890, "owner_name": "enriquevidalphoto.com", "owner_url": "http://www.panoramio.com/user/61890"}
,
{"item_id": 4868548, "item_title": "Goodbye my dear", "item_url": "http://www.panoramio.com/photo/4868548", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4868548.jpg", "longitude": 16.693211, "latitude": 43.183025, "width": 500, "height": 500, "upload_date": "24 September 2007", "owner_id": 989, "owner_name": "Mrgud", "owner_url": "http://www.panoramio.com/user/989"}
,
{"item_id": 47069, "item_title": "Laguna del Inca", "item_url": "http://www.panoramio.com/photo/47069", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/47069.jpg", "longitude": -70.130786, "latitude": -32.834759, "width": 500, "height": 333, "upload_date": "11 September 2006", "owner_id": 6961, "owner_name": "Santiago Rios", "owner_url": "http://www.panoramio.com/user/6961"}
,
{"item_id": 1781731, "item_title": "The Subway", "item_url": "http://www.panoramio.com/photo/1781731", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1781731.jpg", "longitude": -113.052578, "latitude": 37.310448, "width": 500, "height": 333, "upload_date": "15 April 2007", "owner_id": 376395, "owner_name": "JeffSullivan (www.MyPhotoGuides.com)", "owner_url": "http://www.panoramio.com/user/376395"}
,
{"item_id": 2279, "item_title": "Empire State Building", "item_url": "http://www.panoramio.com/photo/2279", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2279.jpg", "longitude": -73.987073, "latitude": 40.744924, "width": 378, "height": 500, "upload_date": "08 October 2005", "owner_id": 220, "owner_name": "Jeff T. Alu", "owner_url": "http://www.panoramio.com/user/220"}
,
{"item_id": 1277992, "item_title": "Cologne-KÃ¶ln - Dom im Hintergrund der HohenzollernbrÃ¼cke bei Nacht (by night)", "item_url": "http://www.panoramio.com/photo/1277992", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1277992.jpg", "longitude": 6.967220, "latitude": 50.940826, "width": 500, "height": 375, "upload_date": "11 March 2007", "owner_id": 113678, "owner_name": "Canada-Fan", "owner_url": "http://www.panoramio.com/user/113678"}
,
{"item_id": 207638, "item_title": "Sunrise at Mont Saint Michel (1 of 2), august 2001", "item_url": "http://www.panoramio.com/photo/207638", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/207638.jpg", "longitude": -1.509504, "latitude": 48.633547, "width": 331, "height": 500, "upload_date": "21 December 2006", "owner_id": 18925, "owner_name": "Marco Ferrari", "owner_url": "http://www.panoramio.com/user/18925"}
,
{"item_id": 1452569, "item_title": "Desierto de La Tatacoa (zona roja)", "item_url": "http://www.panoramio.com/photo/1452569", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1452569.jpg", "longitude": -75.166667, "latitude": 3.333333, "width": 500, "height": 333, "upload_date": "22 March 2007", "owner_id": 5487, "owner_name": "JoaquÃ­n Ramirez", "owner_url": "http://www.panoramio.com/user/5487"}
,
{"item_id": 3502890, "item_title": "Monasteries in Meteora", "item_url": "http://www.panoramio.com/photo/3502890", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3502890.jpg", "longitude": 21.627445, "latitude": 39.712601, "width": 480, "height": 500, "upload_date": "24 July 2007", "owner_id": 686703, "owner_name": "Thodoris Kliafas", "owner_url": "http://www.panoramio.com/user/686703"}
,
{"item_id": 595505, "item_title": "Burlington_Village_Square", "item_url": "http://www.panoramio.com/photo/595505", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/595505.jpg", "longitude": -79.796180, "latitude": 43.326192, "width": 500, "height": 333, "upload_date": "27 January 2007", "owner_id": 17488, "owner_name": "John Gillett", "owner_url": "http://www.panoramio.com/user/17488"}
,
{"item_id": 60984, "item_title": "Ventisquero P. Moreno", "item_url": "http://www.panoramio.com/photo/60984", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/60984.jpg", "longitude": -73.051872, "latitude": -50.488641, "width": 500, "height": 328, "upload_date": "13 October 2006", "owner_id": 8409, "owner_name": "Hector Fabian Garrido", "owner_url": "http://www.panoramio.com/user/8409"}
,
{"item_id": 6654030, "item_title": "Va por un incomprendido Vincent Willem van Gogh", "item_url": "http://www.panoramio.com/photo/6654030", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6654030.jpg", "longitude": 4.776306, "latitude": 51.477962, "width": 500, "height": 375, "upload_date": "24 December 2007", "owner_id": 804986, "owner_name": "VERJAGA", "owner_url": "http://www.panoramio.com/user/804986"}
,
{"item_id": 3018575, "item_title": "Abrasado", "item_url": "http://www.panoramio.com/photo/3018575", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3018575.jpg", "longitude": -73.279324, "latitude": -39.838002, "width": 500, "height": 375, "upload_date": "29 June 2007", "owner_id": 327310, "owner_name": "Erwin Woenckhaus", "owner_url": "http://www.panoramio.com/user/327310"}
,
{"item_id": 521039, "item_title": "FÃ¡tyolos narancslÃ¡tomÃ¡s", "item_url": "http://www.panoramio.com/photo/521039", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/521039.jpg", "longitude": 17.463455, "latitude": 47.850146, "width": 500, "height": 291, "upload_date": "21 January 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 208239, "item_title": "Nuvola danzante, Svizzera 2002", "item_url": "http://www.panoramio.com/photo/208239", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/208239.jpg", "longitude": 7.321701, "latitude": 46.219515, "width": 334, "height": 500, "upload_date": "22 December 2006", "owner_id": 18925, "owner_name": "Marco Ferrari", "owner_url": "http://www.panoramio.com/user/18925"}
,
{"item_id": 6443936, "item_title": "Pajkos vizek", "item_url": "http://www.panoramio.com/photo/6443936", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6443936.jpg", "longitude": 15.934124, "latitude": 47.915019, "width": 500, "height": 334, "upload_date": "12 December 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 7467941, "item_title": "A day off for the soul...", "item_url": "http://www.panoramio.com/photo/7467941", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/7467941.jpg", "longitude": -75.126133, "latitude": 40.970106, "width": 500, "height": 375, "upload_date": "30 January 2008", "owner_id": 89499, "owner_name": "Michael Braxenthaler", "owner_url": "http://www.panoramio.com/user/89499"}
,
{"item_id": 800436, "item_title": "Eiffel Tower", "item_url": "http://www.panoramio.com/photo/800436", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/800436.jpg", "longitude": 2.294576, "latitude": 48.858249, "width": 500, "height": 386, "upload_date": "13 February 2007", "owner_id": 165346, "owner_name": "Alan Knox", "owner_url": "http://www.panoramio.com/user/165346"}
,
{"item_id": 479673, "item_title": "Summit of GogsÃ¸yra", "item_url": "http://www.panoramio.com/photo/479673", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/479673.jpg", "longitude": 8.147736, "latitude": 62.642606, "width": 500, "height": 333, "upload_date": "18 January 2007", "owner_id": 39160, "owner_name": "Snemann", "owner_url": "http://www.panoramio.com/user/39160"}
,
{"item_id": 5378753, "item_title": "Alps", "item_url": "http://www.panoramio.com/photo/5378753", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5378753.jpg", "longitude": 6.847916, "latitude": 45.913840, "width": 500, "height": 500, "upload_date": "17 October 2007", "owner_id": 588149, "owner_name": "Adam Salwanowicz", "owner_url": "http://www.panoramio.com/user/588149"}
,
{"item_id": 382413, "item_title": "kilimanjaro sunset", "item_url": "http://www.panoramio.com/photo/382413", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/382413.jpg", "longitude": 37.382355, "latitude": -3.046583, "width": 500, "height": 375, "upload_date": "11 January 2007", "owner_id": 6105, "owner_name": "hackltom", "owner_url": "http://www.panoramio.com/user/6105"}
,
{"item_id": 290784, "item_title": "Tormenta BahÃ­a de Pollensa", "item_url": "http://www.panoramio.com/photo/290784", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/290784.jpg", "longitude": 3.116437, "latitude": 39.928440, "width": 500, "height": 285, "upload_date": "03 January 2007", "owner_id": 61890, "owner_name": "enriquevidalphoto.com", "owner_url": "http://www.panoramio.com/user/61890"}
,
{"item_id": 519904, "item_title": "Dombok kÃ¶zÃ¶tt felhÅ‘k alatt", "item_url": "http://www.panoramio.com/photo/519904", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/519904.jpg", "longitude": 18.680878, "latitude": 47.631851, "width": 500, "height": 314, "upload_date": "21 January 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 181264, "item_title": "deer cave", "item_url": "http://www.panoramio.com/photo/181264", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/181264.jpg", "longitude": 114.824553, "latitude": 4.024121, "width": 428, "height": 500, "upload_date": "18 December 2006", "owner_id": 9198, "owner_name": "Caveranger", "owner_url": "http://www.panoramio.com/user/9198"}
,
{"item_id": 323533, "item_title": "Elevador e Mercado Modelo Ssa Ba Br", "item_url": "http://www.panoramio.com/photo/323533", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/323533.jpg", "longitude": -38.512552, "latitude": -12.974261, "width": 500, "height": 333, "upload_date": "06 January 2007", "owner_id": 63291, "owner_name": "GastÃ³n Dapik", "owner_url": "http://www.panoramio.com/user/63291"}
,
{"item_id": 512513, "item_title": "Ã‰gi tÅ±z", "item_url": "http://www.panoramio.com/photo/512513", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/512513.jpg", "longitude": 17.481308, "latitude": 47.796148, "width": 500, "height": 334, "upload_date": "21 January 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 10237287, "item_title": "Kentriki's Woods, by Kostas Andreopoulos", "item_url": "http://www.panoramio.com/photo/10237287", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/10237287.jpg", "longitude": 21.916909, "latitude": 38.569223, "width": 500, "height": 375, "upload_date": "14 May 2008", "owner_id": 1690483, "owner_name": "k.andre", "owner_url": "http://www.panoramio.com/user/1690483"}
,
{"item_id": 52847, "item_title": "153 The Forth Bridge (Railway) over the Firth of Forth", "item_url": "http://www.panoramio.com/photo/52847", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/52847.jpg", "longitude": -3.392672, "latitude": 56.007656, "width": 375, "height": 500, "upload_date": "26 September 2006", "owner_id": 7633, "owner_name": "Daniel Meyer", "owner_url": "http://www.panoramio.com/user/7633"}
,
{"item_id": 11105192, "item_title": "A bird is free", "item_url": "http://www.panoramio.com/photo/11105192", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/11105192.jpg", "longitude": -6.953058, "latitude": 52.773901, "width": 375, "height": 500, "upload_date": "11 June 2008", "owner_id": 1867220, "owner_name": "Aubrey :)", "owner_url": "http://www.panoramio.com/user/1867220"}
,
{"item_id": 196039, "item_title": "espigÃ³n", "item_url": "http://www.panoramio.com/photo/196039", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/196039.jpg", "longitude": -3.801688, "latitude": 43.461606, "width": 332, "height": 500, "upload_date": "20 December 2006", "owner_id": 38804, "owner_name": "www.oscarsanchez.net", "owner_url": "http://www.panoramio.com/user/38804"}
,
{"item_id": 70865, "item_title": "Cataratas de Iguazu", "item_url": "http://www.panoramio.com/photo/70865", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/70865.jpg", "longitude": -54.440818, "latitude": -25.688447, "width": 374, "height": 500, "upload_date": "26 October 2006", "owner_id": 9080, "owner_name": "Marco Teodonio", "owner_url": "http://www.panoramio.com/user/9080"}
,
{"item_id": 6188760, "item_title": "Vihar elÃ¶tt", "item_url": "http://www.panoramio.com/photo/6188760", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6188760.jpg", "longitude": 17.462082, "latitude": 47.843579, "width": 500, "height": 330, "upload_date": "28 November 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 286439, "item_title": "Rusted Car Along Route 66", "item_url": "http://www.panoramio.com/photo/286439", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/286439.jpg", "longitude": -109.804788, "latitude": 35.050024, "width": 500, "height": 333, "upload_date": "03 January 2007", "owner_id": 45308, "owner_name": "Mike Cavaroc", "owner_url": "http://www.panoramio.com/user/45308"}
,
{"item_id": 1283563, "item_title": "Kalalau beach", "item_url": "http://www.panoramio.com/photo/1283563", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1283563.jpg", "longitude": -159.667397, "latitude": 22.164196, "width": 330, "height": 500, "upload_date": "12 March 2007", "owner_id": 232099, "owner_name": "mabut", "owner_url": "http://www.panoramio.com/user/232099"}
,
{"item_id": 1336919, "item_title": "Neuschwanstein", "item_url": "http://www.panoramio.com/photo/1336919", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1336919.jpg", "longitude": 10.750465, "latitude": 47.553128, "width": 500, "height": 371, "upload_date": "15 March 2007", "owner_id": 123698, "owner_name": "Â© Kojak", "owner_url": "http://www.panoramio.com/user/123698"}
,
{"item_id": 1343841, "item_title": "Turning Torsoe in the fog", "item_url": "http://www.panoramio.com/photo/1343841", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1343841.jpg", "longitude": 12.968073, "latitude": 55.613165, "width": 332, "height": 500, "upload_date": "16 March 2007", "owner_id": 278074, "owner_name": "H. C. Steensen", "owner_url": "http://www.panoramio.com/user/278074"}
,
{"item_id": 4976484, "item_title": "Le Bout du Monde avant l'orage", "item_url": "http://www.panoramio.com/photo/4976484", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4976484.jpg", "longitude": 6.867528, "latitude": 46.108618, "width": 500, "height": 375, "upload_date": "29 September 2007", "owner_id": 359127, "owner_name": "wx", "owner_url": "http://www.panoramio.com/user/359127"}
,
{"item_id": 1195113, "item_title": "Ð‘ÐµÑ€ÐµÐ³ Ð¡ÐµÑ‚ÑƒÐ½Ð¸ 2 - Setun riverbank 2", "item_url": "http://www.panoramio.com/photo/1195113", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1195113.jpg", "longitude": 37.486424, "latitude": 55.719367, "width": 332, "height": 500, "upload_date": "06 March 2007", "owner_id": 244932, "owner_name": "Andrey Jitkov", "owner_url": "http://www.panoramio.com/user/244932"}
,
{"item_id": 1549176, "item_title": "ErdÅ‘tÅ±z", "item_url": "http://www.panoramio.com/photo/1549176", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1549176.jpg", "longitude": 17.767639, "latitude": 47.582084, "width": 500, "height": 268, "upload_date": "29 March 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 2127008, "item_title": "Thunderstorm over Thunderbolt", "item_url": "http://www.panoramio.com/photo/2127008", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2127008.jpg", "longitude": -111.586761, "latitude": 41.605303, "width": 500, "height": 329, "upload_date": "08 May 2007", "owner_id": 395804, "owner_name": "Ralph Maughan", "owner_url": "http://www.panoramio.com/user/395804"}
,
{"item_id": 2421940, "item_title": "Twisted Ideas", "item_url": "http://www.panoramio.com/photo/2421940", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2421940.jpg", "longitude": -112.105286, "latitude": 36.059681, "width": 500, "height": 333, "upload_date": "27 May 2007", "owner_id": 66847, "owner_name": "Lukas Novak", "owner_url": "http://www.panoramio.com/user/66847"}
,
{"item_id": 8197305, "item_title": "Mar Fantasma", "item_url": "http://www.panoramio.com/photo/8197305", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/8197305.jpg", "longitude": -71.699395, "latitude": -33.407478, "width": 500, "height": 346, "upload_date": "29 February 2008", "owner_id": 730217, "owner_name": "C.e.C.v", "owner_url": "http://www.panoramio.com/user/730217"}
,
{"item_id": 6126299, "item_title": "Richmond Squirrel", "item_url": "http://www.panoramio.com/photo/6126299", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6126299.jpg", "longitude": -0.277609, "latitude": 51.448003, "width": 500, "height": 500, "upload_date": "25 November 2007", "owner_id": 1130880, "owner_name": "marksimms", "owner_url": "http://www.panoramio.com/user/1130880"}
,
{"item_id": 55016, "item_title": "JacarÃ©-do-pantanal. Vazante do Capivari (Caiman crocodilus yacare)", "item_url": "http://www.panoramio.com/photo/55016", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/55016.jpg", "longitude": -56.258326, "latitude": -18.771278, "width": 500, "height": 333, "upload_date": "30 September 2006", "owner_id": 7562, "owner_name": "Marcelo E. Salgado", "owner_url": "http://www.panoramio.com/user/7562"}
,
{"item_id": 1640188, "item_title": "Diagonal", "item_url": "http://www.panoramio.com/photo/1640188", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1640188.jpg", "longitude": 20.428219, "latitude": 48.953621, "width": 408, "height": 500, "upload_date": "05 April 2007", "owner_id": 346103, "owner_name": "lacitot", "owner_url": "http://www.panoramio.com/user/346103"}
,
{"item_id": 2935837, "item_title": "Aitzgorri. Atardecer mirando al sureste", "item_url": "http://www.panoramio.com/photo/2935837", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2935837.jpg", "longitude": -2.324939, "latitude": 42.951271, "width": 500, "height": 323, "upload_date": "25 June 2007", "owner_id": 129297, "owner_name": "Enrique Ortiz de ZÃ¡rate", "owner_url": "http://www.panoramio.com/user/129297"}
,
{"item_id": 355622, "item_title": "newfoundland iceberg", "item_url": "http://www.panoramio.com/photo/355622", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/355622.jpg", "longitude": -54.733200, "latitude": 49.710939, "width": 500, "height": 334, "upload_date": "09 January 2007", "owner_id": 69671, "owner_name": "illusandpics.com", "owner_url": "http://www.panoramio.com/user/69671"}
,
{"item_id": 202578, "item_title": "Abant Lake (1), Bolu", "item_url": "http://www.panoramio.com/photo/202578", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/202578.jpg", "longitude": 31.286316, "latitude": 40.612128, "width": 500, "height": 317, "upload_date": "21 December 2006", "owner_id": 2351, "owner_name": "Serdar Bilecen", "owner_url": "http://www.panoramio.com/user/2351"}
,
{"item_id": 9653590, "item_title": "Secret Gate, Kentriki - [ PANORAMIO APRIL 08 WINNERS]...by Fotinos", "item_url": "http://www.panoramio.com/photo/9653590", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/9653590.jpg", "longitude": 21.914872, "latitude": 38.571189, "width": 375, "height": 500, "upload_date": "24 April 2008", "owner_id": 1640258, "owner_name": "fotinos andreopoulos", "owner_url": "http://www.panoramio.com/user/1640258"}
,
{"item_id": 2371950, "item_title": "Dietro l'Isola dei Conigli", "item_url": "http://www.panoramio.com/photo/2371950", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2371950.jpg", "longitude": 12.552137, "latitude": 35.514553, "width": 500, "height": 375, "upload_date": "24 May 2007", "owner_id": 476623, "owner_name": "Giulio Botticelli", "owner_url": "http://www.panoramio.com/user/476623"}
,
{"item_id": 1340803, "item_title": "Huge oak in monochrome", "item_url": "http://www.panoramio.com/photo/1340803", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1340803.jpg", "longitude": 11.187515, "latitude": 59.548763, "width": 500, "height": 493, "upload_date": "15 March 2007", "owner_id": 39160, "owner_name": "Snemann", "owner_url": "http://www.panoramio.com/user/39160"}
,
{"item_id": 520878, "item_title": "Farewell", "item_url": "http://www.panoramio.com/photo/520878", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/520878.jpg", "longitude": 17.466202, "latitude": 47.870186, "width": 415, "height": 500, "upload_date": "21 January 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 4738479, "item_title": "\"SovÃ¡ny szÃ¡rcsavÃ¡gta\"", "item_url": "http://www.panoramio.com/photo/4738479", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4738479.jpg", "longitude": 17.571602, "latitude": 47.633354, "width": 500, "height": 347, "upload_date": "18 September 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 2395577, "item_title": "", "item_url": "http://www.panoramio.com/photo/2395577", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2395577.jpg", "longitude": -79.844792, "latitude": 43.300310, "width": 500, "height": 333, "upload_date": "25 May 2007", "owner_id": 17488, "owner_name": "John Gillett", "owner_url": "http://www.panoramio.com/user/17488"}
,
{"item_id": 2470351, "item_title": "Swans", "item_url": "http://www.panoramio.com/photo/2470351", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2470351.jpg", "longitude": 23.713217, "latitude": 56.965614, "width": 500, "height": 332, "upload_date": "30 May 2007", "owner_id": 116556, "owner_name": "Pavels Dunaicevs", "owner_url": "http://www.panoramio.com/user/116556"}
,
{"item_id": 6348257, "item_title": "Sunset-pallatic", "item_url": "http://www.panoramio.com/photo/6348257", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6348257.jpg", "longitude": 21.060791, "latitude": 42.004790, "width": 500, "height": 424, "upload_date": "07 December 2007", "owner_id": 695042, "owner_name": "Neim Sejfuli â™¦", "owner_url": "http://www.panoramio.com/user/695042"}
,
{"item_id": 10248178, "item_title": "LA LUZ DE LA MAÃ‘ANA", "item_url": "http://www.panoramio.com/photo/10248178", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/10248178.jpg", "longitude": -2.554321, "latitude": 43.209805, "width": 465, "height": 500, "upload_date": "15 May 2008", "owner_id": 1487989, "owner_name": "mesias", "owner_url": "http://www.panoramio.com/user/1487989"}
,
{"item_id": 1177785, "item_title": "Angkor Tom Dawn", "item_url": "http://www.panoramio.com/photo/1177785", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1177785.jpg", "longitude": 103.858910, "latitude": 13.441383, "width": 401, "height": 500, "upload_date": "05 March 2007", "owner_id": 243825, "owner_name": "DarrinJ", "owner_url": "http://www.panoramio.com/user/243825"}
,
{"item_id": 4785924, "item_title": "Antelope Canyon", "item_url": "http://www.panoramio.com/photo/4785924", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4785924.jpg", "longitude": -111.369422, "latitude": 36.853678, "width": 500, "height": 335, "upload_date": "20 September 2007", "owner_id": 464343, "owner_name": "yves floret", "owner_url": "http://www.panoramio.com/user/464343"}
,
{"item_id": 459592, "item_title": "nojiriko", "item_url": "http://www.panoramio.com/photo/459592", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/459592.jpg", "longitude": 138.140202, "latitude": 36.857510, "width": 500, "height": 383, "upload_date": "16 January 2007", "owner_id": 86411, "owner_name": "ä¸­æ‘è„©-Osamu nakamura", "owner_url": "http://www.panoramio.com/user/86411"}
,
{"item_id": 377931, "item_title": "Baobab Avenue after sunset", "item_url": "http://www.panoramio.com/photo/377931", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/377931.jpg", "longitude": 44.418486, "latitude": -20.250874, "width": 500, "height": 333, "upload_date": "11 January 2007", "owner_id": 70471, "owner_name": "David Thyberg", "owner_url": "http://www.panoramio.com/user/70471"}
,
{"item_id": 170330, "item_title": "Petit Palais - Looking Up", "item_url": "http://www.panoramio.com/photo/170330", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/170330.jpg", "longitude": 2.315115, "latitude": 48.866011, "width": 500, "height": 355, "upload_date": "17 December 2006", "owner_id": 5684, "owner_name": "Brent Townshend", "owner_url": "http://www.panoramio.com/user/5684"}
,
{"item_id": 5628541, "item_title": "Pittsburgh", "item_url": "http://www.panoramio.com/photo/5628541", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5628541.jpg", "longitude": -80.018985, "latitude": 40.438406, "width": 500, "height": 325, "upload_date": "30 October 2007", "owner_id": 31761, "owner_name": "Buck Cash", "owner_url": "http://www.panoramio.com/user/31761"}
,
{"item_id": 51101, "item_title": "Morgenstimmung zwischen Bru und Bordeyri ...", "item_url": "http://www.panoramio.com/photo/51101", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/51101.jpg", "longitude": -21.099930, "latitude": 65.205068, "width": 500, "height": 272, "upload_date": "23 September 2006", "owner_id": 7434, "owner_name": "baldinger reisen ag, waedenswil/switzerland", "owner_url": "http://www.panoramio.com/user/7434"}
,
{"item_id": 4352968, "item_title": "Coucher du soleil sur le lac du MÃ´le", "item_url": "http://www.panoramio.com/photo/4352968", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4352968.jpg", "longitude": 6.426079, "latitude": 46.137084, "width": 500, "height": 374, "upload_date": "03 September 2007", "owner_id": 359127, "owner_name": "wx", "owner_url": "http://www.panoramio.com/user/359127"}
,
{"item_id": 2345674, "item_title": "ÃlomvÃ¶lgy", "item_url": "http://www.panoramio.com/photo/2345674", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2345674.jpg", "longitude": 17.791328, "latitude": 47.343243, "width": 500, "height": 334, "upload_date": "22 May 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 3521484, "item_title": "Ki korÃ¡n kel...", "item_url": "http://www.panoramio.com/photo/3521484", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3521484.jpg", "longitude": 17.514782, "latitude": 47.744980, "width": 500, "height": 334, "upload_date": "25 July 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 8868820, "item_title": "Burime ne malin Shar-Winner March contest -2008 \"Scenery\" Categorie", "item_url": "http://www.panoramio.com/photo/8868820", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/8868820.jpg", "longitude": 20.884666, "latitude": 42.060318, "width": 375, "height": 500, "upload_date": "26 March 2008", "owner_id": 695042, "owner_name": "Neim Sejfuli â™¦", "owner_url": "http://www.panoramio.com/user/695042"}
,
{"item_id": 206560, "item_title": "Sumela Monastery", "item_url": "http://www.panoramio.com/photo/206560", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/206560.jpg", "longitude": 39.608116, "latitude": 40.770012, "width": 500, "height": 375, "upload_date": "21 December 2006", "owner_id": 2351, "owner_name": "Serdar Bilecen", "owner_url": "http://www.panoramio.com/user/2351"}
,
{"item_id": 1488354, "item_title": "", "item_url": "http://www.panoramio.com/photo/1488354", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1488354.jpg", "longitude": 138.213072, "latitude": 37.829921, "width": 500, "height": 336, "upload_date": "25 March 2007", "owner_id": 86411, "owner_name": "ä¸­æ‘è„©-Osamu nakamura", "owner_url": "http://www.panoramio.com/user/86411"}
,
{"item_id": 3334377, "item_title": "ROSENGARTEN", "item_url": "http://www.panoramio.com/photo/3334377", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3334377.jpg", "longitude": 11.591349, "latitude": 46.411603, "width": 500, "height": 375, "upload_date": "15 July 2007", "owner_id": 584241, "owner_name": "irene.italy", "owner_url": "http://www.panoramio.com/user/584241"}
,
{"item_id": 12668091, "item_title": "lago di Fedaia    -    2008 August NPC  subject Reflecting on reflection", "item_url": "http://www.panoramio.com/photo/12668091", "item_file_url": "http://static4.bareka.com/photos/medium/12668091.jpg", "longitude": 11.864547, "latitude": 46.460164, "width": 385, "height": 500, "upload_date": "31 July 2008", "owner_id": 6033, "owner_name": "â–º Marco Vanzo", "owner_url": "http://www.panoramio.com/user/6033"}
,
{"item_id": 11177556, "item_title": "Early morning ... :)", "item_url": "http://www.panoramio.com/photo/11177556", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/11177556.jpg", "longitude": 168.307543, "latitude": -46.578215, "width": 500, "height": 340, "upload_date": "13 June 2008", "owner_id": 1256771, "owner_name": "Zsuzsanna W", "owner_url": "http://www.panoramio.com/user/1256771"}
,
{"item_id": 67333, "item_title": "Laguna Colorada", "item_url": "http://www.panoramio.com/photo/67333", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/67333.jpg", "longitude": -67.798176, "latitude": -22.217285, "width": 375, "height": 500, "upload_date": "20 October 2006", "owner_id": 9080, "owner_name": "Marco Teodonio", "owner_url": "http://www.panoramio.com/user/9080"}
,
{"item_id": 2850309, "item_title": "Single tree...", "item_url": "http://www.panoramio.com/photo/2850309", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2850309.jpg", "longitude": 33.571987, "latitude": 27.130876, "width": 500, "height": 375, "upload_date": "20 June 2007", "owner_id": 399963, "owner_name": "Victor Galanin", "owner_url": "http://www.panoramio.com/user/399963"}
,
{"item_id": 1286406, "item_title": "Creation", "item_url": "http://www.panoramio.com/photo/1286406", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1286406.jpg", "longitude": 35.109558, "latitude": -1.460337, "width": 500, "height": 456, "upload_date": "12 March 2007", "owner_id": 232099, "owner_name": "mabut", "owner_url": "http://www.panoramio.com/user/232099"}
,
{"item_id": 4136208, "item_title": "MesÃ©l az erdÅ‘", "item_url": "http://www.panoramio.com/photo/4136208", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4136208.jpg", "longitude": 18.062897, "latitude": 47.274105, "width": 500, "height": 334, "upload_date": "23 August 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 8476696, "item_title": "Coucher de soleil sur Silhouette, Seychelles. Panoramio and ATP first CONTEST, March 2008, category Travel : awarded \"Runner Up\" (second Prize). Many thanks to all voters. #434", "item_url": "http://www.panoramio.com/photo/8476696", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/8476696.jpg", "longitude": 55.493660, "latitude": -4.563249, "width": 500, "height": 339, "upload_date": "12 March 2008", "owner_id": 666755, "owner_name": "Armagnac", "owner_url": "http://www.panoramio.com/user/666755"}
,
{"item_id": 6189344, "item_title": "Retenue Courchevel", "item_url": "http://www.panoramio.com/photo/6189344", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6189344.jpg", "longitude": 6.654494, "latitude": 45.385908, "width": 500, "height": 335, "upload_date": "28 November 2007", "owner_id": 464343, "owner_name": "yves floret", "owner_url": "http://www.panoramio.com/user/464343"}
,
{"item_id": 6934835, "item_title": "I feel shivers down my spine... (Coucher de soleil hivernal au cimetiÃ¨re du PÃ¨re Lachaise)", "item_url": "http://www.panoramio.com/photo/6934835", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6934835.jpg", "longitude": 2.389634, "latitude": 48.862132, "width": 500, "height": 384, "upload_date": "06 January 2008", "owner_id": 629243, "owner_name": "Olivier Faugeras", "owner_url": "http://www.panoramio.com/user/629243"}
,
{"item_id": 4214329, "item_title": "Sunrise of Huangshan", "item_url": "http://www.panoramio.com/photo/4214329", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4214329.jpg", "longitude": 118.282928, "latitude": 30.139189, "width": 500, "height": 313, "upload_date": "26 August 2007", "owner_id": 161470, "owner_name": "John Su", "owner_url": "http://www.panoramio.com/user/161470"}
,
{"item_id": 8846650, "item_title": "Vette Tempestose - Winner of Panoramio Contest of March 2008 - Travel category", "item_url": "http://www.panoramio.com/photo/8846650", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/8846650.jpg", "longitude": 8.456469, "latitude": 45.886752, "width": 500, "height": 215, "upload_date": "25 March 2008", "owner_id": 634000, "owner_name": "Â© Massimo De Candido", "owner_url": "http://www.panoramio.com/user/634000"}
,
{"item_id": 945986, "item_title": "Xerta taronja", "item_url": "http://www.panoramio.com/photo/945986", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/945986.jpg", "longitude": 0.483055, "latitude": 40.909102, "width": 500, "height": 377, "upload_date": "21 February 2007", "owner_id": 3022, "owner_name": "Arcadi", "owner_url": "http://www.panoramio.com/user/3022"}
,
{"item_id": 5108615, "item_title": "El Vado Lake, 1", "item_url": "http://www.panoramio.com/photo/5108615", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5108615.jpg", "longitude": -106.755394, "latitude": 36.594858, "width": 500, "height": 490, "upload_date": "05 October 2007", "owner_id": 213866, "owner_name": "Nicolas Mertens", "owner_url": "http://www.panoramio.com/user/213866"}
,
{"item_id": 6095512, "item_title": "before the snow came - Thunersee - in bad weather", "item_url": "http://www.panoramio.com/photo/6095512", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6095512.jpg", "longitude": 7.641592, "latitude": 46.744566, "width": 500, "height": 374, "upload_date": "24 November 2007", "owner_id": 635422, "owner_name": "â™« Swissmay", "owner_url": "http://www.panoramio.com/user/635422"}
,
{"item_id": 1541286, "item_title": "Wave3", "item_url": "http://www.panoramio.com/photo/1541286", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1541286.jpg", "longitude": -112.007471, "latitude": 36.994755, "width": 333, "height": 500, "upload_date": "29 March 2007", "owner_id": 40260, "owner_name": "Don Albonico", "owner_url": "http://www.panoramio.com/user/40260"}
,
{"item_id": 11309226, "item_title": "Sunset on Portsea", "item_url": "http://www.panoramio.com/photo/11309226", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/11309226.jpg", "longitude": 144.695692, "latitude": -38.330766, "width": 500, "height": 357, "upload_date": "18 June 2008", "owner_id": 140796, "owner_name": "rosina lamberti", "owner_url": "http://www.panoramio.com/user/140796"}
,
{"item_id": 76734, "item_title": "Buitre leonado", "item_url": "http://www.panoramio.com/photo/76734", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/76734.jpg", "longitude": -5.662347, "latitude": 36.522413, "width": 500, "height": 375, "upload_date": "05 November 2006", "owner_id": 473, "owner_name": "Juanlu", "owner_url": "http://www.panoramio.com/user/473"}
,
{"item_id": 196037, "item_title": "camello", "item_url": "http://www.panoramio.com/photo/196037", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/196037.jpg", "longitude": -3.776196, "latitude": 43.470686, "width": 500, "height": 332, "upload_date": "20 December 2006", "owner_id": 38804, "owner_name": "www.oscarsanchez.net", "owner_url": "http://www.panoramio.com/user/38804"}
,
{"item_id": 1338852, "item_title": "Stairs down to Praia dÃ© Paraiso", "item_url": "http://www.panoramio.com/photo/1338852", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1338852.jpg", "longitude": -8.475040, "latitude": 37.096924, "width": 332, "height": 500, "upload_date": "15 March 2007", "owner_id": 278074, "owner_name": "H. C. Steensen", "owner_url": "http://www.panoramio.com/user/278074"}
,
{"item_id": 1269734, "item_title": "Frosty fishermans boat, Nesseby, Finnmark, Norway", "item_url": "http://www.panoramio.com/photo/1269734", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1269734.jpg", "longitude": 28.851471, "latitude": 70.144796, "width": 500, "height": 323, "upload_date": "11 March 2007", "owner_id": 66734, "owner_name": "Svein Solhaug", "owner_url": "http://www.panoramio.com/user/66734"}
,
{"item_id": 1075687, "item_title": "Lake Como sunset", "item_url": "http://www.panoramio.com/photo/1075687", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1075687.jpg", "longitude": 9.285164, "latitude": 46.009839, "width": 500, "height": 332, "upload_date": "28 February 2007", "owner_id": 107359, "owner_name": "Ron Cooper", "owner_url": "http://www.panoramio.com/user/107359"}
,
{"item_id": 58363, "item_title": "Sonnenuntergang bei Bardolino", "item_url": "http://www.panoramio.com/photo/58363", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/58363.jpg", "longitude": 10.714073, "latitude": 45.556372, "width": 500, "height": 333, "upload_date": "07 October 2006", "owner_id": 8060, "owner_name": "Norbert MAIER", "owner_url": "http://www.panoramio.com/user/8060"}
,
{"item_id": 890788, "item_title": "KapliÄka", "item_url": "http://www.panoramio.com/photo/890788", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/890788.jpg", "longitude": 18.222713, "latitude": 49.491950, "width": 500, "height": 333, "upload_date": "19 February 2007", "owner_id": 187280, "owner_name": "Radek ÄŒampa", "owner_url": "http://www.panoramio.com/user/187280"}
,
{"item_id": 8730610, "item_title": "Antelope Canyon", "item_url": "http://www.panoramio.com/photo/8730610", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/8730610.jpg", "longitude": -111.415787, "latitude": 36.918058, "width": 375, "height": 500, "upload_date": "22 March 2008", "owner_id": 1465912, "owner_name": "funtor", "owner_url": "http://www.panoramio.com/user/1465912"}
,
{"item_id": 3008013, "item_title": "Infrared Mood of Peyto Lake", "item_url": "http://www.panoramio.com/photo/3008013", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3008013.jpg", "longitude": -116.509409, "latitude": 51.717989, "width": 500, "height": 334, "upload_date": "29 June 2007", "owner_id": 66847, "owner_name": "Lukas Novak", "owner_url": "http://www.panoramio.com/user/66847"}
,
{"item_id": 565018, "item_title": "Another one sunset in dubulti", "item_url": "http://www.panoramio.com/photo/565018", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/565018.jpg", "longitude": 23.765488, "latitude": 56.971626, "width": 500, "height": 333, "upload_date": "25 January 2007", "owner_id": 116556, "owner_name": "Pavels Dunaicevs", "owner_url": "http://www.panoramio.com/user/116556"}
,
{"item_id": 2217257, "item_title": "Csermely", "item_url": "http://www.panoramio.com/photo/2217257", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2217257.jpg", "longitude": 17.986851, "latitude": 47.273755, "width": 500, "height": 334, "upload_date": "14 May 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 3008041, "item_title": "Lake Louise", "item_url": "http://www.panoramio.com/photo/3008041", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3008041.jpg", "longitude": -116.219387, "latitude": 51.417409, "width": 500, "height": 335, "upload_date": "29 June 2007", "owner_id": 66847, "owner_name": "Lukas Novak", "owner_url": "http://www.panoramio.com/user/66847"}
,
{"item_id": 636724, "item_title": "Bora Bora JC", "item_url": "http://www.panoramio.com/photo/636724", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/636724.jpg", "longitude": -151.714239, "latitude": -16.475926, "width": 500, "height": 375, "upload_date": "31 January 2007", "owner_id": 131113, "owner_name": "Lair Jean Claude", "owner_url": "http://www.panoramio.com/user/131113"}
,
{"item_id": 511806, "item_title": "EzÃ¼sterdÅ‘", "item_url": "http://www.panoramio.com/photo/511806", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/511806.jpg", "longitude": 17.748070, "latitude": 47.273056, "width": 366, "height": 500, "upload_date": "21 January 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 727360, "item_title": "Hot croissant for breakfast - Crescent sunrise", "item_url": "http://www.panoramio.com/photo/727360", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/727360.jpg", "longitude": 19.053833, "latitude": 47.605512, "width": 500, "height": 311, "upload_date": "07 February 2007", "owner_id": 57869, "owner_name": "NAGY Albert", "owner_url": "http://www.panoramio.com/user/57869"}
,
{"item_id": 5148235, "item_title": "shinagawa", "item_url": "http://www.panoramio.com/photo/5148235", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5148235.jpg", "longitude": 139.741459, "latitude": 35.627460, "width": 500, "height": 500, "upload_date": "07 October 2007", "owner_id": 128403, "owner_name": "mechanics", "owner_url": "http://www.panoramio.com/user/128403"}
,
{"item_id": 2082127, "item_title": "Rejtelmes SzigetkÃ¶z", "item_url": "http://www.panoramio.com/photo/2082127", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2082127.jpg", "longitude": 17.508516, "latitude": 47.850088, "width": 500, "height": 316, "upload_date": "05 May 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 1589607, "item_title": "Baalbek - Temple of Bacchus - Giant Columns", "item_url": "http://www.panoramio.com/photo/1589607", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1589607.jpg", "longitude": 36.204404, "latitude": 34.006228, "width": 500, "height": 283, "upload_date": "01 April 2007", "owner_id": 73104, "owner_name": "zerega", "owner_url": "http://www.panoramio.com/user/73104"}
,
{"item_id": 410991, "item_title": "Burj al Arab", "item_url": "http://www.panoramio.com/photo/410991", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/410991.jpg", "longitude": 55.187352, "latitude": 25.139282, "width": 500, "height": 342, "upload_date": "13 January 2007", "owner_id": 82662, "owner_name": "Sven Goelles", "owner_url": "http://www.panoramio.com/user/82662"}
,
{"item_id": 6012, "item_title": "Rastoke", "item_url": "http://www.panoramio.com/photo/6012", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6012.jpg", "longitude": 15.584493, "latitude": 45.119144, "width": 343, "height": 500, "upload_date": "18 December 2005", "owner_id": 989, "owner_name": "Mrgud", "owner_url": "http://www.panoramio.com/user/989"}
,
{"item_id": 4989314, "item_title": "Range of Light", "item_url": "http://www.panoramio.com/photo/4989314", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4989314.jpg", "longitude": -118.597283, "latitude": 37.234360, "width": 500, "height": 357, "upload_date": "29 September 2007", "owner_id": 376395, "owner_name": "JeffSullivan (www.MyPhotoGuides.com)", "owner_url": "http://www.panoramio.com/user/376395"}
,
{"item_id": 2115987, "item_title": "La Croix de Brume", "item_url": "http://www.panoramio.com/photo/2115987", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2115987.jpg", "longitude": 0.341520, "latitude": 44.859519, "width": 409, "height": 500, "upload_date": "07 May 2007", "owner_id": 372189, "owner_name": "PhilÂ©", "owner_url": "http://www.panoramio.com/user/372189"}
,
{"item_id": 229544, "item_title": "VRT RTBf Toren", "item_url": "http://www.panoramio.com/photo/229544", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/229544.jpg", "longitude": 4.401634, "latitude": 50.852972, "width": 333, "height": 500, "upload_date": "24 December 2006", "owner_id": 7464, "owner_name": "Pieter", "owner_url": "http://www.panoramio.com/user/7464"}
,
{"item_id": 58283, "item_title": "Weg", "item_url": "http://www.panoramio.com/photo/58283", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/58283.jpg", "longitude": 12.898464, "latitude": 48.059496, "width": 500, "height": 333, "upload_date": "07 October 2006", "owner_id": 8060, "owner_name": "Norbert MAIER", "owner_url": "http://www.panoramio.com/user/8060"}
,
{"item_id": 112110, "item_title": "Toronto_CN-Tower", "item_url": "http://www.panoramio.com/photo/112110", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/112110.jpg", "longitude": -79.386907, "latitude": 43.641805, "width": 500, "height": 375, "upload_date": "11 December 2006", "owner_id": 17488, "owner_name": "John Gillett", "owner_url": "http://www.panoramio.com/user/17488"}
,
{"item_id": 4446966, "item_title": "ÃlmodÃ³ folyÃ³", "item_url": "http://www.panoramio.com/photo/4446966", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4446966.jpg", "longitude": 17.454357, "latitude": 47.881470, "width": 500, "height": 375, "upload_date": "06 September 2007", "owner_id": 182660, "owner_name": "BÃ¡lint TÃ¼nde", "owner_url": "http://www.panoramio.com/user/182660"}
,
{"item_id": 91966, "item_title": "Bled (Slovenia)", "item_url": "http://www.panoramio.com/photo/91966", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/91966.jpg", "longitude": 14.087219, "latitude": 46.358184, "width": 500, "height": 375, "upload_date": "04 December 2006", "owner_id": 11403, "owner_name": "ArnÃ¡iz", "owner_url": "http://www.panoramio.com/user/11403"}
,
{"item_id": 6013503, "item_title": "Kapelle bei BÃ¶hmenkirch", "item_url": "http://www.panoramio.com/photo/6013503", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6013503.jpg", "longitude": 9.943142, "latitude": 48.694756, "width": 500, "height": 375, "upload_date": "19 November 2007", "owner_id": 424589, "owner_name": "PeSchn", "owner_url": "http://www.panoramio.com/user/424589"}
,
{"item_id": 1781593, "item_title": "Medusa's Sandbox", "item_url": "http://www.panoramio.com/photo/1781593", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1781593.jpg", "longitude": -112.006624, "latitude": 36.995852, "width": 375, "height": 500, "upload_date": "15 April 2007", "owner_id": 376395, "owner_name": "JeffSullivan (www.MyPhotoGuides.com)", "owner_url": "http://www.panoramio.com/user/376395"}
,
{"item_id": 704119, "item_title": "IzzÃ³ Adria", "item_url": "http://www.panoramio.com/photo/704119", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/704119.jpg", "longitude": 17.056789, "latitude": 43.272206, "width": 500, "height": 285, "upload_date": "05 February 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 85624, "item_title": "Isla del Fraile Ãguilas", "item_url": "http://www.panoramio.com/photo/85624", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/85624.jpg", "longitude": -0.722609, "latitude": 37.924329, "width": 500, "height": 298, "upload_date": "24 November 2006", "owner_id": 10969, "owner_name": "Juanra", "owner_url": "http://www.panoramio.com/user/10969"}
,
{"item_id": 52350, "item_title": "Cataratas del IguazÃº. Brasil", "item_url": "http://www.panoramio.com/photo/52350", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/52350.jpg", "longitude": -54.439831, "latitude": -25.687422, "width": 500, "height": 333, "upload_date": "25 September 2006", "owner_id": 6961, "owner_name": "Santiago Rios", "owner_url": "http://www.panoramio.com/user/6961"}
,
{"item_id": 36482, "item_title": "Rovinj Harbour", "item_url": "http://www.panoramio.com/photo/36482", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/36482.jpg", "longitude": 13.632714, "latitude": 45.083938, "width": 500, "height": 332, "upload_date": "02 August 2006", "owner_id": 5703, "owner_name": "dancer", "owner_url": "http://www.panoramio.com/user/5703"}
,
{"item_id": 7251846, "item_title": "AzÃ©rt a vÃ­z az Ãºr", "item_url": "http://www.panoramio.com/photo/7251846", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/7251846.jpg", "longitude": 17.629623, "latitude": 47.687334, "width": 500, "height": 329, "upload_date": "20 January 2008", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 1551756, "item_title": "Templestowe", "item_url": "http://www.panoramio.com/photo/1551756", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1551756.jpg", "longitude": 145.116667, "latitude": -37.750000, "width": 500, "height": 298, "upload_date": "30 March 2007", "owner_id": 140796, "owner_name": "rosina lamberti", "owner_url": "http://www.panoramio.com/user/140796"}
,
{"item_id": 2397841, "item_title": "Storm Season II", "item_url": "http://www.panoramio.com/photo/2397841", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2397841.jpg", "longitude": -122.439870, "latitude": 37.427928, "width": 407, "height": 500, "upload_date": "26 May 2007", "owner_id": 107613, "owner_name": "Tom Grubbe", "owner_url": "http://www.panoramio.com/user/107613"}
,
{"item_id": 1237915, "item_title": "Chlum u Trebone", "item_url": "http://www.panoramio.com/photo/1237915", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1237915.jpg", "longitude": 14.923811, "latitude": 48.960159, "width": 500, "height": 429, "upload_date": "09 March 2007", "owner_id": 235166, "owner_name": "jirivrobel", "owner_url": "http://www.panoramio.com/user/235166"}
,
{"item_id": 359324, "item_title": "Abstraktion in der Kirche von Mogno, Tessin .......", "item_url": "http://www.panoramio.com/photo/359324", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/359324.jpg", "longitude": 8.663492, "latitude": 46.430966, "width": 500, "height": 380, "upload_date": "09 January 2007", "owner_id": 7434, "owner_name": "baldinger reisen ag, waedenswil/switzerland", "owner_url": "http://www.panoramio.com/user/7434"}
,
{"item_id": 483742, "item_title": "Venus at Haleakala", "item_url": "http://www.panoramio.com/photo/483742", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/483742.jpg", "longitude": -156.239491, "latitude": 20.707468, "width": 500, "height": 375, "upload_date": "18 January 2007", "owner_id": 100907, "owner_name": "Julia Wahl", "owner_url": "http://www.panoramio.com/user/100907"}
,
{"item_id": 1087397, "item_title": "Fjellbjerk (Betula) SnÃ¸hetta mountain in the background", "item_url": "http://www.panoramio.com/photo/1087397", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1087397.jpg", "longitude": 9.555531, "latitude": 62.240111, "width": 500, "height": 333, "upload_date": "28 February 2007", "owner_id": 223406, "owner_name": "Sigmund Rise", "owner_url": "http://www.panoramio.com/user/223406"}
,
{"item_id": 2846123, "item_title": "æ–°æ½Ÿã€€å°åƒè°·ã€€é¢¨èˆ¹ä¸€æ†ã€€2003ã€€niigata ojiya balloonã€€riot     Fireworks", "item_url": "http://www.panoramio.com/photo/2846123", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2846123.jpg", "longitude": 138.791313, "latitude": 37.289350, "width": 500, "height": 497, "upload_date": "20 June 2007", "owner_id": 446937, "owner_name": "y_komatsu", "owner_url": "http://www.panoramio.com/user/446937"}
,
{"item_id": 2533559, "item_title": "Great Idea ! DonÂ´t do it !!!", "item_url": "http://www.panoramio.com/photo/2533559", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2533559.jpg", "longitude": -35.036988, "latitude": -6.241628, "width": 500, "height": 308, "upload_date": "02 June 2007", "owner_id": 1908, "owner_name": "Cleber Lima", "owner_url": "http://www.panoramio.com/user/1908"}
,
{"item_id": 86246, "item_title": "Salinas de Santa Pola", "item_url": "http://www.panoramio.com/photo/86246", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/86246.jpg", "longitude": -0.528374, "latitude": 38.230090, "width": 500, "height": 333, "upload_date": "25 November 2006", "owner_id": 10969, "owner_name": "Juanra", "owner_url": "http://www.panoramio.com/user/10969"}
,
{"item_id": 405740, "item_title": "fudoutaki", "item_url": "http://www.panoramio.com/photo/405740", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/405740.jpg", "longitude": 139.502249, "latitude": 37.580909, "width": 500, "height": 394, "upload_date": "13 January 2007", "owner_id": 86411, "owner_name": "ä¸­æ‘è„©-Osamu nakamura", "owner_url": "http://www.panoramio.com/user/86411"}
,
{"item_id": 12848417, "item_title": "Niedrigwasser an der Elbe-Dresden", "item_url": "http://www.panoramio.com/photo/12848417", "item_file_url": "http://static2.bareka.com/photos/medium/12848417.jpg", "longitude": 13.745323, "latitude": 51.055093, "width": 500, "height": 268, "upload_date": "05 August 2008", "owner_id": 1465912, "owner_name": "funtor", "owner_url": "http://www.panoramio.com/user/1465912"}
,
{"item_id": 291091, "item_title": "Imperia Porto Maurizio Puesta del Sol al Prino", "item_url": "http://www.panoramio.com/photo/291091", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/291091.jpg", "longitude": 8.006684, "latitude": 43.869312, "width": 500, "height": 465, "upload_date": "03 January 2007", "owner_id": 60898, "owner_name": "esseil", "owner_url": "http://www.panoramio.com/user/60898"}
,
{"item_id": 1183261, "item_title": "Az Ã³perenciÃ¡n innen", "item_url": "http://www.panoramio.com/photo/1183261", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1183261.jpg", "longitude": 15.823574, "latitude": 43.708462, "width": 500, "height": 312, "upload_date": "05 March 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 1637150, "item_title": "Vista del Misti por encima de las nubes", "item_url": "http://www.panoramio.com/photo/1637150", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1637150.jpg", "longitude": -71.414566, "latitude": -16.300040, "width": 500, "height": 333, "upload_date": "05 April 2007", "owner_id": 328178, "owner_name": "MarivÃ­ JimÃ©nez", "owner_url": "http://www.panoramio.com/user/328178"}
,
{"item_id": 507703, "item_title": "Csendes vizek", "item_url": "http://www.panoramio.com/photo/507703", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/507703.jpg", "longitude": 17.568769, "latitude": 47.633586, "width": 500, "height": 349, "upload_date": "20 January 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 55100, "item_title": "Ballesvikskardet", "item_url": "http://www.panoramio.com/photo/55100", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/55100.jpg", "longitude": 17.122707, "latitude": 69.352910, "width": 500, "height": 375, "upload_date": "30 September 2006", "owner_id": 3574, "owner_name": "blackone", "owner_url": "http://www.panoramio.com/user/3574"}
,
{"item_id": 291648, "item_title": "Galway Cathedral", "item_url": "http://www.panoramio.com/photo/291648", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/291648.jpg", "longitude": -9.057664, "latitude": 53.275627, "width": 500, "height": 336, "upload_date": "03 January 2007", "owner_id": 61285, "owner_name": "kamil krawczak", "owner_url": "http://www.panoramio.com/user/61285"}
,
{"item_id": 5285701, "item_title": "Another South Sister reflecting in Sparks Lake", "item_url": "http://www.panoramio.com/photo/5285701", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5285701.jpg", "longitude": -121.737549, "latitude": 44.014176, "width": 500, "height": 334, "upload_date": "13 October 2007", "owner_id": 128746, "owner_name": "Â© Michael Hatten", "owner_url": "http://www.panoramio.com/user/128746"}
,
{"item_id": 761958, "item_title": "Lake OulujÃ¤rvi", "item_url": "http://www.panoramio.com/photo/761958", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/761958.jpg", "longitude": 27.339649, "latitude": 64.231986, "width": 375, "height": 500, "upload_date": "10 February 2007", "owner_id": 151444, "owner_name": "Timo Rossi", "owner_url": "http://www.panoramio.com/user/151444"}
,
{"item_id": 3853459, "item_title": "Its great to be a swan on Hawn Pawn!", "item_url": "http://www.panoramio.com/photo/3853459", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3853459.jpg", "longitude": -71.154628, "latitude": 42.470625, "width": 389, "height": 500, "upload_date": "10 August 2007", "owner_id": 286174, "owner_name": "kamaly", "owner_url": "http://www.panoramio.com/user/286174"}
,
{"item_id": 4610197, "item_title": "Yosemite Valley with Fallen Redwood from V11", "item_url": "http://www.panoramio.com/photo/4610197", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4610197.jpg", "longitude": -119.661703, "latitude": 37.717214, "width": 500, "height": 281, "upload_date": "12 September 2007", "owner_id": 339677, "owner_name": "Chip Stephan", "owner_url": "http://www.panoramio.com/user/339677"}
,
{"item_id": 5700759, "item_title": "Crete senesi", "item_url": "http://www.panoramio.com/photo/5700759", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5700759.jpg", "longitude": 11.448483, "latitude": 43.280205, "width": 500, "height": 304, "upload_date": "02 November 2007", "owner_id": 158718, "owner_name": "giulio colla", "owner_url": "http://www.panoramio.com/user/158718"}
,
{"item_id": 1391775, "item_title": "Arboles al atardecer en Chapala - Trees at sunset in Chapala Lake", "item_url": "http://www.panoramio.com/photo/1391775", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1391775.jpg", "longitude": -102.775211, "latitude": 20.308730, "width": 500, "height": 341, "upload_date": "19 March 2007", "owner_id": 291650, "owner_name": "J.Ernesto Ortiz Razo", "owner_url": "http://www.panoramio.com/user/291650"}
,
{"item_id": 57514, "item_title": "Limone 1", "item_url": "http://www.panoramio.com/photo/57514", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/57514.jpg", "longitude": 10.792179, "latitude": 45.816298, "width": 500, "height": 333, "upload_date": "04 October 2006", "owner_id": 8060, "owner_name": "Norbert MAIER", "owner_url": "http://www.panoramio.com/user/8060"}
,
{"item_id": 2602937, "item_title": "Alone", "item_url": "http://www.panoramio.com/photo/2602937", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2602937.jpg", "longitude": -4.001770, "latitude": 31.174035, "width": 500, "height": 320, "upload_date": "06 June 2007", "owner_id": 232099, "owner_name": "mabut", "owner_url": "http://www.panoramio.com/user/232099"}
,
{"item_id": 117465, "item_title": "New York in the Afternoon...from Soho.. by Jeremiah Christopher", "item_url": "http://www.panoramio.com/photo/117465", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/117465.jpg", "longitude": -74.003212, "latitude": 40.724059, "width": 500, "height": 375, "upload_date": "11 December 2006", "owner_id": 16869, "owner_name": "Jeremiah Christopher", "owner_url": "http://www.panoramio.com/user/16869"}
,
{"item_id": 1331707, "item_title": "Kastellet (Copenhagen fortress), Aerial", "item_url": "http://www.panoramio.com/photo/1331707", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1331707.jpg", "longitude": 12.594967, "latitude": 55.691230, "width": 500, "height": 332, "upload_date": "15 March 2007", "owner_id": 278074, "owner_name": "H. C. Steensen", "owner_url": "http://www.panoramio.com/user/278074"}
,
{"item_id": 11853382, "item_title": "Railroads by Sunset/ Schienen bei Sonnenuntergang", "item_url": "http://www.panoramio.com/photo/11853382", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/11853382.jpg", "longitude": 8.283455, "latitude": 51.692644, "width": 500, "height": 332, "upload_date": "06 July 2008", "owner_id": 564436, "owner_name": "Thomas Splietker", "owner_url": "http://www.panoramio.com/user/564436"}
,
{"item_id": 1558288, "item_title": "Notre-Dame et Tour Saint Jacques", "item_url": "http://www.panoramio.com/photo/1558288", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1558288.jpg", "longitude": 2.354808, "latitude": 48.850399, "width": 500, "height": 333, "upload_date": "30 March 2007", "owner_id": 78506, "owner_name": "Philippe Stoop", "owner_url": "http://www.panoramio.com/user/78506"}
,
{"item_id": 7601425, "item_title": "Venezianische Impressionen", "item_url": "http://www.panoramio.com/photo/7601425", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/7601425.jpg", "longitude": 12.337024, "latitude": 45.432280, "width": 500, "height": 385, "upload_date": "05 February 2008", "owner_id": 696605, "owner_name": "Â© alfredschaffer", "owner_url": "http://www.panoramio.com/user/696605"}
,
{"item_id": 36386, "item_title": "Half Dome Cables", "item_url": "http://www.panoramio.com/photo/36386", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/36386.jpg", "longitude": -119.530735, "latitude": 37.746710, "width": 333, "height": 500, "upload_date": "02 August 2006", "owner_id": 5684, "owner_name": "Brent Townshend", "owner_url": "http://www.panoramio.com/user/5684"}
,
{"item_id": 1089570, "item_title": "Titokzatos reggel", "item_url": "http://www.panoramio.com/photo/1089570", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1089570.jpg", "longitude": 17.467575, "latitude": 47.870532, "width": 500, "height": 331, "upload_date": "28 February 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 575276, "item_title": "Sunrise", "item_url": "http://www.panoramio.com/photo/575276", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/575276.jpg", "longitude": 2.288809, "latitude": 48.861892, "width": 500, "height": 349, "upload_date": "26 January 2007", "owner_id": 123518, "owner_name": "ERic Pouhier ericpouhier.com", "owner_url": "http://www.panoramio.com/user/123518"}
,
{"item_id": 486480, "item_title": "Monte Generoso", "item_url": "http://www.panoramio.com/photo/486480", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/486480.jpg", "longitude": 9.015055, "latitude": 45.924826, "width": 428, "height": 500, "upload_date": "19 January 2007", "owner_id": 24068, "owner_name": "Daniele Nasi", "owner_url": "http://www.panoramio.com/user/24068"}
,
{"item_id": 1100378, "item_title": "Rensbekksetra (summer pasture)", "item_url": "http://www.panoramio.com/photo/1100378", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1100378.jpg", "longitude": 9.293404, "latitude": 62.712731, "width": 500, "height": 255, "upload_date": "01 March 2007", "owner_id": 223406, "owner_name": "Sigmund Rise", "owner_url": "http://www.panoramio.com/user/223406"}
,
{"item_id": 5844316, "item_title": "Hikarigaoka IMA", "item_url": "http://www.panoramio.com/photo/5844316", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5844316.jpg", "longitude": 139.630048, "latitude": 35.758154, "width": 500, "height": 326, "upload_date": "11 November 2007", "owner_id": 558055, "owner_name": "www.tokyoform.com", "owner_url": "http://www.panoramio.com/user/558055"}
,
{"item_id": 1345372, "item_title": "Sunset, Foeniculum vulgare (fennel, is one likely candidate)", "item_url": "http://www.panoramio.com/photo/1345372", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1345372.jpg", "longitude": 10.727119, "latitude": 55.205080, "width": 332, "height": 500, "upload_date": "16 March 2007", "owner_id": 278074, "owner_name": "H. C. Steensen", "owner_url": "http://www.panoramio.com/user/278074"}
,
{"item_id": 1317735, "item_title": "Motu of Bora Bora", "item_url": "http://www.panoramio.com/photo/1317735", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1317735.jpg", "longitude": -151.698360, "latitude": -16.495843, "width": 500, "height": 355, "upload_date": "14 March 2007", "owner_id": 232099, "owner_name": "mabut", "owner_url": "http://www.panoramio.com/user/232099"}
,
{"item_id": 1012093, "item_title": "Sunrise from the east side of Longs Peak", "item_url": "http://www.panoramio.com/photo/1012093", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1012093.jpg", "longitude": -105.542564, "latitude": 40.274549, "width": 374, "height": 500, "upload_date": "25 February 2007", "owner_id": 87752, "owner_name": "Richard Ryer", "owner_url": "http://www.panoramio.com/user/87752"}
,
{"item_id": 5035419, "item_title": "Basilica de San Basilio (Moscow)", "item_url": "http://www.panoramio.com/photo/5035419", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5035419.jpg", "longitude": 37.622852, "latitude": 55.752622, "width": 398, "height": 500, "upload_date": "01 October 2007", "owner_id": 83865, "owner_name": "Epi F.Villanueva", "owner_url": "http://www.panoramio.com/user/83865"}
,
{"item_id": 799910, "item_title": "A Dramatic Turn of the Yangtze River", "item_url": "http://www.panoramio.com/photo/799910", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/799910.jpg", "longitude": 99.272633, "latitude": 28.255552, "width": 500, "height": 226, "upload_date": "13 February 2007", "owner_id": 164125, "owner_name": "DannyXu", "owner_url": "http://www.panoramio.com/user/164125"}
,
{"item_id": 765388, "item_title": "Leh", "item_url": "http://www.panoramio.com/photo/765388", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/765388.jpg", "longitude": 77.587509, "latitude": 34.164943, "width": 500, "height": 333, "upload_date": "10 February 2007", "owner_id": 78506, "owner_name": "Philippe Stoop", "owner_url": "http://www.panoramio.com/user/78506"}
,
{"item_id": 2875857, "item_title": "Elgol, Isle of Skye", "item_url": "http://www.panoramio.com/photo/2875857", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2875857.jpg", "longitude": -6.107025, "latitude": 57.150023, "width": 500, "height": 500, "upload_date": "22 June 2007", "owner_id": 588149, "owner_name": "Adam Salwanowicz", "owner_url": "http://www.panoramio.com/user/588149"}
,
{"item_id": 840915, "item_title": "Island of The Day Before", "item_url": "http://www.panoramio.com/photo/840915", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/840915.jpg", "longitude": 27.436638, "latitude": 42.441448, "width": 500, "height": 333, "upload_date": "16 February 2007", "owner_id": 16880, "owner_name": "evgenidinev.com", "owner_url": "http://www.panoramio.com/user/16880"}
,
{"item_id": 1459925, "item_title": "The last ray", "item_url": "http://www.panoramio.com/photo/1459925", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1459925.jpg", "longitude": -110.134850, "latitude": 36.955379, "width": 500, "height": 290, "upload_date": "23 March 2007", "owner_id": 232099, "owner_name": "mabut", "owner_url": "http://www.panoramio.com/user/232099"}
,
{"item_id": 872177, "item_title": "Sahara Desert sunrise, Chott el Jerid, near Kebili, Tunisia, 1/2007", "item_url": "http://www.panoramio.com/photo/872177", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/872177.jpg", "longitude": 8.475866, "latitude": 33.930898, "width": 500, "height": 375, "upload_date": "18 February 2007", "owner_id": 183521, "owner_name": "SteveT", "owner_url": "http://www.panoramio.com/user/183521"}
,
{"item_id": 405753, "item_title": "sinanogawa", "item_url": "http://www.panoramio.com/photo/405753", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/405753.jpg", "longitude": 138.822384, "latitude": 37.268589, "width": 500, "height": 386, "upload_date": "13 January 2007", "owner_id": 86411, "owner_name": "ä¸­æ‘è„©-Osamu nakamura", "owner_url": "http://www.panoramio.com/user/86411"}
,
{"item_id": 548240, "item_title": "Old Bagan 2002", "item_url": "http://www.panoramio.com/photo/548240", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/548240.jpg", "longitude": 94.825230, "latitude": 21.137026, "width": 500, "height": 375, "upload_date": "23 January 2007", "owner_id": 64758, "owner_name": "Joly David", "owner_url": "http://www.panoramio.com/user/64758"}
,
{"item_id": 4868105, "item_title": "Bled lake", "item_url": "http://www.panoramio.com/photo/4868105", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4868105.jpg", "longitude": 14.104900, "latitude": 46.369793, "width": 500, "height": 333, "upload_date": "24 September 2007", "owner_id": 989, "owner_name": "Mrgud", "owner_url": "http://www.panoramio.com/user/989"}
,
{"item_id": 549396, "item_title": "RÃ¥kneset on Storfjellet island, RÃ¸st", "item_url": "http://www.panoramio.com/photo/549396", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/549396.jpg", "longitude": 11.932955, "latitude": 67.457456, "width": 500, "height": 375, "upload_date": "23 January 2007", "owner_id": 95799, "owner_name": "Owen Morgan", "owner_url": "http://www.panoramio.com/user/95799"}
,
{"item_id": 196121, "item_title": "canallave", "item_url": "http://www.panoramio.com/photo/196121", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/196121.jpg", "longitude": -3.960571, "latitude": 43.452358, "width": 500, "height": 332, "upload_date": "20 December 2006", "owner_id": 38804, "owner_name": "www.oscarsanchez.net", "owner_url": "http://www.panoramio.com/user/38804"}
,
{"item_id": 2422299, "item_title": "Pacific Weather", "item_url": "http://www.panoramio.com/photo/2422299", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2422299.jpg", "longitude": -124.097099, "latitude": 44.345704, "width": 500, "height": 333, "upload_date": "27 May 2007", "owner_id": 66847, "owner_name": "Lukas Novak", "owner_url": "http://www.panoramio.com/user/66847"}
,
{"item_id": 821291, "item_title": "Ð¥Ñ€Ð°Ð¼ Ð’Ð°ÑÐ¸Ð»Ð¸Ñ Ð‘Ð»Ð°Ð¶ÐµÐ½Ð½Ð¾Ð³Ð¾ (ÐœÐ¾ÑÐºÐ²Ð°, Ð½Ð¾ÑÐ±Ñ€ÑŒ 2006 Ð³Ð¾Ð´Ð°)", "item_url": "http://www.panoramio.com/photo/821291", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/821291.jpg", "longitude": 37.622954, "latitude": 55.752613, "width": 500, "height": 375, "upload_date": "14 February 2007", "owner_id": 55593, "owner_name": "pokatut.photosight.ru", "owner_url": "http://www.panoramio.com/user/55593"}
,
{"item_id": 3545143, "item_title": "Rainbow  (Regnbue)", "item_url": "http://www.panoramio.com/photo/3545143", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3545143.jpg", "longitude": 8.598175, "latitude": 62.904445, "width": 500, "height": 223, "upload_date": "26 July 2007", "owner_id": 343934, "owner_name": "AsbjÃ¸rn999", "owner_url": "http://www.panoramio.com/user/343934"}
,
{"item_id": 1794618, "item_title": "TÃºlÃ©lÅ‘k", "item_url": "http://www.panoramio.com/photo/1794618", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1794618.jpg", "longitude": 20.803127, "latitude": 48.014157, "width": 399, "height": 500, "upload_date": "15 April 2007", "owner_id": 346103, "owner_name": "lacitot", "owner_url": "http://www.panoramio.com/user/346103"}
,
{"item_id": 3904091, "item_title": "Hajnali utakon", "item_url": "http://www.panoramio.com/photo/3904091", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3904091.jpg", "longitude": 17.512014, "latitude": 47.850319, "width": 500, "height": 334, "upload_date": "13 August 2007", "owner_id": 689769, "owner_name": "Ponty IstvÃ¡n", "owner_url": "http://www.panoramio.com/user/689769"}
,
{"item_id": 5649508, "item_title": "Quiet morning", "item_url": "http://www.panoramio.com/photo/5649508", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5649508.jpg", "longitude": 12.190876, "latitude": 49.357446, "width": 500, "height": 333, "upload_date": "31 October 2007", "owner_id": 696605, "owner_name": "Â© alfredschaffer", "owner_url": "http://www.panoramio.com/user/696605"}
,
{"item_id": 7938965, "item_title": "Pattaya - Big Buddha - Big Buddha Hill", "item_url": "http://www.panoramio.com/photo/7938965", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/7938965.jpg", "longitude": 100.868343, "latitude": 12.914107, "width": 500, "height": 375, "upload_date": "19 February 2008", "owner_id": 716245, "owner_name": "â€”Dragon-64â€” âœˆ", "owner_url": "http://www.panoramio.com/user/716245"}
,
{"item_id": 497056, "item_title": "Japanese Garden maple", "item_url": "http://www.panoramio.com/photo/497056", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/497056.jpg", "longitude": -122.707999, "latitude": 45.518810, "width": 500, "height": 300, "upload_date": "20 January 2007", "owner_id": 107359, "owner_name": "Ron Cooper", "owner_url": "http://www.panoramio.com/user/107359"}
,
{"item_id": 438699, "item_title": "White Sand Dunes", "item_url": "http://www.panoramio.com/photo/438699", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/438699.jpg", "longitude": -106.262083, "latitude": 32.799324, "width": 371, "height": 500, "upload_date": "15 January 2007", "owner_id": 93560, "owner_name": "Alex Petrov", "owner_url": "http://www.panoramio.com/user/93560"}
,
{"item_id": 2082221, "item_title": "\"BekÃ¶tÃ¶tt szemmel\"", "item_url": "http://www.panoramio.com/photo/2082221", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2082221.jpg", "longitude": 17.660522, "latitude": 47.604543, "width": 500, "height": 334, "upload_date": "05 May 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 5836484, "item_title": "An Autumn's golden dawn on the Lake of Varese", "item_url": "http://www.panoramio.com/photo/5836484", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5836484.jpg", "longitude": 8.718081, "latitude": 45.838966, "width": 500, "height": 312, "upload_date": "11 November 2007", "owner_id": 933456, "owner_name": "Â© Marco De Candido", "owner_url": "http://www.panoramio.com/user/933456"}
,
{"item_id": 5204696, "item_title": "Scotland", "item_url": "http://www.panoramio.com/photo/5204696", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5204696.jpg", "longitude": -5.078773, "latitude": 56.558726, "width": 500, "height": 254, "upload_date": "09 October 2007", "owner_id": 588149, "owner_name": "Adam Salwanowicz", "owner_url": "http://www.panoramio.com/user/588149"}
,
{"item_id": 1343454, "item_title": "Ð’ÑƒÐ»ÐºÐ°Ð½ ÐšÐ°Ñ€Ñ‹Ð¼ÑÐºÐ¸Ð¹", "item_url": "http://www.panoramio.com/photo/1343454", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1343454.jpg", "longitude": 159.480286, "latitude": 54.025470, "width": 364, "height": 500, "upload_date": "16 March 2007", "owner_id": 268724, "owner_name": "Korotnev AV", "owner_url": "http://www.panoramio.com/user/268724"}
,
{"item_id": 507424, "item_title": "LankÃ¡k, Ã­vek, felhÅ‘Ã¡rnyak", "item_url": "http://www.panoramio.com/photo/507424", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/507424.jpg", "longitude": 17.967281, "latitude": 47.318112, "width": 500, "height": 291, "upload_date": "20 January 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 5893176, "item_title": "07-06-11_Camino de Santiago, Castrojeriz_PIXELECTA", "item_url": "http://www.panoramio.com/photo/5893176", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5893176.jpg", "longitude": -4.182916, "latitude": 42.285723, "width": 500, "height": 333, "upload_date": "13 November 2007", "owner_id": 163655, "owner_name": "[[[   PIXELECTA   ]]]", "owner_url": "http://www.panoramio.com/user/163655"}
,
{"item_id": 186685, "item_title": "People of Petra, the boy and his job", "item_url": "http://www.panoramio.com/photo/186685", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/186685.jpg", "longitude": 35.437002, "latitude": 30.322285, "width": 500, "height": 375, "upload_date": "19 December 2006", "owner_id": 24068, "owner_name": "Daniele Nasi", "owner_url": "http://www.panoramio.com/user/24068"}
,
{"item_id": 355648, "item_title": "puerto-rico el-yunque", "item_url": "http://www.panoramio.com/photo/355648", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/355648.jpg", "longitude": -65.788536, "latitude": 18.298795, "width": 500, "height": 334, "upload_date": "09 January 2007", "owner_id": 69671, "owner_name": "illusandpics.com", "owner_url": "http://www.panoramio.com/user/69671"}
,
{"item_id": 46913, "item_title": "beachy head", "item_url": "http://www.panoramio.com/photo/46913", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/46913.jpg", "longitude": 0.216272, "latitude": 50.737969, "width": 500, "height": 291, "upload_date": "11 September 2006", "owner_id": 2575, "owner_name": "mikel ortega", "owner_url": "http://www.panoramio.com/user/2575"}
,
{"item_id": 6012999, "item_title": "Wetterumschwung in Murano", "item_url": "http://www.panoramio.com/photo/6012999", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6012999.jpg", "longitude": 12.357838, "latitude": 45.457557, "width": 500, "height": 336, "upload_date": "19 November 2007", "owner_id": 8060, "owner_name": "Norbert MAIER", "owner_url": "http://www.panoramio.com/user/8060"}
,
{"item_id": 590422, "item_title": "Gyilkos-tÃ³ (Killer Lake) - Remains of the forest, which grew here until 1837, conserved by the water", "item_url": "http://www.panoramio.com/photo/590422", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/590422.jpg", "longitude": 25.785170, "latitude": 46.792597, "width": 500, "height": 352, "upload_date": "27 January 2007", "owner_id": 57869, "owner_name": "NAGY Albert", "owner_url": "http://www.panoramio.com/user/57869"}
,
{"item_id": 5119067, "item_title": "Fog In The Forest", "item_url": "http://www.panoramio.com/photo/5119067", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5119067.jpg", "longitude": 7.667191, "latitude": 49.174283, "width": 500, "height": 375, "upload_date": "05 October 2007", "owner_id": 528834, "owner_name": "Â©junebug", "owner_url": "http://www.panoramio.com/user/528834"}
,
{"item_id": 4702558, "item_title": "Sunset ( Isla de Antigua-Caribe)", "item_url": "http://www.panoramio.com/photo/4702558", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4702558.jpg", "longitude": -61.833801, "latitude": 17.171627, "width": 500, "height": 375, "upload_date": "16 September 2007", "owner_id": 83865, "owner_name": "Epi F.Villanueva", "owner_url": "http://www.panoramio.com/user/83865"}
,
{"item_id": 717413, "item_title": "Singapore Skyline with Esplanade at night", "item_url": "http://www.panoramio.com/photo/717413", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/717413.jpg", "longitude": 103.856664, "latitude": 1.291589, "width": 391, "height": 500, "upload_date": "06 February 2007", "owner_id": 20398, "owner_name": "boerx", "owner_url": "http://www.panoramio.com/user/20398"}
,
{"item_id": 6281064, "item_title": "Latemar Carezza", "item_url": "http://www.panoramio.com/photo/6281064", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6281064.jpg", "longitude": 11.595447, "latitude": 46.412476, "width": 500, "height": 332, "upload_date": "03 December 2007", "owner_id": 578163, "owner_name": "Margherita-Italy", "owner_url": "http://www.panoramio.com/user/578163"}
,
{"item_id": 327016, "item_title": "bryce canyon", "item_url": "http://www.panoramio.com/photo/327016", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/327016.jpg", "longitude": -112.210836, "latitude": 37.586146, "width": 500, "height": 375, "upload_date": "07 January 2007", "owner_id": 63705, "owner_name": "Karl Wiktorin", "owner_url": "http://www.panoramio.com/user/63705"}
,
{"item_id": 301678, "item_title": "Akashi Kaikyo Bridge (Pearl Bridge)", "item_url": "http://www.panoramio.com/photo/301678", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/301678.jpg", "longitude": 135.028882, "latitude": 34.623002, "width": 443, "height": 500, "upload_date": "04 January 2007", "owner_id": 30202, "owner_name": "S_Mori", "owner_url": "http://www.panoramio.com/user/30202"}
,
{"item_id": 6055804, "item_title": "2007 Balsa de SALBURUA_VITORIA (Alava) PIXELECTA", "item_url": "http://www.panoramio.com/photo/6055804", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6055804.jpg", "longitude": -2.650537, "latitude": 42.859907, "width": 500, "height": 333, "upload_date": "21 November 2007", "owner_id": 163655, "owner_name": "[[[   PIXELECTA   ]]]", "owner_url": "http://www.panoramio.com/user/163655"}
,
{"item_id": 5946759, "item_title": "Snow Pond", "item_url": "http://www.panoramio.com/photo/5946759", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5946759.jpg", "longitude": 10.899510, "latitude": 49.694507, "width": 500, "height": 375, "upload_date": "16 November 2007", "owner_id": 884621, "owner_name": "Florian Eichhorn", "owner_url": "http://www.panoramio.com/user/884621"}
,
{"item_id": 231305, "item_title": "Cathedral Rock in Sedona, AZ at Sunset", "item_url": "http://www.panoramio.com/photo/231305", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/231305.jpg", "longitude": -111.792294, "latitude": 34.818657, "width": 500, "height": 327, "upload_date": "25 December 2006", "owner_id": 45308, "owner_name": "Mike Cavaroc", "owner_url": "http://www.panoramio.com/user/45308"}
,
{"item_id": 582047, "item_title": "Old Vineyard with the sun trying to break through the fog: Oakley, CA", "item_url": "http://www.panoramio.com/photo/582047", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/582047.jpg", "longitude": -121.753750, "latitude": 38.001658, "width": 500, "height": 316, "upload_date": "26 January 2007", "owner_id": 99249, "owner_name": "shaunika", "owner_url": "http://www.panoramio.com/user/99249"}
,
{"item_id": 679332, "item_title": "forbidden city", "item_url": "http://www.panoramio.com/photo/679332", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/679332.jpg", "longitude": 116.396177, "latitude": 39.921734, "width": 500, "height": 248, "upload_date": "04 February 2007", "owner_id": 146092, "owner_name": "sid1662", "owner_url": "http://www.panoramio.com/user/146092"}
,
{"item_id": 3904189, "item_title": "Hajnal", "item_url": "http://www.panoramio.com/photo/3904189", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3904189.jpg", "longitude": 17.361488, "latitude": 47.875138, "width": 500, "height": 333, "upload_date": "13 August 2007", "owner_id": 689769, "owner_name": "Ponty IstvÃ¡n", "owner_url": "http://www.panoramio.com/user/689769"}
,
{"item_id": 11059137, "item_title": "Sunset at Kythira Greece by Nikos Demiris", "item_url": "http://www.panoramio.com/photo/11059137", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/11059137.jpg", "longitude": 23.003998, "latitude": 36.142034, "width": 500, "height": 346, "upload_date": "09 June 2008", "owner_id": 1629713, "owner_name": "demirisn", "owner_url": "http://www.panoramio.com/user/1629713"}
,
{"item_id": 2334150, "item_title": "", "item_url": "http://www.panoramio.com/photo/2334150", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2334150.jpg", "longitude": 0.491531, "latitude": 40.903993, "width": 500, "height": 373, "upload_date": "21 May 2007", "owner_id": 3022, "owner_name": "Arcadi", "owner_url": "http://www.panoramio.com/user/3022"}
,
{"item_id": 5709301, "item_title": "KÃ¶dvarÃ¡zs II", "item_url": "http://www.panoramio.com/photo/5709301", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5709301.jpg", "longitude": 17.998352, "latitude": 47.252903, "width": 333, "height": 500, "upload_date": "05 November 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 55029, "item_title": "Solar Eclipce, Mt.Elbrus, Refuge of 11", "item_url": "http://www.panoramio.com/photo/55029", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/55029.jpg", "longitude": 42.451859, "latitude": 43.316186, "width": 448, "height": 500, "upload_date": "30 September 2006", "owner_id": 7707, "owner_name": "Yorix", "owner_url": "http://www.panoramio.com/user/7707"}
,
{"item_id": 702974, "item_title": "Hundertwasserhaus", "item_url": "http://www.panoramio.com/photo/702974", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/702974.jpg", "longitude": 16.393780, "latitude": 48.207594, "width": 375, "height": 500, "upload_date": "05 February 2007", "owner_id": 123698, "owner_name": "Â© Kojak", "owner_url": "http://www.panoramio.com/user/123698"}
,
{"item_id": 8811826, "item_title": "Der Baum im Wasser", "item_url": "http://www.panoramio.com/photo/8811826", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/8811826.jpg", "longitude": 9.293532, "latitude": 52.869078, "width": 375, "height": 500, "upload_date": "24 March 2008", "owner_id": 1431077, "owner_name": "Heiner F.", "owner_url": "http://www.panoramio.com/user/1431077"}
,
{"item_id": 67843, "item_title": "Torre Eiffel", "item_url": "http://www.panoramio.com/photo/67843", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/67843.jpg", "longitude": 2.294587, "latitude": 48.858468, "width": 500, "height": 375, "upload_date": "21 October 2006", "owner_id": 9163, "owner_name": "marathoniano", "owner_url": "http://www.panoramio.com/user/9163"}
,
{"item_id": 1183509, "item_title": "Viharpart", "item_url": "http://www.panoramio.com/photo/1183509", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1183509.jpg", "longitude": 15.917473, "latitude": 43.590587, "width": 500, "height": 334, "upload_date": "05 March 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 449049, "item_title": "Encantos de Santos", "item_url": "http://www.panoramio.com/photo/449049", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/449049.jpg", "longitude": -46.307716, "latitude": -23.988605, "width": 500, "height": 342, "upload_date": "16 January 2007", "owner_id": 81574, "owner_name": "Criss RB", "owner_url": "http://www.panoramio.com/user/81574"}
,
{"item_id": 4669228, "item_title": "Reif an der naab", "item_url": "http://www.panoramio.com/photo/4669228", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4669228.jpg", "longitude": 12.113457, "latitude": 49.339105, "width": 500, "height": 333, "upload_date": "15 September 2007", "owner_id": 696605, "owner_name": "Â© alfredschaffer", "owner_url": "http://www.panoramio.com/user/696605"}
,
{"item_id": 516653, "item_title": "AlkonyvarÃ¡zs", "item_url": "http://www.panoramio.com/photo/516653", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/516653.jpg", "longitude": 17.451611, "latitude": 47.782424, "width": 404, "height": 500, "upload_date": "21 January 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 4214320, "item_title": "æš®è‰²", "item_url": "http://www.panoramio.com/photo/4214320", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4214320.jpg", "longitude": 110.364532, "latitude": 25.201524, "width": 500, "height": 313, "upload_date": "26 August 2007", "owner_id": 161470, "owner_name": "John Su", "owner_url": "http://www.panoramio.com/user/161470"}
,
{"item_id": 9419312, "item_title": "Skeleton", "item_url": "http://www.panoramio.com/photo/9419312", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/9419312.jpg", "longitude": -147.929063, "latitude": -15.091723, "width": 500, "height": 326, "upload_date": "16 April 2008", "owner_id": 232099, "owner_name": "mabut", "owner_url": "http://www.panoramio.com/user/232099"}
,
{"item_id": 642609, "item_title": "Oia, Santorini, Cyclades, Hellas, Greece", "item_url": "http://www.panoramio.com/photo/642609", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/642609.jpg", "longitude": 25.377388, "latitude": 36.460778, "width": 500, "height": 333, "upload_date": "01 February 2007", "owner_id": 131038, "owner_name": "wolffystyle", "owner_url": "http://www.panoramio.com/user/131038"}
,
{"item_id": 354614, "item_title": "Dresden_Centrum_01", "item_url": "http://www.panoramio.com/photo/354614", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/354614.jpg", "longitude": 13.740206, "latitude": 51.056934, "width": 500, "height": 332, "upload_date": "09 January 2007", "owner_id": 71628, "owner_name": "Ulrich HÃ¤ssler, Dresden", "owner_url": "http://www.panoramio.com/user/71628"}
,
{"item_id": 678200, "item_title": "Geometria de terrazas", "item_url": "http://www.panoramio.com/photo/678200", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/678200.jpg", "longitude": -16.841269, "latitude": 28.235525, "width": 500, "height": 333, "upload_date": "03 February 2007", "owner_id": 92750, "owner_name": "Pablo LÃ³pez Ramos", "owner_url": "http://www.panoramio.com/user/92750"}
,
{"item_id": 436284, "item_title": "bandaibasi2", "item_url": "http://www.panoramio.com/photo/436284", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/436284.jpg", "longitude": 139.051423, "latitude": 37.920063, "width": 500, "height": 393, "upload_date": "15 January 2007", "owner_id": 86411, "owner_name": "ä¸­æ‘è„©-Osamu nakamura", "owner_url": "http://www.panoramio.com/user/86411"}
,
{"item_id": 2235454, "item_title": "La bonde et la brume", "item_url": "http://www.panoramio.com/photo/2235454", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2235454.jpg", "longitude": 1.595249, "latitude": 47.313181, "width": 500, "height": 500, "upload_date": "15 May 2007", "owner_id": 372189, "owner_name": "PhilÂ©", "owner_url": "http://www.panoramio.com/user/372189"}
,
{"item_id": 5983, "item_title": "Waiting", "item_url": "http://www.panoramio.com/photo/5983", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5983.jpg", "longitude": 7.796173, "latitude": 33.954752, "width": 344, "height": 500, "upload_date": "17 December 2005", "owner_id": 989, "owner_name": "Mrgud", "owner_url": "http://www.panoramio.com/user/989"}
,
{"item_id": 97402, "item_title": "Mostar", "item_url": "http://www.panoramio.com/photo/97402", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/97402.jpg", "longitude": 17.814803, "latitude": 43.337102, "width": 500, "height": 375, "upload_date": "09 December 2006", "owner_id": 12954, "owner_name": "ZiÄ™bol", "owner_url": "http://www.panoramio.com/user/12954"}
,
{"item_id": 5159548, "item_title": "Autumn - Herbstfarben - Fall", "item_url": "http://www.panoramio.com/photo/5159548", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5159548.jpg", "longitude": 7.541599, "latitude": 46.834772, "width": 500, "height": 374, "upload_date": "08 October 2007", "owner_id": 635422, "owner_name": "â™« Swissmay", "owner_url": "http://www.panoramio.com/user/635422"}
,
{"item_id": 1779072, "item_title": "Ã‰gi Ã©rintÃ©s", "item_url": "http://www.panoramio.com/photo/1779072", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1779072.jpg", "longitude": 17.747383, "latitude": 47.556835, "width": 462, "height": 500, "upload_date": "14 April 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 5795973, "item_title": "Emmental mit 7 Hengsten Hohgant und Berneralpen - Emmental, 7 Stallions and Bernese Alpine Snow Mountains", "item_url": "http://www.panoramio.com/photo/5795973", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5795973.jpg", "longitude": 7.730427, "latitude": 47.033280, "width": 500, "height": 374, "upload_date": "08 November 2007", "owner_id": 635422, "owner_name": "â™« Swissmay", "owner_url": "http://www.panoramio.com/user/635422"}
,
{"item_id": 6850694, "item_title": "2007-VITORIA Alava PIXELECTA", "item_url": "http://www.panoramio.com/photo/6850694", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6850694.jpg", "longitude": -2.649336, "latitude": 42.861260, "width": 500, "height": 116, "upload_date": "02 January 2008", "owner_id": 163655, "owner_name": "[[[   PIXELECTA   ]]]", "owner_url": "http://www.panoramio.com/user/163655"}
,
{"item_id": 11738506, "item_title": "Galeria de ItÃ¡lica", "item_url": "http://www.panoramio.com/photo/11738506", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/11738506.jpg", "longitude": -6.046858, "latitude": 37.444199, "width": 378, "height": 500, "upload_date": "03 July 2008", "owner_id": 1038666, "owner_name": "Doenjo", "owner_url": "http://www.panoramio.com/user/1038666"}
,
{"item_id": 4013965, "item_title": "Pedaleando en la costanera", "item_url": "http://www.panoramio.com/photo/4013965", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4013965.jpg", "longitude": -73.231012, "latitude": -39.817655, "width": 500, "height": 366, "upload_date": "18 August 2007", "owner_id": 327310, "owner_name": "Erwin Woenckhaus", "owner_url": "http://www.panoramio.com/user/327310"}
,
{"item_id": 611985, "item_title": "Toda Temple", "item_url": "http://www.panoramio.com/photo/611985", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/611985.jpg", "longitude": 76.715459, "latitude": 11.420014, "width": 500, "height": 375, "upload_date": "29 January 2007", "owner_id": 130990, "owner_name": "Eye for India. blogspot .com", "owner_url": "http://www.panoramio.com/user/130990"}
,
{"item_id": 2689441, "item_title": "Terepszemle", "item_url": "http://www.panoramio.com/photo/2689441", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2689441.jpg", "longitude": 17.674255, "latitude": 47.601533, "width": 500, "height": 347, "upload_date": "11 June 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 6599853, "item_title": "FlowerSun", "item_url": "http://www.panoramio.com/photo/6599853", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6599853.jpg", "longitude": 21.042938, "latitude": 41.988333, "width": 480, "height": 500, "upload_date": "21 December 2007", "owner_id": 695042, "owner_name": "Neim Sejfuli â™¦", "owner_url": "http://www.panoramio.com/user/695042"}
,
{"item_id": 71855, "item_title": "British Museum", "item_url": "http://www.panoramio.com/photo/71855", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/71855.jpg", "longitude": -0.127373, "latitude": 51.519265, "width": 500, "height": 333, "upload_date": "28 October 2006", "owner_id": 1295, "owner_name": "Matthew Walters", "owner_url": "http://www.panoramio.com/user/1295"}
,
{"item_id": 58291, "item_title": "Gollinger Wasserfall", "item_url": "http://www.panoramio.com/photo/58291", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/58291.jpg", "longitude": 13.138103, "latitude": 47.601244, "width": 330, "height": 500, "upload_date": "07 October 2006", "owner_id": 8060, "owner_name": "Norbert MAIER", "owner_url": "http://www.panoramio.com/user/8060"}
,
{"item_id": 3903941, "item_title": "Viharos Pipacsos", "item_url": "http://www.panoramio.com/photo/3903941", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3903941.jpg", "longitude": 16.638451, "latitude": 47.732396, "width": 500, "height": 331, "upload_date": "13 August 2007", "owner_id": 689769, "owner_name": "Ponty IstvÃ¡n", "owner_url": "http://www.panoramio.com/user/689769"}
,
{"item_id": 5363928, "item_title": "Antelope Slot Canyon", "item_url": "http://www.panoramio.com/photo/5363928", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5363928.jpg", "longitude": -111.370811, "latitude": 36.856755, "width": 500, "height": 326, "upload_date": "17 October 2007", "owner_id": 358485, "owner_name": "Francesco Villa", "owner_url": "http://www.panoramio.com/user/358485"}
,
{"item_id": 2688750, "item_title": "Playa de Strenc,Mallorca", "item_url": "http://www.panoramio.com/photo/2688750", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2688750.jpg", "longitude": 2.980042, "latitude": 39.348702, "width": 500, "height": 427, "upload_date": "11 June 2007", "owner_id": 83865, "owner_name": "Epi F.Villanueva", "owner_url": "http://www.panoramio.com/user/83865"}
,
{"item_id": 3148025, "item_title": "Zuidlede", "item_url": "http://www.panoramio.com/photo/3148025", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3148025.jpg", "longitude": 3.906112, "latitude": 51.147667, "width": 496, "height": 500, "upload_date": "06 July 2007", "owner_id": 635244, "owner_name": "A.Lebacq", "owner_url": "http://www.panoramio.com/user/635244"}
,
{"item_id": 809727, "item_title": "TÃºl az Ã³perenciÃ¡n", "item_url": "http://www.panoramio.com/photo/809727", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/809727.jpg", "longitude": 17.062283, "latitude": 43.277580, "width": 500, "height": 334, "upload_date": "13 February 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 11560716, "item_title": "China's Great Wall, 09 may 2008", "item_url": "http://www.panoramio.com/photo/11560716", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/11560716.jpg", "longitude": 116.064860, "latitude": 40.287162, "width": 500, "height": 331, "upload_date": "27 June 2008", "owner_id": 1931067, "owner_name": "EugeneTrambo", "owner_url": "http://www.panoramio.com/user/1931067"}
,
{"item_id": 10484028, "item_title": "Tuscanny in lower bavaria?  Toskana in Niederbayern? near Pfeffenhausen", "item_url": "http://www.panoramio.com/photo/10484028", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/10484028.jpg", "longitude": 11.982479, "latitude": 48.628768, "width": 500, "height": 411, "upload_date": "22 May 2008", "owner_id": 1077251, "owner_name": "picsonthemove", "owner_url": "http://www.panoramio.com/user/1077251"}
,
{"item_id": 10321724, "item_title": "Kingston Lacy beech avenue from the middle of the road (don't try this at home...)", "item_url": "http://www.panoramio.com/photo/10321724", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/10321724.jpg", "longitude": -2.051697, "latitude": 50.820469, "width": 500, "height": 473, "upload_date": "17 May 2008", "owner_id": 450216, "owner_name": "Graham Hobbs", "owner_url": "http://www.panoramio.com/user/450216"}
,
{"item_id": 11847917, "item_title": "Neda.... The end of an unusual trip! First Prize \"Travel\" Panoramio JULY 2008, a shot by kostas andreopoulos", "item_url": "http://www.panoramio.com/photo/11847917", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/11847917.jpg", "longitude": 21.776275, "latitude": 37.394711, "width": 500, "height": 484, "upload_date": "06 July 2008", "owner_id": 1690483, "owner_name": "k.andre", "owner_url": "http://www.panoramio.com/user/1690483"}
,
{"item_id": 723285, "item_title": "Stonehenge Fisheye View June 2000", "item_url": "http://www.panoramio.com/photo/723285", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/723285.jpg", "longitude": -1.826195, "latitude": 51.178849, "width": 500, "height": 500, "upload_date": "07 February 2007", "owner_id": 154364, "owner_name": "Edgy01", "owner_url": "http://www.panoramio.com/user/154364"}
,
{"item_id": 9831198, "item_title": "VerÅ‘fÃ©nyes hangulat", "item_url": "http://www.panoramio.com/photo/9831198", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/9831198.jpg", "longitude": 18.331053, "latitude": 47.650689, "width": 333, "height": 500, "upload_date": "01 May 2008", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 4670496, "item_title": "Vuelo rasante entre la niebla", "item_url": "http://www.panoramio.com/photo/4670496", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4670496.jpg", "longitude": -73.243092, "latitude": -39.809134, "width": 500, "height": 371, "upload_date": "15 September 2007", "owner_id": 327310, "owner_name": "Erwin Woenckhaus", "owner_url": "http://www.panoramio.com/user/327310"}
,
{"item_id": 2414624, "item_title": "TriumvirÃ¡tus", "item_url": "http://www.panoramio.com/photo/2414624", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2414624.jpg", "longitude": 17.768154, "latitude": 47.510940, "width": 500, "height": 309, "upload_date": "27 May 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 196129, "item_title": "usgo", "item_url": "http://www.panoramio.com/photo/196129", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/196129.jpg", "longitude": -3.999882, "latitude": 43.439397, "width": 500, "height": 316, "upload_date": "20 December 2006", "owner_id": 38804, "owner_name": "www.oscarsanchez.net", "owner_url": "http://www.panoramio.com/user/38804"}
,
{"item_id": 304677, "item_title": "Allee bei Wilhelmsthal", "item_url": "http://www.panoramio.com/photo/304677", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/304677.jpg", "longitude": 9.409919, "latitude": 51.392686, "width": 500, "height": 409, "upload_date": "05 January 2007", "owner_id": 63703, "owner_name": "Rainer Kaufhold", "owner_url": "http://www.panoramio.com/user/63703"}
,
{"item_id": 4924213, "item_title": "Egy varÃ¡zslatos estÃ©n", "item_url": "http://www.panoramio.com/photo/4924213", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4924213.jpg", "longitude": 2.151239, "latitude": 41.371278, "width": 500, "height": 335, "upload_date": "26 September 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 189243, "item_title": "coming in for a landing", "item_url": "http://www.panoramio.com/photo/189243", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/189243.jpg", "longitude": -123.147984, "latitude": 49.198812, "width": 500, "height": 333, "upload_date": "19 December 2006", "owner_id": 29932, "owner_name": "Rom@nce", "owner_url": "http://www.panoramio.com/user/29932"}
,
{"item_id": 3121730, "item_title": "Mers-les-Bains dark clouds looming", "item_url": "http://www.panoramio.com/photo/3121730", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3121730.jpg", "longitude": 1.383655, "latitude": 50.066878, "width": 500, "height": 375, "upload_date": "04 July 2007", "owner_id": 633531, "owner_name": "ianwstokes", "owner_url": "http://www.panoramio.com/user/633531"}
,
{"item_id": 5358146, "item_title": "Lone Rock Rainbows", "item_url": "http://www.panoramio.com/photo/5358146", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5358146.jpg", "longitude": -111.537795, "latitude": 37.020475, "width": 500, "height": 335, "upload_date": "16 October 2007", "owner_id": 66847, "owner_name": "Lukas Novak", "owner_url": "http://www.panoramio.com/user/66847"}
,
{"item_id": 9633346, "item_title": "Altstadt von Spello--Winner Contest of April 2008          First Prize of Travel Category", "item_url": "http://www.panoramio.com/photo/9633346", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/9633346.jpg", "longitude": 12.672386, "latitude": 42.989236, "width": 347, "height": 500, "upload_date": "23 April 2008", "owner_id": 1400529, "owner_name": "marita1004", "owner_url": "http://www.panoramio.com/user/1400529"}
,
{"item_id": 611425, "item_title": "The Dome of Cologne", "item_url": "http://www.panoramio.com/photo/611425", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/611425.jpg", "longitude": 6.968604, "latitude": 50.941157, "width": 500, "height": 357, "upload_date": "29 January 2007", "owner_id": 8058, "owner_name": "Ermanec", "owner_url": "http://www.panoramio.com/user/8058"}
,
{"item_id": 6850661, "item_title": "NÃ« Fush tÃ« PallaticÃ«s", "item_url": "http://www.panoramio.com/photo/6850661", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6850661.jpg", "longitude": 21.075768, "latitude": 42.007915, "width": 488, "height": 500, "upload_date": "02 January 2008", "owner_id": 695042, "owner_name": "Neim Sejfuli â™¦", "owner_url": "http://www.panoramio.com/user/695042"}
,
{"item_id": 5617509, "item_title": "CÃ¶lÃ¶p kiadÃ³", "item_url": "http://www.panoramio.com/photo/5617509", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5617509.jpg", "longitude": 12.333934, "latitude": 45.425368, "width": 500, "height": 334, "upload_date": "29 October 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 2083687, "item_title": "Sunrise at Abu Simbel", "item_url": "http://www.panoramio.com/photo/2083687", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2083687.jpg", "longitude": 31.630840, "latitude": 22.363729, "width": 500, "height": 335, "upload_date": "05 May 2007", "owner_id": 3316, "owner_name": "kristine hannon (www.traveltheglobe.be)", "owner_url": "http://www.panoramio.com/user/3316"}
,
{"item_id": 7284083, "item_title": "Japanese garden", "item_url": "http://www.panoramio.com/photo/7284083", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/7284083.jpg", "longitude": -13.673172, "latitude": 21.259301, "width": 335, "height": 500, "upload_date": "22 January 2008", "owner_id": 232099, "owner_name": "mabut", "owner_url": "http://www.panoramio.com/user/232099"}
,
{"item_id": 5750152, "item_title": "Earth, Moon and Sky", "item_url": "http://www.panoramio.com/photo/5750152", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5750152.jpg", "longitude": -117.560234, "latitude": 36.678057, "width": 333, "height": 500, "upload_date": "06 November 2007", "owner_id": 376395, "owner_name": "JeffSullivan (www.MyPhotoGuides.com)", "owner_url": "http://www.panoramio.com/user/376395"}
,
{"item_id": 5633673, "item_title": "Ridgely Farm Lane", "item_url": "http://www.panoramio.com/photo/5633673", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5633673.jpg", "longitude": -78.775320, "latitude": 38.031867, "width": 500, "height": 378, "upload_date": "30 October 2007", "owner_id": 523038, "owner_name": "Yank in Dixie", "owner_url": "http://www.panoramio.com/user/523038"}
,
{"item_id": 723090, "item_title": "Grand Canyon (Havasupai)", "item_url": "http://www.panoramio.com/photo/723090", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/723090.jpg", "longitude": -112.716293, "latitude": 36.270989, "width": 500, "height": 332, "upload_date": "07 February 2007", "owner_id": 66847, "owner_name": "Lukas Novak", "owner_url": "http://www.panoramio.com/user/66847"}
,
{"item_id": 1226915, "item_title": "Flamants roses sur l'Etang de VaccarÃ¨s", "item_url": "http://www.panoramio.com/photo/1226915", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1226915.jpg", "longitude": 4.627304, "latitude": 43.551285, "width": 500, "height": 333, "upload_date": "08 March 2007", "owner_id": 78506, "owner_name": "Philippe Stoop", "owner_url": "http://www.panoramio.com/user/78506"}
,
{"item_id": 2738883, "item_title": "Tormenta", "item_url": "http://www.panoramio.com/photo/2738883", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2738883.jpg", "longitude": -71.616096, "latitude": -33.042558, "width": 333, "height": 500, "upload_date": "14 June 2007", "owner_id": 477365, "owner_name": "âœ”chilefoto", "owner_url": "http://www.panoramio.com/user/477365"}
,
{"item_id": 2875846, "item_title": "Rannoch Moor, Scotland", "item_url": "http://www.panoramio.com/photo/2875846", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2875846.jpg", "longitude": -4.745750, "latitude": 56.594467, "width": 500, "height": 462, "upload_date": "22 June 2007", "owner_id": 588149, "owner_name": "Adam Salwanowicz", "owner_url": "http://www.panoramio.com/user/588149"}
,
{"item_id": 533456, "item_title": "ZÃ¶ld symphonia", "item_url": "http://www.panoramio.com/photo/533456", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/533456.jpg", "longitude": 17.500362, "latitude": 47.843579, "width": 500, "height": 333, "upload_date": "22 January 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 3078609, "item_title": "Pagan - Sunset Vista", "item_url": "http://www.panoramio.com/photo/3078609", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3078609.jpg", "longitude": 94.884624, "latitude": 21.166644, "width": 500, "height": 329, "upload_date": "02 July 2007", "owner_id": 73104, "owner_name": "zerega", "owner_url": "http://www.panoramio.com/user/73104"}
,
{"item_id": 1599459, "item_title": "Rosina Lamberti - Templestowe Sunset", "item_url": "http://www.panoramio.com/photo/1599459", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1599459.jpg", "longitude": 145.145187, "latitude": -37.773700, "width": 500, "height": 332, "upload_date": "02 April 2007", "owner_id": 140796, "owner_name": "rosina lamberti", "owner_url": "http://www.panoramio.com/user/140796"}
,
{"item_id": 37097, "item_title": "Burj Al Arab at Night", "item_url": "http://www.panoramio.com/photo/37097", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/37097.jpg", "longitude": 55.190012, "latitude": 25.144411, "width": 333, "height": 500, "upload_date": "05 August 2006", "owner_id": 1295, "owner_name": "Matthew Walters", "owner_url": "http://www.panoramio.com/user/1295"}
,
{"item_id": 42988, "item_title": "Mekhong at Nakhon Phanom, Thailand", "item_url": "http://www.panoramio.com/photo/42988", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/42988.jpg", "longitude": 104.780045, "latitude": 17.415348, "width": 500, "height": 375, "upload_date": "29 August 2006", "owner_id": 6386, "owner_name": "Uwe Werner", "owner_url": "http://www.panoramio.com/user/6386"}
,
{"item_id": 4738551, "item_title": "Aquakatedral", "item_url": "http://www.panoramio.com/photo/4738551", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4738551.jpg", "longitude": 18.026505, "latitude": 47.279462, "width": 500, "height": 334, "upload_date": "18 September 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 6126327, "item_title": "Autumnal Morning", "item_url": "http://www.panoramio.com/photo/6126327", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6126327.jpg", "longitude": 0.209620, "latitude": 51.658827, "width": 500, "height": 500, "upload_date": "25 November 2007", "owner_id": 1130880, "owner_name": "marksimms", "owner_url": "http://www.panoramio.com/user/1130880"}
,
{"item_id": 1390072, "item_title": "Winter Wonder Woods", "item_url": "http://www.panoramio.com/photo/1390072", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1390072.jpg", "longitude": -123.184891, "latitude": 49.400027, "width": 500, "height": 343, "upload_date": "19 March 2007", "owner_id": 164125, "owner_name": "DannyXu", "owner_url": "http://www.panoramio.com/user/164125"}
,
{"item_id": 8600061, "item_title": "Templio", "item_url": "http://www.panoramio.com/photo/8600061", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/8600061.jpg", "longitude": 13.600258, "latitude": 37.288703, "width": 500, "height": 375, "upload_date": "17 March 2008", "owner_id": 325031, "owner_name": "Gibrail", "owner_url": "http://www.panoramio.com/user/325031"}
,
{"item_id": 1232144, "item_title": "the Wave", "item_url": "http://www.panoramio.com/photo/1232144", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1232144.jpg", "longitude": -112.006313, "latitude": 36.995921, "width": 497, "height": 500, "upload_date": "08 March 2007", "owner_id": 256348, "owner_name": "DIEZ Jean-Paul", "owner_url": "http://www.panoramio.com/user/256348"}
,
{"item_id": 12825028, "item_title": "American Star shipwreck", "item_url": "http://www.panoramio.com/photo/12825028", "item_file_url": "http://static1.bareka.com/photos/medium/12825028.jpg", "longitude": -14.178050, "latitude": 28.345596, "width": 500, "height": 375, "upload_date": "05 August 2008", "owner_id": 1465912, "owner_name": "funtor", "owner_url": "http://www.panoramio.com/user/1465912"}
,
{"item_id": 9705164, "item_title": "Die blaue Stunde-Dresden", "item_url": "http://www.panoramio.com/photo/9705164", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/9705164.jpg", "longitude": 13.732374, "latitude": 51.061020, "width": 500, "height": 333, "upload_date": "26 April 2008", "owner_id": 1465912, "owner_name": "funtor", "owner_url": "http://www.panoramio.com/user/1465912"}
,
{"item_id": 9701147, "item_title": "After the thunderstorm II (Calella de Palafrugell)", "item_url": "http://www.panoramio.com/photo/9701147", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/9701147.jpg", "longitude": 3.185166, "latitude": 41.888413, "width": 500, "height": 347, "upload_date": "26 April 2008", "owner_id": 629243, "owner_name": "Olivier Faugeras", "owner_url": "http://www.panoramio.com/user/629243"}
,
{"item_id": 3414277, "item_title": "Morning at Vlixos_Lefkada", "item_url": "http://www.panoramio.com/photo/3414277", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3414277.jpg", "longitude": 20.698693, "latitude": 38.689111, "width": 500, "height": 333, "upload_date": "20 July 2007", "owner_id": 242446, "owner_name": "Ntinos Lagos", "owner_url": "http://www.panoramio.com/user/242446"}
,
{"item_id": 1205806, "item_title": "A tavasz aranya", "item_url": "http://www.panoramio.com/photo/1205806", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1205806.jpg", "longitude": 17.634773, "latitude": 47.557299, "width": 500, "height": 302, "upload_date": "07 March 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 6430261, "item_title": "The wet side of winter", "item_url": "http://www.panoramio.com/photo/6430261", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6430261.jpg", "longitude": 9.531434, "latitude": 48.559611, "width": 500, "height": 375, "upload_date": "11 December 2007", "owner_id": 424589, "owner_name": "PeSchn", "owner_url": "http://www.panoramio.com/user/424589"}
,
{"item_id": 8116025, "item_title": "Sale el Sol, Cae la Luna", "item_url": "http://www.panoramio.com/photo/8116025", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/8116025.jpg", "longitude": -71.875992, "latitude": -41.170126, "width": 500, "height": 333, "upload_date": "26 February 2008", "owner_id": 4483, "owner_name": "Miguel Coranti", "owner_url": "http://www.panoramio.com/user/4483"}
,
{"item_id": 1235514, "item_title": "Pulau Menjangan", "item_url": "http://www.panoramio.com/photo/1235514", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1235514.jpg", "longitude": 114.502687, "latitude": -8.095941, "width": 500, "height": 341, "upload_date": "09 March 2007", "owner_id": 232099, "owner_name": "mabut", "owner_url": "http://www.panoramio.com/user/232099"}
,
{"item_id": 32827, "item_title": "Xi'an Bell Tower", "item_url": "http://www.panoramio.com/photo/32827", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/32827.jpg", "longitude": 108.943026, "latitude": 34.260759, "width": 500, "height": 375, "upload_date": "17 July 2006", "owner_id": 5168, "owner_name": "Markus KÃ¤llander", "owner_url": "http://www.panoramio.com/user/5168"}
,
{"item_id": 798014, "item_title": "Porto Canale", "item_url": "http://www.panoramio.com/photo/798014", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/798014.jpg", "longitude": 12.399648, "latitude": 44.203343, "width": 500, "height": 332, "upload_date": "12 February 2007", "owner_id": 159455, "owner_name": "Â©Franco Truscello", "owner_url": "http://www.panoramio.com/user/159455"}
,
{"item_id": 10517317, "item_title": "Route 66", "item_url": "http://www.panoramio.com/photo/10517317", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/10517317.jpg", "longitude": 18.027492, "latitude": 46.268071, "width": 500, "height": 375, "upload_date": "23 May 2008", "owner_id": 328249, "owner_name": "v.zsoloo", "owner_url": "http://www.panoramio.com/user/328249"}
,
{"item_id": 416838, "item_title": "Old Faithful on New Year's Morning", "item_url": "http://www.panoramio.com/photo/416838", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/416838.jpg", "longitude": -110.827900, "latitude": 44.459354, "width": 500, "height": 375, "upload_date": "13 January 2007", "owner_id": 71099, "owner_name": "Eve in Montana", "owner_url": "http://www.panoramio.com/user/71099"}
,
{"item_id": 5964, "item_title": "Skradin bridge", "item_url": "http://www.panoramio.com/photo/5964", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5964.jpg", "longitude": 15.908031, "latitude": 43.806040, "width": 500, "height": 333, "upload_date": "17 December 2005", "owner_id": 989, "owner_name": "Mrgud", "owner_url": "http://www.panoramio.com/user/989"}
,
{"item_id": 419923, "item_title": "bandaibashi2", "item_url": "http://www.panoramio.com/photo/419923", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/419923.jpg", "longitude": 139.055500, "latitude": 37.920029, "width": 334, "height": 500, "upload_date": "14 January 2007", "owner_id": 86411, "owner_name": "ä¸­æ‘è„©-Osamu nakamura", "owner_url": "http://www.panoramio.com/user/86411"}
,
{"item_id": 26985, "item_title": "Cementerio General", "item_url": "http://www.panoramio.com/photo/26985", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/26985.jpg", "longitude": -84.091458, "latitude": 9.930174, "width": 393, "height": 500, "upload_date": "23 June 2006", "owner_id": 4112, "owner_name": "Roberto Garcia", "owner_url": "http://www.panoramio.com/user/4112"}
,
{"item_id": 405866, "item_title": "awasima", "item_url": "http://www.panoramio.com/photo/405866", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/405866.jpg", "longitude": 139.229908, "latitude": 38.463267, "width": 396, "height": 500, "upload_date": "13 January 2007", "owner_id": 86411, "owner_name": "ä¸­æ‘è„©-Osamu nakamura", "owner_url": "http://www.panoramio.com/user/86411"}
,
{"item_id": 1319538, "item_title": "What a place !", "item_url": "http://www.panoramio.com/photo/1319538", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1319538.jpg", "longitude": -62.542677, "latitude": 6.022092, "width": 329, "height": 500, "upload_date": "14 March 2007", "owner_id": 232099, "owner_name": "mabut", "owner_url": "http://www.panoramio.com/user/232099"}
,
{"item_id": 444280, "item_title": "Cigars are for ladies", "item_url": "http://www.panoramio.com/photo/444280", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/444280.jpg", "longitude": -82.351027, "latitude": 23.139117, "width": 500, "height": 375, "upload_date": "15 January 2007", "owner_id": 57893, "owner_name": "ThoiryK", "owner_url": "http://www.panoramio.com/user/57893"}
,
{"item_id": 6016, "item_title": "Å ibenik - tiramol", "item_url": "http://www.panoramio.com/photo/6016", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6016.jpg", "longitude": 15.890865, "latitude": 43.735693, "width": 473, "height": 500, "upload_date": "18 December 2005", "owner_id": 991, "owner_name": "Mario Marotti", "owner_url": "http://www.panoramio.com/user/991"}
,
{"item_id": 3531661, "item_title": "ZÃºzmara", "item_url": "http://www.panoramio.com/photo/3531661", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3531661.jpg", "longitude": 17.498131, "latitude": 47.847727, "width": 500, "height": 346, "upload_date": "25 July 2007", "owner_id": 689769, "owner_name": "Ponty IstvÃ¡n", "owner_url": "http://www.panoramio.com/user/689769"}
,
{"item_id": 723088, "item_title": "Friendly Evening Haze", "item_url": "http://www.panoramio.com/photo/723088", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/723088.jpg", "longitude": 25.428715, "latitude": 36.421282, "width": 333, "height": 500, "upload_date": "07 February 2007", "owner_id": 66847, "owner_name": "Lukas Novak", "owner_url": "http://www.panoramio.com/user/66847"}
,
{"item_id": 422813, "item_title": "tanokami", "item_url": "http://www.panoramio.com/photo/422813", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/422813.jpg", "longitude": 138.777237, "latitude": 37.581453, "width": 500, "height": 379, "upload_date": "14 January 2007", "owner_id": 86411, "owner_name": "ä¸­æ‘è„©-Osamu nakamura", "owner_url": "http://www.panoramio.com/user/86411"}
,
{"item_id": 516256, "item_title": "A hitehagyott", "item_url": "http://www.panoramio.com/photo/516256", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/516256.jpg", "longitude": 17.533493, "latitude": 47.842139, "width": 500, "height": 291, "upload_date": "21 January 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 706978, "item_title": "Snow at full moon", "item_url": "http://www.panoramio.com/photo/706978", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/706978.jpg", "longitude": 23.878784, "latitude": 69.829207, "width": 500, "height": 334, "upload_date": "05 February 2007", "owner_id": 56091, "owner_name": "Kjetil Vaage Ã˜ie", "owner_url": "http://www.panoramio.com/user/56091"}
,
{"item_id": 4994983, "item_title": "Camogli - Castello della \"Dragonara\"  (north-west looking photograph)", "item_url": "http://www.panoramio.com/photo/4994983", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4994983.jpg", "longitude": 9.151220, "latitude": 44.350207, "width": 325, "height": 500, "upload_date": "30 September 2007", "owner_id": 180947, "owner_name": "gilberto silvestri", "owner_url": "http://www.panoramio.com/user/180947"}
,
{"item_id": 1315255, "item_title": "Tulpen in Holland", "item_url": "http://www.panoramio.com/photo/1315255", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1315255.jpg", "longitude": 4.556494, "latitude": 52.278451, "width": 500, "height": 321, "upload_date": "14 March 2007", "owner_id": 193467, "owner_name": "JÃ¶rg Behmann", "owner_url": "http://www.panoramio.com/user/193467"}
,
{"item_id": 5204412, "item_title": "Alaska Range", "item_url": "http://www.panoramio.com/photo/5204412", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5204412.jpg", "longitude": -150.150146, "latitude": 62.734601, "width": 500, "height": 375, "upload_date": "09 October 2007", "owner_id": 71099, "owner_name": "Eve in Montana", "owner_url": "http://www.panoramio.com/user/71099"}
,
{"item_id": 5204668, "item_title": "Scotland", "item_url": "http://www.panoramio.com/photo/5204668", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5204668.jpg", "longitude": -4.821882, "latitude": 56.634188, "width": 500, "height": 500, "upload_date": "09 October 2007", "owner_id": 588149, "owner_name": "Adam Salwanowicz", "owner_url": "http://www.panoramio.com/user/588149"}
,
{"item_id": 1706188, "item_title": "Night", "item_url": "http://www.panoramio.com/photo/1706188", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1706188.jpg", "longitude": 21.440957, "latitude": 48.427236, "width": 390, "height": 500, "upload_date": "09 April 2007", "owner_id": 346103, "owner_name": "lacitot", "owner_url": "http://www.panoramio.com/user/346103"}
,
{"item_id": 6366165, "item_title": "Il Latemar", "item_url": "http://www.panoramio.com/photo/6366165", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6366165.jpg", "longitude": 11.575856, "latitude": 46.410138, "width": 500, "height": 375, "upload_date": "08 December 2007", "owner_id": 933456, "owner_name": "Â© Marco De Candido", "owner_url": "http://www.panoramio.com/user/933456"}
,
{"item_id": 5433048, "item_title": "moon photoshop", "item_url": "http://www.panoramio.com/photo/5433048", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5433048.jpg", "longitude": 11.337848, "latitude": 46.460602, "width": 500, "height": 335, "upload_date": "20 October 2007", "owner_id": 578163, "owner_name": "Margherita-Italy", "owner_url": "http://www.panoramio.com/user/578163"}
,
{"item_id": 611035, "item_title": "Ice berg", "item_url": "http://www.panoramio.com/photo/611035", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/611035.jpg", "longitude": -58.886719, "latitude": -63.470145, "width": 333, "height": 500, "upload_date": "29 January 2007", "owner_id": 14940, "owner_name": "elmtree", "owner_url": "http://www.panoramio.com/user/14940"}
,
{"item_id": 4258269, "item_title": "Ãšj nap kelte", "item_url": "http://www.panoramio.com/photo/4258269", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4258269.jpg", "longitude": 17.474785, "latitude": 47.832057, "width": 500, "height": 327, "upload_date": "28 August 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 37088, "item_title": "Komandoo From The Air", "item_url": "http://www.panoramio.com/photo/37088", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/37088.jpg", "longitude": 73.422661, "latitude": 5.496900, "width": 500, "height": 278, "upload_date": "05 August 2006", "owner_id": 1295, "owner_name": "Matthew Walters", "owner_url": "http://www.panoramio.com/user/1295"}
,
{"item_id": 71667, "item_title": "2006ë…„06ì›”11ì¼(ì¼) ìž¥ì „ê³„ê³¡ ë° ë‹¨ìž„ê³¨ 046_resize", "item_url": "http://www.panoramio.com/photo/71667", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/71667.jpg", "longitude": 128.533516, "latitude": 37.435340, "width": 500, "height": 333, "upload_date": "28 October 2006", "owner_id": 9424, "owner_name": "ë°•ë²”í˜¸", "owner_url": "http://www.panoramio.com/user/9424"}
,
{"item_id": 5300468, "item_title": "Lac du Vieux Emosson", "item_url": "http://www.panoramio.com/photo/5300468", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5300468.jpg", "longitude": 6.883256, "latitude": 46.055744, "width": 500, "height": 500, "upload_date": "14 October 2007", "owner_id": 588149, "owner_name": "Adam Salwanowicz", "owner_url": "http://www.panoramio.com/user/588149"}
,
{"item_id": 591351, "item_title": "smokestack_8739", "item_url": "http://www.panoramio.com/photo/591351", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/591351.jpg", "longitude": -79.386027, "latitude": 43.648168, "width": 500, "height": 392, "upload_date": "27 January 2007", "owner_id": 17488, "owner_name": "John Gillett", "owner_url": "http://www.panoramio.com/user/17488"}
,
{"item_id": 11224316, "item_title": "Remindful winter season-Vardar river", "item_url": "http://www.panoramio.com/photo/11224316", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/11224316.jpg", "longitude": 21.084051, "latitude": 42.013782, "width": 214, "height": 500, "upload_date": "15 June 2008", "owner_id": 695042, "owner_name": "Neim Sejfuli â™¦", "owner_url": "http://www.panoramio.com/user/695042"}
,
{"item_id": 5968187, "item_title": "2007 VITORIA Alava PIXELECTA", "item_url": "http://www.panoramio.com/photo/5968187", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5968187.jpg", "longitude": -2.650087, "latitude": 42.860206, "width": 500, "height": 333, "upload_date": "17 November 2007", "owner_id": 163655, "owner_name": "[[[   PIXELECTA   ]]]", "owner_url": "http://www.panoramio.com/user/163655"}
,
{"item_id": 1781517, "item_title": "Yosemite Falls in Winter", "item_url": "http://www.panoramio.com/photo/1781517", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1781517.jpg", "longitude": -119.590130, "latitude": 37.744318, "width": 500, "height": 400, "upload_date": "15 April 2007", "owner_id": 376395, "owner_name": "JeffSullivan (www.MyPhotoGuides.com)", "owner_url": "http://www.panoramio.com/user/376395"}
,
{"item_id": 5796376, "item_title": "Shuto Expressway Loop Line in Nihombashi", "item_url": "http://www.panoramio.com/photo/5796376", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5796376.jpg", "longitude": 139.776344, "latitude": 35.684536, "width": 327, "height": 500, "upload_date": "08 November 2007", "owner_id": 558055, "owner_name": "www.tokyoform.com", "owner_url": "http://www.panoramio.com/user/558055"}
,
{"item_id": 5523741, "item_title": "Liuna Local 183", "item_url": "http://www.panoramio.com/photo/5523741", "item_file_url": "<?php echo $base;?>img/union/local183.jpg", "longitude": -79.492234, "latitude": 43.722757, "width": 375, "height": 500, "upload_date": "24 October 2007", "owner_id": 133037, "owner_name": "Lilypon", "owner_url": "http://www.panoramio.com/user/133037"}
,
{"item_id": 196125, "item_title": "arnÃ­a y covachos", "item_url": "http://www.panoramio.com/photo/196125", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/196125.jpg", "longitude": -3.914223, "latitude": 43.474349, "width": 500, "height": 337, "upload_date": "20 December 2006", "owner_id": 38804, "owner_name": "www.oscarsanchez.net", "owner_url": "http://www.panoramio.com/user/38804"}
,
{"item_id": 349726, "item_title": "thailand ko-samui sunset", "item_url": "http://www.panoramio.com/photo/349726", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/349726.jpg", "longitude": 99.930954, "latitude": 9.472344, "width": 500, "height": 334, "upload_date": "08 January 2007", "owner_id": 69671, "owner_name": "illusandpics.com", "owner_url": "http://www.panoramio.com/user/69671"}
,
{"item_id": 280106, "item_title": "dune01", "item_url": "http://www.panoramio.com/photo/280106", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/280106.jpg", "longitude": -5.089073, "latitude": 30.229408, "width": 500, "height": 345, "upload_date": "01 January 2007", "owner_id": 58867, "owner_name": "Lachaud Franck", "owner_url": "http://www.panoramio.com/user/58867"}
,
{"item_id": 4446015, "item_title": "Mennyei fÃ©nyjÃ¡tÃ©k", "item_url": "http://www.panoramio.com/photo/4446015", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4446015.jpg", "longitude": 17.818108, "latitude": 47.525084, "width": 500, "height": 333, "upload_date": "06 September 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 4644180, "item_title": "Bridalveil Falls from Valley View", "item_url": "http://www.panoramio.com/photo/4644180", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4644180.jpg", "longitude": -119.661723, "latitude": 37.717419, "width": 500, "height": 357, "upload_date": "14 September 2007", "owner_id": 376395, "owner_name": "JeffSullivan (www.MyPhotoGuides.com)", "owner_url": "http://www.panoramio.com/user/376395"}
,
{"item_id": 457302, "item_title": "Matterhorn Zermatt", "item_url": "http://www.panoramio.com/photo/457302", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/457302.jpg", "longitude": 7.746391, "latitude": 46.016992, "width": 500, "height": 375, "upload_date": "16 January 2007", "owner_id": 47930, "owner_name": "werni", "owner_url": "http://www.panoramio.com/user/47930"}
,
{"item_id": 4258138, "item_title": "SzentkÃºt", "item_url": "http://www.panoramio.com/photo/4258138", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4258138.jpg", "longitude": 17.731848, "latitude": 47.243755, "width": 500, "height": 334, "upload_date": "28 August 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 26986, "item_title": "Cementerio General", "item_url": "http://www.panoramio.com/photo/26986", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/26986.jpg", "longitude": -84.091158, "latitude": 9.930047, "width": 500, "height": 373, "upload_date": "23 June 2006", "owner_id": 4112, "owner_name": "Roberto Garcia", "owner_url": "http://www.panoramio.com/user/4112"}
,
{"item_id": 1269869, "item_title": "Barents Sea at night, Finnmark, Norway", "item_url": "http://www.panoramio.com/photo/1269869", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1269869.jpg", "longitude": 30.868149, "latitude": 70.438638, "width": 500, "height": 324, "upload_date": "11 March 2007", "owner_id": 66734, "owner_name": "Svein Solhaug", "owner_url": "http://www.panoramio.com/user/66734"}
,
{"item_id": 515971, "item_title": "A hosszÃºtÃ¡vfutÃ³ magÃ¡nyossÃ¡ga", "item_url": "http://www.panoramio.com/photo/515971", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/515971.jpg", "longitude": 17.870121, "latitude": 47.373012, "width": 500, "height": 276, "upload_date": "21 January 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 36486, "item_title": "Sunrise on Trondheimsfjord", "item_url": "http://www.panoramio.com/photo/36486", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/36486.jpg", "longitude": 10.333843, "latitude": 63.456186, "width": 500, "height": 332, "upload_date": "02 August 2006", "owner_id": 5703, "owner_name": "dancer", "owner_url": "http://www.panoramio.com/user/5703"}
,
{"item_id": 4950702, "item_title": "Abandoned Gas Stand, Hachimantai, Iwate, Japan", "item_url": "http://www.panoramio.com/photo/4950702", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4950702.jpg", "longitude": 141.062308, "latitude": 39.955547, "width": 500, "height": 335, "upload_date": "28 September 2007", "owner_id": 699984, "owner_name": "Fried Toast", "owner_url": "http://www.panoramio.com/user/699984"}
,
{"item_id": 2345653, "item_title": "planet mars", "item_url": "http://www.panoramio.com/photo/2345653", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2345653.jpg", "longitude": 33.631908, "latitude": 27.380118, "width": 500, "height": 322, "upload_date": "22 May 2007", "owner_id": 223374, "owner_name": "voutsen", "owner_url": "http://www.panoramio.com/user/223374"}
,
{"item_id": 4612307, "item_title": "Sitges - Spinaker", "item_url": "http://www.panoramio.com/photo/4612307", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4612307.jpg", "longitude": 1.859436, "latitude": 41.211722, "width": 500, "height": 371, "upload_date": "13 September 2007", "owner_id": 138691, "owner_name": "Josep Maria Alegre", "owner_url": "http://www.panoramio.com/user/138691"}
,
{"item_id": 4644311, "item_title": "Through the Looking Glass", "item_url": "http://www.panoramio.com/photo/4644311", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4644311.jpg", "longitude": -119.649745, "latitude": 37.722019, "width": 333, "height": 500, "upload_date": "14 September 2007", "owner_id": 376395, "owner_name": "JeffSullivan (www.MyPhotoGuides.com)", "owner_url": "http://www.panoramio.com/user/376395"}
,
{"item_id": 1480664, "item_title": "KirÃ¡lyi szurkolÃ³tÃ¡bor", "item_url": "http://www.panoramio.com/photo/1480664", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1480664.jpg", "longitude": 17.300034, "latitude": 47.190646, "width": 500, "height": 269, "upload_date": "24 March 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 8492774, "item_title": "Lago Fedaia  in estate  Panoramio and ATP first CONTEST, March 2008, category  Scenery : awarded \" Honorable Mention\". Many thanks to all voters", "item_url": "http://www.panoramio.com/photo/8492774", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/8492774.jpg", "longitude": 11.867519, "latitude": 46.463128, "width": 500, "height": 375, "upload_date": "12 March 2008", "owner_id": 6033, "owner_name": "â–º Marco Vanzo", "owner_url": "http://www.panoramio.com/user/6033"}
,
{"item_id": 57835, "item_title": "Seewaldsee 2 - St.Koloman", "item_url": "http://www.panoramio.com/photo/57835", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/57835.jpg", "longitude": 13.274918, "latitude": 47.630115, "width": 500, "height": 333, "upload_date": "05 October 2006", "owner_id": 8060, "owner_name": "Norbert MAIER", "owner_url": "http://www.panoramio.com/user/8060"}
,
{"item_id": 57837, "item_title": "Der Hraunfossar an einem kalten Wintertag .....(MS)", "item_url": "http://www.panoramio.com/photo/57837", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/57837.jpg", "longitude": -20.939941, "latitude": 64.698078, "width": 500, "height": 264, "upload_date": "05 October 2006", "owner_id": 7434, "owner_name": "baldinger reisen ag, waedenswil/switzerland", "owner_url": "http://www.panoramio.com/user/7434"}
,
{"item_id": 70641, "item_title": "Lake Nakuru (Kenya)", "item_url": "http://www.panoramio.com/photo/70641", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/70641.jpg", "longitude": 36.114979, "latitude": -0.324782, "width": 500, "height": 333, "upload_date": "25 October 2006", "owner_id": 8975, "owner_name": "Laura Sayalero", "owner_url": "http://www.panoramio.com/user/8975"}
,
{"item_id": 766205, "item_title": "posta sol porto colom", "item_url": "http://www.panoramio.com/photo/766205", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/766205.jpg", "longitude": 3.264495, "latitude": 39.425093, "width": 500, "height": 335, "upload_date": "10 February 2007", "owner_id": 134682, "owner_name": "------ Cafate ------", "owner_url": "http://www.panoramio.com/user/134682"}
,
{"item_id": 10662910, "item_title": "MegvilÃ¡gosodvÃ¡n", "item_url": "http://www.panoramio.com/photo/10662910", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/10662910.jpg", "longitude": 17.718544, "latitude": 47.460130, "width": 500, "height": 334, "upload_date": "27 May 2008", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 8703547, "item_title": "Lonely bike-rider", "item_url": "http://www.panoramio.com/photo/8703547", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/8703547.jpg", "longitude": 6.039004, "latitude": 52.208974, "width": 500, "height": 467, "upload_date": "21 March 2008", "owner_id": 523564, "owner_name": "Luud Riphagen", "owner_url": "http://www.panoramio.com/user/523564"}
,
{"item_id": 11669907, "item_title": "Alba sulle pale di San Martino", "item_url": "http://www.panoramio.com/photo/11669907", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/11669907.jpg", "longitude": 11.568518, "latitude": 46.345269, "width": 500, "height": 361, "upload_date": "30 June 2008", "owner_id": 6033, "owner_name": "â–º Marco Vanzo", "owner_url": "http://www.panoramio.com/user/6033"}
,
{"item_id": 11403916, "item_title": "Lonely", "item_url": "http://www.panoramio.com/photo/11403916", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/11403916.jpg", "longitude": 18.164520, "latitude": 46.345269, "width": 500, "height": 375, "upload_date": "21 June 2008", "owner_id": 328249, "owner_name": "v.zsoloo", "owner_url": "http://www.panoramio.com/user/328249"}
,
{"item_id": 289803, "item_title": "Rain Clouds", "item_url": "http://www.panoramio.com/photo/289803", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/289803.jpg", "longitude": -57.733154, "latitude": -51.661908, "width": 500, "height": 335, "upload_date": "03 January 2007", "owner_id": 61890, "owner_name": "enriquevidalphoto.com", "owner_url": "http://www.panoramio.com/user/61890"}
,
{"item_id": 123413, "item_title": "Paisaje cromÃ¡tico de Landmanalaugar", "item_url": "http://www.panoramio.com/photo/123413", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/123413.jpg", "longitude": -19.085140, "latitude": 63.918285, "width": 500, "height": 332, "upload_date": "12 December 2006", "owner_id": 20549, "owner_name": "oscarvg", "owner_url": "http://www.panoramio.com/user/20549"}
,
{"item_id": 595734, "item_title": "Sphinx profile", "item_url": "http://www.panoramio.com/photo/595734", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/595734.jpg", "longitude": 31.137791, "latitude": 29.975034, "width": 500, "height": 330, "upload_date": "27 January 2007", "owner_id": 124418, "owner_name": "Pierre-Jean Durieu", "owner_url": "http://www.panoramio.com/user/124418"}
,
{"item_id": 3282726, "item_title": "Shanghai - Inside the Jinmao Tower", "item_url": "http://www.panoramio.com/photo/3282726", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3282726.jpg", "longitude": 121.501153, "latitude": 31.237519, "width": 500, "height": 335, "upload_date": "13 July 2007", "owner_id": 578163, "owner_name": "Margherita-Italy", "owner_url": "http://www.panoramio.com/user/578163"}
,
{"item_id": 1346342, "item_title": "nemrut", "item_url": "http://www.panoramio.com/photo/1346342", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1346342.jpg", "longitude": 38.761826, "latitude": 38.042413, "width": 340, "height": 500, "upload_date": "16 March 2007", "owner_id": 2659, "owner_name": "ozalph", "owner_url": "http://www.panoramio.com/user/2659"}
,
{"item_id": 151849, "item_title": "panoramas photo @ the cross at Xin-Yi and Kee-Lung road ( my 2nd try )", "item_url": "http://www.panoramio.com/photo/151849", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/151849.jpg", "longitude": 121.559209, "latitude": 25.033073, "width": 500, "height": 348, "upload_date": "15 December 2006", "owner_id": 27791, "owner_name": "Jerome Chen", "owner_url": "http://www.panoramio.com/user/27791"}
,
{"item_id": 1212973, "item_title": "Perhaps Neruda's View", "item_url": "http://www.panoramio.com/photo/1212973", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1212973.jpg", "longitude": 14.398935, "latitude": 50.084752, "width": 500, "height": 333, "upload_date": "07 March 2007", "owner_id": 66847, "owner_name": "Lukas Novak", "owner_url": "http://www.panoramio.com/user/66847"}
,
{"item_id": 809789, "item_title": "Pihike", "item_url": "http://www.panoramio.com/photo/809789", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/809789.jpg", "longitude": 17.457018, "latitude": 47.881010, "width": 500, "height": 387, "upload_date": "13 February 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 88150, "item_title": "Marmore Falls - Umbria - Italy", "item_url": "http://www.panoramio.com/photo/88150", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/88150.jpg", "longitude": 12.716667, "latitude": 42.550000, "width": 375, "height": 500, "upload_date": "28 November 2006", "owner_id": 11098, "owner_name": "Michele Masnata", "owner_url": "http://www.panoramio.com/user/11098"}
,
{"item_id": 624990, "item_title": "MÃ©lyrepÃ¼lÃ©s", "item_url": "http://www.panoramio.com/photo/624990", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/624990.jpg", "longitude": 17.455988, "latitude": 47.881931, "width": 500, "height": 288, "upload_date": "30 January 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 612449, "item_title": "Rio de Janeiro - Vista do Corcovado Â©G.SchÃ¼Ã¼r", "item_url": "http://www.panoramio.com/photo/612449", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/612449.jpg", "longitude": -43.210323, "latitude": -22.951463, "width": 500, "height": 400, "upload_date": "29 January 2007", "owner_id": 120756, "owner_name": "Germano SchÃ¼Ã¼r", "owner_url": "http://www.panoramio.com/user/120756"}
,
{"item_id": 1545313, "item_title": "Tempestade", "item_url": "http://www.panoramio.com/photo/1545313", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1545313.jpg", "longitude": -48.678703, "latitude": -26.643470, "width": 500, "height": 341, "upload_date": "29 March 2007", "owner_id": 160342, "owner_name": "Jakson Santos", "owner_url": "http://www.panoramio.com/user/160342"}
,
{"item_id": 1595492, "item_title": "ExplosiÃ³n Rosa", "item_url": "http://www.panoramio.com/photo/1595492", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1595492.jpg", "longitude": -73.250393, "latitude": -39.813481, "width": 500, "height": 375, "upload_date": "02 April 2007", "owner_id": 327310, "owner_name": "Erwin Woenckhaus", "owner_url": "http://www.panoramio.com/user/327310"}
,
{"item_id": 5501284, "item_title": "Da qui passano i sogni...", "item_url": "http://www.panoramio.com/photo/5501284", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5501284.jpg", "longitude": 12.335930, "latitude": 45.435563, "width": 375, "height": 500, "upload_date": "23 October 2007", "owner_id": 325031, "owner_name": "Gibrail", "owner_url": "http://www.panoramio.com/user/325031"}
,
{"item_id": 444265, "item_title": "Cafe, Calle and Capitol of Cuba", "item_url": "http://www.panoramio.com/photo/444265", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/444265.jpg", "longitude": -82.350453, "latitude": 23.136354, "width": 500, "height": 375, "upload_date": "15 January 2007", "owner_id": 57893, "owner_name": "ThoiryK", "owner_url": "http://www.panoramio.com/user/57893"}
,
{"item_id": 9590, "item_title": "South Street Seaport and Financial Center Skyline [007783]", "item_url": "http://www.panoramio.com/photo/9590", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/9590.jpg", "longitude": -74.001760, "latitude": 40.704937, "width": 500, "height": 375, "upload_date": "04 February 2006", "owner_id": 1489, "owner_name": "Thorsten", "owner_url": "http://www.panoramio.com/user/1489"}
,
{"item_id": 204153, "item_title": "Stormheimfjell and Hamperokken mountains near Brevikeidet ", "item_url": "http://www.panoramio.com/photo/204153", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/204153.jpg", "longitude": 19.650421, "latitude": 69.668899, "width": 500, "height": 375, "upload_date": "21 December 2006", "owner_id": 39160, "owner_name": "Snemann", "owner_url": "http://www.panoramio.com/user/39160"}
,
{"item_id": 916095, "item_title": "Before daybreak on Mount Etna (as seen from Piano Provenzana)", "item_url": "http://www.panoramio.com/photo/916095", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/916095.jpg", "longitude": 15.038610, "latitude": 37.793881, "width": 500, "height": 375, "upload_date": "20 February 2007", "owner_id": 67714, "owner_name": "Robert Gulyas", "owner_url": "http://www.panoramio.com/user/67714"}
,
{"item_id": 680320, "item_title": "A severe storm approaches Nyngan, NSW  www.ozthunder.com", "item_url": "http://www.panoramio.com/photo/680320", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/680320.jpg", "longitude": 147.154312, "latitude": -31.563910, "width": 500, "height": 378, "upload_date": "04 February 2007", "owner_id": 67208, "owner_name": "Michael Thompson", "owner_url": "http://www.panoramio.com/user/67208"}
,
{"item_id": 6018, "item_title": "Jadrija - barke", "item_url": "http://www.panoramio.com/photo/6018", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6018.jpg", "longitude": 15.841599, "latitude": 43.725026, "width": 500, "height": 176, "upload_date": "18 December 2005", "owner_id": 991, "owner_name": "Mario Marotti", "owner_url": "http://www.panoramio.com/user/991"}
,
{"item_id": 36485, "item_title": "Great Belt Bridge", "item_url": "http://www.panoramio.com/photo/36485", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/36485.jpg", "longitude": 11.029501, "latitude": 55.342130, "width": 500, "height": 332, "upload_date": "02 August 2006", "owner_id": 5703, "owner_name": "dancer", "owner_url": "http://www.panoramio.com/user/5703"}
,
{"item_id": 19098, "item_title": "JÃ¶kulsÃ¡rlÃ³n", "item_url": "http://www.panoramio.com/photo/19098", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/19098.jpg", "longitude": -16.355896, "latitude": 64.037351, "width": 500, "height": 333, "upload_date": "02 May 2006", "owner_id": 2885, "owner_name": "Luis RodrÃ­guez Baena", "owner_url": "http://www.panoramio.com/user/2885"}
,
{"item_id": 55458, "item_title": "034 Troianisches Pferd", "item_url": "http://www.panoramio.com/photo/55458", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/55458.jpg", "longitude": 26.240464, "latitude": 39.957188, "width": 375, "height": 500, "upload_date": "01 October 2006", "owner_id": 7633, "owner_name": "Daniel Meyer", "owner_url": "http://www.panoramio.com/user/7633"}
,
{"item_id": 1800357, "item_title": "Beach & Evening Light - Garrapata State Park Big Sur, CA", "item_url": "http://www.panoramio.com/photo/1800357", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1800357.jpg", "longitude": -121.925915, "latitude": 36.455437, "width": 500, "height": 345, "upload_date": "16 April 2007", "owner_id": 107613, "owner_name": "Tom Grubbe", "owner_url": "http://www.panoramio.com/user/107613"}
,
{"item_id": 1447086, "item_title": "Odyssey", "item_url": "http://www.panoramio.com/photo/1447086", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1447086.jpg", "longitude": 15.923395, "latitude": 43.589530, "width": 500, "height": 323, "upload_date": "22 March 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 10378421, "item_title": "Red Bus", "item_url": "http://www.panoramio.com/photo/10378421", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/10378421.jpg", "longitude": -0.124497, "latitude": 51.500809, "width": 414, "height": 500, "upload_date": "19 May 2008", "owner_id": 325031, "owner_name": "Gibrail", "owner_url": "http://www.panoramio.com/user/325031"}
,
{"item_id": 1087672, "item_title": "Ã‰s azutÃ¡n menydÃ¶rgÃ©st hallottunk...", "item_url": "http://www.panoramio.com/photo/1087672", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1087672.jpg", "longitude": 15.917473, "latitude": 43.590836, "width": 500, "height": 299, "upload_date": "28 February 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 74950, "item_title": "é«˜åƒç©‚", "item_url": "http://www.panoramio.com/photo/74950", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/74950.jpg", "longitude": 131.019516, "latitude": 32.320504, "width": 500, "height": 375, "upload_date": "03 November 2006", "owner_id": 9556, "owner_name": "shigesato", "owner_url": "http://www.panoramio.com/user/9556"}
,
{"item_id": 1749978, "item_title": "Campos de Criptana", "item_url": "http://www.panoramio.com/photo/1749978", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1749978.jpg", "longitude": -3.123207, "latitude": 39.409805, "width": 500, "height": 334, "upload_date": "12 April 2007", "owner_id": 10969, "owner_name": "Juanra", "owner_url": "http://www.panoramio.com/user/10969"}
,
{"item_id": 94171, "item_title": "Matsumoto Castle", "item_url": "http://www.panoramio.com/photo/94171", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/94171.jpg", "longitude": 137.967778, "latitude": 36.239194, "width": 408, "height": 500, "upload_date": "09 December 2006", "owner_id": 11781, "owner_name": "ANDRE GARDELLA", "owner_url": "http://www.panoramio.com/user/11781"}
,
{"item_id": 2053084, "item_title": "Blue lagoon, Melchior islands", "item_url": "http://www.panoramio.com/photo/2053084", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2053084.jpg", "longitude": -62.830811, "latitude": -64.415921, "width": 500, "height": 336, "upload_date": "03 May 2007", "owner_id": 3316, "owner_name": "kristine hannon (www.traveltheglobe.be)", "owner_url": "http://www.panoramio.com/user/3316"}
,
{"item_id": 86244, "item_title": "Palmeras", "item_url": "http://www.panoramio.com/photo/86244", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/86244.jpg", "longitude": -1.116829, "latitude": 37.930930, "width": 333, "height": 500, "upload_date": "25 November 2006", "owner_id": 10969, "owner_name": "Juanra", "owner_url": "http://www.panoramio.com/user/10969"}
,
{"item_id": 629489, "item_title": "Hare in winter fur...beast of the Cave of Caerbannog.", "item_url": "http://www.panoramio.com/photo/629489", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/629489.jpg", "longitude": -105.645390, "latitude": 40.296593, "width": 500, "height": 376, "upload_date": "31 January 2007", "owner_id": 87752, "owner_name": "Richard Ryer", "owner_url": "http://www.panoramio.com/user/87752"}
,
{"item_id": 8459506, "item_title": "Baltic sunrise in Kiel", "item_url": "http://www.panoramio.com/photo/8459506", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/8459506.jpg", "longitude": 10.169671, "latitude": 54.430970, "width": 500, "height": 375, "upload_date": "11 March 2008", "owner_id": 73946, "owner_name": "pembo", "owner_url": "http://www.panoramio.com/user/73946"}
,
{"item_id": 36599, "item_title": "Ñ† Ð—Ð°Ñ‡Ð°Ñ‚Ð¸Ñ ÐÐ½Ð½Ñ‹ Ð½Ð° Ð£Ð³Ð»Ñƒ", "item_url": "http://www.panoramio.com/photo/36599", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/36599.jpg", "longitude": 37.630963, "latitude": 55.750159, "width": 500, "height": 375, "upload_date": "03 August 2006", "owner_id": 5641, "owner_name": "sergey duhanin", "owner_url": "http://www.panoramio.com/user/5641"}
,
{"item_id": 62716, "item_title": "Amanecer en la Sauceda", "item_url": "http://www.panoramio.com/photo/62716", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/62716.jpg", "longitude": -5.591730, "latitude": 36.521630, "width": 500, "height": 330, "upload_date": "15 October 2006", "owner_id": 473, "owner_name": "Juanlu", "owner_url": "http://www.panoramio.com/user/473"}
,
{"item_id": 4709631, "item_title": "The sun sets in the East....", "item_url": "http://www.panoramio.com/photo/4709631", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4709631.jpg", "longitude": -112.624583, "latitude": 45.211038, "width": 500, "height": 375, "upload_date": "17 September 2007", "owner_id": 71099, "owner_name": "Eve in Montana", "owner_url": "http://www.panoramio.com/user/71099"}
,
{"item_id": 11408203, "item_title": "05-08-31_Paramo de MASA_PIXELECTA", "item_url": "http://www.panoramio.com/photo/11408203", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/11408203.jpg", "longitude": -3.536568, "latitude": 42.669357, "width": 500, "height": 375, "upload_date": "21 June 2008", "owner_id": 163655, "owner_name": "[[[   PIXELECTA   ]]]", "owner_url": "http://www.panoramio.com/user/163655"}
,
{"item_id": 416263, "item_title": "Mt. Meeker at Dawn", "item_url": "http://www.panoramio.com/photo/416263", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/416263.jpg", "longitude": -105.579643, "latitude": 40.270472, "width": 500, "height": 374, "upload_date": "13 January 2007", "owner_id": 87752, "owner_name": "Richard Ryer", "owner_url": "http://www.panoramio.com/user/87752"}
,
{"item_id": 1289233, "item_title": " High Dades", "item_url": "http://www.panoramio.com/photo/1289233", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1289233.jpg", "longitude": -5.838375, "latitude": 31.652066, "width": 500, "height": 329, "upload_date": "12 March 2007", "owner_id": 232099, "owner_name": "mabut", "owner_url": "http://www.panoramio.com/user/232099"}
,
{"item_id": 1567767, "item_title": "Rosina Lamberti - Sunset Templestowe, 31 March 2007", "item_url": "http://www.panoramio.com/photo/1567767", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1567767.jpg", "longitude": 145.133858, "latitude": -37.765015, "width": 500, "height": 237, "upload_date": "31 March 2007", "owner_id": 140796, "owner_name": "rosina lamberti", "owner_url": "http://www.panoramio.com/user/140796"}
,
{"item_id": 4130842, "item_title": "Ãrvore Solar", "item_url": "http://www.panoramio.com/photo/4130842", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4130842.jpg", "longitude": -51.830320, "latitude": -22.939424, "width": 427, "height": 500, "upload_date": "23 August 2007", "owner_id": 465654, "owner_name": "Carlos Sica", "owner_url": "http://www.panoramio.com/user/465654"}
,
{"item_id": 340508, "item_title": "Sunset from Camelback Mountain Echo Trail", "item_url": "http://www.panoramio.com/photo/340508", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/340508.jpg", "longitude": -111.969969, "latitude": 33.520820, "width": 333, "height": 500, "upload_date": "08 January 2007", "owner_id": 45308, "owner_name": "Mike Cavaroc", "owner_url": "http://www.panoramio.com/user/45308"}
,
{"item_id": 74792, "item_title": "annapurna south", "item_url": "http://www.panoramio.com/photo/74792", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/74792.jpg", "longitude": 83.804398, "latitude": 28.524813, "width": 500, "height": 334, "upload_date": "03 November 2006", "owner_id": 9812, "owner_name": "wsm earp", "owner_url": "http://www.panoramio.com/user/9812"}
,
{"item_id": 4445995, "item_title": "KÃ¶dvarÃ¡zs", "item_url": "http://www.panoramio.com/photo/4445995", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4445995.jpg", "longitude": 18.053970, "latitude": 47.276783, "width": 500, "height": 334, "upload_date": "06 September 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 3032620, "item_title": "Mira sin bueyes", "item_url": "http://www.panoramio.com/photo/3032620", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3032620.jpg", "longitude": -8.802710, "latitude": 40.459324, "width": 500, "height": 327, "upload_date": "30 June 2007", "owner_id": 129297, "owner_name": "Enrique Ortiz de ZÃ¡rate", "owner_url": "http://www.panoramio.com/user/129297"}
,
{"item_id": 415533, "item_title": "Manila Sunset", "item_url": "http://www.panoramio.com/photo/415533", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/415533.jpg", "longitude": 120.984208, "latitude": 14.572339, "width": 333, "height": 500, "upload_date": "13 January 2007", "owner_id": 20398, "owner_name": "boerx", "owner_url": "http://www.panoramio.com/user/20398"}
,
{"item_id": 723004, "item_title": "Bouncing Light", "item_url": "http://www.panoramio.com/photo/723004", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/723004.jpg", "longitude": 25.379276, "latitude": 36.461468, "width": 500, "height": 332, "upload_date": "07 February 2007", "owner_id": 66847, "owner_name": "Lukas Novak", "owner_url": "http://www.panoramio.com/user/66847"}
,
{"item_id": 2514494, "item_title": "klatschmohn bis zum Horizont", "item_url": "http://www.panoramio.com/photo/2514494", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2514494.jpg", "longitude": 12.025051, "latitude": 54.145244, "width": 500, "height": 334, "upload_date": "01 June 2007", "owner_id": 82603, "owner_name": "HelgeNug", "owner_url": "http://www.panoramio.com/user/82603"}
,
{"item_id": 436289, "item_title": "koaganogawa", "item_url": "http://www.panoramio.com/photo/436289", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/436289.jpg", "longitude": 139.065456, "latitude": 37.831548, "width": 500, "height": 341, "upload_date": "15 January 2007", "owner_id": 86411, "owner_name": "ä¸­æ‘è„©-Osamu nakamura", "owner_url": "http://www.panoramio.com/user/86411"}
,
{"item_id": 73027, "item_title": "Concourse, British Museum", "item_url": "http://www.panoramio.com/photo/73027", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/73027.jpg", "longitude": -0.127201, "latitude": 51.519532, "width": 500, "height": 326, "upload_date": "29 October 2006", "owner_id": 1295, "owner_name": "Matthew Walters", "owner_url": "http://www.panoramio.com/user/1295"}
,
{"item_id": 9766996, "item_title": "Racetrack Playa", "item_url": "http://www.panoramio.com/photo/9766996", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/9766996.jpg", "longitude": -117.558091, "latitude": 36.664815, "width": 388, "height": 500, "upload_date": "29 April 2008", "owner_id": 308300, "owner_name": "Tony R Immoos", "owner_url": "http://www.panoramio.com/user/308300"}
,
{"item_id": 1455193, "item_title": "Ð’ÑƒÐ»ÐºÐ°Ð½ ÐšÐ°Ñ€Ñ‹Ð¼ÑÐºÐ¸Ð¹, ÑÐ¾ ÑÐºÐ»Ð¾Ð½Ð° Ð²ÑƒÐ»ÐºÐ°Ð½Ð° ÐœÐ°Ð»Ñ‹Ð¹ Ð¡ÐµÐ¼ÑÑ‡Ð¸Ðº", "item_url": "http://www.panoramio.com/photo/1455193", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1455193.jpg", "longitude": 159.626970, "latitude": 54.133227, "width": 500, "height": 345, "upload_date": "23 March 2007", "owner_id": 268724, "owner_name": "Korotnev AV", "owner_url": "http://www.panoramio.com/user/268724"}
,
{"item_id": 1234797, "item_title": "Sahalie Falls, Mckenzie River", "item_url": "http://www.panoramio.com/photo/1234797", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1234797.jpg", "longitude": -121.997187, "latitude": 44.348769, "width": 500, "height": 420, "upload_date": "09 March 2007", "owner_id": 128746, "owner_name": "Â© Michael Hatten", "owner_url": "http://www.panoramio.com/user/128746"}
,
{"item_id": 3989102, "item_title": "El Gran MiÃ©rcoles", "item_url": "http://www.panoramio.com/photo/3989102", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3989102.jpg", "longitude": -17.991056, "latitude": 27.797638, "width": 500, "height": 375, "upload_date": "17 August 2007", "owner_id": 787217, "owner_name": "â™£ VÃ­ctor S de Lara â™£", "owner_url": "http://www.panoramio.com/user/787217"}
,
{"item_id": 85625, "item_title": "CaÃ±Ã³n de Valdeinfiernos", "item_url": "http://www.panoramio.com/photo/85625", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/85625.jpg", "longitude": -1.961060, "latitude": 37.801511, "width": 333, "height": 500, "upload_date": "24 November 2006", "owner_id": 10969, "owner_name": "Juanra", "owner_url": "http://www.panoramio.com/user/10969"}
,
{"item_id": 4558716, "item_title": "Corsica - West Coast", "item_url": "http://www.panoramio.com/photo/4558716", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4558716.jpg", "longitude": 8.655338, "latitude": 42.253108, "width": 500, "height": 341, "upload_date": "10 September 2007", "owner_id": 49870, "owner_name": "Jean-Michel Raggioli", "owner_url": "http://www.panoramio.com/user/49870"}
,
{"item_id": 3201916, "item_title": "MÃ¶nch", "item_url": "http://www.panoramio.com/photo/3201916", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3201916.jpg", "longitude": 7.640026, "latitude": 46.745537, "width": 500, "height": 374, "upload_date": "09 July 2007", "owner_id": 635422, "owner_name": "â™« Swissmay", "owner_url": "http://www.panoramio.com/user/635422"}
,
{"item_id": 4365440, "item_title": "a piece of wood", "item_url": "http://www.panoramio.com/photo/4365440", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4365440.jpg", "longitude": -1.254158, "latitude": 44.480463, "width": 221, "height": 500, "upload_date": "03 September 2007", "owner_id": 521836, "owner_name": "KLEFER", "owner_url": "http://www.panoramio.com/user/521836"}
,
{"item_id": 124545, "item_title": "66_St-Cyp_vagues_01", "item_url": "http://www.panoramio.com/photo/124545", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/124545.jpg", "longitude": 3.037736, "latitude": 42.623436, "width": 500, "height": 333, "upload_date": "12 December 2006", "owner_id": 18696, "owner_name": "Besnard", "owner_url": "http://www.panoramio.com/user/18696"}
,
{"item_id": 65666, "item_title": "Barco fantasma", "item_url": "http://www.panoramio.com/photo/65666", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/65666.jpg", "longitude": -14.179380, "latitude": 28.344878, "width": 500, "height": 375, "upload_date": "18 October 2006", "owner_id": 8658, "owner_name": "Canarina", "owner_url": "http://www.panoramio.com/user/8658"}
,
{"item_id": 573064, "item_title": "Looking west across Isfjorden", "item_url": "http://www.panoramio.com/photo/573064", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/573064.jpg", "longitude": 7.681332, "latitude": 62.558395, "width": 500, "height": 332, "upload_date": "26 January 2007", "owner_id": 39160, "owner_name": "Snemann", "owner_url": "http://www.panoramio.com/user/39160"}
,
{"item_id": 859786, "item_title": "Aurora Borealis, AndÃ¸ya, VesterÃ¥len, Norway", "item_url": "http://www.panoramio.com/photo/859786", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/859786.jpg", "longitude": 15.605392, "latitude": 69.118548, "width": 500, "height": 377, "upload_date": "17 February 2007", "owner_id": 66734, "owner_name": "Svein Solhaug", "owner_url": "http://www.panoramio.com/user/66734"}
,
{"item_id": 507024, "item_title": "AgrÃ¡rcolorgeometria", "item_url": "http://www.panoramio.com/photo/507024", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/507024.jpg", "longitude": 18.014488, "latitude": 47.316017, "width": 500, "height": 300, "upload_date": "20 January 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 6665111, "item_title": "Coucher du soleil depuis les CrÃªts", "item_url": "http://www.panoramio.com/photo/6665111", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6665111.jpg", "longitude": 6.172214, "latitude": 46.129129, "width": 500, "height": 375, "upload_date": "24 December 2007", "owner_id": 359127, "owner_name": "wx", "owner_url": "http://www.panoramio.com/user/359127"}
,
{"item_id": 679331, "item_title": "wentworth falls", "item_url": "http://www.panoramio.com/photo/679331", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/679331.jpg", "longitude": 150.371124, "latitude": -33.727111, "width": 498, "height": 500, "upload_date": "04 February 2007", "owner_id": 146092, "owner_name": "sid1662", "owner_url": "http://www.panoramio.com/user/146092"}
,
{"item_id": 459436, "item_title": "aikawa", "item_url": "http://www.panoramio.com/photo/459436", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/459436.jpg", "longitude": 138.234701, "latitude": 37.998936, "width": 500, "height": 341, "upload_date": "16 January 2007", "owner_id": 86411, "owner_name": "ä¸­æ‘è„©-Osamu nakamura", "owner_url": "http://www.panoramio.com/user/86411"}
,
{"item_id": 31662, "item_title": "NY_7_GE", "item_url": "http://www.panoramio.com/photo/31662", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/31662.jpg", "longitude": -73.977041, "latitude": 40.761528, "width": 452, "height": 500, "upload_date": "11 July 2006", "owner_id": 4657, "owner_name": "Giuseppe Grande", "owner_url": "http://www.panoramio.com/user/4657"}
,
{"item_id": 1488304, "item_title": "", "item_url": "http://www.panoramio.com/photo/1488304", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1488304.jpg", "longitude": 138.135223, "latitude": 36.848719, "width": 383, "height": 500, "upload_date": "25 March 2007", "owner_id": 86411, "owner_name": "ä¸­æ‘è„©-Osamu nakamura", "owner_url": "http://www.panoramio.com/user/86411"}
,
{"item_id": 181939, "item_title": "The Eiffel Tower, Paris", "item_url": "http://www.panoramio.com/photo/181939", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/181939.jpg", "longitude": 2.288718, "latitude": 48.861920, "width": 384, "height": 500, "upload_date": "18 December 2006", "owner_id": 12954, "owner_name": "ZiÄ™bol", "owner_url": "http://www.panoramio.com/user/12954"}
,
{"item_id": 2422198, "item_title": "In the Pine's Shade", "item_url": "http://www.panoramio.com/photo/2422198", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2422198.jpg", "longitude": -112.393484, "latitude": 44.580075, "width": 500, "height": 333, "upload_date": "27 May 2007", "owner_id": 66847, "owner_name": "Lukas Novak", "owner_url": "http://www.panoramio.com/user/66847"}
,
{"item_id": 2363576, "item_title": "Cienfuegos Yacht Club", "item_url": "http://www.panoramio.com/photo/2363576", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2363576.jpg", "longitude": -80.450901, "latitude": 22.126499, "width": 500, "height": 306, "upload_date": "23 May 2007", "owner_id": 2575, "owner_name": "mikel ortega", "owner_url": "http://www.panoramio.com/user/2575"}
,
{"item_id": 58296, "item_title": "Liechtensteinklamm 2", "item_url": "http://www.panoramio.com/photo/58296", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/58296.jpg", "longitude": 13.190546, "latitude": 47.310140, "width": 333, "height": 500, "upload_date": "07 October 2006", "owner_id": 8060, "owner_name": "Norbert MAIER", "owner_url": "http://www.panoramio.com/user/8060"}
,
{"item_id": 507328, "item_title": "PillantÃ¡s a hÃ­drÃ³l", "item_url": "http://www.panoramio.com/photo/507328", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/507328.jpg", "longitude": 17.629859, "latitude": 47.687102, "width": 500, "height": 334, "upload_date": "20 January 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 468161, "item_title": "Honfleur", "item_url": "http://www.panoramio.com/photo/468161", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/468161.jpg", "longitude": 0.234833, "latitude": 49.421806, "width": 500, "height": 350, "upload_date": "17 January 2007", "owner_id": 78506, "owner_name": "Philippe Stoop", "owner_url": "http://www.panoramio.com/user/78506"}
,
{"item_id": 2521031, "item_title": "DerÅ±s dÃ©lutÃ¡n", "item_url": "http://www.panoramio.com/photo/2521031", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2521031.jpg", "longitude": 17.523537, "latitude": 47.751790, "width": 380, "height": 500, "upload_date": "02 June 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 934105, "item_title": "Times Square", "item_url": "http://www.panoramio.com/photo/934105", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/934105.jpg", "longitude": -73.986762, "latitude": 40.756652, "width": 375, "height": 500, "upload_date": "21 February 2007", "owner_id": 123698, "owner_name": "Â© Kojak", "owner_url": "http://www.panoramio.com/user/123698"}
,
{"item_id": 57824, "item_title": "Hallstatt 3", "item_url": "http://www.panoramio.com/photo/57824", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/57824.jpg", "longitude": 13.642616, "latitude": 47.556372, "width": 500, "height": 333, "upload_date": "05 October 2006", "owner_id": 8060, "owner_name": "Norbert MAIER", "owner_url": "http://www.panoramio.com/user/8060"}
,
{"item_id": 1370861, "item_title": "Wanganui Sunrise", "item_url": "http://www.panoramio.com/photo/1370861", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1370861.jpg", "longitude": 175.053218, "latitude": -39.927193, "width": 500, "height": 400, "upload_date": "17 March 2007", "owner_id": 286729, "owner_name": "jimwitkowski", "owner_url": "http://www.panoramio.com/user/286729"}
,
{"item_id": 4823023, "item_title": "Cielo en llamas ( Sky on fire )", "item_url": "http://www.panoramio.com/photo/4823023", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4823023.jpg", "longitude": -0.471725, "latitude": 39.601588, "width": 500, "height": 375, "upload_date": "22 September 2007", "owner_id": 787217, "owner_name": "â™£ VÃ­ctor S de Lara â™£", "owner_url": "http://www.panoramio.com/user/787217"}
,
{"item_id": 520945, "item_title": "EstvarÃ¡zs", "item_url": "http://www.panoramio.com/photo/520945", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/520945.jpg", "longitude": 17.627692, "latitude": 47.665156, "width": 500, "height": 334, "upload_date": "21 January 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 818423, "item_title": "Karst Countryside in Guangxi, China", "item_url": "http://www.panoramio.com/photo/818423", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/818423.jpg", "longitude": 106.953964, "latitude": 22.716023, "width": 500, "height": 206, "upload_date": "14 February 2007", "owner_id": 164125, "owner_name": "DannyXu", "owner_url": "http://www.panoramio.com/user/164125"}
,
{"item_id": 532730, "item_title": "Nightfall and fog at lake Helgeren", "item_url": "http://www.panoramio.com/photo/532730", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/532730.jpg", "longitude": 10.708923, "latitude": 60.074348, "width": 419, "height": 500, "upload_date": "22 January 2007", "owner_id": 39160, "owner_name": "Snemann", "owner_url": "http://www.panoramio.com/user/39160"}
,
{"item_id": 650237, "item_title": "Aruba, Eagle Beach, Divi Divi Tree", "item_url": "http://www.panoramio.com/photo/650237", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/650237.jpg", "longitude": -70.055099, "latitude": 12.555003, "width": 500, "height": 375, "upload_date": "01 February 2007", "owner_id": 136446, "owner_name": "Â© Wim", "owner_url": "http://www.panoramio.com/user/136446"}
,
{"item_id": 2414590, "item_title": "Egy csendes estÃ©n", "item_url": "http://www.panoramio.com/photo/2414590", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2414590.jpg", "longitude": 17.626448, "latitude": 47.662613, "width": 500, "height": 334, "upload_date": "27 May 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 10544520, "item_title": "Plansee", "item_url": "http://www.panoramio.com/photo/10544520", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/10544520.jpg", "longitude": 10.799389, "latitude": 47.473011, "width": 500, "height": 242, "upload_date": "24 May 2008", "owner_id": 634000, "owner_name": "Â© Massimo De Candido", "owner_url": "http://www.panoramio.com/user/634000"}
,
{"item_id": 11341211, "item_title": "AMAPOLAS AL SOL", "item_url": "http://www.panoramio.com/photo/11341211", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/11341211.jpg", "longitude": -1.995735, "latitude": 42.471844, "width": 500, "height": 374, "upload_date": "19 June 2008", "owner_id": 1487989, "owner_name": "mesias", "owner_url": "http://www.panoramio.com/user/1487989"}
,
{"item_id": 134748, "item_title": "20060813_9795_raw", "item_url": "http://www.panoramio.com/photo/134748", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/134748.jpg", "longitude": 30.452921, "latitude": 50.358700, "width": 500, "height": 333, "upload_date": "13 December 2006", "owner_id": 17090, "owner_name": "Pavel Danko", "owner_url": "http://www.panoramio.com/user/17090"}
,
{"item_id": 66816, "item_title": "desierto cerca de Tolar Grande", "item_url": "http://www.panoramio.com/photo/66816", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/66816.jpg", "longitude": -67.394257, "latitude": -24.584593, "width": 374, "height": 500, "upload_date": "19 October 2006", "owner_id": 9080, "owner_name": "Marco Teodonio", "owner_url": "http://www.panoramio.com/user/9080"}
,
{"item_id": 70148, "item_title": "Grotto Azure, Capris: The cave is lit by light refracting through the water.", "item_url": "http://www.panoramio.com/photo/70148", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/70148.jpg", "longitude": 14.203262, "latitude": 40.560895, "width": 500, "height": 375, "upload_date": "25 October 2006", "owner_id": 1634, "owner_name": "Rick Guthrie", "owner_url": "http://www.panoramio.com/user/1634"}
,
{"item_id": 1409801, "item_title": "Hedges, Aerial", "item_url": "http://www.panoramio.com/photo/1409801", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1409801.jpg", "longitude": 9.027843, "latitude": 56.130772, "width": 332, "height": 500, "upload_date": "20 March 2007", "owner_id": 278074, "owner_name": "H. C. Steensen", "owner_url": "http://www.panoramio.com/user/278074"}
,
{"item_id": 840971, "item_title": "Upper Thracian Lowlands", "item_url": "http://www.panoramio.com/photo/840971", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/840971.jpg", "longitude": 26.364269, "latitude": 42.717759, "width": 500, "height": 400, "upload_date": "16 February 2007", "owner_id": 16880, "owner_name": "evgenidinev.com", "owner_url": "http://www.panoramio.com/user/16880"}
,
{"item_id": 9557772, "item_title": "Le Shan Giant Buddha Statue - Geotagged April 08 Photo Contest Heritage Category Honorable Mentions", "item_url": "http://www.panoramio.com/photo/9557772", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/9557772.jpg", "longitude": 103.769115, "latitude": 29.547084, "width": 375, "height": 500, "upload_date": "20 April 2008", "owner_id": 964751, "owner_name": "jymsn123", "owner_url": "http://www.panoramio.com/user/964751"}
,
{"item_id": 4716049, "item_title": "Sol-edad", "item_url": "http://www.panoramio.com/photo/4716049", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4716049.jpg", "longitude": -73.228008, "latitude": -39.820720, "width": 366, "height": 500, "upload_date": "17 September 2007", "owner_id": 327310, "owner_name": "Erwin Woenckhaus", "owner_url": "http://www.panoramio.com/user/327310"}
,
{"item_id": 1419283, "item_title": "Sunset in Boka", "item_url": "http://www.panoramio.com/photo/1419283", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1419283.jpg", "longitude": 18.703022, "latitude": 42.479883, "width": 500, "height": 375, "upload_date": "20 March 2007", "owner_id": 239453, "owner_name": "Å ovran NikÅ¡a", "owner_url": "http://www.panoramio.com/user/239453"}
,
{"item_id": 3507222, "item_title": "The sheperd of the Glen", "item_url": "http://www.panoramio.com/photo/3507222", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3507222.jpg", "longitude": -4.840164, "latitude": 56.641504, "width": 500, "height": 334, "upload_date": "24 July 2007", "owner_id": 599676, "owner_name": "mossip", "owner_url": "http://www.panoramio.com/user/599676"}
,
{"item_id": 3521820, "item_title": "UtolsÃ³ pillantÃ¡s", "item_url": "http://www.panoramio.com/photo/3521820", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3521820.jpg", "longitude": 17.809353, "latitude": 47.528097, "width": 500, "height": 334, "upload_date": "25 July 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 521264, "item_title": "FelhÅ‘Ã¡tvonulÃ¡s", "item_url": "http://www.panoramio.com/photo/521264", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/521264.jpg", "longitude": 17.760429, "latitude": 47.555329, "width": 500, "height": 280, "upload_date": "21 January 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 636723, "item_title": "ASZFALTOZÃ“K", "item_url": "http://www.panoramio.com/photo/636723", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/636723.jpg", "longitude": 19.038105, "latitude": 47.520041, "width": 500, "height": 318, "upload_date": "31 January 2007", "owner_id": 137538, "owner_name": "BALÃS ISTVÃN", "owner_url": "http://www.panoramio.com/user/137538"}
,
{"item_id": 153144, "item_title": "cierny_vah01", "item_url": "http://www.panoramio.com/photo/153144", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/153144.jpg", "longitude": 19.907227, "latitude": 49.020084, "width": 500, "height": 332, "upload_date": "15 December 2006", "owner_id": 28092, "owner_name": "Design d15", "owner_url": "http://www.panoramio.com/user/28092"}
,
{"item_id": 7485246, "item_title": "TÃºl mindenen", "item_url": "http://www.panoramio.com/photo/7485246", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/7485246.jpg", "longitude": 17.624259, "latitude": 47.662092, "width": 500, "height": 334, "upload_date": "31 January 2008", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 4884030, "item_title": "A Cloud is Born", "item_url": "http://www.panoramio.com/photo/4884030", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4884030.jpg", "longitude": -119.631693, "latitude": 37.724208, "width": 333, "height": 500, "upload_date": "24 September 2007", "owner_id": 376395, "owner_name": "JeffSullivan (www.MyPhotoGuides.com)", "owner_url": "http://www.panoramio.com/user/376395"}
,
{"item_id": 6126146, "item_title": "North Weald Park", "item_url": "http://www.panoramio.com/photo/6126146", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6126146.jpg", "longitude": 0.264530, "latitude": 51.624631, "width": 500, "height": 333, "upload_date": "25 November 2007", "owner_id": 1130880, "owner_name": "marksimms", "owner_url": "http://www.panoramio.com/user/1130880"}
,
{"item_id": 438342, "item_title": "Sunrise in Sierra Nevada", "item_url": "http://www.panoramio.com/photo/438342", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/438342.jpg", "longitude": -119.225607, "latitude": 37.945213, "width": 500, "height": 318, "upload_date": "15 January 2007", "owner_id": 93560, "owner_name": "Alex Petrov", "owner_url": "http://www.panoramio.com/user/93560"}
,
{"item_id": 91978, "item_title": "Dubrovnik (Croatia)", "item_url": "http://www.panoramio.com/photo/91978", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/91978.jpg", "longitude": 18.108457, "latitude": 42.642909, "width": 500, "height": 375, "upload_date": "04 December 2006", "owner_id": 11403, "owner_name": "ArnÃ¡iz", "owner_url": "http://www.panoramio.com/user/11403"}
,
{"item_id": 10816587, "item_title": "Cementiri de Carcassonne", "item_url": "http://www.panoramio.com/photo/10816587", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/10816587.jpg", "longitude": 2.365751, "latitude": 43.205551, "width": 500, "height": 333, "upload_date": "01 June 2008", "owner_id": 599233, "owner_name": "SÃ­lviaPrats", "owner_url": "http://www.panoramio.com/user/599233"}
,
{"item_id": 292943, "item_title": "Aekingerzand", "item_url": "http://www.panoramio.com/photo/292943", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/292943.jpg", "longitude": 6.296024, "latitude": 52.935293, "width": 500, "height": 333, "upload_date": "03 January 2007", "owner_id": 62613, "owner_name": "erik van den Ham", "owner_url": "http://www.panoramio.com/user/62613"}
,
{"item_id": 4696655, "item_title": "Old boat", "item_url": "http://www.panoramio.com/photo/4696655", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4696655.jpg", "longitude": 27.399902, "latitude": 42.414079, "width": 500, "height": 357, "upload_date": "16 September 2007", "owner_id": 16880, "owner_name": "evgenidinev.com", "owner_url": "http://www.panoramio.com/user/16880"}
,
{"item_id": 348752, "item_title": "_Cariniana legalis_ (Lecythidaceae), Santa Rita do Passa Quatro, SP,Brasil", "item_url": "http://www.panoramio.com/photo/348752", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/348752.jpg", "longitude": -47.618523, "latitude": -21.691885, "width": 500, "height": 375, "upload_date": "08 January 2007", "owner_id": 56214, "owner_name": "VinÃ­cius Antonio de Oliveira Dittrich", "owner_url": "http://www.panoramio.com/user/56214"}
,
{"item_id": 3724631, "item_title": "Abbazia di Chiaravalle in un'alba nebbiosa", "item_url": "http://www.panoramio.com/photo/3724631", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3724631.jpg", "longitude": 9.201404, "latitude": 45.424284, "width": 500, "height": 375, "upload_date": "04 August 2007", "owner_id": 732643, "owner_name": "La Mugna", "owner_url": "http://www.panoramio.com/user/732643"}
,
{"item_id": 405853, "item_title": "oyasirazu", "item_url": "http://www.panoramio.com/photo/405853", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/405853.jpg", "longitude": 137.747955, "latitude": 37.009133, "width": 500, "height": 384, "upload_date": "13 January 2007", "owner_id": 86411, "owner_name": "ä¸­æ‘è„©-Osamu nakamura", "owner_url": "http://www.panoramio.com/user/86411"}
,
{"item_id": 1192286, "item_title": "Ojos del mar - 1", "item_url": "http://www.panoramio.com/photo/1192286", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1192286.jpg", "longitude": -67.369022, "latitude": -24.630634, "width": 500, "height": 337, "upload_date": "06 March 2007", "owner_id": 232099, "owner_name": "mabut", "owner_url": "http://www.panoramio.com/user/232099"}
,
{"item_id": 589411, "item_title": "Sunset, London, UK.", "item_url": "http://www.panoramio.com/photo/589411", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/589411.jpg", "longitude": -0.123596, "latitude": 51.500942, "width": 500, "height": 346, "upload_date": "27 January 2007", "owner_id": 44319, "owner_name": "AndrÃ© Bonacin", "owner_url": "http://www.panoramio.com/user/44319"}
,
{"item_id": 7586406, "item_title": "Sol naciente en Villarrica", "item_url": "http://www.panoramio.com/photo/7586406", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/7586406.jpg", "longitude": -72.219400, "latitude": -39.289273, "width": 500, "height": 375, "upload_date": "04 February 2008", "owner_id": 327310, "owner_name": "Erwin Woenckhaus", "owner_url": "http://www.panoramio.com/user/327310"}
,
{"item_id": 621, "item_title": "Cape Drastis / Corfu", "item_url": "http://www.panoramio.com/photo/621", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/621.jpg", "longitude": 19.701061, "latitude": 39.795744, "width": 500, "height": 375, "upload_date": "27 September 2005", "owner_id": 30, "owner_name": "eSHa", "owner_url": "http://www.panoramio.com/user/30"}
,
{"item_id": 2379636, "item_title": "Detail from the valley below Holmbukttind", "item_url": "http://www.panoramio.com/photo/2379636", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2379636.jpg", "longitude": 19.781570, "latitude": 69.476339, "width": 500, "height": 375, "upload_date": "24 May 2007", "owner_id": 39160, "owner_name": "Snemann", "owner_url": "http://www.panoramio.com/user/39160"}
,
{"item_id": 5725557, "item_title": "Kardzhali lake - Panorama", "item_url": "http://www.panoramio.com/photo/5725557", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5725557.jpg", "longitude": 25.242250, "latitude": 41.668667, "width": 500, "height": 187, "upload_date": "05 November 2007", "owner_id": 16880, "owner_name": "evgenidinev.com", "owner_url": "http://www.panoramio.com/user/16880"}
,
{"item_id": 22393, "item_title": "View from Bosphorus Bridge", "item_url": "http://www.panoramio.com/photo/22393", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/22393.jpg", "longitude": 28.999443, "latitude": 41.027053, "width": 500, "height": 355, "upload_date": "04 June 2006", "owner_id": 3504, "owner_name": "zeytinbass", "owner_url": "http://www.panoramio.com/user/3504"}
,
{"item_id": 5611129, "item_title": "Torrent de Pareis - Sa Calobra (Mallorca)", "item_url": "http://www.panoramio.com/photo/5611129", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5611129.jpg", "longitude": 2.807093, "latitude": 39.851709, "width": 500, "height": 373, "upload_date": "29 October 2007", "owner_id": 83865, "owner_name": "Epi F.Villanueva", "owner_url": "http://www.panoramio.com/user/83865"}
,
{"item_id": 3457918, "item_title": "Walk of Venus", "item_url": "http://www.panoramio.com/photo/3457918", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3457918.jpg", "longitude": 14.721851, "latitude": 44.838891, "width": 500, "height": 367, "upload_date": "22 July 2007", "owner_id": 346103, "owner_name": "lacitot", "owner_url": "http://www.panoramio.com/user/346103"}
,
{"item_id": 21135, "item_title": "icebergs in the Channel", "item_url": "http://www.panoramio.com/photo/21135", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/21135.jpg", "longitude": -63.017578, "latitude": -64.774125, "width": 500, "height": 338, "upload_date": "24 May 2006", "owner_id": 3316, "owner_name": "kristine hannon (www.traveltheglobe.be)", "owner_url": "http://www.panoramio.com/user/3316"}
,
{"item_id": 1288597, "item_title": "Gift", "item_url": "http://www.panoramio.com/photo/1288597", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1288597.jpg", "longitude": 72.920036, "latitude": 4.038077, "width": 337, "height": 500, "upload_date": "12 March 2007", "owner_id": 232099, "owner_name": "mabut", "owner_url": "http://www.panoramio.com/user/232099"}
,
{"item_id": 708502, "item_title": "A single skier from GogsÃ¸yra tw Litjskjorta mountain", "item_url": "http://www.panoramio.com/photo/708502", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/708502.jpg", "longitude": 8.160782, "latitude": 62.645604, "width": 424, "height": 500, "upload_date": "05 February 2007", "owner_id": 39160, "owner_name": "Snemann", "owner_url": "http://www.panoramio.com/user/39160"}
,
{"item_id": 4386456, "item_title": "good bye", "item_url": "http://www.panoramio.com/photo/4386456", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4386456.jpg", "longitude": -1.254845, "latitude": 44.463191, "width": 500, "height": 405, "upload_date": "04 September 2007", "owner_id": 521836, "owner_name": "KLEFER", "owner_url": "http://www.panoramio.com/user/521836"}
,
{"item_id": 902303, "item_title": "KÃ©k", "item_url": "http://www.panoramio.com/photo/902303", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/902303.jpg", "longitude": 17.941017, "latitude": 47.650703, "width": 334, "height": 500, "upload_date": "19 February 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 3660960, "item_title": "Angkor - Ta Prohm IV", "item_url": "http://www.panoramio.com/photo/3660960", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3660960.jpg", "longitude": 103.890334, "latitude": 13.435028, "width": 338, "height": 500, "upload_date": "01 August 2007", "owner_id": 73104, "owner_name": "zerega", "owner_url": "http://www.panoramio.com/user/73104"}
,
{"item_id": 902570, "item_title": "TavitÃ¼ndÃ©r", "item_url": "http://www.panoramio.com/photo/902570", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/902570.jpg", "longitude": 17.468948, "latitude": 47.871914, "width": 500, "height": 345, "upload_date": "19 February 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 2521005, "item_title": "MegvilÃ¡gosodÃ¡s elÃ¶tt", "item_url": "http://www.panoramio.com/photo/2521005", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2521005.jpg", "longitude": 17.515984, "latitude": 47.743825, "width": 500, "height": 286, "upload_date": "02 June 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 586159, "item_title": "Central Park", "item_url": "http://www.panoramio.com/photo/586159", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/586159.jpg", "longitude": -73.971816, "latitude": 40.775789, "width": 500, "height": 375, "upload_date": "27 January 2007", "owner_id": 123698, "owner_name": "Â© Kojak", "owner_url": "http://www.panoramio.com/user/123698"}
,
{"item_id": 23475, "item_title": "Good Morning", "item_url": "http://www.panoramio.com/photo/23475", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/23475.jpg", "longitude": -28.210895, "latitude": 38.680351, "width": 500, "height": 375, "upload_date": "11 June 2006", "owner_id": 3760, "owner_name": "Frank Pustlauck", "owner_url": "http://www.panoramio.com/user/3760"}
,
{"item_id": 1006005, "item_title": "04-09-07_\"La Nube Sangrante\"_017_PIXELECTA", "item_url": "http://www.panoramio.com/photo/1006005", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1006005.jpg", "longitude": -0.896330, "latitude": 41.738016, "width": 500, "height": 375, "upload_date": "24 February 2007", "owner_id": 163655, "owner_name": "[[[   PIXELECTA   ]]]", "owner_url": "http://www.panoramio.com/user/163655"}
,
{"item_id": 3473597, "item_title": "Sails in the sunset", "item_url": "http://www.panoramio.com/photo/3473597", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3473597.jpg", "longitude": -87.173424, "latitude": 45.158317, "width": 500, "height": 375, "upload_date": "22 July 2007", "owner_id": 555551, "owner_name": "Marilyn Whiteley", "owner_url": "http://www.panoramio.com/user/555551"}
,
{"item_id": 3809992, "item_title": "DÅ‚ugie PobrzeÅ¼e latem/ Las casas narcisistas que se pasan el dÃ­a mirÃ¡ndose en el espejo del agua - gracias Arturo GarcÃ­a!", "item_url": "http://www.panoramio.com/photo/3809992", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3809992.jpg", "longitude": 18.658776, "latitude": 54.350679, "width": 500, "height": 375, "upload_date": "08 August 2007", "owner_id": 277750, "owner_name": "Karolina P.", "owner_url": "http://www.panoramio.com/user/277750"}
,
{"item_id": 2280401, "item_title": "Hetyke-egyke", "item_url": "http://www.panoramio.com/photo/2280401", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2280401.jpg", "longitude": 17.829094, "latitude": 47.206508, "width": 500, "height": 308, "upload_date": "18 May 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 290772, "item_title": "Tormenta BahÃ­a de Pollensa", "item_url": "http://www.panoramio.com/photo/290772", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/290772.jpg", "longitude": 3.116437, "latitude": 39.928440, "width": 500, "height": 335, "upload_date": "03 January 2007", "owner_id": 61890, "owner_name": "enriquevidalphoto.com", "owner_url": "http://www.panoramio.com/user/61890"}
,
{"item_id": 57822, "item_title": "Maria Alm - Pfarrkirche", "item_url": "http://www.panoramio.com/photo/57822", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/57822.jpg", "longitude": 12.903442, "latitude": 47.407877, "width": 346, "height": 500, "upload_date": "05 October 2006", "owner_id": 8060, "owner_name": "Norbert MAIER", "owner_url": "http://www.panoramio.com/user/8060"}
,
{"item_id": 516322, "item_title": "A vÃ¶lgy", "item_url": "http://www.panoramio.com/photo/516322", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/516322.jpg", "longitude": 17.774162, "latitude": 47.292504, "width": 338, "height": 500, "upload_date": "21 January 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 12271085, "item_title": "Ein Bild fÃ¼r meine Freunde", "item_url": "http://www.panoramio.com/photo/12271085", "item_file_url": "http://static2.bareka.com/photos/medium/12271085.jpg", "longitude": 9.284134, "latitude": 51.510933, "width": 500, "height": 333, "upload_date": "19 July 2008", "owner_id": 497213, "owner_name": "UlrichSchnuerer", "owner_url": "http://www.panoramio.com/user/497213"}
,
{"item_id": 5050864, "item_title": "Ãlmok ÃºtjÃ¡n", "item_url": "http://www.panoramio.com/photo/5050864", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5050864.jpg", "longitude": 12.333773, "latitude": 45.436466, "width": 500, "height": 354, "upload_date": "02 October 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 617461, "item_title": "Miravet", "item_url": "http://www.panoramio.com/photo/617461", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/617461.jpg", "longitude": 0.593348, "latitude": 41.035568, "width": 500, "height": 334, "upload_date": "29 January 2007", "owner_id": 3022, "owner_name": "Arcadi", "owner_url": "http://www.panoramio.com/user/3022"}
,
{"item_id": 2689526, "item_title": "Ã‰gszakadÃ¡s", "item_url": "http://www.panoramio.com/photo/2689526", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2689526.jpg", "longitude": 17.503624, "latitude": 47.749481, "width": 500, "height": 325, "upload_date": "11 June 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 38135, "item_title": "Amanecer en el sur", "item_url": "http://www.panoramio.com/photo/38135", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/38135.jpg", "longitude": -64.983333, "latitude": -31.900000, "width": 500, "height": 375, "upload_date": "11 August 2006", "owner_id": 4483, "owner_name": "Miguel Coranti", "owner_url": "http://www.panoramio.com/user/4483"}
,
{"item_id": 1087737, "item_title": "Szeles nyÃ¡relÅ‘", "item_url": "http://www.panoramio.com/photo/1087737", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1087737.jpg", "longitude": 17.605934, "latitude": 47.603154, "width": 500, "height": 333, "upload_date": "28 February 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 8411394, "item_title": "Dead Vlei", "item_url": "http://www.panoramio.com/photo/8411394", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/8411394.jpg", "longitude": 15.295715, "latitude": -24.764914, "width": 500, "height": 341, "upload_date": "09 March 2008", "owner_id": 1204358, "owner_name": "aldenc", "owner_url": "http://www.panoramio.com/user/1204358"}
,
{"item_id": 8491464, "item_title": "Horsetail Falls on El Capitan", "item_url": "http://www.panoramio.com/photo/8491464", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/8491464.jpg", "longitude": -119.623947, "latitude": 37.723512, "width": 357, "height": 500, "upload_date": "12 March 2008", "owner_id": 376395, "owner_name": "JeffSullivan (www.MyPhotoGuides.com)", "owner_url": "http://www.panoramio.com/user/376395"}
,
{"item_id": 58134, "item_title": "Chateaux Lake Louise from the head of the lake", "item_url": "http://www.panoramio.com/photo/58134", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/58134.jpg", "longitude": -116.239901, "latitude": 51.407291, "width": 500, "height": 375, "upload_date": "06 October 2006", "owner_id": 8118, "owner_name": "Michael Gerstmann", "owner_url": "http://www.panoramio.com/user/8118"}
,
{"item_id": 11237087, "item_title": " Ein Strand zum trÃ¤umen", "item_url": "http://www.panoramio.com/photo/11237087", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/11237087.jpg", "longitude": 15.914984, "latitude": 38.683366, "width": 500, "height": 294, "upload_date": "15 June 2008", "owner_id": 1400529, "owner_name": "marita1004", "owner_url": "http://www.panoramio.com/user/1400529"}
,
{"item_id": 8384850, "item_title": "Winter has gone", "item_url": "http://www.panoramio.com/photo/8384850", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/8384850.jpg", "longitude": 12.428112, "latitude": 49.084351, "width": 500, "height": 333, "upload_date": "08 March 2008", "owner_id": 696605, "owner_name": "Â© alfredschaffer", "owner_url": "http://www.panoramio.com/user/696605"}
,
{"item_id": 3947779, "item_title": "Mont-Saint-Michel floating in water", "item_url": "http://www.panoramio.com/photo/3947779", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3947779.jpg", "longitude": -1.508625, "latitude": 48.634561, "width": 500, "height": 335, "upload_date": "15 August 2007", "owner_id": 57893, "owner_name": "ThoiryK", "owner_url": "http://www.panoramio.com/user/57893"}
,
{"item_id": 1069321, "item_title": "The old Temple N2", "item_url": "http://www.panoramio.com/photo/1069321", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1069321.jpg", "longitude": 37.426300, "latitude": 56.370622, "width": 500, "height": 333, "upload_date": "27 February 2007", "owner_id": 212477, "owner_name": "Cherepanov Timofey", "owner_url": "http://www.panoramio.com/user/212477"}
,
{"item_id": 5756689, "item_title": "Tokyo Metropolitan Government", "item_url": "http://www.panoramio.com/photo/5756689", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5756689.jpg", "longitude": 139.690722, "latitude": 35.689906, "width": 500, "height": 339, "upload_date": "06 November 2007", "owner_id": 558055, "owner_name": "www.tokyoform.com", "owner_url": "http://www.panoramio.com/user/558055"}
,
{"item_id": 1599763, "item_title": "Atomium", "item_url": "http://www.panoramio.com/photo/1599763", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1599763.jpg", "longitude": 4.341531, "latitude": 50.894805, "width": 500, "height": 375, "upload_date": "02 April 2007", "owner_id": 18137, "owner_name": "digitaler lumpensammler", "owner_url": "http://www.panoramio.com/user/18137"}
,
{"item_id": 516375, "item_title": "A zÃ¶ld folyÃ³", "item_url": "http://www.panoramio.com/photo/516375", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/516375.jpg", "longitude": 17.724895, "latitude": 46.297137, "width": 369, "height": 500, "upload_date": "21 January 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 1538329, "item_title": "View east from Empire State Building by night", "item_url": "http://www.panoramio.com/photo/1538329", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1538329.jpg", "longitude": -73.986332, "latitude": 40.748346, "width": 500, "height": 332, "upload_date": "28 March 2007", "owner_id": 278074, "owner_name": "H. C. Steensen", "owner_url": "http://www.panoramio.com/user/278074"}
,
{"item_id": 1838875, "item_title": "Modern art in Mainz", "item_url": "http://www.panoramio.com/photo/1838875", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1838875.jpg", "longitude": 8.276659, "latitude": 50.001071, "width": 500, "height": 393, "upload_date": "19 April 2007", "owner_id": 12954, "owner_name": "ZiÄ™bol", "owner_url": "http://www.panoramio.com/user/12954"}
,
{"item_id": 4740891, "item_title": "The golden path - Az aranyozott Ã¶svÃ©ny", "item_url": "http://www.panoramio.com/photo/4740891", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4740891.jpg", "longitude": 17.599239, "latitude": 47.639948, "width": 500, "height": 334, "upload_date": "18 September 2007", "owner_id": 217370, "owner_name": "BorbÃ©ly MÃ¡rk", "owner_url": "http://www.panoramio.com/user/217370"}
,
{"item_id": 441376, "item_title": "Bolungarvik", "item_url": "http://www.panoramio.com/photo/441376", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/441376.jpg", "longitude": -23.197975, "latitude": 66.151698, "width": 500, "height": 333, "upload_date": "15 January 2007", "owner_id": 78506, "owner_name": "Philippe Stoop", "owner_url": "http://www.panoramio.com/user/78506"}
,
{"item_id": 3354401, "item_title": "Alkonyi szÃ­njÃ¡tÃ©k", "item_url": "http://www.panoramio.com/photo/3354401", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3354401.jpg", "longitude": 17.504225, "latitude": 47.745730, "width": 500, "height": 334, "upload_date": "16 July 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 809506, "item_title": "SzivÃ¡rvÃ¡nyhorizont", "item_url": "http://www.panoramio.com/photo/809506", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/809506.jpg", "longitude": 15.969830, "latitude": 43.626632, "width": 500, "height": 334, "upload_date": "13 February 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 36387, "item_title": "Adobe Headquarters - Looking Up", "item_url": "http://www.panoramio.com/photo/36387", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/36387.jpg", "longitude": -121.893804, "latitude": 37.330959, "width": 351, "height": 500, "upload_date": "02 August 2006", "owner_id": 5684, "owner_name": "Brent Townshend", "owner_url": "http://www.panoramio.com/user/5684"}
,
{"item_id": 722982, "item_title": "Antelope-Light", "item_url": "http://www.panoramio.com/photo/722982", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/722982.jpg", "longitude": -111.371326, "latitude": 36.857236, "width": 333, "height": 500, "upload_date": "07 February 2007", "owner_id": 66847, "owner_name": "Lukas Novak", "owner_url": "http://www.panoramio.com/user/66847"}
,
{"item_id": 138030, "item_title": "Kinderdijk", "item_url": "http://www.panoramio.com/photo/138030", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/138030.jpg", "longitude": 4.645500, "latitude": 51.879458, "width": 500, "height": 335, "upload_date": "13 December 2006", "owner_id": 18131, "owner_name": "ron zoeteweij", "owner_url": "http://www.panoramio.com/user/18131"}
,
{"item_id": 9725235, "item_title": "railway / MaÅ‚opolska / wojewÃ³dztwo maÅ‚opolskie", "item_url": "http://www.panoramio.com/photo/9725235", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/9725235.jpg", "longitude": 20.363159, "latitude": 49.748443, "width": 321, "height": 500, "upload_date": "28 April 2008", "owner_id": 454219, "owner_name": "Rafal Ociepka", "owner_url": "http://www.panoramio.com/user/454219"}
,
{"item_id": 945984, "item_title": "El canal", "item_url": "http://www.panoramio.com/photo/945984", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/945984.jpg", "longitude": 0.484858, "latitude": 40.901901, "width": 378, "height": 500, "upload_date": "21 February 2007", "owner_id": 3022, "owner_name": "Arcadi", "owner_url": "http://www.panoramio.com/user/3022"}
,
{"item_id": 677953, "item_title": "Shuto Expressway over the Sumida River", "item_url": "http://www.panoramio.com/photo/677953", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/677953.jpg", "longitude": 139.788644, "latitude": 35.690411, "width": 500, "height": 364, "upload_date": "03 February 2007", "owner_id": 78856, "owner_name": "chrisjongkind â€¢ archive", "owner_url": "http://www.panoramio.com/user/78856"}
,
{"item_id": 2723655, "item_title": "Orciano Pisano", "item_url": "http://www.panoramio.com/photo/2723655", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2723655.jpg", "longitude": 10.505505, "latitude": 43.491911, "width": 366, "height": 500, "upload_date": "13 June 2007", "owner_id": 65478, "owner_name": "Gabriele Marabotti", "owner_url": "http://www.panoramio.com/user/65478"}
,
{"item_id": 444745, "item_title": "Pres de Nefta", "item_url": "http://www.panoramio.com/photo/444745", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/444745.jpg", "longitude": 7.904320, "latitude": 33.766590, "width": 500, "height": 333, "upload_date": "15 January 2007", "owner_id": 78506, "owner_name": "Philippe Stoop", "owner_url": "http://www.panoramio.com/user/78506"}
,
{"item_id": 1388623, "item_title": "El Aviario (Parque EcolÃ³gico, Puebla, MÃ©xico)", "item_url": "http://www.panoramio.com/photo/1388623", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1388623.jpg", "longitude": -98.187540, "latitude": 19.025552, "width": 500, "height": 488, "upload_date": "18 March 2007", "owner_id": 274633, "owner_name": "D4v17    ]7.    G.", "owner_url": "http://www.panoramio.com/user/274633"}
,
{"item_id": 792658, "item_title": "Reichtag in the dome, Berlin HDR", "item_url": "http://www.panoramio.com/photo/792658", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/792658.jpg", "longitude": 13.376133, "latitude": 52.518610, "width": 376, "height": 500, "upload_date": "12 February 2007", "owner_id": 161254, "owner_name": "fotoartistry", "owner_url": "http://www.panoramio.com/user/161254"}
,
{"item_id": 324694, "item_title": "Thachted houses", "item_url": "http://www.panoramio.com/photo/324694", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/324694.jpg", "longitude": 137.235117, "latitude": 36.132095, "width": 500, "height": 265, "upload_date": "06 January 2007", "owner_id": 11781, "owner_name": "ANDRE GARDELLA", "owner_url": "http://www.panoramio.com/user/11781"}
,
{"item_id": 2353496, "item_title": "Ñ€Ð°ÑÑÐ²ÐµÑ‚ Ð½Ð°Ð´ Ð²ÑƒÐ»ÐºÐ°Ð½Ð¾Ð¼ Ð–ÑƒÐ¿Ð°Ð½Ð¾Ð²ÑÐºÐ¸Ð¹", "item_url": "http://www.panoramio.com/photo/2353496", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2353496.jpg", "longitude": 158.591080, "latitude": 53.497850, "width": 500, "height": 337, "upload_date": "23 May 2007", "owner_id": 268724, "owner_name": "Korotnev AV", "owner_url": "http://www.panoramio.com/user/268724"}
,
{"item_id": 7251801, "item_title": "Fellegek kÃ¶zt", "item_url": "http://www.panoramio.com/photo/7251801", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/7251801.jpg", "longitude": 18.314981, "latitude": 47.638820, "width": 500, "height": 329, "upload_date": "20 January 2008", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 35422, "item_title": "caracas", "item_url": "http://www.panoramio.com/photo/35422", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/35422.jpg", "longitude": -66.904507, "latitude": 10.498193, "width": 500, "height": 375, "upload_date": "29 July 2006", "owner_id": 3360, "owner_name": "ozzy", "owner_url": "http://www.panoramio.com/user/3360"}
,
{"item_id": 405861, "item_title": "myoukou", "item_url": "http://www.panoramio.com/photo/405861", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/405861.jpg", "longitude": 138.295898, "latitude": 37.099003, "width": 500, "height": 383, "upload_date": "13 January 2007", "owner_id": 86411, "owner_name": "ä¸­æ‘è„©-Osamu nakamura", "owner_url": "http://www.panoramio.com/user/86411"}
,
{"item_id": 2719848, "item_title": "Idaho relic", "item_url": "http://www.panoramio.com/photo/2719848", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2719848.jpg", "longitude": -111.398749, "latitude": 42.286707, "width": 500, "height": 375, "upload_date": "13 June 2007", "owner_id": 555551, "owner_name": "Marilyn Whiteley", "owner_url": "http://www.panoramio.com/user/555551"}
,
{"item_id": 599401, "item_title": "Hozenji", "item_url": "http://www.panoramio.com/photo/599401", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/599401.jpg", "longitude": 135.502450, "latitude": 34.668002, "width": 500, "height": 500, "upload_date": "28 January 2007", "owner_id": 128403, "owner_name": "mechanics", "owner_url": "http://www.panoramio.com/user/128403"}
,
{"item_id": 53101, "item_title": "Night Auadkhara", "item_url": "http://www.panoramio.com/photo/53101", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/53101.jpg", "longitude": 40.631331, "latitude": 43.525806, "width": 500, "height": 323, "upload_date": "27 September 2006", "owner_id": 7707, "owner_name": "Yorix", "owner_url": "http://www.panoramio.com/user/7707"}
,
{"item_id": 112752, "item_title": "V-35-003b", "item_url": "http://www.panoramio.com/photo/112752", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/112752.jpg", "longitude": 12.339267, "latitude": 45.433696, "width": 500, "height": 338, "upload_date": "11 December 2006", "owner_id": 17599, "owner_name": "Dmitry Andreev", "owner_url": "http://www.panoramio.com/user/17599"}
,
{"item_id": 1946749, "item_title": "Mt Hood and a John Deer Tractor over the Wooden Shoe Tulip Fields Monitor Oregon", "item_url": "http://www.panoramio.com/photo/1946749", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1946749.jpg", "longitude": -122.740974, "latitude": 45.119326, "width": 500, "height": 351, "upload_date": "27 April 2007", "owner_id": 128746, "owner_name": "Â© Michael Hatten", "owner_url": "http://www.panoramio.com/user/128746"}
,
{"item_id": 723074, "item_title": "September Twilight in Thira", "item_url": "http://www.panoramio.com/photo/723074", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/723074.jpg", "longitude": 25.430603, "latitude": 36.416862, "width": 500, "height": 223, "upload_date": "07 February 2007", "owner_id": 66847, "owner_name": "Lukas Novak", "owner_url": "http://www.panoramio.com/user/66847"}
,
{"item_id": 1658251, "item_title": "Behold the moon", "item_url": "http://www.panoramio.com/photo/1658251", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1658251.jpg", "longitude": 15.589085, "latitude": 78.170125, "width": 333, "height": 500, "upload_date": "06 April 2007", "owner_id": 3574, "owner_name": "blackone", "owner_url": "http://www.panoramio.com/user/3574"}
,
{"item_id": 2225571, "item_title": "Landscape (Via Di Porta Castello Street) ~ Tarquinia, Italy", "item_url": "http://www.panoramio.com/photo/2225571", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2225571.jpg", "longitude": 11.751836, "latitude": 42.255808, "width": 500, "height": 335, "upload_date": "15 May 2007", "owner_id": 395380, "owner_name": "Rafael (Retrocool)", "owner_url": "http://www.panoramio.com/user/395380"}
,
{"item_id": 348071, "item_title": "Perfect ice for skating, SvartlÃ¶gafjÃ¤rden", "item_url": "http://www.panoramio.com/photo/348071", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/348071.jpg", "longitude": 19.021196, "latitude": 59.558766, "width": 500, "height": 375, "upload_date": "08 January 2007", "owner_id": 70471, "owner_name": "David Thyberg", "owner_url": "http://www.panoramio.com/user/70471"}
,
{"item_id": 1408683, "item_title": "Dragon", "item_url": "http://www.panoramio.com/photo/1408683", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1408683.jpg", "longitude": 11.099625, "latitude": 24.203758, "width": 334, "height": 500, "upload_date": "20 March 2007", "owner_id": 232099, "owner_name": "mabut", "owner_url": "http://www.panoramio.com/user/232099"}
,
{"item_id": 58293, "item_title": "Hundeschlittenrennen in Werfenweng", "item_url": "http://www.panoramio.com/photo/58293", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/58293.jpg", "longitude": 13.263245, "latitude": 47.465062, "width": 500, "height": 377, "upload_date": "07 October 2006", "owner_id": 8060, "owner_name": "Norbert MAIER", "owner_url": "http://www.panoramio.com/user/8060"}
,
{"item_id": 1488328, "item_title": "", "item_url": "http://www.panoramio.com/photo/1488328", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1488328.jpg", "longitude": 139.290161, "latitude": 37.860218, "width": 500, "height": 383, "upload_date": "25 March 2007", "owner_id": 86411, "owner_name": "ä¸­æ‘è„©-Osamu nakamura", "owner_url": "http://www.panoramio.com/user/86411"}
,
{"item_id": 5439200, "item_title": "shinjuku", "item_url": "http://www.panoramio.com/photo/5439200", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5439200.jpg", "longitude": 139.693281, "latitude": 35.690921, "width": 500, "height": 500, "upload_date": "20 October 2007", "owner_id": 128403, "owner_name": "mechanics", "owner_url": "http://www.panoramio.com/user/128403"}
,
{"item_id": 86241, "item_title": "camino", "item_url": "http://www.panoramio.com/photo/86241", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/86241.jpg", "longitude": -1.145668, "latitude": 38.170464, "width": 333, "height": 500, "upload_date": "25 November 2006", "owner_id": 10969, "owner_name": "Juanra", "owner_url": "http://www.panoramio.com/user/10969"}
,
{"item_id": 4757733, "item_title": "MASSIVE WAVE", "item_url": "http://www.panoramio.com/photo/4757733", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4757733.jpg", "longitude": -1.262569, "latitude": 44.426793, "width": 259, "height": 500, "upload_date": "19 September 2007", "owner_id": 521836, "owner_name": "KLEFER", "owner_url": "http://www.panoramio.com/user/521836"}
,
{"item_id": 941286, "item_title": "Mesa Arch (3x1 pano)", "item_url": "http://www.panoramio.com/photo/941286", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/941286.jpg", "longitude": -109.863667, "latitude": 38.388159, "width": 500, "height": 181, "upload_date": "21 February 2007", "owner_id": 66847, "owner_name": "Lukas Novak", "owner_url": "http://www.panoramio.com/user/66847"}
,
{"item_id": 1284843, "item_title": "ÐžÐ·ÐµÑ€Ð¾ Ð¥Ð°Ð½Ð³Ð°Ñ€ Ð² ÐºÑ€Ð°Ñ‚ÐµÑ€Ðµ Ð²ÑƒÐ»ÐºÐ°Ð½Ð°", "item_url": "http://www.panoramio.com/photo/1284843", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1284843.jpg", "longitude": 157.393055, "latitude": 54.764255, "width": 500, "height": 197, "upload_date": "12 March 2007", "owner_id": 268724, "owner_name": "Korotnev AV", "owner_url": "http://www.panoramio.com/user/268724"}
,
{"item_id": 2602988, "item_title": "The best beach of Manihi", "item_url": "http://www.panoramio.com/photo/2602988", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2602988.jpg", "longitude": -145.847282, "latitude": -14.348134, "width": 500, "height": 333, "upload_date": "06 June 2007", "owner_id": 232099, "owner_name": "mabut", "owner_url": "http://www.panoramio.com/user/232099"}
,
{"item_id": 2273013, "item_title": "Another View of Vedra Island", "item_url": "http://www.panoramio.com/photo/2273013", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2273013.jpg", "longitude": 1.247164, "latitude": 38.859406, "width": 500, "height": 465, "upload_date": "18 May 2007", "owner_id": 213866, "owner_name": "Nicolas Mertens", "owner_url": "http://www.panoramio.com/user/213866"}
,
{"item_id": 8857011, "item_title": "The Subway,Zion NP", "item_url": "http://www.panoramio.com/photo/8857011", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/8857011.jpg", "longitude": -113.055840, "latitude": 37.308741, "width": 500, "height": 375, "upload_date": "26 March 2008", "owner_id": 1465912, "owner_name": "funtor", "owner_url": "http://www.panoramio.com/user/1465912"}
,
{"item_id": 167606, "item_title": "Rainy Causeway Bay", "item_url": "http://www.panoramio.com/photo/167606", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/167606.jpg", "longitude": 114.169595, "latitude": 22.293028, "width": 500, "height": 238, "upload_date": "16 December 2006", "owner_id": 31693, "owner_name": "Huw Thomas", "owner_url": "http://www.panoramio.com/user/31693"}
,
{"item_id": 11077834, "item_title": "In sunset", "item_url": "http://www.panoramio.com/photo/11077834", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/11077834.jpg", "longitude": 174.865694, "latitude": -41.330162, "width": 500, "height": 357, "upload_date": "10 June 2008", "owner_id": 1248894, "owner_name": "Eva Kaprinay", "owner_url": "http://www.panoramio.com/user/1248894"}
,
{"item_id": 10919439, "item_title": "Majestic MÃ¸Ã¸se", "item_url": "http://www.panoramio.com/photo/10919439", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/10919439.jpg", "longitude": -110.549712, "latitude": 43.866322, "width": 500, "height": 400, "upload_date": "04 June 2008", "owner_id": 376395, "owner_name": "JeffSullivan (www.MyPhotoGuides.com)", "owner_url": "http://www.panoramio.com/user/376395"}
,
{"item_id": 4892928, "item_title": "tsukudajima", "item_url": "http://www.panoramio.com/photo/4892928", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4892928.jpg", "longitude": 139.788172, "latitude": 35.672141, "width": 430, "height": 500, "upload_date": "25 September 2007", "owner_id": 128403, "owner_name": "mechanics", "owner_url": "http://www.panoramio.com/user/128403"}
,
{"item_id": 5798660, "item_title": "Guiding Light", "item_url": "http://www.panoramio.com/photo/5798660", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5798660.jpg", "longitude": -111.374674, "latitude": 36.861974, "width": 333, "height": 500, "upload_date": "08 November 2007", "owner_id": 376395, "owner_name": "JeffSullivan (www.MyPhotoGuides.com)", "owner_url": "http://www.panoramio.com/user/376395"}
,
{"item_id": 94219, "item_title": "Bridge of Manganji", "item_url": "http://www.panoramio.com/photo/94219", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/94219.jpg", "longitude": 137.821137, "latitude": 36.329284, "width": 500, "height": 375, "upload_date": "09 December 2006", "owner_id": 11781, "owner_name": "ANDRE GARDELLA", "owner_url": "http://www.panoramio.com/user/11781"}
,
{"item_id": 3772695, "item_title": "Fotomontaggio di Arquata & Andromeda", "item_url": "http://www.panoramio.com/photo/3772695", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3772695.jpg", "longitude": 13.304100, "latitude": 42.773731, "width": 500, "height": 375, "upload_date": "07 August 2007", "owner_id": 646873, "owner_name": "Fabio Roman", "owner_url": "http://www.panoramio.com/user/646873"}
,
{"item_id": 1314842, "item_title": "Ð ÐµÐºÐ° Ð¡Ð¸Ð¼ Ñ Ð¼Ð¾ÑÑ‚Ð° (1729 ÐºÐ¼)", "item_url": "http://www.panoramio.com/photo/1314842", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1314842.jpg", "longitude": 57.309623, "latitude": 55.013544, "width": 500, "height": 335, "upload_date": "14 March 2007", "owner_id": 268724, "owner_name": "Korotnev AV", "owner_url": "http://www.panoramio.com/user/268724"}
,
{"item_id": 5333278, "item_title": "hong kong, early evening", "item_url": "http://www.panoramio.com/photo/5333278", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5333278.jpg", "longitude": 114.151651, "latitude": 22.280112, "width": 375, "height": 500, "upload_date": "15 October 2007", "owner_id": 90373, "owner_name": "michael habla", "owner_url": "http://www.panoramio.com/user/90373"}
,
{"item_id": 2574624, "item_title": "Mount Everest", "item_url": "http://www.panoramio.com/photo/2574624", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2574624.jpg", "longitude": 86.933270, "latitude": 27.979546, "width": 500, "height": 375, "upload_date": "04 June 2007", "owner_id": 534045, "owner_name": "Lucjon", "owner_url": "http://www.panoramio.com/user/534045"}
,
{"item_id": 160808, "item_title": "Luquillo Beach", "item_url": "http://www.panoramio.com/photo/160808", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/160808.jpg", "longitude": -65.677128, "latitude": 18.364871, "width": 500, "height": 375, "upload_date": "16 December 2006", "owner_id": 28766, "owner_name": "Tim Jansa", "owner_url": "http://www.panoramio.com/user/28766"}
,
{"item_id": 2883625, "item_title": "SokorÃ³i impressziÃ³", "item_url": "http://www.panoramio.com/photo/2883625", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2883625.jpg", "longitude": 17.678204, "latitude": 47.533661, "width": 500, "height": 332, "upload_date": "22 June 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 287785, "item_title": "Cascada Fuente del Algar Â© (Foto_Seb)", "item_url": "http://www.panoramio.com/photo/287785", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/287785.jpg", "longitude": -0.095959, "latitude": 38.659359, "width": 500, "height": 332, "upload_date": "03 January 2007", "owner_id": 55833, "owner_name": "Sebastien Pigneur Jans (Outdoor Photographer) seolta@terra.es", "owner_url": "http://www.panoramio.com/user/55833"}
,
{"item_id": 354350, "item_title": "Bondhus icefall up close", "item_url": "http://www.panoramio.com/photo/354350", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/354350.jpg", "longitude": 6.296539, "latitude": 60.071436, "width": 500, "height": 332, "upload_date": "09 January 2007", "owner_id": 39160, "owner_name": "Snemann", "owner_url": "http://www.panoramio.com/user/39160"}
,
{"item_id": 3625784, "item_title": "P.N.P.J.(Croacia)", "item_url": "http://www.panoramio.com/photo/3625784", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3625784.jpg", "longitude": 15.612602, "latitude": 44.883911, "width": 500, "height": 375, "upload_date": "30 July 2007", "owner_id": 83865, "owner_name": "Epi F.Villanueva", "owner_url": "http://www.panoramio.com/user/83865"}
,
{"item_id": 4866107, "item_title": "Milkdrop sunset", "item_url": "http://www.panoramio.com/photo/4866107", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4866107.jpg", "longitude": 16.693897, "latitude": 43.183338, "width": 334, "height": 500, "upload_date": "24 September 2007", "owner_id": 989, "owner_name": "Mrgud", "owner_url": "http://www.panoramio.com/user/989"}
,
{"item_id": 5217595, "item_title": "kolory...", "item_url": "http://www.panoramio.com/photo/5217595", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5217595.jpg", "longitude": 17.990541, "latitude": 54.253292, "width": 375, "height": 500, "upload_date": "10 October 2007", "owner_id": 277750, "owner_name": "Karolina P.", "owner_url": "http://www.panoramio.com/user/277750"}
,
{"item_id": 1235515, "item_title": "Gangga sunset", "item_url": "http://www.panoramio.com/photo/1235515", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1235515.jpg", "longitude": 115.063634, "latitude": -8.586962, "width": 332, "height": 500, "upload_date": "09 March 2007", "owner_id": 232099, "owner_name": "mabut", "owner_url": "http://www.panoramio.com/user/232099"}
,
{"item_id": 88143, "item_title": "Anse Cocos - La Digue - Seychelles", "item_url": "http://www.panoramio.com/photo/88143", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/88143.jpg", "longitude": 55.850029, "latitude": -4.365924, "width": 500, "height": 375, "upload_date": "28 November 2006", "owner_id": 11098, "owner_name": "Michele Masnata", "owner_url": "http://www.panoramio.com/user/11098"}
,
{"item_id": 993105, "item_title": "Dinos", "item_url": "http://www.panoramio.com/photo/993105", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/993105.jpg", "longitude": 47.267990, "latitude": 34.392321, "width": 432, "height": 500, "upload_date": "24 February 2007", "owner_id": 83972, "owner_name": "Maxim Popov (http://www.popovm.ru)", "owner_url": "http://www.panoramio.com/user/83972"}
,
{"item_id": 3382098, "item_title": "Golden sunset", "item_url": "http://www.panoramio.com/photo/3382098", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3382098.jpg", "longitude": -9.231960, "latitude": 38.652899, "width": 500, "height": 375, "upload_date": "18 July 2007", "owner_id": 465080, "owner_name": "Vasco Pires", "owner_url": "http://www.panoramio.com/user/465080"}
,
{"item_id": 4689747, "item_title": "La disipaciÃ³n de un ensueÃ±o", "item_url": "http://www.panoramio.com/photo/4689747", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4689747.jpg", "longitude": -73.231199, "latitude": -39.817288, "width": 500, "height": 375, "upload_date": "16 September 2007", "owner_id": 327310, "owner_name": "Erwin Woenckhaus", "owner_url": "http://www.panoramio.com/user/327310"}
,
{"item_id": 2520917, "item_title": "KÃ©t vihar kÃ¶zt alkonyatkor", "item_url": "http://www.panoramio.com/photo/2520917", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2520917.jpg", "longitude": 17.514782, "latitude": 47.747057, "width": 500, "height": 334, "upload_date": "02 June 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 419927, "item_title": "echigoheiya", "item_url": "http://www.panoramio.com/photo/419927", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/419927.jpg", "longitude": 138.885427, "latitude": 37.568562, "width": 500, "height": 334, "upload_date": "14 January 2007", "owner_id": 86411, "owner_name": "ä¸­æ‘è„©-Osamu nakamura", "owner_url": "http://www.panoramio.com/user/86411"}
,
{"item_id": 1977433, "item_title": "Victoria Falls, devils cauldron natural hot tub at lip of falls", "item_url": "http://www.panoramio.com/photo/1977433", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1977433.jpg", "longitude": 25.853426, "latitude": -17.923924, "width": 500, "height": 375, "upload_date": "29 April 2007", "owner_id": 165455, "owner_name": "snorth", "owner_url": "http://www.panoramio.com/user/165455"}
,
{"item_id": 3417691, "item_title": "VÃ¶lgy-Zugoly", "item_url": "http://www.panoramio.com/photo/3417691", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3417691.jpg", "longitude": 17.826734, "latitude": 47.359293, "width": 500, "height": 346, "upload_date": "20 July 2007", "owner_id": 689769, "owner_name": "Ponty IstvÃ¡n", "owner_url": "http://www.panoramio.com/user/689769"}
,
{"item_id": 4166241, "item_title": "Egy mÃ¡sik vilÃ¡g", "item_url": "http://www.panoramio.com/photo/4166241", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4166241.jpg", "longitude": 18.056545, "latitude": 47.276667, "width": 333, "height": 500, "upload_date": "25 August 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 3976033, "item_title": "Sunrise BlÃ¼emlisalp Switzerland", "item_url": "http://www.panoramio.com/photo/3976033", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3976033.jpg", "longitude": 7.779844, "latitude": 46.528974, "width": 500, "height": 333, "upload_date": "16 August 2007", "owner_id": 47930, "owner_name": "werni", "owner_url": "http://www.panoramio.com/user/47930"}
,
{"item_id": 1449570, "item_title": "Akabat", "item_url": "http://www.panoramio.com/photo/1449570", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1449570.jpg", "longitude": 28.286717, "latitude": 27.484675, "width": 500, "height": 304, "upload_date": "22 March 2007", "owner_id": 304324, "owner_name": "OxyPhoto.ru - O x y", "owner_url": "http://www.panoramio.com/user/304324"}
,
{"item_id": 8802, "item_title": "Statue of Liberty [003393]", "item_url": "http://www.panoramio.com/photo/8802", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/8802.jpg", "longitude": -74.044375, "latitude": 40.688871, "width": 500, "height": 375, "upload_date": "27 January 2006", "owner_id": 1489, "owner_name": "Thorsten", "owner_url": "http://www.panoramio.com/user/1489"}
,
{"item_id": 6015859, "item_title": "Amazing place to drink ouzo", "item_url": "http://www.panoramio.com/photo/6015859", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6015859.jpg", "longitude": 23.057030, "latitude": 36.687990, "width": 500, "height": 333, "upload_date": "19 November 2007", "owner_id": 242446, "owner_name": "Ntinos Lagos", "owner_url": "http://www.panoramio.com/user/242446"}
,
{"item_id": 653941, "item_title": "Mt. Moran across Jackson Lake", "item_url": "http://www.panoramio.com/photo/653941", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/653941.jpg", "longitude": -110.656099, "latitude": 43.897336, "width": 500, "height": 374, "upload_date": "02 February 2007", "owner_id": 87752, "owner_name": "Richard Ryer", "owner_url": "http://www.panoramio.com/user/87752"}
,
{"item_id": 354695, "item_title": "Dresden_Zwinger_01", "item_url": "http://www.panoramio.com/photo/354695", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/354695.jpg", "longitude": 13.734369, "latitude": 51.053481, "width": 399, "height": 500, "upload_date": "09 January 2007", "owner_id": 71628, "owner_name": "Ulrich HÃ¤ssler, Dresden", "owner_url": "http://www.panoramio.com/user/71628"}
,
{"item_id": 8327051, "item_title": "Anelito di .... luce", "item_url": "http://www.panoramio.com/photo/8327051", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/8327051.jpg", "longitude": 13.717203, "latitude": 45.699706, "width": 500, "height": 375, "upload_date": "06 March 2008", "owner_id": 1121720, "owner_name": "â–¬  Mauro Antonini â–¬", "owner_url": "http://www.panoramio.com/user/1121720"}
,
{"item_id": 522126, "item_title": "Ãme a ludas hogy MÃ¡rton lemaradt", "item_url": "http://www.panoramio.com/photo/522126", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/522126.jpg", "longitude": 16.855431, "latitude": 47.653594, "width": 500, "height": 319, "upload_date": "21 January 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 3948179, "item_title": " petit matin en VendÃ©e, sur la rive droite du Jaunay, 11 aoÃ»t 2007. #921, 933", "item_url": "http://www.panoramio.com/photo/3948179", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3948179.jpg", "longitude": -1.901278, "latitude": 46.663487, "width": 500, "height": 343, "upload_date": "15 August 2007", "owner_id": 666755, "owner_name": "Armagnac", "owner_url": "http://www.panoramio.com/user/666755"}
,
{"item_id": 1781399, "item_title": "Dawn in Yosemite Valley", "item_url": "http://www.panoramio.com/photo/1781399", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1781399.jpg", "longitude": -119.590645, "latitude": 37.743775, "width": 333, "height": 500, "upload_date": "15 April 2007", "owner_id": 376395, "owner_name": "JeffSullivan (www.MyPhotoGuides.com)", "owner_url": "http://www.panoramio.com/user/376395"}
,
{"item_id": 905112, "item_title": "Searea buildings in Odaiba", "item_url": "http://www.panoramio.com/photo/905112", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/905112.jpg", "longitude": 139.773039, "latitude": 35.635670, "width": 500, "height": 372, "upload_date": "19 February 2007", "owner_id": 78856, "owner_name": "chrisjongkind â€¢ archive", "owner_url": "http://www.panoramio.com/user/78856"}
,
{"item_id": 6935706, "item_title": "poranek w ogniu - morning on fire", "item_url": "http://www.panoramio.com/photo/6935706", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6935706.jpg", "longitude": 20.319901, "latitude": 49.730028, "width": 500, "height": 332, "upload_date": "06 January 2008", "owner_id": 454219, "owner_name": "Rafal Ociepka", "owner_url": "http://www.panoramio.com/user/454219"}
,
{"item_id": 29606, "item_title": "Romance entre el Agua y la Roca", "item_url": "http://www.panoramio.com/photo/29606", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/29606.jpg", "longitude": -64.859161, "latitude": -31.991480, "width": 500, "height": 375, "upload_date": "01 July 2006", "owner_id": 4483, "owner_name": "Miguel Coranti", "owner_url": "http://www.panoramio.com/user/4483"}
,
{"item_id": 58290, "item_title": "Taurachbahn", "item_url": "http://www.panoramio.com/photo/58290", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/58290.jpg", "longitude": 13.688021, "latitude": 47.130418, "width": 500, "height": 369, "upload_date": "07 October 2006", "owner_id": 8060, "owner_name": "Norbert MAIER", "owner_url": "http://www.panoramio.com/user/8060"}
,
{"item_id": 44982, "item_title": "Paris200412PJDSC_9304l", "item_url": "http://www.panoramio.com/photo/44982", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/44982.jpg", "longitude": 2.301636, "latitude": 48.853760, "width": 500, "height": 332, "upload_date": "02 September 2006", "owner_id": 6703, "owner_name": "Peter Jansen", "owner_url": "http://www.panoramio.com/user/6703"}
,
{"item_id": 532669, "item_title": "Closeup of wheatfield in november", "item_url": "http://www.panoramio.com/photo/532669", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/532669.jpg", "longitude": 11.276093, "latitude": 59.644239, "width": 375, "height": 500, "upload_date": "22 January 2007", "owner_id": 39160, "owner_name": "Snemann", "owner_url": "http://www.panoramio.com/user/39160"}
,
{"item_id": 723648, "item_title": "Elk near Jasper", "item_url": "http://www.panoramio.com/photo/723648", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/723648.jpg", "longitude": -118.046207, "latitude": 52.923290, "width": 500, "height": 332, "upload_date": "07 February 2007", "owner_id": 66847, "owner_name": "Lukas Novak", "owner_url": "http://www.panoramio.com/user/66847"}
,
{"item_id": 535234, "item_title": "Cathedral Cove near Hahei, New Zealand", "item_url": "http://www.panoramio.com/photo/535234", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/535234.jpg", "longitude": 175.790222, "latitude": -36.828611, "width": 500, "height": 375, "upload_date": "22 January 2007", "owner_id": 101257, "owner_name": "Denis Campbell", "owner_url": "http://www.panoramio.com/user/101257"}
,
{"item_id": 15299, "item_title": "Bodrum Sunset", "item_url": "http://www.panoramio.com/photo/15299", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/15299.jpg", "longitude": 27.425308, "latitude": 37.028595, "width": 500, "height": 375, "upload_date": "19 March 2006", "owner_id": 2351, "owner_name": "Serdar Bilecen", "owner_url": "http://www.panoramio.com/user/2351"}
,
{"item_id": 1932227, "item_title": "Mono Lake 3", "item_url": "http://www.panoramio.com/photo/1932227", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1932227.jpg", "longitude": -119.023819, "latitude": 37.940068, "width": 333, "height": 500, "upload_date": "26 April 2007", "owner_id": 40260, "owner_name": "Don Albonico", "owner_url": "http://www.panoramio.com/user/40260"}
,
{"item_id": 744906, "item_title": "Tsukahara Highland", "item_url": "http://www.panoramio.com/photo/744906", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/744906.jpg", "longitude": 131.403952, "latitude": 33.320201, "width": 500, "height": 375, "upload_date": "08 February 2007", "owner_id": 11781, "owner_name": "ANDRE GARDELLA", "owner_url": "http://www.panoramio.com/user/11781"}
,
{"item_id": 490198, "item_title": "Jal Mahal, Jaipur", "item_url": "http://www.panoramio.com/photo/490198", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/490198.jpg", "longitude": 75.842797, "latitude": 26.954571, "width": 500, "height": 403, "upload_date": "19 January 2007", "owner_id": 10456, "owner_name": "eulogio", "owner_url": "http://www.panoramio.com/user/10456"}
,
{"item_id": 451032, "item_title": "Mono Lake", "item_url": "http://www.panoramio.com/photo/451032", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/451032.jpg", "longitude": -119.017537, "latitude": 37.941803, "width": 363, "height": 500, "upload_date": "16 January 2007", "owner_id": 93560, "owner_name": "Alex Petrov", "owner_url": "http://www.panoramio.com/user/93560"}
,
{"item_id": 5808345, "item_title": "Majesty in the snow", "item_url": "http://www.panoramio.com/photo/5808345", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5808345.jpg", "longitude": 9.944987, "latitude": 48.684866, "width": 367, "height": 500, "upload_date": "09 November 2007", "owner_id": 424589, "owner_name": "PeSchn", "owner_url": "http://www.panoramio.com/user/424589"}
,
{"item_id": 2718436, "item_title": "BKCC view northwest", "item_url": "http://www.panoramio.com/photo/2718436", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2718436.jpg", "longitude": 139.752048, "latitude": 35.708102, "width": 500, "height": 365, "upload_date": "12 June 2007", "owner_id": 558055, "owner_name": "www.tokyoform.com", "owner_url": "http://www.panoramio.com/user/558055"}
,
{"item_id": 5446639, "item_title": "ÐžÑÐµÐ½ÑŒ", "item_url": "http://www.panoramio.com/photo/5446639", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5446639.jpg", "longitude": 23.824694, "latitude": 53.680547, "width": 500, "height": 375, "upload_date": "21 October 2007", "owner_id": 937915, "owner_name": "HiV", "owner_url": "http://www.panoramio.com/user/937915"}
,
{"item_id": 3393267, "item_title": "Barco hundido (pecio) /Shipwreck /Ã©pave ", "item_url": "http://www.panoramio.com/photo/3393267", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3393267.jpg", "longitude": -81.680587, "latitude": 45.255181, "width": 329, "height": 500, "upload_date": "18 July 2007", "owner_id": 401966, "owner_name": "Syl de Canada", "owner_url": "http://www.panoramio.com/user/401966"}
,
{"item_id": 4369140, "item_title": "Beach on HÃ¥ja", "item_url": "http://www.panoramio.com/photo/4369140", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4369140.jpg", "longitude": 18.096886, "latitude": 69.740825, "width": 500, "height": 375, "upload_date": "03 September 2007", "owner_id": 39160, "owner_name": "Snemann", "owner_url": "http://www.panoramio.com/user/39160"}
,
{"item_id": 3711738, "item_title": "Safe", "item_url": "http://www.panoramio.com/photo/3711738", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3711738.jpg", "longitude": 1.787220, "latitude": 41.224610, "width": 500, "height": 375, "upload_date": "04 August 2007", "owner_id": 138691, "owner_name": "Josep Maria Alegre", "owner_url": "http://www.panoramio.com/user/138691"}
,
{"item_id": 7415554, "item_title": "Sunrise at Hae-keum-gang, Korea", "item_url": "http://www.panoramio.com/photo/7415554", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/7415554.jpg", "longitude": 128.605957, "latitude": 34.698719, "width": 500, "height": 500, "upload_date": "28 January 2008", "owner_id": 1221287, "owner_name": "TS Jeung", "owner_url": "http://www.panoramio.com/user/1221287"}
,
{"item_id": 10129080, "item_title": "Polish Silesia sunset.", "item_url": "http://www.panoramio.com/photo/10129080", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/10129080.jpg", "longitude": 18.819752, "latitude": 49.789798, "width": 500, "height": 335, "upload_date": "11 May 2008", "owner_id": 548131, "owner_name": "murart", "owner_url": "http://www.panoramio.com/user/548131"}
,
{"item_id": 11827263, "item_title": ":  Casa Rustica", "item_url": "http://www.panoramio.com/photo/11827263", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/11827263.jpg", "longitude": -8.644395, "latitude": 42.795039, "width": 500, "height": 375, "upload_date": "05 July 2008", "owner_id": 546858, "owner_name": "Lazariparcero", "owner_url": "http://www.panoramio.com/user/546858"}
,
{"item_id": 9185096, "item_title": "E per cambiare... oggi Ã¨ nevicato !     07.04.2008", "item_url": "http://www.panoramio.com/photo/9185096", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/9185096.jpg", "longitude": 11.469633, "latitude": 46.304547, "width": 500, "height": 375, "upload_date": "07 April 2008", "owner_id": 6033, "owner_name": "â–º Marco Vanzo", "owner_url": "http://www.panoramio.com/user/6033"}
,
{"item_id": 691, "item_title": "Monasterio de Santa Catalina. Arequipa, PerÃº", "item_url": "http://www.panoramio.com/photo/691", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/691.jpg", "longitude": -71.536671, "latitude": -16.395835, "width": 500, "height": 375, "upload_date": "05 October 2005", "owner_id": 7, "owner_name": "Eduardo ManchÃ³n", "owner_url": "http://www.panoramio.com/user/7"}
,
{"item_id": 672525, "item_title": "Pyramid", "item_url": "http://www.panoramio.com/photo/672525", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/672525.jpg", "longitude": 31.132421, "latitude": 29.978283, "width": 500, "height": 474, "upload_date": "03 February 2007", "owner_id": 123698, "owner_name": "Â© Kojak", "owner_url": "http://www.panoramio.com/user/123698"}
,
{"item_id": 275730, "item_title": "Oberalp - 2033 m", "item_url": "http://www.panoramio.com/photo/275730", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/275730.jpg", "longitude": 8.668191, "latitude": 46.661528, "width": 500, "height": 333, "upload_date": "01 January 2007", "owner_id": 57869, "owner_name": "NAGY Albert", "owner_url": "http://www.panoramio.com/user/57869"}
,
{"item_id": 3661332, "item_title": "Angkor - Temple vs Trees", "item_url": "http://www.panoramio.com/photo/3661332", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3661332.jpg", "longitude": 103.855079, "latitude": 13.449099, "width": 500, "height": 461, "upload_date": "01 August 2007", "owner_id": 73104, "owner_name": "zerega", "owner_url": "http://www.panoramio.com/user/73104"}
,
{"item_id": 336151, "item_title": "Lake north of Tupaassat", "item_url": "http://www.panoramio.com/photo/336151", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/336151.jpg", "longitude": -44.307861, "latitude": 60.376030, "width": 500, "height": 333, "upload_date": "07 January 2007", "owner_id": 62557, "owner_name": "Dirk Jenrich", "owner_url": "http://www.panoramio.com/user/62557"}
,
{"item_id": 423705, "item_title": "Bouche du Pu`u `ÅŒ`Å", "item_url": "http://www.panoramio.com/photo/423705", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/423705.jpg", "longitude": -155.106182, "latitude": 19.390101, "width": 500, "height": 349, "upload_date": "14 January 2007", "owner_id": 75602, "owner_name": "Lloulhy", "owner_url": "http://www.panoramio.com/user/75602"}
,
{"item_id": 1344795, "item_title": "Tree in a field, Aerial", "item_url": "http://www.panoramio.com/photo/1344795", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1344795.jpg", "longitude": 12.058611, "latitude": 55.471581, "width": 500, "height": 332, "upload_date": "16 March 2007", "owner_id": 278074, "owner_name": "H. C. Steensen", "owner_url": "http://www.panoramio.com/user/278074"}
,
{"item_id": 5591839, "item_title": "Can I touch the clouds?", "item_url": "http://www.panoramio.com/photo/5591839", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5591839.jpg", "longitude": 130.689411, "latitude": 33.305569, "width": 333, "height": 500, "upload_date": "28 October 2007", "owner_id": 775356, "owner_name": "ascesis.image", "owner_url": "http://www.panoramio.com/user/775356"}
,
{"item_id": 5476386, "item_title": "Nuages crÃ©pusculaires sur le Lauterbrunnental", "item_url": "http://www.panoramio.com/photo/5476386", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5476386.jpg", "longitude": 7.908010, "latitude": 46.592490, "width": 500, "height": 375, "upload_date": "22 October 2007", "owner_id": 359127, "owner_name": "wx", "owner_url": "http://www.panoramio.com/user/359127"}
,
{"item_id": 459556, "item_title": "minatopia", "item_url": "http://www.panoramio.com/photo/459556", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/459556.jpg", "longitude": 139.058182, "latitude": 37.930041, "width": 381, "height": 500, "upload_date": "16 January 2007", "owner_id": 86411, "owner_name": "ä¸­æ‘è„©-Osamu nakamura", "owner_url": "http://www.panoramio.com/user/86411"}
,
{"item_id": 1407525, "item_title": "Mackinac Bridge, Michigan", "item_url": "http://www.panoramio.com/photo/1407525", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1407525.jpg", "longitude": -84.729652, "latitude": 45.788250, "width": 500, "height": 313, "upload_date": "20 March 2007", "owner_id": 60173, "owner_name": "Lars Jensen", "owner_url": "http://www.panoramio.com/user/60173"}
,
{"item_id": 74790, "item_title": "kang taiga with moon in sunset", "item_url": "http://www.panoramio.com/photo/74790", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/74790.jpg", "longitude": 86.830101, "latitude": 27.811750, "width": 500, "height": 334, "upload_date": "03 November 2006", "owner_id": 9812, "owner_name": "wsm earp", "owner_url": "http://www.panoramio.com/user/9812"}
,
{"item_id": 4025902, "item_title": "Coloured PoznaÅ„ ", "item_url": "http://www.panoramio.com/photo/4025902", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4025902.jpg", "longitude": 16.934255, "latitude": 52.407878, "width": 500, "height": 316, "upload_date": "19 August 2007", "owner_id": 369127, "owner_name": "â™¥ Caterpillar", "owner_url": "http://www.panoramio.com/user/369127"}
,
{"item_id": 88121, "item_title": "View from Punta Martin - Liguria - Italy", "item_url": "http://www.panoramio.com/photo/88121", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/88121.jpg", "longitude": 8.795028, "latitude": 44.468489, "width": 500, "height": 375, "upload_date": "28 November 2006", "owner_id": 11098, "owner_name": "Michele Masnata", "owner_url": "http://www.panoramio.com/user/11098"}
,
{"item_id": 8214845, "item_title": "Molino Albolafia,cauce del Guadalquivir(CÃ³rdoba)", "item_url": "http://www.panoramio.com/photo/8214845", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/8214845.jpg", "longitude": -4.780898, "latitude": 37.876242, "width": 500, "height": 375, "upload_date": "01 March 2008", "owner_id": 83865, "owner_name": "Epi F.Villanueva", "owner_url": "http://www.panoramio.com/user/83865"}
,
{"item_id": 23364, "item_title": "Alanya, Taurus-Mountains of Kemer", "item_url": "http://www.panoramio.com/photo/23364", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/23364.jpg", "longitude": 31.979656, "latitude": 36.548466, "width": 500, "height": 375, "upload_date": "10 June 2006", "owner_id": 3760, "owner_name": "Frank Pustlauck", "owner_url": "http://www.panoramio.com/user/3760"}
,
{"item_id": 6128452, "item_title": "Ð’ Ð¾ÑÐµÐ½Ð½ÐµÐ¼ Ð¿Ð°Ñ€ÐºÐµ - In autumn park", "item_url": "http://www.panoramio.com/photo/6128452", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6128452.jpg", "longitude": 37.458926, "latitude": 55.737422, "width": 500, "height": 500, "upload_date": "25 November 2007", "owner_id": 244932, "owner_name": "Andrey Jitkov", "owner_url": "http://www.panoramio.com/user/244932"}
,
{"item_id": 4356679, "item_title": "Old Santa Fe Caboose", "item_url": "http://www.panoramio.com/photo/4356679", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4356679.jpg", "longitude": -119.699687, "latitude": 36.707083, "width": 500, "height": 335, "upload_date": "03 September 2007", "owner_id": 339677, "owner_name": "Chip Stephan", "owner_url": "http://www.panoramio.com/user/339677"}
,
{"item_id": 436312, "item_title": "tokimesse", "item_url": "http://www.panoramio.com/photo/436312", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/436312.jpg", "longitude": 139.059105, "latitude": 37.932013, "width": 396, "height": 500, "upload_date": "15 January 2007", "owner_id": 86411, "owner_name": "ä¸­æ‘è„©-Osamu nakamura", "owner_url": "http://www.panoramio.com/user/86411"}
,
{"item_id": 1089381, "item_title": "Szabadon szÃ©lben", "item_url": "http://www.panoramio.com/photo/1089381", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1089381.jpg", "longitude": 17.604561, "latitude": 47.588799, "width": 332, "height": 500, "upload_date": "28 February 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 5667175, "item_title": "Northen Lights", "item_url": "http://www.panoramio.com/photo/5667175", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5667175.jpg", "longitude": 28.482399, "latitude": 66.227860, "width": 500, "height": 333, "upload_date": "01 November 2007", "owner_id": 897591, "owner_name": "markku pirttimaa www.karhukuusamo.com", "owner_url": "http://www.panoramio.com/user/897591"}
,
{"item_id": 1317737, "item_title": "Bora Bora", "item_url": "http://www.panoramio.com/photo/1317737", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1317737.jpg", "longitude": -151.739988, "latitude": -16.538715, "width": 500, "height": 351, "upload_date": "14 March 2007", "owner_id": 232099, "owner_name": "mabut", "owner_url": "http://www.panoramio.com/user/232099"}
,
{"item_id": 993129, "item_title": "WÃ¼rzburg", "item_url": "http://www.panoramio.com/photo/993129", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/993129.jpg", "longitude": 9.931523, "latitude": 49.793310, "width": 500, "height": 395, "upload_date": "24 February 2007", "owner_id": 83972, "owner_name": "Maxim Popov (http://www.popovm.ru)", "owner_url": "http://www.panoramio.com/user/83972"}
,
{"item_id": 1836922, "item_title": "Fountain Place / Dallas / Texas", "item_url": "http://www.panoramio.com/photo/1836922", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1836922.jpg", "longitude": -96.802940, "latitude": 32.785236, "width": 500, "height": 405, "upload_date": "19 April 2007", "owner_id": 57778, "owner_name": "William Lile", "owner_url": "http://www.panoramio.com/user/57778"}
,
{"item_id": 3409786, "item_title": "Molinos de Elguea con Gorbea al fondo", "item_url": "http://www.panoramio.com/photo/3409786", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3409786.jpg", "longitude": -2.325025, "latitude": 42.951271, "width": 500, "height": 303, "upload_date": "19 July 2007", "owner_id": 129297, "owner_name": "Enrique Ortiz de ZÃ¡rate", "owner_url": "http://www.panoramio.com/user/129297"}
,
{"item_id": 476284, "item_title": "Place \"Poda\"", "item_url": "http://www.panoramio.com/photo/476284", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/476284.jpg", "longitude": 27.471657, "latitude": 42.447655, "width": 500, "height": 357, "upload_date": "18 January 2007", "owner_id": 16880, "owner_name": "evgenidinev.com", "owner_url": "http://www.panoramio.com/user/16880"}
,
{"item_id": 3499645, "item_title": "TÃ¼kÃ¶r-kÃ©p", "item_url": "http://www.panoramio.com/photo/3499645", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3499645.jpg", "longitude": 17.503667, "latitude": 47.843522, "width": 500, "height": 333, "upload_date": "24 July 2007", "owner_id": 689769, "owner_name": "Ponty IstvÃ¡n", "owner_url": "http://www.panoramio.com/user/689769"}
,
{"item_id": 1419901, "item_title": "Ã˜resundsbroen seen from Sweden (The Dragon Tail), Aerial", "item_url": "http://www.panoramio.com/photo/1419901", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1419901.jpg", "longitude": 12.885418, "latitude": 55.566213, "width": 332, "height": 500, "upload_date": "20 March 2007", "owner_id": 278074, "owner_name": "H. C. Steensen", "owner_url": "http://www.panoramio.com/user/278074"}
,
{"item_id": 441727, "item_title": "Ð¤Ð¾Ñ€Ñ‚ÐµÑ†Ñ Ñƒ ÐšÐ°Ð¼'ÑÐ½Ñ†Ñ–-ÐŸÐ¾Ð´Ñ–Ð»ÑŒÑÑŒÐºÐ¾Ð¼Ñƒ", "item_url": "http://www.panoramio.com/photo/441727", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/441727.jpg", "longitude": 26.563311, "latitude": 48.672486, "width": 375, "height": 500, "upload_date": "15 January 2007", "owner_id": 13058, "owner_name": "Kyryl", "owner_url": "http://www.panoramio.com/user/13058"}
,
{"item_id": 309122, "item_title": "Standing Stone, Spittal of Glenshee", "item_url": "http://www.panoramio.com/photo/309122", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/309122.jpg", "longitude": -3.461593, "latitude": 56.814745, "width": 500, "height": 332, "upload_date": "05 January 2007", "owner_id": 64815, "owner_name": "PigleT", "owner_url": "http://www.panoramio.com/user/64815"}
,
{"item_id": 2599560, "item_title": "Isigakiã€€Islandã€€Hirakubosakiã€€lighthouseã€€çŸ³åž£å³¶ã€€å¹³ä¹…ä¿å´Žç¯å°", "item_url": "http://www.panoramio.com/photo/2599560", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2599560.jpg", "longitude": 124.315994, "latitude": 24.610064, "width": 500, "height": 328, "upload_date": "06 June 2007", "owner_id": 446937, "owner_name": "y_komatsu", "owner_url": "http://www.panoramio.com/user/446937"}
,
{"item_id": 6545801, "item_title": "Front Range of the Canadian Rocky Mountains", "item_url": "http://www.panoramio.com/photo/6545801", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6545801.jpg", "longitude": -115.248213, "latitude": 51.026389, "width": 500, "height": 338, "upload_date": "18 December 2007", "owner_id": 85489, "owner_name": "Bruce MacIver", "owner_url": "http://www.panoramio.com/user/85489"}
,
{"item_id": 1254026, "item_title": "Hagia Sophia (inside)", "item_url": "http://www.panoramio.com/photo/1254026", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1254026.jpg", "longitude": 28.979831, "latitude": 41.008548, "width": 500, "height": 408, "upload_date": "10 March 2007", "owner_id": 258322, "owner_name": "www.tatjana.ingold.ch", "owner_url": "http://www.panoramio.com/user/258322"}
,
{"item_id": 911501, "item_title": "View from NordenskiÃ¶ldtoppen, Svalbard", "item_url": "http://www.panoramio.com/photo/911501", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/911501.jpg", "longitude": 15.402832, "latitude": 78.184088, "width": 500, "height": 308, "upload_date": "20 February 2007", "owner_id": 66734, "owner_name": "Svein Solhaug", "owner_url": "http://www.panoramio.com/user/66734"}
,
{"item_id": 3797140, "item_title": "Mas Francesc", "item_url": "http://www.panoramio.com/photo/3797140", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3797140.jpg", "longitude": 2.408388, "latitude": 41.962346, "width": 500, "height": 332, "upload_date": "08 August 2007", "owner_id": 756267, "owner_name": "Albert Codina", "owner_url": "http://www.panoramio.com/user/756267"}
,
{"item_id": 150165, "item_title": "Aso crater from the air", "item_url": "http://www.panoramio.com/photo/150165", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/150165.jpg", "longitude": 131.083159, "latitude": 32.885390, "width": 500, "height": 375, "upload_date": "14 December 2006", "owner_id": 11781, "owner_name": "ANDRE GARDELLA", "owner_url": "http://www.panoramio.com/user/11781"}
,
{"item_id": 532631, "item_title": "Last bath in Oslofjorden - self portrait", "item_url": "http://www.panoramio.com/photo/532631", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/532631.jpg", "longitude": 10.782223, "latitude": 59.854773, "width": 500, "height": 205, "upload_date": "22 January 2007", "owner_id": 39160, "owner_name": "Snemann", "owner_url": "http://www.panoramio.com/user/39160"}
,
{"item_id": 3978149, "item_title": "Les Mines 3", "item_url": "http://www.panoramio.com/photo/3978149", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3978149.jpg", "longitude": 1.315312, "latitude": 45.921961, "width": 500, "height": 500, "upload_date": "16 August 2007", "owner_id": 372189, "owner_name": "PhilÂ©", "owner_url": "http://www.panoramio.com/user/372189"}
,
{"item_id": 848807, "item_title": "mystic morning", "item_url": "http://www.panoramio.com/photo/848807", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/848807.jpg", "longitude": 10.144372, "latitude": 54.323031, "width": 375, "height": 500, "upload_date": "17 February 2007", "owner_id": 73946, "owner_name": "pembo", "owner_url": "http://www.panoramio.com/user/73946"}
,
{"item_id": 4097972, "item_title": "Dry Land", "item_url": "http://www.panoramio.com/photo/4097972", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4097972.jpg", "longitude": 25.936694, "latitude": 41.660906, "width": 500, "height": 333, "upload_date": "22 August 2007", "owner_id": 16880, "owner_name": "evgenidinev.com", "owner_url": "http://www.panoramio.com/user/16880"}
,
{"item_id": 479927, "item_title": "Monterosso at night", "item_url": "http://www.panoramio.com/photo/479927", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/479927.jpg", "longitude": 9.655094, "latitude": 44.144461, "width": 500, "height": 357, "upload_date": "18 January 2007", "owner_id": 100907, "owner_name": "Julia Wahl", "owner_url": "http://www.panoramio.com/user/100907"}
,
{"item_id": 50872, "item_title": "DÃ¼ne 40 auf dem Weg nach Sossusvlei ...", "item_url": "http://www.panoramio.com/photo/50872", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/50872.jpg", "longitude": 15.593033, "latitude": -24.720950, "width": 500, "height": 192, "upload_date": "22 September 2006", "owner_id": 7434, "owner_name": "baldinger reisen ag, waedenswil/switzerland", "owner_url": "http://www.panoramio.com/user/7434"}
,
{"item_id": 2903483, "item_title": "Reggeli", "item_url": "http://www.panoramio.com/photo/2903483", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2903483.jpg", "longitude": 17.469549, "latitude": 47.868977, "width": 410, "height": 500, "upload_date": "23 June 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 4226249, "item_title": "Rainbow", "item_url": "http://www.panoramio.com/photo/4226249", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4226249.jpg", "longitude": 9.615569, "latitude": 62.529150, "width": 500, "height": 230, "upload_date": "27 August 2007", "owner_id": 223406, "owner_name": "Sigmund Rise", "owner_url": "http://www.panoramio.com/user/223406"}
,
{"item_id": 2267849, "item_title": "Rayos vistos desde mi ventana", "item_url": "http://www.panoramio.com/photo/2267849", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2267849.jpg", "longitude": -89.203963, "latitude": 13.728734, "width": 500, "height": 375, "upload_date": "17 May 2007", "owner_id": 170919, "owner_name": "Wilber CalderÃ³n - El Salvador", "owner_url": "http://www.panoramio.com/user/170919"}
,
{"item_id": 459470, "item_title": "bandaibashi4", "item_url": "http://www.panoramio.com/photo/459470", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/459470.jpg", "longitude": 139.051123, "latitude": 37.919081, "width": 500, "height": 399, "upload_date": "16 January 2007", "owner_id": 86411, "owner_name": "ä¸­æ‘è„©-Osamu nakamura", "owner_url": "http://www.panoramio.com/user/86411"}
,
{"item_id": 5279707, "item_title": "JÃ¦gervasstindane", "item_url": "http://www.panoramio.com/photo/5279707", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5279707.jpg", "longitude": 19.651279, "latitude": 69.771296, "width": 500, "height": 375, "upload_date": "13 October 2007", "owner_id": 39160, "owner_name": "Snemann", "owner_url": "http://www.panoramio.com/user/39160"}
,
{"item_id": 1057758, "item_title": "Giant dragonfly in rice field", "item_url": "http://www.panoramio.com/photo/1057758", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1057758.jpg", "longitude": 137.115641, "latitude": 34.862834, "width": 500, "height": 375, "upload_date": "27 February 2007", "owner_id": 11781, "owner_name": "ANDRE GARDELLA", "owner_url": "http://www.panoramio.com/user/11781"}
,
{"item_id": 479454, "item_title": "Morning sun over lake Ã˜ymarksjÃ¸en", "item_url": "http://www.panoramio.com/photo/479454", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/479454.jpg", "longitude": 11.637611, "latitude": 59.338617, "width": 333, "height": 500, "upload_date": "18 January 2007", "owner_id": 39160, "owner_name": "Snemann", "owner_url": "http://www.panoramio.com/user/39160"}
,
{"item_id": 87263, "item_title": "Payun - Mendoza - Argentina", "item_url": "http://www.panoramio.com/photo/87263", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/87263.jpg", "longitude": -69.280128, "latitude": -36.643080, "width": 500, "height": 333, "upload_date": "27 November 2006", "owner_id": 8409, "owner_name": "Hector Fabian Garrido", "owner_url": "http://www.panoramio.com/user/8409"}
,
{"item_id": 11430112, "item_title": "Tramonto dalla Pietra Parcellara", "item_url": "http://www.panoramio.com/photo/11430112", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/11430112.jpg", "longitude": 9.476480, "latitude": 44.843334, "width": 500, "height": 375, "upload_date": "22 June 2008", "owner_id": 22921, "owner_name": "Francesco Favalesi - VAL LURETTA", "owner_url": "http://www.panoramio.com/user/22921"}
,
{"item_id": 33760, "item_title": "Yu Yuan Gardens", "item_url": "http://www.panoramio.com/photo/33760", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/33760.jpg", "longitude": 121.487803, "latitude": 31.228821, "width": 500, "height": 375, "upload_date": "21 July 2006", "owner_id": 5168, "owner_name": "Markus KÃ¤llander", "owner_url": "http://www.panoramio.com/user/5168"}
,
{"item_id": 1935332, "item_title": "Lafayette", "item_url": "http://www.panoramio.com/photo/1935332", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1935332.jpg", "longitude": 2.311839, "latitude": 48.864475, "width": 384, "height": 500, "upload_date": "26 April 2007", "owner_id": 372189, "owner_name": "PhilÂ©", "owner_url": "http://www.panoramio.com/user/372189"}
,
{"item_id": 2558954, "item_title": "Two Thumbs Morning", "item_url": "http://www.panoramio.com/photo/2558954", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2558954.jpg", "longitude": 170.463352, "latitude": -43.999792, "width": 500, "height": 400, "upload_date": "04 June 2007", "owner_id": 286729, "owner_name": "jimwitkowski", "owner_url": "http://www.panoramio.com/user/286729"}
,
{"item_id": 94190, "item_title": "morning light", "item_url": "http://www.panoramio.com/photo/94190", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/94190.jpg", "longitude": 138.362846, "latitude": 35.981896, "width": 500, "height": 375, "upload_date": "09 December 2006", "owner_id": 11781, "owner_name": "ANDRE GARDELLA", "owner_url": "http://www.panoramio.com/user/11781"}
,
{"item_id": 1283054, "item_title": "Panorama - Bahia desde la playa", "item_url": "http://www.panoramio.com/photo/1283054", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1283054.jpg", "longitude": -1.990094, "latitude": 43.316053, "width": 500, "height": 167, "upload_date": "12 March 2007", "owner_id": 218075, "owner_name": "fotoramas", "owner_url": "http://www.panoramio.com/user/218075"}
,
{"item_id": 2541040, "item_title": "SzÃ­nfÃ¶rgeteg", "item_url": "http://www.panoramio.com/photo/2541040", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2541040.jpg", "longitude": 17.506886, "latitude": 47.744403, "width": 500, "height": 334, "upload_date": "03 June 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 837872, "item_title": "Midnight Sunset", "item_url": "http://www.panoramio.com/photo/837872", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/837872.jpg", "longitude": -14.670181, "latitude": 65.142363, "width": 500, "height": 333, "upload_date": "16 February 2007", "owner_id": 175423, "owner_name": "Fabien Barrau", "owner_url": "http://www.panoramio.com/user/175423"}
,
{"item_id": 1706995, "item_title": "Cantera de Manresa", "item_url": "http://www.panoramio.com/photo/1706995", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1706995.jpg", "longitude": 3.131152, "latitude": 39.868942, "width": 335, "height": 500, "upload_date": "09 April 2007", "owner_id": 61890, "owner_name": "enriquevidalphoto.com", "owner_url": "http://www.panoramio.com/user/61890"}
,
{"item_id": 575731, "item_title": "Le Mont Saint-Michel   (Francia)", "item_url": "http://www.panoramio.com/photo/575731", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/575731.jpg", "longitude": -1.498604, "latitude": 48.636085, "width": 500, "height": 334, "upload_date": "26 January 2007", "owner_id": 38814, "owner_name": "Romeo Ferrari", "owner_url": "http://www.panoramio.com/user/38814"}
,
{"item_id": 1960951, "item_title": "Utah Autumn Aspen", "item_url": "http://www.panoramio.com/photo/1960951", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1960951.jpg", "longitude": -111.620750, "latitude": 40.441721, "width": 500, "height": 332, "upload_date": "28 April 2007", "owner_id": 107359, "owner_name": "Ron Cooper", "owner_url": "http://www.panoramio.com/user/107359"}
,
{"item_id": 162298, "item_title": "Nuvole (Effetto Dio) sopra Marano Ticino (2 of 2), settembre 2005", "item_url": "http://www.panoramio.com/photo/162298", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/162298.jpg", "longitude": 8.623238, "latitude": 45.629825, "width": 500, "height": 375, "upload_date": "16 December 2006", "owner_id": 18925, "owner_name": "Marco Ferrari", "owner_url": "http://www.panoramio.com/user/18925"}
,
{"item_id": 9358587, "item_title": "Sicilia, a me bedda!", "item_url": "http://www.panoramio.com/photo/9358587", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/9358587.jpg", "longitude": 14.652908, "latitude": 38.068172, "width": 500, "height": 375, "upload_date": "14 April 2008", "owner_id": 325031, "owner_name": "Gibrail", "owner_url": "http://www.panoramio.com/user/325031"}
,
{"item_id": 11271799, "item_title": "Candelaria, version completa ( Candelaria, full version )", "item_url": "http://www.panoramio.com/photo/11271799", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/11271799.jpg", "longitude": -18.005776, "latitude": 27.750886, "width": 334, "height": 500, "upload_date": "16 June 2008", "owner_id": 787217, "owner_name": "â™£ VÃ­ctor S de Lara â™£", "owner_url": "http://www.panoramio.com/user/787217"}
,
{"item_id": 81, "item_title": "North Cape from plane", "item_url": "http://www.panoramio.com/photo/81", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/81.jpg", "longitude": 25.786285, "latitude": 71.171196, "width": 500, "height": 340, "upload_date": "30 July 2005", "owner_id": 7, "owner_name": "Eduardo ManchÃ³n", "owner_url": "http://www.panoramio.com/user/7"}
,
{"item_id": 6548480, "item_title": "ç å³°æ™“æœˆ", "item_url": "http://www.panoramio.com/photo/6548480", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6548480.jpg", "longitude": 86.857567, "latitude": 28.119833, "width": 500, "height": 332, "upload_date": "18 December 2007", "owner_id": 1201050, "owner_name": "é»„æ²³å½±äºº", "owner_url": "http://www.panoramio.com/user/1201050"}
,
{"item_id": 1989382, "item_title": "", "item_url": "http://www.panoramio.com/photo/1989382", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1989382.jpg", "longitude": 20.628827, "latitude": 52.062874, "width": 500, "height": 375, "upload_date": "29 April 2007", "owner_id": 234038, "owner_name": "Jacek M.", "owner_url": "http://www.panoramio.com/user/234038"}
,
{"item_id": 3186699, "item_title": "Ruta del Cares: ParedÃ³n de los Collainos -mÃ¡s  400 m. de vertical-", "item_url": "http://www.panoramio.com/photo/3186699", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3186699.jpg", "longitude": -4.863296, "latitude": 43.253174, "width": 335, "height": 500, "upload_date": "08 July 2007", "owner_id": 129297, "owner_name": "Enrique Ortiz de ZÃ¡rate", "owner_url": "http://www.panoramio.com/user/129297"}
,
{"item_id": 9899533, "item_title": "Grado: Are you Ready? . . . . . . . . .                                                            Honorable mention \"Scenery\" May Contest 2008", "item_url": "http://www.panoramio.com/photo/9899533", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/9899533.jpg", "longitude": 13.395016, "latitude": 45.676262, "width": 500, "height": 375, "upload_date": "04 May 2008", "owner_id": 381221, "owner_name": "Flavio Snidero", "owner_url": "http://www.panoramio.com/user/381221"}
,
{"item_id": 324623, "item_title": "richmond bridge", "item_url": "http://www.panoramio.com/photo/324623", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/324623.jpg", "longitude": 147.439506, "latitude": -42.734358, "width": 500, "height": 375, "upload_date": "06 January 2007", "owner_id": 66974, "owner_name": "lieskovec", "owner_url": "http://www.panoramio.com/user/66974"}
,
{"item_id": 4450585, "item_title": "Giorno di riposo", "item_url": "http://www.panoramio.com/photo/4450585", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4450585.jpg", "longitude": 35.440521, "latitude": 33.732906, "width": 500, "height": 375, "upload_date": "06 September 2007", "owner_id": 407625, "owner_name": "Lyana  Luna", "owner_url": "http://www.panoramio.com/user/407625"}
,
{"item_id": 1088801, "item_title": "KalÃ¡szos impressziÃ³", "item_url": "http://www.panoramio.com/photo/1088801", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1088801.jpg", "longitude": 17.727127, "latitude": 47.444575, "width": 500, "height": 360, "upload_date": "28 February 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 290083, "item_title": "Beach full of life", "item_url": "http://www.panoramio.com/photo/290083", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/290083.jpg", "longitude": -59.072113, "latitude": -52.430478, "width": 335, "height": 500, "upload_date": "03 January 2007", "owner_id": 61890, "owner_name": "enriquevidalphoto.com", "owner_url": "http://www.panoramio.com/user/61890"}
,
{"item_id": 5734694, "item_title": "Virginia Horse Country", "item_url": "http://www.panoramio.com/photo/5734694", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5734694.jpg", "longitude": -78.754292, "latitude": 38.014964, "width": 500, "height": 375, "upload_date": "05 November 2007", "owner_id": 523038, "owner_name": "Yank in Dixie", "owner_url": "http://www.panoramio.com/user/523038"}
,
{"item_id": 6012970, "item_title": "Herbstliches Venedig", "item_url": "http://www.panoramio.com/photo/6012970", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6012970.jpg", "longitude": 12.343435, "latitude": 45.433752, "width": 500, "height": 336, "upload_date": "19 November 2007", "owner_id": 8060, "owner_name": "Norbert MAIER", "owner_url": "http://www.panoramio.com/user/8060"}
,
{"item_id": 6321454, "item_title": "Sea Storm III - \" Dragonara \" Castle", "item_url": "http://www.panoramio.com/photo/6321454", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6321454.jpg", "longitude": 9.151177, "latitude": 44.350211, "width": 444, "height": 500, "upload_date": "05 December 2007", "owner_id": 180947, "owner_name": "gilberto silvestri", "owner_url": "http://www.panoramio.com/user/180947"}
,
{"item_id": 459569, "item_title": "mt hakkai", "item_url": "http://www.panoramio.com/photo/459569", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/459569.jpg", "longitude": 138.921432, "latitude": 37.092157, "width": 500, "height": 389, "upload_date": "16 January 2007", "owner_id": 86411, "owner_name": "ä¸­æ‘è„©-Osamu nakamura", "owner_url": "http://www.panoramio.com/user/86411"}
,
{"item_id": 940337, "item_title": "Sunrising Monuments", "item_url": "http://www.panoramio.com/photo/940337", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/940337.jpg", "longitude": -110.110474, "latitude": 36.980255, "width": 500, "height": 287, "upload_date": "21 February 2007", "owner_id": 66847, "owner_name": "Lukas Novak", "owner_url": "http://www.panoramio.com/user/66847"}
,
{"item_id": 2400305, "item_title": "Cape of Favaritx, Gateway to Another Planet", "item_url": "http://www.panoramio.com/photo/2400305", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2400305.jpg", "longitude": 4.264122, "latitude": 39.996608, "width": 500, "height": 352, "upload_date": "26 May 2007", "owner_id": 213866, "owner_name": "Nicolas Mertens", "owner_url": "http://www.panoramio.com/user/213866"}
,
{"item_id": 398130, "item_title": "Aiguille du Chardonnet", "item_url": "http://www.panoramio.com/photo/398130", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/398130.jpg", "longitude": 7.013569, "latitude": 45.979190, "width": 500, "height": 333, "upload_date": "12 January 2007", "owner_id": 78506, "owner_name": "Philippe Stoop", "owner_url": "http://www.panoramio.com/user/78506"}
,
{"item_id": 283954, "item_title": "Dong-aoï¼šThe most beautiful coast of Taiwan", "item_url": "http://www.panoramio.com/photo/283954", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/283954.jpg", "longitude": 121.850481, "latitude": 24.524822, "width": 500, "height": 375, "upload_date": "02 January 2007", "owner_id": 60214, "owner_name": "swinelin", "owner_url": "http://www.panoramio.com/user/60214"}
,
{"item_id": 5115188, "item_title": "Iceland", "item_url": "http://www.panoramio.com/photo/5115188", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5115188.jpg", "longitude": -23.008804, "latitude": 64.947976, "width": 500, "height": 333, "upload_date": "05 October 2007", "owner_id": 588149, "owner_name": "Adam Salwanowicz", "owner_url": "http://www.panoramio.com/user/588149"}
,
{"item_id": 1865268, "item_title": "Rainbow Ridge Sunset", "item_url": "http://www.panoramio.com/photo/1865268", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1865268.jpg", "longitude": -112.404728, "latitude": 36.426808, "width": 500, "height": 333, "upload_date": "21 April 2007", "owner_id": 66847, "owner_name": "Lukas Novak", "owner_url": "http://www.panoramio.com/user/66847"}
,
{"item_id": 1633076, "item_title": "Parliament", "item_url": "http://www.panoramio.com/photo/1633076", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1633076.jpg", "longitude": 19.046752, "latitude": 47.512998, "width": 500, "height": 500, "upload_date": "04 April 2007", "owner_id": 52226, "owner_name": "jenoapu", "owner_url": "http://www.panoramio.com/user/52226"}
,
{"item_id": 800056, "item_title": "Karst Landscape in Guangxi, China", "item_url": "http://www.panoramio.com/photo/800056", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/800056.jpg", "longitude": 107.121944, "latitude": 23.605000, "width": 500, "height": 191, "upload_date": "13 February 2007", "owner_id": 164125, "owner_name": "DannyXu", "owner_url": "http://www.panoramio.com/user/164125"}
,
{"item_id": 21304, "item_title": "Matterhorn", "item_url": "http://www.panoramio.com/photo/21304", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/21304.jpg", "longitude": 7.718582, "latitude": 45.994577, "width": 375, "height": 500, "upload_date": "28 May 2006", "owner_id": 3404, "owner_name": "Csongor BÃ¶rÃ¶czky", "owner_url": "http://www.panoramio.com/user/3404"}
,
{"item_id": 402493, "item_title": "Burg-Eltz", "item_url": "http://www.panoramio.com/photo/402493", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/402493.jpg", "longitude": 7.336400, "latitude": 50.206104, "width": 369, "height": 500, "upload_date": "12 January 2007", "owner_id": 6105, "owner_name": "hackltom", "owner_url": "http://www.panoramio.com/user/6105"}
,
{"item_id": 411453, "item_title": "Dune 45 in Sosussvlei", "item_url": "http://www.panoramio.com/photo/411453", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/411453.jpg", "longitude": 15.397339, "latitude": -24.739972, "width": 500, "height": 333, "upload_date": "13 January 2007", "owner_id": 78506, "owner_name": "Philippe Stoop", "owner_url": "http://www.panoramio.com/user/78506"}
,
{"item_id": 1813822, "item_title": "Csendes dÃ©lutÃ¡n", "item_url": "http://www.panoramio.com/photo/1813822", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1813822.jpg", "longitude": 17.779655, "latitude": 47.507229, "width": 500, "height": 334, "upload_date": "17 April 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 798783, "item_title": "Georgia, Antelope Canyon, AZ", "item_url": "http://www.panoramio.com/photo/798783", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/798783.jpg", "longitude": -111.385489, "latitude": 36.873441, "width": 376, "height": 500, "upload_date": "12 February 2007", "owner_id": 52440, "owner_name": "Hank Waxman", "owner_url": "http://www.panoramio.com/user/52440"}
,
{"item_id": 5193281, "item_title": "The park at Gamlehaugen a bautiful day in September 2007, Bergen - Norway", "item_url": "http://www.panoramio.com/photo/5193281", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5193281.jpg", "longitude": 5.336909, "latitude": 60.341253, "width": 500, "height": 279, "upload_date": "09 October 2007", "owner_id": 121518, "owner_name": "S.M Tunli - www.tunliweb.no", "owner_url": "http://www.panoramio.com/user/121518"}
,
{"item_id": 642882, "item_title": "La Presolana e la Cometa Hale-Bopp", "item_url": "http://www.panoramio.com/photo/642882", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/642882.jpg", "longitude": 10.094032, "latitude": 45.927991, "width": 500, "height": 375, "upload_date": "01 February 2007", "owner_id": 38814, "owner_name": "Romeo Ferrari", "owner_url": "http://www.panoramio.com/user/38814"}
,
{"item_id": 304963, "item_title": "Calanque d'En  Vau 2", "item_url": "http://www.panoramio.com/photo/304963", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/304963.jpg", "longitude": 5.500288, "latitude": 43.201422, "width": 500, "height": 375, "upload_date": "05 January 2007", "owner_id": 64344, "owner_name": "Seb - Lyon", "owner_url": "http://www.panoramio.com/user/64344"}
,
{"item_id": 6126154, "item_title": "Swan - EPping Forest", "item_url": "http://www.panoramio.com/photo/6126154", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6126154.jpg", "longitude": 0.025658, "latitude": 51.638836, "width": 499, "height": 500, "upload_date": "25 November 2007", "owner_id": 1130880, "owner_name": "marksimms", "owner_url": "http://www.panoramio.com/user/1130880"}
,
{"item_id": 441426, "item_title": "Dettifoss", "item_url": "http://www.panoramio.com/photo/441426", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/441426.jpg", "longitude": -16.390743, "latitude": 65.819939, "width": 500, "height": 350, "upload_date": "15 January 2007", "owner_id": 78506, "owner_name": "Philippe Stoop", "owner_url": "http://www.panoramio.com/user/78506"}
,
{"item_id": 4105301, "item_title": "Eikesdalsvatnet. Norway.", "item_url": "http://www.panoramio.com/photo/4105301", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4105301.jpg", "longitude": 8.171768, "latitude": 62.561718, "width": 500, "height": 326, "upload_date": "22 August 2007", "owner_id": 806637, "owner_name": "BjÃ¸rn Fransgjerde", "owner_url": "http://www.panoramio.com/user/806637"}
,
{"item_id": 519765, "item_title": "DerÅ±s szeglet", "item_url": "http://www.panoramio.com/photo/519765", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/519765.jpg", "longitude": 17.173862, "latitude": 46.633997, "width": 500, "height": 282, "upload_date": "21 January 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 4401751, "item_title": "Fire Escape", "item_url": "http://www.panoramio.com/photo/4401751", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4401751.jpg", "longitude": -2.315347, "latitude": 52.644873, "width": 366, "height": 500, "upload_date": "04 September 2007", "owner_id": 1295, "owner_name": "Matthew Walters", "owner_url": "http://www.panoramio.com/user/1295"}
,
{"item_id": 1747294, "item_title": "Red Fort II / Fuerte rojo II", "item_url": "http://www.panoramio.com/photo/1747294", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1747294.jpg", "longitude": 73.017197, "latitude": 26.296801, "width": 500, "height": 375, "upload_date": "12 April 2007", "owner_id": 414, "owner_name": "Sonia Villegas", "owner_url": "http://www.panoramio.com/user/414"}
,
{"item_id": 2856289, "item_title": "Copacabana Praia", "item_url": "http://www.panoramio.com/photo/2856289", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2856289.jpg", "longitude": -43.179188, "latitude": -22.969457, "width": 500, "height": 375, "upload_date": "20 June 2007", "owner_id": 496676, "owner_name": "Quasebart", "owner_url": "http://www.panoramio.com/user/496676"}
,
{"item_id": 3116906, "item_title": "Mototaki Falls", "item_url": "http://www.panoramio.com/photo/3116906", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/3116906.jpg", "longitude": 139.954662, "latitude": 39.158750, "width": 500, "height": 375, "upload_date": "04 July 2007", "owner_id": 164173, "owner_name": "tsushima", "owner_url": "http://www.panoramio.com/user/164173"}
,
{"item_id": 8919659, "item_title": "Bavarian Forest", "item_url": "http://www.panoramio.com/photo/8919659", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/8919659.jpg", "longitude": 12.429099, "latitude": 49.084548, "width": 500, "height": 332, "upload_date": "28 March 2008", "owner_id": 696605, "owner_name": "Â© alfredschaffer", "owner_url": "http://www.panoramio.com/user/696605"}
,
{"item_id": 2040174, "item_title": "Looking east from Sognefjellet - april 29", "item_url": "http://www.panoramio.com/photo/2040174", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2040174.jpg", "longitude": 7.974873, "latitude": 61.561141, "width": 375, "height": 500, "upload_date": "03 May 2007", "owner_id": 39160, "owner_name": "Snemann", "owner_url": "http://www.panoramio.com/user/39160"}
,
{"item_id": 1195122, "item_title": "Cerro Macon", "item_url": "http://www.panoramio.com/photo/1195122", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1195122.jpg", "longitude": -67.356405, "latitude": -24.528540, "width": 335, "height": 500, "upload_date": "06 March 2007", "owner_id": 232099, "owner_name": "mabut", "owner_url": "http://www.panoramio.com/user/232099"}
,
{"item_id": 1182587, "item_title": "Gaggenau-Moosbronn, Wallfahrtskirche", "item_url": "http://www.panoramio.com/photo/1182587", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1182587.jpg", "longitude": 8.384285, "latitude": 48.840486, "width": 382, "height": 500, "upload_date": "05 March 2007", "owner_id": 66229, "owner_name": "Mast", "owner_url": "http://www.panoramio.com/user/66229"}
,
{"item_id": 4787323, "item_title": "Hell's Gate(Antigua-Caribe)", "item_url": "http://www.panoramio.com/photo/4787323", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4787323.jpg", "longitude": -61.722651, "latitude": 17.140052, "width": 500, "height": 375, "upload_date": "20 September 2007", "owner_id": 83865, "owner_name": "Epi F.Villanueva", "owner_url": "http://www.panoramio.com/user/83865"}
,
{"item_id": 5474175, "item_title": "Chemin bucolique au Lauterbrunnental 2", "item_url": "http://www.panoramio.com/photo/5474175", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/5474175.jpg", "longitude": 7.909877, "latitude": 46.580479, "width": 500, "height": 384, "upload_date": "22 October 2007", "owner_id": 359127, "owner_name": "wx", "owner_url": "http://www.panoramio.com/user/359127"}
,
{"item_id": 479364, "item_title": "The Earth Above Us II", "item_url": "http://www.panoramio.com/photo/479364", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/479364.jpg", "longitude": 19.053029, "latitude": 47.601392, "width": 500, "height": 317, "upload_date": "18 January 2007", "owner_id": 57869, "owner_name": "NAGY Albert", "owner_url": "http://www.panoramio.com/user/57869"}
,
{"item_id": 575110, "item_title": "A huge wave crashes against the front of Kiama Blowhole www.ozthunder.com", "item_url": "http://www.panoramio.com/photo/575110", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/575110.jpg", "longitude": 150.863657, "latitude": -34.671264, "width": 500, "height": 338, "upload_date": "26 January 2007", "owner_id": 67208, "owner_name": "Michael Thompson", "owner_url": "http://www.panoramio.com/user/67208"}
,
{"item_id": 543624, "item_title": "DalmÃ¡t Ã¡lom", "item_url": "http://www.panoramio.com/photo/543624", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/543624.jpg", "longitude": 15.969143, "latitude": 43.624768, "width": 500, "height": 333, "upload_date": "23 January 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 121224, "item_title": "ParadisePW", "item_url": "http://www.panoramio.com/photo/121224", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/121224.jpg", "longitude": -62.907715, "latitude": -64.830254, "width": 500, "height": 329, "upload_date": "12 December 2006", "owner_id": 19856, "owner_name": "Juan Kratzmaier", "owner_url": "http://www.panoramio.com/user/19856"}
,
{"item_id": 10074505, "item_title": "VolcÃ n ChaitÃ¨n, ChaitÃ¨n, Palena, Chile   Por Daniel Basualto", "item_url": "http://www.panoramio.com/photo/10074505", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/10074505.jpg", "longitude": -72.759705, "latitude": -42.908160, "width": 375, "height": 500, "upload_date": "10 May 2008", "owner_id": 88547, "owner_name": "Patricia Santini", "owner_url": "http://www.panoramio.com/user/88547"}
,
{"item_id": 10378, "item_title": "Chiang Mai, temple", "item_url": "http://www.panoramio.com/photo/10378", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/10378.jpg", "longitude": 98.921596, "latitude": 18.805157, "width": 319, "height": 500, "upload_date": "06 February 2006", "owner_id": 414, "owner_name": "Sonia Villegas", "owner_url": "http://www.panoramio.com/user/414"}
,
{"item_id": 532620, "item_title": "Morning mist near SkjÃ¸nhaug", "item_url": "http://www.panoramio.com/photo/532620", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/532620.jpg", "longitude": 11.297293, "latitude": 59.639511, "width": 333, "height": 500, "upload_date": "22 January 2007", "owner_id": 39160, "owner_name": "Snemann", "owner_url": "http://www.panoramio.com/user/39160"}
,
{"item_id": 625805, "item_title": "Primosten blue(s)", "item_url": "http://www.panoramio.com/photo/625805", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/625805.jpg", "longitude": 15.932236, "latitude": 43.575168, "width": 500, "height": 334, "upload_date": "30 January 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 247704, "item_title": "Paris in the night", "item_url": "http://www.panoramio.com/photo/247704", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/247704.jpg", "longitude": 2.294512, "latitude": 48.858052, "width": 327, "height": 500, "upload_date": "27 December 2006", "owner_id": 51517, "owner_name": "threshold2000", "owner_url": "http://www.panoramio.com/user/51517"}
,
{"item_id": 73888, "item_title": "Fitz-Roy", "item_url": "http://www.panoramio.com/photo/73888", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/73888.jpg", "longitude": -72.987328, "latitude": -49.277885, "width": 500, "height": 204, "upload_date": "01 November 2006", "owner_id": 7372, "owner_name": "vuillet", "owner_url": "http://www.panoramio.com/user/7372"}
,
{"item_id": 6065568, "item_title": "Amigos para siempre Paris-Francia", "item_url": "http://www.panoramio.com/photo/6065568", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6065568.jpg", "longitude": 2.288697, "latitude": 48.861906, "width": 375, "height": 500, "upload_date": "22 November 2007", "owner_id": 83865, "owner_name": "Epi F.Villanueva", "owner_url": "http://www.panoramio.com/user/83865"}
,
{"item_id": 9643938, "item_title": "Occhio indiscreto ... sulla cittÃ  ... illuminata ", "item_url": "http://www.panoramio.com/photo/9643938", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/9643938.jpg", "longitude": 13.818569, "latitude": 45.641329, "width": 500, "height": 449, "upload_date": "23 April 2008", "owner_id": 1121720, "owner_name": "â–¬  Mauro Antonini â–¬", "owner_url": "http://www.panoramio.com/user/1121720"}
,
{"item_id": 532643, "item_title": "Icecarved granite at HerfÃ¸l", "item_url": "http://www.panoramio.com/photo/532643", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/532643.jpg", "longitude": 11.054649, "latitude": 58.986512, "width": 375, "height": 500, "upload_date": "22 January 2007", "owner_id": 39160, "owner_name": "Snemann", "owner_url": "http://www.panoramio.com/user/39160"}
,
{"item_id": 112298, "item_title": "paris06_004IR", "item_url": "http://www.panoramio.com/photo/112298", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/112298.jpg", "longitude": 2.343779, "latitude": 48.887746, "width": 500, "height": 500, "upload_date": "11 December 2006", "owner_id": 17599, "owner_name": "Dmitry Andreev", "owner_url": "http://www.panoramio.com/user/17599"}
,
{"item_id": 525997, "item_title": "Grand Canyon Desert View", "item_url": "http://www.panoramio.com/photo/525997", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/525997.jpg", "longitude": -111.824341, "latitude": 36.043547, "width": 500, "height": 333, "upload_date": "22 January 2007", "owner_id": 85489, "owner_name": "Bruce MacIver", "owner_url": "http://www.panoramio.com/user/85489"}
,
{"item_id": 2972849, "item_title": "Donadea Forest", "item_url": "http://www.panoramio.com/photo/2972849", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2972849.jpg", "longitude": -6.743374, "latitude": 53.346555, "width": 500, "height": 377, "upload_date": "27 June 2007", "owner_id": 137785, "owner_name": "W@Z", "owner_url": "http://www.panoramio.com/user/137785"}
,
{"item_id": 1175992, "item_title": "Mt. Roberts Tram, Juneau, Alaska", "item_url": "http://www.panoramio.com/photo/1175992", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1175992.jpg", "longitude": -134.391643, "latitude": 58.294679, "width": 500, "height": 347, "upload_date": "05 March 2007", "owner_id": 52440, "owner_name": "Hank Waxman", "owner_url": "http://www.panoramio.com/user/52440"}
,
{"item_id": 462521, "item_title": "Fontaine de Trevi", "item_url": "http://www.panoramio.com/photo/462521", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/462521.jpg", "longitude": 12.483280, "latitude": 41.901047, "width": 500, "height": 333, "upload_date": "17 January 2007", "owner_id": 78506, "owner_name": "Philippe Stoop", "owner_url": "http://www.panoramio.com/user/78506"}
,
{"item_id": 848316, "item_title": "Malyovitsa, Rila", "item_url": "http://www.panoramio.com/photo/848316", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/848316.jpg", "longitude": 23.383627, "latitude": 42.201517, "width": 500, "height": 357, "upload_date": "17 February 2007", "owner_id": 16880, "owner_name": "evgenidinev.com", "owner_url": "http://www.panoramio.com/user/16880"}
,
{"item_id": 459453, "item_title": "bandaibashi3", "item_url": "http://www.panoramio.com/photo/459453", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/459453.jpg", "longitude": 139.055586, "latitude": 37.920436, "width": 500, "height": 382, "upload_date": "16 January 2007", "owner_id": 86411, "owner_name": "ä¸­æ‘è„©-Osamu nakamura", "owner_url": "http://www.panoramio.com/user/86411"}
,
{"item_id": 968639, "item_title": "å¼ æ°¸å¯Œ é»„å±±é£Žå…‰06 Huangshan", "item_url": "http://www.panoramio.com/photo/968639", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/968639.jpg", "longitude": 118.166199, "latitude": 30.105633, "width": 348, "height": 500, "upload_date": "23 February 2007", "owner_id": 203011, "owner_name": "SammyZhang", "owner_url": "http://www.panoramio.com/user/203011"}
,
{"item_id": 97731, "item_title": "Kaimondake", "item_url": "http://www.panoramio.com/photo/97731", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/97731.jpg", "longitude": 130.652161, "latitude": 31.247443, "width": 500, "height": 212, "upload_date": "09 December 2006", "owner_id": 11781, "owner_name": "ANDRE GARDELLA", "owner_url": "http://www.panoramio.com/user/11781"}
,
{"item_id": 2859205, "item_title": "Lundy Lake Sunset", "item_url": "http://www.panoramio.com/photo/2859205", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2859205.jpg", "longitude": -119.221230, "latitude": 38.031597, "width": 400, "height": 500, "upload_date": "21 June 2007", "owner_id": 376395, "owner_name": "JeffSullivan (www.MyPhotoGuides.com)", "owner_url": "http://www.panoramio.com/user/376395"}
,
{"item_id": 309190, "item_title": "Populonia, sunset", "item_url": "http://www.panoramio.com/photo/309190", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/309190.jpg", "longitude": 10.490313, "latitude": 42.989581, "width": 308, "height": 500, "upload_date": "05 January 2007", "owner_id": 65478, "owner_name": "Gabriele Marabotti", "owner_url": "http://www.panoramio.com/user/65478"}
,
{"item_id": 54982, "item_title": "Baia dos Porcos", "item_url": "http://www.panoramio.com/photo/54982", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/54982.jpg", "longitude": -32.443485, "latitude": -3.855177, "width": 500, "height": 333, "upload_date": "30 September 2006", "owner_id": 7562, "owner_name": "Marcelo E. Salgado", "owner_url": "http://www.panoramio.com/user/7562"}
,
{"item_id": 58316, "item_title": "800_Schafberg03", "item_url": "http://www.panoramio.com/photo/58316", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/58316.jpg", "longitude": 13.429413, "latitude": 47.775445, "width": 500, "height": 316, "upload_date": "07 October 2006", "owner_id": 8060, "owner_name": "Norbert MAIER", "owner_url": "http://www.panoramio.com/user/8060"}
,
{"item_id": 423887, "item_title": "Dunes near Zagora", "item_url": "http://www.panoramio.com/photo/423887", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/423887.jpg", "longitude": -5.872707, "latitude": 30.280713, "width": 500, "height": 333, "upload_date": "14 January 2007", "owner_id": 78506, "owner_name": "Philippe Stoop", "owner_url": "http://www.panoramio.com/user/78506"}
,
{"item_id": 4136144, "item_title": "Ã‰gi jel", "item_url": "http://www.panoramio.com/photo/4136144", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4136144.jpg", "longitude": 17.564564, "latitude": 47.633181, "width": 500, "height": 376, "upload_date": "23 August 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 6620113, "item_title": "Winterlandschaft - Winter Scenery - Emmental", "item_url": "http://www.panoramio.com/photo/6620113", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6620113.jpg", "longitude": 7.787676, "latitude": 47.055856, "width": 500, "height": 374, "upload_date": "22 December 2007", "owner_id": 635422, "owner_name": "â™« Swissmay", "owner_url": "http://www.panoramio.com/user/635422"}
,
{"item_id": 2702545, "item_title": "Church at Oia, Santorini", "item_url": "http://www.panoramio.com/photo/2702545", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2702545.jpg", "longitude": 25.376015, "latitude": 36.461330, "width": 375, "height": 500, "upload_date": "11 June 2007", "owner_id": 555551, "owner_name": "Marilyn Whiteley", "owner_url": "http://www.panoramio.com/user/555551"}
,
{"item_id": 416472, "item_title": "Ice Crystal Clouds", "item_url": "http://www.panoramio.com/photo/416472", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/416472.jpg", "longitude": -105.650969, "latitude": 40.294126, "width": 500, "height": 374, "upload_date": "13 January 2007", "owner_id": 87752, "owner_name": "Richard Ryer", "owner_url": "http://www.panoramio.com/user/87752"}
,
{"item_id": 6080988, "item_title": "Zion Tree (HDR)", "item_url": "http://www.panoramio.com/photo/6080988", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/6080988.jpg", "longitude": -112.946116, "latitude": 37.213331, "width": 500, "height": 333, "upload_date": "23 November 2007", "owner_id": 17488, "owner_name": "John Gillett", "owner_url": "http://www.panoramio.com/user/17488"}
,
{"item_id": 2321382, "item_title": "Old Wreck at Bannack", "item_url": "http://www.panoramio.com/photo/2321382", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/2321382.jpg", "longitude": -112.997518, "latitude": 45.162614, "width": 500, "height": 375, "upload_date": "21 May 2007", "owner_id": 71099, "owner_name": "Eve in Montana", "owner_url": "http://www.panoramio.com/user/71099"}
,
{"item_id": 122858, "item_title": "Antelope Canyon - Page, Arizona", "item_url": "http://www.panoramio.com/photo/122858", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/122858.jpg", "longitude": -111.399908, "latitude": 36.887447, "width": 332, "height": 500, "upload_date": "12 December 2006", "owner_id": 20332, "owner_name": "RJ", "owner_url": "http://www.panoramio.com/user/20332"}
,
{"item_id": 4445933, "item_title": "Tavi alkony", "item_url": "http://www.panoramio.com/photo/4445933", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/4445933.jpg", "longitude": 17.465172, "latitude": 47.864486, "width": 500, "height": 350, "upload_date": "06 September 2007", "owner_id": 109117, "owner_name": "Busa PÃ©ter", "owner_url": "http://www.panoramio.com/user/109117"}
,
{"item_id": 1238515, "item_title": "EDEN", "item_url": "http://www.panoramio.com/photo/1238515", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/1238515.jpg", "longitude": -83.677711, "latitude": 22.661542, "width": 500, "height": 345, "upload_date": "09 March 2007", "owner_id": 232099, "owner_name": "mabut", "owner_url": "http://www.panoramio.com/user/232099"}
,
{"item_id": 398585, "item_title": "Near Glittertind", "item_url": "http://www.panoramio.com/photo/398585", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/398585.jpg", "longitude": 8.489170, "latitude": 61.621820, "width": 500, "height": 333, "upload_date": "12 January 2007", "owner_id": 78506, "owner_name": "Philippe Stoop", "owner_url": "http://www.panoramio.com/user/78506"}
,
{"item_id": 10240311, "item_title": "two planes", "item_url": "http://www.panoramio.com/photo/10240311", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/10240311.jpg", "longitude": 20.306683, "latitude": 49.750107, "width": 332, "height": 500, "upload_date": "15 May 2008", "owner_id": 454219, "owner_name": "Rafal Ociepka", "owner_url": "http://www.panoramio.com/user/454219"}
,
{"item_id": 7593894, "item_title": "æ¡‚æž—åèƒœç™¾æ™¯â€”â€”é‡é¾™æ²³", "item_url": "http://www.panoramio.com/photo/7593894", "item_file_url": "http://mw2.google.com/mw-panoramio/photos/medium/7593894.jpg", "longitude": 110.424957, "latitude": 24.781747, "width": 500, "height": 375, "upload_date": "04 February 2008", "owner_id": 161470, "owner_name": "John Su", "owner_url": "http://www.panoramio.com/user/161470"}
]};
	var markers = [];
	
	infowindow = new InfoBox({
		alignBottom: true,
		pixelOffset: new google.maps.Size(-135, -50),
		boxStyle: {
			background: "#ffffff",
			width: "250px",
			padding: "5px",
			boxShadow: "0 0 10px rgba(0,0,0,0.5)",
			
		},
		boxClass : "infobox",
		closeBoxURL : "<?php echo $base;?>img/map-markers/close.png"
		
	});
	
	// Close infowindow if change zoom
	google.maps.event.addListener(map, 'zoom_changed', function() {
		infowindow.close();
	});
	
	
 

for (var i = 0; i < data.items.length ; i++) {
  var latLng = new google.maps.LatLng(data.items[i].latitude,
      data.items[i].longitude);
  var marker = new google.maps.Marker({
  		'position': latLng,
  		icon : "<?php echo $base;?>img/map-markers/red-w-shadow.png",
  		shape: {
	  		coord:[0,0,30,0,17,47],
	  		type: 'poly'	
  		},
  		
  		// content that will appear inside the infowindow
  		//closeBtn: '<span id="remove" class="remove"><i class="icon-remove icon-white"></i></span>',
   		content: '<div class="map-window"><h4 class="title-light">' + data.items[i].item_title + '</h4><div class="img"><img src="'+data.items[i].item_file_url +'"/></div><hr><a class="btn btn-warning btn-small" href="'+ data.items[i].item_file_url +'">more info</a></div>'
  });
   
   
  google.maps.event.addListener(marker, "click", function(){
  	 

  	
	map.panTo(this.getPosition());
	
	infowindow.setContent(this.content);	
	
	infowindow.open(map, this);
	
	var moveMap = function moveMap() {
		map.panBy(0, -100);
    };
	
	moveMap(); 
	
  });
  	
  markers.push(marker);
  
  

  
  
};


 // var infoWindow =  new google.maps.InfoWindow(  
//	  console.log(this) 
//  });
 
 


	var clusterStyles = {
		 styles: [{
			 
			 url: "<?php echo $base;?>img/map-markers/sml-red-cluster.png",
			 width: 40,
			 height:39,
			 },
			 
			 {
			 
			 url: "<?php echo $base;?>img/map-markers/md-red-cluster.png",
			 width: 55,
			 height:54,
			 },
			 
			 {
			 
			 url: "<?php echo $base;?>img/map-markers/lg-red-cluster.png",
			 width: 70,
			 height:69,
			 },
			 
			 
			 ]
	};
    var cluster = new MarkerClusterer(map, markers, clusterStyles ) ;
	var styles = [
  {
    "featureType": "water",
    "stylers": [
      { "color": "#aeefff" }
    ]
  },{
    "featureType": "road",
    "elementType": "labels.icon",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "featureType": "transit",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "featureType": "administrative",
    "elementType": "geometry",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "featureType": "landscape",
    "stylers": [
      { "color": "#faf7e3" }
    ]
  },{
    "featureType": "poi",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "featureType": "administrative.country",
    "elementType": "geometry",
    "stylers": [
      { "visibility": "on" },
      { "color": "#3e3d39" },
      { "weight": 1.2 }
    ]
  },{
    "featureType": "administrative.province",
    "elementType": "geometry",
    "stylers": [
      { "visibility": "on" },
      { "color": "#343333" },
      { "weight": 0.6 }
    ]
  },{
    "featureType": "road",
    "elementType": "geometry.stroke",
    "stylers": [
      { "color": "#64625e" },
      { "weight": 0.5 }
    ]
  }
];

	map.setOptions({styles: styles});
	
	
  };
  
 
  google.maps.event.addDomListener(window, 'load', initialize);
</script>
	

</div>

<?php $this->load->view('footer_admin'); ?>

