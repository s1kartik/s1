<div class="row-fluid ">
      <div id="news-ticker" class="span12">
           <h3><a href="<?php echo $base;?>admin/news#news-feed">News That Matter</a></h3>
      <ul class="rslides" id="slider1">
       
         <!--~~~BeginItemsRecord~~~-->
<?php   
    
	$data = $this->rssparser->getFeed(10);//get 10 items from rss
	foreach ($data as $item) : ?>
       <li> 
        
 
   
          <small>Posted by admin  <?php echo $item['pubDate']?>  </small>
         <h4><a href="<?php echo $base;?>admin/news#news-feed">  <?php echo $item['title']?></a></h4>
       
        
         <p><?php echo $item['description']?></p>
  
       </li>
     <?php endforeach;?>
           <!--~~~EndItemsRecord~~~ -->
      </ul>
      </div>
    </div>
  
  

  

  

   
    
