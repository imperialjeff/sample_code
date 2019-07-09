<?php

/**
 * Change upload path for GForm files
 */
// add_filter( 'gform_upload_path', 'change_upload_path', 10, 2 );
// function change_upload_path( $path_info, $form_id ) {
//    $path_info['path'] = wp_get_upload_dir()['basedir'] . '/programs';
//    $path_info['url'] = get_bloginfo('url') . '/wp-content/uploads/programs/';
//    return $path_info;
// }

/**
 * Declare Google API Key for reuse
 */
 $btm_tokens = array(
     'google_api'        => null,
     'mailjet_api'       => null,
     'mailjet_secret'    => null,
     'integ_access_key'  => null,
 );

/**
 * Change WordPress search string
 */
function wpforo_search_form( $html ) {
    $html = str_replace( 'placeholder="Search ', 'placeholder="Search', $html );
    return $html;
}
add_filter( 'get_search_form', 'wpforo_search_form' );

/**
 * Allow users to only see their uploads in the media library
 */
function my_files_only( $wp_query ) {
    if ( strpos( $_SERVER[ 'REQUEST_URI' ], '/wp-admin/upload.php' ) !== false or $wp_query->query_vars['post_type'] == 'attachment' ) {
        // if ( !current_user_can( 'level_5' ) ) {
            global $current_user;
            $wp_query->set( 'author', $current_user->id );
        // }
    }
}
add_filter('parse_query', 'my_files_only' );

// Register Custom Taxonomy
function focus_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Focuses', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Focus', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Focus', 'text_domain' ),
		'all_items'                  => __( 'All Focuses', 'text_domain' ),
		'parent_item'                => __( 'Parent Focus', 'text_domain' ),
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
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'focus', array( 'program' ), $args );

}
add_action( 'init', 'focus_taxonomy', 0 );

