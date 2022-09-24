<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sharksdesign
 */

if(get_theme_mod('sharksdesign_display_breadcrumb_section',true) != ''){
	sharksdesign_breadcrumb_slider();
}
elseif(get_post_type()){	
	if(get_post_meta(get_the_ID(),'breadcrumb_select',true) == 'yes'){
		sharksdesign_breadcrumb_slider();
	}
}