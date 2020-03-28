<?php

namespace app\models\user;

use dektrium\user\models\Profile;
use dektrium\user\models\RegistrationForm as BaseRegistrationForm;
use dektrium\user\models\User;

class RegistrationForm extends BaseRegistrationForm
{
    /**
     * @var string
     */
    public $api_key;

    /**
     * @var string $location
     */
    public $location;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules = parent::rules();
        $rules[] = ['api_key', 'required'];
        $rules[] = ['api_key', 'string', 'max' => 16];
        $rules[] = ['location', 'string'];
        $rules[] = ['location', 'required'];
        return $rules;
    }

    public function attributeLabels()
    {
        $attributeLabels =  parent::attributeLabels();
        $attributeLabels['location'] = \Yii::t('app', 'City');
        return $attributeLabels;
    }

    public function loadAttributes(User $user)
    {
        $user->setAttributes([
            'email'    => $this->email,
            'username' => $this->username,
            'password' => $this->password,
        ]);
        /** @var Profile $profile */
        $profile = \Yii::createObject(Profile::className());
        $profile->setAttributes([
            'location' => $this->location,
        ]);
        $user->setProfile($profile);
    }
}