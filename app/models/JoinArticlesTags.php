<?php

namespace DBProject\App\Models;

use \DBProject\Lib\TinyORM;

class JoinArticlesTags extends TinyORM {
  // Règles de validation
  const AUTHORIZED = ['id_article', 'id_tag'];
  const EXPECTED = ['id_article', 'id_tag'];
}
