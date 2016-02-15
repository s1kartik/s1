<?php 
class common 
{
	function __construct()
	{
		$this->pagin_mylib_rows_limit 	= 15;
		$this->pagin_s1lib_rows_limit 	= 18;
		$this->pagin_msg_rows_limit 	= 9;
		
		$CI =& get_instance();
		$this->base = $CI->config->item('base_url');
	}
	function breakContents( $updatedContents='', $limit=2800, $incr, $displayContents='', $newpr='', $finishPr='', $section="" )
	{
		$strlen_contents= strlen( $updatedContents );
		$new 			= substr( $updatedContents, ($limit*$incr), $strlen_contents );

		if( $incr == 0 && $newpr == 1 ) {
			$displayContents = "<section>";
			
		}
		$displayContents 	.= "<section>".substr( $new, 0, $limit )."</section>";

		$strlen_new = strlen( $new );

		if( $strlen_new > $limit ) {
			$incr++;
			$this->breakContents( $updatedContents, $limit, $incr, $displayContents, $newpr, $finishPr, $section );
		}
		else{
			if( 1 == $finishPr ) {
				$displayContents .= "</section>";
			}
			echo $displayContents;
		}
	}
	
	function escapeStr( $string='' )
	{
		return mysql_real_escape_string( trim($string) );
	}
	
	function subString($text="", $limit=8)
	{
		if( $text ) {
			if( strlen($text) > $limit) {
				return substr($text,0,$limit)."..";
			}
			return $text;
		}
		else {
			return false;
		}
	}

	function getImagePathInfo($valImage='', $field='')
	{
		if( $valImage ) {
			$valImage = pathinfo($valImage);
			return $valImage[$field];
		}
	}

	function setUploadOptions($targetPath, $realName)
	{
		//  upload an image options
			$config = array();
			$config['file_name'] 	= $realName;
			$config['upload_path'] 	= $targetPath;
			$config['allowed_types']= 'gif|jpg|jpeg|png|bmp';
			$config['max_size']     = '10000';
			$config['overwrite']    = FALSE;			
			return $config;
	}
	

	function getNextLevelPoints($pointsLevel='')
	{
		if( $pointsLevel >= 0 ) {
			$next_point_level 	= ($pointsLevel+1);			
			$rows_points_level 	= $this->points->getPointsLevel();

			foreach( $rows_points_level AS $points_val ) {
				if( $points_val['in_level'] == $next_point_level) {
					$next_level_points = $points_val['in_points_of_level'];
				}
			}
			return isset($next_level_points) ? $next_level_points : '0';
		}
		else {
			return '0';
		}
	}
	
	function pr($string='')
	{
		echo "<pre>";print_r($string);echo "</pre>";
	}
	
	function dberror()
	{
		$CI = & get_instance();
		$err = "Error Message: ".$CI->db->_error_message(); 
		$err .= "<br>Error Number: ".$CI->db->_error_number(); 
		//show_error($err);
		echo "<h5>".$err."</h5>";
	}
	
	function getS1Pagination( $pageName='', $totalPages='', $currentPage='1', $recordsLimit='18', $noOfLinks='10', $pgSection='' )
	{
		if( $totalPages > 1 ) {
			$start_page = ( (floor(($currentPage-1)/$noOfLinks)*$noOfLinks)+1 );
			$prev_page 	= ($currentPage-1);
			$next_page 	= ($currentPage+1);?>
			<ul>
				<?php 
				if( $prev_page > 0 ) {?>
					<li class="first"><a href="<?php echo $this->base."admin/".$pageName."&page=1".$pgSection;?>" class="bg-red fg-white"><i class="icon-first-2"></i></a></li>
					<li class="previous"><a href="<?php echo $this->base."admin/".$pageName."&page=".$prev_page.$pgSection;?>" class="bg-red fg-white"><i class="icon-previous"></i></a></li>
					<?php 
				}
				for( $cnt_pgno=$start_page; $cnt_pgno<$start_page+$noOfLinks; $cnt_pgno++) {
					$class_current_page = ($currentPage==$cnt_pgno) ? "bg-red fg-black":'bg-red fg-white';
					if( $cnt_pgno<=$totalPages ) {?>
						<li><a href="<?php echo $this->base."admin/".$pageName."&page=".$cnt_pgno.$pgSection;?>" class="<?php echo $class_current_page;?>"><?php echo "<b>".$cnt_pgno."</b>";?></a></li>
						<?php 
					}
					else {
						break; 
					}
				}
				if( $next_page <= $totalPages ) {?>						
					<li class="next"><a href="<?php echo $this->base."admin/".$pageName."&page=".$next_page.$pgSection;?>" class="bg-red fg-white"><i class="icon-next"></i></a></li>
					<li class="last"><a href="<?php echo $this->base."admin/".$pageName."&page=".$totalPages.$pgSection;?>" class="bg-red fg-white"><i class="icon-last-2"></i></a></li>
					<?php 
				}?>
			</ul>
			<?php 
		}
	}

	function getShoppingCartParams( $id='', $libtype='', $title='', $description='', $price='', $points='', $credits=''	)
	{
		$arr_s1cart['item_id'] 			= $id;
		$arr_s1cart['item_libtype'] 	= $libtype;
		$arr_s1cart['item_title'] 		= $title;
		$arr_s1cart['item_description'] = $description;
		$arr_s1cart['item_price'] 		= $price;
		$arr_s1cart['item_points'] 		= $points;
		$arr_s1cart['item_credits'] 	= $credits;

		return $arr_s1cart;
	}
	
	function getDatetimeDiff( $date1, $date2 )
	{
		$diff = abs( strtotime( $date1 ) - strtotime( $date2 ) );
		return sprintf
		(
			"%d|%d|%d|%d",
			intval( $diff / 86400 ),
			intval( ( $diff % 86400 ) / 3600),
			intval( ( $diff / 60 ) % 60 ),
			intval( $diff % 60 )
		);
	}

	function callLanguageSelectBox($idVal='', $to_lang='en', $className="") {
		$to_lang = strtolower($to_lang);?>
		<select id="<?php echo $idVal;?>" <?php echo $className ? 'class="'.$className.'"' : '';?>>
			<option value="">-select language-</option>
			<option value="en" <?php echo ($to_lang=='en') ? 'selected="selected"' : '';?>>English</option>
			<option value="pt" <?php echo ($to_lang=='pt') ? 'selected="selected"' : '';?>>Portuguese</option>
			<option value="es" <?php echo ($to_lang=='es') ? 'selected="selected"' : '';?>>Spanish</option>
			<option value="it" <?php echo ($to_lang=='it') ? 'selected="selected"' : '';?>>Italian</option>
			<option value="pl" <?php echo ($to_lang=='pl') ? 'selected="selected"' : '';?>>Polish</option>
			<option value="el" <?php echo ($to_lang=='el') ? 'selected="selected"' : '';?>>Greek</option>
			<option value="zh-cn" <?php echo ($to_lang=='zh-cn') ? 'selected="selected"' : '';?>>Chinese</option>
			<option value="ar" <?php echo ($to_lang=='ar') ? 'selected="selected"' : '';?>>Arabic</option>
			<option value="de" <?php echo ($to_lang=='de') ? 'selected="selected"' : '';?>>German</option>
			<option value="ru" <?php echo ($to_lang=='ru') ? 'selected="selected"' : '';?>>Russian</option>
			<option value="tgl" <?php echo ($to_lang=='tgl') ? 'selected="selected"' : '';?>>Tagalog</option>
		</select>
		<?php 
	}
}?>