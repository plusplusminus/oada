
<section id="places" class="bg-dark">
	<div class="container">
		<div class="place-title">
			<span class="fa fa-map-marker fa-3x"></span>
			<h3 class="title">Places we visited</h3>
		</div>
	    <?php
	    // Find connected pages
	    $query = new WP_Query( array( 'post_type'=>'places','posts_per_page'=>10 ) );
	    $default = array('class'=>'img-responsive'); 

	    // Display connected pages
	    if ( $query->have_posts() ) : $count =0;?>
    		<div class="places row">
			    <?php while ( $query->have_posts() ) : $query->the_post(); $count++; ?>
			    	<?php if ($count <= 3) : ?>
			    		<div class="place col-md-4">
			    			<a href="<?php the_permalink();?>">
						        <?php the_post_thumbnail('large',$default); ?>
						        <div class="place-info">
						        	<h4><?php the_title();?></h4>
						        </div>
						    </a>
						</div>
						<?php if ($count == 3) echo '<div class="clearfix"></div>'; ?>
					<?php else : ?>
						<?php $html .= '<li><a href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_title().',	</a></li>'; ?>
			    	<?php endif; ?>
			    <?php endwhile; ?>
			    <?php $html .= '<li> | <a class="view-more" href="'.get_post_type_archive_link('places').'" title="All Places">VIEW THEM ALL <span class="fa fa-angle-right"></span></a></li>'; ?>
			    <?php echo '<div class="other-places"><div class="col-md-12 text-center"><ul class="list-inline"><li>...</li>'.$html.'</ul></div></div>'; ?>
			</div>

				
		    <?php 
		    // Prevent weirdness
		    wp_reset_postdata();
	    endif;
	    ?>
	</div>
</section>