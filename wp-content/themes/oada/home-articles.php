<?php
// Find connected pages
$query = new WP_Query( array( 'post_type'=>'post','post_status'=>'future','posts_per_page'=>4,'tag'=>'future' ) );
$default = array('class'=>'img-responsive'); 

// Display connected pages
if ( $query->have_posts() ) : $count =0;?>
	<section id="future" class="bg-dark">
		<div class="container">
			<div class="article-title">
				<svg class="title-icon shape-blog">
				  <use xlink:href="#shape-blog"></use>
				</svg>
				<h3 class="title">Upcoming Articles</h3>
			</div>
			<div class="articles experiences row">
			    <?php while ( $query->have_posts() ) : $query->the_post(); $count++; ?>
		    		<div class="col-md-4">
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix experience' ); ?> role="article">
							<?php get_template_part('templates/content','upcoming'); ?>
						</article> <?php // end article ?>
					</div>
					<?php if ($count == 3) echo '<div class="clearfix"></div>'; ?>

			    <?php endwhile; ?>
			</div>
		</div>
	</section>
    <?php 
    // Prevent weirdness
    wp_reset_postdata();
endif;
?>
