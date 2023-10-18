<?php

/** @var yii\web\View $this */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'search';
$this->params['breadcrumbs'][] = $this->title;

?>

<?php $form = ActiveForm::begin(['options'=>['id' => 'form', 'class' => 'form-outline mt-4']]); ?>

        <?= $form->field($q, 'q', ['options' => ['class' => 'input input-text'] ])->textInput(['placeholder' => "Введите название заметки"])->label(false) ?>

<?php ActiveForm::end(); ?>

<div class="mt-4">
    <?php 
    if (!empty($qRes)) {
        foreach ($qRes as $res) { ?>
            <h2><a href="note?id=<?= $res->id ?>"><?= $res->title ?> (id=<?= $res->id ?>)</a></h2>
            <p><?= $res->description ?></p>
        <?php } 
    } else { ?>
        <h2><?= $message ?></h2>
    <?php } ?>

</div>
