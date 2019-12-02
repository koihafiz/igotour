<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Traveller';
$this->params['breadcrumbs'][] = $this->title;

header( "refresh:5;url=/site/index" );                      // redirect to home page after 5 secs
?>
<style>
    .u-header__section {
        background-color: rgba(49, 53, 62, 0.8) !important;
    }
</style>
<section class="g-min-height-100vh g-flex-centered g-bg-lightblue-radialgradient-circle" style="background-image: url(/uploads/images/thankyou.png);background-size: cover;">
    <div class="container g-py-100">
        <div class="row justify-content-center">
            <div class="col-md-10 col-sm-12 col-xs-12 col-lg-10">
                <div class="u-shadow-v24 g-bg-white rounded g-py-40 g-px-30" style="background-color: rgba(255, 255, 255, 0.78) !important">
                    <header class="text-center mb-4">
                        <h2 class="h2 g-color-black g-font-weight-600">Thank You</h2>
                    </header>

                    <div class="col-lg-12 text-center">
                        <blockquote class="u-blockquote-v4 g-color-black g-color-primary--before g-color-primary--after g-font-weight-600 g-font-size-35 g-line-height-1_8 g-mb-50" style="font-size: 1.7rem !important">
                            YOUR PAYMENT HAS BEEN
                            <span class="g-brd-bottom--dotted g-brd-2 g-brd-primary g-color-primary g-pb-5">SUCCESSFULL</span>. YOUR REQUEST HAS BEEN RECEIVED AND DELIVERED TO THE
                            <span class="g-brd-bottom--dotted g-brd-2 g-brd-primary g-color-primary g-pb-5">BUDDIES</span> AROUND YOU.
                        </blockquote>
                        <h4 class="h6 g-font-weight-700 text-uppercase g-mb-0">
                            <span class="d-inline-block g-width-40 g-height-2 g-bg-primary g-pos-rel g-top-minus-3 mr-2"></span>
                            Kindly click the bottom close button and go to " Buddy Offer " menu to see the buddies that ready to go.
                        </h4>
                    </div>

                    <footers class="text-center hidden-xs-up">
<!--                        <p class="g-color-gray-dark-v5 g-font-size-13 mb-0">Don't have an account? <a class="g-font-weight-600" href="--><?//=Url::to('/site/signup')?><!--">signup</a></p>-->
                    </footers>
                </div>
            </div>
        </div>
    </div>
</section>
