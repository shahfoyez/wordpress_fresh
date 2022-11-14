<?php
if ( ! defined( 'ABSPATH' ) ) exit;




if(!class_exists('WPLMS_Course_Quiz'))
{   
    class WPLMS_Course_Quiz
    {
    	public static $instance;
        public static function init(){
            if ( is_null( self::$instance ) )
                self::$instance = new WPLMS_Course_Quiz();
            return self::$instance;
        }

    	function __construct(){

            
            add_filter('wplms_unit_classes',array($this,'wplms_unit_classes'),10,2);
            
    		add_action('wplms_front_the_quiz',array($this,'add_react_app_single_quiz'));

            add_action('wplms_inside_quiz_main_unit_content',array($this,'add_react_app_course_status'));

            add_action('wplms_after_start_course',array($this,'add_react_scripts_course_status'));

            add_action('wplms_submit_quiz',array($this,'reset_quiz_saved_answers'),10,2);
            add_action('wplms_quiz_retake',array($this,'reset_quiz_saved_answers'),10,2);
            add_action('wplms_quiz_reset',array($this,'reset_quiz_saved_answers'),10,2);
            add_action('wplms_quiz_course_retake_reset',array($this,'reset_quiz_saved_answers'),10,2);
            

            add_filter('bp_course_get_quiz_results_meta',array($this,'check_manual_quiz_meta'),10,4);
            add_action('wplms_quiz_retake',array($this,'reset_manual_quiz_meta'),10,2);
            add_action('wplms_quiz_reset',array($this,'reset_manual_quiz_meta'),10,2);
            add_action('wplms_quiz_course_retake_reset',array($this,'reset_manual_quiz_meta'),10,2);

            if(class_exists('BP_Course_Action')){
                $actions = BP_Course_Action::init();
                remove_action('wplms_after_quiz_message',array($actions,'show_quiz_results_after_quiz_message'),10,2);
            }
		}

        function reset_quiz_saved_answers($quiz_id,$user_id){
            delete_user_meta($user_id,'quiz_saved_answers'.$quiz_id);
        }

        function reset_manual_quiz_meta($quiz_id,$user_id){
            delete_user_meta($user_id,'manual_intermediate_results'.$quiz_id);
        }

        function check_manual_quiz_meta($result,$quiz_id,$user_id,$activity_id){
            if(!empty($result))
                return $result;
            $check_meta = get_user_meta($user_id,'manual_intermediate_results'.$quiz_id,true);
            if(!empty($check_meta)){
                $result = $check_meta;
            } 
            return $result;
        }

        function add_react_scripts_course_status(){
            ?>
            <script>
                
                jQuery('.unit_content').on('unit_traverse',function(){
                    var postevent = new CustomEvent('unit_traverse', { "detail":''});
                    document.dispatchEvent(postevent);
                });
                document.addEventListener('react_quiz_submitted',function(e){
                    $ = jQuery;
                    var nextunit = (e.detail && e.detail.next_unit)?e.detail.next_unit:0;
                    
                    if(nextunit){
                        $('#next_unit').removeClass('hide');
                        $('#next_unit').attr('data-unit',nextunit);  
                        $('#next_quiz').removeClass('hide');
                        $('#next_quiz').attr('data-unit',nextunit); 
                        $('#unit'+nextunit).find('a').addClass('unit');
                        $('#unit'+nextunit).find('a').attr('data-unit',nextunit);
                    }else{ 
                        if(nextunit != 0){ 
                            $('#next_unit').removeClass('hide');
                        }
                    }

                    $('.in_quiz').trigger('question_loaded');
                    
                    
                    $('#unit'+$('#unit.quiz_title').attr('data-unit')).addClass('done');
                    $('body').find('.course_progressbar').removeClass('increment_complete');
                    $('body').find('.course_progressbar').trigger('increment');
                     
                });
            </script>
            <?php
            $this->wplms_quiz(null,false,true);
        }

        function wplms_unit_classes($unit_class,$id){
            $react_quizzes = 0;
            if(class_exists('WPLMS_tips')){
              $tips = WPLMS_tips::init();
              if(is_user_logged_in() && isset($tips) && isset($tips->settings) && !empty($tips->settings['react_quizzes'])){
                  $react_quizzes = 1;
              }
            }
            if($react_quizzes){
                $unit_class .= ' react_quiz';
            }
            return $unit_class;
        }
        
		function add_react_app_single_quiz($quiz_id){
            echo '<div id="wplms_quiz" data-id="'.$quiz_id.'"></div>';
            wp_nonce_field('security','hash');
            $this->wplms_quiz($quiz_id,false,false);
            ?>
            <script>
                jQuery('body').delegate('input[name="initiate_retake"]','click',function(e){
                    e.preventDefault();
                    $ = jQuery;
                    $.ajax({
                        type: "POST",
                        url: ajaxurl,
                        data: { action: 'retake_inquiz', 
                              security: $('#hash').val(),
                              quiz_id:'<?php echo $quiz_id;?>',
                            },
                        cache: false,
                        success: function (html) {
                            window.location.reload();
                        }
                    });
                });
                jQuery('body').delegate('#prev_results a','click',function(event){
                      event.preventDefault();
                      jQuery(this).toggleClass('show');
                      jQuery('.prev_quiz_results').toggleClass('show');
                });
            </script>
            <?php
		}

        function add_react_app_course_status($quiz_id){
            echo '<div id="wplms_quiz" data-id="'.$quiz_id.'" data-type="incourse"></div>';
            
            
        }

        function wplms_quiz($quiz_id,$ajax=false,$in_course){
            $is_take_course = 0;
            if(!is_singular('quiz')){
                $is_take_course =1;
            }
            
            $user_id = get_current_user_id();
            
            $token= '';
            if(!empty($user_id)){
                $tokens  = get_user_meta($user_id,'access_tokens',true);
                if(!empty($tokens) && !empty($tokens)){
                    $token = $tokens[0];
                }
                if(empty($token) && class_exists('BP_Course_Action')){
                    $generated_token = BP_Course_Action::generate_token($user_id,'wplms_generated_for_quiz_'.$quiz_id);
                    $token = $generated_token['access_token'];
                }
            }
            
            $wplms_quiz_data = apply_filters('wplms_wplms_quiz_tab_settings',array(

                'api_url'=> get_rest_url(null,BP_COURSE_API_NAMESPACE),
                'user_id'=>get_current_user_id(), 
                'timestamp'=>time(),
                'token'=>$token,
                'quiz_id'=>$quiz_id,
                'in_course' =>$in_course,
                'start_popup'=>false,
                'submit_popup'=>false,
                'translations'=>array(
                    'date'=>_x('Date','react quiz','vibe'),
                    'is_take_course'=>$is_take_course,
                    'select_option'=>_x('Select Option','react quiz','vibe'),
                    'course'=>_x('Course','react quiz','vibe'),
                    'quiz'=>_x('Quiz','react quiz','vibe'),
                    'true' => _x('True','react quiz','vibe'),
                    'false' => _x('False','react quiz','vibe'),
                    'start'=>_x('Start Quiz','react quiz','vibe'),
                    'continue'=>_x('Continue Quiz','react quiz','vibe'),
                    'submit'=>_x('Submit Quiz','react quiz','vibe'),
                    'reset'=>_x('Reset','react quiz','vibe'),
                    'start_quiz'=>_x('Start quiz','react quiz','vibe'),
                    'continue_quiz'=>_x('Start quiz','react quiz','vibe'),
                    'check_answer'=>_x('Check Answer','react quiz','vibe'),
                    'expired' => _x('Expired','react quiz','vibe'),
                    'days' => _x('Days','react quiz','vibe'),
                    'hours' => _x('Hours','react quiz','vibe'),
                    'minutes' => _x('Minutes','react quiz','vibe'),
                    'seconds' => _x('Seconds','react quiz','vibe'),
                    'correct_answer' => _x('Correct Answer','react quiz','vibe'),
                    'question' => _x('QUESTION','react quiz','vibe'),
                    'check_results' => _x('Check Results','react quiz','vibe'),
                    'save_quiz' => _x('Save Quiz','react quiz','vibe'),
                    'yes'=>_x('Yes','react quiz','vibe'),
                    'no'=>_x('No','react quiz','vibe'),
                    'start_quiz_confirm'=>_x('Do you really want to start the quiz?','react quiz','vibe'),
                    'submit_quiz_confirm'=>_x('Do you really want to submit the quiz?','react quiz','vibe'),
                    'unanswered_confirm'=>_x('You have some unanswered questions.','react quiz','vibe'),
                    'total_marks' => _x('Total Marks','react quiz','vibe'),
                    'unattempted' =>_x('Unattempted','react quiz','vibe'),
                    'correct' => _x('Correct','react quiz','vibe'),
                    'correct_percentage' => _x('Correct Percentage','react quiz','vibe'),
                    'incorrect'=>_x('Incorrect','react quiz','vibe'),
                    'historical' => _x('Overall correct percentages by each question','react quiz','vibe'),
                    'q' => _x('Q','Advance stats for question in quiz result react quiz','vibe'),
                ),
            ));
            $color = '#54bbff';
            if(function_exists('bp_wplms_get_theme_color') && !empty(bp_wplms_get_theme_color())){
                $color = bp_wplms_get_theme_color();
            }
            echo '<style>
            .single-quiz .content .question{
                font-size:inherit;
                border-bottom:none;
            }
            .quiz_questions_content .quiz_pagination ul li a.active{
                background:'.$color.';
            }
            .circle_timer .slice .bar,.pie, .c100 .bar, .c100.p51 .fill, .c100.p52 .fill, .c100.p53 .fill, .c100.p54 .fill, .c100.p55 .fill, .c100.p56 .fill, .c100.p57 .fill, .c100.p58 .fill, .c100.p59 .fill, .c100.p60 .fill, .c100.p61 .fill, .c100.p62 .fill, .c100.p63 .fill, .c100.p64 .fill, .c100.p65 .fill, .c100.p66 .fill, .c100.p67 .fill, .c100.p68 .fill, .c100.p69 .fill, .c100.p70 .fill, .c100.p71 .fill, .c100.p72 .fill, .c100.p73 .fill, .c100.p74 .fill, .c100.p75 .fill, .c100.p76 .fill, .c100.p77 .fill, .c100.p78 .fill, .c100.p79 .fill, .c100.p80 .fill, .c100.p81 .fill, .c100.p82 .fill, .c100.p83 .fill, .c100.p84 .fill, .c100.p85 .fill, .c100.p86 .fill, .c100.p87 .fill, .c100.p88 .fill, .c100.p89 .fill, .c100.p90 .fill, .c100.p91 .fill, .c100.p92 .fill, .c100.p93 .fill, .c100.p94 .fill, .c100.p95 .fill, .c100.p96 .fill, .c100.p97 .fill, .c100.p98 .fill, .c100.p99 .fill, .c100.p100 .fill{
               border: 0.1em solid '.$color.' !important;
            }
            </style>';




            

            if($ajax){
                /***********************Test**********************/
                echo '<script>var wplms_quiz_data = '.json_encode($wplms_quiz_data).'</script>';

                //development
                //echo '<script type="text/javascript" src="'.plugins_url('/js/quiz/questions/dist/js/bundle.js',__FILE__).'?ver='.BP_COURSE_MOD_VERSION.'"></script>';

                //live
                echo '<script type="text/javascript" src="'.plugins_url('/js/reactquiz.js',__FILE__).'?ver='.BP_COURSE_MOD_VERSION.'"></script>';

                echo '<link rel="stylesheet" id="wplms-wplms_quiz-circle-css-css"  href="'.plugins_url('../includes/css/circle.css',__FILE__).'?ver='.BP_COURSE_MOD_VERSION.'" type="text/css" media="all" />';
            }else{
                /***********************Test**********************/

                //development
                //wp_enqueue_script('wplms-quiz-js',plugins_url('/js/quiz/questions/dist/js/bundle.js',__FILE__),array('wp-element'),rand(1,99),true);

                //live
                wp_enqueue_script('wplms-quiz-js',plugins_url('/js/reactquiz.js',__FILE__),array('wp-element'),BP_COURSE_MOD_VERSION,true);

                wp_localize_script('wplms-quiz-js','wplms_quiz_data',$wplms_quiz_data);
                wp_enqueue_style( 'wplms-wplms_quiz-circle-css', plugins_url('../includes/css/circle.css',__FILE__),array(),BP_COURSE_MOD_VERSION);
            }
        }
	}
	add_action('init',function(){
		WPLMS_Course_Quiz::init();
	});
}
