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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'guru');

/** MySQL database password */
define('DB_PASSWORD', 'Guru@123');

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
define('AUTH_KEY',         '?(I-*c$: C?|m|([hA[uy)R*tmMg&@070{2*_C1x(L( o,&oKJ@v[*K=,o(lCZ!W');
define('SECURE_AUTH_KEY',  '(T*ipRY0L,bKeX1jFuC1Os[//[)I?VN12cgm}>w7uG*^6`5^`NzsBNCG(6_Z7^QU');
define('LOGGED_IN_KEY',    's#8;Ns? vE$${j=8 N @W@WCjb:@i7@3wem!FY5QtEIP80z}b(}K29GK}%Ta9]5j');
define('NONCE_KEY',        '.Nu~my2Zmp+W$|I~UBeaA& 77X(@=MS|G&]76mM~BouC_8aVM O4_=P#?<m3{&^R');
define('AUTH_SALT',        'g[2;Ph,rtKj-@./yHyyj~+U3j-PU*4{p2ZOkrd:CM`YMsy+-ma(y?{2YyE.Zqx-#');
define('SECURE_AUTH_SALT', '{1m!znc?ycJrU.9GL056lA|0I D}t?m v/eTOk_KsETrm@ah}p@Ak%/a02he(hYc');
define('LOGGED_IN_SALT',   'Uib.M}5v[vXs>|?.Tzd{5:>)[nmdzXtTm-H|l3W4S4=Qvio-)&mD[rzZp*GjG9oE');
define('NONCE_SALT',       'g!9_q=r^=W[LU}WruR8~|C)Wz_0is<)IVCt D]jylQN[!P9.3o=:x7^]CUy)v0,0');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'gurublog';

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

