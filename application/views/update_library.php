<?php 
$this->load->view('header_admin');
$library_regulations= $this->users->getMetaDataList('library_regulation', 'in_status=1 AND in_library_id="'.$libid.'"', '', '*');
$industries 		= $this->users->getMetaDataList('industry', 'date_start<=CURDATE() AND (date_end="" OR date_end>CURDATE())');
$temp = array();
foreach($industries as $in) {
	array_push($temp, '"'.$in['industryname'].'"');
}
$str_industries 	= implode(",", $temp);

// Get Campus data of the Union and its Training Centres // 
	$rows_campus_names = $this->users->getMetaDataList( 'usermeta', 'meta_key="campus_name" AND meta_value!=""', '', 'meta_value AS campus_name' );
	
// Get Library Images and Videos // 
	$rows_library_images = $this->users->getMetaDataList( 'library_images', 'status=1 AND library_id="'.$libid.'" AND page_id=0 AND paragraph_id=0', '', 'paragraph_image_id, image' );
	$rows_library_videos = $this->users->getMetaDataList( 'library_videos', 'status=1 AND library_id="'.$libid.'" AND page_id=0 AND paragraph_id=0', '', 'paragraph_video_id, video' );
?>
<link rel="stylesheet" href="<?php echo $base;?>css/jquery-ui.css" />

<?php /*<script type="text/javascript" src="<?php echo $base;?>js/jquery/jquery.min.js"></script>*/?>
<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script>
<!-- Start - Fancy box image --> 
	<!-- Add fancyBox main JS and CSS files -->
		<script type="text/javascript" src="<?php echo $base."plugin/fancybox/source/jquery.fancybox.js?v=2.1.5";?>"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo $base."plugin/fancybox/source/jquery.fancybox.css?v=2.1.5";?>" media="screen" />
<!-- End - Fancy box image -->
<script type="text/javascript" src="<?php echo $base;?>js/regulation.js"></script>
<script type="text/javascript">
  $(function() {
  
   $('#country_id').change(function(){
            $country_id = $(this).val();
            $.post('<?php echo $base;?>admin/getRelatedElement', {'table': 'tbl_province', 'field': 'country_id', 'value': $country_id, 'field_fetch': 'provincename'}, function(data){
                $("#province_id").html(data);
            });
        });
        $( ".datestamp" ).datepicker();
        $('#level').change(function(){
            $value = $(this).val();
            if($value==3){
                $('.advanced').show();
            }else{
                $('.advanced').hide();
                $('#not_printable').prop('checked', true);
                $('#not_sendable').prop('checked', true);
            }
        })

    var availableTags = [<?php echo $str_industries;?>];
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }

    $( "#industry_id" )
      // don't navigate away from the field on tab when selecting an item
      .bind( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).data( "ui-autocomplete" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        minLength: 0,
        source: function( request, response ) {
          // delegate back to autocomplete, but extract the last term
          response( $.ui.autocomplete.filter(
            availableTags, extractLast( request.term ) ) );
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
        }
      });
      
    $( "#sector_id" )
      // don't navigate away from the field on tab when selecting an item
      .bind( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).data( "ui-autocomplete" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        source: function( request, response ) {
          $.getJSON( "<?php echo $base;?>ajax/ajax_getSectorList?industry="+$('#industry_id').val(), {
            term: extractLast( request.term )
          }, response );
        },
        search: function() {
          // custom minLength
          var term = extractLast( this.value );
          if ( term.length < 2 ) {
            return false;
          }
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
        }
      }); 
      
    $( "#trade_id" )
      // don't navigate away from the field on tab when selecting an item
      .bind( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).data( "ui-autocomplete" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        source: function( request, response ) {
          $.getJSON( "<?php echo $base;?>ajax/ajax_getTradeList?sector="+$('#sector_id').val()+'&industry='+$('#industry_id').val(), {
            term: extractLast( request.term )
          }, response );
        },
        search: function() {
          // custom minLength
          var term = extractLast( this.value );
          if ( term.length < 2 ) {
            return false;
          }
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
        }
      });           
	});

	function enableLibItems(libTypeId) 
	{
		$("#cmb_related_items"+libTypeId).toggle('100');
		icon = $("#i_"+libTypeId);

		if( icon.hasClass("icon-minus") ) {
			icon.addClass("icon-plus").removeClass("icon-minus");
		} else {
			icon.addClass("icon-minus").removeClass("icon-plus");
		}
	}	
