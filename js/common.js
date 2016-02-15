$.post(js_base_path+'ajax/getLanguages', {'returnType':"json"}, function(data) {
	$languages = $.parseJSON(data);
});
				
function showRemainingChars( cnt, charLimit, lastChars, idField )
{
	// alert( "#"+idField+cnt);
	var itemval = $("#"+idField+cnt);
	// alert( itemval.val() );
	if (itemval.val().length > charLimit) {
		itemval.val(itemval.val().substr(1));
	}

	var isOpera 	= !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
	var isFirefox 	= typeof InstallTrigger !== 'undefined';   // Firefox 1.0+
	var isSafari 	= Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0;
	var isChrome 	= !!window.chrome && !isOpera;              // Chrome 1+
	var isIE 		= false || !!document.documentMode; // At least IE6

	if( isChrome ) {
		var new_lines = itemval.val().match(/(\r\n|\n|\r)/g);
	}
	var extra_str = 0;
	if (new_lines != null) {
		extra_str = new_lines.length;
	}

	var len_itemval = itemval.val().length+extra_str;

	var rest = charLimit-len_itemval;
	$("#cnt_itemname"+cnt).html("You have <strong>" + rest + "</strong> characters left.");
	
	if (rest <= lastChars) {
		$("#cnt_itemname"+cnt).css("color", "#DB1D24");
	}
	else {
		$("#cnt_itemname"+cnt).css("color", "#F89406");
	}
}

function checkImage()
{
	 var fileExtension = ['jpeg', 'jpg'];
	 if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
          alert("Only '.jpeg','.jpg' formats are allowed.");
	 }
}

