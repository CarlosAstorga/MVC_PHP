<?php

namespace app\models;

use app\core\Model;

class User extends Model
{
    public string $tableName = 'users';
    public array $fillable   = [
        'name',
        'email',
        'password',
        'created_at'
    ];
}
