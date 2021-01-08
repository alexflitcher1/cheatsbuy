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

	public function actionErrorp($error = 1)
	{
        switch ($error) {
				    case 1: $error = "Страницы не существует"; break;
				    case 2: $error = "БЭНТЛИ, БЕНЗ И БУМЕР, МУТИМ ЭТИ МОЛЛИ"; break;
						case 3:
						    $error
								=
								"Чтобы пользоваться личным кабинетом, нужно зарегистрироваться";
								break;
				}
				return $this->render("rpage", ['error' => $error]);
	}


}
