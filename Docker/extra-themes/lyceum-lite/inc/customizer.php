<?php
/**
 * Lyceum Lite Theme Customizer
 *
 * @package Lyceum Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function lyceum_lite_customize_register( $wp_customize ) {
	
function lyceum_lite_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
	$wp_customize->get_setting( 'blogname' )->lyceum_lite         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->lyceum_lite  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
	    'selector' => '.site-title a',
	    'render_callback' => 'lyceum-lite_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
	    'selector' => '.site-title p',
	    'render_callback' => 'lyceum-lite_customize_partial_blogdescription',
	) );

	$wp_customize->add_setting('lyceum_headerbg-color', array(
		'default' => '#ffffff',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'lyceum_headerbg-color',array(
			'label' => __('Header Background color','lyceum-lite'),
			'description'	=> __('Select background color for header.','lyceum-lite'),
			'section' => 'colors',
			'settings' => 'lyceum_headerbg-color'
		))
	);
		
	$wp_customize->add_setting('lyceum_color_scheme', array(
		'default' => '#ff5951',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'lyceum_color_scheme',array(
			'label' => __('Color Scheme','lyceum-lite'),
			'description'	=> __('Select theme main color from here.','lyceum-lite'),
			'section' => 'colors',
			'settings' => 'lyceum_color_scheme'
		))
	);
	
	$wp_customize->add_setting('lyceum_footer-color', array(
		'default' => '#212323',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'lyceum_footer-color',array(
			'label' => __('Footer Background color','lyceum-lite'),
			'description'	=> __('Select background color for footer.','lyceum-lite'),
			'section' => 'colors',
			'settings' => 'lyceum_footer-color'
		))
	);

	/******************************************************
	**	Top Header Section
	******************************************************/
	$wp_customize->add_section('lyceum_tp_head',array(
		'title' => __('Top Header', 'lyceum-lite'),
		'priority' => null,
		'description'	=> __('Add top header information here which appears at top of the theme.','lyceum-lite'),	
	));
	$wp_customize->add_setting('lyceum_tphead_txt',array(
		'sanitize_callback'	=> 'sanitize_text_field',
		'transport' => 'refresh'
	));
	$wp_customize->add_control('lyceum_tphead_txt',array(
		'type'	=> 'text',
		'label'	=> __('Add top header left side text here','lyceum-lite'),
		'section'	=> 'lyceum_tp_head'
	));
	$wp_customize->selective_refresh->add_partial('lyceum_tphead_txt', array(
        'selector' => '.header-top-left'
    ));
	
	$wp_customize->add_setting('lyceum_tphead_fb',array(
		'sanitize_callback'	=> 'esc_url_raw'
	));

	$wp_customize->add_control('lyceum_tphead_fb',array(
		'type'	=> 'url',
		'label'	=> __('Add Facebook link here.','lyceum-lite'),
		'section'	=> 'lyceum_tp_head'
	));
	
	$wp_customize->add_setting('lyceum_tphead_tw',array(
		'sanitize_callback'	=> 'esc_url_raw'
	));

	$wp_customize->add_control('lyceum_tphead_tw',array(
		'type'	=> 'url',
		'label'	=> __('Add Twitter link here.','lyceum-lite'),
		'section'	=> 'lyceum_tp_head'
	));

	$wp_customize->add_setting('lyceum_tphead_in',array(
		'sanitize_callback'	=> 'esc_url_raw'
	));

	$wp_customize->add_control('lyceum_tphead_in',array(
		'type'	=> 'url',
		'label'	=> __('Add Instagram link here.','lyceum-lite'),
		'section'	=> 'lyceum_tp_head'
	));	

	$wp_customize->add_setting('lyceum_tphead_link',array(
		'sanitize_callback'	=> 'esc_url_raw'
	));

	$wp_customize->add_control('lyceum_tphead_link',array(
		'type'	=> 'url',
		'label'	=> __('Add Linkedin link here.','lyceum-lite'),
		'section'	=> 'lyceum_tp_head'
	));

	$wp_customize->add_setting('lyceum_tphead_gp',array(
		'sanitize_callback'	=> 'esc_url_raw'
	));

	$wp_customize->add_control('lyceum_tphead_gp',array(
		'type'	=> 'url',
		'label'	=> __('Add google plus link here.','lyceum-lite'),
		'section'	=> 'lyceum_tp_head'
	));

	$wp_customize->add_setting('lyceum_tphead_yt',array(
		'sanitize_callback'	=> 'esc_url_raw'
	));

	$wp_customize->add_control('lyceum_tphead_yt',array(
		'type'	=> 'url',
		'label'	=> __('Add Youtube link here.','lyceum-lite'),
		'section'	=> 'lyceum_tp_head'
	));

	$wp_customize->add_setting('hide_tp_head',array(
		'default' => true,
		'sanitize_callback' => 'lyceum_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'hide_tp_head', array(
	   'settings' => 'hide_tp_head',
	   'section'   => 'lyceum_tp_head',
	   'label'     => __('Check this to hide top header.','lyceum-lite'),
	   'type'      => 'checkbox'
    ));
	
	/******************************************************
	**	Theme Slider
	******************************************************/
	$wp_customize->add_section('lyceum_slider',array(
		'title' => __('Setting Up Slider', 'lyceum-lite'),
		'priority' => null,
		'description'	=> __('Recommended image size (1600x720). Slider will work only when you select the static front page.','lyceum-lite'),	
	));
	$wp_customize->add_setting('lyceum-slide1',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));
	$wp_customize->add_control('lyceum-slide1',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for slide one:','lyceum-lite'),
		'section'	=> 'lyceum_slider'
	));
	$wp_customize->add_setting('lyceum-slide2',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));
	$wp_customize->add_control('lyceum-slide2',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for slide two:','lyceum-lite'),
		'section'	=> 'lyceum_slider'
	));
	$wp_customize->add_setting('lyceum-slide3',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));
	$wp_customize->add_control('lyceum-slide3',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for slide three:','lyceum-lite'),
		'section'	=> 'lyceum_slider'
	));
	$wp_customize->add_setting('lyceum_slide_more',array(
		'default'	=> __('','lyceum-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('lyceum_slide_more',array(
		'label'	=> __('Add slider button text.','lyceum-lite'),
		'section'	=> 'lyceum_slider',
		'setting'	=> 'lyceum_slide_more',
		'type'	=> 'text'
	));
	$wp_customize->add_setting('hide_slider',array(
		'default' => true,
		'sanitize_callback' => 'lyceum_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	)); 
	$wp_customize->add_control( 'hide_slider', array(
	   'settings' => 'hide_slider',
	   'section'   => 'lyceum_slider',
	   'label'     => __('Check this to hide slider.','lyceum-lite'),
	   'type'      => 'checkbox'
    ));
	
	/******************************************************
	**	Theme First Section
	******************************************************/
	$wp_customize->add_section('lyceum_feat_sec',array(
		'title' => __('Setting Up Featured Section', 'lyceum-lite'),
		'priority' => null,
		'description'	=> __('Select pages to display featured section on homepage. This section will be displayed only when you select the static front page.','lyceum-lite'),	
	));
	$wp_customize->add_setting('feat1',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));
	$wp_customize->add_control('feat1',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for first box','lyceum-lite'),
		'section'	=> 'lyceum_feat_sec'
	));
	$wp_customize->add_setting('feat2',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));
	$wp_customize->add_control('feat2',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for second box','lyceum-lite'),
		'section'	=> 'lyceum_feat_sec'
	));
	$wp_customize->add_setting('feat3',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));
	$wp_customize->add_control('feat3',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for third box','lyceum-lite'),
		'section'	=> 'lyceum_feat_sec'
	));
	$wp_customize->add_setting('feat4',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));
	$wp_customize->add_control('feat4',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for fourth box','lyceum-lite'),
		'section'	=> 'lyceum_feat_sec'
	));
	$wp_customize->add_setting('hide_featured',array(
		'default' => true,
		'sanitize_callback' => 'lyceum_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	)); 
	$wp_customize->add_control( 'hide_featured', array(
	   'settings' => 'hide_featured',
	   'section'   => 'lyceum_feat_sec',
	   'label'     => __('Check this to hide featured section.','lyceum-lite'),
	   'type'      => 'checkbox'
    ));
	
	/******************************************************
	**	Theme Second Section
	******************************************************/
	$wp_customize->add_section('lyceum_service_sec',array(
		'title' => __('Setting Up Services Section', 'lyceum-lite'),
		'priority' => null,
		'description'	=> __('Select page to display services section on homepage. This section will be displayed only when you select the static front page.','lyceum-lite'),	
	));
	$wp_customize->add_setting('service_secttl',array(
		'default'	=> __('','lyceum-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('service_secttl',array(
		'label'	=> __('Add section title here.','lyceum-lite'),
		'section'	=> 'lyceum_service_sec',
		'setting'	=> 'service_secttl',
		'type'	=> 'text'
	));
	$wp_customize->add_setting('ser1',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));
	$wp_customize->add_control('ser1',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for first box','lyceum-lite'),
		'section'	=> 'lyceum_service_sec'
	));
	$wp_customize->add_setting('ser2',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));
	$wp_customize->add_control('ser2',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for second box','lyceum-lite'),
		'section'	=> 'lyceum_service_sec'
	));
	$wp_customize->add_setting('ser3',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));
	$wp_customize->add_control('ser3',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for third box','lyceum-lite'),
		'section'	=> 'lyceum_service_sec'
	));
	$wp_customize->add_setting('hide_service',array(
		'default' => true,
		'sanitize_callback' => 'lyceum_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	)); 
	$wp_customize->add_control( 'hide_service', array(
	   'settings' => 'hide_service',
	   'section'   => 'lyceum_service_sec',
	   'label'     => __('Check this to hide services section.','lyceum-lite'),
	   'type'      => 'checkbox'
    ));
}
add_action( 'customize_register', 'lyceum_lite_customize_register' );	

function lyceum_lite_css(){ ?>
	<style>
		#header,
		.sitenav ul li.menu-item-has-children:hover > ul,
		.sitenav ul li.menu-item-has-children:focus > ul,
		.sitenav ul li.menu-item-has-children.focus > ul{
			background-color:<?php echo esc_attr(get_theme_mod('lyceum_headerbg-color','#ffffff')); ?>;
		}
		.nivo-directionNav a,
		h3.widget-title,
		.widget_block h2,
		.nav-links .current,
		.nav-links a:hover,
		p.form-submit input[type="submit"],
		a.slide-button:after,
		.nivo-caption:before,
		.nivo-caption:after,
		.nivo-controlNav a.active{
			background-color:<?php echo esc_attr(get_theme_mod('lyceum_color_scheme','#ff5951')); ?>;
		}
		.site-title p,
		a,
		.tm_client strong,
		.postmeta a:hover,
		#sidebar ul li a:hover,
		.blog-post h3.entry-title,
		a.blog-more:hover,
		#commentform input#submit,
		input.search-submit,
		.blog-date .date,
		.sitenav ul li.current_page_item a,
		.sitenav ul li a:hover,
		.sitenav ul li.current_page_item ul li a:hover,
		.top-header-left{
			color:<?php echo esc_attr(get_theme_mod('lyceum_color_scheme','#ff5951')); ?>;
		}
		.nivo-controlNav a.active,
		.read-more a:before,
		.read-more a:after,
		.nivo-caption,
		.witr_bar_inner:before,
		.witr_bar_inner:after{
			border-color:<?php echo esc_attr(get_theme_mod('lyceum_color_scheme','#ff5951')); ?>;
		}
		.copyright-wrapper{
			background-color:<?php echo esc_attr(get_theme_mod('lyceum_footer-color','#212323')); ?>;
		}
	</style>
<?php }
add_action('wp_head','lyceum_lite_css');

function lyceum_lite_customize_preview_js() {
	wp_enqueue_script( 'lyceum-lite-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'lyceum_lite_customize_preview_js' );