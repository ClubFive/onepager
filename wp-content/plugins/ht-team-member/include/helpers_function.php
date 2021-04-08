<?php

    /**
     * Post type name
     * @return array
     */
    function htteammember_postlist_name( $post = 'post' ){

        $team_list = array( 'posts_per_page' => -1, 'post_type'=> $post );
        $post_terms = get_posts( $team_list );
        if ( ! empty( $post_terms ) && ! is_wp_error( $post_terms ) ){
            foreach ( $post_terms as $term ) {
                $options[ $term->ID ] = $term->post_title;
            }
            return $options;
        }

    }


?>