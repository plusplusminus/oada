<?php
/* Template for upcoming experiences (Post Type: Post) */
global $post;
?>

<div class="content-wrap">
    <?php the_post_thumbnail('large',array('class'=>'img-responsive')); ?>
    <div class="experience-info">
    	<div class="row">
    		<div class="col-md-9">
    			<h4 class="trunc"><?php the_title();?></h4>
    		</div>
    		<?php $rating = get_post_meta($post->ID,'_ppm_experience_rating',true); ?>
    		<?php if (!empty($rating)) : ?>
        		<div class="col-md-3">
        				<?php echo ppm_star_rating($rating); ?>			
        		</div>
    		<?php endif; ?>
    	</div>
		<div class="inner-info">
			<span class="date"><p>Coming Soon : <?php the_date();?></p></span></h5>
		</div>
    </div>
</div>