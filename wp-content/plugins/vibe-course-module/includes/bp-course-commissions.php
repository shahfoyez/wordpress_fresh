<?php
/**
 * Commissions Payouts for courses
 *
 * @author      VibeThemes
 * @category    Admin
 * @package     Vibe Course Module
 * @version     1.0
 */
 
 if ( ! defined( 'ABSPATH' ) ) exit;  

class BP_Course_Commissions{

    public static $instance;
    public static function init(){
    if ( is_null( self::$instance ) )
        self::$instance = new BP_Course_Commissions();

        return self::$instance;
    }
    protected static $did_script = false;
    private function __construct(){



        add_action( 'bp_setup_nav', array($this,'adding_ccommissions_setup_nav' ),10);
		add_action( 'init', array($this,'change_payouts_structure' ),10);

        //Touchpoints settings
        add_action('init',array($this,'check_touchpoints'));
        add_filter('wplms_touch_points',array($this,'add_commissions_touch_point'));

        // Mails and notifications
        add_filter('bp_course_all_mails',array($this,'set_format_for_emails'));
        add_filter( 'bp_course_format_notifications',array($this,'set_format_for_notifications') ,11,5);


        add_action('wplms_request_payouts',array($this,'add_payout_requested_activity'),10,2);
        add_action('wplms_payout_paid',array($this,'add_payout_paid_activity'),10,3);

        $this->date_format_map = array(
            'F j, Y' => 'MM d, yy',
            'Y-m-d' => 'yy-mm-dd',
            'm/d/Y' => 'mm/dd/yy',
            'd/m/Y' => 'dd/mm/yy',
        );
        $this->date_format = get_option('date_format');
		
	}

    function add_payout_requested_activity($user_id, $time){
        if(!function_exists('bp_course_record_activity') || !function_exists('bp_course_record_activity_meta'))
            return;
        $date_format = get_option('date_format');

        $activity_id = bp_course_record_activity(array(
                    'user_id' => $user_id,
                    'action' => _x('Commission payout requested','Payout request for activity action','vibe'),
                    'content' => sprintf(_x('Instructor %s requested for commission payout on %s','Payout request for activity action','vibe'),bp_core_get_userlink($user_id),date($date_format,$time)),
                    'component' => 'course',
                    'type' => 'wplms_commissions_request_payout',
                    'item_id' => '',
                    'secondary_item_id' => false,
                    'hide_sitewide' => apply_filters('wplms_commissions_request_hide_sitewide',false,$user_id),
                ));


        if(!empty($activity_id) ){

            bp_course_record_activity_meta(array('id'=>$activity_id,'meta_key'=>'wplms_request_payout_'.$user_id,'meta_value'=>$time));
        }
    }

    function add_payout_paid_activity($user_id, $cummission, $currency){
        $amount = $cummission.' '.$currency;
        if(!function_exists('bp_course_record_activity') || !function_exists('bp_course_record_activity_meta'))
            return;
        $date_format = get_option('date_format');
        $activity_id = bp_course_record_activity(array(
                    'user_id' => $user_id,
                    'action' => _x('Commission payout paid','Payout paid activity','vibe'),
                    'content' => sprintf(_x('Paid %s commission to Instructor %s on %s','Payout paid activity','vibe'),$amount,bp_core_get_userlink($user_id),date($date_format,time())),
                    'component' => 'course',
                    'type' => 'wplms_commissions_payout_paid',
                    'item_id' => '',
                    'secondary_item_id' => false,
                    'hide_sitewide' => apply_filters('wplms_commissions_paid_hide_sitewide',false,$user_id),
                ));


        if(!empty($activity_id) ){

            bp_course_record_activity_meta(array('id'=>$activity_id,'meta_key'=>'wplms_payout_paid_'.$user_id,'meta_value'=>$time));
        }
    }


