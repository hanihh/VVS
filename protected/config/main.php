<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Voucher System',
	'theme'=> 'shadow_dancer',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'ext.giix-components.*',
                'application.helpers.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii' => array(
                    'class' => 'system.gii.GiiModule',
                    'password'=>'root',
                    // If removed, Gii defaults to localhost only. Edit carefully to taste.
                    'ipFilters'=>array('127.0.0.1','::1'),
                    'generatorPaths' => array(
                        'ext.giix-core', // giix generators
		),
	),
		
	),

	// application components
	'components'=>array(
                'image'=>array(
                  'class'=>'application.extensions.image.CImageComponent',
                    // GD or ImageMagick
                    'driver'=>'GD',
                    // ImageMagick setup path
                    'params'=>array('directory'=>'/opt/local/bin'),
                ),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
                        'showScriptName'=>false,
		),
		
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
                 */
            
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=voucher_system',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'root',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
                'BENEFICIARIES_IMAGES_PATH' => "images/beneficiaries/images/",
                'BENEFICIARIES_QR_PATH' => "images/beneficiaries/qrcodes/",
                'VOUCHERS_QR_PATH' => "images/vouchers/qrcodes/"
	),
);