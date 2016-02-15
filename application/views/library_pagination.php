<div class="pagination small opacity">
	<?php 
	$union_id 	= (isset($union_id)&&(int)$union_id) ? '&union='.$union_id : '';
	$awtraining = (isset($awtraining)&&$awtraining) ? "&awtraining=".$awtraining : '';
	$clib 		= (isset($current_libcnt)&&$current_libcnt) ? "&clib=".$current_libcnt : '';
	$nextlibid 	= (isset($nextlibid)&&$nextlibid) ? "&nextlibid=".$nextlibid : '';
	$progress 	= (isset($progress)&&$progress) ? "&prog=".$progress : '';
	
	// Pagination //
		$this->common->getS1Pagination($this->router->fetch_method()."?libtype=".$library_type_id."&libid=".$library_id."&section=".$section."&language=".strtoupper($lang).$union_id.$awtraining.$clib.$nextlibid.$progress, $pages, $current_page, '', 10);
		/* $cp = isset($_POST['page'])?(int)$_POST['page']:1;
		$startp = floor(($cp-1)/10)*10+1;
		$prevp = $cp - 1;
		$nextp = $cp + 1;
		<ul class="libview">  <!--removed class="input-append"-->
			<?php 
			if($prevp>0) {?>
				<li><button name="page" class="btn btn-danger" value="<?php echo $prevp;?>">«</button></li>
			<?php 
			}
			for($i=$startp; $i<$startp+10; $i++){ 
				if( $i<=$pages ){?>
					<!--<li><a href="<?php echo $base;?>admin/library_page_contents?libid=<?php echo $_GET['libid'];?>&libtype=<?php echo $library_type_id;?>&section=desc&page=<?php echo $i;?>"><?php echo $i;?></a></li>-->													
					<li><button name="page" class="btn btn-danger <?php echo ($cp==$i)?"active":"";?>" value="<?php echo $i;?>"><?php echo $i;?></button></li>
				<?php 
				} else { 
					break; 
				}
			}
			if( $nextp<=$pages ) 
			{?>
				<li><button name="page" class="btn btn-danger" value="<?php echo $nextp;?>">»</button></li>
			<?php 
			}?>
		</ul>
	*/?>
	
	<span class="msg_quiz"></span>
</div>
<br><br>