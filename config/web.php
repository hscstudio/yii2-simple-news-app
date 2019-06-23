<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'K2gqTAIOTq9r6fB7tkjv4pcZTY_Vjp2l',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        'response' => [
            // ...
            'formatters' => [
                \yii\web\Response::FORMAT_JSON => [
                    'class' => 'yii\web\JsonResponseFormatter',
                    'prettyPrint' => YII_DEBUG, // use "pretty" output in debug mode
                    'encodeOptions' => JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE,
                    // ...
                ],
            ],
        ],
        'assetManager' => [
            'class' => 'yii\web\AssetManager',
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js' => [
                        YII_ENV_DEV ? 'jquery.js' : 'jquery.min.js'
                    ],
                ],        
                'yii\bootstrap4\BootstrapAsset' => [
                    'css' => [
                        YII_ENV_DEV ? 'css/bootstrap.css' : 'css/bootstrap.min.css',
                    ],
                    'cssOptions' => [
                        'rel' => 'preload',
                        'as' => 'style',
                    ]
                ],
                'yii\bootstrap4\BootstrapPluginAsset' => [
                    'js' => [
                        YII_ENV_DEV ? 'js/bootstrap.js' : 'js/bootstrap.min.js',
                    ],
                    'jsOptions' => [
                        'defer' => 'defer',
                    ],
                ],
                'yii\web\YiiAsset' => [
                    'js' => [
                        YII_ENV_DEV ? 'yii.js' : '/js/yii.min.js'
                    ],
                    'jsOptions' => [
                        'defer' => 'defer',
                    ],
                 
                ],
                'yii\widgets\ActiveFormAsset' => [
                    'js' => [
                        YII_ENV_DEV ? 'yii.activeForm.js' : '/js/yii.activeForm.min.js'
                    ],
                    'jsOptions' => [
                        'defer' => 'defer',
                    ],
                 
                ],
                'yii\grid\GridViewAsset' => [
                    'js' => [
                        YII_ENV_DEV ? 'yii.gridView.js' : '/js/yii.gridView.min.js'
                    ],
                    'jsOptions' => [
                        'defer' => 'defer',
                    ],
                 
                ],
                'yii\validators\ValidationAsset' => [
                    'js' => [
                        YII_ENV_DEV ? 'yii.validation.js' : '/js/yii.validation.min.js'
                    ],
                    'jsOptions' => [
                        'defer' => 'defer',
                    ],
                 
                ],
                'yii\captcha\CaptchaAsset' => [
                    'js' => [
                        YII_ENV_DEV ? 'yii.captcha.js' : '/js/yii.captcha.min.js'
                    ],
                    'jsOptions' => [
                        'defer' => 'defer',
                    ],
                ],
                'app\assets\AppAsset' => [
                    'jsOptions' => [
                        //'defer' => 'defer',
                    ],
                    'cssOptions' => [
                        'rel' => 'preload',
                        'as' => 'style',
                    ]
                ]
            ],
        ],   
    ],
    'params' => $params,
];

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

return $config;