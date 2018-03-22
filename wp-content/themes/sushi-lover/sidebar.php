<?php if ( is_active_sidebar( 'sidebar-main' ) ) : ?>
	<div id="sidebar-main" class="sidebar-main widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-main' ); ?>
	</div><!-- #sidebar-main -->
<?php endif; ?>

<?php if ( is_page_template('template-parts/page-infos.php') && is_active_sidebar( 'sidebar-infos' ) ) : ?>
    <div id="sidebar-blog" class="sidebar-infos widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-infos' ); ?>
    </div><!-- #sidebar-blog -->
<?php endif; ?>

<?php if ( is_blog() && is_active_sidebar( 'sidebar-blog' ) ) : ?>
    <div id="sidebar-blog" class="sidebar-blog widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-blog' ); ?>
    </div><!-- #sidebar-blog -->
<?php endif; ?>

<?php if ( is_single() && !is_product() && is_active_sidebar( 'sidebar-single' ) ) : ?>
	<div id="sidebar-single" class="sidebar-single widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-single' ); ?>
	</div><!-- #sidebar-single -->
<?php endif; ?>

<?php if ( is_page() && is_active_sidebar( 'sidebar-page' ) ) : ?>
	<div id="sidebar-page" class="sidebar-page widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-page' ); ?>
	</div><!-- #sidebar-page -->
<?php endif; ?>

<?php if ( ( is_shop() || is_product_category() || is_product() ) && is_active_sidebar( 'woocommerce-sidebar' ) ) : ?>
    <div id="woocommerce-sidebar" class="woocommerce-sidebar widget-area" role="complementary">
        <?php dynamic_sidebar( 'woocommerce-sidebar' ); ?>
    </div><!-- #woocommerce-sidebar -->
<?php endif; ?>