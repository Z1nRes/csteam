<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "map".
 *
 * @property int $id
 * @property string $name
 * @property string $photo
 *
 * @property Note[] $notes
 */
class Map extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'map';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'photo'], 'required'],
            [['name', 'photo'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'photo' => 'Photo',
        ];
    }

    /**
     * Gets query for [[Notes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotes()
    {
        return $this->hasMany(Note::class, ['id_map' => 'id']);
    }
}
