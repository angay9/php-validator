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

class ProfileForm extends Form 
{
    public function setUp()
    {
        $this->setAction('/');
        $this->setMethod('POST');

        $this->setFields([
            new TextInput("name"),
            new EmailInput("email"),
            // new SubmitInput("Save changes"),
        ]);

        $this->setConstraints([
            'name' =>  [
                new NotNull,
                new MinLength(['min_length' => 4])
            ],
            'email' =>  [
                new NotNull,
                new MinLength(['min_length' => 4]),
                new Email
            ],
        ]);

        $this->validator->setErrorFormatter(new HtmlFormatter);
    }
}