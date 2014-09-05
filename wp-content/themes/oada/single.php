<?php get_header(); ?>

    <div class="container"> 

		<div id="content" class="clearfix row">

				<?php get_template_part( 'breadcrumb' ); ?>

				<div id="main" class="col-md-8 clearfix" role="main">

        		

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

							<header class="article-header">
								<div class="titlewrap clearfix">
									<?php $rating = get_post_meta($post->ID,'_ppm_experience_rating',true); ?>
									<?php if (!empty($rating)) : ?>
										<div class="row">
											<div class="col-sm-10">
												<h1 class="single-title entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
											</div>
											<div class="col-sm-2">
												<div class="rating text-right"><?php echo ppm_star_rating($rating); ?></div>
											</div>
										</div>
									<?php else : ?>
										<h1 class="single-title entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
									<?php endif; ?>

									
									<div class="row">
										<div class="col-xs-4">
											<span class="post-author">Writen by: <?php the_author_link(); ?></span>
										</div>
										<div class="col-xs-8 text-right">
											<?php $terms = wp_get_post_terms($post->ID, 'category', array("fields" => "all"));
											 	if ( !empty( $terms ) && !is_wp_error( $terms ) ){
												echo '<ul class="list-inline terms">';
												foreach ( $terms as $term ) { ?>
													<li>
												   		<i class="fa <?php echo $term->description;?> fa-inverse"></i>
														<span class="term"><?php echo $term->name; ?></span>
										  			</li>
												<?php }
													echo '</ul>';
												}
											?>
										</div>
									</div>
								</div>

							</header> <?php // end article header ?>


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
								<?php //the_tags( '<span class="tags"><span class="tags-title">' . __( 'Tags: ', 'bonestheme' ) . '</span>', ' / ', '' ); ?></span>
              					<?php get_ratings($post->ID); ?>
              					<?php woo_story_sharing(); ?>
            				</footer> <?php // end article footer ?>	

						</article> <?php // end article ?>

						<?php woo_postnav(get_the_id()); ?>

          				<?php comments_template(); ?>

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

				<?php get_sidebar('experience'); ?>

			</div> <?php // end #content ?>

    </div> <?php // end ./container ?>

<?php get_footer(); ?>
