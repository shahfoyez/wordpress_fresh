<?php

if (!defined('ABSPATH')) exit;

if (!defined('WPLMS_THEME_FILE_INCLUDE_PATH')) {
	define('WPLMS_THEME_FILE_INCLUDE_PATH', get_template_directory());
	//use this if you want to overwrite core functions from includes directory with your child theme
	//copy includes and _inc folder into your child them and define path constant to child theme

	//define('WPLMS_THEME_FILE_INCLUDE_PATH',get_stylesheet_directory());
}
// require_once get_stylesheet_directory() . '/custom-class.php';
if (defined('WPLMS_THEME_FILE_INCLUDE_PATH')) {
	// Essentials
	include_once WPLMS_THEME_FILE_INCLUDE_PATH . '/includes/config.php';
	include_once WPLMS_THEME_FILE_INCLUDE_PATH . '/includes/init.php';

	// Register & Functions
	include_once WPLMS_THEME_FILE_INCLUDE_PATH . '/includes/register.php';
	include_once WPLMS_THEME_FILE_INCLUDE_PATH . '/includes/actions.php';
	include_once WPLMS_THEME_FILE_INCLUDE_PATH . '/includes/filters.php';
	include_once WPLMS_THEME_FILE_INCLUDE_PATH . '/includes/func.php';
	include_once WPLMS_THEME_FILE_INCLUDE_PATH . '/includes/ratings.php';
	// Customizer
	include_once WPLMS_THEME_FILE_INCLUDE_PATH . '/includes/customizer/customizer.php';
	include_once WPLMS_THEME_FILE_INCLUDE_PATH . '/includes/customizer/css.php';
	include_once WPLMS_THEME_FILE_INCLUDE_PATH . '/includes/vibe-menu.php';
	include_once WPLMS_THEME_FILE_INCLUDE_PATH . '/includes/notes-discussions.php';
	include_once WPLMS_THEME_FILE_INCLUDE_PATH . '/includes/wplms-woocommerce-checkout.php';

	if (function_exists('bp_get_signup_allowed')) {
		include_once WPLMS_THEME_FILE_INCLUDE_PATH . '/includes/bp-custom.php';
	}

	include_once WPLMS_THEME_FILE_INCLUDE_PATH . '/_inc/ajax.php';
	include_once WPLMS_THEME_FILE_INCLUDE_PATH . '/includes/buddydrive.php';
	//Widgets
	include_once WPLMS_THEME_FILE_INCLUDE_PATH . '/includes/widgets/custom_widgets.php';
	if (function_exists('bp_get_signup_allowed')) {
		include_once WPLMS_THEME_FILE_INCLUDE_PATH . '/includes/widgets/custom_bp_widgets.php';
	}
	if (function_exists('pmpro_hasMembershipLevel')) {
		include_once WPLMS_THEME_FILE_INCLUDE_PATH . '/includes/pmpro-connect.php';
	}
	include_once WPLMS_THEME_FILE_INCLUDE_PATH . '/includes/widgets/advanced_woocommerce_widgets.php';
	include_once WPLMS_THEME_FILE_INCLUDE_PATH . '/includes/widgets/twitter.php';
	include_once WPLMS_THEME_FILE_INCLUDE_PATH . '/includes/widgets/flickr.php';

	//Misc
	include_once WPLMS_THEME_FILE_INCLUDE_PATH . '/includes/extras.php';

	//SETUP
	include_once WPLMS_THEME_FILE_INCLUDE_PATH . '/setup/wplms-install.php';

	include_once WPLMS_THEME_FILE_INCLUDE_PATH . '/setup/installer/envato_setup.php';
	include_once WPLMS_THEME_FILE_INCLUDE_PATH . '/setup/installer/wplms_demo_fixes.php';
}


// Options Panel
get_template_part('vibe', 'options');

