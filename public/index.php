<?php
// use Psr\Http\Message\ResponseInterface as Response;
// use Psr\Http\Message\ServerRequestInterface as Request;
use DI\Container;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

// Create Container using PHP-DI
$container = new Container();

// XXX いったん雑に(確認込みで)configっぽいものを設定
$config = [
    'hoge' => 'h_value',
    'foo' => 999,
    'bar' => true,
];
$container->set('setting', $config);

// Set container to create App with on AppFactory
AppFactory::setContainer($container);
$app = AppFactory::create();

// ルーティングの読み込み
require __DIR__ . '/../config/routes.php';

// XXX いったん雑に例外を把握
try {
    $app->run();
} catch(\Throwable $e) {
    echo $e->getMessage();
}

// var_dump(memory_get_peak_usage(true));
