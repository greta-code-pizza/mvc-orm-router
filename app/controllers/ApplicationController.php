<?php

namespace DBProject\App\Controllers;

class ApplicationController {
  public function sanitize($authorizeds) {
    $sanitized = [];

    foreach ($authorizeds as $authorized) {
      if (!isset($_POST[$authorized])) { continue; }

      $value = htmlspecialchars($_POST[$authorized]);
      $sanitized[":" . $authorized] = $value;
    }

    return $sanitized;
  }
}
