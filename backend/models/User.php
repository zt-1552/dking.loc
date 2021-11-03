<?php

namespace backend\models;

use common\models\User as baseUser;
use Yii;
use yii\base\Security;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $verification_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends baseUser
{


    public $pass;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(
            parent::rules(),
            [
                [['email', 'username', 'pass'], 'required'],
                ['username', 'match', 'pattern' => '/^[a-z]\w*$/i'],
//                [['pass'], 'safe'],
                [['username', 'email'], 'unique'],
                [['email'], 'email'],
            ]
        );
    }


    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $pass
     */
    public function setPassword($pass)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($pass);
    }

    public function beforeSave($insert) {
        if(isset($this->pass))
            $this->password_hash = Yii::$app->security->generatePasswordHash($this->pass);
        return parent::beforeSave($insert);
    }


}
