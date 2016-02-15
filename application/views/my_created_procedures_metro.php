<?php $this->load->view('header_admin');?>
<script type="text/javascript" src="<?php echo $base."js/metro/metro.min.js";?>"></script>
<div class="homebg metro ">
    <!--BEGIN PAGE TITLE-->
    <div class="container-fluid">
        <div class="main-content padding-metro-header subheader-secondary clearfix fg-grayLighter"><em class="margin20"><?php echo $procedure_title;?></em></div>
    </div>
    <!--END PAGE TITLE-->
    <div class="container-fluid padding-metro-home">
    <div class="clearfix proceCon">
		<?php 
		// $procedure_status = "completed"; // FOR TESTING PURPOSE // 
		if( 'completed' != $procedure_status ) {?>
			<div class="row-fluid">
				<?php 
				$rows 		= $this->points->hasUserGotPointsOfPageSection($this->sess_userid, 1, 11, $procedure_id);
				$is_selected= isset($rows['has_points']) ? $rows['has_points'] : "";
				$tile_class = ($is_selected) ? "selected" : '';?>
				<a href='#modalPurpose' data-toggle='modal' class="tile double triple-half bg-black <?php echo $tile_class;?>">
					<div class="tile-content icongetstarted"><img src="<?php echo $base;?>img/new-procedure/purpose.png"  alt="S1 Profile Information"></div>
					<div class="tile-status"><span class="name">PURPOSE</span></div>
				</a>
				<?php 
				$rows 		= $this->points->hasUserGotPointsOfPageSection($this->sess_userid, 2, 11, $procedure_id);
				$is_selected= isset($rows['has_points']) ? $rows['has_points'] : "";
				$tile_class = ($is_selected) ? "selected" : '';
				?>
				<a href='#modalRisk'  data-toggle='modal' class="tile double triple-half bg-black <?php echo $tile_class;?>">
					<div class="tile-content icongetstarted"><img src="<?php echo $base;?>img/new-procedure/risk.png"  alt="S1 Profile Information"></div>
					<div class="tile-status"><span class="name">RISK RATING/HAZARD</span></div>
				</a>
				<?php 
				$rows 		= $this->points->hasUserGotPointsOfPageSection($this->sess_userid, 3, 11, $procedure_id);
				$is_selected= isset($rows['has_points']) ? $rows['has_points'] : "";
				$tile_class = ($is_selected) ? "selected" : '';
				?>
				<a href='#modalUserTraining'  data-toggle='modal'  class="tile double triple-half bg-black <?php echo $tile_class;?>">
					<div class="tile-content icongetstarted "><img src="<?php echo $base;?>img/new-procedure/training.png"  alt="S1 Profile Information"></div>
					<div class="tile-status"><span class="name">TRAINING</span></div>
				</a>
			
				<?php 
				$rows 		= $this->points->hasUserGotPointsOfPageSection($this->sess_userid, 4, 11, $procedure_id);
				$is_selected= isset($rows['has_points']) ? $rows['has_points'] : "";
				$tile_class = ($is_selected) ? "selected" : '';
				?>
				<a href='#modalPPE'  data-toggle='modal'  class="tile double triple-half bg-black <?php echo $tile_class;?>">
					<div class="tile-content icongetstarted"><img src="<?php echo $base;?>img/new-procedure/ppe.png"  alt="S1 Profile Information"></div>
					<div class="tile-status"><span class="name">PPE</span></div>
				</a>
			</div>
			<div class="row-fluid" >
				<?php 
				$rows 		= $this->points->hasUserGotPointsOfPageSection($this->sess_userid, 5, 11, $procedure_id);
				$is_selected= isset($rows['has_points']) ? $rows['has_points'] : "";
				$tile_class = ($is_selected) ? "selected" : '';?>
				<a href='#modalMachinery'  data-toggle='modal'  class="tile double triple-half bg-black <?php echo $tile_class;?>">
					<div class="tile-content icongetstarted"><img src="<?php echo $base;?>img/new-procedure/equipment.png"  alt="S1 Profile Information"></div>
					<div class="tile-status"><span class="name">MACHINERY</span></div>
				</a>
			
				<?php 
				$rows 		= $this->points->hasUserGotPointsOfPageSection($this->sess_userid, 6, 11, $procedure_id);
				$is_selected= isset($rows['has_points']) ? $rows['has_points'] : "";
				$tile_class = ($is_selected) ? "selected" : '';
				?>
				<a href='#modalProcedure'  data-toggle='modal'  class="tile double triple-half bg-black <?php echo $tile_class;?>">
					<div class="tile-content icongetstarted"><img src="<?php echo $base;?>img/new-procedure/procedure.png"  alt="S1 Profile Information"></div>
					<div class="tile-status"><span class="name">PROCEDURES</span></div>
				</a>

				<?php 
				$rows 		= $this->points->hasUserGotPointsOfPageSection($this->sess_userid, 7, 11, $procedure_id);
				$is_selected= isset($rows['has_points']) ? $rows['has_points'] : "";
				$tile_class = ($is_selected) ? "selected" : '';?>
				<a href='#modalDueDiligence' data-toggle='modal'  class="tile double triple-half bg-black <?php echo $tile_class;?>">
					<div class="tile-content icongetstarted"><img src="<?php echo $base;?>img/new-procedure/duediligence.png"  alt="S1 Profile Information"></div>
					<div class="tile-status"><span class="name">DUE DILIGENCE</span></div>
				</a>
				<a href='#modalPreview11' id="href_modalPreview11" data-toggle="modal" class="tile double triple-half bg-black">
					<div class="tile-content icongetstarted"><img src="<?php echo $base;?>img/new-procedure/preview.png"  alt="S1 Profile Information"></div>
					<div class="tile-status"><span class="name">PREVIEW</span></div>
				</a>
			</div>
			<?php 
		}
		else { ?>
			<div class="row-fluid" >
				<div id="modalPreview11" class="metro modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<?php $this->load->view('new_procedure_preview'); ?>
				</div>
				<div class="modal-backdrop"></div>
			</div>
			<?php 
		}?>
       </div> 
    </div>
