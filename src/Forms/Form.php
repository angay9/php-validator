<?php

namespace Forms;

use Forms\Fields\Field;
use Events\EventDispatcherInterface;
use Validation\ValidatorInterface;

abstract class Form 
{
    protected $fields = [];

    protected $validator;

    protected $action = '/';

    protected $method = 'GET';

    protected $dispatcher;

    protected $constraints = [];

    public function __construct(ValidatorInterface $validator, EventDispatcherInterface $dispatcher)
    {
        $this->validator = $validator;
        $this->dispatcher = $dispatcher;

        $this->setUp();
    }

    public function addField(Field $field)
    {
        $this->fields[] = $field;

        return $this;
    }

    /**
     * Gets the value of fields.
     *
     * @return mixed
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * Sets the value of fields.
     *
     * @param mixed $fields the fields
     *
     * @return self
     */
    public function setFields(array $fields)
    {
        $this->fields = $fields;

        return $this;
    }

    /**
     * Gets the value of validator.
     *
     * @return mixed
     */
    public function getValidator()
    {
        return $this->validator;
    }

    /**
     * Sets the value of validator.
     *
     * @param mixed $validator the validator
     *
     * @return self
     */
    public function setValidator(ValidatorInterface $validator)
    {
        $this->validator = $validator;

        return $this;
    }

    abstract protected function setUp();

    public function render()
    {
        $form = "<form action='{$this->action}' method='{$this->method}'>";

        foreach ($this->fields as $field) 
        {
            $label = '';

            if ($field->getShowLabel() === true) 
            {
                $label = '<div><label>' . ucfirst($field->getName()) . '</label></div>';
            }

            $form .= $label;
            $form .= $field->render();
        }

        $form .= "</form>";

        $this->dispatcher->notify('form.rendered');

        return $form;
    }

    /**
     * Gets the value of action.
     *
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Sets the value of action.
     *
     * @param mixed $action the action
     *
     * @return self
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Gets the value of method.
     *
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Sets the value of method.
     *
     * @param mixed $method the method
     *
     * @return self
     */
    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    protected function validate()
    {
        $data = [];

        foreach ($this->fields as $field) 
        {
            $data[$field->getName()] = $field->getValue();
        }

        $this->validator->validate($data, $this->constraints);

        return $this;
    }

    public function isValid() 
    {
        $this->validate();

        return $this->validator->isValid();
    }

    /**
     * Gets the value of dispatcher.
     *
     * @return mixed
     */
    public function getDispatcher()
    {
        return $this->dispatcher;
    }

    /**
     * Sets the value of dispatcher.
     *
     * @param mixed $dispatcher the dispatcher
     *
     * @return self
     */
    public function setDispatcher($dispatcher)
    {
        $this->dispatcher = $dispatcher;

        return $this;
    }

    /**
     * Gets the value of constraints.
     *
     * @return mixed
     */
    public function getConstraints()
    {
        return $this->constraints;
    }

    /**
     * Sets the value of constraints.
     *
     * @param mixed $constraints the constraints
     *
     * @return self
     */
    public function setConstraints(array $constraints)
    {
        $this->constraints = $constraints;

        return $this;
    }

    public function setData(array $data)
    {
        foreach ($this->fields as $field) 
        {
            $name = $field->getName();

            if (isset($data[$name])) 
            {
                $field->setValue($data[$name]);
            }
        }
    }
}