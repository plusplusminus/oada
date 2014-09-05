<?php /* Template Name: Full */ ?>
<?php get_header(); ?>

    <div class="container"> 

		<div id="content" class="clearfix row">

				<h1 class="archive-title h2">
					<?php the_title();?>
				</h1>
				<?php get_template_part( 'breadcrumb' ); ?>

				<div id="main" class="col-md-12 clearfix" role="main">
        		

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">


							<section class="entry-content single-content clearfix" itemprop="articleBody">
								<?php the_content(); ?>
								<?php wp_link_pages(
                                	array(

                                        'before' => '<div class="page-link"><span>' . __( 'Pages:', 'brew' ) . '</span>',
                                        'after' => '</div>'
                                	) 
                                ); ?>
							</section> <?php // end article section ?>

							<footer class="article-footer single-footer clearfix">
								<?php the_tags( '<span class="tags"><span class="tags-title">' . __( 'Tags: ', 'bonestheme' ) . '</span>', ' / ', '' ); ?></span>
              					<?php get_ratings($post->ID); ?>
              					<?php woo_story_sharing(); ?>
            				</footer> <?php // end article footer ?>	

						</article> <?php // end article ?>


					<?php endwhile; ?>



					<?php else : ?>

						<article id="post-not-found" class="hentry clearfix">
								<header class="article-header">
									<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
								</header>
								<section class="entry-content">
									<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
								</section>
								<footer class="article-footer">
										<p><?php _e( 'This is the error message in the single.php template.', 'bonestheme' ); ?></p>
								</footer>
						</article>

					<?php endif; ?>

				</div> <?php // end #main ?>

			</div> <?php // end #content ?>

    </div> <?php // end ./container ?>

<?php get_footer(); ?>
