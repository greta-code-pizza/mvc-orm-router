<?php

namespace DBProject\App\Models;

use \DBProject\Lib\TinyORM;

class Articles extends TinyORM {
  // Règles de validation
  const AUTHORIZED = ['title', 'content'];
  const EXPECTED = ['title', 'content'];
}
