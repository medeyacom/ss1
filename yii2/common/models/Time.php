<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "time".
 *
 * @property integer $id
 * @property string $time
 * @property string $date
 * @property string $datetime
 */
class Time extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'time';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['time', 'date', 'datetime'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'time' => 'Time',
            'date' => 'Date',
            'datetime' => 'Datetime',
        ];
    }
}
