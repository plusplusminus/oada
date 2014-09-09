<?php /* Template Name: Contact */ ?>
<?php get_header(); ?>

    <div class="container"> 

		<div id="content" class="clearfix row">

				<h1 class="archive-title h2">
					<?php the_title();?>
				</h1>
				<?php get_template_part( 'breadcrumb' ); ?>

				<div id="main" class="col-md-10 col-md-offset-1 clearfix" role="main">
        		

					<?php global $post; ?>

					<section id="contact">
							<div class="row">
								<?php
								// The Query
								$default = array('class'=>'img-responsive img-circle');
								// The Loop
								if ( have_posts() ) : $count = 0;?>

									<?php while ( have_posts() ) : the_post(); $count++;?>
									
									<div class="col-sm-6 upcoming-trip">
										<div class="row">
											<div class="col-md-5 image">
												<?php echo get_the_post_thumbnail($post->ID,'thumbnail',array('class'=>'img-responsive img-circle') ); ?>
											</div>
											<div class="col-md-7">
												<?php the_content(); ?>
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
										<svg class="title-icon shape-sharetips">
										  	<use xlink:href="#shape-sharetips"></use>
										</svg>
										GET IN TOUCH WITH US
									</h3>
									<div class="home-contact-form">
										<?php gravity_form(1, false, false, false, '', true, 12); ?>
									</div>
								</div>
							</div>
					</section>

				</div> <?php // end #main ?>

			</div> <?php // end #content ?>

    </div> <?php // end ./container ?>

<?php get_footer(); ?>
