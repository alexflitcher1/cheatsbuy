<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii\web\Cookie;
use common\models\User;
use frontend\models\Rates;
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

	public function actionRateadd($name, $message, $stars, $productid)
	{
			$model = new User();
		  $this->layout = 'index2';
			$userid = $model->
			getByUsername(Yii::$app->request->cookies->getValue("username"));
			$uid = $userid->id;
			$rate = new Rates();
			$rate->id = NULL;
			$rate->userid = $uid;
			$rate->product_id = $productid;
			$rate->stars = $stars;
			$rate->message = $message;
			$rate->time_published = date("Y-m-d H:i:s", time());
			$result = $rate->save();
			$result = $result ?
			"Ваш отзыв добавлен" : "Произошла ошибка, попробуйте позже";
	    return $this->render("rateadd", ['rate' => $result]);
	}

	public function actionRatechange($message, $stars, $id)
	{
	    
	}


}
