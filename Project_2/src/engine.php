<?php 
    
    $uri = $_SERVER['REQUEST_URI'];

    $routes = [
        '/hello' => 'index.php',
        '/create' => 'createDoc.php',
        '/update' => 'updateDoc.php'
    ];
    
    foreach ($routes as $key => $val) {
        if ($key == $_SERVER['QUERY_STRING']) require $val;
        }
