<?php

namespace Forms\Fields;

class TextInput extends Field
{
    public function render()
    {
        return sprintf(
            '<input type="text" name="%s" value="%s" %s ></input>', 
            $this->name,
            $this->value,
            $this->attributesAsString()
        );
    }
}