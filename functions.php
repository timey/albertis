<?php
/*
**
**THIS SECTION CREATES NEW POST TYPES
*/
//Custom Post Type "Kunstwerke" and Custom User Role to administrate only Kunstwerke

add_action('init', 'create_post_type');
function create_post_type() {

	register_post_type('albertis-kunstwerke',
		array(
		'labels' => array(
			'name' => __('Kunstwerke'),
			'singular_name' => __('Kunstwerk')),
		'public'=> true,
		'exclude_from_search'=>false,
		'publicly_queryable' =>true,
		'query_var' => true,
		'has_archive'=>true,
		'menu_position'=> 5,
		'rewrite'=>array('slug' => 'kunstwerke'),
	/*	'taxonomies' => array('category'), */
		'supports' => array(/*'title','categorys',*/'thumbnail'),
		'capability_type' => array('kunstwerk', 'kunstwerke'),
		'map_meta_cap' => true,
		'capabilities' => array(
			'edit_post' => 'edit_kunstwerk',
			'edit_posts' => 'edit_kunstwerke',
			'manage_post' => 'edit_kunstwerk',
			'manage_posts' => 'manage_kunstwerke',
			'read_kunstwerk' => 'read_kunstwerk',
			'read_kunstwerke' => 'read_kunstwerke',
			'edit_published_post' => 'edit_published_kunstwerk',
			'edit_others_posts' => 'edit_others_kunstwerke',
			'delete_post' => 'delete_kunstwerk',
			'delete_posts' => 'delete_kunstwerke',
			'delete_others_post' => 'delete_others_kunstwerk',
			'delete_others_posts' => 'delete_others_kunstwerke',
			)
	));
	
}

//CREATION OF CUSTOM USER ROLE 
add_role('albertis-redakteur', 'Albertis-Redakteur', array(
			
			'edit_kunstwerk' => true,
			'edit_kunstwerke' => true,
			'delete_kunstwerk'=> true,
			'delete_kunstwerke'=> true,
			'read_kunstwerk'=> true,
			'read_kunstwerke'=> true,
			'edit_others_kunstwerk'=> true,
			'edit_others_kunstwerke'=> true,
			'publish_kunstwerk'=> true,
			'publish_kunstwerke'=> true,
			'edit_published_kunstwerk'=> true,
			'edit_published_kunstwerke'=> true,
			'delete_published_kunstwerk'=> true,
			'delete_published_kunstwerke'=> true,
			'delete_others_kunstwerk' => true,
			'delete_others_kunstwerke' => true,
			'edit_pages'=> true,
			'publish_pages'=> true,
			'delete_pages'=> true,
			'edit_others_pages'=> true,
			'delete_others_pages'=> true,
			'delete_published_pages'=> true,
			'edit_published_pages'=> true,
			'edit_dashboard'=> true,
			'upload_files'=> true,
			'edit_files'=> true,
			'activate_plugins'=> true,
			'update_core'=> true,
			'update_plugins'=> true,
			'edit_theme_options'=>true,

			/*Caps necessary but not wanted 
			'edit_posts'=> true, */
			'edit_theme_options' => true,
			'delete_others_posts' => true,
			'edit_published_posts' => true,
			'edit_others_posts' => true,
			
	)) ; 

	$role = get_role('albertis-redakteur');
	$role->add_cap('read'); 

function add_kunstwerk_caps_to_admin(){
	$admin_role = get_role('administrator');
	$admin_role->add_cap('edit_kunstwerk');
	$admin_role->add_cap('edit_kunstwerke');
	$admin_role->add_cap('read_kunstwerk');
	$admin_role->add_cap('read_kunstwerke');
	$admin_role->add_cap('delete_kunstwerk');
	$admin_role->add_cap('delete_kunstwerke');
	$admin_role->add_cap('publish_kunstwerk');
	$admin_role->add_cap('publish_kunstwerke');
	$admin_role->add_cap('edit_others_kunstwerk');
	$admin_role->add_cap('edit_others_kunstwerke');
	$admin_role->add_cap('edit_published_kunstwerk');
	$admin_role->add_cap('edit_published_kunstwerke');
	$admin_role->add_cap('delete_published_kunstwerk');
	$admin_role->add_cap('delete_published_kunstwerke');
	$admin_role->add_cap('delete_others_kunstwerke');
	$admin_role->add_cap('delete_others_kunstwerk');
}
add_action('admin_init', 'add_kunstwerk_caps_to_admin'); 

