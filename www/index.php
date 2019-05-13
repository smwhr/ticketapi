<?php

require_once("../../vendor/autoload.php");
require_once("../src/Services/DBConnect.php");
use Services\DBConnect as DBConnect;
session_start();


$request_uri = $_SERVER["REQUEST_URI"];

@list($initialSlash,
     $controller_query, 
     $action_query, 
     $rest) = explode("/", $request_uri);

$controller_query = !empty($controller_query) ? $controller_query : "index";
$action = !empty($action_query) ? $action_query : "list";

$controllerName = 
              "\Controllers\\".
              ucfirst($controller_query)."Controller";

$config = json_decode(file_get_contents("../conf/config.json.dist"), true);
$db = new DBConnect(
              $config["database"]["dsn"],
              $config["database"]["user"],
              $config["database"]["password"]
            );
$conn = $db->getConnexion();

$controller = new $controllerName($conn);

$controller->$action();