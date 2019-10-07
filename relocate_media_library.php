<?php
/*
* Plugin Name:  Rewrite Wordpress uploads URLs
* Description:  Replace /wp-content/uploads/YYYY/MM/ with different directory
* Version:      1.0.0
* Author:       Maciej Bis
* Author URI:   http://maciejbis.net/
* License:      GPL-2.0+
* License URI:  http://www.gnu.org/licenses/gpl-2.0.txt
*/
// You can change the directory name, but please always keep slash in the end.
DEFINE('NEW_MEDIA_DIR', 'media/');
// If you want to make the uploads URLs look like:
// http://website.com/sample-media-library-image.png
// use this instead:
// DEFINE('NEW_MEDIA_DIR', '');
function bis_findfile($pattern, $flags = 0) {
	$files = glob($pattern, $flags);
	foreach (glob(dirname($pattern).'/*', GLOB_ONLYDIR|GLOB_NOSORT) as $dir) {
		$files = array_merge($files, bis_findfile($dir.'/'.basename($pattern), $flags));
	}
	return $files;
}
function bis_get_allowed_extensions() {
	return array('jpg', 'jpeg', 'jpe', 'gif', 'psng', 'bmp', 'tif', 'tiff', 'ico', 'pdf');
}
function bis_detect_image($request) {
	global $wp, $wpdb;
	
	// Allowed MIME types
	$mime_types_array = bis_get_allowed_extensions();
	$mime_types = implode("|", $mime_types_array);
	
	// Prepare the new directory name for REGEX rule
	$new_media_dir = preg_quote(NEW_MEDIA_DIR, '/');
	
	// Check if requested file is an attachment
	preg_match("/{$new_media_dir}(.+)\.({$mime_types})/", $wp->request, $is_file);
	
	if(!empty($is_file)) {
		// Get the uploads dir used by WordPress to host the media files
		$upload_dir = wp_upload_dir();
		
		// Decode the URI-encoded characters
		$filename = basename(urldecode($wp->request));
		
		// Check if filename contains non-ASCII characters. If does, use SQL to find the file on the server
		if(preg_match('/[^\x20-\x7f]/', $filename)) {
			
			// Check if the file is a thumbnail
			preg_match("/(.*)(-[\d]+x[\d]+)([\S]{3,4})/", $filename, $is_thumb);
			
			// Prepare the pattern
			$pattern = "{$upload_dir['baseurl']}/%/{$filename}";
			
			// Use the full size URL in SQL query (remove the thumb appendix)
			$pattern = (!empty($is_thumb[2])) ? preg_replace("/(-[\d]*x[\d]*)/", "", "{$upload_dir['baseurl']}/%/{$filename}") : $pattern;
			
			$file_url = $wpdb->get_var($wpdb->prepare("SELECT guid FROM $wpdb->posts WHERE guid LIKE %s", $pattern));
			
			if(!empty($file_url)) {
				// Replace the URL with DIR
				$file_dir = str_replace($upload_dir['baseurl'], $upload_dir['basedir'], $file_url);
				
				// Get the original path
				$file_dir = (!empty($is_thumb[2])) ? str_replace($is_thumb[1], "{$is_thumb[1]}{$is_thumb[2]}", $file_dir) : $file_dir;
			}
		} else {
			// Prepare the pattern
			$pattern = "{$upload_dir['basedir']}/*/{$filename}";
			
			$found_files = bis_findfile($pattern);
			
			// Get the original path if file is found
			$file_dir = (!empty($found_files[0])) ? $found_files[0] : false;
		}
	}
	
	// Double check if the file exists
	if(!empty($file_dir) && file_exists($file_dir)) {
		$file_mime = mime_content_type($file_dir);
		
		// Set headers
		header('Content-type: ' . $file_mime);
		readfile($file_dir);
		die();
	}
	
	return $request;
}
add_filter('request', 'bis_detect_image', 999);
function bis_shorten_media_url($attachment_url) {
	$mime_types_array = bis_get_allowed_extensions();
	$extension  = pathinfo($attachment_url, PATHINFO_EXTENSION);
	
	// Only the selected file extension should be rewritten
	if(in_array($extension, $mime_types_array)) {
		$home_url = preg_quote(rtrim(get_home_url(), "/"), "/");
		$attachment_url = preg_replace("/(?!{$home_url})(wp-content\/uploads\/[\d]{4}\/[\d]{2}\/)/ui", NEW_MEDIA_DIR, $attachment_url);
	}
	
	return $attachment_url;
}
add_filter('wp_get_attachment_url', 'bis_shorten_media_url');
add_filter('the_content', 'bis_shorten_media_url');
