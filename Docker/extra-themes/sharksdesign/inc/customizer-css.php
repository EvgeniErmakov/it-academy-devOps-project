<?php
function sharksdesign_customize_css(){
	global $sharksdesign_fonttotal;
	$sharksdesign_body_fontfamily = get_theme_mod("sharksdesign_body_fontfamily",5);
    $sharksdesign_body_fontfamily = $sharksdesign_fonttotal[$sharksdesign_body_fontfamily];

    $sharksdesign_Heading_fontfamily = get_theme_mod("sharksdesign_Heading_fontfamily",5);
    $sharksdesign_Heading_fontfamily = $sharksdesign_fonttotal[$sharksdesign_Heading_fontfamily];

    $sharksdesign_Heading1_fontfamily = get_theme_mod("sharksdesign_Heading1_fontfamily",5);
    $sharksdesign_Heading1_fontfamily = $sharksdesign_fonttotal[$sharksdesign_Heading1_fontfamily];

    $sharksdesign_Heading2_fontfamily = get_theme_mod("sharksdesign_Heading2_fontfamily",5);
    $sharksdesign_Heading2_fontfamily = $sharksdesign_fonttotal[$sharksdesign_Heading2_fontfamily];

    $sharksdesign_Heading3_fontfamily = get_theme_mod("sharksdesign_Heading3_fontfamily",5);
    $sharksdesign_Heading3_fontfamily = $sharksdesign_fonttotal[$sharksdesign_Heading3_fontfamily];

    //Body Font-Family
	    if($sharksdesign_body_fontfamily!='Select Font'){
			?>
			<style type="text/css">
		        body{
		            font-family: <?php echo esc_attr( $sharksdesign_body_fontfamily );?>            
		        }
	        </style>
	        <?php
	    }
    //Heading Font-Family
    if($sharksdesign_Heading_fontfamily!='Select Font'){
    	?>
		<style type="text/css">
	        h1, h2, h3, h4, h5, h6{
	            font-family: <?php echo esc_attr( $sharksdesign_Heading_fontfamily );?>            
	        }
        </style>
        <?php
    }
    //Heading H1 Font-Family
	    if($sharksdesign_Heading1_fontfamily!='Select Font'){
	    	?>
			<style type="text/css">
		        h1{
		            font-family: <?php echo esc_attr( $sharksdesign_Heading1_fontfamily );?>            
		        }
	        </style>
	        <?php
	    }
	//Heading H2 Font-Family
	    if($sharksdesign_Heading2_fontfamily!='Select Font'){
	    	?>
			<style type="text/css">
		        h2{
		            font-family: <?php echo esc_attr( $sharksdesign_Heading2_fontfamily );?>            
		        }
	        </style>
	        <?php
	    }
    //Heading H3 Font-Family
	    if($sharksdesign_Heading3_fontfamily!='Select Font'){
	    	?>
			<style type="text/css">
		        h3{
		            font-family: <?php echo esc_attr( $sharksdesign_Heading3_fontfamily );?>            
		        }
	        </style>
	        <?php
	    }
	if(get_theme_mod('sharksdesign_header_width_layout','content_width')){
		?>
		<style>
			.header_info {
    			max-width: <?php echo esc_attr(get_theme_mod('sharksdesign_header_contact_width','1100')); ?>px;
			    margin-left: auto;
			    margin-right: auto;
    		}
		</style>
		<?php
	}
	if(get_theme_mod('sharksdesign_container_width_layout','content_width')=='content_width'){
		?>
		<style>
			.sharksdesign_container_info{
				max-width: <?php echo esc_attr(get_theme_mod('sharksdesign_container_contact_width','1100'));?>px;
				margin-left: auto;
				margin-right: auto;
				padding: 20px 0px;
			}
			main#primary {
			    background-color: <?php echo esc_attr(get_theme_mod('sharksdesign_boxed_container_bg_color','#212428')); ?>;
			    margin: 15px;
	    		padding: 15px;
			}
		    aside.widget-area li{
		    	background-color: <?php echo esc_attr(get_theme_mod('sharksdesign_boxed_container_bg_color','#212428')); ?>;
		    	margin: 15px 0px;
		    	transition: 0.3s all ease-in-out;
		    }
		    .wp-block-group__inner-container ul, .wp-block-search__inside-wrapper, .no-comments.wp-block-latest-comments, .wp-block-group__inner-container ol, .no-comments.wp-block-latest-comments {
			    margin: 0px;
			    padding: 0px;
			    padding-left: 0px !important;
			}
			.wp-block-group__inner-container ul li, .wp-block-group__inner-container ol li {
			    padding: 7px 10px;
			}
			.wp-block-group__inner-container ul li:hover, .wp-block-group__inner-container ol li:hover {
			    padding-left: 20px;
			}
			.wp-block-search__inside-wrapper {
			    margin: 15px 0px;
			}
			.wp-block-search__label {
			    width: 100%;
			    display: block;
			    font-size: 28px;
			    font-weight: bold;
			}
			aside.widget-area section h2, aside.widget-area label.wp-block-search__label {
			    padding: 18px 0px;
			}
			@media only screen and (max-width: 768px){
				.main_containor.list_view article {
				    display: flex;
				    justify-content: space-between;
				    flex-direction: column;
				}
				.main_containor.list_view article figure.post-thumbnail {
				    width: 100%;
				}
				.main_containor.list_view article .main_container {
				    width: 100%;
				}
			}
		</style>
		<?php
	}
	if(get_theme_mod('sharksdesign_container_width_layout','content_width')=='boxed_layout'){
		?>
		<style>
			.sharksdesign_container_info{
				max-width: <?php echo esc_attr(get_theme_mod('sharksdesign_container_contact_width','1100'));?>px;
				margin-left: auto;
				margin-right: auto;
				padding: 20px 0px;
			}

			.sharksdesign_container_info.boxed_layout main#primary {			    
			    background-color: <?php echo esc_attr(get_theme_mod('sharksdesign_boxed_layout_bg_color','#212428')); ?>;
			    padding: 20px;
			    margin: 10px;
			}
			.blog .sharksdesign_container_info.boxed_layout main#primary article {
			    padding: 10px;
			}
			aside.widget-area {
			    background-color:<?php echo esc_attr(get_theme_mod('sharksdesign_boxed_layout_bg_color','#212428')); ?>;
			    margin: 10px;
			}

			.blog .sharksdesign_container_info.boxed_layout.list_view main#primary article {
			    margin-bottom: 60px;
			    padding: 0px;
			}
			.featured-section, .about_data, .our_portfolio_data, .our_team_info, .our_services_info, .our_testimonial_info, .our_sponsors_info, .sharksdesign_product_data {
			    max-width: <?php echo esc_attr(get_theme_mod('sharksdesign_container_contact_width','1100'));?>px;
				margin-left: auto;
				margin-right: auto;
			}
			.main_container {
			    padding-left: 40px;
			}
			aside.widget-area li{
		    	transition: 0.3s all ease-in-out;
		    }
			.wp-block-search__label {
			    width: 100%;
			    display: block;
			    font-size: 28px;
			    font-weight: bold;
			}
			aside.widget-area section h2, aside.widget-area label.wp-block-search__label {
			    padding: 18px 0px;
			}
			.wp-block-group__inner-container ul, .wp-block-search__inside-wrapper, .no-comments.wp-block-latest-comments, .wp-block-group__inner-container ol, .no-comments.wp-block-latest-comments {
			    margin: 0px;
			    padding: 0px;
			    padding-left: 0px !important;
			}
			.wp-block-group__inner-container ul li:hover, .wp-block-group__inner-container ol li:hover {
			    padding-left: 20px;
			}
			.wp-block-search__inside-wrapper {
			    margin: 15px 0px;
			}
			@media only screen and (max-width: 768px){
				.main_containor.list_view article {
				    display: flex;
				    justify-content: space-between;
				    flex-direction: column;
				}
				.main_containor.list_view article figure.post-thumbnail {
				    width: 100%;
				}
				.main_containor.list_view article .main_container {
				    width: 100%;
				}
				.sharksdesign_container_info.boxed_layout main#primary article {
				    padding: 0px; 
				    margin-bottom: 60px;
				}
				.sharksdesign_container_info.boxed_layout.grid_view main#primary article{
					padding: 0px;
				}
			}
		</style>
		<?php
	}
	if(get_theme_mod('sharksdesign_container_width_layout','content_width')=='full_width'){
		?>
		<style>
			.sharksdesign_container_info.full_width main#primary article {
			    padding: 0px;
			    margin-bottom: 60px;
			}
			.main_container {
			    padding-left: 40px;
			}
			.wp-block-search__label {
			    width: 100%;
			    display: block;
			    font-size: 28px;
			    font-weight: bold;
			}
			aside.widget-area li{
		    	transition: 0.3s all ease-in-out;
		    }
		    .wp-block-search__inside-wrapper {
			    margin: 15px 0px;
			}
			aside.widget-area section h2, aside.widget-area label.wp-block-search__label {
			    padding: 18px 0px;
			}
			.wp-block-group__inner-container ul, .wp-block-search__inside-wrapper, .no-comments.wp-block-latest-comments, .wp-block-group__inner-container ol, .no-comments.wp-block-latest-comments {
			    margin: 0px;
			    padding: 0px;
			    padding-left: 0px !important;
			}
			.wp-block-group__inner-container ul li:hover, .wp-block-group__inner-container ol li:hover {
			    padding-left: 20px;
			}

			@media only screen and (max-width: 768px){
				.main_containor.list_view article {
				    display: flex;
				    justify-content: space-between;
				    flex-direction: column;
				}
				.main_containor.list_view article figure.post-thumbnail {
				    width: 100%;
				}
				.main_containor.list_view article .main_container {
				    width: 100%;
				}
				.sharksdesign_container_info.full_width {
				    padding: 20px;
				    margin: 0px;
				}
			}
		</style>
		<?php
	}
	if(get_theme_mod('sharksdesign_footer_width_layout','content_width')=='content_width'){
		?>
		<style>
			footer#colophon .site-info{
				max-width: <?php echo esc_attr(get_theme_mod('sharksdesign_footer_contact_width','1100'));?>px;
				margin-left: auto;
				margin-right: auto;
			}
		</style>
		<?php
	}
	if(get_theme_mod('sharksdesign_header_layout','header1')=='header1'){
		?>
		<style>
			.header_info {
				display: flex;
			    align-items: center;
			    justify-content: space-between;
			    padding: 12px 0px;	
			}
			.main_site_header{
				background-color: <?php echo esc_attr(get_theme_mod('sharksdesign_header1_bg_color','#212428')); ?>;
				color: <?php echo esc_attr(get_theme_mod('sharksdesign_header1_text_color','#ffffff')); ?>;
			}
			.main_site_header a{
				color: <?php echo esc_attr(get_theme_mod('sharksdesign_header1_Link_color','#c4cfde')); ?>;
			}
			.main_site_header a:hover{
				color: <?php echo esc_attr(get_theme_mod('sharksdesign_header1_linkhover_color','#ffffff')); ?>;
			}
			.top_header{
				background-color: <?php echo esc_attr(get_theme_mod('header1_top_bar_bg_color','#25272c')); ?>;
				color: <?php echo esc_attr(get_theme_mod('header1_top_bar_text_color','#ffffff')); ?>;
			}
		</style>
		<?php
	}
	if(get_theme_mod('sharksdesign_header_layout','header1')=='header2'){
		?>
		<style>
			header#masthead {
			    position: absolute;
			    right: 0;
			    left: 0;
			    width: 100%;
			    border-top: 0;
			    margin: 0 auto;
			    z-index: 99;
			}
			.header_info {
			    display: flex;
			    justify-content: space-between;
			    align-items: center;
			}
			.featured_slider_image .hentry-inner .entry-container {
			    margin: 200px 150px 0;
			}
			.hentry-inner {
			    height: 700px;
			}
			.breadcrumb_info{
				padding-top: 200px;
			}
			.top_header{
				background-color: <?php echo esc_attr(get_theme_mod('transparent_top_header_bg_color','rgba(255,255,255,0.3)')); ?>;
				color: <?php echo esc_attr(get_theme_mod('transparent_top_bar_text_color','#fff')); ?>;
			}
			.main_site_header{
				background-color: <?php echo esc_attr(get_theme_mod('transparent_header_bg_color','rgba(255,255,255,0.3)')); ?>;
				color: <?php echo esc_attr(get_theme_mod('transparent_header_text_color','#fff')); ?>;
			}
			header#masthead a{
				color: <?php echo esc_attr(get_theme_mod('transparent_header_link_color','#c3cedd')); ?>;
			}
			header#masthead a:hover{
				color: <?php echo esc_attr(get_theme_mod('transparent_header_link_hover_color','#ffffff')); ?>;
			}
			@media only screen and (max-width: 768px){
				.featured_slider_image .hentry-inner .entry-container {
				    margin: 120px 5px 0;
				}
			}
		</style>
		<?php
	}
	if(!is_home()){
		?>
		<style>
			.featured_slider_image .hentry-inner .entry-container{
				margin: 70px 20px 0px;
			}
		</style>
		<?php
	}
	if(get_theme_mod('footer_bg_image')){
		?>
		<style>
			footer#colophon{
				background:url(<?php echo  esc_attr(get_theme_mod('footer_bg_image'));?>) rgb(0 0 0 / 0.75);
	    		background-position: <?php echo esc_attr(get_theme_mod('footer_bg_position','center center')); ?>;
	    		background-size: <?php echo esc_attr(get_theme_mod('footer_bg_size','cover')); ?>;
	    		background-attachment: <?php echo esc_attr(get_theme_mod('footer_bg_attachment','scroll')); ?>;
	    		background-blend-mode: multiply;
			}
		</style>
		<?php
	}else{
		?>
		<style>
			footer#colophon{
				background-color: <?php echo esc_attr(get_theme_mod('sharksdesign_footer_bg_color','#212428')); ?>;
			}
		</style>
		<?php
	}
	if(get_theme_mod('sharksdesign_top_bar_width_layout','content_width')=='content_width'){
		?>
		<style>
			.topbar_info_data{
				max-width: <?php echo esc_attr(get_theme_mod('sharksdesign_top_bar_contact_width','1100')); ?>px;
				margin-left: auto;
				margin-right: auto;
			}
		</style>
		<?php
	}
	if(get_theme_mod( 'sharksdesign_post_sidebar_width_'.get_post_type(),'30')){
    	$secondary_width = get_theme_mod('sharksdesign_post_sidebar_width_'.get_post_type(),'30');
		$primary_width   = absint( 100 - $secondary_width );
		?>
		<style type="text/css">
			aside.widget-area{
				width: <?php echo esc_attr($secondary_width);?>%;
			}
			main#primary{
				width: <?php echo esc_attr($primary_width);?>%;
			}
		</style>
		<?php
	}
	if(get_theme_mod( 'sharksdesign_container_containe',true ) == ''){
    	?>
		<style type="text/css">
	    	.blog .sharksdesign_container_data {
			    display: none;
			}
	    </style>
        <?php
    } 
   	if(get_theme_mod( 'sharksdesign_container_description',false ) == ''){
    	?>
		<style type="text/css">
	    	.blog article .entry-content {
			    display: none;
			}
	    </style>
        <?php
    }
    if(get_theme_mod( 'sharksdesign_container_date',true ) == ''){
    	?>
		<style type="text/css">
	    	.blog span.posted-on {
			    display: none;
			}
	    </style>
        <?php
    }
    if(get_theme_mod( 'sharksdesign_container_authore',false ) == ''){
    	?>
		<style type="text/css">
			.blog span.byline {
				display: none;
			}
		 </style>
        <?php
    }
    if(get_theme_mod( 'sharksdesign_container_category',true ) == ''){
    	?>
		<style type="text/css">
			.blog span.cat-links {
				display: none;
			}
		 </style>
        <?php
    } 
    if(get_theme_mod( 'sharksdesign_container_comments',false ) == ''){
    	?>
		<style type="text/css">
			.blog span.comments-link {
				display: none;
			}
		 </style>
        <?php
    }  
    if(get_theme_mod( 'sharksdesign_breadcrumb_bg_image')){
    	?>
		<style type="text/css">
		.breadcrumb_info{
			background: url(<?php echo esc_attr(get_theme_mod('sharksdesign_breadcrumb_bg_image'))?>) rgb(0 0 0 / 0.75);
			background-position: <?php echo esc_attr(get_theme_mod('sharksdesign_img_bg_position','center center')); ?>;
		    background-attachment: <?php echo esc_attr(get_theme_mod('sharksdesign_breadcrumb_bg_attachment','scroll'));?>;
		    background-size: <?php echo esc_attr(get_theme_mod('sharksdesign_breadcrumb_bg_size','cover'));?>;
		    background-blend-mode: multiply;
		}
		</style>
		<?php
    }else{
    	?>
		<style type="text/css">
    	.breadcrumb_info{
			background-color: <?php echo esc_attr(get_theme_mod('sharksdesign_breadcrumb_bg_color','#c8c9cb')); ?>;
		}
		</style>
		<?php
    }
    if(get_post_meta(get_the_ID(),'breadcrumb_select',true)=='no'){
		?>
		<style>			
			.breadcrumb_info{
			    display: none;
			}	   
		</style>
		<?php
	}
	if(get_theme_mod( 'display_cart_icon',true) == ''){
    	?>
		<style type="text/css">
			.add_cart_icon{
				display: none !important;
			}
		</style>
		<?php
    }
    if(get_theme_mod( 'display_mobile_cart_icon',true) == ''){
		?>
		<style type="text/css">
			@media only screen and (max-width: 768px){
				.add_cart_icon{
					display: none !important;
				}
			}
		</style>
		<?php
	}
	if(get_theme_mod( 'display_mobile_cart_icon',true) == true){
		?>
		<style type="text/css">
			@media only screen and (max-width: 768px){
				.add_cart_icon{
					display: block !important;
				}
			}
		</style>
		<?php
	}
	if(get_theme_mod( 'display_mobile_search_icon', true) == true){
		?>
		<style type="text/css"> 
			@media only screen and (max-width: 768px){
				div#cl_serch{
					display: block !important;
				}
			}
		</style>
		<?php
	}
	if(get_theme_mod( 'display_mobile_search_icon', true) == ''){
		?>
		<style type="text/css"> 
			@media only screen and (max-width: 768px){
				div#cl_serch{
					display: none;
				}
			}
		</style>
		<?php
	}
	if(get_theme_mod( 'display_search_icon',true) == ''){ 
    	?>
		<style type="text/css">
			div#cl_serch {
			   display: none;
			}
		 </style>
        <?php
    }	
    if(get_theme_mod( 'display_scroll_button',true) == ''){
		?>
		<style>			
			.scrolling-btn {
    			display: none;
			}	   
		</style>
		<?php
	}
	if(get_theme_mod('sharksdesign_container_width_layout','content_width') == 'content_width'){
		?>
		<style type="text/css">
			.featured-section, .about_data, .our_portfolio_data, .our_team_info, .our_services_info, .our_testimonial_info, .our_sponsors_info, .sharksdesign_product_data {
				max-width: <?php echo esc_attr(get_theme_mod('sharksdesign_container_contact_width','1100')); ?>px;
			    margin-left: auto;
			    margin-right: auto;
			}
		</style>
		<?php
	}
	?>
	<style type="text/css">
		body a, time.entry-date.published:before, time.entry-date.published:before, span.cat-links:before, span.comments-link:before, span.byline:before {
			color: <?php echo esc_attr(get_theme_mod('sharksdesign_link_color','#c4cfde')); ?> ;
			text-decoration: none;
		} 
		body a:hover {
			color: <?php echo esc_attr(get_theme_mod('sharksdesign_link_hover_color','#ff014f')); ?> ;
		}
		body {
			font-size: <?php echo esc_attr(get_theme_mod('sharksdesign_body_font_size','15')); ?>px;
			font-weight: <?php echo esc_attr(get_theme_mod('sharksdesign_body_font_weight','400')); ?>;
			text-transform: <?php echo esc_attr(get_theme_mod('sharksdesign_body_text_transform','inherit')); ?>;
		}
		h1{
			font-size: <?php echo esc_attr(get_theme_mod('sharksdesign_heading1_font_size','35')); ?>px;
			font-weight: <?php echo esc_attr(get_theme_mod('sharksdesign_heading1_font_weight','bold')); ?>;
			text-transform: <?php echo esc_attr(get_theme_mod('sharksdesign_heading1_text_transform','inherit')); ?>;
		}
		h2{
			font-size: <?php echo esc_attr(get_theme_mod('sharksdesign_heading2_font_size','28')); ?>px;
			font-weight: <?php echo esc_attr(get_theme_mod('sharksdesign_heading2_font_weight','bold')); ?>;
			text-transform: <?php echo esc_attr(get_theme_mod('sharksdesign_heading2_text_transform','inherit')); ?>;
		}
		h3{
			font-size: <?php echo esc_attr(get_theme_mod('sharksdesign_heading3_font_size','25')); ?>px;
			font-weight: <?php echo esc_attr(get_theme_mod('sharksdesign_heading3_font_weight','400')); ?>;
			text-transform: <?php echo esc_attr(get_theme_mod('sharksdesign_heading3_text_transform','inherit')); ?>;
		}
		a.social_icon i{
			background-color: <?php echo esc_attr(get_theme_mod('sharksdesign_social_icon_bg_color','#16181c')); ?>;
			color: <?php echo esc_attr(get_theme_mod('sharksdesign_social_icon_color','#ffffff')); ?>;
			border-color: <?php echo esc_attr(get_theme_mod('sharksdesign_social_icon_bg_color','#16181c')); ?>;
		}
		a.social_icon i:hover{
			background-color: <?php echo esc_attr(get_theme_mod('sharksdesign_social_icon_bg_hover_color','#c4cfde')); ?>;
			color: <?php echo esc_attr(get_theme_mod('sharksdesign_social_icon_hover_color','#212428')); ?>;
			border-color: <?php echo esc_attr(get_theme_mod('sharksdesign_social_icon_bg_hover_color','#c4cfde')); ?>;
		}
		.sharksdesign_container_data {
		    background-color: <?php echo esc_attr(get_theme_mod('sharksdesign_container_bg_color','#16181c')); ?>;
		    color: <?php echo esc_attr(get_theme_mod('sharksdesign_container_text_color','#ffffff')); ?>;
		}
		.main_containor.grid_view{
		    display: grid;
		    grid-template-columns: repeat(<?php echo esc_attr(get_theme_mod('sharksdesign_container_grid_view_col','3'));?>, 1fr);
		    grid-column-gap :<?php echo esc_attr(get_theme_mod('sharksdesign_container_grid_view_col_gap','20'));?>px;
		}
		.blog .sharksdesign_container_info.content_width.grid_view .main_containor.grid_view article{
			background-color: <?php echo esc_attr(get_theme_mod('sharksdesign_boxed_container_bg_color','#212428')); ?>;
			margin-bottom: 20px;
		}
		.blog main#primary {
		    background: none;
		}
		.blog .sharksdesign_container_info.content_width.list_view .main_containor.list_view article {		    
		    background-color: <?php echo esc_attr(get_theme_mod('sharksdesign_boxed_container_bg_color','#212428')); ?>;
			margin-bottom: 20px;
		}
		.current-menu-ancestor > a, .current-menu-item > a, .current_page_item > a {
			color: <?php echo esc_attr(get_theme_mod('header_menu_active_color','#ffffff')); ?> !important;
		}
		.main-navigation .nav-menu ul.sub-menu{
			background-color: <?php echo esc_attr(get_theme_mod('header_desktop_submenu_bg_color','#ffffff')); ?>;
		}
		.main-navigation ul ul a{
			color: <?php echo esc_attr(get_theme_mod('header_desktop_submenu_text_color','#212428')); ?> !important;
		}
		.main_site_header.is-sticky-menu {
		    background-color: <?php echo esc_attr(get_theme_mod('sharksdesign_sticky_bg_color','#212428')); ?>;
		    color: <?php echo esc_attr(get_theme_mod('sharksdesign_sticky_text_color','#ffffff')); ?>;
		}
		.main_site_header.is-sticky-menu a {
		    color: <?php echo esc_attr(get_theme_mod('sharksdesign_sticky_text_color','#ffffff')); ?>;
		}
		img.custom-logo {
		    width: <?php echo esc_attr(get_theme_mod('sharksdesign_logo_width','150')); ?>px;
		}
		aside.widget-area label.wp-block-search__label, aside.widget-area section h1, aside.widget-area section h2, aside.widget-area section h3, aside.widget-area section h4, aside.widget-area section h5, aside.widget-area section h6{
			color: <?php echo esc_attr(get_theme_mod('sharksdesign_sidebar_heading_text_color','#ffffff')); ?>;
		}
		/*--------------------------------------------------------------
		# Buttons start
		--------------------------------------------------------------*/
		button, input[type="button"], input[type="reset"], input[type="submit"], .wp-block-search .wp-block-search__button,.nav-previous a, .nav-next a, .buttons, .woocommerce a.button, .woocommerce button, .woocommerce .single-product button, .woocommerce button.button.alt, .woocommerce a.button.alt, .woocommerce button.button,.woocommerce button.button.alt.disabled {
			background-color: <?php echo esc_attr(get_theme_mod('sharksdesign_button_bg_color','#212428')); ?>;
			color: <?php echo esc_attr(get_theme_mod('sharksdesign_button_text_color','#c4cfde')); ?>!important ;			
			padding: <?php echo esc_attr(get_theme_mod('sharksdesign_button_padding','10px 15px')); ?> ;
			border: <?php echo esc_attr(get_theme_mod('sharksdesign_borderwidth','2')); ?>px solid <?php echo esc_attr(get_theme_mod('sharksdesign_button_border_color','#c4cfde')); ?>;
			border-radius:  <?php echo esc_attr(get_theme_mod('sharksdesign_button_border_radius','2')); ?>px;
			transition: 0.5s all ease-in-out;
		}
		button:hover, input[type="button"]:hover , input[type="reset"]:hover , input[type="submit"]:hover , .wp-block-search .wp-block-search__button:hover, .nav-previous a:hover, .buttons:hover, .nav-next a:hover, .woocommerce a.button:hover, .woocommerce button:hover, .woocommerce .single-product button:hover, .woocommerce button.button.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button:hover, .woocommerce button.button.alt.disabled:hover{
			color: <?php echo esc_attr(get_theme_mod('sharksdesign_button_texthover_color','#212428')); ?>!important ;
			background-color: <?php echo esc_attr(get_theme_mod('sharksdesign_button_bg_hover_color','#c4cfde')); ?>;
			border: <?php echo esc_attr(get_theme_mod('sharksdesign_borderwidth','2')); ?>px solid <?php echo esc_attr(get_theme_mod('sharksdesign_button_border_hover_color','#c4cfde')); ?>;
		}

		.woocommerce .woocommerce-message {
		    border-top-color: <?php echo esc_attr(get_theme_mod('sharksdesign_button_bg_color','#212428')); ?> 
		}
		.woocommerce .woocommerce-message::before{
			color: <?php echo esc_attr(get_theme_mod('sharksdesign_button_bg_color','#212428')); ?> ;
		}
		.woocommerce .woocommerce-info, .woocommerce-noreviews, p.no-comments {
		    background-color: <?php echo esc_attr(get_theme_mod('sharksdesign_button_bg_color','#212428')); ?> ;
			color: <?php echo esc_attr(get_theme_mod('sharksdesign_button_text_color','#c4cfde')); ?> ;
		}
		/*--------------------------------------------------------------
		# Buttons ends
		--------------------------------------------------------------*/

		/*--------------------------------------------------------------
		# breadcrumb start
		--------------------------------------------------------------*/
		.breadcrumb_info{
			color: <?php echo esc_attr(get_theme_mod('sharksdesign_breadcrumb_text_color','#ffffff')); ?>;
		}
		section#breadcrumb-section a {
		    color: <?php echo esc_attr(get_theme_mod('sharksdesign_breadcrumb_link_color','#c4cfde')); ?>;
    		text-decoration: none;
    		border: 2px solid <?php echo esc_attr(get_theme_mod('sharksdesign_breadcrumb_link_color','#c4cfde')); ?>;
    		padding: 7px;
    		border-radius: 100px;
		}
		.breadcrumb_info ol.breadcrumb-list {
			background-color: <?php echo esc_attr(get_theme_mod('sharksdesign_breadcrumb_icon_background_color','#212428'));?>;
			border: 1px solid <?php echo esc_attr(get_theme_mod('sharksdesign_breadcrumb_icon_background_color','#212428'));?>;
		}
		/*--------------------------------------------------------------
		# breadcrumb end
		--------------------------------------------------------------*/

		/*--------------------------------------------------------------
		# footer start
		--------------------------------------------------------------*/
		footer#colophon{			
			color: <?php echo esc_attr(get_theme_mod('sharksdesign_footer_text_color','#ffffff')); ?>;
			/*padding: <?php echo esc_attr(get_theme_mod('sharksdesign_footer_padding','10px 10px 10px 10px')); ?>;*/
		}
		footer#colophon a{
			color: <?php echo esc_attr(get_theme_mod('sharksdesign_footer_link_color','#c4cfde')); ?>;
		}
		footer#colophon a:hover{
			color: <?php echo esc_attr(get_theme_mod('sharksdesign_footer_link_hover_color','#eeeeee')); ?>;
		}
		.scrolling-btn{
			background-color: <?php echo esc_attr(get_theme_mod('sharksdesign_scroll_button_bg_color','#212428'));?> !important;
			color: <?php echo esc_attr(get_theme_mod('sharksdesign_scroll_button_color','#c4cfde')); ?> !important;
		}
		/*--------------------------------------------------------------
		# footer end
		--------------------------------------------------------------*/

	    @media only screen and (max-width: 768px){
	    	body {
				font-size: <?php echo esc_attr(get_theme_mod('sharksdesign_mobile_font_size','14')); ?>px;
			} 
			h1{
				font-size: <?php echo esc_attr(get_theme_mod('sharksdesign_mobile_heading1_font_size','20')); ?>px;
			} 
			h2{
				font-size: <?php echo esc_attr(get_theme_mod('sharksdesign_mobile_heading2_font_size','18')); ?>px;
			}
			h3{
				font-size: <?php echo esc_attr(get_theme_mod('sharksdesign_mobile_heading3_font_size','14')); ?>px;
			}
			.mobile_menu{
				background-color: <?php echo esc_attr(get_theme_mod('header_mobile_navmenu_background_color','#16181c'));?>;
			}
			.main-navigation .sub-menu li, .main-navigation ul ul ul.toggled-on li {
		        background-color: <?php echo esc_attr(get_theme_mod('header_mobile_submenu_background_color','#c4cfde')); ?>;
		    }
		    .mobile_menu #primary-menu ul li a{
		    	color: <?php echo esc_attr(get_theme_mod('header_mobile_navmenu_color','#ffffff')); ?>;		    	
		    }
		    .current-menu-ancestor > a, .current-menu-item > a, .current_page_item > a {
			    color: <?php echo esc_attr(get_theme_mod('header_mobile_navmenu_active_color','#ffffff'));?> !important;
			}
	    }
	</style>
	<?php
}
add_action( 'wp_head', 'sharksdesign_customize_css');