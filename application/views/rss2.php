
<!--~~~BeginItemsRecord~~~-->
<?php   

	$data = $this->rssparserb->getFeed(5);//get 5 items from rss
	foreach ($data as $item) : ?>
    
             <div class="news-item">
        
          <small>Posted by admin at <?php echo $item['pubDate']?> </small>
         <h4><?php echo $item['title']?></h4>
       
        
         <p><?php echo $item['description']?></p>
		 <a href="<?php echo $item['link']?>" target="_new">Read More...</a>
  <hr></hr>
       </div>
     <?php endforeach;?>
           <!--~~~EndItemsRecord~~~ -->
 