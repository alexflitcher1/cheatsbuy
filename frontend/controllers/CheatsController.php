<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii\web\Cookie;
use Yii;

class CheatsController extends Controller 
{
	public function actions() 
	{
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
		];
	}
	
	public function actionIndex() 
	{
		$this->layout = "index";
		$this->view->registerMetaTag(
            ['name' => 'description', 'content' => 'Краткое описание страницы']
        );
		return $this->render('index');
	}
	
	
}