add_action( 'init', 'program_post_type', 0 );
// Register Custom Post Type
function program_post_type() {

	$labels = array(
		'name'                  => _x( 'Programs', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Program', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Programs', 'text_domain' ),
		'name_admin_bar'        => __( 'Program', 'text_domain' ),
		'archives'              => __( 'Program Archives', 'text_domain' ),
		'attributes'            => __( 'Program Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Program:', 'text_domain' ),
		'all_items'             => __( 'All Programs', 'text_domain' ),
		'add_new_item'          => __( 'Add New Program', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Program', 'text_domain' ),
		'edit_item'             => __( 'Edit Program', 'text_domain' ),
		'update_item'           => __( 'Update Program', 'text_domain' ),
		'view_item'             => __( 'View Program', 'text_domain' ),
		'view_items'            => __( 'View Programs', 'text_domain' ),
		'search_items'          => __( 'Search Program', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into program', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this program', 'text_domain' ),
		'items_list'            => __( 'Programs list', 'text_domain' ),
		'items_list_navigation' => __( 'Programs list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter programs list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Program', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', 'author' ),
		'taxonomies'            => array( 'focus' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-book-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'program', $args );

}

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page('BTM Settings');
	// acf_add_options_page('More Theme Settings');
}

function get_the_excerpt_max_charlength($content, $charlength) {
	$charlength++;

	if ( mb_strlen( $content ) > $charlength ) {
		$subex = mb_substr( $content, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			return mb_substr( $subex, 0, $excut );
		} else {
			return $subex;
		}
		return '[...]';
	} else {
		return $content;
	}
}

function start_end_display( $startdate, $enddate ) {
	$start_date = DateTime::createFromFormat( 'F j, Y g:i a', $startdate );
	$end_date = DateTime::createFromFormat( 'F j, Y g:i a', $enddate );

	if( $start_date->format('Y-m-d') == $end_date->format('Y-m-d') ) {
		$output .= '<strong>' . $start_date->format('F j, Y') . '</strong><br />Starts: <strong>' . $start_date->format('g:i a') . '</strong>, Ends: <strong>' . $end_date->format('g:i a') . '</strong>';
	} else {
		$output .= 'Starts: <strong>' . $start_date->format('F j, Y') . '</strong> at <strong>' . $start_date->format('g:i a') . '</strong><br />Ends: <strong>' . $end_date->format('F j, Y')  .  '</strong> at <strong>' . $end_date->format('g:i a') . '</strong>';
	}

	echo $output;
}

add_action('acf/init', 'my_acf_init');
function my_acf_init() {
	global $btm_tokens;
	acf_update_setting('google_api_key', $btm_tokens['google_api']);
}

add_action('wp_ajax_nopriv_lat_long', 'getLatLong');
add_action('wp_ajax_lat_long', 'getLatLong');
function getLatLong() {
	$LatLong = array(
		'Latitude' => $_POST['lat'],
		'Longitude' => $_POST['long'],
	);

	global $btm_tokens;
	$json = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?latlng=' . $_POST['lat'] . ',' . $_POST['long'] . '&key=' . $btm_tokens['google_api']);
	$obj = json_decode($json);

	$first_result = $obj->results;
	$first_result = (array)$first_result[0];

	echo $first_result['formatted_address'];
}

function returnLatLongValues($address){
    $address = str_replace(" ", "+", $address);
	global $btm_tokens;
    $json = file_get_contents("https://maps.google.com/maps/api/geocode/json?address=$address&key=" . $btm_tokens['google_api']);
    $json = json_decode($json);

    $lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
    $long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};

	$lat_long_val = array(
		'lat'	=> $lat,
		'long'	=> $long,
	);
    return $lat_long_val;
}

function getCityState( $lat, $long ) {
	global $btm_tokens;
    $json = file_get_contents("https://maps.google.com/maps/api/geocode/json?latlng=$lat,$long&key=" . $btm_tokens['google_api']);
    $data = json_decode($json);
	$status = $data->status;

	if( $status == "OK" ) {
		for ( $j=0; $j < count( $data->results[0]->address_components ); $j++ ) {
            $cn = array( $data->results[0]->address_components[$j]->types[0] );
            if( in_array("street_number", $cn ) ) {
                $street_num = $data->results[0]->address_components[$j]->short_name;
            }
        }

		for ( $j=0; $j < count( $data->results[0]->address_components ); $j++ ) {
            $cn = array( $data->results[0]->address_components[$j]->types[0] );
            if( in_array("route", $cn ) ) {
                $street_name = $data->results[0]->address_components[$j]->short_name;
            }
        }

		$street = $street_num . ' ' . $street_name;

		for ( $j=0; $j < count( $data->results[0]->address_components ); $j++ ) {
            $cn = array( $data->results[0]->address_components[$j]->types[0] );
            if( in_array("locality", $cn ) ) {
                $city = $data->results[0]->address_components[$j]->long_name;
            }
        }

		for ( $j=0; $j < count( $data->results[0]->address_components ); $j++ ) {
            $sn = array( $data->results[0]->address_components[$j]->types[0] );
            if( in_array("administrative_area_level_1", $sn ) ) {
                $state = $data->results[0]->address_components[$j]->short_name;
            }
        }



		for ( $j=0; $j < count( $data->results[0]->address_components ); $j++ ) {
            $sn = array( $data->results[0]->address_components[$j]->types[0] );
            if( in_array("postal_code", $sn ) ) {
                $zip = $data->results[0]->address_components[$j]->short_name;
            }
        }
     }

    // $state = $json_results['results'][0]->address_components->['administrative_area_level_1','political'];

	$city_state = array(
		'street' => $street,
		'city'	=> $city,
		'state'	=> $state,
		'zip'	=> $zip,
	);
    return $city_state;
}

function getVideoDetails($url) {
	$host = explode('.', str_replace('www.', '', strtolower(parse_url($url, PHP_URL_HOST))));
	$host = isset($host[0]) ? $host[0] : $host;
		$vimeo_api_key="591bf107bf2c906131305818a8ea9577";
		global $btm_tokens;
		$youtube_api_key = $btm_tokens['google_api'];

	switch ($host) {
		case 'vimeo':
			$video_id = substr(parse_url($url, PHP_URL_PATH), 1);
			$options = array('http' => array(
				'method'  => 'GET',
				'header' => 'Authorization: Bearer '.$vimeo_api_key
			));
			$context  = stream_context_create($options);
			$hash = json_decode(file_get_contents("https://api.vimeo.com/videos/{$video_id}",false, $context));
			return array(
					'provider'          => 'Vimeo',
					'title'             => $hash->name,
					'description'       => str_replace(array("<br>", "<br/>", "<br />"), NULL, $hash->description),
					'description_nl2br' => str_replace(array("\n", "\r", "\r\n", "\n\r"), NULL, $hash->description),
					'thumbnail'         => $hash->pictures->sizes[0]->link,
					'video'             => $hash->link,
					'embed_video'       => "https://player.vimeo.com/video/" . $video_id,
				);
			break;
		case 'youtube':
			preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $video_id);
			//preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video, $match);
			$video_id = $video_id[1];
			$hash = json_decode(file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=snippet,contentDetails&id=".$video_id."&key=".$youtube_api_key.""));
			return array(
					'provider'          => 'YouTube',
					'title'             => $hash->items[0]->snippet->title,
					'description'       => str_replace(array("", "<br/>", "<br />"), NULL, $hash->items[0]->snippet->description),
					'description_nl2br' => str_replace(array("\n", "\r", "\r\n", "\n\r"), NULL, nl2br($hash->items[0]->snippet->description)),
					'thumbnail'         => 'https://i.ytimg.com/vi/'.$hash->items[0]->id.'/default.jpg',
					'video'             => "https://www.youtube.com/watch?v=" . $hash->items[0]->id,
					'embed_video'       => "https://www.youtube.com/embed/" . $hash->items[0]->id,
				);
			break;
		case 'youtu':
			preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $video_id);
			//preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video, $match);
			$video_id = $video_id[1];
			$hash = json_decode(file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=snippet,contentDetails&id=".$video_id."&key=".$youtube_api_key.""));
			return array(
					'provider'          => 'YouTube',
					'title'             => $hash->items[0]->snippet->title,
					'description'       => str_replace(array("", "<br/>", "<br />"), NULL, $hash->items[0]->snippet->description),
					'description_nl2br' => str_replace(array("\n", "\r", "\r\n", "\n\r"), NULL, nl2br($hash->items[0]->snippet->description)),
					'thumbnail'         => 'https://i.ytimg.com/vi/'.$hash->items[0]->id.'/default.jpg',
					'video'             => "https://www.youtube.com/watch?v=" . $hash->items[0]->id,
					'embed_video'       => "https://www.youtube.com/embed/" . $hash->items[0]->id,
				);
			break;
	}
}

// check if program is expired
function is_expired( $program_id ) {
	global $wpdb;
	$date_expire = $wpdb->get_row( "SELECT `date_expire` FROM `programs_dates` WHERE `post_id` = $program_id" );

	$date_now = date("Y-m-d h:m:s");
	if ( $date_now >= $date_expire->date_expire ) {
        $is_expired = true;
    } else {
        $is_expired = false;
    }

	// $output .= '<pre class="loggedin-only" style="text-align:left;color:black;"> !! DEBUG date_expire !! <br />';
	// $output .= '$program_id => ' . $program_id . '<br />';
	// $output .= '$date_now => ' . $date_now . '<br />';
	// $output .= 'date_expire => ' . print_r( $date_expire->date_expire, true ) . '<br />';
	// $output .= '$is_expired => ' . $is_expired . '<br />';
	// $output .= '</pre>';
	// return $output;

	return $is_expired;
}

// get the program's level
function get_level( $program_id ) {
	$program_listing_level = get_field( 'program_listing_level', $program_id );

	return $program_listing_level;
}

// get the date of expiration
function get_date_expire( $program_id ) {
	global $wpdb;
	$date_expire = $wpdb->get_row( "SELECT `date_expire` FROM `programs_dates` WHERE `post_id` = $program_id" );
	return $date_expire->date_expire;
}







// add_filter( 'gform_entry_field_value', function ( $value, $field, $entry, $form ) {
//     if ( $field->get_input_type() == 'fileupload' && $field->multipleFiles && ! empty( $value ) ) { // Multi-File upload field
//         $value     = '';
//         $raw_value = rgar( $entry, $field->id );
//         $files     = empty( $raw_value ) ? array() : json_decode( $raw_value, true );
//         foreach ( $files as $file_url ) {
//             $value .= sprintf( "<a href='%s' target='_blank' title='%s'><img src='%s' width='100' /></a><br>", $file_url, __( 'Click to view', 'gravityforms' ), $file_url );
//         }
//     }
//
//     return $value;
// }, 10, 4 );

function get_cat_slug($cat_id) {
	$cat_id = (int) $cat_id;
	$category = &get_category($cat_id);
	return $category->slug;
}

function image_url_to_media_id( $imagepath ) {
	include_once( trailingslashit(ABSPATH) . 'wp-admin/includes/image.php' );

	$filetype = wp_check_filetype( basename( $imagepath ), null );
	$wp_upload_dir = wp_upload_dir();

	$attachment = array(
		'guid'           => $wp_upload_dir['url'] . '/' . basename( $imagepath ),
		'post_mime_type' => $filetype['type'],
		'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $imagepath ) ),
		'post_content'   => '',
		'post_status'    => 'inherit'
	);
	$image_array_id = wp_insert_attachment( $attachment, $imagepath, $postID );
	$attach_data = wp_generate_attachment_metadata( $image_array_id, $imagepath );
	wp_update_attachment_metadata( $image_array_id, $attach_data );

	return $image_array_id;
}



add_filter('login_redirect', 'organizer_redirect', 10, 3 );
function organizer_redirect( $url, $request, $user ){
	if( $user && is_object( $user ) && is_a( $user, 'WP_User' ) ) {
		if( $user->has_cap( 'administrator') or $user->has_cap( 'author')) {
			$url = admin_url();
		} else {
			$url = home_url('/provider-portal/');
		}
	}
	return $url;
}

add_filter('login_redirect', 'redirect_to_profile');
function redirect_to_profile() {
    $who = strtolower(sanitize_user($_POST['log']));
    $redirect_to = get_option( 'url' ) . '/provider-portal?' . $who;
    return $redirect_to;
}

add_shortcode( 'blog_grid', 'blog_grid' );
// Add Blog Grid Shortcode
function blog_grid( $atts ) {
	$atts = shortcode_atts(
		array(
			'show_feature' => 'yes',
			'grid_count' => '4',
			'excerpts' => 'yes',
		),
		$atts
	);

	$args = array(
		'post_type'              => array( 'post' ),
		'post_status'            => array( 'publish' ),
		'posts_per_page'         => '5',
	);

	$query = new WP_Query( $args );

	if ( $query->have_posts() ) {
		$grid_counter = 0;

		$grid_output .= '<div class="row blog-grid-container">';
		while ( $query->have_posts() ) {
			$query->the_post();

			if( $grid_counter == 0 ) {
				$grid_size = ' col-md-12 ';
				$grid_excerpt = excerpt( 50 );
			} else {
				$grid_size = ' col-md-6 ';
				$grid_excerpt = excerpt( 30 );
			}

			$grid_output .= '<a href="' . get_the_permalink() . '" class="blog-grid-item ' . $grid_size . '">';
			$grid_output .= '<div class="blog-grid-item-thumbnail" style="background-image:url(' . get_the_post_thumbnail_url() . ');"></div>';
			$grid_output .= '<div class="blog-grid-item-details">';
			$grid_output .= '<span class="blog-grid-item-title">' . get_the_title() . '</span>';
			$grid_output .= '<span class="blog-grid-item-date"><!-- <i class="fa fa-clock-o"></i> -->' . get_the_date() . '</span>';
			$grid_output .= '<div class="blog-grid-item-excerpt">' . $grid_excerpt . '</div>';
			$grid_output .= '</div>';
			$grid_output .= '</a>';

			$grid_counter++;
		}
		$grid_output .= '</div>';
	}

	wp_reset_postdata();

	return $grid_output;
}

function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);

      if (count($excerpt) >= $limit) {
          array_pop($excerpt);
          $excerpt = implode(" ", $excerpt) . '...';
      } else {
          $excerpt = implode(" ", $excerpt);
      }

      $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

      return $excerpt;
}

