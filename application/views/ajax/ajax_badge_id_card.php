<script type="text/javascript" src="<?php echo $this->base;?>js/metro/metro.min.js"></script>
<div class="panel no-border span7 no-margin">
	<div class="panel-content fg-dark nlp nrp">
		<div class="image-contianer">
			<?php 
            $badge_image = (!empty($badge_providers[0]['badge_image'])) ? $this->base."img/badges/".$badge_providers[0]['badge_image'] : $this->base."img/no_image.jpg";
            ?>
            <img src='<?php echo $badge_image;?>' rel="" style="width: 180px;" class="place-left margin10 nlm ntm size2">
        </div>
		<span class="text-center padding20" >
			<h3 class="fg-black">
				<strong><?php echo (isset($badge_providers[0]['badge_title'])&&$badge_providers[0]['badge_title']) ? "Title: ".ucwords($badge_providers[0]['badge_title']) : '-';?></strong>
			</h3>
			<p class="fg-black"><?php echo $assigned_by;?></p>
		</span>
	</div>
</div>
<div class="tab-control span7 no-margin" data-effect="fade" data-role="tab-control">
	<ul class="tabs">
		<li class="active user_tab"><a href="#provider_type"><i class=""></i>Provider Type</a></li>
		<li class="user_tab"><a href="#provider_name"><i class=""></i>Provider Name</a></li>
		<li class="user_tab"><a href="#provider_location"><i class=""></i>Location</a></li>
		<li class="user_tab"><a href="#instructor_name"><i class=""></i>Instructor Name</a></li>
	</ul>
	<div class="frames">
		<div class="frame text-center no-margin" id="provider_type">
		   <p class="item-title-secondary fg-black"><?php echo isset($badge_providers[0]['badge_provider_type']) ? ucwords($badge_providers[0]['badge_provider_type']) : '';?></p>
		</div>
		<div class="frame text-center no-margin" id="provider_name">
		   <p class="item-title-secondary fg-black"><?php echo isset($badge_providers[0]['st_badge_provider_name']) ? ucwords($badge_providers[0]['st_badge_provider_name']) : '';?></p>
		</div>
		<div class="frame text-center no-margin" id="provider_location">
		   <p class="item-title-secondary fg-black"><?php echo isset($badge_providers[0]['st_badge_provider_location']) ? ucwords($badge_providers[0]['st_badge_provider_location']) : '';?></p>
		</div>
		<div class="frame text-center no-margin" id="instructor_name">
		   <p class="item-title-secondary fg-black"><?php echo isset($badge_providers[0]['st_instructor_name']) ? ucwords($badge_providers[0]['st_instructor_name']) : '';?></p>
		</div>
	</div>
</div>