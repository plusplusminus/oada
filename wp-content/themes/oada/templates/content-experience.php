<?php
/* Template for experiences (Post Type: Post) */
global $post;
?>

<a href="<?php the_permalink();?>">
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
			<?php
			// Find connected pages
			$connected = new WP_Query( array(
			  	'connected_type' => 'posts_to_trips',
			  	'connected_items' => $post->ID,
			  	'nopaging' => true,
			) );

			// Display connected pages
			if ( $connected->have_posts() ) : ?>
			    <?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
			    	
					<h5 class="trip-title"><?php the_title();?></h5>

					    
			    <?php endwhile; ?>
			    <?php 
			    	// Prevent weirdness
			    	wp_reset_postdata();
			endif;
			?>
		</div>
    </div>
</a>