</script>
<div class="info-container">
<div class="document-content">
    <form class="form-horizontal adminfrm" method="post" action="" enctype="multipart/form-data">
        <fieldset>
            <!-- Form Name -->
            <legend>Update Library</legend>
              <!-- Text input-->
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label">Country</label>
                  <div class="controls">
                    <select id="country_id" name="country_id" placeholder="Select Country" class="input-xlarge" required>
                        <?php
                            $countries = $this->users->getMetaDataList('country');
                            foreach($countries as $in):
                            $selected = ($library['country_id']==$in['id'])?'selected="selected"':'';
                        ?>
                	    <option value="<?php echo $in['id'];?>" <?php echo $selected;?>><?php echo $in['countryname'];?></option>
                        <?php endforeach;?>
                    </select>
                  </div>
                </div>                
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label">Province </label>
                  <div class="controls">
                    <select id="province_id" name="province_id" placeholder="Select Province" class="input-xlarge" required>
                        <?php 
                            if((int)$library['province_id']>0){
                                $provinces = $this->users->getRelatedElement('tbl_province', 'country_id', $library['country_id']);
                
                                foreach($provinces as $sc):
                                    $selected = ($library['province_id']==$sc['id'])?'selected="selected"':'';
                        ?>
                        <option value="<?php echo $sc['id'];?>" <?php echo $selected;?>><?php echo $sc['provincename'];?></option>
                        <?php endforeach;                       
                            }
                        ?>                    
                    </select>
                  </div>
                </div>
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="email">Industry</label>
                  <div class="controls">
                    <input id="industry_id" name="industry_id" class="input-xlarge" value="<?php echo $library['industry_id'];?>" required placeholder="ALL" />
                  </div>
                </div>
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="nickname">Sector</label>
                  <div class="controls">
                    <input id="section_id" name="section_id" class="input-xlarge" value="<?php echo $library['section_id'];?>" required placeholder="ALL" />
                  </div>
                </div>
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="firstname">Trade</label>
                  <div class="controls">
                    <input id="trade_id" name="trade_id" class="input-xlarge" value="<?php echo $library['trade_id'];?>" required placeholder="ALL" />  
                  </div>
                </div>
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label">Language</label>
                  <div class="controls">
                    <select id="language" name="language" placeholder="Select Language" class="input-xlarge" required>
                        <?php
                            $languages = $this->users->getMetaDataList('language');
                            foreach($languages as $in):
                            $selected = ($library['language']==$in['abbr'])?'selected="selected"':'';
                        ?>
                	    <option value="<?php echo $in['abbr'];?>" <?php echo $selected;?>><?php echo $in['language'];?></option>
                        <?php endforeach;?>
                    </select>
                  </div>
                </div>
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="nickname">Title</label>
                  <div class="controls">
                    <input id="title" name="title" type="text" placeholder="title" class="input-xlarge" value="<?php echo $library['title'];?>" required/>
                  </div>
                </div>
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="nickname">Brief Description</label>
                  <div class="controls">
                    <textarea id="shortdesc" name="shortdesc" placeholder="Brief Description of library" class="input-xlarge" required><?php echo $library['description'];?></textarea>
                  </div>
                </div>
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="nickname">Keywords</label>
                  <div class="controls">
                    <input id="keywords" name="keywords" type="text" placeholder="Type in Keywords" class="input-xlarge" value="<?php echo $library['keywords'];?>" required/>
                  </div>
                </div>
				<!-- Text input-->
                <div class="control-group">
                  <label class="control-label">Type</label>
                  <div class="controls">
                    <select id="type" name="type" placeholder="Select Type" class="input-xlarge">
                        <?php
						$types = $this->users->getMetaDataList('library_types','library_type_status="1"');
						foreach($types as $in) {
							if( $in['id']!=4 ) {
								$selected = ($library['library_type_id']==$in['id'])?'selected="selected"':'';?>
								<option value="<?php echo $in['id'];?>" <?php echo $selected;?>><?php echo $in['library_type'];?></option>
								<?php 
							}
						}?>
                    </select>
                  </div>
                </div>

				<!-- Alert Images -->
				<div id="id_image_video">
					<div id="id_alert_image_bucket">
						<?php 
						$cnt_libimage = 0;
						if(sizeof($rows_library_images)>0) {
							foreach($rows_library_images AS $key_img => $val_img) {
								$image_id = $val_img['paragraph_image_id'];
								$cnt_libimage++;?>
								<div class="control-group" id="id_div_image_alert<?php echo $cnt_libimage;?>">
								  <label class="control-label" for="">Select Image</label>
								  <div class="controls">
									<input type="file" name="userfile[<?php echo $image_id;?>]" id="alert_image<?php echo $cnt_libimage;?>" class="input-xlarge"/>
									<span id="err_alert_image<?php echo $cnt_libimage;?>"></span>
									<?php 
									if( file_exists(FCPATH.$this->path_upload_paragraph_images.$val_img['image']) ) { ?>
										<a title="Click to see full image" class="fancybox-media" href="<?php echo $base.$this->path_upload_paragraph_images.$val_img['image'];?>" data-fancybox-group="gallery">
											<img class="w45 h40" src="<?php echo $base.$this->path_upload_paragraph_images.$val_img['image'];?>">
										</a>
										<?php 
									}?>
								  </div>
								</div>
								<?php 
							}
						}
						else {?>
							<div class="control-group" id="id_div_image_alert1">
								<label class="control-label" for="">Select Image</label>
								<div class="controls">
									<input type="file" name="userfile[new][]" id="alert_image<?php echo ($cnt_libimage+1);?>" class="input-xlarge"/>
									<span id="err_alert_image<?php echo ($cnt_libimage+1);?>"></span>
								</div>
							</div>
							<?php
							$cnt_libimage = 1;
						}?>
					</div>
					<input type="hidden" id="hidn_alert_image" name="hidn_alert_image" value="<?php echo $cnt_libimage;?>">
					<div class="textright"><input type="button" class="btn" value="Add New Image" onclick="javascript: addMoreAlertImage('<?php echo $cnt_libimage;?>');" /></div>

					<!-- Alert Videos -->
					<div id="id_alert_video_bucket">
						<?php 
						$cnt_libvideo = 0;
						if(sizeof($rows_library_videos)>0) {
							foreach( $rows_library_videos AS $key_libvideo => $val_libvideo ) {
								$video_id 		= $val_libvideo['paragraph_video_id'];
								$video_uploaded = isset($val_libvideo['video']) ? $val_libvideo['video'] : '';
								$cnt_libvideo++;?>
								<div class="control-group" id="id_div_video_alert<?php echo $cnt_libvideo;?>">
									<label class="control-label" for="">Select Video</label>
									<div class="controls">
										<input type="file" name="alert_videoupd[<?php echo $video_id;?>]" id="alert_videoupd<?php echo $cnt_libvideo;?>" class="input-xlarge"/>
										<?php 
										if( file_exists(FCPATH.$this->path_upload_paragraph_images.$video_uploaded) && $video_uploaded ) {?>
											<video controls="controls" width="260" height="180">
												<source src='<?php echo $base.$this->path_upload_paragraph_images.$video_uploaded;?>' type="video/mp4" height="200" width="200">
											</video>
											<?php 
										}?>
										<span id="err_alert_videoupd<?php echo $cnt_libvideo;?>"></span>
									</div>
								</div>
								<?php 
							}
						}
						else {?>
							<div class="control-group" id="id_div_video_alert1">
								<label class="control-label" for="">Select Video</label>
								<div class="controls">
									<input type="file" name="alert_videoupd[new][]" id="alert_videoupd<?php echo ($cnt_libvideo+1);?>" class="input-xlarge"/>
									<span id="err_alert_videoupd<?php echo $cnt_libvideo+1;?>"></span>
								</div>
							</div>
							<?php 
							$cnt_libvideo = 1;
						}?>
					</div>
					<input type="hidden" id="hidn_alert_video" name="hidn_alert_video" value="<?php echo $cnt_libvideo;?>">
					<div class="textright"><input type="button" class="btn" value="Add New Video" onclick="javascript: addMoreAlertVideo('<?php echo $cnt_libvideo;?>');" /></div>
				</div>
				
				<div class="control-group cls-campus" style="display:none;">
					<label class="control-label">Select Campus</label>
					<div class="controls">
						<div id="id_div_campus_msg"></div>
						<input type="checkbox" id="cmb_library_campus_all" value="all">&nbsp;All
						<?php 
						foreach( $rows_campus_names AS $val_campus_names ) {
							$arr_campus_names = (isset($val_campus_names['campus_name'])&&$val_campus_names['campus_name']) ? explode(",", $val_campus_names['campus_name']) : array();
							foreach( $arr_campus_names AS $val_campus ) {
								$val_campus = trim($val_campus);
								$checked = in_array($val_campus, $arr_library_campus) ? 'checked="checked"' : '';?>
								<br><input type="checkbox" value="<?php echo $val_campus;?>" <?php echo $checked;?> name="cmb_library_campus[]" id="cmb_library_campus"><?php echo "&nbsp;".$val_campus;?>
							<?php
							}
						}
						?>
						<script type="text/javascript">
							$("#cmb_library_campus_all").click(function() {						
								$('input[id="cmb_library_campus"]').each(function () { 
									if( $("#cmb_library_campus_all").is(':checked')) {
										$(this).prop('checked', true);
									}
									else {
										$(this).prop('checked', false);
									}
								});
							});
						</script>
					</div>
				</div>
				<!-- Text input-->
				<div class="control-group">
					<label class="control-label">Related Type</label>
					<div class="controls">
						<?php 
						$cnt_libitems = 0;
						$arrBox = array();
						$types = $this->users->getMetaDataList('library_types','library_type_status="1"');
						
						foreach($types as $key_type => $value_libtype) {
							$id 				= $value_libtype['id'];
							if( "5" == $id ) { // INSPECTIONS //
								$rows_lib_contents 	= $this->users->getMetaDataList( 'inspection', "
										status=1 AND (date_inspection_end>'".date('Y-m-d')."' OR date_inspection_end = '0000-00-00' OR date_inspection_end IS NULL)", 'ORDER BY st_inspection_name ', 'id, st_inspection_name AS title' );
							}
							else if( "4" == $id ) { // PROCEDURES //
								$rows_lib_contents 	= $this->users->getMetaDataList( 'procedures', "status=1 AND in_created_by=12 AND st_procedure_status='completed' AND (dt_date_end>".date('Y-m-d')." OR (dt_date_end = '0000-00-00' OR dt_date_end IS NULL))", 'ORDER BY st_procedure_name', 'id, st_procedure_name AS title' );
							}
							else {
								$where				= "library_type_id='".$id."' AND library_id != '".$libid."' AND status=1";
								$rows_lib_contents 	= $this->users->getMetaDataList( "library", $where, 'ORDER BY title', 'library_id AS id, title'  );
							}
							
							
							$rows_libtypes 		= $this->users->getElementByID( "tbl_library_types", $id );
							$library_type_title = $rows_libtypes['library_type'];
							
							$library_id 		= isset($libid) ? $this->libraries->getRelatedLibraryIdsOfLibrary( $libid, $id ) : '';
							
							if( $cnt_libitems%2==0 ) {?>
							<div>
							<?php 
							}
							?>
								<div class="span12 pull-left metro">
									<div id='id_libtype<?php echo $id;?>'>
										<?php
										if( sizeof($rows_lib_contents) ) {
										?>
											<span style="cursor:pointer;" onclick='javascript:enableLibItems("<?php echo $id;?>");' title="<?php echo $library_type_title."&nbsp;-&nbsp;".sizeof($rows_lib_contents);?> item(s)">
												<i id="i_<?php echo $id;?>" class="icon-plus"></i>
												<?php echo "<b>".$library_type_title."</b>&nbsp;-&nbsp;".sizeof($rows_lib_contents)."&nbsp;item(s)"?>
											</span>
										<?php 
										}
										else {?>
											<span style="cursor:auto;" title="<?php echo $library_type_title."&nbsp;-&nbsp;".sizeof($rows_lib_contents);?> item(s)">
												<i id="i_<?php echo $id;?>" class="icon-minus"></i>
												<?php echo "<b>".$library_type_title."</b>&nbsp;-&nbsp;".sizeof($rows_lib_contents)."&nbsp;item(s)"?>
											</span>
										<?php 
										}?>
									</div>
									<select style="display:none;" id="cmb_related_items<?php echo $id?>" name="cmb_related_items[<?php echo $id?>][]" placeholder="Select Related Item(s)" multiple class="input-xxlarge" size="10">
										<?php 
										if( sizeof($rows_lib_contents) ) {
											$selected = '';
											foreach($rows_lib_contents as $key => $val) {
												if( $libid != $val['library_id'] ) {
													$lib_id 	= $val['id'];
													$lib_title 	= $val['title'];
													if( $library_id ) {
														$selected 	= in_array($lib_id, $library_id) ? 'selected="selected"' : '';
													}
													if( $selected ) {
													?>
														<script type="text/javascript">
															$("#cmb_related_items<?php echo $id;?>").show();
															$("#i_<?php echo $id;?>").addClass('icon-minus');
														</script>
													<?php 
													}
													?>
													<option value="<?php echo $lib_id;?>" title="<?php echo $lib_title;?>" <?php echo $selected;?>><?php echo $lib_title;?></option>
													<?php 
												}
											}
										}
										else {?>
											<script type="text/javascript">$("#cmb_related_items<?php echo $id;?>").hide();</script>
											<option value="" disabled>No data available</option>
										<?php 
										}?>
									</select>
								</div>
							<?php 
							
							if( $cnt_libitems%2==0 ) {?>
							</div>
							<?php 
							}
							$cnt_libitems++;
						}?>
					</div>
				</div>
				
				
				<div class="control-group">
				<label class="control-label">Related Regulation</label>
				<!--- RELATED REGULATION -->
				<div id="id_main_regulation">
				<?php 
				if( sizeof($library_regulations) && $library_regulations[0] ) {
					$total_libreg = sizeof($library_regulations);
					foreach( $library_regulations AS $key_proc_reg => $val_proc_reg ) {
						$cnt_libreg 	= ($key_proc_reg+1);
						$regno 		= ($val_proc_reg['st_regulation_number']) ? $val_proc_reg['st_regulation_number'] : '';
						$section 	= ($val_proc_reg['st_section']) ? $val_proc_reg['st_section'] : '';
						$subsection = ($val_proc_reg['st_subsection']) ? $val_proc_reg['st_subsection'] : '';
						$item 		= ($val_proc_reg['st_item']) ? $val_proc_reg['st_item'] : '';
						$subitem 	= ($val_proc_reg['st_subitem']) ? $val_proc_reg['st_subitem'] : '';
						?>
						<div class="control-group" id="id_div_libreg<?php echo $cnt_libreg;?>">
							<a style="float:right;" href="javascript:void(0);" onclick="javascript:deleteSection('id_div_libreg<?php echo $cnt_libreg;?>');" title="Delete Regulation">Delete</a>

							<div class="control-group">
							  <div class="controls">
								<?php $rows_regno = $this->users->getMetaDataList("regulation_contents",'1','','st_regulation_number', 'st_regulation_number');?>
								<input type="text" value="<?php echo $regno;?>" placeholder="Regulation Number" name="cmb_regulation_number[]" id="cmb_regulation_number<?php echo $cnt_libreg;?>" list="cmb_regno_list<?php echo $cnt_libreg;?>" onblur="getSection('cmb_regulation_number<?php echo $cnt_libreg;?>','cmb_section_list<?php echo $cnt_libreg;?>', '<?php echo $cnt_libreg;?>');">
								<datalist id="cmb_regno_list<?php echo $cnt_libreg;?>">										
								<?php 
								foreach($rows_regno AS $reg) {
									$selected = ($reg['st_regulation_number']==$regno)?'selected="selected"':'';?>
									<option value="<?php echo $reg['st_regulation_number'];?>" <?php echo $selected;?>><?php echo $reg['st_regulation_number'];?></option>
								<?php
								}?>
								</datalist>
							  </div>
							<div>&nbsp;</div>
							  <div class="controls">
								<?php $rows_section = $this->users->getMetaDataList("regulation_sections", 'st_regulation_number="'.$regno.'"', 
									'ORDER BY 
									CAST(st_section AS UNSIGNED)=0, CAST(st_section AS UNSIGNED), LEFT(st_section,1), 
									CAST(MID(st_section,2) AS UNSIGNED),ABS(st_section)', 
									"st_section", "st_section");?>
								<input type="text" placeholder="Section" value="<?php echo $section;?>" name="cmb_section[]" id="cmb_section<?php echo $cnt_libreg;?>" list="cmb_section_list<?php echo $cnt_libreg;?>" onblur="getSubsection('cmb_section<?php echo $cnt_libreg;?>','cmb_subsection_list<?php echo $cnt_libreg;?>', '<?php echo $cnt_libreg;?>');">
								<datalist id="cmb_section_list<?php echo $cnt_libreg;?>">
								<?php 
								foreach($rows_section AS $val_section) {
									if( $val_section['st_section'] ) {
										$selected = ($val_section['st_section']==$section)?'selected="selected"':'';?>
										<option value="<?php echo $val_section['st_section'];?>" <?php echo $selected;?>><?php echo $val_section['st_section'];?></option>
									<?php 
									}
								}?>
								</datalist>
								
								<?php $rows_subsection = $this->users->getMetaDataList("regulation_sections",
										'st_regulation_number="'.$regno.'" AND st_section="'.$section.'"'
										, 'ORDER BY 
										CAST(st_subsection AS UNSIGNED)=0, CAST(st_subsection AS UNSIGNED), LEFT(st_subsection,1), 
										CAST(MID(st_subsection,2) AS UNSIGNED),ABS(st_subsection)', 'st_subsection', 'st_subsection');?>
								<input type="text" placeholder="Sub Section" value="<?php echo $subsection;?>" name="cmb_subsection[]" id="cmb_subsection<?php echo $cnt_libreg;?>" list="cmb_subsection_list<?php echo $cnt_libreg;?>" onblur="getItem('cmb_subsection<?php echo $cnt_libreg;?>','cmb_item_list<?php echo $cnt_libreg;?>', '<?php echo $cnt_libreg;?>');">
								<datalist id="cmb_subsection_list<?php echo $cnt_libreg;?>">
									<?php 
									foreach($rows_subsection AS $val_subsec) {
										if( $val_subsec['st_subsection'] ) {
											$selected = ($val_subsec['st_subsection']==$subsection)?'selected="selected"':'';?>
											<option value="<?php echo $val_subsec['st_subsection'];?>" <?php echo $selected;?>><?php echo $val_subsec['st_subsection'];?></option>
										<?php 
										}
									}?>
								</datalist>
							  </div>
							  <div>&nbsp;</div>
							  <div class="controls">
								<?php $rows_item = $this->users->getMetaDataList("regulation_sections", 
										'st_regulation_number="'.$regno.'" AND st_section="'.$section.'"
										AND st_subsection="'.$subsection.'"'
										, 'ORDER BY CAST(st_item AS UNSIGNED)=0, CAST(st_item AS UNSIGNED), LEFT(st_item,1), 
										CAST(MID(st_item,2) AS UNSIGNED),ABS(st_item)', 
										'st_item', 'st_item');?>
								<input type="text" placeholder="Item" value="<?php echo $item;?>" name="cmb_item[]" id="cmb_item<?php echo $cnt_libreg;?>" list="cmb_item_list<?php echo $cnt_libreg;?>" onblur="getSubitem('cmb_item<?php echo $cnt_libreg;?>','cmb_subitem<?php echo $cnt_libreg;?>', '<?php echo $cnt_libreg;?>');">
								<datalist id="cmb_item_list<?php echo $cnt_libreg;?>">
									<?php 
									foreach($rows_item AS $val_item) {
										if( $val_item['st_item'] ) {
											$selected = ($val_item['st_item']==$item)?'selected="selected"':'';?>
											<option value="<?php echo $val_item['st_item'];?>" <?php echo $selected;?>><?php echo $val_item['st_item'];?></option>
										<?php 
										}
									}?>
								</datalist>
								
								<?php $rows_subitem = $this->users->getMetaDataList("regulation_sections",
										'st_regulation_number="'.$regno.'" AND st_section="'.$section.'"
										AND st_subsection="'.$subsection.'" AND st_item="'.$item.'"'
										, 'ORDER BY CAST(st_subitem AS UNSIGNED)=0, CAST(st_subitem AS UNSIGNED), LEFT(st_subitem,1), 
										CAST(MID(st_subitem,2) AS UNSIGNED),ABS(st_subitem)','st_subitem', 'st_subitem');?>

								<input type="text" placeholder="Sub Item" value="<?php echo $subitem;?>" name="cmb_subitem[]" id="cmb_subitem<?php echo $cnt_libreg;?>" list="cmb_subitem_list<?php echo $cnt_libreg;?>">
								<datalist id="cmb_subitem_list<?php echo $cnt_libreg;?>">								
									<?php 
									foreach($rows_subitem AS $val_subitem) {
										if( $val_subitem['st_subitem'] ) {
											$selected = ($val_subitem['st_subitem']==$subitem)?'selected="selected"':'';?>
											<option value="<?php echo $val_subitem['st_subitem'];?>" <?php echo $selected;?>>
												<?php echo $val_subitem['st_subitem'];?>
											</option>
										<?php 
										}
									}?>
								</datalist>
							  </div>
							</div>
						</div>
				<?php
				}?>
				<input type="hidden" id="hidn_libreg" value="<?php echo $total_libreg;?>">
				<?php
				}
				else {
					$total_libreg = 1;
					?>
					<div class="control-group" id="id_div_libreg1">
						<div class="controls">
							<input type="text" value="" placeholder="Regulation Number" name="cmb_section[]" id="cmb_regulation_number1" list="cmb_regno_list1" onblur="getSection('cmb_regulation_number1','cmb_section_list1',1);">
							<datalist id="cmb_regno_list1"></datalist>
						  </div>
						<div>&nbsp;</div>
						 <div class="controls">
							<input type="text" value="" placeholder="Section" name="cmb_section[]" id="cmb_section1" list="cmb_section_list1" onblur="getSubsection('cmb_section1','cmb_subsection_list1',1);">
							<datalist id="cmb_section_list1"></datalist>
							<input type="text" value="" placeholder="Sub Section" name="cmb_subsection[]" id="cmb_subsection1" list="cmb_subsection_list1" onblur="getItem('cmb_subsection1','cmb_item_list1',1);">
							<datalist id="cmb_subsection_list1"></datalist>
						  </div>
						<div>&nbsp;</div>
						   <div class="controls">
							<input type="text" value="" placeholder="Item" name="cmb_item[]" id="cmb_item1" list="cmb_item_list1" onblur="getSubitem('cmb_item1','cmb_subitem_list1',1);">
							<datalist id="cmb_item_list1"></datalist>									
							<input type="text" value="" placeholder="Sub Item" name="cmb_subitem[]" id="cmb_subitem1" list="cmb_subitem_list1">
							<datalist id="cmb_subitem_list1"></datalist>
						  </div>
					</div>
					<input type="hidden" id="hidn_libreg" value="<?php echo $total_libreg;?>">
					<script type="text/javascript"> $(document).ready(function () { getRegulationNumber('cmb_regno_list1'); });</script>
				<?php
				}?>	
				</div>
				<div class="textright"><input data-click="transform" type="button" class="icon-plus-2" value="Add Regulation" onclick="javascript: addMoreRegulationItem('<?php echo $total_libreg;?>');" /></div>
				
                <!-- Text input-->
				<br><div>&nbsp;</div>
                <div class="control-group">
                  <label class="control-label" for="nickname">Plain Price</label>
                  <div class="controls">
                    <input id="price" name="price" type="text" placeholder="Type in Plain Price" class="input-xlarge textright" value="<?php echo $library['price'];?>" required/>
                  </div>
                </div>
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="nickname">Earning Points</label>
                  <div class="controls">
                    <input id="credits" name="credits" type="text" placeholder="Type in Earning Points" class="input-xlarge textright" value="<?php echo $library['credits'];?>" />
                  </div>
                </div>
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="nickname">Credits for Buying</label>
                  <div class="controls">
                    <input id="creditsbuy" name="creditsbuy" type="text" placeholder="Type in Credits for Buying" class="input-xlarge textright" value="<?php echo $library['creditsbuy'];?>" />
                  </div>
                </div>
                <!-- Multiple Radios (inline) -->
                <div class="control-group">
                    <label class="control-label">Government Required?</label>
                    <div class="controls">
                        <label class="radio inline"><input type="radio" name="is_gov_required" value="y" <?php if($library['is_gov_required']=="y"):?>checked="checked"<?php endif;?>/> y</label> 
                        <label class="radio inline"><input type="radio" name="is_gov_required" value="n"  <?php if($library['is_gov_required']!="y"):?>checked="checked"<?php endif;?>/> n</label>
                    </div>
                </div>
                <!-- Multiple Radios (inline) -->
                <!-- Multiple Radios (inline) -->
                <div class="control-group advanced <?php if($library['library_type_id']!="Advanced"):?>hide<?php endif;?>">
                    <label class="control-label">Allow Printing?</label>
                    <div class="controls">
                        <label class="radio inline"><input type="radio" name="is_printable" value="y"<?php if($library['is_printable']=="y"):?>checked="checked"<?php endif;?>/> y</label> 
                        <label class="radio inline"><input type="radio" id="not_printable" name="is_printable" value="n" <?php if($library['is_printable']!="y"):?>checked="checked"<?php endif;?>/> n</label>
                    </div>
                </div><!-- Multiple Radios (inline) -->
                <!-- Multiple Radios (inline) -->
                <div class="control-group advanced <?php if($library['library_type_id']!="Advanced"):?>hide<?php endif;?>">
                    <label class="control-label">Allow Send to User?</label>
                    <div class="controls">
                        <label class="radio inline"><input type="radio" name="is_sendable" value="y" <?php if($library['is_sendable']=="y"):?>checked="checked"<?php endif;?>/> y</label> 
                        <label class="radio inline"><input type="radio" id="not_sendable" name="is_sendable" value="n" <?php if($library['is_sendable']!="y"):?>checked="checked"<?php endif;?>/> n</label>
                    </div>
                </div><!-- Multiple Radios (inline) --> 
                <div class="control-group">
                    <label class="control-label">Start Date</label>
                    <div class="controls">
                        <input id="date_start" name="date_start" type="text" placeholder="Start Date" class="input-xlarge datestamp" value="<?php echo date("m/d/Y", strtotime($library['date_start']));?>" required/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">End Date</label>
                    <div class="controls">
                        <input id="date_end" name="date_end" type="text" placeholder="End Date" class="input-xlarge datestamp" value="<?php echo $library['date_end']=="0000-00-00"?'':date("m/d/Y", strtotime($library['date_end']));?>"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Status</label>
                    <div class="controls">
                        <label class="radio inline"><input type="radio" name="status" value="1" <?php if($library['status']>0):?>checked="checked"<?php endif;?>/> Active</label> 
                        <label class="radio inline"><input type="radio" name="status" value="0" <?php if($library['status']<1):?>checked="checked"<?php endif;?> <?php if($is_sold>0):?>disabled="disabled"<?php endif;?>/> Inactive</label>
                    </div>
                </div>                
                <div class="text-center">
                    <div style=" display:inline	">* - required fields</div>
                    <input type="submit" class="btn btn-info" value="Update">
                    <input type="hidden" name="lib_id" value="<?php echo $library['library_id'];?>" />
                </div>
        </fieldset>
		<input type="hidden" name="hidn_errmsg_duedilegence" id="hidn_errmsg_duedilegence" value="">
    </form>
</div>
</div>   
<style type="text/css">
.ui-widget input, .ui-widget select, .ui-widget textarea, .ui-widget button {
    border: 1px solid #CCCCCC;
    border-radius: 4px 4px 4px 4px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
    color: #555555;
    font-family: Verdana,Arial,sans-serif;
    font-size: 14px;
    height: 20px;
    padding: 4px 6px;
    transition: border 0.2s linear 0s, box-shadow 0.2s linear 0s;
}
#bodyhrq a.ui-corner-all{
    color: #555555;
}
</style>
<script type="text/javascript" src="<?php echo $base;?>js/common.js"></script>

<?php $this->load->view('footer_admin');?>
<script type="text/javascript">

	function deleteAlertImage( id )
	{
		$('#'+id).slideUp('medium', function () {
			$("#"+id).html('');
			$("#"+id).remove('');
		});
		$cnt_libimage = $('#hidn_alert_image').val();
		$('#hidn_alert_image').val( parseInt($cnt_libimage-1) );
	}
	function deleteAlertVideo( id )
	{
		$('#'+id).slideUp('medium', function () {
			$("#"+id).html('');
			$("#"+id).remove('');
		});
		$cnt_libvideo = $('#hidn_alert_video').val();
		$('#hidn_alert_video').val( parseInt($cnt_libvideo-1) );
	}

	function addMoreAlertImage()
	{
		var cntImage 	= parseInt( $('#hidn_alert_image').val() );
		cntImage = (cntImage+1);
		var imageAppend = '<div class="control-group" id="id_div_image_alert'+cntImage+'"><label class="control-label" for="image">Select Image</label>';
		imageAppend += '<div class="controls"><input name="userfile[new][]" id="alert_image'+cntImage+'" type="file" class="input-xlarge"/>';
		imageAppend += '<span id="err_alert_image'+cntImage+'"></span>';
		imageAppend += '&nbsp;<button type="button" class="btn" del-count="'+cntImage+'" title="Delete Image" onclick=javascript:deleteAlertImage("id_div_image_alert'+cntImage+'");>Delete Image</button>';
		imageAppend += '</div></div>';

		$('#id_alert_image_bucket').append( imageAppend );
		$('#hidn_alert_image').val(cntImage);
	}

	function addMoreAlertVideo()
	{
		var cntVideo 	= parseInt( $('#hidn_alert_video').val() );
		cntVideo = (cntVideo+1);

		var videoAppend = '<div class="control-group" id="id_div_video_alert'+cntVideo+'">';
		videoAppend += '<label class="control-label" for="">Select Video</label>';
		videoAppend += '<div class="controls">';
		videoAppend += '<input type="file" name="alert_videoupd[new][]" id="alert_videoupd'+cntVideo+'" class="input-xlarge">';
		videoAppend += '<span id="err_alert_videoupd'+cntVideo+'"></span>';
		videoAppend += '&nbsp;<button type="button" class="btn" del-count="'+cntVideo+'" title="Delete Video" onclick=javascript:deleteAlertVideo("id_div_video_alert'+cntVideo+'");>Delete Video</button>';
		videoAppend += '</div></div>';

		$('#id_alert_video_bucket').append( videoAppend );
		$('#hidn_alert_video').val(cntVideo);
	}
	
	
	$("#id_image_video").hide();
	var libtype = '<?php echo $library['library_type_id'];?>';
	if( libtype=='54' || libtype=='55' || libtype=='56' ) {
		$(".cls-campus").show();
		$("#id_image_video").show();
	}
	else {
		$(".cls-campus").hide();
		$("#id_image_video").hide();
	}
	$("#type").change(function() {
		var libtype = $(this).val();
		if( libtype=='54' || libtype=='55' || libtype=='56' ) {
			$(".cls-campus").show();
			$("#id_image_video").show();
		}
		else {
			$(".cls-campus").hide();
			$("#id_image_video").hide();
		}
	});
	
	
	
	$('input[type=submit]').click(function(e){
		$errmsg_duedilegence = $("#hidn_errmsg_duedilegence").val();
		if( $errmsg_duedilegence != '' ) {
			alert( "Please check the Invalid value(s) selected" );
			$("#cmb_regulation_number1").focus();
			return false;
		}
		
		// Library Type Validation // 
			var libtype = $("#type").val();
			if( libtype=='54' || libtype=='55' || libtype=='56' ) {
				if (!$('#cmb_library_campus').is(':checked')) {
					$("#id_div_campus_msg").html("Please select atleast 1 Campus");
					$("#id_div_campus_msg").prop("class", "fgred");
					$('#cmb_library_campus_all').focus();
					e.preventDefault();
				}
			}
	
		// Image Validation //
			var $error_img 		= 0;
			var img_unionalerts = '';
			var allowed_alertimg_extensions = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
			
			$("#id_alert_image_bucket").find('input[type=file]').each(function() {
				img_unionalerts = $(this).attr("id");
				id_img_unionalerts = $("#"+img_unionalerts);
				if( id_img_unionalerts.val()!='' && ($.inArray(id_img_unionalerts.val().split('.').pop().toLowerCase(), allowed_alertimg_extensions) == -1) ) {
					$('#err_'+img_unionalerts).html("<br>\nOnly (jpeg, jpg, png, gif, bmp) formats are allowed.");
					$('#err_'+img_unionalerts).addClass("text-error");
					$error_img++;
				}
				else {
					$('#err_'+img_unionalerts).html("");
				}
			});
			if( $error_img > 0 ) { e.preventDefault(); }
			
		// Video Validation //
			var $error_vid 		= 0;
			var vid_unionalerts = '';
			var allowed_alertvid_extensions = ['mp4', 'mov', 'mpeg', 'mp3', 'avi', 'wmv', 'm4v'];
			$("#id_alert_video_bucket").find('input[type=file]').each(function() {
				vid_unionalerts = $(this).attr("id");
				id_vid_unionalerts = $("#"+vid_unionalerts);
				// console.log( vid_unionalerts );
				if( id_vid_unionalerts.val()!='' && ($.inArray(id_vid_unionalerts.val().split('.').pop().toLowerCase(), allowed_alertvid_extensions) == -1) ) {
					$('#err_'+vid_unionalerts).html("<br>\nOnly (mp4, mov, mpeg, mp3, avi, wmv, m4v) formats are allowed.");
					$('#err_'+vid_unionalerts).addClass("text-error");
					$error_vid++;
				}
				else {
					$('#err_'+vid_unionalerts).html("");
				}
			});			
			if( $error_vid > 0 ) { e.preventDefault(); }
    });
</script>