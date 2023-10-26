<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;
use yii\db\ActiveRecord;

class SignupForm extends ActiveRecord
{
    public $email;
    public $login;
    public $password;

    public static function tableName()
    {
        return 'User';
    }

    public function rules()
    {
        return [
            // email, login and password are both required
            [['email', 'login', 'password'], 'trim'],
            [['email'], 'required', 'message' => 'Пожалуйста, введите почту.'],
            [['login'], 'required', 'message' => 'Пожалуйста, введите логин.'],
            [['password'], 'required', 'message' => 'Пожалуйста, введите пароль.'],
            [['login', 'password'], 'string', 'length' => [4, 20], 'tooShort' => 'Слишком короткий (<4 символов).', 'tooLong' => 'Слишком длинный (>20 символов).'],
            [['login'], 'unique', 'targetAttribute' => 'login', 'message' => 'Логин уже занят, попробуйте другой.'],
            [['email'], 'string'],
            [['email'], 'email'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'email' => 'Email',
            'login' => 'Логин',
            'password' => 'Пароль',
        ];
    }

    public function signup()
    {
        if($this->validate())
        {
            $user = new User();
            $user->attributes = $this->attributes;
            $user->password = md5($this->password);
            $user->create();
            return true;
        } else {
            return false;
        }
    }
}
