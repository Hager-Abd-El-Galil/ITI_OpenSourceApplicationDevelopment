<?php
function get_url(){
    
    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $url = explode('/', $url);

    if (isset($url[4]) && $url[4] !== 'products') {
        header("ERROR 404 Not Found");
        exit();
    }
    
    $product_id = null;
    
    if (isset($url[5])) {
        $product_id = (int) $url[5];
       return $product_id;
    }  
}

function handle_methods($_DB, $product_id){
    
    $method = $_SERVER["REQUEST_METHOD"];
    
    switch($method){
        
        case 'POST':
            $post = json_decode(file_get_contents('php://input'), true);
            $response = $_DB->save($post);
            echo json_encode($response);
            break;
            
        case 'GET':
            if ($product_id) {
                if($_DB->search("id", $product_id)){
                    $response =  $_DB->get_record_by_id($product_id);
                    echo json_encode($response);
                }else{
                    $response = ["Error" => "Not Found"];
                    http_response_code(404); 
                }
            }else{
                $response = $_DB->get_data();
            }
            echo json_encode($response);
            break;
            
        case 'DELETE':
            if ($product_id) {
                if($_DB->search("id", $product_id)){
                    $response = $_DB->delete($product_id);
                }else{
                    $response = ["Error" => "Not Found"];
                    http_response_code(404); 
                }
                echo json_encode($response);
            }
            break;

        case 'PUT':
            if ($product_id) {
                if($_DB->search("id", $product_id)){
                    $update = json_decode(file_get_contents('php://input'), true);
                    $response = $_DB->update($update,$product_id);
                }else{
                    $response = ["Error" => "Not Found"];
                    http_response_code(404);
                }
                echo json_encode($response);
            }
            break;

        default:
            $response = ["Error" => "Request Method Not Supported"];
            http_response_code(405);
            echo json_encode($response);
            break;
    }
    
}