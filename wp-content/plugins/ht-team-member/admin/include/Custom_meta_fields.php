<?php
    
    add_action('admin_init', 'htteammember_add_meta_boxes', 2);
    function htteammember_add_meta_boxes(){
        add_meta_box(
            'socialmedia-group', 
            __( 'Team Member Extra Options', 'ht-teammember' ), 
            'htteammember_meta_box_display', 
            'htteam_member', 
            'normal', 
            'default'
        );
    }

    function htteammember_meta_box_display(){
        global $post;
        $socialmedia_group = get_post_meta( $post->ID, 'socialmedia_group', true );
        $designation = get_post_meta( $post->ID, 'htdesignation', true );
        wp_nonce_field( 'htm_repeatable_meta_box_nonce', 'htm_repeatable_meta_box_nonce' );

        ?>
            <script type="text/javascript">
                jQuery(document).ready(function( $ ){
                    $( '#add-row' ).on('click', function() {
                        var row = $( '.empty-row.screen-reader-text' ).clone(true);
                        row.removeClass( 'empty-row screen-reader-text' );
                        row.insertBefore( '#htrepeatable-fieldset tbody>tr:last' );
                        return false;
                    });

                    $( '.remove-row' ).on('click', function() {
                        $(this).parents('tr').remove();
                        return false;
                    });
                });
            </script>

            <table width="100%" class="htteam_meta_box_table">
                <tr>
                    <td width="45%">
                        <label><?php esc_html_e( 'Designation', 'ht-teammember' ); ?></label>
                        <input type="text"  placeholder="<?php echo esc_attr__( 'Developer', 'ht-teammember' ); ?>" name="htdesignation" value="<?php if( $designation != '') echo esc_attr( $designation ); ?>" />
                    </td>
                    <td width="55%"></td>
                </tr>
            </table>

            <h2 class="table_title"><?php esc_html_e( 'Social Media', 'ht-teammember' ); ?></h2>
            <table id="htrepeatable-fieldset" class="htteam_meta_box_table" width="100%">
                <tbody>
                <?php
                    if ( $socialmedia_group ) :
                        foreach ( $socialmedia_group as $field ) {
                            ?>
                            <tr>
                                <td width="45%">
                                    <label><?php esc_html_e( 'Social Icon', 'ht-teammember' ); ?></label>
                                    <input type="text"  placeholder="<?php echo esc_attr__( 'fa-facebook', 'ht-teammember' ); ?>" name="socialicon[]" value="<?php if( $field['socialicon'] != '') echo esc_attr( $field['socialicon'] ); ?>" />
                                </td>
                                <td width="45%">
                                  <label><?php esc_html_e( 'Social Media Link', 'ht-teammember' ); ?></label>
                                  <input type="text"  placeholder="<?php echo esc_attr__( 'http://facebook.com/', 'ht-teammember' ); ?>" name="sociallink[]" value="<?php if( $field['sociallink'] != '') echo esc_attr( $field['sociallink'] ); ?>" />

                                </td>
                                <td width="10%"><a class="button remove-row" href="#1"><?php esc_html_e( 'Remove', 'ht-teammember' ); ?></a></td>
                            </tr>
                            <?php
                        }

                    else :
                    // show a blank one
                ?>
                    <tr>
                        <td>
                            <label><?php esc_html_e( 'Social Icon', 'ht-teammember' ); ?></label>
                            <input type="text" placeholder="<?php echo esc_attr__( 'fa-facebook', 'ht-teammember' ); ?>" name="socialicon[]" />
                        </td>
                        <td>
                            <label><?php esc_html_e( 'Social Media Link', 'ht-teammember' ); ?></label>
                            <input type="text"  placeholder="<?php echo esc_attr__( 'http://facebook.com/', 'ht-teammember' ); ?>" name="sociallink[]" />
                        </td>
                        <td><a class="button  remove-row button-disabled" href="#"><?php esc_html_e( 'Remove', 'ht-teammember' ); ?></a></td>
                    </tr>
                <?php endif; ?>
                    <!-- empty hidden one for jQuery -->
                    <tr class="empty-row screen-reader-text">
                        <td>
                            <label><?php esc_html_e( 'Social Icon', 'ht-teammember' ); ?></label>
                            <input type="text" placeholder="<?php echo esc_attr__( 'fa-facebook', 'ht-teammember' ); ?>" name="socialicon[]"/>
                        </td>

                        <td>
                            <label><?php esc_html_e( 'Social Media Link', 'ht-teammember' ); ?></label>
                            <input type="text" placeholder="<?php echo esc_attr__( 'http://facebook.com/', 'ht-teammember' ); ?>" name="sociallink[]" />
                        </td>

                        <td><a class="button remove-row" href="#"><?php esc_html_e( 'Remove', 'ht-teammember' ); ?></a></td>
                    </tr>

                </tbody>
            </table>
            <p><a id="add-row" class="button" href="#"><?php esc_html_e( 'Add another', 'ht-teammember' ); ?></a></p>

        <?php
    }

    add_action('save_post', 'htteammember_meta_box_save');
    function htteammember_meta_box_save( $post_id ){

        if ( ! isset( $_POST['htm_repeatable_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['htm_repeatable_meta_box_nonce'], 'htm_repeatable_meta_box_nonce' ) ){
            return;
        }

        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
            return;
        }

        if (!current_user_can('edit_post', $post_id)){
            return;
        }

        // Social Icon Group
        $old = get_post_meta( $post_id, 'socialmedia_group', true );
        $new = array();
        $socialmedaiItems   = $_POST['socialicon'];
        $social             = $_POST['sociallink'];
        $count              = count( $socialmedaiItems );

        for ( $i = 0; $i < $count; $i++ ) {
            if ( $socialmedaiItems[$i] != '' ){
                $new[$i]['socialicon'] = stripslashes( strip_tags( $socialmedaiItems[$i] ) );
                $new[$i]['sociallink'] = stripslashes( $social[$i] );
            }
        }

        if ( !empty( $new ) && $new != $old ){
            update_post_meta( $post_id, 'socialmedia_group', $new );
        }
        elseif ( empty($new) && $old ){
            delete_post_meta( $post_id, 'socialmedia_group', $old );
        }

        // Designation
        $olddes     = get_post_meta( $post_id, 'htdesignation', true );
        $desination = stripslashes( $_POST['htdesignation'] );

        if ( !empty( $desination ) && $desination != $olddes ){
            update_post_meta( $post_id, 'htdesignation', $desination );
        }
        elseif ( empty($desination) && $olddes ){
            delete_post_meta( $post_id, 'htdesignation', $olddes );
        }

    }




?>