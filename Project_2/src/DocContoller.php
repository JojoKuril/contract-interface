<?php

class DocController
{
    public function index()
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

    public function update()
    {
    }

    public function delete()
    {
        $this->index();
        foreach($this->$parameters as $parameter)
        unlink($parameter['id']);
    }
}
