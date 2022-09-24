<?php
/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 */

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 *
	 * @since Lyceum Lite 1.0
	 *
	 * @return void
	 */
	function lyceum_lite_register_block_styles() {
		// Columns: Overlap.
		register_block_style(
			'core/columns',
			array(
				'name'  => 'lyceum-lite-columns-overlap',
				'label' => esc_html__( 'Overlap', 'lyceum-lite' ),
			)
		);

		// Cover: Borders.
		register_block_style(
			'core/cover',
			array(
				'name'  => 'lyceum-lite-border',
				'label' => esc_html__( 'Borders', 'lyceum-lite' ),
			)
		);

		// Group: Borders.
		register_block_style(
			'core/group',
			array(
				'name'  => 'lyceum-lite-border',
				'label' => esc_html__( 'Borders', 'lyceum-lite' ),
			)
		);

		// Image: Borders.
		register_block_style(
			'core/image',
			array(
				'name'  => 'lyceum-lite-border',
				'label' => esc_html__( 'Borders', 'lyceum-lite' ),
			)
		);

		// Image: Frame.
		register_block_style(
			'core/image',
			array(
				'name'  => 'lyceum-lite-image-frame',
				'label' => esc_html__( 'Frame', 'lyceum-lite' ),
			)
		);

		// Latest Posts: Dividers.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'lyceum-lite-latest-posts-dividers',
				'label' => esc_html__( 'Dividers', 'lyceum-lite' ),
			)
		);

		// Latest Posts: Borders.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'lyceum-lite-latest-posts-borders',
				'label' => esc_html__( 'Borders', 'lyceum-lite' ),
			)
		);

		// Media & Text: Borders.
		register_block_style(
			'core/media-text',
			array(
				'name'  => 'lyceum-lite-border',
				'label' => esc_html__( 'Borders', 'lyceum-lite' ),
			)
		);

		// Separator: Thick.
		register_block_style(
			'core/separator',
			array(
				'name'  => 'lyceum-lite-separator-thick',
				'label' => esc_html__( 'Thick', 'lyceum-lite' ),
			)
		);

		// Social icons: Dark gray color.
		register_block_style(
			'core/social-links',
			array(
				'name'  => 'lyceum-lite-social-icons-color',
				'label' => esc_html__( 'Dark gray', 'lyceum-lite' ),
			)
		);
	}
	add_action( 'init', 'lyceum_lite_register_block_styles' );
}
