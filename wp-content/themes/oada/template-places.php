<?php
/*
Template Name: Places Filter
*/
?>

<?php get_header(); ?>
<?php $cat = get_query_var('cats'); ?>
<?php $type = get_query_var('type'); ?>

<?php $idObj = get_category_by_slug($cat );?>
<?php $trip = get_page_by_path($type, OBJECT, 'places'); ?>

<?php
$experiences = new WP_Query( array(
  'category_name'=>$cat,
  'connected_type' => 'posts_to_places',
  'connected_items' => $trip->ID,
  'nopaging' => true,
) ); ?>

<?php $default = array('class'=>'img-responsive'); ?>
    <div class="container">

      <div id="content" class="clearfix row">

        <div id="main" class="col-md-12 clearfix experiences" role="main">

          <?php global $brew_options; ?>
          <h1><?php echo get_the_title($trip->ID);?> - <?php echo $idObj->cat_name; ?></h1>

          <?php if ($experiences->have_posts()) :  $count=0;
            while ($experiences->have_posts()) : $experiences->the_post(); $count++; ?>

            <div class="col-md-4">

              <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix experience' ); ?> role="article">

                <a href="<?php the_permalink();?>">
                      <?php the_post_thumbnail('large',$default); ?>
                      <div class="experience-info">
                        <div class="row">
                          <div class="col-md-9">
                            <h4 class="trunc"><?php the_title();?></h4>
                          </div>
                          <div class="col-md-3">
                            <?php $rating = get_post_meta($post->ID,'_ppm_experience_rating',true); ?>
                            <?php echo ppm_star_rating($rating); ?>
                          </div>
                        </div>
                        <?php $terms = wp_get_post_terms($post->ID, 'category', array("fields" => "all"));
                      if ( !empty( $terms ) && !is_wp_error( $terms ) ){
                      echo '<ul class="list-inline terms">';
                      foreach ( $terms as $term ) { ?>
                        <li>
                              <span class="fa-stack fa-lg">
                              <i class="fa <?php echo $term->description;?> fa-stack-1x fa-inverse"></i>
                            </span>
                            <span><?php echo $term->name; ?></span>
                          </li>
                      <?php }
                        echo '</ul>';
                      }
                    ?>
                      </div>
                  </a>

              </article> <?php // end article ?>
              <footer class="article-footer clearfix">
                    <?php $count <= 2 ? the_excerpt() : '';?>
              </footer> <?php // end article footer ?>
            </div>
            <?php if ($count == 3) echo '<div class="clearfix"></div>'; ?>

          <?php endwhile; ?>

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



