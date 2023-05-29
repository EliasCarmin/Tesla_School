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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'tesla' );

/** Database username */
define( 'DB_USER', 'admin' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3307' );

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
define( 'AUTH_KEY',         'vlWDBq]jE<`Wv)KvNCP}+-ygpi=5,3Wsk3%vW>+E?m}2Enr}rAlH@AI2kSlmG4si' );
define( 'SECURE_AUTH_KEY',  'driL^91=2dY2R6oD3zl<^+^GWL*=)rSR#F!  -^i.<v!aCvX<FAL|ay#Q%rdK6f1' );
define( 'LOGGED_IN_KEY',    'vU+S;y]FT,V}2HI0k~C`cBDS`t+)uL-Xy%xl?m}j_u5Mn[I9o=>:M[9A0Mf:u*M_' );
define( 'NONCE_KEY',        '9LUdS]1*0DbWI#kIT_8L4mV)2Z^isIr6:4C`<-seln`@<9U+Hv@2:a-phl`t|%TC' );
define( 'AUTH_SALT',        '0T/5Ws%IJ0D4E2f[CpxSK[&&`XWu4B-#cQwjZt%,0tMi^{fjk$Rrppv.ffx|iO`)' );
define( 'SECURE_AUTH_SALT', '8 ^[{]3Mt}TywM[}=+Woz>TZ!gns1oyHp[b>[#dFxcmYR@yi;Gi7jkBGnyh.o4 I' );
define( 'LOGGED_IN_SALT',   '7?)63(=m{c(AB|vx]n|l/Rd;|JP?4VCX`IKTYAq11$ijNi$<L`YF@Lubqkq|ar5Z' );
define( 'NONCE_SALT',       'K@nT|!TfzeD@fW=>hJ=Jn![S_/3y> zv `X<2QVxXLkd|UN4I>gnrTmRo95nN@)2' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
