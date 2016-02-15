<?php $this->load->view('header_admin'); ?>	
        
    <div class="homebg main-map">


  <div class="container-fluid">
  <div class="wrapper">
  
<div id="map-wrapper">
  <button class="btn btn-warning" data-toggle="collapse" href="#map-filter">Filter</button>
  <button class="btn btn-warning" id="map-zoom-in"><i class="icon-white icon-plus"></i></button>
  <button class="btn btn-warning" id="map-zoom-out"><i class="icon-white icon-minus"></i></button>
  
  <div id="map-filter" class="collapse">
  	<div class="map-inner">
  		<h5 class="title">SELECT THE CATEGORIES YOU WISH TO DISPLAY<span href="#map-filter" data-toggle="collapse" class="collapse-basic pull-right"></span></h5>  	
  		
  		<ul class="inline clearfix" >
  		
  		<li><span class="btn btn-warning pull-left"><i class="sprite-white sprite-half sprite-industry"></i></span><input type="checkbox" data-cat="property"  ><div>Properties	</div>		  	</li>
		<li><span class="btn btn-warning pull-left"><i class="sprite-white sprite-half sprite-industry"></i></span><input type="checkbox" data-cat="benefit"  ><div>S1 Benefits	 </div> 	</li>
		<li><span class="btn btn-warning pull-left"><i class="sprite-white sprite-half sprite-industry"></i></span><input type="checkbox" data-cat="charity"  ><div>Charities</div>			  	</li>
		<li><span class="btn btn-warning pull-left"><i class="sprite-white sprite-half sprite-industry"></i></span><input type="checkbox" data-cat="education"    ><div>Education		</div>	  	</li>
		<li><span class="btn btn-warning pull-left"><i class="sprite-white sprite-half sprite-industry"></i></span><input type="checkbox" data-cat="youngworker"    ><div>Young Workers Support	</div>	  	</li>
		<li><span class="btn btn-warning pull-left"><i class="sprite-white sprite-half sprite-industry"></i></span><input type="checkbox" data-cat="hsnetwork"    ><div>Health and Safety Network	</div>		  	</li>
		
  	</ul>
  		
  	</div>
  </div>
   <!--h3> Property map</h3-->
  <!-- Begin GMAP-->
  
   <div id="googleMap">
   
   	
 
   </div>
  <!--End GMAP -->   
  
  
</div>
  
  
  <!-- Banner for Real Estate-->
  
 <!-- <div class="row-fluid">
   <div class="span12">
    <div id="center-leaderboard" class="text-center">
     <a target="_new" href="http://www.premieragent.ca/"><img alt="premier agent, Brian Jeronimo" src="<?php echo $base;?>img/realestate.jpg" /> </a>
    </div>
   </div>
 </div>-->
  
  <!-- End real estate banner -->
  
 <!-- begin property listing--> 
 
 <!--<div id="properties-wrapper">
 
 <div class="row-fluid">
   <div class="span12">
     <h3>Property Listing</h3>
   </div>
 </div>
 <div  class="row-fluid">

 <div id="property-listing" class="span12">
    
      <ul class="inline"  >
      
      <li  id="prop70">
                  <h4>      L Tower

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop70.png" /></span>
                   <span class="prop-desc">               


<P><strong>Developer:</strong> Castle Point - Cityzen Development - Fernbrook Homes			 </p>
<P><strong>Location:</strong> Toronto -  Yonge St and Front St</p>
<P><strong>Number of Units:</strong> 600								 </p>

  </span>
              </li>
              
              <li  id="prop71">
                  <h4>    Pier 27

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop71.png" /></span>
                   <span class="prop-desc">               


<P><strong>Developer:</strong>   Cityzen Development Group - Fernbrook Homes			 </p>
<P><strong>Location:</strong> Toronto -  25 Queens Quay E</p>
<P><strong>Number of Units:</strong> 303							 </p>

<P><strong>Occupancy:</strong> Fall/Winter 2013								 </p>
  </span>
              </li>
 
               <li id="prop1"><h4>Minto Water Garden</h4>
 <span class="prop-img"><img src="<?php echo $base;?>img/map/prop1.png" /></span>
 <span class="prop-desc">
<p><strong>Developer:</strong> Minto</p>
<p><strong>Location:</strong> Vaughan - Yonge St &amp Arnold Ave</p>
<p><strong>Number Of Units:</strong> 218</p>
<p><strong>Average Price Per Sq. Ft.: </strong> $540</p>
</span>
 </li>
 				<li   id="prop2"><h4>Love Condos</h4>
 <span class="prop-img"><img src="<?php echo $base;?>img/map/prop2.png" /></span>
 <span class="prop-desc">

<p><strong>Developer:</strong> Gemterra</p>
<p><strong>Location:</strong> Toronto - Bonis Ave (Sheppard Ave E &amp Kennedy Rd) </p>
<p><strong>Number Of Units:</strong> 308</p>
<p><strong>Average Price Per Sq. Ft.: </strong> $505</p>
<p><strong>Occupancy:</strong> Fall 2014</p>
</span>
 </li>
 			   
 
    
 
               <li  id="prop3">
<h4>Fairground Lofts in Old Woodbridge</h4>
 <span class="prop-img"><img src="<?php echo $base;?>img/map/prop3.png" /></span>
 <span class="prop-desc">
<p><strong>Developer:</strong> Wycliffe Homes</p>
<p><strong>Location:</strong> Vaughan  - Kipling Ave (Kipling Ave &amp Woodbridge Ave)</p>
<p><strong>Number Of Units:</strong> 67</p>
<p><strong>Average Price Per Sq. Ft.: </strong> $434</p>
<p><strong>Occupancy: </strong>Winter 2013</p>
</span>
 </li>
               <li id="prop4"><h4>Portrait Condos</h4>
 <span class="prop-img"><img src="<?php echo $base;?>img/map/prop4.png" /></span>
 <span class="prop-desc">
<p><strong>Developer:</strong>Norstar Group of Companies</p>
<p><strong>Location:</strong> Toronto - 701 Sheppard Ave W (Sheppard Ave W & Bathurst)</p>
<p><strong>Number Of Units:</strong> 188</p>
<p><strong>Average Price Per Sq. Ft.: </strong> $545</p>
<p><strong>Occupancy:</strong> Summer 2013</p>
</span>
 </li>
 			 

 
      
 
               <li  id="prop5">
<h4> EI8HTY8 Condos</h4>
 <span class="prop-img"><img src="<?php echo $base;?>img/map/prop5.png" /></span>
 <span class="prop-desc">

<p><strong>Developer:</strong> Minto</p>
<p><strong>Location:</strong> Toronto - 88 Sheppard Ave E (Yonge & Sheppard Ave E) </p>
<p><strong>Number of Units:</strong> 371</p>
<p><strong>Average Price per sq. ft. :</strong> $680</p>
<p><strong>Occupancy:</strong> 2015</p>
</span>
 </li>
               <li  id="prop6">
                  <h4>133 Hazelton</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop6.png" /></span>
                   <span class="prop-desc">
                  
                  <p><strong>Developer:</strong> Mizrahi Developments</p>
                  <p><strong>Location:</strong> Toronto – 133 Hazelton Ave</p>
                  <p><strong>Number of Units:</strong> 37</p>
                  <p><strong>Average Price per sq. ft.:</strong> $1,350</p>
                  <p><strong>Occupancy:</strong> Winter 2014</p>
                  </span>
              </li>
			   <li  id="prop7">
                  <h4>Perspective Condos</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop7.png" /></span>
                   <span class="prop-desc">
                  
                             
                            <p><strong> Developer:</strong> Pianosi Development Corp</p>
                             <p><strong>Location:</strong> Toronto – Scarlett Rd</p>
                            <p><strong> Number of Units:</strong> 199</p>
                            <p><strong> Average Price per sq. ft.:</strong> $490</p>
                             <p><strong>Occupancy:</strong> Summer 2014</p>
                  </span>
              </li>
               <li  id="prop8">
                  <h4>Upper Beach Townes</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop8.png" /></span>
                   <span class="prop-desc">
                  
                             
                      
                        <p><strong>Developer:</strong> Solotex Corp</p>
                        <p><strong>Location:</strong> Toronto – Gerrard St E & Main St</p>
                        <p><strong>Number of Units:</strong> 32</p>
                        <p><strong>Average Price per sq. ft.:</strong> $450</p>
                        <p><strong>Occupancy:</strong> Winter 2013</p>
 
                             
                             
                  </span>
              </li>
              <li  id="prop9">
                  <h4>Carmelina Condos</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop9.png" /></span>
                   <span class="prop-desc">
                  
                        
                             <p><strong>Developer:</strong> Fusioncorp & Tre Memovia Inc</p>
                            <p><strong> Location:</strong> Toronto – 2057 Danforth Ave (Woodbine Ave & Danforth)</p>
                            <p><strong> Number of Units:</strong> 141</p>
                            <p><strong> Average Price per sq. ft.:</strong> $620</p>
                           <p><strong>  Occupancy:</strong> Spring 2014 </p>
                                                          
                  </span>
              </li>
             <li  id="prop10">
                  <h4>Merton Yonge Condos
</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop10.png" /></span>
                   <span class="prop-desc">
                  
                        
                          <p><strong> Developer:</strong> Cresford Development</p>
                          <p><strong> Location:</strong> Toronto – Yonge & Merton St</p>
                          
                          <p><strong> Average Price per sq. ft.:</strong> $620</p>
                          <p><strong> Occupancy:</strong> Winter 2013</p>
                                                           
                  </span>
              </li>
               <li  id="prop11">
                  <h4>Terrace on Danforth
</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop11.png" /></span>
                   <span class="prop-desc">
                  
                        
                          <p><strong>Developer:</strong> Liberty Develoments</p>
                          <p><strong>Location:</strong> Toronto – 3520 Danforth Ave (Danforth & Warden)</p>
                          <p><strong>Number of Units:</strong> 95</p>
                          <p><strong>Average Price per sq. ft.:</strong> $430</p>
                          <p><strong>Occupancy:</strong> Winter 2013    </p>                                                       
                  </span>
              </li>
              <li  id="prop12">
                  <h4>Ivory on Adelaide
