<?php
/////////////////////////////////////////////////////
//THIS SECTION CREATES NEW POST TYPES
//Custom Post Type "Kunstwerke"
add_action('init', 'create_post_type');
function create_post_type() {
	register_post_type('albertis-kunstwerke',
		array(
		'labels' => array(
			'name' => __('Kunstwerke'),
			'singular_name' => __('Kunstwerk')),
		'public'=> true,
		'has_archive'=>true,
		'rewrite'=>array('slug' => 'kunstwerke'),
	/*	'taxonomies' => array('category'), */
		'supports' => array(/*'title','categorys',*/'thumbnail')
	
		)
	);
}

//Get Post Title from custom field "bildname"
function post_title_equals_bildname($title, $post_id)
	{
		if($new_title=get_post_meta($post_id, 'bildname', true)) {
			return $new_title;
		}
		return $title;
	}
add_filter('the_title', 'post_title_equals_bildname', 10, 2);
/*
//Make Picture Upload the Featured Image of a Post
function set_bild_as_featured_image($value, $post_id, $field){
	if($value !=""){
		add_post_meta($post_id, '_thumbnail_id', $value);
	}
	return $value;
}
add_filter('acf/update_value/name=bild', 'set_bild_as_featured_image', 10, 3);
*/

//Create Custom Taxonomy "Kunstart" for Custom Post Type "Kunstwerke"
// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_kunstwerke_taxonomies', 0 );

// create taxonomy of "Kunstart" for the post type "Kunstwerk"
function create_kunstwerke_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Kunstarten', 'taxonomy general name' ),
		'singular_name'     => _x( 'Kunstart', 'taxonomy singular name' ),
	//	'search_items'      => __( '' ),
		'all_items'         => __( 'Alle Kunstarten' ),
		'parent_item'       => __( 'Übergeordnete Kunstart' ),
		'parent_item_colon' => __( 'Übergeordnete Kunstart:' ),
		'edit_item'         => __( 'Kunstart bearbeiten' ),
		'update_item'       => __( 'Kunstart aktualisieren' ),
		'add_new_item'      => __( 'Kunstart hinzufügen' ),
		'new_item_name'     => __( 'Name der Kunstart' ),
		'menu_name'         => __( 'Kunstart' ),
		'popular_items'      => null,
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => 'kunstarten',
		'rewrite'           => array( 'slug' => 'kunstart' ),
	);

	register_taxonomy( 'kunstart', 'albertis-kunstwerke' , $args );
}

function remove_custom_taxonomy_box(){
	remove_meta_box('kunstart'.'div', 'albertis-kunstwerke', 'side');

}
add_action('admin_menu', 'remove_custom_taxonomy_box');

////////////////////////////////////////////////////
//THIS SECTION MODIFIES THE ADMIN MENU AND DASHBOARD
//Change the "Howdy, admin" to something more serious
function replace_howdy($wp_admin_bar){
	$my_account=$wp_admin_bar->get_node('my-account');
	$newtitle=str_replace('Howdy,', 'Willkommen,', $my_account->title);
	$wp_admin_bar->add_node(array(
		'id'=>'my-account',
		'title'=>$newtitle,
		));
}
add_filter('admin_bar_menu', 'replace_howdy', 25);

//Add "Neues Kunstwerk" in the Top Menu Bar
function wp_admin_bar_new_item(){
	global $wp_admin_bar;
	$wp_admin_bar->add_menu(array(
		'id'=>'wp-admin-bar-new-item',
		'title'=>__("Kunstwerk hinzuf&uuml;gen"),
		'href' => admin_url( 'post-new.php?post_type=albertis-kunstwerke'),
	/*	'href'=>'http://localhost:8888/test/wp-admin/post-new.php?post_type=albertis-kunstwerke', */
		));
}
add_action('wp_before_admin_bar_render', 'wp_admin_bar_new_item');

//Chagen Logo during Login to Albertis-Eule
function albertis_custom_login(){
	echo '<style type="text/css">
	h1 a {background-image:url('.get_bloginfo('template_url').'/img/login_logo_albertis.png) !important; }
	</style>';
}
add_action('login_head', 'albertis_custom_login');

//Change Logo in Admin Dashboard to Albertis Logo
/*
function albertis_custom_dashboard_logo(){
	echo '<style type="text/css">
	h1 a {background-image:url('.get_bloginfo('template_url').'/img/dashboard_logo_albertis.png) !important; }
	</style>';
}
add_action('admin_head', 'albertis_custom_dashboard_logo'); */

//Add LandingPage to Admin Menu
/*
add_action('admin_menu', 'add_landingpage_to_dashboard');

function add_landingpage_to_dashboard(){
	add_menu_page('Landingpage', 'Landingpage', 'publish_posts', 'custompage', 'call_landingpage', plugins_url('myplugin/images/icon.png'), 6);
}

function call_landingpage(){
	echo "Hello";
}*/

///////////////////////////////////////////////////////
//THIS SECTION IS FOR TEMPLATING FUNCTIONS
//Add Navigation Menu
function register_header_menu(){
	register_nav_menu('header-menu', __('Header Menu'));
}
add_action('init', 'register_header_menu');

//SIDEBAR
if (function_exists("register_sidebar"))

//ADD FOOTER WIDGET	1
register_sidebar( array(
	'name' => __( 'First Footer Widget Area', 'albertis' ),
	'id' => 'first-footer-widget-area',
	'description' => __( 'The first footer widget area', 'albertis' ),
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h5 class="widget-title">',
	'after_title' => '</h5>',
) );

//ADD FOOTER WIDGET	2
register_sidebar( array(
	'name' => __( 'Second Footer Widget Area', 'albertis' ),
	'id' => 'second-footer-widget-area',
	'description' => __( 'The second footer widget area', 'albertis' ),
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h5 class="widget-title">',
	'after_title' => '</h5>',
) );

//ADD FOOTER WIDGET	3
register_sidebar( array(
	'name' => __( 'Third Footer Widget Area', 'albertis' ),
	'id' => 'third-footer-widget-area',
	'description' => __( 'The third footer widget area', 'albertis' ),
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h5 class="widget-title">',
	'after_title' => '</h5>',
) );

// ADDING THEME SUPPORT FOR THUMBNAILS / FEATURED IMAGES

// add_theme_support('post-thumbnails', array('post','albertis-kunstwerke'));


// Add support for Featured Images
if (function_exists('add_theme_support')) {
	add_theme_support('post-thumbnails', array( 'post', 'page', 'albertis-kunstwerke' ) );
		add_image_size( 'index-categories', '300', '200', true );
		add_image_size( 'page-single', '0', '500', false );
}

add_theme_support('search-form');


// ADDING POST THUMBNAILS TO POSTS
function InsertFeaturedImage($content) {

global $post;

$original_content = $content;

    if ( current_theme_supports( 'post-thumbnails' ) ) {
 
        if ((is_page()) || (is_single())) {
            $content = the_post_thumbnail('page-single');
            $content .= $original_content;
            } else {
            $content = the_post_thumbnail('index-categories');
            $content .= $original_content;
        }
 
    }
    return $content;
}

add_filter( 'the_content', 'InsertFeaturedImage' );

//Later on delete "Comments", "+New" for User Role Borisch 
//Also Change Logo

?>