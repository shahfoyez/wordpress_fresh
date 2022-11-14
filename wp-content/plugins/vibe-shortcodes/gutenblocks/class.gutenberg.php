<?php
/**
 * Action functions for Gutenberg Integration
 *
 * @author      VibeThemes
 * @category    Admin
 * @package     Vibe ShortCodes
 * @version     4.0
 */

 if ( ! defined( 'ABSPATH' ) ) exit;

class Vibe_Shortcodes_GutenBlocks{

    public static $instance;
    public static function init(){
    if ( is_null( self::$instance ) )
        self::$instance = new Vibe_Shortcodes_GutenBlocks();

        return self::$instance;
    }

    private function __construct(){

    	add_filter( 'block_categories', array($this,'block_category'), 10, 2);
    	add_action('init',array($this,'register_blocks'));



		// Hook: Frontend assets.
		add_action( 'enqueue_block_assets', array($this,'block_assets'),9 );

		add_action( 'enqueue_block_editor_assets', array($this,'editor_assets' ));
    }	

    function block_category( $categories, $post ) {
		return array_merge(
			$categories,
			array(
				array(
					'slug' => 'vibe-shortcodes',
					'title' => __( 'Vibe Shortcodes', 'vibe-shortcodes' ),
				),
			)
		);
	}

    function block_assets(){


		if(class_exists('WPLMS_Register')){

			wp_enqueue_style('wplms-style', VIBE_URL.'/assets/css/style.min.css',array(),WPLMS_VERSION);

			add_filter('wplms_enqueue_head_gutenberg',function($x){return 1;});
			$register = WPLMS_Register::init();
			$register->wplms_enqueue_head();
          	
          	add_action("admin_footer","print_customizer_style");
         	
         	 	
		}
		
		
	    $theme_skin = vibe_get_customizer('theme_skin');
	    if(!empty($theme_skin)){
	        wp_enqueue_style($theme_skin, VIBE_URL.'/assets/css/'.$theme_skin.'.min.css',array(),WPLMS_VERSION);  
	    }
    }


	function editor_assets() {

		wp_enqueue_script(
			'vibe-shortcodes-gutenblocks-js', // Handle.
			plugins_url( 'blocks.build.js', __FILE__ ), 
			array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ), VIBE_SHORTCODES_VERSION,
			true 
		);

		if(function_exists('vibe_get_customizer')){
			$settings = array(
				'primary_bg'=>vibe_get_customizer('primary_bg'),
				'primary_color'=>vibe_get_customizer('primary_color'),
			);

			wp_localize_script( 'vibe-shortcodes-gutenblocks-js', 'VibeShortcodesGutenBocks', $settings );
		}

		wp_enqueue_script(
			'vibe-shortcodes-gutenblocks-editor-js', // Handle.
			plugins_url( 'vibeshortcodes.blockeditor.js',  __FILE__ ), 
			array( 'jquery' ), VIBE_SHORTCODES_VERSION,
			true 
		);
		$shortcodes = VibeShortcodes::init();
		$shortcodes->frontend();
		// Styles.
		wp_enqueue_style(
			'vibe-shortcodes-gutenblocks-css', // Handle.
			plugins_url( 'vibeshortcodes.blockseditor.css', __FILE__ ),
			array( 'wp-edit-blocks' ) ,VIBE_SHORTCODES_VERSION
		);
	}

    function register_blocks(){

    	wp_register_script( 'knobjs', VIBE_URL.'/assets/js/old_files/jquery.knob.js',array('jquery') );
    	wp_register_script( 'counter-js', VIBE_PLUGIN_URL . '/vibe-shortcodes/js/scroller-counter.js',array('jquery'),'1.2',true);

    	//Only blocks with Custom scripts are required here
    	$blocks = apply_filters('vibe_shortcodes_gutenberg_blocks',array(
    		array(
    			'id'=>'counter',
    			'editor_script'=> 'counter-js'
    		),
    		array(
    			'id'=>'rounprogressbar',
    			'script'=> 'knobjs',
    			'editor_script'=> 'knobjs'
    		),
    	));


    	if(!empty($blocks)){
    		foreach($blocks as $block){
    			register_block_type(
					'vibe-shortcodes/'.$block['id'], array(
						// Enqueue blocks.style.build.css on both frontend & backend.
						'style'         => empty($block['style'])?'':$block['style'],
						'script'         => empty($block['script'])?'':$block['script'],
						// Enqueue blocks.build.js in the editor only.
						'editor_script' => empty($block['editor_script'])?'':$block['editor_script'],
						// Enqueue blocks.editor.build.css in the editor only.
						'editor_style'  => empty($block['editor_style'])?'':$block['editor_style'],
					)
				);
    		}
    	}
    	
    }

}
Vibe_Shortcodes_GutenBlocks::init();
