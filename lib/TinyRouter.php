<?php

namespace DBProject\Lib;

use \DBProject\App\Controllers\ApplicationController;
use Symfony\Component\Yaml\Yaml;

class TinyRouter {
  private $applicationController;

    /* Méthodes de classe */

  private static function routes() {
    return Yaml::parseFile('./config/routes.yml');
  }


  /* Méthodes d'instance */

  public function __construct($route=null) {
    $this->route = $route;
    $this->applicationController = new ApplicationController();
  }

  /* Méthode principale du router */
  public function call() {
    $routes = self::routes();

    /*
     * On redirige vers root (dans config/routes.yml)
     * lorsqu'on a pas de paramètre d'url.
     */
    if (is_null($this->route)) { $this->redirect($routes['root']); }

    /* On appel notre controller si la route est valide (présent dans list ou not_found) */
    if ($this->hasValidRoute()) {
      $this->callController();
      return;
    }

    /*
     * On tombe ici uniquement si la route n'est pas valide
     * à ce moment on redéfini la route qui devient not_found
     * avant de rappeler la méthode courante
     */
    $this->route = $routes['not_found'];
    $this->call();
  }

  public function redirect($route) {
    $this->route = $route;
    $this->call();
  }

  private function callController() {
    $params = $this->routeToParams($this->route);
    require("app/controllers/{$params['controller']}.php");
    $controllerName = '\DBProject\App\Controllers\\' . $params['controller'];

    $controller = new $controllerName();

    if ($params['id']) {
      $controller->{$params['method']}($params['id']);
    } else {
      $controller->{$params['method']}();
    }
  }

  /*
   * Transforme une route de type articles.show.12
   * en tableau d'informations:
   * [
   *  'controller' => 'ArticlesController',
   *  'method' => 'show',
   *  'id' => 12,
   *  'view' => 'app/views/articles/show.php'
   * ]
   */
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

  /* Transforme ['Ma', 'super', 'methode'] en MaSuperMéthode */
  private function arrayToCamel($ary) {
    return str_replace(' ', '', ucwords(join(' ', $ary)));
  }

  /*
   * @return Boolean true si la route est valide, sinon false
   */
  private function hasValidRoute() {
    $routes = self::routes();
    $baseRoute = $this->baseRoute($this->route);

    return in_array($baseRoute, $routes['list']) || $this->route == $routes['not_found'];
  }
}
