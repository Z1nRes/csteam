<?php
namespace app\components;

use Yii;
use yii\helpers\Url;

class Init extends \yii\base\Component
{

    public function init() {
        if (\Yii::$app->getUser()->isGuest) {
            if ( \Yii::$app->getRequest()->url !== Url::to(\Yii::$app->getUser()->loginUrl) &&
            \Yii::$app->getRequest()->url !== "/csgoteam/site/signup"){
                \Yii::$app->getResponse()->redirect(\Yii::$app->getUser()->loginUrl);
            }
        }

        parent::init();
    }
}