add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
  		show_admin_bar(false);
	}
}

function GeoGetCity( $GeoResponse ) {
	// $output .= '<span class="program-item-location"><strong>Location: </strong><pre>' . print_r( $GeoResponse, true ) . '</pre></span>';
	foreach( $GeoResponse['results'][0]['address_components'] as $GeoAddressComponent ) {
		foreach( $GeoAddressComponent['types'] as $GeoAddressComponent_type ) {
			if( $GeoAddressComponent_type == 'locality' ) {
				return $GeoAddressComponent['short_name'];
			}
		}
	}
}

function GeoGetState( $GeoResponse ) {
	// $output .= '<span class="program-item-location"><strong>Location: </strong><pre>' . print_r( $GeoResponse, true ) . '</pre></span>';
	foreach( $GeoResponse['results'][0]['address_components'] as $GeoAddressComponent ) {
		foreach( $GeoAddressComponent['types'] as $GeoAddressComponent_type ) {
			if( $GeoAddressComponent_type == 'administrative_area_level_1' ) {
				return $GeoAddressComponent['short_name'];
			}
		}
	}
}

add_filter( 'gform_field_value_program_location_locations', 'btm_prefill_program_location_locations' );
function btm_prefill_program_location_locations( $value ) {
	if( !empty( $_GET[ 'program_location_locations' ] ) ) {
		$locations_array = $_GET[ 'program_location_locations' ];
	    return $locations_array;
	} else {
		return null;
	}
}



