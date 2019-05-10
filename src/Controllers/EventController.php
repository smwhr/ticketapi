<?php

namespace Controllers;


class EventController extends JSONController{

  public function id(){
    $id = $_GET["id"];
    $event = \Models\Event::fetchById($this->conn, $id);
    return $this->json($event);
  }

  public function list(){
    $events = \Models\Event::fetchList($this->conn);
    return $this->json($events);
  }
  
}