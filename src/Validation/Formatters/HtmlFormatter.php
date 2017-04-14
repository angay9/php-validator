<?php

namespace Validation\Formatters;

// use SimpleXMLElement;

class HtmlFormatter extends ErrorFormatter 
{
    public function format(array $errors) 
    {
        $errorsHtml = "<ul>";

        foreach ($errors as $name => $errorList) 
        {
            $errorListImploded = implode('. ', $errorList);

            $name = ucfirst($name);
            $errorsHtml .= "<li>{$name}: {$errorListImploded}.</li>";
        }

        $errorsHtml .= "</ul>";

        return $errorsHtml;
    }
}