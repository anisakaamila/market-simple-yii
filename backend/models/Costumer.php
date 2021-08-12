<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "costumer".
 *
 * @property int $id
 * @property string $nama
 * @property string $email
 * @property int $user_id
 *
 * @property User $user
 * @property Order[] $orders
 */
class Costumer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'costumer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'email', 'user_id'], 'required'],
            [['user_id'], 'integer'],
            [['nama', 'email'], 'string', 'max' => 200],
            [['user_id'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama Costumer',
            'email' => 'Email',
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
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['costumer_id' => 'id']);
    }
}
