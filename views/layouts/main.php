<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

$this->title = 'CSGOTEAM';

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name = "CSTEAM",
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Карты', 'url' => ['/site/index']],
            Yii::$app->user->isGuest
                ? ['label' => 'Войти', 'url' => ['/site/login']]
                : '<li class="nav-item">'
                    . Html::beginForm(['/site/logout'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->nickname . ')',
                        ['class' => 'nav-link btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>',
            Yii::$app->user->isGuest
            ? ['label' => 'Регистрация', 'url' => ['/site/signup']] : '',
        ]
    ]);
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">

    <div class="svg-wrapper">
        <svg xmlns="http://www.w3.org/2000/svg" width="1579" height="1132" viewBox="0 0 1579 1132" fill="none" id="svg">
        <g opacity="0.3">
            <path d="M-2118 1221L-518.593 462L645.703 432L999.793 -99H1656.96M69.5565 1803L1251.86 903L1281.86 285L1813 225V-111M1664.39 -99.5713L1038.52 -83.5713L675.997 425L-434.286 483L-2013.83 1248.71M1671.82 -100.143L1077.24 -68.1429L706.29 418L-349.979 504L-1909.66 1276.43M1679.25 -100.714L1115.97 -52.7142L736.584 411L-265.671 525L-1805.49 1304.14M1686.68 -101.286L1154.69 -37.2859L766.877 404L-181.364 546L-1701.32 1331.86M1694.11 -101.857L1193.41 -21.8572L797.17 397L-97.0573 567L-1597.15 1359.57M1701.54 -102.428L1232.14 -6.42847L827.464 390L-12.7502 588L-1492.98 1387.29M1708.97 -103L1270.86 8.99987L857.757 383L71.5569 609L-1388.81 1415M1716.4 -103.571L1309.59 24.4286L888.05 376L155.864 630L-1284.65 1442.71M1723.83 -104.143L1348.31 39.8573L918.344 369L240.171 651L-1180.48 1470.43M1731.26 -104.714L1387.03 55.2856L948.637 362L324.479 672L-1076.31 1498.14M1738.7 -105.286L1425.76 70.7144L978.931 355L408.786 693L-972.137 1525.86M1746.13 -105.857L1464.48 86.1427L1009.22 348L493.093 714L-867.968 1553.57M1753.56 -106.429L1503.21 101.571L1039.52 341L577.4 735L-763.798 1581.29M1760.99 -107L1541.93 117L1069.81 334L661.707 756L-659.629 1609M1768.42 -107.572L1580.66 132.428L1100.1 327L746.014 777L-555.46 1636.71M1775.85 -108.143L1619.38 147.857L1130.4 320L830.321 798L-451.29 1664.43M1783.28 -108.714L1658.1 163.286L1160.69 313L914.629 819L-347.121 1692.14M1790.71 -109.286L1696.83 178.714L1190.98 306L998.936 840L-242.951 1719.86M1798.14 -109.857L1735.55 194.143L1221.28 299L1083.24 861L-138.782 1747.57M1805.57 -110.429L1774.28 209.571L1251.57 292L1167.55 882L-34.6129 1775.29" stroke="#46595B"/>
            <path d="M-2118 1221L-518.593 462L645.703 432L999.793 -99H1656.96M69.5565 1803L1251.86 903L1281.86 285L1813 225V-111M1664.39 -99.5713L1038.52 -83.5713L675.997 425L-434.286 483L-2013.83 1248.71M1671.82 -100.143L1077.24 -68.1429L706.29 418L-349.979 504L-1909.66 1276.43M1679.25 -100.714L1115.97 -52.7142L736.584 411L-265.671 525L-1805.49 1304.14M1686.68 -101.286L1154.69 -37.2859L766.877 404L-181.364 546L-1701.32 1331.86M1694.11 -101.857L1193.41 -21.8572L797.17 397L-97.0573 567L-1597.15 1359.57M1701.54 -102.428L1232.14 -6.42847L827.464 390L-12.7502 588L-1492.98 1387.29M1708.97 -103L1270.86 8.99987L857.757 383L71.5569 609L-1388.81 1415M1716.4 -103.571L1309.59 24.4286L888.05 376L155.864 630L-1284.65 1442.71M1723.83 -104.143L1348.31 39.8573L918.344 369L240.171 651L-1180.48 1470.43M1731.26 -104.714L1387.03 55.2856L948.637 362L324.479 672L-1076.31 1498.14M1738.7 -105.286L1425.76 70.7144L978.931 355L408.786 693L-972.137 1525.86M1746.13 -105.857L1464.48 86.1427L1009.22 348L493.093 714L-867.968 1553.57M1753.56 -106.429L1503.21 101.571L1039.52 341L577.4 735L-763.798 1581.29M1760.99 -107L1541.93 117L1069.81 334L661.707 756L-659.629 1609M1768.42 -107.572L1580.66 132.428L1100.1 327L746.014 777L-555.46 1636.71M1775.85 -108.143L1619.38 147.857L1130.4 320L830.321 798L-451.29 1664.43M1783.28 -108.714L1658.1 163.286L1160.69 313L914.629 819L-347.121 1692.14M1790.71 -109.286L1696.83 178.714L1190.98 306L998.936 840L-242.951 1719.86M1798.14 -109.857L1735.55 194.143L1221.28 299L1083.24 861L-138.782 1747.57M1805.57 -110.429L1774.28 209.571L1251.57 292L1167.55 882L-34.6129 1775.29" stroke="url(#paint0_linear_14_730)"/>
        </g>
        <defs>
            <linearGradient id="paint0_linear_14_730" x1="-316.934" y1="970.603" x2="58.1522" y2="467.032" gradientUnits="userSpaceOnUse">
            <stop stop-color="#16161C"/>
            <stop offset="1" stop-color="white" stop-opacity="0"/>
            </linearGradient>
        </defs>
        </svg>
    </div>

    <div class="container">
        <?= $content ?>
    </div>
</main>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


<style>
    @font-face{
        font-weight: 400; 
        font-family: "Play Regular";
        src: url("../../web/fonts/Play-Regular.ttf");
    }

    @font-face{
        font-weight: 700;
        font-family: "Play Bold";
        src: url("../../web/fonts/Play-Bold.ttf");
    }

    *{
        color: #fdf7f7;
    }
    #main{
        margin-top: 60px;
    }

    .navbar{
        background-color: transparent !important;
    }

    .navbar-brand{
        font-weight: 700 !important;
        font-size: 1.75rem;

        background-color: #2AA5A0;
        background-image: linear-gradient(132deg, #F7EA76 0%, #D1AF4D 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .navbar-brand:hover{
        color: linear-gradient(132deg, #F7EA76 0%, #D1AF4D 100%) !important;
    }

    body {
        background-color: #181818 !important;
    }

    #svg{
        stroke-width: 1px;
        stroke: #46595B;
        opacity: 0.7;

        flex-shrink: 0;
        position: absolute;
        z-index: -100 !important;

        top: -100px;
        left: -100px;
        width: 2000px;
        height: 1068px;
    }

    #svg-wrapper{
        overflow: hidden;
        z-index: -100;
    }
</style>