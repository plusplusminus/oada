<?php global $brew_options; ?>	
	<div class="footer-newsletter">
		<a data-toggle="modal" data-target="#newsletterModal" href="#">Sign up for the newsletter <i class="fa fa-angle-right"></i></a>
	</div>
	<footer id="footer" class="clearfix">
		<div class="container">
		  <div class="row">
			<div class="col-md-8 copyright">
			  <p>&copy; <?php echo date('Y'); ?> Copyright <?php bloginfo( 'name' ); ?>. Created by the friendly people at <a href="http://www.plusplusminus.co.za/?utm_source=OADA&amp;utm_medium=Footer&amp;utm_campaign=Credit" title="PlusPlusMinus Design &amp; Development" target="_blank">PlusPlusMinus</a></p>
			</div>
			<div class="col-md-4 text-right back-to">
				<h4><a href="#" class="scrollToTop">Top <svg class="shape-backtotop"><use xlink:href="#shape-backtotop"></use></svg></a></h4>
			</div>
		  </div> <!-- end .row -->
		</div>
	</footer> <!-- end footer -->
	<!-- Button trigger modal -->
	<!-- Modal -->
	<!-- Button trigger modal -->
	<div class="modal fade" id="newsletterModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">

	      	<div class="circle-text">
	      		<div class="circle-inner">
	      			<span class="fa fa-envelope fa-2x"></span><br>
	    			<h3 class="modal-title">Sign Up For Our Newsletter</h3>
	      			<?php gravity_form(2, false, false, false, '', true, 12); ?>
	      		</div>
	      	</div>
	    </div>
	  </div>
	</div>
	<!-- all js scripts are loaded in library/bones.php -->
	<?php wp_footer(); ?>
	<!-- Hello? Doctor? Name? Continue? Yesterday? Tomorrow?  -->

  </body>

</html> <!-- end page. what a ride! -->