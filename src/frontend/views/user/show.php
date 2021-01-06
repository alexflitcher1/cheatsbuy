<?php
use yii\helpers\Html;
use yii\helpers\Url;
$id = $status['id'];
$username = $status['username'];
$this->title = $username;
$email = $status['email'];
$img = $status['img'];
$time_reg = $status['time_reg'];
$nowdate = date("Y-m-d H:i:s", time());
?>
<div class="cabinet">
  <div class="cab-userdata">
    <div class="ud-img">
        <img src="<?=Url::to(["/user_gallary/users_avatar/{$img}"])?>">
      </div>
      <div class="id-id">
        USERID <b><?=$id?></b>
      </div>
      <div class="id-username">
        Логин <b><?=$username?></b>
      </div>
      <div class="ud-email">
        Почта <b><?=$email?></b>
      </div>
      <div class="ud-time_reg">
        На сервисе <b><?=floor((strtotime($nowdate) - strtotime($time_reg))/60/60/24)?> дней</b>
      </div>
    </div>
</div>
