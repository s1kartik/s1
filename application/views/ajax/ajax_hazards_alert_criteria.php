<?php
$set_industry 	= 'display: none;';
$set_sector 	= 'display: none;';
$set_trade 		= 'display: none;';
// echo '<label class="control-label">Alert Criteria Selected</label>';

// common::pr( $alert_criteria_options );die;
switch($alert_criteria_selected)
{
	case 'usertype': {?>
		<div class="span5 cls-alerts-usertype" align="center">
			<h5>By Usertype</h5>
			<select name="hazards_alerts[usertype][]" multiple id="id_usertype">
				<?php 
				foreach( $alerts_usertypes AS $users ) {
					$usertype_id 	= isset($users['id']) ? $users['id'] : '';
					$typename 	= isset($users['typename']) ? $users['typename'] : '';
					$selected 	= in_array($usertype_id, explode(",",$alert_criteria_options)) ? 'selected="selected"' : '';?>
					<option value="<?php echo $usertype_id;?>" <?php echo $selected;?>><?php echo $typename;?></option>
					<?php 
				}?>
			</select>
		</div>
		<script type="text/javascript">$(function(){ $("#id_usertype").multiselect();});</script>
		<?php
		break;
	}
	case 'industry': {
		$set_industry 	= 'display: block;';
		$set_sector 	= 'display: none;';
		$set_trade 		= 'display: none;';
		break;
	}
	case 'sector': {
		$set_industry 	= 'display: block;';
		$set_sector 	= 'display: block;';
		$set_trade 		= 'display: none;';
		break;
	}
	case 'trade': {
		$set_industry 	= 'display: block;';
		$set_sector 	= 'display: block;';
		$set_trade 		= 'display: block;';
		break;
	}
	case 'worker': {?>
			<div class="span5 cls-alerts-worker" align="center">
				<h5>Worker</h5>
				<select name="hazards_alerts[worker][]" multiple id="id_worker">
					<?php $cnt_worker = Ajax::getAlertCriteriaUsers($alerts_users, $all_links, $alerted_users, $user_type='9');?>
				</select>
			</div>
		<script type="text/javascript">
			$(function(){ $("#id_worker").multiselect({selectedList: "<?php echo $cnt_worker;?>"}).multiselectfilter();});
		</script>
		<?php
		break;
	}
	case 'myworkers': {
			$cnt_myworkers = 0;
			$users_alerts 	= $this->users->getMyLinksByUserID($this->sess_userid, $this->sess_usertype, 1, '');?>
			<div class="span5 cls-alerts-worker" align="center">
				<h5>My Workers</h5>
				<select name="hazards_alerts[myworkers][]" multiple id="id_myworkers">
					<?php 
					foreach( $users_alerts AS $users ) {
						$userid 	= isset($users['id']) ? $users['id'] : '';
						if( "7" == $this->sess_usertype ) {
							$where_arr 		= array('st_designation'=>'my_worker', 'in_worker_id'=>$userid, 'in_union_id'=>$this->sess_userid);
                            $rows_my_workers= $this->users->getDesignationData("tbl_union_designations", $where_arr);
							$rows_my_workers= (isset($rows_my_workers[0]['meta_value'])&&$rows_my_workers[0]['meta_value']=='y') ? $rows_my_workers : array();
							$is_my_worker 	= (isset($rows_my_workers) && $rows_my_workers) ? $rows_my_workers[0]['meta_key'] : '';
							if( "y" == $is_my_worker ) {
								$firstname 	= isset($users['firstname']) ? $users['firstname'] : '';
								$lastname 	= isset($users['lastname']) ? $users['lastname'] : '';
								$username 	= $firstname." ".$lastname;
								$selected 	= in_array($userid, $alerted_users) ? 'selected="selected"' : '';
								?>
								<option value="<?php echo $userid;?>" <?php echo $selected;?>><?php echo $username;?></option>
								<?php 
								$cnt_myworkers++;
							}
						}
						else {
							$firstname 	= isset($users['firstname']) ? $users['firstname'] : '';
							$lastname 	= isset($users['lastname']) ? $users['lastname'] : '';
							$username 	= $firstname." ".$lastname;
							$selected = in_array($userid, $alerted_users) ? 'selected="selected"' : '';
							?><option value="<?php echo $userid;?>" <?php echo $selected;?>><?php echo $username;?></option>
							<?php 
							$cnt_myworkers++;
						}
					}?>
				</select>
			</div>
			<script type="text/javascript">
				$(function(){ $("#id_myworkers").multiselect({selectedList: "<?php echo $cnt_myworkers;?>"}).multiselectfilter();});
			</script>
		<?php
		break;
	}
	case 'student': {?>
			<div class="span5 cls-alerts-student" align="center">
				<h5>Student</h5>
				<select name="hazards_alerts[student][]" multiple id="id_student">
					<?php $cnt_student = Ajax::getAlertCriteriaUsers($alerts_users, $all_links, $alerted_users, $user_type='11');?>
				</select>
			</div>
		<script type="text/javascript">$(function(){ $("#id_student").multiselect({selectedList: "<?php echo $cnt_student;?>"}).multiselectfilter();});</script>
		<?php
		break;
	}
	case 'employer': {
		?>
			<div class="span5 cls-alerts-employer" align="center">
				<h5>Employer</h5>
				<select name="hazards_alerts[employer][]" multiple id="id_employer">
					<?php $cnt_employer = Ajax::getAlertCriteriaUsers($alerts_users, $all_links, $alerted_users, $user_type='8');?>
				</select>
			</div>
		<script type="text/javascript">$(function(){ $("#id_employer").multiselect({selectedList: "<?php echo $cnt_employer;?>"}).multiselectfilter();});</script>
		<?php
		break;
	}
	case 'employer-connection': {?>
			<div class="span5 cls-alerts-employer-connection" align="center">
				<h5>All workers connected to below Employer(s)</h5>
				<select name="hazards_alerts[employer-connection][]" multiple id="id_employer_connection">
					<?php 
					$cnt_employer_connec=0;
					foreach( $alerts_users AS $users ) {
						if( isset($users['type_id']) && "8"==$users['type_id'] ) {
							$userid 	= isset($users['id']) ? $users['id'] : '';
							$firstname 	= isset($users['firstname']) ? $users['firstname'] : '';
							$lastname 	= isset($users['lastname']) ? $users['lastname'] : '';
							$username 	= $firstname." ".$lastname;
							$selected = in_array($userid, $alerted_users) ? 'selected="selected"' : '';
							?>
							<option value="<?php echo $userid;?>" <?php echo $selected;?>><?php echo $username;?></option>
							<?php 
							$cnt_employer_connec++;
						}
					}?>
				</select>
			</div>
		<script type="text/javascript">$(function(){ $("#id_employer_connection").multiselect({selectedList: "<?php echo $cnt_employer_connec;?>"}).multiselectfilter();});</script>
		<?php
		break;
	}
	case 'union': {?>
			<div class="span5 cls-alerts-union" align="center">
				<h5>Union</h5>
				<select name="hazards_alerts[union][]" multiple id="id_union">
					<?php 
					$cnt_union=0;
					foreach( $alerts_users AS $users ) {
						if( isset($users['type_id']) && "7"==$users['type_id'] ) {
							$userid 	= isset($users['id']) ? $users['id'] : '';
							if( $this->sess_usertype=="7" ) {
								$is_training_centre 	= $this->users->getUserMetaByID($userid);
								$is_training_centre 	= isset($is_training_centre['union_training_centre']) && $is_training_centre['union_training_centre'] ? $is_training_centre['union_training_centre'] : '';
								if( $is_training_centre == '' ) {
									$firstname 	= isset($users['firstname']) ? $users['firstname'] : '';
									$lastname 	= isset($users['lastname']) ? $users['lastname'] : '';
									$username 	= $firstname." ".$lastname;
									$selected = in_array($userid, $alerted_users) ? 'selected="selected"' : '';?>
									<option value="<?php echo $userid;?>" <?php echo $selected;?>><?php echo $username;?></option>
									<?php 
									$cnt_union++;
								}
							}
							else {
								$firstname 	= isset($users['firstname']) ? $users['firstname'] : '';
								$lastname 	= isset($users['lastname']) ? $users['lastname'] : '';
								$username 	= $firstname." ".$lastname;
								$selected = in_array($userid, $alerted_users) ? 'selected="selected"' : '';?>
								<option value="<?php echo $userid;?>" <?php echo $selected;?>><?php echo $username;?></option>
								<?php 
								$cnt_union++;
							}
						}
					}?>
				</select>
			</div>
		<script type="text/javascript">$(function(){ $("#id_union").multiselect({selectedList: "<?php echo $cnt_union;?>"}).multiselectfilter();});</script>
		<?php
		break;
	}		
	case 'union-connection': {?>
			<div class="span5 cls-alerts-union-connection" align="center">
				<h5>All S1 users connected to below Union(s)</h5>
				<select name="hazards_alerts[union-connection][]" multiple id="id_union_connection">
					<?php 
					$cnt_union_connec=0;
					foreach( $alerts_users AS $users ) {
						if( isset($users['type_id']) && "7"==$users['type_id'] ) {
							$userid 	= isset($users['id']) ? $users['id'] : '';
							$firstname 	= isset($users['firstname']) ? $users['firstname'] : '';
							$lastname 	= isset($users['lastname']) ? $users['lastname'] : '';
							$username 	= $firstname." ".$lastname;
							$selected 	= in_array($userid, $alerted_users) ? 'selected="selected"' : '';?>
							<option value="<?php echo $userid;?>" <?php echo $selected;?>><?php echo $username;?></option>
							<?php 
							$cnt_union_connec++;
						}
					}?>
				</select>
			</div>
		<script type="text/javascript">$(function(){ $("#id_union_connection").multiselect({selectedList: "<?php echo $cnt_union_connec;?>"}).multiselectfilter();});</script>
		<?php
		break;
	}
}

