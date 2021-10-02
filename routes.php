<?php

declare(strict_types=1);

$router->get('/', 'Website\Home\HomeController::index');
$router->get('/{page}', 'Website\Home\HomeController::index');