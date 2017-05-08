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
define('DB_NAME', 'guru');

/** MySQL database username */
define('DB_USER', 'guru');

/** MySQL database password */
define('DB_PASSWORD', 'Guru@123');

/** MySQL hostname */
define('DB_HOST', '139.162.63.185');

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
define('AUTH_KEY',         'z&f!R>[^;dhMA2#W.Z?MvU]{^f?Fo]89=wL!CqQj*%#2Sa?cvoe={M^R=[I0#y&/');
define('SECURE_AUTH_KEY',  '/;}n$$a<H}%Glc`@JB)yxN[(Qte|+7:2tv7uhjtBIKYMfkEo? Hw3>SIv0=WH@/l');
define('LOGGED_IN_KEY',    'cG$Xu3fK8[01NAu&jGYHi<g!/{CLJa].KtGZ7|?k:<?lEWc1x,~j~h:AoP{?6],~');
define('NONCE_KEY',        'Ky>I9D-qFDRmacA70hr=dLDllG!Da6KxAJQ`H6&Yb(:NQ}f``J:.!<+ZdB]`X4{~');
define('AUTH_SALT',        'k8eG2FNic*?>~^7xiJDLf18m|Y!@#+is;%leGb)+,<*yJG20/2F<`:|+/3XTxn5n');
define('SECURE_AUTH_SALT', '@UMbj8`RoLi&9@i~O$X/2~0qCCRm}tLK_=RoL;Z7p&3)x8W(4-h;@LB<tkU0#Mgz');
define('LOGGED_IN_SALT',   '0S?U7TdA].EUD z.)1J:u0Me99 t/2Ja8J7S|G;#w_~s8WR~R}BxT9mUd6R4^o+`');
define('NONCE_SALT',       ':ha8kd0o+K:;)#haX7+%(%36vUZa^hK|XUNC3.8FxTWf<)E.x5v)E9Ay`ZedG:+s');

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
