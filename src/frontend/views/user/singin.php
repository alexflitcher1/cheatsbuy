<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = "Регестрация";
?>

<?php $form = ActiveForm::begin() ?>
<p class="login_login">Регестрация</p>
<p class="login_errors"></p>
<?= $form->field($model, 'username')->label("Логин") ?>
<?= $form->field($model, 'email')->label("Почта") ?>
<?= $form->field($model, 'password_hash')->passwordInput()->label("Пароль") ?>
<div class="form-group">
    <div>
        <?= Html::submitButton('Регистрация', ['class' => 'btn btn-success']) ?>
    </div>
</div>
<?php ActiveForm::end() ?>
<?php
$js = <<<JS
    $('form').on('submit', function(e) {
      e.preventDefault();
    })
    $('form').on('beforeSubmit', function(){
       var data = {
         'User': {
         'username': $('#user-username').val(),
         'email'   : $('#user-email').val(),
         'password_hash': $('#user-password_hash').val(),
       }
       };
        $.ajax({
            url: '/user/singine',
            type: 'POST',
            data: data,
        }).done(function(e) {
          $('.login_errors').html(e);
        })
        return false;
    });
JS;

$this->registerJs($js);
?>
