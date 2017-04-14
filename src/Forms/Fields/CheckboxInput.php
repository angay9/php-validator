<?php

namespace Forms\Fields;

class CheckboxInput extends Field
{
    public function render()
    {
        return sprintf(
            '<input type="checkbox" name="%s" %s ></input>', 
            $this->name,
            $this->value ? 'checked' : '',
            $this->attributesAsString()
        );
    }
}