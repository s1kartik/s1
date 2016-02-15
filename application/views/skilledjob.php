<?php $this->load->view('header_admin'); ?>

<h3>SKILLED JOB SECTION</h3>
<!--***********************************************************-->
<!--Start Construction Skilled Library Content -->
 	<?php
//Content coming from OYAPConstruction.docx
// Main titles: 
//Trade - trade
//Description - descr
//Required Education, Training, Experience and Skills - required
//Obtaining Trade Certification - obtaining
//Other Related Job Titles/Related Trades - related
//Potential Employers - potential
//Salary - sal
//////////////////////////////////////////////////////////////////
//Content coming from OYAPConstruction.docx
//BEGIN TRADE 1
// Trade: Architectural Glass and Metal Technician
$constr[1]['family'] = "Construction";
$constr[1]['trade'] = "Architectural Glass and Metal Technician";
$constr[2]['trade'] = "Brick and Stone Mason";
$constr[3]['trade'] = "Cement (Concrete) Finisher";
$constr[4]['trade'] = "Cement Mason";
$constr[5]['trade'] = "Construction Boiler Maker";
$constr[6]['trade'] = "Construction Millwright";
$constr[7]['trade'] = "Drywall Finisher and Plasterer";
$constr[8]['trade'] = "Drywall, Acoustic and Lathing Applicator";
$constr[9]['trade'] = "Electrician - Construction and Maintenance";
$constr[10]['trade'] = "Electrician - Residential and Rural";
$constr[11]['trade'] = "Exterior Insulated Finish Systems Mechanic";
$constr[12]['trade'] = "Floor Covering Installer";
$constr[13]['trade'] = "General Carpenter";
$constr[14]['trade'] = "Heat and Frost Insulator";
$constr[15]['trade'] = "Heavy Equipment Operator: Dozer";
$constr[16]['trade'] = "Heavy Equipment Operator: Excavator";
$constr[17]['trade'] = "Heavy Equipment Operator: Tractor Loader Backhoe";
$constr[18]['trade'] = "Hoisting Engineer: Mobile Crane Operator";
$constr[19]['trade'] = "Hoisting Engineer: Tower Crane Operator";
$constr[20]['trade'] = "Ironworker";
$constr[21]['trade'] = "Native Residential Construction Worker";
$constr[22]['trade'] = "Painter and Decorator: Commercial and Residential";
$constr[23]['trade'] = "Painter and Decorator: Industrial";
$constr[24]['trade'] = "Plumber";
$constr[25]['trade'] = "Powerline Technician (Lineworker - Power)";
$constr[26]['trade'] = "Precast Concrete Erector";
$constr[27]['trade'] = "Refrigeration and Air Conditioning Systems Mechanic";
$constr[28]['trade'] = "Reinforcing Rod Worker";
$constr[29]['trade'] = "Residential Air Conditioning Systems Mechanic";
$constr[30]['trade'] = "Restoration Mason";
$constr[31]['trade'] = "Roofer";
$constr[32]['trade'] = "Sheet Metal Worker";
$constr[33]['trade'] = "Sprinkler and Fire Protection Installer";
$constr[34]['trade'] = "Steamfitter";
$constr[35]['trade'] = "Terrazzo, Tile and Marble Setter";
//END TRADE 35
//////////////////////////////////////////////////////////////////////
?>
<!--End  Construction Skilled Library Content -->
<!--***********************************************************-->
<!--Start  Trade Certification Service Skilled Library Content -->
	<?php
//////////////////////////////////////////////////////////////////
//Content coming from OYAP Trade Certification Service.docx
//BEGIN TRADE 1
// Trade: Appliance Service Technician
$tradecert[1]['family'] = "Trade Certification Service";
$tradecert[1]['trade'] = "Appliance Service Technician";
$tradecert[2]['trade'] = "Arborist";
//END TRADE 2
///////////////////////////////////////////////////////////////////////
?>
<!--End  Trade Certification Service Skilled Library Content -->
<!--***********************************************************-->
<!--Start Industrial Skilled Library Content -->
	<?php
