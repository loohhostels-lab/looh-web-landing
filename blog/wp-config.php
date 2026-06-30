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
define( 'DB_NAME', 'u385927259_y2nwJ' );

/** Database username */
define( 'DB_USER', 'u385927259_xNzyK' );

/** Database password */
define( 'DB_PASSWORD', 'n6BP$yH3tR' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',          'hZ]9C`bd=H`^=C~@(II-bG(lrW[;^m:q*1j<R./kcXq=S0 f>7fYQy9%1(`}g[6:' );
define( 'SECURE_AUTH_KEY',   'CD0hisBGnTuT6wMhTgT9q*N.(vpoo(uobgc!O{edC0G3(/,32%YuWBEYyWBdV#hT' );
define( 'LOGGED_IN_KEY',     'U<}=#OcPAbU4pZQ{Zh[4i@8`!L4.<JL4;A~c*=S6e~V)pjsP4Gm=V8%,T$JHO7z(' );
define( 'NONCE_KEY',         'vyPayQ9#C6Z&XUfKmB9t{Y7&DAHI[tD)G!D^/y v}o2/r3WQnpAc4#(M/n-XxoZx' );
define( 'AUTH_SALT',         '{$ojK(~USqF&x@:sP_y7dxwu=sc_s*+Z~V-);6t5|H&:i~=EpGo@J.*UP}a- !%t' );
define( 'SECURE_AUTH_SALT',  't8x&P/K8yIzX|~7~AQCRN%ywflFX3@hNu !MVVA0`}>x)f BxADooN)$5S<X@%kp' );
define( 'LOGGED_IN_SALT',    'bS!$?hr^V@tu4-U}ZS,@+WPszuaG/..Lp^%Qg?kT*cs0;Q@@[m:M:/z[GY{|Jpa|' );
define( 'NONCE_SALT',        '[dgP}s`W4B-Y^gr]!uh5[ntWu|c2KR3Vg 8w!z;NuO4G6_~PPD*bcE0qkmW]8,_6' );
define( 'WP_CACHE_KEY_SALT', '#^w;FBOvdlqw?#lKLRLcko%)_9G)E%rzWml}>]B;ltlBC+7FE(GUVBeilY 2<T3!' );


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

define( 'FS_METHOD', 'direct' );
define( 'COOKIEHASH', '80257962bf690c9fdef12caf5c936414' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
