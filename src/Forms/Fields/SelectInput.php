<?php

namespace Forms\Fields;

class SelectInput extends TextInput
{
    protected $choices;

    public function __construct($name, array $choices, $value = null, array $attributes = [])
    {
        parent::__construct($name, $value, $attributes);

        $this->choices = $choices;
    }

    public function render()
    {
        $options = [];

        foreach ($this->choices as $value => $label) 
        {
            $selected = $value == $this->value ? 'selected' : '';

            $options[] = '<option value="' . $value . '" ' . $selected . ' >' . $label . '</option>';  
        }

        return sprintf(
            '<select name="%s" %s >%s</select>', 
            $this->name,
            $this->attributesAsString(),
            implode('', $options)
        );
    }

    /**
     * Gets the value of choices.
     *
     * @return mixed
     */
    public function getChoices()
    {
        return $this->choices;
    }

    /**
     * Sets the value of choices.
     *
     * @param mixed $choices the choices
     *
     * @return self
     */
    public function setChoices(array $choices)
    {
        $this->choices = $choices;

        return $this;
    }
}