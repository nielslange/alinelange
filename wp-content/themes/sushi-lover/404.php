<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @author Niels Lange
 * @package WordPress
 * @subpackage Sushi Lovers
 * @since Sushi Lovers 1.0
 */

get_header(); ?>

	<div id="error404" class="content-area service-page">
		<div class="container">

			<div id="primary" class="content-area">
				<div id="content" class="site-content" role="main">
		
					<div class="row">

						<div class="col-sm-4 col-sm-offset-4">

							<header class="page-header">
								<h1 class="page-title"><?php _e( 'OOPS ...', 'sushilovers' ); ?></h1>
							</header>
				
							<div class="page-wrapper">
								<div class="page-content">
									<p><?php _e( 'Tut mir leid, aber das was Du gesucht hast, gibt\'s hier nicht. Wie wär\'s damit?', 'sushilovers' ); ?></p>
									<?php get_search_form(); ?>
								</div><!-- .page-content -->
							</div><!-- .page-wrapper -->

						</div>

					</div>
		
				</div><!-- #content -->
			</div><!-- #primary -->
		
		</div>
	</div>

<?php
//get_sidebar();
get_footer();