if( 'industry'==$alert_criteria_selected || 'sector'==$alert_criteria_selected || 'trade'==$alert_criteria_selected ) {
	/*
	if( 'industry'==$alert_criteria_selected ) {?>
		<script type="text/javascript">$(function(){ $("#id_industry").multiselect({multiple: false});});</script>
		<?php
	}
	if( 'sector'==$alert_criteria_selected ) {?>
		<script type="text/javascript">$(function(){ $("#id_industry").multiselect({multiple: false});});</script>
		<script type="text/javascript">$(function(){ $("#id_sector").multiselect({multiple: false});});</script>
		<?php
	}
	if( 'trade'==$alert_criteria_selected ) {?>
		<script type="text/javascript">$(function(){ $("#id_industry").multiselect({multiple: false});});</script>
		<script type="text/javascript">$(function(){ $("#id_sector").multiselect({multiple: false});});</script>
		<script type="text/javascript">$(function(){ $("#id_trade").multiselect({multiple: false});});</script>
		<?php
	}*/
}
?>

<div class="span4 cls-alerts-industry" align="center" style="<?php echo $set_industry;?>">
	<h5>By Industry/Sector/Trade</h5>
	<select id="id_industry" name="hazards_alerts[industry]">
		<option value="">Industry</option>
		<?php 
		$industries = $this->users->getMetaDataList('industry', 'date_start<=CURDATE() AND (date_end="" OR date_end>CURDATE())');
		foreach($industries as $in) {
			$selected = in_array($in['id'], explode(",",$alert_criteria_options)) ? 'selected="selected"' : '';?>
			<option value="<?php echo $in['id'];?>" <?php echo $selected;?>><?php echo $in['industryname'];?></option>
			<?php 
		}?>
	</select>
