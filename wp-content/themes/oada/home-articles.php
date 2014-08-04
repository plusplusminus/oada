

<?php
// Find connected pages
$query = new WP_Query( array( 'post_type'=>'post','post_status'=>'future','posts_per_page'=>4,'tag'=>'future' ) );
$default = array('class'=>'img-responsive'); 

// Display connected pages
if ( $query->have_posts() ) : $count =0;?>
	<section id="future" class="bg-dark">
		<div class="container">
			<div class="article-title">
				<span class="fa fa-comment fa-3x"></span>
				<h3 class="title">Upcoming Articles</h3>
			</div>
		<div class="articles row">
		    <?php while ( $query->have_posts() ) : $query->the_post(); $count++; ?>
		    	<?php if ($count <= 3) : ?>
		    		<div class="article col-md-4">
		    			<a href="<?php the_permalink();?>">
					        <?php the_post_thumbnail('large',$default); ?>
					        <div class="article-info">
					        	<h4><?php the_title();?></h4>
					        	<?php the_date();?>
					        </div>
					    </a>
					</div>
					<?php if ($count == 3) echo '<div class="clearfix"></div>'; ?>
				<?php else : ?>
					<?php $html .= '<li><a href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_title().',	</a></li>'; ?>
		    	<?php endif; ?>
		    <?php endwhile; ?>
		</div>
		</div>
	</section>
    <?php 
    // Prevent weirdness
    wp_reset_postdata();
endif;
?>
