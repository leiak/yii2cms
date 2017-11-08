<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
            //'layout' => 'left-menu', // avaliable value 'left-menu', 'right-menu' and 'top-menu'

            // 'controllerMap' => [
            //      'assignment' => [
            //         'class' => 'mdm\admin\controllers\AssignmentController',
            //         'userClassName' => 'app\models\User',
            //         'idField' => 'user_id'
            //     ]
            // ],
            'menus' => [
                'assignment' => [
                    'label' => 'Grand Access' // change label
                ],
                'route' => null, // disable menu
            ],
           
        ]
       
    ],
    //'modules' => [],
    'components' => [
         'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
             //"defaultRoles" => ["guest"],
        ],
        'assetManager' => [
           'bundles' => [
                    'dmstr\web\AdminLteAsset' => [
                        'skin' => 'skin-blue',
                    ],
                ],
            ],
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
        // "urlManager" => [  //还需要htaccess配合
        //     "enablePrettyUrl" => true,
        //     "enableStrictParsing" => false,
        //     "showScriptName" => false,
        //     "suffix" => "",
        //     "rules" => [        
        //         "<controller:\w+>/<id:\d+>"=>"<controller>/view",  
        //         "<controller:\w+>/<action:\w+>"=>"<controller>/<action>"    
        //     ],
        // ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*', //一般不禁用无法登出
            //'admin/*',
            //'gii/*',
            //'debug/*',
            //'news/*',
            //'some-controller/some-action',
            // The actions listed here will be allowed to everyone including guests.
            // So, 'admin/*' should not appear here in the production, of course.
            // But in the earlier stages of your development, you may probably want to
            // add a lot of actions here until you finally completed setting up rbac,
            // otherwise you may not even take a first step.
        ]
    ],
    'params' => $params,
];
