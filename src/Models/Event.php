<?php

namespace Models;

class Event{


  public $id;
  public $name;
  public $start_at;
  public $location;
  
  public function __construct(){}

  public static function fetchList($conn){
    $sql = "SELECT * FROM events";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(\PDO::FETCH_CLASS, "\\Models\\Event");
  }
}