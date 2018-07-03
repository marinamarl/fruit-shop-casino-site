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
define('DB_NAME', 'fruitshop');

/** MySQL database username */
define('DB_USER', 'marina');

/** MySQL database password */
define('DB_PASSWORD', 'VE17tmsAV43HmEtL');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'YnQFuxCC,nKVv?}t.O{LsV_8u>wxgXt1us`D%2 gHJpc!ggappmFqM=C)@s{AZV~');
define('SECURE_AUTH_KEY',  '>Q.:s0!WhAY:{$}Yhh+a: G4/_H~VXUHmfo+HO[aO8Og-^H({:6`xG#gkf)y;ha2');
define('LOGGED_IN_KEY',    'gl)a5=({F!7U2$DD8(yl2sw[{2|$MH{H@CKN%##q1k0Pm2Xs,`T7Ek=lGt(kzNc>');
define('NONCE_KEY',        'w.k3]wo@}PZUlLry50Mb)Sx?QW]p^}+R*lzB6$?2!;x*i|=[Qt~FVI_V>|2!|*K9');
define('AUTH_SALT',        '7f#,<&>9AL9bx{BA1HtqJcS>Ra_H~1zSK{_O4}&4jA_w3!buoedO=p`)>Vn1J8@n');
define('SECURE_AUTH_SALT', ']y7dr%U):A-/JP8wz6>FTEaS6C#C{mKh/Z-TcEKZMhr;o&lG6G_Q3x*)gQDi;mSW');
define('LOGGED_IN_SALT',   '%<n3i`pJFTDXQeUb@BRpguih/c0pW`R>5ZBu!b&4 a48A[])N`=;0g_YPQ~yWLL2');
define('NONCE_SALT',       'KIyq}ekyLixC-.5Pn1,Yov%^39i-GuA&^O)Zl!/og%;)D`&ki}w71+y_xttEk3G4');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
