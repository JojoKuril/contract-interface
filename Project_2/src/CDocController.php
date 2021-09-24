<?php
require 'CDocModel.php';

require 'View.php';

class DocController
{
    public function list()
    {
        $data = ['parameters'=>DocModel::getAll()];
        View::render('docList', $data);
    }

    public function create() 
    { 
        View::render('docAdd');

        if(!empty($_POST)) {

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
        
        DocModel::create($data);
        
        }
    }

    public function update()
    {
        DocModel::update();
    }

    public function delete()
    {
        DocModel::delete();
    }
}