<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;
use yii\db\ActiveRecord;

class SignupForm extends ActiveRecord
{
    public $nickname;
    public $login;
    public $password;

    public static function tableName()
    {
        return 'User';
    }

    public function rules()
    {
        return [
            // nickname, login and password are both required
            [['nickname', 'login', 'password'], 'trim'],
            [['nickname'], 'required', 'message' => 'Пожалуйста, введите никнейм.'],
            [['login'], 'required', 'message' => 'Пожалуйста, введите логин.'],
            [['password'], 'required', 'message' => 'Пожалуйста, введите пароль.'],
            [['login', 'password'], 'string', 'length' => [4, 20], 'tooShort' => 'Слишком короткий (<4 символов).', 'tooLong' => 'Слишком длинный (>20 символов).'],
            [['login'], 'unique', 'targetAttribute' => 'login', 'message' => 'Логин уже занят, попробуйте другой.'],
            [['nickname'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'nickname' => 'Ник',
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
            $user->create();
            return true;
        } else {
            return false;
        }
    }
}
