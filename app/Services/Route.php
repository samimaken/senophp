<?php
namespace App\Services;

class Route {

    private static $routes = [];
    private static $controllerNameSpace = 'App\Controllers\\';
    private static $middlewareNameSpace = 'App\Middlewares\\';

    public  static function add($url,$controller,$action,$method = 'GET', $middlewares = []) {
      self::$routes[] = [
        'url' => $url,
        'controller' => $controller,
        'action' => $action,
        'method' => $method,
        'middlewares' => $middlewares,
      ];
    }

    public function handle() {
        $requestURI = $_SERVER['REQUEST_URI'];
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        foreach(self::$routes as $route) {
            if('/'.$route['url'] == $requestURI && $route['method'] == $requestMethod) {
                  foreach($route['middlewares'] as $middleware) {
                    $middleware = self::$middlewareNameSpace.$middleware;
                    $middlewareCall = new $middleware();
                    $middlewareCall->handle();
                  }
                  $controllerClass = self::$controllerNameSpace.$route['controller'];
                  $action = $route['action'];
                  $controller = new $controllerClass();
                  $controller->$action();
                  return;
            }
        }
        echo '404 Page not found';
    }
}