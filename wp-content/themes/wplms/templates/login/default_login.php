<style>
    .mooc .foy_vibe_bp_login {
        top: 50% !important;
        right: 0px !important;
        left: 0px !important;
        width: 100% !important;
        transform: translateY(10%) !important;
        border-radius: 8px !important;  
        background: #F8FAFC !important;
        padding: 0px !important;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }
    .foy-pop.row.align-items-center {
        display: flex;
        margin: 0px;
    }
    .foy-login-container {
        max-width: 710px;
    }
    .foy-vibe_bp_login:after {
        display: none;
    }
    .foy-d-block{
        display: block;
    }
    .foy-pop-left{
        background: #55539B;
    }
    .foy-pop-left{
        border-radius: 8px 0px 0px 8px;
        padding: 30px 30px 25px 30px;
    }
    .foy-pop-right{
        border-radius: 0px 8px 8px 0px;
        padding: 15px 30px 0px 30px;
    }
    .foy-pop-left h2 {
        font-family: 'poppins';
        font-style: normal;
        font-weight: 400;
        font-size: 14px;
        color: #FFFFFF;
        text-transform: none;
        margin: 30px 0px;
    }
    .foy-pop-right h2 {
        text-align: center;
        font-family: 'poppins';
        text-transform: none;
        font-weight: 700;
        font-size: 18px;
        color: #2B354E;
    }
    .foy-divider {
        margin: 30px 0px 0px 0px;
    }
    .foy-right-contents {
        padding: 15px 25px 25px 25px !important;
    }
    .foy-right-contents input#side-user-login {
        background: #FFFFFF !important;
        padding: 10px;
        border: 0.810671px solid #D9E0EA !important;
        border-radius: 4px !important;
    }
    .foy-right-contents input#sidebar-user-pass {
        background: #FFFFFF !important;
        padding: 10px;
        border: 0.810671px solid #D9E0EA !important;
        border-radius: 4px !important;
    }
    #vibe_bp_login label {
        color: #2B354E !important;
        font-weight: 500;
        font-size: 14px;
        text-transform: none;
    }
    #vibe_bp_login #vbp-login-form .checkbox label:before {
        background: rgb(255 255 255 / 10%);
        border: 0.526936px solid #d7d7d7;
        margin-top: 0px;
        width: 20px;
        height: 20px;
        border-radius: 2px;
    }
    .foy-right-contents input#sidebar-wp-submit {
        width: 100%;
        background: #ED4266 !important;
        border-radius: 4px !important;
        padding: 10px;
        text-transform: none;
        font-family: 'poppins';
        margin: 10px 0px;
    }
    .foy-right-contents .checkbox>input[type=checkbox]:checked+label:after {
        left: 2px;
        top: 2px;
        font-size: 16px !important;
        color: #666;
    }
    .foy-right-contents a.tip.vbpforgot {
        color: #553C8B;
        text-transform: none;
        font-weight: 700;
        font-size: 13px;
    }
    .foy-right-contents a.tip.vbpforgot:hover {
        color: #2a1062 !important;
    }
    #vibe_bp_login input[type=text], #vibe_bp_login input[type=password], #vibe_bp_login input[type=email] {
        color: #000 !important;
    }
    .foy-right-bottom {
        margin-top: 20px;
    }
    .foy-rb-top{
        display: flex;
        align-items: center;
    }
    .foy-rb-top p{
        margin: 0px !important;
        font-family: 'poppins';
        font-weight: 500;
        font-size: 13px;
        color: #2B354E;
    }
    .foy-rb-top hr {
        width: 20%;
        margin-top: 0px;
        margin-bottom: 0px;
        border-top: 1px solid #D9E0EA;
    }
    .foy-social-login{
        display: flex;
        justify-content: center;
        gap: 20px;
        margin: 20px 0px 35px 0px;
    }
    .foy-social-login img {
        border: 1px solid #D9E0EA;
        padding: 12px;
        border-radius: 3px;
    }
    .foy-signup{
        display: flex;
        justify-content: center;
    }
    .foy-signup p {
        color: #2B354E;
        text-transform: none;
        font-weight: 500;
        font-size: 14px;
        font-family: 'poppins';
    }
    .foy-signup a.foy-su {
        color: #ED4275;
        font-weight: 600;
    }
    .foy-signup a.foy-su:hover {
        color: #d50000 !important;
    }
    .mooc .foy_vibe_bp_login:after {
        display: none;
    }
    .foy-right-contents .nsl-container.nsl-container-block.nsl-container-embedded-login-layout-below {
        text-align: center;
    }
    
    @media only screen and (min-width: 320px) and (max-width: 767px) {
        .foy-login-container {
            margin: 10px;
        }
        .foy-pop.row.align-items-center {
            display: block;
        }
        .sleek .foy-vibe_bp_login {
            transform: translateY(5%) !important;
        }
        .foy-pop-left{
            display: none;
        }
    }
