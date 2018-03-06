<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'woocommerce_options', 'sushilovers_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'sushilovers' ), __( 'Theme Options', 'sushilovers' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

/**
 * Create arrays for our select and radio options
 */
$select_options = array(
	'4'  => esc_html__( '4 Products', 'sushilovers' ),
	'8'  => esc_html__( '8 Products', 'sushilovers' ),
	'12' => esc_html__( '12 Products', 'sushilovers' ),
	'16' => esc_html__( '16 Products', 'sushilovers' ),
	'20' => esc_html__( '20 Products', 'sushilovers' ),
	'24' => esc_html__( '24 Products', 'sushilovers' ),
	'28' => esc_html__( '28 Products', 'sushilovers' )
);

/**
 * Create the options page
 */
function theme_options_do_page() {
	global $select_options, $radio_options;

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php echo "<h2>" . __( ' Theme Options', 'sushilovers' ) . "</h2>"; ?>
		
		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
			<div class="updated fade"><p><strong><?php _e( 'Options saved', 'sushilovers' ); ?></strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'woocommerce_options' ); ?>
			<?php $options = get_option( 'sushilovers_options' ); ?>

			<table class="form-table">
		
				<?php
				/**
				 * Display WooCommerce title 
				 */
				?>
				<tr valign="top">
					<th scope="row" colspan="2"><hr><?php _e( 'WooCommerce', 'sushilovers' ); ?><hr></th>
				</tr>

				<?php
				/**
				 * Display the sidebar on the WooCommerce Shop page
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Shop sidebar', 'sushilovers' ); ?></th>
					<td>
						<input id="sushilovers_options[woocommerce_shop_sidebar]" name="sushilovers_options[woocommerce_shop_sidebar]" type="checkbox" value="1" <?php checked( '1', $options['woocommerce_shop_sidebar'] ); ?> />
						<label class="description" for="sushilovers_options[woocommerce_shop_sidebar]"><?php _e( 'Display the sidebar on the WooCommerce Shop page', 'sushilovers' ); ?></label>
					</td>
				</tr>

				<?php
				/**
				 * Display the sidebar on the WooCommerce Single Product page
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Products sidebar', 'sushilovers' ); ?></th>
					<td>
						<input id="sushilovers_options[woocommerce_product_sidebar]" name="sushilovers_options[woocommerce_product_sidebar]" type="checkbox" value="1" <?php checked( '1', $options['woocommerce_product_sidebar'] ); ?> />
						<label class="description" for="sushilovers_options[woocommerce_product_sidebar]"><?php _e( 'Display the sidebar on the WooCommerce Single Product page', 'sushilovers' ); ?></label>
					</td>
				</tr>

				<?php
				/**
				 * Display the breadcrumbs on the WooCommerce pages
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Shop Breadcrumbs', 'sushilovers' ); ?></th>
					<td>
						<input id="sushilovers_options[woocommerce_breadcrumbs]" name="sushilovers_options[woocommerce_breadcrumbs]" type="checkbox" value="1" <?php checked( '1', $options['woocommerce_breadcrumbs'] ); ?> />
						<label class="description" for="sushilovers_options[woocommerce_breadcrumbs]"><?php _e( 'Display the breadcrumbs on the WooCommerce pages', 'sushilovers' ); ?></label>
					</td>
				</tr>

				<?php
				/**
				 * Select the number of products to display on the shop page
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Shop Products', 'sushilovers' ); ?></th>
					<td>
						<select name="sushilovers_options[woocommerce_shop_products]">
							<?php
								$selected = $options['woocommerce_shop_products'];
								$p = '';
								$r = '';

								foreach ( $select_options as $k => $v ) {
									$label = $v;
									if ( $selected == $k ) // Make default first in list
										$p = "\n\t<option style=\"padding-right: 10px;\" selected='selected' value='" . esc_attr( $k ) . "'>$label</option>";
									else
										$r .= "\n\t<option style=\"padding-right: 10px;\" value='" . esc_attr( $k ) . "'>$label</option>";
								}
								echo $p . $r;
							?>
						</select>
						<label class="description" for="sushilovers_options[woocommerce_shop_products]"><?php _e( 'Select the number of products to display on the shop page', 'sushilovers' ); ?></label>
					</td>
				</tr>

				<?php
				/**
				 * Display Social Media title 
				 */
				?>
				<tr valign="top">
					<th scope="row" colspan="2"><hr><?php _e( 'Social Media', 'sushilovers' ); ?><hr></th>
				</tr>

				<?php
				/**
				 * Facebook URL
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Facebook URL', 'sushilovers' ); ?></th>
					<td>
						<input id="sushilovers_options[facebook]" class="regular-text" type="text" name="sushilovers_options[facebook]" value="<?php esc_attr_e( $options['facebook'] ); ?>" />
					</td>
				</tr>

				<?php
				/**
				 * Twitter URL
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Twitter URL', 'sushilovers' ); ?></th>
					<td>
						<input id="sushilovers_options[twitter]" class="regular-text" type="text" name="sushilovers_options[twitter]" value="<?php esc_attr_e( $options['twitter'] ); ?>" />
					</td>
				</tr>

				<?php
				/**
				 * Pinterest URL
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Pinterest URL', 'sushilovers' ); ?></th>
					<td>
						<input id="sushilovers_options[pinterest]" class="regular-text" type="text" name="sushilovers_options[pinterest]" value="<?php esc_attr_e( $options['pinterest'] ); ?>" />
					</td>
				</tr>

				<?php
				/**
				 * Google Plus URL
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Google Plus URL', 'sushilovers' ); ?></th>
					<td>
						<input id="sushilovers_options[googleplus]" class="regular-text" type="text" name="sushilovers_options[googleplus]" value="<?php esc_attr_e( $options['googleplus'] ); ?>" />
					</td>
				</tr>

				<?php
				/**
				 * Instagram URL
				 */
				?>
				<tr valign="top"><th scope="row"><?php _e( 'Instagram URL', 'sushilovers' ); ?></th>
					<td>
						<input id="sushilovers_options[instagram]" class="regular-text" type="text" name="sushilovers_options[instagram]" value="<?php esc_attr_e( $options['instagram'] ); ?>" />
					</td>
				</tr>


			</table>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'sushilovers' ); ?>" />
			</p>
		</form>
	</div>
	
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function theme_options_validate( $input ) {
	global $select_options;

	// Save shop sidebar option
	if ( !isset($input['woocommerce_shop_sidebar']) ) {
		$input['woocommerce_shop_sidebar'] = 0;
	} else {
		$input['woocommerce_shop_sidebar'] = 1;
	}

	// Save products sidebar option
	if ( !isset($input['woocommerce_product_sidebar']) ) {
		$input['woocommerce_product_sidebar'] = 0;
	} else {
		$input['woocommerce_product_sidebar'] = 1;
	}

	// Save shop breadcrumb option
	if ( !isset( $input['woocommerce_breadcrumbs'] ) ) {
		$input['woocommerce_breadcrumbs'] = 0;
	} else {
		$input['woocommerce_breadcrumbs'] = 1;
	}

	// Save amount of visible products
	if ( !array_key_exists( $input['woocommerce_shop_products'], $select_options ) )
		$input['woocommerce_shop_products'] = 4;

	// Save Facebook URL
	$input['facebook'] = wp_filter_nohtml_kses( $input['facebook'] );

	return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/