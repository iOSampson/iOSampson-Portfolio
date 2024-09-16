<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         '_%$8.jl`J/.#) `zi,]RHfdzla@[!=pr/LiL2vB-koyhu+;A-@=DD>6g?BjJIuSd' );
define( 'SECURE_AUTH_KEY',  '$,2ZmBCaR<:Rr6c!i&eUTJ&ru_9m2~X/+=K9~ngE+~W@5+DIN:&>#VAQ!! gmJVv' );
define( 'LOGGED_IN_KEY',    'J&+.H4WA.IK:,)` b=C$]2~C6<$,N+g++D:<+M|2f BOb.YdS@^9J_UN*lu}+[zu' );
define( 'NONCE_KEY',        'QY.2cvUO<d;l0>Lv*-sZt=|<bP*GEb8jjSVy=+Y)WOIm&x+;%PD<0EL5jtj}-loV' );
define( 'AUTH_SALT',        ':XPlq5s/$TB?&%v~U+NZr$QX7^*fv,LVPofJ;Fb8+_I=ST=h_}pYgU.! .b7aNSh' );
define( 'SECURE_AUTH_SALT', 'kYlxR?OKipZ?&M|}9`T3HOb:J{q1!@_q%oy`1Oe:$VEN??iKsAWfsj0>wV!=555L' );
define( 'LOGGED_IN_SALT',   'szFDl,cJSMSWJmM=4n8H$`C)u;_AIOr+Y$;UD9xD nK5_SVWkv#:6v O7={v6az:' );
define( 'NONCE_SALT',       'oi8.dq`1Hc02Nq:tlUO9CbZ*(&!zu-JXb#rkMA &_lW}~~J;8vLo^lO9`W^3bCOA' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
