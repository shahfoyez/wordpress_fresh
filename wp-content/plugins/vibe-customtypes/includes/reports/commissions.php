<?php

 if ( ! defined( 'ABSPATH' ) ) exit;


class WPLMS_Commissions_Report{

	

	public static $instance;
    public static function init(){

        if ( is_null( self::$instance ) )
            self::$instance = new WPLMS_Commissions_Report();
        return self::$instance;
    }

	private function __construct(){
		add_filter('lms_stats_tabs',array($this,'add_commissions_tab'));
		add_action('lms_stats_tab_commissions_subtab_overview_output',array($this,'show_report'));

		add_action('admin_enqueue_scripts',array($this,'enqueue_script'));

		add_action('rest_api_init',array($this,'rest_commissions_data'));

		add_action('wplms_download_stats_modules', array($this, 'commissions_download_stats'));

		add_filter('generate_report_csv_title', array($this, 'generate_report_csv_title'),10,2);

		add_filter('generate_report_csv_data', array($this, 'generate_report_csv_data'),10,2);
	}


	function add_commissions_tab($tabs){

		if(current_user_can('manage_options'))
			$tabs['commissions'] = __('Commissions','vibe-customtypes');

		return $tabs;
	}


	function show_report(){
		echo '<div id="wplms_commission_stats"></div>';
	}