function readImageUrl(input) 
{
    if (input.files && input.files[0]) {
        var reader = new FileReader();
		$("#preview_img").show();
        reader.onload = function (e) {
            $('#preview_img').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}  

function deleteInvestigationSection(section, existingData)
{
	var section_rows = $('.cls_'+section).length;
	$('#id_div_'+section+section_rows).slideUp('medium', function () {
		$('#id_div_'+section+section_rows).remove();
			// if only one element remains, disable the "remove" button
				if( parseInt(section_rows-1) === 1 ) {
					$('.btn_'+section).attr('disabled', true);
				}

		// enable the "add" button
			// $('#btnAdd').attr('disabled', false).prop('value', "[+]Add");
	});

	if( parseInt(section_rows-1) == existingData ) {
		$('.btn_'+section).attr('disabled', true);
	}
	
	return false;
}


	
/*************** START - Investigators, Investigation workers ***************/
// Additional investigation workers
	function addMoreWorkers()
	{
		var num = $('.cls_investigation_workers').length;
		cntInvWorkers = new Number(num + 1); // the numeric ID of the new input field being added

		var workerAppend = '<div id="id_div_investigation_workers'+cntInvWorkers+'" class="cls_investigation_workers">';
		workerAppend += '<div class="row-fluid">';
		workerAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>NAME</label>';
		workerAppend += '</div>';
		workerAppend += '<div class="span7 input-append"><input type="text" name="txt_inv_worker_name[]" id="txt_inv_worker_name'+cntInvWorkers+'" onkeydown=javascript:getUsers("txt_inv_worker_name'+cntInvWorkers+'"); class="selectpicker form-large-select span10 container-width"  placeholder="FULL NAME"/>';
		workerAppend += '</div></div>';

		workerAppend += '<div class="row-fluid">';
		workerAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>POSITION</label>';
		workerAppend += '</div>';
		workerAppend += '<div class="span7 input-append"><input type="text" name="txt_inv_worker_jobtitle[]" id="txt_inv_worker_jobtitle'+cntInvWorkers+'" class="selectpicker form-large-select span10 container-width"  placeholder="JOB TITLE"/>';
		workerAppend += '</div>';
		workerAppend += '</div></div>';

		jQuery('#id_inv_worker_bucket').append(workerAppend);
		
		num = $('.cls_investigation_workers').length;
		if( num <= 1 ) {
			$('.btn_investigation_workers').attr('disabled', true);
		}
		else {
			$('.btn_investigation_workers').attr('disabled', false);
		}
	}

	
	function addMoreIncidentWorkers( isSectionDisabled )
	{
		var disabled = (isSectionDisabled == 'disabled') ? isSectionDisabled : '';

		var num = $('.cls_incident_workers').length;
		cntIncidentWorkers = new Number(num + 1); // the numeric ID of the new input field being added

		if( $("#txt_no_of_workers").val() && (cntIncidentWorkers > $("#txt_no_of_workers").val()) ) {
			alert("You can not add more workers than specified limit");
			$("#txt_no_of_workers").focus();
			return false;
		}
		else {
			if( $("#txt_no_of_workers").val() == '' && cntIncidentWorkers > 1 ) {
				alert("Please enter Number of Injured Workers to add more");
				$("#txt_no_of_workers").focus();
				return false;
			}
		}

		var incidentWorkerAppend = '<div class="row-fluid cls_incident_workers" id="id_div_incident_workers'+cntIncidentWorkers+'">';
		incidentWorkerAppend += '<div class="row-fluid">';
		incidentWorkerAppend += '<div class="span6"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Worker #'+cntIncidentWorkers+') Full Name</label></div>';
		incidentWorkerAppend += '<div class="span6"><input type="text" '+disabled+' name="txt_worker_fullname[new][]" id="txt_worker_fullname'+cntIncidentWorkers+'" class="required selectpicker form-large-select container-width span10"  placeholder="Full Name"/>';
		incidentWorkerAppend += '</div></div>';

		incidentWorkerAppend += '<div class="row-fluid">';
		incidentWorkerAppend += '<div class="span6"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Worker #'+cntIncidentWorkers+') Employer</label>';
		incidentWorkerAppend += '</div>';
		incidentWorkerAppend += '<div class="span6"><input type="text" '+disabled+' name="txt_worker_employer[new][]" id="txt_worker_employer'+cntIncidentWorkers+'" class="required selectpicker form-large-select container-width span10"  placeholder="Employer"/>';
		incidentWorkerAppend += '</div>';
		incidentWorkerAppend +='</div></div>';

		$('#id_incident_worker_bucket').append(incidentWorkerAppend);

		num = $('.cls_incident_workers').length;
		if( num <= 1 ) {
			$('.btn_incident_workers').attr('disabled', true);
		}
		else {
			$('.btn_incident_workers').attr('disabled', false);
		}
	}
	
	function checkNoOfRowsExists(sectionName)
	{
		var current_rows = $('.cls_'+sectionName).length;
		if( current_rows <= 1) {
			$('.btn_'+sectionName).attr('disabled', true);
		}
		else {
			$('.btn_'+sectionName).attr('disabled', false);
		}
	}


	function checkRequiredFields(sectionName, formId)
	{
		var is_error = 0;

		$('#'+formId+' .required').each(function(){
			// For Checkbox
				if( $(this).is(":checkbox") ) {
					if( $("#"+formId+" input[type=checkbox].required").is(':checked') ) {
						$(this).parent().css( "background-color", ""  );
					}
					else {
						is_error 		= 1;
						$(this).parent().css( "background-color", "#FFBEBE" );
					}
				}

			// For Radiobox //
				if( $(this).is(":radio") ) {
					if( "incident_details" == sectionName ) {
						if( $("#"+formId+" input[type=radio].required").is(':checked') ) {
							$(this).parent().css( "background-color", "" );
						}
						else {
							is_error 		= 1;
							$(this).parent().css( "background-color", "#FFBEBE" );
						}
					}
					else {
						// console.log( $(this).attr("name") + " " + $('input[name="'+$(this).attr("name")+'"]:checked').length );
						if( $('input[name="'+$(this).attr("name")+'"]:checked').length > 0 ) {
							$(this).parent().css( "background-color", ""  );
						}
						else {
							is_error = 1;
							$(this).parent().css( "background-color", "#FFBEBE" );
						}
					}
				}

			// For TextBox //
				if( $(this).is(":text") ) {
					var inputVal = $(this).val();
					if( inputVal == '' ){
						is_error = 1;
						$(this).parent().css( "background-color", "#FFBEBE" );
					}
					else {
						$(this).parent().css( "background-color", "" );
					}
				}
		});
		
		return is_error;
	}
	
	function addInvestigationFormData(sectionName, formId, idDivCollapse, idDataToggle, idDivBucket)
	{
		var frmSerializeId = '#'+formId;

		jQuery.ajax({
			url: js_base_path+'ajax/ajaxAddInvestigation',
			type: 'post', 
			data: jQuery(frmSerializeId).serialize()+'&sectionName='+sectionName+'&investigation_id='+js_invform_id, 
			async: false, 
			success: function(output) {
				// Remove elements except first one
					if( "injury_report" != sectionName ) {
						// jQuery('#'+idDivBucket+'>div:not(:first)').remove();
					}
				
				// Close Collapsed Box //
					jQuery("#"+idDivCollapse).toggleClass('collapse in collapse');
					jQuery("#"+idDivCollapse).css("height", "0px");
					jQuery("#"+idDataToggle).toggleClass('collapsed');

				// Remove form element values
					// jQuery('input[type=text]').val('');
					// jQuery('input[type=checkbox]').prop('checked', false);
					// jQuery('input[type=radio]').prop('checked', false);

					// DONT DELETE: jQuery('#'+formId+' input').each(function(){ jQuery(this).val(''); });

				alert( "Data successfully added" );
				window.location.href = js_base_path+"admin/investigation_page?invformid="+js_invform_id;
			},
			error: function(errMsg) {
				alert( errMsg.responseText );
				return false;
			}
		});
	}

	function submitInvestigation(sectionFormId)
	{
		var sectionName 	= $("#"+sectionFormId+" #hidn_section_name").val();
		var formId 			= $("#"+sectionFormId+" #hidn_form_id").val();
		var idDivCollapse 	= $("#"+sectionFormId+" #hidn_id_div_collapse").val();
		var idDataToggle 	= $("#"+sectionFormId+" #hidn_id_data_toggle").val();
		var idDivBucket 	= $("#"+sectionFormId+" #hidn_id_div_bucket").val();

		saveInvestigator(sectionName, formId, idDivCollapse, idDataToggle, idDivBucket);
	}
	
	function saveInvestigator(sectionName, formId, idDivCollapse, idDataToggle, idDivBucket)
	{
		var response_validation = $("#validation_"+sectionName).html();
		(response_validation) ? validateInvSection("{"+response_validation+"}") : '';
		
		var is_error = 0;
		var valid_photos_ext = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];

		if( "investigation_photoes" == sectionName || "material_involved" == sectionName ) {
			var img_invphotos = '';
			$("#"+idDivBucket).find('input[type=file]').each(function() {
				img_invphotos = $(this).attr("id");
				id_img_invphotos = $("#"+img_invphotos);
				if( id_img_invphotos.val()!='' && ($.inArray(id_img_invphotos.val().split('.').pop().toLowerCase(), valid_photos_ext) == -1) ) {
					is_error++;
				}
			});
		}

		if( "witness_report" == sectionName ) {
			$.post(js_base_path+'admin/getMetaDataList', 
				{'table':'inv_investigation_incident_cover','where':'in_investigation_id='+js_invform_id,'orderBy':'','select':'is_witness_to_incident','optionLabel':'','no_options':'1'}, 
				function(output){
					if( output == 1 ) {
						is_error = checkRequiredFields(sectionName, formId);
						if( is_error == 0 ) {
							addInvestigationFormData(sectionName, formId, idDivCollapse, idDataToggle, idDivBucket);
						}
					}
					else {
						addInvestigationFormData(sectionName, formId, idDivCollapse, idDataToggle, idDivBucket);
					}
				}
			);
		}
		else {
			if( sectionName != 'material_involved' && sectionName != 'investigation_photoes' ) {
				is_error = 0;
				is_error = checkRequiredFields(sectionName, formId);
			}
		}

		if( "COVER_NEXT" == sectionName ) {
			if( is_error == 1) {
				alert("Please enter INVESTIGATOR(S)");
				$("#txt_investigator_name").focus();
				return false;
			}
			else {
				window.location.href = js_base_path+"admin/investigation_page?invformid="+js_invform_id;
			}
		}
		else if( "witness_report" != sectionName ) {
			if( is_error == 0 ) {
				addInvestigationFormData(sectionName, formId, idDivCollapse, idDataToggle, idDivBucket);
			}
		}
	}

	
	function validateInvSection(arrSection)
	{
		// var arr1 = '{"1":"rdb_healthcare_professional1","dependent":{"1":"txt1","2":"txt2"}, "2":"rdb_healthcare_professional2","dependent":{"1":"txt1","2":"txt2"}}';
		// var arrSectionFields = eval(arrSection);
		// var arrSectionFields = JSON.parse(arrSection);
		
		var arrSectionFields = $.parseJSON(arrSection);
	
		for( item in arrSectionFields )
		{
			var parentElement = arrSectionFields[item];
			if( typeof parentElement != 'object' )
			{
				for( key_dependent in arrSectionFields['dependent'+item] )
				{
					var val_dependent = arrSectionFields['dependent'+item][key_dependent];
					checkRequiredField(parentElement, val_dependent);
				}
			}			
		}
	}

	function checkRequiredField (idField, fieldAction)
	{
		var val_id_field 	= $("input[id='"+idField+"']:checked");
		var field_action 	= $("#"+fieldAction);
		
		if( field_action.is(":radio") ) {
			var val_field_action 	= $("input[id='"+fieldAction+"']:checked").val();
		}
		else {
			var val_field_action 	= field_action.val();
		}
		
		
		if( val_id_field.length <= 0 ) {
			var val_id_field 	= $("#"+idField);
		}

		// alert( val_field_action );
		// console.log( idField+":"+val_id_field.val()+", "+fieldAction+": "+val_field_action );

		if( val_id_field.val() && val_id_field.val() !== '0' ) {
			if( val_field_action == '' || val_field_action === undefined ) {
				$("#"+fieldAction).parent().css( "background-color", "#FFBEBE" );
				$("#"+fieldAction).addClass('required');
			}
			else {
				$("#"+fieldAction).parent().css( "background-color", ""  );
			}
		}
		else {
			$("#"+fieldAction).removeClass('required');
			$("#"+fieldAction).parent().css( "background-color", ""  );
		}
	}
/*************** END - Investigators, Investigation workers ***************/




/*************** START - Investigations ***************/
// Save Investigation Section //
	// Additional Material Involved / Damaged
		function addMoreMaterialInvolved(isSectionDisabled)
		{
			var disabled = (isSectionDisabled == 'disabled') ? isSectionDisabled : '';
			
			var num = $('.cls_material_involved').length;
			cntMaterialInvolved = new Number(num + 1); // the numeric ID of the new input field being added

			var materialInvolvedAppend = '<div id="id_div_material_involved'+cntMaterialInvolved+'" class="cls_material_involved">';

			materialInvolvedAppend	+= '<div class="row-fluid">';
			materialInvolvedAppend 	+= '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Brief Description</label></div>';
			materialInvolvedAppend 	+= '<div class="span7"><input type="text" '+disabled+' name="txt_brief_description[new][]" id="txt_brief_description'+cntMaterialInvolved+'" class="selectpicker form-large-select container-width span10" placeholder=""/></div></div>';

			materialInvolvedAppend 	+= '<div class="row-fluid">';
			materialInvolvedAppend 	+= '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Type</label></div>';
			materialInvolvedAppend 	+= '<div class="span7"><input type="text" '+disabled+' name="txt_type[new][]" id="txt_type'+cntMaterialInvolved+'" class="selectpicker form-large-select container-width span10"  placeholder=""/></div></div>';

			materialInvolvedAppend 	+= '<div class="row-fluid">';
			materialInvolvedAppend 	+= '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Size</label></div>';
			materialInvolvedAppend 	+= '<div class="span7"><input type="text" '+disabled+' name="txt_size[new][]" id="txt_size'+cntMaterialInvolved+'" class="selectpicker form-large-select container-width span10" placeholder=""/></div></div>';
			
			materialInvolvedAppend 	+= '<div class="row-fluid">';
			materialInvolvedAppend 	+= '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Weight</label></div>';
			materialInvolvedAppend 	+= '<div class="span7"><input type="text" '+disabled+' name="txt_weight[new][]" id="txt_weight'+cntMaterialInvolved+'" class="selectpicker form-large-select container-width span10"  placeholder=""/></div></div>';
			
			materialInvolvedAppend 	+=	'<div class="row-fluid">';
			materialInvolvedAppend 	+= '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Make</label></div>';
			materialInvolvedAppend 	+= '<div class="span7"><input type="text" '+disabled+' name="txt_make[new][]" id="txt_make'+cntMaterialInvolved+'" class="selectpicker form-large-select container-width span10"  placeholder=""/></div></div>';
			
			materialInvolvedAppend 	+= '<div class="row-fluid">';
			materialInvolvedAppend 	+= '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Model</label></div>';
			materialInvolvedAppend 	+= '<div class="span7"><input type="text" '+disabled+' name="txt_model[new][]" id="txt_model'+cntMaterialInvolved+'" class="selectpicker form-large-select container-width span10"  placeholder=""/></div></div>';
			
			materialInvolvedAppend 	+= '<div class="row-fluid">';
			materialInvolvedAppend 	+= '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Serial</label></div>';
			materialInvolvedAppend 	+= '<div class="span7"><input type="text" '+disabled+' name="txt_serial[new][]" id="txt_serial'+cntMaterialInvolved+'" class="selectpicker form-large-select container-width span10"  placeholder=""/></div></div>';
			
			materialInvolvedAppend 	+= '<div class="row-fluid">';
			materialInvolvedAppend 	+= '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Manufacturer</label></div>';
			materialInvolvedAppend 	+= '<div class="span7"><input type="text" '+disabled+' name="txt_manufacturer[new][]" id="txt_manufacturer'+cntMaterialInvolved+'" class="selectpicker form-large-select container-width span10"  placeholder=""/></div></div>';

			materialInvolvedAppend 	+= '<div class="row-fluid">';
			materialInvolvedAppend 	+= '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Additional Specifications</label></div>';
			materialInvolvedAppend 	+= '<div class="span7"><input type="text" '+disabled+' name="txt_additional_specifications[new][]" id="txt_additional_specifications'+cntMaterialInvolved+'" class="selectpicker form-large-select container-width span10" placeholder=""/></div></div>';
			
			materialInvolvedAppend 	+= '<div class="row-fluid">';
			materialInvolvedAppend 	+= '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Estimated Cost of damage</label></div>';
			materialInvolvedAppend 	+= '<div class="span7"><input type="text" '+disabled+' name="txt_estimated_damage_cost[new][]" id="txt_estimated_damage_cost'+cntMaterialInvolved+'" class="selectpicker form-large-select container-width span10"  placeholder=""/></div></div>';			


			materialInvolvedAppend 	+= '<div class="upload_box_material'+cntMaterialInvolved+'">';
			materialInvolvedAppend 	+= '<div class="row-fluid">';
			materialInvolvedAppend 	+= '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Attach picture (Allowed file types: jpg, gif, png)</label></div>';
			materialInvolvedAppend 	+= '<div class="span7">';
			materialInvolvedAppend 	+= '<div class="file_browser_material'+cntMaterialInvolved+'"><input type="file" '+disabled+' id="file_material_photoes'+cntMaterialInvolved+'" name="userfile[new][]" class="hide_broswe_material'+cntMaterialInvolved+'" />(Max 2MB)<span id="err_file_material_photoes'+cntMaterialInvolved+'"></span></div>';
			materialInvolvedAppend 	+= '</div>';
			materialInvolvedAppend 	+= '</div>';

			materialInvolvedAppend 	+= '</div></div>';

			jQuery('#id_material_involved_bucket').append(materialInvolvedAppend);

			num = $('.cls_material_involved').length;
			if( num <= 1 ) {
				$('.btn_material_involved').attr('disabled', true);
			}
			else {
				$('.btn_material_involved').attr('disabled', false);
			}
		}
	
	// Vehicle Accident
		function addMoreVehicleAccident(isSectionDisabled)
		{
			var disabled = (isSectionDisabled == 'disabled') ? isSectionDisabled : '';
			
			var num = $('.cls_vehicle_accident').length;
			cntVehicleAccident = new Number(num + 1); // the numeric ID of the new input field being added

			var vehicleAccidentAppend = '<div id="id_div_vehicle_accident'+cntVehicleAccident+'" class="row-fluid cls_vehicle_accident">';
			vehicleAccidentAppend += '<div class="row-fluid"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Vehicle #'+cntVehicleAccident+'</label></div>';

			vehicleAccidentAppend += '<div class="row-fluid">';
			vehicleAccidentAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Driver\'s Name</label></div>';
			vehicleAccidentAppend += '<div class="span7"><input type="text" '+disabled+' name="txt_driver_name[new][]" id="txt_driver_name'+cntVehicleAccident+'" class="selectpicker form-large-select span10 container-width" placeholder=""/>';
			vehicleAccidentAppend += '</div></div>';
			
			vehicleAccidentAppend += '<div class="row-fluid">';
			vehicleAccidentAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Driver\'s License Number</label></div>';
			vehicleAccidentAppend += '<div class="span7"><input type="text" '+disabled+' name="txt_driver_license_number[new][]" id="txt_driver_license_number'+cntVehicleAccident+'" class="selectpicker form-large-select span10 container-width"  placeholder=""/></div></div>';

			vehicleAccidentAppend += '<div class="row-fluid">';
			vehicleAccidentAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Owner of the vehicle</label></div>';
			vehicleAccidentAppend += '<div class="span7"><input type="text" '+disabled+' name="txt_vehicle_owner[new][]" id="txt_vehicle_owner'+cntVehicleAccident+'" class="selectpicker form-large-select span10 container-width"  placeholder=""/></div></div>';
			
			vehicleAccidentAppend += '<div class="row-fluid">';
			vehicleAccidentAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Insurance Information</label></div>';
			vehicleAccidentAppend += '<div class="span7"><input type="text" '+disabled+' name="txt_insurance_information[new][]" id="txt_insurance_information'+cntVehicleAccident+'" class="selectpicker form-large-select span10 container-width"  placeholder="Company & Policy #"/></div></div>';
			
			vehicleAccidentAppend += '<div class="row-fluid">';
			vehicleAccidentAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Vehicle Make</label></div>';
			vehicleAccidentAppend += '<div class="span7"><input type="text" name="txt_vehicle_make[new][]" id="txt_vehicle_make'+cntVehicleAccident+'" class="selectpicker form-large-select span10 container-width" placeholder=""/></div></div>';
			
			vehicleAccidentAppend += '<div class="row-fluid">';
			vehicleAccidentAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Vehicle Model</label></div>';
			vehicleAccidentAppend += '<div class="span7"><input type="text" '+disabled+' name="txt_vehicle_model[new][]" id="txt_vehicle_model'+cntVehicleAccident+'" class="selectpicker form-large-select span10 container-width"  placeholder=""/></div></div>';
			
			vehicleAccidentAppend += '<div class="row-fluid">';
			vehicleAccidentAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Vehicle Year</label></div>';
			vehicleAccidentAppend += '<div class="span7"><input type="text" '+disabled+' name="txt_vehicle_year[new][]" id="txt_vehicle_year'+cntVehicleAccident+'" class="selectpicker form-large-select span10 container-width"  placeholder=""/></div></div>';
			
			vehicleAccidentAppend += '<div class="row-fluid">';
			vehicleAccidentAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Vehicle Type</label></div>';
			vehicleAccidentAppend += '<div class="span7"><input type="text" '+disabled+' name="txt_vehicle_type[new][]" id="txt_vehicle_type'+cntVehicleAccident+'" class="selectpicker form-large-select span10 container-width"  placeholder=""/></div></div>';
			
			vehicleAccidentAppend += '<div class="row-fluid">';
			vehicleAccidentAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Vehicle Colour</label></div>';
			vehicleAccidentAppend += '<div class="span7"><input type="text" '+disabled+' name="txt_vehicle_color[new][]" id="txt_vehicle_color'+cntVehicleAccident+'" class="selectpicker form-large-select span10 container-width"  placeholder=""/></div></div>';
			
			vehicleAccidentAppend += '<div class="row-fluid">';
			vehicleAccidentAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Vehicle License Plate #</label></div>';
			vehicleAccidentAppend += '<div class="span7"><input type="text" '+disabled+' name="txt_vehicle_license_plate[new][]" id="txt_vehicle_license_plate'+cntVehicleAccident+'" class="selectpicker form-large-select span10 container-width"  placeholder=""/></div></div>';

			vehicleAccidentAppend += '<div class="row-fluid">';
			vehicleAccidentAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Number of passengers</label></div>';
			vehicleAccidentAppend += '<div class="span7"><input type="text" '+disabled+' name="txt_no_of_passengers[new][]" id="txt_no_of_passengers'+cntVehicleAccident+'" class="selectpicker form-large-select span10 container-width" placeholder=""/></div></div>';

			vehicleAccidentAppend += '<div class="row-fluid">';
			vehicleAccidentAppend += '<div class="span8"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Were seat belts being warn?</label></div>';
			vehicleAccidentAppend += '<div class="span4"><input type="radio" '+disabled+' name="rdb_seat_belts_warns[new][]" value="1"/>  Yes<input type="radio" '+disabled+' name="rdb_seat_belts_warns[]" value="0"/>  No</div>';
			
			vehicleAccidentAppend += '</div></div>';

			jQuery('#id_vehicle_accident_bucket').append(vehicleAccidentAppend);
			
			num = $('.cls_vehicle_accident').length;
			if( num <= 1 ) {
				$('.btn_vehicle_accident').attr('disabled', true);
			}
			else {
				$('.btn_vehicle_accident').attr('disabled', false);
			}
		}



	// Witness Report//
		function addMoreWitnessReport(isSectionDisabled)
		{
			var disabled = (isSectionDisabled == 'disabled') ? isSectionDisabled : '';
			
			var num = $('.cls_witness_report').length;
			cntWitnessReport = new Number(num + 1); // the numeric ID of the new input field being added
			var num_witnessQues = $('.cls_witness_ques'+cntWitnessReport).length;

			var witnessRptAppend = '<div class="row-fluid cls_witness_report" id="id_div_witness_report'+cntWitnessReport+'">';

			witnessRptAppend += '<div class="row-fluid">';
			witnessRptAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Full Name</label></div>';
			witnessRptAppend += '<div class="span7"><input type="text" '+disabled+' name="txt_witness_fullname[new][]" id="txt_witness_fullname'+cntWitnessReport+'" class="required selectpicker form-large-select container-width span10" placeholder=""/></div></div>';

			witnessRptAppend += '<div class="row-fluid">';
			witnessRptAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Address</label></div>';
			witnessRptAppend += '<div class="span7"><input type="text" '+disabled+' name="txt_address[new][]" id="txt_address'+cntWitnessReport+'" class="required selectpicker form-large-select container-width span10" placeholder=""/></div></div>';

			witnessRptAppend += '<div class="row-fluid">';
			witnessRptAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Phone Number</label></div>';
			witnessRptAppend += '<div class="span7"><input type="text" '+disabled+' name="txt_phone_number[new][]" id="txt_phone_number'+cntWitnessReport+'" class="required selectpicker form-large-select container-width span10"  placeholder=""/></div></div>';
			
			witnessRptAppend += '<div class="row-fluid">';
			witnessRptAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Employers Name</label></div>';
			witnessRptAppend += '<div class="span7"><input type="text" '+disabled+' name="txt_employer_name[new][]" id="txt_employer_name'+cntWitnessReport+'" class="required selectpicker form-large-select container-width span10" placeholder=""/></div></div>';

			witnessRptAppend += '<div class="row-fluid">';
			witnessRptAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Interviewer\'s Name</label></div>';
			witnessRptAppend += '<div class="span7"><input type="text" '+disabled+' name="txt_interviewer_name[new][]" id="txt_interviewer_name'+cntWitnessReport+'" class="required selectpicker form-large-select container-width span10"  placeholder=""/></div></div>';

			witnessRptAppend += '<div class="row-fluid">';
			witnessRptAppend += '<div class="span12"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Witness Statement</label></div>';
			witnessRptAppend += '<div class="span12"><input type="text" '+disabled+' name="txt_witness_statement[new][]" id="txt_witness_statement'+cntWitnessReport+'" class="required selectpicker form-large-select container-width span10" placeholder="Describe in your own words the details including timings, what you saw and heard.  Please do not provide information that other workers spoke of regarding the details of what they seen or heard, only yours. Please list any workers you seen in the area that may have seen, heard, or contributed to the incident."/></div></div>';

			// Witness questions and answers //
				witnessRptAppend += '<div class="row-fluid">';
				witnessRptAppend += '<div class="span12"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Interviewers Questions</label></div></div>';

				witnessRptAppend += '<div class="row-fluid" id="id_witness_ques_bucket'+cntWitnessReport+'">';
				
				witnessRptAppend += '<div class="row-fluid cls_witness_ques'+cntWitnessReport+'" id="id_div_witness_ques'+cntWitnessReport+'1">';
				witnessRptAppend += '<div class="row-fluid">';
				
				witnessRptAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Question #1</label></div>';
				witnessRptAppend += '<div class="span7"><input type="text" '+disabled+' name="txt_question[new]['+cntWitnessReport+'][]" id="txt_question'+cntWitnessReport+'1" class="required selectpicker form-large-select container-width span10"  placeholder=""/></div></div>';
				
				witnessRptAppend += '<div class="row-fluid">';
				witnessRptAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Answer #1</label></div>';
				witnessRptAppend += '<div class="span7"><input type="text" '+disabled+' name="txt_answer[new]['+cntWitnessReport+'][]" id="txt_answer'+cntWitnessReport+'1" class="required selectpicker form-large-select container-width span10"  placeholder=""/></div></div>';

				witnessRptAppend += '</div></div>';

				if( disabled == '' ) {
					witnessRptAppend += '<div class="row-fluid">';
					witnessRptAppend += '<div class="span12"><a id="btn_addnew_witness_ques'+cntWitnessReport+'" onclick="addMoreWitnessQues('+cntWitnessReport+');" class="btn btn-warning pull-right">Add New Question</a>';
					witnessRptAppend += '<button type="button" class="btn fr btn_witness_ques'+cntWitnessReport+'" onclick=javascript:deleteInvestigationSection("witness_ques'+cntWitnessReport+'");>Delete</button></div>';
				}				
				witnessRptAppend += '</div></div>';

				
			jQuery('#id_witness_report_bucket').append(witnessRptAppend);
			
			num = $('.cls_witness_report').length;
			if( num <= 1 ) {
				$('.btn_witness_report').attr('disabled', true);
			}
			else {
				$('.btn_witness_report').attr('disabled', false);
			}
			
			num_witnessQues = $('.cls_witness_ques'+cntWitnessReport).length;
			if( num <= 1 ) {
				$('.btn_witness_ques'+cntWitnessReport).attr('disabled', true);
			}
			else {
				$('.btn_witness_ques'+cntWitnessReport).attr('disabled', false);
			}
		}

	// Witness Questions//
		function addMoreWitnessQues( cntWitness, idWitnessReport, section )
		{
			var num = $('.cls_witness_ques'+cntWitness).length;
			cntWitnessQues = new Number(num + 1); // the numeric ID of the new input field being added

			if( 'edit' == section ) {
				param1 	= idWitnessReport;
				param2 	= 'new';
				quesVal = idWitnessReport;
			}
			else {
				param1 	= 'new';
				param2 	= cntWitness;
				quesVal = cntWitness;
			}

			var witnessQuesAppend = '<div class="row-fluid cls_witness_ques'+cntWitness+'" id="id_div_witness_ques'+cntWitness+cntWitnessQues+'">';
			witnessQuesAppend += '<div class="row-fluid">';
			witnessQuesAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white"></i>Question #<span id="lblques'+cntWitnessQues+'">'+cntWitnessQues+'</span></label></div>';
			witnessQuesAppend += '<div class="span7"><input type="text" name="txt_question['+param1+']['+param2+'][]" id="txt_question'+quesVal+cntWitnessQues+'" class="required selectpicker form-large-select container-width span10"  placeholder=""/></div></div>';
			witnessQuesAppend += '<div class="row-fluid">';
			witnessQuesAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Answer #<span id="lblans'+cntWitnessQues+'">'+cntWitnessQues+'</span></label></div>';
			witnessQuesAppend += '<div class="span7"><input type="text" name="txt_answer['+param1+']['+param2+'][]" id="txt_answer'+quesVal+cntWitnessQues+'" class="required selectpicker form-large-select container-width span10" placeholder=""/></div>';
			witnessQuesAppend += '</div>';
			witnessQuesAppend += '</div>';

			jQuery('#id_witness_ques_bucket'+cntWitness).append(witnessQuesAppend);

			num = $('.cls_witness_ques'+cntWitness).length;
			if( num <= 1 ) {
				$('.btn_witness_ques'+cntWitness).attr('disabled', true);
			}
			else {
				$('.btn_witness_ques'+cntWitness).attr('disabled', false);
			}
		}

	// Possible Contributing Factors //
		function addMoreContribFactors(isSectionDisabled)
		{
			var disabled = (isSectionDisabled == 'disabled') ? isSectionDisabled : '';
			
			var num = $('.cls_possible_contrib_factors').length;
			cntContribFactors = new Number(num + 1); // the numeric ID of the new input field being added
			
			var contribFactorsAppend= '<div class="row-fluid cls_possible_contrib_factors" id="id_div_possible_contrib_factors'+cntContribFactors+'">';
			contribFactorsAppend 	+= '<div class="span12">';
			contribFactorsAppend 	+= '<input type="text" '+disabled+' name="txt_other_contributing_factors[]" id="txt_other_contributing_factors'+cntContribFactors+'" class="selectpicker form-large-select span10 container-width"  placeholder="('+cntContribFactors+')"/>';

			contribFactorsAppend 	+= '</div></div>';
			jQuery('#id_contrib_factors_bucket').append(contribFactorsAppend);
			
			num = $('.cls_possible_contrib_factors').length;
			if( num <= 1 ) {
				$('.btn_possible_contrib_factors').attr('disabled', true);
			}
			else {
				$('.btn_possible_contrib_factors').attr('disabled', false);
			}
		}

	// Add Investigation Photoes
		function addMoreInvPhotoes(isSectionDisabled)
		{
			var disabled = (isSectionDisabled == 'disabled') ? isSectionDisabled : '';
			
			var num = $('.cls_inv_photoes').length;
			cntInvPhotoes = new Number(num + 1); // the numeric ID of the new input field being added

			var invPhotoesAppend 	= '<div id="id_div_inv_photoes'+cntInvPhotoes+'" class="upload_box_inv_photo'+cntInvPhotoes+' cls_inv_photoes">';
			invPhotoesAppend += '<div class="row-fluid">';
			invPhotoesAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Attach picture #'+cntInvPhotoes+' (Allowed file types: jpg, gif, png)</label></div>';
			invPhotoesAppend += '<div class="span7"><div class="file_browser_inv_photo'+cntInvPhotoes+'"><input type="file" '+disabled+' class="hide_broswe_inv_photo'+cntInvPhotoes+'" name="userfile[new][]" id="file_inv_photoes'+cntInvPhotoes+'" placeholder=""/>(Max 2MB)<span id="err_file_inv_photoes'+cntInvPhotoes+'"></span></div>';
			invPhotoesAppend += '</div></div>';

			invPhotoesAppend += '<div class="row-fluid">';
			invPhotoesAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Description</label></div>';
			invPhotoesAppend += '<div class="span7"><input type="text" '+disabled+' name="txt_picture_description[new][]" id="txt_picture_description'+cntInvPhotoes+'" class="selectpicker form-large-select span10 container-width" placeholder="Picture Description"/></div></div>';

			invPhotoesAppend += '</div>';

			jQuery('#id_inv_photo_bucket').append(invPhotoesAppend);

			num = $('.cls_inv_photoes').length;
			if( num <= 1 ) {
				$('.btn_inv_photoes').attr('disabled', true);
			}
			else {
				$('.btn_inv_photoes').attr('disabled', false);
			}
		}
		
		function setOtherLanguage(cntNo)
		{
			$("#cmb_preferred_language"+cntNo).change(function() {
				$sel_preferred_lang = $(this).val();
				if( "other" == $sel_preferred_lang ) {
					$("#txt_preferred_language"+cntNo).show();
				}
				else if( "other" != $sel_preferred_lang ) {
					$("#txt_preferred_language"+cntNo).hide();
					$("#txt_preferred_language"+cntNo).val("");
				}
			});
		}
		
		
	// Add Injured Workers
		function addMoreInjuredWorker(isSectionDisabled)
		{
			var disabled = (isSectionDisabled == 'disabled') ? isSectionDisabled : '';
			
			var num = $('.cls_injury_report').length;
			cntInjReport = new Number(num + 1); // the numeric ID of the new input field being added
			var num_injbodypart = $('.cls_injury_bodypart'+cntInjReport).length;

			var injReportAppend = '<div class="row-fluid cls_injury_report" id="id_div_injury_report'+cntInjReport+'">';

			injReportAppend += '<div class="row-fluid"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Injured Worker #'+cntInjReport+'</label></div>';
			injReportAppend += '<div class="row-fluid">';
			injReportAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Full Name</label></div>';
			injReportAppend += '<div class="span7 required">';
			injReportAppend += '<input type="text" '+disabled+' name="txt_worker_fullname[new][]" id="txt_worker_fullname'+cntInjReport+'" class="required selectpicker form-large-select span10 container-width" placeholder=""/></div></div>';

			injReportAppend += '<div class="row-fluid">';
			injReportAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Employer</label></div>';
			injReportAppend += '<div class="span7 required">';
			injReportAppend += '<input type="text" '+disabled+' name="txt_worker_employer_name[new][]" id="txt_worker_employer_name'+cntInjReport+'" class="required selectpicker form-large-select span10 container-width"  placeholder=""/></div></div>';

			injReportAppend += '<div class="row-fluid">';
			injReportAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Address</label></div>';
			injReportAppend += '<div class="span7 required">';
			injReportAppend += '<input type="text" '+disabled+' name="txt_address[new][]" id="txt_address'+cntInjReport+'" class="required selectpicker form-large-select span10 container-width"  placeholder=""/></div></div>';
			
			injReportAppend += '<div class="row-fluid">';
			injReportAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Phone Number</label></div>';
			injReportAppend += '<div class="span7 required">';
			injReportAppend += '<input type="text" '+disabled+' name="txt_phone_number[new][]" id="txt_phone_number'+cntInjReport+'" class="required selectpicker form-large-select span10 container-width"  placeholder=""/></div></div>';
			
			injReportAppend += '<div class="row-fluid">';
			injReportAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Job Title</label></div>';
			injReportAppend += '<div class="span7 required">';
			injReportAppend += '<input type="text" '+disabled+' name="txt_job_title[new][]" id="txt_job_title'+cntInjReport+'" class="required selectpicker form-large-select span10 container-width" placeholder=""/></div></div>';

			injReportAppend += '<div class="row-fluid">';
			injReportAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Time and experience at this position</label></div>';
			injReportAppend += '<div class="span7 required">';
			injReportAppend += '<input type="text" '+disabled+' name="txt_position_time_experience[new][]" id="txt_position_time_experience'+cntInjReport+'" class="selectpicker form-large-select span10 required container-width"  placeholder=""/></div></div>';

			injReportAppend += '<div class="row-fluid">';
			injReportAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Date of Birth</label></div>';
			injReportAppend += '<div class="span7 required">';
			injReportAppend += '<input type="text" '+disabled+' name="txt_dob[new][]" id="txt_dob'+cntInjReport+'" class="required selectpicker form-large-select span10 datestamp'+cntInjReport+'" placeholder="yy-mm-dd"/></div></div>';

			injReportAppend += '<div class="row-fluid">';
			injReportAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Preferred Language</label></div>';
			injReportAppend += '<div class="span7 required">';

			injReportAppend += '<select name="cmb_preferred_language['+cntInjReport+']" '+disabled+' onchange="setOtherLanguage('+cntInjReport+')" id="cmb_preferred_language'+cntInjReport+'" name="language" placeholder="Select Language" class="input-xlarge" required>';
			injReportAppend += '<option value="">-select-</option>';

			for( var cntlang in $languages ) {
				injReportAppend += '<option value="'+$languages[cntlang]['language']+'">'+$languages[cntlang]['language']+'</option>';
			}
			injReportAppend += '<option value="other">Other</option>';
			injReportAppend += '</select>';
	
			injReportAppend += '<input type="text" style="display:none;" '+disabled+' name="txt_preferred_language[new][]" id="txt_preferred_language'+cntInjReport+'" class="selectpicker form-large-select span10 container-width" placeholder="Other"/></div></div>';

			
			injReportAppend += '<div class="row-fluid">';
			injReportAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Sex</label></div>';
			injReportAppend += '<div class="span7 required">';
			injReportAppend += '<input type="radio" '+disabled+' name="rdb_sex[new][]" class="required" value="Male"/>  Male';
			injReportAppend += '<input type="radio" '+disabled+' name="rdb_sex[new][]" class="required" value="Female"/>  Female</div></div>';
			
			injReportAppend += '<div class="row-fluid">';
			injReportAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Is Worker Unionized</label></div>';
			injReportAppend += '<div class="span7 required">';
			injReportAppend += '<input type="radio" '+disabled+' name="rdb_worker_unionized[new][]" id="rdb_worker_unionized'+cntInjReport+'" class="required" value="1"/>  Yes';
			injReportAppend += '<input type="radio" '+disabled+' name="rdb_worker_unionized[new][]" id="rdb_worker_unionized'+cntInjReport+'" class="required" value="0"/>  No';
			injReportAppend += '<input type="text" '+disabled+' name="txt_worker_union_name[new][]" id="txt_worker_union_name'+cntInjReport+'" class="selectpicker form-large-select span10 container-width" placeholder="If yes please state Union Name"/></div></div>';

			injReportAppend += '<div class="row-fluid">';
			injReportAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Employment Type</label></div>';
			injReportAppend += '<div class="span7 required">';
			injReportAppend += '<input type="radio" '+disabled+' name="rdb_employeement_type[new][]" class="required" value="Full" /> Full';
			injReportAppend += '<input type="radio" '+disabled+' name="rdb_employeement_type[new][]" class="required" value="Part Time"/> Part Time';
			injReportAppend += '<input type="radio" '+disabled+' name="rdb_employeement_type[new][]" class="required" value="Apprentice"/> Apprentice';
			injReportAppend += '<input type="radio" '+disabled+' name="rdb_employeement_type[new][]" class="required" value="Student"/> Student';
			injReportAppend += '<input type="radio" '+disabled+' name="rdb_employeement_type[new][]" class="required" value="Volunteer" /> Volunteer';
			injReportAppend += '</div></div>';

			injReportAppend += '<div class="row-fluid">';
			injReportAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Was First Aid Provided</label></div>';
			injReportAppend += '<div class="span7 required">';
			injReportAppend += '<input type="radio" '+disabled+' class="required" name="rdb_firstaid_provided[new][]" id="rdb_firstaid_provided'+cntInjReport+'" value="1"/>  Yes';
			injReportAppend += '<input type="radio" '+disabled+' class="required" name="rdb_firstaid_provided[new][]" id="rdb_firstaid_provided'+cntInjReport+'" value="0"/>  No';
			injReportAppend += '<input type="text" '+disabled+' name="txt_firstaid_provided_by[new][]" id="txt_firstaid_provided_by'+cntInjReport+'" class="selectpicker form-large-select span10 container-width" placeholder="If yes, by who?"/></div></div>';

			injReportAppend += '<div class="row-fluid">';
			injReportAppend += '<div class="span7"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Did the Worker see a health care professional regarding this injury?</label></div>';
			injReportAppend += '<div class="span5 required">';
			injReportAppend += '<input type="radio" '+disabled+' class="required" name="rdb_healthcare_professional[new][]" id="rdb_healthcare_professional'+cntInjReport+'" value="1"/>  Yes';
			injReportAppend += '<input type="radio" '+disabled+' class="required" name="rdb_healthcare_professional[new][]" id="rdb_healthcare_professional'+cntInjReport+'" value="0"/>  No';
			injReportAppend += '</div></div>';
			
			injReportAppend += '<div class="row-fluid">';
			injReportAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Date Worker received health care?</label></div>';
			injReportAppend += '<div class="span7 required">';
			injReportAppend += '<input type="text" '+disabled+' name="txt_healthcare_received_date[new][]" id="txt_healthcare_received_date'+cntInjReport+'" class="selectpicker form-large-select span10 datestamp'+cntInjReport+'" placeholder="yy-mm-dd --:--"/></div></div>';
			
			injReportAppend += '<div class="row-fluid">';
			injReportAppend += '<div class="span12"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>When did site management learn that the worker received health care?</label></div>';
			injReportAppend += '<div class="span5 required">';
			injReportAppend += '<input type="text" '+disabled+' name="txt_management_learn_worker_received_healthcare[new][]" id="txt_management_learn_worker_received_healthcare'+cntInjReport+'" class="selectpicker form-large-select span10 datestamp'+cntInjReport+' container-width" placeholder="yy-mm-dd --:--"/>';
			injReportAppend += '</div>';
			injReportAppend += '<div class="span6 required">';
			injReportAppend += '<input type="text" '+disabled+' name="txt_name_position_worker_reported_to[new][]" id="txt_name_position_worker_reported_to'+cntInjReport+'" class="selectpicker form-large-select span10 container-width"  placeholder="Name & Position of person it was reported to"/>';
			injReportAppend += '</div></div>';

			injReportAppend += '<div class="row-fluid">';
			injReportAppend += '<div class="span12"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Where did the worker get treatment for his/her injuries?</label></div>';
			injReportAppend += '<div class="span11 required">';
			injReportAppend += '<input type="radio" '+disabled+' class="required" name="rdb_place_of_worker_treatment[new][]" value="Health Professional Office" /> Health Professional Office';
			injReportAppend += '<br><input type="radio" '+disabled+' class="required" name="rdb_place_of_worker_treatment[new][]" value="Ambulance" /> Ambulance';
			injReportAppend += '<br><input type="radio" '+disabled+' class="required" name="rdb_place_of_worker_treatment[new][]" value="Physiotherapy" /> Physiotherapy';
			injReportAppend += '<br><input type="radio" '+disabled+' class="required" name="rdb_place_of_worker_treatment[new][]" value="Emergency Department" /> Emergency Department';
			injReportAppend += '<br><input type="radio" '+disabled+' class="required" name="rdb_place_of_worker_treatment[new][]" value="Walk In Clinic" /> Walk In Clinic';
			injReportAppend += '<br><input type="radio" '+disabled+' class="required" name="rdb_place_of_worker_treatment[new][]" value="Hospital" /> Hospital';
			injReportAppend += '</div></div>';

			injReportAppend += '<div class="row-fluid">';
			injReportAppend += '<div class="span12"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Provide the name, address & phone number of the facility where the worker was treated </label></div>';
			injReportAppend += '<div class="span11 required">';
			injReportAppend += '<input type="text" '+disabled+' name="txt_facility_name_address_phone_worker_treated[new][]" id="txt_facility_name_address_phone_worker_treated'+cntInjReport+'" class="required selectpicker form-large-select span10 container-width"  placeholder="Provide the name, address & phone number of the facility where the worker was treated"/></div></div>';
			
			injReportAppend += '<div class="row-fluid">';
			injReportAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Who transported the worker to seek medical aid?</label></div>';
			injReportAppend += '<div class="span7 required">';
			injReportAppend += '<input type="text" '+disabled+' name="txt_name_phone_transported_by_for_medical_aid[new][]" id="txt_name_phone_transported_by_for_medical_aid'+cntInjReport+'" class="required selectpicker form-large-select span10 container-width"  placeholder="Name & phone number"/>';
			injReportAppend += '</div></div>';
			
			injReportAppend += '<div class="row-fluid">';
			injReportAppend += '<div class="span7"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Is the worker fit for work?</label></div>';
			injReportAppend += '<div class="span5 required">';
			injReportAppend += '<input type="radio" '+disabled+' class="required" name="rdb_worker_fit_for_work[new][]" id="rdb_worker_fit_for_work'+cntInjReport+'" value="1"/>  Yes';
			injReportAppend += '<input type="radio" '+disabled+' class="required" name="rdb_worker_fit_for_work[new][]" id="rdb_worker_fit_for_work'+cntInjReport+'" value="0"/>  No';
			injReportAppend += '</div></div>';

			injReportAppend += '<div class="row-fluid">';
			injReportAppend += '<div class="span12 required">';
			injReportAppend += '<div class="span12"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Select the status of the worker</label></div>';
			injReportAppend += '<div class="span11 required">';
			injReportAppend += '<input type="radio" '+disabled+' class="" name="rdb_worker_status[new][]" id="rdb_worker_status'+cntInjReport+'" value="Worker will be returning to regular duties"/>  Worker will be returning to regular duties';
			injReportAppend += '<br><input type="radio" '+disabled+' class="" name="rdb_worker_status[new][]" id="rdb_worker_status'+cntInjReport+'" value="Worker will be returning to modified duties"/>  Worker will be returning to modified duties';
			injReportAppend += '<br><input type="radio" '+disabled+' class="" name="rdb_worker_status[new][]" id="rdb_worker_status'+cntInjReport+'" value="Worker will be unable to return to work"/>  Worker will be unable to return to work';
			injReportAppend += '</div></div>';

			injReportAppend += '<div class="row-fluid">';
			injReportAppend += '<div class="span8"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>How many days (if any) was the worker away from work due to this incident?</label></div>';
			injReportAppend += '<div class="span4 required">';
			
			/*
			injReportAppend += '<input type="text" '+disabled+' name="txt_days_worker_away_due_to_incident[new][]" id="txt_days_worker_away_due_to_incident'+cntInjReport+'" class="required selectpicker form-large-select span10"  placeholder=""/>';
			*/
			
			injReportAppend += '<select name="txt_days_worker_away_due_to_incident[new][]" '+disabled+' id="txt_days_worker_away_due_to_incident'+cntInjReport+'" class="required">';
			injReportAppend += '<option value="">-select-</option>';
			for( var cnt_workerdueincident=1;cnt_workerdueincident<=999;cnt_workerdueincident++ ) {
				injReportAppend += '<option value="'+cnt_workerdueincident+'">'+cnt_workerdueincident+'</option>';
			}
			injReportAppend += '</select>';

			injReportAppend += '</div></div>';

			// Injured body parts //
				injReportAppend += '<div class="row-fluid">';
				injReportAppend += '<div class="span12"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Select which parts of the workers body was injured according to the medical reports</label></div>';

				injReportAppend += '<div class="row-fluid" id="id_injury_bodypart_bucket'+cntInjReport+'">';
				injReportAppend += '<div class="row-fluid cls_injury_bodypart'+cntInjReport+'" id="id_div_injury_bodypart'+cntInjReport+'1">';
				injReportAppend += '<div class="span12 required">';

				injReportAppend += '<select '+disabled+' class="required" name="cmb_body_parts_injured[new][]" id="cmb_body_parts_injured'+cntInjReport+'1"></select>';
				$.post(js_base_path+'admin/getMetaDataList', 
					{'table':'inv_injury_bodyparts','where':'1','orderBy':'','select':'st_injury_bodypart','optionLabel':''}, 
					function(output){
						jQuery("#cmb_body_parts_injured"+cntInjReport+"1").html(output);
					}
				);

				injReportAppend += '<select class="required" '+disabled+' name="cmb_type_body_parts_injured[new][]" id="cmb_type_body_parts_injured'+cntInjReport+'1" >';
				injReportAppend += '<option value="SPRAIN/STRAIN">SPRAIN/STRAIN</option>';
				injReportAppend += '<option value="CUT/SCRAP/BRUISE/ABRASION">CUT/SCRAP/BRUISE/ABRASION</option>';
				injReportAppend += '<option value="FRACTURED BONE(S)">FRACTURED BONE(S)</option>';
				injReportAppend += '<option value="PUNCTURE">PUNCTURE</option>';
				injReportAppend += '<option value="DISLOCATION">DISLOCATION</option>';
				injReportAppend += '<option value="BURN">BURN</option>';
				injReportAppend += '<option value="AMPUTATION">AMPUTATION</option>';
				injReportAppend += '<option value="LOSS OF CONCISENESS">LOSS OF CONCISENESS</option>';
				injReportAppend += '</select>';

				if( disabled == '' ) {
					injReportAppend += '<a id="btn_add_injured_bodypart" onclick="addMoreInjuredBodyPart('+cntInjReport+',1,0,1);" class="btn btn-warning">Add Injured Body Part</a>';
					injReportAppend += '<button type="button" class="btn fr btn_injury_bodypart'+cntInjReport+'" onclick=javascript:deleteInvestigationSection("injury_bodypart'+cntInjReport+'");>Delete</button>';
				}
	
			injReportAppend += '</div></div></div></div>';

			injReportAppend += '<div class="row-fluid">';
			injReportAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Give a brief description of the injury:</label></div>';
			injReportAppend += '<div class="span7 required">';
			injReportAppend += '<input type="text" '+disabled+' name="txt_injury_brief_description[new][]" id="txt_injury_brief_description'+cntInjReport+'" class="required selectpicker form-large-select span10 container-width"  placeholder=""/>';

			injReportAppend += '</div></div></div>';
			
			
			var pInjuredWorkers = parseInt($("#hidn_pInjuredWorkers").val());
			var arr_validation = '"'+parseInt(cntInjReport+pInjuredWorkers)+'":"rdb_healthcare_professional'+cntInjReport+'","dependent'+parseInt(cntInjReport+pInjuredWorkers)+'":{"1":"txt_healthcare_received_date'+cntInjReport+'", "2":"txt_management_learn_worker_received_healthcare'+cntInjReport+'", "3":"txt_name_position_worker_reported_to'+cntInjReport+'"},';
			pInjuredWorkers = parseInt( pInjuredWorkers + 1 );

			arr_validation += '"'+parseInt(cntInjReport+pInjuredWorkers)+'":"rdb_worker_unionized'+cntInjReport+'","dependent'+parseInt(cntInjReport+pInjuredWorkers)+'":{"1":"txt_worker_union_name'+cntInjReport+'"},';
			pInjuredWorkers = parseInt( pInjuredWorkers + 1 );

			arr_validation += '"'+parseInt(cntInjReport+pInjuredWorkers)+'":"rdb_firstaid_provided'+cntInjReport+'","dependent'+parseInt(cntInjReport+pInjuredWorkers)+'":{"1":"txt_firstaid_provided_by'+cntInjReport+'"},';
			pInjuredWorkers = parseInt( pInjuredWorkers + 1 );

			arr_validation += '"'+parseInt(cntInjReport+pInjuredWorkers)+'":"rdb_worker_fit_for_work'+cntInjReport+'","dependent'+parseInt(cntInjReport+pInjuredWorkers)+'":{"1":"rdb_worker_status'+cntInjReport+'"}';

			var html_output = (jQuery("#validation_injury_report").html()) ? jQuery("#validation_injury_report").html() : '';			
			if( html_output ) {
				jQuery("#validation_injury_report").html( (html_output+","+arr_validation) );
			}
			else {
				jQuery("#validation_injury_report").html( arr_validation );
			}			
			$("#hidn_pInjuredWorkers").val(pInjuredWorkers);

			jQuery('#id_injury_report_bucket').append(injReportAppend);
			
			
			num_injbodypart = $('.cls_injury_bodypart'+cntInjReport).length;
			if( num_injbodypart <= 1 ) {
				$('.btn_injury_bodypart'+cntInjReport).attr('disabled', true);
			}
			else {
				$('.btn_injury_bodypart'+cntInjReport).attr('disabled', false);
			}

			var num = $('.cls_injury_report').length;
			if( num <= 1 ) {
				$('.btn_injury_report').attr('disabled', true);
			}
			else {
				$('.btn_injury_report').attr('disabled', false);
			}

			jQuery('.datestamp'+cntInjReport).datetimepicker({dateFormat: "yy-mm-dd"});
			jQuery('.displaydate'+cntInjReport).datepicker({dateFormat: "yy-mm-dd"});
		}
		

	// Injury Report Bodyparts //
		function addMoreInjuredBodyPart( cntInjReport, cntInjBodyPart, idInjWorker, section )
		{
			var num = $('.cls_injury_bodypart'+cntInjReport).length;
			cntInjuryBodyPart = new Number(num + 1); // the numeric ID of the new input field being added

			if( '2' == section ) {
				bodypartVal = idInjWorker;
			}
			if( '1' == section ) {
				bodypartVal = "new";
			}
			
			var injBodyPartAppend = '<div class="row-fluid cls_injury_bodypart'+cntInjReport+'" id="id_div_injury_bodypart'+cntInjReport+cntInjuryBodyPart+'">';
			injBodyPartAppend += '<div class="span12">';
			injBodyPartAppend += '<select class="selectpicker" name="cmb_body_parts_injured['+bodypartVal+'][]" id="cmb_body_parts_injured'+bodypartVal+cntInjuryBodyPart+'"></select>';
								
			injBodyPartAppend += '<select class="selectpicker" name="cmb_type_body_parts_injured['+bodypartVal+'][]" id="cmb_type_body_parts_injured'+bodypartVal+cntInjuryBodyPart+'" >';
			injBodyPartAppend += '<option value="SPRAIN/STRAIN">SPRAIN/STRAIN</option>';
			injBodyPartAppend += '<option value="CUT/SCRAP/BRUISE/ABRASION">CUT/SCRAP/BRUISE/ABRASION</option>';
			injBodyPartAppend += '<option value="FRACTURED BONE(S)">FRACTURED BONE(S)</option>';
			injBodyPartAppend += '<option value="PUNCTURE">PUNCTURE</option>';
			injBodyPartAppend += '<option value="DISLOCATION">DISLOCATION</option>';
			injBodyPartAppend += '<option value="BURN">BURN</option>';
			injBodyPartAppend += '<option value="AMPUTATION">AMPUTATION</option>';
			injBodyPartAppend += '<option value="LOSS OF CONCISENESS">LOSS OF CONCISENESS</option>';
			injBodyPartAppend += '</select>';

			injBodyPartAppend += '</div></div>';

			$.post(js_base_path+'admin/getMetaDataList', 
				{'table':'inv_injury_bodyparts','where':'1','orderBy':'','select':'st_injury_bodypart','optionLabel':''}, 
				function(data){
					jQuery('#cmb_body_parts_injured'+bodypartVal+cntInjuryBodyPart).html(data);
				});

			jQuery('#id_injury_bodypart_bucket'+cntInjReport).append(injBodyPartAppend);

			num = $('.cls_injury_bodypart'+cntInjReport).length;
			if( num <= 1 ) {
				$('.btn_injury_bodypart'+cntInjReport).attr('disabled', true);
			}
			else {
				$('.btn_injury_bodypart'+cntInjReport).attr('disabled', false);
			}
		}


	// Recommended Actions //
		function addMoreRecommendedActions(isSectionDisabled)
		{
			var disabled = (isSectionDisabled == 'disabled') ? isSectionDisabled : '';
			
			var num = $('.cls_recommended_actions').length;
			cntRecomActions = new Number(num + 1); // the numeric ID of the new input field being added

			var recomActionsAppend = '<div class="row-fluid cls_recommended_actions" id="id_div_recommended_actions'+cntRecomActions+'">';
			recomActionsAppend += '<div class="row-fluid">';
			recomActionsAppend += '<div class="span2"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>('+cntRecomActions+')</label></div>';
			recomActionsAppend += '<div class="span10">';
			recomActionsAppend += '<input type="text" '+disabled+' name="txt_action_name[new][]" id="txt_action_name'+cntRecomActions+'" class="selectpicker form-large-select span10 container-width"  placeholder=""/>';
			recomActionsAppend += '</div></div>';

			recomActionsAppend += '<div class="row-fluid">';
			recomActionsAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Assign to:</label></div>';
			recomActionsAppend += '<div class="span7 input-append">';
			recomActionsAppend += '<input type="text" '+disabled+' name="txt_action_assign_to[new][]" id="txt_action_assign_to'+cntRecomActions+'" onkeydown=javascript:getUsers("txt_action_assign_to'+cntRecomActions+'"); class="selectpicker form-large-select span10 container-width"  placeholder="Search"/>';
			recomActionsAppend += '</div>';
			recomActionsAppend += '<div class="clear"></div>';
			recomActionsAppend += '</div>';
			
			recomActionsAppend += '<div class="row-fluid">';
			recomActionsAppend += '<div class="span5"><label class="btn-warning clearfix"><i class="pull-right sprite-white "></i>Date to Comply:</label></div>';
			recomActionsAppend += '<div class="span7">';
			recomActionsAppend += '<input type="text" '+disabled+' name="txt_action_comply_date[new][]" id="txt_action_comply_date'+cntRecomActions+'" class="selectpicker form-large-select span10 datestamp'+cntRecomActions+' container-width" placeholder="yy-mm-dd --:--"/>';
			recomActionsAppend += '</div>';

			recomActionsAppend += '</div></div>';

			
											
			var arr_validation = '"'+cntRecomActions+'":"txt_action_name'+cntRecomActions+'","dependent'+cntRecomActions+'":{"1":"txt_action_assign_to'+cntRecomActions+'", "2":"txt_action_comply_date'+cntRecomActions+'"}';
			
			var html_output = (jQuery("#validation_recommended_actions").html()) ? jQuery("#validation_recommended_actions").html() : '';			
			if( html_output ) {
				jQuery("#validation_recommended_actions").html( (html_output+","+arr_validation) );
			}
			else {
				jQuery("#validation_recommended_actions").html( arr_validation );
			}
			
			
			
			jQuery('#id_recommended_actions_bucket').append(recomActionsAppend);
			
			jQuery('.datestamp'+cntRecomActions).datetimepicker({dateFormat: "yy-mm-dd"});
			
			num = $('.cls_recommended_actions').length;
			if( num <= 1 ) {
				$('.btn_recommended_actions').attr('disabled', true);
			}
			else {
				$('.btn_recommended_actions').attr('disabled', false);
			}
		}	
		
		
		
		function split( val ) {
			return val.split( /,\s*/ );
		}
		function extractLast( term ) {
			return split( term ).pop();
		}
		function getUsers(idVal)
		{
			$( "#"+idVal )
				// don't navigate away from the field on tab when selecting an item
				.bind( "keydown", function( event ) {
					if ( event.keyCode === $.ui.keyCode.TAB && $( this ).data( "ui-autocomplete" ).menu.active ) {
						event.preventDefault();
					}
				})
				.autocomplete({
					source: function( request, response ) {
						$.getJSON( js_base_path+"ajax/ajax_getConnections", {term: extractLast( request.term )}, response );
					}, 
					focus: function() {
						// prevent value inserted on focus
						return false;
					}
				});
		}
		
		
		function sealInvestigation(btnLabel)
		{
			if( confirm("Are you sure you want to Seal this Investigation?") ) {
				$('#frm_seal_investigation').attr('action', function(i, value) {
					return value+"&inv_status="+btnLabel;
				});
				
				frm_seal_investigation.submit();
				return true;
			}
			else {
				return false;
			}
		}

		function deleteS1Module(id, section)
		{
			if( confirm("Are you sure you want to delete this?") ) {
				$.ajax({
					url: js_base_path+'ajax/ajaxDeleteSection',
					type: 'post', 
					data: 'id='+id+'&section='+section, 
					success: function(output) {
						window.location.href=js_base_path+"admin/my_created_procedures_metro?id="+$procedure_id+"&type=new_procedure";
						return false;
					},
					error: function(errMsg) {
						alert( errMsg.responseText );
						return false;
					}
				});
			}
			else {
				return false;
			}
		}
/*************** END - Investigations ***************/



function setPagePoints(pointPageId, pointPageSectionId, idShowPoints, modalPageSection, visitedSection)
{
	$.ajax({
		url: js_base_path+'ajax/ajax_set_get_page_points',
		type: 'post', 
		async: false, 
		data: {'pointPageId':pointPageId, 'pointPageSectionId':pointPageSectionId, 'visitedSection':visitedSection},
		success: function(output) {
			if( output.trim() ) {
				$("#"+idShowPoints).html(output);

				$("#"+modalPageSection).modal('show');
				('profile' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_profile');
				('purchases' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_purchases');
				('dashboard' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_dashboard');
				('message_connections' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_message_connections');
				('hsprogram' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_hsprogram');
				('records_training' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_records_training');
				('due_diligence' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_due_diligence');
				('fatality_video' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_fatality_video');

				// Digital Hazards //
					('excavation_collapse' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_excavation_collapse');
					('overhead' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_overhead');
					('ladders' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_ladders');
					('office' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_office');
					
					('crushed' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_crushed');
					('fire' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_fire');
					('fall_level' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_fall_level');
					('scaffolds' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_scaffolds');

					('fall' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_fall');
					('falling' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_falling');
					('struck' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_struck');
					('trench' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_trench');

					('washroom' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_washroom');
					('unguarded' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_unguarded');
					('exposure' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_exposure');
					('explosions' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_explosions');
					
					// Office1
					('fire_offce1' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_fire_offce1');
					('indoor' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_indoor');
					('lighting' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_lighting');
					('msd' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_msd');
					('ladders_office1' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_ladders_office1');
					
					// Office2
					('fall_heights' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_fall_heights');
					('electrical' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_electrical');
					('exposure_office2' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_exposure_office2');
					('fall_same' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_fall_same');
					('fall_same' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_falling_office2');
					('struck_office2' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_struck_office2');
					

					
				('box1' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_box1');
				('box2' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_box2');
				('box3' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_box3');
				('box4' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_box4');
				('box5' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_box5');
				('box6' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_box6');
				('box7' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_box7');
				('box8' == visitedSection) ? $(".btn_modal_redirect").addClass('btn_'+visitedSection) : $(".btn_modal_redirect").removeClass('btn_box8');

				if( $(".btn_modal_redirect").hasClass('btn_'+visitedSection) ) {
					$('.btn_'+visitedSection).click(function() {
						$(this).data('clicked', true);
						if( $('.btn_'+visitedSection).data('clicked') ) {
							if('profile' == visitedSection) {
								$("#id_profile").modal('show');
							}
							else if('purchases' == visitedSection) {
								$("#id_purchases").modal('show');
							}
							else if('dashboard' == visitedSection) {
								$("#id_dashboard").modal('show');
							}
							else if('message_connections' == visitedSection) {
								$("#id_message_connections").modal('show');
							}
							else if('hsprogram' == visitedSection) {
								$("#id_hsprogram").modal('show');
							}
							else if('due_diligence' == visitedSection) {
								$("#id_due_diligence").modal('show');
							}
							else if('records_training' == visitedSection) {
								$("#id_records_training").modal('show');
							}
							else if('fatality_video' == visitedSection) {
								// window.location.href = js_base_path+"admin/fatality_metro";
								// $("#myModal").modal('show');
							}
							else if ('1' == pointPageId ){
								var $no_of_boxes =  $('#count_'+visitedSection).val();
								$("#"+visitedSection).modal('show');
								$.post(js_base_path+'ajax/getHazardTranslatedText', {'contentType':visitedSection}, function(data) {
									$hazard_data = $.parseJSON(data);
									for(var $cnt_boxres=1;$cnt_boxres<$no_of_boxes;$cnt_boxres++) {
										($hazard_data[$cnt_boxres]) ? $("#"+visitedSection+"_"+$cnt_boxres).html($hazard_data[$cnt_boxres]) : '';
									}
									var $indLang 		= (parseInt($no_of_boxes)+1);
									var slang 			= $hazard_data[$indLang];
									$('#'+visitedSection+'_lang').val(slang);
									var $headIndStart 	= (parseInt($no_of_boxes)+2);
									var $headIndLast  	= (parseInt($headIndStart)+3);
									var counterInd 		= 1;
									for(var $cnt_head=$headIndStart;$cnt_head<$headIndLast;$cnt_head++) {
										($hazard_data[$cnt_head]) ? $("#heading_"+counterInd).html($hazard_data[$cnt_head]) : '';
										counterInd++;
									}
								});
							}
							else {
								// SafetyEquipment Translate //
									var desc_safety_equipment = $("#"+visitedSection+" input#"+visitedSection+"_desc_en").val();
									$.post(js_base_path+'ajax/getTranslatedText', {'paragraphDescription':desc_safety_equipment, 'translateSection':"safety_equipment"}, function(data){
										$("#"+visitedSection+" p#"+visitedSection+"_desc").html(data);
									});
									
								$("#"+visitedSection).delay(200).fadeIn(150);
							}
						}
					});
				}
				if( 'instagram' == visitedSection ) {
					$(".btn_modal_redirect").click( function() {
						window.open("http://instagram.com/my_s1/", "_new");
					});
				}
			}
			else {
				if( 'profile' == visitedSection ) {
					$("#id_profile").modal('show');
				}
				else if('purchases' == visitedSection) {
								$("#id_purchases").modal('show');
				}
				else if('dashboard' == visitedSection) {
								$("#id_dashboard").modal('show');
				}
				else if('message_connections' == visitedSection) {
								$("#id_message_connections").modal('show');
				}
				else if('hsprogram' == visitedSection) {
								$("#id_hsprogram").modal('show');
				}
				else if('due_diligence' == visitedSection) {
								$("#id_due_diligence").modal('show');
				}
				else if('records_training' == visitedSection) {
								$("#id_records_training").modal('show');
				}
				else if('fatality_video' == visitedSection) {
					$("#myModal").modal('show');
				}
				else if ('1' == pointPageId ){
					var $no_of_boxes =  $('#count_'+visitedSection).val();
					$("#"+visitedSection).modal('show');
					$.post(js_base_path+'ajax/getHazardTranslatedText', {'contentType':visitedSection}, function(data){
						$hazard_data = $.parseJSON(data);
						for(var $cnt_boxres=1;$cnt_boxres<$no_of_boxes;$cnt_boxres++) {
							($hazard_data[$cnt_boxres]) ? $("#"+visitedSection+"_"+$cnt_boxres).html($hazard_data[$cnt_boxres]) : '';
						}
						var $indLang = (parseInt($no_of_boxes)+1);
						var slang = $hazard_data[$indLang];
						$('#'+visitedSection+'_lang').val(slang);
						var $headIndStart = (parseInt($no_of_boxes)+2);
						var $headIndLast  = (parseInt($headIndStart)+3);
						var counterInd = 1;
						for(var $cnt_head=$headIndStart;$cnt_head<$headIndLast;$cnt_head++) {
							($hazard_data[$cnt_head]) ? $("#heading_"+counterInd).html($hazard_data[$cnt_head]) : '';
							counterInd++;
						}
					});
				}
				else {
					// SafetyEquipment Translate //
						var desc_safety_equipment = $("#"+visitedSection+" input#"+visitedSection+"_desc_en").val();
						$.post(js_base_path+'ajax/getTranslatedText', {'paragraphDescription':desc_safety_equipment, 'translateSection':"safety_equipment"}, function(data){
							$("#"+visitedSection+" p#"+visitedSection+"_desc").html(data);
						});

					$("#"+visitedSection).delay(200).fadeIn(150);
				}
				
				if( 'instagram' == visitedSection ) {
					window.open("http://instagram.com/my_s1/", "_new");
				}
			}
		}, 
		error: function(errMsg) {
			alert( errMsg.responseText );
			return false;
		}
	});	
}


function hasAlertRead( alertId, userId )
{
	$.ajax({
		url: js_base_path+'ajax/ajax_section_read', 
		type: 'post', 
		data: {'userId': userId, 'alertId':alertId },
		success: function(output) {
			// //
		},
		error: function(errMsg) {
			alert( errMsg.responseText );
			return false;
		}
	});
}


// Start - Fancybox //
	if(typeof $.fancybox == 'function') {
		// Simple image gallery. Uses default settings
		$('.fancybox').fancybox({
			title 		: '',
			maxWidth	: 800,
			maxHeight	: 600,
			width		: '70%',
			height		: '70%',
		});
	// Media settings //
		$('.fancybox-media')
			.attr('rel', 'media-gallery')
			.fancybox({ 
				arrows 		: false,
				title 		: '', 
				maxWidth	: 800,
				maxHeight	: 600,
				width		: '70%',
				height		: '70%',
			});
	}
// End - Fancybox //