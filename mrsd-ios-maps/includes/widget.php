<?php if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Adds iOS Maps widget.
 */
class iOS_Maps_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'ios_maps_widget', // Base ID
			'iOS Maps Widget', // Name
			array( 'description' => __( 'Add your address that will open in iOS devices in Maps App' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		echo $before_widget;
		echo ios_maps($instance);
		echo $after_widget;
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
		$instance = array();
		$instance['address'] = $new_instance['address'];
		$instance['text'] = $new_instance['text'];
		
		return $instance;
		
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		?>
		<p>
			<label>
				<?php _e( 'Address' ); ?>
				<input type="text" value="<?php echo $instance['address']; ?>" id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>">
			</label>
		</p>
		<p>
			<label>
				<?php _e( 'Display Text (optional)' ); ?>
				<input type="text" value="<?php echo $instance['text']; ?>" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>">
			</label>
		</p>

		<?php 	
	}

}