<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $date
 * @property int $costumer_id
 *
 * @property Costumer $costumer
 * @property OrderItem[] $orderItems
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'costumer_id'], 'required'],
            [['date'], 'safe'],
            [['costumer_id'], 'integer'],
            [['costumer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Costumer::className(), 'targetAttribute' => ['costumer_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'costumer_id' => 'Costumer ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCostumer()
    {
        return $this->hasOne(Costumer::className(), ['id' => 'costumer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['order_id' => 'id']);
    }
}
