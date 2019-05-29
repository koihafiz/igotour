<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;

$url_fake = 'https://htmlstream.com/preview/unify-v2.6.1/one-pages/travel/';
?>
<style>
    .u-header__section {
        background-color: rgba(49, 53, 62, 0.8) !important;
    }
</style>
<section id="gallery" class="g-pt-90">
    <div class="container g-max-width-780 text-center g-mb-70">
        <div class="u-heading-v8-2 g-mb-40">
            <h2 class="text-uppercase u-heading-v8__title g-font-weight-700 g-font-size-40 mb-0">
                <strong class="h6 d-inline-block g-theme-bg-black-v1 g-color-white g-mb-20">Our gallery</strong>
                <br><span class="g-color-primary">Interesting</span> shots
            </h2>
        </div>

        <p class="mb-0">Sed feugiat porttitor nunc, non dignissim ipsum vestibulum in. Donec in blandit dolor. Vivamus a fringilla lorem, vel faucibus ante. Nunc ullamcorper, justo a iaculis elementum, enim orci viverra eros, fringilla porttitor lorem eros vel odio.</p>
    </div>

    <!-- Cube Portfolio -->
    <div class="cbp"
         data-layout="mosaic"
         data-animation="fadeOutTop"
         data-caption-animation="zoom"
         data-x-gap="0"
         data-y-gap="0"
         data-media-queries='[
               {"width": 1500, "cols": 5},
               {"width": 1100, "cols": 4},
               {"width": 800, "cols": 3},
               {"width": 480, "cols": 2},
               {"width": 320, "cols": 1}
             ]'>
        <div class="cbp-item">
            <a class="cbp-caption cbp-lightbox" href="<?=$url_fake?>assets/img-temp/1200x675/img1.jpg"
               data-title="Sed feugiat porttitor nunc<br>by Vivamus">
                <div class="cbp-caption-defaultWrap u-bg-overlay g-bg-black-opacity-0_3--after">
                    <img src="<?=$url_fake?>assets/img-temp/760x720/img1.jpg" alt="Image description">
                </div>
            </a>
        </div>

        <div class="cbp-item">
            <a class="cbp-caption cbp-lightbox" href="<?=$url_fake?>assets/img-temp/1200x675/img2.jpg"
               data-title="Sed feugiat porttitor nunc<br>by Vivamus">
                <div class="cbp-caption-defaultWrap u-bg-overlay g-bg-black-opacity-0_3--after">
                    <img src="<?=$url_fake?>assets/img-temp/380x360/img1.jpg" alt="Image description">
                </div>
            </a>
        </div>

        <div class="cbp-item">
            <a class="cbp-caption cbp-lightbox" href="<?=$url_fake?>assets/img-temp/1200x675/img3.jpg"
               data-title="Sed feugiat porttitor nunc<br>by Vivamus">
                <div class="cbp-caption-defaultWrap u-bg-overlay g-bg-black-opacity-0_3--after">
                    <img src="<?=$url_fake?>assets/img-temp/380x360/img2.jpg" alt="Image description">
                </div>
            </a>
        </div>

        <div class="cbp-item">
            <a class="cbp-caption cbp-lightbox" href="<?=$url_fake?>assets/img-temp/1200x675/img4.jpg"
               data-title="Sed feugiat porttitor nunc<br>by Vivamus">
                <div class="cbp-caption-defaultWrap u-bg-overlay g-bg-black-opacity-0_3--after">
                    <img src="<?=$url_fake?>assets/img-temp/760x360/img1.jpg" alt="Image description">
                </div>
            </a>
        </div>

        <div class="cbp-item">
            <a class="cbp-caption cbp-lightbox" href="<?=$url_fake?>assets/img-temp/1200x675/img5.jpg"
               data-title="Sed feugiat porttitor nunc<br>by Vivamus">
                <div class="cbp-caption-defaultWrap u-bg-overlay g-bg-black-opacity-0_3--after">
                    <img src="<?=$url_fake?>assets/img-temp/380x360/img3.jpg" alt="Image description">
                </div>
            </a>
        </div>

        <div class="cbp-item">
            <a class="cbp-caption cbp-lightbox" href="<?=$url_fake?>assets/img-temp/1200x675/img6.jpg"
               data-title="Sed feugiat porttitor nunc<br>by Vivamus">
                <div class="cbp-caption-defaultWrap u-bg-overlay g-bg-black-opacity-0_3--after">
                    <img src="<?=$url_fake?>assets/img-temp/760x360/img2.jpg" alt="Image description">
                </div>
            </a>
        </div>

        <div class="cbp-item">
            <a class="cbp-caption cbp-lightbox" href="<?=$url_fake?>assets/img-temp/1200x675/img7.jpg"
               data-title="Sed feugiat porttitor nunc<br>by Vivamus">
                <div class="cbp-caption-defaultWrap u-bg-overlay g-bg-black-opacity-0_3--after">
                    <img src="<?=$url_fake?>assets/img-temp/380x360/img4.jpg" alt="Image description">
                </div>
            </a>
        </div>
    </div>

    <div class="cbp-l-loadMore-text"></div>
    <!-- End Cube Portfolio -->
</section>