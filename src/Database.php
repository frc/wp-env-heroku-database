<?php

namespace Frc\WP\Env\Heroku\Database;

$env = getenv('DATABASE_URL');
if ( $env ) {
    $url = parse_url($env);
    putenv(sprintf('DB_HOST=%s', $url['host']));
    putenv(sprintf('DB_PORT=%s', $url['port']));
    putenv(sprintf('DB_USER=%s', $url['user']));
    putenv(sprintf('DB_PASSWORD=%s', $url['pass']));
    putenv(sprintf('DB_NAME=%s', ltrim($url['path'], '/')));
} else {
    if (!getenv('DB_HOST')) {
        putenv('DB_HOST=localhost');
    }
    if (!getenv('DB_USER')) {
        putenv('DB_USER=root');
    }
}