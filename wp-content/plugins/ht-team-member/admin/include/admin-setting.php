<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

if ( ! function_exists('is_plugin_active')){ include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); }

class HTteammember_Admin_Settings {

    private $settings_api;

    function __construct() {
        $this->settings_api = new HTteammember_Settings_API;

        add_action( 'admin_init', array( $this, 'admin_init' ) );
        add_action( 'admin_menu', array( $this, 'admin_parent_menu' ), 220 );
        add_action( 'admin_menu', array( $this, 'admin_options_sub_menu' ), 220 );
        add_action( 'wsa_form_bottom_htteam_shortcodeopt_tabs', array( $this, 'htteammember_shortcode_opt_table' ) );
    }

    function admin_init() {

        //set the settings
        $this->settings_api->set_sections( $this->htteammember_admin_get_settings_sections() );
        $this->settings_api->set_fields( $this->htteammember_admin_fields_settings() );

        //initialize settings
        $this->settings_api->admin_init();
    }

    // Admin Bar parent Menu
    function admin_parent_menu() {
        $menu = 'add_menu_' . 'page';
        $menu( 
            'htteam_panel', 
            esc_html__( 'HT Team Member', 'ht-teammember' ), 
            'read', 
            'htteammember', 
            NULL, 
            'dashicons-businessman', 
            60 
        );
    }

    // Plugins menu Register
    function admin_options_sub_menu() {

        add_submenu_page( 
            'htteammember', 
            __( 'Settings', 'ht-teammember' ), 
            __( 'Settings', 'ht-teammember' ),
            'manage_options', 
            'htteamoptions', 
            array($this, 'plugin_page')
        );

    }

    // Options page Section register
    function htteammember_admin_get_settings_sections() {
        $sections = array(

            array(
                'id'    => 'htteam_widgets_general_tabs',
                'title' => esc_html__( 'General', 'ht-teammember' )
            ),

            array(
                'id'    => 'htteam_widgets_options_tabs',
                'title' => esc_html__( 'Widgets', 'ht-teammember' )
            ),

            array(
                'id'    => 'htteam_shortcodeopt_tabs',
                'title' => esc_html__( 'Shortcode ', 'ht-teammember' )
            ),

        );
        return $sections;
    }

