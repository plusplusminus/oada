<?php
/*
Template Name: Photography
*/
?>

<?php get_header(); ?>


	<?php get_template_part('templates/photography/photo','slider'); ?>

	<?php get_template_part('templates/photography/photo','gallery'); ?>

	<?php get_template_part('templates/photography/photo','connect'); ?>

	<?php get_template_part('templates/photography/photo','friday' ); ?>

	<?php get_template_part('templates/photography/photo','upcoming'); ?>
	

	<?php //get_template_part('home','articles' ); ?>

	<?php //get_template_part('home','upcoming' ); ?>

<?php get_footer(); ?>
