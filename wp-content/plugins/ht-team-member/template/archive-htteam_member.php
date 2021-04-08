<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ftctheme
 */

get_header(); ?>

<div class="htteam_archive">
    <div class="container">
        <div class="row">
            
            <div class="col-md-12">
                <?php
                    if ( have_posts() ) {
                        echo '<div class="team_area">';
                            while ( have_posts() ) : the_post();

                                $designation =  get_post_meta( get_the_ID(), 'htdesignation', true );
                                $socialitem = get_post_meta( get_the_ID(), 'socialmedia_group', true );
                                ?>
                                    <div class="item-col" style="<?php echo 'width:25%';?>">

                                        <div class="single-team">
                                            <div class="team-thumb">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_post_thumbnail(); ?>
                                                </a>
                                                <div class="team-hover-action">
                                                    <div class="team-hover">
                                                        <?php if( isset($socialitem) ): ?>
                                                            <ul class="social-network">
                                                                <?php foreach ( $socialitem as $key => $value ) { ?>
                                                                    <li><a href="<?php echo esc_url( $value['sociallink'] );?>"><i class="fa <?php echo esc_attr__($value['socialicon'],'ht-teammember');?>"></i></a></li>
                                                                <?php } ?>
                                                            </ul>
                                                        <?php endif;?>
                                                        <?php
                                                            echo '<div class="team-bio"><p>'.get_the_excerpt().'</p></div>';
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                    <h4 class="team-name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                <?php
                                                    if( isset( $designation ) ){
                                                        echo '<p class="team-designation">'.esc_html( $designation ).'</p>';
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        
                                    </div>
                                <?php
                            endwhile;
                        echo '</div>';
                        ?>
                            <div class="htpost-pagination"> <?php
                                the_posts_pagination(array(
                                    'prev_text' => '<i class="fa fa-angle-left"></i>',
                                    'next_text' => '<i class="fa fa-angle-right"></i>',
                                    'type'      => 'list'
                                )); ?>
                            </div>
                        <?php
                    }
                    else {
                        ecs_html_e('There is No Team Member');
                    }
                ?>
            </div>

        </div><!-- #main -->
    </div><!-- #primary -->
</div><!-- #primary -->

<?php get_footer();
