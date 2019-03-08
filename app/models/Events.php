<?php

namespace DBProject\App\Models;

use \DBProject\Lib\TinyORM;

class Events extends TinyORM {
  const AUTHORIZED = [
    'start',
    'end',
    'title'
  ];

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
