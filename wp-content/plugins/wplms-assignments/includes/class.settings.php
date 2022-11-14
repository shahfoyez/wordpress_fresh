<?php
if (!defined('ABSPATH')) { exit; }

if (!class_exists('WPLMS_Assignments_Settings')){
    class WPLMS_Assignments_Settings{

	    public static $instance;
	    

	    public static function init(){

	        if ( is_null( self::$instance ) )
	            self::$instance = new WPLMS_Assignments_Settings();

	        return self::$instance;
	    }
	    public function __construct(){ 
	    	add_filter('lms_general_settings',array($this,'settings'));
	    	add_action('wplms_tips_default',array($this,'apply_end_date'),10,1);

	    	add_filter('wplms_assignment_remaining_time',array($this,'remaining_time'),10,2);
	    }


	    function settings($settings){
	    	$settings[]=array(
					'label'=>__('Assignment Settings','wplms-assignments' ),
					'type'=> 'heading',
				);
	    	$settings[]=array(
			            'label' => __('Enable Assignment End Date instead of duration', 'wplms-assignments'),
			            'name' => 'wplms_assignment_end_date',
			            'desc' => __('Instructors will optionally be able to set a end date for Assignments which will take precedence over duration.', 'wplms-assignments'),
			            'type' => 'checkbox',
					);
				
				
	    	return $settings;
	    }

	    function apply_end_date($key){
	    	
	    	if($key != 'wplms_assignment_end_date')
	    		return;

	    	add_filter('wplms_wplms-assignment_metabox',array($this,'add_end_date_setting'));

	    }


	    function add_end_date_setting($metabox){

	    	$metabox[]= array(
		    	'label'	=> __('Assignment End Date','wplms-assignments'), // <label>
				'desc'	=> __('Date at which assignment submission ends [12:00a.m]. Overrides assignment duration [ Leave empty to not apply]','wplms-assignments'), // description
				'id'	=> 'wplms_assignments_end_date', // field id and name
				'type'	=> 'date', // type of field
			);
	    	return $metabox;

	    }

	    function remaining_time($time_in_seconds,$assignment_id){

	    	$gmt_offset = get_option('gmt_offset');
	    	$gmt_offset = intval($gmt_offset);
	    	$end_date = get_post_meta($assignment_id,'wplms_assignments_end_date',true);
	    	if(!empty($end_date)){
	    		if(!empty($gmt_offset)){
	    			//24*60*60 coz end date should be considered up 12midnight
	    			$time_in_seconds = (strtotime($end_date)+(24*60*60)) - (time()+($gmt_offset*60*60));
	    		}else{
	    			$time_in_seconds = (strtotime($end_date)+(24*60*60)) - time();
	    		}
	    		if($time_in_seconds < 0 ){
	    			$time_in_seconds = 0;
	    		}
	    	}

	    	return $time_in_seconds;
	    }
	}
	WPLMS_Assignments_Settings::init();
}
