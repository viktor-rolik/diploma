<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\behaviors\OptimisticLockBehavior;

class Requests extends ActiveRecord
{
	public static function tableName()
	{
		return 'requests';
	}
    // public function behaviors()
    // {
    //     return [
    //         OptimisticLockBehavior::className(),
    //     ];
    // }

    public function optimisticLock()
    {
        return 'last_update';
    }
    public function attributeLabels() {
        return [
            'name' => 'Ім"я',
            'phone' => 'Телефон',
            'email' => 'e-mail',
            'notes' => 'Повідомлення',
        ];
    }

    public function rules() {
        return [
        	[['name', 'phone','email', 'notes'], 'required','message' => 'Поле обовязкове для заповнення'],
            [['name', 'notes'], 'string'],
            ['email', 'email'],
            ['phone', 'string', 'length' => [10,13]],
        ];
    }
}