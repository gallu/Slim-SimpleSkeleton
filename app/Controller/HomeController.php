<?php
declare(strict_types=1);

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class HomeController
{
    // XXX 1クラスに「1つしかメソッドを書くつもりがない」場合、こういった書き方もできる
    public function __invoke(Request $request, Response $response, $args)
    {
        // 出力
        $response->getBody()->write("Top Page");
        return $response;
    }
}


