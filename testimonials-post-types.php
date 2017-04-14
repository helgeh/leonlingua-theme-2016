<?php


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
