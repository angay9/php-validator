<?php

namespace Forms\Fields;

class SubmitInput extends TextInput
{
    public function render()
    {
        return sprintf(
            '<button type="submit" %s>%s</button>', 
            $this->attributesAsString(),
            ucfirst($this->name)
        );
    }
}