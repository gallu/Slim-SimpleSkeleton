<?php

declare(strict_types=1);

namespace App\Controller;

use DI\Container;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class BaseController
{
    /*
     */
    public function __construct(
        protected Container $container,
    ) {
    }

    /**
     * setNameからURIを取得するためのラッパー
     *
     * @param string                $name   Route name
     * @param array<string, string> $data        Named argument replacement data
     * @param array<string, string> $queryParams Optional query string parameters
     */
    protected function urlFor(string $name, array $data = [], array $queryParams = []): string
    {
        return $this->container->get('router')->getRouteParser()->urlFor($name, $data, $queryParams);
    }

    /**
     * redirect用ラッパー
     */
    protected function redirect(Response $response, string $url, int $status = 302): Response
    {
        return $response
                   ->withHeader('Location', $url)
                   ->withStatus($status);
    }

    /**
     * requestから1項目を取得するラッパー
     *
     * XXX 何で消えたんだろう orz
     * @param  string $key     The parameter key.
     * @param  mixed  $default The default value.
     *
     * @return mixed
     */
    public function getParam(Request $request, string $key, mixed $default = null): mixed
    {
        $postParams = $request->getParsedBody();
        $getParams = $request->getQueryParams();
        $result = $default;
        if (is_array($postParams) && isset($postParams[$key])) {
            $result = $postParams[$key];
        } elseif (is_object($postParams) && property_exists($postParams, $key)) {
            $result = $postParams->$key;
        } elseif (isset($getParams[$key])) {
            $result = $getParams[$key];
        }

        return $result;
    }
    /**
     * @param array|null $only list the keys to retrieve.
     *
     * @param array<int, string>|null $only
     * @return array<string, mixed>|null
     */
    public function getParams(Request $request, ?array $only = null): ?array
    {
        $params = $request->getQueryParams();
        $postParams = $request->getParsedBody();
        if ($postParams) {
            $params = array_replace($params, (array)$postParams);
        }

        if ($only) {
            $onlyParams = [];
            foreach ($only as $key) {
                if (array_key_exists($key, $params)) {
                    $onlyParams[$key] = $params[$key];
                }
            }
            return $onlyParams;
        }

        return $params;
    }

    /**
     * テンプレート用インスタンスの取得とrenderの発行
     *
     * @param array<string, mixed> $context
     */
    protected function render(string $name, array $context = []): string
    {
        // デフォで使う値を追加する
        $context['hoge'] = 'hoge'; // サンプル
        //
        return $this->container->get('renderer')->render($name, $context);
    }

    /**
     * writeのラッパー
     *
     * @param array<string, mixed> $context
     */
    protected function write(Response $response, string $name, array $context = []): Response
    {
        $response->getBody()->write($this->render($name, $context));
        return $response;
    }
}
