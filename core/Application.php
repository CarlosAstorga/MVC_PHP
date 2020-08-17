<?php

namespace app\core;

class Application
{
    public Database $db;
    public Router $router;
    public Request $request;
    public Response $response;
    public Controller $controller;
    public static Application $app;
    public static string $ROOT_DIR;

    public function __construct($rootPath, $config)
    {
        self::$app      = $this;
        self::$ROOT_DIR = $rootPath;
        $this->db       = new Database($config['db']);
        $this->request  = new Request();
        $this->response = new Response();
        $this->router   = new Router($this->request, $this->response);
    }

    public function run()
    {
        echo $this->router->resolve();
    }
}
