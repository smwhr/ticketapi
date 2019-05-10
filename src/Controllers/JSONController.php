<?php


namespace Controllers;

abstract class JSONController extends BaseController{
  
  protected function json($data){
    $json = json_encode($data);
    header("Content-Type: application/vnd.api+json");
    echo $json;
    exit;
  }

}