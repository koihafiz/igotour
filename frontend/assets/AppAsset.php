<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'assets_unify_262/vendor/bootstrap/bootstrap.min.css',
        'assets_unify_262/vendor/icon-awesome/css/font-awesome.min.css',
        'assets_unify_262/vendor/icon-line/css/simple-line-icons.css',
        'assets_unify_262/vendor/icon-etlinefont/style.css',
        'assets_unify_262/vendor/icon-line-pro/style.css',
        'assets_unify_262/vendor/icon-hs/style.css',
        'assets_unify_262/vendor/malihu-scrollbar/jquery.mCustomScrollbar.min.css',
        'assets_unify_262/vendor/jquery-ui/themes/base/jquery-ui.min.css',
        'assets_unify_262/vendor/chosen/chosen.css',
        'assets_unify_262/vendor/hamburgers/hamburgers.min.css',
        'assets_unify_262/vendor/animate.css',
        'assets_unify_262/vendor/slick-carousel/slick/slick.css',
        'assets_unify_262/vendor/master-slider/source/assets/css/masterslider.main.css',
        'assets_unify_262/vendor/cubeportfolio-full/cubeportfolio/css/cubeportfolio.min.css',
        'assets_unify_262/css/styles.op-travel.css',
        'assets_unify_262/css/unify-core.css',
        'assets_unify_262/css/unify-components.css',
        'assets_unify_262/css/unify-globals.css',
        'assets_unify_262/css/custom.css',
    ];
    public $js = [
        'assets_unify_262/vendor/jquery-migrate/jquery-migrate.min.js',
        'assets_unify_262/vendor/popper.js/popper.min.js',
        'assets_unify_262/vendor/bootstrap/bootstrap.min.js',

        'assets_unify_262/vendor/appear.js',
        'assets_unify_262/vendor/slick-carousel/slick/slick.js',
        'assets_unify_262/vendor/master-slider/source/assets/js/masterslider.min.js',
        'assets_unify_262/vendor/cubeportfolio-full/cubeportfolio/js/jquery.cubeportfolio.min.js',
        'assets_unify_262/vendor/gmaps/gmaps.min.js',
        'assets_unify_262/vendor/jquery.maskedinput/src/jquery.maskedinput.js',
        'assets_unify_262/vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js',
        'assets_unify_262/vendor/jquery-ui/ui/widget.js',
        'assets_unify_262/vendor/jquery-ui/ui/version.js',
        'assets_unify_262/vendor/jquery-ui/ui/keycode.js',
        'assets_unify_262/vendor/jquery-ui/ui/position.js',
        'assets_unify_262/vendor/jquery-ui/ui/unique-id.js',
        'assets_unify_262/vendor/jquery-ui/ui/safe-active-element.js',
        'assets_unify_262/vendor/jquery-ui/ui/widgets/menu.js',
        'assets_unify_262/vendor/jquery-ui/ui/widgets/mouse.js',
        'assets_unify_262/vendor/jquery-ui/ui/widgets/datepicker.js',
        'assets_unify_262/vendor/chosen/chosen.jquery.js',
        'assets_unify_262/vendor/image-select/src/ImageSelect.jquery.js',

        'assets_unify_262/js/hs.core.js',
        'assets_unify_262/js/components/hs.header.js',
        'assets_unify_262/js/helpers/hs.hamburgers.js',
        'assets_unify_262/js/components/hs.scroll-nav.js',
        'assets_unify_262/js/components/hs.rating.js',
        'assets_unify_262/js/components/hs.tabs.js',
        'assets_unify_262/js/components/hs.progress-bar.js',
        'assets_unify_262/js/components/hs.datepicker.js',
        'assets_unify_262/js/components/hs.scrollbar.js',

        'assets_unify_262/js/helpers/hs.file-attachments.js',
        'assets_unify_262/js/components/hs.file-attachement.js',
//        'assets_unify_262/js/components/hs.not-empty-state.js',
        'assets_unify_262/js/components/hs.select.js',
//        'assets_unify_262/js/components/hs.focus-state.js',
        'assets_unify_262/js/components/hs.carousel.js',
        'assets_unify_262/js/components/hs.masked-input.js',
        'assets_unify_262/js/components/hs.cubeportfolio.js',
        'assets_unify_262/js/components/gmap/hs.map.js',
        'assets_unify_262/js/components/hs.go-to.js',
        'assets_unify_262/js/custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
