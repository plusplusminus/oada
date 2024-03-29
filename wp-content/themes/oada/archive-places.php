<?php get_header(); ?>
<?php $default = array('class'=>'img-responsive'); ?>
    <div class="container">

			<div id="content" class="clearfix row">

				<div id="main" class="col-md-12 clearfix experiences" role="main">
					<?php global $brew_options; ?>
					<h1 class="archive-title h2">
						All Places
					</h1>
					<?php get_template_part( 'breadcrumb' ); ?>
						


					<?php if (have_posts()) :  $count=0;?>

						<div class="row">
						
						<?php while (have_posts()) : the_post(); $count++; ?>

						<div class="col-sm-6 col-md-4">

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix experience' ); ?> role="article">

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
							        		<?php
											// Find connected pages
											$connected = new WP_Query( array(
											  	'connected_type' => 'places_to_trips',
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
							        		<span class="date"><?php _e(wpautop(get_post_meta($post->ID,'_ppm_place_date',true)));?></span>

							        	</div>
							        </div>
							    </a>

							</article> <?php // end article ?>
						</div>
						<?php if ($count == 3) echo '<div class="clearfix"></div>'; ?>

							<?php endwhile; ?>

								</div>

									<?php if (function_exists("ppm_paginate")) { ?>
										<?php ppm_paginate(); ?>
									<?php } else { ?>
										<nav class="wp-prev-next">
											<ul class="clearfix">
												<li class="prev-link"><?php next_posts_link( __( '&laquo; Older Entries', 'bonestheme' )) ?></li>
												<li class="next-link"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'bonestheme' )) ?></li>
											</ul>
										</nav>
									<?php } ?>

							<?php else : ?>

							<article id="post-not-found" class="hentry clearfix">
								<header class="article-header">
									<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
								</header>
								<section class="entry-content">
									<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
								</section>
								<footer class="article-footer">
										<p><?php _e( 'This is the error message in the archive.php template.', 'bonestheme' ); ?></p>
								</footer>
							</article>

					<?php endif; ?>

				</div> <?php // end #main ?>


			</div> <?php // end #content ?>

    </div> <?php // end ./container ?>

<?php get_footer(); ?>
