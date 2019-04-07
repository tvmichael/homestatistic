<?php

$params = require __DIR__ . '/params.php';

$url = require __DIR__.'/url.php';
//$db = require __DIR__ . '/db.php';
$db = require __DIR__ . '/ldb.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],

    'components' => [
        'sampleCalendar'=>[
            'class' => 'app\components\SampleCalendar',
        ],

        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'k0ZCLzWR7OD7X-kcRN73VG50fc7kN3va',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
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
        'db' => $db,

        //'urlManager'=>$url,

        'assetManager' => [
            'converter' => [ // 1. треба додати (converter) - для використання файлів less
                'class' => 'yii\web\AssetConverter',
                'commands' => [
                    'less' => ['css', 'lessc {from} {to} --no-color'],
                    'ts' => ['js', 'tsc --out {to} {from}'], // також: typescript
                ],
            ],
        ],
    ],
    'params' => $params,
];

/*
if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

//'bootstrap' => ['dev'],
//'bootstrap' => ['debug'], // 1. змінив для відображення пенелі налагодження внизу екрану
/*'modules' => [
    'debug' => [ // 2. також треба додати для відображення пенелі налагодження внизу екрану
        'class' => 'yii\debug\Module',
        'allowedIPs' => '*',
    ],
],*/

if (YII_DEBUG) {
    // configuration adjustments for 'dev' environment
    $config = \yii\helpers\ArrayHelper::merge($config, [
        'bootstrap'=>['debug','gii'],
        'modules'=>[
            'debug' => 'yii\debug\Module',
            'gii' => [
                'class'=>'yii\gii\Module',
                'generators' => [
                    'crud'   => [
                        'class'     => 'yii\gii\generators\crud\Generator',
                        'templates' => ['popup' => '@app/components/generators/popup']
                    ]
                ]
            ],
        ],
    ]);
}

return $config;
