<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
          'response' => [
            'formatters' => [
                'pdf' => [
                    'class' => 'robregonm\pdf\PdfResponseFormatter',
                ],
            ]
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'pnNLn2L3DeTjo_v_kpXrv74oX1Zg0MD3',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],'urlManager' => [
    				'enablePrettyUrl' => true,
    				'showScriptName' => false,
    				'rules' => array(
    						'<controller:\w+>/<id:\d+>' => '<controller>/view',
    						'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
    						'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
    				),
    		],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'authClientCollection' => [
  'class' => 'yii\authclient\Collection',
  'clients' => [
    'facebook' => [
      'class' => 'yii\authclient\clients\Facebook',
      'authUrl' => 'https://www.facebook.com/dialog/oauth',
      'clientId' => '1507702859525627',
      'clientSecret' => '1b98d4b95f72a33c2ddc024928f26b22',
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
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
