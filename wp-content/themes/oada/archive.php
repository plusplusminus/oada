<?php get_header(); ?>
<?php $default = array('class'=>'img-responsive'); ?>
    <div class="container">

			<div id="content" class="clearfix row">

				<div id="main" class="col-md-12 clearfix experiences archive" role="main">
					<?php global $brew_options; ?>
					<?php if ( $brew_options['breadcrumb'] == 1) { ?>

						<?php if (is_category()) { ?>
							<h1 class="archive-title h2">
								<span><?php _e( 'All Experiences:', 'bonestheme' ); ?></span> <?php single_cat_title(); ?>
							</h1>
							<?php get_template_part( 'breadcrumb' ); ?>
						<?php } elseif (is_tag()) { ?>
							<h1 class="archive-title h2">
								<span><?php _e( 'Posts Tagged:', 'bonestheme' ); ?></span> <?php single_tag_title(); ?>
							</h1>
							<?php get_template_part( 'breadcrumb' ); ?>
						<?php } elseif (is_author()) {
							global $post;
							$author_id = $post->post_author;
						?>
							<h1 class="archive-title h2">

								<span><?php _e( 'Posts By:', 'bonestheme' ); ?></span> <?php the_author_meta('display_name', $author_id); ?>

							</h1>
							<?php get_template_part( 'breadcrumb' ); ?>
						<?php } elseif (is_day()) { ?>
							<h1 class="archive-title h2">
								<span><?php _e( 'Daily Archives:', 'bonestheme' ); ?></span> <?php the_time('l, F j, Y'); ?>
							</h1>
							<?php get_template_part( 'breadcrumb' ); ?>
						<?php } elseif (is_month()) { ?>
								<h1 class="archive-title h2">
									<span><?php _e( 'Monthly Archives:', 'bonestheme' ); ?></span> <?php the_time('F Y'); ?>
								</h1>
								<?php get_template_part( 'breadcrumb' ); ?>
						<?php } elseif (is_year()) { ?>
								<h1 class="archive-title h2">
									<span><?php _e( 'Yearly Archives:', 'bonestheme' ); ?></span> <?php the_time('Y'); ?>
								</h1>
								<?php get_template_part( 'breadcrumb' ); ?>
						<?php } ?>

					<?php } else { ?>

						<?php get_template_part( 'breadcrumb' ); ?>
						
					<?php } ?>

					<?php if (have_posts()) :  $count=0;
						while (have_posts()) : the_post(); $count++; ?>

						<div class="col-sm-6 col-md-4">

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix experience' ); ?> role="article">

								<?php get_template_part('templates/content','experience'); ?>

							</article> <?php // end article ?>
							
						</div>
						<?php if ($count == 3) echo '<div class="clearfix"></div>'; ?>

					<?php endwhile; ?>

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
