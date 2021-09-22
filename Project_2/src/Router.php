<?php

class Router extends Singleton 
{
    
    const Routes = [
        '/index' => '/index.php',
        '/create' => 'createDoc.php',
        '/update' => 'updateDoc.php'
    ];

    protected function getMethod($routes, $uri) {
        
        foreach ($routes as $route => $val) {       
            if ($route == $uri) {
                return $val;
            }
        }
    
        return $this->notFound();
    }

    protected function notFound() {
        http_response_code(404);
        echo '404';
        die();
    }

    public function run() {
        
        $uri = $_SERVER['REQUEST_URI'];
        $val = $this->getMethod($routes = self::Routes, $uri);
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
$router->getVar();*/