//Create Custom Taxonomy "Kunstart" for Custom Post Type "Kunstwerke"
add_action( 'init', 'create_kunstarten_taxonomie', 0 );
// create taxonomy of "Kunstart" for the post type "Kunstwerk"
function create_kunstarten_taxonomie() {
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

//Create Custom Taxonomie "Motive" für Custom Post Type "Kunstwerke"
add_action('init', 'create_motive_taxonomie', 0);
function create_motive_taxonomie(){
	$labels = array(
		'name'              => _x( 'Motive', 'taxonomy general name' ),
		'singular_name'     => _x( 'Motiv', 'taxonomy singular name' ),
		'search_items'      => __( '' ),
		'all_items'         => __( 'Alle Motive' ),
		'edit_item'         => __( 'Motiv bearbeiten' ),
		'update_item'       => __( 'Motiv aktualisieren' ),
		'add_new_item'      => __( 'Motiv hinzufügen' ),
		'new_item_name'     => __( 'Bezeichnung des Motivs' ),
		'menu_name'         => __( 'Motive' ),
		'popular_items'      => null,
		);

	$args = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => 'motive',
		'rewrite'           => array( 'slug' => 'motive' ),
	);

	register_taxonomy( 'motive', 'albertis-kunstwerke' , $args );
}

//Remove Taxonomy-Box from BackEnd Dashboard
function remove_kunstart_taxonomy_boxes(){
	remove_meta_box('kunstart'.'div', 'albertis-kunstwerke', 'side');
}
add_action('admin_menu', 'remove_kunstart_taxonomy_boxes');

function remove_motive_taxonomy_boxes(){
	remove_meta_box('motive'.'div', 'albertis-kunstwerke', 'side');
}
add_action('add_meta_boxes', 'remove_motive_taxonomy_boxes');


/*
**
*** function is getting the meta_field "bildname" as post title
**
*/
//Save ACF field as post_title for back-end
add_action('save_post', 'change_title_albertis');
function change_title_albertis($post_id) {
	global $_POST;
	if('albertis-kunstwerke'== get_post_type())
	{
        $post_custom_title = get_post_meta($post_id,'bildname',true);
        $my_post = array();
                $my_post['ID'] = $post_id;
                $my_post['post_title'] = $post_custom_title;
remove_action('save_post', 'change_title_albertis');
                    wp_update_post( $my_post );
add_action('save_post', 'change_title_albertis');
	}
   }

//Save ACF field as post_title for front-end
add_action('acf/save_post', 'change_title_frontend_albertis');

function change_title_frontend_albertis($post_id) {
	global $_POST;
	if('albertis-kunstwerke'== get_post_type())
	{
        $post_custom_title = get_post_meta($post_id,'bildname',true);
        $my_post = array();
                $my_post['ID'] = $post_id;
                $my_post['post_title'] = $post_custom_title;
remove_action('acf/save_post', 'change_title_frontend_albertis');
                    wp_update_post( $my_post );
add_action('acf/save_post', 'change_title_frontend_albertis');
    } 
}

////////////////////////////////////////////////////
/*
*** function is getting the meta_field "bildbeschreibung" as post content
**
*/
//Save ACF field as post_content for back-end
add_action('save_post', 'change_content_albertis');
function change_content_albertis($post_id) {
	global $_POST;
	if('albertis-kunstwerke'== get_post_type())
	{
        $post_custom_content = get_post_meta($post_id,'bildbeschreibung',true);
        $my_post = array();
                $my_post['ID'] = $post_id;
                $my_post['post_content'] = $post_custom_content;
	remove_action('save_post', 'change_content_albertis');
                    wp_update_post( $my_post );
	add_action('save_post', 'change_content_albertis');
	}
	elseif('page'==get_post_type()){
		;
	}
   }

