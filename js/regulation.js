function deleteSection( id )
{
	$('#'+id).slideUp('medium',function () {
		$("#"+id).html('');
		$("#"+id).remove('');
	});
}

function regulationScript(s)
{
	sectionAppend += '<div class="control-group">';
	sectionAppend += '<div class="controls">';
	sectionAppend += '<input type="text" value="" placeholder="Regulation Number" name="cmb_regulation_number[]" id="cmb_regulation_number'+s+'" list="cmb_regno_list'+s+'" onblur=getSection("cmb_regulation_number'+s+'","cmb_section_list'+s+'",'+s+');>';
	sectionAppend += '<datalist id="cmb_regno_list'+s+'"></datalist>';
	sectionAppend += '</div>';
	sectionAppend += '</div>';

	sectionAppend += '<div class="control-group">';
	sectionAppend += '<div class="controls">';
	sectionAppend += '<input type="text" value="" placeholder="Section" name="cmb_section[]" id="cmb_section'+s+'" list="cmb_section_list'+s+'" onblur=getSubsection("cmb_section'+s+'","cmb_subsection_list'+s+'",'+s+');>';
	sectionAppend += '<datalist id="cmb_section_list'+s+'"></datalist>';
	
	sectionAppend += '<input type="text" value="" placeholder="Sub Section" name="cmb_subsection[]" id="cmb_subsection'+s+'" list="cmb_subsection_list'+s+'" onblur=getItem("cmb_subsection'+s+'","cmb_item_list'+s+'",'+s+');>';
	sectionAppend += '<datalist id="cmb_subsection_list'+s+'"></datalist>';

	sectionAppend += '</div>';
	sectionAppend += '</div>';

	sectionAppend += '<div class="control-group">';
	sectionAppend += '<div class="controls">';
	sectionAppend += '<input type="text" value="" placeholder="Item" name="cmb_item[]" id="cmb_item'+s+'" list="cmb_item_list'+s+'" onblur=getSubitem("cmb_item'+s+'","cmb_subitem_list'+s+'",'+s+');>';
	sectionAppend += '<datalist id="cmb_item_list'+s+'"></datalist>';
	
	sectionAppend += '<input type="text" value="" placeholder="Sub Item" name="cmb_subitem[]" id="cmb_subitem'+s+'" list="cmb_subitem_list'+s+'">';
	sectionAppend += '<datalist id="cmb_subitem_list'+s+'"></datalist>';

	sectionAppend += '</div>';
	sectionAppend += '</div>';
	
	return sectionAppend;
}

function inspectionReulationScript(cntitem, s)
{
	sectionAppend += '<div class="control-group">';
	sectionAppend += '<div class="controls">';
	sectionAppend += '<input type="text" value="" placeholder="Regulation Number" name="cmb_regulation_number['+cntitem+'][]" id="cmb_regulation_number'+cntitem+s+'" list="cmb_regno_list'+cntitem+s+'" onblur=getSection("cmb_regulation_number'+cntitem+s+'","cmb_section_list'+cntitem+s+'",'+cntitem+s+');>';
	sectionAppend += '<datalist id="cmb_regno_list'+cntitem+s+'"></datalist>';
	sectionAppend += '</div><div>&nbsp;</div>';
	sectionAppend += '<div class="controls">';
	sectionAppend += '<input type="text" value="" placeholder="Section" name="cmb_section['+cntitem+'][]" id="cmb_section'+cntitem+s+'" list="cmb_section_list'+cntitem+s+'" onblur=getSubsection("cmb_section'+cntitem+s+'","cmb_subsection_list'+cntitem+s+'",'+cntitem+s+');>';
	sectionAppend += '<datalist id="cmb_section_list'+cntitem+s+'"></datalist>';

	sectionAppend += '<input type="text" value="" placeholder="Sub Section" name="cmb_subsection['+cntitem+'][]" id="cmb_subsection'+cntitem+s+'" list="cmb_subsection_list'+cntitem+s+'" onblur=getItem("cmb_subsection'+cntitem+s+'","cmb_item_list'+cntitem+s+'",'+cntitem+s+');>';
	sectionAppend += '<datalist id="cmb_subsection_list'+cntitem+s+'"></datalist>';
	sectionAppend += '</div><div>&nbsp;</div>';

	sectionAppend += '<div class="controls">';
	sectionAppend += '<input type="text" value="" placeholder="Item" name="cmb_item['+cntitem+'][]" id="cmb_item'+cntitem+s+'" list="cmb_item_list'+cntitem+s+'" onblur=getSubitem("cmb_item'+cntitem+s+'","cmb_subitem_list'+cntitem+s+'",'+cntitem+s+');>';
	sectionAppend += '<datalist id="cmb_item_list'+cntitem+s+'"></datalist>';

	sectionAppend += '<input type="text" value="" placeholder="Sub Item" name="cmb_subitem['+cntitem+'][]" id="cmb_subitem'+cntitem+s+'" list="cmb_subitem_list'+cntitem+s+'">';
	sectionAppend += '<datalist id="cmb_subitem_list'+cntitem+s+'"></datalist>';
	sectionAppend += '</div>';
	sectionAppend += '</div>';
	
	return sectionAppend;
}

