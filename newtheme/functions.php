<?php
/*+++++++++++++++++++++++++++++++++++++++++++++++++++++Option Panel Function Code Starts+++++++++++++++++++++++++++++++++++++++++++++++++*/
$functions_path = get_template_directory(). '/functions/';
include_once get_template_directory(). '/functions/multi-post-thumbnails.php';
require_once($functions_path . 'admin-functions.php');	// Custom functions and plugins
require_once($functions_path . 'admin-interface.php');	// Admin Interfaces(options,framework, seo)
require_once($functions_path . 'theme-options.php'); 	// Options panel settings and custom settings
require_once($functions_path . 'default-values.php');	// Options panel settings and custom settings

/*Include library for agile crm (API)*/
require_once (get_template_directory(). '/CurlLib/curlwrap_v2.php');

function grant_theme_wp_enqueue_scripts(){
    if(!is_admin()){
        wp_enqueue_script('jquery');
        if(is_singular()and get_site_option('thread_comments')){
            wp_print_scripts('comment-reply');
			}
		}
	}
add_action('wp_enqueue_scripts','grant_theme_wp_enqueue_scripts');
function grant_theme_get_option($name){
    $options=get_option('grant_theme_options');
    if(isset($options[$name]))
        return $options[$name];
	}
function grant_theme_update_option($name,$value){
    $options=get_option('grant_theme_options');
    $options[$name]=$value;
    return update_option('grant_theme_options',$options);
	}
function grant_theme_delete_option($name){
    $options=get_option('grant_theme_options');
    unset($options[$name]);
    return update_option('grant_theme_options',$options);
	}
function get_theme_value($field){	
	$field1=grant_theme_get_option($field);
	$field_default=all_default_values($field);
	if(!empty($field1)){
		$field_val=$field1;
		}else{
		$field_val=$field_default;	
		}
	return	$field_val;
	}
	

/*++++++++++++++++++++++++++++++++++++++++++++++++++++++Option Panel Function Code Ends++++++++++++++++++++++++++++++++++++++++++++++++++*/
/*++++++++++++++++++++++++++++++++++++++++++++++++++++Theme Default Function Code Starts+++++++++++++++++++++++++++++++++++++++++++++++++*/
if(!function_exists('grant_theme_theme_setup')): 
	function grant_theme_theme_setup(){
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		register_nav_menus(array('primary'=> __('Primary Menu','grant_theme'),'secondary'=> __('Secondary Menu','grant_theme')));
		add_theme_support('html5',array('search-form','comment-form','comment-list','gallery','caption'));
		}
	endif;
add_action('after_setup_theme','grant_theme_theme_setup');
//Widget Function
if(function_exists('register_sidebar')){
	register_sidebar(array(
		'name'          => __('Location Page 1st Address Info'),
		'id'            => 'location-page-1st-address-info',
		'description'   => __('Location 1st address details appears on the location page.'),
		'before_widget' => '<div class="infobox">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
		));
	register_sidebar(array(
		'name'          => __('Location Page 1st Address Map'),
		'id'            => 'location-page-1st-address-map',
		'description'   => __('Location 1st address map appears on the location page.'),
		'before_widget' => '<div class="mapbox">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
		));
	register_sidebar(array(
		'name'          => __('Location Page 2nd Address Info'),
		'id'            => 'location-page-2nd-address-info',
		'description'   => __('Location 2nd address details appears on the location page.'),
		'before_widget' => '<div class="infobox">',
		'after_widget'  => '</div>', 
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
		));
	register_sidebar(array(
		'name'          => __('Location Page 2nd Address Map'),
		'id'            => 'location-page-2nd-address-map',
		'description'   => __('Location 2nd address map appears on the location page.'),
		'before_widget' => '<div class="mapbox">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
		));
	/*********************************************************************************/
	register_sidebar(array(
		'name'          => __('Footer Menu 1st Coloumn'),
		'id'            => 'footer-menu-1st-coloumn',
		'description'   => __('Footer menu first coloumn that appears on the footer.'),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		));
	register_sidebar(array(
		'name'          => __('Footer Menu 2nd Coloumn'),
		'id'            => 'footer-menu-2nd-coloumn',
		'description'   => __('Footer menu second coloumn that appears on the footer.'),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		));
	register_sidebar(array(
		'name'          => __('Footer Menu 3rd Coloumn'),
		'id'            => 'footer-menu-3rd-coloumn',
		'description'   => __('Footer menu third coloumn that appears on the footer.'),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		));
	register_sidebar(array(
		'name'          => __('Footer Menu 4th Coloumn'),
		'id'            => 'footer-menu-4th-coloumn',
		'description'   => __('Footer menu fourth coloumn that appears on the footer.'),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
		));
	/*********************************************************************************/
	register_sidebar(array(
		'name'          => __('Footer Contact 1st Coloumn'),
		'id'            => 'footer-contact-1st-coloumn',
		'description'   => __('Footer contact first coloumn that appears on the footer.'),
		'before_widget' => '',
		'after_widget'  => '',
		));
	register_sidebar(array(
		'name'          => __('Footer Contact 2nd Coloumn'),
		'id'            => 'footer-contact-2nd-coloumn',
		'description'   => __('Footer contact second coloumn that appears on the footer.'),
		'before_widget' => '',
		'after_widget'  => '',
		));
	register_sidebar(array(
		'name'          => __('Footer Contact 3rd Coloumn'),
		'id'            => 'footer-contact-3rd-coloumn',
		'description'   => __('Footer contact third coloumn that appears on the footer.'),
		'before_widget' => '',
		'after_widget'  => '',
		));
	register_sidebar(array(
		'name'          => __('Footer Contact 4th Coloumn'),
		'id'            => 'footer-contact-4th-coloumn',
		'description'   => __('Footer contact fourth coloumn that appears on the footer.'),
		'before_widget' => '',
		'after_widget'  => '',
		));
	}
remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');