    function set_format_for_notifications($notification, $action, $item_id, $secondary_item_id, $total_items){
        
        switch ($action) {
            case 'instructor_requested_payout':
                $notification = _x('You requested for commission payout','Payout requested','vibe');
                break;
            
            case 'admin_payout_paid':
                $notification = sprintf(_x('Payment of %s is paid you','Payout paid','vibe'),$secondary_item_id);
                break;
            case 'instructor_requested_payout_admin':
                $notification = sprintf(_x('Instructor %s requested for payouts','Payout requested','vibe'),bp_core_get_userlink($item_id));
                break;
            
            case 'admin_payout_paid_admin':
                $notification = sprintf(_x('Payment of %s is paid to Instructor %s','Payout paid','vibe'),$secondary_item_id, bp_core_get_userlink($item_id) );
                break;
            
        }
        return $notification;
    }

    function set_format_for_emails($bp_emails){
        //for payout request
        $bp_emails['instructor_requested_payout_mail_to_instructor']=array(
        'description'=> __('You requested for payout','vibe'),
        'subject' =>  sprintf(__('You requested for payout','vibe')),
        'message' =>  sprintf(__('You requested for payout on %s','vibe'),'{{request.time}}'),
        );

        $bp_emails['instructor_requested_payout_mail_to_admin']=array(
        'description'=> __('Instructor requested for payout','vibe'),
        'subject' =>  sprintf(__('Instructor %s requested for payout','vibe'),'{{{instructor.userlink}}}'),
        'message' =>  sprintf(__('Instructor %s requested for payout on %s','vibe'),'{{{instructor.userlink}}}','{{request.time}}'),
        );


        //for paid payouts
        $bp_emails['admin_payout_paid_mail_to_instructor']=array(
        'description'=> __('Payout paid for instructor','vibe'),
        'subject' =>  sprintf(__('Payment of %s is paid to You','vibe'),'{{payment.amount}}'),
        'message' => sprintf(__('Payment of %s is paid to You on %s','vibe'),'{{payment.amount}}', '{{payment.time}}'),
        );

        $bp_emails['admin_payout_paid_mail_to_admin']=array(
        'description'=> __('Payout paid for instructor','vibe'),
        'subject' =>  sprintf(__('Payment of %s is paid to Instructor','vibe'),'{{payment.amount}}'),
        'message' => sprintf(__('Payment of %s is paid to Instructor %s on %s','vibe'),'{{payment.amount}}','{{{instructor.userlink}}}', '{{payment.time}}'),
        );
        return $bp_emails;
    }

    function add_commissions_touch_point ($settings){

        $settings['wplms_request_commission'] = array(
           'label' => __('Request Commission Payout','vibe'),
           'name' =>'wplms_request_commissions',
           'value' => array(
               'instructor' => admin_url('edit.php?taxonomy=bp-email-type&term=instructor_requested_payout_mail_to_instructor&post_type=bp-email'),
                'admin' => admin_url('edit.php?taxonomy=bp-email-type&term=instructor_requested_payout_mail_to_admin&post_type=bp-email'),
            ),
            'type' => 'touchpoint_admin',
            'hook' => 'wplms_request_payouts',
            'params'=>2,
        );
        $settings['wplms_paid_commission'] = array(
           'label' => __('Commissions Payout Paid','vibe'),
           'name' =>'wplms_paid_commission',
           'value' => array(
               'instructor' => admin_url('edit.php?taxonomy=bp-email-type&term=admin_payout_paid_mail_to_instructor&post_type=bp-email'),
                'admin' => admin_url('edit.php?taxonomy=bp-email-type&term=admin_payout_paid_mail_to_admin&post_type=bp-email'),
            ),
            'type' => 'touchpoint_admin',
            'hook' => 'wplms_payout_paid',
            'params'=>2,
        );
        return $settings;
    }

