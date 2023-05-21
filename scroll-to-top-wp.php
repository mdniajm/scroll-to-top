<?php 
/*
 * Plugin Name:       Scroll To Top WP
 * Plugin URI:        https://wordpress.org/plugins/scroll-to-to-wp/
 * Description:       Handle the basics with this plugin.
 * Version:           1.1.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Md Niaj Makhudm
 * Author URI:        https://mdniajmakhdum.me/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       sstt
 * Domain Path:       /languages
 */

// Including the CSS
function sstt_enqueue_style() {
    wp_enqueue_style( 'sstt-style', plugins_url('css/sstt-style.css', __FILE__ ));
}
add_action( 'wp_enqueue_scripts', 'sstt_enqueue_style' );

// Including the JS
function sstt_enqueue_script() {
    wp_enqueue_script( 'jquery');
}
add_action( 'wp_enqueue_scripts', 'sstt_enqueue_script' );

function sstt_enqueue_plugin() {
    wp_enqueue_script( 'sstt-script', plugins_url('js/sstt-plugin.js', __FILE__ ), array(), '1.0.0', true);
}
add_action( 'wp_enqueue_scripts', 'sstt_enqueue_plugin' );

// Jquery Plugin Activation
function sstt_scroll_script (){
 ?>
     <script>
        //jquery initialization
        jQuery(document).ready(function(){
            //scroll up js
            jQuery.scrollUp();
                      
        });



    </script>
<?php
}
add_action('wp_footer', 'sstt_scroll_script');


// Plugin Customization

add_action( 'customize_register' , 'sstt_scroll_to_top' );
function sstt_scroll_to_top ($wp_customize){
    $wp_customize->add_section( 'sstt_scroll_to_top_section', array(
        'title' => __('Scroll To Top', 'sstt'),
        'description' => 'This is a scroll to top section.',
    ));

    // Default Color
    $wp_customize->add_setting( 'sstt_default_color', array(
        'default' => '#000000',
    ));
    
    $wp_customize->add_control( 'sstt_default_color', array(
        'label' => 'Background Color',
        'type' => 'color',
        'section' => 'sstt_scroll_to_top_section',
    ));
    
    // Rounded Corner
    $wp_customize->add_setting( 'sstt_rounded_corner', array(
        'default' => '5px',
    ));
    
    $wp_customize->add_control( 'sstt_rounded_corner', array(
        'label' => 'Rounded Corner',
        'type' => 'textfield',
        'section' => 'sstt_scroll_to_top_section',
    ));
    
      

}

// Theme CSS Customization

function sstt_theme_color_cus(){
    ?>
        <style type="text/css">
            #scrollUp {
                background-color: <?php echo get_theme_mod('sstt_default_color'); ?>;
                border-radius: <?php echo get_theme_mod('sstt_rounded_corner'); ?>;
            }
        </style>
    <?php
}
add_action('wp_head', 'sstt_theme_color_cus');
?>