<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\behaviors\OptimisticLockBehavior;

class Thefts extends ActiveRecord
{
	public static function tableName()
	{
		return 'thefts';
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
            'city' => 'Населений пункт',
            'stolen_property' => 'Викрадене обладнання (майно)',
            'theft_detection_time' => 'Час виявлення крадіжки',
            'notes' => 'Примітки',
        ];
    }

    public function rules() {
        return [
        	[['city', 'stolen_property', 'theft_detection_time'], 'required','message' => 'Поле обовязкове для заповнення'],
            [['city', 'stolen_property','notes'], 'string'],
            [['theft_detection_time'], 'safe'],
        ];
    }
}