    function check_touchpoints(){

        if(class_exists('WPLMS_tips')){
            $wplms_settings = WPLMS_tips::init();
            if(!empty($wplms_settings->lms_settings) && !empty($wplms_settings->lms_settings['touch']))
            $this->lms_settings = $wplms_settings->lms_settings['touch'];
            
        }
        // print_r('-----------------------------------------------------------');
        // print_r($this->lms_settings['wplms_request_commissions']['instructor']);
        // print_r($this->lms_settings['wplms_paid_commission']['instructor']);
        // print_r('-----------------------------------------------------------');
        /////////////////////// PAYOUT REQUEST ACTION /////////////////////////////

        if(!empty($this->lms_settings) && !empty($this->lms_settings['wplms_request_commissions']['instructor']['message'])){
            add_action('wplms_request_payouts',array($this,'instructor_message_wplms_request_commission'),10,2);
        }
        if(!empty($this->lms_settings) && !empty($this->lms_settings['wplms_request_commissions']['admin']['message'])){
            add_action('wplms_request_payouts',array($this,'admin_message_wplms_request_commission'),10,2);
        }

        if(!empty($this->lms_settings) && !empty($this->lms_settings['wplms_request_commissions']['instructor']['notification'])){
            add_action('wplms_request_payouts',array($this,'instructor_notification_wplms_request_commission'),10,2);
        }
        if(!empty($this->lms_settings) && !empty($this->lms_settings['wplms_request_commissions']['admin']['notification'])){
            add_action('wplms_request_payouts',array($this,'admin_notification_wplms_request_commission'),10,2);
        }  
        //print_r($this->lms_settings);die;
        if(!empty($this->lms_settings) && !empty($this->lms_settings['wplms_request_commissions']['instructor']['email'])){
            add_action('wplms_request_payouts',array($this,'instructor_email_wplms_request_commission'),10,2);
        }
        if(!empty($this->lms_settings) && !empty($this->lms_settings['wplms_request_commissions']['admin']['email'])){
            add_action('wplms_request_payouts',array($this,'admin_email_wplms_request_commission'),10,2);
        }

        ///////////////////////////// PAYOUT PAID ACTIONS  /////////////////////////////

        if(!empty($this->lms_settings) && !empty($this->lms_settings['wplms_paid_commission']['instructor']['message'])){
            add_action('wplms_payout_paid',array($this,'instructor_message_wplms_commission_paid'),10,3);
        }
        if(!empty($this->lms_settings) && !empty($this->lms_settings['wplms_paid_commission']['admin']['message'])){
            add_action('wplms_payout_paid',array($this,'admin_message_wplms_commission_paid'),10,3);
        }

        if(!empty($this->lms_settings) && !empty($this->lms_settings['wplms_paid_commission']['instructor']['notification'])){
            add_action('wplms_payout_paid',array($this,'instructor_notification_wplms_commission_paid'),10,3);
        }
        if(!empty($this->lms_settings) && !empty($this->lms_settings['wplms_paid_commission']['admin']['notification'])){
            add_action('wplms_payout_paid',array($this,'admin_notification_wplms_commission_paid'),10,3);
        }  

        if(!empty($this->lms_settings) && !empty($this->lms_settings['wplms_paid_commission']['instructor']['email'])){
            add_action('wplms_payout_paid',array($this,'instructor_email_wplms_commission_paid'),10,3);
        }
        if(!empty($this->lms_settings) && !empty($this->lms_settings['wplms_paid_commission']['admin']['email'])){
            add_action('wplms_payout_paid',array($this,'admin_email_wplms_commission_paid'),10,3);
        }

        
    }

    //-----------------------------------------------------------------------
    //////////////////////// COMMISSION REQUESTED
    //-----------------------------------------------------------------------
    function instructor_message_wplms_request_commission($user_id,$time){
        
        $instructor_ids = array($user_id);

        $message = sprintf(__('You requested for payout on %s','vibe'), date($this->date_format,$time));
        if(bp_is_active('messages') && function_exists('bp_course_messages_new_message'))
          bp_course_messages_new_message( array('sender_id' => $user_id, 'subject' => __('Instructor requested for payouts','vibe'), 'content' => $message,   'recipients' => $instructor_ids ) );
    }

