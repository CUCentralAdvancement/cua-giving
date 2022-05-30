<?php

/**
 * Load services definition file.
 */
$settings['container_yamls'][] = __DIR__ . '/services.yml';

/**
 * Include the Pantheon-specific settings file.
 *
 * n.b. The settings.pantheon.php file makes some changes
 *      that affect all environments that this site
 *      exists in.  Always include this file, even in
 *      a local development environment, to ensure that
 *      the site settings remain consistent.
 */
include __DIR__ . "/settings.pantheon.php";

/**
 * Skipping permissions hardening will make scaffolding
 * work better, but will also raise a warning when you
 * install Drupal.
 *
 * https://www.drupal.org/project/drupal/issues/3091285
 */
// $settings['skip_permissions_hardening'] = TRUE;

/**
 * If there is a local settings file, then include it
 */
$local_settings = __DIR__ . "/settings.local.php";
if (file_exists($local_settings)) {
  include $local_settings;
}

// Automatically generated include for settings managed by ddev.
$ddev_settings = dirname(__FILE__) . '/settings.ddev.php';
if (getenv('IS_DDEV_PROJECT') == 'true' && is_readable($ddev_settings)) {
  require $ddev_settings;
}

// Include settings required for Redis cache.
if ((file_exists(__DIR__ . '/settings.ddev.redis.php') && getenv('IS_DDEV_PROJECT') == 'true')) {
  include __DIR__ . '/settings.ddev.redis.php';
}

// Redis.
// Include the Redis services.yml file. Adjust the path if you installed to a contrib or other subdirectory.
$settings['container_yamls'][] = 'modules/redis/example.services.yml';
$settings['cache']['default'] = 'cache.backend.redis';
$settings['cache']['bins']['form'] = 'cache.backend.database'; // Use the database for forms
$settings['redis.connection']['interface'] = 'PhpRedis';
if (defined('PANTHEON_ENVIRONMENT')) {
    $settings['redis.connection']['host']      = $_ENV['CACHE_HOST'];
    $settings['redis.connection']['port']      = $_ENV['CACHE_PORT'];
    $settings['redis.connection']['password']  = $_ENV['CACHE_PASSWORD'];
    $settings['redis_compress_length'] = 100;
    $settings['redis_compress_level'] = 1;
    $settings['cache_prefix']['default'] = 'pantheon-redis';
} else {
    $settings['redis.connection']['host']      = 'ddev-cua-giving-redis';  // Your Redis instance hostname.
}


