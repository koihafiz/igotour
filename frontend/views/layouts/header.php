<?php 
use yii\helpers\Url;

$logo_link = '/assets_unify_262/img/logo/igotour.png';

?>
<header id="js-header" class="u-header u-header--sticky-top u-header--change-appearance" data-header-fix-moment="61">
        <div class="u-header__section g-transition-0_3 <?=(Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index')?'g-py-12':'g-theme-bg-black-v1-opacity-0_8 g-py-7 js-header-change-moment'?>"
             data-header-fix-moment-exclude="g-py-12"
             data-header-fix-moment-classes="g-theme-bg-black-v1-opacity-0_8 g-py-7">
            <nav class="navbar navbar-expand-lg g-py-0">
                <div class="container g-pos-rel">
                    <!-- Logo -->
                    <a href="#" class="js-go-to navbar-brand u-header__logo"
                       data-type="static">
                        <img class="u-header__logo-img u-header__logo-img--main g-width-100" src="<?=$logo_link?>" alt="Image description">
                    </a>
                    <!-- End Logo -->

                    <!-- Navigation -->
                <!-- Navigation -->
                <div class="collapse navbar-collapse align-items-center flex-sm-row" id="navBar" data-mobile-scroll-hide="true">
                        <ul id="js-scroll-nav" class="navbar-nav text-uppercase g-font-weight-700 g-font-size-11 g-pt-20 g-pt-0--lg ml-auto">
                            <li class="nav-item g-mr-15--lg g-mb-7 g-mb-0--lg <?=(Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index')?'active':''?>">
                                <a href="<?=Url::to('/site/index')?>" class="nav-link p-0">Main <span class="sr-only">(current)</span></a>
                            </li>
                            <?php if(!Yii::$app->user->isGuest) ://&& Yii::$app->user->identity->user_status != 0):?>
                                <li class="nav-item g-mx-15--lg g-mb-7 g-mb-0--lg <?=(Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'tour-guides')?'active':''?>">
                                    <a href="<?=Url::to('/site/tour-guides')?>" class="nav-link p-0">Tour Buddy</a>
                                </li>
                                <li class="nav-item g-mx-15--lg g-mb-7 g-mb-0--lg <?=(Yii::$app->controller->id == 'dashboard')?'active':''?>">
                                    <a href="<?=Url::toRoute('dashboard/index')?>" class="nav-link p-0">Dashboard</a>
                                </li>
                                <li class="nav-item g-mx-15--lg g-mb-7 g-mb-0--lg <?=(Yii::$app->controller->id == 'profile')?'active':''?>">
                                    <a href="<?=Url::toRoute('profile/edit')?>" class="nav-link p-0">My Profile</a>
                                </li>
                            <?php endif;?>

                            <?php
                                if(Yii::$app->user->isGuest):
                            ?>
                                <li class="nav-item g-mx-15--lg g-mb-7 g-mb-0--lg <?=(Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'signup')?'active':''?>">
                                    <a href="<?=Url::toRoute('/site/signup')?>" class="nav-link p-0">Sign Up</a>
                                </li>
                                <li class="nav-item g-mx-15--lg g-mb-7 g-mb-0--lg <?=(Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'login')?'active':''?>">
                                    <a href="<?=Url::toRoute('/site/login')?>" class="nav-link p-0">Login</a>
                                </li>
                            <?php else:?>
                                <li class="nav-item g-mx-15--lg g-mb-7 g-mb-0--lg">
                                    <a class="nav-link p-0" href="<?=Url::toRoute('site/logout')?>" data-method="POST">Logout</a>
                                </li><!--  (<?//=Yii::$app->user->identity->username?>) -->
                            <?php endif;?>

                        </ul>
                    </div>
                    <!-- End Navigation -->

                    <!-- Responsive Toggle Button -->
                    <button class="navbar-toggler btn g-line-height-1 g-brd-none g-pa-0 g-pos-abs g-top-20 g-right-0" type="button"
                            aria-label="Toggle navigation"
                            aria-expanded="false"
                            aria-controls="navBar"
                            data-toggle="collapse"
                            data-target="#navBar">
                            <span class="hamburger hamburger--slider">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </span>
                    </button>
                    <!-- End Responsive Toggle Button -->
            </div>
        </nav>
    </div>
</header>