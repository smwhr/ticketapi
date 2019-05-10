<?php

namespace Controllers;


class IndexController extends JSONController{

  public function home(){
    return $this->json("Hello !");
  }
  
}