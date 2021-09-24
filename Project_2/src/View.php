<?
require_once 'Singleton.php';

class View extends Singleton 
{
    public static function render($template, $vars =[]) {
        extract($vars);
        
        require __DIR__ . '/views/' .  $template . '.php';
    }
}
