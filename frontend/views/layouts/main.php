<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

$assets = AppAsset::register($this);

$logo_link = '/assets_unify_262/img/logo/main_logo.png';
$logo_link_footer = '/assets_unify_262/img/logo/main_logo_black.png';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,500,600,700,800|Roboto:400,700">
    <?php $this->head() ?>
    <style>
        .u-header__section {
            background-color: rgba(49, 53, 62, 0.8) !important;
        }
        .navbar-nav .nav-item .nav-link:hover, .navbar-nav .nav-item.active .nav-link {
            color:rgb(255, 247, 20);
        }
    </style>
</head>
<body>
<?php $this->beginBody() ?>

<main>
    <?= $this->render('header'); ?>   
    <?= Alert::widget() ?>
    <?= $content ?>

    <!-- Footer -->
    <?= $this->render('footer'); ?>

</main>


<?php $this->endBody() ?>

<script>
    // initialization of master slider
    var promoSlider = new MasterSlider();

    promoSlider.setup('masterslider', {
        width: 1400,
        height: 580,
        speed: 70,
        layout: 'fullscreen',
        loop: true,
        preload: 0,
        autoplay: true
    });

    promoSlider.control('thumblist', {
        autohide: false,
        dir: 'h',
        align: 'bottom',
        width: 200,
        height: 120,
        margin: 0,
        space: 0,
        hideUnder: 767
    });

    // initialization of google map
    function initMap() {
//        $.HSCore.components.HSGMap.init('.js-g-map');
    }

    $(document).on('ready', function () {

        //$.HSCore.helpers.HSFocusState.init();
        //$.HSCore.helpers.HSNotEmptyState.init();

        // initialization of tabs
        $.HSCore.components.HSTabs.init('[role="tablist"]');

        // initialization of carousel
        $.HSCore.components.HSCarousel.init('.js-carousel');

        // initialization of header
        $.HSCore.components.HSHeader.init($('#js-header'));
        $.HSCore.helpers.HSHamburgers.init('.hamburger');

        // initialization of datepicker
        $.HSCore.components.HSDatepicker.init('.js-datepicker');

        // initialization of custom select
        $.HSCore.components.HSSelect.init('.js-custom-select');

        // initialization of rating
        $.HSCore.components.HSRating.init($('.js-rating'), {
            spacing: 4
        });

        // initialization of go to section
        $.HSCore.components.HSGoTo.init('.js-go-to');

        // initialization of HSScrollBar component
        $.HSCore.components.HSScrollBar.init( $('.js-scrollbar') );

    });

    $(window).on('load', function() {
        // initialization of HSScrollNav
//        $.HSCore.components.HSScrollNav.init($('#js-scroll-nav'), {
//            duration: 700
//        });

        $.HSCore.components.HSHeader.init($('#js-header'));
        $.HSCore.helpers.HSHamburgers.init('.hamburger');


        // initialization of cubeportfolio
        $.HSCore.components.HSCubeportfolio.init('.cbp');

        setTimeout(function () { // important in this case
            var horizontalProgressBars = $.HSCore.components.HSProgressBar.init('.js-hr-progress-bar', {
                direction: 'horizontal',
                indicatorSelector: '.js-hr-progress-bar-indicator'
            });
        }, 1);
    });

    $(window).on('resize', function () {
        setTimeout(function () {
            $.HSCore.components.HSTabs.init('[role="tablist"]');
        }, 200);
    });
</script>
<script>
    (function($) {
        $.fn.inputFilter = function(inputFilter) {
            return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
                if (inputFilter(this.value)) {
                    this.oldValue = this.value;
                    this.oldSelectionStart = this.selectionStart;
                    this.oldSelectionEnd = this.selectionEnd;
                } else if (this.hasOwnProperty("oldValue")) {
                    this.value = this.oldValue;
                    this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                }
            });
        };
    }(jQuery));
</script>


<?php if(isset($this->blocks['JsBlock'])):?>
    <?=$this->blocks['JsBlock']?>
<?php endif;?>

</body>
</html>
<?php $this->endPage() ?>
