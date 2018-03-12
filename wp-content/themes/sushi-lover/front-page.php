<?php 
/**
 * Template to display the homepage
 *
 * @author Niels Lange
 * @package WordPress
 * @subpackage Sushi Lovers
 * @since Sushi Lovers 1.0
 */
?>

<?php get_header(); ?>

<?php get_template_part('template-parts/home', 'hero'); ?>
<?php get_template_part('template-parts/home', 'intro'); ?>
<?php get_template_part('template-parts/home', 'blog'); ?>
<?php get_template_part('template-parts/home', 'facts'); ?>

<?php get_footer(); ?>