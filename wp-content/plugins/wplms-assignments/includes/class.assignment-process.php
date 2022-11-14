<?php

if (!defined('ABSPATH')) { exit; }

class WPLMS_Assignments_Process{

    public static $instance;
    
    public static function init(){

        if ( is_null( self::$instance ) )
            self::$instance = new WPLMS_Assignments_Process();

        return self::$instance;
    }

    public function __construct(){ 
        
        add_action('wplms_curriculum_course_lesson_line_html',array($this,'show_assignment_in_curriculum'),10,2);
        add_action('wplms_after_every_course_curriculum_lesson',array($this,'show_assignment_submit_html'));
        add_filter('wplms_unit_classes',array($this,'stop_notes'),10,2);
        add_action('wp_ajax_submit_assignment_incourse',array($this,'submit_assignment_incourse'));
        add_action('wp_ajax_incourse_start_assignment',array($this,'incourse_start_assignment'));
        add_action('wp_ajax_incourse_continue_assignment',array($this,'incourse_continue_assignment'));
        add_filter('wplms_finish_course_check',array($this,'incourse_assignment_check'),9999,2);
        add_filter('wplms_unit_mark_complete',array($this,'mark_unit_complete_handle'),999,3);
        add_filter('bp_course_check_quiz_complete',array($this,'bp_course_check_quiz_complete'),10,4);
        add_filter('bp_course_get_user_unit_completion_time',array($this,'bp_course_get_user_unit_completion_time'),10,4);
        //add_filter('wplms_get_course_unfinished_unit',array($this,'check_assignment'),10,2);
        //add_filter('wplms_get_course_unfinished_unit_key',array($this,'check_assignment_key'),10,3);
    }

    function bp_course_get_user_unit_completion_time($time,$unit_id,$user_id,$course_id){
        if(get_post_type($unit_id) == 'wplms-assignment'){
            $answers=get_comments(array(
                'post_id' => $unit_id,
                'status' => 'approve',
                'number' => 1,
                'user_id' => $user_id
            ));
            if(!(isset($answers) && is_array($answers) && count($answers))){
                $time =0;
            }
        }
        return $time;
    }

    function check_assignment($unit_id,$course_id){
        $course_curriculum = array();
        if(function_exists('bp_course_get_curriculum_units'))
            $course_curriculum=bp_course_get_curriculum_units($course_id);  

        $uid='';
        $key = $pre_unit_key = 0;
        if(isset($course_curriculum) && is_array($course_curriculum) && count($course_curriculum)){
        
            foreach($course_curriculum as $key => $uid){
                if(get_post_type($uid) == 'wplms-assignment'){

                }
            }

        }

        return $unit_id;
    }

    function check_assignment_key($key,$unit_id,$course_id){

        return $key;
    }

    function bp_course_check_quiz_complete($bool,$assignment_id,$user_id,$course_id){
        if(get_post_type($assignment_id) == 'wplms-assignment'){
            $answers=get_comments(array(
                'post_id' => $assignment_id,
                'status' => 'approve',
                'number' => 1,
                'user_id' => $user_id
            ));
            if(isset($answers) && is_array($answers) && count($answers)){
                $bool =true;
            }else{
                $bool =false;
            }
        }
        return $bool;
    }

    function mark_unit_complete_handle($html,$assignment_id,$course_id){
        if(get_post_type($assignment_id) == 'wplms-assignment'){
            return '';
        }

        return $html;
    }

    function incourse_assignment_check($flag,$course_curriculum){
        if(!empty($flag) && get_post_type($flag) == 'wplms-assignment'){
            $user_id = get_current_user_id();
            $marks = get_post_meta($flag,$user_id,true);
            if(!empty($marks))
                return 0;
        }
        return $flag;
    }

    function incourse_continue_assignment(){
        $assignment_id = intval($_POST['assignment_id']);
        $user_id=get_current_user_id();
        $start_time=get_user_meta($user_id,$assignment_id,true);
        $time=get_post_meta($assignment_id,'vibe_assignment_duration',true);
        $assignment_duration_parameter = apply_filters('vibe_assignment_duration_parameter',86400,$assignment_id);
        $time_limit = intval($start_time)+ intval($time)*$assignment_duration_parameter;

        $remaining = $time_limit - time();
        $remaining = apply_filters('wplms_assignment_remaining_time',$remaining,$assignment_id);

        if($remaining > 0){
            echo '';
        }else{
            echo __('TIME EXPIRED, PLEASE SUBMIT THE ASSIGNMENT','wplms-assignments');
        }
        die();
    }

