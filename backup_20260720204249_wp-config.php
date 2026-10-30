<?php
if(!defined('DISALLOW_FILE_EDIT')){define('DISALLOW_FILE_EDIT', true);}
?><?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'sapfirla_EHW');

/** MySQL database username */
define('DB_USER', 'sapfirla_EHW');

/** MySQL database password */
define('DB_PASSWORD', 'Fq7%ca<JBX61');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'zk;L,dv_sL IL`LON_(n6g&FCAWG_^4xt1tLep/j9g&G5pdmsQh:k5JZn8%Xo8Oz');
define('SECURE_AUTH_KEY', 'jV[cYVP)VjX5NfU2*gw@#!J)ngu+6;L?X~60TkPT)*x!*AqaccOuKETfCv)`^Ofk');
define('LOGGED_IN_KEY', '2!ZoatI~nE4;1vvNG|o_8i=J*B,2tx[4r78q%HU/8.w*X$-^pDv(5u-AU-2P>,3=');
define('NONCE_KEY', '/<N0T4$/lM4h<AVStQ3(A=eL|0%fK`15G6]O9xX;ZQ-y9KA*^OPG4@ 9Xumadf06');
define('AUTH_SALT', 'kmh[@Qa8-=!/u zcuQ%sIfEiD,ms>Z/Oi$m5jAC%>N#ok<*!II!sa/[#=Tm.a#Ch');
define('SECURE_AUTH_SALT', 'j8mF=p0t+ew/,9:$s8;c5g(u<|b|pNf;]~!nSEwz;5P_dQyjS>^_DiIbeXjK@$eW');
define('LOGGED_IN_SALT', '2o$s0:3LS36pCqcfOgR60kg<KmHD3n`(bkWVWg)sZQ/)WEofz,AX4:ea<V)2y7]I');
define('NONCE_SALT', 'ED6qWM$-azaOLnuI8/AYnLW&9=A#wbQ`rM.LU9N0jV7/m./]dkdTHCjcvQ&uYEME');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'Eyz_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	{define('ABSPATH', dirname(__FILE__) . '/');}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');