<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Lyceum Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php if(is_singular() && pings_open()) { ?>
<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' )); ?>">
<?php } ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
	//wp_body_open hook from WordPress 5.2
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
?>
<a class="skip-link screen-reader-text" href="#sitemain">
	<?php _e( 'Skip to content', 'lyceum-lite' ); ?>
</a>

<?php

$hide_tphead = get_theme_mod('hide_tp_head');

$gettp_txt = esc_html(get_theme_mod('lyceum_tphead_txt'));

$gettpbrfb = get_theme_mod('lyceum_tphead_fb');
$gettpbrtw = get_theme_mod('lyceum_tphead_tw');
$gettpbrin = get_theme_mod('lyceum_tphead_in');
$gettpbrlink = get_theme_mod('lyceum_tphead_link');
$gettpbrgp = get_theme_mod('lyceum_tphead_gp');
$gettpbryt = get_theme_mod('lyceum_tphead_yt');
if( $hide_tphead == '' ){
?>
<section class="top-header">
	<div class="wrapper">
		<div class="flex flex-center">
			<div class="top-header-left">
				<p><?php echo $gettp_txt; ?></p>
			</div><!-- top header left -->
			<div class="top-header-right">
				<?php
					if( !empty ( $gettpbrfb || $gettpbrtw || $gettpbrin || $gettpbrlink || $gettpbrgp || $gettpbryt ) ){
						echo '<span class="has-social">';
							if( !empty( $gettpbrfb ) ){
								echo '<a href="'.esc_url( $gettpbrfb ).'" target="_blank" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>';
							}
							if( !empty( $gettpbrtw ) ){
								echo '<a href="'.esc_url( $gettpbrtw ).'" target="_blank" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>';
							}
							if( !empty( $gettpbrin ) ){
								echo '<a href="'.esc_url( $gettpbrin ).'" target="_blank" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>';
							}
							if( !empty( $gettpbrlink ) ){
								echo '<a href="'.esc_url( $gettpbrlink ).'" target="_blank" title="LinkedIn"><i class="fa fa-linkedin" aria-hidden="true"></i></a>';
							}
							if( !empty( $gettpbrgp ) ){
								echo '<a href="'.esc_url( $gettpbrgp ).'" target="_blank" title="Google Plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>';
							}
							if( !empty( $gettpbryt ) ){
								echo '<a href="'.esc_url( $gettpbryt ).'" target="_blank" title="YouTube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>';
							}
						echo '</span>';
					}
				?>
			</div><!-- top header right -->
		</div><!-- flex -->
	</div><!-- wrapper -->
</section><!-- top header -->
<?php } ?>

<header id="header" class="main-header">
	<div class="wrapper">
		<div class="flex flex-center tab-block">
			
			<div class="left-area">
				<div class="site-title">
					<?php lyceum_lite_the_custom_logo(); ?>
						<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a></h1>
						<?php $description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
						<p><?php echo esc_html($description); ?></p>
					<?php endif; ?>
				</div><!-- site title -->
			</div><!-- col-left -->
			<div class="right-area">
				<div class="navigation">
					<div class="toggle">
						<a class="toggleMenu" href="#"><?php esc_html_e('Menu','lyceum-lite'); ?></a>
					</div><!-- toggle -->
					<nav id="main-navigation" class="site-navigation primary-navigation sitenav" role="navigation">
						<?php wp_nav_menu( array('theme_location' => 'primary', 'link_before'=> '<span>', 'link_after'=> '</span>', ) ); ?>
					</nav>
				</div>
			</div><!-- right area-->
				
		</div><!-- align content -->
	</div><!-- wrapper -->
</header><!-- header -->