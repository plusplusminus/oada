<?php get_header(); ?>
<?php $default = array('class'=>'img-responsive'); ?>
    <div class="container">

			<div id="content" class="clearfix">

				<div id="main" class="clearfix experiences" role="main">
					<?php global $brew_options; ?>

					<h1 class="archive-title h2">
						<span><?php _e("Search Results for","bonestheme"); ?>:</span> <?php echo esc_attr(get_search_query()); ?>
					</h1>
					<?php get_template_part( 'breadcrumb' ); ?>

						
					<?php if (have_posts()) :  $count=0; ?>
						<div class="row">
							<?php while (have_posts()) : the_post(); $count++; ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('entry-content clearfix'); ?> role="article">
              				
				              <header>
				                <?php the_post_thumbnail('thumbnail',array('class'=>'img-responsive pull-left alignleft')); ?>
				                <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				                
				                <p class="meta"><?php _e("Posted", "bonestheme"); ?> <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_date(); ?></time> <?php _e("by", "bonestheme"); ?> <?php the_author_posts_link(); ?> <span class="amp">&</span> <?php _e("filed under", "bonestheme"); ?> <?php the_category(', '); ?>.</p>
				              
				              </header> <!-- end article header -->
				            
				              <section class="post_content">
				                <?php the_excerpt('<span class="read-more">' . __("Read more on","bonestheme") . ' "'.the_title('', '', false).'" &raquo;</span>'); ?>
				            
				              </section> <!-- end article section -->
				              
				              <footer>
				            
				                
				              </footer> <!-- end article footer -->
				            
				            </article> <!-- end article -->

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
