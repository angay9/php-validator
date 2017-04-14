<?php

namespace Forms\Fields;

class EmailInput extends TextInput
{
    public function render()
    {
        return sprintf(
            '<input type="email" name="%s" value="%s" %s ></input>', 
            $this->name,
            $this->value,
            $this->attributesAsString()
        );
    }
}