function encodeURIComponent($str) {
    $revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
    return strtr(rawurlencode($str), $revert);
}

function mailjet_credentials() {
	global $btm_tokens;
	$mailjet_creds = array(
		'apiKey' 		=> $btm_tokens['mailjet_api'],
		'apiSecret' 	=> $btm_tokens['mailjet_secret'],
		'fromEmail' 	=> 'info@bostontechmom.com',
		'fromName' 		=> 'BostonTechMom',
		'TemplateID' 	=> 624654,
	);

	return $mailjet_creds;
}
use \Mailjet\Resources;

add_action( 'gform_after_submission_1', 'send_provider_activation_email', 10, 2 );
function send_provider_activation_email( $entry, $form ) {
	$mailjet_creds 	= mailjet_credentials();
	$apikey 		= $mailjet_creds['apiKey'];
	$apisecret 		= $mailjet_creds['apiSecret'];
	$mj 			= new \Mailjet\Client($apikey, $apisecret, true, ['version' => 'v3']);

	$entry_id = $entry[ 'id' ];
	global $wpdb;
	$activation_key_query = $wpdb->get_row( "SELECT `meta_value` FROM `wp_gf_entry_meta` WHERE `meta_key` = 'activation_key' AND `entry_id` = $entry_id" );
	$activation_key = $activation_key_query->meta_value;

	$FromEmail 	= $mailjet_creds['fromEmail'];
	$FromName 	= $mailjet_creds['fromName'];
	$Subject 	= get_field( 'notif_subject_1', 'option' );
	$Html_part 	= str_replace( '{{activation_link}}', get_bloginfo( 'url' ) . '?page=gf_activation&key=' . $activation_key, get_field( 'notif_1', 'option' ) );
	$Html_part 	= str_replace( '{{activation_key}}', $activation_key, $Html_part );
	$Html_part 	= str_replace( '{{username}}', $entry[ '21' ], $Html_part );
	$Email_to 	= $entry[ '21' ];
	$Name 		= $entry[ '1.3' ] . ' ' . $entry[ '1.6' ];

	$body = [
		'FromEmail' 			=> "$FromEmail",
		'FromName' 				=> "$FromName",
		'Subject' 				=> "$Subject",
		'MJ-TemplateID' 		=> $mailjet_creds['TemplateID'],
		'MJ-TemplateLanguage' 	=> true,
		'Recipients' 			=> [['Name' => $Name, 'Email' => "$Email_to"]],
		'Vars' 					=> ['mail_content' => $Html_part]
	];

	$response = $mj->post(Resources::$Email, ['body' => $body]);

}

