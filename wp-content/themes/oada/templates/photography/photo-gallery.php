
<section id="places" class="bg-dark">
	<div class="container">
		<div class="place-title">
			<svg class="title-icon shape-trips">
			  <use xlink:href="#shape-photos-large"></use>
			</svg>
			<h3 class="title">Galleries</h3>
		</div>
	    <?php
	    // Find connected pages
	    $query = new WP_Query( array( 'post_type'=>'gallery','posts_per_page'=>10,'orderby'=>'rand' ) );
	    $default = array('class'=>'img-responsive'); 

	    // Display connected pages
	    if ( $query->have_posts() ) : $count =0;?>
    		<div class="places row">
			    <?php while ( $query->have_posts() ) : $query->the_post(); $count++; ?>
			    	<?php if ($count <= 3) : ?>
			    		<div class="place col-sm-6 col-md-4">
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
						        <div class="place-info">
						        	<h4><?php the_title();?></h4>
						        	<div class="inner-info">
						        		<span class="date"><?php _e(wpautop(get_post_meta($post->ID,'_ppm_place_date',true)));?></span>
						        	</div>
						        </div>
						    </a>
						</div>
						<?php if ($count == 3) echo '<div class="clearfix"></div>'; ?>
					<?php else : ?>
						<?php if ($count < 10) $html .= '<li><a href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_title().',	</a></li>';
						else $html .= '<li><a href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></li>';
			    	?>
			    	<?php endif; ?>
			    <?php endwhile; ?>
			    <?php $html .= '<li> | <a class="view-more" href="'.get_post_type_archive_link('gallery').'" title="All Galleries">VIEW THEM ALL</a> <span class="fa fa-angle-right"></span></li>'; ?>
			    <?php echo '<div class="other-places"><div class="col-md-12 text-center"><ul class="list-inline"><li>...</li>'.$html.'</ul></div></div>'; ?>
			</div>

				
		    <?php 
		    // Prevent weirdness
		    wp_reset_postdata();
	    endif;
	    ?>
	</div>
</section>