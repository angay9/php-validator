<?php

require_once(__DIR__ . '/vendor/autoload.php');

use Validation\Validator;
use Validation\NotNull;
use Validation\JsonFormatter;

try {
    $v = new Validator();
    $data = ['a' => 2, 'b' => null];
    $v->validate(
        $data,
        [
            'a' => [
                new NotNull
            ],
            'b' => [
                new NotNull
            ]
        ]
    );

    $v->setErrorFormatter(new JsonFormatter);

    var_dump($v->getErrors());
    die;
    
} catch (Exception $e) {
    var_dump($e);
}
