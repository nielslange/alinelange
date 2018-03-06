<?php 
/**
 * Template to display the homepage
 * 
 * @package Sushi Lovers
 * @since Sushi Lovers 1.0
 */
?>

<?php get_header(); ?>

<?php get_template_part('template-parts/home', 'hero'); ?>
<?php get_template_part('template-parts/home', 'aline'); ?>
<?php get_template_part('template-parts/home', 'infos'); ?>
<?php get_template_part('template-parts/home', 'quotes'); ?>
<?php get_template_part('template-parts/home', 'portfolio'); ?>
<?php get_template_part('template-parts/home', 'workshops'); ?>
<?php get_template_part('template-parts/home', 'shop'); ?>
<?php get_template_part('template-parts/home', 'blog'); ?>
<?php get_template_part('template-parts/home', 'contact'); ?>

<?php get_footer(); ?>