    function instructor_notification_wplms_request_commission($user_id,$time){
        $item_id = $user_id; //Passing instructor id in form of item id, use to show notification
        if(!function_exists('bp_course_add_notification'))
            return;
        bp_course_add_notification(array(
            'user_id' => $user_id,
            'item_id' => $item_id,
            'secondary_item_id' => $time,
            'component_action'  => 'instructor_requested_payout'
        ));
    }

    function instructor_email_wplms_request_commission($instructor_id,$time){
        $user = get_user_by( 'id', $instructor_id);
        $to = $user->user_email;
        $subject = sprintf(__('Instructor %s requested for payouts on %s','vibe'),bp_core_get_user_displayname($instructor_id),date($this->date_format,$time)); 
        $message = sprintf(__('Instructor %s requested for payouts on %s','vibe'),bp_core_get_userlink($instructor_id), $time);
            
        if(count($to)){
            bp_course_wp_mail($to,$subject,$message,array('action'=>'instructor_requested_payout_mail_to_instructor','item_id'=>$instructor_id,'secondary_item_id'=>'','tokens'=>array('request.time'=>date($this->date_format,$time),'instructor.userlink'=>bp_core_get_userlink($instructor_id),'instructor.name'=>bp_core_get_user_displayname($instructor_id))));
        }
    }

    function admin_message_wplms_request_commission($user_id,$time){
        
        $bpcourse = bp_course_notifications::init();
        $admin = $bpcourse->get_admins();
        $admin_ids = Array();
        foreach($admin as $list){
            $admin_ids[] = $list['ID'];
        }
        $message = sprintf(__('Instructor %s requested for payouts on %s','vibe'),bp_core_get_userlink($user_id), date($this->date_format,$time));
        if(bp_is_active('messages') && function_exists('bp_course_messages_new_message'))
          bp_course_messages_new_message( array('sender_id' => $user_id, 'subject' => __('Instructor requested for payouts','vibe'), 'content' => $message,   'recipients' => $admin_ids ) );
    }

    function admin_notification_wplms_request_commission($user_id,$time){

        if(!function_exists('bp_course_add_notification'))
            return;

        $bpcourse = bp_course_notifications::init();
        $admin = $bpcourse->get_admins();
        $admin_ids = Array();
        foreach($admin as $list){
            bp_course_add_notification(array(
                'user_id' => $list['ID'],
                'item_id' => $user_id,
                'secondary_item_id' => $user_id,
                'component_action'  => 'instructor_requested_payout_admin'
            ));
        }        
    }

    function admin_email_wplms_request_commission($instructor_id,$time){  

        $bpcourse = bp_course_notifications::init();
        $admin = $bpcourse->get_admins();
        $to = Array();
        foreach($admin as $list){
            $to[] = $list['email'];
        }

        $subject = sprintf(__('Instructor %s requested for payouts on %s','vibe'),bp_core_get_user_displayname($instructor_id),date($this->date_format,$time)); 
        $message = sprintf(__('Instructor %s requested for payouts on %s','vibe'),bp_core_get_userlink($instructor_id), $time);
        if(count($to)){
            bp_course_wp_mail($to,$subject,$message,array('action'=>'instructor_requested_payout_mail_to_admin','item_id'=>$instructor_id,'secondary_item_id'=>'','tokens'=>array('request.time'=>date($this->date_format,$time),'instructor.userlink'=>bp_core_get_userlink($instructor_id),'instructor.name'=>bp_core_get_user_displayname($instructor_id))));
        }
    }
    //-----------------------------------------------------------------------
    //////////////////////// PAYOUTS PAID
    //-----------------------------------------------------------------------
    function instructor_message_wplms_commission_paid($user_id,$commission,$currency){
        
        $instructor_ids = array($user_id);
        $admin = get_current_user_id();
        $amount = $commission.''.$currency;

        $message = sprintf(__('Payment of %s is paid to You on %s','vibe'),$amount, date($this->date_format,time()));
        if(bp_is_active('messages') && function_exists('bp_course_messages_new_message'))
          bp_course_messages_new_message( array('sender_id' => $admin, 'subject' => __('payment paid to Instructor','vibe'), 'content' => $message,   'recipients' => $instructor_ids ) );
    }

