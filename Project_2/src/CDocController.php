<?php
require 'CDocModel.php';
require 'View.php';

class DocController
{
    public function list()
    {
        $list = DocModel::getAll();
        //$list->View;
    }

    public function create()
    {
        $creator = DocModel::create();
    }

    public function update()
    {
        $updater = DocModel::update();
    }

    public function delete()
    {
        $deleter = DocModel::delete();
    }
}
