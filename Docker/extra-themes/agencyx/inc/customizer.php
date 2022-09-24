<?php

/**
 * agencyx Theme Customizer
 *
 * @package agencyx
 */



/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function agencyx_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport         = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    //select sanitization function
    function agencyx_sanitize_select($input, $setting)
    {
        $input = sanitize_key($input);
        $choices = $setting->manager->get_control($setting->id)->choices;
        return (array_key_exists($input, $choices) ? $input : $setting->default);
    }
    function agencyx_sanitize_image($file, $setting)
    {
        $mimes = array(
            'jpg|jpeg|jpe' => 'image/jpeg',
            'gif'          => 'image/gif',
            'png'          => 'image/png',
            'bmp'          => 'image/bmp',
            'tif|tiff'     => 'image/tiff',
            'ico'          => 'image/x-icon'
        );
        //check file type from file name
        $file_ext = wp_check_filetype($file, $mimes);
        //if file has a valid mime type return it, otherwise return default
        return ($file_ext['ext'] ? $file : $setting->default);
    }

    $wp_customize->add_setting('agencyx_site_tagline_show', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'default'       =>  '',
        'sanitize_callback' => 'absint',
        'transport'     => 'refresh',
    ));
    $wp_customize->add_control('agencyx_site_tagline_show', array(
        'label'      => __('Hide Site Tagline Only? ', 'agencyx'),
        'section'    => 'title_tagline',
        'settings'   => 'agencyx_site_tagline_show',
        'type'       => 'checkbox',

    ));

    $wp_customize->add_panel('agencyx_settings', array(
        'priority'       => 50,
        'title'          => __('agencyx Theme settings', 'agencyx'),
        'description'    => __('All agencyx theme settings', 'agencyx'),
    ));
    $wp_customize->add_section('agencyx_header', array(
        'title' => __('agencyx Header Settings', 'agencyx'),
        'capability'     => 'edit_theme_options',
        'description'     => __('agencyx theme header settings', 'agencyx'),
        'panel'    => 'agencyx_settings',

    ));
    $wp_customize->add_setting('agencyx_main_menu_style', array(
        'default'        => 'style1',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'agencyx_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('agencyx_main_menu_style', array(
        'label'      => __('Main Menu Style', 'agencyx'),
        'description' => __('You can set the menu style one or two. ', 'agencyx'),
        'section'    => 'agencyx_header',
        'settings'   => 'agencyx_main_menu_style',
        'type'       => 'select',
        'choices'    => array(
            'style1' => __('Style One', 'agencyx'),
            'style2' => __('Style Two', 'agencyx'),
        ),
    ));

    //agencyx Home intro
    $wp_customize->add_section('agencyx_hbanner', array(
        'title' => __('Agency Intro Settings', 'agencyx'),
        'capability'     => 'edit_theme_options',
        'description'     => __('Portfoli profile Intro Settings', 'agencyx'),
        'panel'    => 'agencyx_settings',

    ));
    $wp_customize->add_setting('agencyx_hbanner_show', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'default'       =>  '1',
        'sanitize_callback' => 'absint',
        'transport'     => 'refresh',
    ));
    $wp_customize->add_control('agencyx_hbanner_show', array(
        'label'      => __('Show Home Banner? ', 'agencyx'),
        'section'    => 'agencyx_hbanner',
        'settings'   => 'agencyx_hbanner_show',
        'type'       => 'checkbox',

    ));
    $wp_customize->add_setting('agencyx_hbanner_img', array(
        'capability'        => 'edit_theme_options',
        'default'           => get_template_directory_uri() . '/assets/img/hero.png',
        'sanitize_callback' => 'agencyx_sanitize_image',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'agencyx_hbanner_img',
        array(
            'label'    => __('Upload Banner Image', 'agencyx'),
            'description'    => __('Image size should be 450px width & 460px height for better view.', 'agencyx'),
            'section'  => 'agencyx_hbanner',
            'settings' => 'agencyx_hbanner_img',
        )
    ));
    $wp_customize->add_setting('agencyx_hbanner_subtitle', array(
        'default' => __('WELCOME TO MY WORLD', 'agencyx'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('agencyx_hbanner_subtitle', array(
        'label'      => __('Intro Subtitle', 'agencyx'),
        'section'    => 'agencyx_hbanner',
        'settings'   => 'agencyx_hbanner_subtitle',
        'type'       => 'text',
    ));
    $wp_customize->add_setting('agencyx_hbanner_title', array(
        'default' => __('Introduce Our', 'agencyx'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('agencyx_hbanner_title', array(
        'label'      => __('Intro Title', 'agencyx'),
        'section'    => 'agencyx_hbanner',
        'settings'   => 'agencyx_hbanner_title',
        'type'       => 'text',
    ));
    $wp_customize->add_setting('agencyx_color_title', array(
        'default' => __('Creative Agency.', 'agencyx'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('agencyx_color_title', array(
        'label'      => __('Intro Color Title', 'agencyx'),
        'section'    => 'agencyx_hbanner',
        'settings'   => 'agencyx_color_title',
        'type'       => 'text',
    ));

    $wp_customize->add_setting('agencyx_hbanner_desc', array(
        'default' => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'wp_kses_post',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('agencyx_hbanner_desc', array(
        'label'      => __('Intro Description', 'agencyx'),
        'section'    => 'agencyx_hbanner',
        'settings'   => 'agencyx_hbanner_desc',
        'type'       => 'textarea',
    ));
    $wp_customize->add_setting('agencyx_btn_text_one', array(
        'default' => __('Our Services', 'agencyx'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('agencyx_btn_text_one', array(
        'label'      => __('Button one text', 'agencyx'),
        'section'    => 'agencyx_hbanner',
        'settings'   => 'agencyx_btn_text_one',
        'type'       => 'text',
    ));

    $wp_customize->add_setting('agencyx_btn_url_one', array(
        'default' => '#',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('agencyx_btn_url_one', array(
        'label'      => __('Button one url', 'agencyx'),
        'description'      => __('Keep url empty for hide this button', 'agencyx'),
        'section'    => 'agencyx_hbanner',
        'settings'   => 'agencyx_btn_url_one',
        'type'       => 'url',
    ));


    //agencyx blog settings
    $wp_customize->add_section('agencyx_blog', array(
        'title' => __('agencyx Blog Settings', 'agencyx'),
        'capability'     => 'edit_theme_options',
        'description'     => __('agencyx theme blog settings', 'agencyx'),
        'panel'    => 'agencyx_settings',

    ));
    $wp_customize->add_setting('agencyx_blog_container', array(
        'default'        => 'container',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'agencyx_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('agencyx_blog_container', array(
        'label'      => __('Container type', 'agencyx'),
        'description' => __('You can set standard container or full width container. ', 'agencyx'),
        'section'    => 'agencyx_blog',
        'settings'   => 'agencyx_blog_container',
        'type'       => 'select',
        'choices'    => array(
            'container' => __('Standard Container', 'agencyx'),
            'container-fluid' => __('Full width Container', 'agencyx'),
        ),
    ));
    $wp_customize->add_setting('agencyx_blog_layout', array(
        'default'        => 'fullwidth',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'agencyx_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('agencyx_blog_layout', array(
        'label'      => __('Select Blog Layout', 'agencyx'),
        'description' => __('Right and Left sidebar only show when sidebar widget is available. ', 'agencyx'),
        'section'    => 'agencyx_blog',
        'settings'   => 'agencyx_blog_layout',
        'type'       => 'select',
        'choices'    => array(
            'rightside' => __('Right Sidebar', 'agencyx'),
            'leftside' => __('Left Sidebar', 'agencyx'),
            'fullwidth' => __('No Sidebar', 'agencyx'),
        ),
    ));
    $wp_customize->add_setting('agencyx_blog_style', array(
        'default'        => 'grid',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'agencyx_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('agencyx_blog_style', array(
        'label'      => __('Select Blog Style', 'agencyx'),
        'section'    => 'agencyx_blog',
        'settings'   => 'agencyx_blog_style',
        'type'       => 'select',
        'choices'    => array(
            'grid' => __('Grid Style', 'agencyx'),
            'classic' => __('Classic Style', 'agencyx'),
        ),
    ));
    //agencyx page settings
    $wp_customize->add_section('agencyx_page', array(
        'title' => __('agencyx Page Settings', 'agencyx'),
        'capability'     => 'edit_theme_options',
        'description'     => __('agencyx theme blog settings', 'agencyx'),
        'panel'    => 'agencyx_settings',

    ));
    $wp_customize->add_setting('agencyx_page_container', array(
        'default'        => 'container',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'agencyx_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('agencyx_page_container', array(
        'label'      => __('Page Container type', 'agencyx'),
        'description' => __('You can set standard container or full width container for page. ', 'agencyx'),
        'section'    => 'agencyx_page',
        'settings'   => 'agencyx_page_container',
        'type'       => 'select',
        'choices'    => array(
            'container' => __('Standard Container', 'agencyx'),
            'container-fluid' => __('Full width Container', 'agencyx'),
        ),
    ));
    $wp_customize->add_setting('agencyx_page_header', array(
        'default'        => 'show',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'agencyx_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('agencyx_page_header', array(
        'label'      => __('Show Page header', 'agencyx'),
        'section'    => 'agencyx_page',
        'settings'   => 'agencyx_page_header',
        'type'       => 'select',
        'choices'    => array(
            'show' => __('Show all pages', 'agencyx'),
            'hide-home' => __('Hide Only Front Page', 'agencyx'),
            'hide' => __('Hide All Pages', 'agencyx'),
        ),
    ));




    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial(
            'blogname',
            array(
                'selector'        => '.site-title a',
                'render_callback' => 'agencyx_customize_partial_blogname',
            )
        );
        $wp_customize->selective_refresh->add_partial(
            'blogdescription',
            array(
                'selector'        => '.site-description',
                'render_callback' => 'agencyx_customize_partial_blogdescription',
            )
        );
    }
}
add_action('customize_register', 'agencyx_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function agencyx_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function agencyx_customize_partial_blogdescription()
{
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function agencyx_customize_preview_js()
{
    wp_enqueue_script('agencyx-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customize-preview'), agencyx_VERSION, true);
}
add_action('customize_preview_init', 'agencyx_customize_preview_js');
