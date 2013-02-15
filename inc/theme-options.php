<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'harbour_city_options', 'harbour_city_theme_options', 'harbour_city_theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page( __( 'Theme Options', 'harbour-city' ), __( 'Theme Options', 'harbour-city' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

/**
 * Create the options page
 */
function theme_options_do_page() {

	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options', 'harbour-city' ) . "</h2>"; ?>

        <?php settings_errors(); ?>

		<form method="post" action="options.php">
			<?php settings_fields( 'harbour_city_options' ); ?>
			<?php $options = get_option( 'harbour_city_theme_options' ); ?>

			<table class="form-table">
                <?php
                /**
                 * Social network URL input options
                 */
                ?>

                <tr valign="top">
                    <th scope="row" rowspan="2"><?php _e( 'Social media URLs', 'harbour-city' ); ?></th>
                    <td>
                        <input id="harbour_city_theme_options[facebook_url]" class="regular-text" type="text" name="harbour_city_theme_options[facebook_url]" value="<?php esc_attr_e( $options['facebook_url'] ); ?>" />
                        <label class="description" for="harbour_city_theme_options[facebook_url]"><?php _e( 'Facebook URL', 'harbour-city' ); ?></label>
                    </td>
                </tr>
                <tr valign="top">
                    <td>
                        <input id="harbour_city_theme_options[twitter_url]" class="regular-text" type="text" name="harbour_city_theme_options[twitter_url]" value="<?php esc_attr_e( $options['twitter_url'] ); ?>" />
                        <label class="description" for="harbour_city_theme_options[twitter_url]"><?php _e( 'Twitter URL', 'harbour-city' ); ?></label>
                    </td>
                </tr>

			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'harbour-city' ); ?>" />
			</p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function harbour_city_theme_options_validate( $input ) {

    $output = $input;

	// Say our textarea option must be safe text with the allowed tags for posts
    $output['facebook_url'] = esc_url_raw( $input['facebook_url'] );
    $output['twitter_url'] = esc_url_raw( $input['twitter_url'] );

    // Return the array processing any additional functions filtered by this action  
    return apply_filters( 'harbour_city_theme_options_validate', $output, $input );
}


// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/