function send_program_notification() {
	$mailjet_creds 	= mailjet_credentials();
	$apikey 		= $mailjet_creds['apiKey'];
	$apisecret 		= $mailjet_creds['apiSecret'];
	$mj 			= new \Mailjet\Client($apikey, $apisecret, true, ['version' => 'v3']);

	$current_user = wp_get_current_user();

	$FromEmail 	= $mailjet_creds['fromEmail'];
	$FromName 	= $mailjet_creds['fromName'];
	$Subject 	= get_field( 'notif_subject_2', 'option' );
	$Html_part 	= str_replace( '{{firstname}}', $current_user->user_firstname, get_field( 'notif_2', 'option' ) );
	$Email_to 	= $current_user->user_email;
	$Name 		= $current_user->user_firstname . ' ' . $current_user->user_lastname;

	$body = [
		'FromEmail' 			=> "$FromEmail",
		'FromName' 				=> "$FromName",
		'Subject' 				=> "$Subject",
		'MJ-TemplateID' 		=> $mailjet_creds['TemplateID'],
		'MJ-TemplateLanguage' 	=> true,
		'Recipients' 			=> [['Name' => $Name, 'Email' => "$Email_to"]],
		'Vars' 					=> ['mail_content' => $Html_part]
	];

	$response = $mj->post(Resources::$Email, ['body' => $body]);
}

