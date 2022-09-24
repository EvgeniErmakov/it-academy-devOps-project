<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sharksdesign
 */

$social_icon  = get_theme_mod( 'social_icon_section', 4 );
?>
<div class="topbar_info_data">
	<div class="header_topbar_info">
		<div class="header_contact_data">
			<?php if(!empty(get_theme_mod( 'sharksdesign_contact_info_number','044632353231111' ))){ ?>
				<div class="contact_info">
					<i class="fa fa-phone"></i>
					<p><?php echo esc_html(get_theme_mod( 'sharksdesign_contact_info_number','044632353231111' )); ?></p>
				</div>
			<?php } 
			if(!empty(get_theme_mod( 'sharksdesign_email_info','3235323@gmail.com' ))){ ?> 
				<div class="email_info">
					<i class="fa fa-envelope"></i>
					<p><?php echo esc_html(get_theme_mod( 'sharksdesign_email_info','3235323@gmail.com' )); ?></p>
				</div>
			<?php } ?>
		</div>		
	</div>
	<?php if(get_theme_mod( 'display_social_icon',true ) == true){ ?>
		<div class="header_social_icon">
			<div class="social_icon_info">
				<div class="social_data">
					<?php for ( $i = 1; $i <= $social_icon ; $i++ ) { ?>
						<a class="social_icon" href="<?php echo esc_attr(get_theme_mod( 'social_icon_link_'.$i ,'#'));?>" target="_blank">
							<i class="<?php echo esc_attr(get_theme_mod( 'social_icon_one_icon'.$i ,'fa fa-facebook'));?>"></i>
						</a>
					<?php } ?>
				</div>
			</div>
		</div>
	<?php } ?>
</div>