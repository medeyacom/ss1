<?php
use \kartik\datecontrol\Module;
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log','gii','debug'],
    'language' => 'ru',
    'modules'=>[
    'gii'=>[
    'class'=>'yii2\gii\Module',
     'generators' => [ //here
            'crud' => [ // generator name
                'class' => 'yii\gii\generators\crud\Generator', // generator class
                'templates' => [ //setting for out templates
                    'myGii' => '@common/generators/crud/default', // template name => path to template
                ]
            ]
        ],
    ],
    'debug'=>[
    'class'=>'yii2\debug\Module'
    ],
   'blog' => [
            'class' => 'medeyacom\blog\Blog',
        ],
     'datecontrol'=> [
     'class'=> 'kartik\datecontrol\Module',
      // format settings for displaying each date attribute (ICU format example)
'displaySettings' => [
    Module::FORMAT_DATE => 'php:d-M-Y', 
    /*'dd-MM-yyyy',*/
    Module::FORMAT_TIME => 'php: H:1',
    /*'hh:mm:ss a',*/
    Module::FORMAT_DATETIME => 'php:d-m-Y H:1',
    /*'dd-MM-yyyy hh:mm:ss a',*/ 
],
 
// format settings for saving each date attribute (PHP format example)
'saveSettings' => [
    Module::FORMAT_DATE => 'yyyy-M-dd', 
    /*'php:U', // saves as unix timestamp*/
    Module::FORMAT_TIME => 'H:i:s',
    /*'php:H:i:s',*/
    Module::FORMAT_DATETIME => 'yyyy-M-dd H:i:s',
    /*'php:Y-m-d H:i:s',*/
],   
'displayTimezone'=>'UTC',
'saveTimezone' => 'UTC',
'autoWidget' =>true,
]
    ],
       
    'components' => [
    /*'user' =>[
    'identityClass' =>'common\models\User',
    'enableAutoLogin' => true,
    ],
    'view' => [
         'theme' => [
             'pathMap' => [
                '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
             ],
         ],
    ],*/
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
       
         'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,


            'rules' => [
            

            ],
        ],
       'formatter'=> [
            'class' =>'yii\i18n\Formatter',
           /*  'defaultTimeZone' => 'Europe/Samara',*/
            /* 'timeZone' => 'GMT+5',*/
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'EUR',
           /* 'dateFormat' => 'd MMMM yyyy',*/
            'dateFormat' => 'php:d-M-Y',
            'datetimeFormat' => 'php: d-M-Y H:i:',

            /*'datetimeFormat'=>'d-M-Y H:i:s',*/
           /* 'timeFormat' => 'H:i:s', */
    ],

],
    'params' => $params,

     'on beforeAction' => function($event){ //цепляемся за событие перед запуском экшена
      Yii::$app->controller->attachBehavior('',[ //цепляем к текущему контролеру поведение
          'class' => \yii\filters\AccessControl::className(), //указываем класс поведения
          'except' => ['login','error','register'], 
         //исключим из правила экшены login и error, так как они должны быть доступны всем
          'rules' => [
              [
                  'allow' => true, //разрешаем доступ
                  'roles' => ['@'], //'@' только зарегистрированным пользователям или замените на 'admin',  что бы только админам позволить
              
  
              ],


          ],
      ]);
    },


      
];


       