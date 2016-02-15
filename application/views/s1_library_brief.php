<?php $this->load->view('header_admin'); ?>
<div class="homebg">
<div class="container-fluid">
    <div class="popup">
    	<!--<div class="header-title"><h1><?php echo $library_type;?> sample</h1></div>-->
        <div class="middle-content">
            <div class="left1">
            	<div class="news1title">
            		<p class="textalign-left">
                		<span class="contents"><?php echo $library_title;?></span>
                	</p>
                </div>
            </div>
            <div class="right">
            	<div class="data-container">
                	<div class="links-top">
                    	<div class="leftlinks">
                        	<p class="defination"><a href="<?php echo $base."admin/library_page_contents?libtype=".$library_type_id."&libid=".$library_id."&section=desc";?>">DESCRIPTION</a></p>
                            <p class="hazardinfo"><a href="<?php echo $base."admin/library_page_contents?libtype=".$library_type_id."&libid=".$library_id."&section=info";?>"><?php echo $library_type."&nbsp;CONTENT";?></a></p>
                        </div>
                        <div class="rightlinks">
                       		<p class="media"><a href="#<?php echo $base."admin/library_page_contents?libtype=".$library_type_id."&libid=".$library_id;?>">MEDIA 1</a></p>
                            <p class="numbers"><a href="#">2</a></p>
                            <p class="numbers"><a href="#">3</a></p>
                            <p class="numbers1"><a href="#">4</a></p>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="links-bottom">
                    	<ul>
							<?php
							$valid_lib_types = array("ohsa","hazards","procedures");
							$linkurl = '';
							for( $cnt_libtype=0; $cnt_libtype<sizeof($rows_library_types); $cnt_libtype++ ) {	
								$library_type_id 		= $rows_library_types[$cnt_libtype]['id'];
								$library_type 			= $rows_library_types[$cnt_libtype]['library_type'];
								$library_type_lower 	= strtolower($library_type);

								if( in_array($library_type_lower, $valid_lib_types ) ) {
									$display_library_type 	= strtoupper($library_type);
									if( "procedures" == $library_type_lower ) {
										$display_library_type 	= "proce<br>dures";
									}
									
									$has_libtype_contents 	= $this->libraries->hasRelatedContentsOnLibType( $library_type_id );

									if( isset($has_libtype_contents) && $has_libtype_contents ) {
										$class_name 		= $library_type_lower;
										$linkurl 			= $base."admin/libraries?libtype=".$library_type_id;
									}
									else {
										$linkurl 			= '#';
										$class_name 		= $library_type_lower.'-disable';
									}
									?>
									<li><a href="<?php echo $linkurl;?>" class="<?php echo $class_name;?>"><?php echo $display_library_type;?></a></li>
								<?php
								}
							}?>
							
							<li><a href="#" class="regulations-disable">regu<br>lations</a></li>
							<li class="last"><a href="#" class="injuries-disable">injuries</a></li>
							
							<?php /*<li><a href="#" class="ohsa-disable">ohsa</a></li>
                            <li><a href="#" class="regulations-disable">regu<br>lations</a></li>
                            <li><a href="#" class="procedures-disable">proce<br>dures</a></li>
                            <li class="last"><a href="#" class="injuries-disable">injuries</a></li>*/?>
						</ul>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="footer-title-brief"><h2>***<?php echo $library_type;?> available for purchase inside of s1 library.<br>All content related can be purchased from my library too.</h2></div>-->
    </div>
</div>
</div>
<?php $this->load->view('footer_admin'); ?>


