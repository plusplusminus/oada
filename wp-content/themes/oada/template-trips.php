<?php
/*
Template Name: Trips Filter
*/
?>

<?php get_header(); ?>
<?php $cat = get_query_var('cats'); ?>
<?php $type = get_query_var('type'); ?>

<?php $idObj = get_category_by_slug($cat );?>
<?php $trip = get_page_by_path($type, OBJECT, 'trip'); ?>

<?php
$experiences = new WP_Query( array(
  'category_name'=>$cat,
  'connected_type' => 'posts_to_trips',
  'connected_items' => $trip->ID,
  'nopaging' => true,
) ); ?>

<?php $default = array('class'=>'img-responsive'); ?>
	<div class="container archive">

	  <div id="content" class="clearfix row">

		<div id="main" class="col-md-12 clearfix experiences" role="main">

		  <?php global $brew_options; ?>
		  <h1 class="archive-title"><?php echo get_the_title($trip->ID);?> - <?php echo $idObj->cat_name; ?></h1>

		  <?php if ($experiences->have_posts()) :  $count=0; ?>
			  	<div class="row ">
					<?php while ($experiences->have_posts()) : $experiences->the_post(); $count++; ?>

					<div class="<?php echo $count <= 2 ? 'col-md-6' : 'col-md-4';?>">

					  <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix experience' ); ?> role="article">

						<?php get_template_part('templates/content','experience' );?>

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



