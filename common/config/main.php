<?php
return [
   'aliases' => [
      '@userPhoto'  => '@frontend/web/uploads/users',
   ],
   'timeZone'  => 'Europe/Kiev',
   'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
   'components' => [
      'i18n' => [
         'translations' => [
            '*' => [
               'class' => 'yii\i18n\PhpMessageSource',
               'basePath' => '@common/messages',
            ],
         ],
      ],
      'log' => [
         'traceLevel' => YII_DEBUG ? 3 : 0,
         'targets' => [
            [
               'class' => 'yii\log\FileTarget',
               'levels' => ['error', 'warning'],
            ],
         ],
      ],
      'cache' => [
         'class' => 'yii\caching\FileCache',
         'cachePath' => '@backend/runtime/cache',
      ],
      'authManager' => [
         'class' => 'common\components\AccessControl\DbManagerCs',  // Используем кастомные RBAC manager из пакета AccessControl
         'cache' => 'cache' //Включаем кеширование
      ],
//      'mailer' => [
//         'class' => 'yii\swiftmailer\Mailer',
//         'useFileTransport' => false,
//         'transport' => [
//            'class' => 'Swift_SmtpTransport',
//            'host' => 'smtp.yandex.ru',
//            'username' => 'tuito-ru@yandex.ru',
//            'password' => '19841328',
//            'port' => '465',
//            'encryption' => 'ssl',
//         ],
//         'viewPath' => '@common/mail',
//      ],
      'accessControl' => [
         'class' => 'common\components\AccessControl\Main',
         'branchs' => [
            ['b', '@backend/controllers', 'Админ панель', '\backend\controllers'],
            ['f', '@frontend/controllers','Публичная часть', '\frontend\controllers'],
         ],
      ],
   ]

];
