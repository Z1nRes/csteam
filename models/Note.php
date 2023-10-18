<?php

namespace app\models;

use Yii;
use app\models\User;

/**
 * This is the model class for table "note".
 *
 * @property int $id
 * @property int $id_user
 * @property string $title
 * @property string $description
 * @property string|null $links
 * @property string|null $photos
 * @property string $pin_top
 * @property string $pin_left
 */
class Note extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'note';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['id_user', 'id_map'], 'integer'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
            [['id_map'], 'exist', 'skipOnError' => true, 'targetClass' => Map::class, 'targetAttribute' => ['id_map' => 'id']],
            [['title'], 'required', 'message' => 'Введите заголовок.'],
            [['description'], 'required', 'message' => 'Введите описание.'],
            [['title', 'description', 'links'], 'string', 'max' => 255],
            [['links'], 'validateUrl'],
            [['photos'], 'file', 'maxFiles' => 10, 'extensions' => 'png, jpg', 'maxSize' => 1024 * 1024 * 8 ],
            [['pin_top', 'pin_left'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id_user',
            'id_map' => 'Id Map',
            'title' => 'Заголовок',
            'description' => 'Описание',
            'links' => 'Ссылки',
            'photos' => 'Фото',
            'pin_top' => 'пин слева',
            'pin_left' => 'пин сверху',
        ];
    }

    public function redirect()
    {
        return $this->redirect(['site/map']);
    }

    public function validateUrl($attribute, $params)
    {
        if (!$this->hasErrors()) {
            
            $links = array_map('trim', explode("\n", $this->links));
            $filter_var = filter_var_array($links, FILTER_VALIDATE_URL);

            foreach($filter_var as $res){
                if($res === false){
                    $this->addError($attribute, 'Присутствует неверный URL.');
                }
            }
        }
    }

    public function getMap()
    {
        return $this->hasOne(Map::class, ['id' => 'id_map']);
    }

    public function getOwner()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }

}