function grant_theme_scripts(){
	//Enqueue CSS Files
	wp_enqueue_style('grant_theme-font-awesome',get_template_directory_uri().'/css/font-awesome.min.css',array());
	wp_enqueue_style('grant_theme-bootstrap-style',get_template_directory_uri().'/css/bootstrap.min.css',array());
	wp_enqueue_style('grant-bxslider-css',get_template_directory_uri().'/bxslider/jquery.bxslider.css',array());
	wp_enqueue_style('grant_theme-carousel-style',get_template_directory_uri().'/owl-carousel/owl.carousel.css',array());
	wp_enqueue_style('grant_theme-theme-style',get_template_directory_uri().'/owl-carousel/owl.theme.css',array());
	wp_enqueue_style('grant_theme-component-style',get_template_directory_uri().'/css/component.css',array());
	wp_enqueue_style('grant_theme-fancybox-style',get_template_directory_uri().'/css/jquery.fancybox.css',array());
	wp_enqueue_style('grant_theme-normalize-style',get_template_directory_uri().'/css/normalize.css',array());
	wp_enqueue_style('grant_theme-main-style',get_stylesheet_uri());
	// Load the Internet Explorer specific script.
	global $wp_scripts;
	wp_register_script('html5shiv-ie',get_template_directory_uri().'/js/html5shiv.js',array());
	wp_register_script('respond-ie',get_template_directory_uri().'/js/respond.min.js',array());
	$wp_scripts->add_data('html5shiv-ie','conditional','lt IE 9');
	$wp_scripts->add_data('respond-ie','conditional','lt IE 9');
	//Enqueue Script Files
	wp_enqueue_script('grant_theme-bootstrap-script',get_template_directory_uri().'/js/bootstrap.min.js',array('jquery'),'20160909',true);	
	wp_enqueue_script('grant_theme-modernizr-script',get_template_directory_uri().'/js/modernizr.custom.js',array('jquery'),'20160909',true);
	wp_enqueue_script('grant_theme-fancybox-script',get_template_directory_uri().'/js/jquery.fancybox.js',array('jquery'),'20160909',true);
	wp_enqueue_script('grant-bxslider-js',get_template_directory_uri().'/bxslider/jquery.bxslider.min.js',array('jquery'),'20151811',true);
	wp_enqueue_script('grant_theme-carousel-script',get_template_directory_uri().'/owl-carousel/owl.carousel.js',array('jquery'),'20160909',true);
	wp_enqueue_script('grant_theme-masonry-script',get_template_directory_uri().'/js/masonry.pkgd.min.js',array('jquery'),'20160909',true);
	wp_enqueue_script('grant_theme-imagesloaded-script',get_template_directory_uri().'/js/imagesloaded.js',array('jquery'),'20160909',true);
	wp_enqueue_script('grant_theme-classie-script',get_template_directory_uri().'/js/classie.js',array('jquery'),'20160909',true);
	wp_enqueue_script('grant_theme-AnimOnScroll-script',get_template_directory_uri().'/js/AnimOnScroll.js',array('jquery'),'20160909',true);	
	wp_enqueue_script( 'grant_theme-function-validation', get_template_directory_uri() . '/js/jquery.validate.min.js', array( 'jquery' ), '20151811', true );	
	wp_enqueue_script('grant_theme-functions-script',get_template_directory_uri().'/js/functions.js',array('jquery'),'20160909',true);
	}
add_action('wp_enqueue_scripts','grant_theme_scripts');
function legacy_comments($file){
	if(!function_exists('wp_list_comments'))
		$file=TEMPLATEPATH .'/legacy.comments.php';
		return $file;
	}    
add_filter('comments_template','legacy_comments');
/*+++++++++++++++++++++++++++++++++++++++++++++++++++++Theme Default Function Code Ends++++++++++++++++++++++++++++++++++++++++++++++++++*/
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++Atom Search Code Starts++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
function atom_search_where($where){
	global $wpdb;
	if(is_search()){
		global $recTerm ;
	    $query = "SELECT * FROM $wpdb->terms INNER JOIN $wpdb->term_taxonomy ON ($wpdb->terms.term_id = $wpdb->term_taxonomy.term_id) WHERE $wpdb->terms.name LIKE '%".get_search_query(). "%'";
		$res =  $wpdb->get_results($query);
		$recTerm = $res[0]->term_id;
		$term = get_term_by('id', $recTerm ,'fitness_product_cat');
		if($_GET['product_cat']){
			$pterm = get_term_by('slug', $_GET['product_cat'] ,'fitness_product_cat');
			if(empty($recTerm)){
				$where = "AND ($wpdb->posts.post_title LIKE '%".get_search_query(). "%') AND ($wpdb->posts.post_type = 'fitness_product') AND ($wpdb->posts.post_status = 'publish' OR $wpdb->posts.post_status = 'private') AND (tt.parent = $pterm->term_id)";
				}else if($recTerm==$pterm->term_id){
				$where = "AND ($wpdb->posts.post_title LIKE '%".get_search_query(). "%') AND ($wpdb->posts.post_type = 'fitness_product') AND ($wpdb->posts.post_status = 'publish' OR $wpdb->posts.post_status = 'private') OR (tt.parent = $pterm->term_id)";
				}else{
				$where = "AND ($wpdb->posts.post_title LIKE '%".get_search_query(). "%') AND ($wpdb->posts.post_type = 'fitness_product') AND ($wpdb->posts.post_status = 'publish' OR $wpdb->posts.post_status = 'private') OR (t.name LIKE '%".get_search_query(). "%' AND tt.parent = $pterm->term_id)";
				}
			}else{
			if($recTerm){
				if($term->parent > 0){
					$where = "AND ($wpdb->posts.post_title LIKE '%".get_search_query(). "%') AND ($wpdb->posts.post_type = 'fitness_product') AND ($wpdb->posts.post_status = 'publish' OR $wpdb->posts.post_status = 'private') OR (t.name LIKE '%".get_search_query(). "%')";
					}else{
					if($recTerm){
						$where = "AND ($wpdb->posts.post_title LIKE '%".get_search_query(). "%') AND ($wpdb->posts.post_type = 'fitness_product') AND ($wpdb->posts.post_status = 'publish' OR $wpdb->posts.post_status = 'private') OR (tt.parent = $recTerm)"; 
						}else{
						$where = "AND ($wpdb->posts.post_title LIKE '%".get_search_query(). "%') AND ($wpdb->posts.post_type = 'fitness_product') AND ($wpdb->posts.post_status = 'publish' OR $wpdb->posts.post_status = 'private')";
						}
					}
				}else{
				$where = "AND ($wpdb->posts.post_type = 'fitness_product') AND ($wpdb->posts.post_status = 'publish' OR $wpdb->posts.post_status = 'private') AND (meta_key ='brand_company_name' AND meta_value LIKE '%".get_search_query(). "%' OR meta_key ='product_sub_title' AND meta_value LIKE '%".get_search_query(). "%')";
				}
			}
		}
	return $where;
	}
