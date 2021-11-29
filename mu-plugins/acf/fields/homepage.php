<?php acf_add_local_field_group(array(
	'key' => 'group_5e7cae3363c01',
	'title' => 'Homepage',
	'fields' => array(
		array(
			'key' => 'field_5f5f70a43c445',
			'label' => 'Hero',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5e7cae336b5e8',
			'label' => 'Hero Type',
			'name' => 'is_video',
			'type' => 'true_false',
			'instructions' => 'This section is shown at the top of the Homepage.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '15',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => 'Video',
			'ui_off_text' => 'Image',
		),
		array(
			'key' => 'field_5e7cae3367ff3',
			'label' => 'Slider: Image',
			'name' => 'slider_image',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5e7cae336b5e8',
						'operator' => '!=',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '85',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 1,
			'max' => 6,
			'layout' => 'block',
			'button_label' => 'Add Slide',
			'sub_fields' => array(
				array(
					'key' => 'field_5e7cae336b624',
					'label' => 'Slide Image',
					'name' => 'slide_image',
					'type' => 'image',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5e7cae336b5e8',
								'operator' => '!=',
								'value' => '1',
							),
						),
					),
					'wrapper' => array(
						'width' => '85',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'medium',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
					'default_value' => '',
				),
				array(
					'key' => 'field_5e7cfc0e1594b',
					'label' => 'Slide Title (Optional)',
					'name' => 'slide_title',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5e7cae336b5e8',
								'operator' => '!=',
								'value' => '1',
							),
						),
					),
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5e7cfc351594c',
					'label' => 'Slide Button (Optional)',
					'name' => 'slide_button',
					'type' => 'link',
					'instructions' => '"Link Text" will be shown in the button.',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5e7cae336b5e8',
								'operator' => '!=',
								'value' => '1',
							),
						),
					),
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
				),
			),
		),
		array(
			'key' => 'field_5f5a50cf7309c',
			'label' => 'Slider: Video',
			'name' => 'slider_video',
			'type' => 'group',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5e7cae336b5e8',
						'operator' => '==',
						'value' => '1',
					),
				),
			),
			'wrapper' => array(
				'width' => '85',
				'class' => '',
				'id' => '',
			),
			'layout' => 'block',
			'sub_fields' => array(
				array(
					'key' => 'field_5f5a50cf7309d',
					'label' => 'Image (Optional)',
					'name' => 'image',
					'type' => 'image',
					'instructions' => 'This image will display until the video is loaded.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'medium',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array(
					'key' => 'field_5f5a50cf7309e',
					'label' => 'webm',
					'name' => 'webm',
					'type' => 'file',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'library' => 'all',
					'min_size' => '',
					'max_size' => '',
					'mime_types' => 'webm',
				),
				array(
					'key' => 'field_5f5a50cf7309f',
					'label' => 'mp4',
					'name' => 'mp4',
					'type' => 'file',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'library' => 'all',
					'min_size' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array(
					'key' => 'field_5f85f7673d11b',
					'label' => 'Title (Optional)',
					'name' => 'slide_title',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5f85f78e3d11c',
					'label' => 'Button (Optional)',
					'name' => 'slide_button',
					'type' => 'link',
					'instructions' => '"Link Text" will be shown in the button.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
				),
			),
		),
		array(
			'key' => 'field_5e7cae3375f91',
			'label' => 'Hero Overlay',
			'name' => 'hero_overlay',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				0 => 'No Overlay',
				'0.125' => 'Extra Light Overlay',
				'0.25' => 'Light Overlay',
				'0.5' => 'Medium Overlay',
				'0.75' => 'Heavy Overlay',
			),
			'default_value' => false,
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5f5a27d7acd8b',
			'label' => 'Featured Buttons',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5fc926b0ba72a',
			'label' => 'Style',
			'name' => 'has_text_overlay',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'ui' => 1,
			'ui_on_text' => 'Complex',
			'ui_off_text' => 'Simple',
		),
		array(
			'key' => 'field_5f5a27feacd8c',
			'label' => 'Featured Buttons',
			'name' => 'featured_buttons',
			'type' => 'repeater',
			'instructions' => 'These buttons will display just below the Hero.<br />*Min: 2, Max: 4',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 2,
			'max' => 4,
			'layout' => 'block',
			'button_label' => 'Add Featured Button',
			'sub_fields' => array(
				array(
					'key' => 'field_5f5a2e09acd8d',
					'label' => 'Image',
					'name' => 'image',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'medium',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array(
					'key' => 'field_5f5a2e67acd8e',
					'label' => 'Link',
					'name' => 'link',
					'type' => 'link',
					'instructions' => '"Link Text" will be shown with the image, according to the style.',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
				),
				array(
					'key' => 'field_5fce33c5438ef',
					'label' => 'Text',
					'name' => 'text',
					'type' => 'text',
					'instructions' => 'This text will be displayed in this Featured Button.<br />*Max: 50 characters',
					'required' => 0,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5fc926b0ba72a',
								'operator' => '==',
								'value' => '1',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '50',
				),
			),
		),
		array(
			'key' => 'field_5f5a46c1acd90',
			'label' => 'Banner',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5f5a431cacd8f',
			'label' => 'Selector',
			'name' => 'banner_selector',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'mass-times' => 'Mass Times',
				'statistics' => 'Statistics',
			),
			'default_value' => 'mass-times',
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5f5a4b82acd94',
			'label' => 'Title',
			'name' => 'banner_title',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5f843e3ca87d0',
			'label' => 'Statistics',
			'name' => 'statistics',
			'type' => 'repeater',
			'instructions' => '*Max: 4',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5f5a431cacd8f',
						'operator' => '==',
						'value' => 'statistics',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 1,
			'max' => 4,
			'layout' => 'block',
			'button_label' => 'Add Statistic',
			'sub_fields' => array(
				array(
					'key' => 'field_5f843fb3a87d1',
					'label' => 'Icon',
					'name' => 'icon',
					'type' => 'font-awesome',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => '',
					),
					'icon_sets' => array(
						0 => 'fas',
						1 => 'far',
						2 => 'fab',
					),
					'custom_icon_set' => '',
					'default_label' => '',
					'default_value' => '',
					'save_format' => 'class',
					'allow_null' => 0,
					'show_preview' => 1,
					'enqueue_fa' => 0,
					'fa_live_preview' => '',
					'choices' => array(),
				),
				array(
					'key' => 'field_5f843fcaa87d2',
					'label' => 'Number',
					'name' => 'number',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '25',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_5f844527ded90',
					'label' => 'Text',
					'name' => 'text',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '50',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
		),
		array(
			'key' => 'field_5feb2398b0f60',
			'label' => 'Links (Optional)',
			'name' => 'links',
			'type' => 'repeater',
			'instructions' => 'These links—if any—appear at the bottom of this banner. *Max: 2',
			'required' => 0,
			'conditional_logic' => '',
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 2,
			'layout' => 'block',
			'button_label' => 'Add Link',
			'sub_fields' => array(
				array(
					'key' => 'field_5feb2398b0f61',
					'label' => 'Link',
					'name' => 'link',
					'type' => 'link',
					'instructions' => '"Link Text" will be displayed in the button (do NOT write in ALL CAPITALS).',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
				),
			),
		),
		array(
			'key' => 'field_5f5a46d9acd91',
			'label' => 'Background (Optional)',
			'name' => 'banner_background',
			'type' => 'image',
			'instructions' => 'Select a custom background.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5f7e01d47dd31',
			'label' => 'Text Color',
			'name' => 'banner_color',
			'type' => 'select',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'primary' => 'Primary',
				'secondary' => 'Secondary',
				'tertiary' => 'Tertiary',
				'quaternary' => 'Quaternary',
				'white' => 'White',
			),
			'default_value' => 'tertiary',
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5fe9feffb56e5',
			'label' => 'Mass Times',
			'name' => '',
			'type' => 'message',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5f5a431cacd8f',
						'operator' => '==',
						'value' => 'mass-times',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => 'Mass Times will show in this Banner. Mass Times can be edited in <strong><a href="/wp-admin/admin.php?page=theme-general-settings">Theme Settings > Mass Times &amp; Schedule</a></strong>.',
			'new_lines' => 'wpautop',
			'esc_html' => 0,
		),
		array(
			'key' => 'field_5f5a4cbcacd96',
			'label' => 'News',
			'name' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
		),
		array(
			'key' => 'field_5f5a4cc4acd97',
			'label' => 'Title',
			'name' => 'news_title',
			'type' => 'text',
			'instructions' => 'Do NOT write this in ALL CAPITALS.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5ff491e5a7aa4',
			'label' => 'Featured Post (Optional)',
			'name' => 'featured_post',
			'type' => 'post_object',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'post_type' => array(
				0 => 'post',
			),
			'taxonomy' => '',
			'allow_null' => 1,
			'multiple' => 0,
			'return_format' => 'object',
			'ui' => 1,
		),
		array(
			'key' => 'field_5f5a4d04acd99',
			'label' => 'Category (Optional)',
			'name' => 'news_category',
			'type' => 'taxonomy',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'taxonomy' => 'category',
			'field_type' => 'select',
			'allow_null' => 1,
			'add_term' => 0,
			'save_terms' => 0,
			'load_terms' => 0,
			'return_format' => 'object',
			'multiple' => 0,
		),
		array(
			'key' => 'field_5f5a4cf2acd98',
			'label' => 'Button (Optional)',
			'name' => 'news_button',
			'type' => 'link',
			'instructions' => '"Link Text" will be displayed in the button (do NOT write in ALL CAPITALS).',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'templates/page-homepage.php',
			),
		),
	),
	'menu_order' => 1,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));