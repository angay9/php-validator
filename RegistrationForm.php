<?php

use Forms\Form;
use Forms\Fields\EmailInput;
use Forms\Fields\PasswordInput;
use Forms\Fields\SubmitInput;
use Forms\Fields\TextInput;
use Validation\Constraints\Email;
use Validation\Constraints\MinLength;
use Validation\Constraints\NotNull;
use Validation\Formatters\JsonFormatter;
use Validation\Formatters\HtmlFormatter;

class RegistrationForm extends Form 
{
    public function setUp()
    {
        $this->setAction('/submit.php');
        $this->setMethod('POST');

        $this->setFields([
            new TextInput("firstname"),
            new TextInput("lastname"),
            new EmailInput("email"),
            new PasswordInput("password"),
            new SubmitInput("register"),
        ]);

        $this->setConstraints([
            'firstname' =>  [
                new NotNull,
                new MinLength(['min_length' => 4])
            ],
            'lastname' =>  [
                new NotNull,
                new MinLength(['min_length' => 4])
            ],
            'email' =>  [
                new NotNull,
                new MinLength(['min_length' => 4]),
                new Email
            ],
            'password' =>  [
                new NotNull,
                new MinLength(['min_length' => 4])
            ],
        ]);

        $this->validator->setErrorFormatter(new HtmlFormatter);
        // $this->validator->setErrorFormatter(new JsonFormatter);
    }
}