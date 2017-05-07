<?php

require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/RegistrationForm.php');
require_once(__DIR__ . '/ProfileForm.php');

use Events\Listener;
use Forms\Fields\SubmitInput;
use Forms\Fields\TextInput;
use Forms\FormFactory;
use Validation\Constraints\Email;
use Validation\Constraints\MinLength;
use Validation\Constraints\NotEmpty;

class FormListener extends Listener 
{
    public function handle($event = null) 
    {
        if (!isset($event['data']) || !isset($event['form'])) {
            return;
        }
        
        $form = $event['form'];
        $data = $event['data'];

        if ($data['notification_type'] == 'sms') {
            $form->addField(new TextInput('phone_number'))
                ->addField(new SubmitInput("Save changes"))
                ->addConstraints('phone_number', [
                    new NotEmpty,
                    new MinLength(['min_length' => 10])
                ])
            ;
        } 

        elseif ($data['notification_type'] == 'email') {

            $form->addField(new TextInput('notifications_email'))
                ->addField(new SubmitInput("Save changes"))
                ->addConstraints('notifications_email', [
                    new NotEmpty,
                    new Email
                ])
            ;
        }
    }

    public function listensFor() 
    {
        return 'form.post_set_data';
    }
}

// Example 1 - registration form
// $form = FormFactory::make(RegistrationForm::class);
// $form->setData([
//     'firstname' =>  'John',
//     'lastname'  =>  'Doe',
//     'email' =>  'test@mail.com',
//     'password'  =>  'secret'
// ]);

// // POST
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $errors = '';

//     $form->setData($_POST);

//     if (!$form->isValid()) {
//         $errors = $form->getValidator()->getErrors();   
//     }

//     echo($errors);
// }

// echo $form->render();

// Example 2 - profile form
$form = FormFactory::make(ProfileForm::class);
$form->getDispatcher()->attach(new FormListener);


$form->setData([
    'name' =>  'John Doe',
    'email' =>  'test@mail.com',
    // 'notification_type' => 'sms'
    'notification_type' => 'email'
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

