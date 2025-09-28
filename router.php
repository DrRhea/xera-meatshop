<?php
// Router untuk PHP built-in server
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Jika file atau direktori yang diminta ada, serve langsung
if (file_exists(__DIR__ . $uri) && $uri !== '/') {
    return false;
}

// Jika tidak, arahkan ke index.php
require_once __DIR__ . '/index.php';
