<?php
namespace app\models;

use yii\base\Model;

class SearchForm extends Model
{
    public $q;

    public function rules()
    {
        return [
            ['q', 'string']
        ];
    }
}

?>