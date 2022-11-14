<?php

/*
Dear ThimPress, please be original and this time do not copy our code !
 */

defined( 'ABSPATH' ) or die();

if ( ! class_exists( 'BP_Course_Rest_Scorm_Controller' ) ) {
	
	class BP_Course_Rest_Scorm_Controller{

		
		/**
		 * Register the routes for the objects of the controller.
		 *
		 * @since 3.0.0
		 */
		public function register_routes() {



			//$this->token = '2tz745fwp6d7z1d50euboegms7pgvglbnn5biilw';
			
			$this->namespace = BP_COURSE_API_NAMESPACE;
			$this->type = 'scorm';
			
			register_rest_route( $this->namespace, '/'. $this->type .'/finish', array(
				'methods'                   =>   'POST',
				'callback'                  =>  array( $this, 'finish_scorm_module' ),
				 'permission_callback' => array( $this, 'get_user_permissions_check' ),
				'args'                     	=>  array(
					'moduleid'                       	=>  array(
						'validate_callback'     =>  function( $param, $request, $key ) {
													return is_numeric( $param );
												}
					),
				),
			) );

			register_rest_route( $this->namespace, '/'. $this->type .'/updateprogress', array(
				'methods'                   =>   'POST',
				'callback'                  =>  array( $this, 'update_scorm_course_progress' ),
				 'permission_callback' => array( $this, 'get_user_permissions_check' ),
				'args'                     	=>  array(
					'moduleid'                       	=>  array(
						'validate_callback'     =>  function( $param, $request, $key ) {
													return is_numeric( $param );
												}
					),
				),
			) );


			register_rest_route( $this->namespace, '/'. $this->type .'/scormdata/update', array(
				'methods'                   =>   'POST',
				'callback'                  =>  array( $this, 'update_scormdata' ),
				 'permission_callback' => array( $this, 'get_user_permissions_check' ),
				
			) );


			register_rest_route( $this->namespace, '/'. $this->type .'/scormdata/get', array(
				'methods'                   =>   'POST',
				'callback'                  =>  array( $this, 'get_scormdata' ),
				 'permission_callback' => array( $this, 'get_user_permissions_check' ),
				
			) );
				
	    }

		public function get_user_permissions_check($request){
			
			//$headers = $request->get_headers();
			$headers = vibe_getallheaders();
			if(isset($headers['Authorization'])){
				$token = $headers['Authorization'];

				$this->token = $token;
				$this->user_id = $this->get_user_from_token($token);
				if($this->user_id){
					return true;
				}
			}

			return false;
		}

		function get_user_from_token($token){

			global $wpdb;
			$user_id = $wpdb->get_var(apply_filters('wplms_usermeta_direct_query',"SELECT user_id FROM {$wpdb->usermeta} WHERE meta_key = '$token'"));

			if(is_numeric($user_id)){
				return $user_id;
			}

			return false;
			
		}

		function update_scormdata($request){
	    	$data = array();
	    	//getting $_POST
	    	$module_id = $_POST['module_id'];
	    	$course_id = $_POST['course_id'];
	    	if(empty($module_id) || (!empty($module_id) && $module_id == 'undefined')){
	    		$module_id = $course_id;
	    	}
	    	$package_name = 'wplms_scorm_'.$module_id.'_'.$_POST['key'];
	    	$data = stripslashes($_POST['data']);
	    	update_user_meta($this->user_id,$package_name,$data);
	    	$return = array(
	    		'status'=>true,
	    		'message'=>_x('updated scorm data for user','','vibe')
	    	);
	    	return new WP_REST_Response($return, 200);
	    }

	    
	    function get_scormdata($request){
	    	$data = array();
	    	//getting $_POST
	    	$module_id = $_POST['module_id'];
	    	$course_id = $_POST['course_id'];
	    	if(empty($module_id) || (!empty($module_id) && $module_id == 'undefined')){
	    		$module_id = $course_id;
	    	}
	    	
	    	$package_name = 'wplms_scorm_'.$module_id.'_'.$_POST['key'];
	    	$data = get_user_meta($this->user_id,$package_name,true);
	    	if(!empty($data)){
	    		return new WP_REST_Response(array('status'=>true,'data'=>$data), 200);
	    	}
	    	return new WP_REST_Response(array('status'=>false,'message'=>_x('No data found','','vibe')), 200);
	    }

	    function update_scorm_course_progress($request){
	    	$data = array();
	    	$course_id = $_POST['course_id'];
	    	$progress = $_POST['progress'];
	    	$progress = round($progress,2);
	    	if(!empty($course_id) && function_exists('bp_course_is_member') && bp_course_is_member($course_id,$this->user_id)){
				bp_course_update_user_progress($this->user_id,$course_id,$progress);

				$data = array(
		    		'status'=>true,
		    		'marks'=>$marks,
		    		'message'=>_x('Course progress set!','','vibe')
		    	);
		    	return new WP_REST_Response($data, 200);
			}else{
				$data = array(
		    		'status'=>false,
		    		'message'=>_x('Not a course member','','vibe')
		    	);
		    	return new WP_REST_Response($data, 200);
			}
	    }

		function finish_scorm_module($request){
	    	$data = array();
	    	//getting $_POST
	    	
	    	$module_id = $_POST['module_id'];
	    	$course_id = $_POST['course_id'];
	    	$total_marks = $_POST['total_marks'];
	    	$user_marks = $_POST['user_marks'];
	    	$package_name = $_POST['key'];
	    	$marks = ($user_marks/$total_marks)*100;
	    	$marks = round($marks);
	    	
    		if(!empty($_POST['type'])){
    			$type = sanitize_text_field($_POST['type']);
    			switch ($type) {
    				case 'course':
    					//handle course
    					if(!empty($course_id) && function_exists('bp_course_is_member') && bp_course_is_member($course_id,$this->user_id)){
    						update_post_meta($course_id,$this->user_id,$marks);
    						bp_course_update_user_progress($this->user_id,$course_id,100);
    						delete_user_meta($this->user_id,$package_name);

    						$data = array(
					    		'status'=>true,
					    		'marks'=>$marks,
					    		'message'=>_x('Quiz marks set!','','vibe')
					    	);
					    	return new WP_REST_Response($data, 200);
    					}else{
    						$data = array(
					    		'status'=>false,
					    		'message'=>_x('Not a course member','','vibe')
					    	);
					    	return new WP_REST_Response($data, 200);
    					}
    					break;
    				case 'quiz':
    					//handle quiz
    					if( !empty($module_id) ){
    						global $wpdb;
      						global $bp;
    						$quiz_id = $module_id;
    						if(empty($course_id)){
    							$course_id = get_post_meta($quiz_id,'vibe_quiz_course',true);
    						}
    						
    						if(empty($course_id)){
    							$course_id= 0;
    						}

					        $time = apply_filters('wplms_scorm_complete_unit',time(),$quiz_id,$course_id,$this->user_id);
					        update_user_meta($this->user_id,$quiz_id,$time);
					        update_post_meta($quiz_id,$this->user_id,$user_marks);
					        $questions = array(
				            	'ques'=>array(_x('quiz','','vibe')),
				            	'marks'=>array($total_marks),
				            );
				          	bp_course_update_quiz_questions($quiz_id,$this->user_id,$questions);

				          	update_post_meta($quiz_id,$this->user_id,$user_marks);

					        do_action('wplms_submit_quiz',$quiz_id,$this->user_id,$questions);

					        if(empty($_POST['is_take_course']) && !empty($course_id)){
					        	$curriculum = bp_course_get_curriculum_units($course_id);
						        $per = round((100/count($curriculum)),2);
						        $progress = bp_course_get_user_progress($this->user_id,$course_id);
						        $new_progress = $progress+$per;

						        if($new_progress > 100){
						          $new_progress = 100;
						        }

						        bp_course_update_user_progress($this->user_id,$course_id,$new_progress);
					        }
					        
					        bp_course_update_user_quiz_status($this->user_id,$quiz_id,4);
					        do_action('wplms_evaluate_quiz',$quiz_id,$user_marks,$this->user_id,$total_marks);
					        $activity_id = $wpdb->get_var($wpdb->prepare( "
					                    SELECT id 
					                    FROM {$bp->activity->table_name}
					                    WHERE secondary_item_id = %d
					                  AND type = 'quiz_evaluated'
					                  AND user_id = %d
					                  ORDER BY date_recorded DESC
					                  LIMIT 0,1
					                " ,$quiz_id,$this->user_id));
					        if(!empty($activity_id)){
					            $user_result = array($package_name.$quiz_id => array(
					                                            'content' => _x('Quiz evaluated','','vibe'),
					                                            'marks' => $user_marks,
					                                            'max_marks' => $total_marks
					                                          )
					                          );
					        	bp_course_record_activity_meta(array('id'=>$activity_id,'meta_key'=>'quiz_results','meta_value'=>$user_result));
					    	}
					    	delete_user_meta($this->user_id,$package_name);
					    	$data = array(
					    		'status'=>true,
					    		'message'=>_x('Quiz marks set!','','vibe')
					    	);
					    	return new WP_REST_Response($data, 200);
					    }else{
					    	$data = array(
					    		'status'=>false,
					    		'message'=>_x('Not a course member','','vibe')
					    	);
					    	return new WP_REST_Response($data, 200);
					    }
    					break;
    				case 'unit':
    					//handle unit
	    				if(empty($_POST['is_take_course'])){
	    					if(!empty($course_id) && !empty($module_id) && function_exists('bp_course_is_member') && bp_course_is_member($course_id,$this->user_id)){

						        $time = apply_filters('wplms_scorm_complete_unit',time(),$module_id,$course_id,$this->user_id);

						        update_user_meta($this->user_id,$module_id,$time);
						        update_post_meta($module_id,$this->user_id,0);

					          	if(function_exists('bp_course_update_user_unit_completion_time')){
					            	bp_course_update_user_unit_completion_time($this->user_id,$module_id,$course_id,$time);
					          	}
					          	
						        $curriculum = bp_course_get_curriculum_units($course_id);
						        $per = round((100/count($curriculum)),2);
						        $progress = bp_course_get_user_progress($this->user_id,$course_id);
						        $new_progress = $progress+$per;

						        if($new_progress > 100){
						          $new_progress = 100;
						        }

						        bp_course_update_user_progress($this->user_id,$course_id,$new_progress);
						        do_action('wplms_unit_complete',$module_id,$new_progress,$course_id,$this->user_id );
						        delete_user_meta($this->user_id,$package_name);
						        $data = array(
						    		'status'=>true,
						    		'message'=>_x('Unit marked complete','','vibe')
						    	);
						    	return new WP_REST_Response($data, 200);
						    }else{
						    	$data = array(
						    		'status'=>false,
						    		'message'=>_x('Not a course member','','vibe')
						    	);
						    	return new WP_REST_Response($data, 200);
						    }
	    				}
    					break;
    				case 'wplms-assignment':

			            $user = get_userdata($this->user_id);
			            $assignment_title = get_the_title($module_id);
			            $args = array(
			                    'comment_post_ID' => $module_id,
			                    'comment_author' => $user->display_name,
			                    'comment_author_email' => $user->user_email,
			                    'comment_content' => $assignment_title.' - '.$user->display_name,
			                    'comment_date' => current_time('mysql'),
			                    'comment_approved' => 1,
			                    'comment_parent' => 0,
			                    'user_id' => $this->user_id,
			            );
			            wp_insert_comment($args);
				          
    					break;
    				default:
    					do_action('wplms_handle_finish_scorm_module',$module_id,$course_id,$type,$request,$_POST);
    					$data = array();
    					$data = apply_filters('wplms_handle_finish_scorm_module_data_filter',$data,$module_id,$course_id,$type,$request,$_POST);
    					return new WP_REST_Response($data, 200);
    					break;
    			}
    		}
	    	


	    	$data = array(
	    		'status'=>false,
	    		'message'=>_x('Something went wrong!','','vibe')
	    	);
	    	return new WP_REST_Response($data, 200);
	    }
		
	}
}