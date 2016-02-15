<?php $this->load->view('header_admin'); ?>
<h3>MY LIBRARY</h3>
<!--Start Library Category Filter -->
<?php $this->load->view('library_filter'); ?>
<!--End Library Category Filter -->  
<!-- Start First content row -->
<div id="row-1" class="content-row" >
    <div class="profile-content-heading">
        <h6>MY COMPLETED</h6>
        <h5>DOCUMENTS</h5>
    </div>
    <!-- Begin mylibrary items section -->
    <ul class="inline item-group" id="completed-wrapper">
        <!-- Mylibrary item-->
        <?php 
        foreach($documents_completed as $doc) {
			?>
			<li>
				<div class="library-item <?php if(!($doc['date_end']=="0000-00-00" || $doc['date_end']>date('Y-m-d'))):?>expired<?php endif;?>">
					<?php if($doc['date_end']=="0000-00-00" || $doc['date_end']>date('Y-m-d')):?>
					<a href="<?php echo $base;?>admin/documentsNew?lib=<?php echo $doc['library_id'];?>"><img src="<?php echo $base;?>img/icons/icon-<?php echo strtolower($doc['language']);?>.png" /></a>
					<div class="library-item-info">
						<a href="<?php echo $base;?>admin/documentsNew?lib=<?php echo $doc['library_id'];?>"><?php echo $doc['title'];?></a>
					</div>
					<?php else:?>
					<img src="<?php echo $base;?>img/icons/icon-<?php echo strtolower($doc['language']);?>.png" />
					<div class="library-item-info">
						<?php echo $doc['title'];?>
					</div>
					<?php endif;?>
					<div class="clear"></div>
				</div>
			</li>
        <?php 
		}?>
        <!-- end mylibrary item -->
    </ul>
    <!-- End mylibrary items section -->
</div>
<!-- End first content row -->
<!-- Start First content row -->
<div id="row-2" class="content-row" >
    <div class="profile-content-heading">
        <h6>MY ASSIGNED</h6>
        <h5>DOCUMENTS</h5>
    </div>
    <!-- Begin mylibrary items section -->
    <ul class="inline item-group">
        <!-- Mylibrary item-->
        <?php 
		foreach($documents_assigned as $doc) {?>
			<li>
				<div class="library-item <?php if(!($doc['date_end']=="0000-00-00" || $doc['date_end']>date('Y-m-d'))):?>expired<?php endif;?>">
					<?php 
					
					if($doc['date_end']=="0000-00-00" || $doc['date_end']>date('Y-m-d')) {
						if( '6' == $doc['library_type_id'] ) {
							// Get Investigation details from Library Id
								$rows_invforms = $this->users->getMetaDataList('inv_investigation_forms', 'in_inv_form_id="'.$doc['in_inv_form_id'].'"', '', 'in_inv_form_id, st_inv_form_no, is_inv_form_sealed');
								
								if( isset($rows_invforms) && sizeof($rows_invforms) ) {
									$cnt_inv_forms=0;
									foreach( $rows_invforms AS $val_invforms ) {
										$inv_form_id 		= $rows_invforms[$cnt_inv_forms]['in_inv_form_id'];
										$inv_form_no 		= $rows_invforms[$cnt_inv_forms]['st_inv_form_no'];
										$inv_form_sealed 	= $rows_invforms[$cnt_inv_forms]['is_inv_form_sealed'];
										$inv_form_sealed 	= ($inv_form_sealed=='1')?'SEALED':'OPEN';
										?>
										<a href="<?php echo $base;?>admin/cover_page_investigation?invformid=<?php echo $inv_form_id;?>"><img src="<?php echo $base;?>img/icons/icon-<?php echo strtolower($doc['language']);?>.png" /></a>
										<div class="library-item-info">
											<p><strong><a href="<?php echo $base;?>admin/cover_page_investigation?invformid=<?php echo $inv_form_id;?>"><?php echo "Investigation: ".$inv_form_no;?></a> [<?php echo $inv_form_sealed;?>] </strong></p>
										</div>
										<?php 
										$cnt_inv_forms++;
									}
								}
						}
						else {
						?>
							<a href="<?php echo $base;?>admin/documentsNew?lib=<?php echo $doc['library_id'];?>"><img src="<?php echo $base;?>img/icons/icon-<?php echo strtolower($doc['language']);?>.png" /></a>
							<div class="library-item-info">
								<p><strong><a href="<?php echo $base;?>admin/documentsNew?lib=<?php echo $doc['library_id'];?>"><?php echo $doc['title'];?></a></strong></p>
								<h5><?php echo number_format($doc['progress'], 0);?>%</h5>
							</div>
						<?php 
						}
					}
					else {?>
						<img src="<?php echo $base;?>img/icons/icon-<?php echo strtolower($doc['language']);?>.png" />
						<div class="library-item-info">
							<p><strong><?php echo $doc['title'];?></strong></p>
							<h5><?php echo number_format($doc['progress'], 0);?>%</h5>
						</div>
						<?php 
					}?>
				</div>
			</li>
        <!-- end mylibrary item -->
        <?php 
		}?>
    </ul>
    <!-- End mylibrary items section -->
