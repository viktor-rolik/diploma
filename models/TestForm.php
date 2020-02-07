<?php
namespace app\models;

use yii\db\ActiveRecord;
use yii\behaviors\OptimisticLockBehavior;

/**
 * Модель для формы обратной связи
 */
class TestForm extends ActiveRecord {

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
            [['name', 'city','damage_time', 'notes'], 'required','message' => 'Поле обязательно для заполнения'],
        ];
    }
}
