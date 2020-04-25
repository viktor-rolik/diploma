<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "poll_votes".
 *
 * @property int $id
 * @property int $poll_id
 * @property int $poll_option_id
 * @property int $vote_count
 *
 * @property Polls $poll
 * @property PollOptions $pollOption
 */
class PollVotes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'poll_votes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'vote_count'], 'required'],
            [['poll_id', 'poll_option_id', 'vote_count'], 'integer'],
            [['poll_id'], 'exist', 'skipOnError' => true, 'targetClass' => Polls::className(), 'targetAttribute' => ['poll_id' => 'id']],
            [['poll_option_id'], 'exist', 'skipOnError' => true, 'targetClass' => PollOptions::className(), 'targetAttribute' => ['poll_option_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'poll_id' => 'Poll ID',
            'poll_option_id' => 'Poll Option ID',
            'vote_count' => 'Vote Count',
        ];
    }

    /**
     * Gets query for [[Poll]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPoll()
    {
        return $this->hasOne(Polls::className(), ['id' => 'poll_id'])->inverseOf('pollVotes');
    }

    /**
     * Gets query for [[PollOption]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPollOption()
    {
        return $this->hasOne(PollOptions::className(), ['id' => 'poll_option_id'])->inverseOf('pollVotes');
    }
}