</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop12.png" /></span>
                   <span class="prop-desc">
                  
                        
                          
                        <p><strong> Developer:</strong>Plaza										  </p>
                        <p><strong> Location:</strong> Toronto – 406 Adelaide St E (Adelaide St E & Sherbourne)</p>
                        <p><strong> Number of Units:</strong> 272											  </p>
                        <p><strong> Average Price per sq. ft.:</strong> $470									  </p>
                        <p><strong> Occupancy:</strong> Spring 2014                                            </p>   
                  </span>
              </li>
              <li  id="prop13">
                  <h4>210 Simcoe
</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop13.png" /></span>
                   <span class="prop-desc">
                  
                        
                          
                       
                          <p><strong>   Developer:</strong>Joint Venture, Sorbara Development & Diamondcorp</p>
                          <p><strong>   Location:</strong> Toronto – 210 Simcoe St (Dundas & University)				  </p>
                          <p><strong>   Number of Units:</strong> 294												  </p>
                          <p><strong>   Average Price per sq. ft.:</strong> $615										  </p>
                          <p><strong>   Occupancy:</strong> Summer 2015                								  </p>
                    </span>
              </li>
			   <li  id="prop14">
                  <h4>Two Old Mill
</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop14.png" /></span>
                   <span class="prop-desc">
                  
                        
                          
                       
                        
                         <p><strong> Developer:</strong> Tridel									  </p>
                         <p><strong> Location:</strong> Toronto – 2 Old Mill Dr (Bloor St W & Jane)</p>
                         <p><strong> Number of Units:</strong> 217								  </p>
                         <p><strong> Average Price per sq. ft.:</strong> $565					  </p>
                         <p><strong> Occupancy:</strong> Summer 2014								  </p>
                    </span>
              </li>
			   <li  id="prop15">
                  <h4>One Old Mill
</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop15.png" /></span>
                   <span class="prop-desc">               
                        
                          
                       
                        
                           <p><strong>Developer:</strong> Tridel									 </p>
                           <p><strong>Location:</strong> Toronto – 1 Old Mill ( Bloor St W & Jane)</p>
                         
                           <p><strong>Average Price per sq. ft.:</strong> $600					 </p>
                           <p><strong>Occupancy:</strong> Spring 2014							 </p>
                    </span>
              </li>
			  <li  id="prop16">
                  <h4>Tableau Condos
</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop16.png" /></span>
                   <span class="prop-desc">               
                        
                          
                       
                        
                      
                             <p><strong>Developer:</strong> Urban Capital Property Group, ALIT Developments & Malibu Investments</p>
                             <p><strong>Location:</strong> Toronto – 117 Peter St (Peter & Richmond)							   </p>
                             <p><strong>Number of Units:</strong> 415														   </p>
                             <p><strong>Average Price per sq. ft.:</strong> $680												   </p>
                             <p><strong>Occupancy:</strong> Summer 2014														   </p>
                           
                           
                    </span>
              </li>
			  <li  id="prop17">
                  <h4>Abacus Lofts
</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop17.png" /></span>
                   <span class="prop-desc">               
                        
                                                
                       <p><strong>Developer: </strong> DAZ											  </p>
                       <p><strong>Location:</strong> Toronto – 1245 Dundas St W (Dundas and Dovercourt)</p>
                       <p><strong>Number of Units:</strong> 39										  </p>
                       <p><strong>Average Price per sq. ft.:</strong> $620							  </p>
                       <p><strong>Occupancy:</strong> Summer 2014									  </p>
                           
                           
                    </span>
              </li>
               <li  id="prop18">
                  <h4>               Studio on Ricmond
</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop18.png" /></span>
                   <span class="prop-desc">               
                        
                                                
        
                         <p><strong>Developer:</strong> Aspen Ridge Homes				 </p>
                         <p><strong>Location:</strong> Toronto – Richmond St W & Duncan St</p>
                         <p><strong>Number of Units:</strong> 337						 </p>
                         <p><strong>Average Price per sq. ft.:</strong> $580				 </p>
                         <p><strong>Occupancy:</strong> Winter 2013                       </p>    
                           
                    </span>
              </li>
			  <li  id="prop19">
                  <h4>                12 Degrees</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop19.png" /></span>
                   <span class="prop-desc">               
                        
                                                
        
                  
                                <p><strong>Developer:</strong> BSaR Group of Companies				   </p>
                                <p><strong>Location:</strong> Toronto – 15 Beverley St (Queen & John St)</p>
                                <p><strong>Number of Units:</strong> 90								   </p>
                                <p><strong>Average Price per sq. ft.:</strong> $680					   </p>
                                <p><strong>Occupancy:</strong> Winter 2013							   </p>
                           
                    </span>
              </li>
			  <li  id="prop20">
                  <h4>                Gooderham Condos</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop20.png" /></span>
                   <span class="prop-desc">               
                        
                                                
        
                  
                             <p><strong>Developer:</strong> Distillery SE Development	 </p>
                             <p><strong>Location:</strong> Toronto –  Mill St & Trinity St</p>
                             <p><strong>Number of Units:</strong> 328					 </p>
                             <p><strong>Average Price per sq. ft.:</strong> $770			 </p>
                             <p><strong>Occupancy:</strong> Summer 2013                   </p>        
                    </span>
              </li>
			  <li  id="prop21">
                  <h4>                King Plus Condos</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop21.png" /></span>
                   <span class="prop-desc">               
                        
                                                
        
                  
                       
                             <p><strong>Developer:</strong> Terracomm Development & Plus Development		  </p>
                             <p><strong>Location:</strong> Toronto – 251 King St E (King St E & Sherbourne)</p>
                             <p><strong>Number of Units:</strong> 132									  </p>
                             <p><strong>Average Price per sq. ft.:</strong> $570							  </p>
                             <p><strong>Occupancy:</strong> Summer 2013       							  </p>
                    </span>
              </li>

			   <li  id="prop22">
                  <h4>             Sync Lofts</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop22.png" /></span>
                   <span class="prop-desc">               
                        
                                                
        
                  
                       
                            <p><strong> Developer:</strong> Streetcar Developments  </p>
                            <p><strong> Location:</strong> Toronto –  630 Queen St E</p>
                            <p><strong> Number of Units:</strong> 99				   </p>
                            <p><strong> Average Price per sq. ft.:</strong> $600	   </p>
                            <p><strong> Occupancy:</strong> Summer 2013			   </p>
                    </span>
              </li>
			   <li  id="prop23">
                  <h4>            Aura at College Park</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop23.png" /></span>
                   <span class="prop-desc">               
                        
                                                
        
                  
                       
                             
                        <p><strong>Developer:</strong> Canderel						   </p>
                        <p><strong>Location:</strong> Toronto –  Yonge St & Gerrard St E</p>
                        <p><strong>Number of Units:</strong> 985						   </p>
                        <p><strong>Average Price per sq. ft.:</strong> $1220			   </p>
                        <p><strong>Occupancy:</strong> Summer 2014					   </p>
                    </span>
              </li>
			   <li  id="prop24">
                  <h4>            Volta Lofts
</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop24.png" /></span>
                   <span class="prop-desc">               
                        
                                                
        
                  
                       
                             
                        <p><strong>Developer:</strong> Terra Firma Homes		  </p>
                        <p><strong>Location:</strong> Toronto –  588 Annette St</p>
                        <p><strong>Number of Units:</strong> 19				  </p>
                        <p><strong>Average Price per sq. ft.:</strong> $640	  </p>
                        <p><strong>Occupancy:</strong> Summer 2013			  </p>
                    </span>
              </li>
			   <li  id="prop25">
                  <h4>           707 Lofts
</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop25.png" /></span>
                   <span class="prop-desc">               
                        
                                                 
                       <p><strong> Developer:</strong> Enirox Group				 </p>
                       <p><strong> Location:</strong> Toronto –  707 Dovercourt Rd</p>
                       <p><strong> Number of Units:</strong> 77					 </p>
                       <p><strong> Average Price per sq. ft.:</strong> $680		 </p>
                       <p><strong> Occupancy:</strong> Winter 2013                </p>  
       </span>
              </li>
			    <li  id="prop26">
                  <h4>           The address @ High Park
</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop26.png" /></span>
                   <span class="prop-desc">               
                        
                                                 
                      <p><strong>Developer:</strong> Chestnut Hill Homes				</p>
                      <p><strong>Location:</strong> Toronto –  Bloor St W & Indian Rd</p>
                      <p><strong>Number of Units:</strong> 108						</p>
                      <p><strong>Average Price per sq. ft.:</strong> $615			</p>
                      <p><strong>Occupancy:</strong> Summer 2013						</p>
       </span>
              </li>
              <li  id="prop27">
                  <h4>             Showcase Lofts
</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop27.png" /></span>
                   <span class="prop-desc">               
                        
                                                 
                   
                         <p><strong>Developer:</strong> Aragon Properties LTD   </p>
                         <p><strong>Location: </strong> Toronto –  88 Colgate Ave</p>
                         <p><strong>Number of Units: </strong> 230			   </p>
                         <p><strong>Average Price per sq. ft.: </strong> $565	   </p>
                         <p><strong>Occupancy:</strong> Spring 2014			   </p>
       </span>
              </li>

			   <li  id="prop28">
                  <h4>            River City Phase 1

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop28.png" /></span>
                   <span class="prop-desc">               
                        
                                                 
                   
                        <p><strong>Developer:</strong> Urban Captial Property Group & Waterfront Toronto</p>
                        <p><strong>Location:</strong> Toronto –  King St E & River St				   </p>
                        <p><strong>Number of Units:</strong> 345										   </p>
                        <p><strong>Average Price per sq. ft.:</strong> $550							   </p>
                        <p><strong>Occupancy:</strong> Winter 2013									   </p>
       </span>
              </li>
			  <li  id="prop29">
                  <h4>             Riverhouse Condos


</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop29.png" /></span>
                   <span class="prop-desc">               
                        
                                                 
                   
                      <p><strong> Developer:</strong> Lanterra Developments						  </p>
                      <p><strong> Location:</strong> Etobicoke – 21 Old Mill Rd (Bloor St W & Jane)</p>
                      <p><strong> Number of Units:</strong> 101									  </p>
                      <p><strong> Average Price per sq. ft.:</strong> $625						  </p>
                      <p><strong> Occupancy:</strong> Winter 2013								  </p>
       </span>
              </li>
               <li  id="prop30">
                  <h4>             Milan Condos