function timer_function($atts)
{
	$id = $atts['id'];
	ob_start();
?>

	<div class="foy-countdown">
		<div class="foy-countdown-items">
			<div class="foy-days">
				<p class="foy-time <?php echo $id . 'days' ?>" id="<?php echo $id . 'days' ?>"></p>
				<p class="foy-time-label"> Days</p>
			</div>
			<div class="foy-divider foy-days-divider">
				<p class="foy-dot">:</p>
				<p class="foy-time-label"></p>
			</div>
			<div class="foy-hours">
				<p class="foy-time <?php echo $id . 'hours' ?>" id="<?php echo $id . 'hours' ?>"></p>
				<p class="foy-time-label"> Hours</p>
			</div>
			<div class="foy-divider">
				<p class="foy-dot">:</p>
				<p class="foy-time-label"></p>
			</div>
			<div class="foy-minutes">
				<p class="foy-time <?php echo $id . 'mins' ?>" id="<?php echo $id . 'mins' ?>"></p>
				<p class="foy-time-label"> Minutes</p>
			</div>
			<div class="foy-divider">
				<p class="foy-dot">:</p>
				<p class="foy-time-label"></p>
			</div>
			<div class="foy-seconds">
				<p class="foy-time <?php echo $id . 'secs' ?>" id="<?php echo $id . 'secs' ?>"></p>
				<p class="foy-time-label"> Seconds</p>
			</div>
		</div>
	</div>
	<?php
	$output = ob_get_clean();
	return $output;
}
add_shortcode('timer-html', 'timer_function');


