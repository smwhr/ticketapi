<?php
require_once("../vendor/autoload.php");

session_start();

$request_uri = $_SERVER["REQUEST_URI"];
list($controller, $action, $rest) = explode("/", $request_uri);

var_dump($controller);
var_dump($action);
die();

$controller_query = $_GET["controller"] ?? "index";
$action = $_GET["action"] ?? "home";

$controllerName = 
              "\Controllers\\".
              ucfirst($controller_query)."Controller";

$config = json_decode(file_get_contents("../conf/config.json"), true);
$db = new \Services\DBConnect(
              $config["database"]["dsn"],
              $config["database"]["user"],
              $config["database"]["password"]
            );
$conn = $db->getConnexion();

$controller = new $controllerName($conn);

$controller->$action();