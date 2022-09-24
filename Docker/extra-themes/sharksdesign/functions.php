<?php
/**
 * sharksdesign functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sharksdesign
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'sharksdesign_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function sharksdesign_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on sharksdesign, use a find and replace
		 * to change 'sharksdesign' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'sharksdesign', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => __( 'Primary', 'sharksdesign' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'sharksdesign_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'sharksdesign_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $sharksdesign_content_width
 */
function sharksdesign_content_width() {
	$GLOBALS['sharksdesign_content_width'] = apply_filters( 'sharksdesign_content_width', 640 );
}
add_action( 'after_setup_theme', 'sharksdesign_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sharksdesign_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'sharksdesign' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here.', 'sharksdesign' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer 1', 'sharksdesign' ),
			'id'            => 'footer-1',
			'description'   => __( 'Add widgets here.', 'sharksdesign' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer 2', 'sharksdesign' ),
			'id'            => 'footer-2',
			'description'   => __( 'Add widgets here.', 'sharksdesign' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer 3', 'sharksdesign' ),
			'id'            => 'footer-3',
			'description'   => __( 'Add widgets here.', 'sharksdesign' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer 4', 'sharksdesign' ),
			'id'            => 'footer-4',
			'description'   => __( 'Add widgets here.', 'sharksdesign' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		register_sidebar(
			array(
				'name'          => __( 'WooCommerce Product Section', 'sharksdesign' ),
				'id'            => 'woocommerce_product',
				'description'   => __( 'Add widgets here.', 'sharksdesign' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}
}
add_action( 'widgets_init', 'sharksdesign_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sharksdesign_scripts() {
	wp_enqueue_script('jquery', false, array(), false, false);
	wp_enqueue_style( 'sharksdesign-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'sharksdesign-style', 'rtl', 'replace' );
	wp_enqueue_style( 'fontawesome-css', esc_url(get_template_directory_uri()).'/assets/fontawesome/css/font-awesome.css' , array(), _S_VERSION );
	wp_enqueue_style( 'sharksdesign-theme-css', esc_url(get_template_directory_uri()).'/assets/css/theme.css' , array(), _S_VERSION );
	wp_enqueue_script( 'sharksdesign-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_style( 'owl-carousel-min-css', esc_url(get_template_directory_uri()).'/assets/css/owl.carousel.min.css' , array(), _S_VERSION );
	wp_enqueue_style( 'owl-carousel_theme-min-css', esc_url(get_template_directory_uri()).'/assets/css/owl.theme.min.css' , array(), _S_VERSION );	
	wp_enqueue_script( 'owl-carousel-min', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'sharksdesign-custom-js', get_template_directory_uri() . '/assets/js/custom.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sharksdesign_scripts' );

function sharksdesign_admin_script_style(){
	wp_enqueue_style( 'fontawesome-min-css', esc_url(get_template_directory_uri()).'/assets/fontawesome/css/font-awesome.min.css' , array(), _S_VERSION );
	wp_enqueue_style( 'sharksdesign-admin-site-css', esc_url(get_template_directory_uri()).'/assets/css/admin_site.css' , array(), _S_VERSION );
	wp_enqueue_style('wp-color-picker' );
    wp_enqueue_script('wp-color-picker-alpha',  get_template_directory_uri() . '/assets/js/wp-color-picker-alpha.js', array( 'wp-color-picker' ), '1.0.0', true );
    wp_enqueue_script( 'sharksdesign-install-recommended-plugins', get_template_directory_uri() . '/install-recommended-plugins/admin.js', array( 'jquery' ), false, false );
   
    $color_picker_strings = array(
        'clear'            => __( 'Clear', 'sharksdesign' ),
        'clearAriaLabel'   => __( 'Clear color', 'sharksdesign' ),
        'defaultString'    => __( 'Default', 'sharksdesign' ),
        'defaultAriaLabel' => __( 'Select default color', 'sharksdesign' ),
        'pick'             => __( 'Select Color', 'sharksdesign' ),
        'defaultLabel'     => __( 'Color value', 'sharksdesign' ),
    );
    wp_localize_script( 'wp-color-picker-alpha', 'wpColorPickerL10n', $color_picker_strings );
    wp_enqueue_script( 'wp-color-picker-alpha' );    
}
add_action('admin_enqueue_scripts', 'sharksdesign_admin_script_style');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/customizer-css.php';

require get_template_directory() . '/inc/customizer_control.php';

require get_template_directory() . '/inc/about.php';

require get_template_directory() . '/install-recommended-plugins/wtb-required-plugins.php';

require get_template_directory() . '/install-recommended-plugins/index.php';

require get_template_directory() . '/inc/customizer-options/sharksdesign_recommended_plugin.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

function sharksdesign_breadcrumb_slider(){
	?>
	<div class="breadcrumb_info">
		<div class="breadcrumb_data">
			<section id="breadcrumb-section" class="breadcrumb-area breadcrumb-centerc">
				<div class="breadcrumb-content">
					<div class="breadcrumb-heading">
						<h1><?php sharksdesign_breadcrumb_title();	?></h1>
					</div>
					<ol class="breadcrumb-list">
						<li>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><i class="fa fa-home"></i></a>
							<?php echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;"; ?>
						</li>
						<li>
							<?php sharksdesign_breadcrumb_title();?>
						</li>
					</ol>
				</div> 
			</section>
		</div>		
	</div>
	<?php
}

// Add custom meta box
add_action("add_meta_boxes", "sharksdesign_add_sidebar_meta_box");
function sharksdesign_add_sidebar_meta_box()
{
	$post_types = get_post_type();
    add_meta_box("sharksdesign-meta-box", "Custom Meta Box","sharksdesign_sidebar_meta_box_markup", $post_types, "normal", "high", null);
}
function sharksdesign_sidebar_meta_box_markup($object){
	?>
	<table class="admin_sidebar_select">
		<tr><td><label><h2 class="custom_meta"><?php echo __( 'Breadcrumb', 'sharksdesign' ); ?></h2></label></td></tr>
	   	<tr>
	   		<td>
	   			<label for="breadcrumb_select">
	   				<input type="radio" name="breadcrumb_select" id="breadcrumb_select" value="yes" <?php if(get_post_meta($object->ID,'breadcrumb_select',true)=='yes'){echo "checked";}?>><?php echo __( 'Yes', 'sharksdesign' ); ?> 
	   				<input type="radio" name="breadcrumb_select" id="breadcrumb_select" value="no" <?php if(get_post_meta($object->ID,'breadcrumb_select',true)=='no'){echo "checked";}?>><?php echo __( 'No', 'sharksdesign' ); ?> 
	   			</label>
	   		</td>
	   	</tr>
	   	<tr><td><label><h2 class="custom_meta"><?php echo __( 'Sidebar', 'sharksdesign' ); ?></h2></label></td></tr>
   		<tr>
	   		<td>
	   			<label for="no_sidebar">		   				
	   				<input type="radio" name="sidebar_select" id="no_sidebar" class="no_sidebar" value="no_sidebar" <?php if(get_post_meta($object->ID,'sidebar_select',true)=='no_sidebar'){echo "checked";}?>>
		   				<img src="<?php echo esc_url(get_template_directory_uri()) . '/assets/images/full.png' ?>">
		   			</input>
	   			</label>
	   			<label for="left_sidebar">
	   				<input type="radio" name="sidebar_select" id="left_sidebar" class="left_sidebar" value="left_sidebar" <?php if(get_post_meta($object->ID,'sidebar_select',true)=='left_sidebar'){echo "checked";}?>>
	   					<img src="<?php echo esc_url(get_template_directory_uri()) . '/assets/images/left.png' ?>">
	   				</input>
	   			</label>
	   			<label for="right_sidebar">			   				
	   				<input type="radio" name="sidebar_select" id="right_sidebar" class="right_sidebar" value="right_sidebar" <?php if(get_post_meta($object->ID,'sidebar_select',true)=='right_sidebar'){echo "checked";}?>>
	   					<img src="<?php echo esc_url(get_template_directory_uri()) . '/assets/images/right.png' ?>">
	   				</input>
	   			</label>			
	   		</td>
	   	</tr>
	</table>
	<?php
}
add_action( 'save_post','sharksdesign_save_sidebar_meta_box_data');
function sharksdesign_save_sidebar_meta_box_data( $post_id ) {
	
	if(isset($_REQUEST['breadcrumb_select'])){
		$breadcrumb_select = sanitize_text_field( wp_unslash($_REQUEST['breadcrumb_select'] ));
		update_post_meta($post_id,'breadcrumb_select',$breadcrumb_select);
	}
	if(isset($_REQUEST['sidebar_select'])){
		$sidebar_select = sanitize_text_field( wp_unslash($_REQUEST['sidebar_select'] ));
		update_post_meta($post_id,'sidebar_select',$sidebar_select);
	}
}


add_action( 'admin_notices', 'sharksdesign_admin_notice_demo_data' );
function sharksdesign_admin_notice_demo_data() {
	if( !empty( $_GET['status'] ) && $_GET['status'] == 'sharksdesign_hide_msg' ){
		update_option( 'sharksdesign_hide_msg', true );
	}

	$status = get_option( 'sharksdesign_hide_msg' );
	if( $status == true ){
		return;
	} 

	$recommended_plugins = apply_filters( 'sharksdesign_plugins', $plugins = array() );
	if( empty( $recommended_plugins ) ){
		return;
	}
	$my_theme = wp_get_theme();
	$theme_name = $my_theme->get( 'Name' );
	$nonce = wp_create_nonce("sharksdesign_install_plugins");
	?>
	 <div class="updated notice notice-get-started-class is-dismissible" data-notice="get_started">
                <div class="sharksdesign-getting-started-notice clearfix">
                    <div class="sharksdesign-theme-screenshot">
                        <img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/screenshot.png" class="screenshot" alt="<?php esc_attr_e( 'Theme Screenshot', 'sharksdesign' ); ?>" />
                    </div><!-- /.sharksdesign-theme-screenshot -->
                    <div class="theme-info-wrapper">
				        <?php 
				        echo '<strong style="font-size: 20px; padding-bottom: 10px; display: block;">';
						
				        printf(
				        	esc_html__( 'Thank you for installing %1$s', 'sharksdesign' ),
				        	esc_attr($theme_name)
				        ); 
				        echo '</strong>';
				        echo '<p>' . esc_html__( "Install and activate Page Section For Themereviewer plugin for taking full advantage of all the features this theme has to offer." , 'sharksdesign' ) . '</p>';
				        ?>

				        <div class="button_wrapper_theme" style="margin-top: 20px;">
					        <a 
					        href="javascript:void(0)" 
					        class="button button-primary button-hero sharksdesign_install_plugins" 
					        data-nonce="<?php echo esc_attr( $nonce ); ?>"
					        data-redirect="<?php echo esc_url( admin_url( 'customize.php' )); ?>"
					        >
					        <!-- themes.php?page=tgmpa-install-plugins -->
					        <img class="lodear_img" src="<?php echo esc_url(get_template_directory_uri().'/assets/images/loader.gif') ?>" style="display: none;">
					        <span><?php esc_html_e( 'Get Started', 'sharksdesign' ) ?></span>
					    	</a>

					        <a href="<?php echo esc_url( admin_url('/?status=sharksdesign_hide_msg') ); ?>" 
					        class="button button-default button-hero sharksdesign_dismiss" ><?php esc_html_e( 'Close', 'sharksdesign' ) ?></a>
				        </div>
			        </div>   
                </div>
            </div>    
    <?php
}

add_filter( 'sharksdesign_plugins', function(){

	$plugins = array(
		'spediex-for-theme' => array(
			'slug' => 'spediex-for-theme/spediex-for-theme.php',
			'zip' => 'spediex-for-theme'
		),	
		'woocommerce' => array(
            'slug' => 'woocommerce/woocommerce.php',
            'zip' => 'woocommerce'
        ),
	);
	return $plugins;
});

function sharksdesign_main_js() {
    wp_enqueue_script( 'sharksdesign-main-js', get_theme_file_uri( '/assets/js/custom.js' ), array(), '1.0', true );
    // Localize the script with new data and pass php variables to JS.
    $main_js_data = array(
        'img_autoplay' => esc_attr(get_theme_mod('featured_slider_autoplay', 'true')),
        'img_autoplayspped' => esc_attr(get_theme_mod('featured_slider_autoplay_speed','1000')),
        'img_autoplaytimeout' => esc_attr(get_theme_mod('featured_slider_autoplay_timeout','5000')),

        'autoplay' => esc_attr(get_theme_mod('our_testimonial_slider_autoplay', 'true')),
        'autoplayspped' => esc_attr(get_theme_mod('our_testimonial_slider_autoplay_speed','1000')),
        'autoplaytimeout' => esc_attr(get_theme_mod('our_testimonial_autoplay_timeout','5000')),

        'sponsor_autoplay' => esc_attr(get_theme_mod('our_sponsors_slider_autoplay', 'true')),
        'sponsor_autoplayspped' => esc_attr(get_theme_mod('our_sponsors_slider_autoplay_speed','1000')),
        'sponsor_autoplaytimeout' => esc_attr(get_theme_mod('our_sponsors_autoplay_timeout','5000')),
    );
    wp_localize_script( 'sharksdesign-main-js', 'main_vars', $main_js_data );
}
add_action( 'wp_enqueue_scripts', 'sharksdesign_main_js' );