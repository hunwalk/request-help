<?php

namespace app\records;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "request".
 *
 * @property int $id
 * @property string|null $type this is the request type. e.g.: grocery-request, courier etc...
 * @property string|null $full_name The name of the person who made the request
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $email The email of the person who made the request
 * @property string|null $phone The phone number of the person who made the request
 * @property string|null $country Not necessary. If so, use english country name
 * @property string|null $city The city the person who made the request lives in
 * @property string|null $address
 * @property string|null $message_1
 * @property string|null $message_2
 * @property string|null $message_3
 * @property string|null $message_4
 * @property string|null $status The status of the request
 * @property string|null $access_key A key for enabling the editing of the requests.
 * @property string|null $uid UID
 * @property string|null $created_at When the request was made
 * @property string|null $updated_at When the request was updated
 */
class Request extends \yii\db\ActiveRecord
{
    const STATUS_ON_HOLD = 'on_hold';

    const STATUS_VALIDATED = 'validated';

    const STATUS_ACTIVE = 'active';

    const STATUS_IN_PROGRESS = 'in_progress';

    const STATUS_DONE = 'done';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'email', 'message_1','city'],'required'],
            [['message_1', 'message_2', 'message_3', 'message_4'], 'string'],
            [['email'], 'email'],
            [['type', 'full_name', 'first_name', 'last_name', 'email', 'phone', 'country', 'city', 'address', 'status', 'access_key', 'uid', 'created_at', 'updated_at'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type' => Yii::t('app', 'Type'),
            'full_name' => Yii::t('app', 'Full Name'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'country' => Yii::t('app', 'Country'),
            'city' => Yii::t('app', 'City'),
            'address' => Yii::t('app', 'Address'),
            'message_1' => Yii::t('app', 'Message 1'),
            'message_2' => Yii::t('app', 'Message 2'),
            'message_3' => Yii::t('app', 'Message 3'),
            'message_4' => Yii::t('app', 'Message 4'),
            'status' => Yii::t('app', 'Status'),
            'access_key' => Yii::t('app', 'Access Key'),
            'uid' => Yii::t('app', 'Uid'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
