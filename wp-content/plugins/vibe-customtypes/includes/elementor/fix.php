<?php
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if(file_exists(VIBE_PLUGIN_PATH.'../elementor/includes/frontend.php')){
	include_once VIBE_PLUGIN_PATH.'../elementor/includes/frontend.php';

	$frontend = new Frontend;
	add_action('template_redirect',array($frontend,'init'),1);	
}
