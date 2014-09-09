<div id="photoFriday" class="content bg-light">
	<div class="container">
		<?php
		// Find connected pages
		$args = array('post_type'=>'post','tag_id'=>34,'posts_per_page'=>1);
		$connected = new WP_Query($args);

		// Display connected pages
		if ( $connected->have_posts() ) : $count =0;?>
    		<h3 class="title">Photo Friday</h3>
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

					        	<h3 class="highlight-title"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h3>
								<p class="date"><?php _e(get_post_meta($post->ID,'_ppm_experience_date',true));?></p>
					        	<?php the_excerpt();?>
					        	<a class="view-more" href="<?php echo get_tag_link(34);?>">View Past Photo Friday's</a>

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