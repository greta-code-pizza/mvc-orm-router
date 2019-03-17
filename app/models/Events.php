<?php

namespace DBProject\App\Models;

use \DBProject\Lib\TinyORM;

class Events extends TinyORM {
  // Règles de validation
  const AUTHORIZED  = ['start', 'end', 'title'];
  const EXPECTED    = ['start', 'end', 'title'];


  // Méthodes d'instance

  public function serializeAll() {
    $events = self::all();
    $aryEvents = [];

    foreach ($events as $event) {
      array_push(
        $aryEvents,
        [
          'title' => $event['title'],
          'start' => $event['start'],
          'end' => $event['end']
        ]
      );
    }

    return json_encode($aryEvents);
  }
}
