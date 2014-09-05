<?php
/* Template for experiences (Post Type: Post) */
global $post;
?>

<a href="<?php the_permalink();?>">
    <?php the_post_thumbnail('large',array('class'=>'img-responsive')); ?>
    <div class="experience-info">

    	<h4 class="trunc"><?php the_title();?></h4>

		<div class="inner-info">
			<?php $cat = get_the_category(); ?>
			<?php $connected = p2p_type( 'places_to_trips' )->get_connected( $post->ID ); ?>
			<?php if (is_page_template('template-blog.php' )) : ?>
				<h5 class="category-title"><?php echo $cat[0]->cat_name ?></h5>
				<span class="date"><?php the_time( get_option( 'date_format' ) ); ?> </span>
			<?php elseif (is_category()) : ?>
					<?php $connected = p2p_type( 'posts_to_trips' )->get_connected( $post->ID ); ?>
	        		<h5 class="trip-title"><?php echo get_the_title($connected->post->ID);?></h5>
	        		<span class="date"><?php _e(get_post_meta($post->ID,'_ppm_experience_date',true));?></span>
			<?php endif; ?>
		</div>
    </div>
</a>