<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>
<?php $cat = get_query_var('cats'); ?>
<?php $type = get_query_var('type'); ?>

<?php $idObj = get_category_by_slug($cat );?>
<?php $trip = get_page_by_path($type, OBJECT, 'trip'); ?>

<?php
// Fix for the WordPress 3.0 "paged" bug.
$paged = 1;
if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
if ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
$paged = intval( $paged );

$query_args = array(
		  'post_type' => 'post', 
		  'paged' => $paged
		);

query_posts( $query_args );
?>
<?php $default = array('class'=>'img-responsive'); ?>
	<div class="container  archive">
	  <div id="content" class="clearfix row">
		<div id="main" class="col-md-12 clearfix experiences" role="main">
		  <?php global $brew_options; ?>
		  <h1 class="archive-title">All Experiences</h1>
		  <?php get_template_part( 'breadcrumb' ); ?>
		  
		<?php if (have_posts()) :  $count=0; ?>
			<div class="row">
			  	<?php  while (have_posts()) : the_post(); $count++; ?>
				 	<div class="col-sm-6 col-md-4">
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix experience' ); ?> role="article">
							<?php get_template_part('templates/content','experience'); ?>
						</article> <?php // end article ?>
					</div>
					<?php if ($count == 3) echo '<div class="clearfix"></div>'; ?>
				<?php endwhile; ?>
		  	</div>
			<?php if (function_exists("emm_paginate")) { ?>
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



