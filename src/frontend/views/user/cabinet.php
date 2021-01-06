<?php
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\widgets\ActiveForm;

    $id = $model->id;
    $username = $model->username;
    $passhash = $model->password_hash;
    $email = $model->email;
    $time_reg = $model->time_reg;
    $img = $model->img;
    $nowdate = date("Y-m-d H:i:s", time());
    $this->title = "Кабинет";
?>
<div class="cabinet">

<div class="cab-userdata">
    <div class="ud-img">
      <img src="<?=Url::to(["/user_gallary/users_avatar/{$img}"])?>"
      alt="Profile photo">
      <div class="ud-show-hide">
        <a href="#">Поменять аватар &#9660;</a>
      </div>
      <div class="ud-change" style="display: none;">
        <?php $form = ActiveForm::begin() ?>
          <?= $form->field($modelImage, 'image')->fileInput() ?>
          <button class="ud-image-load">Загрузить</button>
        <?php ActiveForm::end() ?>
      </div>
    </div>
    <div class="ud-id">
      USERID <b><?=$id?></b>
    </div>
    <div class="ud-username">
      Логин <b><?=$username?></b>
    </div>
    <div class="ud-email">
      Почта <b><?=$email?></b> <a class="ch-data" id="ch-email" href="#openModal">Изменить</a>
    </div>
    <div class="ud-time_reg">
      На сервисе <b><?=floor((strtotime($nowdate) - strtotime($time_reg))/60/60/24)?> дней</b>
    </div>
</div>
<div class="cab-functions">
   <div class="cab-exit">
      <a class="cab-exit-link" href="/user/exit">Выйти</a>
   </div>
</div>
</div>
<?php
  $js = <<<JS
    $('.ud-show-hide').click(function(){
        if ($('.ud-change').attr("style") == "display: none;")
          $('.ud-show-hide a').html("Скрыть &#9650;");
        else
          $('.ud-show-hide a').html("Поменять аватар &#9660;");
        $('.ud-change').slideToggle(300);
        return false;
      });
      $('.ch-data').click(function() {
        if (this.id == "ch-email") {
          $('.modal-title').html("EMAIL CHANGE");
          $('.input-will-change').html("<form class='change-email-form'><input type='email' class='newemail_enter' placeholder='Введите новый адрес электронной почты'><input type='submit' class='newemail_submit' value='Изменить'></form>");
          $('.change-email-form').submit(function(e) {
            e.preventDefault();
            var newemail = $('.newemail_enter').val();
            $.ajax({
              url: '/user/changee',
              method: 'GET',
              data: {
                newemail: newemail,
              },
            }).done(function(data) {
              var data = data;
              $('.result-do').html(data);
            });
          });
        }
      });
JS;
  $this->registerJs($js);

?>
