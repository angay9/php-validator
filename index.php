<?php

require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/RegistrationForm.php');

use Events\Listener;
use Forms\FormFactory;

class FormListener extends Listener 
{
    public function handle($data = null) 
    {
        echo 'listening';
    }

    public function listensFor() 
    {
        return 'form.rendered';
    }
}

$form = FormFactory::make(RegistrationForm::class);
$form->setData([
    'firstname' =>  'John',
    'lastname'  =>  'Doe',
    'email' =>  'test@mail.com',
    'password'  =>  'secret'
]);

// POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = '';

    $form->setData($_POST);

    if (!$form->isValid()) {
        $errors = $form->getValidator()->getErrors();   
    }

    echo($errors);
}

echo $form->render();


