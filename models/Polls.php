<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "polls".
 *
 * @property int $id
 * @property string $subject
 * @property string $status
 *
 * @property PollOptions[] $pollOptions
 * @property PollVotes[] $pollVotes
 */
class Polls extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'polls';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pollscol'], 'required'],
            [['status'], 'string'],
            [['subject'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject' => 'Питання',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[PollOptions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPollOptions()
    {
        return $this->hasMany(PollOptions::className(), ['poll_id' => 'id'])->inverseOf('poll');
    }

    /**
     * Gets query for [[PollVotes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPollVotes()
    {
        return $this->hasMany(PollVotes::className(), ['poll_id' => 'id'])->inverseOf('poll');
    }
}