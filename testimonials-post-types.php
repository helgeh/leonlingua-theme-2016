<?php


define( 'ACF_LITE', true );
include_once('advanced-custom-fields/acf.php');


add_action( 'init', 'create_posttype' );
function create_posttype()
{
  register_post_type( 'll_story',
    array(
      'labels' => array(
        'name' => __( 'Testimonials' ),
        'singular_name' => __( 'Testimonial' ),
        'add_new_item' => __( 'Add New Testimonial' ),
        'edit_item' => __( 'Edit Testimonial' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'stories'),
      'menu_position' => 20
    )
  );
}

if (function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_testimonial',
		'title' => 'Testimonial',
		'fields' => array (
			array (
				'key' => 'field_58f0f64549a8c',
				'label' => 'Blurb',
				'name' => 'blurb',
				'type' => 'text',
				'instructions' => 'Short, expressive excerpt of a customers testimonial. Max two sentences.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => 120,
			),
			array (
				'key' => 'field_58f0f70549a8d',
				'label' => 'Content',
				'name' => 'content',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_58f0f73c49a8e',
				'label' => 'Author',
				'name' => 'author',
				'type' => 'text',
				'instructions' => 'Name of customer providing the testimonial',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_58f0f78549a8f',
				'label' => 'Featured',
				'name' => 'featured',
				'type' => 'number',
				'instructions' => 'Set a number higher than zero to make the excerpt of this testimonial go on the front page. Their order is determined by these numbers.',
				'default_value' => 0,
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'll_story',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'custom_fields',
				4 => 'discussion',
				5 => 'comments',
				6 => 'revisions',
				7 => 'slug',
				8 => 'author',
				9 => 'format',
				10 => 'featured_image',
				11 => 'categories',
				12 => 'tags',
				13 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
}