function program_approved_notification( $ID, $post ) {
	$mailjet_creds 	= mailjet_credentials();
	$apikey 		= $mailjet_creds['apiKey'];
	$apisecret 		= $mailjet_creds['apiSecret'];
	$mj 			= new \Mailjet\Client($apikey, $apisecret, true, ['version' => 'v3']);

	$post_author 	= get_user_by( 'id', $post->post_author );

	$FromEmail 	= $mailjet_creds['fromEmail'];
	$FromName 	= $mailjet_creds['fromName'];
	$Subject 	= get_field( 'notif_subject_3', 'option' );
	$Html_part 	= str_replace( '{{firstname}}', $post_author->user_firstname, get_field( 'notif_3', 'option' ) );
	$Email_to 	= $post_author->user_email;
	$Name 		= $post_author->user_firstname . ' ' . $post_author->user_lastname;

	$body = [
		'FromEmail' 			=> "$FromEmail",
		'FromName' 				=> "$FromName",
		'Subject' 				=> "$Subject",
		'MJ-TemplateID' 		=> $mailjet_creds['TemplateID'],
		'MJ-TemplateLanguage' 	=> true,
		'Recipients' 			=> [['Name' => $Name, 'Email' => "$Email_to"]],
		'Vars' 					=> ['mail_content' => $Html_part]
	];

	$response = $mj->post(Resources::$Email, ['body' => $body]);
}
add_action( 'publish_program', 'program_approved_notification', 10, 2 );

// function program_approved_notification( $ID, $post ) {
// 	global $wpdb;
// 	$was_approved_before = $wpdb->get_row( "SELECT * FROM $wpdb->programs_dates WHERE post_id = $ID" );
//
// 	echo '<pre class="loggedin-only" style="text-align:left;color:black;"> !! DEBUG $was_approved_before !! <br />';
// 	print_r( $was_approved_before );
// 	echo '</pre>';
//
// 	if( $was_approved_before->once_approved == 0 ) {
// 		$mailjet_creds 	= mailjet_credentials();
// 		$apikey 		= $mailjet_creds['apiKey'];
// 		$apisecret 		= $mailjet_creds['apiSecret'];
// 		$mj 			= new \Mailjet\Client($apikey, $apisecret, true, ['version' => 'v3']);
//
// 		$post_author 	= get_user_by( 'id', $post->post_author );
//
// 		$FromEmail 	= $mailjet_creds['fromEmail'];
// 		$FromName 	= $mailjet_creds['fromName'];
// 		$Subject 	= get_field( 'notif_subject_3', 'option' );
// 		$Html_part 	= str_replace( '{{firstname}}', $post_author->user_firstname, get_field( 'notif_3', 'option' ) );
// 		$Email_to 	= $post_author->user_email;
// 		$Name 		= $post_author->user_firstname . ' ' . $post_author->user_lastname;
//
// 		$body = [
// 			'FromEmail' 			=> "$FromEmail",
// 			'FromName' 				=> "$FromName",
// 			'Subject' 				=> "$Subject",
// 			'MJ-TemplateID' 		=> $mailjet_creds['TemplateID'],
// 			'MJ-TemplateLanguage' 	=> true,
// 			'Recipients' 			=> [['Name' => $Name, 'Email' => "$Email_to"]],
// 			'Vars' 					=> ['mail_content' => $Html_part]
// 		];
//
// 		echo '<pre class="loggedin-only" style="text-align:left;color:black;"> !! DEBUG $body !! <br />';
// 		print_r( $body );
// 		echo '</pre>';
//
// 		$response = $mj->post(Resources::$Email, ['body' => $body]);
//
// 		echo '<pre class="loggedin-only" style="text-align:left;color:black;"> !! DEBUG $response !! <br />';
// 		print_r( $response );
// 		echo '</pre>';
//
// 		if( $response->success() ) {
// 			$wpdb->update( 'programs_dates', array( 'once_approved' => 1 ), array( 'post_id' => $ID ) );
// 		}
// 	}
// }
// add_action( 'publish_program', 'program_approved_notification', 10, 2 );

