<?php

/** WP 2FA plugin data encryption key. For more information please visit melapress.com */
define( 'WP2FA_ENCRYPT_KEY', 'sl3kbU8gLWMfF4RDyVpb/w==' );

define( 'ITSEC_ENCRYPTION_KEY', 'JFMxJUBYV3B4WTorbGEmeHxwWzJNcCVKcDFidFR8aGd3SjUxbCNMMGAkNHhBcEdAeXh4IXt6TCxIeCQ6Zn5tIQ==' );

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
define( 'DB_NAME', 'if0_36136148_wp759' );

/** Database username */
define( 'DB_USER', '36136148_1' );

/** Database password */
define( 'DB_PASSWORD', 'yTp7S1[!T9' );

/** Database hostname */
define( 'DB_HOST', 'sql110.byetcluster.com' );

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
define( 'AUTH_KEY',         'rfnyk6d4b7e16jiqmdpn8unxv1tt8m3vuzbwypzym7zaz27whfm9mqqpjjtc9snk' );
define( 'SECURE_AUTH_KEY',  'dsqxt1mvpman268kartntyufw3tw2axhxczwi7xcjeazu6r7qswq0nsgcpzt8yni' );
define( 'LOGGED_IN_KEY',    'cq2qj6dgqgd6gqu88iug7ayfjvonr6hqzj4lhsuvs7kyllshxamngmvzsu1kjgsa' );
define( 'NONCE_KEY',        '0bgzgji7yuyraked4i3ff7hzwc98prrhnlub0kam0q2yrwd0e4h5kxoiuu3tmady' );
define( 'AUTH_SALT',        'bz0d8cy30pc68ltht5ln9athctwcowyfpv9lwryzx4c495gvlfv2xndv9eriho2p' );
define( 'SECURE_AUTH_SALT', 'z15nxaedalpx8nefavrt8og6kdhyorz5qy3bqxermdkr67old2mtrto3ggl0y2ty' );
define( 'LOGGED_IN_SALT',   'wwe5euxhxu659zmnu9jw5t0bz2llpn9cdbwhcd6uwtlpdfmrk61whtgqtwuqyvzu' );
define( 'NONCE_SALT',       'fqlffvgyz4screfadvnnrudg2cgpqtoty62gy8jurhkaalukouctjjgk7mb3t9wy' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wptn_';

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
define( 'WP_DEBUG', true );

define( 'WP_DEBUG_DISPLAY', false );

define( 'WP_DEBUG_LOG', true );