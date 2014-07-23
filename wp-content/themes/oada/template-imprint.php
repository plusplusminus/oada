<?php
/*
Template Name: Page - Imprint
*/
?>

<?php get_header(); ?>

<?php global $post; ?>

      <div class="container">

        <div id="content" class="clearfix row">
        
          <div id="main" class="col-md-12 clearfix" role="main">

            <?php
              // The Query
              $the_query = new WP_Query( array('post_parent'=>$post->ID,'post_type'=>'page','orderby'=>'menu_order','order'=>'ASC'));
              // The Loop
              if ( $the_query->have_posts() ) { $count = 0;?>
                <?php while ( $the_query->have_posts() ) { $the_query->the_post(); $count++;?>
                <section class="article">
                  <div class="article-body">
                      <h2 class="text-center"><?php the_title();?></h2>
                      <div class="entry">
                        <?php the_content();?>
                      </div>
                  </div>
                </section>
                <?php } ?>
              <?php
              }
              wp_reset_postdata();
              ?>
        
          </div> <!-- end #main -->
            
        </div> <!-- end #content -->

      </div> <!-- end .container -->

<?php get_footer(); ?>
