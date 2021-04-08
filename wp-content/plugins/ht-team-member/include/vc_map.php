<?php

    function htteammember_vc_maping() {
        vc_map(array(
            'base' => 'htteamember',
            'name' => __( 'HT Team','ht-teammember'),
            'category' => __('HT Team','ht-teammember'),
            'params' => array(

                array(
                  "param_name" => "layout",
                  "heading" => __("Layout", 'ht-teammember'),
                  "type" => "dropdown",
                  'value' => [
                      __( 'Layout One', 'ht-teammember' )  =>  '1',
                      __( 'Layout Two', 'ht-teammember' )  =>  '2',
                      __( 'Layout Three', 'ht-teammember' )  =>  '3',
                      __( 'Layout Four', 'ht-teammember' )  =>  '4',
                      __( 'Layout Five', 'ht-teammember' )  =>  '5',
                  ],
                ),

                array(
                  "param_name" => "column",
                  "heading" => __("Column", 'ht-teammember'),
                  "type" => "dropdown",
                  'value' => [
                      __( '4 Column', 'ht-teammember' )  =>  '4',
                      __( '1 Column', 'ht-teammember' )  =>  '1',
                      __( '2 Column', 'ht-teammember' )  =>  '2',
                      __( '3 Column', 'ht-teammember' )  =>  '3',
                      __( '5 Column', 'ht-teammember' )  =>  '5',
                      __( '6 Column', 'ht-teammember' )  =>  '6',
                  ],
                  'edit_field_class' => 'vc_column vc_col-sm-6',
                ),

                array(
                    'param_name' => 'limit',
                    'heading' => __( 'Item Limit', 'ht-teammember' ),
                    'type' => 'textfield',
                    'description' => __( 'Number of visible items', 'ht-teammember' ),
                    'edit_field_class' => 'vc_column vc_col-sm-6',
                ),

                array(
                  "param_name" => "order",
                  "heading" => __("Order", 'ht-teammember'),
                  "type" => "dropdown",
                  'value' => [
                      __( 'Assecding', 'ht-teammember' )  =>  'ASC',
                      __( 'Dessending', 'ht-teammember' )  =>  'DESC',
                  ],
                  'edit_field_class' => 'vc_column vc_col-sm-6',
                ),

                array(
                  "param_name" => "show_name",
                  "heading" => __("Show Name", 'ht-teammember'),
                  "type" => "dropdown",
                  'value' => [
                      __( 'Yes', 'ht-teammember' )  =>  'yes',
                      __( 'No', 'ht-teammember' )  =>  'no',
                  ],
                  'edit_field_class' => 'vc_column vc_col-sm-6',
                ),

                array(
                  "param_name" => "show_designation",
                  "heading" => __("Show Designation", 'ht-teammember'),
                  "type" => "dropdown",
                  'value' => [
                      __( 'Yes', 'ht-teammember' )  =>  'yes',
                      __( 'No', 'ht-teammember' )  =>  'no',
                  ],
                  'edit_field_class' => 'vc_column vc_col-sm-6',
                ),

                array(
                  "param_name" => "show_bio",
                  "heading" => __("Show Bio", 'ht-teammember'),
                  "type" => "dropdown",
                  'value' => [
                      __( 'Yes', 'ht-teammember' )  =>  'yes',
                      __( 'No', 'ht-teammember' )  =>  'no',
                  ],
                  'edit_field_class' => 'vc_column vc_col-sm-6',
                ),

                array(
                  "param_name" => "show_socialmedia",
                  "heading" => __("Show Social Media", 'ht-teammember'),
                  "type" => "dropdown",
                  'value' => [
                      __( 'Yes', 'ht-teammember' )  =>  'yes',
                      __( 'No', 'ht-teammember' )  =>  'no',
                  ],
                  'edit_field_class' => 'vc_column vc_col-sm-6',
                ),

                array(
                    "param_name" => "slideron",
                    "heading" => __("Slider Enable", 'ht-teammember'),
                    "type" => "dropdown",
                    'value' => [
                        __( 'No', 'ht-teammember' )  =>  'no',
                        __( 'Yes', 'ht-teammember' )  =>  'yes',
                    ],
                    'edit_field_class' => 'vc_column vc_col-sm-6',
                ),

                array(
                    'param_name' => 'teams_list',
                    'heading' => __( 'Individual Id', 'ht-teammember' ),
                    'type' => 'textfield',
                    'description' => __( 'If you want to show specific Team member', 'ht-teammember' ),
                ),

                array(
                    'param_name' => 'slitems',
                    'heading' => __( 'Slider Items', 'ht-teammember' ),
                    'type' => 'textfield',
                    'value'=>'4',
                    'description' => __( 'Number of visible items', 'ht-teammember' ),
                    'group'  => __( 'Slider Options', 'ht-teammember' ),
                    'dependency' =>[
                        'element' => 'slideron',
                        'value' => array( 'yes' ),
                    ],
                ),

                array(
                    'param_name' => 'slrows',
                    'heading' => __( 'Slider Row', 'ht-teammember' ),
                    'type' => 'textfield',
                    'value'=>'1',
                    'description' => __( 'Number of visible slider row', 'ht-teammember' ),
                    'group'  => __( 'Slider Options', 'ht-teammember' ),
                    'dependency' =>[
                        'element' => 'slideron',
                        'value' => array( 'yes' ),
                    ],
                    'edit_field_class' => 'vc_column vc_col-sm-6',
                ),

                array(
                    "param_name" => "slarrows",
                    "heading" => __("Slider Arrow", 'ht-teammember'),
                    "type" => "dropdown",
                    'value' => [
                        __( 'No', 'ht-teammember' )  =>  'no',
                        __( 'Yes', 'ht-teammember' )  =>  'yes',
                    ],
                    'dependency' =>[
                        'element' => 'slideron',
                        'value' => array( 'yes' ),
                    ],
                    'group'  => __( 'Slider Options', 'ht-teammember' ),
                    'edit_field_class' => 'vc_column vc_col-sm-6',
                ),

                array(
                    'param_name' => 'slprevicon',
                    'heading' => __( 'Previous icon', 'ht-teammember' ),
                    'type' => 'iconpicker',
                    'value' => 'fa fa-angle-left',
                    'dependency' =>[
                        'element' => 'slarrows',
                        'value' => array( 'yes' ),
                    ],
                    'group'  => __( 'Slider Options', 'ht-teammember' ),
                    'edit_field_class' => 'vc_column vc_col-sm-6',
                ),

                array(
                    'param_name' => 'slnexticon',
                    'heading' => __( 'Next icon', 'ht-teammember' ),
                    'type' => 'iconpicker',
                    'value' => 'fa fa-angle-right',
                    'dependency' =>[
                        'element' => 'slarrows',
                        'value' => array( 'yes' ),
                    ],
                    'group'  => __( 'Slider Options', 'ht-teammember' ),
                    'edit_field_class' => 'vc_column vc_col-sm-6',
                ),

                array(
                    "param_name" => "sldots",
                    "heading" => __("Slider dots", 'ht-teammember'),
                    "type" => "dropdown",
                    'value' => [
                        __( 'No', 'ht-teammember' )  =>  'no',
                        __( 'Yes', 'ht-teammember' )  =>  'yes',
                    ],
                    'dependency' =>[
                        'element' => 'slideron',
                        'value' => array( 'yes' ),
                    ],
                    'group'  => __( 'Slider Options', 'ht-teammember' ),
                    'edit_field_class' => 'vc_column vc_col-sm-6',
                ),

                array(
                    "param_name" => "slcentermode",
                    "heading" => __("Center Mode", 'ht-teammember'),
                    "type" => "dropdown",
                    'value' => [
                        __( 'No', 'ht-teammember' )  =>  'no',
                        __( 'Yes', 'ht-teammember' )  =>  'yes',
                    ],
                    'dependency' =>[
                        'element' => 'slideron',
                        'value' => array( 'yes' ),
                    ],
                    'group'  => __( 'Slider Options', 'ht-teammember' ),
                    'edit_field_class' => 'vc_column vc_col-sm-6',
                ),

                array(
                    'param_name' => 'slcenterpadding',
                    'heading' => __( 'Center padding', 'ht-teammember' ),
                    'type' => 'textfield',
                    'value'=>'0',
                    'description' => __( 'Center padding', 'ht-teammember' ),
                    'group'  => __( 'Slider Options', 'ht-teammember' ),
                    'dependency' =>[
                        'element' => 'slcentermode',
                        'value' => array( 'yes' ),
                    ],
                    'edit_field_class' => 'vc_column vc_col-sm-6',
                ),

                array(
                    "param_name" => "slautolay",
                    "heading" => __("Auto Play", 'ht-teammember'),
                    "type" => "dropdown",
                    'value' => [
                        __( 'No', 'ht-teammember' )  =>  'no',
                        __( 'Yes', 'ht-teammember' )  =>  'yes',
                    ],
                    'dependency' =>[
                        'element' => 'slideron',
                        'value' => array( 'yes' ),
                    ],
                    'group'  => __( 'Slider Options', 'ht-teammember' ),
                    'edit_field_class' => 'vc_column vc_col-sm-6',
                ),

                array(
                    'param_name' => 'slautoplay_speed',
                    'heading' => __( 'Auto Play Speed', 'ht-teammember' ),
                    'type' => 'textfield',
                    'value'=>'3000',
                    'description' => __( 'Auto Play Speed', 'ht-teammember' ),
                    'group'  => __( 'Slider Options', 'ht-teammember' ),
                    'dependency' =>[
                        'element' => 'slideron',
                        'value' => array( 'yes' ),
                    ],
                    'edit_field_class' => 'vc_column vc_col-sm-6',
                ),

                array(
                    'param_name' => 'slanimation_speed',
                    'heading' => __( 'Auto Play Speed', 'ht-teammember' ),
                    'type' => 'textfield',
                    'value'=>'300',
                    'description' => __( 'Auto Play Animation Speed', 'ht-teammember' ),
                    'group'  => __( 'Slider Options', 'ht-teammember' ),
                    'dependency' =>[
                        'element' => 'slideron',
                        'value' => array( 'yes' ),
                    ],
                    'edit_field_class' => 'vc_column vc_col-sm-6',
                ),

                array(
                    'param_name' => 'slscroll_columns',
                    'heading' => __( 'Slider item to scroll', 'ht-teammember' ),
                    'type' => 'textfield',
                    'value'=>'1',
                    'description' => __( 'Slider item to scroll', 'ht-teammember' ),
                    'group'  => __( 'Slider Options', 'ht-teammember' ),
                    'dependency' =>[
                        'element' => 'slideron',
                        'value' => array( 'yes' ),
                    ],
                    'edit_field_class' => 'vc_column vc_col-sm-6',
                ),

                array(
                    'param_name' => 'sltablet_width',
                    'heading' => __( 'Tablet Resolution', 'ht-teammember' ),
                    'type' => 'textfield',
                    'value'=>'750',
                    'description' => __( 'The resolution to tablet.', 'ht-teammember' ),
                    'group'  => __( 'Slider Options', 'ht-teammember' ),
                    'dependency' =>[
                        'element' => 'slideron',
                        'value' => array( 'yes' ),
                    ],
                    'edit_field_class' => 'vc_column vc_col-sm-6',
                ),

                array(
                    'param_name' => 'sltablet_display_columns',
                    'heading' => __( 'Number of item on Tablet', 'ht-teammember' ),
                    'type' => 'textfield',
                    'value'=>'1',
                    'description' => __( 'Number of item on Tablet', 'ht-teammember' ),
                    'group'  => __( 'Slider Options', 'ht-teammember' ),
                    'dependency' =>[
                        'element' => 'slideron',
                        'value' => array( 'yes' ),
                    ],
                    'edit_field_class' => 'vc_column vc_col-sm-6',
                ),

                array(
                    'param_name' => 'sltablet_scroll_columns',
                    'heading' => __( 'Slider item to scroll on tablet', 'ht-teammember' ),
                    'type' => 'textfield',
                    'value'=>'1',
                    'description' => __( 'Slider item to scroll on tablet', 'ht-teammember' ),
                    'group'  => __( 'Slider Options', 'ht-teammember' ),
                    'dependency' =>[
                        'element' => 'slideron',
                        'value' => array( 'yes' ),
                    ],
                    'edit_field_class' => 'vc_column vc_col-sm-6',
                ),

                array(
                    'param_name' => 'slmobile_width',
                    'heading' => __( 'Mobile Resolution', 'ht-teammember' ),
                    'type' => 'textfield',
                    'value'=>'480',
                    'description' => __( 'Mobile Resolution', 'ht-teammember' ),
                    'group'  => __( 'Slider Options', 'ht-teammember' ),
                    'dependency' =>[
                        'element' => 'slideron',
                        'value' => array( 'yes' ),
                    ],
                    'edit_field_class' => 'vc_column vc_col-sm-6',
                ),

                array(
                    'param_name' => 'slmobile_display_columns',
                    'heading' => __( 'Number of item on Mobile', 'ht-teammember' ),
                    'type' => 'textfield',
                    'value'=>'1',
                    'description' => __( 'Number of item on Mobile', 'ht-teammember' ),
                    'group'  => __( 'Slider Options', 'ht-teammember' ),
                    'dependency' =>[
                        'element' => 'slideron',
                        'value' => array( 'yes' ),
                    ],
                    'edit_field_class' => 'vc_column vc_col-sm-6',
                ),

                array(
                    'param_name' => 'slmobile_scroll_columns',
                    'heading' => __( 'Slider item to scroll on mobile', 'ht-teammember' ),
                    'type' => 'textfield',
                    'value'=>'1',
                    'description' => __( 'Slider item to scroll on mobile', 'ht-teammember' ),
                    'group'  => __( 'Slider Options', 'ht-teammember' ),
                    'dependency' =>[
                        'element' => 'slideron',
                        'value' => array( 'yes' ),
                    ],
                    'edit_field_class' => 'vc_column vc_col-sm-6',
                ),

                array(
                    'param_name' => 'slmobile_scroll_columns',
                    'heading' => __( 'Slider item to scroll on mobile', 'ht-teammember' ),
                    'type' => 'textfield',
                    'value'=>'1',
                    'description' => __( 'Slider item to scroll on mobile', 'ht-teammember' ),
                    'group'  => __( 'Slider Options', 'ht-teammember' ),
                    'dependency' =>[
                        'element' => 'slideron',
                        'value' => array( 'yes' ),
                    ],
                ),

                array(
                    'param_name' => 'name_color',
                    'heading' => __( 'Name Color', 'ht-teammember' ),
                    'type' => 'colorpicker',
                    'group'  => __( 'Styling', 'ht-teammember' ),
                ),

                array(
                    'param_name' => 'desi_color',
                    'heading' => __( 'Designation Color', 'ht-teammember' ),
                    'type' => 'colorpicker',
                    'group'  => __( 'Styling', 'ht-teammember' ),
                ),

                array(
                    'param_name' => 'bio_color',
                    'heading' => __( 'Bio Color', 'ht-teammember' ),
                    'type' => 'colorpicker',
                    'group'  => __( 'Styling', 'ht-teammember' ),
                ),

                array(
                    'param_name' => 'social_color',
                    'heading' => __( 'Social Color', 'ht-teammember' ),
                    'type' => 'colorpicker',
                    'group'  => __( 'Styling', 'ht-teammember' ),
                ),

                array(
                    'param_name' => 'social_hovcolor',
                    'heading' => __( 'Social Hover Color', 'ht-teammember' ),
                    'type' => 'colorpicker',
                    'group'  => __( 'Styling', 'ht-teammember' ),
                ),



            )
            
        ));
    }
    add_action( 'init', 'htteammember_vc_maping' );

?>