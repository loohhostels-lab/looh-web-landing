<?php
function blogger_mag_customize_option( $wp_customize ) {

    /*theme option panel info*/
	require get_template_directory().'/inc/customizer/customize-options.php';
    
}
add_action('customize_register','blogger_mag_customize_option');