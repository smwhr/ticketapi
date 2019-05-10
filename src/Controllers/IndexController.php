<?php

namespace Controllers;


class IndexController extends JSONController{

  public function list(){
    return $this->json("Hello !");
  }
  
}