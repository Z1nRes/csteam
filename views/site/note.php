<?php

/** @var yii\web\View $this */
use yii\bootstrap5;
use yii\helpers\Html;
use yii\widgets\ActiveForm;



$this->title = 'note';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-note mt-5" oncontextmenu="return false;">
    <div>
        <div class="dark-div d-flex flex-direction-row align-items-center justify-content-between header-wrapper"><h1><?= $note->title; ?></h1><span><a href="update-note?id=<?= $note->id ?>">Редактировать</a> | <a class="text-danger" href="delete-note?id=<?= $note->id ?>">Удалить</a></span></div>
        <p class="ps-4 dark-div content-div"><?= $note->description; ?></p>
        <?php
        if($note->links){ 
            $note->links = explode("\n", $note->links);
            ?>
        
        <div class="content-div dark-div">
            <h3 class="ps-4">Ссылки</h3>
            <ul>
                <?php
                    foreach($note->links as $link){ ?>
                        <li><a href="#"><?= $link ?></a></li>
                    <?php
                    }
                    ?>
            </ul>
            <?php
            }
            ?>
        </div>
        
    </div>

    <?php if ($note->photos){ 
        $note->photos = explode("\n", $note->photos); ?>
        <div class="slider-container">
            <div class="slider-wrapper">
                <div class="slider">
                    <?php
                        foreach($note->photos as $photo){ ?>
                        <img src="../uploads/<?= $photo; ?>" alt="<?= $photo ?>"  id="<?= $photo ?>">
                    <?php
                    } ?>
                </div>
                <div class="slider-nav">
                    <?php
                    if($note->photos){
                        foreach($note->photos as $photo){ ?>
                        <a href="#<?= $photo ?>"></a>
                    <?php
                    }} ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>



<style>

.dark-div{
    background-color: rgba(0, 0, 0, 0.15);
    border-radius: 0.5rem;
    box-shadow: 0 1.5rem 3rem -0.75rem hsla(0, 0%, 0%, 0.25);
}

.header-wrapper{
    padding: 15px;
}

.content-div{
    padding: 10px 20px 20px 0;
    margin: 20px 0 20px 0;
}

.slider-container {
    padding: 2em;
}

.slider-wrapper {
    position: relative;
    max-width: 48rem;
    margin: 0 auto;
}

.slider {
    display: flex;
    aspect-ratio: 16/9;
    overflow-x: hidden;
    scroll-snap-type: x mandatory;
    scroll-behavior: smooth;
    box-shadow: 0 1.5rem 3rem -0.75rem hsla(0, 0%, 0%, 0.25);
    border-radius: 0.5rem;
}

.slider img {
    flex: 1 0 100%;
    scroll-snap-align: start;
    object-fit: cover;
}

.slider-nav {
    display: flex;
    column-gap: 1rem;
    position: absolute;
    bottom: 1.25rem;
    left: 50%;
    transform: translateX(-50%);
    z-index: 1;

}

.slider-nav a {
    width: 1rem;
    height: 1rem;
    border-radius: 50%;
    background-color: #fff;
    opacity: 0.75;
    transition: opacity ease 250ms;
}

.slider-nav a:hover {
    opacity: 1;
}
</style>
