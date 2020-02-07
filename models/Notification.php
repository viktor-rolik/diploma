<?php

namespace app\models;

use yii\db\ActiveRecord;

class Notification extends ActiveRecord
{
    const TYPE_THEFT = 1;

	public static function tableName()
	{
		return 'notification';
	}
    

    public function rules() {
        return [
        	[['user_id', 'type_id'], 'required'],
        ];
    }
}