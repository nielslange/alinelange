<?php
/**
 * Template to display the landing page
 *
 * Template Name: Landing Page
 *
 * @author Niels Lange
 * @package WordPress
 * @subpackage Sushi Lovers
 * @since Sushi Lovers 1.0
 */

//* Add custom CSS to hide unwanted elements 
add_action( 'wp_enqueue_scripts', 'nl_landing_page_scripts' );
function nl_landing_page_scripts() {
	wp_enqueue_style( 'landing-page-style', get_template_directory_uri() . '/css/landing-page.css' );
}

get_header(); ?>

	<div id="index" class="content-area">
		<div class="container">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</div>
	</div>

<?php
get_footer();