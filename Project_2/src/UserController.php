<?php

class UserController
{
    public function index()
    {

    }

    public function create()
    {
        $data = [
            'company' => $_POST['company'],
            'contractor' => $_POST['contractor'],
            'signer' => $_POST['signer'],

            'beginTerm' => $_POST['beginTerm'],
            'endTerm' => $_POST['endTerm'],

            'scopeOfTheAgreement' => $_POST['scopeOfTheAgreement'],
            'amount' => $_POST['amount'],

            'requisites' => $_POST['address'], $_POST['taxesID'], $_POST['payment']
        ];

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