function timer_function1($atts)
{
	$interval = $atts['interval'];
	$id = $atts['id'];
	global $wpdb;
	date_default_timezone_set("Asia/Dhaka");
	// echo date_default_timezone_get();
	$current_date = date('Y-m-d H:i:s');
	$results = $wpdb->get_results("SELECT * FROM wp_timer WHERE id = $id");
	// $wpdb->insert('wp_timer', array('id' => 1, 'end_time' =>  )); 
	if ($id != "" && !$results) {
		$ent = date('Y-m-d H:i:s', strtotime($current_date . ' + ' . $interval . ' hours'));
		$wpdb->insert('wp_timer', array('id' => $id, 'end_time' => $ent));
		echo "New timer has created";
	} else {
		foreach ($results as $time) {
			$end_time =  $time->end_time;
		}

		if ($current_date <  $end_time) { ?>
			<script>
				// Set the date we're counting down to
				var database_time = <?php echo json_encode($end_time, JSON_HEX_TAG); ?>;
				var id = <?php echo json_encode($id, JSON_HEX_TAG); ?>;
				var countDownDate = new Date(database_time).getTime();
				// function to change default timezone
				function changeTimezone(date, ianatz) {
					var invdate = new Date(date.toLocaleString('en-US', {
						timeZone: ianatz
					}));
					var diff = date.getTime() - invdate.getTime();
					return new Date(date.getTime() - diff);
				}
				// Update the count down every 1 second
				var x = setInterval(function() {
					// Get today's date and time
					// var now = new Date().getTime();
					var here = new Date();
					// change default timezone
					var now = changeTimezone(here, "Asia/Dhaka").getTime();
					// console.log("Here"+here);
					// console.log("Now"+changeTimezone(here, "Asia/Dhaka"));

					// Find the distance between now and the count down date
					var distance = countDownDate - now;

					// Time calculations for days, hours, minutes and seconds
					var days = Math.floor(distance / (1000 * 60 * 60 * 24));
					var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
					var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
					var seconds = Math.floor((distance % (1000 * 60)) / 1000);

					// Result is output to the specific element
					days = ("0" + days).slice(-2)
					var elems = document.getElementsByClassName(id + "days");
					for (var i = 0; i < elems.length; i++) {
						elems[i].innerHTML = days;
					}

					hours = ("0" + hours).slice(-2)
					var elems = document.getElementsByClassName(id + "hours");
					for (var i = 0; i < elems.length; i++) {
						elems[i].innerHTML = hours;
					}

					minutes = ("0" + minutes).slice(-2)
					var elems = document.getElementsByClassName(id + "mins");
					for (var i = 0; i < elems.length; i++) {
						elems[i].innerHTML = minutes;
					}

					seconds = ("0" + seconds).slice(-2)
					var elems = document.getElementsByClassName(id + "secs");
					for (var i = 0; i < elems.length; i++) {
						elems[i].innerHTML = seconds;
					}

					// If the count down is over
					if (distance < 0) {
						clearInterval(x);
						var elems = document.getElementsByClassName(id + "days");
						for (var i = 0; i < elems.length; i++) {
							elems[i].innerHTML = '00';
						}
						var elems = document.getElementsByClassName(id + "hours");
						for (var i = 0; i < elems.length; i++) {
							elems[i].innerHTML = '00';
						}
						var elems = document.getElementsByClassName(id + "mins");
						for (var i = 0; i < elems.length; i++) {
							elems[i].innerHTML = '00';
						}
						var elems = document.getElementsByClassName(id + "secs");
						for (var i = 0; i < elems.length; i++) {
							elems[i].innerHTML = '00';
						}
					}
				}, 1000);
			</script>
	<?php
		} else {
			$date = $end_time;
			$new_time = date('Y-m-d H:i:s', strtotime($date . ' + ' . $interval . ' hours'));
			$execute = $wpdb->query("
			UPDATE `wp_timer` 
			SET `end_time` = '$new_time'
			WHERE `wp_timer`.`id` = $id
			");
		}
	}
}
add_shortcode('foy-timer', 'timer_function1');

function check_datatype()
{
	global $wpdb;
	// $results = $wpdb->get_results("SELECT * FROM wp_datatype where my_type REGEXP '[0-9]+'");
	$results = $wpdb->get_results("SELECT my_type FROM wp_datatype where my_type REGEXP '[[:digit:]]'");
	// $results = $wpdb->get_results("SELECT * FROM wp_datatype where my_type > 0");
	// dd($results);
	foreach ($results as $result) {
		$data =  $result->my_type;
		// $type = gettype($data);
		$type = is_numeric($data) ? "Number" : "String";
		echo $type;
	}
}
add_shortcode('foy_check_datatype', 'check_datatype');





function popup_function1($atts)
{
	?>
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
				<form name="login-form" id="vbp-login-form" class="standard-form" action="<?php echo apply_filters('wplms_login_widget_action', site_url('wp-login.php', 'login_post')); ?>" method="post">
					<div class="inside_login_form">
						<input type="text" name="log" id="side-user-login" class="input" tabindex="1" value="<?php echo esc_attr(stripslashes($user_login)); ?>" placeholder="Username" />

						<input type="password" tabindex="2" name="pwd" id="sidebar-user-pass" class="input" value="" placeholder="Password" />

						<div class="checkbox small">
							<input type="checkbox" name="sidebar-rememberme" id="sidebar-rememberme" value="forever" /><label for="sidebar-rememberme"><?php _e('Keep me signed in until I sign out', 'vibe'); ?></label>
						</div>

						<?php do_action('bp_sidebar_login_form'); ?>

						<input type="submit" name="user-submit" id="sidebar-wp-submit" data-security="<?php echo wp_create_nonce('wplms_signon'); ?>" value="<?php _e('Sign In', 'vibe'); ?>" tabindex="100" />
						<input type="hidden" name="user-cookie" value="1" />

						<div>
							<a href="<?php echo wp_lostpassword_url(); ?>" tabindex="5" class="tip vbpforgot" title="<?php _e('Forgot Password', 'vibe'); ?>">
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
}
add_shortcode('login-popup', 'popup_function1');



function popup_function()
{ ?>
	<header class="mooc <?php if (isset($fix) && $fix) {
							echo 'fix';
						} ?>">
		<ul class="topmenu">
			<?php do_action('wplms_header_top_login'); ?>
			<?php
			if (function_exists('bp_loggedin_user_link') && is_user_logged_in()) :
			?>
				<li>
					<a href="<?php bp_loggedin_user_link(); ?>" class="smallimg vbplogin"><?php $n = vbp_current_user_notification_count();
																							echo ((isset($n) && $n) ? '<em></em>' : '');
																							bp_loggedin_user_avatar('type=full'); ?>
						<span><?php bp_loggedin_user_fullname(); ?></span>
					</a>
				</li>
			<?php
			else :
			?>
				<li>
					<a href="#login" rel="nofollow" class=" vbplogin"><span><?php _e('LOGIN', 'vibe'); ?></span></a>
				</li>
			<?php
			endif;
			?>
		</ul>
		<?php
		$style = vibe_get_login_style();
		if (empty($style)) {
			$style = 'default_login';
		}
		?>
		<?php
		if (function_exists('bp_loggedin_user_link') && is_user_logged_in()) {
		?>
			<div id="vibe_bp_login" class="<?php echo vibe_sanitizer($style, 'text'); ?>">
				<?php
				vibe_include_template("login/$style.php");
				?>
			</div>
		<?php } ?>
		<!-- login popup -->
		<?php
		if (!is_user_logged_in()) { ?>
			<div class="foy-login-container">
				<div id="vibe_bp_login" class="<?php echo vibe_sanitizer($style, 'text'); ?> foy_vibe_bp_login">
					<?php
					vibe_include_template("login/$style.php");
					?>
				</div>
			</div>
		<?php } ?>
		<!-- login popup ends -->
	</header>
	<?php }

add_shortcode('foy_lr', 'popup_function');

