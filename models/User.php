<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $nickname
 * @property string $login
 * @property string $password
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nickname', 'login', 'password'], 'required'],
            [['nickname', 'login', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nickname' => 'Nickname',
            'login' => 'Login',
            'password' => 'Password',
        ];
    }

    public function validatePassword($password)
    {
        return $this->password == $password;
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {

    }
    
    public function validateAuthKey($authKey)
    {

    }

    public function create()
    {
        return $this->save(false);
    }

    public function getNotes()
    {
        return $this->hasMany(Customer::class, ['id' => 'id_user']);
    }
}
