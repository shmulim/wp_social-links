<?php

class Social_Links_Widget extends WP_Widget {

  /**
   * Sets up the widgets name etc
   */
  public function __construct() {
    parent::__construct(
      'social_links_widget', // Base ID
      __( 'Social Links', 'sl_domain' ), // Name
      array( 'description' => __( 'Social media icons.', 'sl_domain' ), ) // Args
    );
  }

  /**
   * Outputs the content of the widget
   *
   * @param array $args
   * @param array $instance
   */
  public function widget( $args, $instance ) {

    $links = array(
      'facebook' => esc_attr( $instance['facebook_link'] ),
      'twitter' => esc_attr( $instance['twitter_link'] ),
      'linkedin' => esc_attr( $instance['linkedin_link'] ),
      'google' => esc_attr( $instance['google_link'] )
      );
    
    $icons = array(
      'facebook' => esc_attr( $instance['facebook_icon'] ),
      'twitter' => esc_attr( $instance['twitter_icon'] ),
      'linkedin' => esc_attr( $instance['linkedin_icon'] ),
      'google' => esc_attr( $instance['google_icon'] )
      );

    $icon_width = esc_attr( $instance['icon_width']);

    echo $args['before_widget'];
    $this->getSocialLinks($links, $icons, $icon_width);
    echo $args['after_widget'];
  }

  /**
   * Outputs the options form on admin
   *
   * @param array $instance The widget options
   */
  public function form( $instance ) {
    $this->getForm($instance);
  }

  /**
   * Processing widget options on save
   *
   * @param array $new_instance The new options
   * @param array $old_instance The previous options
   */
  public function update( $new_instance, $old_instance ) {
    // processes widget options to be saved
    $instance = array(
      'facebook_link' => ( !empty( $new_instance['facebook_link']) ) ? strip_tags($new_instance['facebook_link']) : '',
      'twitter_link' => ( !empty( $new_instance['twitter_link']) ) ? strip_tags($new_instance['twitter_link']) : '', 
      'linkedin_link' => ( !empty( $new_instance['linkedin_link']) ) ? strip_tags($new_instance['linkedin_link']) : '', 
      'google_link' => ( !empty( $new_instance['google_link']) ) ? strip_tags($new_instance['google_link']) : '', 
      'facebook_icon' => ( !empty( $new_instance['facebook_icon']) ) ? strip_tags($new_instance['facebook_icon']) : '', 
      'twitter_icon' => ( !empty( $new_instance['twitter_icon']) ) ? strip_tags($new_instance['twitter_icon']) : '', 
      'linkedin_icon' => ( !empty( $new_instance['linkedin_icon']) ) ? strip_tags($new_instance['linkedin_icon']) : '', 
      'google_icon' => ( !empty( $new_instance['google_icon']) ) ? strip_tags($new_instance['google_icon']) : '', 
      'icon_width' => ( !empty( $new_instance['icon_width']) ) ? strip_tags($new_instance['icon_width']) : ''
      );

    return $instance;
  }

