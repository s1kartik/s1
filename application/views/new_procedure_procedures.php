<?php 
$rows_procedures	= $this->users->getMetaDataList('proc_procedures', '', 'in_created_by="'.$this->sess_userid.'" AND in_procedure_id="'.$procedure_id.'"', 'st_procedure_overview, st_procedure_items');
$procedure_overview = isset($rows_procedures[0]['st_procedure_overview']) ? $rows_procedures[0]['st_procedure_overview'] : '';
$procedure_items 	= isset($rows_procedures[0]['st_procedure_items']) ? json_decode($rows_procedures[0]['st_procedure_items']) : array();

// Get Procedures Images //
$procedures_img_vid	= $this->users->getMetaDataList( 'procedures_image_video', 'in_procedure_id="'.$procedure_id.'" AND in_status=1', '', 'id, in_procedure_image_video, st_procedure_image_video, st_procedure_video_text' );
?>

<div class="modal-header">
    <h4 id="myModalLabel">PROCEDURES<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h4>
</div>
<div class="modal-body">
    <!--BEGIN BODY MODAL -->
     <div class="" style="padding:5px 10px 0px 10px;box-shadow: none;">
		<form method="post" name="frm_proc_procedures" id="frm_proc_procedures" enctype="multipart/form-data" action="<?php echo $base."admin/my_created_procedures_metro?id=".$procedure_id."&type=".$procedure_type;?>">
		<div id="id_proc_procedures_errors"></div>
			<div class="row-fluid">
				<label>ITEMS</label>
				<ul id="procedures_list">
					<?php 
					if( sizeof($procedure_items) ) {
						foreach( $procedure_items AS $key_proc_item => $val_proc_item ) { ?>
							<li id="proc_group<?php echo ($key_proc_item+1);?>">
								<a style="float:right;" href="javascript:void(0);" onclick="javascript:deleteSection('proc_group<?php echo ($key_proc_item+1);?>');" title="Remove"><i class="icon-minus-2"></i></a>
								<div class="input-control text size5">
									<input type="text" id="procedure_item<?php echo ($key_proc_item+1);?>" name="procedure_item[]" value="<?php echo htmlspecialchars($val_proc_item);?>" placeholder="TYPE PROCEDURE" />
								</div>
							</li>
							<?php 
						}
					}
					else {?>
						<li><div class="input-control text size5"><input type="text" id="procedure_item1" name="procedure_item[]" placeholder="Itemize content, ex.: 1. Worker shall wear PPE..." /></div></li>
						<li><div class="input-control text size5"><input type="text" id="procedure_item2" name="procedure_item[]" placeholder="TYPE PROCEDURE" /></div></li>
						<?php 
					}?>
				</ul>
				<label data-click="transform" onclick="javascript: addMoreproc(1);" title="Add"> <i class="icon-plus-2"></i> ADD MORE</label>
			</div>
			<br><div class="row-fluid">
				<label>TIPS</label>
				<div class="input-control textarea" >
					<textarea placeholder="(MAX OF 700 CHARACTERS)" maxlength="700" name="txt_procedure_overview" id="txt_procedure_overview1" onkeyUp="showRemainingChars(1,700,10,'txt_procedure_overview');"><?php echo htmlspecialchars($procedure_overview);?></textarea>
				</div>
				<div id="cnt_itemname1"></div>
			</div>
			
			
		<!-- Procedures Images -->
		<div id="id_procedure_image_bucket">
			<?php 
			$cnt_proc_image = 0;
			if(sizeof($procedures_img_vid)>0) {
				foreach($procedures_img_vid as $val_img) {
					$is_procedure_imgorvid 	= isset($val_img['in_procedure_image_video'])  ? $val_img['in_procedure_image_video'] : '';
					if( $is_procedure_imgorvid == 1 ) {
						$id_procimage = isset($val_img['id'])  ? $val_img['id'] : '';
						$name_procedure_imgorvid = isset($val_img['st_procedure_image_video'])  ? $val_img['st_procedure_image_video'] : '';
						$cnt_proc_image++;?>
						<div class="control-group" id="id_div_image_procedure<?php echo $cnt_proc_image;?>">
						  <label class="control-label" for="">Select Image</label>
						  <div class="controls">
							<input type="file" name="userfile[]" id="procedure_image<?php echo $cnt_proc_image;?>" class="input-xlarge"/>
							<span id="err_procedure_image<?php echo $cnt_proc_image;?>"></span>
							<?php 
							if( file_exists(FCPATH.$this->path_upload_procedures.$name_procedure_imgorvid) ) { ?>
								<a class="fancybox-media" href="javascript:void(0);" data-fancybox-group="gallery"><img class="w70 h60" src="<?php echo $base.$this->path_upload_procedures.$name_procedure_imgorvid;?>"></a>
								<?php 
							}?>
						  </div>
						</div>
						<input type="hidden" name="procimage_id[]" value="<?php echo $id_procimage;?>">
						<?php 
					}
				}
			}
			else {?>
				<div class="control-group" id="id_div_image_procedure1">
					<label class="control-label" for="">Select Image</label>
					<div class="controls">
						<input type="file" name="userfile[]" id="procedure_image<?php echo $cnt_proc_image;?>" class="input-xlarge"/>
						<span id="err_procedure_image<?php echo $cnt_proc_image;?>"></span>
					</div>
				</div>
				<?php 
				$cnt_proc_image = 1;
			}?>
		</div>
		<input type="hidden" id="hidn_image" name="hidn_image" value="<?php echo $cnt_proc_image;?>">
		<div class="textright">
			<button type="button" class="btn" onclick="javascript: addMoreImage('<?php echo $cnt_proc_image;?>');" />Add New Image</button>
		</div><br>

		<!-- Procedures Videos -->
		<div id="id_procedure_videoupd_bucket">
			<?php 
			$cnt_proc_video = 0;
			// common::pr($procedures_img_vid);
			if(sizeof($procedures_img_vid)>0) {
				foreach($procedures_img_vid as $val_video) {
					$is_procedure_imgorvid 	= isset($val_video['in_procedure_image_video'])  ? $val_video['in_procedure_image_video'] : '';

					if( $is_procedure_imgorvid == 2 ) {
						$video_uploaded 	= isset($val_video['st_procedure_image_video'])  ? $val_video['st_procedure_image_video'] : '';
						$text_video_uploaded= isset($val_video['st_procedure_video_text'])  ? $val_video['st_procedure_video_text'] : '';
						$id_procvideo 		= isset($val_video['id'])  ? $val_video['id'] : '';

						$cnt_proc_video++;?>
						<div class="control-group" id="id_div_video_procedure<?php echo $cnt_proc_video;?>">
							<label class="control-label" for="">Procedure Video</label>
							<div class="controls">
								<input style="vertical-align: top;" id="txt_procedure_videoupd<?php echo $cnt_proc_video;?>" name="txt_procedure_videoupd[]" type="text" placeholder="Enter Video Code" class="input-xlarge" value="<?php echo $text_video_uploaded;?>">
								<?php 
								if($text_video_uploaded) { ?>
									<iframe width="190" height="130" frameborder="0" allowfullscreen="" src="https://www.youtube.com/embed/<?php echo $text_video_uploaded;?>?wmode=transparent&showinfo=0&rel=0&auto=0"></iframe>
									<?php 
								}?>
								<br>-OR-<br><input style="vertical-align: top;" type="file" name="procedure_videoupd[]" id="procedure_videoupd<?php echo $cnt_proc_video;?>" class="input-xlarge"/>
								<?php 
								if( file_exists(FCPATH.$this->path_upload_procedures.$video_uploaded) && $video_uploaded ) {?>
									<video controls="controls" width="190" height="130">
										<source src='<?php echo $base.$this->path_upload_procedures.$video_uploaded;?>' type="video/mp4" height="130" width="190">
									</video>
									<?php 
								}?>
								<span id="err_procedure_videoupd<?php echo $cnt_proc_video;?>"></span>
							</div>
						</div>
						<input type="hidden" name="procvideo_id[]" value="<?php echo $id_procvideo;?>">
						<?php 
					}
				}
			}
			else {
				?>
				<div class="control-group" id="id_div_video_procedure1">
					<label class="control-label" for="">Procedure Video</label>
					<div class="controls">
						<input id="txt_procedure_videoupd0" name="txt_procedure_videoupd[]" type="text" placeholder="Enter Video Code" class="input-xlarge">
						<br>-OR-<br><input type="file" name="procedure_videoupd[]" id="procedure_videoupd<?php echo $cnt_proc_video;?>" class="input-xlarge"/>
						<span id="err_procedure_videoupd<?php echo $cnt_proc_video;?>"></span>
					</div>
				</div>
				<?php 
				$cnt_proc_video = 1;				
			}?>
		  </div>
		  <input type="hidden" id="hidn_video" name="hidn_video" value="<?php echo $cnt_proc_video;?>">
		  <div class="textright"><button type="button" class="btn" onclick="javascript:addMoreVideo('<?php echo $cnt_proc_video;?>');" />Add New Video</button></div>
	  
		<div class="inline text-center">
			<br>
			<button class="image-button primary" name="btn_save_procedures" type="submit" id="btn_save_procedures">Save<i class="icon-enter bg-cobalt"></i></button>
			<button class="btn-cancel image-button danger" type="reset">Cancel<i class="icon-cancel-2 bg-red"></i></button>
		</div>
		<input type="hidden" name="hidn_procedure_section" value="procedures">
		</form>
     </div>
	 
	
    <!--END BODY MODAL -->  
