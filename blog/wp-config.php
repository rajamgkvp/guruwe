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
define('AUTH_KEY',         'oK;n!6Pr_M1W&f ~.]IA9|1 %+t#yXL=3cq~_XlL0QUVid$kM^Uj[DRGoqW`c)ck');
define('SECURE_AUTH_KEY',  '{tb/*/RGt])ODjeC+u`Awl?*S<h//4cVCN7$1CCoqUE5(Sdg&CGCzX7=CcqW[{%@');
define('LOGGED_IN_KEY',    '226JjISDRy2<JNSDYwI YF_!Ss:O1B~Wj]B8TW4ZnE!U/ KnDb,6&CW}ROPKxbLe');
define('NONCE_KEY',        'm*93kga>q9Xe^&#!Mkh94ZgP~_]XT`$r}u@v[Pp hH|#Fa8j|%8[dhSemClSf{nS');
define('AUTH_SALT',        '5,w#.,l=0*<+UJQjOv~);OdwP`6*9l)%leJ=,m^H:J;F,WErwc=/i^CUwdDINe7|');
define('SECURE_AUTH_SALT', 'UH|3 I9aR3Rz6yt(1y)@a>_RoKm6>R~GV?iEbNXQnK(`f-,vTn^GixuJFt74dIrZ');
define('LOGGED_IN_SALT',   '#,9opJ:+[h0szsP4{5YjavS24t3[qO&ipOps!%rylPkS1_1iG.Ifq 6)I*cvM}*v');
define('NONCE_SALT',       'a55^rWWDG~S+; ?jI9n8D@sDlI8|n9&Ub;TU&AdBMQu(X]SPU+IrViGz/SAs!F[i');

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
