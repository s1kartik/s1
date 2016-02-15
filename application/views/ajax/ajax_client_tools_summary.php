
			
						
			

			<div class="grid fluid">
			<span class="span4">PROCEDURES : </span>
			<span class="span1 "><strong><a href='#procedureModal' data-toggle='modal' class="fg-white"><?php echo $total_procedure;?></a></strong></span>
		  <!--start modal PROCEDURE page-->
			<div id="procedureModal" class="modal hide fade fg-white" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-header bg-red">
					<h3 id="myModalLabel">PROCEDURE<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
				</div>
			  <div class="modal-body bg-black">
				<div class="row-fluid">
					<?php 
					if( $total_procedure ) {?>
						<table class="table table-bordered">
							<thead class="bg-black"><tr><th>Title</th><th>Date Opened</th><th>Total hrs spend</th></tr></thead>
							<?php 
							foreach( $consultant_libraries as $val_consultant_libraries ) {
								$library_section 	= isset($val_consultant_libraries->st_library_section) ? $val_consultant_libraries->st_library_section : '';
								if( "new_procedure" == $library_section ) {
									$library_title 	= isset($val_consultant_libraries->library_title) ? $val_consultant_libraries->library_title : 'New';
									$hours_spend 	= isset($val_consultant_libraries->in_hours_spend) ? $val_consultant_libraries->in_hours_spend : '';
									$date_performed = isset($val_consultant_libraries->dt_date_performed) ? $val_consultant_libraries->dt_date_performed : '';
									$id 			= isset($val_consultant_libraries->id) ? $val_consultant_libraries->id : '';?>
									<tr>
										<td class="bg-black"><?php echo $library_title;?></td>
										<td class="bg-black"><?php echo $date_performed;?></td>
										<td class="bg-black">
										<span class="proc_hrs_spend<?php echo $id;?>"><?php echo $hours_spend;?></span>&nbsp;
										<a href="#" class="fg-white" onclick="javascript:change_tools_hrsspend('proc','edit','<?php echo $id;?>');">Edit</a>&nbsp;|&nbsp;<a href="#" class="fg-white" onclick="javascript:change_tools_hrsspend('proc','save', '<?php echo $id;?>');">Save</a>
										</td>
									</tr>
									<?php 
								}
							}?>
						</table>
						<?php 
					}
					else {
						echo "<p class='fg-white'>No Procedures found.</p>";
					}?>
				</div>
			</div>
			<div class="modal-footer bg-red"><button class="btn" data-dismiss="modal">Close</button></div>
			</div>
			
		  <!--end modal PROCEDURE page--> 
		  <span class="span1 "> <strong><a href='<?php echo ($total_procedure) ? "#procedureStatModal" : '';?>' data-toggle='modal' class="fg-white">STAT</a></strong></span>
		  </div>			
			<div class="grid fluid">
			<span class="span4">SAFETY TALKS : </span>
			<span class="span1 "><strong><a href='#saftalksModal' data-toggle='modal' class="fg-white"><?php echo $total_safetytalks;?></a></strong></span>
			<!--start modal SAFETY TALKS page-->
			<div id="saftalksModal" class="modal hide fade fg-white" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-header bg-red">
					<h3 id="myModalLabel">SAFETY TALKS<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
				</div>
			  <div class="modal-body bg-black">
				<div class="row-fluid">
					<?php 
					if( $total_safetytalks ) {?>
						<table class="table table-striped table-bordered table-condensed table-hover">
							<thead class="bg-black"><tr><th>Title</th><th>Date Opened</th><th>Total hrs spend</th></tr></thead>
							<?php 
							foreach( $consultant_libraries as $val_consultant_libraries ) {
								$library_section 	= isset($val_consultant_libraries->st_library_section) ? $val_consultant_libraries->st_library_section : '';
								if( "normal_safetytalks" == $library_section ) {
									$library_id 	= isset($val_consultant_libraries->in_library_id) ? $val_consultant_libraries->in_library_id : '';
									$safetytalks_title = $this->users->getMetaDataList('safetytalks_information', 'in_safetytalks_id="'.$library_id.'"', '', 'st_title');
									$safetytalks_title = (isset($safetytalks_title[0]['st_title'])&&$safetytalks_title[0]['st_title']) ? $safetytalks_title[0]['st_title'] : "New Safetytalks";
									$hours_spend 		= isset($val_consultant_libraries->in_hours_spend) ? $val_consultant_libraries->in_hours_spend : '';
									$date_performed 	= isset($val_consultant_libraries->dt_date_performed) ? $val_consultant_libraries->dt_date_performed : '';
									$id 			= isset($val_consultant_libraries->id) ? $val_consultant_libraries->id : '';?>
									<tr>
										<td class="bg-black"><?php echo $safetytalks_title;?></td>
										<td class="bg-black"><?php echo $date_performed;?></td>
										<td class="bg-black">
										<span class="safety_hrs_spend<?php echo $id;?>"><?php echo $hours_spend;?></span>&nbsp;
										<a href="#" class="fg-white" onclick="javascript:change_tools_hrsspend('safety', 'edit', '<?php echo $id;?>');">Edit</a>&nbsp;|&nbsp;<a href="#" class="fg-white" onclick="javascript:change_tools_hrsspend('safety','save','<?php echo $id;?>');">Save</a>
										</td>
									</tr>
									<?php
								}
							}?>
						</table>
						<?php 
					}
					else {
						echo "<p class='fg-white'>No Safetytalks found.</p>";
					}?>
				</div>
			</div>
			<div class="modal-footer bg-red"><button class="btn" data-dismiss="modal">Close</button></div>
			</div>
			<!--end modal SAFETY TALKS page--> 
			<span class="span1 "> <strong><a href='<?php echo ($total_safetytalks) ? "#saftalksStatModal" : '';?>' data-toggle='modal' class="fg-white">STAT</a></strong></span>
			</div>
			
			<div class="grid fluid">
					<span class="span4">INVESTIGATIONS : </span>
					<span class="span1 "> <strong><a href='#investigationModal' data-toggle='modal' class="fg-white"><?php echo $total_investigations;?></a></strong></span>
			<!--start modal Investigation page-->
			<div id="investigationModal" class="modal hide fade fg-white" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-header bg-red">
					<h3 id="myModalLabel">INVESTIGATIONS<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
				</div>
			  <div class="modal-body bg-black">
				<div class="row-fluid">
					<?php 
					if( $total_investigations ) {?>
						<table class="table table-striped table-bordered table-condensed table-hover">
							<thead class="bg-black"><tr><th>Title</th><th>Date Opened</th><th>Total hrs spend</th></tr></thead>
							<?php 
							foreach( $consultant_libraries as $val_consultant_libraries ) {
								$library_section 	= isset($val_consultant_libraries->st_library_section) ? $val_consultant_libraries->st_library_section : '';
								if( "Investigations" == $library_section ) {
									$library_title 	= isset($val_consultant_libraries->library_title) ? $val_consultant_libraries->library_title : 'New';
									$hours_spend 		= isset($val_consultant_libraries->in_hours_spend) ? $val_consultant_libraries->in_hours_spend : '';
									$date_performed 	= isset($val_consultant_libraries->dt_date_performed) ? $val_consultant_libraries->dt_date_performed : '';
									$id 			= isset($val_consultant_libraries->id) ? $val_consultant_libraries->id : '';?>
									<tr>
										<td class="bg-black"><?php echo $library_title;?></td>
										<td class="bg-black"><?php echo $date_performed;?></td>
										<td class="bg-black">
										<span class="inv_hrs_spend<?php echo $id;?>"><?php echo $hours_spend;?></span>&nbsp;
										<a href="#" class="fg-white" onclick="javascript:change_tools_hrsspend('inv', 'edit', '<?php echo $id;?>');">Edit</a>&nbsp;|&nbsp;<a href="#" class="fg-white" onclick="javascript:change_tools_hrsspend('inv','save','<?php echo $id;?>');">Save</a>
										</td>
									</tr>
									<?php
								}
							}?>
						</table>
						<?php 
					}
					else {
						echo "<p class='fg-white'>No Investigations found.</p>";
					}?>
				</div>
			</div>
			<div class="modal-footer bg-red"><button class="btn" data-dismiss="modal">Close</button></div>
			</div>
			<!--end modal Investigation page--> 
			<span class="span1 "><strong><a href='<?php echo ($total_investigations) ? "#investigationStatModal" : '';?>' data-toggle='modal' class="fg-white">STAT</a></strong></span>
			</div>
			
			<div class="grid fluid">
			<span class="span4">INSPECTIONS : </span>
			<span class="span1 "><strong><a href='#inspectionsModal' data-toggle='modal' class="fg-white"><?php echo $total_inspections;?></a></strong></span>
			<!--start modal Inspections page-->
			<div id="inspectionsModal" class="modal hide fade fg-white" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-header bg-red">
				<h3 id="myModalLabel">INSPECTIONS<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
				</div>
			  <div class="modal-body bg-black">
				<div class="row-fluid">
					<?php 
					if( $total_inspections ) {?>
					<!--<a href="" rel="35" style="opacity:0.8;" class="insp tile half-library bg-darker description  ui-draggable" data-toggle="popover" data-content="<h6>Condition Of Ladder</h6>" data-original-title="<h6>Condition Of Ladder</h6>" data-placement="bottom" data-trigger="hover" libtype_section="normal_inspection" title="Condition Of Ladder">
					<i class="icon on-left"><img src="<?php echo $base;?>img/inspection-item-icons/LADDERS.png" width="40"></i>
					<span class="list-title fg-white text-center"><small>Condition Of Lad..</small></span>
					<div class="brand">
						<span class="label fg-white text-center"><small>5 points</small></span>
						<span class="badge bg-red" id="balance_normal_inspection35">3</span>
					</div>
					</a>-->
					<?php 
					}
					else {
						echo "<p class='fg-white'>No Inspections found.</p>";
					}?>
				</div>
			</div>
			<div class="modal-footer bg-red"><button class="btn" data-dismiss="modal">Close</button></div>
			</div>
			
			<!--end modal Inspections page--> 
			<span class="span1"><strong><a href='<?php echo ($total_inspections) ? "#inspectionsStatModal" : '';?>' data-toggle='modal' class="fg-white">STAT</a></strong></span>
			</div>
		
			