<?php
namespace frontend\controllers;

use Yii;
use yii\web\Cookie;
use yii\web\Controller;
use common\models\User;

class UserController extends Controller
{

    public $enableCsrfValidation = false;

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionPage()
    {
    $form_model = new User();
        return $this->render('page', ['model' => Yii::$app->request->post()]);

}

    public function actionIndex()
    {
        return $this->render('index', ['model' => $model]);
    }

    public function actionLogin()
    {
        $model = new User();
        return $this->render('login', ['model' => $model]);
    }

    public function actionLogine()
    {
      $this->layout = "index2";
      $model = new User();
      if ($model->load(Yii::$app->request->post())) {
          $post = Yii::$app->request->post();
          $model->readyData();
          $err = $model->checkLogin($post['User']['username'],
          $post['User']['password_hash']);
          $error = $err ? "Успех" : "Неправильный логин или пароль";

          if ($err) {
              $cookies = Yii::$app->response->cookies;
              $cookies->add(new Cookie([
                'name' => 'username',
                'value' => $post['User']['username'],
                'expire' => time()+100000
              ]));
              $cookies->add(new Cookie([
                'name' => 'auth',
                'value' => true,
                'expire' => time()+100000
              ]));
              Yii::$app->response->redirect("/cheats/index");
              return $this->render('logine', ['model' => $model, 'err' => $error]);
          }
          return $this->render('logine', ['model' => $model, 'err' => $error]);
      }
    }

    public function actionSingin()
    {
        $model = new User();
        return $this->render('singin', ['model' => $model]);
    }

    public function actionSingine()
    {
      $this->layout = "index2";
      $model = new User();
      if ($model->load(Yii::$app->request->post()) && $model->validate()) {
          $time_reg = date("Y-m-d H:i:s", time());
          $model->time_reg = $time_reg;
          $model->readyData();
          $err = $model->regUser();

          if (empty($err)) {
            $cookies = Yii::$app->response->cookies;
            $cookies->add(new Cookie([
              'name' => 'username',
              'value' => $model->username,
              'expire' => time()+100000
            ]));
            $cookies->add(new Cookie([
              'name' => 'auth',
              'value' => true,
              'expire' => time()+100000
            ]));
            Yii::$app->response->redirect("/cheats/index");
          }

          return $this->render('singine', ['model' => $model, 'err' => $err]);

      }
      return $this->render('singine', ['model' => $model]);
    }

    public function actionCabinet()
    {
        $model = new User();
        $cookies = Yii::$app->request->cookies;
        $model->username = $cookies->getValue("username");
        $model->readyData();
        return $this->render("cabinet", ['model' => $model]);
    }

    public function actionChangee($newemail)
    {
        $model = new User();
        $cookies = Yii::$app->request->cookies;
        $model->username = $cookies->getValue("username");
        $res = $model->changeEmail($newemail);
        $res = $res ? "Успех!" : "Проблема!";
        return $res;
    }

    public function actionExit()
    {
        $model = new User();
        $model->exit();
        return $this->render('exit');
    }
}
