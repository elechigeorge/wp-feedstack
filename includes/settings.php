<?php

// Import stuff
include plugin_dir_path(__FILE__) . 'dashboard_page.php';
include plugin_dir_path(__FILE__) . 'dashboard_setting.php';
include plugin_dir_path(__FILE__) . 'dashboard_template.php';
include plugin_dir_path(__FILE__) . 'dashboard_contact.php';

add_action( 'admin_menu', 'feedstack_plugin_register_settings' );
add_action( 'admin_menu', 'feedstack_plugin_register_submenu_pages' );

function feedstack_plugin_register_settings() {
    // Add a new top-level menu item to the WordPress admin dashboard
    add_menu_page(
        __( 'Settings', 'settings' ), // Page title
        __( 'FeedStack', 'settings' ), // Menu title
        'manage_options', // Capability required to access this menu
        'feedstack_feedback', // Menu slug
        'feedstack_plugin_settings_page', // Callback function to render the settings page
        'dashicons-align-wide' // Icon URL or dashicon class
    );

    // Register settings and fields for the main option page
    add_action( 'admin_init', 'feedstack_plugin_settings_init' );
}

function feedstack_plugin_settings_init() {
    // Register the main option page settings
    register_setting( 'feedstack_options', 'contact_plugin_show_content', array(
        'type' => 'boolean',
        'default' => true,
    ) );

    register_setting( 'feedstack_options', 'contact_plugin_recepients_email', array(
        'type' => 'string',
        'default' => '',
    ) );

    register_setting( 'general', 'feedstack_feedback_brand_color', array(
        'type' => 'string',
        'default' => '',
    ) );

    register_setting( 'general', 'feedstack_feedback_button_position', array(
        'type' => 'string',
        'default' => '',
    ) );

    register_setting( 'general', 'feedstack_feedback_form_position', array(
        'type' => 'string',
        'default' => '',
    ) );

    register_setting( 'general', 'feedstack_feedback_enabled', array(
        'type' => 'string',
        'default' => '',
    ) );
}






function feedstack_plugin_settings_page_result_analytics() {
    ?>
    <div class="wrap">
        <h1><?php _e( 'About', 'settings' ); ?></h1>
        <!-- Add form fields for the result and analytics settings here -->
    </div>
    <?php
}

function feedstack_plugin_register_submenu_pages() {

    add_submenu_page(
        'feedstack_feedback', // Parent menu slug
        __( 'Submissions', 'settings' ), // Page title
        __( 'Submissions', 'settings' ), // Menu title
        'manage_options', // Capability required to access this menu
        'feedstack_feedback', // Menu slug (same as parent menu slug to replace the default submenu)
        'feedstack_plugin_settings_page' // Callback function to render the submenu page
    );

    add_submenu_page(
        'feedstack_feedback', // Parent menu slug
        __( 'Contact', 'settings' ), // Page title
        __( 'Contact', 'settings' ), // Menu title
        'manage_options', // Capability required to access this menu
        'feedstack_contact_view', // Menu slug (same as parent menu slug to replace the default submenu)
        'feedstack_plugin_contact_page' // Callback function to render the submenu page
    );


    add_submenu_page(
        'feedstack_feedback', // Parent menu slug
        __( 'Template', 'settings' ), // Page title
        __( 'Templates', 'settings' ), // Menu title
        'manage_options', // Capability required to access this menu
        'feedstack_templates_view', // Menu slug
        'feedstack_plugin_template_page' // Callback function to render the submenu page
    );

    // Add the submenu page for "Create/Edit Forms" under the main "Feedstack" page
    add_submenu_page(
        'feedstack_feedback', // Parent menu slug
        __( 'Settings', 'settings' ), // Page title
        __( 'Settings', 'settings' ), // Menu title
        'manage_options', // Capability required to access this menu
        'feedstack_settings_view', // Menu slug
        'feedstack_plugin_settings_page_form' // Callback function to render the submenu page
    );

    // Add the submenu page for "Result/Analytics" under the main "Feedstack" page
    add_submenu_page(
        'feedstack_feedback', // Parent menu slug
        __( 'About Feedstack', 'settings' ), // Page title
        __( 'About Feedstack', 'settings' ), // Menu title
        'manage_options', // Capability required to access this menu
        'feedstack_settings_result_analytics', // Menu slug
        'feedstack_plugin_settings_page_result_analytics' // Callback function to render the submenu page
    );
}






