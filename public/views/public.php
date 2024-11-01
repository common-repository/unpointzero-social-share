<?php
/**
 * UPZ Social-Share
 *
 * @package   UPZ Social-Share
 * @author    UnPointZero
 * @license   GPL-2.0+
 * @link      http://www.unpointzero.com
 * @copyright 2014 UnPointZero
 */
?>

<?php

// shortcode function
function upzsocial_shortcode($atts) {
	return upzsocial_display();
}

// display with filters
function upzsocial_filter_display($content) {
	$options = 		get_option( 'upzsocial_options' );
	$content_type = $options["type_of_content"];
	$excerpt_on = $options["excerpt"];
	$content_on = $options["content"];
	$position = $options["position"];
	$excluded = $options["excludedpages"];
	empty($excluded)? $excluded=array() : $excluded;

	if((in_array(get_post_type(),$content_type)) && (($content_on && is_single()) || ($excerpt_on && !is_single())) || (in_array(get_post_type(),$content_type) && is_page()) && (!in_array(get_the_ID(), $excluded)) ) {
		if($position=="top") {
			$return = upzsocial_display().$content;
		} elseif($position=="both") {
			$return = upzsocial_display().$content.upzsocial_display();
		} else {
			$return = $content.upzsocial_display();
		}
	}
	else {
		$return = $content;
	}

	return $return;
}

// display function
function upzsocial_display() {
	$options = 		get_option( 'upzsocial_options' );
	$networks = 	$options["social_networks"];
	$style = 		$options["iconstyle"];
	$align = 		$options["iconalign"];
	$text = 		$options["text"];

	if($style!="custom") {
		$icons_path = plugins_url()."/unpointzero-social-share/assets/icons/".$style."/";
	} else {
		$icons_path = get_stylesheet_directory_uri()."/".$style."/";
	}
$return ='<ul id="upzsocial_container" class="upzsocial_icons_'.$align.'">';
	if($text!=null && $text!="") {
		$return .= '<li class="upzsocial_text">'.$text.'</li>';
	}
	foreach($networks as $network) {
		$share_url = upzsocial_list_links($network,get_the_title(),urlencode(get_permalink()));
		$return .='<li class="'.$network.'"><a onclick="javascript:window.open(this.href, \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=400,width=700\');return false;" target="_blank" rel="nofollow" href="'.$share_url.'"><img src="'.$icons_path.$network.'.png" /></a></li>';
	}
$return .='</ul>';
return $return;
}


?>