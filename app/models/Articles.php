<?php

namespace DBProject\App\Models;

use \DBProject\Lib\TinyORM;

class Articles extends TinyORM {
  const AUTHORIZED = [
    'title',
    'content'
  ];
}
