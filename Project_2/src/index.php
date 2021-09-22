<?php 

$routes = [
    
    '/create' => 'createDoc.php',
    '/update' => 'updateDoc.php'
];

function getMethod($routes, $uri) {
    foreach ($routes as $route => $val) {       
        if ($route == $uri) {
            return $val;
        }
    }

    return notFound();
}


function notFound() {
    http_response_code(404);
    echo '404';
    die();
}


$uri = $_SERVER['REQUEST_URI'];
$val = getMethod($routes, $uri);
$_SERVER['QUERY_STRING'] = $val;
require $val;

echo "IT'S WORK!";
