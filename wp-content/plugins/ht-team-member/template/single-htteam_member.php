<?php
/**
 * The template for displaying all documentaion single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ftctheme
 */

get_header();

?>
<div class="page-wrapper htteam-details-area">

    <div class="container">
        <?php
            if(have_posts()):
                while(have_posts()) : the_post();

                    $designation =  get_post_meta( get_the_ID(), 'htdesignation', true );
                    $socialitem = get_post_meta( get_the_ID(), 'socialmedia_group', true );
        ?>
            <div class="row">
                <div class="col-md-3">
                    <div class="team-thumb">
                        <?php the_post_thumbnail(); ?>
                    </div>
                </div>
                <div class="col-md-9">
                    <h4 class="team-name"><?php the_title(); ?></h4>
                    <?php
                        if( isset( $designation ) ){
                            echo '<p class="team-designation">'.esc_html( $designation ).'</p>';
                        }
                    ?>
                    <div class="team-bio-details"><?php the_content(); ?></div>
                    <?php if( isset($socialitem) ): ?>
                        <ul class="htsocial-network">
                            <?php foreach ( $socialitem as $key => $value ) { ?>
                                <li><a href="<?php echo esc_url( $value['sociallink'] );?>"><i class="fa <?php echo esc_attr__($value['socialicon'],'ht-teammember');?>"></i></a></li>
                            <?php } ?>
                        </ul>
                    <?php endif;?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <?php 
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                    ?>
                </div>
            </div>

            <?php endwhile; ?>
        <?php endif; ?>

    </div>

</div>
<?php
get_footer();