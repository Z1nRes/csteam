<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;


$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login-wrapper">
    <div class="site-login">
        <h1><?= Html::encode($this->title) ?> </h1>
        <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'login', ['options' => ['class' => 'input input-text']]) ?>
            <?= $form->field($model, 'password', ['options' => ['class' => 'input input-text']])->passwordInput() ?>
        
            <div class="form-group">
                <?= Html::submitButton('ВОЙТИ', ['class' => 'btn btn-primary btn-login']) ?>
            </div>
        <?php ActiveForm::end(); ?>

    </div>

</div>

<style>

    .site-login-wrapper{
        display: flex;
        align-items: center; /* не воркает.. */
        margin-top: 25vh;
        justify-content: center;
    }
    
    .site-login{
        display: flex;
        align-items: center;
        flex-direction: column;
    }

    .btn-login{
        margin-top: 20px;
        width: 80%;
        /* background-color: #145C9E; */
        border: none;
        color: #181818;
        font-size: 1.25rem;
        font-weight: 700 !important;

        background: linear-gradient(132deg, #F7EA76 0%, #D1AF4D 100%);

        /* shadow */
        box-shadow: 0px 4px 31px 0px rgba(0, 0, 0, 0.15);
    }

    .btn-login:hover{
        border: none;
    }
    
    .form-group{
        display: flex;
        justify-content: center;
    }

    .form-label{
        font-size: 1.25rem;
        font-weight: 700 !important;
    }

    .input-text{
        width: 15vw;
        margin-bottom: 15px;
    }

    h1{
        color: #D9B346 !important;
        font-size: 2.75rem;
        font-weight: 700 !important;
    }
</style>