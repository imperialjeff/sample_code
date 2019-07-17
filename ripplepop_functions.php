// Register RipplePop Taxonomy
function ripplepop_cat_taxonomy() {

	$labels = array(
		'name'                       => _x( 'RippleCategories', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'RippleCategory', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'RippleCategory', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'ripplepop_cat', array( 'ripplepop' ), $args );

}
add_action( 'init', 'ripplepop_cat_taxonomy', 0 );

// Register RipplePop Post Type
function ripplepop_post_type() {

	$labels = array(
		'name'                  => _x( 'RipplePops', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'RipplePop', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'RipplePops', 'text_domain' ),
		'name_admin_bar'        => __( 'RipplePop', 'text_domain' ),
		'archives'              => __( 'RipplePop Archives', 'text_domain' ),
		'attributes'            => __( 'RipplePop Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent RipplePop:', 'text_domain' ),
		'all_items'             => __( 'All RipplePops', 'text_domain' ),
		'add_new_item'          => __( 'Add New RipplePop', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New RipplePop', 'text_domain' ),
		'edit_item'             => __( 'Edit RipplePop', 'text_domain' ),
		'update_item'           => __( 'Update RipplePop', 'text_domain' ),
		'view_item'             => __( 'View RipplePop', 'text_domain' ),
		'view_items'            => __( 'View RipplePops', 'text_domain' ),
		'search_items'          => __( 'Search RipplePop', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into RipplePop', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this RipplePop', 'text_domain' ),
		'items_list'            => __( 'RipplePops list', 'text_domain' ),
		'items_list_navigation' => __( 'RipplePops list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter RipplePop list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'RipplePop', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'ripplepop_cat' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'ripplepop', $args );

}
add_action( 'init', 'ripplepop_post_type', 0 );