</div>
<!-- End first content row -->

<!-- Start First content row -->
<div id="row-3" class="content-row" >
    <div class="profile-content-heading">
        <h6>MY PURCHASED</h6>
        <h5>DOCUMENTS</h5>
    </div>
    <!-- Begin mylibrary items section -->
    <ul class="inline item-group">
        <?php 
		foreach($documents_purchased as $doc) {?>
			<!-- Mylibrary item-->
			<li>
				<div class="library-item <?php if(!($doc['date_end']=="0000-00-00" || $doc['date_end']>date('Y-m-d'))):?>expired<?php endif;?>">
				<?php 
				if( '6' == $doc['library_type_id'] ) {
					// Get Investigation details from Library Id
						$rows_invforms = $this->users->getMetaDataList('inv_investigation_forms', 'in_inv_form_id="'.$doc['investigation_id'].'"', '', 'in_inv_form_id, st_inv_form_no, is_inv_form_sealed');
						
						if( isset($rows_invforms) && sizeof($rows_invforms) ) {
							$cnt_inv_forms=0;
							foreach( $rows_invforms AS $val_invforms ) {
								$inv_form_id 		= $rows_invforms[$cnt_inv_forms]['in_inv_form_id'];
								$inv_form_no 		= $rows_invforms[$cnt_inv_forms]['st_inv_form_no'];
								$inv_form_sealed 	= $rows_invforms[$cnt_inv_forms]['is_inv_form_sealed'];
								$inv_form_sealed 	= ($inv_form_sealed=='1')?'SEALED':'OPEN';
								?>
								<a href="<?php echo $base;?>admin/cover_page_investigation?invformid=<?php echo $inv_form_id;?>"><img src="<?php echo $base;?>img/icons/icon-<?php echo strtolower($doc['language']);?>.png" /></a>
								<div class="library-item-info">
									<p><strong><a href="<?php echo $base;?>admin/cover_page_investigation?invformid=<?php echo $inv_form_id;?>"><?php echo "Investigation: ".$inv_form_no;?></a> [<?php echo $inv_form_sealed;?>] </strong></p>
								</div>
								<?php 
							}
						}
				}
				else {
					?>
						<?php if($doc['date_end']=="0000-00-00" || $doc['date_end']>date('Y-m-d')):?>
						<a href="<?php echo $base;?>admin/documentsNew?lib=<?php echo $doc['lib_id'];?>"><img src="<?php echo $base;?>img/icons/icon-<?php echo strtolower($doc['language']);?>.png" /></a>
						<div class="library-item-info">
							<p><strong><a href="<?php echo $base;?>admin/documentsNew?lib=<?php echo $doc['lib_id'];?>"><?php echo $doc['lib_title'];?></a></strong></p>
							<h5><?php echo number_format($doc['progress'], 0);?>%</h5>
						</div>
						<?php else:?>
						<img src="<?php echo $base;?>img/icons/icon-<?php echo strtolower($doc['language']);?>.png" />
						<div class="library-item-info">
							<p><strong><?php echo $doc['lib_title'];?></strong></p>
							<h5><?php echo number_format($doc['progress'], 0);?>%</h5>
						</div>
						<?php endif;?>
					<?php 
				}
				?>
				</div>
			</li>
			<!-- end mylibrary item -->
        <?php
		}?>
    </ul>
    <!-- End mylibrary items section -->
</div>
<!-- End first content row -->
<?php $this->load->view('footer_admin'); ?>