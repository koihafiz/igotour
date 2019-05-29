<?php

/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = 'Home';
$url_images = '/uploads/images/';
?>

<style>
    .g-flex-middle-item--top,.price_slider {
        display: none;
    }
    .g-theme-bg-black-v11 {
        background-color: transparent !important;
    }
    .g-bg-black-opacity-0_3--after::after, .g-bg-black-opacity-0_3--before::before {
        background-color: rgba(0, 0, 0, 0) !important;
    }

    .hero{
        width:100vw;
        height:100vh;
        display:flex;
        justify-content:center;
        align-items:center;
        text-align:center;
        color:#fff;
        background-image:linear-gradient(rgba(0,0,0,.5),rgba(0,0,0,.5)),url(/uploads/images/services/wallpaper.jpg);
        background-size:cover;
        background-position:center center;
        background-repeat:no-repeat;
        background-attachment:fixed
    }

    .g-theme-bg-black-v1-opacity-0_3 {
      background-color: rgba(49, 53, 62, 0.5) !important;
    }

</style>
<!-- Banner -->
<section class="hero">
    <div class="container">
        <div class="text-center g-flex-middle-item--bottom">
            <h1 class="text-uppercase g-font-weight-700 g-color-white mb-0">Travel With Local Buddy</h1>
            <h4 class="g-font-size-20 mb-0 g-mb-15">
                <i class="g-color-white">Explore the country of your choice, at your own convenience, with less money spent and higher  flexibility, accompanied by a local buddy. You will be taken to the unseen aspects of the country,  listen to the local secrets and get the true feeling of the city.<br/><br/>

                <p >Travel like a local, with your iGO Buddy.</p></i>
            </h4>
            <a href="<?=Url::toRoute('/site/signup')?>">
                <strong class="d-inline-block g-color-white g-bg-primary g-pa-10">Sign up as IGO Buddy Now!</strong>
            </a>
        </div>
    </div>
</section>
<!-- /Banner -->

<!-- ourTours-->
<section id="ourTours" class="g-theme-bg-gray-light-v1 g-py-90">
    <div class="container g-max-width-780 text-center">
        <div class="u-heading-v8-2 g-mb-40">
            <h2 class="text-uppercase u-heading-v8__title g-font-weight-700 g-font-size-40 mb-0">
                <span class="g-color-primary">How It</span> Works
            </h2>
        </div>
         <p class="mb-40"><b>TRAVEL WITH LOCAL BUDDY / COMPANION</b> 
            Travel to a foreign country with a local buddy or companion or even a local business assistance.

            With less money spent, you have all the time you need for yourself and able to go where local usually went. Enjoy your holiday!

            Visit places like a local..

            Here how it works..</p>
    </div>

    <div class="container">
       <div class="row">
           <div class="col-lg-3 col-md-5 g-mb-30 ">
                <!-- Article -->
                <div class=" text-center d-block" href="#">
                    <img class="g-mb-10 g-top-5 g-left-0 g-pa-10" src="/uploads/icon/flaticon/guiders.png" alt="Image description">

                    <!-- Article Content -->
                    <div class="g-bg-blue-lineargradient g-pa-20">
                        <div class="text-uppercase ">
                            <h3 class="h5 g-line-height-1_2 g-font-weight-700 g-font-size-18 g-font-secondary g-color-white g-mb-10">
                                <em class="d-block g-top-5 g-font-style-normal g-font-size-11">STEP 1</em>SELECT ACTIVITIES
                            </h3>
                            <small class="g-color-white-opacity-0_8">Choose a destination and select the activities that you want to do there.</small>
                        </div>
                    </div>
                <!-- End Article Content -->
                </div>
                <!-- End Article -->
            </div>
             <div class="col-lg-3 col-md-6 g-mb-30 ">
                 <!-- Article -->
                <div class=" text-center d-block" href="#">
                    <img class="g-mb-10 g-top-5 g-left-0 g-pa-10" src="/uploads/icon/flaticon/accept.png" alt="Image description">

                    <!-- Article Content -->
                    <div class="g-bg-orange-lineargradient g-pa-20">
                        <div class="text-uppercase ">
                            <h3 class="h5 g-line-height-1_2 g-font-weight-700 g-font-size-18 g-font-secondary g-color-white g-mb-10">
                                <em class="d-block g-top-5 g-font-style-normal g-font-size-11"> STEP 2</em>SELECT A BUDDY
                            </h3>
                            <small class="g-color-white-opacity-0_8">System will prompt to list of buddies according to selected activities. Choose the Tour Buddy that suit you based on their profile.</small>
                        </div>
                    </div>
                <!-- End Article Content -->
                </div>
                <!-- End Article -->
            </div>
             <div class="col-lg-3 col-md-6 g-mb-30">
                 <!-- Article -->
                <div class=" text-center d-block" href="#">
                    <img class="g-mb-10 g-top-5 g-left-0 g-pa-10" src="/uploads/icon/flaticon/payment.png" alt="Image description">

                    <!-- Article Content -->
                    <div class="g-bg-darkpurple-lineargradient g-pa-20">
                        <div class="text-uppercase ">
                            <h3 class="h5 g-line-height-1_2 g-font-weight-700 g-font-size-18 g-font-secondary g-color-white g-mb-10">
                                <em class="d-block g-top-5 g-font-style-normal g-font-size-11">STEP 3</em>MAKE YOUR CONFIRMATION
                            </h3>
                            <small class="g-color-white-opacity-0_8">Make your online payment by cash transfer or credit card for confirmation of your activities.</small>
                        </div>
                    </div>
                <!-- End Article Content -->
                </div>
                <!-- End Article -->
            </div>
             <div class="col-lg-3 col-md-6 g-mb-30 ">
                 <!-- Article -->
                <div class=" text-center d-block" href="#">
                    <img class="g-mb-10 g-top-5 g-left-0 g-pa-10" src="/uploads/icon/flaticon/travel.png" alt="Image description">

                    <!-- Article Content -->
                    <div class="g-bg-pink-lineargradient g-pa-20">
                        <div class="text-uppercase ">
                            <h3 class="h5 g-line-height-1_2 g-font-weight-700 g-font-size-18 g-font-secondary g-color-white g-mb-10">
                                <em class="d-block g-top-5 g-font-style-normal g-font-size-11"> STEP 4</em>Lets Go Tour
                            </h3>
                            <small class="g-color-white-opacity-0_8">LET’S GO visit places like a local!</small>
                        </div>
                    </div>
                <!-- End Article Content -->
                </div>
                <!-- End Article -->
            </div>
        </div><!-- End Row -->
    </div><!-- End Container --> 
