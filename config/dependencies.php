<?php

declare(strict_types=1);
// DIC configuration


return function (\DI\Container $container, \Slim\App $app) {
    // view renderer
    $container->set(
        'renderer',
        function () use ($container) {
            $settings = $container->get('settings')['renderer'];
            $twig = new \Twig\Environment(new \Twig\Loader\FilesystemLoader($settings['template_path']));
            //
            return $twig;
        }
    );
};
