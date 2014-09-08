<?php
/* Template for experiences (Post Type: Blog) */
global $post;
?>

<a href="<?php the_permalink();?>">
    <?php the_post_thumbnail('large',array('class'=>'img-responsive')); ?>
    <div class="experience-info">

    	<h4 class="trunc"><?php the_title();?></h4>

		<div class="inner-info">
			<?php $cat = get_the_category(); ?>
			<h5 class="category-title"><?php echo $cat[0]->cat_name ?></h5>
			<span class="date"><?php the_time( get_option( 'date_format' ) ); ?> </span>
		</div>
    </div>
</a>