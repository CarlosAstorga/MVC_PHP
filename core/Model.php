<?php

namespace app\core;


abstract class Model
{
    public function save(array $data)
    {
        $params = array_map(fn ($attr) => ":$attr", $this->fillable);
        $statement = self::prepare("INSERT INTO $this->tableName (" . implode(',', $this->fillable) . ")
                        VALUES(" . implode(',', $params) . ")");

        foreach ($this->fillable as $attribute) {
            $statement->bindValue(":$attribute", $data[$attribute]);
        }
        $statement->execute();
        return true;
    }

    public static function prepare($query)
    {
        return Application::$app->db->pdo->prepare($query);
    }
}
