<?php

if ( is_user_logged_in() ) :
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
	<div class="popup_overlay"></div>
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
	<?php
endif;
?>
