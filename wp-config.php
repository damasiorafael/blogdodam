<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'blog');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'damasio');

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
define('AUTH_KEY',         '2JkOWve#XxUT{uj}H&}U^GS:QWCLeS/@y[hXi#h-!nA:xEGcEopdKOnC5*- YUK`');
define('SECURE_AUTH_KEY',  '4eGXQ6u1|sEl6y:qi5S7Xe|XCNwJU#*%Tc#D<BOCch9-7qxd5=ERM{U5(ha-2Dvw');
define('LOGGED_IN_KEY',    ':gfO4]y+fS4V(&AXCDBQ~u-9p6 `$#3>hA)Hf}tz;*|boI&1u*|vV0VL1oKZF%:q');
define('NONCE_KEY',        '5a&Thv3w|UghQ5R@N~W.L!+P/u24TQn.1[.}CdkyLfOC!rV%>&>*Y0^A7>H)|*hW');
define('AUTH_SALT',        'V|gK&,G.ic#PzieMfp<_xTcIKMk:+/88]3C,+dXh6|nXY-!0v68qmr3~|pj4-]a)');
define('SECURE_AUTH_SALT', '5-#l@jei-K6=5x+^?(=FQ2WxOx7h%7+6*v|l*ilE[BEY [D#0-{<Dg3+5}`%fE-r');
define('LOGGED_IN_SALT',   ' QQkYcJ5]B8,-+k;?3}}mXkNK<CDSJW4YvNDkEgt6CjP6v}p$PF[!`yEtQQH{[du');
define('NONCE_SALT',       '[vAbbLR&00-zUqWEF[jp&JzZitv<u43iZQT@fS:|_dq->+&#5AYW$;?&HV*o0-bf');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