//////////////////////////////////////////////////////////////////
//Content coming from OYAP Industrial.docx
//BEGIN TRADE 1
// Trade: Aircraft Maintenance Engineer
$ind[1]['family'] = "Industrial";
$ind[1]['trade'] = "Aircraft Maintenance Engineer";
$ind[2]['trade'] = "Bearings Mechanic";
$ind[3]['trade'] = "Computer Numeric Control Programmer (CNC)";
$ind[4]['trade'] = "Draftsperson - Mechanical";
$ind[5]['trade'] = "Draftsperson - Plastic Mould Design";
$ind[6]['trade'] = "Draftsperson - Tool and Die Design";
$ind[7]['trade'] = "Electric Motor Systems Technician";
$ind[8]['trade'] = "Electrical Control (Machine) Builder";
$ind[9]['trade'] = "Elevating Device Mechanic";
$ind[10]['trade'] = "Facilities Mechanic/Technician";
$ind[11]['trade'] = "Fitter Welder";
$ind[12]['trade'] = "Fitter-Assembler (Motor Assembly)";
$ind[13]['trade'] = "General Machinist";
$ind[14]['trade'] = "Hydraulic/Pneumatic Mechanic";
$ind[15]['trade'] = "Industrial Electrician";
$ind[16]['trade'] = "Industrial Instrument Mechanic";
$ind[17]['trade'] = "Industrial Mechanic Millwright";
$ind[18]['trade'] = "Locksmith";
$ind[19]['trade'] = "Machine Tool Builder & Integrator";
$ind[20]['trade'] = "Metal Fabricator (Fitter)";
$ind[21]['trade'] = "Mould Maker";
$ind[22]['trade'] = "Mould or Die Finisher";
$ind[23]['trade'] = "Optics Technician (Lens and Prism Maker)";
$ind[24]['trade'] = "Packaging Machine Mechanic";
$ind[25]['trade'] = "Pattern Maker";
$ind[26]['trade'] = "Precision Metal Fabricator";
$ind[27]['trade'] = "Process Operator";
$ind[28]['trade'] = "Salary Expectations";
$ind[29]['trade'] = "Railway Car Technician";
$ind[30]['trade'] = "Roll Grinder/Turner";
$ind[31]['trade'] = "Saw Filer/Fitter";
$ind[32]['trade'] = "Street Railway Electrician Linesperson";
$ind[33]['trade'] = "Surface Blaster";
$ind[34]['trade'] = "Surface Mount Assembler";
$ind[35]['trade'] = "Tool & Cutter Grinder";
$ind[36]['trade'] = "Tool & Die Maker";
$ind[37]['trade'] = "Tool and Gauge Inspector";
$ind[38]['trade'] = "Tool/Tooling Maker";
$ind[39]['trade'] = "Water Well Driller";
$ind[40]['trade'] = "Welder";
///////////////////////////////////////////////////////////////////////?>
<!--End Industrial Skilled Library Content -->
<!--***********************************************************-->
<!--Start Motive Power Sector Skilled Library Content -->
	<?php

//////////////////////////////////////////////////////////////////
//Content coming from OYAPMotive Power.docx
//BEGIN TRADE 1
// Trade: Agricultural Equipment Technician
$mpower[1]['family'] = "Motive Power Sector";
$mpower[1]['trade'] = "Agricultural Equipment Technician";
$mpower[2]['trade'] = "Alignment and Brakes Technician";
$mpower[3]['trade'] = "Auto Body and Collision Damage Repairer (Br. 1) Auto Body Repairer (Br.2)";
///////////////////////////////////////////////////////////////////////
?>
<!--End Motive Power Sector Skilled Library Content -->
<!--***********************************************************-->

<!--Start Library Category Filter -->

<?php 

	$this->load->view('family-filter.php');
	?>

<!--End Library Category Filter --> 

<!-- ***********************************-->
<!-- CONSTRUCTION -->
<!-- ***********************************-->

<!-- Start First content row construction-->
<a name="constskill" id="constskill"></a>
<div id="row-constr" class="content-row" >
  <div class="profile-content-heading">
    <h4><?php echo $constr[1]['family'];?></h4>
  </div>
  
  
  
  <!-- Begin skillset items section -->
  <ul class="inline item-group">
    
    <!--  item-->
    <?php 
	$result = count($constr);
	$i = 1;
	while ($i <= $result):
			?><li>
				<div class='library-item'>
					<a href="<?php echo $base;?>admin/constr_skilled_trade?item=<?php echo $i;?>">
						<img src='<?php echo $base;?>img/icons/icon-en.png' />
					</a>
					<div class="library-item-info">
						<p>
						<strong> 
							<a href="<?php echo $base;?>admin/constr_skilled_trade?item=<?php echo $i;?>" >
							<?php echo $constr[$i]['trade'];?>
							 </a>
						</strong>
						</p>
        			</div>
      			</div>
    		</li>
        <?php    
		$i++;
	endwhile;

