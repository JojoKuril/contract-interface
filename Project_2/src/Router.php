<?php

class Router extends Singleton 
{
    
    protected $routes = [
        '/index' => '/index.php',
        '/create' => 'createDoc.php',
        '/update' => 'updateDoc.php'
    ];

    protected function getMethod($routes, $uri) {
        $uri = $_SERVER['REQUEST_URI'];
        foreach ($routes as $route => $val) {       
            if ($route == $uri) {
                return $val;
            }
        }
    
        return notFound();
    }

    protected function notFound() {
        http_response_code(404);
        echo '404';
        die();
    }

    public function run() {
        $val = $this->getMethod($routes, $uri);
        $_SERVER['QUERY_STRING'] = $val;
        require $val;
    }

    public function getVar($name, $default = null) {

    }
}
/*
$router = Router::getInstance();
$router->run();
$router = Router::getInstance();
$router->getVar();