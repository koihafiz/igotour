<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'modules' => [
        'api' => [
            'class' => 'common\modules\api\Module',
        ],
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'nullDisplay' => '<span style="color:red">Not Set</span>',
            'decimalSeparator' => '.',
            'thousandSeparator' => ',',
            'currencyCode' => 'MYR',
            'timeZone' => 'Asia/Singapore',

        ],
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            // Hide index.php
            'showScriptName' => false,
            // Use pretty URLs
            'enablePrettyUrl' => true,
            'rules' => [
                '<alias:\w+>' => '/<alias>',
            ],
        ],
        'urlManagerBackend'=>[
            'enablePrettyUrl' => false,
            'class' => 'yii\web\UrlManager',
            'scriptUrl' => '/admin',
            'baseUrl' => 'https://admin.igotour.services',

        ],
    ],
];
