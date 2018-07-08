<?php

class My_Widget extends WP_Widget {

  /**
   * Sets up the widgets name etc
   */
  public function __construct() {
    $widget_ops = array( 
      'classname' => 'my_widget',
      'description' => 'My Widget is awesome',
    );
    parent::__construct( 'my_widget', 'My Widget', $widget_ops );
  }

  /**
   * Outputs the content of the widget
   *
   * @param array $args
   * @param array $instance
   */
  public function widget( $args, $instance ) {
    // outputs the content of the widget
    echo $args['before_widget'];
    if ( ! empty( $instance['shortcode'] ) ) {
      echo do_shortcode($instance['shortcode']);
    } 
    echo $args['after_widget'];

  }

  /**
   * Outputs the options form on admin
   *
   * @param array $instance The widget options
   */
  public function form( $instance ) {
    $shortcode = ! empty( $instance['shortcode'] ) ? $instance['shortcode'] : esc_html__( 'New title', 'text_domain' );
    ?>
    <p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'shortcode' ) ); ?>"><?php esc_attr_e( 'shortcode:', 'text_domain' ); ?></label> 
    <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'shortcode' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'shortcode' ) ); ?>" type="text" value=""><?php echo esc_attr( $shortcode ); ?></textarea>
    </p>
    <?php 
  }

  /**
   * Processing widget options on save
   *
   * @param array $new_instance The new options
   * @param array $old_instance The previous options
   *
   * @return array
   */
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['shortcode'] = ( ! empty( $new_instance['shortcode'] ) ) ? sanitize_text_field( $new_instance['shortcode'] ) : '';

    return $instance;
  }
}