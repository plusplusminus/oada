<?php
/* Template for experiences (Post Type: Blog) */
global $post;
?>

<a href="<?php the_permalink();?>">
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

    	<h4 class="trunc"><?php the_title();?></h4>

		<div class="inner-info">
			<?php $cat = get_the_category(); ?>
			<h5 class="category-title"><?php echo $cat[0]->cat_name ?></h5>
			<span class="date"><?php the_time( get_option( 'date_format' ) ); ?> </span>
		</div>
    </div>
</a>