<style>
    .mooc .foy_vibe_bp_login {
        top: 50% !important;
        right: 0px !important;
        left: 0px !important;
        width: 100% !important;
        /* transform: translateY(10%) !important; */
        border-radius: 8px !important;  
        background: #F8FAFC !important;
        padding: 0px !important;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }
    .foy-login-container {
        /* max-width: 710px; */
		width: 100% !important;
    }
    .foy-vibe_bp_login:after {
        display: none;
    }
    .foy-d-block{
        display: block;
    }
    .foy-pop-left{
        background: #55539B;
        border-radius: 0px 0px 0px 8px;
        padding: 30px 30px 25px 30px;
        min-height: 417px;
    }
    .foy-pop-right{
        border-radius: 0px 0px 8px 0px;
        padding: 15px 30px 0px 30px;
        background: #ffffff;
        min-height: 417px;
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
    .fade {
        opacity: 1 !important;
    }
    .foy_pop_top {
        background: url('<?php echo home_url()?>/wp-content/uploads/2023/01/login-bg.png') repeat top/100% auto;
        height: 160px;
        border-radius: 10px 10px 0px 0px;
    }
    .foy-pop-right h2 {
        text-align: center;
        font-family: 'poppins';
        text-transform: none;
        font-weight: 700;
        font-size: 18px;
        color: #2B354E;
        margin-top: 30px;
    }
    .foy-divider {
        margin: 30px 0px 0px 0px;
    }
    .foy-right-contents {
        padding: 15px 25px 25px 25px !important;
    }
    .foy-right-contents input#side-user-login {
        border: none;
        background: #f3f6f7;
        border-radius: 4px;
        color: #5d676e;
        font-size: 12px;
        height: 40px;
        padding-left: 15px;
    }
    .foy-right-contents input#sidebar-user-pass {
        border: none;
        background: #f3f6f7;
        border-radius: 4px;
        color: #5d676e;
        font-size: 12px;
        height: 40px;
        padding-left: 15px;
    }
   
    .foy-right-contents .checkbox>input[type=checkbox]:checked+label:after {
        left: 2px;
        top: 2px;
        font-size: 16px !important;
        color: #666;
    }
    .foy-right-contents a.tip.vbpforgot {
        color: #83c11f;
        text-transform: none;
        font-weight: 700;
        font-size: 12px;
    }
    .foy-right-contents a.tip.vbpforgot:hover {
        color: #83c11f !important;
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

	/* new css */
	.logged-out #vibe_bp_login .popup_login #vbp-login-form .inside_login_form {
		box-shadow: none;
	}
	.logged-out #vibe_bp_login .popup_login #vbp-login-form {
		width: 100%;
		margin: 0px;
	}
	.foy-pop.align-items-center {
		margin: 0 auto;
		width: 888px;
        border-radius: 10px 10px 0px 0px;
	}
    i#foy-close {
        float: right;
        padding: 7px;
        border-radius: 10px;
        font-size: 23px;
        font-weight: 200;
        color: #ffffff
    }
    .logged-out #vibe_bp_login .popup_login {
        transform: translateY(10%) !important;
    }
    .mooc .topmenu>li>a, .mooc nav>.menu>li>a, .sleek .topmenu>li>a, .sleek nav>.menu>li>a {
        color: #000 !important;
    }
    ul.nav.nav-tabs.ebtab.foy_pop_ul {
        width: 100% !important;
        padding: 0px !important;
        display: flex;
        justify-content: center;
        margin-top: -37px !important;
        background-color: none !important;
        border: none;
    }
    li.foy_tab_li {
        width: 20% !important;
    }
    .foy_tab_li a{
        background: #ffffff !important;
        color: #000000 !important;
        text-align: center !important;
        border-radius: 10px 10px 0px 0px !important;
    }
    .login-title{
        color: #fff;
        display: block;
        font-size: 36px;
        font-weight: 500;
        line-height: 50px;
        margin-bottom: 7px;
        padding-top: 0;
        text-align: center;
        padding-top: 25px;
        text-transform: capitalize;
    }
    .login-title-bot{
        color: #fff;
        font-size: 16px;
        letter-spacing: .32px;
        margin-bottom: 15px;
        margin: 0px;
        text-transform: none;
        text-align: center;
    }
    #vibe_bp_login ul {
        width: 100% !important;
    }
    .foy-checkbox {
        display: flex;
        justify-content: space-between;
    }
    .foy-right-contents ul{
        padding: 0px !important;
    }
    #vibe_bp_login input[type=text], #vibe_bp_login input[type=password], #vibe_bp_login input[type=email]{
        border: none;
        background: #f3f6f7;
        border-radius: 4px;
        color: #5d676e;
        font-size: 12px;
        height: 40px;
        padding-left: 15px;
    }
    a.submit_registration_form.button {
        background: rgba(131,193,31,.8) !important;
        text-transform: none;
        font-family: 'poppins';
        border-radius: 40px;
        color: #fff;
        cursor: pointer;
        font-size: 1.125em;
        margin: 0 auto 10px;
        padding: 13px 10px;
        text-align: center;
        transition: all .3s ease-in-out;
        width: 100%;
        font-weight: 400;
        margin-top: 50px;
    }
    .nav-tabs>li>a{
        font-family: 'poppins';
        color: #83c11f !important;
        font-weight: 500;
    }
    #signup_form label {
        display: none;
    }
     
    #vibe_bp_login a:hover, #vibe_bp_login ul li.active a {
        background: #eaeff4 !important;
    }
    #vibe_bp_login label {
        color: #868d92 !important;
        font-weight: 400;
        font-size: 12px;
        text-transform: none;
    }
    #vibe_bp_login #vbp-login-form .checkbox label:before {
        background: rgb(255 255 255 / 10%);
        border: 0.526936px solid #d7d7d7;
        margin-top: 2px;
        width: 12px;
        height: 12px;
        border-radius: 2px;
    }
    .foy-right-contents input#sidebar-wp-submit {
        background: rgba(131,193,31,.8) !important;
        text-transform: none;
        font-family: 'poppins';
        border-radius: 40px;
        color: #fff;
        cursor: pointer;
        font-size: 1.125em;
        margin: 0 auto 10px;
        padding: 13px 10px;
        text-align: center;
        transition: all .3s ease-in-out;
        width: 100%;
        font-weight: 400;
        margin-top: 50px;
    }
    
    @media only screen and (min-width: 320px) and (max-width: 767px) {
        .foy-login-container {
            margin: 10px;
        }
        .foy-pop.align-items-center {
            display: block;
        }
        .sleek .foy-vibe_bp_login {
            transform: translateY(5%) !important;
        }
        /* .foy-pop-left{
            display: none;
        } */
        .foy-pop-right {
            padding: 15px 20px 0px 20px;
        }
         
    }
    @media only screen and (max-width: 770px) {
        .foy-pop.align-items-center {
            width: 90%;
        }
    }   
