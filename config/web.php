<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru',
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'controllerNamespace' => 'app\modules\admin\controllers',
            'viewPath' => '@app/modules/admin/views',
            'layoutPath' => '@app/layouts/backend/basic/layouts'
        ],
        'rbac' => [
            'class' => 'app\modules\rbac\Module',
            'controllerNamespace' => 'app\modules\rbac\controllers',
            'viewPath' => '@app/modules/rbac/views',
            'layoutPath' => '@app/layouts/backend/basic/layouts'
        ],
        'mdm' => [
            'class' => 'mdm\admin\Module',
            'controllerMap' =>  [
                'assignment' => 'mdm\admin\controllers\AssignmentController',
                'idField' => 'id',
                'usernameField' => 'username'
            ],
            'layout' => 'left-menu',
            'mainLayout' => '@app/views/layouts/main.php'
        ]
    ],
    'components' => [
        'authManager' => [
            'class' => 'yii\rbac\DbManager'
        ],
       /* 'view' => [
            'theme' => [
                'basePath' => '@app/themes/basic',
                'baseUrl' => '@web/themes/basic',
                'pathMap' => [
                    '@app/modules' => '@app/themes/basic',
                ],
            ],
        ],*/
        'user' => [
            'identityClass' => 'app\modules\rbac\models\User',
            //'identityClass' => 'mdm\admin\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['login']
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '2VWRw2dvTGi1B4r9ztWZGbm7-TyelII7',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
                'class' => 'yii\web\UrlManager',
                'enablePrettyUrl' => true,
                'showScriptName' => false,
                'rules' => [
                    '<action:(index)>' => 'admin/admin/<action>',
                    '<action:(login|logout|signup)>' => 'rbac/user/<action>',
                    //'login' => 'admin/'
                ]
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
