<?php

namespace DBProject\App\Controllers;

use \DBProject\App\Models\Events;

class EventsController extends ApplicationController {
  public function list() {
    $jsonEvents = Events::serializeAll(Events::AUTHORIZED);

    require('app/views/events/list.php');
  }
}
