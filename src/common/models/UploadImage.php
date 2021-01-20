<?php

namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadImage extends Model{

    public $image;

    public function rules(){
        return[
            [['image'], 'file', 'extensions' => 'png,jpg,jpeg'],
            [['image'], 'required', 'message' => 'Выберите файл'],
        ];
    }

    public function upload(){
        if($this->validate()){
            $cookies = \Yii::$app->request->cookies;
            $cookies->getValue("username");
            $newImageName =
            time() . "_" . $cookies->getValue("username") . "_" . "avatar";
            $this->image->saveAs("user_gallary/users_avatar/{$newImageName}.{$this->image->extension}");
        }else{
            return false;
        }
        return "{$newImageName}.{$this->image->extension}";
    }

}
