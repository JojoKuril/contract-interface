<?php 
    
    $routes = [
        '/doc/create' => 'createDoc.php',
        'doc/update' => 'updateDoc.php'
    ];

    foreach ($routes as $key => $val) {
        if ($key == $_SERVER['QUERY_STRING']) require $val;
        }

        
?>