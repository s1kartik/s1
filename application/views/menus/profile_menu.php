    <ul class="nav">
    	<?php if(in_array($this->session->userdata("usertype"), array(7))):?>
        <li><a href="<?php echo $base;?>admin/union_connections">Connections</a></li>
        <li><a href="<?php echo $base;?>admin/union_datacollection">Data Collection</a></li>
        <li><a href="<?php echo $base;?>admin/union_s1plus">S1 Plus</a></li> 
        <li><a href="<?php echo $base;?>admin/union_newsletter">Newsletter</a></li> 
        <li><a href="<?php echo $base;?>admin/union_skilledjobs">Skilled Jobs</a></li>        
        <?php endif;?>
        <li><a href="<?php echo $base;?>admin/mylibrary_ohsa_metro">My Library</a></li>
        <li><a href="<?php echo $base;?>admin/libraries_metro?libtype=1">S1 Library</a></li>
        <li><a href="<?php echo $base;?>admin/search_union">Unions</a></li>
        <li><a href="<?php echo $base;?>admin/my_union_metro">My Union</a></li>        
        <?php if(!in_array($this->session->userdata("usertype"), array(1,7))):?>
        <li><a href="<?php echo $base;?>admin/connections">Connections</a></li>
        <?php endif;?>
        <li><a href="<?php echo $base;?>admin/map" >Map</a></li>
        <!--li><a href="#">Training History</a></li-->
        <?php if(!in_array($this->session->userdata("usertype"), array(9, 11))):?>
        <li><a href="<?php echo $base;?>admin/assign">Assign Pieces</a></li>
        <?php endif;?>
        <li><a href="<?php echo $base;?>admin/message_metro" id="profile_message">Messages</a></li>
        <li><a href="<?php echo $base;?>admin/fatality_metro" id="profile_message">Fatality Breakdown</a></li>
    </ul>