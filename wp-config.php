<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'fresh' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'l@vr(zs Hj|8 @%Bz^eQ`a7GqQZT,t!ha+#PtmcI9vCL}^TZ1U+/m9sE7( zI}-t' );
define( 'SECURE_AUTH_KEY',  '?>W}jD(r[-$&Tl~k.<,[P!RhJ+iCU~9Zj>*hwnV,X=^FrUN$K8e]TvBUY C~5oEf' );
define( 'LOGGED_IN_KEY',    '|JP,8 K*ChhP.|9;|zF#22ntCUC~p17{0WTK|`` J>8nzFYIaV0:UtFHVfeJ8ie3' );
define( 'NONCE_KEY',        'g}Vf./4m+6_,P? ;#7=sK9DB0~m;nV;7-z]|x1KV8Lj-eNmhZ@`+9o}/X2cvYNid' );
define( 'AUTH_SALT',        'B0)ZESk@=(Z| &ilw>vB~o W6r@8QuZ[0kQ)~/8LayY`JYVe(T7dGq!u0-Lcrs5@' );
define( 'SECURE_AUTH_SALT', ')/2Z@>mx8:54|,dw@xntu^pAM^B{Jaz|~|yXVZWv.]M$s3U[HjIU-*9ck{DfVqpK' );
define( 'LOGGED_IN_SALT',   '1|T4[Q.XYRZ)V{3]uvf8uG}$Vc3GWZWl(qN< )yFz[6_YK11SDP05!]W WDzT4Ty' );
define( 'NONCE_SALT',       'mfk_S|Gw2k4JB6rG$x,bQ:Ezhv^_?LJT-> N2e5-TEgQ[1,;+>s@hAZtV12{.k/+' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
ini_set('display_errors','Off');
ini_set('error_reporting', E_ALL );
define('WP_DEBUG', false);
define('WP_DEBUG_DISPLAY', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
