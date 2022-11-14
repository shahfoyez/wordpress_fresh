<?php
/**
 * FILTER functions for WPLMS
 *
 * @author      VibeThemes
 * @category    Admin
 * @package     Initialization
 * @version     2.0
 */

if ( !defined( 'ABSPATH' ) ) exit;

class WPLMS_Demo_Fixes{

    public static $instance;
    
    public static function init(){

        if ( is_null( self::$instance ) )
            self::$instance = new WPLMS_Demo_Fixes();

        return self::$instance;
    }

    private function __construct(){
    	add_action('wplms_envato_setup_design_save',array($this,'fix_demo_14_first_image'));
    	
    }

    function fix_demo_14_first_image(){
    	if(!function_exists('vibe_get_site_style'))
    		return;
    	$demo = vibe_get_site_style();
    }
}

WPLMS_Demo_Fixes::init();