    function incourse_start_assignment(){
        if (!is_user_logged_in() || !isset($_POST['security']) || !wp_verify_nonce($_POST['security'],'wplms_assgiments_security') ){
            echo '<p>'.__('Security check failed !','wplms-assignments').'</p>';
            die();
        }
        $data = array();
        $assignment_id = intval($_POST['assignment_id']);
        $user_id=get_current_user_id();

        $exists = get_user_meta($user_id,$assignment_id,true);
        if(empty($exists)){
            if(add_user_meta($user_id,$assignment_id,time())){
              //Record activity
                update_post_meta($assignment_id,$user_id,0);
                do_action('wplms_start_assignment',$assignment_id,$user_id);
                $data = array('status'=>true);
            }else{
                $data = array(
                    'status' => false,
                    'message'=>__('Assignment can not be re-started','wplms-assignments'),
                );
                echo json_encode($data);
                die();
            }  
        }

        echo json_encode($data);
        die();
    }

    function submit_assignment_incourse(){
        if (!is_user_logged_in() || !isset($_POST['security']) || !wp_verify_nonce($_POST['security'],'wplms_assgiments_security') ){
            echo '<p>'.__('Security check failed !','wplms-assignments').'</p>';
            die();
        }
        $assignment_id = intval($_POST['assignment_id']);
        $content = sanitize_textarea_field($_POST['text']);
        $user_id=get_current_user_id();
        $attachment_ids = $_POST['attachment_ids'];
        
        $data = array(
            'comment_post_ID' => $assignment_id,
            'comment_content' => ((!empty($content))?$content:get_the_title($assignment_id).' - '.$user_id),
            'user_id' => $user_id,
            'comment_approved' => 1,
        );
        $comment_id = wp_insert_comment($data); 
        if(!empty($comment_id)){
            update_post_meta($assignment_id,$user_id,0);
            update_comment_meta($comment_id, 'attachmentId', $attachment_ids);
            do_action('wplms_submit_assignment',$assignment_id,$user_id);
            update_post_meta($assignment_id,$user_id,0);
            $data = array(
                'status' => true,
                'message'=>_x('Assignment Submitted succesfully','','wplms-assignment'),
            );
            echo json_encode($data);
            die();
        }else{
            $data = array(
                'status' => false,
                'message'=>__('Assignment can not be re-started','wplms-assignments'),
            );
            echo json_encode($data);
            die();
        }
    }

    function stop_notes($unit_class,$id){
        if(get_post_type($id) == 'wplms-assignment'){
            $unit_class = $unit_class.' stop_notes';
        }
        return $unit_class;
    }

    function show_assignment_in_curriculum($assignment_data,$course_id){
        $assignment = $assignment_data['id'];
        $duration = get_post_meta($assignment,'vibe_assignment_duration',true);
        $assignment_duration_parameter = apply_filters('vibe_assignment_duration_parameter',86400,$assignment);
        $cal_d = $duration*$assignment_duration_parameter;
        $days = floor($cal_d/86400);
        $hours = floor(($cal_d%86400)/24);
        $minutes = floor((($cal_d%86400)/24)/60);
        ?>
        <tr class="course_lesson">
            <td class="curriculum-icon"><i class="fa fa-paperclip"></i></td>
            <td colspan="2"><?php echo apply_filters('wplms_curriculum_course_lesson',(($assignment_data['link'])?'<a href="'.$assignment_data['link'].'">':''). $assignment_data['title'].(isset($assignment_data['free'])?$assignment_data['free']:'') . (!empty($assignment_data['link'])?'</a>':''),$assignment_data['id'],$course_id); ?></td>
            <td><span class="time"><i class="fa fa-clock-o"></i><?php echo ($duration > 9998 ? _x('UNLIMITED','wplms-assignments','assignment duration in curriculum') : (empty($days)?'':$days.', ').(empty($hours)?'00':sprintf('%1$02d',$hours)).':'.(empty($minutes)?'00':sprintf('%1$02d',$minutes))); ?></span></td>
        </tr>
        <?php
    }