function getRegulationNumber(idObj)
{
	$.post(js_base_path+'admin/getMetaDataList', 
		{'table':'regulation_contents','where':'1','orderBy':'','select':'st_regulation_number','optionLabel':'Regulation Number','groupBy':'st_regulation_number'}, 
		function(data){
			$("#"+idObj).html(data);
		});
}

function getRegNoForProcedure(idObj)
{
	$.post(js_base_path+'admin/getMetaDataList', 
		{'table':'regulation_contents','where':'1','orderBy':'','select':'st_regulation_number,st_title','optionLabel':'Regulation Number','groupBy':'st_regulation_number', 'regnoSection':'procedure_duediligence'}, 
		function(data){
			$("#"+idObj).html(data);
		}
	);
}

function addMoreInspectionItem()
{
	var s 	= parseInt( $('#hidn_inspection').val() );
	s 		= (s+1);

	getRegulationNumber('cmb_regno_list'+s+'1');

	$('#id_tbl_inspection').append('<tr id="id_tr_inspection'+s+'"></tr>');

	sectionAppend = '&nbsp;<a style="float:right;" href="javascript:void(0);" onclick=javascript:deleteSection("id_tr_inspection'+s+'"); title="Delete Item">Delete Item</a>';
	
	sectionAppend += '<div class="control-group">';
	sectionAppend += '<label class="control-label" for="txt_item">Item Name</label>';
	sectionAppend += '<div class="controls">';
	sectionAppend += '<textarea id="txt_item'+s+'" name="txt_item[]" maxlength="255" style="margin:0;" onkeyup=showRemainingChars('+s+',255,10,"txt_item"); placeholder="Item Name" class="content-editor"></textarea><div id="cnt_itemname'+s+'"></div>';
	sectionAppend += '</div>';
	sectionAppend += '</div>';

	sectionAppend += '<div id="id_main_regulation'+s+'">';
	
	inspectionReulationScript(s,1);
	
	sectionAppend += '<input type="hidden" name="hidn_libreg'+s+'" id="hidn_libreg'+s+'" value="'+s+'">';	
	sectionAppend += '</div>';
	sectionAppend += '<div class="textright"><input type="button" class="btn btn-warning" value="Add New Regulation" onclick="javascript:addInspectionRegulationItem('+s+');" /></div><br>';

	$('#id_tr_inspection'+s).append( sectionAppend );

	showRemainingChars(s,255,10,'txt_item');

	$('#hidn_inspection').val(s);
}

