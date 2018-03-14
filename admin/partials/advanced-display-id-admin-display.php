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
        $options = get_option($this->plugin_name, array(
            'general_radio' => 1,
            'post_radio' => 1,
            'page_radio' => 1,
            'media_radio' => 1,
            'link_radio' => 1,
            'category_radio' => 1,
            'user_radio' => 1,
            'comment_radio' => 1,
            'cpt_radio'  => 1
        ));

        $general_radio = isset($options['general_radio']) && !empty($options['general_radio']) ?: $options['general_radio'];
        $post_radio = isset($options['post_radio']) && !empty($options['post_radio']) ? 1 : 0;
        $page_radio = isset($options['page_radio']) && !empty($options['page_radio']) ? 1 : 0;
        $media_radio = isset($options['media_radio']) && !empty($options['media_radio']) ? 1 : 0;
        $link_radio = isset($options['link_radio']) && !empty($options['link_radio']) ? 1 : 0;
        $category_radio = isset($options['category_radio']) && !empty($options['category_radio']) ? 1 : 0;
        $user_radio = isset($options['user_radio']) && !empty($options['user_radio']) ? 1 : 0;
        $comment_radio = isset($options['comment_radio']) && !empty($options['comment_radio']) ? 1 : 0;
        $cpt_radio = isset($options['cpt_radio']) && !empty($options['cpt_radio']) ? 1 : 0; 
        
        settings_fields($this->plugin_name);
        do_settings_sections($this->plugin_name);

        // Sources: - http://searchengineland.com/tested-googlebot-crawls-javascript-heres-learned-220157
        //          - http://dinbror.dk/blog/lazy-load-images-seo-problem/
        //          - https://webmasters.googleblog.com/2015/10/deprecating-our-ajax-crawling-scheme.html
    ?>
   
    <!-- General Control -->
    <fieldset>
        <!-- run the settings_errors() function here. -->
        <?php settings_errors(); ?>

        <h2><?php _e( 'General Setting', $this->plugin_name ); ?></h2>
        <label for="<?php echo $this->plugin_name; ?>-general_radio_show">
            <input type="radio" id="<?php echo $this->plugin_name; ?>-general_radio_show" name="<?php echo $this->plugin_name; ?>[general_radio]" value="1" <?php checked( $general_radio, 1 ); ?> />
            <span><?php esc_attr_e('Show', $this->plugin_name); ?></span>
        </label>
        <label for="<?php echo $this->plugin_name; ?>-general_radio_hide">
            <input type="radio" id="<?php echo $this->plugin_name; ?>-general_radio_hide" name="<?php echo $this->plugin_name; ?>[general_radio]" value="0" <?php checked( $general_radio, 0 ); ?> />
            <span><?php esc_attr_e('Hide', $this->plugin_name); ?></span>
        </label>
    </fieldset>

    <!-- Post Control -->
    <fieldset>
        <h2><?php _e( 'Post ID Management - Coming Soon', $this->plugin_name ); ?></h2>
        <label for="<?php echo $this->plugin_name; ?>-post_radio_show">
            <input type="radio" id="<?php echo $this->plugin_name; ?>-post_radio_show" name="<?php echo $this->plugin_name; ?>[post_radio]" value="1" <?php checked( $post_radio, 1 ); ?> disabled />
            <span><?php esc_attr_e('Show', $this->plugin_name); ?></span>
        </label>
        <label for="<?php echo $this->plugin_name; ?>-post_radio_hide">
            <input type="radio" id="<?php echo $this->plugin_name; ?>-post_radio_hide" name="<?php echo $this->plugin_name; ?>[post_radio]" value="0" <?php checked( $post_radio, 0 ); ?> disabled />
            <span><?php esc_attr_e('Hide', $this->plugin_name); ?></span>
        </label>
    </fieldset>

     <!-- Page Control -->
     <fieldset>
        <h2><?php _e( 'Page ID Management - Coming Soon', $this->plugin_name ); ?></h2>
        <label for="<?php echo $this->plugin_name; ?>-page_radio_show">
            <input type="radio" id="<?php echo $this->plugin_name; ?>-page_radio_show" name="<?php echo $this->plugin_name; ?>[page_radio]" value="1" <?php checked( $page_radio, 1 ); ?> disabled />
            <span><?php esc_attr_e('Show', $this->plugin_name); ?></span>
        </label>
        <label for="<?php echo $this->plugin_name; ?>-page_radio_hide">
            <input type="radio" id="<?php echo $this->plugin_name; ?>-page_radio_hide" name="<?php echo $this->plugin_name; ?>[page_radio]" value="0" <?php checked( $page_radio, 0 ); ?> disabled />
            <span><?php esc_attr_e('Hide', $this->plugin_name); ?></span>
        </label>
    </fieldset>

    <!-- Media Control -->
    <fieldset>
            <h2><?php _e( 'Media ID Management - Coming Soon', $this->plugin_name ); ?></h2>
            <label for="<?php echo $this->plugin_name; ?>-media_radio_show">
                <input type="radio" id="<?php echo $this->plugin_name; ?>-media_radio_show" name="<?php echo $this->plugin_name; ?>[media_radio]" value="1" <?php checked( $media_radio, 1 ); ?> disabled />
                <span><?php esc_attr_e('Show', $this->plugin_name); ?></span>
            </label>
            <label for="<?php echo $this->plugin_name; ?>-media_radio_hide">
                <input type="radio" id="<?php echo $this->plugin_name; ?>-media_radio_hide" name="<?php echo $this->plugin_name; ?>[media_radio]" value="0" <?php checked( $media_radio, 0 ); ?> disabled />
                <span><?php esc_attr_e('Hide', $this->plugin_name); ?></span>
            </label>
    </fieldset>

     <!-- Link Control -->
     <fieldset>
            <h2><?php _e( 'Link ID Management - Coming Soon', $this->plugin_name ); ?></h2>
            <label for="<?php echo $this->plugin_name; ?>-link_radio_show">
                <input type="radio" id="<?php echo $this->plugin_name; ?>-link_radio_show" name="<?php echo $this->plugin_name; ?>[link_radio]" value="1" <?php checked( $link_radio, 1 ); ?> disabled />
                <span><?php esc_attr_e('Show', $this->plugin_name); ?></span>
            </label>
            <label for="<?php echo $this->plugin_name; ?>-link_radio_hide">
                <input type="radio" id="<?php echo $this->plugin_name; ?>-link_radio_hide" name="<?php echo $this->plugin_name; ?>[link_radio]" value="0" <?php checked( $link_radio, 0 ); ?> disabled />
                <span><?php esc_attr_e('Hide', $this->plugin_name); ?></span>
            </label>
    </fieldset>
    
    <!-- Category Control -->
    <fieldset>
            <h2><?php _e( 'Category ID Management - Coming Soon', $this->plugin_name ); ?></h2>
            <label for="<?php echo $this->plugin_name; ?>-category_radio_show">
                <input type="radio" id="<?php echo $this->plugin_name; ?>-category_radio_show" name="<?php echo $this->plugin_name; ?>[category_radio]" value="1" <?php checked( $category_radio, 1 ); ?> disabled />
                <span><?php esc_attr_e('Show', $this->plugin_name); ?></span>
            </label>
            <label for="<?php echo $this->plugin_name; ?>-category_radio_hide">
                <input type="radio" id="<?php echo $this->plugin_name; ?>-category_radio_hide" name="<?php echo $this->plugin_name; ?>[category_radio]" value="0" <?php checked( $category_radio, 0 ); ?> disabled />
                <span><?php esc_attr_e('Hide', $this->plugin_name); ?></span>
            </label>
    </fieldset>

    <!-- User Control -->
    <fieldset>
            <h2><?php _e( 'User ID Management - Coming Soon', $this->plugin_name ); ?></h2>
            <label for="<?php echo $this->plugin_name; ?>-user_radio_show">
                <input type="radio" id="<?php echo $this->plugin_name; ?>-user_radio_show" name="<?php echo $this->plugin_name; ?>[user_radio]" value="1" <?php checked( $user_radio, 1 ); ?> disabled />
                <span><?php esc_attr_e('Show', $this->plugin_name); ?></span>
            </label>
            <label for="<?php echo $this->plugin_name; ?>-user_radio_hide">
                <input type="radio" id="<?php echo $this->plugin_name; ?>-user_radio_hide" name="<?php echo $this->plugin_name; ?>[user_radio]" value="0" <?php checked( $user_radio, 0 ); ?> disabled />
                <span><?php esc_attr_e('Hide', $this->plugin_name); ?></span>
            </label>
    </fieldset>

    <!-- Comment Control -->
    <fieldset>
                <h2><?php _e( 'Comment ID Management - Coming Soon', $this->plugin_name ); ?></h2>
                <label for="<?php echo $this->plugin_name; ?>-comment_radio_show">
                    <input type="radio" id="<?php echo $this->plugin_name; ?>-comment_radio_show" name="<?php echo $this->plugin_name; ?>[comment_radio]" value="1" <?php checked( $comment_radio, 1 ); ?> disabled />
                    <span><?php esc_attr_e('Show', $this->plugin_name); ?></span>
                </label>
                <label for="<?php echo $this->plugin_name; ?>-comment_radio_hide">
                    <input type="radio" id="<?php echo $this->plugin_name; ?>-comment_radio_hide" name="<?php echo $this->plugin_name; ?>[comment_radio]" value="0" <?php checked( $comment_radio, 0 ); ?> disabled />
                    <span><?php esc_attr_e('Hide', $this->plugin_name); ?></span>
                </label>
    </fieldset>

    <!-- CPT Control -->
    <fieldset>
                <h2><?php _e( 'CPT ID Management - Coming Soon', $this->plugin_name ); ?></h2>
                <label for="<?php echo $this->plugin_name; ?>-cpt_radio_show">
                    <input type="radio" id="<?php echo $this->plugin_name; ?>-cpt_radio_show" name="<?php echo $this->plugin_name; ?>[cpt_radio]" value="1" <?php checked( $cpt_radio, 1 ); ?> disabled/>
                    <span><?php esc_attr_e('Show', $this->plugin_name); ?></span>
                </label>
                <label for="<?php echo $this->plugin_name; ?>-cpt_radio_hide">
                    <input type="radio" id="<?php echo $this->plugin_name; ?>-cpt_radio_hide" name="<?php echo $this->plugin_name; ?>[cpt_radio]" value="0" <?php checked( $cpt_radio, 0 ); ?> disabled/>
                    <span><?php esc_attr_e('Hide', $this->plugin_name); ?></span>
                </label>
    </fieldset>

    <?php submit_button( __( 'Save all changes', $this->plugin_name ), 'primary','submit', TRUE ); ?>
    </form>

