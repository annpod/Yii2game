<?php

namespace app\models;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $usertype;
    public $authKey;
    public $accessToken;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'usertype', 'authKey', 'accessToken'], 'required'],
            [['username', 'password', 'usertype', 'authKey', 'accessToken'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'User',
            'password' => 'Password',
            'usertype' => 'User Type',
            'authKey' => 'AuthKey',
            'accessToken' => 'AccessToken'
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        //return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
        //if (($model = self::findOne($id)) !== null) {
        $model = self::find()->where(['id' => $id])->asArray()->one();
        if ($model !== null) {
            return new static($model);
        }
        return NULL;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token)
    {
        /*
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }
        return null;
        */

        //if (($model = self::findOne(['access_token' => $token])) !== null) {
        $model = self::find()->where(['access_token' => $token])->asArray()->one();
        if ($model !== null) {
            return new static($model);
        }
        return NULL;
        
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        /*
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }
        return null;
        */
        
        //$model = self::findOne(['username' => $username]);
        $model = self::find()->where(['username' => $username])->asArray()->one();
        if ($model !== null) {
            return new static($model);
        }
        return NULL;
        
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
