<?php

namespace Core;

class ValidationException extends \Exception
{
    protected $errors = [];
    protected $old = [];

    public static function throw($errors, $old)
    {
        $instance = new static;

        $instance->errors = $errors;
        $instance->old = $old;

        throw $instance;
    }

    public function errors()
    {
        return $this->errors;
    }

    public function old()
    {
        return $this->old;
    }
}