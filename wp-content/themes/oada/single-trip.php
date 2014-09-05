<?php
global $post;
?>

<?php get_header(); ?>
<?php $temp = $post->ID; ?>
<?php $default = array('class'=>'img-responsive');?>
<div class="header-hero">
	<?php $default = array('class'=>'img-responsive');?>
	<?php $image_header = get_post_meta($post->ID,'_ppm_header_image_id',true); ?>
	<?php if (!empty($image_header)) : ?>
		 <?php echo wp_get_attachment_image( $image_header , 'slide-image','',$default ); ?>
	<?php elseif (has_post_thumbnail()) : ?>
		<?php the_post_thumbnail('slide-image',$default);?>
	<?php else: ?>
		<img class="img-responsive" src="http://placehold.it/1600x650&text=.">
	<?php endif; ?>
	<div class="container">
	  	<div class="post-info">
	  		<div class="circle-text">
	  			<div>
			        <h1 class="trip-title"><?php the_title();?></h1>
			        <div class="trip-rating">
			        	<?php $rating = get_post_meta($post->ID,'_ppm_trip_rating',true); ?>
						<?php echo ppm_star_rating($rating); ?>
					</div>
					<div class="trip-summary">
			        	<p><?php _e(get_post_meta($post->ID,'_ppm_trip_date',true));?></p>
			        </div>
			        <div class="trip-entry">
			        	<?php echo wpautop(get_post_meta($post->ID,'_ppm_trip_summary',true));?>
			        </div>
      			</div>
      		</div>
      	</div>
     </div>
</div>

<section id="places" class="bg-light">
	<div class="container">
		<h3 class="title">Places we visited</h3>
	    <?php
	    // Find connected pages
	    $connected = new WP_Query( array(
	      'connected_type' => 'places_to_trips',
	      'connected_items' => get_queried_object(),
	      'nopaging' => true,
	    ) );

	    // Display connected pages
	    if ( $connected->have_posts() ) : $count =0;?>
		    <div class="row">
		    	<div class="col-md-6">
		    		<div class="places other-places">
			    		<div class="row">
						    <?php while ( $connected->have_posts() ) : $connected->the_post(); $count++; ?>
						    	<?php $location = get_post_meta($post->ID,'_ppm_place_location',true); ?>
						    	<?php $map_location .= '["'.get_the_title().'", '.$location['latitude'].', '.$location['longitude'].', '.$count.',"'.get_permalink().'"],'; ?>
						    	<div class="place col-sm-6">
					    		<a href="<?php the_permalink();?>">
							        <?php the_post_thumbnail('large',$default); ?>
							        <div class="place-info">
							        	<h4><?php the_title();?></h4>
							        	<div class="inner-info">
							        		<span class="date"><p><?php _e(get_post_meta($post->ID,'_ppm_place_date',true));?></p></span>
							        	</div>
							        </div>
							        
							    </a>
					        </div>
						    <?php if ($count % 2 == 0) echo '<div class="clearfix"></div>';?>
						    <?php endwhile; ?>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div id="map-canvas" class="map"></div>
				</div>
			</div>
		    <?php 
		    // Prevent weirdness
		    wp_reset_postdata();
	    endif;
	    ?>
	</div>
</section>

<section id="content">
	<div class="container">
		<h3 class="title">Itinerary</h3>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	           
	      <div class="entry clearfix" itemprop="articleBody">
	        <?php the_content(); ?>
	    
	      </div> <!-- end article section -->
	              
	    <?php endwhile; ?>    
	    <?php wp_reset_query(); ?>
	    <?php endif; ?>
    </div>

</section>



<section id="experiences" class="bg-orange">
	<div class="container">
		<h2 class="title">What we experienced</h2>
		<?php $terms = get_the_category($temp);

		 	if ( !empty( $terms ) && !is_wp_error( $terms ) ){
			echo '<ul class="nav-justified text-center">';
			foreach ( $terms as $term ) { ?>
				<li>
					<?php $page = get_page_by_title('Trips'); ?>
					<?php $http_link = get_permalink($page->ID).$post->post_name.'/'.$term->slug.'/'; ?>
					<a href="<?php _e($http_link,'ppm');?>" title="<?php sprintf(__('View all post filed under %s', 'my_localization_domain'), $term->name);?>">
			   			<span class="fa-stack fa-3x">
                            <i class="fa fa-circle svg-stack-2x"></i>
                            <svg class="category-icon <?php echo $term->description;?> svg-stack-1x fa-inverse">
                               <use xlink:href="#<?php echo $term->description;?>"></use>
                            </svg>
                        </span>
						<h4><?php echo $term->name; ?></h4>
					</a>
	  			</li>
			<?php }
				echo '</ul>';
			}
		?>
	</div>
