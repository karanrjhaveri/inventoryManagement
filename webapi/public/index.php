<?php

require __DIR__ . '/../src/dependencies.php';

/*
    URL to test the API
*/
$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
});
/*
    Main URL
*/
$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("Hello");

    return $response;
});
/*
$app->get('/something', function () use ($app) {
    $dataArray = ['1','2'];// Some data array
    
    $response = $app->response();
    $response['Content-Type'] = 'application/json';
    $response['X-Powered-By'] = 'Potato Energy';
    $response->status(200);
    $response->body(json_encode($dataArray));

    return $response;

});
*/
$app->get('/login', function (Request $request, Response $response, array $args) {
    $body = require __DIR__ . '/../classes/login/index.php';
    $response->getBody()->write($body);

    return $response;
});

// $app->post('/login', function (Request $request, Response $response, array $args) {
//     $user = ($POST['user']);
//     $input = $request->getParsedBody();
//     $sql = $this->db->prepare("SELECT * FROM $USERS_TABLE WHERE user='".$user."'");
//     $result = $sql->execute();

//     $rowCount = $result->numRows;
//     if ($rowRount>0){
//       return $this->response->withJson(array("ok"=>"authorized access"));

//     }else{
//       return $this->response->withJson(array("error"=>"declined access"));

//     }
//     });
// -----------------------------------------------



// Run app
$app->run();
