<?php

/*
|--------------------------------------------------------------------------
| Environment Configuration
|--------------------------------------------------------------------------
|
| This file contains environment-specific configuration settings
|
*/

// Set environment
define('ENVIRONMENT', 'development');

// Development settings
if (ENVIRONMENT === 'development') {
    // Enable error reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    // Disable caching
    $config['cache_on'] = FALSE;
    
    // Enable database debugging
    $config['db_debug'] = TRUE;
}

// Production settings
if (ENVIRONMENT === 'production') {
    // Disable error reporting
    error_reporting(0);
    ini_set('display_errors', 0);
    
    // Enable caching
    $config['cache_on'] = TRUE;
    
    // Disable database debugging
    $config['db_debug'] = FALSE;
}
