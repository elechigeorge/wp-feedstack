<?php
/*
Plugin Name: Feedstack Feedback
Description: Collect feedback from website users using Feedstack API.
Version: 1.0
Author: Your Name
*/

// Include the settings file
include plugin_dir_path( __FILE__ ) . 'includes/settings.php';
include plugin_dir_path( __FILE__ ) . 'functions.php';

// Enqueue required styles and scripts

function feedstack_enqueue_scripts() {
    // Check if the feedback form is enabled before enqueuing scripts and styles
    if ( get_option( 'feedstack_feedback_enabled' ) ) {

        // Enqueue Bootstrap JavaScript and jQuery
        wp_enqueue_script( 'jquery' );

        wp_enqueue_style( 'feedstack-styles', plugin_dir_url( __FILE__ ) . 'assets/css/styles.css' );

        wp_enqueue_script( 'feedstack-scripts', plugin_dir_url( __FILE__ ) . 'assets/javascript/scripts.js', array( 'jquery' ), '1.0', true );

        wp_enqueue_style( 'bootstrap', plugin_dir_url( __FILE__ ) . 'assets/css/bootstrap.min.css' );

        wp_enqueue_script( 'bootstrap', plugin_dir_url( __FILE__ ) . 'assets/javascript/bootstrap.min.js', array( 'jquery' ), null, true );

    }
}

function feedstack_admin_enqueue_scripts() {
    wp_enqueue_script( 'jquery' );

    wp_enqueue_script(
        'feedback-submissions',
        plugin_dir_url( __FILE__ ) . '/assets/javascript/admin.script.js',
        array( 'jquery' ),
        '1.0',
        true
    );

    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css' );

    wp_enqueue_style( 'bootstrap-admin', plugin_dir_url( __FILE__ ) . 'assets/css/bootstrap.min.css' );

    wp_enqueue_style( 'feedstack-admin-styles', plugin_dir_url( __FILE__ ) . 'assets/css/admin.css' );

    wp_enqueue_script( 'admin-bootstrap', plugin_dir_url( __FILE__ ) . 'assets/javascript/bootstrap.min.js', array( 'jquery' ), null, true );

    wp_enqueue_script( 'popper-script', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' );

}

add_action( 'admin_enqueue_scripts', 'feedstack_admin_enqueue_scripts' );

add_action( 'wp_enqueue_scripts', 'feedstack_enqueue_scripts' );

// Function to create the feedback form HTML

function feedstack_feedback_form_html() {
    ob_start();
    include plugin_dir_path( __FILE__ ) . 'templates/feedback_form.html';
    return ob_get_clean();
}

function feedstack_render_feedback_form() {
    // Check if the feedback form is enabled
    if ( get_option( 'feedstack_feedback_enabled', '0' ) ) {
        $feedback_form_html = feedstack_feedback_form_html();
        echo $feedback_form_html;
    }
}
add_filter( 'wp_footer', 'feedstack_render_feedback_form' );

