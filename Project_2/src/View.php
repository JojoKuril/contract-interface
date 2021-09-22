<?

class View extends Singleton
{
    public function render($template, $vars =[]) {
        var['title'] = 'Заголовок';
        extract($vars);

        echo $title ;
        require '/views' .  $template . '.forexpamle;';
    }
}