function callAjax( htmlObj, selectVal, whereVal, optionLabel, regField, srcIdObj )
{
	if( regField!="reg_title" ) {
		admin_reg_func = 'getRegSection';
	}
	else {
		admin_reg_func = 'getRegSectionFromTitle';
	}

	$.ajax({
		url: js_base_path+'admin/'+admin_reg_func, 
		type: 'post', 
		data: { 'select':selectVal, 'where':whereVal, 'optionLabel':optionLabel },
		success: function(output) {
			//alert(output);
			$("#hidn_errmsg_duedilegence").val('');
			if( $("#"+srcIdObj).val() != '' && output.trim() == '0' ) {
				$("#hidn_errmsg_duedilegence").val(1);
				$("#"+srcIdObj).val('-Invalid-');
				$("#"+htmlObj).val('');
			}
			//alert(htmlObj);
			$("#"+htmlObj).html(output);
		}, 
		error: function(errMsg) {
			alert( errMsg.responseText );
			return false;
		}
	});
}

function addMoreRegulationItem()
{
	var s 	= $('#hidn_libreg').val();
	s = parseInt(s)+1;

	getRegulationNumber('cmb_regno_list'+s+'');

	sectionAppend = '<div class="control-group" id="id_div_libreg'+s+'">';
	sectionAppend += '&nbsp;<a style="float:right;" href="javascript:void(0);" onclick=javascript:deleteSection("id_div_libreg'+s+'"); title="Delete Regulation">Delete</a>';	
	regulationScript(s);
	
	/*sectionAppend += '<div class="controls">';
	sectionAppend += '<select name="cmb_regulation_number[]" id="cmb_regulation_number'+s+'" onchange=getSection("cmb_regulation_number'+s+'","cmb_section'+s+'",'+s+');><option value="">-Regulation Number-</option></select>';
	sectionAppend += '</div><div>&nbsp;</div>';

	sectionAppend += '<div class="controls">';
	sectionAppend += '<select name="cmb_section[]" id="cmb_section'+s+'" onchange=getSubsection("cmb_section'+s+'","cmb_subsection'+s+'",'+s+');><option value="">-Section-</option></select>';
	sectionAppend += '<select name="cmb_subsection[]" id="cmb_subsection'+s+'" onchange=getItem("cmb_subsection'+s+'","cmb_item'+s+'",'+s+');><option value="">-Sub Section-</option></select>';
	sectionAppend += '</div><div>&nbsp;</div>';

	sectionAppend += '<div class="controls">';
	sectionAppend += '<select name="cmb_item[]" id="cmb_item'+s+'" onchange=getSubitem("cmb_item'+s+'","cmb_subitem'+s+'",'+s+');><option value="">-Item-</option></select>';
	sectionAppend += '<select name="cmb_subitem[]" id="cmb_subitem'+s+'"><option value="">-Sub Item-</option></select>';
	sectionAppend += '</div>';
	sectionAppend += '</div>';
	*/

	$('#hidn_libreg').val(s);
	$('#id_main_regulation').append( sectionAppend );
}

function addInspectionRegulationItem(cntitem)
{
	var s 	= $('#hidn_libreg'+cntitem).val();
	s 		= parseInt(s)+1;

	getRegulationNumber('cmb_regno_list'+cntitem+s+'');

	sectionAppend = '<div class="control-group" id="id_div_libreg'+cntitem+s+'">';
	sectionAppend += '&nbsp;<a style="float:right;" href="javascript:void(0);" onclick=javascript:deleteSection("id_div_libreg'+cntitem+s+'"); title="Delete Regulation">Delete Regulation</a>';
	
	inspectionReulationScript(cntitem, s);

	$('#hidn_libreg'+cntitem).val(s);

	$('#id_main_regulation'+cntitem).append( sectionAppend );
}

