<?php

use app\core\Application;
use app\controllers\AuthController;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Application(dirname(__DIR__));

$app->router->get('/', function () {
    header('Location: login');
});

$app->router->get('/login',     [AuthController::class, 'login']);
$app->router->get('/register',  [AuthController::class, 'register']);

$app->run();
