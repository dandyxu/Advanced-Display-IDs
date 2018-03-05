<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://dandyxu.me
 * @since      1.0.0
 *
 * @package    Advanced_Display_Id
 * @subpackage Advanced_Display_Id/admin/partials
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) die;
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
    <h2>Welcome to Display Advanced IDs Options Page <?php _e(' Options ', $this->plugin_name); ?></h2>
    <form method="post" name="cleanup_options" action="options.php">
    <?php
        //Grab all options
        $options = get_option($this->plugin_name);
        $example_select = ( isset( $options['example_checkbox'] ) && ! empty( $options['example_checkbox'] ) ) ? esc_attr( $options['example_checkbox'] ) : '1';
        $example_text = ( isset( $options['example_text'] ) && ! empty( $options['example_text'] ) ) ? esc_attr( $options['example_text'] ) : 'default';
        $example_radio = ( isset( $options['example_radio'] ) && ! empty( $options['example_radio'] ) ) ? 1 : 0;
        settings_fields($this->plugin_name);
        do_settings_sections($this->plugin_name);
        // Sources: - http://searchengineland.com/tested-googlebot-crawls-javascript-heres-learned-220157
        //          - http://dinbror.dk/blog/lazy-load-images-seo-problem/
        //          - https://webmasters.googleblog.com/2015/10/deprecating-our-ajax-crawling-scheme.html
    ?>

    <!-- Select -->
    <!-- <fieldset>
        <p><?php //_e( 'Example Select.', $this->plugin_name ); ?></p>
        <legend class="screen-reader-text">
            <span><?php //_e( 'Example Select', $this->plugin_name ); ?></span>
        </legend>
        <label for="example_select">
            <select name="<?php //echo $this->plugin_name; ?>[example_select]" id="<?php //echo $this->plugin_name; ?>-example_select">
                <option <?php //if ( $example_select == 'first' ) echo 'selected="selected"'; ?> value="first">First</option>
                <option <?php //if ( $example_select == 'second' ) echo 'selected="selected"'; ?> value="second">Second</option>
            </select>
        </label>
    </fieldset> -->

    <!-- Text -->
    <!-- <fieldset>
        <p><?php //_e( 'Example Text.', $this->plugin_name ); ?></p>
        <legend class="screen-reader-text">
            <span><?php //_e( 'Example Text', $this->plugin_name ); ?></span>
        </legend>
        <input type="text" class="example_text" id="<?php //echo $this->plugin_name; ?>-example_text" name="<?php //echo $this->plugin_name; ?>[example_text]" value="<?php //if( ! empty( $example_text ) ) echo $example_text; else echo 'default'; ?>"/>
    </fieldset> -->

    <!-- Radio Button -->
    <fieldset>
        <h2><?php _e( 'Overall Setting', $this->plugin_name ); ?></h2>
        <!-- <legend class="example-radio">
            <span><?php //_e( 'Post ID management', $this->plugin_name ); ?></span>
        </legend> -->
        <label for="<?php echo $this->plugin_name; ?>-overall_radio_show">
            <input type="radio" id="<?php echo $this->plugin_name; ?>-overall_radio_show" name="<?php echo $this->plugin_name; ?>[example_radio]" value="1" <?php checked( $example_radio, 1 ); ?> />
            <span><?php esc_attr_e('Show', $this->plugin_name); ?></span>
        </label>
        <label for="<?php echo $this->plugin_name; ?>-overall_radio_hide">
            <input type="radio" id="<?php echo $this->plugin_name; ?>-overall_radio_hide" name="<?php echo $this->plugin_name; ?>[example_radio]" value="2" <?php checked( $example_radio, 1 ); ?> />
            <span><?php esc_attr_e('Hide', $this->plugin_name); ?></span>
        </label>
    </fieldset>

    <?php submit_button( __( 'Save all changes', $this->plugin_name ), 'primary','submit', TRUE ); ?>
    </form>

