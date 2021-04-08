<?php
/**
 * Plugin Name: HT Team Member
 * Description: The HT Team Member is a elementor addons, Visul Composer addons, WordPress Widges.
 * Plugin URI:  https://htplugins.com/
 * Author:      HT Plugins
 * Author URI:  https://htplugins.com/
 * Version:     1.0.6
 * License:     GPL2
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: ht-teammember
 * Domain Path: /languages
*/

if( ! defined( 'ABSPATH' ) ) exit(); // Exit if accessed directly

define( 'HTTEAM_VERSION', '1.0.6' );
define( 'HTTEAM_PL_URL', plugins_url( '/', __FILE__ ) );
define( 'HTTEAM_PL_PATH', plugin_dir_path( __FILE__ ) );

// Required File
require_once HTTEAM_PL_PATH.'admin/admin-init.php';
require_once HTTEAM_PL_PATH.'include/helpers_function.php';
require_once HTTEAM_PL_PATH.'include/shortcode.php';
require_once HTTEAM_PL_PATH.'include/default_widgets.php';
if ( in_array('js_composer/js_composer.php', get_option('active_plugins') ) ){
    include( HTTEAM_PL_PATH.'include/vc_map.php' );
}

function htteammember_elementor_widgets(){
    include( HTTEAM_PL_PATH.'include/elementor_widgets.php' );
}
add_action('elementor/widgets/widgets_registered','htteammember_elementor_widgets');

// Options value fetch
function htteammember_get_option( $option, $section, $default = '' ) {
    $options = get_option( $section );
    if ( isset( $options[$option] ) ) {
        return $options[$option];
    }
    return $default;
}

//Enqueue style
function htteammember_assests_enqueue() {

    wp_enqueue_style('htteam-widgets', HTTEAM_PL_URL . 'assests/css/ht-teammember.css', '', HTTEAM_VERSION );
    wp_enqueue_style('font-awesome', HTTEAM_PL_URL . 'assests/css/font-awesome.min.css', '', HTTEAM_VERSION );

    // Register Style
    wp_register_style( 'slick', HTTEAM_PL_URL . 'assests/css/slick.min.css', array(), HTTEAM_VERSION );

    // Script register
    wp_register_script( 'slick', HTTEAM_PL_URL . 'assests/js/slick.min.js', array(), HTTEAM_VERSION, TRUE );
    wp_register_script( 'ht-teammin', HTTEAM_PL_URL . 'assests/js/ht-teammin.js', array('slick'), HTTEAM_VERSION, TRUE );

}
add_action( 'wp_enqueue_scripts', 'htteammember_assests_enqueue' );

// Custom Post type template redirect.
function htteammember_custom_post_template( $template ) {

    if( is_archive( 'htteam_member' ) ) {
        $template = WP_PLUGIN_DIR .'/'. plugin_basename( dirname(__FILE__) ) .'/template/archive-htteam_member.php';
    }
 
    if( is_singular( 'htteam_member' ) ) {
        $template = WP_PLUGIN_DIR .'/'. plugin_basename( dirname(__FILE__) ) .'/template/single-htteam_member.php';
    }
 
    return $template;
}
add_filter( 'template_include', 'htteammember_custom_post_template' );

// Add settings link on plugin page.
function htteammember_pl_setting_links( $htinstagram_links ) {
    $htinstagram_settings_link = '<a href="admin.php?page=htteamoptions">'.esc_html__( 'Settings', 'ht-teammember' ).'</a>'; 
    array_unshift( $htinstagram_links, $htinstagram_settings_link );   
    return $htinstagram_links; 
} 
$htteammember_plugin_name = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$htteammember_plugin_name", 'htteammember_pl_setting_links' );



?>