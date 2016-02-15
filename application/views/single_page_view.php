<?php $this->load->view('header_admin'); ?>
<?php 
    $cp = isset($_POST['page'])?(int)$_POST['page']:1;

    $startp = floor(($cp-1)/10)*10+1;
    $prevp = $cp - 1;
    $nextp = $cp + 1;
?>
<div class="info-container">
    <div class="document-content">
    
    
    
    <form class="form-horizontal" method="post">
    <fieldset>
        <div class="control-group">
			<?php 
			foreach($page as $pag) {?>
        <!--<label class="control-label" for="nickname">Description</label>-->
            <div id="page-content">
            <div class="clearfix">
            	<a href="<?php echo $base;?>admin/mylibrary" class="remove btn btn-inverse"><i class="icon-white icon-remove"></i></a>
            </div>
                <?php echo $pag['paragraph_description'];?>
            </div>
            <?php 
			}
                if(count($questions)>0):
                foreach($questions as $question):
            ?>
            <div id="questions">
                <h5><?php echo $question['question'];?></h5>
                <ul class="no-list-style">
                    <?php 
                        $choices = $this->libraries->getQuestionAnswers($question['question_id']);
                        foreach($choices as $ch):?>
                        <li><input type="checkbox" class="my_answer" name="answer<?php echo $ch['answer_id'];?>" value="<?php echo $ch['answer'];?>" /> <label class="inline"><?php echo $ch['choice'];?></label> </li>
                    <?php endforeach;?>
                </ul>
            </div>
            <?php 
                endforeach; 
                if($cp==$pages){
            ?>
                <a rel="#" class="btn btn-warning">Check your answers!</a>
            <?php
                }
                endif;?>
            <div class="text-right">
            <div class="pagination">
              <ul>  <!--removed class="input-append"-->
                <?php if($prevp>0):?>
                <li><button name="page" class="btn btn-page" value="<?php echo $prevp;?>">Prev</button>
                <!--<a href="<?php echo $base;?>admin/documents?lib=<?php echo $_GET['lib'];?>&page=<?php echo $prevp;?>">Prev</a>--></li>
                <?php endif;?>
               
               
               
               <!-- Commented out Pagination -->
               
                <!--<?php for($i=$startp; $i<$startp+10; $i++): if($i<=$pages):?>
                <li>
                    <button name="page" class="btn btn-page <?php echo ($cp==$i)?"btn-current-page":"";?>" value="<?php echo $i;?>"><?php echo $i;?></button>
                    <!--<a href="<?php echo $base;?>admin/documents?lib=<?php echo $_GET['lib'];?>&page=<?php echo $i;?>"><?php echo $i;?></a></li>
                <?php else: break; endif;endfor;?>-->
              
              
                <?php if($nextp<=$pages):?>
            	<li>
                <button name="page" class="btn btn-page" value="<?php echo $nextp;?>">Next</button>
                <!--<a href="<?php echo $base;?>admin/documents?lib=<?php echo $_GET['lib'];?>&page=<?php echo $nextp;?>">Next</a></li>-->
                <?php endif;?>
              </ul>
              <input type="hidden" name="current_page_id" value="<?php echo $pag['page_id'];?>" />
            </div>
            </div>
        </div>
    </fieldset>
    </form>
    </div>
</div>   
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
<?php $this->load->view('footer_admin'); ?>