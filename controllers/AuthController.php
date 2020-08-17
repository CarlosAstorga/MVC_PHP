<?php

namespace app\controllers;

use app\core\Request;
use app\core\Controller;
use app\models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->layout = 'auth';
    }

    public function login()
    {
        return $this->render('login');
    }

    public function register()
    {
        return $this->render('register', ['model' => []]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'                  => 'required',
            'email'                 => 'required|email',
            'password'              => 'required|min:6',
            'password_confirmation' => 'required|match:password'
        ]);

        if ($request->isValid()) {
            $data = $request->all();
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['password']   = password_hash($data['password'], PASSWORD_DEFAULT);
            (new User())->save($data);
            return 'success';
        }

        return $this->render('register', ['model' => $request]);
    }
}
