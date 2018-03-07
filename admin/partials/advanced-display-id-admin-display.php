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
        $general_radio = ( isset( $options['general_radio'] ) && ! empty( $options['general_radio'] ) ) ?: $options['general_radio'];
        $post_radio = ( isset( $options['post_radio'] ) && ! empty( $options['post_radio'] ) ) ?: $options['post_radio'];
    
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

   
    <!-- General Control -->
    <fieldset>
        <!-- run the settings_errors() function here. -->
        <?php settings_errors(); ?>

        <h2><?php _e( 'General Setting', $this->plugin_name ); ?></h2>
        <label for="<?php echo $this->plugin_name; ?>-general_radio_show">
            <input type="radio" id="<?php echo $this->plugin_name; ?>-general_radio_show" name="<?php echo $this->plugin_name; ?>[general_radio]" value="1" <?php checked( $options['general_radio'], 1 ); ?> />
            <span><?php esc_attr_e('Show', $this->plugin_name); ?></span>
        </label>
        <label for="<?php echo $this->plugin_name; ?>-general_radio_hide">
            <input type="radio" id="<?php echo $this->plugin_name; ?>-general_radio_hide" name="<?php echo $this->plugin_name; ?>[general_radio]" value="0" <?php checked( $options['general_radio'], 0 ); ?> />
            <span><?php esc_attr_e('Hide', $this->plugin_name); ?></span>
        </label>
    </fieldset>

    <!-- Post Control -->
    <fieldset>
        <h2><?php _e( 'Post ID Management', $this->plugin_name ); ?></h2>
        <label for="<?php echo $this->plugin_name; ?>-post_radio_show">
            <input type="radio" id="<?php echo $this->plugin_name; ?>-post_radio_show" name="<?php echo $this->plugin_name; ?>[post_radio]" value="1" <?php checked( $options['post_radio'], 1 ); ?> />
            <span><?php esc_attr_e('Show', $this->plugin_name); ?></span>
        </label>
        <label for="<?php echo $this->plugin_name; ?>-post_radio_hide">
            <input type="radio" id="<?php echo $this->plugin_name; ?>-post_radio_hide" name="<?php echo $this->plugin_name; ?>[post_radio]" value="0" <?php checked( $options['post_radio'], 0 ); ?> />
            <span><?php esc_attr_e('Hide', $this->plugin_name); ?></span>
        </label>
    </fieldset>

    <?php submit_button( __( 'Save all changes', $this->plugin_name ), 'primary','submit', TRUE ); ?>
    </form>