    function show_assignment_submit_html($unit_id){
        global $post;
        $unit_post = get_post($unit_id);
        if($unit_post->post_type != 'wplms-assignment')
            return;
        $_global = $post;
        if(!empty($unit_id)){
            $post = $unit_post;
            global $withcomments;
            $_withcomments = $withcomments;
            $withcomments = true;
        }
        
        $assignmenttype = get_post_meta($unit_id,'vibe_assignment_submission_type',true);
        if(!empty($assignmenttype) && $assignmenttype  == 'upload'){
            echo '<script src="'.includes_url('js/plupload/moxie.min.js').'"></script>';
            echo '<script src="'.includes_url('js/plupload/plupload.min.js').'"></script>';
        }else{
            $assignmenttype ='textarea';
        }
        
        wp_nonce_field('wplms_assgiments_security','wplms_assgiments_security');

        ?>
        <script>

            jQuery( "body" ).undelegate( "#assignment p.form-submit input#submit", "click");
            jQuery('body').delegate('#assignment p.form-submit input#submit','click',function (event){
                event.preventDefault();
                var text = jQuery('#comment').val();
                var $this = jQuery(this);
                var assigment_type = '<?php echo $assignmenttype; ?>';
                if($this.hasClass('disabled'))
                    return false;
                var assignment_id = '<?php echo $unit_id; ?>';
                
                $this.addClass('disabled');
                var attachment_ids = [];
                jQuery('.attachment_ids').each(function(){
                    attachment_ids.push(jQuery(this).val());
                });

                if(assigment_type == 'upload' && (!attachment_ids || (attachment_ids && attachment_ids.length < 1))){
                    alert('<?php echo _x('Please upload some attachment','','wplms-assignments');?>');
                    $this.removeClass('disabled');
                    return false;
                }
                if(!text){
                    alert('<?php echo _x('Please enter text','','wplms-assignments');?>');
                    $this.removeClass('disabled');
                    return false;
                }
                jQuery.ajax({
                    type: "POST",
                    url: ajaxurl,
                    dataType: 'json',
                    data: { action: 'submit_assignment_incourse', 
                            security: jQuery('#wplms_assgiments_security').val(),
                            assignment_id:assignment_id,
                            text:text,
                            attachment_ids:attachment_ids,  
                    },
                    cache: false,
                    success: function (json) {
                        if(json){
                            if(json.status){
                                jQuery('.course_timeline').find('.active').addClass('done');
                                jQuery('body').find('.course_progressbar').trigger('increment');
                                jQuery('#unit'+assignment_id+' a').trigger('click');
                            }else{
                                if(json.message){
                                    alert(json.message);
                                }
                            }
                        }
                        $this.removeClass('disabled');
                    }
                });
            });

            jQuery( 'body' ).undelegate( '#assignment [name="start_assignment"]', 'click');
            jQuery('body').delegate('#assignment [name="start_assignment"]','click',function (event){
                event.preventDefault();
                var assignment_id = '<?php echo $unit_id; ?>';
                var $this = jQuery(this);
                if($this.hasClass('disabled'))
                    return false;
                $this.addClass('disabled');
                jQuery.ajax({
                    type: "POST",
                    url: ajaxurl,
                    dataType: 'json',
                    data: { action: 'incourse_start_assignment', 
                            security: jQuery('#wplms_assgiments_security').val(),
                            assignment_id:assignment_id,
                    },
                    cache: false,
                    success: function (json) {
                        if(json){
                            if(json.status){
                                
                                jQuery('#unit'+assignment_id+' a').trigger('click');
                            }else{
                                if(json.message){
                                    alert(json.message);
                                }
                            }
                        }
                        $this.removeClass('disabled');
                    }
                });
                
            });
            jQuery( 'body' ).undelegate( '#assignment [name="continue_assignment"]', 'click');
            jQuery('body').delegate('#assignment [name="continue_assignment"]','click',function (event){
                event.preventDefault();
                var assignment_id = '<?php echo $unit_id; ?>';
                var $this = jQuery(this);
                if($this.hasClass('disabled'))
                    return false;
                $this.addClass('disabled');
                jQuery.ajax({
                    type: "POST",
                    url: ajaxurl,
                    dataType: 'json',
                    data: { action: 'incourse_continue_assignment', 
                            security: jQuery('#wplms_assgiments_security').val(),
                            assignment_id:assignment_id,
                    },
                    cache: false,
                    success: function (json) {
                        if(json){
                            if(json.status){
                                
                                jQuery('#unit'+assignment_id+' a').trigger('click');
                            }else{
                                if(json.message){
                                    alert(json.message);
                                }
                            }
                        }
                        $this.removeClass('disabled');
                    }
                });
                
            });

        </script>
        <?php

        $translation_array = array( 
            'assignment_reset' => __( 'This step is irreversible. All Assignment submissions would be reset for this user. Are you sure you want to Reset the Assignment for this User? ','wplms-assignments' ), 
            'assignment_reset_button' => __( 'Confirm, Assignment reset for this User','wplms-assignments' ), 
            'marks_saved' => __( 'Marks Saved','wplms-assignments' ), 
            'assignment_marks_saved' => __( 'Assignment Marks Saved','wplms-assignments' ), 
            'cancel' => __( 'Cancel','wplms-assignments' ),
            'incorrect_file_format'=> __('Incorrect file format ','wplms-assignments'),
            'duplicate_file'=> __('File already selected ','wplms-assignments'),
            'remove_attachment'=>_x('Are you sure you want to remove this attachment ?','Notification when user removes the attachment from assignment','wplms-assignments'),
            );

        echo '<script>
        var wplms_assignment_messages = '.json_encode($translation_array).';
        jQuery("#comment-tmce").hide();
        jQuery("#comment-html").hide();
        </script>';
        echo '<link rel="stylesheet" href="'.plugins_url( '../css/wplms-assignments.css' , __FILE__ ).'?ver='.WPLMS_ASSIGNMENTS_VERSION.'" type="text/css">';
        echo '<script src="'.plugins_url( '../js/wplms-assignments.js' , __FILE__ ).'?ver='.WPLMS_ASSIGNMENTS_VERSION.'"></script>';

        

        $user_id = get_current_user_id();
        $marks=get_post_meta($post->ID,'vibe_assignment_marks',true);
        $course=get_post_meta($post->ID,'vibe_assignment_course',true);

        $time=get_post_meta($post->ID,'vibe_assignment_duration',true);
        $evaluation=get_post_meta($post->ID,'vibe_assignment_evaluation',true);
        $assignment_submission_type=get_post_meta($post->ID,'vibe_assignment_submission_type',true);


        if(is_user_logged_in()){
            $assignment_taken = get_user_meta($user_id,$post->ID,true);
            $assignment_finished = get_post_meta($post->ID,$user_id,true);
        }
        $flag=0;
        if(isset($assignment_taken) && $assignment_taken !=''){
            $assignment_duration_parameter = apply_filters('vibe_assignment_duration_parameter',86400);
            $timelimit = $assignment_taken + $time*$assignment_duration_parameter;
            if($timelimit > time())
                $flag=1;
            else
                $flag=3;
        }

        if(isset($assignment_finished) && is_numeric($assignment_finished) && $assignment_finished>0)
            $flag=2;


        if($user_id == $post->post_author || current_user_can('manage_options'))
            $flag=1;
        ?>
        <div class="row">
            <div class="col-md-8 col-sm-7">
                    <div class="content">
                        <div id="assignment" class="main_content">
                            <?php do_action('wplms_assignment_before_content'); 
                            ?>
                            <?php
                            switch($flag){
                                case 0:
                                the_excerpt();
                                assignment_start_button();
                                break;
                                case 1:
                                the_content();
                                if(isset($assignment_submission_type)){
                                    switch($assignment_submission_type){
                                        case 'upload': 
                                            comments_template('/assignment-upload.php',true); 
                                        break;
                                        case 'textarea':  
                                            comments_template('/assignment-textarea.php',true); 
                                        break;
                                        
                                    }
                                 }else{
                                    comments_template('/assignment-upload.php',true); 
                                 }
                                break;
                                case 2:
                                $asmnt_init = WPLMS_Assignments::init();
                                $asmnt_init->get_assignment_result($post->ID,$user_id);
                                break;
                                case 3:
                                $asmnt_init = WPLMS_Assignments::init();
                                $asmnt_init->get_assignment_result($post->ID,$user_id);
                                break;
                            }
                            ?>
                        </div>
                        <?php do_action('wplms_assignment_after_content'); ?> 
                    </div>
                <?php
           

                ?>
            </div>
            <div class="col-md-4 col-sm-5">
                <div class="assignment_details">
                <?php
                    if(isset($marks) && is_numeric($marks)){
                        echo '<div class="assignment_marks">';
                        echo '<h2>'.$marks.'<span>'.__('Maximum Marks','vibe').'</span></h2>';
                        echo '</div>';
                    }
                    if(isset($time) && is_numeric($time)){
                        echo '<div class="assignment_duration">';
                        the_assignment_timer($time);
                        echo '</div>';
                    }
                ?>
                </div>
                <?php       
                    if(isset($_GET['edit']) || isset($wp_query->query_vars['edit']) ){
                        do_action('wplms_front_end_assignment_controls');    
                    }
                   ?>
            </div>
        </div>
        <?php
        do_action('wplms_after_assignment');
        $post = $_global; 
        $withcomments = $_withcomments;      
    }

    
}

WPLMS_Assignments_Process::init();
