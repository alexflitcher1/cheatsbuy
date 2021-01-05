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
            $this->image->saveAs("user_gallary/users_avatar/{$this->image->baseName}.{$this->image->extension}");
        }else{
            return false;
        }
        return "{$this->image->baseName}.{$this->image->extension}";
    }

}
