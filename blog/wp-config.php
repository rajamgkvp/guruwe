<?php
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

if($_SERVER['HTTP_HOST']=='localhost'){
	define('DB_NAME', 'gurutransfer');
	define('DB_USER', 'root');
	define('DB_PASSWORD', '');
	define('DB_HOST', 'localhost');
}else{
	define('DB_NAME', 'guru');
	define('DB_USER', 'guru');
	define('DB_PASSWORD', 'Guru@123');
	define('DB_HOST', 'localhost');
}

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
define('AUTH_KEY',         '9;96tWj~/90,t%vhP?L0!ZiO1# l3D00bm=G4?`Ay:dW,|x8D~`?XT3!?ofH6C$g');
define('SECURE_AUTH_KEY',  'k;JNgJA[h!4DY7necm`nCyGWBm=5guG:k3/+C:N+]||#T;]I[3&R}lAPfF@&>6=A');
define('LOGGED_IN_KEY',    'ST%Q*|m@~; |;2+*x=].,J*j|8*F-{1T16+:4Xf|^71NE7=zQ;I7jH+}]<eWY*./');
define('NONCE_KEY',        'SG%fH|,KNfFmNsJW!dP/oNRmLr[o?Ab%T3jh|kdv_krrY%!LG><BSL{o,+9kVzF(');
define('AUTH_SALT',        '2TiSr-oUM*r/nax=DQ[Npq{?,D-BS C`6*Xu?iZmQp8w:R_=$nJYEw=%0PF+~)~p');
define('SECURE_AUTH_SALT', '))LO4{3t|JB9D0mZtl{`|gI4<k*?!!(_`|C+ugN8Fs0;nlnDtJ>@EO9-~+=|[U8+');
define('LOGGED_IN_SALT',   'w$/8Ayb7cYa{pzL5bNkT9vl8su(hT1k{qq1?bL@vdxvHC4iYUc</mTf<+4+CZ]N6');
define('NONCE_SALT',       '<aL/aL;STxt?6aHRoG[/!0(Fb5 YMj[d^SI-*OCKMqr4hu%RH5eRXS?gZ<j%~ST=');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'gurublog_';

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
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
