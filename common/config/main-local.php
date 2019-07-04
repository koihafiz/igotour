<?php
return [
    'components' => [
         'db' => [
             'class' => 'yii\db\Connection',
             'dsn' => 'mysql:host=localhost:3306;dbname=igo',
             'username' => 'root',
             'password' => '06koi5403',
             'charset' => 'utf8',
         ],
//        'db' => [
//            'class' => 'yii\db\Connection',
//            'dsn' => 'mysql:host=localhost;dbname=mybuildi_igo',
//            'username' => 'mybuildi_igo',
//            'password' => 'OAxmCr%j[B=L',
//            'charset' => 'utf8',
//        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
            ],
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
        ],
    ],
];
