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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'onepager_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'mRDQ}3ef5)O]q(-~nP=L9+IB_q3kSjc`@l/5no_T8 $$5u[ *(3[Hz10$I-_<_nY' );
define( 'SECURE_AUTH_KEY',  '6HVgf+BQ@lT,u@S+,HuO!m;+hz7##_]%70]Mu4=?rxC&h &W>+nNidDMTeF:tB6D' );
define( 'LOGGED_IN_KEY',    '3-l0*VC5-Zb/3e@ogTj0d^}7.xL=Iw~2o1~v<{6nHWL>}vDLNG#O&DM`;12rVLaN' );
define( 'NONCE_KEY',        ' yK2=~9?r>4`7rPO51^7D>u+l=I`yWg9Du`18`,JKJVKO|fpTGV>;D?^+5?@Ff[$' );
define( 'AUTH_SALT',        ',r0+@*ctMibhy:ileY-b$O_69@Lk,oF<KFlaTz5RIB_z)+WEMtU><6vyxm0kaBM8' );
define( 'SECURE_AUTH_SALT', 'aXc`,e}G8]b-f}7I/Xb0g[`XY6<*+xy}k$.ceRVnI;&o/FNa&ZqdhMb5D oO+j/4' );
define( 'LOGGED_IN_SALT',   ' xy(3HShc^@<7X^PYIm@@P_+HQYi<<I)//06%y[r6[rvfT{#&@pS,) 3RAaCFxEf' );
define( 'NONCE_SALT',       'j>6tzD3~!M>LCbg;FX3c5/QC}K`@$To~?Rah% m;P:YYD[2K HRmGfF.;yjE/(Ew' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
