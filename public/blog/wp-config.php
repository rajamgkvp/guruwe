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
define('AUTH_KEY',         'V#yghLFyO/8Nw[=s<Ax[{1ds=]dky3LsdMa] t^w!81IWH1yq_aLZytWi.2XUDHl');
define('SECURE_AUTH_KEY',  ',*{h2UP7rGTit7>sii4?U1=/,odI!I>[JTAwtcUtQ[`P8w/+hhdP5aTovblYUa!$');
define('LOGGED_IN_KEY',    'k^t=oN#Ji>x&%J:[9Ye 3%WFg<itPiHw18EAH7vo1j1;$[$OZ0I.J+3zwR{f.h7^');
define('NONCE_KEY',        'T07yMZutH!d5.$6#::!5Q`]I.Zsw,a%p#0L$=aen:%JJZU%.z)#.G=QpeAmV+.;[');
define('AUTH_SALT',        'Py( 4nncBO$=Vp#Fef|-p<MfVi5SRT0+I,] O|y_Kl$(d(Sy=6U%<V{9LI[4eR8-');
define('SECURE_AUTH_SALT', '%]tUzjyOyGW>f1rkEf!_;%2&0CD_7/<;<k}rC{#(Ymrw`$Gv]M|~sLfW@mjzOLlI');
define('LOGGED_IN_SALT',   'Z)B/Qj-oc|ZcvGCSh8z.DFr6vakRWctS& zzhc6Mdm/~h2+l]InB={DlS),4ktM0');
define('NONCE_SALT',       'PQL6 +W3L){.2px.VkZK?Hml/e8|*9#_#@I9IZ/@Bk9*j<Ft&WjgfD,_zpuivR1w');

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

define('FS_METHOD','direct');