    function instructor_notification_wplms_commission_paid($user_id,$commission,$currency){
        $amount = $commission.''.$currency;
        if(!function_exists('bp_course_add_notification'))
            return;
        bp_course_add_notification(array(
            'user_id' => $user_id,
            'item_id' => $user_id,
            'secondary_item_id' => $amount,
            'component_action'  => 'admin_payout_paid'
        ));
    }

    function instructor_email_wplms_commission_paid($user_id,$commission,$currency){
        $amount = $commission.''.$currency;
        $user = get_user_by( 'id', $user_id);
        $to = $user->user_email;

        $subject = sprintf(__('Payout paid for You on %s','vibe'),date($this->date_format,time())); 
        $message = sprintf(__('Payment of %s is paid to You on %s','vibe'),$amount, date($this->date_format,time()));
        if(count($to)){
            bp_course_wp_mail($to,$subject,$message,array('action'=>'admin_payout_paid_mail_to_instructor','item_id'=>$instructor_id,'secondary_item_id'=>'','tokens'=>array('payment.time'=>date($this->date_format,$time),'payment.amount'=>$amount,'instructor.userlink'=>bp_core_get_userlink($user_id),'instructor.name'=>bp_core_get_user_displayname($user_id))));
        }
    }

    //Admin functions

    function admin_message_wplms_commission_paid($user_id,$commission,$currency){

        $admin = get_current_user_id();
        $amount = $commission.''.$currency;

        $message = sprintf(__('Payment of %s is paid to Instructor %s on %s','vibe'),$amount, bp_core_get_userlink($user_id), date($this->date_format,time()));
        if(bp_is_active('messages') && function_exists('bp_course_messages_new_message'))
          bp_course_messages_new_message( array('sender_id' => $admin, 'subject' => __('payment paid to Instructor','vibe'), 'content' => $message,   'recipients' => $admin ) );

    }

    function admin_notification_wplms_commission_paid($user_id,$commission,$currency){

        $admin_id = get_current_user_id();
        $amount = $commission.''.$currency;
        if(!function_exists('bp_course_add_notification'))
            return;
        bp_course_add_notification(array(
            'user_id' => $admin_id,
            'item_id' => $user_id,
            'secondary_item_id' => $amount,
            'component_action'  => 'admin_payout_paid_admin'
        ));
    }

    function admin_email_wplms_commission_paid($user_id,$commission,$currency){
        $admin = get_current_user_id();
        $amount = $commission.' '.$currency;

        $bpcourse = bp_course_notifications::init();
        $admin = $bpcourse->get_admins();
        $to = Array();
        foreach($admin as $list){
            $to[] = $list['email'];
        }

        $subject = sprintf(__('Payout paid for Instructor %s on %s','vibe'),bp_core_get_user_displayname($user_id),date($this->date_format,time())); 
        $message = sprintf(__('Payment of %s is paid to Instructor %s on %s','vibe'),$amount, bp_core_get_userlink($user_id), date($this->date_format,time()));
        if(count($to)){
            
            bp_course_wp_mail($to,$subject,$message,array('action'=>'admin_payout_paid_mail_to_admin','item_id'=>$instructor_id,'secondary_item_id'=>'','tokens'=>array('payment.time'=>date($this->date_format,$time),'payment.amount'=>$amount,'instructor.userlink'=>bp_core_get_userlink($user_id),'instructor.name'=>bp_core_get_user_displayname($user_id))));
        }
    }


