<?php
namespace frontend\controllers;

use Yii;
use yii\web\Cookie;
use yii\web\Controller;
use common\models\User;
use common\models\UploadImage;
use yii\web\UploadedFile;
use yii\helpers\Url;

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
        $name_img = "";
        $model2 = new UploadImage();
        if(Yii::$app->request->isPost){
            $model2->image = UploadedFile::getInstance($model2, 'image');
            if($name_img = $model2->upload()) {
              $res = $model->changeImg($name_img);
              Yii::$app->response->redirect(Url::to('/user/cabinet'));
            }

            return $this->render("cabinet", ['model' => $model,
            'modelImage' => $model2]);
        }
        return $this->render("cabinet", ['model' => $model,
        'modelImage' => $model2]);
    }

    public function actionChangee($newemail)
    {
        $model = new User();
        $cookies = Yii::$app->request->cookies;
        $model->username = $cookies->getValue("username");
        $res = $model->changeEmail($newemail);
        $res = $res ? "Почта успешно изменена!" : "Данная почта уже занята!";
        return $res;
    }

    public function actionExit()
    {
        $model = new User();
        $model->exit();
        return $this->render('exit');
    }

    public function actionShow($id = 0)
    {
        $model = new User();
        $code =
        $model->isUserExists($id) ?
        $model->getId($id) : "Пользователя несуществует";
        return $this->render('show', ['id' => $id,
        'status' => $code]);
    }

    public function actionUpload(){
        $model = new UploadImage();
        if(Yii::$app->request->isPost){
            $model->image = UploadedFile::getInstance($model, 'image');
            $model->upload();
            return;
        }
        return $this->render('upload', ['model' => $model]);
    }
}
