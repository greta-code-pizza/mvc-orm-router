<?php

namespace DBProject\App\Models;

use \DBProject\Lib\TinyORM;

class Tags extends TinyORM {
  // Règles de validation
  const AUTHORIZED = ['label'];
  const EXPECTED = ['label'];
}
