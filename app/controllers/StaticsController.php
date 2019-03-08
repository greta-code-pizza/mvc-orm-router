<?php

namespace DBProject\App\Controllers;

class StaticsController extends ApplicationController {
  public function hello () {
    $hello = 'Hello World';
    require('app/views/statics/hello.php');
  }

  public function notFound () {
   require('app/views/statics/not-found.php');
  }
}
