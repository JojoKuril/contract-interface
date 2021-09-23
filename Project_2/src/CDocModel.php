<?php

class DocModel
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
        return $parameters;
    }

    public static  function update()
    {
    }

    public static function delete($mustDelete)
    {
        $fileDelete = unlink("data/docs/{$mustDelete}.json");
        
    }

    public static function create($data)
    {
        
        
        $manyFiles = opendir('data/docs');
        $countJson = 1;
        while ($file = readdir($manyFiles)) {
            if ($file == '.' || $file == '..' || is_dir('data/docs' . $file)) {
                continue;
            }
            $countJson++;
        }

        file_put_contents("data/docs/{$countJson}.json", json_encode($data, JSON_UNESCAPED_UNICODE));
    }
}