    // Options page field register
    protected function htteammember_admin_fields_settings() {

        $settings_fields = array(

            'htteam_widgets_general_tabs'=>array(

                array(
                    'name'              => 'page_sug',
                    'label'             => __( 'TeamMember Permalink', 'ht-instagram' ),
                    'type'              => 'text',
                    'sanitize_callback' => 'sanitize_text_field'
                ),

            ),

            'htteam_widgets_options_tabs'=>array(

                array(
                    'name'  => 'widgets_style_title',
                    'label'  => __( '<h2 class="htteamop-headding">Slider Options</h2>', 'ht-teammember' ),
                    'type'  => 'title',
                    'class'=>'htoptions_headding_table_row',
                ),

                array(
                    'name'  => 'slideron',
                    'label' => __( 'On', 'ht-instagram' ),
                    'desc'  => __( 'Slider: On / off', 'ht-instagram' ),
                    'type'  => 'checkbox'
                ),

                array(
                    'name'  => 'slitems',
                    'label' => __( 'Number Of item', 'ht-instagram' ),
                    'desc' => wp_kses_post( 'Number Of item to show', 'ht-instagram' ),
                    'min'               => 0,
                    'max'               => 100,
                    'step'              => '1',
                    'type'              => 'number',
                    'sanitize_callback' => 'floatval'
                ),

                array(
                    'name'  => 'slrows',
                    'label' => __( 'Number Of item Row', 'ht-instagram' ),
                    'desc' => wp_kses_post( 'Number Of item row to show', 'ht-instagram' ),
                    'min'               => 0,
                    'max'               => 50,
                    'step'              => '1',
                    'type'              => 'number',
                    'sanitize_callback' => 'floatval'
                ),

                array(
                    'name'  => 'sltablet_display_columns',
                    'label' => __( 'Number Of item On Tablet', 'ht-instagram' ),
                    'desc' => wp_kses_post( 'Number Of item show on Tablet', 'ht-instagram' ),
                    'min'               => 0,
                    'max'               => 50,
                    'step'              => '1',
                    'type'              => 'number',
                    'sanitize_callback' => 'floatval'
                ),

                array(
                    'name'  => 'slmobile_display_columns',
                    'label' => __( 'Number Of item On Mobile', 'ht-instagram' ),
                    'desc' => wp_kses_post( 'Number Of item show on Mobile', 'ht-instagram' ),
                    'min'               => 0,
                    'max'               => 50,
                    'step'              => '1',
                    'type'              => 'number',
                    'sanitize_callback' => 'floatval'
                ),

                array(
                    'name'  => 'slarrows',
                    'label' => __( 'Navigation', 'ht-instagram' ),
                    'desc'  => __( 'Navigation: On / off', 'ht-instagram' ),
                    'type'  => 'checkbox'
                ),

                array(
                    'name'  => 'sldots',
                    'label' => __( 'Pagination', 'ht-instagram' ),
                    'desc'  => __( 'Pagination: On / off', 'ht-instagram' ),
                    'type'  => 'checkbox'
                ),

                array(
                    'name'  => 'slautolay',
                    'label' => __( 'Auto Play', 'ht-instagram' ),
                    'desc'  => __( 'Auto Play: On / off', 'ht-instagram' ),
                    'type'  => 'checkbox'
                ),

                array(
                    'name'  => 'slautoplay_speed',
                    'label' => __( 'Auto Play Speed', 'ht-instagram' ),
                    'desc'  => __( 'Auto Play Speed', 'ht-instagram' ),
                    'placeholder' => __( '3000', 'ht-instagram' ),
                    'type' => 'text',
                    'sanitize_callback' => 'sanitize_text_field'
                ),

                array(
                    'name'  => 'slanimation_speed',
                    'label' => __( 'Animation Speed', 'ht-instagram' ),
                    'desc'  => __( 'Animation Speed', 'ht-instagram' ),
                    'placeholder' => __( '300', 'ht-instagram' ),
                    'type' => 'text',
                    'sanitize_callback' => 'sanitize_text_field'
                ),

                array(
                    'name'  => 'slcentermode',
                    'label' => __( 'Center Mode', 'ht-instagram' ),
                    'desc'  => __( 'Center Mode : On / off', 'ht-instagram' ),
                    'type'  => 'checkbox'
                ),

                array(
                    'name'  => 'slcenterpadding',
                    'label' => __( 'Center Padding', 'ht-instagram' ),
                    'desc'  => __( 'Center Padding', 'ht-instagram' ),
                    'placeholder' => __( '50', 'ht-instagram' ),
                    'type' => 'text',
                    'sanitize_callback' => 'sanitize_text_field'
                ),

            ),

            'htinstagram_shortcodeopt_tabs'=>array(

            ),

        );
        
        return array_merge( $settings_fields );
    }


    function plugin_page() {

        echo '<div class="wrap">';
            echo '<h2>'.esc_html__( 'HT Team Member Settings','ht-teammember' ).'</h2>';
            $this->save_message();
            $this->settings_api->show_navigation();
            $this->settings_api->show_forms();
        echo '</div>';

    }

    function save_message() {
        if( isset($_GET['settings-updated']) ) { ?>
            <div class="updated notice is-dismissible"> 
                <p><strong><?php esc_html_e('Successfully Settings Saved.', 'ht-teammember') ?></strong></p>
            </div>
            <?php
        }
    }