</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop30.png" /></span>
                   <span class="prop-desc">               
                        
                                                 
                   
                     
                      <p><strong>Developer:</strong> The Conservatory Group </p>
                      <p><strong>Location:</strong> Toronto -  825 Church St</p>
                      <p><strong>Number of Units:</strong> 322			   </p>
                      <p><strong>Average Price per sq. ft. :</strong> $680  </p>
                      <p><strong>Occupancy:</strong> Spring 2014		   </p>
                   </span>
              </li>
			  <li  id="prop31">
                  <h4>          Kew Beach Living


</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop31.png" /></span>
                   <span class="prop-desc">               
                        
                      
                            <p><strong> Developer:</strong> Worsley Urban Partners		   </p>
                            <p><strong> Location:</strong> Toronto -  Lakeshore & Queen St E</p>
                            <p><strong> Number of Units:</strong>  58					   </p>
                            <p><strong> Average Price per sq. ft. :</strong> $615		   </p>
                            <p><strong> Occupancy:</strong> Summer 2013					   </p>
                   </span>
              </li>

			  <li  id="prop32">
                  <h4>          Exhibit Residence


</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop32.png" /></span>
                   <span class="prop-desc">               
                        
                      
                             
                         <p><strong>Developer:</strong> Bazis Inc, Metropia Urban Landscapes & Plaza</p>
                         <p><strong>Location:</strong> Toronto -  200 Bloor St W					   </p>
                         <p><strong>Number of Units: </strong> 200								   </p>
                         <p><strong>Average Price per sq. ft. :</strong> $750					   </p>
                         <p><strong>Occupancy:</strong> Summer 2014								   </p>
                   </span>
              </li>
              <li  id="prop33">
                  <h4>          Cornerstone Terrace Boutique Lofts

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop33.png" /></span>
                   <span class="prop-desc">               
                        
                      
                             
                       
<p><strong>Developer:</strong> Wilkinson Construction Services		</p>
<p><strong>Location:</strong> Toronto – 323 Kingston Rd				</p>
<p><strong>Number of Units:</strong> 8								</p>
<p><strong>Average Price per sq. ft.:</strong> $545					</p>
<p><strong>Occupancy:</strong> Spring 2013 (Woodbine Ave& Kingston)  </p>               

  </span>
              </li>


<li  id="prop34">
                  <h4>          Cranbrooke Village

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop34.png" /></span>
                   <span class="prop-desc">               
                        
                      
                             
                       

<p><strong>Developer:</strong> Options for Homes				  </p>
<p><strong>Location:</strong> Toronto – Bathurst & Lawrence Ave</p>
<p><strong>Number of Units:</strong> 341						  </p>
<p><strong>Average Price per sq. ft.:</strong> $325			  </p>
<p><strong>Occupancy:</strong> Spring 2014					  </p>
            

  </span>
              </li>
              
		      <li  id="prop35">
                  <h4>          3018 Yonge Condos

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop35.png" /></span>
                   <span class="prop-desc">               
                     
<p><strong>Developer:</strong> Lanterra Developments						  </p>
<p><strong>Location:</strong> Toronto – 3018 Yonge St (Yonge St & Lawrence)</p>
<p><strong>Number of Units:</strong>  179								  </p>
<p><strong>Average Price per sq. ft.:</strong> $690						  </p>
<p><strong>Occupancy:</strong> Summer 2015            					  </p>

  </span>
              </li>
              
              <li  id="prop36">
                  <h4>         Treviso Phase 2

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop36.png" /></span>
                   <span class="prop-desc">               
                     

<p><strong>Developer:</strong> Lanterra Developments							   </p>
<p><strong>Location:</strong> Toronto – 770 Lawrence Ave W (Dufferin & Lawrence)</p>
<p><strong>Number of Units:</strong>  1500 (Total project)					   </p>
<p><strong>Average Price per sq. ft.:</strong> $560							   </p>
<p><strong>Occupancy:</strong> Fall 2015										   </p>
  </span>
              </li>

		       <li  id="prop37">
                  <h4>         Treviso Phase 1

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop37.png" /></span>
                   <span class="prop-desc">               
                     


<p><strong>Developer:</strong> Lanterra Developments		 </p>
<p><strong>Location:</strong> Toronto – 770 Lawrence Ave W</p>
<p><strong>Number of Units:</strong>  1500 (Total project)</p>
<p><strong>Average Price per sq. ft.:</strong> $530		 </p>
<p><strong>Occupancy:</strong> Summer 2014				 </p>
  </span>
              </li>
               <li  id="prop38">
                  <h4>        Scenic on Eglinton Phase 3

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop38.png" /></span>
                   <span class="prop-desc">               
                     



<p><strong>Developer:</strong> Aspen Ridge Homes								 </p>
<p><strong>Location:</strong> Toronto – 35 Brian Peck Cres (Eglinton & Leslie)</p>
<p><strong>Number of Units:</strong> 316										 </p>
<p><strong>Average Price per sq. ft.:</strong> $480							 </p>
<p><strong>Occupancy:</strong> Winter 2014									 </p>
  </span>
              </li>
 <li  id="prop39">
                  <h4>        Neon Condos

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop39.png" /></span>
                   <span class="prop-desc">               
                     



<p><strong>Developer:</strong> Pemberton Group & Felcorp						  </p>
<p><strong>Location:</strong> Toronto – 58 Orchard View Blvd (Yonge & Eglinton)</p>
<p><strong>Number of Units:</strong> 218										  </p>
<p><strong>Average Price per sq. ft.:</strong> $590							  </p>
<p><strong>Occupancy:</strong> Summer 2013									  </p>
  </span>
              </li>
 <li  id="prop40">
                  <h4>        The Madison @ Yonge/Eglinton

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop40.png" /></span>
                   <span class="prop-desc">               
                     
<p><strong>Developer:</strong> Madison Homes								   </p>
<p><strong>Location:</strong> Toronto – 97 Eglinton Ave E (Yonge & Eglinton)</p>
<p><strong>Number of Units:</strong> 646									   </p>
<p><strong>Average Price per sq. ft.:</strong> $620						   </p>
<p><strong>Occupancy:</strong> Summer 2015								   </p>
  </span>
              </li>
 <li  id="prop41">
                  <h4>         Allure Condos

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop41.png" /></span>
                   <span class="prop-desc">               
 
<p><strong>Developer:</strong> Greenpark Homes			 </p>
<p><strong>Location:</strong> Toronto – Yonge & Davisville</p>
<p><strong>Number of Units:</strong> 197					 </p>
<p><strong>Average Price per sq. ft.:</strong> $570		 </p>
<p><strong>Occupancy:</strong> Summer 2014				 </p>
  </span>
              </li>
              
 <li  id="prop42">
                  <h4>         The Berwick
</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop42.png" /></span>
                   <span class="prop-desc">               

<p><strong>Developer:</strong> The Brown Group of Companies & Andrin Homes</p>
<p><strong>Location:</strong> Toronto – 60 Berwick Ave					 </p>
<p><strong>Number of Units:</strong> 217									 </p>
<p><strong>Average Price per sq. ft.:</strong> $555						 </p>
<p><strong>Occupancy:</strong> Winter 2013								 </p>
  </span>
              </li>
              
 <li  id="prop43">
                  <h4>         Gramercy Park Condos
</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop43.png" /></span>
                   <span class="prop-desc">               

<p><strong>Developer:</strong> Malibu Investments							 </p>
<p><strong>Location:</strong> Toronto – 525 Wilson Ave (Wilson ave & Allen Rd)</p>
<p><strong>Number of Units:</strong> 500										 </p>
<p><strong>Average Price per sq. ft.:</strong> $465							 </p>
<p><strong>Occupancy:</strong> Spring/Summer 2013  							 </p>

</span>
              </li>
 <li  id="prop44">
                  <h4>        Liv Lofts

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop44.png" /></span>
                   <span class="prop-desc">               

<p><strong>Developer:</strong> Fram Building Corp & Cadillac Fairview Corp</p>
<p><strong>Location:</strong> Toronto – 75 The Donway W					 </p>
<p><strong>Number of Units:</strong> 175									 </p>
<p><strong>Average Price per sq. ft.:</strong> $555						 </p>
<p><strong>Occupancy:</strong> Spring 2014								 </p>
  </span>
              </li>
 <li  id="prop45">
                  <h4>       Reflection Residences

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop45.png" /></span>
                   <span class="prop-desc">               
              
<p><strong>Developer:</strong> Fram BuildingGroup & Cadillac Fairview Corp</p>
<p><strong>Location:</strong> Toronto – Lawrence Ave E & Don Mills Rd	 </p>
<p><strong>Number of Units:</strong> 106									 </p>
<p><strong>Average Price per sq. ft.:</strong> $530						 </p>
<p><strong>Occupancy:</strong> Late 2013									 </p>
  </span>
              </li>
 <li  id="prop46">
                  <h4>        Leslie Boutique

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop46.png" /></span>
                   <span class="prop-desc">               
 
<p><strong>Developer:</strong> Great Lands Corp			 </p>
<p><strong>Location:</strong> Toronto – 2756 Old Leslie St</p>
<p><strong>Number of Units:</strong> 182					 </p>
<p><strong>Average Price per sq. ft.:</strong> $540		 </p>
<p><strong>Occupancy:</strong> Summer 2013 				 </p>
 </span>
              </li>
 <li  id="prop47">
                  <h4>        Dream Tower @ Emerald City

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop47.png" /></span>
                   <span class="prop-desc">               
                     
<p><strong>Developer:</strong> Elad Canada							 </p>
<p><strong>Location:</strong> Toronto -  Sheppard Ave E & Don Mills Rd</p>
<p><strong>Number of Units:</strong>  404							 </p>
<p><strong>Average Price per sq. ft. :</strong> $540					 </p>
<p><strong>Occupancy:</strong> Spring 2014							 </p>
  </span>
              </li>

<li  id="prop48">
                  <h4>      Celsius Condos

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop48.png" /></span>
                   <span class="prop-desc">               
                     

<p><strong>Developer: </strong> Shiu Pong				 </p>
<p><strong>Location:</strong> Toronto -  Yonge & Finch</p>
<p><strong>Number of Units:</strong>  230			 </p>
<p><strong>Average Price per sq. ft. :</strong> $560	 </p>
<p><strong>Occupancy:</strong> Spring/Summer 2014 </p>
  </span>
              </li>

<li  id="prop49">
                  <h4>       Alto & Parkside at Atria

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop49.png" /></span>
                   <span class="prop-desc">               
                     

