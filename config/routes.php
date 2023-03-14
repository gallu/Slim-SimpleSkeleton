<?php
declare(strict_types=1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

// 初期に書いてあるルーティング
$app->get('/hello/{name}', \App\Controller\HelloController::class . ':index');

// 追加のルーティング
$app->get('/', \App\Controller\HomeController::class);
