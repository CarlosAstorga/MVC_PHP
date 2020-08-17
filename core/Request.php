<?php

namespace app\core;

class Request
{
    public array $errorBag      = [];
    public const RULE_MIN       = 'min';
    public const RULE_MAX       = 'max';
    public const RULE_EMAIL     = 'email';
    public const RULE_MATCH     = 'match';
    public const RULE_REQUIRED  = 'required';
    public const RULE_MESSAGES  = [
        self::RULE_MAX      => 'La longitud máxima debe ser de :max',
        self::RULE_MIN      => 'La longitud mínima debe ser de :min',
        self::RULE_EMAIL    => 'Ingrese una dirección de correo válida',
        self::RULE_MATCH    => 'El campo no coincide con :match',
        self::RULE_REQUIRED => 'Este campo es requerido'
    ];

    public function path()
    {
        $path       = $_SERVER['REQUEST_URI'] ?? '/';
        $position   = strpos($path, '?');

        if ($position === false) return $path;
        return substr($path, 0, $position);
    }

    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function all()
    {
        $inputs = [];
        if ($this->method() === 'get') {
            foreach ($_GET as $key => $value) {
                $inputs[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if ($this->method() === 'post') {
            foreach ($_POST as $key => $value) {
                $inputs[$key] = trim(filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS));
            }
        }

        return $inputs;
    }

    public function validate($rules = [])
    {
        $this->errorBag = [];
        $attributes = $this->all();
        foreach ($rules as $attribute => $rule) {
            $value = $attributes[$attribute];
            foreach (explode('|', $rule) as $r) {
                if ($r === self::RULE_REQUIRED && empty($value)) {
                    $this->addError($attribute, self::RULE_REQUIRED);
                }

                if (strpos($r, ':')) {
                    $rp = explode(':', $r);

                    if ($rp[0] === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $this->addError($attribute, self::RULE_EMAIL, $rp);
                    }

                    if ($rp[0] === self::RULE_MIN && strlen($value) < $rp[1]) {
                        $this->addError($attribute, self::RULE_MIN, $rp);
                    }

                    if ($rp[0] === self::RULE_MAX && strlen($value) > $rp[1]) {
                        $this->addError($attribute, self::RULE_MAX, $rp);
                    }

                    if ($rp[0] === self::RULE_MATCH && $value !== $attributes[$rp[1]]) {
                        $this->addError($attribute, self::RULE_MATCH, $rp);
                    }
                }
            }
        }
    }

    public function addError($attribute, $rule, $rp = [])
    {
        $message = self::RULE_MESSAGES[$rule] ?? '';
        $message = str_replace(":{$rp[0]}", $rp[1], $message);

        $this->errorBag[$attribute][] = $message;
    }

    public function isValid()
    {
        return empty($this->errorBag);
    }

    public function hasError($attribute)
    {
        return !empty($this->errorBag[$attribute]);
    }

    public function getError($attribute)
    {
        return $this->errorBag[$attribute][0];
    }
}
