<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "poll".
 *
 * @property int $id
 * @property string $name
 * @property string $planets
 * @property string $astronauts
 * @property int $planet
 */
class Poll extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'poll';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'planets', 'astronauts', 'planet'], 'required'],
            [['name', 'planets', 'astronauts', 'planet'], 'string'],
        
        // [
        //     ['planets', 'planet'],
        //     'in',
        //     'range' => range(0, 4),
        //     'message' => 'Выбран не корректный список планет.',
        //     'allowArray' => 1
        // ],
        // [
        //     'astronauts',
        //     'in',
        //     'range' => range(0, 4),
        //     'message' => 'Выбран не корректный список космонавтов.',
        //     'allowArray' => 1
        // ],
        //     // [['name', 'planets', 'astronauts', 'planet'], 'required'],
        //     // [['planet'], 'integer'],
        //     // [['name', 'planets', 'astronauts'], 'string', 'max' => 255],
         ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'planets' => 'Planets',
            'astronauts' => 'Astronauts',
            'planet' => 'Planet',
        ];
    }
}