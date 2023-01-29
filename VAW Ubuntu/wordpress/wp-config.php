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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'admin' );

/** Database password */
define( 'DB_PASSWORD', 'admin' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', '' );

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
define( 'AUTH_KEY',          'q[`G=.9^2*;zi`t`e&<swE-~116=>+gN>SB4d7b(;R3LIeVxTq5Z<xB7$9+Yp,P,' );
define( 'SECURE_AUTH_KEY',   'Btwni%a%pG)fZLJ=k2 FQwiL[CeFS)x.N1F`UYdq(XCWD#E<Is~CMJ7soaNiXMiX' );
define( 'LOGGED_IN_KEY',     'VF!q1zJ1dsRH[g5m bn_y{rbBWHxlk<kf]L`ycZ`dJF)M2WS!tc#i):2NYjArDn0' );
define( 'NONCE_KEY',         'L+SzlmD(|&|^Yg{85*i&j=#f|8JxA3hXdY|jq2C%l:VA[si 2/]#C~ix_+q%E>^J' );
define( 'AUTH_SALT',         'ZwL4hl<!>:HERQR~B/9qz<#|Dc2&E,SG=:&U Us00sE%LT=rc3jd]#(x<2l{hG;,' );
define( 'SECURE_AUTH_SALT',  'U-A=%Y_6J8<}uX/kBcNd !+2/h=,4Q pvt/bQm0@$J|_-DiYa)ZA<5aCo-x/&F]_' );
define( 'LOGGED_IN_SALT',    'u}^S<.b %8Y0x?;w.`^lItAPlD0aX#jYWFScJ:6F@7Q`i<zHUo:[2YCeCENYd1W&' );
define( 'NONCE_SALT',        'ai@arM;7!y)&~xyrdr_l5FL<wB#af{aBs74TTK1;K)(uKHJbg2UY~UZ=; iuE[o)' );
define( 'WP_CACHE_KEY_SALT', 'L<kZAmFVFFM6+8}a3sBw8Z18Tyiud4J:B4{m~J_Vp$*?yD|4f )M(}aUbdC$LXk(' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}
define( 'WP_DEBUG', True );
define( 'SAVEQUERIES', True );
// define( 'FORCE_SSL_LOGIN', true );
define( 'FORCE_SSL_ADMIN', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
