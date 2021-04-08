<?php

if ( !class_exists('htteammember_default_widgets') ) {
	class htteammember_default_widgets extends WP_Widget{

		function __construct(){

			add_action( 'load-widgets.php', array( $this, 'htteammember_widgets_assest') );

			$widget_options = array(
				'description' 					=> esc_html__('WP TeamMember', 'ht-teammember'), 
				'customize_selective_refresh' 	=> true,
			);

			parent:: __construct('htteammember_default_widgets', esc_html__( 'HT : TeamMember', 'ht-teammember'), $widget_options );

		}

		public function htteammember_widgets_assest() {    
	        wp_enqueue_style( 'wp-color-picker' );        
	        wp_enqueue_script( 'wp-color-picker' );    
	    }

		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 *
		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget($args, $instance){ 

			$title = isset( $instance['title'] ) ? $instance['title'] : '';
			$limit = isset( $instance['limit'] ) ? $instance['limit'] : 1;
			$column = isset( $instance['column'] ) ? $instance['column'] : 1;
			$layout = isset( $instance['layout'] ) ? $instance['layout'] : 1;
			$order = isset( $instance['order'] ) ? $instance['order'] : 'DESC';
			$show_name = isset( $instance['show_name'] ) ? $instance['show_name'] : '';
			$show_designation = isset( $instance['show_designation'] ) ? $instance['show_designation'] : '';
			$show_bio = isset( $instance['show_bio'] ) ? $instance['show_bio'] : '';
			$show_socialmedia = isset( $instance['show_socialmedia'] ) ? $instance['show_socialmedia'] : '';
			$teams_list = isset( $instance['teams_list'] ) ? $instance['teams_list'] : '';

			$name_color = isset( $instance['name_color'] ) ? $instance['name_color'] : '';
			$bio_color = isset( $instance['bio_color'] ) ? $instance['bio_color'] : '';
			$desi_color = isset( $instance['desi_color'] ) ? $instance['desi_color'] : '';
			$social_color = isset( $instance['social_color'] ) ? $instance['social_color'] : '';
			$social_hovcolor = isset( $instance['social_hovcolor'] ) ? $instance['social_hovcolor'] : '';

			// Slider Options value
			$slideron = htteammember_get_option( 'slideron', 'htteam_widgets_options_tabs' );
			$slarrows = htteammember_get_option( 'slarrows', 'htteam_widgets_options_tabs' );
			$sldots = htteammember_get_option( 'sldots', 'htteam_widgets_options_tabs' );
			$slautolay = htteammember_get_option( 'slautolay', 'htteam_widgets_options_tabs' );
			$slautoplay_speed = htteammember_get_option( 'slautoplay_speed', 'htteam_widgets_options_tabs' );
			$slanimation_speed = htteammember_get_option( 'slanimation_speed', 'htteam_widgets_options_tabs' );
			$slcentermode = htteammember_get_option( 'slcentermode', 'htteam_widgets_options_tabs' );
			$slcenterpadding = htteammember_get_option( 'slcenterpadding', 'htteam_widgets_options_tabs' );
			$slitems = htteammember_get_option( 'slitems', 'htteam_widgets_options_tabs' );
			$slrows = htteammember_get_option( 'slrows', 'htteam_widgets_options_tabs' );
			$sltablet_display_columns = htteammember_get_option( 'sltablet_display_columns', 'htteam_widgets_options_tabs' );
			$slmobile_display_columns = htteammember_get_option( 'slmobile_display_columns', 'htteam_widgets_options_tabs' );

			$shortcode_atts = [
	            'limit' 			=> 'limit="'.$limit.'"',
	            'column' 			=> 'column="'.$column.'"',
	            'layout' 			=> 'layout="'.$layout.'"',
	            'order' 			=> 'order="'.$order.'"',
	            'show_name' 		=> 'show_name="'.$show_name.'"',
	            'show_designation' 	=> 'show_designation="'.$show_designation.'"',
	            'show_bio' 			=> 'show_bio="'.$show_bio.'"',
	            'show_socialmedia' 	=> 'show_socialmedia="'.$show_socialmedia.'"',
	            'teams_list' 		=> 'teams_list="'.$teams_list.'"',

	            'slideron' => 'slideron="'.( $slideron == 'on' ? 'yes' : 'no' ).'"',
	            'slarrows' => 'slarrows="'.( $slarrows == 'on' ? 'yes' : 'no' ).'"',
	            'slprevicon' => 'slprevicon="fa fa-angle-left"',
	            'slnexticon' => 'slnexticon="fa fa-angle-right"',
	            'sldots' => 'sldots="'.( $sldots == 'on' ? 'yes' : 'no' ).'"',
	            'slautolay' => 'slautolay="'.( $slautolay == 'on' ? 'yes' : 'no' ).'"',
	            'slautoplay_speed' => 'slautoplay_speed="'.$slautoplay_speed.'"',
	            'slanimation_speed' => 'slanimation_speed="'.$slanimation_speed.'"',
	            'slcentermode' => 'slcentermode="'.( $slcentermode == 'on' ? 'yes' : 'no' ).'"',
	            'slcenterpadding' => 'slcenterpadding="'.$slcenterpadding.'"',
	            'slitems' => 'slitems="'.( $slitems <= 0 ? 1 : $slitems ).'"',
	            'slrows' => 'slrows="'.( $slrows <= 0 ? 1 : $slrows ).'"',
	            'slscroll_columns' => 'slscroll_columns="1"',
	            'sltablet_width' => 'sltablet_width="750"',
	            'sltablet_display_columns' => 'sltablet_display_columns="'.( $sltablet_display_columns <= 0 ? 1 : $sltablet_display_columns).'"',
	            'sltablet_scroll_columns' => 'sltablet_scroll_columns="1"',
	            'slmobile_width' => 'slmobile_width="480"',
	            'slmobile_display_columns' => 'slmobile_display_columns="'.( $slmobile_display_columns <= 0 ? 1 : $slmobile_display_columns ).'"',
	            'slmobile_scroll_columns' => 'slmobile_scroll_columns="1"',

	            'name_color' => 'name_color="'.$name_color.'"',
	            'bio_color' => 'bio_color="'.$bio_color.'"',
	            'desi_color' => 'desi_color="'.$desi_color.'"',
	            'social_color' => 'social_color="'.$social_color.'"',
	            'social_hovcolor' => 'social_hovcolor="'.$social_hovcolor.'"',
	        ];

	        // Render Html
			echo $args['before_widget'];
		        if ( !empty( $title ) ) { echo $args['before_title'] . esc_html( $title ) . $args['after_title']; }
        	?>
    			<div class="htteammember-widgets">
    				<?php echo do_shortcode( sprintf( '[htteamember %s]', implode(' ', $shortcode_atts ) ) ); ?>
    			</div>
	        <?php echo $args['after_widget']; 
		}


		/**
		 * Sanitize widget form values as they are saved.
		 *
		 * @see WP_Widget::update()
		 *
		 * @param array $new_instance Values just sent to be saved.
		 * @param array $old_instance Previously saved values from database.
		 *
		 * @return array Updated safe values to be saved.
		 */

		public function update( $new_instance, $old_instance ) {
			$instance = $old_instance;	
			$instance['title'] 				=  strip_tags($new_instance['title']);
			$instance['limit'] 				=  $new_instance['limit'];
			$instance['column'] 			=  $new_instance['column'];
			$instance['layout'] 			=  $new_instance['layout'];
			$instance['order'] 				=  $new_instance['order'];									
			$instance['show_name'] 			=  $new_instance['show_name'];									
			$instance['show_designation'] 	=  $new_instance['show_designation'];									
			$instance['show_bio'] 			=  $new_instance['show_bio'];									
			$instance['show_socialmedia'] 	=  $new_instance['show_socialmedia'];									
			$instance['teams_list'] 		=  $new_instance['teams_list'];	

			$instance['name_color'] 		=  $new_instance['name_color'];									
			$instance['bio_color'] 			=  $new_instance['bio_color'];									
			$instance['desi_color'] 		=  $new_instance['desi_color'];									
			$instance['social_color'] 		=  $new_instance['social_color'];									
			$instance['social_hovcolor'] 	=  $new_instance['social_hovcolor'];									
			return $instance;
		}

		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */

		public function form( $instance ){ 

			$array_default = array(
				'title'			=> 'HT TeamMember'
				,'limit' 		=> 1
				,'column' 		=> 1
				,'layout' 		=> 1
				,'order' 		=> 'ASC'
				,'show_name' 	=> 'yes'
				,'show_designation' => 'yes'
				,'show_bio'			=> 'yes'
				,'show_socialmedia'	=> 'yes'
				,'teams_list' 		=> ''

				,'name_color' 		=> ''
				,'bio_color' 		=> ''
				,'desi_color' 		=> ''
				,'social_color' 		=> ''
				,'social_hovcolor' 		=> ''
			);
			$instance = wp_parse_args( (array) $instance, $array_default );

			?>
			

			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Enter your title', 'ht-teammember'); ?> </label>
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
			</p>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id('limit')); ?>"><?php echo esc_html__('Item Limit:' ,'ht-teammember') ?></label>
				<input id="<?php echo esc_attr($this->get_field_id('limit')); ?>" name="<?php echo esc_attr($this->get_field_name('limit')); ?>" type="number" class="widefat" value="<?php echo esc_attr($instance['limit']); ?>">
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('layout'); ?>"><?php esc_html_e('Layout', 'ht-teammember'); ?> </label>
				<select class="widefat" id="<?php echo $this->get_field_id('layout'); ?>" name="<?php echo $this->get_field_name('layout'); ?>" >
					<?php for( $i = 1; $i <= 5; $i++ ): ?>
					<option value="<?php echo $i; ?>" <?php selected( $instance['layout'], $i ); ?> ><?php echo 'Layout '.$i; ?></option>
					<?php endfor; ?>
				</select>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('column'); ?>"><?php esc_html_e('Column', 'ht-teammember'); ?> </label>
				<select class="widefat" id="<?php echo $this->get_field_id('column'); ?>" name="<?php echo $this->get_field_name('column'); ?>" >
					<?php for( $i = 1; $i <= 6; $i++ ): ?>
					<option value="<?php echo $i; ?>" <?php selected($instance['column'], $i); ?> ><?php echo $i; ?></option>
					<?php endfor; ?>
				</select>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('order'); ?>"><?php esc_html_e('Order', 'ht-teammember'); ?> </label>
				<select class="widefat" id="<?php echo $this->get_field_id('order'); ?>" name="<?php echo $this->get_field_name('order'); ?>" >
					<option value="ASC" <?php selected($instance['order'], 'ASC'); ?> >Ascending</option>
					<option value="DESC" <?php selected($instance['order'], 'DESC'); ?> >Descending</option>
				</select>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('show_name'); ?>"><?php esc_html_e('Show Name', 'ht-teammember'); ?> </label>
				<select class="widefat" id="<?php echo $this->get_field_id('show_name'); ?>" name="<?php echo $this->get_field_name('show_name'); ?>" >
					<option value="yes" <?php selected($instance['show_name'], 'yes'); ?> ><?php esc_html_e('Yes','ht-teammember');?></option>
					<option value="no" <?php selected($instance['show_name'], 'no'); ?> ><?php esc_html_e('No','ht-teammember');?></option>
				</select>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('show_designation'); ?>"><?php esc_html_e('Show Designation', 'ht-teammember'); ?> </label>
				<select class="widefat" id="<?php echo $this->get_field_id('show_designation'); ?>" name="<?php echo $this->get_field_name('show_designation'); ?>" >
					<option value="yes" <?php selected($instance['show_designation'], 'yes'); ?> ><?php esc_html_e('Yes','ht-teammember');?></option>
					<option value="no" <?php selected($instance['show_designation'], 'no'); ?> ><?php esc_html_e('No','ht-teammember');?></option>
				</select>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('show_bio'); ?>"><?php esc_html_e('Show Bio', 'ht-teammember'); ?> </label>
				<select class="widefat" id="<?php echo $this->get_field_id('show_bio'); ?>" name="<?php echo $this->get_field_name('show_bio'); ?>" >
					<option value="yes" <?php selected($instance['show_bio'], 'yes'); ?> ><?php esc_html_e('Yes','ht-teammember');?></option>
					<option value="no" <?php selected($instance['show_bio'], 'no'); ?> ><?php esc_html_e('No','ht-teammember');?></option>
				</select>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('show_socialmedia'); ?>"><?php esc_html_e('Show Social Media', 'ht-teammember'); ?> </label>
				<select class="widefat" id="<?php echo $this->get_field_id('show_socialmedia'); ?>" name="<?php echo $this->get_field_name('show_socialmedia'); ?>" >
					<option value="yes" <?php selected($instance['show_socialmedia'], 'yes'); ?> ><?php esc_html_e('Yes','ht-teammember');?></option>
					<option value="no" <?php selected($instance['show_socialmedia'], 'no'); ?> ><?php esc_html_e('No','ht-teammember');?></option>
				</select>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('teams_list'); ?>"><?php esc_html_e('Individual Id', 'ht-teammember'); ?> </label>
				<input class="widefat" id="<?php echo $this->get_field_id('teams_list'); ?>" name="<?php echo $this->get_field_name('teams_list'); ?>" type="text" value="<?php echo esc_attr($instance['teams_list']); ?>" />
			</p>

			<p>
				<label><?php esc_html_e( 'Style Area', 'ht-teammember' ); ?></label>
			</p><hr/>

			<table width="100%">

				<tr>
					<td><label for="<?php echo $this->get_field_id( 'name_color' ); ?>"><?php esc_html_e( 'Name Color', 'ht-teammember' ); ?></label></td>
					<td><input class="ht-color-picker" type="text" id="<?php echo $this->get_field_id( 'name_color' ); ?>" name="<?php echo $this->get_field_name( 'name_color' ); ?>" value="<?php echo esc_attr( $instance['name_color'] ); ?>" /></td>
				</tr>

				<tr>
					<td><label for="<?php echo $this->get_field_id( 'bio_color' ); ?>"><?php esc_html_e( 'Bio Color', 'ht-teammember' ); ?></label></td>
					<td><input class="ht-color-picker" type="text" id="<?php echo $this->get_field_id( 'bio_color' ); ?>" name="<?php echo $this->get_field_name( 'bio_color' ); ?>" value="<?php echo esc_attr( $instance['bio_color'] ); ?>" /></td>
				</tr>

				<tr>
					<td><label for="<?php echo $this->get_field_id( 'desi_color' ); ?>"><?php esc_html_e( 'Designation Color', 'ht-teammember' ); ?></label></td>
					<td><input class="ht-color-picker" type="text" id="<?php echo $this->get_field_id( 'desi_color' ); ?>" name="<?php echo $this->get_field_name( 'desi_color' ); ?>" value="<?php echo esc_attr( $instance['desi_color'] ); ?>" /></td>
				</tr>

				<tr>
					<td><label for="<?php echo $this->get_field_id( 'social_color' ); ?>"><?php esc_html_e( 'Social Icon Color', 'ht-teammember' ); ?></label></td>
					<td><input class="ht-color-picker" type="text" id="<?php echo $this->get_field_id( 'social_color' ); ?>" name="<?php echo $this->get_field_name( 'social_color' ); ?>" value="<?php echo esc_attr( $instance['social_color'] ); ?>" /></td>
				</tr>

				<tr>
					<td><label for="<?php echo $this->get_field_id( 'social_hovcolor' ); ?>"><?php esc_html_e( 'Social icon Hover Color', 'ht-teammember' ); ?></label></td>
					<td><input class="ht-color-picker" type="text" id="<?php echo $this->get_field_id( 'social_hovcolor' ); ?>" name="<?php echo $this->get_field_name( 'social_hovcolor' ); ?>" value="<?php echo esc_attr( $instance['social_hovcolor'] ); ?>" /></td>
				</tr>

			</table>

	        <script type='text/javascript'>
	            jQuery(document).ready(function($) {
	                $('.ht-color-picker').wpColorPicker();
	            });
	        </script>

		<?php }

	} // end extends class
} // end exists class


// Register Author information widget.

function htteammember_default_widgets() {
    register_widget( 'htteammember_default_widgets' );
}
add_action( 'widgets_init', 'htteammember_default_widgets' );

