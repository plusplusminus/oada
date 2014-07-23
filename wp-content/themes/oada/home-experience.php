<section id="experiences" class="bg-orange home-experience">
	<div class="container">
		<h2 class="title">What we've experienced</h2>
		<?php 
		$args = array('number'=>6);
		$terms = get_terms("category",$args);
		if ( !empty( $terms ) && !is_wp_error( $terms ) ){
			echo '<ul class="nav-justified text-center">';
		foreach ( $terms as $term ) { ?>
			<li>
				<a href="<?php echo get_term_link( $term ); ?>" title="<?php sprintf(__('View all post filed under %s', 'my_localization_domain'), $term->name);?>">
		   			<span class="fa-stack fa-5x">
						<i class="fa fa-circle fa-stack-2x"></i>
						<i class="fa <?php echo $term->description;?> fa-stack-1x fa-inverse"></i>
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