</section>
<!-- /ourTours-->

<!-- Our Guides Services -->
<section id="popularTours" class="g-py-40">
    <div class="container g-max-width-780 text-center g-mb-40">
        <div class="u-heading-v8-2 g-mb-20">
            <h2 class="text-uppercase u-heading-v8__title g-font-weight-700 g-font-size-40 mb-0">
                <br><span class="g-color-primary">Our Guided </span> Services
            </h2>
        </div>

        <p class="g-mb-30 mb-0">We bring to you the convenience of the local life, its local entertainment and trending, lifestyle, food, historical places, and the updated local events which the locals look forward to attend. You will be well-informed of the ongoing events and activities.</p>
    </div>
    <div class="container">
        <!-- Product Blocks -->
        <div class="row">
            <div class="col-lg-4 col-md-6 g-mb-30">
                <!-- Article -->
                <a class="d-block u-bg-overlay g-bg-black-opacity-0_3--after g-parent g-text-underline--none--hover" href="#">
                    <img class="img-fluid" src="<?=$url_images?>services/advanture.jpg" alt="Image description">

                    <!-- Article Content -->
                    <div class="u-bg-overlay__inner g-pos-abs g-top-0 g-left-0 w-100 h-100 g-pa-30">
                        <div class="g-flex-middle h-100 g-theme-bg-black-v1-opacity-0_3 g-pa-10 g-transition-0_2 g-transition--ease-in">
                            <div class="text-center g-pa-10">
                                <h2 class="h5 g-line-height-1_2 g-font-weight-700 g-font-size-18 g-font-secondary g-color-white g-mb-10 ">
                                    Adventure</h2>
                                <span class="g-color-white"><i>From mountains to the sea! Jungle trekking to kayaking.</i></span>
                            </div>
                        </div>
                    </div>
                    <!-- End Article Content -->
                </a>
                <!-- End Article -->
            </div>

            <div class="col-lg-4 col-md-6 g-mb-30">
                <!-- Article -->
                <a class="d-block u-bg-overlay g-bg-black-opacity-0_3--after g-parent g-text-underline--none--hover" href="#">
                    <img class="img-fluid" src="<?=$url_images?>services/building_minangkabau.jpg" alt="Image description">

                    <!-- Article Content -->
                    <div class="u-bg-overlay__inner g-pos-abs g-top-0 g-left-0 w-100 h-100 g-pa-30">
                        <div class="g-flex-middle h-100 g-theme-bg-black-v1-opacity-0_3 g-pa-10 g-transition-0_2 g-transition--ease-in">
                            <div class="text-center g-pa-10">
                                <h2 class="h5 g-line-height-1_2 g-font-weight-700 g-font-size-18 g-font-secondary g-color-white g-mb-10 ">
                                    Building</h2>
                                <span class="g-color-white"><i>Unique architecture based on the origins of the local ancestors.</i></span>
                            </div>
                        </div>
                    </div>
                    <!-- End Article Content -->
                </a>
                <!-- End Article -->
            </div>

            <div class="col-lg-4 col-md-6 g-mb-30">
                <!-- Article -->
                <a class="d-block u-bg-overlay g-bg-black-opacity-0_3--after g-parent g-text-underline--none--hover" href="#">
                    <img class="img-fluid" src="<?=$url_images?>services/mui_nei.jpg" alt="Image description">

                    <!-- Article Content -->
                    <div class="u-bg-overlay__inner g-pos-abs g-top-0 g-left-0 w-100 h-100 g-pa-30">
                        <div class="g-flex-middle h-100 g-theme-bg-black-v1-opacity-0_3 g-pa-10 g-transition-0_2 g-transition--ease-in">
                            <div class="text-center g-pa-10">
                                <h2 class="h5 g-line-height-1_2 g-font-weight-700 g-font-size-18 g-font-secondary g-color-white g-mb-10 ">
                                    Nature</h2>
                                <span class="g-color-white"><i>Blending in with nature that carries local identity.</i></span>
                            </div>
                        </div>
                    </div>
                    <!-- End Article Content -->
                </a>
                <!-- End Article -->
            </div>

            <div class="col-lg-4 col-md-6 g-mb-30">
                <!-- Article -->
                <a class="d-block u-bg-overlay g-bg-black-opacity-0_3--after g-parent g-text-underline--none--hover" href="#">
                    <img class="img-fluid" src="<?=$url_images?>services/horse_padang.jpg" alt="Image description">

                    <!-- Article Content -->
                    <div class="u-bg-overlay__inner g-pos-abs g-top-0 g-left-0 w-100 h-100 g-pa-30">
                        <div class="g-flex-middle h-100 g-theme-bg-black-v1-opacity-0_3 g-pa-10 g-transition-0_2 g-transition--ease-in">
                            <div class=" text-center g-pa-10">
                                <h2 class="h5 g-line-height-1_2 g-font-weight-700 g-font-size-18 g-font-secondary g-color-white g-mb-10 ">
                                    Historical Place</h2>
                                <span class="g-color-white"><i>Enrich your knowledge with the history of the local places.</i></span>
                            </div>
                        </div>
                    </div>
                    <!-- End Article Content -->
                </a>
                <!-- End Article -->
            </div>

            <div class="col-lg-4 col-md-6 g-mb-30">
                <!-- Article -->
                <a class="d-block u-bg-overlay g-bg-black-opacity-0_3--after g-parent g-text-underline--none--hover" href="#">
                    <img class="img-fluid" src="<?=$url_images?>services/visitor_bali.jpg" alt="Image description">

                    <!-- Article Content -->
                    <div class="u-bg-overlay__inner g-pos-abs g-top-0 g-left-0 w-100 h-100 g-pa-30">
                        <div class="g-flex-middle h-100 g-theme-bg-black-v1-opacity-0_3 g-pa-10 g-transition-0_2 g-transition--ease-in">
                            <div class="text-center g-pa-10">
                                <h2 class="h5 g-line-height-1_2 g-font-weight-700 g-font-size-18 g-font-secondary g-color-white g-mb-10 ">
                                    Lifestyle</h2>
                                <span class="g-color-white"><i>Unveil the uniqueness of others’ lifestyles. Appreciate the differences.</i></span>
                            </div>
                        </div>
                    </div>
                    <!-- End Article Content -->
                </a>
                <!-- End Article -->
            </div>

            <div class="col-lg-4 col-md-6 g-mb-30">
                <!-- Article -->
                <a class="d-block u-bg-overlay g-bg-black-opacity-0_3--after g-parent g-text-underline--none--hover" href="#">
                    <img class="img-fluid" src="<?=$url_images?>services/food_nyum.jpg" alt="Image description">

                    <!-- Article Content -->
                    <div class="u-bg-overlay__inner g-pos-abs g-top-0 g-left-0 w-100 h-100 g-pa-30">
                        <div class="g-flex-middle h-100 g-theme-bg-black-v1-opacity-0_3 g-pa-10 g-transition-0_2 g-transition--ease-in">
                            <div class="text-center g-pa-10">
                                <h2 class="h5 g-line-height-1_2 g-font-weight-700 g-font-size-18 g-font-secondary g-color-white g-mb-10 ">
                                    Food</h2>
                                <span class="g-color-white"><i>Don’t miss the best local food! Only the locals know the best local food.</i></span>
                            </div>
                        </div>
                    </div>
                    <!-- End Article Content -->
                </a>
                <!-- End Article -->
            </div>
        </div>
        <!-- End Product Blocks -->
    </div>
