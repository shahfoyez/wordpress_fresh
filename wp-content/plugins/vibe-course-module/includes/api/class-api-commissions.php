<?php 
/**
 * WPLMS Commissions API
 *
 * @author 		VibeThemes
 * @category 	Admin
 * @package 	Vibe-course-module/Includes
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) {  
	exit;
}

class Wplms_Commissions_API extends WP_REST_Controller	{

	public static $instance;
    public static function init(){

        if ( is_null( self::$instance ) )
            self::$instance = new Wplms_Commissions_API();
        return self::$instance;
        
    }

	private function __construct(){

		$this->namespace = BP_COURSE_API_NAMESPACE.'/commissions/';

		add_action( 'rest_api_init', array($this,'commissions_endpoints'));
 
	}


	function commissions_endpoints(){
		
		register_rest_route( $this->namespace, '/instructor/(?P<id>\d+)?', array(
			array(
				'methods'             =>  WP_REST_Server::READABLE,
				'callback'            =>  array( $this, 'get_instructor_commissions' ),
				'permission_callback' => array( $this, 'commissions_request_validate' ),
				'args'                     	=>  array(
					'id'                       	=>  array(
						'validate_callback'     =>  function( $param, $request, $key ) {
													return is_numeric( $param );
												}
					),
				),
			),
		));

		register_rest_route( $this->namespace, '/instructor/(?P<id>\d+)?/courses', array(
			array(
				'methods'             =>  WP_REST_Server::READABLE,
				'callback'            =>  array( $this, 'get_instructor_courses' ),
				'permission_callback' => array( $this, 'commissions_request_validate' ),
				'args'                     	=>  array(
					'id'                       	=>  array(
						'validate_callback'     =>  function( $param, $request, $key ) {
													return is_numeric( $param );
												}
					),
				), 
			),
		));
		

		register_rest_route( $this->namespace, '/course/(?P<id>\d+)?', array(
			array(
				'methods'             =>  WP_REST_Server::READABLE,
				'callback'            =>  array( $this, 'get_course_details' ),
				'permission_callback' => array( $this, 'course_validate' ),
				'args'                     	=>  array(
					'id'                       	=>  array(
						'validate_callback'     =>  function( $param, $request, $key ) {
													return is_numeric( $param );
												}
					),
				),
			),
		));


		register_rest_route( $this->namespace, '/instructor/(?P<id>\d+)/students/', array(
			array(
				'methods'             =>  WP_REST_Server::READABLE,
				'callback'            =>  array( $this, 'get_instructor_students' ),
				'permission_callback' => array( $this, 'commissions_request_validate' ),
				'args'                     	=>  array(
					'id'                       	=>  array(
						'validate_callback'     =>  function( $param, $request, $key ) {
													return is_numeric( $param );
												}
					),
				),
			),
		));


		register_rest_route( $this->namespace, '/instructor/(?P<id>\d+)/search/', array(
			array(
				'methods'             =>  WP_REST_Server::READABLE,
				'callback'            =>  array( $this, 'search_instructor_students' ),
				'permission_callback' => array( $this, 'commissions_request_validate' ),
				'args'                     	=>  array(
					'id'                       	=>  array(
						'validate_callback'     =>  function( $param, $request, $key ) {
													return is_numeric( $param );
												}
					),
				), 
			),
		));

		register_rest_route( $this->namespace, '/instructor/(?P<id>\d+)/chart/', array(
			array(
				'methods'             =>  WP_REST_Server::READABLE,
				'callback'            =>  array( $this, 'get_instructor_commissions_chart' ),
				'permission_callback' => array( $this, 'commissions_request_validate' ),
				'args'                     	=>  array(
					'id'                       	=>  array(
						'validate_callback'     =>  function( $param, $request, $key ) {
													return is_numeric( $param );
												}
					),
				),
			),
		));


		register_rest_route( $this->namespace, '/instructor/(?P<id>\d+)/thresholdCommission/', array(
			array(
				'methods'             =>  WP_REST_Server::READABLE,
				'callback'            =>  array( $this, 'get_threshold_commission' ),
				'permission_callback' => array( $this, 'commissions_request_validate' ),
				'args'                     	=>  array(
					'id'                       	=>  array(
						'validate_callback'     =>  function( $param, $request, $key ) {
													return is_numeric( $param );
												}
					),
				),
			),
		));


		register_rest_route( $this->namespace, '/instructor/(?P<id>\d+)/requestPayouts/', array(
			array(
				'methods'             =>  WP_REST_Server::READABLE,
				'callback'            =>  array( $this, 'request_payouts' ),
				'permission_callback' => array( $this, 'commissions_request_validate' ),
				'args'                     	=>  array(
					'id'                       	=>  array(
						'validate_callback'     =>  function( $param, $request, $key ) {
													return is_numeric( $param );
												}
					),
				),
			),
		));


		register_rest_route( $this->namespace, '/instructor/(?P<id>\d+)/currency/', array(
			array(
				'methods'             =>  WP_REST_Server::READABLE,
				'callback'            =>  array( $this, 'get_currencies' ),
				'permission_callback' => array( $this, 'commissions_request_validate' ),
				'args'                     	=>  array(
					'id'                       	=>  array(
						'validate_callback'     =>  function( $param, $request, $key ) {
													return is_numeric( $param );
												}
					),
				),
			),
		));

		register_rest_route( $this->namespace, '/instructor/(?P<id>\d+)/payouts/?', array(
			array(
				'methods'             =>  WP_REST_Server::READABLE,
				'callback'            =>  array( $this, 'get_instructor_payouts' ),
				'permission_callback' => array( $this, 'commissions_request_validate' ),
				'args'                     	=>  array(
					'id'                       	=>  array(
						'validate_callback'     =>  function( $param, $request, $key ) {
													return is_numeric( $param );
												}
					),
				),
			),
		));

		register_rest_route( $this->namespace, '/instructor/(?P<id>\d+)/payoutChart/', array(
			array(
				'methods'             =>  WP_REST_Server::READABLE,
				'callback'            =>  array( $this, 'get_instructor_payout_chart' ),
				'permission_callback' => array( $this, 'commissions_request_validate' ),
				'args'                     	=>  array(
					'id'                       	=>  array(
						'validate_callback'     =>  function( $param, $request, $key ) {
													return is_numeric( $param );
												}
					),
				),
			),
		));

		register_rest_route( $this->namespace, '/instructor/(?P<id>\d+)/last_payout_request/', array(
			array(
				'methods'             =>  WP_REST_Server::READABLE,
				'callback'            =>  array( $this, 'get_last_payout_request' ),
				'permission_callback' => array( $this, 'commissions_request_validate' ),
				'args'                     	=>  array(
					'id'                       	=>  array(
						'validate_callback'     =>  function( $param, $request, $key ) {
													return is_numeric( $param );
												}
					),
				),
			),
		));
	}

	function get_last_payout_request($request){

		$user_id = $request->get_param('id');
		global $wpdb,$bp;
		$results = $wpdb->get_results( "SELECT  DATE(activity.date_recorded) as last_time
	                                      FROM {$bp->activity->table_name} as activity
	                                      WHERE     activity.component     = 'course'
	                                      AND     activity.type     = 'wplms_commissions_request_payout'
	                                      AND     activity.user_id     = {$user_id}
	                                      ORDER BY last_time DESC LIMIT 1",ARRAY_A);

		if(!empty($results)) {
			$last_payout_request = $results[0]['last_time'];
			$return = array('status'=>1, 'last_payout_request' => date_i18n(get_option( 'date_format' ), strtotime($last_payout_request)));
		}

		  
		return new WP_REST_Response( $return, 200 );

	}

	function get_currencies($request){

		$default = '';
		global $wpdb,$bp;
		$results = $wpdb->get_results( "
	                                    SELECT meta2.meta_value as currency
	                                    FROM  {$bp->activity->table_name_meta} as meta2 
	                                    WHERE  meta2.meta_key   LIKE '_currency%'
	                                    GROUP BY meta2.meta_value
	                                    
	                                    ",ARRAY_A);

		if(!empty($results)) {
			$default = $results[0]['currency'];
			$return = array('status'=>1, 'default' => $default, 'data'=>$results);
		}

		  
		return new WP_REST_Response( $return, 200 );

	}

	function get_threshold_commission($request){

		$data = Array();
		$commissions = Array();
		$results = Array();
		$user_id = $request->get_param('id');
		global $wpdb,$bp;
		$commissions = $wpdb->get_results( "
	                                      SELECT  sum(meta.meta_value) as commissions, meta2.meta_value as currency
	                                      FROM {$bp->activity->table_name} AS activity 
	                                      LEFT JOIN {$bp->activity->table_name_meta} as meta ON activity.id = meta.activity_id
	                                      LEFT JOIN {$bp->activity->table_name_meta} as meta2 ON activity.id = meta2.activity_id
	                                      WHERE     activity.component     = 'course'
	                                      AND     activity.type     = 'course_commission'
	                                      AND     activity.user_id     = {$user_id}
	                                      AND     meta.meta_key   LIKE '_commission%'
	                                      AND     meta2.meta_key   LIKE '_currency%'
	                                      GROUP BY currency",ARRAY_A);

		$commissions = array_column($commissions,'commissions','currency');

		$results = $wpdb->get_results( "
	                                    SELECT meta2.meta_value as currency
	                                    FROM  {$bp->activity->table_name_meta} as meta2 
	                                    WHERE  meta2.meta_key   LIKE '_currency%'
	                                    GROUP BY meta2.meta_value
	                                    
	                                    ",ARRAY_A);

		if(!empty($results)) {
			foreach($results as $key => $result) {
				$data[$key]['threshold'] = (int)get_option('threshold_commission_'.$result['currency']);
				$data[$key]['payout'] = $this->get_total_payouts($user_id, $result['currency']);
				$data[$key]['currency'] = $result['currency'];
				$data[$key]['total_commission'] = (!empty($commissions[$result['currency']]))? $commissions[$result['currency']] : 0;
			}
		}
		return new WP_REST_Response( $data, 200 );

	}

	function get_total_payouts($user_id, $currency) {
		global $wpdb;
		$paid = 0;


        $posts=$wpdb->get_results("SELECT post_id as id FROM {$wpdb->postmeta} WHERE meta_key = 'vibe_instructor_commissions' AND meta_value LIKE '%i:$user_id;%'",ARRAY_A);

        if(!empty($posts) && isset($posts)){
        	foreach($posts as $post){
	        	$commission_recieved = get_post_meta($post['id'],'vibe_instructor_commissions', true);
	        	if(!empty($commission_recieved[$user_id]) && $commission_recieved[$user_id]['currency'] == $currency){
	        		$paid += $commission_recieved[$user_id]['commission'];
	        	}
	        }
        }
        
        return $paid;
	}
	

	function request_payouts($request){
		$user_id = $request->get_param('id');
		$currency = $request->get_param('currency');
		$arr = get_user_meta($user_id, 'vibe_request_payouts');
		if(!in_array($currency, $arr)){
			add_user_meta( $user_id, 'vibe_request_payouts', $currency);
		}

	    do_action('wplms_request_payouts',$user_id,time());
		return $currency;
	}


	function get_instructor_courses($request){
		$user_id = $request->get_param('id');

		global $wpdb;
		$query = apply_filters('wplms_commission_instructor_courses',$wpdb->prepare("
          SELECT posts.ID as course_id
            FROM {$wpdb->posts} AS posts
            WHERE   posts.post_type   = 'course'
            AND   posts.post_author  = %d
          ",$user_id));

        $course_ids=$wpdb->get_results($query,ARRAY_A);


		$courses = array();
		if(!empty($course_ids)){
			foreach($course_ids as $course_id){
				$courses[]=array('id'=>$course_id['course_id'],'name'=>get_the_title($course_id['course_id']));
			}
		}
		return new WP_REST_Response( $courses, 200 );

	}

	function commissions_request_validate($request){

		$user_id = $request->get_param('id');

		$security = $request->get_param('security');

		if($security == urlencode(vibe_get_option('security_key'))){
			return true;
		}

		$user = get_userdata( $user_id );
		if ( $user === false ) {
		    return false;
		} else {
		   return true;
		}

		return false;
	}

	function get_instructor_commissions($request){
		
		$user_id = $request->get_param('id');
		$count = $request->get_param('count');
		$paged = $request->get_param('page');
		$per_page = $request->get_param('per_page');	
		$course_id =$request->get_param('course_id');	
		$date_start = $request->get_param('date_start');	
		$date_end = $request->get_param('date_end');
		$student_id = $request->get_param('student_id');
		$currency = $request->get_param('currency');
		if(empty($paged)){
			$paged = 1;
		}
		$offset= ($paged-1)*$per_page;

		$and_where = "";
		if(!empty($date_start) && !empty($date_end)){
			
			$start_date = date('Y-m-d h:m:s',$date_start);
			$end_date = date('Y-m-d h:m:s',$date_end);
			$and_where  .= " AND activity.date_recorded BETWEEN '$start_date' AND '$end_date' ";
		}
		else{
			$and_where .= ' AND YEAR(activity.date_recorded) = YEAR(CURRENT_TIMESTAMP)';
		}

		if(!empty($currency)) {
			$and_where .= " AND meta2.meta_value = '".$currency."' ";
		}

		if(!empty($course_id)){
			$and_where .= " AND activity.item_id = $course_id ";
		}else{
			
			global $wpdb;
			$query = apply_filters('wplms_commission_instructor_commissions',$wpdb->prepare("
	          SELECT posts.ID as course_id
	            FROM {$wpdb->posts} AS posts
	            WHERE   posts.post_type   = 'course'
	            AND   posts.post_author  = %d
	          ",$user_id));

	        $course_ids=$wpdb->get_results($query,ARRAY_A);

	        if(empty($course_ids)){
	        	return new WP_REST_Response( array('status'=>0,'message'=>_x('Instructor does not have courses.','no courses for instructor','vibe')), 200 );
	        }
		}

		global $wpdb;
		global $bp;

		if(!empty($count)){
			
			$count = $wpdb->get_results( "
	                                      SELECT count(*) as count
	                                      FROM {$bp->activity->table_name} AS activity 
	                                      LEFT JOIN {$bp->activity->table_name_meta} as meta ON activity.id = meta.activity_id
	                                      LEFT JOIN {$bp->activity->table_name_meta} as meta2 ON activity.id = meta2.activity_id
	                                      WHERE     activity.component     = 'course'
	                                      AND     activity.type     = 'course_commission'
	                                      AND     activity.user_id     = {$user_id}
	                                      AND     meta.meta_key   LIKE '_commission%'
	                                      AND     meta2.meta_key   LIKE '_currency%'
	                                      ".$and_where."
	                                      ORDER BY activity.date_recorded ASC",ARRAY_A);
			$count[0]['status'] =1;

			$return = $count[0];

		}else{
	        $results = $wpdb->get_results( "
	                                      SELECT activity.secondary_item_id as order_item_id,activity.item_id as course_id,meta.meta_value as commission,meta2.meta_value as currency,activity.date_recorded as date
	                                      FROM {$bp->activity->table_name} AS activity 
	                                      LEFT JOIN {$bp->activity->table_name_meta} as meta ON activity.id = meta.activity_id
	                                      LEFT JOIN {$bp->activity->table_name_meta} as meta2 ON activity.id = meta2.activity_id
	                                      WHERE     activity.component     = 'course'
	                                      AND     activity.type     = 'course_commission'
	                                      AND     activity.user_id     = {$user_id}
	                                      AND     meta.meta_key   LIKE '_commission%'
	                                      AND     meta2.meta_key   LIKE '_currency%'
	                                      ".$and_where."
	                                      ORDER BY activity.date_recorded ASC
	                                      LIMIT ".$offset.", ".$per_page,ARRAY_A);
	        
	        $data = $results;
	        if(!empty($data) && isset($data)) {
	        	foreach($data as $key =>$value) {
	        		$user_id = $this->get_user_id_by_order_item_id($value['order_item_id']);
	        		$results[$key]['user_id'] = $user_id;
	        	}
	        }
	        
	        $return = array('status'=>1,'data'=>$results);
		}

		return new WP_REST_Response( $return, 200 );
	}

	function get_instructor_payouts($request){
		
		$user_id = $request->get_param('id');
		$count = $request->get_param('count');
		$paged = $request->get_param('page');
		$per_page = $request->get_param('per_page');	
		$date_start = $request->get_param('date_start');	
		$date_end = $request->get_param('date_end');
		$currency = $request->get_param('currency');
		if(empty($paged)){
			$paged = 1;
		}
		$offset= ($paged-1)*$per_page;

		$and_where = "";
		if(!empty($date_start) && !empty($date_end)){
			
			$start_date = date('Y-m-d h:m:s',$date_start);
			$end_date = date('Y-m-d h:m:s',$date_end);
			$and_where  .= " AND posts.post_date_gmt BETWEEN '$start_date' AND '$end_date' ";
		}
		else{
			$and_where .= ' AND YEAR(posts.post_date_gmt) = YEAR(CURRENT_TIMESTAMP)';
		}

		if(!empty($currency)) {
			$and_where .= " AND meta2.meta_value = '".$currency."' ";
		}

		global $wpdb;
		global $bp;

		if(!empty($count)){
			
			$count = $wpdb->get_results( "
	                                      SELECT count(*) as count
	                                      FROM {$wpdb->posts} as posts
	                                      LEFT JOIN {$wpdb->postmeta} as meta on posts.id = meta.post_id
	                                      LEFT JOIN {$wpdb->postmeta} as meta2 on posts.id = meta2.post_id
	                                      WHERE meta.meta_key LIKE 'payout_".$user_id."' 
	                                      AND meta2.meta_key LIKE 'currency_".$user_id."' 
	                                      ".$and_where."
	                                      ORDER BY date ASC
	                                      LIMIT ".$offset.", ".$per_page,ARRAY_A);
			$count[0]['status'] =1;

			$return = $count[0];

		}else{
	        $results = $wpdb->get_results( "
	                                      SELECT  posts.post_date_gmt as date, meta.meta_value as payout,meta2.meta_value as currency 
	                                      FROM {$wpdb->posts} as posts
	                                      LEFT JOIN {$wpdb->postmeta} as meta on posts.id = meta.post_id
	                                      LEFT JOIN {$wpdb->postmeta} as meta2 on posts.id = meta2.post_id
	                                      WHERE meta.meta_key LIKE 'payout_".$user_id."' 
	                                      AND meta2.meta_key LIKE 'currency_".$user_id."' 
	                                      ".$and_where."
	                                      ORDER BY date ASC
	                                      LIMIT ".$offset.", ".$per_page,ARRAY_A);
	        
	        $return = array('status'=>1,'data'=>$results);
		}

		return new WP_REST_Response( $return, 200 );
	}


	function get_instructor_commissions_chart($request){

		$user_id = $request->get_param('id');
		$course_id =$request->get_param('course_id');	
		$date_start = $request->get_param('date_start');	
		$date_end = $request->get_param('date_end');
		$currency = $request->get_param('currency');
		$chart_data = Array();
		$cdata = Array();
		$months=Array(
			_x('January','api call','vibe'),
			_x('February','api call','vibe'),
			_x('March','api call','vibe'),
			_x('April','api call','vibe'),
			_x('May','api call','vibe'),
			_x('June','api call','vibe'),
			_x('July','api call','vibe'),
			_x('August','api call','vibe'),
			_x('September','api call','vibe'),
			_x('October','api call','vibe'),
			_x('November','api call','vibe'),
			_x('December','api call','vibe')
		);

		foreach($months as $key =>  $value){
			$chart_data[$key+1]['name'] = $value;
			$chart_data[$key+1]['commission'] = 0;
		}

		$and_where = '';
		$start_date = '';
		$end_date = '';
		$group_by = ' GROUP BY select_parameter';
		$select = 'MONTH(activity.date_recorded) as select_parameter';

		if(!empty($course_id)){
			$and_where .= " AND activity.item_id = $course_id ";
		}else{
			
			global $wpdb;
			$query = apply_filters('wplms_commission_instructor_chart',$wpdb->prepare("
	          SELECT posts.ID as course_id
	            FROM {$wpdb->posts} AS posts
	            WHERE   posts.post_type   = 'course'
	            AND   posts.post_author  = %d
	          ",$user_id));

			
	        $course_ids=$wpdb->get_results($query,ARRAY_A);
	        if(empty($course_ids)){
	        	return new WP_REST_Response( array('status'=>0,'message'=>_x('Instructor does not have courses.','no courses for instructor','vibe')), 200 );
	        }
		}
		if(!empty($currency)) {
			$and_where .= " AND meta2.meta_value = '".$currency."' ";
		}

		if(!empty($date_start) && !empty($date_end)){
			$date_range  = round(($date_end - $date_start)/60/60/24);
			$start_date = date('Y-m-d H:i:s',$date_start);
			$end_date = date('Y-m-d H:i:s',$date_end);
			$and_where  .= " AND activity.date_recorded BETWEEN '$start_date' AND '$end_date' ";

			if($date_range <= 1 && !empty($start_date)){
	//time On Day

				$chart_data = Array();
				$group_by = ' GROUP BY select_parameter';
				$select = 'activity.date_recorded as select_parameter';	
			}
			if($date_range >= 2 && $date_range <= 7){
	//daily
				$chart_data = Array();
				$startDate = (int)date('j', $date_start);
				$endDate = (int)date('j', $date_end);
				
				$date_format = get_option('date_format');	
				for($i = $date_start; $i <= $date_end; $i+=86400) {

					$value = date($date_format, $i);
					$index = date("Y-m-d", $i);
					$chart_data[$index]['name'] =$value;
					$chart_data[$index]['commission'] =0;
				}
				$group_by = ' GROUP BY select_parameter';
				$select = 'DATE(activity.date_recorded) as select_parameter';
			}
			if($date_range >= 8 && $date_range <= 30) {
	//weekly

				$chart_data = Array();
				$startWeek = (int)date('W', $date_start);
				$endWeek = (int)date('W', $date_end);
				for($i = $startWeek; $i <= $endWeek; $i++) {
					$value = _x('Week','api call','vibe').($i+1-$startWeek);
					$chart_data[$i-1]['name'] =$value;
					$chart_data[$i-1]['commission'] =0;
				}

				$group_by = ' GROUP BY select_parameter';
				$select = 'WEEK(activity.date_recorded) as select_parameter';
			}
			else if($date_range >= 31 && $date_range <= 365) {
	//Monthly
				$chart_data = Array();
				$startMonth = (int)date('m', $date_start);
				$endMonth = (int)date('m', $date_end);
				for($i = $startMonth; $i <= $endMonth; $i++) {
					$value = $months[$i-1];
					$chart_data[$i]['name'] =$value;
					$chart_data[$i]['commission'] =0;
				}
				$group_by = ' GROUP BY select_parameter';
				$select = 'MONTH(activity.date_recorded) as select_parameter';
			}

			else if($date_range >= 366) {
	//Yearly
				$chart_data = Array();
				$startYear = (int)date('Y', $date_start);
				$endYear = (int)date('Y', $date_end);
				for($i = $startYear; $i <= $endYear; $i++) {
					$value = $i;
					$chart_data[$i-1]['name'] =$value;
					$chart_data[$i-1]['commission'] =0;
				}
				$group_by = ' GROUP BY select_parameter';
				$select = 'YEAR(activity.date_recorded) as select_parameter';
			}

		}
		else{
			$and_where .= ' AND YEAR(activity.date_recorded) = YEAR(CURRENT_TIMESTAMP)';
		}

		global $wpdb;
		global $bp;
		$results = $wpdb->get_results( "
                                      SELECT ".$select.", sum(meta.meta_value) as commission
                                      FROM {$bp->activity->table_name} AS activity 
                                      LEFT JOIN {$bp->activity->table_name_meta} as meta ON activity.id = meta.activity_id
                                      LEFT JOIN {$bp->activity->table_name_meta} as meta2 ON activity.id = meta2.activity_id
	                                  WHERE     activity.component     = 'course'
                                      AND     activity.type     = 'course_commission'
                                      AND     activity.user_id     = {$user_id}
                                      AND     meta.meta_key   LIKE '_commission%'
	                                  AND     meta2.meta_key   LIKE '_currency%'
                                      ".$and_where."
                                      ".$group_by,ARRAY_A);

		if(!empty($results)) {
			foreach($results as $result) {
				$chart_data[$result['select_parameter']]['commission']= (float)$result['commission'];
			}
		}

		foreach($chart_data as $value) {
			$cdata[] = $value;
		}
        $return = array('status'=>1,'data'=>$cdata);

		return new WP_REST_Response( $return, 200 );
	}

	function get_instructor_payout_chart($request){

		$user_id = $request->get_param('id');
		$date_start = $request->get_param('date_start');	
		$date_end = $request->get_param('date_end');
		$currency = $request->get_param('currency');
		$chart_data = Array();
		$cdata = Array();
		$months=Array(
			_x('January','api call','vibe'),
			_x('February','api call','vibe'),
			_x('March','api call','vibe'),
			_x('April','api call','vibe'),
			_x('May','api call','vibe'),
			_x('June','api call','vibe'),
			_x('July','api call','vibe'),
			_x('August','api call','vibe'),
			_x('September','api call','vibe'),
			_x('October','api call','vibe'),
			_x('November','api call','vibe'),
			_x('December','api call','vibe')
		);

		foreach($months as $key =>  $value){
			$chart_data[$key+1]['name'] = $value;
			$chart_data[$key+1]['payout'] = 0;
		}

		$and_where = '';
		$start_date = '';
		$end_date = '';
		$group_by = ' GROUP BY select_parameter';
		$select = 'MONTH(posts.post_date_gmt) as select_parameter';
		
		if(!empty($currency)) {
			$and_where .= " AND meta2.meta_value = '".$currency."' ";
		}

		if(!empty($date_start) && !empty($date_end)){
			$date_range  = round(($date_end - $date_start)/60/60/24);
			$start_date = date('Y-m-d H:i:s',$date_start);
			$end_date = date('Y-m-d H:i:s',$date_end);
			$and_where  .= " AND posts.post_date_gmt BETWEEN '$start_date' AND '$end_date' ";

			if($date_range <= 1 && !empty($start_date)){
	//time On Day

				$chart_data = Array();
				$group_by = ' GROUP BY select_parameter';
				$select = 'posts.post_date_gmt as select_parameter';	
			}
			if($date_range >= 2 && $date_range <= 7){
	//daily
				$chart_data = Array();
				$startDate = (int)date('j', $date_start);
				$endDate = (int)date('j', $date_end);
				
				$date_format = get_option('date_format');	
				for($i = $date_start; $i <= $date_end; $i+=86400) {

					$value = date($date_format, $i);
					$index = date("Y-m-d", $i);
					$chart_data[$index]['name'] =$value;
					$chart_data[$index]['payout'] =0;
				}
				$group_by = ' GROUP BY select_parameter';
				$select = 'DATE(posts.post_date_gmt) as select_parameter';
			}
			if($date_range >= 8 && $date_range <= 30) {
	//weekly

				$chart_data = Array();
				$startWeek = (int)date('W', $date_start);
				$endWeek = (int)date('W', $date_end);
				for($i = $startWeek; $i <= $endWeek; $i++) {
					$value = _x('Week','api call','vibe').($i+1-$startWeek);
					$chart_data[$i-1]['name'] =$value;
					$chart_data[$i-1]['payout'] =0;
				}

				$group_by = ' GROUP BY select_parameter';
				$select = 'WEEK(posts.post_date_gmt) as select_parameter';
			}
			else if($date_range >= 31 && $date_range <= 365) {
	//Monthly
				$chart_data = Array();
				$startMonth = (int)date('m', $date_start);
				$endMonth = (int)date('m', $date_end);
				for($i = $startMonth; $i <= $endMonth; $i++) {
					$value = $months[$i-1];
					$chart_data[$i]['name'] =$value;
					$chart_data[$i]['payout'] =0;
				}
				$group_by = ' GROUP BY select_parameter';
				$select = 'MONTH(posts.post_date_gmt) as select_parameter';
			}

			else if($date_range >= 366) {
	//Yearly
				$chart_data = Array();
				$startYear = (int)date('Y', $date_start);
				$endYear = (int)date('Y', $date_end);
				for($i = $startYear; $i <= $endYear; $i++) {
					$value = $i;
					$chart_data[$i-1]['name'] =$value;
					$chart_data[$i-1]['payout'] =0;
				}
				$group_by = ' GROUP BY select_parameter';
				$select = 'YEAR(posts.post_date_gmt) as select_parameter';
			}

		}
		else{
			$and_where .= ' AND YEAR(posts.post_date_gmt) = YEAR(CURRENT_TIMESTAMP)';
		}

		global $wpdb;
		$results = $wpdb->get_results( "
                                      SELECT ".$select.", sum(meta.meta_value) as payout
                                      FROM {$wpdb->posts} AS posts 
                                      LEFT JOIN {$wpdb->postmeta} as meta ON posts.id = meta.post_id
                                      LEFT JOIN {$wpdb->postmeta} as meta2 ON posts.id = meta2.post_id

	                                  WHERE   meta.meta_key   LIKE 'payout_".$user_id."'
	                                  AND     meta2.meta_key   LIKE 'currency_".$user_id."'
                                      ".$and_where."
                                      ".$group_by,ARRAY_A);

		if(!empty($results)) {
			foreach($results as $result) {
				$chart_data[$result['select_parameter']]['payout']= (float)$result['payout'];
			}
		}

		foreach($chart_data as $value) {
			$cdata[] = $value;
		}
        $return = array('status'=>1,'data'=>$cdata);

		return new WP_REST_Response( $return, 200 );
	}

	function get_user_id_by_order_item_id($order_item_id) {
		global $wpdb;
		$user_id = 0;
		$result = $wpdb->get_results( "
                                      SELECT order_id 
                                      FROM {$wpdb->prefix}woocommerce_order_items 
                                      where order_item_id = $order_item_id", ARRAY_A);


		$order_id = $result[0]['order_id'];
		$order = wc_get_order( $order_id );
		if($order) {
			$user_id = $order->get_user_id();

		}
		return $user_id;
	}

	function course_validate($request){
		return true;
	}

	function get_instructor_students($request){

		$user_ids = json_decode($request->get_param('students'));
		global $wpdb;

		$names = $wpdb->get_results("SELECT ID,display_name FROM {$wpdb->users} WHERE ID IN (".implode(',',$user_ids).")");

		$return = array();
		if(!empty($names)){
			foreach($names as $name){
				$return[] = array('id'=>$name->ID,'name'=>$name->display_name);
			}
		}
		return new WP_REST_Response( $return, 200 );
	}


	function get_course_details($request){
		$course_id = $request->get_param('id');
		return new WP_REST_Response(array('id'=>$course_id,'name'=>get_the_title($course_id)), 200 );
	}


	function search_instructor_students($request){
		$user_ids = json_decode($request->get_param('students'));
		$s = sanitize_text_field($request->get_param('s'));

		global $wpdb;

		$users = array();
		$results = $wpdb->get_results("SELECT ID, display_name FROM {$wpdb->users} WHERE user_login LIKE '%$s%' OR user_email LIKE '%$s%' OR display_name LIKE '%$s%' ");


		if(!empty($results)){
			foreach($results as $result){
				$users[]=array('id'=>$result->ID,'name'=>$result->display_name,'image'=>bp_core_fetch_avatar(array(
								'item_id' => $result->ID,
								'object'  => 'user',
								'type'=>'thumb',
								'html'	  => false
							)) );
			}
		}

		return new WP_REST_Response( $users, 200 );
	}
}

Wplms_Commissions_API::init();