    /**
   * Gets and displays form
   *
   * @param array $instance The widget options
   */
  public function getForm( $instance ) {

    // LINKS

    // get facebook link
    if ( isset($instance['facebook_link']) ){
      $facebook_link = esc_attr( $instance['facebook_link'] );
    }
    else {
      $facebook_link = 'http://www.facebook.com';
    }

    // get twitter link
    if ( isset($instance['twitter_link']) ){
      $twitter_link = esc_attr( $instance['twitter_link'] );
    }
    else {
      $twitter_link = 'http://www.twitter.com';
    }

    // get linkedin link
    if ( isset($instance['linkedin_link']) ){
      $linkedin_link = esc_attr( $instance['linkedin_link'] );
    }
    else {
      $linkedin_link = 'http://www.linkedin.com';
    }

    // get google+ link
    if ( isset($instance['google_link']) ){
      $google_link = esc_attr( $instance['google_link'] );
    }
    else {
      $google_link = 'http://www.google.com';
    }

    // ICONS

    // facebook icon
    if ( isset($instance['facebook_icon']) ){
      $facebook_icon = esc_attr( $instance['facebook_icon'] );
    }
    else {
      $facebook_icon = plugins_url() . '/social-links/img/facebook.png';
    }

    // twitter icon
    if ( isset($instance['twitter_icon']) ){
      $twitter_icon = esc_attr( $instance['twitter_icon'] );
    }
    else {
      $twitter_icon = plugins_url() . '/social-links/img/twitter.png';
    }

    // linkedin icon
    if ( isset($instance['linkedin_icon']) ){
      $linkedin_icon = esc_attr( $instance['linkedin_icon'] );
    } 
    else {
      $linkedin_icon = plugins_url() . '/social-links/img/linkedin.png';
    }

    // google icon
    if ( isset($instance['google_icon']) ){
      $google_icon = esc_attr( $instance['google_icon'] );
    } 
    else {
      $google_icon = plugins_url() . '/social-links/img/google.png';
    }

    // ICON WIDTH

    // icon width
    if ( isset($instance['icon_width']) ){
      $icon_width = esc_attr( $instance['icon_width'] );
    } 
    else {
      $icon_width = 32;
    }

    ?>
      <h4>Facebook</h4>
        <p>
          <label for="<?php echo $this->get_field_id('facebook_link'); ?>"><?php  _e( 'Facebook Link', 'sl_domain' ); ?><label/>
          <input class="widefat" type="text" id="<?php echo $this->get_field_id('facebook_link'); ?>" name="<?php echo $this->get_field_name('facebook_link'); ?>" value="<?php echo esc_attr($facebook_link); ?>">
        </p>
        <p>
          <label for="<?php echo $this->get_field_id('facebook_icon'); ?>"><?php  _e( 'Facebook Icon', 'sl_domain' ); ?><label/>
          <input class="widefat" type="text" id="<?php echo $this->get_field_id('facebook_icon'); ?>" name="<?php echo $this->get_field_name('facebook_icon'); ?>" value="<?php echo esc_attr($facebook_icon); ?>">
        </p>

      <h4>Twitter</h4>
        <p>
          <label for="<?php echo $this->get_field_id('twitter_link'); ?>"><?php  _e( 'Twitter Link', 'sl_domain' ); ?><label/>
          <input class="widefat" type="text" id="<?php echo $this->get_field_id('twitter_link'); ?>" name="<?php echo $this->get_field_name('twitter_link'); ?>" value="<?php echo esc_attr($twitter_link); ?>">
        </p>
        <p>
          <label for="<?php echo $this->get_field_id('twitter_icon'); ?>"><?php  _e( 'Twitter Icon', 'sl_domain' ); ?><label/>
          <input class="widefat" type="text" id="<?php echo $this->get_field_id('twitter_icon'); ?>" name="<?php echo $this->get_field_name('twitter_icon'); ?>" value="<?php echo esc_attr($twitter_icon); ?>">
        </p>

      <h4>LinkedIn</h4>
        <p>
          <label for="<?php echo $this->get_field_id('linkedin_link'); ?>"><?php  _e( 'LinkedIn Link', 'sl_domain' ); ?><label/>
          <input class="widefat" type="text" id="<?php echo $this->get_field_id('linkedin_link'); ?>" name="<?php echo $this->get_field_name('linkedin_link'); ?>" value="<?php echo esc_attr($linkedin_link); ?>">
        </p>
        <p>
          <label for="<?php echo $this->get_field_id('linkedin_icon'); ?>"><?php  _e( 'LinkedIn Icon', 'sl_domain' ); ?><label/>
          <input class="widefat" type="text" id="<?php echo $this->get_field_id('linkedin_icon'); ?>" name="<?php echo $this->get_field_name('linkedin_icon'); ?>" value="<?php echo esc_attr($linkedin_icon); ?>">
        </p>

      <h4>Google+</h4>
        <p>
          <label for="<?php echo $this->get_field_id('google_link'); ?>"><?php  _e( 'Google+ Link', 'sl_domain' ); ?><label/>
          <input class="widefat" type="text" id="<?php echo $this->get_field_id('google_link'); ?>" name="<?php echo $this->get_field_name('google_link'); ?>" value="<?php echo esc_attr($google_link); ?>">
        </p>
        <p>
          <label for="<?php echo $this->get_field_id('google_icon'); ?>"><?php  _e( 'Google+ Icon', 'sl_domain' ); ?><label/>
          <input class="widefat" type="text" id="<?php echo $this->get_field_id('google_icon'); ?>" name="<?php echo $this->get_field_name('google_icon'); ?>" value="<?php echo esc_attr($google_icon); ?>">
        </p>

      <h4>Icon Width</h4>
        <p>
          <label for="<?php echo $this->get_field_id('icon_width'); ?>"><?php  _e( 'Icon Width', 'sl_domain' ); ?><label/>
          <input class="widefat" type="text" id="<?php echo $this->get_field_id('icon_width'); ?>" name="<?php echo $this->get_field_name('icon_width'); ?>" value="<?php echo esc_attr($icon_width); ?>">
        </p>
    <?php
  }

    /**
   * Gets and displays social media icons and links
   *
   * @param array $links Social media links
   * @param array $icons Social media icons
   * @param var $icon_width Icon width
   */
  public function getSocialLinks( $links, $icons, $icon_width ) {
    ?>
      <div class="social-links">
        <a href="<?php echo $links['facebook']; ?>" target="_blank"><img src="<?php echo $icons['facebook']; ?>" width="<?php echo $icon_width; ?>"/></a>
        <a href="<?php echo $links['twitter']; ?>" target="_blank"><img src="<?php echo $icons['twitter']; ?>" width="<?php echo $icon_width; ?>"/></a>
        <a href="<?php echo $links['linkedin']; ?>" target="_blank"><img src="<?php echo $icons['linkedin']; ?>" width="<?php echo $icon_width; ?>"/></a>
        <a href="<?php echo $links['google']; ?>" target="_blank"><img src="<?php echo $icons['google']; ?>" width="<?php echo $icon_width; ?>"/></a>
      </div>
    <?php
  }

}
