<?php

// The Query
$args = array('post_type'=>'post','tag'=>'featured','posts_per_page'=>10);
$default = array('class'=>'img-responsive'); 
$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) { $count = 0; ?>
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<?php while ( $the_query->have_posts() ) { $the_query->the_post(); $count++; ?>
				<div class="item <?php if ($count == 1) echo 'active';?>">
					<?php $default = array('class'=>'img-responsive');?>
					<?php $image_header = get_post_meta($post->ID,'_ppm_header_image_id',true); ?>
					<?php if (!empty($image_header)) : ?>
						 <?php echo wp_get_attachment_image( $image_header , 'slide-image','',$default ); ?>
					<?php elseif (has_post_thumbnail()) : ?>
						<?php the_post_thumbnail('slide-image',$default);?>
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
			<span class="fa fa-chevron-left"></span>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
			<span class="fa fa-chevron-right"></span>
		</a>
	</div>
<?php } else {
	// no posts found
}
/* Restore original Post Data */
wp_reset_postdata();
?>