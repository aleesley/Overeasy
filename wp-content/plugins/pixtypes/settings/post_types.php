<?php
// init display options with false
$display_option = array(
	'portfolio' => false,
	'gallery'   => false
);

$options = get_option( 'pixtypes_settings' );
// go through each theme and activate portfolio post types
if ( isset( $options["themes"] ) ) {
	$theme_types = $options["themes"];
	foreach ( $theme_types as $key => $theme ) {

		$theme_name = str_replace( '_pixtypes_theme', '', $key );

		if ( isset( $theme['post_types'] ) && is_array( $theme['post_types'] ) ) {
			foreach ( $theme['post_types'] as $post_type => $post_type_args ) {
				$display_option[ str_replace( $theme_name . '_', '', $post_type ) ] = true;
			}
			$display_settings = true;
		} else {
			return array( 'type' => 'hidden' );
		}
	}
}

$options_config = array(
	'type'    => 'postbox',
	'label'   => __( 'Post Types', 'pixtypes_txtd' ),
	'options' => array()
); # config

if ( $display_option['portfolio'] ) {

	$options_config['options']['enable_portfolio']       = array(
		'label'      => __( 'Enable Portfolio', 'pixtypes_txtd' ),
		'default'    => true,
		'type'       => 'switch',
		'show_group' => 'enable_portfolio_group',
	);
	$options_config['options']['enable_portfolio_group'] = array(
		'type'    => 'group',
		'options' => array(
			'portfolio_single_item_label'             => array(
				'label'   => __( 'Single Item Label', 'pixtypes_txtd' ),
				'desc'    => __( 'Here you can change the singular label.The default is "Project"', 'pixtypes_txtd' ),
				'default' => __( 'Project', 'pixtypes_txtd' ),
				'type'    => 'text',
			),
			'portfolio_multiple_items_label'          => array(
				'label'   => __( 'Multiple Items Label (plural)', 'pixtypes_txtd' ),
				'desc'    => __( 'Here you can change the plural label.The default is "Projects"', 'pixtypes_txtd' ),
				'default' => __( 'Projects', 'pixtypes_txtd' ),
				'type'    => 'text',
			),
			'portfolio_change_single_item_slug'       => array(
				'label'      => __( 'Change Single Item Slug', 'pixtypes_txtd' ),
				'desc'       => __( 'Do you want to rewrite the single portfolio item slug?', 'pixtypes_txtd' ),
				'default'    => true,
				'type'       => 'switch',
				'show_group' => 'portfolio_change_single_item_slug_group',
			),
			'portfolio_change_single_item_slug_group' => array(
				'type'    => 'group',
				'options' => array(
					'portfolio_new_single_item_slug' => array(
						'label'   => __( 'New Single Item Slug', 'pixtypes_txtd' ),
						'desc'    => __( 'Change the single portfolio item slug as you need it.', 'pixtypes_txtd' ),
						'default' => 'project',
						'type'    => 'text',
					),
				),
			),
			'portfolio_change_archive_slug'           => array(
				'label'      => __( 'Change Archive Slug', 'pixtypes_txtd' ),
				'desc'       => __( 'Do you want to rewrite the portfolio archive slug? This will only be used if you don\'t have a page with the Portfolio template.', 'pixtypes_txtd' ),
				'default'    => false,
				'type'       => 'switch',
				'show_group' => 'portfolio_change_archive_slug_group',
			),
			'portfolio_change_archive_slug_group'     => array(
				'type'    => 'group',
				'options' => array(
					'portfolio_new_archive_slug' => array(
						'label'   => __( 'New Archive Slug', 'pixtypes_txtd' ),
						'desc'    => __( 'Change the portfolio archive slug as you need it.', 'pixtypes_txtd' ),
						'default' => 'portfolio',
						'type'    => 'text',
					),
				),
			),
		),
	);

}

if ( $display_option['gallery'] ) {

	$options_config['options']['enable_gallery']       = array(
		'label'      => __( 'Enable Gallery', 'pixtypes_txtd' ),
		'default'    => true,
		'type'       => 'switch',
		'show_group' => 'enable_gallery_group',
	);
	$options_config['options']['enable_gallery_group'] = array(
		'type'    => 'group',
		'options' => array(
			'gallery_change_single_item_slug'       => array(
				'label'      => __( 'Change Single Item Slug', 'pixtypes_txtd' ),
				'desc'       => __( 'Do you want to rewrite the single gallery item slug?', 'pixtypes_txtd' ),
				'default'    => true,
				'type'       => 'switch',
				'show_group' => 'gallery_change_single_item_slug_group',
			),
			'gallery_change_single_item_slug_group' => array(
				'type'    => 'group',
				'options' => array(
					'gallery_new_single_item_slug' => array(
						'label'   => __( 'New Single Item Slug', 'pixtypes_txtd' ),
						'desc'    => __( 'Change the single gallery item slug as you need it.', 'pixtypes_txtd' ),
						'default' => 'project',
						'type'    => 'text',
					),
				),
			),
			'gallery_change_archive_slug'           => array(
				'label'      => __( 'Change Archive Slug', 'pixtypes_txtd' ),
				'desc'       => __( 'Do you want to rewrite the gallery archive slug? This will only be used if you don\'t have a page with the gallery template.', 'pixtypes_txtd' ),
				'default'    => false,
				'type'       => 'switch',
				'show_group' => 'gallery_change_archive_slug_group',
			),
			'gallery_change_archive_slug_group'     => array(
				'type'    => 'group',
				'options' => array
				(
					'gallery_new_archive_slug' => array
					(
						'label'   => __( 'New Archive Slug', 'pixtypes_txtd' ),
						'desc'    => __( 'Change the gallery archive slug as you need it.', 'pixtypes_txtd' ),
						'default' => 'gallery',
						'type'    => 'text',
					),
				),
			),
		)
	);

}

return $options_config;