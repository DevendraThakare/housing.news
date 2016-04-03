<?php
/** Enable W3 Total Cache Edge Mode */
define('W3TC_EDGE_MODE', true); // Added by W3 Total Cache

/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

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
define('DB_NAME', 'news');

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
define('AUTH_KEY',         '1{_fgR:Qf/Kb]&osk;5r0.qbid lzQ$[BD/&)7~o;3.QYVs]RTk8e.B2m$Gl9S+S');
define('SECURE_AUTH_KEY',  '=FyB8q@|iK7D%P%QtcpBOj  ;c1Q&lvTIm-Wymzbr~?YBZ5|.>!aGp@(@:P<!-4s');
define('LOGGED_IN_KEY',    'Kibr*;1m*8&837Xj`xVLdc@.)pN@0Cr+Ne->CGY=&AAGxYGT-d8!#atRlwls#G-T');
define('NONCE_KEY',        'uAg@:<|N:>~*LZw[P3TUVC)&2|7&`x8sc-+x)`gad/rL& DOH+ukl E|$LpMWPp6');
define('AUTH_SALT',        '%@ie!D-S<}mrT+)<-];^J}<kU=nA0mmZ!84_-l|BNsx1/ z-uk{u<>6p$ddaA`7W');
define('SECURE_AUTH_SALT', '8B]HG|Pc2Mscf~iuY=NmYgG0LedxzX9Mgi$|JVs>i-b03L@kR-6H.o|-~<Ht<w{L');
define('LOGGED_IN_SALT',   'r++2m.=EZ!]c=5BYB,-yH==pCNs8|YV%Pj_`2y50t6sKsN]HFz5`,NF^|r[?kW<n');
define('NONCE_SALT',       '1%iKesFaAkeg#n^XF+ldHIFbgWI#/_lq1!^t3;Jm_^p$wZz7hPL~$5C:}N@8;EGW');

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