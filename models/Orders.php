<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\behaviors\OptimisticLockBehavior;

class Orders extends ActiveRecord
{
	public static function tableName()
	{
		return 'orders';
	}
    // public function behaviors()
    // {
    //     return [
    //         OptimisticLockBehavior::className(),
    //     ];sS
    // }

    public function optimisticLock()
    {
        return 'last_update';
    }
    public function attributeLabels() {
        return [
            'name' => 'Замовник',
            'city' => 'Населений пункт',
            'address' => 'Адреса',
            'type_work' => 'Вид робіт',
            'start_date' => 'Початок робіт',
            'final_date' => 'Закінчення робіт',
            'phone' => 'Телефон',
            'email' => 'e-mail',
            'sum' => 'Сумма за роботи, грн',
            'notes' => 'Примітки',
        ];
    }

    public function rules() {
        return [
        	[['name', 'city','address','type_work','start_date', 'final_date'], 'required','message' => 'Поле обовязкове для заповнення'],
            [['name', 'city', 'address','type_work','notes'], 'string'],
            ['email', 'email'],
            ['phone', 'string', 'length' => [10,13]],
            [['sum'], 'integer'],
            [['start_date', 'final_date'], 'safe'],
        ];
    }
}