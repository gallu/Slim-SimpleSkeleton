<?php
declare(strict_types=1);
// DIC configuration

use SlimLittleTools\Middleware\CsrfGuard;

return function (\DI\Container $container, \Slim\App $app) {
    // view renderer
    $container->set(
        'renderer' ,function () use($container, $app) {
            $settings = $container->get('settings')['renderer'];
            $twig = new \Twig\Environment(new \Twig\Loader\FilesystemLoader($settings['template_path']));
            //
            return $twig;
        }
    );
};
