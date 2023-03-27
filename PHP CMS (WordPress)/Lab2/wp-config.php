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
define( 'DB_NAME', 'wordpresslab_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'Gogaahmed66##' );

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
define( 'AUTH_KEY',         'OC6BQ8`zqimPk-sBGt7U,$o3lCM.R~:]CxV9&A =?N<ny|d0+|jS<3Nab]275sPU' );
define( 'SECURE_AUTH_KEY',  'VrcDCMY$iSN|GZ=$@5n5cN!N/jGkKYCx6DxQyf0@xQp`{vTjp}sDon.@Vk` #pxj' );
define( 'LOGGED_IN_KEY',    'xU>`^AH0T*&NPCbs[nh2Y^Gw7]nKcQ|fi`%Nu<FX?gp44OW<fCzXrZ7Uy?WCB!hi' );
define( 'NONCE_KEY',        'f[%-&}~1vHl.udp.Syh$@->a8rZ@EQ)Y.Hw++I.[<_lz;d!F8t5/jw>Jh%dStFeV' );
define( 'AUTH_SALT',        'P;fBV~^./=(HQ[8[s@[d[{2w6==EnY?h3vWXtl%]MsxWO*8UBf_nZ!uSr>er-n|y' );
define( 'SECURE_AUTH_SALT', 'd.teB-3L84BZ0vmDCdgBoInCp<*MPDZp[bQdNKVCc<+W8~[2GtUQD*/+V$1CPm!6' );
define( 'LOGGED_IN_SALT',   '&J=-)&e_o=/w~EZufzHPdgdjJ5|m{!NLP#P61{jp!}0eO<)VBJxqU2wK3ye,[WE4' );
define( 'NONCE_SALT',       'f}l%  ZeS%Cfxd^*IH0hVZ4OfSew]k)+x5y&_@U^;F^glGo`v`JPSc Yja,GLcBI' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
