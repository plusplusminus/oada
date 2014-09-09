<?php
global $post;
?>

<?php get_header(); ?>

<div class="header-hero">
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

 	<div class="container">
	  	<div class="post-info">
	  		<div class="circle-text">
	  			<div>
		  			<?php
						// Find connected pages
						$connected = new WP_Query( array(
						  	'connected_type' => 'places_to_trips',
						  	'connected_items' => get_queried_object(),
						  	'nopaging' => true,
						) );

						// Display connected pages
						if ( $connected->have_posts() ) : $count =0;?>
						    <?php while ( $connected->have_posts() ) : $connected->the_post(); $count++; ?>
						    	
								<h3 class="trip-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
								    
						    <?php endwhile; ?>
						    <?php 
						    // Prevent weirdness
						    wp_reset_postdata();
						endif;
						?>

						<h1 class="place-title"><?php the_title();?></h1>
						<div class="place-rating">
							<?php $rating = get_post_meta($post->ID,'_ppm_place_rating',true); ?>
							<?php echo ppm_star_rating($rating); ?>
						</div>

						<div class="place-date">
							<?php _e(wpautop(get_post_meta($post->ID,'_ppm_place_date',true)));?>
						</div>

						<div class="place-summary">
							<?php _e(wpautop(get_post_meta($post->ID,'_ppm_place_summary',true)));?>
						</div>

						<div class="place-entry">
							<?php if ( have_posts() ) { ?>

							  	<?php while ( have_posts() ) { the_post(); ?>

							      		<?php the_content();?>

							  	<?php } ?>

							<?php } ?>
						</div>
						
	  			</div>
	  		</div>
		    
	 	</div> <!-- end .post-infor-->
	</div>
</div> <!-- end #banner-->

<?php wp_reset_postdata(); ?>
<div id="experiences" class="content bg-light">
	<div class="container">
		<?php
		// Find connected pages
		$connected = new WP_Query( array(
		  	'connected_type' => 'posts_to_places',
		  	'connected_items' => get_queried_object(),
		  	'nopaging' => true,
			'connected_meta' => array( 'featured' => '1' )
		) );

		// Display connected pages
		if ( $connected->have_posts() ) : $count =0;?>
    		<h3 class="title">What we experienced</h3>
	    	<div class="highlight">
	    		<div class="row">
					    <?php while ( $connected->have_posts() ) : $connected->the_post(); $count++; ?>
					    	<?php $exclude[] = $post->ID; ?>
					    	<div class="highlight-image col-md-8">
							        <a href="<?php the_permalink();?>" title="<?php the_title();?>">
							        	<?php $medium = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' ); ?>
									   	<?php $large = wp_get_attachment_image_src( get_post_thumbnail_id(), 'image-750' ); ?>
									    <picture>
											<!--[if IE 9]><video style="display: none;"><![endif]-->
											<source srcset="<?php echo $large[0]; ?>" media="(min-width: 480px)">
											<source srcset="<?php echo $medium[0]; ?>" media="(min-width: 400px)">
											<!--[if IE 9]></video><![endif]-->
											<img srcset="<?php echo $large[0]; ?>" alt="" class="img-responsive">
										</picture>
							        </a>
					        </div>
					        <div class="highlight-content col-md-4">
					        	<span class="highlight-heading">Place Highlight:</span>
					        	<h3 class="highlight-title"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h3>

					        	<span class="rating">
					        		<?php $rating = get_post_meta($post->ID,'_ppm_experience_rating',true); ?>
									<?php echo ppm_star_rating($rating); ?>
								</span>
								<p class="date"><?php _e(get_post_meta($post->ID,'_ppm_experience_date',true));?></p>
					        	<?php the_excerpt();?>

					        </div>
					        <?php if ($count % 2 == 0) echo '<div class="clearfix"></div>';?>
					    <?php endwhile; ?>
				</div>
			</div>
		    <?php 
		    // Prevent weirdness
		    wp_reset_postdata();
	    endif; ?>

	    <?php
	    // Find connected pages
	    $connected_2 = new WP_Query( array(
	    	'post__not_in' =>$exclude,
	      	'connected_type' => 'posts_to_places',
	      	'connected_items' => get_queried_object(),
	      	'nopaging' => true,
	    ) );

	    // Display connected pages
	    if ( $connected_2->have_posts() ) : $count =0;?>
		    	<div class="experiences">
		    		<div class="row">
					    <?php while ( $connected_2->have_posts() ) : $connected_2->the_post(); $count++; ?>
					    	<div class="experience col-sm-6 col-md-4">
					    		<a href="<?php the_permalink();?>">
					    			<?php $medium = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' ); ?>
								   	<?php $large = wp_get_attachment_image_src( get_post_thumbnail_id(), 'image-750' ); ?>
								    <picture>
										<!--[if IE 9]><video style="display: none;"><![endif]-->
										<source srcset="<?php echo $medium[0]; ?>" media="(min-width: 767px)">
										<source srcset="<?php echo $large[0]; ?>" media="(min-width: 480px)">
										<source srcset="<?php echo $medium[0]; ?>" media="(min-width: 370px)">
										<!--[if IE 9]></video><![endif]-->
										<img srcset="<?php echo $large[0]; ?>" alt="" class="img-responsive">
									</picture>
							        <div class="experience-info">

							        	<h4 class="trunc"><?php the_title();?></h4>
							        	<div class="inner-info">
							        		<span class="date"><p><?php _e(get_post_meta($post->ID,'_ppm_experience_date',true));?></p></span>
							        	</div>
							        </div>
							    </a>
					        </div>
					        <?php if ($count % 3 == 0) echo '<div class="clearfix"></div>';?>
					    <?php endwhile; ?>
					</div>
				</div>
		    <?php 
		    // Prevent weirdness
		    wp_reset_postdata();
	    endif;
	    ?>
	</div>
