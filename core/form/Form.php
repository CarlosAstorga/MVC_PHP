<?php

namespace app\core\form;

use app\core\form\Field;

class Form
{
    public static function begin($action, $method)
    {
        echo sprintf('<form action="%s" method="%s">', $action, $method);
        return new Form();
    }

    public static function end()
    {
        echo '</form>';
    }

    public function field($attribute, $icon, $model = [], $placeholder, $type = 'text')
    {
        return new Field($attribute, $icon, $model, $placeholder, $type);
    }
}
