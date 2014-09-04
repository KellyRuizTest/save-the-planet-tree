<?php

Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Sistema Automatizado para la Gestion de la Misión Arbol',
	//'charset' => 1?'ISO-8859-1':'UTF-8',
	'language' => 'es',
	'theme'=>0?'shadow_dancer':'twitter_fluid',

	'import'=>array(
		'application.models.*',
		'application.components.*',
	),
	
	'modules'=>array(
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'generatorPaths' => array('bootstrap.gii',),
			'password'=>'Admin',
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),
		
	'components'=>array(
		
			
		'bootstrap'=>array( 'class'=>'ext.bootstrap.components.Bootstrap', ),
				
	/*			
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'error' => 'site/error',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',	
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>/<id:\w+==>'=>'<controller>/<action>',		
			),
		),*/

		'db'=>array(
			//'class'=>'CDbConnection',
			'connectionString' => 'mysql:host=localhost;dbname=arbol',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
                    'charset' => 'utf8'
		),
	
		'errorHandler'=>array(
			'errorAction'=>'site/error',
		),
		
	
	),

	'params'=>array(
		'adminEmail'=>'kelly.ruizh@gmail.com',
	),
	
);
