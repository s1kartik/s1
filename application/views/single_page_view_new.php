<!--?php $this->load->view('header_admin'); ?-->
<link rel="stylesheet" href="<?php echo $base;?>css/reveal.min.css">
<link rel="stylesheet" href="<?php echo $base;?>css/theme/default.css" id="theme"> 

<!-- Wrap the entire slide show in a div using the "reveal" class. -->
<div class="reveal"><!--div for reveal js-->
<!-- Wrap all slides in a single "slides" class -->
<div class="slides"><!--div for reveal js-->
            <?php 
			foreach($page as $pag):?>
            
<section> <!-- Each section element contains an individual slide -->

				<!--?= //$pages;?><br /><!--total de paginas-->
                <?php if ($pag['pn']==3): ?>
                	<?php echo "<section>"; ?>
                	<?php echo $pag['pn'];?>
                    <br />
					<?php echo $pag['paragraph_description'];?>
                	<?php echo "</section>"; ?>
                	<?php echo "<section>"; ?>
                	<?php echo $pag['paragraph_description'];?>
                	<?php echo "</section>"; ?>
                <?php elseif($pag['pn']==5): ?>
                	<?php echo "<section>"; ?>
                	<?php echo $pag['pn'];?>
                    <br />
					<?php echo $pag['paragraph_description'];?>
                	<?php echo "</section>"; ?>
                	<?php echo "<section>"; ?>
                	<?php echo $pag['paragraph_description'];?>
                	<?php echo "</section>"; ?>
				<?php else: ?>
					<?php echo "<section>"; ?>
                    <?php echo $pag['pn'];?>
                    <br />
                	<?php echo $pag['paragraph_description'];?>
                	<?php echo "</section>"; ?>

                <?php endif;?>
       </section>  <!--end section for each slide-->
<?php endforeach;?> 

    <script type="text/javascript">
	$(document).ready(function () {
		$('body').addClass('lib-pg-body');
	   $('.btn').click(function(e){
            var rate = 0;
            $questions = $('.my_answer').size();
           $('.my_answer').each(function(){
             if($(this).is(':checked')){
                $my_answer = 1;
             }else{
                $my_answer = 0;
             } 
             if($my_answer==$(this).val()){
                rate ++;   
             }  
           })
           $score = rate/$questions*100;
           if($score<75){
                e.preventDefault(); 
                alert('You reached '+$score.toFixed(0)+'% of right answer, please try again.');
           }
	   })
	})
    </script>

    <script type="text/javascript" src="<?php echo $base;?>lib/js/head.min.js"></script><!--reveal js script-->
	<script type="text/javascript" src="<?php echo $base;?>js/reveal.min.js"></script><!--reveal js script-->
        <script type="text/javascript">
  // Required, even if empty.
  Reveal.initialize({
  // begin leap motion plugin
  leap: {
        naturalSwipe   : true,    // Invert swipe gestures
        pointerOpacity : 0.5,      // Set pointer opacity to 0.5
		pointerSize: 15,
		pointerTolerance: 20,
        //pointerColor   : '#d80000' // Red pointer
    },

    dependencies: [
        { src: '<?php echo $base;?>js/leap/leap.js', async: true }
    ]
// end leap motion plugin
  });
 </script>
  
</div> <!--div class=slides-->
</div> <!--div class=reveal-->
<?php $this->load->view('footer_admin'); ?>