<?php


// DEBUGGING:

// function console_log( $data ){
//   echo '<script>';
//   echo 'console.log('. json_encode( $data ) .')';
//   echo '</script>';
// }




add_filter('show_admin_bar', '__return_false');

include_once('testimonials-post-types.php');

function leonlingua_theme_styles()
{
  wp_register_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1.0', 'all' );
  wp_register_style( 'fancybox', get_template_directory_uri() . '/css/jquery.fancybox.css', array(), '1.0', 'all' );
  wp_register_style( 'll-style', get_stylesheet_directory_uri() . '/style.css', array(), '1.1', 'all' );
  wp_enqueue_style( 'bootstrap' );
  wp_enqueue_style( 'dashicons' );
  wp_enqueue_style( 'fancybox');
  wp_enqueue_style( 'll-style');
}

add_action('wp_enqueue_scripts', 'leonlingua_theme_styles');



function leonlingua_theme_js()
{
  wp_register_script('jquery', get_template_directory_uri(). '/js/jquery.min.js', false, '1.8.2');
  wp_register_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js');

  wp_register_script('modernizr', get_template_directory_uri().'/js/modernizr.full.min.js');

  wp_register_script('fancybox', get_template_directory_uri().'/js/jquery.fancybox.pack.js');

  wp_register_script('leonlingua_scripts', get_stylesheet_directory_uri().'/leonlingua-scripts.js');

  wp_enqueue_script('jquery');
  wp_enqueue_script('bootstrap', array('jQuery'), '1.1', true);

  wp_enqueue_script('modernizr', array('jQuery'), '1.1', true);

  wp_enqueue_script('fancybox', array('jQuery'), '1.1', true);

  wp_enqueue_script('leonlingua_scripts', array('jQuery'), '1.1', true);
}
add_action('wp_enqueue_scripts', 'leonlingua_theme_js');


function leonlingua_register_sidebars() {
  register_sidebar(array(
    'id' => 'sidebar1',
    'name' => 'Main Sidebar',
    'description' => 'Used on blog pages.',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
    ));

  // register_sidebar(array(
  //   'id' => 'sidebar2',
  //   'name' => 'Homepage Sidebar',
  //   'description' => 'Used only on the homepage page template.',
  //   'before_widget' => '<div id="%1$s" class="widget %2$s">',
  //   'after_widget' => '</div>',
  //   'before_title' => '<h4 class="widgettitle">',
  //   'after_title' => '</h4>',
  //   ));

  register_sidebar(array(
    'id' => 'footer1',
    'name' => 'Footer 1',
    'before_widget' => '<div id="%1$s" class="widget col-lg-12 %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
    ));

  // register_sidebar(array(
  //   'id' => 'footer2',
  //   'name' => 'Footer 2',
  //   'before_widget' => '<div id="%1$s" class="widget span4 %2$s">',
  //   'after_widget' => '</div>',
  //   'before_title' => '<h4 class="widgettitle">',
  //   'after_title' => '</h4>',
  //   ));

  // register_sidebar(array(
  //   'id' => 'footer3',
  //   'name' => 'Footer 3',
  //   'before_widget' => '<div id="%1$s" class="widget span4 %2$s">',
  //   'after_widget' => '</div>',
  //   'before_title' => '<h4 class="widgettitle">',
  //   'after_title' => '</h4>',
  //   ));
}
add_action( 'widgets_init', 'leonlingua_register_sidebars' );


function leonlingua_main_nav() {
  // display the wp3 menu if available
    wp_nav_menu(
      array(
        'menu' => 'main_nav', /* menu name */
        'menu_class' => 'nav navbar-nav',
        'theme_location' => 'main_nav', /* where in the theme it's assigned */
        'container' => 'false', /* container class */
        'fallback_cb' => 'bones_main_nav_fallback', /* menu fallback */
        'depth' => '2', /* suppress lower levels for now */
        'walker' => new description_walker()
      )
    );
}

class description_walker extends Walker_Nav_Menu
{
  function start_el(&$output, $item, $depth = 0, $args = null, $current_object_id = 0)
  {
    global $wp_query;
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    $class_names = $value = '';

      // If the item has children, add the dropdown class for bootstrap
    if ( $args->has_children ) {
      $class_names = "dropdown ";
    }

    $classes = empty( $item->classes ) ? array() : (array) $item->classes;

    $class_names .= join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
    $class_names = ' class="'. esc_attr( $class_names ) . '"';

    $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
            // if the item has children add these two attributes to the anchor tag
    if ( $args->has_children ) {
      $attributes .= ' class="dropdown-toggle" data-toggle="dropdown"';
    }

    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'>';
    $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
    $item_output .= $args->link_after;
            // if the item has children add the caret just before closing the anchor tag
    if ( $args->has_children ) {
      $item_output .= '<b class="caret"></b></a>';
    }
    else{
      $item_output .= '</a>';
    }
    $item_output .= $args->after;

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }

  function start_lvl(&$output, $depth = 0, $args = null) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
  }

  function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output )
  {
    $id_field = $this->db_fields['id'];
    if ( is_object( $args[0] ) ) {
      $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
    }
    return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
  }
}


add_filter('nav_menu_css_class', 'add_active_class', 10, 4 );
function add_active_class($classes, $item, $args, $depth) {
  $is_active = FALSE;
  $is_custom_post_type = is_post_type_archive('ll_story') || is_singular('ll_story');
  if ( $item->current ||
      (
        in_array('current-menu-item', $classes)
      ) ||
      (
        in_array('current_page_parent', $classes) && !$is_custom_post_type
      ) ||
      (
        in_array('menu-item-object-ll_story', $classes) && $is_custom_post_type
      )
    )
  {
    $is_active = TRUE;
  }
  if ($is_active) {
    $classes[] = "active";
  }
  return $classes;
}



add_theme_support( 'menus' );            // wp menus
register_nav_menus(                      // wp3+ menus
  array(
    'main_nav' => 'The Main Menu',   // main nav in header
    'footer_links' => 'Footer Links' // secondary nav in footer
  )
);


function first_paragraph($content) {
  return preg_replace('/<p([^>]+)?>/', '<p$1 class="lead">', $content, 1);
}
add_filter('the_content', 'first_paragraph');



add_action( 'admin_init', 'my_tinymce_button' );

function my_tinymce_button() {
     if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
          add_filter( 'mce_buttons', 'my_register_tinymce_button' );
          add_filter( 'mce_external_plugins', 'my_add_tinymce_button' );
     }
}

function my_register_tinymce_button( $buttons ) {
     array_push( $buttons, "button_lightbox" );
     return $buttons;
}

function my_add_tinymce_button( $plugin_array ) {
     $plugin_array['my_button_script'] = get_stylesheet_directory_uri() . '/js/mybuttons.js';
     return $plugin_array;
}

add_action('admin_head', 'my_tinymce_button_styles');

function my_tinymce_button_styles() {
  echo '<style>
  i.mce-i-button_lightbox {
    font: 400 20px/1 dashicons;
    padding: 0 2px 0 0;
    vertical-align: top;
    speak: none;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    margin-left: -2px;
  }
  i.mce-i-button_lightbox:before {
      content: "\f232";
  }
  </style>';
}
