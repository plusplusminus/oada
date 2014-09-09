<?php

// The Query
$args = array('post_type'=>'post','tag'=>'featured','posts_per_page'=>10);
$default = array('class'=>'img-responsive'); 
$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) { $count = 0; ?>

<section id="home-slider" class="slider-bg">
		<div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel">
			<div class="carousel-inner">
				<?php while ( $the_query->have_posts() ) { $the_query->the_post(); $count++; ?>
					<div class="item <?php if ($count == 1) echo 'active';?>">
						<?php $default = array('class'=>'img-responsive');?>
						<?php $image_header = get_post_meta($post->ID,'_ppm_header_image_id',true); ?>
						<?php if (!empty($image_header)) : ?>
							<?php $phone = wp_get_attachment_image_src( $image_header, 'medium' ); ?>
							<?php $medium = wp_get_attachment_image_src( $image_header, 'image-750' ); ?>
						   	<?php $large = wp_get_attachment_image_src( $image_header, 'slide-image' ); ?>
						    <picture>
								<!--[if IE 9]><video style="display: none;"><![endif]-->
								<source srcset="<?php echo $large[0]; ?>" media="(min-width: 750px)">
								<source srcset="<?php echo $phone[0]; ?>" media="(min-width: 370px)">
								<!--[if IE 9]></video><![endif]-->
								<img srcset="<?php echo $medium[0]; ?>" alt="" class="img-responsive">
							</picture>
						<?php elseif (has_post_thumbnail()) : ?>
							<?php $phone = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' ); ?>
							<?php $medium = wp_get_attachment_image_src( get_post_thumbnail_id(), 'image-750' ); ?>
						   	<?php $large = wp_get_attachment_image_src( get_post_thumbnail_id(), 'slide-image' ); ?>
						    <picture>
								<!--[if IE 9]><video style="display: none;"><![endif]-->
								<source srcset="<?php echo $large[0]; ?>" media="(min-width: 750px)">
								<source srcset="<?php echo $phone[0]; ?>" media="(min-width: 370px)">
								<!--[if IE 9]></video><![endif]-->
								<img srcset="<?php echo $medium[0]; ?>" alt="" class="img-responsive">
							</picture>
						<?php else: ?>
							<img class="img-responsive" src="http://placehold.it/1600x650&text=.">
						<?php endif; ?>

						<div class="carousel-caption">
							<div class="slide-title">
								<a href="<?php the_permalink();?>"><?php the_title();?></a>
							</div>
						</div>
					</div>
				<?php } ?>
				
			</div>
			<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
				<span class="fa fa-angle-left"></span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
				<span class="fa fa-angle-right"></span>
			</a>
		</div>
</section>
<?php } else {
	// no posts found
}
/* Restore original Post Data */
wp_reset_postdata();
?>