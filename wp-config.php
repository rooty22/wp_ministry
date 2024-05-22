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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'G`T? reUEqM&rK>V(e(u@Vv*A8}9u_7g/)<2.No>lB@+]lT.tn-EmBv$4wIk^Pzy' );
define( 'SECURE_AUTH_KEY',   'gUNI*y<oX[!SGzEbri&v-8~su_3xv=XT{=5%qc(H=(3``IvbZK:@j;.u<e{/y3hK' );
define( 'LOGGED_IN_KEY',     '5AF$?:k0H%3E5o!OZ-Klz96h(UO@Ni?Jp}f,%Yp9b5|szuCU32k-*voFAZ#K^%%G' );
define( 'NONCE_KEY',         'mKrA8}CaUdt:ERV,S0bG4Muk$4oQ9&W,&z8dr`2,|k[1G?#i.VXH1zrRx0XnNLCr' );
define( 'AUTH_SALT',         '}$rZ`;kyX-Er6tX-=t]P<?X4epou)Z+F:4&o]N=q7iQHl|Y0D1M1RXscBQO$PNZ8' );
define( 'SECURE_AUTH_SALT',  '-6!KJqX/NOSbewWw9%}r(3hYfc%A)P~y(g,-]%/*/5hIoHH)+]3u~cmQE^/xzDQa' );
define( 'LOGGED_IN_SALT',    '1cM6ihCO|nE.EBb=Cq.Xp.0{NIo<1O#J(.@hH}!w%lLb$MA &{12PWL1jL9*LK(z' );
define( 'NONCE_SALT',        '.Tm;,}n3q~dzFyLQ#DmSAan@:gNCr;t>s(T|OE?[OrEDsRw5-YdBA?;-][=X| Ab' );
define( 'WP_CACHE_KEY_SALT', '-9O%C_Rm|@+%lhxEel+{L`qBB$/c4$;$&uV 21[(yyt==TAhjZ<3DIOV3yC&zF[z' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
