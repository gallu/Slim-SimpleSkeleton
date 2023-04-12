<?php
declare(strict_types=1);

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class HelloController extends BaseController
{
    // 多分「よくある」系の書き方
    public function index(Request $request, Response $response, $args)
    {
        $name = $args['name'];
        $response->getBody()->write("Hello, $name");
        return $response;
    }
}
