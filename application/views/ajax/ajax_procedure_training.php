<?php 
$training_user 	= isset($_POST['trainingUser']) ? $_POST['trainingUser'] : '';
$procedure_id 	= isset($_POST['procedureId']) ? $_POST['procedureId'] : '';

$rows_training = $this->users->getMetaDataList('proc_training', '', 'st_training_user = "'.$training_user.'" AND in_created_by="'.$this->sess_userid.'" AND in_procedure_id="'.$procedure_id.'"', 'st_training_selected');

if( sizeof($rows_training) ) {
	foreach( $rows_training AS $key_training => $val_training ) {
		$training_selected 		= isset($val_training['st_training_selected']) ? $val_training['st_training_selected'] : '';
		$arr_training_selected	= $training_selected ? explode(",", $training_selected) : array();
		
		if( sizeof($arr_training_selected) ) {
			foreach( $arr_training_selected AS $key_training_id => $val_training_id ) {
				$rows_training_name = $this->users->getMetaDataList('proc_trainings', '', 'in_training_id="'.$val_training_id.'"', 'st_training_name');
				$rows_training_name = $rows_training_name[0]['st_training_name'];?>
				<tr id="tline"><td id='<?php echo $val_training_id;?>'><?php echo $rows_training_name;?></td></tr>
				<?php 
			}
		}
	}
}
?>
<script type="text/javascript">
	$('#id_red_trainings>a').each(function() {
		$(this).removeClass('selected');
	});
		
	$("#tableTraining>tbody>tr").each(function() {
		var sel_training = $(this).find("td").html();
		var id_sel_training = $(this);
		$('#id_red_trainings>a').each(function() {
			var val_training = $(this).find('span').html();
			if( sel_training == val_training ) {
				var id_training = $(this).attr('id');
				$(id_sel_training).attr('id', id_training);
				$(this).addClass('selected');
			}
		});
	});
</script>