add_filter('posts_where', 'atom_search_where');
function atom_search_join($join){
	global $wpdb;
	if(is_search()){
		$query_join = "SELECT * FROM $wpdb->terms INNER JOIN $wpdb->term_taxonomy ON ($wpdb->terms.term_id = $wpdb->term_taxonomy.term_id) WHERE $wpdb->terms.name LIKE '%".get_search_query(). "%'";
		$res_join =  $wpdb->get_results($query_join);
		$recTerm_join = $res_join[0]->term_id;
		if(!empty($recTerm_join)){
			$join .= "LEFT JOIN {$wpdb->term_relationships} tr ON {$wpdb->posts}.ID = tr.object_id INNER JOIN {$wpdb->term_taxonomy} tt ON tt.term_taxonomy_id=tr.term_taxonomy_id    INNER JOIN {$wpdb->terms} t ON t.term_id = tt.term_id";
			}else{
			$join .=" INNER JOIN $wpdb->postmeta ON $wpdb->posts.ID = $wpdb->postmeta.post_id";
			}
		}
	return $join;
	}
add_filter('posts_join', 'atom_search_join');
function atom_search_groupby($groupby){
	global $wpdb;
	if(is_search()){
		$groupby = "{$wpdb->posts}.ID";
		}
	return $groupby;
	}
add_filter('posts_groupby', 'atom_search_groupby'); 
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++Atom Search Code Ends++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
/*+++++++++++++++++++++++++++++++++++++++++++++++++++++Additional Function Code Starts+++++++++++++++++++++++++++++++++++++++++++++++++++*/
//Multi Post Thumbnail Begins
if(class_exists('MultiPostThumbnails')){
	$fitness_product_img = array('fitness_product','product','post');
	foreach($fitness_product_img as $fitness){
		new MultiPostThumbnails(array(
			'label' => 'Secondary Featured Image',
			'id' => 'secondary-featured-image',
			'post_type' => $fitness
			));	
		new MultiPostThumbnails(array(
			'label' => 'Product Company Logo',
			'id' => 'product-company-logo-id',
			'post_type' => $fitness
			));		
		}
	$brand_logo = array('brand_logo');
	foreach($brand_logo as $brand){
		new MultiPostThumbnails(array(
			'label' => 'Brand Logo',
			'id' => 'brand-logo-id',
			'post_type' => $brand
			));
		}
	$used_equip = array('page');
	foreach($used_equip as $usdqqp){
		new MultiPostThumbnails(array(
			'label' => 'Top Banner Image',
			'id' => 'top-banner-image',
			'post_type' => $usdqqp
			));
		}	
	}
add_image_size('used-equipment-thumb',235,165,true);
add_image_size('used-equipment-banner',1100,350,true);
//add_image_size('fitness-product-small',480);
//add_image_size('fitness-product-large',960,600,true);

add_image_size('galleryshowcase-normasmall-img',377,253,true);
add_image_size('galleryshowcase-normmedium-img',377,378,true);
add_image_size('galleryshowcase-normalarge-img',377,503,true);
add_image_size('galleryshowcase-extralarge-img',555,804,true);
//Limited Post In Archive Begins
function limit_posts_per_archive_page(){
	if(is_archive())
		$limit = 1000;
		elseif(is_search())
		$limit = 1000;
		else
		$limit = get_option('posts_per_page');
		set_query_var('posts_per_archive_page', $limit);
	}
add_filter('pre_get_posts', 'limit_posts_per_archive_page');
//Enqueue Color Picker
function colorpicker_enqueue(){
	wp_enqueue_style('wp-color-picker');
	wp_enqueue_script('colorpicker-js', get_stylesheet_directory_uri(). '/js/colorpicker.js', array('wp-color-picker'));
	}
add_action('admin_enqueue_scripts', 'colorpicker_enqueue');
//Add Color Picker To Category
function extra_fitness_product_cat_fields($tag){
	$t_id = $tag->term_id;
	$cat_meta = get_option("fitness_product_cat_$t_id");
	?>
    <tr class="form-field">
    	<th scope="row" valign="top"><label for="meta-color"><?php _e('Category Name Background Color'); ?></label></th>
        <td>
		<div id="colorpicker">
        <input type="text" name="cat_meta[catBG]" class="colorpicker"  style="width:40%;" value="<?php echo(isset($cat_meta['catBG']))? $cat_meta['catBG'] : '#e9313a'; ?>" />
        </div><br /><span class="description"><?php _e(''); ?></span><br />
        </td>
	</tr>
    <?php
	}
add_action('fitness_product_cat_add_form_fields', 'extra_fitness_product_cat_fields');
add_action('fitness_product_cat_edit_form_fields','extra_fitness_product_cat_fields');
//Save Category Meta
function save_extra_fitness_product_cat_fileds($term_id){
	if(isset($_POST['cat_meta'])){
		$t_id = $term_id;
		$cat_meta = get_option("fitness_product_cat_$t_id");
		$cat_keys = array_keys($_POST['cat_meta']);
		foreach($cat_keys as $key){
			if(isset($_POST['cat_meta'][$key])){
				$cat_meta[$key] = $_POST['cat_meta'][$key];
				}
			}
		update_option("fitness_product_cat_$t_id", $cat_meta);
		}
	}
