<div id="sidebar" class="col-md-4">
  	<?php global $post; ?>
  	<?php global $item_place; ?>

  	<div class="widget trip-widget">
  	<?php
  	$id=$post->ID;
  	$location = get_post_meta($id,'_ppm_experience_location',true);
    $trip = new WP_Query( array(
          'connected_type' => 'posts_to_trips',
          'connected_items' => $post->ID,
          'nopaging' => true,
        ) );

        // Display connected pages
        if ($trip->have_posts() ) : ?>
        <div class="bg-warning">
	        <?php while ( $trip->have_posts() ) : $trip->the_post(); ?>
	            <?php $item_trip = $post->ID; ?>

	            <div id="trip-map-canvas" class="map"></div>
	           
				<div class="trip-info text-center">
					<?php $rating = get_post_meta($post->ID,'_ppm_trip_rating',true); ?>
					<?php echo ppm_star_rating($rating); ?>
					<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
	            	<p><?php _e(get_post_meta($post->ID,'_ppm_trip_date',true));?></p>
					<div class="tags">
						<?php the_tags( '<span class="tags-title">' . __( 'Tags: ', 'bonestheme' ) . '</span> ', ' / ', '' ); ?>
					</div>
				</div>

	           
	        <?php endwhile; ?>
        </div>
        <?php 
        // Prevent weirdness
        wp_reset_postdata();
        endif;
    ?>
    </div>
    <div class="widget experience-widget">
	    <?php
	    $experiences = new WP_Query( array(
	    		'post__not_in'=>array($post->ID),
	          	'connected_type' => 'posts_to_places',
	          	'connected_items' => $item_place,
	          	'nopaging' => true,
	        ) );
	    	$default = array('class'=>'img-responsive'); 
	        // Display connected pages
	        if ($experiences->have_posts() ) : $count = 0; ?>
		        <div class="related-experiences">
		        	<h3 class="title">Other Experiences Nearby</h3>
		        	<div class="related-experience-content">
		        		<div class="row">
							<?php while ( $experiences->have_posts() ) : $experiences->the_post();$count++; ?>
								<?php $item_trip = $post->ID; ?>
								<div class="col-xs-12 col-sm-6">
									<a href="<?php the_permalink();?>">
										<div class="img-container">
											<?php the_post_thumbnail('large',$default); ?>
											<div class="title-container">
												<h4><?php the_title(); ?></h4>
											</div>
										</div>
									</a>
								</div>
								<?php if ($count % 2 == 0) echo '<div class="clearfix"></div>'; ?>
							<?php endwhile; ?>
						</div>
			        </div>
		        </div>
		        <?php 
		        // Prevent weirdness
		        wp_reset_postdata();
	        endif;
	    ?>
    </div>

  <?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

    <?php dynamic_sidebar( 'sidebar1' ); ?>

  <?php else : ?>

    <!-- This content shows up if there are no widgets defined in the backend. -->

    <div class="alert alert-danger">
      <p><?php _e( 'Please activate some Widgets.', 'bonestheme' );  ?></p>
    </div>

  <?php endif; ?>

</div>

 <script type="text/javascript">
  function initialize() {
  	
  	var myLatlng = new google.maps.LatLng(<?php echo $location['latitude']; ?>, <?php echo $location['longitude']; ?>);
   	var myOptions = {
	    zoom: 5,
	    scrollwheel: false,
	    center: myLatlng,
	    mapTypeId: google.maps.MapTypeId.ROADMAP,
	    styles:[{"featureType":"water","stylers":[{"color":"#46bcec"},{"visibility":"on"}]},{"featureType":"landscape","stylers":[{"color":"#f2f2f2"}]},{"featureType":"road","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"transit","stylers":[{"visibility":"off"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]}]
	};
	 

    var map = new google.maps.Map(document.getElementById("trip-map-canvas"),
        myOptions);
    var image = "<?php echo get_stylesheet_directory_uri();?>/library/images/map-icon.png";
    var marker = new google.maps.Marker({
		position: myLatlng,
		title: "<?php echo get_the_title($item_trip); ?>",
		map: map,
		icon: image,
  	});
  }
  google.maps.event.addDomListener(window, 'load', initialize);
</script>