function getSection(idObj, htmlObj, idVal, regField )
{
	var optionLabel	= 'Section';
	var reg_no 		= $("#"+idObj).val();
	var selectVal 	= "st_section";

	if( regField=="reg_title" ) {
		dbRegField = 'st_title';
		$("#id_div_contents"+idVal).html("");
	}
	else {
		dbRegField = 'st_regulation_number';
	}
	var whereVal = dbRegField+"='"+reg_no;
	callAjax( htmlObj, selectVal, whereVal, optionLabel, regField, idObj );
}

function getSubsection(idObj, htmlObj, cntInspItem, regField)
{
	var optionLabel	= 'Sub Section';
	var section 	= $("#"+idObj).val();
	var reg_no 		= $("#cmb_regulation_number"+cntInspItem).val();
	var selectVal 	= "st_subsection";

	if( regField=="reg_title" ) {
		dbRegField = 'st_title';
		$("#id_div_contents"+cntInspItem).html("");
	}
	else {
		dbRegField = 'st_regulation_number';
	}
	var whereVal 	= dbRegField+"='"+reg_no+"' AND st_section='"+section;
	callAjax( htmlObj, selectVal, whereVal, optionLabel, regField, idObj );
}

function getItem(idObj, htmlObj, cntInspItem, regField)
{
	var optionLabel	= 'Item';
	var section 	= $("#cmb_section"+cntInspItem).val();
	var reg_no 		= $("#cmb_regulation_number"+cntInspItem).val();
	var subsection 	= $("#"+idObj).val();
	var selectVal 	= "st_item";
	
	if( regField=="reg_title" ) {
		dbRegField = 'st_title';
		regContents(cntInspItem);
	}
	else {
		dbRegField = 'st_regulation_number';
	}
	var whereVal 	= dbRegField+"='"+reg_no+"' AND st_section='"+section+"' AND st_subsection='"+subsection;
	callAjax( htmlObj, selectVal, whereVal, optionLabel, regField, idObj );
}

function getSubitem(idObj, htmlObj, cntInspItem, regField)
{
	var optionLabel	= 'Sub Item';
	var section 	= $("#cmb_section"+cntInspItem).val();
	var reg_no 		= $("#cmb_regulation_number"+cntInspItem).val();
	var subsection 	= $("#cmb_subsection"+cntInspItem).val();
	var item 		= $("#"+idObj).val();
	var selectVal 	= "st_subitem";
	
	if( regField=="reg_title" ) {
		dbRegField = 'st_title';
		regContents(cntInspItem);
	}
	else {
		dbRegField = 'st_regulation_number';
	}
	var whereVal 	= dbRegField+"='"+reg_no+"' AND st_section='"+section+"' AND st_subsection='"+subsection+"' AND st_item='"+item;
	callAjax( htmlObj, selectVal, whereVal, optionLabel, regField, idObj );
}


function validateSection(idForm, actionName, urlType, urlString)
{
	tinyMCE.triggerSave();
	$.ajax({
		url: js_base_path+'admin/validateRegSection', 
		type: 'post', 
		data: $("#"+idForm).serialize()+"&action="+actionName, 
		success: function(output) {
			if( output.trim() == '' ) {
				window.location.href = js_base_path+"admin/metadata?type="+urlType+urlString;
			}
			else {
				$("#id_msg_regsection").html(output);
				$('html, body').animate({ scrollTop: 0 }, 0);
				return false;
			}
		}, 
		error: function(errMsg) {
			alert( errMsg.responseText );
			return false;
		}
	});
}


function addMoreRegItemForProcedure()
{
	var s 	= parseInt($('#id_tbl_regulation tr').length);
	s 		= (s+1);

	// Get Regulation Numbers: 
		getRegNoForProcedure('cmb_regno_list'+s);

	$('#id_tbl_regulation').append('<tr id="id_tr_regulation'+s+'"></tr>');

	sectionAppend = '&nbsp;<a style="float:right;" href="javascript:void(0);" onclick=javascript:deleteSection("id_tr_regulation'+s+'"); title="Delete Regulation">Delete</a>';

	regulationScript(s);

	$('#id_tr_regulation'+s).append( sectionAppend );
}