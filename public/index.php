<?php

/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the p-server-cms root now.
 */
chdir(__DIR__ . '/..');

// Decline static file requests back to the PHP built-in webserver
if (php_sapi_name() === 'cli-server' && is_file(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))) {
    return false;
}

// Setup autoloading
require __DIR__ . '/../vendor/autoload.php';

// Run the p-server-cms!
Zend\Mvc\Application::init(require __DIR__ . '/../config/application.config.php')->run();
