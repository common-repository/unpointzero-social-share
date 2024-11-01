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

// share urls
function upzsocial_list_links($network,$titre="",$url) {
	$social_urls = array(
			'facebook' => 'https://www.facebook.com/sharer.php?u='.$url.'&t='.$titre,
			'twitter' => 'https://twitter.com/intent/tweet?text='.$titre.'&url='.$url,
			'google' => 'https://plus.google.com/share?url='.$url,
			'linkedin' => 'https://www.linkedin.com/shareArticle?mini=true&url='.$url.'&title='.$titre,
			'pinterest' => 'http://pinterest.com/pin/create/link/?url='.$url,
			'digg' => 'http://digg.com/submit?url='.$url.'title='.$titre
		);
	$social_url = $social_urls[$network];
	return $social_url;
}

?>