<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\SignupForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;


$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-signup-wrapper">
    <div class="site-signup">
        <h1><?= Html::encode($this->title) ?> </h1>
        <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'nickname', ['options' => ['class' => 'input input-text']]) ?>
            <?= $form->field($model, 'login', ['options' => ['class' => 'input input-text']]) ?>
            <?= $form->field($model, 'password', ['options' => ['class' => 'input input-text']])->passwordInput() ?>
        
            <div class="form-group">
                <?= Html::submitButton('Войти', ['class' => 'btn btn-primary btn-signup']) ?>
            </div>
        <?php ActiveForm::end(); ?>

    </div>

</div>

<style>

    .site-signup-wrapper{
        display: flex;
        align-items: center; /* не воркает.. */
        margin-top: 25vh;
        justify-content: center;
    }
    
    .site-signup{
        display: flex;
        align-items: center;
        flex-direction: column;
    }

    .btn-signup{
        margin-top: 20px;
        width: 80%;

        border: none;
        color: #181818;
        font-size: 1.25rem;
        font-weight: 700 !important;

        background: linear-gradient(132deg, #F7EA76 0%, #D1AF4D 100%);

        /* shadow */
        box-shadow: 0px 4px 31px 0px rgba(0, 0, 0, 0.15);
    }
    
    .btn-signup:hover{
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