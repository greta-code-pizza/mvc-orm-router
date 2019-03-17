<?php

namespace DBProject\App\Models;

use \DBProject\Lib\TinyORM;
use \DBProject\App\Models\Tags;
use \DBProject\App\Models\JoinArticlesTags;

class Articles extends TinyORM {
  // Règles de validation
  const AUTHORIZED  = ['title', 'content'];
  const EXPECTED    = ['title', 'content'];

  public function findWithTags($id) {
    $article = self::find($id);
    $article['tags'] = [];
    $joins = JoinArticlesTags::where('id_article', $article['id']);

    foreach($joins as $join) {
      array_push(
        $article['tags'],
        Tags::find($join['id_tag'])
      );
    }

    return $article;
  }

  public function createWithTags() {
    $article = self::create($_POST);

    foreach($_POST['tags'] as $tag) {
      $join = [
        'id_article' => $article['id'],
        'id_tag' => $tag['id'],
      ];

      JoinArticlesTags::create($join);
    }
  }
}
