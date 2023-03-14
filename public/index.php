<?php
// use Psr\Http\Message\ResponseInterface as Response;
// use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

// ルーティングの読み込み
require __DIR__ . '/../config/routes.php';

// XXX いったん雑に例外を把握
try {
    $app->run();
} catch(\Throwable $e) {
    echo $e->getMessage();
}