add_action('edited_fitness_product_cat', 'save_extra_fitness_product_cat_fileds');
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++Additional Function Code Ends++++++++++++++++++++++++++++++++++++++++++++++++++++*/
/*+++++++++++++++++++++++++++++++++++++++++++++++++Brand Logo Custom Post Type Code Starts+++++++++++++++++++++++++++++++++++++++++++++++*/
add_action('init', 'create_brand_logo_post');
function create_brand_logo_post(){
	$labels = array(
		'name' => _x('Brand Logo', 'Brand Logo General Name'),
		'singular_name' => _x('Brand Logo', 'Brand Logo Singular Name'),
		'add_new' => _x('Add New', 'Add New'),
		'add_new_item' => __('Add New'),
		'edit_item' => __('Edit Brand Logo'),
		'new_item' => __('New Brand Logo'),
		'view_item' => 'View Brand Logo',
		'search_items' => __('Search Brand Logo'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
		);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,			
		'rewrite' => true,
		'menu_icon'=> 'dashicons-welcome-view-site',
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 7,
		'supports' => array('title','page-attributes')
		); 
	register_post_type('brand_logo' , $args);
	register_taxonomy(
		"brand_logo_cat", array("brand_logo"), array(
		"hierarchical" => true, 
		"label" => "Categories", 
		"singular_label" => "Categories", 
		"rewrite" => true)
		);
	register_taxonomy_for_object_type('brand_logo_cat', 'brand_logo');
	flush_rewrite_rules();
	}
/*++++++++++++++++++++++++++++++++++++++++++++++++++Brand Logo Custom Post Type Code Ends++++++++++++++++++++++++++++++++++++++++++++++++*/

/*+++++++++++++++++++++++++++++++++++++++++++++++++++Product Custom Post Type Code Starts++++++++++++++++++++++++++++++++++++++++++++++++*/
add_action('init', 'create_fitness_product_post');
function create_fitness_product_post(){
	$labels = array(
		'name' => _x('Commercial Products', 'Commercial Products General Name'),
		'singular_name' => _x('Commercial Products', 'Commercial Products Singular Name'),
		'add_new' => _x('Add New', 'Add New'),
		'add_new_item' => __('Add New'),
		'edit_item' => __('Edit Commercial Products'),
		'new_item' => __('New Commercial Products'),
		'view_item' => 'View Commercial Products',
		'search_items' => __('Search Commercial Products'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
		);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,			
		'rewrite' => array(
                'slug' => 'fitness-product'
            ),
		'menu_icon'=> 'dashicons-products',
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 7,
		'supports' => array('title', 'thumbnail', 'editor','page-attributes')
		);
	register_post_type('fitness_product' , $args);
	register_taxonomy(
		"fitness_product_cat", array("fitness_product"), array(
		"hierarchical" => true, 
		"label" => "Categories", 
		"singular_label" => "Categories", 
		'rewrite'           => array( 'slug' => 'fitness-product-cat' ),));
	register_taxonomy_for_object_type('fitness_product_cat', 'fitness_product');
	flush_rewrite_rules();
	}



/*===================================================*/
// ONLY CUSTOM TYPE POSTS
add_filter('manage_fitness_product_posts_columns', 'fitness_product_columns_head_only', 10);
add_action('manage_fitness_product_posts_custom_column', 'fitness_product_columns_content_only', 10, 2);
// CREATE TWO FUNCTIONS TO HANDLE THE COLUMN
function fitness_product_columns_head_only($defaults) {
    $defaults['fitness_product_name'] = 'Category';
    return $defaults;
}
function fitness_product_columns_content_only($column_name, $post_ID) {
	if ($column_name == 'fitness_product_name') {

			$taxonomy = 'fitness_product_cat';
			
			// get the term IDs assigned to post.
			$post_terms = wp_get_object_terms( $post_ID, $taxonomy, array( 'fields' => 'ids' ) );
			// separator between links
			$separator = ', ';
			
			if ( !empty( $post_terms ) && !is_wp_error( $post_terms ) ) {
			
			   $term_ids = implode( ',' , $post_terms );
			   $terms = wp_list_categories( 'title_li=&style=none&echo=0&taxonomy=' . $taxonomy . '&include=' . $term_ids );
			   $terms = rtrim( trim( str_replace( '<br />',  $separator, $terms ) ), $separator );
			
				// display post categories
			 echo  strip_tags($terms);
			}
	}
}

/*===============================================*/


	
/*++++++++++++++++++++++++++++++++++++++++++++++++++++Product Custom Post Type Code Ends+++++++++++++++++++++++++++++++++++++++++++++++++*/
/*+++++++++++++++++++++++++++++++++++++++++++++++Used Equipment Custom Post Type Code Starts+++++++++++++++++++++++++++++++++++++++++++++*/
add_action('init', 'create_used_equipment_post');
function create_used_equipment_post(){
	$labels = array(
		'name' => _x('Used Equipment', 'Used Equipment General Name'),
		'singular_name' => _x('Used Equipment', 'Used Equipment Singular Name'),
		'add_new' => _x('Add New', 'Add New'),
		'add_new_item' => __('Add New'),
		'edit_item' => __('Edit Used Equipment'),
		'new_item' => __('New Used Equipment'),
		'view_item' => 'View Used Equipment',
		'search_items' => __('Search Used Equipment'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
		);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,			
		'rewrite' => true,
		'menu_icon'=> 'dashicons-products',
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 7,
		'supports' => array('title', 'thumbnail')
		);
	register_post_type('used_equipment' , $args);
	register_taxonomy(
		"equipment_cat", array("used_equipment"), array(
		"hierarchical" => true, 
		"label" => "Categories", 
		"singular_label" => "Category", 
		"rewrite" => true));
	register_taxonomy_for_object_type('equipment_cat', 'used_equipment');
	register_taxonomy(
		"equipment_type", array("used_equipment"), array(
		"hierarchical" => true, 
		"label" => "Types", 
		"singular_label" => "Type", 
		"rewrite" => true));
	register_taxonomy_for_object_type('equipment_type', 'used_equipment');
	register_taxonomy(
		"equipment_location", array("used_equipment"), array(
		"hierarchical" => true, 
		"label" => "Locations", 
		"singular_label" => "Location", 
		"rewrite" => true));
	register_taxonomy_for_object_type('equipment_location', 'used_equipment');
	register_taxonomy(
		"equipment_year", array("used_equipment"), array(
		"hierarchical" => true, 
		"label" => "Years", 
		"singular_label" => "Year", 
		"rewrite" => true));
	register_taxonomy_for_object_type('equipment_year', 'used_equipment');
	register_taxonomy(
		"equipment_condition", array("used_equipment"), array(
		"hierarchical" => true, 
		"label" => "Condition", 
		"singular_label" => "Condition", 
		"rewrite" => true));
	register_taxonomy_for_object_type('equipment_condition', 'used_equipment');
	flush_rewrite_rules();
	}
