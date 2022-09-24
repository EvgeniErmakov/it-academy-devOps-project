<?php

/**
 * About setup
 *
 * @package AgencyX
 */

require_once trailingslashit(get_template_directory()) . 'inc/about/class.about.php';

if (!function_exists('agencyx_about_setup')) :

	/**
	 * About setup.
	 *
	 * @since 1.0.0
	 */
	function agencyx_about_setup()
	{
		$theme = wp_get_theme();
		$xtheme_name = $theme->get('Name');
		$xtheme_domain = $theme->get('TextDomain');
		if ($xtheme_domain == 'x-magazine') {
			$theme_slug = $xtheme_domain;
		} else {
			$theme_slug = 'agencyx';
		}



		$config = array(
			// Menu name under Appearance.
			'menu_name'               => sprintf(esc_html__('%s Info', 'agencyx'), $xtheme_name),
			// Page title.
			'page_name'               => sprintf(esc_html__('%s Info', 'agencyx'), $xtheme_name),
			/* translators: Main welcome title */
			'welcome_title'         => sprintf(esc_html__('Welcome to %s! - Version ', 'agencyx'), $theme['Name']),
			// Main welcome content
			// Welcome content.
			'welcome_content' => sprintf(esc_html__('%1$s is now installed and ready to use. We want to make sure you have the best experience using the theme and that is why we gathered here all the necessary information for you. Thanks for using our theme!', 'agencyx'), $theme['Name']),

			// Tabs.
			'tabs' => array(
				'getting_started' => esc_html__('Getting Started', 'agencyx'),
				'recommended_actions' => esc_html__('Recommended Actions', 'agencyx'),
				'useful_plugins'  => esc_html__('Useful Plugins', 'agencyx'),
				'free_pro'  => esc_html__('Free Vs Pro', 'agencyx'),
			),

			// Quick links.
			'quick_links' => array(
				'xmagazine_url' => array(
					'text'   => esc_html__('UPGRADE AgencyX PRO', 'agencyx'),
					'url'    => 'https://wpthemespace.com/product/agencyx-pro/?add-to-cart=6708',
					'button' => 'danger',
				),
				'update_url' => array(
					'text'   => esc_html__('View demo', 'agencyx'),
					'url'    => 'https://agencyx.wpteamx.com/',
					'button' => 'primery',
				),

			),

			// Getting started.
			'getting_started' => array(
				'one' => array(
					'title'       => esc_html__('Demo Content', 'agencyx'),
					'icon'        => 'dashicons dashicons-layout',
					'description' => sprintf(esc_html__('Demo content is pro feature. To import sample demo content, %1$s plugin should be installed and activated. After plugin is activated, visit Import Demo Data menu under Appearance.', 'agencyx'), esc_html__('One Click Demo Import', 'agencyx')),
					'button_text' => esc_html__('UPGRADE For  Demo Content', 'agencyx'),
					'button_url'  => 'https://wpthemespace.com/product/agencyx-pro/?add-to-cart=6708',
					'button_type' => 'primary',
					'is_new_tab'  => true,
				),

				'two' => array(
					'title'       => esc_html__('Theme Options', 'agencyx'),
					'icon'        => 'dashicons dashicons-admin-customizer',
					'description' => esc_html__('Theme uses Customizer API for theme options. Using the Customizer you can easily customize different aspects of the theme.', 'agencyx'),
					'button_text' => esc_html__('Customize', 'agencyx'),
					'button_url'  => wp_customize_url(),
					'button_type' => 'primary',
				),
				'three' => array(
					'title'       => esc_html__('Show Video', 'agencyx'),
					'icon'        => 'dashicons dashicons-layout',
					'description' => sprintf(esc_html__('You may show AgencyX short video for better understanding', 'agencyx'), esc_html__('One Click Demo Import', 'agencyx')),
					'button_text' => esc_html__('Show video', 'agencyx'),
					'button_url'  => 'https://www.youtube.com/watch?v=pNlm-ArOHTM&t=18s',
					'button_type' => 'primary',
					'is_new_tab'  => true,
				),
				'five' => array(
					'title'       => esc_html__('Set Widgets', 'agencyx'),
					'icon'        => 'dashicons dashicons-tagcloud',
					'description' => esc_html__('Set widgets in your sidebar, Offcanvas as well as footer.', 'agencyx'),
					'button_text' => esc_html__('Add Widgets', 'agencyx'),
					'button_url'  => admin_url() . '/widgets.php',
					'button_type' => 'link',
					'is_new_tab'  => true,
				),
				'six' => array(
					'title'       => esc_html__('Theme Preview', 'agencyx'),
					'icon'        => 'dashicons dashicons-welcome-view-site',
					'description' => esc_html__('You can check out the theme demos for reference to find out what you can achieve using the theme and how it can be customized. Theme demo only work in pro theme', 'agencyx'),
					'button_text' => esc_html__('View Demo', 'agencyx'),
					'button_url'  => 'https://agencyx.wpteamx.com/',
					'button_type' => 'link',
					'is_new_tab'  => true,
				),
				'seven' => array(
					'title'       => esc_html__('Contact Support', 'agencyx'),
					'icon'        => 'dashicons dashicons-sos',
					'description' => esc_html__('Got theme support question or found bug or got some feedbacks? Best place to ask your query is the dedicated Support forum for the theme.', 'agencyx'),
					'button_text' => esc_html__('Contact Support', 'agencyx'),
					'button_url'  => 'https://wpthemespace.com/support/',
					'button_type' => 'link',
					'is_new_tab'  => true,
				),
			),

			'useful_plugins'        => array(
				'description' => esc_html__('Theme supports some helpful WordPress plugins to enhance your site. But, please enable only those plugins which you need in your site. For example, enable WooCommerce only if you are using e-commerce.', 'agencyx'),
				'already_activated_message' => esc_html__('Already activated', 'agencyx'),
				'version_label' => esc_html__('Version: ', 'agencyx'),
				'install_label' => esc_html__('Install and Activate', 'agencyx'),
				'activate_label' => esc_html__('Activate', 'agencyx'),
				'deactivate_label' => esc_html__('Deactivate', 'agencyx'),
				'content'                   => array(
					array(
						'slug' => 'magical-addons-for-elementor',
						'icon' => 'svg',
					),
					array(
						'slug' => 'magical-products-display'
					),
					array(
						'slug' => 'magical-posts-display'
					),
					array(
						'slug' => 'click-to-top'
					),
					array(
						'slug' => 'gallery-box',
						'icon' => 'svg',
					),
					array(
						'slug' => 'magical-blocks'
					),
					array(
						'slug' => 'easy-share-solution',
						'icon' => 'svg',
					),
					array(
						'slug' => 'wp-edit-password-protected',
						'icon' => 'svg',
					),
				),
			),
			// Required actions array.
			'recommended_actions'        => array(
				'install_label' => esc_html__('Install and Activate', 'agencyx'),
				'activate_label' => esc_html__('Activate', 'agencyx'),
				'deactivate_label' => esc_html__('Deactivate', 'agencyx'),
				'content'            => array(
					'magical-blocks' => array(
						'title'       => __('Magical Posts Display', 'agencyx'),
						'description' => __('Now you can add or update your site elements very easily by Magical Products Display. Supercharge your Elementor block with highly customizable Magical Blocks For WooCommerce.', 'agencyx'),
						'plugin_slug' => 'magical-products-display',
						'id' => 'magical-posts-display'
					),
					'go-pro' => array(
						'title'       => '<a target="_blank" class="activate-now button button-danger" href="https://wpthemespace.com/product/agencyx-pro/?add-to-cart=6708">' . __('UPGRADE AgencyX PRO', 'agencyx') . '</a>',
						'description' => __('You will get more frequent updates and quicker support with the Pro version.', 'agencyx'),
						//'plugin_slug' => 'x-instafeed',
						'id' => 'go-pro'
					),

				),
			),
			// Free vs pro array.
			'free_pro'                => array(
				'free_theme_name'     => $xtheme_name,
				'pro_theme_name'      => $xtheme_name . __(' Pro', 'agencyx'),
				'pro_theme_link'      => 'https://wpthemespace.com/product/agencyx-pro',
				/* translators: View link */
				'get_pro_theme_label' => sprintf(__('Get %s', 'agencyx'), 'AgencyX Pro'),
				'features'            => array(
					array(
						'title'       => esc_html__('Daring Design for Devoted Readers', 'agencyx'),
						'description' => esc_html__('AgencyX\'s design helps you stand out from the crowd and create an experience that your readers will love and talk about. With a flexible home page you have the chance to easily showcase appealing content with ease.', 'agencyx'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Mobile-Ready For All Devices', 'agencyx'),
						'description' => esc_html__('AgencyX makes room for your readers to enjoy your articles on the go, no matter the device their using. We shaped everything to look amazing to your audience.', 'agencyx'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Home slider', 'agencyx'),
						'description' => esc_html__('AgencyX gives you extra slider feature. You can create awesome home slider in this theme.', 'agencyx'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Widgetized Sidebars To Keep Attention', 'agencyx'),
						'description' => esc_html__('AgencyX comes with a widget-based flexible system which allows you to add your favorite widgets over the Sidebar as well as on offcanvas too.', 'agencyx'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Auto Set-up Feature', 'agencyx'),
						'description' => esc_html__('You can import demo site only one click so you can setup your site like demo very easily.', 'agencyx'),
						'is_in_lite'  => 'ture',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Multiple Header Layout', 'agencyx'),
						'description' => esc_html__('AgencyX gives you extra ways to showcase your header with miltiple layout option you can change it on the basis of your requirement', 'agencyx'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('One Click Demo install', 'agencyx'),
						'description' => esc_html__('You can import demo site only one click so you can setup your site like demo very easily.', 'agencyx'),
						'is_in_lite'  => 'ture',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Extra Drag and drop support', 'agencyx'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Advanced Portfolio Filter', 'agencyx'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Testimonial Carousel', 'agencyx'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Diffrent Style Blog', 'agencyx'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Flexible Home Page Design', 'agencyx'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Pro Service Section', 'agencyx'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Animation Home Text', 'agencyx'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Advance Customizer Options', 'agencyx'),
						'description' => esc_html__('Advance control for each element gives you different way of customization and maintained you site as you like and makes you feel different.', 'agencyx'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Advance Pagination', 'agencyx'),
						'description' => esc_html__('Multiple Option of pagination via customizer can be obtained on your site like Infinite scroll, Ajax Button On Click, Number as well as classical option are available.', 'agencyx'),
						'is_in_lite'  => 'ture',
						'is_in_pro'   => 'true',
					),

					array(
						'title'       => esc_html__('Premium Support and Assistance', 'agencyx'),
						'description' => esc_html__('We offer ongoing customer support to help you get things done in due time. This way, you save energy and time, and focus on what brings you happiness. We know our products inside-out and we can lend a hand to help you save resources of all kinds.', 'agencyx'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('No Credit Footer Link', 'agencyx'),
						'description' => esc_html__('You can easily remove the Theme: AgencyX by AgencyX copyright from the footer area and make the theme yours from start to finish.', 'agencyx'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
				),
			),

		);

		agencyx_About::init($config);
	}

endif;

add_action('after_setup_theme', 'agencyx_about_setup');


//Admin notice 
function agencyx_new_optins_texts()
{
	global $pagenow;
	if (get_option('agencyx2') || $pagenow == 'themes.php') {
		return;
	}
	$class = 'eye-notice notice notice-warning is-dismissible';
	$message = __('<strong> Hi Buddy!! Now You are using the Free version of AgencyX theme.<br> AgencyX PRO version is now available with an auto-setup feature!! Only active the theme and follow auto-setup then your site will be ready with lots of advanced features. Now create your site like a pro with only a few clicks!!!! So why late get pro now </strong> ', 'agencyx');
	$url1 = esc_url('https://wpthemespace.com/product/agencyx-pro/');
	$url3 = esc_url('https://wpthemespace.com/product/agencyx-pro/?add-to-cart=6708');

	printf('<div class="%1$s" style="padding:10px 15px 20px;text-transform:uppercase"><p>%2$s</p><a target="_blank" class="button button-primary" href="%3$s" style="margin-right:10px">' . __('AgencyX Pro Details', 'agencyx') . '</a><a target="_blank" class="button button-primary" href="%4$s" style="margin-right:10px">' . __('Upgrade Pro', 'agencyx') . '</a><button class="button button-info btnend" style="margin-left:10px">' . __('Dismiss the notice', 'agencyx') . '</button></div>', esc_attr($class), wp_kses_post($message), $url1, $url3);
}
add_action('admin_notices', 'agencyx_new_optins_texts');

function agencyx_new_optins_texts_init()
{
	if (isset($_GET['xbnotice']) && $_GET['xbnotice'] == 1) {
		delete_option('agencyx1');
		update_option('agencyx2', 1);
	}
}
add_action('init', 'agencyx_new_optins_texts_init');
