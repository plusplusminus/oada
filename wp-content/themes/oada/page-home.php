<?php
/*
Template Name: Home Page Template
*/
?>

<?php get_header(); ?>


	<?php get_template_part('home','slider'); ?>

	<?php get_template_part('home','places'); ?>

	<?php get_template_part('home','connect'); ?>

	<?php get_template_part('home','experience' ); ?>

	<?php get_template_part('home','articles' ); ?>

	<?php get_template_part('home','upcoming' ); ?>

<?php get_footer(); ?>
