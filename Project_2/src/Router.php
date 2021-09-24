<?php

require_once 'Singleton.php';
class Router extends Singleton 
{
    
    const Routes = [
        '/' => 'index.php',
        '/index' => '/index.php',
        '/create' => 'createNew.php',
        '/update' => 'updateDoc.php',
        '/users/update' => 'update.php',
        '/users/create' => 'create.php',
        '/list' => 'list.php',
    ];

    protected function getMethod() {
        $uri = $_SERVER['REQUEST_URI'];
        foreach (self::Routes as $route => $val) {       
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
        
        $val = $this->getMethod();
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
