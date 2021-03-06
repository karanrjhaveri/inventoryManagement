<?php
session_start();

require __DIR__ . '/../vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true, // disable in production
    ]
]);

require 'routes.php';
