<?php

namespace app\models;

use yii\base\Model;

 
class SignupForm extends Model{
    
    public $username;
    public $password;
    public $role;

    public function rules() {
        return [
            [['username', 'password'], 'required', 'message' => 'Заповніть поле'],
            ['username', 'unique', 'targetClass' => User::className(),  'message' => 'Цей логін вже існує'],
            [['username','password','role'], 'string'],
        ];
    }
    
    public function attributeLabels() {
        return [
            'username' => 'Логін',
            'password' => 'Пароль',
        ];
    }

}