function program_rejected_notification( $post ) {
	$mailjet_creds 	= mailjet_credentials();
	$apikey 		= $mailjet_creds['apiKey'];
	$apisecret 		= $mailjet_creds['apiSecret'];
	$mj 			= new \Mailjet\Client($apikey, $apisecret, true, ['version' => 'v3']);

	$post_author = get_user_by( 'id', $post->post_author );

	$FromEmail 	= $mailjet_creds['fromEmail'];
	$FromName 	= $mailjet_creds['fromName'];
	$Subject 	= get_field( 'notif_subject_4', 'option' );
	$Html_part 	= str_replace( '{{firstname}}', $post_author->user_firstname, get_field( 'notif_4', 'option' ) );
	$Email_to 	= $post_author->user_email;
	$Name 		= $post_author->user_firstname . ' ' . $post_author->user_lastname;

	$body = [
		'FromEmail' 			=> "$FromEmail",
		'FromName' 				=> "$FromName",
		'Subject' 				=> "$Subject",
		'MJ-TemplateID' 		=> $mailjet_creds['TemplateID'],
		'MJ-TemplateLanguage' 	=> true,
		'Recipients' 			=> [['Name' => $Name, 'Email' => "$Email_to"]],
		'Vars' 					=> ['mail_content' => $Html_part]
	];

	$response = $mj->post(Resources::$Email, ['body' => $body]);
}
add_action( 'draft_program', 'program_rejected_notification', 10, 2 );

// Registering custom post status
function wpb_custom_post_status(){
    register_post_status('rejected', array(
        'label'                     => _x( 'Rejected', 'post' ),
        'public'                    => false,
        'exclude_from_search'       => false,
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'Rejected <span class="count">(%s)</span>', 'Rejected <span class="count">(%s)</span>' ),
    ) );
}
add_action( 'init', 'wpb_custom_post_status' );

function expired_post_status(){
	register_post_status( 'expired', array(
		'label'                     => 'Expired',
		'public'                    => false,
		'internal'					=> false,
		'private'					=> false,
		'exclude_from_search'       => true,
		'show_in_admin_all_list'    => true,
		'show_in_admin_status_list' => true,
		'show_in_metabox_dropdown'  => true,
		'show_in_inline_dropdown'   => true,
		'label_count'               => _n_noop( 'Expired <span class="count">(%s)</span>', 'Expired <span class="count">(%s)</span>' ),
		'post_type'                 => array( 'program' ),
	) );
}
add_action( 'init', 'expired_post_status' );

function expired_status_add_in_quick_edit() {
    echo "<script>
    jQuery(document).ready( function() {
        jQuery( 'select[name=\"_status\"]' ).append( '<option value=\"expired\">Expired</option>' );
    });
    </script>";
}
add_action('admin_footer-edit.php','expired_status_add_in_quick_edit');
function expired_status_add_in_post_page() {
    echo "<script>
    jQuery(document).ready( function() {
        jQuery( 'select[name=\"post_status\"]' ).append( '<option value=\"expired\">Expired</option>' );
    });
    </script>";
}
add_action('admin_footer-post.php', 'expired_status_add_in_post_page');
add_action('admin_footer-post-new.php', 'expired_status_add_in_post_page');

function nl2p($string, $line_breaks = false, $xml = false) {
	$string = str_replace(array('<p>', '</p>', '<br>', '<br />'), '', $string);
	if ($line_breaks == true)
		return '<p>'.preg_replace(array("/([\n]{2,})/i", "/([^>])\n([^<])/i"), array("</p>\n<p>", '$1<br'.($xml == true ? ' /' : '').'>$2'), trim($string)).'</p>';
	else
		return '<p>'.preg_replace(
		array("/([\n]{2,})/i", "/([\r\n]{3,})/i","/([^>])\n([^<])/i"),
		array("</p>\n<p>", "</p>\n<p>", '$1<br'.($xml == true ? ' /' : '').'>$2'),

		trim($string)).'</p>';
}

