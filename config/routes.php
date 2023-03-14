<?php
declare(strict_types=1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

// 初期に書いてあるルーティング
$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});
// 追加のルーティング
$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("Top Page");
    return $response;
});

https://www.slimframework.com/docs/v3/objects/router.html
