<?php


namespace app\core;

use app\core\Application;

class Controller
{
    public string $layout = 'main';

    public function render($view, $params = [])
    {
        return Application::$app->router->render($view, $params);
    }
}