// add_filter( 'login_redirect', 'provider_redirects', 10, 3 );
// function provider_redirects( $redirect_to, $request, $user ) {
// 	$provider_login = get_bloginfo( 'url' ) . '/provider-login';
// 	$provider_portal = get_bloginfo( 'url' ) . '/provider-portal';
// 	$provider_pages = array(
// 		71,
// 	);
//
// 	$url = 'http://' . $_SERVER[ 'HTTP_HOST' ] . $_SERVER[ 'REQUEST_URI' ];
// 	$current_post_id = url_to_postid( $url );
//
// 	if( in_array( $current_post_id, $provider_pages ) and is_user_logged_in() ) {
// 		$redirect_to = $provider_portal;
// 		wp_safe_redirect( $redirect_to, 302 );
// 		exit;
// 	}
// 	return $redirect_to;
//
// }

add_action( 'template_redirect', 'provider_redirects' );
function provider_redirects() {
	$provider_login = get_bloginfo( 'url' ) . '/provider-login';
	$provider_portal = get_bloginfo( 'url' ) . '/provider-portal';
	$provider_pages = array(
		71,
		73
	);

	if( is_user_logged_in() and is_page( $provider_pages ) ) {
		wp_safe_redirect( $provider_portal );
		exit;
	}
}

// add_filter( 'gform_field_value', 'provider_profile_fields', 10, 6 );
// function provider_profile_fields( $value, $field, $name ) {
// 	// echo '<pre style="text-align:left;color:black;"> !! DEBUG get_user_meta($user_id, $key, $single) !! <br />';
// 	// print_r( get_current_user_id() );
// 	// echo '</pre>';
// 	$values = array(
// 		'profile_org_name'   	=> 'value one',
// 		'profile_org_website'   => 'value two',
// 		'profile_org_street' 	=> 'value three',
// 		'profile_org_street_2' 	=> 'value three',
// 		'profile_org_city' 		=> 'value three',
// 		'profile_org_state' 	=> 'value three',
// 		'profile_org_zip' 		=> 'value three',
// 		'profile_org_country' 	=> 'value three',
// 		'profile_contact_fname' => 'value three',
// 		'profile_contact_lname' => 'value three',
// 		'profile_contact_title' => 'value three',
// 		'profile_contact_phone' => 'value three',
// 		'profile_contact_email' => 'value three',
// 		'profile_contact_terms' => 'value three',
// 	);
//
//     return isset( $values[ $name ] ) ? $values[ $name ] : $value;
// }

// add_filter( 'gform_submission_data_pre_process_payment_2', 'modify_submission_data', 10, 4 );
// function modify_submission_data( $submission_data, $feed, $form, $entry ) {
// 	GFCommon::log_debug( __METHOD__ . '(): running.' );
// 	// Change 5 in the following line to the id of the field that has the total amount without discount.
// 	$total_field = rgar( $entry, '140' );
// 	GFCommon::log_debug( __METHOD__ . '(): Amount in Total field before discount: ' . $total_field );
// 	$submission_data['payment_amount'] = $total_field;
// 	GFCommon::log_debug( __METHOD__ . '(): Original Total amount passed to Stripe: ' . $submission_data['payment_amount'] );
//     return $submission_data;
// }

function setup_page_banner() {
	if( get_field( 'featured_image_banner' ) ) :
		$banner_image = get_the_post_thumbnail_url();
		$banner_output .= '<div class="fullwidth-banner row">';
		$banner_output .= '<div class="col-md-12 banner-image-container" style="background-image:url(' . $banner_image . ')">';
		if( get_field( 'banner_heading_choice' ) == 'page_title' ) :
			$banner_output .= '<h1>' . get_the_title() . '</h1>';
		endif;
		if( get_field( 'banner_heading_choice' ) == 'else' ) :
			$banner_output .= '<h1>' . get_field( 'featured_banner_heading_text' ) . '</h1>';
		endif;
		$banner_output .= '<div class="banner-overlay"></div>';
		$banner_output .= '</div></div>';
	endif;

	return $banner_output;
}
