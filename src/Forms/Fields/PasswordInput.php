<?php

namespace Forms\Fields;

class PasswordInput extends TextInput
{
    public function render()
    {
        return sprintf(
            '<input type="password" name="%s" value="%s" %s ></input>', 
            $this->name,
            $this->value,
            $this->attributesAsString()
        );
    }
}