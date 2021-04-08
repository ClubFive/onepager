<?php

    if( !function_exists( 'htteammember_shortcode' ) ){

        function htteammember_shortcode( $atts ){
            extract( shortcode_atts( array(
                
                'limit'                 => 4
                ,'column'               => 4
                ,'layout'               => 1
                ,'order'                => 'ASC'
                ,'show_name'            => 'yes'
                ,'show_designation'     => 'yes'
                ,'show_bio'             => 'yes'
                ,'show_socialmedia'     => 'yes'
                ,'teams_list'           => ''

                ,'slideron'    => 'no'
                ,'slarrows'     => 'no'
                ,'slprevicon'   => 'fa fa-angle-left'
                ,'slnexticon'   => 'fa fa-angle-right'
                ,'sldots'       => 'no'
                ,'slautolay'    => 'yes'
                ,'slautoplay_speed'         => 3000
                ,'slanimation_speed'        => 300
                ,'slcentermode'             => 'no'
                ,'slcenterpadding'          => 0
                ,'slitems'                  => 4
                ,'slrows'                   => 1
                ,'slscroll_columns'         => 1
                ,'sltablet_width'           => 750
                ,'sltablet_display_columns' => 1
                ,'sltablet_scroll_columns'  => 1
                ,'slmobile_width'           => 480
                ,'slmobile_display_columns' => 1
                ,'slmobile_scroll_columns'  => 1

                ,'name_color'          => '#343434'
                ,'bio_color'           => '#343434'
                ,'desi_color'          => '#343434'
                ,'social_color'        => '#343434'
                ,'social_hovcolor'     => '#343434'

            ), $atts ) );

            $unique_class = uniqid('teammember_style_');
            $teamclass = array( $unique_class, 'team_area', 'team_style_'.$layout );

            $slider_atts = array();
            $slider_atts['class'] = '';
            if( $slideron == 'yes' ){

                $slider_atts['class'] = 'ht-carousel';

                $slider_settings = [
                    'arrows' => ( 'yes' === $slarrows ),
                    'arrow_prev_txt' => $slprevicon,
                    'arrow_next_txt' => $slnexticon,
                    'dots' => ( 'yes' === $sldots ),
                    'autoplay' => ( 'yes' === $slautolay ),
                    'autoplay_speed' => absint( $slautoplay_speed ),
                    'animation_speed' => absint( $slanimation_speed ),
                    'center_mode' => ( 'yes' === $slcentermode ),
                    'center_padding' => absint( $slcenterpadding ),
                ];

                $slider_responsive_settings = [
                    'rows' => $slrows,
                    'display_columns' => $slitems,
                    'scroll_columns' => $slscroll_columns,
                    'tablet_width' => $sltablet_width,
                    'tablet_display_columns' => $sltablet_display_columns,
                    'tablet_scroll_columns' => $sltablet_scroll_columns,
                    'mobile_width' => $slmobile_width,
                    'mobile_display_columns' => $slmobile_display_columns,
                    'mobile_scroll_columns' => $slmobile_scroll_columns,
                ];

                $slider_settings = array_merge( $slider_settings, $slider_responsive_settings );
            }

            // Register CSS and JS
            if( $slideron == 'yes' ){
                wp_enqueue_style('slick');
                wp_enqueue_script('ht-teammin');
            }

            $argss = array(
                'post_type'             => 'htteam_member',
                'post_status'           => 'publish',
                'ignore_sticky_posts'   => 1,
                'posts_per_page'        => empty( $teams_list ) ? $limit : -1,
                'order'                 => $order,
            );

            if( $teams_list >= 1 ) { 
                $team_names = explode(',', $teams_list);
            } else { $team_names = ''; }

            if ( !empty( $teams_list ) ) {
                $argss['post__in'] = $team_names;
            }

            $teammember = new WP_Query( $argss );

            $itemwidth = 100/$column;

            ob_start();

            $output = '';
            // custom style
            $output .= '<style>';
            $output .= ".$unique_class .single-team h4.team-name a{ color: $name_color; }";
            $output .= ".$unique_class .single-team .team-bio p{ color: $bio_color; }";
            $output .= ".$unique_class .single-team p.team-designation{ color: $desi_color; }";
            $output .= ".$unique_class .single-team .social-network li a{ color: $social_color; }";
            $output .= ".$unique_class .single-team .social-network li a:hover{ color: $social_hovcolor; }";
            $output .= '</style>';

            ?>
                

                <div class="<?php echo implode(' ', $teamclass ); ?>" >
                    <div class="<?php echo implode(' ', $slider_atts ); ?>" data-settings='<?php if( $slideron == 'yes' ){ echo wp_json_encode( $slider_settings ); }else{echo 'no-opt'; } ?>'>
                        <?php
                            if( $teammember->have_posts() ){
                                $i = 0;
                                while ( $teammember->have_posts() ) {
                                    $i++;
                                    $teammember->the_post();

                                    $designation =  get_post_meta( get_the_ID(), 'htdesignation', true );
                                    $socialitem = get_post_meta( get_the_ID(), 'socialmedia_group', true );

                                    ?>
                                    <div class="item-col" style="<?php echo 'width:'.esc_attr( $itemwidth ).'%';?>">
                                        <div class="single-team">
                                            <?php if( $layout == '2' ):?>
                                                <div class="team-thumb">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_post_thumbnail(); ?>
                                                    </a>
                                                    <div class="team-hover-action">
                                                        <div class="hover-action">
                                                            <?php if( $show_name === 'yes' ): ?>
                                                                <h4 class="team-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                            <?php endif; ?>
                                                            <?php
                                                                if( isset( $designation ) && $show_designation === 'yes' ){
                                                                    echo '<p class="team-designation">'.esc_html( $designation ).'</p>';
                                                                }
                                                            ?>
                                                            <?php if( $show_bio === 'yes' ){ echo '<div class="team-bio"><p>'.get_the_excerpt().'</p></div>'; } ?>
                                                            <?php if( isset($socialitem) && $show_socialmedia === 'yes' ): ?>
                                                                <ul class="social-network">
                                                                    <?php foreach ( $socialitem as $key => $value ) { ?>
                                                                        <li><a href="<?php echo esc_url( $value['sociallink'] );?>"><i class="fa <?php echo esc_attr__($value['socialicon'],'ht-teammember');?>"></i></a></li>
                                                                    <?php } ?>
                                                                </ul>
                                                            <?php endif;?>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php elseif( $layout == '3' ):?>
                                                <div class="thumb">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_post_thumbnail(); ?>
                                                    </a>
                                                    <div class="team-hover-action">

                                                        <div class="team-click-action">
                                                            <div class="plus_click"></div>
                                                            <?php if( $show_name === 'yes' ): ?>
                                                                <h4 class="team-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                            <?php endif; ?>
                                                            <?php
                                                                if( isset( $designation ) && $show_designation === 'yes' ){
                                                                    echo '<p class="team-designation">'.esc_html( $designation ).'</p>';
                                                                }
                                                            ?>
                                                            <?php
                                                                if( $show_bio === 'yes' ){
                                                                    echo '<div class="team-bio"><p>'.get_the_excerpt().'</p></div>';
                                                                }
                                                            ?>
                                                            <?php if( isset($socialitem) && $show_socialmedia === 'yes' ): ?>
                                                                <ul class="social-network">
                                                                    <?php foreach ( $socialitem as $key => $value ) { ?>
                                                                        <li><a href="<?php echo esc_url( $value['sociallink'] );?>"><i class="fa <?php echo esc_attr__($value['socialicon'],'ht-teammember');?>"></i></a></li>
                                                                    <?php } ?>
                                                                </ul>
                                                            <?php endif;?>

                                                        </div>

                                                    </div>
                                                </div>

                                            <?php elseif( $layout == '4' ):?>
                                                <div class="thumb">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_post_thumbnail(); ?>
                                                    </a>
                                                </div>
                                                <div class="team-info">
                                                    <div class="content">
                                                        <?php if( $show_name === 'yes' ): ?>
                                                            <h4 class="team-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                        <?php endif; ?>
                                                        <?php
                                                            if( isset( $designation ) && $show_designation === 'yes' ){
                                                                echo '<p class="team-designation">'.esc_html( $designation ).'</p>';
                                                            }
                                                        ?>
                                                        <?php
                                                            if( $show_bio === 'yes' ){
                                                                echo '<div class="team-bio"><p>'.get_the_excerpt().'</p></div>';
                                                            }
                                                        ?>
                                                    </div>

                                                    <?php if( isset($socialitem) && $show_socialmedia === 'yes' ): ?>
                                                        <ul class="social-network">
                                                            <?php foreach ( $socialitem as $key => $value ) { ?>
                                                                <li><a href="<?php echo esc_url( $value['sociallink'] );?>"><i class="fa <?php echo esc_attr__($value['socialicon'],'ht-teammember');?>"></i></a></li>
                                                            <?php } ?>
                                                        </ul>
                                                    <?php endif;?>
                                                </div>

                                            <?php elseif( $layout == '5' ):?>
                                                <div class="thumb">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_post_thumbnail(); ?>
                                                    </a>
                                                    <div class="team-hover-action">
                                                        <div class="hover-action">
                                                            <?php if( isset($socialitem) && $show_socialmedia === 'yes' ): ?>
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
                                                    <?php if( $show_name === 'yes' ): ?>
                                                        <h4 class="team-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                    <?php endif; ?>
                                                    <?php
                                                        if( isset( $designation ) && $show_designation === 'yes' ){
                                                            echo '<p class="team-designation">'.esc_html( $designation ).'</p>';
                                                        }
                                                    ?>
                                                    <?php
                                                        if( $show_bio === 'yes' ){
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
                                                            <?php if( isset($socialitem) && $show_socialmedia === 'yes' ): ?>
                                                                <ul class="social-network">
                                                                    <?php foreach ( $socialitem as $key => $value ) { ?>
                                                                        <li><a href="<?php echo esc_url( $value['sociallink'] );?>"><i class="fa <?php echo esc_attr__($value['socialicon'],'ht-teammember');?>"></i></a></li>
                                                                    <?php } ?>
                                                                </ul>
                                                            <?php endif;?>
                                                            <?php
                                                                if( $show_bio === 'yes' ){
                                                                    echo '<div class="team-bio"><p>'.get_the_excerpt().'</p></div>';
                                                                }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <?php if( $show_name === 'yes' ): ?>
                                                        <h4 class="team-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                    <?php endif; ?>
                                                    <?php
                                                        if( isset( $designation ) && $show_designation === 'yes' ){
                                                            echo '<p class="team-designation">'.esc_html( $designation ).'</p>';
                                                        }
                                                    ?>
                                                </div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <?php
                                    if( ( $limit == $i ) && empty( $teams_list ) ){
                                        break;
                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            <?php
            
            wp_reset_postdata();
            wp_reset_query();

            $output .= ob_get_clean();
            return $output;

        }
        add_shortcode( 'htteamember', 'htteammember_shortcode' );

    }


?>