/*++++++++++++++++++++++++++++++++++++++++++++++++Used Equipment Custom Post Type Code Ends++++++++++++++++++++++++++++++++++++++++++++++*/

/*++++++++++++++++++++++++++++++++++++++++++++++Gallery Showcase Custom Post Type Code Starts++++++++++++++++++++++++++++++++++++++++++++*/
add_action('init', 'create_gallery_showcase_post');
function create_gallery_showcase_post(){
	$labels = array(
		'name' => _x('Gallery Showcase', 'Gallery Showcase General Name'),
		'singular_name' => _x('Gallery Showcase', 'Gallery Showcase Singular Name'),
		'add_new' => _x('Add New', 'Add New'),
		'add_new_item' => __('Add New'),
		'edit_item' => __('Edit Gallery Showcase'),
		'new_item' => __('New Gallery Showcase'),
		'view_item' => 'View Gallery Showcase',
		'search_items' => __('Search Gallery Showcase'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
		);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,			
		'rewrite' => true,
		'menu_icon'=> 'dashicons-format-gallery',
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 7,
		'supports' => array('title', 'thumbnail', 'editor','page-attributes')
		);
	register_post_type('gallery_showcase' , $args);
	register_taxonomy(
		"gallery_showcase_cat", array("gallery_showcase"), array(
		"hierarchical" => true, 
		"label" => "Categories", 
		"singular_label" => "Categories", 
		"rewrite" => true));
	register_taxonomy_for_object_type('gallery_showcase_cat', 'gallery_showcase');
	flush_rewrite_rules();
	}
/*+++++++++++++++++++++++++++++++++++++++++++++++Gallery Showcase Custom Post Type Code Ends+++++++++++++++++++++++++++++++++++++++++++++*/

/*++++++++++++++++++++++++++++++++++++++++++++++++++++Console Post Meta Box Code Starts++++++++++++++++++++++++++++++++++++++++++++++++++*/
//hook to add a meta box
add_action('add_meta_boxes', 'set_console_post');
function set_console_post(){
	//create a custom meta box
	add_meta_box('console-meta', 'Console Post Selector', 'console_post_function', 'fitness_product', 'normal', 'high');
	}
function console_post_function($post){
	//retrieve the meta data values if they exist
	//print_r($console_post_items);

	$console_post_items = get_post_meta($post->ID, '_console_post_item', true);
	$console_post_items = explode(',',$console_post_items);
	echo 'Select Values';
	//$consolePosts = get_posts('post_type=fitness_product&posts_per_page=-1');
	$consolePosts = get_posts(array('post_type' => 'fitness_product', 'posts_per_page' => -1, 'tax_query' => array(array('taxonomy' => 'fitness_product_cat','field' => 'term_id','terms' => 43))));
	?>
    <p>Cosole Post: <br />
    <ul>
		<?php $y=1; ?>
        <?php foreach($consolePosts as $consolePost):  ?>
        <li <?php if($y%2 == 1){?>style="float:left; width:50%;"<?php }else{ ?>tyle="float:right;width:50%;"<?php } ?>><input type="checkbox" name="console_post_items[]" value="<?=$consolePost->ID?>" <?php echo(in_array($consolePost->ID, $console_post_items))? 'checked="checked"' : ''; ?> /><?=$consolePost->post_title;?>&nbsp;&nbsp;</li>
        <?php $y= $y+1; endforeach; ?>
    </ul>
    </p>
    <?php }
	//hook to save the meta box data
add_action('save_post', 'console_post_save_meta');
function console_post_save_meta($post_ID){
	global $post;
	echo $post->post_type;
	if($post->post_type == "fitness_product"){
		if(isset($_POST)){
			$choice = $_POST['console_post_items'];
			$choice_comma = implode(',',$choice);
			update_post_meta($post_ID, '_console_post_item', $choice_comma);
			}
		}
	}
/*++++++++++++++++++++++++++++++++++++++++++++++++++++Console Post Meta Box Code Ends++++++++++++++++++++++++++++++++++++++++++++++++++++*/
/*++++++++++++++++++++++++++++++++++++++++++++++++Used Equipment Price Meta Box Code Starts++++++++++++++++++++++++++++++++++++++++++++++*/
function price_section_add_meta_box(){
	$screens = array('used_equipment');
	foreach($screens as $screen){		
		add_meta_box(
			'price_section_sectionid',
			__('Price Section ', 'arc'),
			'price_section_meta_box_callback',
			$screen
			);			
		}
	}
add_action('add_meta_boxes', 'price_section_add_meta_box');
function price_section_meta_box_callback($post){
	wp_nonce_field('price_section_save_meta_box_data', 'price_section_meta_box_nonce');
	$value = get_post_meta($post->ID, '_price_section_value_key', true);
	echo '<label for="price_section_field">';
	_e('Enter Price: ', 'arc');
	echo '</label> '; ?>
	<input type="number" id="price_section_field" name="price_section_field" value="<?php echo $value; ?>"  />	
    <?php
	}
function price_section_save_meta_box_data($post_id){
	if(!isset($_POST['price_section_meta_box_nonce'])){
		return;
		}
	if(!wp_verify_nonce($_POST['price_section_meta_box_nonce'], 'price_section_save_meta_box_data')){
		return;
		}
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
		return;
		}
	if(isset($_POST['post_type']) && 'projects' == $_POST['post_type']){
		if(!current_user_can('edit_page', $post_id)){
			return;
			}
		}else{
		if(!current_user_can('edit_post', $post_id)){
			return;
			}
		}
	if(!isset($_POST['price_section_field'])){
		return;
		}
	$my_data = sanitize_text_field($_POST['price_section_field']);
	update_post_meta($post_id, '_price_section_value_key', $my_data);
	}
add_action('save_post', 'price_section_save_meta_box_data');
/*+++++++++++++++++++++++++++++++++++++++++++++++++Used Equipment Price Meta Box Code Ends+++++++++++++++++++++++++++++++++++++++++++++++*/
/*++++++++++++++++++++++++++++++++++++++++++++++Remove Taxonomy Year Default Box Code Starts+++++++++++++++++++++++++++++++++++++++++++++*/
function remove_post_custom_fields_years() {
	remove_meta_box( 'equipment_yeardiv' , 'used_equipment' , 'side' ); 
	}