</div>
<div class="span4 cls-alerts-sector" align="center" style="<?php echo $set_sector;?>">
	<h5>&nbsp;</h5>
	<select id="id_sector" name="hazards_alerts[sector]">
		<option value="">Sector</option>
		<?php 
		if(isset($_POST['industry']) && (int)$_POST['industry']>0) {
			$sections = $this->users->getRelatedElement('tbl_section', 'industry_id', $_POST['industry']);
			foreach($sections as $sc) {
				$selected = in_array($sc['id'], explode(",",$alert_criteria_options)) ? 'selected="selected"' : '';?>
				<option value="<?php echo $sc['id'];?>" <?php echo $selected;?>><?php echo $sc['sectionname'];?></option>
				<?php 
			}
		}?>
	</select>
</div>
<div class="span3 cls-alerts-trade" align="center" style="<?php echo $set_trade;?>">
	<h5>&nbsp;</h5>
	<select id="id_trade" name="hazards_alerts[trade]">
		<option value="">Trade</option>
		<?php 
		if(isset($_POST['industry']) && (int)$_POST['industry']>0 && isset($_POST['sector']) && (int)$_POST['sector']>0){
			$trades = $this->users->getRelatedElementTwo('tbl_section2trade_view', 'industry_id', $_POST['industry'], 'section_id', $_POST['sector']);
			foreach($trades as $sc) {
				$selected = in_array($sc['trade_id'], explode(",",$alert_criteria_options)) ? 'selected="selected"' : '';?>
				<option value="<?php echo $sc['trade_id'];?>" <?php echo $selected;?>><?php echo $sc['tradename'];?></option>
				<?php 
			}
		}?>
	</select>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		$('#id_industry').change(function(){
			$industry_id = $(this).val();
			$.post('<?php echo $this->base;?>admin/getRelatedElement', {'table': 'tbl_section', 'field': 'industry_id', 'value': $industry_id, 'field_fetch': 'sectionname'}, function(data){
				$("#id_sector").html(data);
			});
		});
		$('#id_sector').change(function(){
			$industry_id = $('#id_industry').val();
			$section_id = $('#id_sector').val();
			$.post('<?php echo $this->base;?>admin/getRelatedElementTwo', {'table': 'tbl_section2trade_view', 'field1': 'industry_id', 'value1': $industry_id, 'field2': 'section_id', 'value2': $section_id, 'field_fetch': 'tradename'}, function(data){
				$("#id_trade").html(data);
			});
		});
	});
</script>