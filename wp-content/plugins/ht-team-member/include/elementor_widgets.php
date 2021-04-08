<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class HTteammember_Elementor_Widget_Instagram extends Widget_Base {

    public function get_name() {
        return 'htteammember-addons';
    }
    
    public function get_title() {
        return __( 'HT Team Member', 'ht-teammember' );
    }

    public function get_icon() {
        return 'fa fa-users';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    public function get_style_depends() {
        return [ 'slick' ];
    }

    public function get_script_depends() {
        return [ 'slick', 'ht-teammin' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'teammember_content',
            [
                'label' => __( 'Team Member', 'ht-teammember' ),
            ]
        );

            $this->add_control(
                'team_style',
                [
                    'label' => __( 'Layout', 'ht-teammember' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '1',
                    'options' => [
                        '1'   => __( 'Layout One', 'ht-teammember' ),
                        '2'   => __( 'Layout Two', 'ht-teammember' ),
                        '3'   => __( 'Layout Three', 'ht-teammember' ),
                        '4'   => __( 'Layout Four', 'ht-teammember' ),
                        '5'   => __( 'Layout Five', 'ht-teammember' ),
                    ],
                ]
            );

            $this->add_control(
                'team_col',
                [
                    'label' => __( 'Column', 'ht-teammember' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => '4',
                    'options' => [
                        '1'   => __( 'Column One', 'ht-teammember' ),
                        '2'   => __( 'Column Two', 'ht-teammember' ),
                        '3'   => __( 'Column Three', 'ht-teammember' ),
                        '4'   => __( 'Column Four', 'ht-teammember' ),
                        '5'   => __( 'Column Five', 'ht-teammember' ),
                        '6'   => __( 'Column Six', 'ht-teammember' ),
                    ],
                ]
            );

            $this->add_control(
                'teams_list',
                [
                    'label' => esc_html__( 'Select Individual Team', 'woomentor' ),
                    'type' => Controls_Manager::SELECT2,
                    'label_block' => true,
                    'multiple' => true,
                    'options' => htteammember_postlist_name( 'htteam_member' ),
                    'separator'=>'before',
                ]
            );

            $this->add_control(
                'limit',
                [
                    'label' => __( 'Item Limit', 'ht-teammember' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 200,
                    'step' => 1,
                    'default' => 4,
                ]
            );

            $this->add_control(
                'custom_order',
                [
                    'label' => esc_html__( 'Custom order', 'ht-teammember' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

            $this->add_control(
                'orderby',
                [
                    'label' => esc_html__( 'Orderby', 'ht-teammember' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'ID',
                    'options' => [
                        'ID'            => esc_html__('ID','ht-teammember'),
                        'date'          => esc_html__('Date','ht-teammember'),
                        'name'          => esc_html__('Name','ht-teammember'),
                        'title'         => esc_html__('Title','ht-teammember'),
                        'comment_count' => esc_html__('Comment count','ht-teammember'),
                        'rand'          => esc_html__('Random','ht-teammember'),
                    ],
                    'condition' => [
                        'custom_order' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'order',
                [
                    'label' => esc_html__( 'order', 'ht-teammember' ),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'DESC',
                    'options' => [
                        'DESC'  => esc_html__('Descending','ht-teammember'),
                        'ASC'   => esc_html__('Ascending','ht-teammember'),
                    ],
                    'condition' => [
                        'custom_order' => 'yes',
                    ]
                ]
            );

        $this->end_controls_section();

        // Extra Option
        $this->start_controls_section(
            'teammember_extraoptions',
            [
                'label' => __( 'Extra Options', 'ht-teammember' ),
            ]
        );
            
            $this->add_control(
                'show_name',
                [
                    'label' => __( 'Show Name', 'ht-teammember' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'ht-teammember' ),
                    'label_off' => __( 'Hide', 'ht-teammember' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
            
            $this->add_control(
                'show_designation',
                [
                    'label' => __( 'Show Designation', 'ht-teammember' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'ht-teammember' ),
                    'label_off' => __( 'Hide', 'ht-teammember' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
            
            $this->add_control(
                'show_bio',
                [
                    'label' => __( 'Show Bio', 'ht-teammember' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'ht-teammember' ),
                    'label_off' => __( 'Hide', 'ht-teammember' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
            
            $this->add_control(
                'show_socialmedia',
                [
                    'label' => __( 'Show Social Media', 'ht-teammember' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'ht-teammember' ),
                    'label_off' => __( 'Hide', 'ht-teammember' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'slider_on',
                [
                    'label'         => __( 'Slider', 'ht-teammember' ),
                    'type'          => Controls_Manager::SWITCHER,
                    'label_on'      => __( 'On', 'ht-teammember' ),
                    'label_off'     => __( 'Off', 'ht-teammember' ),
                    'return_value'  => 'yes',
                    'default'       => 'no',
                ]
            );

        $this->end_controls_section();

        // Slider setting
        $this->start_controls_section(
            'slider_option',
            [
                'label' => esc_html__( 'Slider Option', 'ht-teammember' ),
                'condition' => [
                    'slider_on' => 'yes',
                ]
            ]
        );

            $this->add_control(
                'slitems',
                [
                    'label' => esc_html__( 'Slider Items', 'ht-teammember' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 100,
                    'step' => 1,
                    'default' => 4,
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slrows',
                [
                    'label' => esc_html__( 'Slider Row', 'ht-teammember' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 50,
                    'step' => 1,
                    'default' => 1,
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slarrows',
                [
                    'label' => esc_html__( 'Slider Arrow', 'ht-teammember' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'yes',
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slprevicon',
                [
                    'label' => __( 'Previous icon', 'ht-teammember' ),
                    'type' => Controls_Manager::ICON,
                    'default' => 'fa fa-angle-left',
                    'condition' => [
                        'slider_on' => 'yes',
                        'slarrows' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slnexticon',
                [
                    'label' => __( 'Next icon', 'ht-teammember' ),
                    'type' => Controls_Manager::ICON,
                    'default' => 'fa fa-angle-right',
                    'condition' => [
                        'slider_on' => 'yes',
                        'slarrows' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'sldots',
                [
                    'label' => esc_html__( 'Slider dots', 'ht-teammember' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slcentermode',
                [
                    'label' => esc_html__( 'Center Mode', 'ht-teammember' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'default' => 'no',
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slcenterpadding',
                [
                    'label' => esc_html__( 'Center padding', 'ht-teammember' ),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 0,
                    'max' => 500,
                    'step' => 1,
                    'default' => 50,
                    'condition' => [
                        'slider_on' => 'yes',
                        'slcentermode' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slautolay',
                [
                    'label' => esc_html__( 'Slider auto play', 'ht-teammember' ),
                    'type' => Controls_Manager::SWITCHER,
                    'return_value' => 'yes',
                    'separator' => 'before',
                    'default' => 'no',
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slautoplay_speed',
                [
                    'label' => __('Autoplay speed', 'ht-teammember'),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 3000,
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );


            $this->add_control(
                'slanimation_speed',
                [
                    'label' => __('Autoplay animation speed', 'ht-teammember'),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 300,
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slscroll_columns',
                [
                    'label' => __('Slider item to scroll', 'ht-teammember'),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 10,
                    'step' => 1,
                    'default' => 1,
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'heading_tablet',
                [
                    'label' => __( 'Tablet', 'ht-teammember' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'after',
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'sltablet_display_columns',
                [
                    'label' => __('Slider Items', 'ht-teammember'),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 8,
                    'step' => 1,
                    'default' => 1,
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'sltablet_scroll_columns',
                [
                    'label' => __('Slider item to scroll', 'ht-teammember'),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 8,
                    'step' => 1,
                    'default' => 1,
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'sltablet_width',
                [
                    'label' => __('Tablet Resolution', 'ht-teammember'),
                    'description' => __('The resolution to tablet.', 'ht-teammember'),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 750,
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'heading_mobile',
                [
                    'label' => __( 'Mobile Phone', 'ht-teammember' ),
                    'type' => Controls_Manager::HEADING,
                    'separator' => 'after',
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slmobile_display_columns',
                [
                    'label' => __('Slider Items', 'ht-teammember'),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 4,
                    'step' => 1,
                    'default' => 1,
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slmobile_scroll_columns',
                [
                    'label' => __('Slider item to scroll', 'ht-teammember'),
                    'type' => Controls_Manager::NUMBER,
                    'min' => 1,
                    'max' => 4,
                    'step' => 1,
                    'default' => 1,
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

            $this->add_control(
                'slmobile_width',
                [
                    'label' => __('Mobile Resolution', 'ht-teammember'),
                    'description' => __('The resolution to mobile.', 'ht-teammember'),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 480,
                    'condition' => [
                        'slider_on' => 'yes',
                    ]
                ]
            );

        $this->end_controls_section(); // Slider Option end

        // Style Item Start
        $this->start_controls_section(
            'item_style',
            [
                'label'     => __( 'Item', 'ht-teammember' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

            $this->add_control(
                'show_gutter',
                [
                    'label' => __( 'Gutter', 'ht-teammember' ),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => __( 'Yes', 'ht-teammember' ),
                    'label_off' => __( 'No', 'ht-teammember' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );

            $this->add_control(
                'space_size',
                [
                    'label' => __( 'Space', 'ht-teammember' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 15,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .item-col' => 'padding:0 {{SIZE}}{{UNIT}};',
                    ],
                    'condition' =>[
                        'show_gutter' => array( 'yes' ),
                    ],

                ]
            );

            $this->add_control(
                'item_hover_color',
                [
                    'label' => __( 'Hover Color', 'ht-teammember' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#343434',
                    'selectors' => [
                        '{{WRAPPER}} .single-team:hover .team-hover-action' => 'background-color: {{VALUE}};',
                        '{{WRAPPER}} .single-team::before' => 'background-color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'team_member_hover_content_bg',
                [
                    'label' => __( 'Hover Content background color', 'ht-teammember' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default'=>'rgba(24, 1, 44, 0.6)',
                    'selectors' => [
                        '{{WRAPPER}} .single-team .team-hover-action .hover-action' => 'background-color: {{VALUE}};',
                        '{{WRAPPER}} .single-team .team-click-action' => 'background-color: {{VALUE}};',
                        '{{WRAPPER}} .single-team .team-info' => 'background-color: {{VALUE}};',
                    ],
                    'condition' =>[
                        'team_style!' => array( '1' ),
                    ],
                ]
            );

            $this->add_responsive_control(
                'team_item_margin',
                [
                    'label' => __( 'Margin', 'ht-teammember' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .item-col .single-team' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

        // Style Name Start
        $this->start_controls_section(
            'name_style',
            [
                'label'     => __( 'Name', 'ht-teammember' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' =>[
                    'show_name' => 'yes',
                ],
            ]
        );

            $this->start_controls_tabs('name_style_tabs');

                // Title Normal tab
                $this->start_controls_tab(
                    'name_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'ht-teammember' ),
                    ]
                );

                    $this->add_control(
                        'title_color',
                        [
                            'label' => __( 'Color', 'ht-teammember' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' => '#343434',
                            'selectors' => [
                                '{{WRAPPER}} .single-team .team-name a' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Typography::get_type(),
                        [
                            'name' => 'title_typography',
                            'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                            'selector' => '{{WRAPPER}} .single-team .team-name a',
                        ]
                    );

                $this->end_controls_tab();

                // Hover tab
                $this->start_controls_tab(
                    'name_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'ht-teammember' ),
                    ]
                );
                    $this->add_control(
                        'title_hover_color',
                        [
                            'label' => __( 'Color', 'ht-teammember' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' => '#343434',
                            'selectors' => [
                                '{{WRAPPER}} .single-team .team-name a:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                $this->end_controls_tab();

            $this->end_controls_tabs();

        $this->end_controls_section();

        // Style Designation Start
        $this->start_controls_section(
            'designation_style',
            [
                'label'     => __( 'Designation', 'ht-teammember' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' =>[
                    'show_designation' => 'yes',
                ],
            ]
        );

            $this->add_control(
                'designation_color',
                [
                    'label' => __( 'Color', 'ht-teammember' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#343434',
                    'selectors' => [
                        '{{WRAPPER}} .single-team p.team-designation' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'designation_typography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-team p.team-designation',
                ]
            );

        $this->end_controls_section();

        // Style Bio Start
        $this->start_controls_section(
            'bio_style',
            [
                'label'     => __( 'Bio', 'ht-teammember' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' =>[
                    'show_bio' => 'yes',
                ],
            ]
        );

            $this->add_control(
                'bio_color',
                [
                    'label' => __( 'Color', 'ht-teammember' ),
                    'type' => Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => Scheme_Color::get_type(),
                        'value' => Scheme_Color::COLOR_1,
                    ],
                    'default' => '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} .single-team .team-bio p' => 'color: {{VALUE}};',
                    ],
                ]
            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'bio_typography',
                    'scheme' => Scheme_Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .single-team .team-bio p',
                ]
            );

        $this->end_controls_section();

        // Style Social Start
        $this->start_controls_section(
            'social_style',
            [
                'label'     => __( 'Social Media', 'ht-teammember' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' =>[
                    'show_socialmedia' => 'yes',
                ],
            ]
        );

            $this->start_controls_tabs('social_style_tabs');

                $this->start_controls_tab(
                    'social_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'ht-teammember' ),
                    ]
                );

                    $this->add_control(
                        'social_color',
                        [
                            'label' => __( 'Color', 'ht-teammember' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' => '#ffffff',
                            'selectors' => [
                                '{{WRAPPER}} .social-network li a' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_control(
                        'social_size',
                        [
                            'label' => __( 'Font Size', 'ht-teammember' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 100,
                                    'step' => 1,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'default' => [
                                'unit' => 'px',
                                'size' => 14,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .social-network li a' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                $this->end_controls_tab();

                // Hover Tab
                $this->start_controls_tab(
                    'social_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'ht-teammember' ),
                    ]
                );
                    $this->add_control(
                        'social_hover_color',
                        [
                            'label' => __( 'Color', 'ht-teammember' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' => '#ffffff',
                            'selectors' => [
                                '{{WRAPPER}} .social-network li a:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                $this->end_controls_tab();

            $this->end_controls_tabs();

        $this->end_controls_section();

        // Style instagram arrow style start
        $this->start_controls_section(
            'slider_arrow_style',
            [
                'label'     => __( 'Arrow', 'ht-teammember' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' =>[
                    'slider_on' => 'yes',
                    'slarrows'  => 'yes',
                ],
            ]
        );
            
            $this->start_controls_tabs( 'slider_arrow_style_tabs' );

                // Normal tab Start
                $this->start_controls_tab(
                    'slider_arrow_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'ht-teammember' ),
                    ]
                );

                    $this->add_control(
                        'slider_arrow_color',
                        [
                            'label' => __( 'Color', 'ht-teammember' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' => '#ffffff',
                            'selectors' => [
                                '{{WRAPPER}} .ht-carousel .slick-arrow' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_control(
                        'slider_arrow_fontsize',
                        [
                            'label' => __( 'Font Size', 'ht-teammember' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 100,
                                    'step' => 1,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'default' => [
                                'unit' => 'px',
                                'size' => 16,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .ht-carousel .slick-arrow' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name' => 'slider_arrow_background',
                            'label' => __( 'Background', 'ht-teammember' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .ht-carousel .slick-arrow',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'slider_arrow_border',
                            'label' => __( 'Border', 'ht-teammember' ),
                            'selector' => '{{WRAPPER}} .ht-carousel .slick-arrow',
                        ]
                    );

                    $this->add_responsive_control(
                        'slider_arrow_border_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'ht-teammember' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .ht-carousel .slick-arrow' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );

                    $this->add_control(
                        'slider_arrow_height',
                        [
                            'label' => __( 'Height', 'ht-teammember' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                    'step' => 1,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'default' => [
                                'unit' => 'px',
                                'size' => 30,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .ht-carousel .slick-arrow' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_control(
                        'slider_arrow_width',
                        [
                            'label' => __( 'Width', 'ht-teammember' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                    'step' => 1,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'default' => [
                                'unit' => 'px',
                                'size' => 30,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .ht-carousel .slick-arrow' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_responsive_control(
                        'slider_arrow_padding',
                        [
                            'label' => __( 'Padding', 'ht-teammember' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%', 'em' ],
                            'selectors' => [
                                '{{WRAPPER}} .ht-carousel .slick-arrow' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'separator' =>'before',
                        ]
                    );

                $this->end_controls_tab(); // Normal tab end

                // Hover tab Start
                $this->start_controls_tab(
                    'slider_arrow_style_hover_tab',
                    [
                        'label' => __( 'Hover', 'ht-teammember' ),
                    ]
                );

                    $this->add_control(
                        'slider_arrow_hover_color',
                        [
                            'label' => __( 'Color', 'ht-teammember' ),
                            'type' => Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => Scheme_Color::get_type(),
                                'value' => Scheme_Color::COLOR_1,
                            ],
                            'default' => '#ffffff',
                            'selectors' => [
                                '{{WRAPPER}} .ht-carousel .slick-arrow:hover' => 'color: {{VALUE}};',
                            ],
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name' => 'slider_arrow_hover_background',
                            'label' => __( 'Background', 'ht-teammember' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .ht-carousel .slick-arrow:hover',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'slider_arrow_hover_border',
                            'label' => __( 'Border', 'ht-teammember' ),
                            'selector' => '{{WRAPPER}} .ht-carousel .slick-arrow:hover',
                        ]
                    );

                    $this->add_responsive_control(
                        'slider_arrow_hover_border_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'ht-teammember' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .ht-carousel .slick-arrow:hover' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );

                $this->end_controls_tab(); // Hover tab end

            $this->end_controls_tabs();

        $this->end_controls_section(); // Style instagram arrow style end


        // Style instagram Dots style start
        $this->start_controls_section(
            'slider_dots_style',
            [
                'label'     => __( 'Pagination', 'ht-teammember' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' =>[
                    'slider_on' => 'yes',
                    'sldots'  => 'yes',
                ],
            ]
        );
            
            $this->start_controls_tabs( 'slider_dots_style_tabs' );

                // Normal tab Start
                $this->start_controls_tab(
                    'slider_dots_style_normal_tab',
                    [
                        'label' => __( 'Normal', 'ht-teammember' ),
                    ]
                );

                    $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name' => 'slider_dots_background',
                            'label' => __( 'Background', 'ht-teammember' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .ht-carousel .slick-dots li',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'slider_instagram_dots_border',
                            'label' => __( 'Border', 'ht-teammember' ),
                            'selector' => '{{WRAPPER}} .ht-carousel .slick-dots li',
                        ]
                    );

                    $this->add_responsive_control(
                        'slider_dots_border_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'ht-teammember' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .ht-carousel .slick-dots li' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );

                    $this->add_control(
                        'slider_dots_height',
                        [
                            'label' => __( 'Height', 'ht-teammember' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                    'step' => 1,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'default' => [
                                'unit' => 'px',
                                'size' => 15,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .ht-carousel .slick-dots li' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ]
                    );

                    $this->add_control(
                        'slider_dots_width',
                        [
                            'label' => __( 'Width', 'ht-teammember' ),
                            'type' => Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                    'step' => 1,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'default' => [
                                'unit' => 'px',
                                'size' => 15,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .ht-carousel .slick-dots li' => 'width: {{SIZE}}{{UNIT}} !important;',
                            ],
                        ]
                    );

                $this->end_controls_tab(); // Normal tab end

                // Hover tab Start
                $this->start_controls_tab(
                    'slider_dots_style_hover_tab',
                    [
                        'label' => __( 'Active', 'ht-teammember' ),
                    ]
                );

                    $this->add_group_control(
                        Group_Control_Background::get_type(),
                        [
                            'name' => 'slider_dots_hover_background',
                            'label' => __( 'Background', 'ht-teammember' ),
                            'types' => [ 'classic', 'gradient' ],
                            'selector' => '{{WRAPPER}} .ht-carousel .slick-dots li.slick-active',
                        ]
                    );

                    $this->add_group_control(
                        Group_Control_Border::get_type(),
                        [
                            'name' => 'slider_dots_hover_border',
                            'label' => __( 'Border', 'ht-teammember' ),
                            'selector' => '{{WRAPPER}} .ht-carousel .slick-dots li.slick-active',
                        ]
                    );

                    $this->add_responsive_control(
                        'slider_dots_hover_border_radius',
                        [
                            'label' => esc_html__( 'Border Radius', 'ht-teammember' ),
                            'type' => Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .ht-carousel .slick-dots li.slick-active' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                            ],
                        ]
                    );

                $this->end_controls_tab(); // Hover tab end

            $this->end_controls_tabs();

        $this->end_controls_section(); // Style instagram dots style end


    }

    protected function render( $instance = [] ) {

        $settings   = $this->get_settings_for_display();
        $custom_order_ck    = $this->get_settings_for_display('custom_order');
        $orderby            = $this->get_settings_for_display('orderby');
        $order              = $this->get_settings_for_display('order');
        $limit              = $this->get_settings_for_display('limit');
        $id                 = $this->get_id();

        $this->add_render_attribute( 'team_member_attr', 'class', 'team_area' );
        $this->add_render_attribute( 'team_member_attr', 'class', 'team_style_'.$settings['team_style'] );
        if( $settings['show_gutter'] != 'yes' ){
            $this->add_render_attribute( 'team_member_attr', 'class', 'no_gutter' );
        }

        if( $settings['slider_on'] == 'yes' ){

            $this->add_render_attribute( 'slider_attr', 'class', 'ht-carousel' );
            $slider_settings = [
                'arrows' => ('yes' === $settings['slarrows']),
                'arrow_prev_txt' => $settings['slprevicon'],
                'arrow_next_txt' => $settings['slnexticon'],
                'dots' => ('yes' === $settings['sldots']),
                'autoplay' => ('yes' === $settings['slautolay']),
                'autoplay_speed' => absint($settings['slautoplay_speed']),
                'animation_speed' => absint($settings['slanimation_speed']),
                'center_mode' => ( 'yes' === $settings['slcentermode']),
                'center_padding' => absint($settings['slcenterpadding']),
            ];

            $slider_responsive_settings = [
                'rows' => $settings['slrows'],
                'display_columns' => $settings['slitems'],
                'scroll_columns' => $settings['slscroll_columns'],
                'tablet_width' => $settings['sltablet_width'],
                'tablet_display_columns' => $settings['sltablet_display_columns'],
                'tablet_scroll_columns' => $settings['sltablet_scroll_columns'],
                'mobile_width' => $settings['slmobile_width'],
                'mobile_display_columns' => $settings['slmobile_display_columns'],
                'mobile_scroll_columns' => $settings['slmobile_scroll_columns'],
            ];

            $slider_settings = array_merge( $slider_settings, $slider_responsive_settings );
            $this->add_render_attribute( 'slider_attr', 'data-settings', wp_json_encode( $slider_settings ) );
        }

        $get_team_name = $settings['teams_list'];
        $args = array(
            'post_type'             => 'htteam_member',
            'post_status'           => 'publish',
            'ignore_sticky_posts'   => 1,
            'posts_per_page'        => empty( $get_team_name ) ? $limit : -1,
        );

        if( $get_team_name >= 1 ) { 
            $team_ids = implode(', ', $get_team_name); 
        } else { $team_ids = ''; }
        $team_names = explode(',', $team_ids);

        if ( !empty( $get_team_name ) ) {
            $args['post__in'] = $team_names;
        }

        // Custom Order
        if( $custom_order_ck == 'yes' ){
            $args['orderby']    = $orderby;
            $args['order']      = $order;
        }

        $teammember = new \WP_Query( $args );

        $itemwidth = 100/$settings['team_col'];

    ?>
            <div <?php echo $this->get_render_attribute_string('team_member_attr'); ?> >
                
                <div <?php echo $this->get_render_attribute_string('slider_attr'); ?> >
                    <?php
                        if( $teammember->have_posts() ){

                            while ( $teammember->have_posts() ) {
                                $teammember->the_post();

                                $designation =  get_post_meta( get_the_ID(), 'htdesignation', true );
                                $socialitem = get_post_meta( get_the_ID(), 'socialmedia_group', true );

                                ?>
                                    <div class="item-col" style="<?php echo 'width:'.esc_attr( $itemwidth ).'%';?>">
                                        <div class="single-team">

                                            <?php if( $settings['team_style'] == '2' ):?>
                                                <div class="team-thumb">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_post_thumbnail(); ?>
                                                    </a>
                                                    <div class="team-hover-action">
                                                        <div class="hover-action">
                                                            <?php if( $settings['show_name'] === 'yes' ): ?>
                                                                <h4 class="team-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                            <?php endif; ?>
                                                            <?php
                                                                if( isset( $designation ) && $settings['show_designation'] === 'yes' ){
                                                                    echo '<p class="team-designation">'.esc_html( $designation ).'</p>';
                                                                }
                                                            ?>
                                                            <?php if( $settings['show_bio'] === 'yes' ){ echo '<div class="team-bio"><p>'.get_the_excerpt().'</p></div>'; } ?>
                                                            <?php if( isset($socialitem) && $settings['show_socialmedia'] === 'yes' ): ?>
                                                                <ul class="social-network">
                                                                    <?php foreach ( $socialitem as $key => $value ) { ?>
                                                                        <li><a href="<?php echo esc_url( $value['sociallink'] );?>"><i class="fa <?php echo esc_attr__($value['socialicon'],'ht-teammember');?>"></i></a></li>
                                                                    <?php } ?>
                                                                </ul>
                                                            <?php endif;?>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php elseif( $settings['team_style'] == '3' ):?>
                                                <div class="thumb">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_post_thumbnail(); ?>
                                                    </a>
                                                    <div class="team-hover-action">

                                                        <div class="team-click-action">
                                                            <div class="plus_click"></div>
                                                            <?php if( $settings['show_name'] === 'yes' ): ?>
                                                                <h4 class="team-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                            <?php endif; ?>
                                                            <?php
                                                                if( isset( $designation ) && $settings['show_designation'] === 'yes' ){
                                                                    echo '<p class="team-designation">'.esc_html( $designation ).'</p>';
                                                                }
                                                            ?>
                                                            <?php
                                                                if( $settings['show_bio'] === 'yes' ){
                                                                    echo '<div class="team-bio"><p>'.get_the_excerpt().'</p></div>';
                                                                }
                                                            ?>
                                                            <?php if( isset($socialitem) && $settings['show_socialmedia'] === 'yes' ): ?>
                                                                <ul class="social-network">
                                                                    <?php foreach ( $socialitem as $key => $value ) { ?>
                                                                        <li><a href="<?php echo esc_url( $value['sociallink'] );?>"><i class="fa <?php echo esc_attr__($value['socialicon'],'ht-teammember');?>"></i></a></li>
                                                                    <?php } ?>
                                                                </ul>
                                                            <?php endif;?>

                                                        </div>

                                                    </div>
                                                </div>

                                            <?php elseif( $settings['team_style'] == '4' ):?>
                                                <div class="thumb">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_post_thumbnail(); ?>
                                                    </a>
                                                </div>
                                                <div class="team-info">
                                                    <div class="content">
                                                        <?php if( $settings['show_name'] === 'yes' ): ?>
                                                            <h4 class="team-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                        <?php endif; ?>
                                                        <?php
                                                            if( isset( $designation ) && $settings['show_designation'] === 'yes' ){
                                                                echo '<p class="team-designation">'.esc_html( $designation ).'</p>';
                                                            }
                                                        ?>
                                                        <?php
                                                            if( $settings['show_bio'] === 'yes' ){
                                                                echo '<div class="team-bio"><p>'.get_the_excerpt().'</p></div>';
                                                            }
                                                        ?>
                                                    </div>

                                                    <?php if( isset($socialitem) && $settings['show_socialmedia'] === 'yes' ): ?>
                                                        <ul class="social-network">
                                                            <?php foreach ( $socialitem as $key => $value ) { ?>
                                                                <li><a href="<?php echo esc_url( $value['sociallink'] );?>"><i class="fa <?php echo esc_attr__($value['socialicon'],'ht-teammember');?>"></i></a></li>
                                                            <?php } ?>
                                                        </ul>
                                                    <?php endif;?>
                                                </div>

                                            <?php elseif( $settings['team_style'] == '5' ):?>
                                                <div class="thumb">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_post_thumbnail(); ?>
                                                    </a>
                                                    <div class="team-hover-action">
                                                        <div class="hover-action">
                                                            <?php if( isset($socialitem) && $settings['show_socialmedia'] === 'yes' ): ?>
                                                                <ul class="social-network">
                                                                    <?php foreach ( $socialitem as $key => $value ) { ?>
                                                                        <li><a href="<?php echo esc_url( $value['sociallink'] );?>"><i class="fa <?php echo esc_attr__($value['socialicon'],'ht-teammember');?>"></i></a></li>
                                                                    <?php } ?>
                                                                </ul>
                                                            <?php endif;?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <?php if( $settings['show_name'] === 'yes' ): ?>
                                                        <h4 class="team-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                    <?php endif; ?>
                                                    <?php
                                                        if( isset( $designation ) && $settings['show_designation'] === 'yes' ){
                                                            echo '<p class="team-designation">'.esc_html( $designation ).'</p>';
                                                        }
                                                    ?>
                                                    <?php
                                                        if( $settings['show_bio'] === 'yes' ){
                                                            echo '<div class="team-bio"><p>'.get_the_excerpt().'</p></div>';
                                                        }
                                                    ?>
                                                </div>

                                            <?php else:?>
                                                <div class="team-thumb">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_post_thumbnail(); ?>
                                                    </a>
                                                    <div class="team-hover-action">
                                                        <div class="team-hover">
                                                            <?php if( isset($socialitem) && $settings['show_socialmedia'] === 'yes' ): ?>
                                                                <ul class="social-network">
                                                                    <?php foreach ( $socialitem as $key => $value ) { ?>
                                                                        <li><a href="<?php echo esc_url( $value['sociallink'] );?>"><i class="fa <?php echo esc_attr__($value['socialicon'],'ht-teammember');?>"></i></a></li>
                                                                    <?php } ?>
                                                                </ul>
                                                            <?php endif;?>
                                                            <?php
                                                                if( $settings['show_bio'] === 'yes' ){
                                                                    echo '<div class="team-bio"><p>'.get_the_excerpt().'</p></div>';
                                                                }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <?php if( $settings['show_name'] === 'yes' ): ?>
                                                        <h4 class="team-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                    <?php endif; ?>
                                                    <?php
                                                        if( isset( $designation ) && $settings['show_designation'] === 'yes' ){
                                                            echo '<p class="team-designation">'.esc_html( $designation ).'</p>';
                                                        }
                                                    ?>
                                                </div>
                                            <?php endif;?>

                                        </div>
                                    </div>

                                <?php

                            }

                        }
                    ?>
                </div>

            </div>

        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new HTteammember_Elementor_Widget_Instagram() );