add_action( 'admin_menu' , 'remove_post_custom_fields_years' );
/*+++++++++++++++++++++++++++++++++++++++++++++++Remove Taxonomy Year Default Box Code Ends++++++++++++++++++++++++++++++++++++++++++++++*/
/*++++++++++++++++++++++++++++++++++++++++++++++++Used Equipment Year Meta Box Code Starts+++++++++++++++++++++++++++++++++++++++++++++++*/
function year_section_add_meta_box(){
	$screens = array('used_equipment');
	foreach($screens as $screen){		
		add_meta_box(
			'year_section_sectionid',
			__('Year Section ', 'arc'),
			'year_section_meta_box_callback',
			$screen
			);			
		}
	}
add_action('add_meta_boxes', 'year_section_add_meta_box');
function year_section_meta_box_callback($post){
	wp_nonce_field('year_section_save_meta_box_data', 'year_section_meta_box_nonce');
	$value = get_post_meta($post->ID, '_year_section_value_key', true);
	echo '<label for="year_section_field">';
	_e('Select Year: ', 'arc');
	echo '</label> '; ?>
    <select id="year_section_field" name="year_section_field">
        <option>None</option>
        <?php
        $epmnt_year_taxmy = 'equipment_year';
        $epmnt_year_args = array('orderby' => 'name','order' => 'DESC','hide_empty' => false); 				
        $equipment_year = get_terms( $epmnt_year_taxmy , $epmnt_year_args );
        foreach($equipment_year as $minified){				
        ?>
        <option value="<?php echo $minified->slug; ?>" <?php if($value == $minified->slug){ ?> selected="selected"<?php }?>><?php echo $minified->name; ?></option>
        <?php } ?>
    </select>
    <?php
	}
function year_section_save_meta_box_data($post_id){
	if(!isset($_POST['year_section_meta_box_nonce'])){
		return;
		}
	if(!wp_verify_nonce($_POST['year_section_meta_box_nonce'], 'year_section_save_meta_box_data')){
		return;
		}
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
		return;
		}
	if(isset($_POST['post_type']) && 'projects' == $_POST['post_type']){
		if(!current_user_can('edit_page', $post_id)){
			return;
			}
		}else{
		if(!current_user_can('edit_post', $post_id)){
			return;
			}
		}
	if(!isset($_POST['year_section_field'])){
		return;
		}
	$my_data = sanitize_text_field($_POST['year_section_field']);
	update_post_meta($post_id, '_year_section_value_key', $my_data);
	}
add_action('save_post', 'year_section_save_meta_box_data');
/*++++++++++++++++++++++++++++++++++++++++++++++++Used Equipment Year Meta Box Code Starts+++++++++++++++++++++++++++++++++++++++++++++++*/
/*++++++++++++++++++++++++++++++++++++++++++++++Remove Taxonomy Condition Default Box Code Starts++++++++++++++++++++++++++++++++++++++++*/
function remove_post_custom_fields_condition() {
	remove_meta_box( 'equipment_conditiondiv' , 'used_equipment' , 'side' ); 
	}
add_action( 'admin_menu' , 'remove_post_custom_fields_condition' );
/*+++++++++++++++++++++++++++++++++++++++++++++++Remove Taxonomy Condition Default Box Code Ends+++++++++++++++++++++++++++++++++++++++++*/
/*++++++++++++++++++++++++++++++++++++++++++++++++Used Equipment Condition Meta Box Code Starts++++++++++++++++++++++++++++++++++++++++++*/
function condition_section_add_meta_box(){
	$screens = array('used_equipment');
	foreach($screens as $screen){		
		add_meta_box(
			'condition_section_sectionid',
			__('Condition Section ', 'arc'),
			'condition_section_meta_box_callback',
			$screen
			);			
		}
	}
add_action('add_meta_boxes', 'condition_section_add_meta_box');
function condition_section_meta_box_callback($post){
	wp_nonce_field('condition_section_save_meta_box_data', 'condition_section_meta_box_nonce');
	$value = get_post_meta($post->ID, '_condition_section_value_key', true);
	echo '<label for="condition_section_field">';
	_e('Select Condition: ', 'arc');
	echo '</label> '; ?>
    <select id="condition_section_field" name="condition_section_field">    
        <option>None</option>
        <?php
        $epmnt_cntn_taxmy = 'equipment_condition';
        $epmnt_cntn_args = array('orderby' => 'name','order' => 'DESC','hide_empty' => false); 				
        $equipment_cntn = get_terms( $epmnt_cntn_taxmy , $epmnt_cntn_args );
        foreach($equipment_cntn as $minified){	
			$meta = get_option('taxonomy_'.$minified->term_id);			
        ?>
        <option value="<?php echo $meta['custom_term_meta'].'_'.$minified->term_id; ?>" <?php if($value == $meta['custom_term_meta']){ ?> selected="selected"<?php }?>><?php echo $minified->name; ?></option>
        <?php } ?>    
    </select>
    <?php
	}
function condition_section_save_meta_box_data($post_id){
	if(!isset($_POST['condition_section_meta_box_nonce'])){
		return;
		}
	if(!wp_verify_nonce($_POST['condition_section_meta_box_nonce'], 'condition_section_save_meta_box_data')){
		return;
		}
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
		return;
		}
	if(isset($_POST['post_type']) && 'projects' == $_POST['post_type']){
		if(!current_user_can('edit_page', $post_id)){
			return;
			}
		}else{
		if(!current_user_can('edit_post', $post_id)){
			return;
			}
		}
	if(!isset($_POST['condition_section_field'])){
		return;
		}
	$combined_val = sanitize_text_field($_POST['condition_section_field']);
	$my_data = explode('_' , $combined_val);
	update_post_meta($post_id, '_condition_section_value_key', $my_data[0]);
	$tax_contn = get_term_by( 'id',$my_data[1], 'equipment_condition');
	wp_set_object_terms( $post_id, $tax_contn->slug, 'equipment_condition' );
	}
