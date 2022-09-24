<?php

class sharksdesign_Customizer_Notify {

	private $recommended_actions;

	
	private $recommended_plugins;

	
	private static $instance;

	
	private $recommended_actions_title;

	
	private $recommended_plugins_title;

	
	private $dismiss_button;

	
	private $install_button_label;

	
	private $activate_button_label;

	
	private $sharksdesign_deactivate_button_label;

	
	public static function init( $config ) {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof sharksdesign_Customizer_Notify ) ) {
			self::$instance = new sharksdesign_Customizer_Notify;
			if ( ! empty( $config ) && is_array( $config ) ) {
				self::$instance->config = $config;
				self::$instance->setup_config();
				self::$instance->setup_actions();
			}
		}

	}

	
	public function setup_config() {

		global $sharksdesign_customizer_notify_recommended_plugins;
		global $sharksdesign_customizer_notify_recommended_actions;

		global $install_button_label;
		global $activate_button_label;
		global $sharksdesign_deactivate_button_label;

		$this->recommended_actions = isset( $this->config['recommended_actions'] ) ? $this->config['recommended_actions'] : array();
		$this->recommended_plugins = isset( $this->config['recommended_plugins'] ) ? $this->config['recommended_plugins'] : array();

		$this->recommended_actions_title = isset( $this->config['recommended_actions_title'] ) ? $this->config['recommended_actions_title'] : '';
		$this->recommended_plugins_title = isset( $this->config['recommended_plugins_title'] ) ? $this->config['recommended_plugins_title'] : '';
		$this->dismiss_button            = isset( $this->config['dismiss_button'] ) ? $this->config['dismiss_button'] : '';

		$sharksdesign_customizer_notify_recommended_plugins = array();
		$sharksdesign_customizer_notify_recommended_actions = array();

		if ( isset( $this->recommended_plugins ) ) {
			$sharksdesign_customizer_notify_recommended_plugins = $this->recommended_plugins;
		}

		if ( isset( $this->recommended_actions ) ) {
			$sharksdesign_customizer_notify_recommended_actions = $this->recommended_actions;
		}

		$install_button_label    = isset( $this->config['install_button_label'] ) ? $this->config['install_button_label'] : '';
		$activate_button_label   = isset( $this->config['activate_button_label'] ) ? $this->config['activate_button_label'] : '';
		$sharksdesign_deactivate_button_label = isset( $this->config['sharksdesign_deactivate_button_label'] ) ? $this->config['sharksdesign_deactivate_button_label'] : '';

	}

	
	public function setup_actions() {

		// Register the section
		add_action( 'customize_register', array( $this, 'sharksdesign_plugin_notification_customize_register' ) );

		// Enqueue scripts and styles
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'sharksdesign_customizer_notify_scripts_for_customizer' ), 0 );

		/* ajax callback for dismissable recommended actions */
		add_action( 'wp_ajax_quality_customizer_notify_dismiss_action', array( $this, 'sharksdesign_customizer_notify_dismiss_recommended_action_callback' ) );

		add_action( 'wp_ajax_ti_customizer_notify_dismiss_recommended_plugins', array( $this, 'sharksdesign_customizer_notify_dismiss_recommended_plugins_callback' ) );

	}

	
	public function sharksdesign_customizer_notify_scripts_for_customizer() {

		wp_enqueue_style( 'sharksdesign-customizer-notify-css', get_template_directory_uri() . '/inc/customizer-notify/css/sharksdesign-customizer-notify.css', array());

		wp_enqueue_style( 'sharksdesign-plugin-install' );
		wp_enqueue_script( 'sharksdesign-plugin-install' );
		wp_add_inline_script( 'sharksdesign-plugin-install', 'var pagenow = "customizer";' );

		wp_enqueue_script( 'sharksdesign-updates' );

		wp_enqueue_script( 'sharksdesign-customizer-notify-js', get_template_directory_uri() . '/inc/customizer-notify/js/sharksdesign-notify.js', array( 'customize-controls' ));
		wp_localize_script(
			'sharksdesign-customizer-notify-js', 'sharksdesignCustomizercompanionObject', array(
				'sharksdesign_ajaxurl'            => esc_url(admin_url( 'admin-ajax.php' )),
				'sharksdesign_template_directory' => esc_url(get_template_directory_uri()),
				'sharksdesign_base_path'          => esc_url(admin_url()),
				'sharksdesign_activating_string'  => __( 'Activating', 'sharksdesign' ),
			)
		);

	}

	
	public function sharksdesign_plugin_notification_customize_register( $wp_customize ) {

		
		require get_template_directory() . '/inc/customizer-notify/sharksdesign-notify-section.php';

		$wp_customize->register_section_type( 'sharksdesign_Customizer_Notify_Section' );

		$wp_customize->add_section(
			new sharksdesign_Customizer_Notify_Section(
				$wp_customize,
				'sharksdesign-customizer-notify-section',
				array(
					'title'          => $this->recommended_actions_title,
					'plugin_text'    => $this->recommended_plugins_title,
					'dismiss_button' => $this->dismiss_button,
					'priority'       => 0,
				)
			)
		);

	}

	
	public function sharksdesign_customizer_notify_dismiss_recommended_action_callback() {

		global $sharksdesign_customizer_notify_recommended_actions;

		$action_id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : 0;

		echo esc_html($action_id); 

		if ( ! empty( $action_id ) ) {

			
			if ( get_theme_mod( 'sharksdesign_customizer_notify_show' ) ) {

				$sharksdesign_customizer_notify_show_recommended_actions = get_theme_mod( 'sharksdesign_customizer_notify_show' );
				switch ( $_GET['todo'] ) {
					case 'add':
						$sharksdesign_customizer_notify_show_recommended_actions[ $action_id ] = true;
						break;
					case 'dismiss':
						$sharksdesign_customizer_notify_show_recommended_actions[ $action_id ] = false;
						break;
				}
				echo esc_html($sharksdesign_customizer_notify_show_recommended_actions);
				
			} else {
				$sharksdesign_customizer_notify_show_recommended_actions = array();
				if ( ! empty( $sharksdesign_customizer_notify_recommended_actions ) ) {
					foreach ( $sharksdesign_customizer_notify_recommended_actions as $sharksdesign_lite_customizer_notify_recommended_action ) {
						if ( $sharksdesign_lite_customizer_notify_recommended_action['id'] == $action_id ) {
							$sharksdesign_customizer_notify_show_recommended_actions[ $sharksdesign_lite_customizer_notify_recommended_action['id'] ] = false;
						} else {
							$sharksdesign_customizer_notify_show_recommended_actions[ $sharksdesign_lite_customizer_notify_recommended_action['id'] ] = true;
						}
					}
					echo esc_html($sharksdesign_customizer_notify_show_recommended_actions);
				}
			}
		}
		die(); 
	}

	
	public function sharksdesign_customizer_notify_dismiss_recommended_plugins_callback() {

		$action_id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : 0;
		echo esc_html($action_id); 

		if ( ! empty( $action_id ) ) {

			$sharksdesign_lite_customizer_notify_show_recommended_plugins = get_theme_mod( 'sharksdesign_customizer_notify_show_recommended_plugins' );

			switch ( $_GET['todo'] ) {
				case 'add':
					$sharksdesign_lite_customizer_notify_show_recommended_plugins[ $action_id ] = false;
					break;
				case 'dismiss':
					$sharksdesign_lite_customizer_notify_show_recommended_plugins[ $action_id ] = true;
					break;
			}
			echo esc_html($sharksdesign_customizer_notify_show_recommended_actions);
		}
		die(); 
	}

}
