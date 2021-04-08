<?php

if( ! defined( 'ABSPATH' ) ) exit(); // Exit if accessed directly

class HTTeammember_Admin_Setting{

    public function __construct(){
        add_action('admin_enqueue_scripts', array( $this, 'htteammember_enqueue_admin_scripts' ) );
        $this->htteammember_admin_settings_page();
    }

    /*
    *  Setting Page
    */
    public function htteammember_admin_settings_page() {
        require_once('include/class.settings-api.php');
        require_once('include/admin-setting.php');
        require_once('classes/Custom_post_type.php');
        require_once('include/Custom_meta_fields.php');
    }

    /*
    *  Enqueue admin scripts
    */
    public function htteammember_enqueue_admin_scripts(){
        wp_enqueue_style( 'htteam-admin', HTTEAM_PL_URL . 'admin/assets/css/admin_optionspanel.css', FALSE, HTTEAM_VERSION );
    }

}

new HTTeammember_Admin_Setting();