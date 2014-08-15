<?php global $post; ?>

<section id="connect" class="bg-dark">
	<div class="container">
		<div class="row">
			<?php $contact = get_post_meta($post->ID,'ppm_contact_page',true); ?>

			<?php
			// The Query
			$the_query = new WP_Query( array('page_id'=>$contact,'post_type'=>'page'));
			$default = array('class'=>'img-responsive img-circle');
			// The Loop
			if ( $the_query->have_posts() ) : $count = 0;?>

				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); $count++;?>
				
				<div class="col-md-8">
					<div class="connect bg-primary well">
						<div class="row">
							<div class="col-md-4 image">
								<?php echo get_the_post_thumbnail($post->ID,'thumbnail',array('class'=>'img-responsive img-circle') ); ?>
							</div>
							<div class="col-md-8">
								<h3 class="title"><span class="fa fa-group"></span>	<?php the_title(); ?></h3>
								<?php the_excerpt(); ?>
							</div>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
							
			<?php
			endif;
			wp_reset_postdata();
			?>

			<div class="col-md-4">
				<div class="social-widget bg-warning well">
					<h3 class="title text-center">Keep in Touch With Us</h3>
					<ul class="list-inline text-center">
						<li><a data-tooltip="..on Facebook" href="#">
								<span class="fa-stack fa-3x">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
			  					</span>
			  				</a>
			  			</li>
			  			<li><a data-tooltip="..on Twitter" href="#">
								<span class="fa-stack fa-3x">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
			  					</span>
			  				</a>
			  			</li>
			  			<li><a data-toggle="modal" data-target="#newsletterModal" href="#" data-tooltip="..by email newletter" href="#">
								<span class="fa-stack fa-3x">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
			  					</span>
			  				</a>
			  			</li>
					</ul>
					<div id="hover-info" class="social-hover text-center"></div>
				</div>
			</div>
		</div>
	</div>
</section>