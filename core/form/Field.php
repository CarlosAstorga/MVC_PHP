<?php

namespace app\core\form;

class Field
{
    public $model;
    public $type;
    public $placeholder;
    public string $attribute;
    public string $icon;

    public function __construct($attribute, $icon, $model, $placeholder, $type)
    {
        $this->type         = $type;
        $this->icon         = $icon;
        $this->model        = $model;
        $this->attribute    = $attribute;
        $this->placeholder  = $placeholder;
    }

    public function __toString()
    {
        $value      = '';
        $hasError   = '';
        $errorMsg   = '';
        if (!empty($this->model)) {
            if ($this->model->hasError($this->attribute)) {
                $hasError = 'is-invalid';
                $errorMsg = $this->model->getError($this->attribute);
            }
            $value = $this->model->all()[$this->attribute];
        }

        return sprintf(
            '
        <div class="form-row mb-3">
            <div class="input-group offset-md-2 col-md-8">
                <input id="%s" type="%s" class="form-control %s" name="%s" value="%s" required autofocus placeholder="%s">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="%s"></i></span>
                </div>
                <div class="invalid-feedback">
                    %s
                </div>
            </div>
        </div>
        ',
            $this->attribute,   // id
            $this->type,        // type
            $hasError,          // is-invalid
            $this->attribute,   // name
            $value,             // value
            $this->placeholder, // placeholder
            $this->icon,        // icon
            $errorMsg           // feedback
        );
    }
}
