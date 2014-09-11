contact<?php global $post; ?>

<section id="upcoming" class="bg-light">
	<div class="container">
		<div class="row">
			<?php
			// The Query
			$the_query = new WP_Query( array('post_type'=>'trip','tag'=>'upcoming','posts_per_page'=>1));
			$default = array('class'=>'img-responsive img-circle');
			// The Loop
			if ( $the_query->have_posts() ) : $count = 0;?>

				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); $count++;?>
				
				<div class="col-sm-6 upcoming-trip">
					<div class="row">
						<div class="col-md-5 image">
							<?php echo get_the_post_thumbnail($post->ID,'thumbnail',array('class'=>'img-responsive img-circle') ); ?>
						</div>
						<div class="col-md-7">
							<h3 class="title">
								<svg class="title-icon shape-trips">
								  	<use xlink:href="#shape-trips"></use>
								</svg>
								Upcoming Trip
							</h3>
							<h4 class="trip-title"><?php the_title(); ?></h4>
							<p class="trip-date"><?php _e(get_post_meta($post->ID,'_ppm_trip_date',true));?></p>
							<?php the_content(); ?>
							<?php woo_story_sharing(); ?>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
							
			<?php
			endif;
			wp_reset_postdata();
			?>

			<div class="col-md-offset-1 col-sm-5 form-tips">
				<h3 class="title">
					<svg class="title-icon shape-contact">
					  	<use xlink:href="#shape-contact"></use>
					</svg>
					GET IN TOUCH WITH US
				</h3>
				<div class="home-contact-form">
					<?php gravity_form(1, false, false, false, '', true, 12); ?>
				</div>
			</div>
		</div>
	</div>
</section>