<p><strong>Developer:</strong> Tridel															</p>
<p><strong>Location:</strong> Toronto -  2205 Sheppard Ave E (Sheppard Ave E & Victoria Park Ave)</p>
<p><strong>Number of Units:</strong>  578														</p>
<p><strong>Average Price per sq. ft. :</strong> $520												</p>
<p><strong>Occupancy:</strong> Spring 2015														</p>
  </span>
              </li>


<li  id="prop50">
                  <h4>      Gibson Square Condos

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop50.png" /></span>
                   <span class="prop-desc">               
<p><strong>Developer: </strong> Menkes Developments		</p>
<p><strong>Location:</strong> Toronto -  Yonge & Sheppard</p>
<p><strong>Number of Units:</strong>  441				</p>
<p><strong>Average Price per sq. ft. :</strong> $580		</p>
<p><strong>Occupancy:</strong> Winter 2013				</p>
  </span>
         </li>


<li  id="pro51">
                  <h4>       Tango Condos

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop51.png" /></span>
                  
                   <span class="prop-desc">               
                     
<p><strong>Developer:</strong> Concord Adex					   </p>
<p><strong>Location:</strong> Toronto -  Leslie & Sheppard Ave E</p>

<p><strong>Average Price per sq. ft. :</strong> $510			   </p>
<p><strong>Occupancy:</strong> Summer 2014					   </p>
  </span>
              </li>


<li  id="prop52">
                  <h4>        Aristo at Avonshire

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop52.png" /></span>
                   <span class="prop-desc">               

<p><strong>Developer:</strong> Tridel											 </p>
<p><strong>Location:</strong> Toronto -  120 Harrison Garden Blvd (Yonge St & 401)</p>

<p><strong>Average Price per sq. ft. :</strong> $530								 </p>
<p><strong>Occupancy:</strong> Spring 2014										 </p>
  </span>
              </li>


<li  id="prop53">
                  <h4>        Argento Condos

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop53.png" /></span>
                   <span class="prop-desc">               
                     

<p><strong>Developer:</strong> Tridel										   </p>
<p><strong>Location:</strong> Toronto -  18 Graydon Hall Dr (401 & Don Mills Rd)</p>
<p><strong>Number of Units:</strong>  290									   </p>
<p><strong>Average Price per sq. ft. :</strong> $495							   </p>
<p><strong>Occupancy:</strong> Summer 2014									   </p>
  </span>
              </li>


<li  id="prop54">
                  <h4>       Vista Parc
</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop54.png" /></span>
                   <span class="prop-desc">               
                     

<p><strong>Developer:</strong> Quadcam Development Group		 </p>
<p><strong>Location:</strong> Vaughan -  Highway 7 & Jersey St</p>
<p><strong>Number of Units:</strong>  122					 </p>
<p><strong>Average Price per sq. ft. :</strong> $415			 </p>
<p><strong>Occupancy:</strong> Mid 2014						 </p>
  </span>
              </li>


<li  id="prop55">
                  <h4>         The Fountains Phase 2
</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop55.png" /></span>
                   <span class="prop-desc">               

<p><strong>Developer:</strong> Liberty Developments					   </p>
<p><strong>Location:</strong> Vaughan -  New Westminister Dr & N Park Rd</p>

<p><strong>Average Price per sq. ft. :</strong> $520					   </p>
<p><strong>Occupancy:</strong> Summer 2014							   </p>
  </span>
              </li>




<li  id="prop56">
                  <h4>        The Pinnacle on Adelaide

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop56.png" /></span>
                   <span class="prop-desc">               
                     
<p><strong>Developer:</strong> Pinnacle International								   </p>
<p><strong>Location:</strong> Toronto -  295 Adelaide St W ( John St & Adelaide)</p>
<p><strong>Number of Units:</strong>  564									   </p>
<p><strong>Average Price per sq. ft. :</strong> $620							   </p>
<p><strong>Occupancy:</strong> Mid 2014										   </p>
  </span>
              </li>

<li  id="prop57">
                  <h4>       Backstage Condos	

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop57.png" /></span>
                   <span class="prop-desc">               

<p><strong>Developer:</strong> Cityzen Development, Fernbrook Homes & Castlepoint Realty</p>
<p><strong>Location:</strong> Toronto -  1 The Esplanade 							   </p>
<p><strong>Number of Units:</strong>  2013											   </p>
<p><strong>Average Price per sq. ft. :</strong> $600									   </p>
<p><strong>Occupancy:</strong> 2013													   </p>


  </span>
              </li>
              <li  id="prop58">
                  <h4>      U Condos	

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop58.png" /></span>
                   <span class="prop-desc">               


<p><strong> Developer:</strong> Pemberton Group					</p>
<p><strong> Location:</strong> Toronto -  Bay St. & Mary St		</p>

<p><strong> Average Price per sq. ft. :</strong> $780			</p>
<p><strong> Occupancy:</strong> May 2014							</p>


  </span>
              </li>
              <li  id="prop59">
                  <h4>       Five Condos

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop59.png" /></span>
                   <span class="prop-desc">               

<p><strong>Developer:</strong> Graywood Developments & MOD Developments	   </p>
<p><strong>Location:</strong> Toronto -  5 St. Joseph St (Yonge & Wellesley)</p>
<p><strong>Number of Units:</strong> 491									   </p>
<p><strong>Average Price per sq. ft. :</strong> $730						   </p>
<p><strong>Occupancy:</strong> November 2014								   </p>
  </span>
              </li>

<li  id="prop60">
                  <h4>       X2 Condos

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop60.png" /></span>
                   <span class="prop-desc">               


<p><strong>Developer:</strong> Great Gulf & Lifetime Developments</p>
<p><strong>Location:</strong> Toronto -  Jarvis & Charles St E	</p>
<p><strong>Number of Units:</strong>  470						</p>
<p><strong>Average Price per sq. ft. :</strong> $660				</p>
<p><strong>Occupancy:</strong> Winter 2013						</p>
               
  </span>
              </li>

<li  id="prop61">
                  <h4>        Yorkville Plaza Condos

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop61.png" /></span>
                   <span class="prop-desc">               

<p><strong>Developer:</strong> Camrost-Felcorp					 </p>
<p><strong>Location:</strong> Toronto -  Avenue Rd & Yorkville Ave</p>
<p><strong>Number of Units:</strong>  511						 </p>
<p><strong>Average Price per sq. ft. :</strong> $930				 </p>
<p><strong>Occupancy:</strong> Mid 2014							 </p>
  </span>
              </li>

<li  id="prop62">
                  <h4>     River City Phase 2

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop62.png" /></span>
                   <span class="prop-desc">               


<p><strong>Developer:</strong> Waterfront Toronto & Urban Capital Property Group</p>
<p><strong>Location:</strong> Toronto -  1 King St E & River St 				   </p>
<p><strong>Number of Units:</strong> 240										   </p>
<p><strong>Average Price per sq. ft. :</strong> $550							   </p>
<p><strong>Occupancy:</strong> June 2014										   </p>
  </span>
              </li>

<li  id="prop63">
                  <h4>       IT Lofts

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop63.png" /></span>
                   <span class="prop-desc">               


<p><strong>Developer:</strong> Worsley Urban Partners					   </p>
<p><strong>Location:</strong> Toronto -  998 College St (College & Dufferin)</p>
<p><strong>Number of Units:</strong> 56									   </p>
<p><strong>Average Price per sq. ft. :</strong> $530						   </p>
<p><strong>Occupancy:</strong> Winter 2014								   </p>
  </span>
              </li>
          
<li  id="prop64">
                  <h4>    Imperial Plaza

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop64.png" /></span>
                   <span class="prop-desc">               


<p><strong>Developer:</strong> Camrost-Felcorp											 </p>
<p><strong>Location:</strong> Toronto -  111 St. Clair Ave W (St. Clair Ave W & Avenue Rd)</p>

<p><strong>Average Price per sq. ft. :</strong> $840										 </p>
<p><strong>Occupancy:</strong> Spring 2014												 </p>
  </span>
              </li>

<li  id="prop65">
                  <h4>      Pears on the Avenue

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop65.png" /></span>
                   <span class="prop-desc">               


<p><strong>Developer:</strong> Menkes Development						  </p>
<p><strong>Location:</strong> Toronto -  162 Avenue Rd (Avenue Rd & Dupont)</p>
<p><strong>Number of Units:</strong> 175									  </p>
<p><strong>Average Price per sq. ft. :</strong> $750						  </p>
<p><strong>Occupancy:</strong> Late 2014									  </p>
  </span>
              </li>

<li  id="prop66">
                  <h4>       Minto 30 Roe

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop66.png" /></span>
                   <span class="prop-desc">               


<p><strong>Developer:</strong> Minto									 </p>
<p><strong>Location:</strong> Toronto -  Roehampton (Yonge & Eglinton)</p>
<p><strong>Number of Units:</strong> 397								 </p>
<p><strong>Average Price per sq. ft. :</strong> $598					 </p>
<p><strong>Occupancy: </strong> Spring 2015							 </p>
  </span>
              </li>

<li  id="prop67">
                  <h4>      The Station

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop67.png" /></span>
                   <span class="prop-desc">               

<p><strong>Developer:</strong> Brandy Lane Homes								  </p>
<p><strong>Location:</strong> Toronto -  545 Wilson Ave (Wilson Ave & Allen Rd)</p>
<p><strong>Number of Units:</strong> 388										  </p>
<p><strong>Average Price per sq. ft. :</strong> $520							  </p>
<p><strong>Occupancy:</strong> Fall 2013  						  </p>

                   </span>
              </li>

<li  id="prop68">
                  <h4>     Ion Condos

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop68.png" /></span>
                   <span class="prop-desc">               


<p><strong>Developer:</strong> Cityzen Development & Fernbrook Homes</p>
<p><strong>Location:</strong> Toronto -  Keele & Wilson			   </p>
<p><strong>Number of Units:</strong> 200							   </p>
<p><strong>Average Price per sq. ft. :</strong> $560				   </p>
<p><strong>Occupancy:</strong> Late 2014/ Early 2015				   </p>
  </span>
              </li>

<li  id="prop69">
                  <h4>      NY2 Condos

</h4>
                   <span class="prop-img"><img src="<?php echo $base;?>img/map/prop69.png" /></span>
                   <span class="prop-desc">               


