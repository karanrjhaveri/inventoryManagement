<?php

use Slim\Http\Request;
use Slim\Http\Response;

require 'database.php';

// Routes

/*
    URL to test the API
*/
$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
});
/*
    URL to initialize the Database
*/
$app->get('/init', function (Request $request, Response $response) {
    $database = new Database();
    $db = $database->getConnection();
    $sql = $databse->prepareSQL("databaseScripts/init.sql");
    $database->$conn = null;
    $response->write("Complete");
    return $response;
   });

// $app->get('/[{name}]', function (Request $request, Response $response, array $args) {
//     // Sample log message
//     $this->logger->info("Slim-Skeleton '/' route");

//     // Render index view
//     return $this->renderer->render($response, 'index.phtml', $args);
// });
