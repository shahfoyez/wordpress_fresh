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
    .foy-pop.row.align-items-center {
        display: flex;
        margin: 0px;
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
        margin-top: 30px;
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

	/* new css */
	.logged-out #vibe_bp_login .popup_login #vbp-login-form .inside_login_form {
		box-shadow: none;
	}
	.logged-out #vibe_bp_login .popup_login #vbp-login-form {
		width: 100%;
		margin: 0px;
	}
	.foy-pop.row.align-items-center {
		margin: 0 auto;
		width: 710px;
		background: #fff;
		border-radius: 10px;
	}
    i#foy-close {
        float: right;
        border: 1px solid #e1e1e1;
        padding: 3px;
        border-radius: 5px;
    }
    .logged-out #vibe_bp_login .popup_login {
        transform: translateY(25%) !important;
    }
    .mooc .topmenu>li>a, .mooc nav>.menu>li>a, .sleek .topmenu>li>a, .sleek nav>.menu>li>a {
        color: #000 !important;
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
        .foy-pop-right {
            padding: 15px 20px 0px 20px;
        }
         
    }
    @media only screen and (max-width: 770px) {
        .foy-pop.row.align-items-center {
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
    <style>
        .foy_pop{
            display: flex;
            margin: 0 auto;
            width: 710px;
            background: #fff;
            border-radius: 10px;
        }
    </style>
	<?php do_action( 'bp_after_sidebar_me' );

/***** If the user is not logged in, show the log form and account creation link *****/
else :
	if(!isset($user_login))$user_login='';
	do_action( 'bp_before_sidebar_login_form' ); ?>
	<div class="popup_overlay"></div>
    <div class="popup_login">
        <i id="foy-close" class="fa fa-times" aria-hidden="true"></i>
        <div class="foy_pop">
            <div class="foy_pop_top">

            </div>
            <div class="foy_pop_bottom">
                <ul class="nav nav-tabs ebtab">
                    <li class="active"><a data-toggle="tab" href="#menu0">Course Info</a></li>
                    <li><a data-toggle="tab" href="#menu1">Curriculum</a></li>
                    <li><a data-toggle="tab" href="#menu2">Certification</a></li>
                    <li><a data-toggle="tab" href="#menu3">Review</a></li>
                </ul>
                <div class="tab-content">
                    <div id="menu0" class="tab-pane fade in eb_courseInfo active">
                            
                    </div>
                    <div id="menu1" class="tab-pane fade eb_curriculum">
                    
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