</style>
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

			if(vibe_get_option('wp_admin_access') > 1){ ?>
                <li id="admin_panel_icon"><?php if (current_user_can("edit_posts"))
                echo '<a href="'.vibe_site_url() .'wp-admin/" title="'.__('Access admin panel','vibe').'"><i class="icon-settings-1"></i></a>'; ?>
                </li>
            <?php } ?>
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
	<div class="popup_login">
        <div class="foy-pop align-items-center">
            <i id="foy-close" class="fa fa-times" aria-hidden="true"></i>
            <div class="foy_pop_top">
                <h1 class="login-title">Welcome Back!</h1>
                <h1 class="login-title-bot">What will you learn today? Find out, with Alison.</h1>
            </div>
            <ul class="nav nav-tabs ebtab foy_pop_ul">
                <li class="active foy_tab_li"><a data-toggle="tab" href="#menu0">Sign In</a></li>
                <li class="foy_tab_li"><a data-toggle="tab" href="#menu1">Sign Up</a></li>
            </ul>
            <div class="tab-content">
                <div id="menu0" class="tab-pane fade in eb_courseInfo active">
                    <div class="col-md-6 col-sm-12 foy-pop-left">
                        <div class="foy-left-contents">
                            <img class="foy-d-block" src="https://www.oneeducation.org.uk/wp-content/uploads/2022/10/Group-1000002812-1.png">
                            <?php echo do_shortcode('[nextend_social_login]'); ?>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 foy-pop-right">
                        <h2>Sign in to your One Education account</h2>
                        <div class="foy-right-contents">
                            <form name="login-form" id="vbp-login-form" class="standard-form" action="<?php echo apply_filters('wplms_login_widget_action',site_url( 'wp-login.php', 'login_post' )); ?>" method="post">
                                <div class="inside_login_form">
                                <input type="text" name="log" id="side-user-login" class="input" tabindex="1" value="<?php echo esc_attr( stripslashes( $user_login ) ); ?>" placeholder="Username"/>
                                
                                <input type="password" tabindex="2" name="pwd" id="sidebar-user-pass" class="input" value="" placeholder="Password"/>
                            
                                <div class="checkbox small foy-checkbox">
                                    <input type="checkbox" name="sidebar-rememberme" id="sidebar-rememberme" value="forever" /><label for="sidebar-rememberme"><?php _e( 'Keep me logged in', 'vibe' ); ?></label>
                                    <a href="<?php echo wp_lostpassword_url(); ?>" tabindex="5" class="tip vbpforgot" title="<?php _e('Forgot Password','vibe'); ?>">
                                    Forgot Password?
                                    </a>
                                </div>
                                
                                <?php do_action( 'bp_sidebar_login_form' ); ?>
                                
                                <input type="submit" name="user-submit" id="sidebar-wp-submit" data-security="<?php echo wp_create_nonce('wplms_signon'); ?>" value="<?php _e( 'Sign In','vibe' ); ?>" tabindex="100" />
                                <input type="hidden" name="user-cookie" value="1" />
                                
                                <!-- <div class="foy-right-bottom">
                                    <div class="foy-signup">
                                    <p>Not a member yet?<a href="https://www.oneeducation.org.uk/register/" class="foy-su"> Sign up</a></p>
                                    </div>
                                    <div class="foy-rb-top">
                                    <hr>
                                    <p>OR CONTINUE WITH</p>
                                    <hr>
                                    </div>
                                </div> -->
                                </div>    
                            </form>
                        </div>
                    </div>          
                </div>
                <div id="menu1" class="tab-pane fade eb_curriculum">
                    <div class="col-md-6 col-sm-12 foy-pop-left">
                        <div class="foy-left-contents">
                            <img class="foy-d-block" src="https://www.oneeducation.org.uk/wp-content/uploads/2022/10/Group-1000002812-1.png">
                            <h2>
                                Registering for this site is easy. Just fill in the fields below, and we'll get a new account set up for you in no time.
                            </h2>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 foy-pop-right">
                        <h2>Create a new account here</h2>
                        <div class="foy-right-contents">
                            <?php echo do_shortcode('[wplms_registration_form name="registration_form" field_meta=1]'); ?>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
	</div>
    <script>
        document.getElementById("foy-close").addEventListener("click", ()=>{
            document.getElementById("vibe_bp_login").classList.remove("active");
            document.getElementById("vibe_bp_login").style.display = 'none';
        })
    </script>
	<?php
endif;
?>