    function change_payouts_structure() {

        global $bp, $wpdb;
        $db_version = get_option('payout_db_version');
        if(empty($db_version)) {
            $payouts  = $wpdb->get_results( "
                                  SELECT post_id, meta_value 
                                  FROM {$wpdb->postmeta}
                                  WHERE meta_key = 'vibe_instructor_commissions'",ARRAY_A);
            if(!empty($payouts)){
                foreach($payouts as $payout) {
                    if(!is_array($payout['meta_value'])){
                        $payout_meta = unserialize($payout['meta_value']);
                    }
                    if(is_array($payout_meta)){
                        $post_id = $payout['post_id'];
                        foreach($payout_meta as $user_id => $meta) {

                            if($meta['commission'] > 0 && is_numeric($user_id)){

                                update_post_meta( $post_id, 'payout_'.$user_id, $meta['commission'] );
                                if(isset($meta['currency'])){
                                    update_post_meta( $post_id, 'currency_'.$user_id, $meta['currency'] );
                                }
                            }
                        } 
                    }
                }
            }
            
            update_option('payout_db_version', 1);
        }
    }

    function adding_ccommissions_setup_nav($user) {

        if(!current_user_can('edit_posts')) 
            return;

        global $bp;
        $parent_link = trailingslashit( bp_loggedin_user_domain() .'commissions' );

        $args = apply_filters('wplms_commissions_setup_nav',array(
            'name' => __( 'Commissions', 'vibe' ),
            'slug' => 'commissions',
            'default_subnav_slug' => 'commission',
            'show_for_displayed_user' => false,
            'position' => 80,
            'screen_function' => array($this,'action_commission_content'),
            'item_css_id' => 'commissions',
        ));

        bp_core_new_nav_item( $args );

        bp_core_new_subnav_item(
            array(
                'name'        => __( 'Commission', 'vibe' ),
                'slug'        => 'commission',
                'parent_slug'     => 'commissions',
                'parent_url'      => $parent_link,
                'show_for_displayed_user' => false,
                'screen_function' => array($this,'action_commission_content'),
                'position'    =>  30,
                'user_has_access' => (bp_is_my_profile() || current_user_can('manage_options')) // Only the logged in user can access this on his/her profile
            )
        );

        bp_core_new_subnav_item(
            array(
                'name'        => __( 'Payouts', 'vibe' ),
                'slug'        => 'payouts',
                'parent_slug'     => 'commissions',
                'show_for_displayed_user' => false,
                'parent_url'      => $parent_link,
                'screen_function' => array($this,'action_payouts_content'),
                'position'    =>  60,
                'user_has_access' => (bp_is_my_profile() || current_user_can('manage_options')) // Only the logged in user can access this on his/her profile
            )
        ); 
    }

    function action_commission_content() {
        do_action( 'bp_course_action_commission_content' );
        add_action('wp_enqueue_scripts',array($this,'commissions_scripts'));

        add_action( 'bp_template_title', array( $this, 'commission_content_function_to_show_title' ) );
        add_action( 'bp_template_content', array( $this, 'commission_content_function_to_show_content' ) );
        bp_core_load_template( apply_filters( 'bp_course_template_commission_content', 'members/single/home' ) );

    }

    function action_payouts_content() {
        do_action( 'bp_course_action_payouts_content' );

        add_action('wp_enqueue_scripts',array($this,'payout_scripts'));
        add_action( 'bp_template_title', array( $this, 'payouts_content_function_to_show_title' ) );
        add_action( 'bp_template_content', array( $this, 'payouts_content_function_to_show_content' ) );
        bp_core_load_template( apply_filters( 'bp_course_template_payouts_content', 'members/single/home' ) );

    }

    function action_commissions() {

        add_action( 'bp_template_title',  array($this,'commissions_tab_screen_title' ),1);
        add_action( 'bp_template_content',  array($this,'commissions_tab_screen_content' ),1);
        bp_core_load_template( apply_filters( 'bp_core_template_plugin',  'members/single/plugins' ) );
    }

    function commissions_tab_screen_title() {
        echo '<h3>'.__("My commissions :","vibe").'</h3>';
    }

    function commissions_tab_screen_content() {
        echo apply_filters('commissions_tab_screen_content', '<div>
                <p>'.__("You can check out commissions here :","vibe").'</p>
            </div>');
    } 

    function commission_content_function_to_show_title() {
        echo '<h3>'.__("Commissions :","vibe").'</h3>';
    }

    function commission_content_function_to_show_content() {
        echo apply_filters('commission_content_function_to_show_content', 
            '<div id= "commission_content"> </div>');
    }

    function payouts_content_function_to_show_title() {
        echo '<h3>'.__("Payouts :","vibe").'</h3>';
    }

    function payouts_content_function_to_show_content() {
        echo apply_filters('payouts_content_function_to_show_content', 
            '<div id= "payouts_content"></div>');
    } 

    function commissions_scripts(){
        global $bp;
        if(!self::$did_script ){
            $components = apply_filters('wplms_dashboard_widget_scripts',array('commissions'));
            if(in_array($bp->current_component,$components)){ 
                add_action('wp_enqueue_scripts',array($this,'commissions_styling'),99);
                $this->wplms_commissions_enqueue_scripts('commission');
            }
        
          self::$did_script = true;
        } 
        
    }

    function payout_scripts(){
        global $bp;
        if(!self::$did_script ){
          
          $components = apply_filters('wplms_dashboard_widget_scripts',array('commissions'));
            if(in_array($bp->current_component,$components)){ 
                add_action('wp_enqueue_scripts',array($this,'commissions_styling'),99);
                $this->wplms_commissions_enqueue_scripts('payout');
            }
        
          self::$did_script = true;
        } 
        
    }

    function commissions_styling() {
            echo '
            <style>
                .commissions .searchStudent{
                    margin-top:10px;
                    position:relative;
                }
                .commissions .searchStudent input{
                    width: 100%;
                }
                .commissions .studentList{    
                    position: absolute;background: #fff;
                    border: 1px solid rgba(0,0,0,0.08);
                    padding: 10px;
                    width: 100%;
                    margin-top: 5px;
                    padding: 10px;
                    width: 100%;
                    margin-top: 5px;
                    max-height: 300px;
                    z-index: 9999;
                    overflow-y: scroll;
                }
                .commissions .studentDetails{
                        display: grid;
                        grid-template-columns: 28px 1fr;
                        grid-gap: 12px;
                        align-items: center;
                        margin-bottom: 10px; 
                }
                .commissions .studentDetails img{
                    border-radius:50%;
                    line-height: 1;
                }

                .commissionsloader svg {
                    display: inline-block;
                    width: 50px;
                    margin-left: calc(50% - 25px);
                }
                .record.recordHeader { 
                    border-top: 1px solid rgba(0,0,0,0.08); background: rgba(0,0,0,0.08); 
                }
                #commission_content .record{
                    display: grid;
                    grid-template-columns: 1fr 1fr 1fr 1fr;
                    grid-gap: 5px;border-bottom: 1px solid rgba(0,0,0,0.08); padding: 6px; border-left: 1px solid rgba(0,0,0,0.08); border-right: 1px solid rgba(0,0,0,0.08);
                }
                #payouts_content .record{
                    display: grid;
                    grid-template-columns: 1fr 1fr;
                    grid-gap: 5px;border-bottom: 1px solid rgba(0,0,0,0.08); padding: 6px; border-left: 1px solid rgba(0,0,0,0.08); border-right: 1px solid rgba(0,0,0,0.08);
                }
                #commission_content .react-datepicker-wrapper, #commission_content .react-datepicker__input-container, #payouts_content .react-datepicker-wrapper, #payouts_content .react-datepicker__input-container {width: 100%;}
                .startDate, .endDate{height: 35px; border: 1px solid rgba(0,0,0,0.1);}
                .startDate input, .endDate input{border:none; width:100%;}
                .selectCourses select{margin-bottom:0;}
                #commission_content .commissionsSorter{
                    padding: 10px 0;
                    display: grid; 
                    grid-template-columns: 1fr 1fr 1fr 1fr 1fr; 
                    align-items: center; 
                    grid-gap: 10px;
                }
                #commission_content .commissionsSorter select, #payouts_content .commissionsSorter select{
                    width: 100%;
                }
                #payouts_content .commissionsSorter{
                    padding: 10px 0;
                    display: grid; 
                    grid-template-columns: 1fr 1fr 1fr 1fr; 
                    align-items: center; 
                    grid-gap: 10px;
                }
                #payouts_content .request_payouts{
                    padding: 10px 0;
                    display: grid;
                    grid-template-columns: 5fr 1fr;
                    align-items: center;
                    grid-gap: 10px;
                }

                .commission #item-body, .payouts #item-body {
                        min-height: 500px;
                        margin-bottom: 50px;
                }

            </style>'; 
            
        }

    function wplms_commissions_enqueue_scripts($type) {
        $commissions_settings = apply_filters('wplms_commissions_tab_settings',array(

                'api_url'=> get_rest_url(null,BP_COURSE_API_NAMESPACE.'/commissions/'),
                'user_id'=>get_current_user_id(),    
                'type'=> $type,
                'security'=> urlencode(vibe_get_option('security_key')),
                'timestamp'=>time(),
                'per_page'=>10,
                'date_format'=>get_option('date_format'),
                'time_format'=>get_option('time_format'),
                'translations'=>array(
                    'date'=>_x('Date','api call','vibe'),
                    'course'=>_x('Course','api call','vibe'),
                    'commissions'=>_x('Commissions','api call','vibe'),
                    'present'=>_x('Present','api call','vibe'),
                    'absent'=>_x('Absent','api call','vibe'),
                    'showing'=>_x('Showing','api call','vibe'),
                    'of'=>_x('of','api call','vibe'),
                    'go'=>_x('Go','api call','vibe'),
                    'student'=>_x('Student','api call','vibe'),
                    'select_date'=>_x('Select a date','api call','vibe'),
                    'start_date'=>_x('Select start date','api call','vibe'),
                    'end_date'=>_x('Select end date','api call','vibe'),
                    'select_course'=>_x('Select a course','api call','vibe'),
                    'no_records'=>_x('No records found','api call','vibe'),
                    'select_student'=>_x('Select a student','api call','vibe'),
                    'search_student'=>_x('Search student','api call','vibe'),
                    'chart_commission'=>_x('Commission','api call','vibe'),
                    'commission_balance'=>_x('Commission Balance: ','api call','vibe'),
                    'payouts_balance'=>_x('Payouts Balance: ','api call','vibe'),
                    'select_currency'=>_x('Select Currency ','api call','vibe'),
                    'commission_payouts_text'=>_x('Congratulation! Commission is above threshold limit. You can request a payout.','api call','vibe'),
                    'commission_failed_payouts_text'=>_x('You can request a payout only if commission is above threshold limit.','api call','vibe'),
                    'request_payouts'=>_x('Request Payouts','api call','vibe'),
                    'requested_payouts'=>_x('Payout Requested','api call','vibe'),
                    'last_requested'=>_x('Last requested on','api call','vibe'),
                ),
        ));

/***********************Test**********************/
        // wp_enqueue_script('wplms-commissions-js','http://localhost:3000/static/js/bundle.js',array(),10,true);
        // wp_enqueue_script('wplms-commissions-js_0','http://localhost:3000/static/js/0.chunk.js',array(),10,true);
        // wp_enqueue_script('wplms-commissions-js_1','http://localhost:3000/static/js/1.chunk.js',array(),10,true);
        // wp_enqueue_script('wplms-commissions-js_main','http://localhost:3000/static/js/main.chunk.js',array(),10,true);

/***********************Live**********************/
        wp_enqueue_style( 'wplms-commissions-css', plugins_url('../includes/css/datepicker.css',__FILE__),array(),BP_COURSE_MOD_VERSION);
        wp_enqueue_script( 'wplms-commissions-js', plugins_url('../includes/js/wplms_commissions.js',__FILE__),array(),BP_COURSE_MOD_VERSION,true);

        wp_localize_script('wplms-commissions-js','wplms_commissions',$commissions_settings);
    }
}

BP_Course_Commissions::init();