<?php get_header(); ?>
<?php $default = array('class'=>'img-responsive'); ?>
    <div class="container">

			<div id="content" class="clearfix">

				<div id="main" class="clearfix experiences" role="main">
					<?php global $brew_options; ?>
					
					<h1 class="archive-title h2">
						All Trips
					</h1>
					<?php get_template_part( 'breadcrumb' ); ?>
						

					<?php if (have_posts()) :  $count=0; ?>
						<div class="row">
							<?php while (have_posts()) : the_post(); $count++; ?>

							<div class="<?php echo $count <= 2 ? 'col-sm-6' : 'col-sm-4';?>">

								<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix experience' ); ?> role="article">

									<a href="<?php the_permalink();?>">
								        <?php the_post_thumbnail('large',$default); ?>
								        <div class="experience-info">
								        	<h4 class="trunc"><?php the_title();?></h4>
								        	<div class="inner-info">
							        			<span class="date"><?php _e(wpautop(get_post_meta($post->ID,'_ppm_trip_date',true)));?></span>
								        	</div>
								        </div>
								    </a>

								</article> <?php // end article ?>
							</div>
							<?php if ($count == 2) echo '<div class="clearfix"></div>'; ?>

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
