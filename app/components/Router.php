<?php

namespace Component;

class Router
{
    private $routes;

    public function __construct()
    {
        $routePath = __DIR__ . '/../config/routes.php';
        $this->routes = require_once "$routePath";
    }

    public function run()
    {

        $uri = $this->getURI();

        foreach ($this->routes as $uriPattern => $path) {

            if (preg_match("~$uriPattern~", $uri)) {

                $internalRoute  = preg_replace("~$uriPattern~", $path, $uri);
                $segments       = explode('/', $internalRoute);
                $controllerName = ucfirst(array_shift($segments)) . 'Controller';
                $actionName     = array_shift($segments) . 'Action';
                $parameters     = $segments;

                $controllerFile = __DIR__ . '/../controllers/' . $controllerName . '.php';

                if (is_readable($controllerFile)) {
                    require_once($controllerFile);
                }

                $controllerObject = new $controllerName;
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                if ($result != null) {
                    break;
                }

            }
        }

    }

    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }
}