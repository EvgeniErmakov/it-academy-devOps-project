<?php
/**
 * sharksdesign Theme Customizer
 *
 * @package sharksdesign
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
global $sharksdesign_fonttotal;
	$sharksdesign_fonttotal = array(
        __( 'Select Font', 'sharksdesign'  ),
        __( 'Abril Fatface', 'sharksdesign'  ),
        __( 'BenchNine', 'sharksdesign'  ),
        __( 'Cookie', 'sharksdesign'  ),
        __( 'Economica', 'sharksdesign'  ),
        __( 'Monda' , 'sharksdesign' ),
    );


function sharksdesign_customize_register( $wp_customize ) {

	$sharksdesign_font_weight = array('100' => '100',
		            '200' => '200',
		            '300' => '300',
		            '400' => '400',
					'500' => '500',
					'600' => '600',
					'700' => '700',
					'800' => '800',
					'900' => '900',
					'bold' => 'bold',
					'bolder' => 'bolder',
					'inherit' => 'inherit',
					'initial' => 'initial',
					'normal' => 'normal',
					'revert' => 'revert',
					'unset' => 'unset',
				);

	$sharksdesign_text_transform = array(
						'capitalize' => 'Capitalize',
						'inherit'	 => 'Inherit',
						'lowercase'  => 'Lowercase',
						'uppercase'  => 'Uppercase',
	);

	$sharksdesign_image_position = array(
						'left top' => 'Left Top',
			        	'left center' => 'Left Center',
			        	'left bottom' => 'Left Bottom',
			            'right top' => 'Right Top',
			            'right center' => 'Right Center',
			            'right bottom' => 'Right Bottom',
			            'center top' => 'Center Top',
			            'center center' => 'Center Center',
			            'center bottom' => 'Center Bottom',
	);

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'sharksdesign_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'sharksdesign_customize_partial_blogdescription',
			)
		);
	}

	if ( method_exists( $wp_customize, 'register_section_type' ) ) {
		$wp_customize->register_section_type( 'sharksdesign_pro_Section' );
	}
	if ( ! defined( 'GP_PREMIUM_VERSION' ) ) {
		$wp_customize->add_section(
			new sharksdesign_pro_Section(
				$wp_customize,
				'sharksdesign_pro_Section',
				array(
                	'pro_text' => __( 'Upgrade To PRO', 'sharksdesign' ),
                    //'pro_url'  => '#',
					'capability' => 'edit_theme_options',
					'priority' => 0,
					'type' => 'gp-upselles-section',
				)
			)
		);
	}

	if ( method_exists( $wp_customize, 'register_section_type' ) ) {
		$wp_customize->register_section_type( 'sharksdesign_documentation_Upsell_Section' );
	}
	if ( ! defined( 'GP_PREMIUM_VERSION' ) ) {
		$wp_customize->add_section(
			new sharksdesign_documentation_Upsell_Section(
				$wp_customize,
				'sharksdesign_documentation_Upsell_Section',
				array(
					'title'    => __( 'Documentation', 'sharksdesign' ),
                	//'pro_text' => esc_html__( 'Read More', 'sharksdesign' ),
					'capability' => 'edit_theme_options',
					'priority' => 0,
					'type' => 'gp-upsell-section',
				)
			)
		);
	}

	//Color Section
		//body link color
			$wp_customize->add_setting( 'sharksdesign_link_color', 
				array(
		            'default'    => '#c4cfde', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
		        ) 
		    ); 
	        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( 
		        $wp_customize,'sharksdesign_link_color',array(
		            'label'      => __( 'Link Color', 'sharksdesign' ), 
		            'settings'   => 'sharksdesign_link_color', 
		            'priority'   => 10,
		            'section'    => 'colors',
		        ) 
	        ) ); 
	    //body link hover color
			$wp_customize->add_setting( 'sharksdesign_link_hover_color', 
				array(
		            'default'    => '#ff014f', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability'     => 'edit_theme_options',
		            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
		        ) 
		    ); 
	        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( 
		        $wp_customize,'sharksdesign_link_hover_color',array(
		            'label'      => __( 'Link Hover Color', 'sharksdesign' ), 
		            'settings'   => 'sharksdesign_link_hover_color', 
		            'priority'   => 10,
		            'section'    => 'colors',
		        ) 
	        ) ); 

	//Top Bar Section
		$wp_customize->add_panel( 'sharksdesign_topbar_section', array(
			'title'       => __('Top Bar', 'sharksdesign'),
			'priority'    => 1,
		) );
		//Create Contact Info Section
		    $wp_customize->add_section( 'sharksdesign_contact_section' , array(
				'title'             => 'Contact Info',
				'panel'             => 'sharksdesign_topbar_section',
			) );
		    //Contact Info Section in contact number
			    $wp_customize->add_setting( 'sharksdesign_contact_info_number', 
			        array(
			            'default'    => '044632353231111',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'sharksdesign_contact_info_number', 
			        array(
			            'label'      => __( 'Contact No.', 'sharksdesign' ), 
			            'type'       => 'text',
			            'settings'   => 'sharksdesign_contact_info_number',
			            'section'    => 'sharksdesign_contact_section',
			        ) 
		        ) ); 
		    //Contact Info Section in Email Info
			    $wp_customize->add_setting( 'sharksdesign_email_info', 
			        array(
			            'default'    => '3235323@gmail.com',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'sharksdesign_email_info', 
			        array(
			            'label'      => __( 'Email Info', 'sharksdesign' ), 
			            'type'       => 'text',
			            'settings'   => 'sharksdesign_email_info',
			            'section'    => 'sharksdesign_contact_section',
			        ) 
		        ) );
		//Create Social Info Section
		    $wp_customize->add_section( 'sharksdesign_social_section' , array(
				'title'             => __('Social Info','sharksdesign'),
				'panel'             => 'sharksdesign_topbar_section',
			) );
			// Social Icon tabing
				$wp_customize->add_setting( 'social_icon_tab', 
			        array(
			            'default'    => 'general', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new Sharksdesign_Custom_Radio_Control( 
			        $wp_customize,'social_icon_tab',array(
			            'settings'   => 'social_icon_tab', 
			            'priority'   => 10,
			            'section'    => 'sharksdesign_social_section',
			            'type'    => 'select',
			            'choices'    => array(
				        	'general' => 'General',
				        	'design' => 'Design',
			        	),
			        ) 
		        ) ); 
		    //Display Social Icon
		        $wp_customize->add_setting( 'display_social_icon', array(		                
	                'default'   => true,
					'priority'  => 10,
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'sharksdesign_sanitize_checkbox',
			    ));
			    $wp_customize->add_control(  new WP_Customize_Control( $wp_customize,'display_social_icon', 
			    	array(
		                'label' =>  __('Display Social Icon','sharksdesign'),
		                'type'  => 'checkbox', // this indicates the type of control
		                'section' => 'sharksdesign_social_section',
		                'settings' => 'display_social_icon',
		                'active_callback' => 'sharksdesign_social_icon_general_callback',
			        )
			    )); 
			//
			    $wp_customize->add_setting( 'social_icon_section', array(
			    	'default'  => 4,
				    'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sharksdesign_sanitize_number_range',
				) );
				$wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'social_icon_section',
			    	array(
						'type' => 'number',
						'settings'   => 'social_icon_section', 
						'section' => 'sharksdesign_social_section', // // Add a default or your own section
						'label' => 'No of Section',
						'description' => 'Save and refresh the page if No. of Sections is changed (Max no of Section is 4)',
						'input_attrs' => array(
									    'min' => 1,
									    'max' => 4,
									),
						'active_callback' => 'sharksdesign_social_icon_general_callback',				   
					)
				) );
				$social_icon = get_theme_mod( 'social_icon_section', 4 );
					for ( $i = 1; $i <= $social_icon ; $i++ ) {
						//social_icon Heading
							$wp_customize->add_setting('social_icon'.$i, array(
						        'type'       => 'theme_mod',
						        'transport'   => 'refresh',
						        'capability'     => 'edit_theme_options',
						        'sanitize_callback' => 'sanitize_text_field',
						    ));
						    $wp_customize->add_control( new sharksdesign_GeneratePress_Upsell_Section(
						    	$wp_customize,'social_icon'.$i,
						    	array(
							        'settings' => 'social_icon'.$i,
							       'label'   => 'Social Icon '.$i ,
							        'section' => 'sharksdesign_social_section',
							        'type'     => 'ast-description',
							        'active_callback' => 'sharksdesign_social_icon_general_callback',
						        )
						    ));
						
						//Featured Section icon
							$wp_customize->add_setting('social_icon_one_icon'. $i,
						        array(
						            'default' => 'fa fa-facebook',
						            'transport' => 'refresh',
						            'type'       => 'theme_mod',
						            'capability' => 'edit_theme_options',
						            'sanitize_callback' => 'sanitize_text_field',
						        )
						    );
						    $wp_customize->add_control( new WP_Customize_Control(
						    	$wp_customize,'social_icon_one_icon'.$i,
						    	array(
						            'type'        => 'text',
									'settings'    => 'social_icon_one_icon'.$i,
									'label'       => 'Select Icon '.$i,
									'description' =>  __('Select font awesome icons <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">Click Here</a> for select icon','sharksdesign'),
									'section'     => 'sharksdesign_social_section',
									'active_callback' => 'sharksdesign_social_icon_general_callback',
						        )
						    ));	
						//Featured Section Title 
							$wp_customize->add_setting( 'social_icon_link_' . $i , array(
								'default'   => '#',
							    'type'       => 'theme_mod',
						        'transport'   => 'refresh',
						        'capability'     => 'edit_theme_options',
						        'sanitize_callback' => 'sanitize_text_field',
							) );
							$wp_customize->add_control( new WP_Customize_Control(
						    	$wp_customize,'social_icon_link_' . $i,
						    	array(
									'type' => 'text',
									'settings'   => 'social_icon_link_' . $i, 
									'section' => 'sharksdesign_social_section', // // Add a default or your own section
									'label' => 'Link ' . $i,
									'active_callback' => 'sharksdesign_social_icon_general_callback',
								)
							) );
					}
			//Social Icon background Color
				$wp_customize->add_setting( 'sharksdesign_social_icon_bg_color', 
			        array(
			            'default'    => '#16181c', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( 
			        $wp_customize,'sharksdesign_social_icon_bg_color', 
			        array(
			            'label'      => __( 'Icon Background Color', 'sharksdesign' ), 
			            'settings'   => 'sharksdesign_social_icon_bg_color', 
			            'priority'   => 10,
			            'section'    => 'sharksdesign_social_section',
			            'active_callback' => 'sharksdesign_social_icon_design_callback',
			        ) 
		        ) );
		    //Social Icon background Hover Color
				$wp_customize->add_setting( 'sharksdesign_social_icon_bg_hover_color', 
			        array(
			            'default'    => '#c4cfde', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( 
			        $wp_customize,'sharksdesign_social_icon_bg_hover_color', 
			        array(
			            'label'      => __( 'Icon Background Hover Color', 'sharksdesign' ), 
			            'settings'   => 'sharksdesign_social_icon_bg_hover_color', 
			            'priority'   => 10,
			            'section'    => 'sharksdesign_social_section',
			            'active_callback' => 'sharksdesign_social_icon_design_callback',
			        ) 
		        ) );
		    //Social Icon Text Color
		    	$wp_customize->add_setting( 'sharksdesign_social_icon_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( 
			        $wp_customize,'sharksdesign_social_icon_color', 
			        array(
			            'label'      => __( 'Icon Color', 'sharksdesign' ), 
			            'settings'   => 'sharksdesign_social_icon_color', 
			            'priority'   => 10,
			            'section'    => 'sharksdesign_social_section',
			            'active_callback' => 'sharksdesign_social_icon_design_callback',
			        ) 
		        ) );
		    //Social Icon Text Hover Color
		    	$wp_customize->add_setting( 'sharksdesign_social_icon_hover_color', 
			        array(
			            'default'    => '#212428', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( 
			        $wp_customize,'sharksdesign_social_icon_hover_color', 
			        array(
			            'label'      => __( 'Icon Hover Color', 'sharksdesign' ), 
			            'settings'   => 'sharksdesign_social_icon_hover_color', 
			            'priority'   => 10,
			            'section'    => 'sharksdesign_social_section',
			            'active_callback' => 'sharksdesign_social_icon_design_callback',
			        ) 
		        ) );
		//Top Bar Width
		    $wp_customize->add_section( 'sharksdesign_top_bar_width' , array(
				'title'             => 'Top Bar Width',
				'panel'             =>  __('sharksdesign_topbar_section', 'sharksdesign' ), 
			) );
		    //Contact Info Section in contact number
			    $wp_customize->add_setting( 'sharksdesign_top_bar_width_layout', 
			        array(
			            'default'    => 'content_width',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'sharksdesign_top_bar_width_layout',array(
			        	'label'      => __( 'Top Bar Width', 'sharksdesign' ), 
			            'settings'   => 'sharksdesign_top_bar_width_layout', 
			            'priority'   => 0,
			            'section'    => 'sharksdesign_top_bar_width',
			            'type'    => 'select',
			            'choices' => array(
			            				'full_width' => 'Full Width',
			            				'content_width' => 'Content Width',
			            			),
			        ) 
		        ) );	   
		    //Contact Info Section in contact width
			    $wp_customize->add_setting( 'sharksdesign_top_bar_contact_width', 
			        array(
			            'default'    => '1100',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'sharksdesign_top_bar_contact_width',array(
			        	'label'      => __( 'Top Bar Contact Width', 'sharksdesign' ), 
			            'settings'   => 'sharksdesign_top_bar_contact_width', 
			            'priority'   => 0,
			            'section'    => 'sharksdesign_top_bar_width',
			            'type'    => 'number',
			            'active_callback'  => 'sharksdesign_topbar_content_width_call_back',
			        ) 
		        ) );	   

	//Header Section
    	$wp_customize->add_panel( 'sharksdesign_header_section', array(
			'title'       => __('Header', 'sharksdesign'),
			'priority'    => 2,
		) );
		// Create Header Layouts
			$wp_customize->add_section( 'sharksdesign_header_layouts' , array(
				'title'             => __('Header Option', 'sharksdesign'),
				'panel'             => 'sharksdesign_header_section', 
			) );
		    //Contact Info Section in contact number
			    $wp_customize->add_setting( 'sharksdesign_header_layout', 
			        array(
			            'default'    => 'header1',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new Sharksdesign_Custom_Radio_Image_Control( 
			        $wp_customize,'sharksdesign_header_layout',array(
			        	'label'      => __( 'Header Layout & Transparent Layout', 'sharksdesign' ), 
			            'settings'   => 'sharksdesign_header_layout', 
			            'priority'   => 0,
			            'section'    => 'sharksdesign_header_layouts',
			            'type'    	 => 'select',
			            'choices'    => sharksdesign_header_site_layout(),
			        ) 
		        ) );
		    //Header 1
		        //Header1 Background color
			        $wp_customize->add_setting( 'sharksdesign_header1_bg_color', 
				        array(
				            'default'    => '#212428', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability'     => 'edit_theme_options',
				            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( 
				        $wp_customize, 'sharksdesign_header1_bg_color', 
				        array(
				            'label'      => __( 'Background Color', 'sharksdesign' ), 
				            'settings'   => 'sharksdesign_header1_bg_color', 
				            'priority'   => 10, 
				            'section'    => 'sharksdesign_header_layouts',
				            'active_callback' => 'sharksdesign_header1_call_back',
				        ) 
			        ) );
			    //Header1 Text color
			        $wp_customize->add_setting( 'sharksdesign_header1_text_color', 
				        array(
				            'default'    => '#ffffff', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability'     => 'edit_theme_options',
				            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( 
				        $wp_customize, 'sharksdesign_header1_text_color', 
				        array(
				            'label'      => __( 'Text Color', 'sharksdesign' ), 
				            'settings'   => 'sharksdesign_header1_text_color', 
				            'priority'   => 10, 
				            'section'    => 'sharksdesign_header_layouts',
				            'active_callback' => 'sharksdesign_header1_call_back',
				        ) 
			        ) );
			    //Header1 Link Color
			        $wp_customize->add_setting( 'sharksdesign_header1_Link_color', 
				        array(
				            'default'    => '#c4cfde', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability'     => 'edit_theme_options',
				            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( 
				        $wp_customize, 'sharksdesign_header1_Link_color', 
				        array(
				            'label'      => __( 'Link Color', 'sharksdesign' ), 
				            'settings'   => 'sharksdesign_header1_Link_color', 
				            'priority'   => 10, 
				            'section'    => 'sharksdesign_header_layouts',
				            'active_callback' => 'sharksdesign_header1_call_back',
				        ) 
			        ) );
			    //Header1 Link Hover Color
			        $wp_customize->add_setting( 'sharksdesign_header1_linkhover_color', 
				        array(
				            'default'    => '#ffffff', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability'     => 'edit_theme_options',
				            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( 
				        $wp_customize, 'sharksdesign_header1_linkhover_color', 
				        array(
				            'label'      => __( 'Link hover Color', 'sharksdesign' ), 
				            'settings'   => 'sharksdesign_header1_linkhover_color', 
				            'priority'   => 10, 
				            'section'    => 'sharksdesign_header_layouts',
				            'active_callback' => 'sharksdesign_header1_call_back',
				        ) 
			        ) );
			    //Header1 top bar background color
					$wp_customize->add_setting( 'header1_top_bar_bg_color', 
				        array(
				            'default'    => '#25272c', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( 
				        $wp_customize,'header1_top_bar_bg_color', 
				        array(
				            'label'      => __( 'Top Bar Background Color', 'sharksdesign' ), 
				            'settings'   => 'header1_top_bar_bg_color', 
				            'priority'   => 10,
				            'section'    => 'sharksdesign_header_layouts', 
				            'active_callback' => 'sharksdesign_header1_call_back',    
				        ) 
			        ) );
			    //top bar text color
					$wp_customize->add_setting( 'header1_top_bar_text_color', 
				        array(
				            'default'    => '#ffffff', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( 
				        $wp_customize,'header1_top_bar_text_color', 
				        array(
				            'label'      => __( 'Top Bar Text Color', 'sharksdesign' ), 
				            'settings'   => 'header1_top_bar_text_color', 
				            'priority'   => 10,
				            'section'    => 'sharksdesign_header_layouts',   
				            'active_callback' => 'sharksdesign_header1_call_back',  
				        ) 
			        ) );
			//Header 2
			    //Transparent top bar Background Color
				    $wp_customize->add_setting( 'transparent_top_header_bg_color', 
				        array(
				            'default'    => 'rgba(255,255,255,0.3)', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability'     => 'edit_theme_options',
				            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control(  $wp_customize, 'transparent_top_header_bg_color',array(
				            'label'      => __( 'Transparent Top Bar Background Color', 'sharksdesign' ), 
				            'settings'   => 'transparent_top_header_bg_color', 
				            'priority'   => 10, 
				            'section'    => 'sharksdesign_header_layouts',
				            'active_callback'  => 'sharksdesign_transparent_call_menu_btn_callback',
				        ) 
			        ) );
			    //Transparent Header Text Color
				    $wp_customize->add_setting( 'transparent_top_bar_text_color', 
				        array(
				            'default'    => '#fff', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability'     => 'edit_theme_options',
				            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control(  $wp_customize, 'transparent_top_bar_text_color',array(
				            'label'      => __( 'Transparent Top Bar Text Color', 'sharksdesign' ), 
				            'settings'   => 'transparent_top_bar_text_color', 
				            'priority'   => 10, 
				            'section'    => 'sharksdesign_header_layouts',
				            'active_callback'  => 'sharksdesign_transparent_call_menu_btn_callback',
				        ) 
			        ) );
			    //Transparent Header Background Color
				    $wp_customize->add_setting( 'transparent_header_bg_color', 
				        array(
				            'default'    => 'rgba(255,255,255,0.3)', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability'     => 'edit_theme_options',
				            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control(  $wp_customize, 'transparent_header_bg_color',array(
				            'label'      => __( 'Transparent Header Background Color', 'sharksdesign' ), 
				            'settings'   => 'transparent_header_bg_color', 
				            'priority'   => 10, 
				            'section'    => 'sharksdesign_header_layouts',
				            'active_callback'  => 'sharksdesign_transparent_call_menu_btn_callback',
				        ) 
			        ) );
			    //Transparent Header Text Color
				    $wp_customize->add_setting( 'transparent_header_text_color', 
				        array(
				            'default'    => '#fff', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability'     => 'edit_theme_options',
				            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control(  $wp_customize, 'transparent_header_text_color',array(
				            'label'      => __( 'Transparent Header Text Color', 'sharksdesign' ), 
				            'settings'   => 'transparent_header_text_color', 
				            'priority'   => 10, 
				            'section'    => 'sharksdesign_header_layouts',
				            'active_callback'  => 'sharksdesign_transparent_call_menu_btn_callback',
				        ) 
			        ) );
			    //Transparent Header Link Color
				    $wp_customize->add_setting( 'transparent_header_link_color', 
				        array(
				            'default'    => '#c3cedd', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability'     => 'edit_theme_options',
				            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control(  $wp_customize, 'transparent_header_link_color',array(
				            'label'      => __( 'Transparent Header Link Color', 'sharksdesign' ), 
				            'settings'   => 'transparent_header_link_color', 
				            'priority'   => 10, 
				            'section'    => 'sharksdesign_header_layouts',
				            'active_callback'  => 'sharksdesign_transparent_call_menu_btn_callback',
				        ) 
			        ) );
			    //Transparent Header Link Hover Color
				    $wp_customize->add_setting( 'transparent_header_link_hover_color', 
				        array(
				            'default'    => '#ffffff', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability'     => 'edit_theme_options',
				            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
				        ) 
				    ); 
			        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control(  $wp_customize, 'transparent_header_link_hover_color',array(
				            'label'      => __( 'Transparent Header Link Hover Color', 'sharksdesign' ), 
				            'settings'   => 'transparent_header_link_hover_color', 
				            'priority'   => 10, 
				            'section'    => 'sharksdesign_header_layouts',
				            'active_callback'  => 'sharksdesign_transparent_call_menu_btn_callback',
				        ) 
			        ) );
			//Manu Active color
				$wp_customize->add_setting( 'header_menu_active_color', 
			        array(
			            'default'    => '#ffffff', 
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( $wp_customize, 'header_menu_active_color',array(
			            'label'      => __( 'Menu Active Color', 'sharksdesign' ), 
			            'settings'   => 'header_menu_active_color', 
			            'priority'   => 10, 
			            'section'    => 'sharksdesign_header_layouts',
			        ) 
		        ) );
		    //Desktop Submenu Background Color
		        $wp_customize->add_setting( 'header_desktop_submenu_bg_color', 
			        array(
			            'default'    => '#ffffff', 
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( $wp_customize, 'header_desktop_submenu_bg_color',array(
			            'label'      => __( 'Desktop Submenu Background Color', 'sharksdesign' ), 
			            'settings'   => 'header_desktop_submenu_bg_color', 
			            'priority'   => 10, 
			            'section'    => 'sharksdesign_header_layouts',
			        ) 
		        ) );
		    //Desktop Submenu text Color
		        $wp_customize->add_setting( 'header_desktop_submenu_text_color', 
			        array(
			            'default'    => '#212428', 
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( $wp_customize, 'header_desktop_submenu_text_color',array(
			            'label'      => __( 'Desktop Submenu Text Color', 'sharksdesign' ), 
			            'settings'   => 'header_desktop_submenu_text_color', 
			            'priority'   => 10, 
			            'section'    => 'sharksdesign_header_layouts',
			        ) 
		        ) );

		    //Mobile Nav menu Background Color
		        $wp_customize->add_setting( 'header_mobile_navmenu_background_color', 
			        array(
			            'default'    => '#16181c', 
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( $wp_customize, 'header_mobile_navmenu_background_color',array(
			            'label'      => __( 'Mobile NavMenu Background Color', 'sharksdesign' ), 
			            'settings'   => 'header_mobile_navmenu_background_color', 
			            'priority'   => 10, 
			            'section'    => 'sharksdesign_header_layouts',
			        ) 
		        ) );
		    //Mobile Submenu Background Color
		        $wp_customize->add_setting( 'header_mobile_submenu_background_color', 
			        array(
			            'default'    => '#c4cfde', 
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( $wp_customize, 'header_mobile_submenu_background_color',array(
			            'label'      => __( 'Mobile Submenu Background Color', 'sharksdesign' ), 
			            'settings'   => 'header_mobile_submenu_background_color', 
			            'priority'   => 10, 
			            'section'    => 'sharksdesign_header_layouts',
			        ) 
		        ) );
		    //Mobile Nav Menu Color
		        $wp_customize->add_setting( 'header_mobile_navmenu_color', 
			        array(
			            'default'    => '#ffffff', 
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( $wp_customize, 'header_mobile_navmenu_color',array(
			            'label'      => __( 'Mobile Nav Menu Color', 'sharksdesign' ), 
			            'settings'   => 'header_mobile_navmenu_color', 
			            'priority'   => 10, 
			            'section'    => 'sharksdesign_header_layouts',
			        ) 
		        ) );
		    //Mobile Nav Menu Acive Color
		        $wp_customize->add_setting( 'header_mobile_navmenu_active_color', 
			        array(
			            'default'    => '#ffffff', 
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( $wp_customize, 'header_mobile_navmenu_active_color',array(
			            'label'      => __( 'Mobile Nav Menu Active Color', 'sharksdesign' ), 
			            'settings'   => 'header_mobile_navmenu_active_color', 
			            'priority'   => 10, 
			            'section'    => 'sharksdesign_header_layouts',
			        ) 
		        ) );
		    //Display Search Icon
			    $wp_customize->add_setting( 'display_search_icon', array(		                
	                'default'   => true,
					'priority'  => 10,
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'sharksdesign_sanitize_checkbox',
			    ));
			    $wp_customize->add_control(  new WP_Customize_Control( $wp_customize,'display_search_icon', 
			    	array(
		                'label' =>  __('Display Search Icon', 'sharksdesign' ), 
		                'type'  => 'checkbox', // this indicates the type of control
		                'section' => 'sharksdesign_header_layouts',
		                'settings' => 'display_search_icon',
			        )
			    )); 
			//Mobile Display Search Icon
			    $wp_customize->add_setting( 'display_mobile_search_icon', array(		                
	                'default'   => true,
					'priority'  => 10,
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'sharksdesign_sanitize_checkbox',
			    ));
			    $wp_customize->add_control(  new WP_Customize_Control( $wp_customize,'display_mobile_search_icon', 
			    	array(
		                'label' => __('Mobile In Display Search Icon', 'sharksdesign' ), 
		                'type'  => 'checkbox', // this indicates the type of control
		                'section' => 'sharksdesign_header_layouts',
		                'settings' => 'display_mobile_search_icon',
			        )
			    )); 
			//Display Cart Icon
			    $wp_customize->add_setting( 'display_cart_icon', array(		                
	                'default'   => true,
					'priority'  => 10,
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'sharksdesign_sanitize_checkbox',
			    ));
			    $wp_customize->add_control(  new WP_Customize_Control( $wp_customize,'display_cart_icon', 
			    	array(
		                'label' => __('Display Cart Icon', 'sharksdesign' ),
		                'type'  => 'checkbox', // this indicates the type of control
		                'section' => 'sharksdesign_header_layouts',
		                'settings' => 'display_cart_icon',
			        )
			    )); 
			//Mobile Display Search Icon
			    $wp_customize->add_setting( 'display_mobile_cart_icon', array(		                
	                'default'   => true,
					'priority'  => 10,
					'capability' => 'edit_theme_options',
					'sanitize_callback' => 'sharksdesign_sanitize_checkbox',
			    ));
			    $wp_customize->add_control(  new WP_Customize_Control( $wp_customize,'display_mobile_cart_icon', 
			    	array(
		                'label' => __('Mobile In Display Cart Icon', 'sharksdesign' ),
		                'type'  => 'checkbox', // this indicates the type of control
		                'section' => 'sharksdesign_header_layouts',
		                'settings' => 'display_mobile_cart_icon',
			        )
			    )); 
	    // Create Header Width
			$wp_customize->add_section( 'sharksdesign_header_width' , array(
				'title'             => __('Header Width', 'sharksdesign' ),
				'panel'             => 'sharksdesign_header_section',
			) );
		    //Contact Info Section in contact number
			    $wp_customize->add_setting( 'sharksdesign_header_width_layout', 
			        array(
			            'default'    => 'content_width',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'sharksdesign_header_width_layout',array(
			        	'label'      => __( 'Header Width', 'sharksdesign' ), 
			            'settings'   => 'sharksdesign_header_width_layout', 
			            'priority'   => 0,
			            'section'    => 'sharksdesign_header_width',
			            'type'    => 'select',
			            'choices' => array(
			            				'full_width' => 'Full Width',
			            				'content_width' => 'Content Width',
			            			),
			        ) 
		        ) );	   
		    //Contact Info Section in contact width
			    $wp_customize->add_setting( 'sharksdesign_header_contact_width', 
			        array(
			            'default'    => '1100',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'sharksdesign_header_contact_width',array(
			        	'label'      => __( 'Header Contact Width', 'sharksdesign' ), 
			            'settings'   => 'sharksdesign_header_contact_width', 
			            'priority'   => 0,
			            'section'    => 'sharksdesign_header_width',
			            'type'    => 'number',
			            'active_callback'  => 'sharksdesign_header_content_width_call_back',
			        ) 
		        ) );
		
    
    //Global Section		
    	$wp_customize->add_panel( 'sharksdesign_global_panel', array(
			'title'     => __('Global', 'sharksdesign'),
			'priority'  => 3,
		) );  
		// Create global Fonts & Typography option
			$wp_customize->add_section( 'global_body_section' , array(
				'title'  => __('Body Fonts & Typography', 'sharksdesign'),
				'panel'  => 'sharksdesign_global_panel',
			) );			
			//global option in body font family
				global $sharksdesign_fonttotal;
		        $wp_customize->add_setting('sharksdesign_body_fontfamily', array(
			        'default'        => 5,
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sharksdesign_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'sharksdesign_body_fontfamily',
			    	array(
				        'settings' => 'sharksdesign_body_fontfamily',
				        'label'   => __('Body Font Family', 'sharksdesign'),
				        'section' => 'global_body_section',
				        'type'    => 'select',
				        'choices' => $sharksdesign_fonttotal,
				    )
				)); 

			//global otion in body font size 
				$wp_customize->add_setting('sharksdesign_body_font_size', array(
			        'default'        => 15,
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'sharksdesign_body_font_size',
			    	array(
				        'settings' => 'sharksdesign_body_font_size',
				        'label'   => 'Body Font Size',
				        'section' => 'global_body_section',
				        'type'  => "number",
				        'description' => 'in px',
		            	'input_attrs' => array(
									    'min' => 1,
									    'max' => 50,
									),
			        )
			    )); 
			//global option in body font weight
			    $wp_customize->add_setting('sharksdesign_body_font_weight', array(
			        'default'        => 400,
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sharksdesign_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'sharksdesign_body_font_weight',
			    	array(
				        'settings' => 'sharksdesign_body_font_weight',
				        'label'   => __('Body Font Weight','sharksdesign'),
				        'section' => 'global_body_section',
				        'type'  => "select",
				        'choices' => $sharksdesign_font_weight,
			        )
			    ));
			//global option in body text transform
			    $wp_customize->add_setting('sharksdesign_body_text_transform', array(
			        'default'        => 'inherit',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sharksdesign_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'sharksdesign_body_text_transform',
			    	array(
				        'settings' => 'sharksdesign_body_text_transform',
				        'label'   => __('Body Text Transform','sharksdesign'),
				        'section' => 'global_body_section',
				        'type'  => "select",
				        'choices' =>  $sharksdesign_text_transform,
			        )
			    ));

				//mobile in font size
				    $wp_customize->add_setting( 'sharksdesign_mobile_font_size', 
				        array(
				            'default'    => '14', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_text_field',
				        ) 
				    ); 
			        $wp_customize->add_control( new WP_Customize_Control( 
				        $wp_customize, 'sharksdesign_mobile_font_size', 
				        array(
				            'label'      =>  'Mobile Font Size', 
				            'type'       => "number",
				            'priority'    => 10,
				            'settings'   => 'sharksdesign_mobile_font_size', 
				            'section'    => 'global_body_section',
				            'description' => 'in px',
				            'input_attrs' => array(
											    'min' => 1,
											    'max' => 100,
											),
				        ) 
			        ) );     
		// Create global Heading Fonts & Typography option
			$wp_customize->add_section( 'global_heading_section' , array(
				'title'             => __('Heading Fonts & Typography', 'sharksdesign' ), 
				'panel'             => 'sharksdesign_global_panel',
			) );
			//global option in body font family add select dropdown
				global $sharksdesign_fonttotal;
		        $wp_customize->add_setting('sharksdesign_Heading_fontfamily', array(
			        'default'        => 5,
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sharksdesign_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'sharksdesign_Heading_fontfamily',
			    	array(
				        'settings' => 'sharksdesign_Heading_fontfamily',
				        'label'   => __('Heading Font Family','sharksdesign' ), 
				        'section' => 'global_heading_section',
				        'type'    => 'select',
				        'choices' => $sharksdesign_fonttotal,
			        )
			    )); 

			//heading1 Title
			    $wp_customize->add_setting('Heading1_section', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new Sharksdesign_GeneratePress_Upsell_Section(
			    	$wp_customize,'Heading1_section',
			    	array(
				        'settings' => 'Heading1_section',
				        'label'   => __('Heading 1 (H1)','sharksdesign' ), 
				        'section' => 'global_heading_section',
				        'type'     => 'ast-description',
			        )
			    ));

				//global option in heading1 font family
					global $sharksdesign_fonttotal;
			        $wp_customize->add_setting('sharksdesign_Heading1_fontfamily', array(
				        'default'        => 5,
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sharksdesign_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'sharksdesign_Heading1_fontfamily',
				    	array(
					        'settings' => 'sharksdesign_Heading1_fontfamily',
					        'label'   => __('Font Family','sharksdesign' ), 
					        'section' => 'global_heading_section',
					        'type'    => 'select',
					        'choices' => $sharksdesign_fonttotal,
				        )
				    ));
				//global heading1 font size
				    $wp_customize->add_setting( 'sharksdesign_heading1_font_size', 
				        array(
				            'default'    => '35', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_text_field',
				        ) 
				    ); 

			        $wp_customize->add_control( new WP_Customize_Control( 
				        $wp_customize, 
				        'sharksdesign_heading1_font_size', 
				        array(
				            'label'      => __( 'Font Size', 'sharksdesign' ), 
				            'type'       => "number",
				            'priority'    => 10,
				            'settings'   => 'sharksdesign_heading1_font_size', 
				            'section'    => 'global_heading_section',
				            'description' => 'in px',
				            'input_attrs' => array(
											    'min' => 1,
											    'max' => 100,
											),
				        ) 
			        ) );
			    //global in heading1 font weight
				    $wp_customize->add_setting('sharksdesign_heading1_font_weight', array(
				        'default'        => 'bold',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sharksdesign_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'sharksdesign_heading1_font_weight',
				    	array(
					        'settings' => 'sharksdesign_heading1_font_weight',
					        'label'   => __('Font Weight','sharksdesign' ), 
					        'section' => 'global_heading_section',
					        'type'  => 'select',
					        'choices' => $sharksdesign_font_weight,
				        )
				    ));
				//global in heading1 text transform
				    $wp_customize->add_setting('sharksdesign_heading1_text_transform', array(
				        'default'        => 'inherit',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sharksdesign_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'sharksdesign_heading1_text_transform',
				    	array(
					        'settings' => 'sharksdesign_heading1_text_transform',
					        'label'   => __('Text Transform','sharksdesign' ), 
					        'section' => 'global_heading_section',
					        'type'  => 'select',
					        'choices' =>  $sharksdesign_text_transform,
				        )
				    ));
				//mobile in heading1 font size
				    $wp_customize->add_setting( 'sharksdesign_mobile_heading1_font_size', 
				        array(
				            'default'    => '20', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_text_field',
				        ) 
				    ); 

			        $wp_customize->add_control( new WP_Customize_Control( 
				        $wp_customize, 'sharksdesign_mobile_heading1_font_size', 
				        array(
				            'label'      => __( 'Mobile Font Size', 'sharksdesign' ), 
				            'type'       => "number",
				            'priority'    => 10,
				            'settings'   => 'sharksdesign_mobile_heading1_font_size', 
				            'section'    => 'global_heading_section',
				            'description' => 'in px',
				            'input_attrs' => array(
											    'min' => 1,
											    'max' => 100,
											),
				        ) 
			        ) );

		    //heading2 Title
			    $wp_customize->add_setting('Heading2_section', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sharksdesign_sanitize_select',
			    ));
			    $wp_customize->add_control( new sharksdesign_GeneratePress_Upsell_Section(
			    	$wp_customize,'Heading2_section',
			    	array(
				        'settings' => 'Heading2_section',
				        'label'   => __('Heading 2 (H2)','sharksdesign' ), 
				        'section' => 'global_heading_section',
			        )
			    ));
				//global option in heading2 font family
					global $sharksdesign_fonttotal;
			        $wp_customize->add_setting('sharksdesign_Heading2_fontfamily', array(
				        'default'        => 5,
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sharksdesign_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'sharksdesign_Heading2_fontfamily',
				    	array(
					        'settings' => 'sharksdesign_Heading2_fontfamily',
					        'label'   => __('Font Family','sharksdesign' ), 
					        'section' => 'global_heading_section',
					        'type'    => 'select',
					        'choices' => $sharksdesign_fonttotal,
				        )
				    )); 
				//global heading2 font size
				    $wp_customize->add_setting( 'sharksdesign_heading2_font_size', 
				        array(
				            'default'    => '28', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_text_field',
				        ) 
				    ); 

			        $wp_customize->add_control( new WP_Customize_Control( 
				        $wp_customize, 'sharksdesign_heading2_font_size', 
				        array(
				            'label'      =>  'Font Size', 
				            'type'       => "number",
				            'priority'    => 10,
				            'settings'   => 'sharksdesign_heading2_font_size', 
				            'section'    => 'global_heading_section',
				            'description' => 'in px',
				            'input_attrs' => array(
											    'min' => 1,
											    'max' => 100,
											),
				        ) 
			        ) );
			    //global in heading2 font weight
				    $wp_customize->add_setting('sharksdesign_heading2_font_weight', array(
				        'default'        => 'bold',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sharksdesign_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'sharksdesign_heading2_font_weight',
				    	array(
					        'settings' => 'sharksdesign_heading2_font_weight',
					        'label'   => __('Font Weight','sharksdesign' ), 
					        'section' => 'global_heading_section',
					        'type'  => 'select',
					        'choices' => $sharksdesign_font_weight,
				        )
				    ));
				//global in heading2 text transform
				    $wp_customize->add_setting('sharksdesign_heading2_text_transform', array(
				        'default'        => 'inherit',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sharksdesign_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'sharksdesign_heading2_text_transform',
				    	array(
					        'settings' => 'sharksdesign_heading2_text_transform',
					        'label'   => __('Text Transform','sharksdesign' ), 
					        'section' => 'global_heading_section',
					        'type'  => 'select',
					        'choices' =>  $sharksdesign_text_transform,
				        )
				    ));
				//mobile in heading2 font size
				    $wp_customize->add_setting( 'sharksdesign_mobile_heading2_font_size', 
				        array(
				            'default'    => '18', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_text_field',
				        ) 
				    ); 

			        $wp_customize->add_control( new WP_Customize_Control( 
				        $wp_customize, 'sharksdesign_mobile_heading2_font_size', 
				        array(
				            'label'      => 'Mobile Font Size', 
				            'type'       => "number",
				            'priority'    => 10,
				            'settings'   => 'sharksdesign_mobile_heading2_font_size', 
				            'section'    => 'global_heading_section',
				            'description' => 'in px', 
				            'input_attrs' => array(
											    'min' => 1,
											    'max' => 100,
											),
				        ) 
			        ) );

		    //heading3 Title
			    $wp_customize->add_setting('Heading3_section', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new sharksdesign_GeneratePress_Upsell_Section(
			    	$wp_customize,'Heading3_section',
			    	array(
				        'settings' => 'Heading3_section',
				        'label'   => __('Heading 3 (H3)', 'sharksdesign' ), 
				        'section' => 'global_heading_section',
			        )
			    ));
				//global option in heading3 font family
					global $sharksdesign_fonttotal;
			        $wp_customize->add_setting('sharksdesign_Heading3_fontfamily', array(
				        'default'        => 5,
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sharksdesign_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'sharksdesign_Heading3_fontfamily',
				    	array(
					        'settings' => 'sharksdesign_Heading3_fontfamily',
					        'label'   => __('Font Family','sharksdesign' ), 
					        'section' => 'global_heading_section',
					        'type'    => 'select',
					        'choices' => $sharksdesign_fonttotal,
				        )
				    ));
			    //global heading3 font size
				    $wp_customize->add_setting( 'sharksdesign_heading3_font_size', 
				        array(
				            'default'    => '25', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_text_field',
				        ) 
				    ); 

			        $wp_customize->add_control( new WP_Customize_Control( 
				        $wp_customize, 'sharksdesign_heading3_font_size', 
				        array(
				            'label'      => __( 'Font Size', 'sharksdesign' ), 
				            'type'       => "number",
				            'priority'    => 10,
				            'settings'   => 'sharksdesign_heading3_font_size', 
				            'section'    => 'global_heading_section',
				            'description' => 'in px', 
				            'input_attrs' => array(
											    'min' => 1,
											    'max' => 100,
											),
				        ) 
			        ) );
			    //global in heading3 font weight
				    $wp_customize->add_setting('sharksdesign_heading3_font_weight', array(
				        'default'        => 400,
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sharksdesign_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'sharksdesign_heading3_font_weight',
				    	array(
					        'settings' => 'sharksdesign_heading3_font_weight',
					        'label'   => __('Font Weight', 'sharksdesign' ), 
					        'section' => 'global_heading_section',
					        'type'  => 'select',
					        'choices' => $sharksdesign_font_weight,
				        )
				    ));
				//global in heading2 text transform
				    $wp_customize->add_setting('sharksdesign_heading3_text_transform', array(
				        'default'        => 'inherit',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sharksdesign_sanitize_select',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'sharksdesign_heading3_text_transform',
				    	array(
					        'settings' => 'sharksdesign_heading3_text_transform',
					        'label'   => __('Text Transform', 'sharksdesign' ), 
					        'section' => 'global_heading_section',
					        'type'  => 'select',
					        'choices' =>  $sharksdesign_text_transform,
				        )
				    ));
				//mobile in heading2 font size
				    $wp_customize->add_setting( 'sharksdesign_mobile_heading3_font_size', 
				        array(
				            'default'    => '14', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'transport'   => 'refresh',
				            'capability' => 'edit_theme_options',
				            'sanitize_callback' => 'sanitize_text_field',
				        ) 
				    ); 

			        $wp_customize->add_control( new WP_Customize_Control( 
				        $wp_customize, 'sharksdesign_mobile_heading3_font_size', 
				        array(
				            'label'      => 'Mobile Font Size', 
				            'type'       => "number",
				            'priority'    => 10,
				            'settings'   => 'sharksdesign_mobile_heading3_font_size', 
				            'section'    => 'global_heading_section',
				            'description' => 'in px', 
				            'input_attrs' => array(
											    'min' => 1,
											    'max' => 100,
											),
				        ) 
			        ) );
	    // Create a Container Option
			$wp_customize->add_section( 'global_container_section' , array(
				'title'             => __('Container', 'sharksdesign' ), 
				'panel'             => 'sharksdesign_global_panel',
			) );	
			//Container Blog Title
				$wp_customize->add_setting( 'sharksdesign_blog_title', 
			        array(
			            'default'    => 'Blogs', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize, 'sharksdesign_blog_title', 
			        array(
			            'label'      => __( 'Blog Title', 'sharksdesign' ), 
			            'settings'   => 'sharksdesign_blog_title', 
			            'priority'   => 0, 
			            'type'       => 'text',
			            'section'    => 'global_container_section',
			        ) 
		        ) );
			//Container Section in width layout
			    $wp_customize->add_setting( 'sharksdesign_container_width_layout', 
			        array(
			            'default'    => 'content_width',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'sharksdesign_container_width_layout',array(
			        	'label'      => __( 'Page Layouts', 'sharksdesign' ), 
			            'settings'   => 'sharksdesign_container_width_layout', 
			            'priority'   => 0,
			            'section'    => 'global_container_section',
			            'type'    => 'select',
			            'choices' => array(
			            				'full_width' => 'Full Width',
			            				'content_width' => 'Content Boxed',
			            				'boxed_layout' => 'Boxed Layout',
			            			),
			        ) 
		        ) );	   
		    //Contact Info Section in contact width
			    $wp_customize->add_setting( 'sharksdesign_container_contact_width', 
			        array(
			            'default'    => '1100',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'sharksdesign_container_contact_width',array(
			        	'label'      => __( 'Container Contact Width', 'sharksdesign' ), 
			            'settings'   => 'sharksdesign_container_contact_width', 
			            'priority'   => 0,
			            'section'    => 'global_container_section',
			            'type'    => 'number',
			            'active_callback'  => 'sharksdesign_container_content_width_call_back',
			        ) 
		        ) );	           
		    //Container Option in Backgound Color
				$wp_customize->add_setting( 'sharksdesign_container_bg_color', 
			        array(
			            'default'    => '#16181c', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( 
			        $wp_customize, 'sharksdesign_container_bg_color', 
			        array(
			            'label'      => __( 'Container Background Color', 'sharksdesign' ), 
			            'settings'   => 'sharksdesign_container_bg_color', 
			            'priority'   => 10, 
			            'section'    => 'global_container_section',
			        ) 
		        ) );
		    //Container Option in Backgound Color
				$wp_customize->add_setting( 'sharksdesign_container_text_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( 
			        $wp_customize, 'sharksdesign_container_text_color', 
			        array(
			            'label'      => __( 'Container Text Color', 'sharksdesign' ), 
			            'settings'   => 'sharksdesign_container_text_color', 
			            'priority'   => 10, 
			            'section'    => 'global_container_section',
			        ) 
		        ) );	
		    //Container Option in Boxed Backgound Color
				$wp_customize->add_setting( 'sharksdesign_boxed_container_bg_color', 
			        array(
			            'default'    => '#212428', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( 
			        $wp_customize, 'sharksdesign_boxed_container_bg_color', 
			        array(
			            'label'      => __( 'Content Boxed Background Color', 'sharksdesign' ), 
			            'settings'   => 'sharksdesign_boxed_container_bg_color', 
			            'priority'   => 10, 
			            'section'    => 'global_container_section',
			            'active_callback'  => 'sharksdesign_content_box_call_back',
			        ) 
		        ) );	
		    //Boxed Layout Option in Backgound Color
				$wp_customize->add_setting( 'sharksdesign_boxed_layout_bg_color', 
			        array(
			            'default'    => '#212428', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( 
			        $wp_customize, 'sharksdesign_boxed_layout_bg_color', 
			        array(
			            'label'      => __( 'Boxed Layout Background Color', 'sharksdesign' ), 
			            'settings'   => 'sharksdesign_boxed_layout_bg_color', 
			            'priority'   => 10, 
			            'section'    => 'global_container_section',
			            'active_callback'  => 'sharksdesign_box_layout_call_back',
			        ) 
		        ) );	
		    //Container Option in blog layout
		        $wp_customize->add_setting('sharksdesign_container_blog_layout', array(
			        'default'        => 'grid_view',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sharksdesign_sanitize_select',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'sharksdesign_container_blog_layout',
			    	array(
				        'settings' => 'sharksdesign_container_blog_layout',
				        'label'   => __( 'Blogs Layouts', 'sharksdesign' ),
				        'section' => 'global_container_section',
				        'type'    => 'select',
				        'choices' => array(
				        			'list_view' => 'List View',
				        			'grid_view' => 'Grid View',
				        ),
			        )
			    ));	
			//Grid View Title
			    $wp_customize->add_setting('grid_view_section', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new sharksdesign_GeneratePress_Upsell_Section(
			    	$wp_customize,'grid_view_section',
			    	array(
				        'settings' => 'grid_view_section',
				        'label'   => __( 'Grid View','sharksdesign' ),
				        'section' => 'global_container_section',
				        'type'     => 'ast-description',
				        'active_callback'  => 'sharksdesign_grid_view_callback',
			        )
			    ));
			//Container Option in grid view columns
			        $wp_customize->add_setting('sharksdesign_container_grid_view_col', array(
				        'default'        => '3',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'sharksdesign_container_grid_view_col',
				    	array(
					        'settings' => 'sharksdesign_container_grid_view_col',
					        'label'   => __( 'Columns','sharksdesign' ),
					        'section' => 'global_container_section',
					        'type'    => 'select',
					        'choices' => array(
					        			'1' => '1',
					        			'2' => '2',
					        			'3' => '3',
					        			'4' => '4',
					        			'5' => '5',
					        ),
					        'active_callback'  => 'sharksdesign_grid_view_callback',
				        )
				    ));
				//Container Option in grid view columns gap
			        $wp_customize->add_setting('sharksdesign_container_grid_view_col_gap', array(
				        'default'        => '20',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'sharksdesign_container_grid_view_col_gap',
				    	array(
					        'settings' => 'sharksdesign_container_grid_view_col_gap',
					        'label'   =>  'Columns Gap',
					        'section' => 'global_container_section',
					        'type'    => 'number',
					        'description' => 'in px', 
					        'active_callback'  => 'sharksdesign_grid_view_callback',
				        )
				    ));	  
		    //Display meta and entry-content title
				$wp_customize->add_setting('display_meta_content_section', array(
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new sharksdesign_GeneratePress_Upsell_Section(
			    	$wp_customize,'display_meta_content_section',
			    	array(
				        'settings' => 'display_meta_content_section',
				        'label'   => __( 'Display Home Page Container','sharksdesign' ),
				        'section' => 'global_container_section',
			        )
			    )); 
			    //display containe
			        $wp_customize->add_setting( 'sharksdesign_container_containe', array(		                
						'default'   => true,
						'priority'  => 10,
						'sanitize_callback' => 'sharksdesign_sanitize_checkbox',
					));							    
					$wp_customize->add_control(  new WP_Customize_Control(
						$wp_customize,'sharksdesign_container_containe', 
						array(
							'label' => __('Display Blog Containe','sharksdesign' ),
							'type'  => 'checkbox', // this indicates the type of control
							'section' => 'global_container_section',
							'settings' => 'sharksdesign_container_containe',
							)
					));
				//display container description
			        $wp_customize->add_setting( 'sharksdesign_container_description', array(		                
						'default'   => false,
						'priority'  => 10,
						'sanitize_callback' => 'sharksdesign_sanitize_checkbox',
					));							    
					$wp_customize->add_control(  new WP_Customize_Control(
						$wp_customize,'sharksdesign_container_description', 
						array(
							'label' => __('Display Container Description','sharksdesign' ),
							'type'  => 'checkbox', // this indicates the type of control
							'section' => 'global_container_section',
							'settings' => 'sharksdesign_container_description',
							)
					));
				//display container Date
			        $wp_customize->add_setting( 'sharksdesign_container_date', array(		                
						'default'   => true,
						'priority'  => 10,
						'sanitize_callback' => 'sharksdesign_sanitize_checkbox',
					));							    
					$wp_customize->add_control(  new WP_Customize_Control(
						$wp_customize,'sharksdesign_container_date', 
						array(
							'label' => __('Display Container Date','sharksdesign' ),
							'type'  => 'checkbox', // this indicates the type of control
							'section' => 'global_container_section',
							'settings' => 'sharksdesign_container_date',
							)
					));
				//display container Authore
			        $wp_customize->add_setting( 'sharksdesign_container_authore', array(		                
						'default'   => false,
						'priority'  => 10,
						'sanitize_callback' => 'sharksdesign_sanitize_checkbox',
					));							    
					$wp_customize->add_control(  new WP_Customize_Control(
						$wp_customize,'sharksdesign_container_authore', 
						array(
							'label' => __('Display Container Authore','sharksdesign' ),
							'type'  => 'checkbox', // this indicates the type of control
							'section' => 'global_container_section',
							'settings' => 'sharksdesign_container_authore',
							)
					));
				//display container Category
			        $wp_customize->add_setting( 'sharksdesign_container_category', array(		                
						'default'   => true,
						'priority'  => 10,
						'sanitize_callback' => 'sharksdesign_sanitize_checkbox',
					));							    
					$wp_customize->add_control(  new WP_Customize_Control(
						$wp_customize,'sharksdesign_container_category', 
						array(
							'label' => __('Display Container Category','sharksdesign' ),
							'type'  => 'checkbox', // this indicates the type of control
							'section' => 'global_container_section',
							'settings' => 'sharksdesign_container_category',
							)
					));
				//display container comments
			        $wp_customize->add_setting( 'sharksdesign_container_comments', array(		                
						'default'   => false,
						'priority'  => 10,
						'sanitize_callback' => 'sharksdesign_sanitize_checkbox',
					));							    
					$wp_customize->add_control(  new WP_Customize_Control(
						$wp_customize,'sharksdesign_container_comments', 
						array(
							'label' => __('Display Container Comments','sharksdesign' ),
							'type'  => 'checkbox', // this indicates the type of control
							'section' => 'global_container_section',
							'settings' => 'sharksdesign_container_comments',
							)
					));	
				//display Read More buttons
					$wp_customize->add_setting( 'sharksdesign_container_readmore_btn', array(		                
						'default'   => true,
						'priority'  => 10,
						'sanitize_callback' => 'sharksdesign_sanitize_checkbox',
					));							    
					$wp_customize->add_control(  new WP_Customize_Control(
						$wp_customize,'sharksdesign_container_readmore_btn', 
						array(
							'label' => __('Display Read More Button','sharksdesign' ),
							'type'  => 'checkbox', // this indicates the type of control
							'section' => 'global_container_section',
							'settings' => 'sharksdesign_container_readmore_btn',
							)
					));	
				//display Read More buttons title
					$wp_customize->add_setting( 'sharksdesign_container_readmore_btn_title', array(		                
						'default'   => 'Read More',
						'priority'  => 10,
						'sanitize_callback' => 'sanitize_text_field',
					));							    
					$wp_customize->add_control(  new WP_Customize_Control(
						$wp_customize,'sharksdesign_container_readmore_btn_title', 
						array(
							'label' =>  __('Read More Button Title','sharksdesign' ),
							'type'  => 'text', // this indicates the type of control
							'section' => 'global_container_section',
							'settings' => 'sharksdesign_container_readmore_btn_title',
							'active_callback' => 'sharksdesign_read_more_callback',
							)
					));	
        //Create global section in add Buttons
			// Create Button color and Backgound color
				$wp_customize->add_section( 'global_button_option' , array(
					'title'  => 'Buttons',
					'panel'  =>  __('sharksdesign_global_panel','sharksdesign' ),
				) );
			//Button background color
		        $wp_customize->add_setting( 'sharksdesign_button_bg_color', 
			        array(
			            'default'    => '#212428', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( 
			        $wp_customize, 'sharksdesign_button_bg_color', 
			        array(
			            'label'      => __( 'Button Background Color', 'sharksdesign' ), 
			            'settings'   => 'sharksdesign_button_bg_color', 
			            'priority'   => 10, 
			            'section'    => 'global_button_option',
			        ) 
		        ) );
		    //global option in Button Background Hover color
				$wp_customize->add_setting( 'sharksdesign_button_bg_hover_color', 
			        array(
			            'default'    => '#c4cfde', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( 
			        $wp_customize, 'sharksdesign_button_bg_hover_color', 
			        array(
			            'label'      => __( 'Background Hover Color', 'sharksdesign' ), 
			            'settings'   => 'sharksdesign_button_bg_hover_color', 
			            'section'    => 'global_button_option',
			        ) 
		        ) );
		    //global option in Button Text color
				$wp_customize->add_setting( 'sharksdesign_button_text_color', 
			        array(
			            'default'    => '#c4cfde', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( 
			        $wp_customize, 'sharksdesign_button_text_color', 
			        array(
			            'label'      => __( 'Button Text Color', 'sharksdesign' ), 
			            'settings'   => 'sharksdesign_button_text_color', 
			            'section'    => 'global_button_option',
			        ) 
		        ) ); 
		    //global option in Button Text hover color
				$wp_customize->add_setting( 'sharksdesign_button_texthover_color', 
			        array(
			            'default'    => '#212428', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( 
			        $wp_customize, 'sharksdesign_button_texthover_color', 
			        array(
			            'label'      => __( 'Button Text Hover Color', 'sharksdesign' ), 
			            'settings'   => 'sharksdesign_button_texthover_color', 
			            'section'    => 'global_button_option',
			        ) 
		        ) ); 
		    //global option in Button Border color
				$wp_customize->add_setting( 'sharksdesign_button_border_color', 
			        array(
			            'default'    => '#c4cfde', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( 
			        $wp_customize, 'sharksdesign_button_border_color', 
			        array(
			            'label'      => __( 'Border Color', 'sharksdesign' ), 
			            'settings'   => 'sharksdesign_button_border_color', 
			            'section'    => 'global_button_option',
			        ) 
		        ) );
		    //global option in Button Border Hover color
				$wp_customize->add_setting( 'sharksdesign_button_border_hover_color', 
			        array(
			            'default'    => '#c4cfde', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( 
			        $wp_customize, 'sharksdesign_button_border_hover_color', 
			        array(
			            'label'      => __( 'Border Hover Color', 'sharksdesign' ), 
			            'settings'   => 'sharksdesign_button_border_hover_color', 
			            'section'    => 'global_button_option',
			        ) 
		        ) );
		    //global option in button border width
		        $wp_customize->add_setting( 'sharksdesign_borderwidth', 
			        array(
			            'default'    => '2', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize, 'sharksdesign_borderwidth', 
			        array(
			            'label'      => __( 'Border Width', 'sharksdesign' ), 
			            'type'  => "number",
			            'settings'   => 'sharksdesign_borderwidth', 
			            'section'    => 'global_button_option',
			            'description' => 'in px',
			        ) 
		        ) ); 
		    //global option in button border radius
		        $wp_customize->add_setting( 'sharksdesign_button_border_radius', 
			        array(
			            'default'    => '2', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize, 'sharksdesign_button_border_radius', 
			        array(
			            'label'      =>  'Border Radius', 
			            'type'  	 => "number",
			            'settings'   => 'sharksdesign_button_border_radius', 
			            'section'    => 'global_button_option',
			            'description'=> 'in px', 
			        ) 
		        ) );
		    //global option in button padding
		        $wp_customize->add_setting( 'sharksdesign_button_padding', 
			        array(
			            'default'    => '10px 15px', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 

		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize, 'sharksdesign_button_padding', 
			        array(
			            'label'      => __( 'Button Padding', 'sharksdesign' ), 
			            'type'  	 => "text",
			            'settings'   => 'sharksdesign_button_padding', 
			            'section'    => 'global_button_option',
			            'description'=> '15px 25px',
			        ) 
		        ) );  
		//Create a Scroll Button
			$wp_customize->add_section( 'scroll_button_section' , array(
				'title'             =>__( 'Scroll Button','sharksdesign' ),
				'panel'             => 'sharksdesign_global_panel',
			) ); 
			//Scroll Button display
				$wp_customize->add_setting( 'display_scroll_button', array(		                
					'default'   => true,
					'priority'  => 10,
					'sanitize_callback' => 'sharksdesign_sanitize_checkbox',
				));							    
				$wp_customize->add_control(  new WP_Customize_Control(
					$wp_customize,'display_scroll_button', 
					array(
						'label' => __('Display Scroll Button','sharksdesign' ),
						'type'  => 'checkbox', // this indicates the type of control
						'section' => 'scroll_button_section',
						'settings' => 'display_scroll_button',
						)
				));
			//Scroll Button in add Background color
			    $wp_customize->add_setting( 'sharksdesign_scroll_button_bg_color', 
			        array(
			            'default'    => '#212428', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( 
			        $wp_customize,'sharksdesign_scroll_button_bg_color', 
			        array(
			            'label'      => __( 'Background Color', 'sharksdesign' ), 
			            'settings'   => 'sharksdesign_scroll_button_bg_color', 
			            'priority'   => 10,
			            'section'    => 'scroll_button_section',
			            'active_callback' => 'sharksdesign_scroll_callback',
			        ) 
		        ) );  
		    //Scroll Button in add color
			    $wp_customize->add_setting( 'sharksdesign_scroll_button_color', 
			        array(
			            'default'    => '#c4cfde', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( 
			        $wp_customize,'sharksdesign_scroll_button_color', 
			        array(
			            'label'      => __( 'Scroll Icon Color', 'sharksdesign' ), 
			            'settings'   => 'sharksdesign_scroll_button_color', 
			            'priority'   => 10,
			            'section'    => 'scroll_button_section',
			            'active_callback' => 'sharksdesign_scroll_callback',
			        ) 
		        ) );               

	//Sidebar Section
		$wp_customize->add_panel( 'sharksdesign_sidebar_panel', array(
			'title'     => 'Sidebar',
			'priority'  => 4,
		) ); 
		$post_types = get_post_types(array('public' => true), 'names', 'and');
		foreach ($post_types  as $post_type) {
				$wp_customize->add_section( 'sidebar_section_' .$post_type, array(
					'title'             => $post_type .' Sidebar',
					'panel'             => 'sharksdesign_sidebar_panel',
				) );
				//sidebar in add layout select dropdown
			        $wp_customize->add_setting('sharksdesign_post_sidebar_select_'.$post_type , array(
						'default'   => 'right_sidebar',
				        'type'       => 'theme_mod',
				        'capability'     => 'edit_theme_options',
				        'transport'   => 'refresh',
				        'sanitize_callback' => 'sharksdesign_sanitize_select',		  
				    ));
				    $layout_label= $post_type . ' Layout:';
				    $wp_customize->add_control( new sharksdesign_Custom_Radio_Image_Control(
				    	$wp_customize,'sharksdesign_post_sidebar_select_'.$post_type,
				    	array(
					        'settings' => 'sharksdesign_post_sidebar_select_'.$post_type,
					        'label'   => $layout_label,
					        'section' => 'sidebar_section_'.$post_type,
					        'type'    => 'select',
					        'choices' => sharksdesign_site_layout(),
				        )
				    ));

			    //sidebar in width text filed
					$wp_customize->add_setting( 'sharksdesign_post_sidebar_width_' . $post_type, 
				        array(
				            'default'    => '30', //Default setting/value to save
				            'type'       => 'theme_mod',
				            'capability'     => 'edit_theme_options',
				            'transport'   => 'refresh',
				            'sanitize_callback' => 'sanitize_text_field',
				        ) 
				    );
			        $wp_customize->add_control( new WP_Customize_Control( 
				        $wp_customize, 
				        'sharksdesign_post_sidebar_width_' . $post_type, 
				        array(
				            'label'      => $post_type . ' Sidebar Width:',
				            'type'  => "number",
				            'settings'   => 'sharksdesign_post_sidebar_width_' . $post_type, 
				            'section'    => 'sidebar_section_'.$post_type,
				            'description' => 'in %',
				        ) 
			        ) );
		}
		$wp_customize->add_section( 'sharksdesign_sidebar_design', array(
			'title'             => __('Design','sharksdesign' ),
			'panel'             => 'sharksdesign_sidebar_panel',
		) );
	    //Sidebar design Heading Text color
			$wp_customize->add_setting( 'sharksdesign_sidebar_heading_text_color', 
		        array(
		            'default'    => '#ffffff', //Default setting/value to save
		            'type'       => 'theme_mod',
		            'transport'   => 'refresh',
		            'capability' => 'edit_theme_options',
		            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
		        ) 
		    ); 
	        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( 
		        $wp_customize,'sharksdesign_sidebar_heading_text_color', 
		        array(
		            'label'      => __( 'Heading Text Color', 'sharksdesign' ), 
		            'settings'   => 'sharksdesign_sidebar_heading_text_color', 
		            'priority'   => 10,
		            'section'    => 'sharksdesign_sidebar_design',
		        ) 
	        ) );   

	//Theme Option in globly
		$wp_customize->add_panel( 'theme_option_panel', array(
			'title'     => __('Theme Option', 'sharksdesign'),
			'priority'  => 5,
		) );
		//Breadcrumb Section			
			$wp_customize->add_section( 'global_breadcrumb_section' , array(
				'title'  => __('Breadcrumb Section','sharksdesign' ),
				'panel'  => 'theme_option_panel',				

			) );
			//Breadcrumb Section in entire site select 
				$wp_customize->add_setting( 'sharksdesign_display_breadcrumb_section', array(		                
					'default'   => true,
					'priority'  => 10,
					'sanitize_callback' => 'sharksdesign_sanitize_checkbox',
				));							    
				$wp_customize->add_control(  new WP_Customize_Control(
					$wp_customize,'sharksdesign_display_breadcrumb_section', 
					array(
						'label' => __('Disable On Breadcrumb Entire Site','sharksdesign' ),
						'type'  => 'checkbox',
						'section' => 'global_breadcrumb_section',
						'settings' => 'sharksdesign_display_breadcrumb_section',
						)
				));	
				if ( isset( $wp_customize->selective_refresh ) ) {
					$wp_customize->selective_refresh->add_partial(
						'sharksdesign_display_breadcrumb_section',
						array(
							'selector'        => '.breadcrumb_info',
							'render_callback' => 'sharksdesign_customize_partial_breadcrumb',
						)
					);
				}
			//Breadcrumb Section in Background color
				$wp_customize->add_setting( 'sharksdesign_breadcrumb_bg_color', 
			        array(
			            'default'    => '#c8c9cb', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( 
			        $wp_customize,'sharksdesign_breadcrumb_bg_color', 
			        array(
			            'label'      => __( 'Background Color', 'sharksdesign' ), 
			            'settings'   => 'sharksdesign_breadcrumb_bg_color', 
			            'priority'   => 10,
			            'section'    => 'global_breadcrumb_section',
			            'active_callback' => 'sharksdesign_breadcrumb_call_back',
			        ) 
		        ) ); 
		    //Breadcrumb Section in Text color
				$wp_customize->add_setting( 'sharksdesign_breadcrumb_text_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( 
			        $wp_customize,'sharksdesign_breadcrumb_text_color', 
			        array(
			            'label'      => __( 'Text Color', 'sharksdesign' ), 
			            'settings'   => 'sharksdesign_breadcrumb_text_color', 
			            'priority'   => 10,
			            'section'    => 'global_breadcrumb_section',
			            'active_callback' => 'sharksdesign_breadcrumb_call_back',
			        ) 
		        ) ); 
		    //Breadcrumb Section in Icon color
				$wp_customize->add_setting( 'sharksdesign_breadcrumb_link_color', 
			        array(
			            'default'    => '#c4cfde', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( 
			        $wp_customize,'sharksdesign_breadcrumb_link_color', 
			        array(
			            'label'      => __( 'Icon Color', 'sharksdesign' ), 
			            'settings'   => 'sharksdesign_breadcrumb_link_color', 
			            'priority'   => 10,
			            'section'    => 'global_breadcrumb_section',
			            'active_callback' => 'sharksdesign_breadcrumb_call_back',
			        ) 
		        ) ); 
		    //Breadcrumb Section in Icon Background color
		        $wp_customize->add_setting( 'sharksdesign_breadcrumb_icon_background_color', 
			        array(
			            'default'    => '#212428', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control( 
			        $wp_customize,'sharksdesign_breadcrumb_icon_background_color', 
			        array(
			            'label'      => __( 'Icon Button Background Color', 'sharksdesign' ), 
			            'settings'   => 'sharksdesign_breadcrumb_icon_background_color', 
			            'priority'   => 10,
			            'section'    => 'global_breadcrumb_section',
			            'active_callback' => 'sharksdesign_breadcrumb_call_back',
			        ) 
		        ) ); 
		    //Breadcrumb Section background image option
		        $wp_customize->add_setting('sharksdesign_breadcrumb_bg_image', array(
		        	'type'       => 'theme_mod',
			        'transport'     => 'refresh',
			        'height'        => 180,
			        'width'        => 160,
			        'capability' => 'edit_theme_options',
			        'sanitize_callback' => 'esc_url_raw'
			    ));
			    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sharksdesign_breadcrumb_bg_image', array(
			        'label' => __('Backgroung Image', 'sharksdesign'),
			        'section' => 'global_breadcrumb_section',
			        'settings' => 'sharksdesign_breadcrumb_bg_image',
			        'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
			        'active_callback' => 'sharksdesign_breadcrumb_call_back',
			    ))); 
			//Breadcrumb Section in image background position
			    $wp_customize->add_setting('sharksdesign_img_bg_position', array(
			        'default'        => 'center center',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'sharksdesign_img_bg_position',
			    	array(
				        'settings' => 'sharksdesign_img_bg_position',
				        'label'   =>  __('Background Position','sharksdesign' ),
				        'section' => 'global_breadcrumb_section',
				        'type'  => 'select',
				        'choices'    => $sharksdesign_image_position,
			        	'active_callback' => 'sharksdesign_breadcrumb_call_back',
			        )
			    )); 
			//Breadcrumb Section in image background attachment
			    $wp_customize->add_setting('sharksdesign_breadcrumb_bg_attachment', array(
			        'default'        => 'scroll',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'sharksdesign_breadcrumb_bg_attachment',
			    	array(
				        'settings' => 'sharksdesign_breadcrumb_bg_attachment',
				        'label'   =>  __('Background Attachment','sharksdesign' ),
				        'section' => 'global_breadcrumb_section',
				        'type'  => 'select',
				        'choices'    => array(
				        	'scroll' => 'Scroll',
				        	'fixed' => 'Fixed',
			        	),
			        	'active_callback' => 'sharksdesign_breadcrumb_call_back',
			        )
			    ));
			//Breadcrumb Section in image background Size
			    $wp_customize->add_setting('sharksdesign_breadcrumb_bg_size', array(
			        'default'        => 'cover',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'sharksdesign_breadcrumb_bg_size',
			    	array(
				        'settings' => 'sharksdesign_breadcrumb_bg_size',
				        'label'   => __('Background Size','sharksdesign' ),
				        'section' => 'global_breadcrumb_section',
				        'type'  => 'select',
				        'choices'    => array(
				        	'auto' => 'Auto',
				        	'cover' => 'Cover',
				            'contain' => 'Contain'
			        	),
			        	'active_callback' => 'sharksdesign_breadcrumb_call_back',
			        )
			    ));  		    		

    //Footer Section
		$wp_customize->add_panel( 'sharksdesign_footer_panel', array(
			'title'     => __('Footer', 'sharksdesign'),
			'priority'  => 6,
		) ); 
		//Footer Section 
			$wp_customize->add_section( 'sharksdesign_footer_section' , array(
				'title'       => __('Footer Option', 'sharksdesign'),
				'panel'  => 'sharksdesign_footer_panel',
			) );
			//Footer Background Color
				$wp_customize->add_setting( 'sharksdesign_footer_bg_color', 
			        array(
			            'default'    => '#212428', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control($wp_customize, 'sharksdesign_footer_bg_color', 
			        array(
			            'label'      => __( 'Footer Background Color', 'sharksdesign' ), 
			            'settings'   => 'sharksdesign_footer_bg_color', 
			            'priority'   => 10, 
			            'section'    => 'sharksdesign_footer_section',
			        ) 
		        ) );	
		    //Footer Text Color
				$wp_customize->add_setting( 'sharksdesign_footer_text_color', 
			        array(
			            'default'    => '#ffffff', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control($wp_customize, 'sharksdesign_footer_text_color', 
			        array(
			            'label'      => __( 'Footer Text Color', 'sharksdesign' ), 
			            'settings'   => 'sharksdesign_footer_text_color', 
			            'priority'   => 10, 
			            'section'    => 'sharksdesign_footer_section',
			        ) 
		        ) );	
		    //Footer Link Color
				$wp_customize->add_setting( 'sharksdesign_footer_link_color', 
			        array(
			            'default'    => '#c4cfde', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control($wp_customize, 'sharksdesign_footer_link_color', 
			        array(
			            'label'      => __( 'Link Color', 'sharksdesign' ), 
			            'settings'   => 'sharksdesign_footer_link_color', 
			            'priority'   => 10, 
			            'section'    => 'sharksdesign_footer_section',
			        ) 
		        ) );	
		    //Footer Link Hover Color
				$wp_customize->add_setting( 'sharksdesign_footer_link_hover_color', 
			        array(
			            'default'    => '#eeeeee', //Default setting/value to save
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability'     => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_custom_sanitization_callback',
			        ) 
			    ); 
		        $wp_customize->add_control( new Sharksdesign_Customize_Transparent_Color_Control($wp_customize, 'sharksdesign_footer_link_hover_color', 
			        array(
			            'label'      => __( 'Link Hover Color', 'sharksdesign' ), 
			            'settings'   => 'sharksdesign_footer_link_hover_color', 
			            'priority'   => 10, 
			            'section'    => 'sharksdesign_footer_section',
			        ) 
		        ) );	
		    //Footer Background Image
		        $wp_customize->add_setting('footer_bg_image', array(
		        	'type'       => 'theme_mod',
			        'transport'     => 'refresh',
			        'height'        => 180,
			        'width'        => 160,
			        'capability' => 'edit_theme_options',
			        'sanitize_callback' => 'esc_url_raw'
			    ));
			    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_bg_image', array(
			        'label' => __('Backgroung Image', 'sharksdesign'),
			        'section' => 'sharksdesign_footer_section',
			        'settings' => 'footer_bg_image',
			        'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
			    )));
			//footer in image background position
			    $wp_customize->add_setting('footer_bg_position', array(
			        'default'        => 'center center',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control($wp_customize,'footer_bg_position',
			    	array(
				        'settings' => 'footer_bg_position',
				        'label'   => __('Background Position','sharksdesign'),
				        'section' => 'sharksdesign_footer_section',
				        'type'  => 'select',
				        'choices'    => $sharksdesign_image_position,
			        )
			    )); 
			//footer in image background attachment
				    $wp_customize->add_setting('footer_bg_attachment', array(
				        'default'        => 'scroll',
				        'type'       => 'theme_mod',
				        'transport'   => 'refresh',
				        'capability'     => 'edit_theme_options',		
				        'sanitize_callback' => 'sanitize_text_field',
				    ));
				    $wp_customize->add_control( new WP_Customize_Control(
				    	$wp_customize,'footer_bg_attachment',
				    	array(
					        'settings' => 'footer_bg_attachment',
					        'label'   => __('Background Attachment','sharksdesign'),
					        'section' => 'sharksdesign_footer_section',
					        'type'  => 'select',
					        'choices'    => array(
					        	'scroll' => 'Scroll',
					        	'fixed' => 'Fixed',
				        	),
				        )
				    ));
			//footer in image background Size
			    $wp_customize->add_setting('footer_bg_size', array(
			        'default'        => 'cover',
			        'type'       => 'theme_mod',
			        'transport'   => 'refresh',
			        'capability'     => 'edit_theme_options',		
			        'sanitize_callback' => 'sanitize_text_field',
			    ));
			    $wp_customize->add_control( new WP_Customize_Control(
			    	$wp_customize,'footer_bg_size',
			    	array(
				        'settings' => 'footer_bg_size',
				        'label'   => __('Background Size','sharksdesign'),
				        'section' => 'sharksdesign_footer_section',
				        'type'  => 'select',
				        'choices'    => array(
				        	'auto' => 'Auto',
				        	'cover' => 'Cover',
				            'contain' => 'Contain'
			        	),
			        )
			    ));  

		//Footer Width
			$wp_customize->add_section( 'sharksdesign_footer_width_section' , array(
				'title'       => __('Footer Width', 'sharksdesign'),
				'panel'  => 'sharksdesign_footer_panel',
			) );
			//footer width layout
			    $wp_customize->add_setting( 'sharksdesign_footer_width_layout', 
			        array(
			            'default'    => 'content_width',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sharksdesign_sanitize_select',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'sharksdesign_footer_width_layout',array(
			        	'label'      => __( 'Footer Width', 'sharksdesign' ), 
			            'settings'   => 'sharksdesign_footer_width_layout', 
			            'priority'   => 0,
			            'section'    => 'sharksdesign_footer_width_section',
			            'type'    => 'select',
			            'choices' => array(
			            				'full_width' => 'Full Width',
			            				'content_width' => 'Content Width',
			            			),
			        ) 
		        ) );	   
		    //Footer Section in contact width
			    $wp_customize->add_setting( 'sharksdesign_footer_contact_width', 
			        array(
			            'default'    => '1100',
			            'type'       => 'theme_mod',
			            'transport'   => 'refresh',
			            'capability' => 'edit_theme_options',
			            'sanitize_callback' => 'sanitize_text_field',
			        ) 
			    ); 
		        $wp_customize->add_control( new WP_Customize_Control( 
			        $wp_customize,'sharksdesign_footer_contact_width',array(
			        	'label'      =>  'Footer Contact Width',
			        	'description' => 'in px','sharksdesign',
			            'settings'   => 'sharksdesign_footer_contact_width', 
			            'priority'   => 0,
			            'section'    => 'sharksdesign_footer_width_section',
			            'type'    => 'number',
			            'active_callback'  => 'sharksdesign_footer_content_width_call_back',
			        ) 
		        ) );	   

	//logo option in image width title_tagline
	    $wp_customize->add_setting('sharksdesign_logo_width', array(
	    	'default'    => '150',
	        'type'       => 'theme_mod',
	        'capability' => 'edit_theme_options',
	        'transport'  => 'refresh',
	        'sanitize_callback' => 'sanitize_text_field',		  
	    ));
	    $wp_customize->add_control( new WP_Customize_Control(
	    	$wp_customize,'sharksdesign_logo_width',
	    	array(
		        'settings' => 'sharksdesign_logo_width',
		        'label'    => 'Logo Image Width',
		        'section'  => 'title_tagline',
		        'type'     => "number",
		        'description' => 'in px',
	        )
	    ));

	$wp_customize->remove_control('background_color');
	$wp_customize->remove_section('header_image');
	$wp_customize->remove_section('background_image');
}
add_action( 'customize_register', 'sharksdesign_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function sharksdesign_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function sharksdesign_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function sharksdesign_customize_preview_js() {
	wp_enqueue_script( 'sharksdesign-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'sharksdesign_customize_preview_js' );

//sanitize select
	if ( ! function_exists( 'sharksdesign_sanitize_select' ) ) :
	    function sharksdesign_sanitize_select( $input, $setting ) {

	        $input = sanitize_text_field( $input );

	        $choices = $setting->manager->get_control( $setting->id )->choices;

	        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

	    }
	endif;
//sanitize checkbox
	if ( ! function_exists( 'sharksdesign_sanitize_checkbox' ) ) :
	    function sharksdesign_sanitize_checkbox( $checked ) {
	        return ( ( isset( $checked ) && true === $checked ) ? true : false );
	    }
	endif;

if ( ! function_exists( 'sharksdesign_header_site_layout' ) ) :
    function sharksdesign_header_site_layout() {
        $sharksdesign_header_site_layout = array(
            'header1'  => get_template_directory_uri() . '/assets/images/header1.png',
            'header2'  => get_template_directory_uri() . '/assets/images/header2.png',
        );
        $output = apply_filters( 'sharksdesign_header_site_layout', $sharksdesign_header_site_layout );
        return $output;
    }
endif;

function sharksdesign_customizer_css() {
    wp_enqueue_style('sharksdesign-customize-controls-style', get_template_directory_uri().'/assets/css/customizer_admin.css');
}
add_action( 'customize_controls_enqueue_scripts', 'sharksdesign_customizer_css',0 );

function sharksdesign_theme_scripts() {	
    $sharksdesign_body_fontfamily = get_theme_mod("sharksdesign_body_fontfamily",5);    
    if($sharksdesign_body_fontfamily!=''){
        global $sharksdesign_fonttotal;
        $font_args = array(
            'family'    => rawurlencode($sharksdesign_fonttotal[$sharksdesign_body_fontfamily]),
        );
        $font_url = add_query_arg($font_args,'//fonts.googleapis.com/css');
        wp_enqueue_style( 'factory-lite-font', $font_url, array() );
    }
    $sharksdesign_Heading_fontfamily = get_theme_mod("sharksdesign_Heading_fontfamily",5);    
    if($sharksdesign_Heading_fontfamily!=''){
        global $sharksdesign_fonttotal;
        $font_args = array(
            'family'    => rawurlencode($sharksdesign_fonttotal[$sharksdesign_Heading_fontfamily]),
        );
        $font_url = add_query_arg($font_args,'//fonts.googleapis.com/css');
        wp_enqueue_style( 'factory-lite-font-a', $font_url, array() );
    }
    $sharksdesign_Heading1_fontfamily = get_theme_mod("sharksdesign_Heading1_fontfamily",5);    
    if($sharksdesign_Heading1_fontfamily!=''){
        global $sharksdesign_fonttotal;
        $font_args = array(
            'family'    => rawurlencode($sharksdesign_fonttotal[$sharksdesign_Heading1_fontfamily]),
        );
        $font_url = add_query_arg($font_args,'//fonts.googleapis.com/css');
        wp_enqueue_style( 'factory-lite-font-b', $font_url, array() );
    }
    $sharksdesign_Heading2_fontfamily = get_theme_mod("sharksdesign_Heading2_fontfamily",5);    
    if($sharksdesign_Heading2_fontfamily!=''){
        global $sharksdesign_fonttotal;
        $font_args = array(
            'family'    => rawurlencode($sharksdesign_fonttotal[$sharksdesign_Heading2_fontfamily]),
        );
        $font_url = add_query_arg($font_args,'//fonts.googleapis.com/css');
        wp_enqueue_style( 'factory-lite-font-c', $font_url, array() );
    }
    $sharksdesign_Heading3_fontfamily = get_theme_mod("sharksdesign_Heading3_fontfamily",5);    
    if($sharksdesign_Heading3_fontfamily!=''){
        global $sharksdesign_fonttotal;
        $font_args = array(
            'family'    => rawurlencode($sharksdesign_fonttotal[$sharksdesign_Heading3_fontfamily]),
        );
        $font_url = add_query_arg($font_args,'//fonts.googleapis.com/css');
        wp_enqueue_style( 'factory-lite-font-d', $font_url, array() );
    }
}  
add_action( 'wp_enqueue_scripts', 'sharksdesign_theme_scripts' );

function sharksdesign_footer_content_width_call_back(){
	$sharksdesign_footer_width_layout = get_theme_mod( 'sharksdesign_footer_width_layout','content_width');
	if ( 'content_width' === $sharksdesign_footer_width_layout ) {
		return true;
	}
	return false;
}
function sharksdesign_header_content_width_call_back(){
	$sharksdesign_header_width_layout = get_theme_mod( 'sharksdesign_header_width_layout','content_width');
	if ( 'content_width' === $sharksdesign_header_width_layout ) {
		return true;
	}
	return false;
}
function sharksdesign_grid_view_callback(){
	$sharksdesign_container_blog_layout = get_theme_mod( 'sharksdesign_container_blog_layout','grid_view');
	if ( 'grid_view' === $sharksdesign_container_blog_layout ) {
		return true;
	}
	return false;
}
function sharksdesign_read_more_callback(){
	$sharksdesign_container_readmore_btn = get_theme_mod( 'sharksdesign_container_readmore_btn',true);
	if ( true === $sharksdesign_container_readmore_btn ) {
		return true;
	}
	return false;
}
function sharksdesign_content_box_call_back(){
	$sharksdesign_container_width_layout = get_theme_mod( 'sharksdesign_container_width_layout','content_width');
	if ( 'content_width' === $sharksdesign_container_width_layout ) {
		return true;
	}
	return false;
}
function sharksdesign_box_layout_call_back(){
	$sharksdesign_container_width_layout = get_theme_mod( 'sharksdesign_container_width_layout','content_width');
	if ( 'boxed_layout' === $sharksdesign_container_width_layout ) {
		return true;
	}
	return false;
}
function sharksdesign_container_content_width_call_back(){
	$sharksdesign_container_width_layout = get_theme_mod( 'sharksdesign_container_width_layout','content_width');
	if ( 'content_width' === $sharksdesign_container_width_layout ) {
		return true;
	}
	if ( 'boxed_layout' === $sharksdesign_container_width_layout ) {
		return true;
	}
	return false;
}
function sharksdesign_header1_call_back(){
	$sharksdesign_header_layout = get_theme_mod( 'sharksdesign_header_layout','header1');
	if ( 'header1' === $sharksdesign_header_layout ) {
		return true;
	}
	return false;
}
function sharksdesign_transparent_call_menu_btn_callback(){
	$sharksdesign_header_layout = get_theme_mod( 'sharksdesign_header_layout','header1');
	if ( 'header2' === $sharksdesign_header_layout ) {
		return true;
	}
	return false;
}
function sharksdesign_social_icon_general_callback(){
	$social_icon_tab = get_theme_mod( 'social_icon_tab','general');
	if ( 'general' === $social_icon_tab ) {
		return true;
	}
	return false;
}
function sharksdesign_social_icon_design_callback(){
	$social_icon_tab = get_theme_mod( 'social_icon_tab','general');
	if ( 'design' === $social_icon_tab ) {
		return true;
	}
	return false;
}
function sharksdesign_sanitize_number_range( $number, $setting ) {

    $number = absint( $number );
    $atts = $setting->manager->get_control( $setting->id )->input_attrs;
    $min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
    $max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
    $step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

    // If the number is within the valid range, return it; otherwise, return the default
    return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}
function sharksdesign_topbar_content_width_call_back(){
	$sharksdesign_top_bar_width_layout = get_theme_mod( 'sharksdesign_top_bar_width_layout','content_width');
	if ( 'content_width' === $sharksdesign_top_bar_width_layout ) {
		return true;
	}
	return false;
}
function sharksdesign_scroll_callback(){
	$display_scroll_button = get_theme_mod( 'display_scroll_button',true);
	if ( true === $display_scroll_button ) {
		return true;
	}
	return false;
}
function sharksdesign_sticky_callback(){
	$display_sticky_header = get_theme_mod( 'display_sticky_header',true);
	if ( true === $display_sticky_header ) {
		return true;
	}
	return false;
}
function sharksdesign_breadcrumb_call_back(){
	$sharksdesign_display_breadcrumb_section = get_theme_mod( 'sharksdesign_display_breadcrumb_section',true);
	if ( true === $sharksdesign_display_breadcrumb_section ) {
		return true;
	}
	return false;
}

function sharksdesign_custom_sanitization_callback( $value ) {
	// This pattern will check and match 3/6/8-character hex, rgb, rgba, hsl, & hsla colors.
	$pattern = '/^(\#[\da-f]{3}|\#[\da-f]{6}|\#[\da-f]{8}|rgba\(((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*,\s*){2}((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*)(,\s*(0\.\d+|1))\)|hsla\(\s*((\d{1,2}|[1-2]\d{2}|3([0-5]\d|60)))\s*,\s*((\d{1,2}|100)\s*%)\s*,\s*((\d{1,2}|100)\s*%)(,\s*(0\.\d+|1))\)|rgb\(((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*,\s*){2}((\d{1,2}|1\d\d|2([0-4]\d|5[0-5]))\s*)|hsl\(\s*((\d{1,2}|[1-2]\d{2}|3([0-5]\d|60)))\s*,\s*((\d{1,2}|100)\s*%)\s*,\s*((\d{1,2}|100)\s*%)\))$/';
	\preg_match( $pattern, $value, $matches );
	// Return the 1st match found.
	if ( isset( $matches[0] ) ) {
		if ( is_string( $matches[0] ) ) {
			return $matches[0];
		}
		if ( is_array( $matches[0] ) && isset( $matches[0][0] ) ) {
			return $matches[0][0];
		}
	}
	// If no match was found, return an empty string.
	return '';
}

if ( ! function_exists( 'sharksdesign_site_layout' ) ) :
    function sharksdesign_site_layout() {
        $sharksdesign_site_layout = array(
            'no_sidebar'  => get_template_directory_uri() . '/assets/images/full.png',
            'left_sidebar'  => get_template_directory_uri() . '/assets/images/left.png',
            'right_sidebar'  => get_template_directory_uri() . '/assets/images/right.png',
        );

        $output = apply_filters( 'sharksdesign_site_layout', $sharksdesign_site_layout );
        return $output;
    }
endif;