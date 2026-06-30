<?php

include_once ABSPATH . 'wp-admin/includes/plugin.php';

if ( class_exists('ANSAR_ELEMENTS') ) {

    $demo_import = 'class="button button-primary" href="' . admin_url( 'admin.php?page=ansar_elements_admin_menu&tab=starter-sites' ) . '"';
    
} else {
    $demo_import = 'class="button button-primary blogger-mag-btn-get-started" href="#"';
}

$wp_customize->add_section('theme_info_section',
    array(
        /* translators: %s: Theme name */
        'title' => sprintf( esc_html__( 'Thank you for installing %s !', 'blogger-mag' ), 'Blogger Mag' ),
        'priority' => 1,
        'capability' => 'edit_theme_options',
    )
);

$wp_customize->add_section('theme_option_panel',
    array(
        'title' => esc_html__('Documentation & Demo', 'blogger-mag'),
        'priority' => 1,
        'capability' => 'edit_theme_options',
    )
);

$wp_customize->add_setting(
    'blogger_mag_docs_n_demos',
    array(
        'sanitize_callback' => 'wp_kses_post',
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'blogger_mag_docs_n_demos',
        array(
            'section'     => 'theme_option_panel',
            'type'        => 'hidden',
            'description' => '
                <p>You can use this theme to create a website like these
                    <a href="https://themeansar.com/ansar-elements/starter-sites/" target="_blank">
                        demos
                    </a>..
                </p>
                <p>
                    For step-by-step videos and text tutorials, see 
                    <a href="https://docs.themeansar.com/docs/ansar-elements/" target="_blank">
                        documentation
                    </a>.
                </p>
            ',
        )
    )
);

$wp_customize->add_section('theme_one_click_demo_section',
    array(
        'title' => esc_html__('One Click Demo Import', 'blogger-mag'),
        'priority' => 1,
        'capability' => 'edit_theme_options',
    )
);

$wp_customize->add_setting(
    'theme_one_click_demo',
    array(
        'sanitize_callback' => 'wp_kses_post',
    )
);

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'theme_one_click_demo',
        array(
            'section'     => 'theme_one_click_demo_section',
            'type'        => 'hidden',
            'description' => '
                <div class="theme-demo-import-box">
                    <p>
                        You can import the demo content with just one click.
                        For step-by-step tutorial, see
                        <a href="https://docs.themeansar.com/docs/ansar-elements/demo-importation/" target="_blank">
                            documentation
                        </a>.
                    </p>
                    <p>
                        <a '. $demo_import.'>
                            Import Demo Data
                        </a>
                    </p>
                </div>
            ',
        )
    )
);