	function enqueue_script($hook){
		if($hook === 'lms_page_lms-stats' && $_GET['tab'] == 'commissions'){
			//development
			//wp_enqueue_script('wplms_commission_stats',plugins_url('../../assets/stats/commissions/dist/js/bundle.js',__FILE__),array('wp-element','react','react-dom'),rand(1,999),true);
			
			wp_enqueue_style('wplms_commission_stats',plugins_url('../../assets/stats/css/main.css',__FILE__),array(),rand(1,999));

			$settings = array(
				'api_url'=> rest_url(BP_COURSE_API_NAMESPACE.'/commissions/'),
				'translations'=>array(
					'total_earnings'=>__( 'Total Earnings', 'vibe-customtypes' ),
					'total_commissions'=> __( 'Total Commissions Earned', 'vibe-customtypes' ),
					'total_payouts'=> __( 'Total Payouts', 'vibe-customtypes' ),
					'commissions'=> __( 'Commissions', 'vibe-customtypes' ),
					'payouts'=> __( 'Payouts', 'vibe-customtypes' ),
					'no_records'=> __( 'No Records Found', 'vibe-customtypes' ),
					'instructor'=> __( 'Instructor', 'vibe-customtypes' ),

				)
			);
			//live
			wp_enqueue_script('wplms_commission_stats',plugins_url('../../assets/js/statsCommissions.js',__FILE__),array('wp-element','react','react-dom'),rand(1,999),true);

			wp_localize_script( 'wplms_commission_stats', 'commissions', $settings );

			echo '
	            <style>
	                #wplms_commission_stats .record {
					    display: grid;
					    grid-template-columns: 1fr 1fr 1fr;
					    grid-gap: 1rem;
					    padding: 0.5rem 1rem;
					    border-bottom: 1px solid rgba(0,0,0,0.08);
					}

					#wplms_commission_stats .recordHeader {
					    background: rgba(0,0,0,0.08);
					    padding: 1rem;
					}
	            </style>'; 
		}
	}

	function rest_commissions_data(){

		register_rest_route( BP_COURSE_API_NAMESPACE, '/commissions/', array(
				array(
					'methods'             =>  'POST',
					'callback'            =>  array( $this, 'get_all_commission_data' ),
					'permission_callback' => array( $this, 'check_permissions' ),
				),
			));
	}


	function check_permissions($request){
		if(current_user_can('manage_options')){
			return true;
		}

		return true;
	}

	function get_all_commission_data($request){

		$body = json_decode($request->get_body()); 
		$data = Array();
		$commissions = Array();
		$results = Array();
		$date_start = $body->start_date;	
		$date_end = $body->end_date;	
		$current_currency = $body->currency;	

		if(!empty($date_start) && !empty($date_end)){
			
			$start_date = date('Y-m-d h:m:s',strtotime($date_start));
			$end_date = date('Y-m-d h:m:s',strtotime($date_end));
		}

		$total_currencies = $this->get_total_currencies();

		if(empty($current_currency)) {
			$current_currency = $total_currencies[0];
		}

		$total_commissions = $this->get_total_commissions( $current_currency,$start_date,$end_date );

		$total_paid = $this->get_total_payouts( $current_currency,$start_date,$end_date );

		$total_earnings = $this->get_total_earnings( $current_currency,$start_date,$end_date );

		$commission_chart_array = $this->get_commissions_chart( $current_currency,$start_date,$end_date );

		$instructor_payout_chart_array = $this->get_instructor_payout_chart( $current_currency,$start_date,$end_date );

		$get_instructor_data = $this->get_instructor_data( $current_currency,$start_date,$end_date );
		//print_r($get_instructor_data);die;
 
		$data = array(
			'status'=>1,
			'data'=>array(
				'earnings'=>$total_earnings,
				'commissions'=>$total_commissions,
				'payouts'=>$total_paid,
				'currencies'=>$total_currencies,
				'commission_chart'=>$commission_chart_array,
				'instructor_payout_chart'=>$instructor_payout_chart_array,
				'instructor_data'=>$get_instructor_data
			)
		);

		return new WP_REST_Response( $data, 200 );
	}

	function get_total_currencies() {
		$total_currencies= Array();
		global $wpdb,$bp;
		$results = $wpdb->get_results( "
	                                    SELECT meta2.meta_value as currency
	                                    FROM  {$bp->activity->table_name_meta} as meta2 
	                                    WHERE  meta2.meta_key   LIKE '_currency%'
	                                    GROUP BY meta2.meta_value
	                                    
	                                    ",ARRAY_A);

		if(!empty($results)) {
			foreach($results as $currency) {
				$total_currencies[] = $currency['currency'];
			}
		}

		return $total_currencies;

	}

	function get_total_commissions($currency, $start_date, $end_date){
		$and_where = "";
		$total_commissions = 0;
		if(!empty($start_date) && !empty($end_date)){
			$and_where  .= "AND activity.date_recorded BETWEEN '$start_date' AND '$end_date' ";
		}

		if(!empty($currency)) {
			$and_where .= "AND meta2.meta_value = '".$currency."' ";
		}

		global $wpdb,$bp;
		$commissions = $wpdb->get_results( "
	                                      SELECT  sum(meta.meta_value) as commissions
	                                      FROM {$bp->activity->table_name} AS activity 
	                                      LEFT JOIN {$bp->activity->table_name_meta} as meta ON activity.id = meta.activity_id
	                                      LEFT JOIN {$bp->activity->table_name_meta} as meta2 ON activity.id = meta2.activity_id
	                                      WHERE     activity.component     = 'course'
	                                      AND     activity.type     = 'course_commission'
	                                      AND     meta.meta_key   LIKE '_commission%'
	                                      AND     meta2.meta_key   LIKE '_currency%'
	                                      ".$and_where."
	                                      GROUP BY meta2.meta_value",ARRAY_A);

		if(isset($commissions) && !empty($commissions[0]['commissions'])){
			$total_commissions = $commissions[0]['commissions'];
		}
		return $total_commissions;
	}

	function get_total_earnings($currency, $start_date, $end_date) {
		$earnings = 0;
		$date_paid = "";
		if(!empty($start_date) && !empty($end_date)){
			$date_paid .= $start_date."...".$end_date;
		}
		$args = array(
			'currency' => $currency,
		    'date_paid' =>  $date_paid,
		);
		$orders = wc_get_orders( $args );
		foreach($orders as $order) {
			$earnings += $order->get_total();
		}
		return $earnings;
	}

	function get_total_payouts($currency, $start_date, $end_date) {
		global $wpdb;

		$paid = 0;
		$and_where = "";
		if(!empty($start_date) && !empty($end_date)){
			$and_where  .= "AND posts.post_date_gmt BETWEEN '$start_date' AND '$end_date' ";
		}

		if(!empty($currency)){
			$and_where .= "AND meta2.meta_value = '".$currency."' ";
		}

		$payouts=$wpdb->get_results("SELECT sum(meta.meta_value) as payout
                                      FROM {$wpdb->posts} AS posts 
                                      LEFT JOIN {$wpdb->postmeta} as meta ON posts.id = meta.post_id
                                      LEFT JOIN {$wpdb->postmeta} as meta2 ON posts.id = meta2.post_id

	                                  WHERE   meta.meta_key   LIKE 'payout_%'
	                                  AND     meta2.meta_key   LIKE 'currency_%'
	                                  AND meta2.meta_key  = REPLACE(meta.meta_key,'payout_','currency_') 
                                      ".$and_where,ARRAY_A) ;
		
		if(!empty($payouts[0]['payout'])){
			$paid = $payouts[0]['payout'];
		}

	    return $paid;
	}

	function get_commissions_chart($currency, $start_date, $end_date){

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
			$chart_data[$key+1]['xaxix'] = $key+1;
		}

		$and_where = '';
		$group_by = ' GROUP BY select_parameter';
		$select = 'MONTH(activity.date_recorded) as select_parameter';

		if(!empty($currency)) {
			$and_where .= "AND meta2.meta_value = '".$currency."' ";
		}

		if(!empty($start_date) && !empty($end_date)){
			$date_start = strtotime($start_date);
			$date_end = strtotime($end_date);
			$date_range  = round(($date_end - $date_start)/60/60/24);
			$and_where  .= "AND activity.date_recorded BETWEEN '$start_date' AND '$end_date' ";

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
					$chart_data[$index]['name'] =(string)$value;
					$chart_data[$index]['commission'] =0;
					$chart_data[$index]['xaxix'] = $i;
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
					$chart_data[$i-1]['xaxix'] =$i-1;
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
					$chart_data[$i]['xaxix'] =$i-1;
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
					$chart_data[$i-1]['xaxix'] =$i-1;
				}
				$group_by = ' GROUP BY select_parameter';
				$select = 'YEAR(activity.date_recorded) as select_parameter';
			}

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
			$cdata[] = Array('x' => $value['name'], 'y' => $value['commission'], 'z' => $value['xaxix']);
		}
		return $cdata;
	}

	function get_instructor_payout_chart($currency, $start_date, $end_date){
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
			$chart_data[$key+1]['xaxix'] = $key+1;
		}

		$and_where = '';
		$group_by = ' GROUP BY select_parameter';
		$select = 'MONTH(posts.post_date_gmt) as select_parameter';
		
		if(!empty($currency)) {
			$and_where .= "AND meta2.meta_value = '".$currency."' ";
		}

		if(!empty($start_date) && !empty($end_date)){
			$date_start = strtotime($start_date);
			$date_end = strtotime($end_date);
			$date_range  = round(($date_end - $date_start)/60/60/24);
			$and_where  .= "AND posts.post_date_gmt BETWEEN '$start_date' AND '$end_date' ";

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
					$chart_data[$index]['name'] =(string)$value;
					$chart_data[$index]['payout'] =0;
					$chart_data[$index]['xaxix'] = $i;
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
					$chart_data[$i-1]['xaxix'] =$i-1;
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
					$chart_data[$i]['xaxix'] =$i-1;
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
					$chart_data[$i-1]['xaxix'] =$i-1;
				}
				$group_by = ' GROUP BY select_parameter';
				$select = 'YEAR(posts.post_date_gmt) as select_parameter';
			}
		}

		global $wpdb;
		$results = $wpdb->get_results( "
                                      SELECT ".$select.", sum(meta.meta_value) as payout
                                      FROM {$wpdb->posts} AS posts 
                                      LEFT JOIN {$wpdb->postmeta} as meta ON posts.id = meta.post_id
                                      LEFT JOIN {$wpdb->postmeta} as meta2 ON posts.id = meta2.post_id

	                                  WHERE   meta.meta_key   LIKE 'payout_%'
	                                  AND     meta2.meta_key   LIKE 'currency_%'
                                      AND meta2.meta_key  = REPLACE(meta.meta_key,'payout_','currency_') 
                                      ".$and_where."
                                      ".$group_by,ARRAY_A);

		if(!empty($results)) {
			foreach($results as $result) {
				$chart_data[$result['select_parameter']]['payout']= (float)$result['payout'];
			}
		}

		foreach($chart_data as $value) {
			$cdata[] = Array('x' => $value['name'], 'y' => $value['payout'], 'z' => $value['xaxix']);
		}
		
		return $cdata;
	}

	function get_instructor_data($currency, $start_date=NULL, $end_date=NULL){
		$commissions  = $this->get_instructor_commissions($currency, $start_date, $end_date);
		$payouts  = $this->get_instructor_payouts($currency, $start_date, $end_date);
		$data = Array(); 

		foreach($commissions as $key => $values) {
			$values['payout'] = (!empty($payouts[$key]['payout'])) ? $payouts[$key]['payout'] : 0;
			$data[] = $values;
			unset($payouts[$key]);
		}

		foreach($payouts as $key => $values) {
			$data[] = $values;
		}
		return $data;
	}

	function get_instructor_commissions($currency, $start_date, $end_date){
		
		$and_where = "";
		$data = Array();
		$total_commissions = 0;
		if(!empty($start_date) && !empty($end_date)){
			$and_where  .= "AND activity.date_recorded BETWEEN '$start_date' AND '$end_date' ";
		}

		if(!empty($currency)) {
			$and_where .= "AND meta2.meta_value = '".$currency."' ";
		}

		global $wpdb,$bp;

		$results = $wpdb->get_results( "
	                                      SELECT  sum(meta.meta_value) as commissions, SUBSTR(meta.meta_key, 12) as instructor
	                                      FROM {$bp->activity->table_name} AS activity 
	                                      LEFT JOIN {$bp->activity->table_name_meta} as meta ON activity.id = meta.activity_id
	                                      LEFT JOIN {$bp->activity->table_name_meta} as meta2 ON activity.id = meta2.activity_id
	                                      WHERE     activity.component     = 'course'
	                                      AND     activity.type     = 'course_commission'
	                                      AND     meta.meta_key   LIKE '_commission%'
	                                      AND     meta2.meta_key   LIKE '_currency%'
	                                      ".$and_where."
	                                      GROUP BY meta.meta_key",ARRAY_A);
        
        if(!empty($results) && isset($results)) {
        	foreach($results as $value) {
        		$user = get_userdata($value['instructor']);
			    $instructor_name = $user->data->display_name;
				$data[$value['instructor']] = Array('instructor' => $instructor_name, 'commission' => $value['commissions'], 'payout' => 0);
			}
        }
        return $data;
	}

	function get_instructor_payouts($currency, $start_date, $end_date){
		
		$and_where = "";
		$data = Array();
		if(!empty($start_date) && !empty($end_date)){
			$and_where  .= "AND posts.post_date_gmt BETWEEN '$start_date' AND '$end_date' ";
		}

		if(!empty($currency)){
			$and_where .= "AND meta2.meta_value = '".$currency."' ";
		}
		global $wpdb,$bp;

		$results = $wpdb->get_results( "
										SELECT sum(meta.meta_value) as payout, SUBSTR(meta.meta_key, 8) as instructor
										FROM {$wpdb->posts} AS posts 
										LEFT JOIN {$wpdb->postmeta} as meta ON posts.id = meta.post_id
										LEFT JOIN {$wpdb->postmeta} as meta2 ON posts.id = meta2.post_id

										WHERE   meta.meta_key   LIKE 'payout_%'
										AND     meta2.meta_key   LIKE 'currency_%'
                                        AND meta2.meta_key  = REPLACE(meta.meta_key,'payout_','currency_') 
										".$and_where."
	                                    GROUP BY meta.meta_key",ARRAY_A);
		
        
        if(!empty($results) && isset($results)) {
        	foreach($results as $value) {
        		$user = get_userdata($value['instructor']);
			    $instructor_name = $user->data->display_name;
				$data[$value['instructor']] = Array('instructor' => $instructor_name, 'commission' => 0, 'payout' => $value['payout']);
			}
        }
        return $data;
	}

	function commissions_download_stats(){
		global $wpdb,$bp;
		$results = $wpdb->get_results( "
	                                    SELECT meta2.meta_value as currency
	                                    FROM  {$bp->activity->table_name_meta} as meta2 
	                                    WHERE  meta2.meta_key   LIKE '_currency%'
	                                    GROUP BY meta2.meta_value
	                                    
	                                    ",ARRAY_A);

		if(!empty($results)) {
			foreach($results as $currency) {
				$currency = $currency['currency'];
				?>
				<option value=<?php echo strtolower($currency);?> <?php selected($currency,$_POST['module']); ?>><?php echo __('Commission_','vibe-customtypes').$currency; ?></option>
				<?php
			}
		}
	}

	function generate_report_csv_data($csv, $post){
		$currency = $post['module'];
		$data = $this->get_instructor_data($currency);
		if(!empty($data) && is_array($data)) {
			foreach($data as $d){
				$csv[]=$d;
			}
		}
		return $csv;		
	}

	function generate_report_csv_title($csv_title, $post) {

		$csv_title=array( 'Instructor','Commissions','Payouts' );
		return $csv_title;
	}
}

WPLMS_Commissions_Report::init();