</div>

<!--********************* BEGIN MODAL PURPOSE ******************* -->
<div id="modalPurpose" class="metro modal hide fade model-procedures" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">	
	<?php $this->load->view('new_procedure_purpose'); ?>
</div>
<!--********************* END MODAL PURPOSE ******************* -->	
<!--********************* BEGIN MODAL RISK RATING ******************* -->
<div id="modalRisk" class="metro modal fade model-procedures <?php echo ("completed"==$procedure_status) ? 'hide' : '';?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<?php $this->load->view('new_procedure_risk'); ?>
</div>
<!--********************* END MODAL RISK RATING ******************* -->	
<!--********************* BEGIN MODAL USER FOR TRAINING ******************* -->
<div id="modalUserTraining" class="metro modal hide fade model-procedures-main" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="container-fluid">
        <div class="row-fluid">
            <a href='#modalTraining' data-toggle='modal'  class="tile double bg-darker training_user">
            	<div class="tile-content icon"><i class="icon-user-2"></i></div>
                <div class="tile-status" ><span class="name">WORKER</span></div>
            </a>
            <a href='#modalTraining'  data-toggle='modal'  class="tile double bg-darker training_user">
	            <div class="tile-content  icon"><i class="icon-user-3 "></i></div>
                <div class="tile-status"><span class="name">SUPERVISOR</span></div>
            </a>
			<span id="proc_training_tab" class=""></span>
        </div>
    </div>
	
</div>
<!--********************* BEGIN MODAL TRAINING *******************-->
	<div id="modalTraining" class="metro modal hide fade model-procedures" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<?php $this->load->view('new_procedure_training'); ?>
	</div>
	<!--********************* END MODAL TRAINING *******************-->
<!--********************* END MODAL USER FOR TRAINING ******************* -->	

<!--********************* BEGIN MODAL PPE ******************* -->
    <div id="modalPPE" class="metro modal hide fade model-procedures" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<?php $this->load->view('new_procedure_ppe'); ?>
    </div>
<!--********************* END MODAL PPE ******************* -->
<!--********************* BEGIN MODAL MACHINERY ******************* -->
    <div id="modalMachinery" class="metro modal hide fade model-procedures" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<?php $this->load->view('new_procedure_machinery'); ?>
    </div>
<!--********************* END MODAL MACHINERY ******************* -->
<!--********************* BEGIN MODAL PROCEDURES ******************* -->
    <div id="modalProcedure" class="metro modal hide fade model-procedures" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<?php $this->load->view('new_procedure_procedures'); ?>
    </div>
<!--********************* END MODAL PROCEDURES ******************* -->
<!--********************* BEGIN MODAL DUE DILIGENCE ******************* -->
    
        <?php $this->load->view('new_procedure_due_diligence'); ?>

<!--********************* END MODAL DUE DILIGENCE ******************* -->
<!--********************* BEGIN MODAL PREVIEW******************* -->

<?php if( 'completed' != $procedure_status ) {?>
	<div id="modalPreview11" class="metro modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<?php $this->load->view('new_procedure_preview'); ?>
	</div>
	<?php 
}?>
<!--********************* END MODAL PREVIEW ******************* -->

<div id="id_modal_procsaved" class="modal metro fade hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-header bg-red">
		<h3 id="myModalLabel">PROCEDURE<i class="pull-right icon-cancel-2" style="margin-right:10px;" data-dismiss="modal"></i></h3>
	</div>
	<div class="modal-body"><p>Your information has been saved</p></div>
	<div class="modal-footer"><button class="btn" data-dismiss="modal">Close</button></div>
</div>

<script type="text/javascript">
	var procedure_status = '<?php echo $procedure_status;?>';
	var procedure_id 	= '<?php echo $procedure_id;?>';
	var procedure_type 	= '<?php echo $procedure_type;?>';

	if( "completed" != procedure_status ) {
		/*$("#href_modalPreview11").click(function() {
			$("#modalPreview11").show();
			$("#modalPreview11").modal("show");
		});*/
	}

	$('.btn-cancel').click(function(){
		if(confirm("Are you sure you want Cancel the changes?")) {
			window.location=window.location;
		}
	});

	$('.triple-half').click(function(){
		$(this).addClass('selected');
	});
	$('#modalUserTraining').css({'width':'700px',
		'padding-top':'15%',
		'background-color':'transparent',
		'box-shadow':'none'
	});

	$(".training_user").click(function() {
		var proc_training_user = $(this).find("div>span").html();
		$("#proc_training_tab").attr('class', proc_training_user );
		
		$.ajax({
			url: js_base_path+'ajax/ajaxProcedureTraining',
			type: 'post', 
			data: 'trainingUser='+proc_training_user+'&procedureId='+procedure_id,
			success: function(output) {
				$("#id_sel_proc_training").html(output);
			}, 
			error: function(errMsg) {
				alert( errMsg.responseText );
				return false;
			}
		});
	});
</script>
<?php $this->load->view('footer_admin');?>