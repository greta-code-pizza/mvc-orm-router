<?php

namespace DBProject\App\Models;

use \DBProject\Lib\TinyORM;

class Courses extends TinyORM {
  // Règles de validation
  const AUTHORIZED  = ['distance', 'time'];
  const EXPECTED    = ['distance', 'time'];


  // Méthodes d'instance

  public function allDistances() {
    $courses = self::all();
    $aryCourses = [];

    foreach ($courses as $course) {
      array_push($aryCourses, intval($course['distance']));
    }

    return $aryCourses;
  }

  public function allTimes() {
    $courses = self::all();
    $aryCourses = [];

    foreach ($courses as $course) {
      array_push($aryCourses, intval($course['time']));
    }

    return $aryCourses;
  }
}