</div>
<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>


	
<script type="text/javascript" src="<?php echo $base;?>js/common.js"></script>
<script type="text/javascript" src="<?php echo $base;?>js/regulation.js"></script>
<script type="text/javascript">
	var $error_img = $error_vid = 0;
	$('button[type=submit]').click(function(e){
		// Image Validation //
			var id_image = '';
			var allowed_alertimg_extensions = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
			
			$("#id_procedure_image_bucket").find('input[type=file]').each(function() {
				var id_image = $(this).attr("id");
				var id_image_val = $("#"+id_image);
				if( id_image_val.val()!='' && ($.inArray(id_image_val.val().split('.').pop().toLowerCase(), allowed_alertimg_extensions) == -1) ) {
					$('#err_'+id_image).html("<br>\nOnly (jpeg, jpg, png, gif, bmp) formats are allowed.");
					$('#err_'+id_image).addClass("text-error");
					$error_img++;
				}
				else {
					$('#err_'+id_image).html("");
				}
			});
			if( $error_img > 0 ) { e.preventDefault(); }
		
		
		// Video Validation //
			var id_video = '';
			var allowed_alertvid_extensions = ['mp4', 'mov', 'mpeg', 'mp3', 'avi', 'wmv', 'm4v'];
			$("#id_procedure_videoupd_bucket").find('input[type=file]').each(function() {
				var id_video = $(this).attr("id");
				var id_video_val = $("#"+id_video);
				if( id_video_val.val()!='' && ($.inArray(id_video_val.val().split('.').pop().toLowerCase(), allowed_alertvid_extensions) == -1) ) {
					$('#err_'+id_video).html("<br>\nOnly (mp4, mov, mpeg, mp3, avi, wmv, m4v) formats are allowed.");
					$('#err_'+id_video).addClass("text-error");
					$error_vid++;
				}
				else {
					$('#err_'+id_video).html("");
				}
			});
			
			if( $error_vid > 0 ) { e.preventDefault(); }
				
	});

	function deleteImage( id )
	{
		$('#'+id).slideUp('medium', function () {
			$("#"+id).html('');
			$("#"+id).remove('');
		});
		$cnt_image = $('#hidn_image').val();
		$('#hidn_image').val( parseInt($cnt_image-1) );
	}
	function deleteVideo( id )
	{
		$('#'+id).slideUp('medium', function () {
			$("#"+id).html('');
			$("#"+id).remove('');
		});
		$cnt_video = $('#hidn_video').val();
		$('#hidn_video').val( parseInt($cnt_video-1) );
	}

	function addMoreImage()
	{
		var cntImage 	= parseInt( $('#hidn_image').val() );
		cntImage = (cntImage+1);
		var imageAppend = '<div class="control-group" id="id_div_image_procedure'+cntImage+'"><label class="control-label" for="image">Select Image</label>';
		imageAppend += '<div class="controls"><input name="userfile[]" id="procedure_image'+cntImage+'" type="file" class="input-xlarge"/>';
		imageAppend += '<span id="err_procedure_imageupd'+cntImage+'"></span>';
		imageAppend += '&nbsp;<button type="button" class="btn" del-count="'+cntImage+'" title="Delete Image" onclick=javascript:deleteImage("id_div_image_procedure'+cntImage+'");>Delete Image</button>';
		imageAppend += '</div></div>';
	
		$('#id_procedure_image_bucket').append( imageAppend );
		$('#hidn_image').val(cntImage);
	}

	function addMoreVideo()
	{
		var cntVideo 	= parseInt( $('#hidn_video').val() );
		cntVideo = (cntVideo+1);

		var videoAppend = '<div class="control-group" id="id_div_video_procedure'+cntVideo+'">';
		videoAppend += '<label class="control-label" for="">Procedure Video</label>';
		videoAppend += '<div class="controls">';
		videoAppend += '<input id="txt_procedure_videoupd'+cntVideo+'" name="txt_procedure_videoupd[]" type="text" placeholder="Video" class="input-xlarge">';
		videoAppend += '<br>-OR-<br><input type="file" name="procedure_videoupd[]" id="procedure_videoupd'+cntVideo+'" class="input-xlarge">';
		videoAppend += '<span id="err_procedure_videoupd'+cntVideo+'"></span>';
		videoAppend += '&nbsp;<button type="button" class="btn" del-count="'+cntVideo+'" title="Delete Video" onclick=javascript:deleteVideo("id_div_video_procedure'+cntVideo+'");>Delete Video</button>';
		videoAppend += '</div></div>';

		$('#id_procedure_videoupd_bucket').append( videoAppend );
		$('#hidn_video').val(cntVideo);
	}

	function addMoreproc()
	{
		var s 	= parseInt($("#procedures_list").children("li").length);
		s 		= (s+1);
		$('#procedures_list').append('<li id="proc_group'+s+'"></li>');
		ppeAppend = '<a style="float:right;" href="javascript:void(0);" onclick=javascript:deleteSection("proc_group'+s+'"); title="Remove"><i class="icon-minus-2"></i></a>';
		ppeAppend += '<div class="input-control text size5" >';
		ppeAppend += '<input type="text" id="procedure_item'+s+'" name="procedure_item[]" placeholder="TYPE PROCEDURE" />';
		ppeAppend += '</div>';
		
		$('#proc_group'+s).append( ppeAppend );
	}

	// ===== SCRIPT TO ACTIVATE TOOLTIPS =====
	// ===== THE CONTENT OF THE TOOLTIP IS DEFINED BY THE "TITLE" ATTRIBUTE OF THE ELEMENT 
	$('ol').css('list-style','decimal');
	$('.modal-header').css('background-color','gray');
	$('#modalProcedure').css('width','550px');
	$('.icon-enter').css('padding','3px');
	$('.icon-cancel-2').css('padding','3px 4px 2px 2px');

	$(document).ready(function () {	
		$.validator.setDefaults({
			errorPlacement: function(error, element) {
				error.appendTo('#id_proc_procedures_errors');
			}
		});
		$('#frm_proc_procedures').validate({
			highlight: function(element) {
				$('#id_proc_procedures_errors').addClass('fgred')
			}, 
			rules: {
				txt_procedure_overview: {
					required: true, 
					maxlength: 700
				}
			}, 
			messages: {
				txt_procedure_overview: {
					required: "Please enter Tips."
				}
			}, 
			submitHandler: function(form) {
				if( $error_img==0 && $error_vid==0 ) {
					var len_proc_item = 0;
					$('input[name="procedure_item[]"]').each(function() {
						if( $(this).val().length > 0 ) {
							len_proc_item = 1;
						}
					});
					if( len_proc_item ) {
						$.post(js_base_path+'ajax/ajax_set_get_page_points', {'pointPageId':11, 'pointPageSectionId':6, 
											'pointPageSubSectionId':'<?php echo $procedure_id;?>', 'visitedSection':'procedures'}, 
							function(data) {
								$("#modalProcedure").modal("hide");
								$("#id_modal_procsaved").modal("show");
								setTimeout(function(){ form.submit(); }, 2000);
							}
						);
					}
					else {
						var html = $("#id_proc_procedures_errors").html();
						html = (!html) ? "<br>\n" : '';
						html += "Please enter atleast 1 Procedure Item";
						
						$("#id_proc_procedures_errors").html( html );
						$('#id_proc_procedures_errors').addClass('fgred');
					}
				}
			}
		});
	});
</script>