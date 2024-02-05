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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'blogger' );

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
define( 'AUTH_KEY',         'Pc.^H$;IsT#iCTlz*AoO}-IdX&|=WjU3}Y`QRE3=+Cg;vH>=4A%KllYh.T uv^>k' );
define( 'SECURE_AUTH_KEY',  '=9Wz,?rxS?=C<NBR)@S6,[EoRbQ3~{|QG^OSdM 4QY;O[Ln4zn3THP|u /Q,^2%c' );
define( 'LOGGED_IN_KEY',    'J~G-hQ <Q$R{V^}vCm,RO^nX2nIKHa^!PG>!D@d;^*XX &kAk81/sl?dI4/GUP2i' );
define( 'NONCE_KEY',        '[NY<x&B(^AMh:@}nGZx9?y+$h1XS@P&lQ>m@#T4=`2_D#$2_C]S`:`by4Yh0eu&h' );
define( 'AUTH_SALT',        'ShZnRh}lp[DF<,&ks@YijfSq$^{g4wsPtW)&cDq%SV5V7NMrAcBr[i-$fjrt~5k2' );
define( 'SECURE_AUTH_SALT', 'Dxr2&3wK`.sh$(`{vO:]0Rl$Tap@*3o_[INos]c6ww4F&p>-;Z^hWoE;=Yr/Q,W*' );
define( 'LOGGED_IN_SALT',   '*l:3;k#)vN>!cyE=ww/u)U>>,rJRyY4kN/4ne[Se6nI|K7<F8*>vxyzMlopa7P)_' );
define( 'NONCE_SALT',       'epN=<B$3^3k7Omwz@B@5Ip esIMiP>y@<W$3ls=(KVk9%`StF%%}rU/E;qvN7{eP' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */

define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);


/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
