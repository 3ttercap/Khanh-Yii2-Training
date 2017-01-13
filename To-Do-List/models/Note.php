<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "note".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property date $due_date
 * @property date $created_at
 * @property date $modified_at
 * @property integer $user_id
 *
 * @property User $user
 */
class Note extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'note';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['title', 'description'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            ['due_date', 'compare', 'compareAttribute' => 'created_at', 'operator' => '>', 'enableClientValidation' => false, 'type' => 'date'],
            [['title', 'description', 'due_date'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'due_date' => 'Due Date',
            'created_at' => 'Created At',
            'modified_at' => 'Modified At',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }


    /**
     * @return int
     */
//    public function getUserId()
//    {
//        return $this->hasOne(User::className(), ['id' => 'user_id']);
//    }
}
