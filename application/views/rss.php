<!--~~~BeginItemsRecord~~~-->
	<?php 
	$data = $this->rssparser->getFeed(10); //get 10 items from rss
	if( isset($data) && sizeof($data) ) {
		foreach ($data as $item) {
			$feed_pub_date 		= (isset($item['pubDate'])&&($item['pubDate']&&'null'!=$item['pubDate'])) ? $item['pubDate'] : 'N/A';
			$feed_title			= (isset($item['title'])&&$item['title']) ? $item['title'] : '';
			$feed_description	= (isset($item['description'])&&$item['description']) ? $item['description'] : '';
			if ($tile==6){
			$feed_link			= (isset($item['link'])&&$item['link']) ? $rss_external_link.$item['link'] : '';
			}else
			{
			$feed_link			= (isset($item['link'])&&$item['link']) ? $item['link'] : '';
			}
			
			?>
			<div class="news-item">
				<small>Posted by admin at <?php echo $feed_pub_date;?> </small>
				<h4><?php echo $feed_title;?></h4>
				<p><?php echo $feed_description;?></p>
				<a href="<?php echo $feed_link;?>" target="_new">Read More...</a>
				<hr></hr>
			</div>
			<?php 
		}
	}
	else {?>
		<div class="news-item">
			<h5>No News available, <a class="btn btn-inverse" href="<?php echo $rss_external_link;?>" target="_new">Click Here</a></h5>
			<hr></hr>
		</div>
		<?php 
	}?>
<!--~~~EndItemsRecord~~~ -->
 