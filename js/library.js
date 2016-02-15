$(document).ready(function () {
	if( $("li.profile>a").length > 0 ) {
		$("li.profile>a").click(function(){
			$tab_selected = $(this).attr('href');
			$qrystr = '';
			if( js_userid ) {
				$qrystr = '?userid='+js_userid;
			}
			window.location.href = js_base_path+"admin/"+js_method+$qrystr+$tab_selected;
		});
		var hash_val = window.location.hash.substr(1);
		hash_val = !(hash_val) ? "purchased" : hash_val;
		hash_val = hash_val.split("&");
		$("li.profile>a[href='#"+hash_val[0]+"']").parent().addClass('active');
		$(".tab-pane[id='"+hash_val[0]+"']").addClass('in active');
	}
	
	// $("a").click(function(e){
	/*
	var records_limit = parseInt('<?php echo $records_limit;?>');
	var total_purchased = parseInt('<?php echo $total_purchased;?>');
	if( total_purchased <= records_limit ) {
		$("#purchased pagination").css("display","none");
	}
	var current_page = $("#purchased").attr('current-page');
	
	var limit_from 	= parseInt( (current_page-1)*records_limit );
	if( parseInt(total_purchased-limit_from) > records_limit ) {
		var limit_to 	= records_limit;
	}
	else {
		var limit_to 	= total_purchased;
	}
	$("#purchased > a").each(function(e) {
		var cntval = $(this).attr('cnt_purchased');
		if( cntval>limit_from && cntval<=limit_to ) {
			$(this).css("display","block");
		}
		else {
			$(this).css("display","none");
		}
	});
	*/
});

function addMoreImage( s, paragraphId, showDesc )
{
	if( paragraphId ) {
		var pr_image_name = '['+paragraphId+'][new]';
	}
	else {
		var pr_image_name = '[pr'+s+'][new]';
	}
	
	var cntImage 	= parseInt( $('#hidn_paragraph_image').val() );
	
	cntImage = parseInt(cntImage+1);
	
	var imageAppend = '<div class="control-group" id="id_div_image_pr'+s+'img'+cntImage+'"><label class="control-label" for="image">Select Image</label>';
	imageAppend += '<div class="controls"><input name="userfile'+pr_image_name+'[]" id="userfile_pr'+s+'img'+cntImage+'" type="file" class="input-xlarge"/>';
	imageAppend += '&nbsp;<a href="javascript:void(0);" title="Delete Image" onclick=javascript:deleteSection("id_div_image_pr'+s+'img'+cntImage+'");>Delete Image</a>';
	imageAppend += '</div>';
	if("1" == showDesc) {
		imageAppend += '<br><div class="controls"><textarea id="description_pr'+s+'imgdesc'+cntImage+'" name="description_img'+pr_image_name+'[]" placeholder="Image Description" class="content-editor"></textarea></div><div id="cnt_imgdesc'+s+'imgdesc'+cntImage+'"></div>';
	}
	imageAppend += '</div>';
	
	$('#id_div_image_pr'+s).append(imageAppend);
	$('#hidn_paragraph_image').val(cntImage);

	("1" == showDesc) ? getTinymceEditor() : '';
}

function addMoreVideo( s, paragraphId, showDesc)
{
	var cntVideo 	= parseInt( $('#hidn_paragraph_video').val() );
	if( paragraphId ) {
		var pr_video_name = '['+paragraphId+'][new]';
	}
	else {
		var pr_video_name = '[pr'+s+']';
	}

	cntVideo = (cntVideo+1);

	var videoAppend = '<div class="control-group" id="id_div_video_pr'+s+'vid'+cntVideo+'"><label class="control-label" for="video">Enter Video Link</label>';
	videoAppend += '<div class="controls"><input name="paragraph_video'+pr_video_name+'[]" placeholder="Type in Video" id="paragraph_video_pr'+s+'vid'+cntVideo+'" type="text" class="input-xlarge"/>';
	videoAppend += '&nbsp;<a href="javascript:void(0);" title="Delete Video" onclick=javascript:deleteSection("id_div_video_pr'+s+'vid'+cntVideo+'");>Delete Video</a>';
	videoAppend += '</div>';
	if("1" == showDesc) {
		videoAppend += '<br><div class="controls"><textarea id="description_pr'+s+'viddesc'+cntVideo+'" name="description_vid'+pr_video_name+'[]" placeholder="Video Description" class="content-editor"></textarea></div>';
	}
	videoAppend += '</div>';
	
	$('#id_div_video_pr'+s).append( videoAppend );
	$('#hidn_paragraph_video').val( cntVideo );
	
	("1" == showDesc) ? getTinymceEditor() : '';
}

function addMoreQuestion( s, paragraphId )
{
	var cntQues = parseInt( $('#hidn_paragraph_question').val() );
	cntQues 	= (cntQues+1);

	if( paragraphId ) {
		var ques_name = '['+paragraphId+'][new]';
		var choice_ans_name = '['+paragraphId+'][new]['+cntQues+']';
	}
	else {
		var ques_name = '[pr'+s+']';
		var choice_ans_name = '[pr'+s+'][ques'+cntQues+']';
	}

	var quesAppend = '<div id="id_div_pr'+s+'ques'+cntQues+'"><div class="control-group"><label class="control-label" for="">Enter Question</label>';
	quesAppend += '<div class="controls"><input id="question_pr'+s+'ques'+cntQues+'" name="question'+ques_name+'[]" type="text" placeholder="Type in Question" class="input-xlarge"/>';
	quesAppend += '&nbsp;<a href="javascript:void(0);" title="Delete Question" onclick=javascript:deleteSection("id_div_pr'+s+'ques'+cntQues+'");>Delete</a>';
	quesAppend += '</div></div><div class="answerblock"><div class="control-group"><label class="control-label" for="">Enter Answer</label><div class="controls"><input id="choice_pr'+s+'choice'+cntQues+'" name="choice'+choice_ans_name+'[]" type="text" placeholder="Type First Answer" class="input-xlarge"/></div></div><div class="control-group"><label class="control-label">Is Answer: Right or Wrong</label><div class="controls"><select id="answer_pr'+s+'ans'+cntQues+'" name="answer'+choice_ans_name+'[]" class="input-xlarge answer"><option value="">-select-</option><option value="1">Right</option><option value="0">Wrong</option></select></div></div></div>';
	quesAppend += '</div>';

	$('#id_div_question_pr'+s).append( quesAppend );

	$('#hidn_paragraph_question').val(cntQues);
}

function getTinymceEditor(cntTextArea, isEditorSelector)
{
	var val_edit_select = '""';
	if( isEditorSelector ) {
		val_edit_select = 'txtarea_content'+cntTextArea;
	}
	tinymce.init({
		selector: "textarea",
		theme: "modern",
		editor_selector: val_edit_select, 
		toolbar: "insertfile undo redo | styleselect formatselect fontselect fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | numlist bullist | outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
		plugins: [
			 "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
			 "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
			 "save table contextmenu directionality emoticons template paste textcolor"],
		style_formats: [
		   {title: 'Blockquote', inline: 'blockquote'},
		   {title: 'Paragraph', inline: 'p'},
		   {title: 'Pre', inline: 'pre'},
		],
		
	});
}