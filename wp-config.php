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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '(i;Q+B7z%LBp8+)hbr7.14O&Bu?OIq!NtrSvDyY1@zk^pW@xz>W8k]~CpxXz~w}@');
define('SECURE_AUTH_KEY',  '+6z&dm+W[{6^:^p9$)H:+^+dr&;PrtI%JaX]6nQN-W?A1y.+-F-sCg.}t7k>;*_*');
define('LOGGED_IN_KEY',    '||M2b))|9&@O2Zl`FQ!Z2~+-he5RyTq=Oc3%=uTP(KK-knA#%Em1ay%NQV;SApad');
define('NONCE_KEY',        '%(bV5?%QbV$5B_t,S M||:]>Y%i-keyonIfU.-ti$Ny*F|g6e|<oQ`c,:UclJ:D;');
define('AUTH_SALT',        '{;Xjjm|(irA]-*r>!K~:=+Gr|AMR[X1xhP8fgwl6@]%!2.:NMJpU[PGPcSZOo?}F');
define('SECURE_AUTH_SALT', 'Sr?=mc/St(EPQdWz1)N yJVz|{LMW|)c D[RKfz3ovDy-GdR98dfOL;SN8]i{eEJ');
define('LOGGED_IN_SALT',   'aHUMVOwnF)-3{WDdf!3rW+fy~o#+Z,yYObR$+sa#DU0DFqana|lK$9CLTVg3|$0#');
define('NONCE_SALT',       '`P+bNY(4_sw:+mR|DsLvc%kL$g##t#?WR7OU&E2Na8CCWl>=(M<Do$t~/qf{_A1(');

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
