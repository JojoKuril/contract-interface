<?

class View 
{
    public static function render($template, $vars =[]) {
        //var['title'] = 'Заголовок';
        extract($vars);

        //echo $title ;
        
        require __DIR__ . '/views/' .  $template . '.php';
    }
}