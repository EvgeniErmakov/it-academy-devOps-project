<?php
/* Notifications in customizer */

require get_template_directory()  . '/inc/customizer-notify/sharksdesign-notify.php';
$sharksdesign_config_customizer = array(
	'recommended_plugins'       => array(
		'spediex-for-theme' => array(
			'recommended' => true,
			'description' => sprintf(__('Install and activate <strong>Spediex For Theme </strong> plugin for taking full advantage of all the features this theme has to offer SharksDesign.', 'sharksdesign')),
		),
	),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'sharksdesign' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'sharksdesign' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'sharksdesign' ),
	'activate_button_label'     => esc_html__( 'Activate', 'sharksdesign' ),
	'sharksdesign_deactivate_button_label'   => esc_html__( 'Deactivate', 'sharksdesign' ),
);
sharksdesign_Customizer_Notify::init( apply_filters( 'sharksdesign_recommended_plugins', $sharksdesign_config_customizer ) );
