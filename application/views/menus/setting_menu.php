
               <ul class="nav">
                  <li><a href="<?php echo $base;?>admin/profile_setting?section=personal">Personal</a></li>
                  <li><a href="<?php echo $base;?>admin/profile_setting?section=professional">Professional</a></li>
                  <?php if(in_array($this->session->userdata("usertype"), array(8))):?>
			        <li><a href="<?php echo $base;?>admin/profile_setting?section=myworker">My Worker</a></li>
			      <?php endif;?>
         		</ul>
         
                  	