?>
    
    <!--  item --> 
        
  </ul>
  
  <!-- End skillset items section --> 
  
</div>

<!-- End first content row construction--> 

<!-- ***********************************-->
<!-- INDUSTRIAL -->
<!-- ***********************************-->
<!-- Start Second content row Industrial-->
<a name="indskill" id="indskill"></a>
<div id="row-2" class="content-row" >
  <div class="profile-content-heading">
    <h4><?php echo $ind[1]['family'];?></h4>
  </div>
  
  
  
  <!-- Begin skillset items section -->
  <ul class="inline item-group">
    
    <!--  item-->
    <?php 
	$result = count($ind);
	$i = 1;
	while ($i <= $result):
			?><li>
				<div class='library-item'>
					<a href="<?php echo $base;?>admin/ind_skilled_trade?item=<?php echo $i;?>">
						<img src='<?php echo $base;?>img/icons/icon-en.png' />
					</a>
					<div class="library-item-info">
						<p>
						<strong>
							<a href="<?php echo $base;?>admin/ind_skilled_trade?item=<?php echo $i;?>">
							<?php echo $ind[$i]['trade'];?>
							 </a>
						</strong>
						</p>
        			</div>
      			</div>
    		</li>
        <?php    
		$i++;
	endwhile;
?>
    
    <!--  item --> 
        
  </ul>
  
  <!-- End skillset items section --> 
  
</div>

<!-- End second content row industrial--> 

<!-- ***********************************-->
<!-- MOTIVE POWER -->
<!-- ***********************************-->
<!-- Start THIRD content row MOTIVE POWER-->
<a name="mpowerskill" id="mpowerskill"></a>
<div id="row-3" class="content-row" >
  <div class="profile-content-heading">
    <h4><?php echo $mpower[1]['family'];?></h4>
  </div>
  
  
  
  <!-- Begin skillset items section -->
  <ul class="inline item-group">
    
    <!--  item-->
    <?php 
	$result = count($mpower);
	$i = 1;
	while ($i <= $result):
			?><li>
				<div class='library-item'>
					<a href="<?php echo $base;?>admin/mpower_skilled_trade?item=<?php echo $i;?>">
						<img src='<?php echo $base;?>img/icons/icon-en.png' />
					</a>
					<div class="library-item-info">
						<p>
						<strong>
							<a href="<?php echo $base;?>admin/mpower_skilled_trade?item=<?php echo $i;?>">
							<?php echo $mpower[$i]['trade'];?>
							 </a>
						</strong>
						</p>
        			</div>
      			</div>
    		</li>
        <?php    
		$i++;
	endwhile;
?>
    
    <!--  item --> 
        
  </ul>
  
  <!-- End skillset items section --> 
  
</div>

<!-- End THIRD content row MOTIVE POWER--> 

<!-- ***********************************-->
<!-- TRADE CERTIFICATION SERVICE -->
<!-- ***********************************-->
<!-- Start FOURTH content row TRADE CERTIFICATION-->
<a name="certskill" id="certskill"></a>
<div id="row-1" class="content-row" >
  <div class="profile-content-heading">
    <h4><?php echo $tradecert[1]['family'];?></h4>
  </div>
  
  
  
  <!-- Begin skillset items section -->
  <ul class="inline item-group">
    
    <!--  item-->
    <?php 
	$result = count($tradecert);
	$i = 1;
	while ($i <= $result):
			?><li>
				<div class='library-item'>
					<a href="<?php echo $base;?>admin/cert_skilled_trade?item=<?php echo $i;?>">
						<img src='<?php echo $base;?>img/icons/icon-en.png' />
					</a>
					<div class="library-item-info">
						<p>
						<strong>
							<a href="<?php echo $base;?>admin/cert_skilled_trade?item=<?php echo $i;?>">
							<?php echo $tradecert[$i]['trade'];?>
							 </a>
						</strong>
						</p>	
        			</div>
      			</div>
    		</li>
        <?php    
		$i++;
	endwhile;
?>
    
    <!--  item --> 
        
  </ul>
  
  <!-- End skillset items section --> 
  
</div>

<!-- End FOURTH content row TRADE CERTIFICATION--> 
<?php $this->load->view('footer_admin'); ?>


