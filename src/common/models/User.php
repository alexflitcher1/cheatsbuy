<?php
namespace common\models;

use Yii;
use yii\base\Model;
use frontend\models\Users;
use frontend\models\Rates;
use frontend\models\Salles;

class User extends Model
{
    public $id, $username, $password_hash, $email, $time_reg, $img, $money;
    public $referer_id = 0;

    public function readyData()
    {
      if (!empty(Users::find()->where(['username' => $this->username])->one())) {
          $data = Users::find()->where(['username' => $this->username])->one();
          $this->id = $data['id'];
          $this->username = $data['username'];
          $this->password_hash = $data['password_hash'];
          $this->email = $data['email'];
          $this->time_reg = $data['time_reg'];
          $this->referer_id = $data['referer_id'];
          $this->img = $data['img'];
          $this->money = $data['money'];

          return true;
      }

      $this->password_hash = password_hash($this->password_hash, PASSWORD_DEFAULT);
    }

    public function display_data()
    {
        $data = [
          'id' => $this->id,
          'username' => $this->username,
          'password_hash' => $this->password_hash,
          'email' => $this->email,
          'time_reg' => $this->time_reg,
          'referer_id' => $this->referer_id,
          'img' => $this->img,
          'money' => $this->money,
        ];

        return $data;
    }

    public function regUser()
    {
        $username = $this->username;
        $email = $this->email;
        $err = [];
        if (!empty(Users::find()->where(['username' => $username])->one()))
            $err[] = "Пользователь существует";

        if (!empty(Users::find()->where(['email' => $email])->one()))
            $err[] = "Почта уже зарегестрирована";

        if (empty($err)) {
            $pdo = new Users();
            $pdo->username = $this->username;
            $pdo->password_hash = $this->password_hash;
            $pdo->email = $this->email;
            $pdo->time_reg = $this->time_reg;
            $pdo->referer_id = $this->referer_id;
            $pdo->money = 0.0;
            $pdo->img = "default.png";
            $pdo->save();

            return [];
        }
        return $err;
    }

    public function getAll()
    {
        return Users::find()->all();
    }

    public function getId(int $id)
    {
        return Users::findOne($id);
    }

    public function getByUsername($username)
    {
        return Users::findOne(['username' => $username]);
    }

    public function checkLogin($login, $password)
    {
        if (!empty(Users::find()->where(['username' => $login])->one())) {
            $password_user =
            Users::find()->where(['username' => $login])->one()->password_hash;
            //return $password_user;
            if (password_verify($password, $password_user)) {
                return true;
            }
        }
        return false;
    }

    public function changeEmail($newemail)
    {
        $user = Users::find()->where(['username' => $this->username])->one();
        if (!empty(Users::find()->where(['email' => $newemail])->one()))
            return false;
        $user->email = $newemail;
        $user->save();
        return true;
    }

    public function changeImg($path)
    {
        $user = Users::find()->where(['username' => $this->username])->one();
        $user->img = $path;
        if ($user->save())
            return true;
        return false;
    }

    public function changePassword($password)
    {
        $cookies = Yii::$app->request->cookies;
        $login = $cookies->getValue("username");
        $user = Users::find()->where(['username' => $login])->one();
        $user->password_hash =
        password_hash($password, PASSWORD_DEFAULT);
        if ($user->save())
            return true;
        return false;
    }

    public function exit()
    {
        $cookies = Yii::$app->response->cookies;
        $cookies->remove('auth');
        $cookies->remove('username');
    }

    public function deleteAccount()
    {
        $error = 0;
        $user = Users::find()->where(['username' => $this->username])->one();
        if ($user) {
            $hacks = Salles::find()->
            where(['author_id' => $user->id])->all();
            $rates = Rates::find()->
            where(['userid' => $user->id])->all();
            for ($i = 0; $i < count($hacks); $i++)
                $hacks[$i]->delete();
            for($i = 0; $i < count($rates); $i++)
                $rates[$i]->delete();
            $user->delete();
            $this->exit();
        } else
              $error = 1;
        return $error;
    }

    public function isUserExists($id)
    {
         return !empty(Users::find()->where(['id' => $id])->one());
    }

    public function rules() {
            return [
                [['username', 'password_hash', 'email'], 'required', 'message' => 'Заполните поле'],
                [['email'], 'email', 'message' => 'Введите email адрес'],
            ];
    }
}