//Save ACF field as post_content for front-end
add_action('acf/save_post', 'change_content_frontend_albertis');

function change_content_frontend_albertis($post_id) {
	global $_POST;
	if('albertis-kunstwerke'== get_post_type())
	{
        $post_custom_content = get_post_meta($post_id,'bildbeschreibung',true);
        $my_post = array();
                $my_post['ID'] = $post_id;
                $my_post['post_content'] = $post_custom_content;
remove_action('acf/save_post', 'change_content_frontend_albertis');
                    wp_update_post( $my_post );
add_action('acf/save_post', 'change_content_frontend_albertis');
    } 
    elseif('page'==get_post_type()){
		;
	}
}

/*
**
** URL Rewrite for Pretty Permalinks 
** Not working yet

function filter_post_type_link($link, $post)
{
    if ($post->post_type != 'albertis-kunstwerke')
        return $link;

    if ($ak_title = get_post_meta($post->ID, 'bildname', true))
        $link = str_replace('%bildname%', array_pop($ak_title)->slug, $link);
    return $link;
}
add_filter('post_type_link', 'filter_post_type_link', 10, 2);

// Flush rewrite rules
add_action( 'init','maybe_rewrite_rules' );
function maybe_rewrite_rules() {

	$ver = filemtime( __FILE__ ); // Get the file time for this file as the version number
	$defaults = array( 'version' => 0, 'time' => time() );
	$r = wp_parse_args( get_option( __CLASS__ . '_flush', array() ), $defaults );

	if ( $r['version'] != $ver || $r['time'] + 172800 < time() ) { // Flush if ver changes or if 48hrs has passed.
		flush_rewrite_rules();
		// trace( 'flushed' );
		$args = array( 'version' => $ver, 'time' => time() );
		if ( ! update_option( __CLASS__ . '_flush', $args ) )
			add_option( __CLASS__ . '_flush', $args );
	}
}
*/

/*
**
**
**THIS SECTION MODIFIES ADMIN MENU AND DASHBOARD
*/
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

//Delete "New" and "Comments" from Admin Bar
function admin_bar_remove_links(){
	global $wp_admin_bar;
	$wp_admin_bar->remove_node('comments');
	$wp_admin_bar->remove_node('new-content');
}
add_action('wp_before_admin_bar_render', 'admin_bar_remove_links');

//Add "Neues Kunstwerk" to Top Menu Bar
function wp_admin_bar_new_item(){
	global $wp_admin_bar;
	$wp_admin_bar->add_node(array(
		'id'=>'wp-admin-bar-new-item',
		'title'=>__("Kunstwerk hinzuf&uuml;gen"),
		'href' => admin_url( 'post-new.php?post_type=albertis-kunstwerke'),
	/*	'href'=>'http://localhost:8888/test/wp-admin/post-new.php?post_type=albertis-kunstwerke', */
		));
}
add_action('wp_before_admin_bar_render', 'wp_admin_bar_new_item');

/*
/**
/**Change Logo during Login to Albertis-Eule
*/
function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo get_bloginfo( 'template_directory' ) ?>/img/login_logo_albertis.png);
            padding-bottom: 10px;
            width: 100%;
            -webkit-background-size: contain;
			-moz-background-size: contain;
			-ms-background-size: contain;
			-o-background-size: contain;
			background-size: contain;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

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
	'description' => __( 'Adressangaben', 'albertis' ),
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h5 class="widget-title">',
	'after_title' => '</h5>',
) );

//ADD FOOTER WIDGET	2
register_sidebar( array(
	'name' => __( 'Second Footer Widget Area', 'albertis' ),
	'id' => 'second-footer-widget-area',
	'description' => __( 'Hier können Sie das Zitat ändern', 'albertis' ),
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h5 class="widget-title">',
	'after_title' => '</h5>',
) );

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
?>