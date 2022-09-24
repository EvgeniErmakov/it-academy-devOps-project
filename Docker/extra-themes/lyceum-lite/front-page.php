<?php
/**
 *
 * @package Lyceum Lite
 *
 */

get_header(); ?>

<?php

/**********
* Slider Sections
**********/
get_template_part('inc/slider');

/**
** Home Page Section
*/
$hidefeat = get_theme_mod('hide_featured','1');
if( $hidefeat == '' ){
	echo '<div class="featured-section"><div class="wrapper"><div class="flex flex-center">';
	for( $feat = 1; $feat<5; $feat++ ) {
		if( get_theme_mod( 'feat'.$feat,true ) !='' ){
			$feat_query = new WP_Query( array( 'page_id' => get_theme_mod( 'feat'.$feat ) ) );
			while( $feat_query->have_posts() ) : $feat_query->the_post();
				if ( has_post_thumbnail()) {
					$imgSrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumb');
					$imgUrl = $imgSrc[0];
				}else{
					$imgUrl = get_template_directory_uri().'/images/img_404.png';
				}
				
				echo '<div class="col">
					<div class="feature-box">
						<a href="'.get_the_permalink().'"></a>
						<div class="fea-icon-thumb"><img src="'.$imgUrl.'"></div>
						<div class="feat-content">
							<h4>'.get_the_title().'</h4>
							<p>'.get_the_excerpt().'</p>
						</div>
					</div>
				</div>';
				
			endwhile;
		}
	}
	echo '</div></div></div>';
}

$hideser = get_theme_mod('hide_service','1');
if( $hideser == '' ){
	$serttl = get_theme_mod('service_secttl',true);
	$holdserttl = '';
	if( !empty( $serttl ) ){
		$holdserttl = '<div class="section_head"><h2 class="section_title"><span>'.$serttl.'</span></h2></div><div class="witr_bar_inner witr_bar_innerc"></div>';
	}
	echo '<div class="services-section"><div class="wrapper">'.$holdserttl.'<div class="flex flex-center">';
	for( $ser = 1; $ser<4; $ser++ ) {
		if( get_theme_mod( 'ser'.$ser,true ) !='' ){
			$ser_query = new WP_Query( array( 'page_id' => get_theme_mod( 'ser'.$ser ) ) );
			while( $ser_query->have_posts() ) : $ser_query->the_post();
				if ( has_post_thumbnail()) {
					$imgSrc = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium');
					$imgUrl = $imgSrc[0];
				}else{
					$imgUrl = get_template_directory_uri().'/images/img_404.png';
				}
				
				echo '<div class="col"><div class="service-box"><div class="ser-icon"><img src="'.$imgUrl.'"></div><div class="ser-content"><h3><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3><p>'.get_the_excerpt().'</p>'.( get_theme_mod('service_more') != '' ? '<div class="read-more"><a href="'.get_the_permalink().'">'.get_theme_mod('service_more').'</a></div>':'').'</div></div></div>';
				
			endwhile;
		}
	}
	echo '</div></div></div>';
}
?>
<div class="main-container">
  <div class="content-area">
    <div class="middle-align content_sidebar">
        <div class="site-main" id="sitemain">
          <?php
            if ( have_posts() ) :
              // Start the Loop.
              while ( have_posts() ) : the_post();
                /*
                * Include the post format-specific template for the content. If you want to
                * use this in a child theme, then include a file called called content-___.php
                * (where ___ is the post format) and that will be used instead.
                */
                get_template_part( 'content-page', get_post_format() );

              endwhile;
                // Previous/next post navigation.
                the_posts_pagination();
                wp_reset_postdata();

              else :
                // If no content, include the "No posts found" template.
                get_template_part( 'no-results' );

            endif;
          ?>
        </div>
        <?php get_sidebar();?>
        <div class="clear"></div>
    </div>
  </div>
<?php get_footer(); ?>