<P><strong>Developer:</strong> The Daniels Corporation				 </p>
<P><strong>Location:</strong> Toronto -  Sheppard Ave E & Bayview Ave.</p>
<P><strong>Number of Units:</strong> 142								 </p>
<P><strong>Average Price per sq. ft. :</strong> $565					 </p>
<P><strong>Occupancy:</strong> 2015									 </p>
  </span>
              </li>









 			   
 
      </ul>
      
 
 
 </div>
 
 </div>
 
 </div>-->
<!-- end property listing-->
<!-- Bottom Banner Ad -->
<?php $this->load->view('center-leaderboard.php'); ?>    
<!-- end bottom banner ad -->
</div>
</div>
</div>
<!--sensor determine the user's location, keep false and change
    to true when the maps reach full province or country, tbd. -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script> 
<script type="text/javascript">
  //Give special class to the page
  $(document).ready(function(){
	  $('body').addClass('map-body');
	  $('#map-filter li input[type=checkbox]').prop('checked',true)
	  
  })
	// Variables 
	//initial zoom
  var zoom = 10
  // array of data to be used for this instance
 /* var data = { 
 "items": [{ "latitude":43.811428, "longitude":-79.423494, "item_title": "Minto Water Garden", "item_desc": "Vaughan - Yonge St & Arnold ", "item_file_url":"<?php echo $base;?>img/map/mapthumb1.png", "item_url":"#prop1", "item_category":"property"},
   	
   	{ "latitude":43.784758, "longitude":-79.294314, "item_title": "Love Condos", "item_desc": "Toronto - Bonis Ave", "item_file_url":"<?php echo $base;?>img/map/mapthumb2.png", "item_url":"#prop2", "item_category":"propery"},
   	
   	{ "latitude":43.783668, "longitude":-79.598449, "item_title": "Fairground Lofts in Old Woodbridge", "item_desc": "Vaughan  - Kipling Ave (Kipling Ave &amp Woodbridge Ave)", "item_file_url":"<?php echo $base;?>img/map/mapthumb3.png", "item_url":"#prop3", "item_category":"property"},
   	{ "latitude":43.754376, "longitude":-79.44384, "item_title": "Portrait Condos" , "item_desc": "Toronto - 701 Sheppard Ave W (Sheppard Ave W & Bathurst)", "item_file_url":"<?php echo $base;?>img/map/mapthumb4.png", "item_url":"#prop4", "item_category":"property"}]
   	};*/
   	
   	
   	
   	
   	 var data = {
   	 "items": [{ "latitude":43.811428, "longitude":-79.423494, "item_title":  "Minto Water Garden", "item_file_url": "img/map/mapthumb1.png" , "item_desc": "  Vaughan - Yonge St & Arnold Ave", "item_category": "property", "item_url": ""},
      
 { "latitude":43.784758, "longitude":-79.294314, "item_title":  "Love Condos                        ", "item_file_url": "img/map/mapthumb2.png" , "item_desc": " Toronto - Bonis Ave (Sheppard Ave E &amp Kennedy Rd)           ", "item_category": "property", "item_url": "" },
 
 { "latitude":43.783668, "longitude":-79.598449, "item_title":  "Fairground Lofts in Old Woodbridge  ", "item_file_url": "img/map/mapthumb3.png" , "item_desc": " Vaughan  - Kipling Ave (Kipling Ave &amp Woodbridge Ave)           ", "item_category": "property", "item_url": "" },
 { "latitude":43.754376, "longitude":-79.44384, "item_title":  "Portrait Condos                ", "item_file_url": "img/map/mapthumb4.png" , "item_desc": " Toronto - 701 Sheppard Ave W (Sheppard Ave W & Bathurst)            ", "item_category": "property", "item_url": "" },
 { "latitude":43.76338, "longitude":-79.408, "item_title":  "EI8HTY8 Condos                  ", "item_file_url": "img/map/mapthumb5.png" , "item_desc": " Toronto - 88 Sheppard Ave E (Yonge & Sheppard Ave E)              ", "item_category": "property", "item_url": "" },
 { "latitude":43.675024, "longitude":-79.394754, "item_title":  "133 Hazelton                ", "item_file_url": "img/map/mapthumb6.png" , "item_desc": " Toronto – 133 Hazelton Ave           ", "item_category": "property", "item_url": "" },
 { "latitude":43.684001, "longitude":-79.511421, "item_title":  "Perspective Condos          ", "item_file_url": "img/map/mapthumb7.png" , "item_desc": " Toronto – Scarlett Rd                ", "item_category": "property", "item_url": "" },
 { "latitude":43.683972, "longitude":-79.30017, "item_title":  "Upper Beach Townes    ", "item_file_url": "img/map/mapthumb8.png" , "item_desc": "  Gerrard St E & Main St         ", "item_category": "property", "item_url": "" },
 { "latitude":43.68567, "longitude":-79.312746, "item_title":  "Carmelina Condos        ", "item_file_url": "img/map/mapthumb9.png" , "item_desc": " 2057 Danforth Ave (Woodbine Ave & Danforth)                        ", "item_category": "property", "item_url": "" },
 { "latitude":43.696198, "longitude":-79.396151, "item_title":  "Merton Yonge Condos          ", "item_file_url": "img/map/mapthumb10.png" , "item_desc": " Toronto – Yonge & Merton St  ", "item_category": "property", "item_url": "" },
 { "latitude":43.694367, "longitude":-79.273634, "item_title":  "Terrace on Danforth            ", "item_file_url": "img/map/mapthumb11.png" , "item_desc": " 3520 Danforth Ave (Danforth & Warden)      ", "item_category": "property", "item_url": "" },
 { "latitude":43.652338, "longitude":-79.367819, "item_title":  "Ivory on Adelaide        ", "item_file_url": "img/map/mapthumb12.png" , "item_desc": " 406 Adelaide St E (Adelaide St E & Sherbourne)                   ", "item_category": "property", "item_url": "" },
 { "latitude":43.654671, "longitude":-79.389213, "item_title":  "210 Simcoe           ", "item_file_url": "img/map/mapthumb13.png" , "item_desc": " 210 Simcoe St (Dundas & University)       ", "item_category": "property", "item_url": "" },
 { "latitude":43.649327, "longitude":-79.48445, "item_title":  "Two Old Mill                 ", "item_file_url": "img/map/mapthumb14.png" , "item_desc": " 1 Old Mill Dr (Bloor St W & Jane)        ", "item_category": "property", "item_url": "" },
 { "latitude":43.649327, "longitude":-79.48445, "item_title":  "One Old Mill           ", "item_file_url": "img/map/mapthumb15.png" , "item_desc": " 1 Old Mill ( Bloor St W & Jane)                 ", "item_category": "property", "item_url": "" },
 { "latitude":43.653226, "longitude":-79.383184, "item_title":  "Tableau Condos   ", "item_file_url": "img/map/mapthumb16.png" , "item_desc": " Toronto – 117 Peter St (Peter & Richmond)      ", "item_category": "property", "item_url": "" },
 { "latitude":43.649561, "longitude":-79.424293, "item_title":  "Abacus Lofts       ", "item_file_url": "img/map/mapthumb17.png" , "item_desc": " Toronto – 1245 Dundas St W (Dundas and Dovercourt)                   ", "item_category": "property", "item_url": "" },
 { "latitude":43.649451, "longitude":-79.389216, "item_title":  "Studio on Ricmond    ", "item_file_url": "img/map/mapthumb18.png" , "item_desc": " Toronto – Richmond St W & Duncan St                ", "item_category": "property", "item_url": "" },
 { "latitude":43.650086, "longitude":-79.392256, "item_title":  "12 Degrees   ", "item_file_url": "img/map/mapthumb19.png" , "item_desc": " Toronto – 15 Beverley St (Queen & John St)            ", "item_category": "property", "item_url": "" },
 { "latitude":43.650762, "longitude":-79.359763, "item_title":  "Gooderham Condos      ", "item_file_url": "img/map/mapthumb20.png" , "item_desc": " Toronto –  Mill St & Trinity St           ", "item_category": "property", "item_url": "" },
 { "latitude":43.6513, "longitude":-79.368091, "item_title":  "King Plus Condos   ", "item_file_url": "img/map/mapthumb21.png" , "item_desc": " Toronto – 251 King St E (King St E & Sherbourne)                    ", "item_category": "property", "item_url": "" },
 { "latitude":43.658255, "longitude":-79.352553, "item_title":  "Sync Lofts    ", "item_file_url": "img/map/mapthumb22.png" , "item_desc": " Toronto –  630 Queen St E                ", "item_category": "property", "item_url": "" },
 { "latitude":43.659087, "longitude":-79.382093, "item_title":  "Aura at College Park   ", "item_file_url": "img/map/mapthumb23.png" , "item_desc": " Toronto –  Yonge St & Gerrard St E             ", "item_category": "property", "item_url": "" },
 { "latitude":43.659753, "longitude":-79.481474, "item_title":  "Volta Lofts                 ", "item_file_url": "img/map/mapthumb24.png" , "item_desc": " Toronto –  588 Annette St            ", "item_category": "property", "item_url": "" },
 { "latitude":43.660046, "longitude":-79.428931, "item_title":  "707 Lofts             ", "item_file_url": "img/map/mapthumb25.png" , "item_desc": " Toronto –  707 Dovercourt Rd          ", "item_category": "property", "item_url": "" },
 { "latitude":43.655376, "longitude":-79.456758, "item_title":  "The address @ High Park   ", "item_file_url": "img/map/mapthumb26.png" , "item_desc": " Toronto –  Bloor St W & Indian Rd        ", "item_category": "property", "item_url": "" },
 { "latitude":43.662273, "longitude":-79.340614, "item_title":  "Showcase Lofts      ", "item_file_url": "img/map/mapthumb27.png" , "item_desc": " Toronto –  88 Colgate Ave              ", "item_category": "property", "item_url": "" },
 { "latitude":43.656905, "longitude":-79.35612, "item_title":  "River City Phase 1         ", "item_file_url": "img/map/mapthumb28.png" , "item_desc": " Toronto –  King St E & River St", "item_category": "property", "item_url": "" },
 { "latitude":43.649327, "longitude":-79.48445, "item_title":  "Riverhouse Condos      ", "item_file_url": "img/map/mapthumb29.png" , "item_desc": " Etobicoke – 21 Old Mill Rd (Bloor St W & Jane)                        ", "item_category": "property", "item_url": "" },
 { "latitude":43.672829, "longitude":-79.387178, "item_title":  "Milan Condos         ", "item_file_url": "img/map/mapthumb30.png" , "item_desc": " Toronto -  825 Church St            ", "item_category": "property", "item_url": "" },
 { "latitude":43.610022, "longitude":-79.49021, "item_title":  "Kew Beach Living         ", "item_file_url": "img/map/mapthumb31.png" , "item_desc": " Toronto -  Lakeshore & Queen St E     ", "item_category": "property", "item_url": "" },
 { "latitude":43.610022, "longitude":-79.49021, "item_title":  "Exhibit Residence            ", "item_file_url": "img/map/mapthumb32.png" , "item_desc": " Toronto -  200 Bloor St W", "item_category": "property", "item_url": "" },
 { "latitude":43.610022, "longitude":-79.49021, "item_title":  "Cornerstone Terrace Boutique Lofts  ", "item_file_url": "img/map/mapthumb33.png" , "item_desc": " Toronto -  323 Kingston Rd", "item_category": "property", "item_url": "" },
 { "latitude":43.668564, "longitude":-79.395458, "item_title":  "34 Cranbrooke Village         ", "item_file_url": "img/map/mapthumb34.png" , "item_desc": " Toronto -  Bathurst & Lawrence Ave", "item_category": "property", "item_url": "" },
 { "latitude":43.724226, "longitude":-79.402044, "item_title":  "3018 Yonge Condos      ", "item_file_url": "img/map/mapthumb35.png" , "item_desc": " Toronto -  3018 Yonge St (Yonge St & Lawrence)", "item_category": "property", "item_url": "" },
 { "latitude":43.714124, "longitude":-79.454629, "item_title":  "Treviso Phase 2    ", "item_file_url": "img/map/mapthumb36.png" , "item_desc": " Toronto -  770 Lawrence Ave W (Dufferin & Lawrence)", "item_category": "property", "item_url": "" },
 { "latitude":43.714124, "longitude":-79.454629, "item_title":  "Treviso Phase 1   ", "item_file_url": "img/map/mapthumb37.png" , "item_desc": " Toronto -  770 Lawrence Ave W", "item_category": "property", "item_url": "" },
 { "latitude":43.714244, "longitude":-79.355555, "item_title":  "Scenic on Eglinton Phase 3     ", "item_file_url": "img/map/mapthumb38.png" , "item_desc": " Toronto - 35 Brian Peck Cres (Eglinton & Leslie)", "item_category": "property", "item_url": "" },
 { "latitude":43.707885, "longitude":-79.400286, "item_title":  "Neon Condos     ", "item_file_url": "img/map/mapthumb39.png" , "item_desc": " Toronto - 58 Orchard View Blvd (Yonge & Eglinton)", "item_category": "property", "item_url": "" },
 { "latitude":43.707423, "longitude":-79.394915, "item_title":  "The Madison @ Yonge/Eglinton   ", "item_file_url": "img/map/mapthumb40.png" , "item_desc": " Toronto -  97 Eglinton Ave E (Yonge & Eglinton)", "item_category": "property", "item_url": "" },
 { "latitude":43.698296, "longitude":-79.396604, "item_title":  "Allure Condos            ", "item_file_url": "img/map/mapthumb41.png" , "item_desc": " Toronto -  Yonge & Davisville", "item_category": "property", "item_url": "" },
 { "latitude":43.703775, "longitude":-79.399646, "item_title":  "The Berwick       ", "item_file_url": "img/map/mapthumb42.png" , "item_desc": " Toronto -  60 Berwick Ave", "item_category": "property", "item_url": "" },
 { "latitude":43.734097, "longitude":-79.447036, "item_title":  "Gramercy Park Condos      ", "item_file_url": "img/map/mapthumb43.png" , "item_desc": " Toronto -  525 Wilson Ave (Wilson ave & Allen Rd)  ", "item_category": "property", "item_url": "" },
 { "latitude":43.732216, "longitude":-79.345616, "item_title":  "Liv Lofts           ", "item_file_url": "img/map/mapthumb44.png" , "item_desc": " Toronto -  75 The Donway W", "item_category": "property", "item_url": "" },
 { "latitude":43.73715, "longitude":-79.343506, "item_title":  "Reflection Residences   ", "item_file_url": "img/map/mapthumb45.png" , "item_desc": " Toronto -  Lawrence Ave E & Don Mills Rd", "item_category": "property", "item_url": "" },
 { "latitude":43.770087, "longitude":-79.366808, "item_title":  "Leslie Boutique     ", "item_file_url": "img/map/mapthumb46.png" , "item_desc": " Toronto -  2756 Old Leslie St", "item_category": "property", "item_url": "" },
 { "latitude":43.775115, "longitude":-79.347139, "item_title":  "Dream Tower @ Emerald City     ", "item_file_url": "img/map/mapthumb47.png" , "item_desc": " Toronto -  Sheppard Ave E & Don Mills Rd", "item_category": "property", "item_url": "" },
 { "latitude":43.779758, "longitude":-79.415569, "item_title":  "Celsius Condos    ", "item_file_url": "img/map/mapthumb48.png" , "item_desc": " Toronto -  Yonge & Finch", "item_category": "property", "item_url": "" },
 { "latitude":43.774845, "longitude":-79.329582, "item_title":  "Alto & Parkside at Atria       ", "item_file_url": "img/map/mapthumb49.png" , "item_desc": " Toronto -  2205 Sheppard Ave E (Sheppard Ave E & Victoria Park Ave)", "item_category": "property", "item_url": "" },
 { "latitude":43.76153, "longitude":-79.410832, "item_title":  "Gibson Square Condos       ", "item_file_url": "img/map/mapthumb50.png" , "item_desc": " Toronto -  Yonge & Sheppard", "item_category": "property", "item_url": "" },
 { "latitude":43.771728, "longitude":-79.364008, "item_title":  "Tango Condos      ", "item_file_url": "img/map/mapthumb51.png" , "item_desc": " Toronto -  Leslie & Sheppard Ave E", "item_category": "property", "item_url": "" },
 { "latitude":43.757055, "longitude":-79.40502, "item_title":  "Aristo at Avonshire     ", "item_file_url": "img/map/mapthumb52.png" , "item_desc": " Toronto - 120 Harrison Garden Blvd (Yonge St & 401)", "item_category": "property", "item_url": "" },
 { "latitude":43.761834, "longitude":-79.346908, "item_title":  "Argento Condos       ", "item_file_url": "img/map/mapthumb53.png" , "item_desc": " Toronto -  18 Graydon Hall Dr (401 & Don Mills Rd)", "item_category": "property", "item_url": "" },
 { "latitude":43.66005, "longitude":-79.416914, "item_title":  "Vista Parc      ", "item_file_url": "img/map/mapthumb54.png" , "item_desc": " Vaughan -  Highway 7 & Jersey St    ", "item_category": "property", "item_url": "" },
 { "latitude":43.812674, "longitude":-79.457092, "item_title":  "The Fountains Phase 2          ", "item_file_url": "img/map/mapthumb55.png" , "item_desc": " Vaughan -  New Westminister Dr & N Park Rd", "item_category": "property", "item_url": "" },
 { "latitude":43.647811, "longitude":-79.390301, "item_title":  "The Pinnacle on Adelaide       ", "item_file_url": "img/map/mapthumb56.png" , "item_desc": " Toronto -  295 Adelaide St W ( John St & Adelaide)", "item_category": "property", "item_url": "" },
 { "latitude":43.645944, "longitude":-79.376158, "item_title":  "Backstage Condos               ", "item_file_url": "img/map/mapthumb57.png" , "item_desc": " Toronto -  1 The Esplanade             ", "item_category": "property", "item_url": "" },
 { "latitude":43.66743, "longitude":-79.388501, "item_title":  "U Condos            ", "item_file_url": "img/map/mapthumb58.png" , "item_desc": " Toronto -  Bay St. & Mary St", "item_category": "property", "item_url": "" },
 { "latitude":43.665937, "longitude":-79.38512, "item_title":  "Five Condos      ", "item_file_url": "img/map/mapthumb59.png" , "item_desc": " Toronto -  5 St. Joseph St (Yonge & Wellesley)", "item_category": "property", "item_url": "" },
 { "latitude":43.669989, "longitude":-79.379923, "item_title":  "X2 Condos          ", "item_file_url": "img/map/mapthumb60.png" , "item_desc": " Toronto -  Jarvis & Charles St E", "item_category": "property", "item_url": "" },
 { "latitude":43.670361, "longitude":-79.394863, "item_title":  "Yorkville Plaza Condos         ", "item_file_url": "img/map/mapthumb61.png" , "item_desc": " Toronto -  Avenue Rd & Yorkville Ave             ", "item_category": "property", "item_url": "" },
 { "latitude":43.656905, "longitude":-79.35612, "item_title":  "River City Phase 2    ", "item_file_url": "img/map/mapthumb62.png" , "item_desc": " Toronto -  1 King St E & River St ", "item_category": "property", "item_url": "" },
 { "latitude":43.656344, "longitude":-79.408336, "item_title":  "IT Lofts      ", "item_file_url": "img/map/mapthumb63.png" , "item_desc": " Toronto -  998 College St (College & Dufferin)", "item_category": "property", "item_url": "" },
 { "latitude":43.686813, "longitude":-79.399574, "item_title":  "Imperial Plaza   ", "item_file_url": "img/map/mapthumb64.png" , "item_desc": " 111 St. Clair Ave W (St. Clair Ave W & Avenue Rd)       ", "item_category": "property", "item_url": "" },
 { "latitude":43.675079, "longitude":-79.396778, "item_title":  "Pears on the Avenue  ", "item_file_url": "img/map/mapthumb65.png" , "item_desc": " Toronto -  162 Avenue Rd (Avenue Rd & Dupont)", "item_category": "property", "item_url": "" },
 { "latitude":43.71017, "longitude":-79.388082, "item_title":  "Minto 30 Roe      ", "item_file_url": "img/map/mapthumb66.png" , "item_desc": " Toronto -  Roehampton (Yonge & Eglinton)       ", "item_category": "property", "item_url": "" },
 { "latitude":43.734479, "longitude":-79.447282, "item_title":  "The Station   ", "item_file_url": "img/map/mapthumb67.png" , "item_desc": " Toronto -  545 Wilson Ave (Wilson Ave & Allen Rd)", "item_category": "property", "item_url": "" },
 { "latitude":43.726682, "longitude":-79.482134, "item_title":  "Ion Condos       ", "item_file_url": "img/map/mapthumb68.png" , "item_desc": " Toronto -  Keele & Wilson", "item_category": "property", "item_url": "" },
 { "latitude":43.766585, "longitude":-79.387953, "item_title":  "NY2 Condos ", "item_file_url": "img/map/mapthumb69.png" , "item_desc": " Toronto -  Sheppard Ave E & Bayview Ave.   ", "item_category": "property", "item_url": "" },
 { "latitude":43.646848, "longitude":-79.376914, "item_title":  " L Tower", "item_file_url": "img/map/mapthumb70.png" , "item_desc": " Toronto -  Yonge St. and Front St.", "item_category": "property", "item_url": "" },
 { "latitude":43.6421, "longitude":-79.374111, "item_title":  "Pier 27", "item_file_url": "img/map/mapthumb71.png" , "item_desc": " Toronto -  25 Queens Quay E", "item_category": "property", "item_url": "" },
 { "latitude": 	43.683217	 , "longitude" :	-79.476353	 , "item_title":  "	Senso Group Building Supplies	" , "item_file_url": "	img/map/senso.jpg	" , "item_desc": "	Best products for affordable prices with two locations to serve you. 2% discount at both locations:	" , "item_category": "benefit" , "item_url": "" }	,
{ "latitude": 	43.644091	 , "longitude" :	-79.623096	 , "item_title":  "	Senso Group Building Supplies	" , "item_file_url": "	img/map/senso.jpg	" , "item_desc": "	Best products for affordable prices with two locations to serve you. 2% discount at both locations:	" , "item_category": "benefit" , "item_url": "" }	,
{ "latitude": 	43.653136	 , "longitude" :	-79.428649	 , "item_title":  "	Bairrada Churrasqueira	" , "item_file_url": "	img/map/bairrada-logo.jpg	" , "item_desc": "	Traditional Portuguese cuisine for the whole family since 1989. 10% discount available at all our locations.	" , "item_category": "benefit" , "item_url": "" }	,
{ "latitude": 	43.649789	 , "longitude" :	-79.433928	 , "item_title":  "	Bairrada Churrasqueira	" , "item_file_url": "	img/map/bairrada-logo.jpg	" , "item_desc": "	Traditional Portuguese cuisine for the whole family since 1989. 10% discount available at all our locations.	" , "item_category": "benefit" , "item_url": "" }	,
{ "latitude": 	43.670106	 , "longitude" :	-79.478024	 , "item_title":  "	Bairrada Churrasqueira	" , "item_file_url": "	img/map/bairrada-logo.jpg	" , "item_desc": "	Traditional Portuguese cuisine for the whole family since 1989. 10% discount available at all our locations.	" , "item_category": "benefit" , "item_url": "" }	,
{ "latitude": 	43.581976	 , "longitude" :	-79.621823	 , "item_title":  "	Bairrada Churrasqueira	" , "item_file_url": "	img/map/bairrada-logo.jpg	" , "item_desc": "	Traditional Portuguese cuisine for the whole family since 1989. 10% discount available at all our locations.	" , "item_category": "benefit" , "item_url": "" }	,
{ "latitude": 	43.706545	 , "longitude" :	-79.453079	 , "item_title":  "	The White Room Spa Lounge	" , "item_file_url": "	img/map/white-room-spa.jpg	" , "item_desc": "	Offering 15% off your beauty needs. Gift certificates available. Great gift for that special someone.	" , "item_category": "benefit" , "item_url": "" }	,
{ "latitude": 	43.677171	 , "longitude" :	-79.442796	 , "item_title":  "	Phil's Shoe Service	" , "item_file_url": "	img/map/philsshoeservice-logo.jpg	" , "item_desc": "	Servicing your shoes for over 50 years. Get a 10% discount at our location	" , "item_category": "benefit" , "item_url": "" }	,
{ "latitude": 	43.623987	 , "longitude" :	-79.541299	 , "item_title":  "	Global Waste Service Inc.	" , "item_file_url": "	img/map/global-waste-logo.jpg	" , "item_desc": "	Get a 10% discount for all your disposal needs	" , "item_category": "benefit" , "item_url": "" }	,
{ "latitude": 	43.755637	 , "longitude" :	-79.613043	 , "item_title":  "	Advanced Safety World	" , "item_file_url": "	img/map/asw-logo.jpg	" , "item_desc": "	Discounts off PPE packages for employers and workers. Contact us and start saving.	" , "item_category": "benefit" , "item_url": "" }	,
{ "latitude": 	43.694342	 , "longitude" :	-79.49486	 , "item_title":  "	Silvan Mechanical Enterprises	" , "item_file_url": "	img/map/silvan-logo.jpg	" , "item_desc": "	Specializing in Plumbing, Radiant Floor Heating and Snow & Ice Melting Systems.	" , "item_category": "benefit" , "item_url": "" }	,
{ "latitude": 	43.727951	 , "longitude" :	-79.478791	 , "item_title":  "	Club de Soleil	" , "item_file_url": "		" , "item_desc": "	Get your tan on. Offering a 15% discount.	" , "item_category": "benefit" , "item_url": "" },
{ "latitude": 	42.941955	 , "longitude" :	-81.237273	 , "item_title":  "	Threads of Life	" , "item_file_url": "	img/map/threadsoflife.jpg	" , "item_desc": "	Threads of Life is an organization supported by a network of volunteers from across the country that have been effected by workplace tragedy.	" , "item_category": "charity" , "item_url": "" }	,
{ "latitude": 	43.502594	 , "longitude" :	-79.699852	 , "item_title":  "	My Safe Work	" , "item_file_url": "	img/map/mysafework.jpg	" , "item_desc": "	This is a non-profit organization who focuses on promoting workplace health and safety to businesses and schools across North America.	" , "item_category": "charity" , "item_url": "" },
{ "latitude": 	43.658063	 , "longitude" :	-79.379257	 , "item_title":  "	Ryerson University	" , "item_file_url": "	img/map/u-ryerson.jpg	" , "item_desc": "	Ryerson graduates working in this progressive field help prevent injury and illness by anticipating, evaluating and controlling physical, biological, chemical and other hazards in workplaces.	" , "item_category": "education" , "item_url": "" }	,
{ "latitude": 	43.00838	 , "longitude" :	-81.262128	 , "item_title":  "	University of Western Ontario	" , "item_file_url": "	img/map/u-western.jpg	" , "item_desc": "	The field of Occupational Health and Safety Management offers growing career opportunities for university graduates with specific knowledge and skills.	" , "item_category": "education" , "item_url": "" }	,
{ "latitude": 	43.532994	 , "longitude" :	-80.228515	 , "item_title":  "	University of Guelph	" , "item_file_url": "	img/map/u-guelph.jpg	" , "item_desc": "	This HRPA approved course examines Occupational Health and Safety with regards to economic, legal, technical and moral issues and the importance of safe and healthy workplaces, as well as management’s leadership role in achieving that objective. 	" , "item_category": "education" , "item_url": "" }	,
{ "latitude": 	43.469128	 , "longitude" :	-80.539865	 , "item_title":  "	University of Waterloo	" , "item_file_url": "	img/map/u-waterloo.jpg	" , "item_desc": "	The course is an introduction into the challenging and evolving field of occupational health and safety and will enable you to gain an understanding of the ethical, legislative, technical and management aspects of health and safety practice in human resources.	" , "item_category": "education" , "item_url": "" }	,
{ "latitude": 	43.943033	 , "longitude" :	-78.894911	 , "item_title":  "	Durham College	" , "item_file_url": "	img/map/u-durham.jpg	" , "item_desc": "	This course describes the health and safety responsibilities of employees and employers, outlines the major Canadian laws relating to employee security and safety, identifies the implications of employee security programs, and identifies and measures the financial effects of health and safety programs.	" , "item_category": "education" , "item_url": "" }	,
{ "latitude": 	43.474541	 , "longitude" :	-80.528095	 , "item_title":  "	Wilfrid Laurier University	" , "item_file_url": "	img/map/u-laurier.jpg	" , "item_desc": "	The Occupational Health and Safety course is offered under the School of Business and Economics under the Human Resource Management component.	" , "item_category": "education" , "item_url": "" },
{ "latitude": 	43.706603	 , "longitude" :	-79.399928	 , "item_title":  "	Passport to Safety	" , "item_file_url": "	img/map/passtosafety.jpg	" , "item_desc": "	This not-for-profit cross-Canada program works to help eliminate needless injuries and assist in the prevention of workplace fatalities.	" , "item_category": "youngworker" , "item_url": "" },
{ "latitude": 	43.644609	 , "longitude" :	-79.386007	 , "item_title":  "	Workplace Safety and Insurance Board	" , "item_file_url": "	img/map/wsib.jpg	" , "item_desc": "	WSIB assists workers, large companies and small business owners with many aspects of health and safety.	" , "item_category": "hsnetwork" , "item_url": "" }	,
{ "latitude": 	43.658892	 , "longitude" :	-79.385535	 , "item_title":  "	Ministry of the Attorney General (MAG)	" , "item_file_url": "	img/map/m-attorney.jpg	" , "item_desc": "	MAG is responsible for providing a fair and accessible justice system in an equal, affordable and accessible way throughout Ontario.	" , "item_category": "hsnetwork" , "item_url": "" }	,
{ "latitude": 	43.663363	 , "longitude" :	-79.387639	 , "item_title":  "	Ministry of Education (MOE)	" , "item_file_url": "	img/map/m-education.jpg	" , "item_desc": "	The Ministry administers the system of publicly funded elementary and secondary school education throughout Ontario.	" , "item_category": "hsnetwork" , "item_url": "" }	,
{ "latitude": 	43.663384	 , "longitude" :	-79.387869	 , "item_title":  "	Ministry of Health and Long-Term Care (MOHLTC)	" , "item_file_url": "	img/map/m-education.jpg	" , "item_desc": "	The Ministry establishes a patient focused, result driven, integrated and sustainable publicly funded health system.	" , "item_category": "hsnetwork" , "item_url": "" }	,
{ "latitude": 	43.652328	 , "longitude" :	-79.38706	 , "item_title":  "	Ministry of Labour (MOL)	" , "item_file_url": "	img/map/m-labour.jpg	" , "item_desc": "	The Ministry was created in 1919 to develop and enforce health and safety and labour legislation. The Ministry's mandate is to set, communicate and enforce workplace legislation while encouraging a strong internal responsibility system.	" , "item_category": "hsnetwork" , "item_url": "" }	,
{ "latitude": 	43.66362	 , "longitude" :	-79.387734	 , "item_title":  "	Ministry of Training, Colleges and Universitites (MTCU)	" , "item_file_url": "	img/map/m-training.jpg	" , "item_desc": "	MTCU assists students and workers obtain the education and training they require to build rewarding careers. 	" , "item_category": "hsnetwork" , "item_url": "" }	,
{ "latitude": 	43.64392	 , "longitude" :	-79.616585	 , "item_title":  "	Infrastructure Health and Safety Association (IHSA)	" , "item_file_url": "	img/map/ihsa.jpg	" , "item_desc": "	Comprises the former Construction Safety Association of Ontario (CSAO), the Electrical & Utilities Safety Association of Ontario (EUSA), and the Transportation Health and Safety Association of Ontario (THSAO).	" , "item_category": "hsnetwork" , "item_url": "" }	,
{ "latitude": 	42.275544	 , "longitude" :	-82.998757	 , "item_title":  "	Occupational Health Clinics for Ontario Workers (OHCOW)	" , "item_file_url": "	img/map/ohcow.jpg	" , "item_desc": "	OHCOW is a network of clinics serving five regions (Hamilton, Sarnia / Windsor, Sudbury, Thunder Bay, Toronto), providing comprehensive occupational health services to workers.	" , "item_category": "hsnetwork" , "item_url": "" }	,
{ "latitude": 	43.763922	 , "longitude" :	-79.412479	 , "item_title":  "	Public Services Health and Safety Association (PSHSA)	" , "item_file_url": "	img/map/pshsa.jpg	" , "item_desc": "	PSHSA comprises the former Education Safety Association of Ontario (ESAO), the Municipal Health and Safety Association (MHSA), and the Ontario Safety Association for Community and Healthcare (OSACH).	" , "item_category": "hsnetwork" , "item_url": "" }	,
{ "latitude": 	43.720668	 , "longitude" :	-79.339041	 , "item_title":  "	Workers Health & Safety Centre (WHSC)	" , "item_file_url": "	img/map/whsc.jpg	" , "item_desc": "	WHSC provides training for workers, their representatives and employers from every sector and region of the province.	" , "item_category": "hsnetwork" , "item_url": "" }	,
{ "latitude": 	46.311074	 , "longitude" :	-79.46182	 , "item_title":  "	Workplace Safety North (WSN)	" , "item_file_url": "	img/map/wsn.jpg	" , "item_desc": "	WSN comprises the former Mines and Aggregates Safety and Health Association (MASHA); Ontario Forestry Safe Workplace Association (OFSWA); and the Pulp and Paper Health and Safety Association (PPHSA).	" , "item_category": "hsnetwork" , "item_url": "" }	,
{ "latitude": 	43.76505	 , "longitude" :	-79.411918	 , "item_title":  "	Workplace Safety & Prevention Services (WSPS)	" , "item_file_url": "	img/map/wsps.jpg	" , "item_desc": "	The largest HSA, comprises the former Farm Safety Association (FSA), Industrial Accident Prevention Association (IAPA), and the Ontario Service Safety Alliance (OSSA).	" , "item_category": "hsnetwork" , "item_url": "" }				
 ]
 
 };
   	
   	
   // Initial center of the map
   var pos = new google.maps.LatLng(43.653226 , -79.383184);
  
  
  
  // Global constructor function

   function mapInitialize() {
 
  
   
   var myOptions = {
   			zoom: zoom,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            disableDefaultUI: true,
           
            
        };
	
	
	
    // Create the map 
    // No need to specify zoom and center as we fit the map further down.
    var map = new google.maps.Map(document.getElementById("googleMap"), myOptions);
   
    map.setCenter(pos);
    
    $('#map-zoom-in').on('click', function(){
	   map.setZoom(map.getZoom() + 1) 
    });
   	$('#map-zoom-out').on('click', function(){
	   map.setZoom(map.getZoom() - 1) 
    });
   	      
   	
   	
   	
	
	
	infowindow = new InfoBox({
		alignBottom: true,
		pixelOffset:new google.maps.Size(-120, 40),
		boxStyle: {
			background: "#ffffff",
			width: "auto",
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
	
	
 
	var markers = [];
	
for (var i = 0; i < data.items.length ; i++) {
  var latLng = new google.maps.LatLng(data.items[i].latitude,
      data.items[i].longitude);
  // Function to change the icon depending on the category    
  /*var iconCat = function(){
	  		if(data.items[i].item_category == 'property'){return "<?php echo $base;?>img/map-markers/red-w-shadow.png"}
	  		else if (data.items[i].item_category == 'benefit'){return "<?php echo $base;?>img/map-markers/yellow-w-shadow.png"}
	  		else if (data.items[i].item_category == 'education'){return "<?php echo $base;?>img/map-markers/ed-mrk.png"}
	  		else if (data.items[i].item_category == 'youngworker'){return "<?php echo $base;?>img/map-markers/yw-mrk.png"}
	  		else if (data.items[i].item_category == 'charity'){return "<?php echo $base;?>img/map-markers/ch-mrk.png"}
	  		else if (data.items[i].item_category == 'hsnetwork'){return "<?php echo $base;?>img/map-markers/hs-mrk.png"}
	  		else {return "<?php echo $base;?>img/map-markers/marker_red2.png" }
  	};*/
  		
   var marker = new google.maps.Marker({
  		position: latLng,
  		icon : "<?php echo $base;?>img/map-markers/red-w-shadow.png", /* Call iconCat() to run function above */
  		shape: {
	  		coord:[0,0,30,0,17,47],
	  		type: 'poly'	
  		},
  		
  		markerCategory: data.items[i].item_category,
  		// content that will appear inside the infowindow
  		//closeBtn: '<span id="remove" class="remove"><i class="icon-remove icon-white"></i></span>',
   		content: '<div class="map-window"><h5 class="title-light">' + data.items[i].item_title + '</h5><div class="img"><img src="<?php echo $base;?>'+data.items[i].item_file_url +'"/></div><div class="desc">'+data.items[i].item_desc +'</div><hr><div class="text-center"><a class="btn btn-warning btn-small" href="'+ data.items[i].item_file_url +'">more info</a></div></div>'
		
	  		
   		
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




var boxFilter = $('#filter'),
	box = $('#map-filter li input[type="checkbox"]');
	
	
	function hide(cat) {
		
		
		
		for (var i=0; i < markers.length ; i++) {
			
			
			
			if( markers[i].markerCategory == cat ) {
		
				markers[i].setVisible(false)
				
			}
	 
		}
	
	};
	
	function show(cat) {
		for (var i=0; i < markers.length ; i++) {
		
			
			if( markers[i].markerCategory == cat ) {
				markers[i].setVisible(true);
			} 
		}
	};
	
	
								
	   
	    	
	   		
	    	box.click(function(){
	    		
	    		var cat = $(this).data("cat");
	    			 
		    	if ($(this).is(':checked')) {
	    	    		
	    	    show(cat);	
				}
	    	
				else {
	    	    			
	    	    hide(cat);
	    	
				}
	    	})
	    	
	   
	   



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
			 
			 
			 ],
			 
		 gridSize: 40
	};
	
    var cluster = function(){ new MarkerClusterer(map, markers, clusterStyles )};
    cluster();
   
	var styles = [
  {
    "featureType": "water",
    "stylers": [
      { "color": "#80c1ff" }
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
      { "color": "#f0f1ff" }
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
  
 
  google.maps.event.addDomListener(window, 'load', mapInitialize);
</script>
<!--<script type="text/javascript">
  function initialize() {
   var myOptions = {
            zoom: 12,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

    // Create the map 
    // No need to specify zoom and center as we fit the map further down.
    var map = new google.maps.Map(document.getElementById("googleMap"), myOptions);
    var pos = new google.maps.LatLng(43.653226 , -79.383184);
    map.setCenter(pos);
 
    // Create the shared infowindow with two DIV placeholders
    // One for a text string, the other for the StreetView panorama.
    var content = document.createElement("DIV");
    var title = document.createElement("DIV");
    content.appendChild(title);
    
    
    var infowindow = new google.maps.InfoWindow({
   content: content
    });



      	

 
    // Define the list of markers.
    // This could be generated server-side with a script creating the array.
   
    









    // Create the markers
    for (index in markers) addMarker(markers[index]);
    function addMarker(data) {

  var image = new google.maps.MarkerImage('<?php echo $base;?>img/map-markers/marker_red2.png',
      // This marker is 20 pixels wide by 32 pixels tall.
      new google.maps.Size(35, 35),
      // The origin for this image is 0,0.
      new google.maps.Point(0,0),
      // The anchor for this image is the base of the flagpole at 0,32.
      new google.maps.Point(0, 32));
  var shadow = new google.maps.MarkerImage('<?php echo $base;?>img/map-markers/marker_shadow.png',
      // The shadow image is larger in the horizontal dimension
      // while the position and offset are the same as for the main image.
      new google.maps.Size(100, 100),
      new google.maps.Point(0,0),
      new google.maps.Point(20,32));
      // Shapes define the clickable region of the icon.
      // The type defines an HTML <area> element 'poly' which
      // traces out a polygon as a series of X,Y points. The final
      // coordinate closes the poly by connecting to the first
      // coordinate.
  var shape = {
      coord: [1, 1, 1, 20, 18, 20, 18 , 1],
      type: 'poly'
  };

   var marker = new google.maps.Marker({
  position: new google.maps.LatLng(data.lat, data.lng),
  map: map,     
  desc: data.desc,   
  title: data.name,
  shadow: shadow,
  icon: image,
  shape: shape
   });
   google.maps.event.addListener(marker, "click", function() {
  
  openInfoWindow(marker);
   });
    }

    // Zoom and center the map to fit the markers
    // This logic could be conbined with the marker creation.
    // Just keeping it separate for code clarity.
  
    
 

    // Handle the DOM ready event to create the StreetView panorama
    // as it can only be created once the DIV inside the infowindow is loaded in the DOM.
   
  
    
    // Set the infowindow content and display it on marker click.
    // Use a 'pin' MVCObject as the order of the domready and marker click events is not garanteed.
    function openInfoWindow(marker) {
   title.innerHTML =  marker.desc +'<div style="clear:both; margin-bottom:20px"></div>';
   infowindow.open(map, marker);
    }
  };
  google.maps.event.addDomListener(window, 'load', initialize);
</script>-->
















<?php $this->load->view('footer_admin'); ?>