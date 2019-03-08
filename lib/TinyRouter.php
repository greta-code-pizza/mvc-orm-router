<?php

namespace DBProject\Lib;

use \DBProject\App\Controllers\ApplicationController;
use Symfony\Component\Yaml\Yaml;

class TinyRouter {
  private $applicationController;

  private static function routes() {
    return Yaml::parseFile('./config/routes.yml');
  }

  public function __construct($route=null) {
    $this->route = $route;
    $this->applicationController = new ApplicationController();
  }

  public function call() {
    $routes = self::routes();

    if (is_null($this->route)) { $this->redirectToRoot($routes); }

    $baseRoute = $this->baseRoute($this->route);

    if (in_array($baseRoute, $routes['list']) || $this->route == $routes['not_found']) {
      $params = $this->routeToParams($this->route);
      $this->callController($params);
      return;
    }

    $this->route = $routes['not_found'];
    $this->call();
  }

  public function redirectToRoot($routes) {
    $this->route = $routes['root'];
    $this->call();
  }

  private function callController($params) {
    require("app/controllers/{$params['controller']}.php");
    $controllerName = '\DBProject\App\Controllers\\' . $params['controller'];
    $controller = new $controllerName();

    if ($params['id']) {
      $controller->{$params['method']}($params['id']);
    } else {
      $controller->{$params['method']}();
    }
  }

  private function routeToParams($route) {
    $exp = explode('.', $route);

    $explodedController = explode('-', $exp[0]);
    $explodedMethod = explode('-', $exp[1]);
    $id = $exp[2];

    $controller =  $this->arrayToCamel($explodedController);
    $method = lcfirst($this->arrayToCamel($explodedMethod));

    return [
      'controller' => $controller . 'Controller',
      'method' => $method,
      'id' => $id,
      'view' => "app/views/{$exp[0]}/{$exp[1]}.php"
    ];
  }

  private function baseRoute($route) {
    $exp = explode('.', $route);
    return $exp[0] . '.' . $exp[1];
  }

  private function arrayToCamel($ary) {
    return str_replace(' ', '', ucwords(join(' ', $ary)));
  }
}
