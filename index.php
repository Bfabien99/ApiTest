<?php
    require 'controller/apiController.php';
    require 'vendor/autoload.php';
/* CORS DISABLE */

    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: token, Content-Type');
        header('Access-Control-Max-Age: 1728000');
        header('Content-Length: 0');
        header('Content-Type: text/plain');
        die();
    }

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');


/* END CORS DISABLE */


    $router = new AltoRouter();
    $router->map('GET','/','ApiController.get');
    $router->map('GET','/test','ApiController.getAppart');
    $match = $router->match();
    if($match !== null)
    {
        $code = explode(".",$match['target']);
        if (method_exists($code[0],$code[1])) {
            return call_user_func_array([(new $code[0]),$code[1]],$match['params']);
        }
        else {
            return http_response_code(404);
        }

    }
    else
    {
        echo "no Match";
    }