<?php

header('X-Robots-Tag: noindex');
// for CORS
$allowed_origins = array(
    'https://yourdomain.com' // must match exactly origin domain if origin is with www. then https://www.yourdomain.com
);

if( isset( $_SERVER['HTTP_ORIGIN'] ) && in_array( $_SERVER['HTTP_ORIGIN'], $allowed_origins ) ){
    header("Access-Control-Allow-Origin: ". $_SERVER['HTTP_ORIGIN'] );
}else{
    exit;
}



header('Access-Control-Request-Method: GET, POST');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');


if( isset( $_POST['data'] )){
    $data = json_decode($_POST['data'], true);
    // set cookie as HTTP cookie 
    setcookie( $data['name'], $data['value'],  (time()+60*60*24*365*2),  $data['path'],  $data['domain'], 0 );
}
