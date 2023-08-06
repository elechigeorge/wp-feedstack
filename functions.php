<?php

function feedback_form_settings_init() {
    add_settings_section(
        'feedback_form_section',
        '',
        'feedback_form_section_callback',
        'general'
    );

    add_settings_field(
        'feedstack_feedback_enabled',
        'Enable Feedback Form',
        'feedstack_feedback_enabled_callback',
        'general',
        'feedback_form_section'
    );

    add_settings_field(
        'feedstack_feedback_brand_color',
        'Brand Color',
        'feedstack_feedback_brand_color_callback',
        'general',
        'feedback_form_section'
    );

    add_settings_field(
        'feedstack_feedback_button_position',
        'Feedback Button Position',
        'feedstack_feedback_widget_button_position_callback',
        'general',
        'feedback_form_section'
    );

    add_settings_field(
        'feedstack_feedback_form_position',
        'Feedback Form Position',
        'feedstack_feedback_widget_form_position_callback',
        'general',
        'feedback_form_section'
    );

}

add_action( 'admin_init', 'feedback_form_settings_init' );

function feedback_form_section_callback() {

}

function feedstack_feedback_enabled_callback() {
    $enabled = get_option( 'feedstack_feedback_enabled' );
    ?>

    <input type = 'checkbox' class = 'font-monospace' role = 'switch' name = 'feedstack_feedback_enabled' value = '1' <?php checked( '1', $enabled );
    ?> />
    <label class = 'font-monospace'><?php echo ( $enabled === '1' ) ? 'Enabled' : 'Disabled';
    ?></label>

    <?php

}

function feedstack_feedback_brand_color_callback() {
    $brand_color = get_option( 'feedstack_feedback_brand_color', '#ff0000' );

    echo '<input type="color" name="feedstack_feedback_brand_color" value="' . esc_attr( $brand_color ) . '" id="cp1" class="color-picker" />';
    
}

function feedstack_feedback_widget_button_position_callback() {
    $button_position = get_option('feedstack_feedback_button_position', 'right-middle');

    $positions = array(
        'right-middle' => 'Right Middle',
        'left-middle' => 'Left Middle',
        'right-bottom' => 'Right Bottom',
        'left-bottom' => 'Left Bottom',
    );

    echo '<select name="feedstack_feedback_button_position">';
    
    foreach ($positions as $value => $label) {
        echo '<option value="' . esc_attr($value) . '" ' . selected($value, $button_position, false) . '>' . esc_html($label) . '</option>';
    }

    echo '</select>';
}


function feedstack_feedback_widget_form_position_callback() {
    $button_position = get_option('feedstack_feedback_form_position', 'right-middle');

    $positions = array(
        'right-middle' => 'Right Middle',
        'left-middle' => 'Left Middle',
        'right-bottom' => 'Right Bottom',
        'left-bottom' => 'Left Bottom',
    );

    echo '<select name="feedstack_feedback_form_position">';
    
    foreach ($positions as $value => $label) {
        echo '<option value="' . esc_attr($value) . '" ' . selected($value, $button_position, false) . '>' . esc_html($label) . '</option>';
    }

    echo '</select>';
}