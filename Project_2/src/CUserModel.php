<?php

class UserModel
{
    public static function getAll()
    {
        $dir = 'data/docs';
        $files = scandir($dir);
        foreach ($files as $file) {
            if ($file == "." || $file == "..") continue;
            $data = file_get_contents('data/docs/' . $file);
            $arr = json_decode($data, true);
            $arr['id'] = str_replace('.json', '', $file);
            $parameters[] = $arr;
        }
    }
    
    public static function create()
    {
            $data = [
                     'firstName' => $_POST['firstName'], 
                     'lastName' => $_POST['lastName'], 
                     'birthd' => $_POST['birthd'], 
                     'active' => $_POST['active']
                    ];

            $manyFiles = opendir('data/users');
            $countJson = 0;
            while ($file = readdir($manyFiles)) {
            if ($file == '.' || $file == '..' || is_dir('data/users' . $file)) {
                continue;
            }
            $countJson++;
            }

            file_put_contents("data/users/{$countJson}.json", json_encode($data, JSON_UNESCAPED_UNICODE));
    }

    public static  function update()
    {
    }

    public static function delete()
    {
       $mustDelete = $_POST['id'].'.json';
       $fileDelete = unlink('data/users/'.$mustDelete);
        
    }

}