add_action('save_post', 'condition_section_save_meta_box_data');
/*++++++++++++++++++++++++++++++++++++++++++++++++Used Equipment Condition Meta Box Code Starts++++++++++++++++++++++++++++++++++++++++++*/
/*++++++++++++++++++++++++++++++++++++++++++++++++++Add Metabox Condition Taxonomy Code Starts+++++++++++++++++++++++++++++++++++++++++++*/
//Add Taxonomy Meta Box
function taxonomy_add_new_meta_field(){	
	?>
	<div class="form-field">
		<label for="term_meta[custom_term_meta]"><?php _e('Example meta field', 'pippin'); ?></label>
		<input type="number" name="term_meta[custom_term_meta]" id="term_meta[custom_term_meta]" value="">
		<p class="description"><?php _e('Enter a value for this field','pippin'); ?></p>
	</div>
	<?php }
add_action('equipment_condition_add_form_fields', 'taxonomy_add_new_meta_field', 10, 2);
//Edit Taxonomy Meta Box
function taxonomy_edit_meta_field($term){
	$t_id = $term->term_id;
	$term_meta = get_option("taxonomy_$t_id"); ?>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="term_meta[custom_term_meta]"><?php _e('Example meta field', 'pippin'); ?></label></th>
		<td>
			<input type="number" name="term_meta[custom_term_meta]" id="term_meta[custom_term_meta]" value="<?php echo esc_attr($term_meta['custom_term_meta'])? esc_attr($term_meta['custom_term_meta']): ''; ?>">
			<p class="description"><?php _e('Enter a value for this field','pippin'); ?></p>
		</td>
	</tr>
	<?php }