</section>
<!-- /Our Guides Services -->

<!-- Vidoe -->
<section id="vidoe" class="g-py-40">
    <div class="container g-max-width-780 text-center g-mb-70">
        <div class="u-heading-v8-2 g-mb-40">
            <h2 class="text-uppercase u-heading-v8__title g-font-weight-700 g-font-size-40 mb-0">
                <br><span class="g-color-primary">Travel</span> without hassle!
            </h2>
        </div>
        <p class="mb-0">Enjoy your holiday with personalized Tour Buddy. Get the actual living experience like the locals. Indulge into the traditional local delicacies, activities, people, crafts, affordable shopping spree, and many more. In short... iGO brings you to experience the world like the locals.</p>
    </div>

    <div class="container">
        <div class="row">
            <!-- Embed Video-->
            <div class="col-lg-12">
                <video controls="true" class="myIframe" style="margin: 0 auto;display: block">
                    <source src="/uploads/video/igotour.mp4" type="video/mp4" />
                </video>
            </div><!-- /Embed Video-->
        </div><!-- /row -->
    </div><!-- /container -->
</section>
<!-- /Vidoe -->

<section id="subscribe" class="u-bg-overlay g-bg-black-opacity-0_7--after g-bg-img-hero g-py-150--md g-py-50 g-mb-20" style="background-image: url(<?=$url_images?>nature_padi.jpg);">
    <div class="container u-bg-overlay__inner text-center g-color-white">
        <div class="row justify-content-center">
            <div class="col-md-offset-1 col-md-10">
                <h2 class="text-uppercase g-font-weight-700 g-font-size-56 g-font-secondary g-color-white g-mb-40">
                    <span class="g-color-primary">Let Us </span> Help You Out!</h2>
                <p class="g-color-white-opacity-0_8 g-mb-65">If you cannot find your preferred services, tell us what you are looking for?
                <form role="form">
                    <div class="row">
                        <div class="col-md-6 form-group g-mb-35">
                            <input class="form-control form-control-lg g-placeholder-white g-font-size-15 g-color-white g-bg-transparent g-bg-transparent--focus g-brd-white g-brd-white--focus rounded-0 g-pa-10" name="email"  type="email" placeholder="Your email">
                        </div>

                        <div class="col-md-6 form-group g-mb-35">
                            <input class="form-control form-control-lg g-placeholder-white g-font-size-15 g-color-white g-bg-transparent g-bg-transparent--focus g-brd-white g-brd-white--focus rounded-0 g-pa-10" name="message" type="message" placeholder="Your message">
                        </div>
                    </div>

                    <button class="btn btn-md text-uppercase u-btn-primary g-font-weight-700 g-font-size-12 rounded-0 g-py-10 g-px-25" type="submit">Send message</button>
                </form>
            </div>
        </div>
    </div>
