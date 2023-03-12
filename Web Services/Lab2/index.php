<?php 
require_once("./config.php");
require_once("./functions.php");
require_once("./MySQLHandler.php");

$_DB = new MySQLHandler("products");
$_connect = $_DB->connect();

if($_connect){
    
    $product_id = get_url(); 
    handle_methods($_DB, $product_id);
      
}else{
    $response = ["error" => "database Not connected."];
    http_response_code(500);
    header('Content-Type: application/json');
}