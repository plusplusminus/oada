<?php
/* PPM Functions */

add_action( 'wp_enqueue_scripts', 'ppm_scripts_and_styles', 999 );

function ppm_scripts_and_styles() {
    global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
    global $brew_options;
    if (!is_admin()) {

        wp_register_script( 'third-party', get_stylesheet_directory_uri() . '/includes/js/third-party.js', array('jquery'), '3.0.0',true);
        wp_register_script( 'ppm', get_stylesheet_directory_uri() . '/includes/js/ppm.js', array('third-party','jquery'), '3.0.0',true);
        
        
        wp_enqueue_script('third-party');
        wp_enqueue_script('ppm');


    }
}

add_image_size('slide-image',1600,650,true);

function child_sections($sections){
    //$sections = array();
    $sections[] = array(
        'icon'          => 'ok',
        'icon_class'    => 'fa fa-gears',
        'title'         => __('Theme Options', 'peadig-framework'),
        'desc'          => __('<p class="description">Theme modifications</p>', 'ppm'),
        'fields' => array(
                array(
                        'id'=>'site_logo',
                        'type' => 'media', 
                        'url'=> true,
                        'title' => __('Site Logo', 'ppm'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc'=> __('Select main logo from media gallery', 'ppm'),
                        'default'=>array('url'=>'http://s.wordpress.org/style/images/codeispoetry.png'),
                        ),
                array(
                        'id'=>'site_logo_1',
                        'type' => 'media', 
                        'url'=> true,
                        'title' => __('Site Logo Inverse', 'ppm'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc'=> __('Select inverseo logo from media gallery', 'ppm'),
                        'default'=>array('url'=>'http://s.wordpress.org/style/images/codeispoetry.png'),
                        ),
                array(
                        'id'=>'site_favicon',
                        'type' => 'media', 
                        'url'=> true,
                        'title' => __('Site Icon', 'ppm'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc'=> __('Add a website icon', 'ppm'),
                        'default'=>array('url'=>'http://s.wordpress.org/style/images/codeispoetry.png'),
                        ),  
        )
    );

     $sections[] = array(
        'icon'          => 'ok',
        'icon_class'    => 'fa fa-heart',
        'title'         => __('Social Profiles', 'ppm-framework'),
        'desc'          => __('<p class="description">Social Network URLS</p>', 'ppm'),
        'fields' => array(
           
            array(
                        'id'=>'twitter_url',
                        'type' => 'text',
                        'title' => __('Twitter', 'redux-framework-demo'),
                        'desc' => __('Enter your twitter handle', 'redux-framework-demo'),
                        ),  
            array(
                        'id'=>'googleplus_url',
                        'type' => 'text',
                        'title' => __('Google Plus', 'redux-framework-demo'),
                        'desc' => __('Enter your Google+ url', 'redux-framework-demo'),
                        ),  
            array(
                        'id'=>'address',
                        'type' => 'textarea',
                        'title' => __('Address', 'redux-framework-demo'),
                        'desc' => __('Enter your business address', 'redux-framework-demo'),
                        ),    
             array(
                        'id'=>'telephone',
                        'type' => 'textarea',
                        'title' => __('Telephone Numebrs', 'redux-framework-demo'),
                        'desc' => __('Enter your business telephone numbers', 'redux-framework-demo'),
                        ),
            array(
                    'id'=>'email',
                    'type' => 'text',
                    'title' => __('Email Address', 'redux-framework-demo'),
                    'desc' => __('Enter your business email address', 'redux-framework-demo'),
                    ),   
        )
    );

    return $sections;
}

register_nav_menus( array( 'secondary-nav' => __( 'Secondary Nav', 'woothemes' ),'category-nav' => __( 'Category Nav', 'woothemes' ) ) );



// Secondary Nav
function secondary_nav() {
    // display the wp3 menu if available
    wp_nav_menu(array(
        'container' => false,                                       // remove nav container
        'container_class' => 'menu clearfix',                       // class of container (should you choose to use it)
        'menu' => __( 'The Main Menu', 'bonestheme' ),              // nav name
        'menu_class' => 'nav navbar-nav navbar-right',              // adding custom nav class
        'theme_location' => 'secondary-nav',                             // where it's located in the theme
        'before' => '',                                             // before the menu
      'after' => '',                                            // after the menu
      'link_before' => '',                                      // before each link
      'link_after' => '',                                       // after each link
      'depth' => 2,                                             // limit the depth of the nav
      'fallback_cb' => 'wp_bootstrap_navwalker::fallback',  // fallback
        'walker' => new wp_bootstrap_navwalker()                    // for bootstrap nav
    ));
} /* end bones main nav */


add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_ppm_';

    $meta_boxes['trip_metabox'] = array(
            'id'         => 'trip_metabox',
            'title'      => __( 'Trip Information', 'cmb' ),
            'pages'      => array( 'trip', ), // Post type
            'context'    => 'normal',
            'priority'   => 'high',
            'show_names' => true, // Show field names on the left
            // 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
            'fields'     => array(
                array(
                    'name' => 'Trip Summary',
                    'desc' => 'Enter the trip summary...',
                    'id' => $prefix . 'trip_summary',
                    'type' => 'textarea',
                ),
                array(
                    'name' => 'Trip Date',
                    'desc' => 'Enter the trip date...',
                    'id' => $prefix . 'trip_date',
                    'type' => 'text',
                ),
                array(
                    'name' => __( 'Trip Rating', 'cmb' ),
                    'desc' => __( 'enter the trip rating...', 'cmb' ),
                    'id'   => $prefix . 'trip_rating',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Trip Location',
                    'desc' => 'Drag the marker to set the exact location',
                    'id' => $prefix . 'trip_location',
                    'type' => 'pw_map',
                    'sanitization_cb' => 'pw_map_sanitise',
                ),
            )
        );

        $meta_boxes['experience_metabox'] = array(
            'id'         => 'experience_metabox',
            'title'      => __( 'Experience Information', 'cmb' ),
            'pages'      => array( 'post', ), // Post type
            'context'    => 'normal',
            'priority'   => 'high',
            'show_names' => true, // Show field names on the left
            // 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
            'fields'     => array(
                array(
                    'name' => 'Experience Date',
                    'desc' => 'Enter the trip date...',
                    'id' => $prefix . 'experience_date',
                    'type' => 'text',
                ),
                array(
                    'name' => __( 'Overall Experience Rating', 'cmb' ),
                    'desc' => __( 'enter the trip rating...', 'cmb' ),
                    'id'   => $prefix . 'experience_rating',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Experience Location',
                    'desc' => 'Drag the marker to set the exact location',
                    'id' => $prefix . 'experience_location',
                    'type' => 'pw_map',
                    'sanitization_cb' => 'pw_map_sanitise',
                ),
                array(
                    'id'          => $prefix . 'rating_group',
                    'type'        => 'group',
                    'description' => __( 'Add Experience Ratings', 'cmb' ),
                    'options'     => array(
                        'group_title'   => __( 'Entry {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
                        'add_button'    => __( 'Add Another Entry', 'cmb' ),
                        'remove_button' => __( 'Remove Entry', 'cmb' ),
                        'sortable'      => true, // beta
                    ),
                    // Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
                    'fields'      => array(
                        array(
                            'name' => 'Rating Name',
                            'id'   => 'title',
                            'type' => 'text',
                        ),
                        array(
                            'name' => 'Rating Score',
                            'description' => 'Write a short description for this entry',
                            'id'   => 'score',
                            'type' => 'text',
                        ),
                    ),
                ),
            )
        );

        $meta_boxes['place_metabox'] = array(
            'id'         => 'place_metabox',
            'title'      => __( 'Place Information', 'cmb' ),
            'pages'      => array( 'places', ), // Post type
            'context'    => 'normal',
            'priority'   => 'high',
            'show_names' => true, // Show field names on the left
            // 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
            'fields'     => array(
                array(
                    'name' => 'Place Summary',
                    'desc' => 'Enter the place summary...',
                    'id' => $prefix . 'place_summary',
                    'type' => 'textarea',
                ),
                array(
                    'name' => 'Visit Date',
                    'desc' => 'Enter the visit date...',
                    'id' => $prefix . 'place_date',
                    'type' => 'text',
                ),
                array(
                    'name' => __( 'Place Rating', 'cmb' ),
                    'desc' => __( 'enter the place rating...', 'cmb' ),
                    'id'   => $prefix . 'place_rating',
                    'type' => 'text',
                ),
                array(
                    'name' => 'Place Location',
                    'desc' => 'Drag the marker to set the exact location',
                    'id' => $prefix . 'place_location',
                    'type' => 'pw_map',
                    'sanitization_cb' => 'pw_map_sanitise',
                ),

            )
        );

    return $meta_boxes;
}


add_filter('redux/options/brew_options/sections', 'child_sections');

// let's create the function for the custom type
function trips_post_example() { 
    // creating (registering) the custom type 
    register_post_type( 'trip', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
        // let's now add all the options for this post type
        array( 'labels' => array(
            'name' => __( 'Trips', 'bonestheme' ), /* This is the Title of the Group */
            'singular_name' => __( 'Trip', 'bonestheme' ), /* This is the individual type */
            'all_items' => __( 'All Trips', 'bonestheme' ), /* the all items menu item */
            'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
            'add_new_item' => __( 'Add New Trip', 'bonestheme' ), /* Add New Display Title */
            'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
            'edit_item' => __( 'Edit Trip Types', 'bonestheme' ), /* Edit Display Title */
            'new_item' => __( 'New Trip Type', 'bonestheme' ), /* New Display Title */
            'view_item' => __( 'View Trip Type', 'bonestheme' ), /* View Display Title */
            'search_items' => __( 'Search Trip Type', 'bonestheme' ), /* Search Custom Type Title */ 
            'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
            'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
            'parent_item_colon' => ''
            ), /* end of arrays */
            'public' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'show_ui' => true,
            'query_var' => true,
            'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
            'menu_icon' => get_template_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
            'rewrite'   => array( 'slug' => 'trip', 'with_front' => false ), /* you can specify its url slug */
            'has_archive' => 'trip', /* you can rename the slug here */
            'capability_type' => 'post',
            'hierarchical' => false,
            /* the next one is important, it tells what's enabled in the post editor */
            'supports' => array( 'title', 'editor', 'thumbnail')
        ) /* end of options */
    ); /* end of register post type */

    register_post_type( 'places', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
        // let's now add all the options for this post type
        array( 'labels' => array(
            'name' => __( 'Places', 'bonestheme' ), /* This is the Title of the Group */
            'singular_name' => __( 'Place', 'bonestheme' ), /* This is the individual type */
            'all_items' => __( 'All Places', 'bonestheme' ), /* the all items menu item */
            'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
            'add_new_item' => __( 'Add New Place', 'bonestheme' ), /* Add New Display Title */
            'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
            'edit_item' => __( 'Edit Place Types', 'bonestheme' ), /* Edit Display Title */
            'new_item' => __( 'New Place Type', 'bonestheme' ), /* New Display Title */
            'view_item' => __( 'View Place Type', 'bonestheme' ), /* View Display Title */
            'search_items' => __( 'Search Place Type', 'bonestheme' ), /* Search Custom Type Title */ 
            'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
            'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
            'parent_item_colon' => ''
            ), /* end of arrays */
            'public' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'show_ui' => true,
            'query_var' => true,
            'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
            'menu_icon' => get_template_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
            'rewrite'   => array( 'slug' => 'place', 'with_front' => false ), /* you can specify its url slug */
            'has_archive' => 'place', /* you can rename the slug here */
            'capability_type' => 'post',
            'hierarchical' => false,
            /* the next one is important, it tells what's enabled in the post editor */
            'supports' => array( 'title', 'editor', 'thumbnail')
        ) /* end of options */
    ); /* end of register post type */
    
    /* this adds your post categories to your custom post type */
    register_taxonomy_for_object_type( 'category', 'trip' );
    /* this adds your post tags to your custom post type */
    register_taxonomy_for_object_type( 'post_tag', 'trip' );

    register_taxonomy_for_object_type( 'post_tag', 'places' );
    
} 

    // adding the function to the Wordpress init
    add_action( 'init', 'trips_post_example');

function my_connection_types() {
    p2p_register_connection_type( array(
        'name' => 'places_to_trips',
        'from' => 'places',
        'to' => 'trip',
        'sortable' => 'any',
    ) );

    p2p_register_connection_type( array(
        'title' => 'Similar Places from Other Trips',
        'name' => 'places_to_places',
        'from' => 'places',
        'to' => 'places',
        'reciprocal' => true,
    ) );

    p2p_register_connection_type( array(
        'name' => 'posts_to_trips',
        'from' => 'post',
        'to' => 'trip',
        'sortable' => 'any',  // this must be set to 'any' or ``true``
        'cardinality' => 'many-to-one', //optional
        'fields' => array(
            'featured' => array(
                'title' => 'Trip Highlight',
                'type' => 'checkbox',
            ),
        ),
    ));

    p2p_register_connection_type( array(
        'name' => 'posts_to_places',
        'from' => 'post',
        'to' => 'places',
        'sortable' => 'any',  // this must be set to 'any' or ``true``
        'cardinality' => 'many-to-one', //optional
        'fields' => array(
            'featured' => array(
                'title' => 'Place Highlight',
                'type' => 'checkbox',
            ),
        ),
    ) ); 
}
add_action( 'p2p_init', 'my_connection_types' );

add_action( 'cmb_render_post_select', 'sm_cmb_render_post_select', 10, 2 );

function sm_cmb_render_post_select( $field, $meta ) {

    $post_type = ($field['post_type'] ? $field['post_type'] : 'post');
    $limit = ($field['limit'] ? $field['limit'] : '-1');
    echo '<select class="select2" name="', $field['id'], '" id="', $field['id'], '">';
    $posts = get_posts('post_type='.$post_type.'&numberposts='.$limit.'&posts_per_page='.$limit);
    
    foreach ( $posts as $art ) {
        if (in_array($art->ID, $meta)) {
            echo '<option value="'. $art->ID .'" selected>' . get_the_title($art->ID) . '</option>';
        }
        elseif ($art->ID == $meta ) {
            echo '<option value="'. $art->ID .'" selected>' . get_the_title($art->ID) . '</option>';
        } else {
            echo '<option value="'. $art->ID . '">' . get_the_title($art->ID) . '</option>';
        }
    }
    echo '</select>';
    echo '<p class="cmb_metabox_description">', $field['desc'], '</p>';
}


function sergio($str)
{
    echo '<pre>';
    print_r($str);
    echo '</pre>';
}

function woo_story_sharing($title='Share:')
{
    global $post;

    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail');?>
    <ul class="social list-inline">  
        <li class="share"><?php _e($title,'ppm');?></li>
        <?php $url = get_permalink();?>
        <?php $title = get_the_title();?>
        <?php $summary = get_the_excerpt();?>
        <li>
            <a href="#" class="social" onclick="window.open('http://www.facebook.com/sharer.php?s=100&p[title]=<?php echo urlencode($title); ?>&p[summary]=<?php echo urlencode($summary); ?>&p[url]=<?php echo urlencode($url); ?>&p[images][0]=<?php echo urlencode($thumb[0]); ?>', 'sharer', 'toolbar=0,status=0,width=626,height=436');return false;">
                <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                </span>
            </a>
        </li>
        <li>    
            <a target="_blank" class="social" href="https://twitter.com/share/?counturl=<?php the_permalink();?>&amp;url=<?php the_permalink();?>&amp;text=<?php the_title();?>">
                <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
            </a>
        </li>
        <li>
            <a class="social" target="_blank" onclick="window.open('//pinterest.com/pin/create/button/?url=<?php the_permalink();?>&amp;media=<?php echo $thumb[0];?>', 'sharer', 'toolbar=0,status=0,width=626,height=436');return false;" href="#">
                <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-pinterest fa-stack-1x fa-inverse"></i>
                </span>
            </a>
        </li>
        <li>
            <a class="social" href="#">
                <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-star fa-stack-1x fa-inverse"></i>
                </span>
            </a>
        </li>
    </ul>
    <div class="clearfix"></div>
    <?php
}

if (!function_exists('woo_postnav')) {
    function woo_postnav($id) {

        if ( is_single() ) {
            $items = p2p_type('posts_to_trips')->get_adjacent_items($id);
            ?>
            <div class="post-entries">
                <?php if (!empty($items['previous'])) : ?>
                    <div class="col-md-6 nav-entries-holder">
                        <a href="<?php echo get_permalink($items['previous']);?>">
                        <div class="nav-prev pull-left">
                            <i class="fa fa-angle-left fa-5x"></i>
                            <div class="nav-content">
                                <span class="nav-trip"><?php echo get_the_title($items['parent']);?></span>
                                <p><?php echo get_the_title($items['previous']);?></p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        </a>
                    </div>
                <?php endif; ?>
                <?php if (!empty($items['next'])) : ?>
                    <div class="col-md-6 nav-entries-holder pull-right">
                        <a href="<?php echo get_permalink($items['next']);?>">
                        <div class="nav-next pull-right">
                            <i class="fa fa-angle-right fa-5x"></i>
                            <div class="nav-content">
                               <span class="nav-trip"><?php echo get_the_title($items['parent']);?></span>
                                <p><?php echo get_the_title($items['next']); ?></p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        </a>
                    </div>
                <?php endif; ?>
            <div class="clearfix"></div>
            </div><!--/.post-entires-->
        <?php
        }
    }
}

// Bootstrap Style Breadcrumbs
// http://mkoerner.de/breadcrumbs-for-wordpress-themes-with-bootstrap-3/

function ppm_custom_breadcrumb() {
    global $post;
    global $item_place;
    global $item_trip;

  if(!is_home()) {
    echo '<ol class="breadcrumb">';
    echo '<li><a href="'.get_option('home').'">Home</a></li>';
    if (is_single()) {
        echo '<li><a href="'.get_post_type_archive_link( 'trip' ).'">Trips</a></li>';
        $trip = new WP_Query( array(
          'connected_type' => 'posts_to_trips',
          'connected_items' => $post->ID,
          'nopaging' => true,
        ) );

        // Display connected pages
        if ($trip->have_posts() ) : ?>
        <?php while ( $trip->have_posts() ) : $trip->the_post(); ?>
            <?php $item_trip = $post->ID; ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php endwhile; ?>
        <?php 
        // Prevent weirdness
        wp_reset_postdata();
        endif;

        $place = new WP_Query( array(
          'connected_type' => 'posts_to_places',
          'connected_items' => $post->ID,
          'nopaging' => true,
        ) );

        // Display connected pages
        if ( $place->have_posts() ) : ?>
        <?php while ( $place->have_posts() ) : $place->the_post(); ?>
            <?php $item_place = $post->ID; ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php endwhile; ?>
        <?php 
        // Prevent weirdness
        wp_reset_postdata();
        endif;
        
      if (is_single()) {
        echo '<li>';
        the_title();
        echo '</li>';
      }
    } elseif (is_category()) {
      echo '<li>';
      single_cat_title();
      echo '</li>';
    } elseif (is_page()) {
      echo '<li>';
      the_title();
      echo '</li>';
    } elseif (is_tag()) {
      echo '<li>Tag: ';
      single_tag_title();
      echo '</li>';
    } elseif (is_day()) {
      echo'<li>Archive for ';
      the_time('F jS, Y');
      echo'</li>';
    } elseif (is_month()) {
      echo'<li>Archive for ';
      the_time('F, Y');
      echo'</li>';
    } elseif (is_year()) {
      echo'<li>Archive for ';
      the_time('Y');
      echo'</li>';
    } elseif (is_author()) {
      echo'<li>Author Archives';
      echo'</li>';
    } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
      echo '<li>Blog Archives';
      echo'</li>';
    } elseif (is_search()) {
      echo'<li>Search Results';
      echo'</li>';
    }
    echo '</ol>';
  }
}

function ppm_star_rating($num) {
        for ($i=0; $i < $num; $i++) { 
            $html .= '<span class="fa fa-star"></span>';
        }
    return $html;
}

function get_ratings($id) {
    $ratings = get_post_meta($id,'_ppm_rating_group',true); 
    $overall = get_post_meta($id,'_ppm_experience_rating',true); 
    $html = '<div class="row">';
        $html .= '<div class="col-md-4 text-center">';
        switch ($overall){
            case 5:
                $html .= '<p class="lead">Amazing</p>';
                break;
            case 4:
                $html .= '<p class="lead">Excellent</p>';
                break;
            case 3:
                $html .= '<p class="lead">Good</p>';
                break;
            case 2:
                $html .= '<p class="lead">Average</p>';
                break;
            case 1:
                $html .= '<p class="lead">Below Average</p>';
                break;
        }
        $html .= '<h2>'.$overall.'/5</h2>';
        $html .= '</div>';
        $html .= '<div class="col-md-8">';
            $html .= '<ul>';
                foreach ($ratings as $key => $value) {
                    $html .= '<li>'.$value['title'].'<span class="pull-right">'.ppm_star_rating($value['score']).'</span></li>';
                }
            $html .=  '</ul>';
        $html .= '</div>';
    $html .= '</div>';
    echo $html;

}

function add_query_vars($aVars) {
$aVars[] = "trips"; // represents the name of the product category as shown in the URL
$aVars[] = "places"; // represents the name of the product category as shown in the URL
$aVars[] = "type"; // represents the name of the product category as shown in the URL
$aVars[] = "cats"; // represents the name of the product category as shown in the URL
return $aVars;
}
 
// hook add_query_vars function into query_vars
add_filter('query_vars', 'add_query_vars');

function add_rewrite_rules($aRules) {

$aNewRules2 = array('trips/([^/]+)/([^/]+)/?$' => 'index.php?pagename=trips&type=$matches[1]&cats=$matches[2]');
$aNewRules3 = array('places/([^/]+)/([^/]+)/?$' => 'index.php?pagename=places&type=$matches[1]&cats=$matches[2]');

$aRules = $aNewRules2 + $aNewRules3 + $aRules;
return $aRules;
}
 
// hook add_rewrite_rules function into rewrite_rules_array
add_filter('rewrite_rules_array', 'add_rewrite_rules');

if ( ! function_exists( 'category_menu' ) ) {
    function category_menu( $menu_name ) {
        global $post;
        if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
            $count = 0;
            $count_tabs = 0;
            $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
            $menu_items = wp_get_nav_menu_items($menu->term_id);

            echo '<ul class="nav-justified text-center">';

            foreach ( (array) $menu_items as $key => $menu_item ) { 
                $term = get_term( $menu_item->object_id, $menu_item->object );
                ?>
                <li>
                    <a href="<?php echo get_term_link( $term ); ?>" title="<?php sprintf(__('View all post filed under %s', 'my_localization_domain'), $term->name);?>">
                        <span class="fa-stack fa-5x">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa <?php echo $term->description;?> fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4><?php echo $term->name; ?></h4>
                    </a>
                </li>
                <?php       
            }
            echo '</ul>';
        }
    }
}


?>