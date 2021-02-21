<?php
namespace frontend\controllers;

use yii\web\Controller;
use common\models\User;
use frontend\models\Salles;
use frontend\models\Users;
use frontend\models\Category;
use frontend\models\Rates;
use yii\data\Pagination;
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
        $pagination = new Pagination([
          'defaultPageSize' => 20,
          'totalCount' => Salles::find()->count(),
        ]);
        $res = Salles::find()
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->render('index', ['res' => $res,
        'pagination' => $pagination]);
    }

    public function actionHack($id = 0)
    {
        $data = Salles::findOne(['id' => $id]);
        $author = Users::findOne(['id' => $data['author_id']]);
        $category = Category::findOne(['id' => $data['category_id']]);
        $users_rate = [];
        $rates = Rates::findAll(['product_id' => $id]);
        for ($i = 0; $i < count($rates); $i++) {
            $user = Users::findOne(['id' => $rates[$i]['userid']]);
            $users_rate[$i] = $user;
        }
        return $this->render('hack', ['data' => $data, 'author' => $author,
        'category' => $category, 'rates' => $rates,
        'users_rate' => $users_rate]);
    }

    public function getRate($id)
    {
        $this->layout = 'index2';
        $data = Rates::findOne(['id' => $id]);
        return $this->render('getrate', ['data' => $data]);
    }
}
