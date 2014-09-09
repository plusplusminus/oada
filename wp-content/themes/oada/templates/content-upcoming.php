<?php
/* Template for upcoming experiences (Post Type: Post) */
global $post;
?>

<div class="content-wrap">
    <?php $medium = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' ); ?>
    <?php $large = wp_get_attachment_image_src( get_post_thumbnail_id(), 'image-750' ); ?>
    <picture>
        <!--[if IE 9]><video style="display: none;"><![endif]-->
        <source srcset="<?php echo $medium[0]; ?>" media="(min-width: 767px)">
        <source srcset="<?php echo $large[0]; ?>" media="(min-width: 480px)">
        <!--[if IE 9]></video><![endif]-->
        <img srcset="<?php echo $large[0]; ?>" alt="" class="img-responsive">
    </picture>
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