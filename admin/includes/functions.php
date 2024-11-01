<?php
function upzsocial_list_pages() {
	$pages = get_pages();
	foreach ($pages as $page) {
		$listedpages[$page->ID] = $page->post_title;
	}
	return $listedpages;
}

function upzsocial_social_networks() {
	$social = array(
			'facebook' => 'Facebook',
			'twitter' => 'Twitter',
			'google' => 'Google',
			'linkedin' => 'Linkedin',
			'pinterest' => 'Pinterest',
			'digg' => 'Digg'
		);
	return $social;
}

function upzsocial_list_styles() {
	$styles = array(
			'boxxed' => 'boxxed',
			'flatstyle' => 'flatstyle',
			'longshadow' => 'longshadow',
			'custom' => 'custom'
		);
	return $styles;
}

function list_wp_contents_types() {
	$contents = get_post_types(array('public' => true));
	return $contents;
}

?>