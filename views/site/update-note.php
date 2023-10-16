<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Note $model */
use yii\widgets\ActiveForm;

$this->title = 'Изменить заметку: ' . $note->title;
$this->params['breadcrumbs'][] = ['label' => 'Notes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $note->title, 'url' => ['view', 'id' => $note->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="note-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div>

        <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data', 'id' => 'form']]); ?>

        <?= $form->field($note, 'title', ['options' => ['class' => 'input input-text']]) ?>
        <?= $form->field($note, 'description', ['options' => ['class' => 'input input-text']]) ?>
        <?= $form->field($note, 'links', ['options' => ['class' => 'input input-textarea']])->textarea(['rows' => '6', 'placeholder' => 'Вводите каждую ссылку с новой строки!']) ?>

        <div class="form-group d-flex justify-content-center">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary form-btn', 'id' => 'btn-form']) ?>
        </div>
        <?php ActiveForm::end(); ?>


        
    </div>

</div>

<style>

    .note-update{
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 15vh;
    }

    .input{
        margin-bottom: 30px;
    }

    textarea{
        resize: none;

        background-color: rgba(255, 255, 255, 0.1) !important;

        color: white !important;
    }

    textarea::-webkit-input-placeholder { 
        color: rgba(255, 255, 255, 0.6) !important; 
    }

    input[type=text]{
        background-color: rgba(255, 255, 255, 0.1) !important;

        color: white !important;
    }

    

    .control-label{
        font-weight: 700 !important; 
    }

    .form-btn{
        width: 80%;

        background-color: transparent !important; 
        font-size: 28px; 
        font-weight: 700 !important; 

        border: 1px solid var(--light-text, #FFF) !important;

        /* shadow */
        box-shadow: 0px 4px 31px 0px rgba(0, 0, 0, 0.15) !important;
    }

    .form-btn:hover{
        /* shadow */
        box-shadow: 0px 4px 31px 0px rgba(255, 255, 255, .3) !important;
    }

</style>