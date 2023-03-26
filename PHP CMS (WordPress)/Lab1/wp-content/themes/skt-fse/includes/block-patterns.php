<?php
/**
 * SKT FSE : Block Patterns
 *
 * @since SKT FSE 1.0
 */

function skt_fse_register_block_patterns() {
	$block_pattern_categories = array(
		'skt-fse' => array( 'label' => __( 'SKT FSE', 'skt-fse' ) ),
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	 * @since SKT FSE 1.0
	 *
	 */
	$block_pattern_categories = apply_filters( 'skt_fse_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties ); // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_pattern_category
		}
	}

	$block_patterns = array(
		'skt-fse-header',
		'skt-fse-hero-banner',
		'skt-fse-with-archive-title',
		'skt-fse-with-post-title',
		'skt-fse-section1',
		'skt-fse-section2',
		'skt-fse-services',
		'skt-fse-section6',
		'skt-fse-section11',
		'skt-fse-footer',		
	);

	/**
	 * Filters the theme block patterns.
	 *
	 * @since SKT FSE 1.0
	 * 
	 * @param array $block_patterns List of block patterns by name.
	 *
	 */
	$block_patterns = apply_filters( 'skt_fse_block_patterns', $block_patterns );

	foreach ( $block_patterns as $block_pattern ) {
		$pattern_file = get_theme_file_path( '/includes/patterns/' . $block_pattern . '.php' );

		register_block_pattern( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_pattern
			'skt-fse/' . $block_pattern,
			require $pattern_file // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		);
	}
}
add_action( 'init', 'skt_fse_register_block_patterns', 9 );
