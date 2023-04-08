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
define( 'DB_NAME', 'favbettest' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'qGFV?a})4pHBtCYt8OT{_.6%,aTs9C){?[tlKkd`&V.!@K&VNe2D6jK=85Rw-iY(' );
define( 'SECURE_AUTH_KEY',  '0um-z6u!fm4iDvm/<E-ewauSw~H?$V$o^,ze1A>>&2IcicGu<z T$E=NI[I^rN! ' );
define( 'LOGGED_IN_KEY',    '?:}Raq9P)VB*P axX?[W*|1bhH9 Uqj,Vb&1|,7_JQ:{?^@mEy</P[<Y]nWk6{);' );
define( 'NONCE_KEY',        'I*YpjTq<j.:X8gTf,v SztS jJ)s=zqNE&Rv0O>sMZk<uB4mo%}]Ih4995UJ*-(B' );
define( 'AUTH_SALT',        'I|>QmWGl1Fgktlk~Q7!k`t&5M@~wGwK@JDLB7XUZ/R90u~?|uw<qP^3_a-mo5cNb' );
define( 'SECURE_AUTH_SALT', 'dC]?|B($r$xeQ>Ae@[SgKV6$T9wF<* tKkXSzZinDbR}BCKH8O2%nD[f`f[ry}Gz' );
define( 'LOGGED_IN_SALT',   '=9@uofkejSjRwr31iST9$eNs{nZak%z2W-zP]4;kQY>],c]phrR?{`7l7v;mo8iG' );
define( 'NONCE_SALT',       'w ?lxh`[P6c68z/T<$oQI=DvU zF!A$`HZr<Vs<^JCCaP45(0G 27t0!)~`% oLd' );

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