</section>
<?php
$gallery_connected = new WP_Query( array(
	      'connected_type' => 'gallery_to_trips',
	      'connected_items' => get_queried_object(),
	      'nopaging' => true,
	    ) );?>
<section id="gallery" class="bg-dark">
	<div class="container">
		<h2 class="title">Image Gallery</h2>
		<div class="gallery">
			<div class="row">
		    	<div class="gallery-image col-md-12">
		    		<div id="owl-example" class="owl-carousel">

					  	<?php while ( $gallery_connected->have_posts() ) : $gallery_connected->the_post(); $count++;
					  			
					  			$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
								$args = array(
								    'order'          => 'ASC',
								    'post_type'      => 'attachment',
								    'post_parent'    => $post->ID,
								    'post_mime_type' => 'image',
								    'numberposts'    => -1,
								    'orderby' => 'menu_order',
								    //'exclude'=>$post_thumbnail_id
								);

								$attachments = get_posts($args); 

								foreach ($attachments as $attachment) { $count++;
									$image_attributes = wp_get_attachment_image_src( $attachment->ID,'thumbnail');
									$image_attributes_1 = wp_get_attachment_image_src( $attachment->ID,'full');
									$image_array[] = array('full'=>$image_attributes_1,'thumbnail'=>$image_attributes);
								}


								foreach ($image_array as $key => $image) { ?>
								<?php echo print_r(); ?>
									<div data-thumbnail-prev="<?php echo $image_array[$key-1]['thumbnail'][0];?>" data-thumbnail-next="<?php echo $image_array[$key+1]['thumbnail'][0];?>" class="item">
						        		<img class="lazyOwl" data-src="<?php echo $image['full'][0];?>" class="img-responsive"/>
				    				</div>
								<?php } ?>

					    <?php endwhile; ?>
					    
			    	</div>
			    	<div class="gallery-content">
			        	<h3 class="gallery-title"><a href="#"><?php the_title(); ?></a></h2>
			    		<?php the_excerpt();?>
			    		<a href="#" class="view-more">Open Gallery <span class="fa fa-angle-right"></span></a>
			        </div>
			    	
		        </div>
		        
		    </div>
		</div>
	</div>
</section>


<script type="text/javascript">
    var locations = [<?php echo substr($map_location,0,-1);?>];

    var map = new google.maps.Map(document.getElementById('map-canvas'), {
      zoom: 7,
      scrollwheel: false,
      center: new google.maps.LatLng(locations[0][1], locations[0][2]),
      mapTypeId: google.maps.MapTypeId.ROADMAP,
	  styles: [{"featureType":"water","stylers":[{"color":"#46bcec"},{"visibility":"on"}]},{"featureType":"landscape","stylers":[{"color":"#f2f2f2"}]},{"featureType":"road","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"transit","stylers":[{"visibility":"off"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]}]
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;
    var markers = new Array();
    var image = "<?php echo get_stylesheet_directory_uri();?>/library/images/map-icon.png";
    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
        icon: image,
      });

      markers.push(marker);

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent('<a class="item-'+locations[i][3]+'" href="'+locations[i][4]+'">'+locations[i][0]+'</a>');
          infowindow.open(map, marker);
        }
      })(marker, i));
 
      var route = [
          new google.maps.LatLng(locations[i][1], locations[i][2]),
          new google.maps.LatLng(locations[i+1][1], locations[i+1][2])
        ];

        var polyline = new google.maps.Polyline({
            path: route,
            strokeColor: "#83b7e6",
            strokeOpacity: 0.9,
            strokeWeight: 5
        });

        polyline.setMap(map);
    }


</script> 

<?php get_footer(); ?>
