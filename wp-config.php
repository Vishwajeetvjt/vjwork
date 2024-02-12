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
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);

define( 'DB_NAME', 'vjtestwork' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'Tk.Q&$G|y?M{zMpC`~1Vu2<*v-bzhH<,|t18xn{Uh={<gT$T uRO:+{0S!vT>Ev^' );
define( 'SECURE_AUTH_KEY',  'BL<P4[q4SkdDlMX$F>$v+BB5_tZl>%j5o!FBvfm4@NZ2ugcz@7Ozn)wOiI{%l@;!' );
define( 'LOGGED_IN_KEY',    ',l7LPcS^}(S*[GH#c.k._?:>U=4 fR#AYL>z,uff/CO#Y``dP0^{b@hV7v!nF8E1' );
define( 'NONCE_KEY',        '[4lFTwp=A406)ZE)]ks)C?FN%_zG7e(t*sP3FSQgI1S:qh8oL|F>5xiJ)Vo>R[))' );
define( 'AUTH_SALT',        'FK,]7y]]nb/X:5knfGU><Jz%86ryaw.I)yN/ht4Pw#.VaU{)5TaVFU5jUU k$iMM' );
define( 'SECURE_AUTH_SALT', '2m5-n,U=o2g(0mha9R5zrAC2A1jQ+)U)u,q,De=dIzVC7Xx*0_vGw^x|~d6=[[dR' );
define( 'LOGGED_IN_SALT',   'f>HH)#z{)2}GPU-<RA]jrUxnys_j%F^C^L0 2w;P[o_+SoDUf<E{5sl|bg2#I!O<' );
define( 'NONCE_SALT',       '.-wMCHN]~|a|j-+DB7q[(F!ft>(>00*%OBiwwi?Is.-,2x~3N,@yqM9hd6[Jg|[!' );

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