add_action('equipment_condition_edit_form_fields', 'taxonomy_edit_meta_field', 10, 2);
//Save Taxonomy Meta Box
function save_taxonomy_custom_meta($term_id){
	if(isset($_POST['term_meta'])){
		$t_id = $term_id;
		$term_meta = get_option("taxonomy_$t_id");
		$cat_keys = array_keys($_POST['term_meta']);
		foreach($cat_keys as $key){
			if(isset($_POST['term_meta'][$key])){
				$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
		update_option("taxonomy_$t_id", $term_meta);
		}
	}  
add_action('edited_equipment_condition', 'save_taxonomy_custom_meta', 10, 2);  
add_action('create_equipment_condition', 'save_taxonomy_custom_meta', 10, 2);
/*+++++++++++++++++++++++++++++++++++++++++++++++++++Add Metabox Condition Taxonomy Code Ends++++++++++++++++++++++++++++++++++++++++++++*/
function admin_custom_css(){
	global $post_type;
	echo '<style type="text/css">
		.acf_postbox .field input[type="text"], .acf_postbox .field input[type="number"], .acf_postbox .field input[type="password"], .acf_postbox .field input[type="email"], .acf_postbox .field textarea { background: #FEF9E7;}
		</style>';
	if((isset($_GET['page'])&& $_GET['page']=='optionsframework')){
		echo '<style type="text/css">
			#of_container #of-nav {width: auto !important; }
			#of_container #content {width: 79% !important;;}
			.section-info .option { display: none !important;; }
			</style>';		
		}
	}
add_action('admin_head','admin_custom_css');
add_filter( 'wpcf7_validate_configuration', '__return_false' );

/*Define Ajax Url*/
add_action('wp_enqueue_scripts', 'grant_theme_ajax_scripts');
function grant_theme_ajax_scripts(){
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-form');
	$ajaxurl = admin_url('admin-ajax.php');
	wp_localize_script('jquery-core', 'ajaxVars', array('ajaxurl' => $ajaxurl));
}

/*Contact Form Header*/
add_action('wp_ajax_nopriv_contact_form_header', 'contact_form_header_fnc');
add_action('wp_ajax_contact_form_header', 'contact_form_header_fnc');
function contact_form_header_fnc(){

    
    global $post;
    global $wpdb;
    $current_url = !empty($_POST['current_url']) ? $_POST['current_url'] : '';
    $first_name = !empty($_POST['first_name']) ? $_POST['first_name'] : '';
    $last_name = !empty($_POST['last_name']) ? $_POST['last_name'] : '';
    $email_id = !empty($_POST['email_id']) ? $_POST['email_id'] : '';
    $contact_no = !empty($_POST['contact_no']) ? $_POST['contact_no'] : '';
    $message = !empty($_POST['message']) ? $_POST['message'] : '';


    $contact_json = array(
        "tags" => array("Apple Fitness", "Header Form", "Contact Us"),
        "properties" => array(
            array(
                "name" => "first_name",
                "value" => $first_name,
                "type" => "SYSTEM"
            ),
            array(
                "name" => "last_name",
                "value" => $last_name,
                "type" => "SYSTEM"
            ),
            array(
                "name" => "website",
                "value" => $current_url,
                "type" => "SYSTEM"
            ),
            array(
                "name" => "phone",
                "value" => $contact_no,
                "type" => "SYSTEM"
            ),
            array(
                "name" => "title",
                "value" => "Apple Fitness",
                "type" => "SYSTEM"
            ),          
            array(
                "name" => "Message",
                "value" => $message,
                "type" => "CUSTOM"
            ),
            array(
                "name" => "User Email",
                "value" => $email_id,
                "type" => "CUSTOM"
            )
        )
    );

    $contact_json_input = json_encode($contact_json);
    $contact4 = curl_wrap("contacts", $contact_json_input, "POST", "application/json");
    echo $contact4;
    wp_die();
    
}
/*Contact Form Contact Page*/
add_action('wp_ajax_nopriv_page_contact_form', 'page_contact_form_fnc');
add_action('wp_ajax_page_contact_form', 'page_contact_form_fnc');
function page_contact_form_fnc(){

    
    global $post;

    $current_url = !empty($_POST['current_url']) ? $_POST['current_url'] : '';
    $first_name = !empty($_POST['first_name']) ? $_POST['first_name'] : '';
    $last_name = !empty($_POST['last_name']) ? $_POST['last_name'] : '';
    $email_id = !empty($_POST['email_id']) ? $_POST['email_id'] : '';
    $contact_no = !empty($_POST['contact_no']) ? $_POST['contact_no'] : '';
    $message = !empty($_POST['message']) ? $_POST['message'] : '';


    $contact_json = array(
        "tags" => array("Apple Fitness", "Contact Page Form", "Contact Us"),
        "properties" => array(
            array(
                "name" => "first_name",
                "value" => $first_name,
                "type" => "SYSTEM"
            ),
            array(
                "name" => "last_name",
                "value" => $last_name,
                "type" => "SYSTEM"
            ),
            array(
                "name" => "website",
                "value" => $current_url,
                "type" => "SYSTEM"
            ),
            array(
                "name" => "phone",
                "value" => $contact_no,
                "type" => "SYSTEM"
            ),
            array(
                "name" => "title",
                "value" => "Apple Fitness",
                "type" => "SYSTEM"
            ),          
            array(
                "name" => "Message",
                "value" => $message,
                "type" => "CUSTOM"
            ),
            array(
                "name" => "User Email",
                "value" => $email_id,
                "type" => "CUSTOM"
            )
        )
    );

    $contact_json_input = json_encode($contact_json);
    $contact4 = curl_wrap("contacts", $contact_json_input, "POST", "application/json");
    echo $contact4;
    wp_die();
    
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}



function limit_words($string, $word_limit)
{
    $words = explode(" ",$string);
    return implode(" ", array_splice($words, 0, $word_limit));
}



// Remove the sorting dropdown from Woocommerce
remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_catalog_ordering', 30 );
// Remove the result count from WooCommerce
remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );
// Remove the breadcrumb from WooCommerce
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );



/*Get A Quote Contact Form*/
add_action('wp_ajax_nopriv_contact_form_get_quote', 'contact_form_get_quote_fnc');
add_action('wp_ajax_contact_form_get_quote', 'contact_form_get_quote_fnc');
function contact_form_get_quote_fnc(){
    
    global $post;
    global $wpdb;
    
    $first_name = !empty($_POST['customer_first_name']) ? $_POST['customer_first_name'] : '';
    $last_name = !empty($_POST['customer_last_name']) ? $_POST['customer_last_name'] : '';
    $email_id = !empty($_POST['customer_email_id']) ? $_POST['customer_email_id'] : '';
    $contact_no = !empty($_POST['customer_contact_no']) ? $_POST['customer_contact_no'] : '';
    $customer_message = !empty($_POST['customer_message']) ? $_POST['customer_message'] : '';
    $customer_product_name = !empty($_POST['customer_product_name']) ? $_POST['customer_product_name'] : '';
    $customer_product_url = !empty($_POST['customer_product_url']) ? $_POST['customer_product_url'] : '';


    $contact_json = array(
        "tags" => array("Apple Fitness", "Get A Quote", "Contact Us"),
        "properties" => array(
            array(
                "name" => "first_name",
                "value" => $first_name,
                "type" => "SYSTEM"
            ),
            array(
                "name" => "last_name",
                "value" => $last_name,
                "type" => "SYSTEM"
            ),
            array(
                "name" => "phone",
                "value" => $contact_no,
                "type" => "SYSTEM"
            ),
            array(
                "name" => "title",
                "value" => "Apple Fitness Get A Quote",
                "type" => "SYSTEM"
            ), 
            array(
                "name" => "product_name",
                "value" => $customer_product_name,
                "type" => "CUSTOM"
            ), 
            array(
                "name" => "customer_product_url",
                "value" => $customer_product_url,
                "type" => "CUSTOM"
            ),        
            array(
                "name" => "Message",
                "value" => $customer_message,
                "type" => "CUSTOM"
            ),
            array(
                "name" => "User Email",
                "value" => $email_id,
                "type" => "CUSTOM"
            )
        )
    );

    $contact_json_input = json_encode($contact_json);
    $contact4 = curl_wrap("contacts", $contact_json_input, "POST", "application/json");
    echo $contact4;
    wp_die();
    
}


function my_header_add_to_cart_fragment( $fragments ) {
    ob_start();
    $count = WC()->cart->cart_contents_count;
    ?>
    <a href="<?php echo WC()->cart->get_cart_url(); ?>" class="cart-contents">Cart <span class="counter"><?php echo esc_html( $count ); ?></span></a>

    <?php
    $fragments['a.cart-contents'] = ob_get_clean();
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'my_header_add_to_cart_fragment' );



add_action('add_meta_boxes', 'set_product_console_post');
function set_product_console_post(){
//create a custom meta box
add_meta_box('product-console-meta', 'Console Post Selector', 'product_console_post_function', 'product', 'normal', 'high');
}
function product_console_post_function($post){
	//retrieve the meta data values if they exist
	//print_r($console_post_items);

	$console_post_items = get_post_meta($post->ID, '_console_post_item', true);
	$console_post_items = explode(',',$console_post_items);
	echo 'Select Values';
	//$consolePosts = get_posts('post_type=fitness_product&posts_per_page=-1');
	$consolePosts = get_posts(array('post_type' => 'product', 'posts_per_page' => -1, 'tax_query' => array(array('taxonomy' => 'product_cat','field' => 'term_id','terms' => 125))));
	?>
    <p>Cosole Post: <br />
    <ul>
		<?php $y=1; ?>
        <?php foreach($consolePosts as $consolePost):  ?>
        <li <?php if($y%2 != 0){?>style="float:left; width:49%;"<?php }else{ ?>tyle="float:right;width:49%;"<?php } ?>><input type="checkbox" name="console_post_items[]" value="<?=$consolePost->ID?>" <?php echo(in_array($consolePost->ID, $console_post_items))? 'checked="checked"' : ''; ?> /><?=$consolePost->post_title;?>&nbsp;&nbsp;</li>
        <?php $y++; endforeach; ?>
    </ul>
    <div style="clear:both"></div>
    </p>
    <?php }
	//hook to save the meta box data
add_action('save_post', 'product_console_post_save_meta');
function product_console_post_save_meta($post_ID){
	global $post;
	echo $post->post_type;
	if($post->post_type == "product"){
		if(isset($_POST)){
			$choice = $_POST['console_post_items'];
			$choice_comma = implode(',',$choice);
			update_post_meta($post_ID, '_console_post_item', $choice_comma);
			}
		}
	}


function custom_download_my_account_menu_items( $items ) {
    unset($items['downloads']);
    return $items;
}
add_filter( 'woocommerce_account_menu_items', 'custom_download_my_account_menu_items' );




function wc_sell_only_states( $states ) {
	$states['CA'] = array(
		'AB' => __( 'Alberta', 'woocommerce' ),
		'BC' => __( 'British Columbia', 'woocommerce' ),
		'SK' => __( 'Saskatchewan', 'woocommerce' ),
	);
	return $states;
}
add_filter( 'woocommerce_states', 'wc_sell_only_states' );