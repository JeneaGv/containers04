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
define( 'DB_USER', 'wordpress' );

/** Database password */
define( 'DB_PASSWORD', 'wordpress' );

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
define( 'AUTH_KEY',         'w [)&Eto6Zay.ErutKq*$f&dc3J&8.saZ/fZ?5S/O`=aH*dHh;*0a`GN1hoOeV@1' );
define( 'SECURE_AUTH_KEY',  '(2p(y+c!n7i<F>z}|],M2~bT1ME|S+]id* 0Y<fy0ugLWbxFlllcy+CwoGHZ:mY$' );
define( 'LOGGED_IN_KEY',    'CQl`]aH%#NK^aq,`9?>hiGX<^rQ5bI|7qL^HMEMCO.-o;`6^9&g*;?`R+:Nj!IpK' );
define( 'NONCE_KEY',        'il!1N3*wv|D[)36xX$mas#dT7Hm;b*CWvZP|D!ItEO2@_{K(;aYq,h8+=>(qj&rq' );
define( 'AUTH_SALT',        'pThV2m_*2:3=s[/dIe>RfyMu6tyVa1qehjZ!X~ZEhwoH?M+8pZk:x&HWUQ!41tDE' );
define( 'SECURE_AUTH_SALT', ':nl}1xwhS[(wu$hBc,-&I3dVjTmIDBQ_.Ip8AU`*p33lgz+n>/<`o7dQgmm;~DaZ' );
define( 'LOGGED_IN_SALT',   'VbO@UV89sC[H6i}T1` No%W:r)ghAXg[g&.abW:tcTi0C>OjFddG,w5#Ay~l-Gm#' );
define( 'NONCE_SALT',       'pq>=i6{Ka*Q~2sX1*t5r2zaB<Ehkr`;,/gIEm`=Jz0%aA+Ov!Li)c&( N!kSHFAp' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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