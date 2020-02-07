<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\behaviors\OptimisticLockBehavior;

class Damages extends ActiveRecord
{
	public static function tableName()
	{
		return 'damages';
	}
    public function behaviors()
    {
        return [
            OptimisticLockBehavior::className(),
        ];
    }

    public function optimisticLock()
    {
        return 'last_update';
    }
    public function attributeLabels() {
        return [
            'name' => 'Найменування обладнання',
            'city' => 'Населений пункт',
            'damage_time' => 'Час виявлення пошкодження',
            'recovery_time' => 'Час введення в роботу',
            'notes' => 'Примітки',
        ];
    }

    public function rules() {
        return [
        	[['name', 'city','damage_time'], 'required','message' => 'Поле обовязкове для заповнення'],
            [['name', 'city', 'notes'], 'string'],
            [['damage_time', 'recovery_time'], 'safe'],
        ];
    }
}