    // Short Code table
    function htteammember_shortcode_opt_table() {
        $output = '<input type="text" title="Click the field then press Ctrl + C." onclick="this.focus();this.select()" style="text-align: center; margin-bottom:10px;" readonly="readonly" size="15" value="[htteamember]">';
        $output .= '<table class="htoptions_widgets_table"><tr><th scope="row">Shortcode option</th><th scope="row">Description</th><th scope="row">Example</th></tr>';

        $output .='<tr class="httablehedding"><td colspan="3">Configure Options</td></tr>';
        $output .='<tr><td>limit</td><td>Show Number Of item.</td><td>[htteamember limit="1"]</td></tr>';
        $output .='<tr><td>column</td><td>Show Number Of item column.</td><td>[htteamember column="1"]</td></tr>';
        $output .='<tr><td>space</td><td>Layout</td><td>[htteamember layout="1"]</td></tr>';
        $output .='<tr><td>size</td><td>Item order</td><td>[htteamember order="DESC"]</td></tr>';
        $output .='<tr><td>showlike</td><td>Control the Team Member Name</td><td>[htteamember show_name="yes"]</td></tr>';
        $output .='<tr><td>showcomment</td><td>Control the Team Member Designation</td><td>[htteamember show_designation="yes"]</td></tr>';
        $output .='<tr><td>commentlike_pos</td><td>Control the Team Member Bio</td><td>[htteamember show_bio="yes"]</td></tr>';
        $output .='<tr><td>showfollowbtn</td><td>Control the team member social profile</td><td>[htteamember show_socialmedia="yes"]</td></tr>';
        $output .='<tr><td>followbtnpos</td><td>Individual team member id.</td><td>[htteamember teams_list="190,165,185"]</td></tr>';

        $output .='<tr class="httablehedding"><td colspan="3">Slider Options</td></tr>';
        $output .='<tr><td>slideron</td><td>Control the slider enable disable.</td><td>[htteamember slideron="yes"]</td></tr>';
        $output .='<tr><td>slarrows</td><td>Control the slider arrow enable disable.</td><td>[htteamember slarrows="yes"]</td></tr>';
        $output .='<tr><td>slprevicon</td><td>You can change the slider previous arrow icon.</td><td>[htteamember slprevicon="fa fa-angle-left"]</td></tr>';
        $output .='<tr><td>slnexticon</td><td>You can change the slider next arrow icon.</td><td>[htteamember slnexticon="fa fa-angle-right"]</td></tr>';
        $output .='<tr><td>sldots</td><td>Control The slider pagination.</td><td>[htteamember sldots="no"]</td></tr>';
        $output .='<tr><td>slautolay</td><td>Control The slider autoplay.</td><td>[htteamember slautolay="no"]</td></tr>';
        $output .='<tr><td>slautoplay_speed</td><td>Control The slider autoplay speed.</td><td>[htteamember slautoplay_speed="3000"]</td></tr>';
        $output .='<tr><td>slanimation_speed</td><td>Control The slider animation speed.</td><td>[htteamember slanimation_speed="300"]</td></tr>';
        $output .='<tr><td>slcentermode</td><td>Control The slider center mode.</td><td>[htteamember slcentermode="yes"]</td></tr>';
        $output .='<tr><td>slcenterpadding</td><td>Control The slider center mode padding.</td><td>[htteamember slcenterpadding="15"]</td></tr>';
        $output .='<tr><td>slitems</td><td>Control The slider number of item visible.</td><td>[htteamember slitems="4"]</td></tr>';
        $output .='<tr><td>slitems</td><td>Control The slider number of item visible.</td><td>[htteamember slitems="4"]</td></tr>';
        $output .='<tr><td>slrows</td><td>Control The slider number of row visible.</td><td>[htteamember slrows="1"]</td></tr>';
        $output .='<tr><td>slscroll_columns</td><td>Control slide to scroll.</td><td>[htteamember slscroll_columns="2"]</td></tr>';
        $output .='<tr><td>sltablet_width</td><td>Control slider tablet layout width.</td><td>[htteamember sltablet_width="750"]</td></tr>';
        $output .='<tr><td>sltablet_display_columns</td><td>Control slider display on tablet layout.</td><td>[htteamember sltablet_display_columns="2"]</td></tr>';
        $output .='<tr><td>sltablet_display_columns</td><td>Control slider scroll amount on tablet layout.</td><td>[htteamember sltablet_scroll_columns="2"]</td></tr>';
        $output .='<tr><td>slmobile_width</td><td>Control slider mobile layout width.</td><td>[htteamember slmobile_width="480"]</td></tr>';
        $output .='<tr><td>slmobile_display_columns</td><td>Control slider display on mobile layout.</td><td>[htteamember slmobile_display_columns="2"]</td></tr>';
        $output .='<tr><td>slmobile_scroll_columns</td><td>Control slider scroll amount on mobile layout.</td><td>[htteamember slmobile_scroll_columns="2"]</td></tr>';

        $output .= '</table>';
        echo $output;
    }

    
    

}

new HTteammember_Admin_Settings();