</div>
    

<div id="places" class="bg-dark">
	<div class="container">
		<?php
		// Find connected pages
		$related = p2p_type( 'places_to_trips' )->get_related( get_queried_object() );

		// Display connected pages
		if ( $related ->have_posts() ) : $count = 0;
		?>
			<div class="places other-places">
				<h3 class="title"><span class="text-primary">Other Places</span> During this Trip</h3>
				<div class="row">
					<?php while ( $related ->have_posts() ) : $related ->the_post(); $count++;?>
						<div class="place col-sm-6 col-md-3">
				    		<a href="<?php the_permalink();?>">
						        <?php the_post_thumbnail('large',$default); ?>
						        <div class="place-info">
						        	<h4><?php the_title();?></h4>
						        </div>
						    </a>
				        </div>
				        <?php if ($count % 4 == 0) echo '<div class="clearfix"></div>';?>
					    
					<?php endwhile; ?>
				</div>
			</div>
			<?php 
			// Prevent weirdness
			wp_reset_postdata();
		endif;
		?>
		<?php
	    // Find connected pages
	    $connected_3 = new WP_Query( array(
	      	'connected_type' => 'places_to_places',
	      	'connected_items' => get_queried_object(),
	      	'nopaging' => true,
	    ) );

	    // Display connected pages
	    if ( $connected_3->have_posts() ) : $count =0;?>
		    <div class="places similar-places">
		    	<h3 class="title"><span class="text-info">Similar Places</span> from Other Trips</h3>
	    		<div class="row">
				    <?php while ( $connected_3->have_posts() ) : $connected_3->the_post(); $count++; ?>
				    	<div class="place col-sm-6">
				    		<a href="<?php the_permalink();?>">
						        <?php the_post_thumbnail('large',$default); ?>
						        <div class="place-info">
						        	<h4><?php the_title();?></h4>
						        </div>
						    </a>
				        </div>
				        <?php if ($count % 2 == 0) echo '<div class="clearfix"></div>';?>
				    <?php endwhile; ?>
				</div>
			</div>
		    <?php 
		    // Prevent weirdness
		    wp_reset_postdata();
	    endif;
	    ?>
    </div>


</div>

<?php get_footer(); ?>