</style>
<?php

  if ( is_user_logged_in() && function_exists('bp_loggedin_user_avatar')) :
    do_action( 'bp_before_sidebar_me' ); ?>
    <div id="sidebar-me">
      <div id="bpavatar">
        <?php bp_loggedin_user_avatar( 'type=full' ); 
        $show_view_profile = apply_filters('wplms_sidebarme_show_view_profile',1);
        ?>
      </div>
      <ul>
        <li id="username"><a href="<?php bp_loggedin_user_link(); ?>"><?php bp_loggedin_user_fullname(); ?></a></li>
        <?php do_action('wplms_header_top_login'); ?>
        <?php if($show_view_profile){?>
          <li><a href="<?php echo bp_loggedin_user_domain() . BP_XPROFILE_SLUG ?>/" title="<?php _e('View profile','vibe'); ?>"><?php _e('View profile','vibe'); ?></a></li>
        <?php } ?>
        <li id="vbplogout"><a href="<?php echo wp_logout_url( get_permalink() ); ?>" id="destroy-sessions" rel="nofollow" class="logout" title="<?php _e( 'Log Out','vibe' ); ?>"><i class="icon-close-off-2"></i> <?php _e('LOGOUT','vibe'); ?></a></li>
        <li id="admin_panel_icon"><?php if (current_user_can("edit_posts"))
                 echo '<a href="'.vibe_site_url() .'wp-admin/" title="'.__('Access admin panel','vibe').'"><i class="icon-settings-1"></i></a>'; ?>
            </li>
        <?php 

        if(vibe_get_option('wp_admin_access') > 1){
        ?>
        <li id="admin_panel_icon"><?php if (current_user_can("edit_posts"))
             echo '<a href="'.vibe_site_url() .'wp-admin/" title="'.__('Access admin panel','vibe').'"><i class="icon-settings-1"></i></a>'; ?>
          </li>
          <?php
          }
          ?>
      </ul> 
      <ul>
    <?php
    $loggedin_menu = array(
      'courses'=>array(
                  'icon' => 'icon-book-open-1',
                  'label' => __('Courses','vibe'),
                  'link' => bp_loggedin_user_domain().BP_COURSE_SLUG
                  ),
      'stats'=>array(
                  'icon' => 'icon-analytics-chart-graph',
                  'label' => __('Stats','vibe'),
                  'link' => bp_loggedin_user_domain().BP_COURSE_SLUG.'/'.BP_COURSE_STATS_SLUG
                  )
      );
    if ( bp_is_active( 'messages' ) ){
      $loggedin_menu['messages']=array(
                  'icon' => 'icon-letter-mail-1',
                  'label' => __('Inbox','vibe').(messages_get_unread_count()?' <span>' . messages_get_unread_count() . '</span>':''),
                  'link' => bp_loggedin_user_domain().BP_MESSAGES_SLUG
                  );
    }
    if ( bp_is_active( 'notifications' ) ){  
      $n=vbp_current_user_notification_count();
      $loggedin_menu['notifications']=array(
                  'icon' => 'icon-exclamation',
                  'label' => __('Notifications','vibe').(($n)?' <span>'.$n.'</span>':''),
                  'link' => bp_loggedin_user_domain().BP_NOTIFICATIONS_SLUG
                  );
    }
    if ( bp_is_active( 'groups' ) ){
      $loggedin_menu['groups']=array(
                  'icon' => 'icon-myspace-alt',
                  'label' => __('Groups','vibe'),
                  'link' => bp_loggedin_user_domain().BP_GROUPS_SLUG 
                  );
    }
    
    $loggedin_menu['settings']=array(
                  'icon' => 'icon-settings',
                  'label' => __('Settings','vibe'),
                  'link' => bp_loggedin_user_domain().BP_SETTINGS_SLUG
                  );
    $loggedin_menu = apply_filters('wplms_logged_in_top_menu',$loggedin_menu);
    foreach($loggedin_menu as $item){
      echo '<li><a href="'.$item['link'].'"><i class="'.$item['icon'].'"></i>'.$item['label'].'</a></li>';
    }
    ?>
      </ul>
    
    <?php
    do_action( 'bp_sidebar_me' ); ?>
    </div>
    <?php do_action( 'bp_after_sidebar_me' );
  
  /***** If the user is not logged in, show the log form and account creation link *****/
  
  else :
    if(!isset($user_login))$user_login=''; 
    do_action( 'bp_before_sidebar_login_form' ); ?>
    <!-- <div class="popup_overlay"></div> -->
    <div class="foy-pop row align-items-center">
      <div class="col-md-5 col-sm-12 foy-pop-left">
        <div class="foy-left-contents">
          <img class="foy-d-block" src="https://www.oneeducation.org.uk/wp-content/uploads/2022/10/Group-1000002812-1.png">
          <img class="foy-divider" src="https://www.oneeducation.org.uk/wp-content/uploads/2022/10/Rectangle-3063-1.png">
          <h2>
            Registering for this site is easy. Just fill in the fields below, and we'll get a new account set up for you in no time.
          </h2>
          <img src="https://www.oneeducation.org.uk/wp-content/uploads/2022/10/Group-1000002811-1.png">
        </div>
      </div>
      <div class="col-md-7 col-sm-12 foy-pop-right">
        <h2>
          Sign in to your One Education account
        </h2>
        <div class="foy-right-contents">
          <form name="login-form" id="vbp-login-form" class="standard-form" action="<?php echo apply_filters('wplms_login_widget_action',site_url( 'wp-login.php', 'login_post' )); ?>" method="post">
            <div class="inside_login_form">
              <input type="text" name="log" id="side-user-login" class="input" tabindex="1" value="<?php echo esc_attr( stripslashes( $user_login ) ); ?>" placeholder="Username"/>
            
              <input type="password" tabindex="2" name="pwd" id="sidebar-user-pass" class="input" value="" placeholder="Password"/>
        
              <div class="checkbox small">
                  <input type="checkbox" name="sidebar-rememberme" id="sidebar-rememberme" value="forever" /><label for="sidebar-rememberme"><?php _e( 'Keep me signed in until I sign out', 'vibe' ); ?></label>
              </div>
              
              <?php do_action( 'bp_sidebar_login_form' ); ?>
              
              <input type="submit" name="user-submit" id="sidebar-wp-submit" data-security="<?php echo wp_create_nonce('wplms_signon'); ?>" value="<?php _e( 'Sign In','vibe' ); ?>" tabindex="100" />
              <input type="hidden" name="user-cookie" value="1" />
              
              <div>
                <a href="<?php echo wp_lostpassword_url(); ?>" tabindex="5" class="tip vbpforgot" title="<?php _e('Forgot Password','vibe'); ?>">
                  Forgot Password?
                </a>
              </div>
              <div class="foy-right-bottom">
                <div class="foy-rb-top">
                  <hr>
                  <p>OR CONTINUE WITH</p>
                  <hr>
                </div>
                <div class="foy-signup">
                   <p>Not a member yet?<a href="https://www.oneeducation.org.uk/register/" class="foy-su"> Sign up</a></p>
                </div>
              </div>
            </div>    
          </form>
        </div>
        
      </div>
    </div>
    
    <?php do_action( 'bp_after_sidebar_login_form' );
  endif;
