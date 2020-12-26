<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<?php $form = ActiveForm::begin() ?>
<p class="login_login">Вход</p>
<p class="login_errors"></p>
<?= $form->field($model, 'username')->label("Логин") ?>
<?= $form->field($model, 'password_hash')->passwordInput()->label("Пароль") ?>
<div class="form-group">
    <div>
        <?= Html::submitButton('Войти', ['class' => 'btn btn-success']) ?>
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
         'password_hash': $('#user-password_hash').val(),
       }
       };
        $.ajax({
            url: '/user/logine',
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
