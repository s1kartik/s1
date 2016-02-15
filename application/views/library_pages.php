<?php $this->load->view('header_admin');
$cp = isset($_GET['page'])?(int)$_GET['page']:1;
$startp = floor(($cp-1)/10)*10+1;
$prevp = $cp - 1;
$nextp = $cp + 1;
?>
<style>
	.flexslider .slides img {
		width: 200px; 
		 height: 150px; 
		 display: block;
	}
</style>
<div class="info-container">
    <div class="document-content">
    
		<center><h4>Page <?php echo $cp;?></h4></center>
		
    <form class="form-horizontal adminfrm" method="post">
    <fieldset>	
		<?php 
		$sizeof_pages = sizeof($page);
		$pn = 0;
		if( $sizeof_pages ) {
			for( $cnt=0; $cnt<sizeof($page); $cnt++ ) {
				$pn 					= $page[$cnt]['pn'];
				$page_id 				= $page[$cnt]['page_id'];
				$paragraph_id 			= $page[$cnt]['paragraph_id'];
				$paragraph_title 		= $page[$cnt]['paragraph_title'];
				$paragraph_subtitle 	= $page[$cnt]['paragraph_subtitle'];
				$paragraph_description 	= $page[$cnt]['paragraph_description'];
				?>
				
				<?php
				if( $paragraph_title ) {?>
				<div class="control-group" class="wordwrap">
					<label class="control-label"><strong>Title: </strong></label>
					<div class="controls"><?php echo $paragraph_title;?></div>
				</div>
				<?php 
				}?>
				
				<?php
				if( $paragraph_subtitle ) {?>
					<div class="control-group" class="wordwrap">
						<label class="control-label"><strong>Sub Title: </strong></label>
						<div class="controls"><?php echo $paragraph_subtitle;?></div>
					</div>
				<?php 
				}?>
				
				<?php
				if( $paragraph_description ) {?>
				<div class="control-group" class="wordwrap">
					<label class="control-label"><strong>Description: </strong></label>
					<div class="controls cls_pagedesc"><?php echo $paragraph_description;?></div>
				</div>
				<?php 
				}?>
					
				<!-- START - Questions -->
				<?php 
				$questions = $this->libraries->getPageQuestionByParagraphPageID($page_id, $paragraph_id);
				if(count($questions)>0) {
					?>
					<div class="control-group">
						<label class="control-label"><strong>Question: </strong></label>
						<div class="controls">
							<?php 
							foreach($questions as $question) {
								?>
								<div id="questions">
									<h5 class="wordwrap"><?php echo $question['question'];?></h5>
									<ul class="no-list-style">
										<?php 
										$choices = $this->libraries->getQuestionAnswers($question['question_id']);
										foreach($choices as $ch) {?>
											<li><input type="checkbox" <?php if($ch['answer']>0):?>checked="checked"<?php endif;?> disabled="disabled" /> <label class="inline"><?php echo $ch['choice'];?></label></li>
										<?php 
										}?>
									</ul>
								</div>
								<?php 
							}
							?>
						</div>
					</div>
				<?php
				}?>
				<!-- END - Questions -->
					
					
				<?php 
				// IMAGES //
					$images = $this->libraries->getImagesByParagraphPageID( $page_id, $paragraph_id );
					if(count($images)>0) {
						$is_page_image = 0;
						?>
						<div class="imageblock-sample">
							<div class="control-group">
								<label class="control-label"><strong>Image: </strong></label>
								<div class="controls">
									<div class="flexslider">
										<ul class="slides">
										<?php 
										foreach($images as $image) {
											$image_description = $image['image_description'];
											if( file_exists(FCPATH.$this->path_upload_paragraph_images.$image['image']) ) {
												$is_page_image = 1;
												$image_description = (isset($image['image_description'])&&$image['image_description']) ? $image_description : '';?>
												<li>
												
												<img src="<?php echo $base.$this->path_upload_paragraph_images.$image['image'];?>"  />
												<div style="padding:10px;"><?php echo $image_description;?></div>
												</li>
												<?php 
											}
										}
										?>
										<?php
										if( !$is_page_image ) {
											echo "<li>Images not available.</li>";
										}?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					<?php
					}
					?>
				<?php 
				// VIDEOS //
					$videos = $this->libraries->getVideosByParagraphPageID( $page_id, $paragraph_id );
					?>
					<div class="videoblock-sample">
					<?php 
					if(count($videos)>0) {
						?>
						<div class="control-group">
							<label class="control-label"><strong>Video: </strong></label>
							<div class="controls">
								<div class="flexslider">
									<ul class="slides">
									<?php 
									foreach($videos as $video) {
										if( $video['video'] ) {
											$video_description = (isset($video['video_description'])&&$video['video_description']) ? "Description: \n\n".$video_description : '';
											?>
											<li title="<?php echo $video_description;?>">
											<iframe frameborder="0" allowfullscreen="0" src="<?php echo $video['video'];?>?wmode=transparent&showinfo=0&rel=0" width="250" height="200"></iframe>
											</li>
											<?php 
										}
									}?>
									</ul>
								</div>
							</div>
						</div>
						<?php 
					}?>
					</div>
				</div>
				<a class="btn-danger" href="<?php echo $base;?>admin/library_page_contents?libtype=<?php echo $library_type_id;?>&libid=<?php echo $_GET['lib'];?>&section=desc&language=EN&page=<?php echo $cp;?>" target="_blank">&nbsp;&nbsp; Preview Page &nbsp;&nbsp;</a>
				<br><br>
				[<a class="update" href="<?php echo $base;?>admin/update_library_page?lib=<?php echo $_GET['lib'];?>&pid=<?php echo $page_id;?>&prid=<?php echo $paragraph_id;?>&pgnumber=<?php echo $cp;?>">Edit Page</a>] 
				<br><br><br>
			<?php
			}
		}
		else {
			echo "<h5>No data available.</h5>";
		}?>

		[<a href="#" rel="<?php echo $pn;?>" class="insert">Insert New Page</a>]
		<?php if($pages>1) {?>
			[<a href="#" rel="<?php echo $page_id;?>" class="delete">Delete Page</a>]
		<?php 
		} else {?>
			<span style="color: #CCC;">[Delete]</span>
		<?php 
		}?>
		
			
		<div class="text-right">
			<div class="pagination">
			  <ul>
				<?php if($prevp>0):?>
				<li><a href="<?php echo $base;?>admin/library_pages?lib=<?php echo $_GET['lib'];?>&page=<?php echo $prevp;?>">Prev</a></li>
				<?php endif;?>
			   
				<?php for($i=$startp; $i<$startp+10; $i++): if($i<=$pages):?>
				<?php $btn	= ($i==$cp) ? 'btn' : '';?>
				<li  ><a class="<?php echo $btn;?>" href="<?php echo $base;?>admin/library_pages?lib=<?php echo $_GET['lib'];?>&page=<?php echo $i;?>"><?php echo $i;?></a></li>
				<?php else: break; endif;endfor;?>
			   
				<?php if($nextp<=$pages):?>
				<li><a href="<?php echo $base;?>admin/library_pages?lib=<?php echo $_GET['lib'];?>&page=<?php echo $nextp;?>">Next</a></li>
				<?php endif;?>
			  </ul>
			</div>
		</div>		
    </fieldset>
    </form>
    </div>
</div>   
<?php $this->load->view('footer_admin'); ?>
<script type="text/javascript">
	$(document).ready(function () {	
	   $('.delete').click(function(e){
	       e.preventDefault();
           if(confirm("Are you sure you want to Delete this page?")){
               $.post('delete_library_page', {'lid': <?php echo $_GET['lib'];?>,'pid':$(this).attr('rel')}, function(){
                    window.location.replace("<?php echo $base;?>admin/library_pages?lib=<?php echo $_GET['lib'];?>&page=<?php echo $prevp>0?$prevp:1;?>");
               })  
           }
        })
        
        $('.insert').click(function(e){
            e.preventDefault();
            if(confirm("Are you sure you want to Insert new page, after this page?")){
                window.location.replace("<?php echo $base;?>admin/insert_library_page?lib=<?php echo $_GET['lib'];?>&page="+$(this).attr('rel'));
            }
        })
		
		$('.flexslider').flexslider({
			controlNav: false,
			prevText:"",
			nextText:"",
			animation: "slide",
			itemWidth: 1,
			minItems: 3,
			maxItems: 3,
			move: 3,
			animationLoop: false,
			reverse: false,
			slideshow: false
		});
	})
</script>