<?php

class UserController
{
    public function list()
    {
        $list = UserModel::getAll();
    }

    public function create()
    {
        $creator = UserModel::create();
    }

    public function update()
    {
        $updater = UserModel::update();
    }

    public function delete()
    {
        $deleter = UserModel::delete();
    }
}