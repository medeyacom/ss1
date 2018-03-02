<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'timeZone' => 'Europe/Moscow',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
            /* 'robotEmail' => '',*/
            /*'robotName' => 'Robot'*/
        ],
            
         'image' => [
        	 	'class' => 'yii\image\ImageDriver',
        		'driver' => 'GD',  //GD or Imagick
        		],
                
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'cache' => 'cache'
        ],
    
    ],
  /*  'on beforeAction' => function($event){ //цепляемся за событие перед запуском экшена
      Yii::$app->controller->attachBehavior('',[ //цепляем к текущему контролеру поведение
          'class' => \yii\filters\AccessControl::className(), //указываем класс поведения
          'except' => ['login','error','register'], 
         //исключим из правила экшены login и error, так как они должны быть доступны всем
          'rules' => [
              [
                  'allow' => true, //разрешаем доступ
                  'roles' => ['?'], //'@' только зарегистрированным пользователям или замените на 'admin',  что бы только админам позволить
              ],
          ],
      ]);
    },*/
];

              
        