<?php

namespace app\models;

use yii\base\Model;

 
class SignupForm extends Model{
    
    public $username;
    public $password;
    public $role;

    public function rules() {
        return [
            [['username', 'password'], 'required', 'message' => 'Заполните поле'],
            ['username', 'unique', 'targetClass' => User::className(),  'message' => 'Этот логин уже занят'],
            [['username','password','role'], 'string'],
        ];
    }
    
    public function attributeLabels() {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',
        ];
    }

}