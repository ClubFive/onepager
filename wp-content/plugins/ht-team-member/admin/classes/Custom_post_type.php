<?php
    /**
    * Custom_post_type
    */
    class HTteammember_Custom_post_type{
        
        function __construct(){
           add_action( 'init', array( $this, 'htteammember_custom_post' ), 0 );
        }

        function htteammember_custom_post(){

            $labels = array(
                'name'                  => _x( 'Team Member', 'Post Type General Name', 'ht-teammember' ),
                'singular_name'         => _x( 'Team Member', 'Post Type Singular Name', 'ht-teammember' ),
                'menu_name'             => esc_html__( 'Team Member', 'ht-teammember' ),
                'name_admin_bar'        => esc_html__( 'Team Member', 'ht-teammember' ),
                'archives'              => esc_html__( 'Team Archives', 'ht-teammember' ),
                'parent_item_colon'     => esc_html__( 'Parent Team:', 'ht-teammember' ),
                'add_new_item'          => esc_html__( 'Add New Team', 'ht-teammember' ),
                'add_new'               => esc_html__( 'Add New', 'ht-teammember' ),
                'new_item'              => esc_html__( 'New Member', 'ht-teammember' ),
                'edit_item'             => esc_html__( 'Edit Member', 'ht-teammember' ),
                'update_item'           => esc_html__( 'Update Member', 'ht-teammember' ),
                'view_item'             => esc_html__( 'View Member', 'ht-teammember' ),
                'search_items'          => esc_html__( 'Search Member', 'ht-teammember' ),
                'not_found'             => esc_html__( 'Not found', 'ht-teammember' ),
                'not_found_in_trash'    => esc_html__( 'Not found in Trash', 'ht-teammember' ),
                'featured_image'        => esc_html__( 'Member Image', 'ht-teammember' ),
                'set_featured_image'    => esc_html__( 'Set Member image', 'ht-teammember' ),
                'remove_featured_image' => esc_html__( 'Remove Member image', 'ht-teammember' ),
                'use_featured_image'    => esc_html__( 'Use as Member image', 'ht-teammember' ),
                'insert_into_item'      => esc_html__( 'Insert into Member', 'ht-teammember' ),
                'uploaded_to_this_item' => esc_html__( 'Uploaded to this Member', 'ht-teammember' ),
                'items_list'            => esc_html__( 'Members list', 'ht-teammember' ),
                'items_list_navigation' => esc_html__( 'Members list navigation', 'ht-teammember' ),
                'filter_items_list'     => esc_html__( 'Filter Member list', 'ht-teammember' ),
            );

            $args = array(
                'labels'                => $labels,
                'supports'              => array( 'title', 'excerpt','editor', 'thumbnail' ),
                'hierarchical'          => false,
                'public'                => true,
                'show_ui'               => true,
                'show_in_menu'          => 'htteammember',
                'menu_position'         => 5,
                'menu_icon'             => 'dashicons-archive',
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => true,
                'can_export'            => true,
                'has_archive'           => true,
                'rewrite'               => array( 'slug' => ( htteammember_get_option( 'page_sug', 'htteam_widgets_general_tabs' ) ? htteammember_get_option( 'page_sug', 'htteam_widgets_general_tabs' ) : 'team' ) ),
                'taxonomies'            => array( htteammember_get_option( 'page_sug', 'htteam_widgets_general_tabs' ) ? htteammember_get_option( 'page_sug', 'htteam_widgets_general_tabs' ) : 'team' ),        
                'exclude_from_search'   => false,
                'publicly_queryable'    => true,
                'capability_type'       => 'post',
            );

            register_post_type( 'htteam_member', $args );

        }
        
    }

    new HTteammember_Custom_post_type();
?>