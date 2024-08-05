<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class User extends ActiveRecord
{

    public static function tableName()
    {
        return 'users';
    }

    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    // private static $users = [];


    // /**
    //  * {@inheritdoc}
    //  */
    // public static function findIdentity($id)
    // {
    //     return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    // }

    // /**
    //  * {@inheritdoc}
    //  */
    // public static function findIdentityByAccessToken($token, $type = null)
    // {
    //     foreach (self::$users as $user) {
    //         if ($user['accessToken'] === $token) {
    //             return new static($user);
    //         }
    //     }

    //     return null;
    // }


    // /**
    //  * {@inheritdoc}
    //  */
    // public function getId()
    // {
    //     return $this->id;
    // }

    // /**
    //  * {@inheritdoc}
    //  */
    // public function getAuthKey()
    // {
    //     return $this->authKey;
    // }

    // /**
    //  * {@inheritdoc}
    //  */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    // /**
    //  * Validates password
    //  *
    //  * @param string $password password to validate
    //  * @return bool if password provided is valid for current user
    //  */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email]);
    }
}
