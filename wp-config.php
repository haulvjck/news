<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'news_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '5}dgd9`2Vu7a/Az2so-(;jV8;BStB,/YU|g3/7je>@V9u,yDYU%h@7rA#WGXN`wx');
define('SECURE_AUTH_KEY',  'QuO0{6Q!6@O-Hm;xc*H`og;A_|p0Y9x!/}#^dT{`jYhn{V#DgoJ1i5w$aRV~s^KA');
define('LOGGED_IN_KEY',    'KJ+t0Qgl`nx(eQA`:7Q52$hC`;y$6B^)w5 zf}hg8~-Mwb!{D&pCYClG<TNUh)TI');
define('NONCE_KEY',        'P)d%r)$C8+mX_{9o|]{>|r.zQ0r;Y3?BNreKAiFDC[/M=nQbhqR[ziZX:v3q>l_p');
define('AUTH_SALT',        'N32pKp!KhU>F-Z(~4x;&DpG,c~sE[OxHciQqHN>oe/j}1hnd@Jz++O&c&alkO?B}');
define('SECURE_AUTH_SALT', '!wF8a,F^X.M6J;.=WM6 leTRbThk@MgtK?NkH}dO7Ask%!_(eC@Cl?MHLpH]S<3&');
define('LOGGED_IN_SALT',   '7Kluytn]e+db|Y s+1ctij~kER40hmh.qI+;n8uulb3T@l^cHd4K%S.JY|N;U<NU');
define('NONCE_SALT',       ',!IFYW|u]w+cRxPOo-q4~IlJj=QO=/=9kHBwZ6&&?]=fq|5$]/N`nK->4zL-G|pG');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
