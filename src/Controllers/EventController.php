<?php

namespace Controllers;


class EventController extends JSONController{

  public function list(){

    $events = \Models\Event::fetchList($this->conn);
    return $this->json($events);
  }
  
}