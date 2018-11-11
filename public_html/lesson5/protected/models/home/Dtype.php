<?php

namespace app\models\home;

use Yii;

/**
 * This is the model class for table "dtype".
 *
 * @property int $id
 * @property int $number
 * @property string $text
 * @property int $boolean
 */
class Dtype extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dtype';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'boolean'], 'integer'],
            [['text'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Число',
            'text' => 'Текст',
            'boolean' => 'Логічне',
        ];
    }
}