</section>
<section id="gallery" class="g-pt-20">
    <div class="container g-max-width-780 text-center g-mb-20">
        <div class="u-heading-v8-2 g-mb-40">
            <h2 class="text-uppercase u-heading-v8__title g-font-weight-700 g-font-size-40 mb-0">
                <br><span class="g-color-primary">Our Buddy In The </span> World
            </h2>
        </div>

        <p class="mb-0">Our worldwide Tour Buddy includes for recreation, tourism or vacationing, research travel, the gathering of information, visiting people, volunteer travel for charity, migration to begin life somewhere else, religious pilgrimages and mission trips, business travel, trade, commuting, and any other reasons, we have dedicated Buddy specifically to suit your individual needs. </p><br />
        <p>Enjoy your visits with peace of mind!</p>
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
            <a class="cbp-caption cbp-lightbox" href="<?=$url_images?>portfolio/dianaandsea.jpg"
               data-title="Sed feugiat porttitor nunc<br>by Vivamus">
                <div class="cbp-caption-defaultWrap u-bg-overlay g-bg-black-opacity-0_3--after">
                    <img src="<?=$url_images?>portfolio/dianaandsea.jpg" width="400" height="800" >
                </div>
            </a>
        </div>

        <div class="cbp-item">
            <a class="cbp-caption cbp-lightbox" href="<?=$url_images?>portfolio/tanahlot_sea.jpg"
               data-title="Sed feugiat porttitor nunc<br>by Vivamus">
                <div class="cbp-caption-defaultWrap u-bg-overlay g-bg-black-opacity-0_3--after">
                    <img src="<?=$url_images?>portfolio/tanahlot_sea.jpg" width="800" height="400"  alt="Image description">
                </div>
            </a>
        </div>

        <div class="cbp-item">
            <a class="cbp-caption cbp-lightbox" href="<?=$url_images?>portfolio/street_love.jpg"
               data-title="Sed feugiat porttitor nunc<br>by Vivamus">
                <div class="cbp-caption-defaultWrap u-bg-overlay g-bg-black-opacity-0_3--after">
                    <img src="<?=$url_images?>portfolio/street_love.jpg" width="400" height="400"   alt="Image description">
                </div>
            </a>
        </div>

        <div class="cbp-item">
            <a class="cbp-caption cbp-lightbox" href="<?=$url_images?>portfolio/paddy_nature.jpg"
               data-title="Sed feugiat porttitor nunc<br>by Vivamus">
                <div class="cbp-caption-defaultWrap u-bg-overlay g-bg-black-opacity-0_3--after">
                    <img src="<?=$url_images?>portfolio/paddy_nature.jpg" width="400" height="400"  alt="Image description">
                </div>
            </a>
        </div>

        <div class="cbp-item">
            <a class="cbp-caption cbp-lightbox" href="<?=$url_images?>portfolio/seliper.jpg"
               data-title="Sed feugiat porttitor nunc<br>by Vivamus">
                <div class="cbp-caption-defaultWrap u-bg-overlay g-bg-black-opacity-0_3--after">
                    <img src="<?=$url_images?>portfolio/seliper.jpg"  width="400" height="400"  alt="Image description">
                </div>
            </a>
        </div>

        <div class="cbp-item">
            <a class="cbp-caption cbp-lightbox" href="<?=$url_images?>portfolio/gdex_basikal.jpg"
               data-title="Sed feugiat porttitor nunc<br>by Vivamus">
                <div class="cbp-caption-defaultWrap u-bg-overlay g-bg-black-opacity-0_3--after">
                    <img src="<?=$url_images?>portfolio/gdex_basikal.jpg" width="800" height="400"  alt="Image description">
                </div>
            </a>
        </div>

        <div class="cbp-item">
            <a class="cbp-caption cbp-lightbox" href="<?=$url_images?>portfolio/makandanminum.jpg"
               data-title="Sed feugiat porttitor nunc<br>by Vivamus">
                <div class="cbp-caption-defaultWrap u-bg-overlay g-bg-black-opacity-0_3--after">
                    <img src="<?=$url_images?>portfolio/makandanminum.jpg" width="400" height="400" alt="Image description">
                </div>
            </a>
        </div>
    </div>

    <div class="cbp-l-loadMore-text"></div>
    <!-- End Cube Portfolio -->
</section>

<?php $this->beginBlock('JsBlock') ?>
<script type="text/javascript">
    $(document).ready(function(){
        var h = $(window).height();
        var w = $(window).width();
        $(".myIframe").css('height',(h < 768 || w < 1024) ? 400 : 600);

    });

</script>
<?php $this->endBlock()?>
