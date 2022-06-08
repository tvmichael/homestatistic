<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "spending".
 *
 * @property int $id
 * @property int|null $productId
 * @property int|null $userId
 * @property float|null $price
 * @property string|null $datetime
 */
class Spending extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'spending';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['productId', 'userId'], 'integer'],
            [['price'], 'number'],
            [['datetime'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'productId' => Yii::t('app', 'Product ID'),
            'userId' => Yii::t('app', 'User ID'),
            'price' => Yii::t('app', 'Price'),
            'datetime' => Yii::t('app', 'DateTime'),
        ];
    }
}
