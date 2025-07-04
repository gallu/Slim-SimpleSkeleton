<?php

declare(strict_types=1);

use Slim\App;

return function (App $app) {
    // 初期に書いてあるルーティング
    $app->get('/hello/{name}', \App\Controller\HelloController::class . ':index');

    // 追加のルーティング
    $app->get('/', \App\Controller\HomeController::class);
};
