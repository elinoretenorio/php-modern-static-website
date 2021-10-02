<?php

declare(strict_types=1);

// Dependencies

$container->add('TwigLoader', Twig\Loader\FilesystemLoader::class)
    ->addArgument(BASE_PATH . $_ENV['TEMPLATE_PATH']);
$container->add('Twig', Twig\Environment::class)
    ->addArgument('TwigLoader')
    ->addArgument([
        'cache' => ($_ENV['SYSTEM_TYPE'] == 'prod') ? BASE_PATH . $_ENV['TEMPLATE_CACHE'] : false,
    ]);

// Core

$container->add('Template', Website\Template\TwigTemplate::class)
    ->addArgument('Twig');

// Home

$container->add(Website\Home\HomeController::class)
    ->addArgument('Template');