function foy_register_session()
{
	if (!session_id()) {
		session_start();
	}
	// destroying session after 30 minute
	$currentTime = time();
	if ($currentTime > $_SESSION['expire']) {
		unset($_SESSION['coupon']);
		unset($_SESSION['start']);
		unset($_SESSION['expire']);
	}
}
add_action('init', 'foy_register_session');

//saving Ajax Data
function foy_save_enquiry_form_action()
{
	unset($_SESSION['coupon']);
	if (isset($_REQUEST['coupon'])) {
		$coupon = $_REQUEST['coupon'];
		$_SESSION['coupon'] = $coupon;
		echo "Request: " . $_REQUEST['coupon'];
		echo " Session: " . $_SESSION['coupon'];
		// Destroying session after 30 minute
		$_SESSION['start'] = time();
		$_SESSION['expire'] = time() + (30 * 60);
	}
	die();
}
add_action('wp_ajax_save_post_details_form', 'foy_save_enquiry_form_action');
add_action('wp_ajax_nopriv_save_post_details_form', 'foy_save_enquiry_form_action');

// to automatically apply coupon
function foy_apply_coupon()
{
	if ($_SESSION['coupon']) {
		$coupon_code = $_SESSION['coupon'];
		if (WC()->cart->has_discount($coupon_code)) {
			return;
		}
		WC()->cart->apply_coupon($coupon_code);
	}
}
add_action('woocommerce_before_cart', 'foy_apply_coupon');

// unset session when coupon is removed
function coupon_removed_action($coupon_code)
{
	unset($_SESSION['coupon']);
	unset($_SESSION['start']);
	unset($_SESSION['expire']);
}
add_filter("woocommerce_removed_coupon", 'coupon_removed_action');

// Search Suggestion
function data_fetch()
{
	$keyword = $_REQUEST['keyword'];
	function title_filter($where, &$wp_query)
	{
		global $wpdb;
		if ($search_term = $wp_query->get('search_prod_title')) {
			$where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . esc_sql($wpdb->esc_like($search_term)) . '%\'';
		}
		return $where;
	}
	$args = array(
		'post_status' => 'publish',
		'post_type' => 'course',
		'orderby'   => 'meta_value_num',
		// 1. define a custom query variable here to pass your term through
		'search_prod_title' => $keyword,
		'meta_query' => array(
			array(
				// 'key' => 'average_rating',
				'key' => 'vibe_students',
			),
			array(
				'key' => 'vibe_product',
				'value'   => array(''),
				'compare' => 'NOT IN'
			)
		),
		'order' => 'DESC',
		'posts_per_page' => 10,
	);
	add_filter('posts_where', 'title_filter', 10, 2);
	$the_query = new WP_Query($args);
	remove_filter('posts_where', 'title_filter', 10);

	if ($the_query->have_posts()) {
		while ($the_query->have_posts()) : $the_query->the_post();
			$meta = get_post_meta(get_the_ID());
			// echo "<pre>";
			// var_dump($meta);
			// echo "</pre>";
			$product_meta = get_post_meta(get_the_ID(), 'vibe_students', true);
			echo "<pre>";
			var_dump($product_meta);
			echo "</pre>";
	?>

			<div class="foy-course-list">
				<?php
				$default =  get_theme_file_uri('/assets/images/defaultCourse.png');
				$image_url = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
				$img_url = $image_url ? $image_url : $default

				?>
				<img src="<?php echo $img_url; ?>">
				<a href="<?php echo esc_url(the_permalink()); ?>"><?php the_title(); ?></a>
			</div>
			<hr>
	<?php endwhile;
		wp_reset_postdata();
	} else {
		echo '<h3>No Results Found</h3>';
	}
	die();
}
add_action('wp_ajax_data_fetch', 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch', 'data_fetch');

function ses()
{
	var_dump($_SESSION);
	?>
	<h1>
		<?php echo $_SESSION['coupon']; ?>
	</h1>
<?php }
add_shortcode('foy_ses', 'ses');

add_action('wp_head', function () {
?>
	<script>
		jQuery(document).ready(function($) {
			// jQuery(window).load(function() {
			jQuery('.course.mycourse').removeClass('loading');
			jQuery('ul#course-list').removeClass('loading');
			// });

		});
	</script>
<?php
});

// function custom_class_body( $classes ) {
//     $classes[] = 'custom-class';
//     return $classes;
// }
// add_filter( 'body_class', 'custom_class_body' );

// 20 usefull javascript functions
