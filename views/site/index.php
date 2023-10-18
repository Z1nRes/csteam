<?php

/** @var yii\web\View $this */

$this->title = 'Маппул';
?>
<div class="site-index">    
    <div class="body-content">

        <div class="wrapper-maps d-flex flex-row flex-wrap">

            <?php foreach ($map as $map) { ?> 
                <div class="map-card">
                    <a href="http://localhost/csgoteam/site/map-note?id_map=<?= $map->id ?>"><img class="map-card-img" src="<?= $map->photo ?>" alt="<?= $map->name ?>"></a>
                </div>
            <?php } ?>

        </div>

    </div>
</div>


<style>
    .body-content{
        margin-top: 11vh;
    }

    .map-card{
        margin: 0 0 20px 20px;
        border: 1px solid #46595B !important;
    }

    .map-card-img{
        width: 300px;
        height: auto;
        user-select: none;
    }

    link{
        width: 100%;
        height: 100%;
    }

</style>