<?php

/** @var yii\web\View $this */
use yii\bootstrap5;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'map-note';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="site-map-note d-flex flex-row mt-5" oncontextmenu="return false;">
    <div class="map-card" id="map">
        <img class="map-card-img" src="https://uploads-ssl.webflow.com/5d5ab0de3f2789196e87264e/5f9999ea1057522149823f0a_de_dust2_radar_Pano0Pat1Buy1Spec0.png" alt="de_dust 2">
        <?php
            foreach ($notes as $pin) {
                echo '<a href="note?id=' . $pin->id . '" >' . 
                '<?xml version="1.0" ?><svg style="cursor: pointer; position: absolute; top: ' . $pin->pin_top . '; left: ' . $pin->pin_left . '; width: 25px; height: 30px">' . 'viewBox="0 0 22 30" xmlns="http://www.w3.org/2000/svg"><title/><g data-name="Layer 2" id="Layer_2"><g id="Interface-Solid"><path d="M11,0A11.01245,11.01245,0,0,0,0,11C0,21.36133,9.95166,29.44238,10.37549,29.78125a1.00083,1.00083,0,0,0,1.249,0C12.04834,29.44238,22,21.36133,22,11A11.01245,11.01245,0,0,0,11,0Z" id="interface-solid-pin-2"/></g></g></svg>' .
                '</a>';
            }
        ?>
    </div>

    <div class="ms-5">

        <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data', 'id' => 'form']]); ?>

        <?= $form->field($model, 'id_user')->hiddenInput(['value' => $id_user])->label(false) ?>
        <?= $form->field($model, 'pin_top')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'pin_left')->hiddenInput()->label(false) ?>

        <?= $form->field($model, 'title', ['options' => ['class' => 'input input-text']]) ?>
        <?= $form->field($model, 'description', ['options' => ['class' => 'input input-textarea']])->textarea(['rows' => '6']) ?>
        <?= $form->field($model, 'links', ['options' => ['class' => 'input input-textarea']])->textarea(['rows' => '6', 'placeholder' => 'Вводите каждую ссылку с новой строки!']) ?>
        <?= $form->field($model, 'photos[]', ['options' => ['class' => 'input input-file']])->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

        <div class="form-group d-flex justify-content-center">
            <?= Html::submitButton('Создать', ['class' => 'btn btn-primary form-btn disabled', 'id' => 'btn-form']) ?>
        </div>
        <?php ActiveForm::end(); ?>


        
    </div>
            
</div>



<style>

a > svg{
    fill: #F7EA76;
}

.help-block{
        color: red;
        display: flex;
        justify-content: end;
    }

    .map-card-img{
        width: 700px;
        height: auto;
        border: 1px solid #46595B !important;
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

    .input-text{
        width: 25vw;
        height: 5vh;

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

<script>

    let flag = 0
    document.getElementById('map').addEventListener('mousedown', (e) => {
        if (e.which == 3) {
            if(flag == 1) {
                let elem = document.getElementById('pin')
                elem.remove();
            }

                let perent = document.getElementById('map')
    
                let elem = document.createElement("img")
                elem.src = "https://www.iconpacks.net/icons/3/free-icon-drop-pin-10071.png"
                elem.alt = "Create"
                elem.id = 'pin'
                elem.style = `cursor: pointer; position: absolute; top: ${e.layerY - 25}px; left: ${e.layerX - 10}px; width: 25px; height: 25px`
                perent.appendChild(elem)

            flag = 1
        }
    })


    document.getElementById('map').addEventListener('click', (event) => {
        if (event.target.matches('#pin')) {
            let pin = document.getElementById('pin')
            let btn_form = document.getElementById('btn-form')

            btn_form.classList.toggle("disabled");

            styles = window.getComputedStyle(pin)

            let pin_top = document.getElementById('note-pin_top')
            let pin_left = document.getElementById('note-pin_left')
            pin_top.value = styles.top
            pin_left.value = styles.left
        }
    })
</script>