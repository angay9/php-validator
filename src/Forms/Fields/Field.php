<?php

namespace Forms\Fields;

abstract class Field 
{
    protected $name;

    protected $attributes;

    protected $value;

    protected $showLabel = true;

    public function __construct($name, $value = null, array $attributes = [])
    {
        $this->name = $name;
        $this->attributes = $attributes;
        $this->value = $value;
    }

    /**
     * Gets the value of value.
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Sets the value of value.
     *
     * @param mixed $value the value
     *
     * @return self
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Gets the value of attributes.
     *
     * @return mixed
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Sets the value of attributes.
     *
     * @param mixed $attributes the attributes
     *
     * @return self
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * Gets the value of name.
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value of name.
     *
     * @param mixed $name the name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    protected function attributesAsString()
    {
        $str = '';

        foreach ($this->attributes as $name => $attr) 
        {
            $str .= "{$name}=\"{$attr}\"";
        }

        return $str;
    }

    abstract public function render();


    /**
     * Gets the value of showLabel.
     *
     * @return mixed
     */
    public function getShowLabel()
    {
        return $this->showLabel;
    }

    /**
     * Sets the value of showLabel.
     *
     * @param mixed $showLabel the show label
     *
     * @return self
     */
    public function setShowLabel($showLabel)
    {
        $this->showLabel = $showLabel;

        return $this;
    }
}