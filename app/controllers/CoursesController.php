<?php

namespace DBProject\App\Controllers;

use \DBProject\App\Models\Courses;

class CoursesController extends ApplicationController {
  public function list () {
    $distances = Courses::allDistances();
    $times = Courses::allTimes();

    require('app/views/courses/list.php');
  }
}
