<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\behaviors\OptimisticLockBehavior;

class Prices extends ActiveRecord
{
	public static function tableName()
	{
		return 'prices';
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
            'name_works' => 'Найменування робіт',
            'units_measurement' => 'Одиниці виміру',
            'price' => 'Ціна, грн',
            'notes' => 'Примітки',
        ];
    }

    public function rules() {
        return [
        	[['name_works', ], 'required','message' => 'Поле обовязкове для заповнення'],
            [['name_works', 'units_measurement','notes'], 'string'],
            [['price'], 'integer'],
        ];
    }
}