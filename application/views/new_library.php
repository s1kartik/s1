<?php $this->load->view('header_admin');
$industries = $this->users->getMetaDataList('industry', 'date_start<=CURDATE() AND (date_end="" OR date_end>CURDATE())');
$temp = array();
foreach($industries as $in) {
	array_push($temp, '"'.$in['industryname'].'"');
}
$str_industries = implode(",", $temp);

// Get Campus data of the Union and its Training Centres // 
	$rows_campus_names = $this->users->getMetaDataList( 'usermeta', 'meta_key="campus_name" AND meta_value!=""', '', 'meta_value AS campus_name' );
?>
<link rel="stylesheet" href="<?php echo $base;?>css/jquery-ui.css" />
<script type="text/javascript" src="<?php echo $base;?>js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/regulation.js"></script>
<script type="text/javascript">
  $(function() {
	getRegulationNumber('cmb_regno_list1');
		$('#btn_finish').hide();
        $('#country_id').change(function(){
            $country_id = $(this).val();
            $.post('<?php echo $base;?>admin/getRelatedElement', {'table': 'tbl_province', 'field': 'country_id', 'value': $country_id, 'field_fetch': 'provincename'}, function(data){
                $("#province_id").html(data);
            });
        });
        $( ".datestamp" ).datepicker();
        $('#level').change(function(){
            $value = $(this).val();
            if($value == 3){
                $('.advanced').show();
            }else{
                $('.advanced').hide();
                $('#not_printable').prop('checked', true);
                $('#not_sendable').prop('checked', true);
            }
        })

		$('#type').change(function(){
            var libtype = $(this).val();
            if(libtype == "6") {
				$('#btn_next').hide();
				$('#btn_finish').show();
			}
			else {
				$('#btn_next').show();
				$('#btn_finish').hide();
			}
        });		
    	
			
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
            <legend>Create Library</legend>
              <!-- Text input-->
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label">Country</label>
                  <div class="controls">
                    <select id="country_id" name="country_id" placeholder="Select Country" class="input-xlarge" required>
                        <option value="">-select-</option>
                        <?php
                            $countries = $this->users->getMetaDataList('country');
                            foreach($countries as $in):
                        ?>
                	    <option value="<?php echo $in['id'];?>"><?php echo $in['countryname'];?></option>
                        <?php endforeach;?>
                    </select>
                  </div>
                </div>                
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label">Province </label>
                  <div class="controls">
                    <select id="province_id" name="province_id" placeholder="Select Province" class="input-xlarge" required>
                    </select>
                  </div>
                </div>
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="email">Industry</label>
                  <div class="controls ui-widget">
                    <input id="industry_id" name="industry_id" class="input-xlarge" value="" required placeholder="ALL" />
                  </div>
                </div>
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="nickname">Sector</label>
                  <div class="controls ui-widget">
                    <input id="section_id" name="section_id" class="input-xlarge" value="" placeholder="ALL" required />
                  </div>
                </div>
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="firstname">Trade</label>
                  <div class="controls ui-widget">
                    <input id="trade_id" name="trade_id" class="input-xlarge" value="" placeholder="ALL" required />
                  </div>
                </div>
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label">Language</label>
                  <div class="controls">
                    <select id="language_id" name="language_id" placeholder="Select Language" class="input-xlarge" required>
                        <?php 
                            $languages = $this->users->getMetaDataList('language');
                            foreach($languages as $in):
                        ?>
                	    <option value="<?php echo $in['abbr'];?>"><?php echo $in['language'];?></option>
                        <?php endforeach;?>
                    </select>
                  </div>
                </div>
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="nickname">Title</label>
                  <div class="controls">
                    <input id="title" name="title" type="text" placeholder="title" class="input-xlarge" value="" required/>
                  </div>
                </div>
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="nickname">Brief Description</label>
                  <div class="controls">
                    <textarea id="shortdesc" name="shortdesc" placeholder="Brief Description of library" class="input-xlarge" required></textarea>
                  </div>
                </div>
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="nickname">Keywords</label>
                  <div class="controls">
                    <input id="keywords" name="keywords" type="text" placeholder="Type in Keywords" class="input-xlarge" required/>
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
							if( $in['id']!=4 ) {?>
								<option value="<?php echo $in['id'];?>"><?php echo $in['library_type'];?></option>
								<?php 
							}
						}?>
                    </select>
                  </div>
                </div>
				

				<!-- Alert Images -->
				<div id="id_image_video">
					<div id="id_alert_image_bucket">
						<?php $cnt_alert_image = 0;?>
						<div class="control-group" id="id_div_image_alert1">
							<label class="control-label" for="">Select Image</label>
							<div class="controls">
								<input type="file" name="userfile[]" id="alert_image<?php echo ($cnt_alert_image+1);?>" class="input-xlarge"/>
								<span id="err_alert_image<?php echo ($cnt_alert_image+1);?>"></span>
							</div>
						</div>
					</div>
					<input type="hidden" id="hidn_alert_image" name="hidn_alert_image" value="<?php echo ($cnt_alert_image+1);?>">
					<div class="textright">
						<input type="button" class="btn" value="Add New Image" onclick="javascript: addMoreAlertImage('<?php echo ($cnt_alert_image+1);?>');" />
					</div>

					<!-- Alert Videos -->
					<?php $cnt_alert_video = 0;?>
					<div id="id_alert_video_bucket">
						<div class="control-group" id="id_div_video_alert1">
							<label class="control-label" for="">Select Video</label>
							<div class="controls">
								<input type="file" name="alert_videoupd[]" id="alert_videoupd<?php echo ($cnt_alert_video+1);?>" class="input-xlarge"/>
								<span id="err_alert_videoupd<?php echo ($cnt_alert_video+1);?>"></span>
							</div>
						</div>
					</div>
					<input type="hidden" id="hidn_alert_video" name="hidn_alert_video" value="<?php echo ($cnt_alert_video+1);?>">
					<div class="textright"><input type="button" class="btn" value="Add New Video" onclick="javascript: addMoreAlertVideo('<?php echo $cnt_alert_video;?>');" /></div>
				</div>
					
				
				
				<div class="control-group cls-campus" style="display:none;">
					<label class="control-label">Select Campus</label>
					<div class="controls">
						<div id="id_div_campus_msg"></div>
						<input type="checkbox" id="cmb_library_campus_all" value="all">&nbsp;All
						<?php 
						foreach( $rows_campus_names AS $val_campus_names ) {
							$arr_campus_names = (isset($val_campus_names['campus_name'])&&$val_campus_names['campus_name']) ? explode(",", $val_campus_names['campus_name']) : array();
							foreach( $arr_campus_names AS $val_campus ) {?>
								<br><input type="checkbox" value="<?php echo $val_campus;?>" name="cmb_library_campus[]" id="cmb_library_campus"><?php echo "&nbsp;".$val_campus;?>
							<?php
							}
						}?>
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
				
				<div class="control-group">
					<label class="control-label">Related Type</label>
					<div class="controls">
						<?php
						$cnt_libitems = 0;
						$arrBox = array();
						$types = $this->users->getMetaDataList('library_types','library_type_status="1"');
						
						foreach($types as $key_type => $value_libtype) {
							$id 				= $value_libtype['id'];
							if( "4" == $id ) { // PROCEDURES //
								$rows_lib_contents 	= $this->users->getMetaDataList( 'procedures', "status=1 AND in_created_by=12 AND st_procedure_status='completed' AND (dt_date_end>".date('Y-m-d')." OR (dt_date_end='0000-00-00' OR dt_date_end IS NULL))", '', 'id, st_procedure_name AS title' );
							}
							else if( "5" == $id ) { // INSPECTIONS //
								$rows_lib_contents 	= $this->users->getMetaDataList( 'inspection', "status=1 
										AND (date_inspection_end>".date('Y-m-d')." OR date_inspection_end = '0000-00-00')", '', 'id, st_inspection_name AS title' );
							}
							else {
								$rows_lib_contents 	= $this->users->getMetaDataList( 'library', "library_type_id = '".$id."' AND status=1", '', 'library_id AS id, title'  );
							}
							$rows_libtypes 		= $this->users->getElementByID('tbl_library_types',$id);
							$library_type_title = $rows_libtypes['library_type'];
							$library_id 		= isset($libid) ? $this->libraries->getRelatedLibraryIdsOfLibrary( $libid, $value_libtype ) : '';
							
							if( $cnt_libitems%2==0 )
							{?>
							<div>
							<?php 
							}
							?>
							<div class="span6 pull-left metro">
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
								<select style="display:none;" id="cmb_related_items<?php echo $id?>" name="cmb_related_items[<?php echo $id?>][]" placeholder="Select Related Item(s)" multiple class="input-xlarge">
									<?php 
									if( sizeof($rows_lib_contents) ) {
										$selected = '';
										foreach($rows_lib_contents as $key => $val) {
											$lib_id 	= $val['id'];
											$lib_title 	= $val['title'];
											if( $library_id ) {
												$selected 	= in_array($lib_id, $library_id) ? 'selected="selected"' : '';
											}
											?>
											<option value="<?php echo $lib_id;?>" title="<?php echo $lib_title;?>" <?php echo $selected;?>><?php echo $lib_title;?></option>
										<?php 
										}
									}
									else {?>
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
						}
						?>
					</div>
				</div>
<!-- **********************   MOCKUP REGULATION  *************************** -->
			<div class="control-group">
				<label class="control-label">Related Regulation</label>
				<div id="id_main_regulation">
					<div class="control-group" id="id_div_libreg1">
						<div class="controls">
							<select name="cmb_regulation_number[]" id="cmb_regulation_number1" onchange="getSection('cmb_regulation_number1','cmb_section1',1);"><option value="">-Regulation Number-</option></select>
						</div>
						<div>&nbsp;</div>
						<div class="controls">
							<select name="cmb_section[]" id="cmb_section1" onchange="getSubsection('cmb_section1','cmb_subsection1',1);"><option value="">-Section-</option></select>
							<select name="cmb_subsection[]" id="cmb_subsection1" onchange="getItem('cmb_subsection1','cmb_item1',1);"><option value="">-Sub Section-</option></select>
						 </div>
						<div>&nbsp;</div>
							  <div class="controls">
								<select name="cmb_item[]" id="cmb_item1" onchange="getSubitem('cmb_item1','cmb_subitem1',1);"><option value="">-Item-</option></select>
								<select name="cmb_subitem[]" id="cmb_subitem1"><option value="">-Sub Item-</option></select>
							  </div>
					</div>
				</div>
				<div class="textright"><input data-click="transform" type="button" class="icon-plus-2" value="Add Regulation" onclick="javascript: addMoreRegulationItem(1);" /></div>
				<input type="hidden" id="hidn_libreg" value="1">
			</div>
            
<!--- ************************ END MOCKU REGULATION ********************** ---->
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="price">Plain Price</label>
                  <div class="controls">
                    <input id="price" name="price" type="text" placeholder="Type in Plain Price" class="input-xlarge textright"  required/>
                  </div>
                </div>
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="nickname">Earning Points</label>
                  <div class="controls">
                    <input id="credits" name="credits" type="text" placeholder="Type in Earning Points" class="input-xlarge textright" />
                  </div>
                </div>
                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="nickname">Credits for Buying</label>
                  <div class="controls">
                    <input id="creditsbuy" name="creditsbuy" type="text" placeholder="Type in Credits for Buying" class="input-xlarge textright" />
                  </div>
                </div>
                <!-- Multiple Radios (inline) -->
                <div class="control-group">
                    <label class="control-label">Government Required?</label>
                    <div class="controls">
                        <label class="radio inline"><input type="radio" name="is_gov_required" value="y" /> y</label> 
                        <label class="radio inline"><input type="radio" name="is_gov_required" value="n" checked="checked"/> n</label>
                    </div>
                </div>
                <!-- Multiple Radios (inline) -->
                <!-- Multiple Radios (inline) -->
                <div class="control-group advanced hide">
                    <label class="control-label">Allow Printing?</label>
                    <div class="controls">
                        <label class="radio inline"><input type="radio" name="is_printable" value="y"> y</label> 
                        <label class="radio inline"><input type="radio" name="is_printable" id="not_printable" value="n" checked="checked"> n</label>
                    </div>
                </div><!-- Multiple Radios (inline) -->
                <!-- Multiple Radios (inline) -->
                <div class="control-group advanced hide">
                    <label class="control-label">Allow Send to User?</label>
                    <div class="controls">
                        <label class="radio inline"><input type="radio" name="is_sendable" value="y" > y</label> 
                        <label class="radio inline"><input type="radio" name="is_sendable" value="n" id="not_sendable" checked="checked"> n</label>
                    </div>
                </div><!-- Multiple Radios (inline) --> 
                <div class="control-group">
                    <label class="control-label">Start Date</label>
                    <div class="controls">
                        <input id="date_start" name="date_start" type="text" placeholder="Start Date" class="input-xlarge datestamp" value="<?php echo date("m/d/Y");?>" required/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">End Date</label>
                    <div class="controls">
                        <input id="date_end" name="date_end" type="text" placeholder="End Date" class="input-xlarge datestamp" value=""/>
                    </div>
                </div> 
                <div class="text-center">
                    <div style=" display:inline	">* - required fields</div>
                    <input type="submit" id="btn_next" class="btn btn-info" value="Next">
					<input type="submit" id="btn_finish" class="btn" value="Finish" name="submit">
                    <button type="reset" class="btn">Reset</button>
                </div>
        </fieldset>
		<input type="hidden" name="hidn_errmsg_duedilegence" id="hidn_errmsg_duedilegence" value="">
    </form>
</div>
</div>    
<?php $this->load->view('footer_admin');?>
<script type="text/javascript">

	function deleteAlertImage( id )
	{
		$('#'+id).slideUp('medium', function () {
			$("#"+id).html('');
			$("#"+id).remove('');
		});
		$cnt_alert_image = $('#hidn_alert_image').val();
		$('#hidn_alert_image').val( parseInt($cnt_alert_image-1) );
	}
	function deleteAlertVideo( id )
	{
		$('#'+id).slideUp('medium', function () {
			$("#"+id).html('');
			$("#"+id).remove('');
		});
		$cnt_alert_video = $('#hidn_alert_video').val();
		$('#hidn_alert_video').val( parseInt($cnt_alert_video-1) );
	}

	function addMoreAlertImage()
	{
		var cntImage 	= parseInt( $('#hidn_alert_image').val() );
		cntImage = (cntImage+1);
		var imageAppend = '<div class="control-group" id="id_div_image_alert'+cntImage+'"><label class="control-label" for="image">Select Image</label>';
		imageAppend += '<div class="controls"><input name="userfile[]" id="alert_image'+cntImage+'" type="file" class="input-xlarge"/>';
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
		videoAppend += '<input type="file" name="alert_videoupd[]" id="alert_videoupd'+cntVideo+'" class="input-xlarge">';
		videoAppend += '<span id="err_alert_videoupd'+cntVideo+'"></span>';
		videoAppend += '&nbsp;<button type="button" class="btn" del-count="'+cntVideo+'" title="Delete Video" onclick=javascript:deleteAlertVideo("id_div_video_alert'+cntVideo+'");>Delete Video</button>';
		videoAppend += '</div></div>';

		$('#id_alert_video_bucket').append( videoAppend );
		$('#hidn_alert_video').val(cntVideo);
	}

	$("#id_image_video").hide();
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