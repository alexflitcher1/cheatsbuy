<?php
namespace frontend\controllers;

use yii\web\Controller;
use common\models\User;
use Yii;

class MarketController extends Controller
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
        $user = new User(['user_data' => [
             'username' => 'ddf',
             'email' => 'qwerty@gmail.ru',
          ],
          'reg' => true]);
        return $this->render('index', ['model' => $user->regUser()]);
    }
}
