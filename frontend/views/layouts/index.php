<?php

use yii\helpers\Html;
use frontend\assets\CheatsAsset;

$asset = CheatsAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?= Html::csrfMetaTags() ?>
  <link rel="icon" href="<?=$asset->img['favicon']?>" type="image/x-icon">

  <title><?=$this->title?></title>
  <?php $this->head() ?>
</head>
<body>
  <?php $this->beginBody() ?>
	<header class="head">
	  <div class="head-logo"><a href="/cheats/index" class="link-logo-head">Logo</a></div>
	  <div class="head-market"><a href="/shop/index" class="link-market-head">Market</a></div>
	  <?php if (@Yii::$app->request->cookies->getValue("auth")): ?>
	   <div class="head-cabinet"><a href="/user/cabinet" class="link-login-cabinet"><?=Yii::$app->request->cookies->getValue("username")?></a></div>
	  <?php else: ?>
	  <div class="head-login"><a href="/user/login" class="link-login-head">Log In</a></div>
	  <div class="head-singin"><a href="/user/singin" class="link-singin-head">Sing In</a></div>
	  <?php endif; ?>
	</header>
	<main class="content">
	  <?=$content?>
	</main>
  <div class="seven-footer">
     <div class="seven-background-second"><img src="../img/background.jpg" alt="Background" class="seven-background-img-second"></div>
    <div class="seven-section">
    <div class="seven-subscribe">
      <div class="seven-sub-cont">
        <div class="seven-sub-title">
          Subscribe to our newsletter
        </div>
        <div class="seven-sub-desc">
          A weekly of the news, sale on cheatch and updates
        </div>
      </div>
      <div class="seven-sub-form">
        <div class="seven-sub-input">
          <input type="text" name="email" placeholder="You email address">
        </div>
        <div class="seven-sub-button">
          <input type="submit" value="Subscribe">
        </div>
      </div>
    </div>
    <div class="seven-lastfoot">
      <div class="first-section-lastfoot">
        <div class="title">
           Sections
        </div>
        <div class="text">
           <div class="first-text-lastfoot part">
              Lorem
           </div>
           <div class="first-text-lastfoot part">
              Lorem
           </div>
           <div class="first-text-lastfoot part">
              Lorem
           </div>
           <div class="first-text-lastfoot part">
              Lorem
           </div>
           <div class="first-text-lastfoot part">
              Lorem
           </div>
           <div class="first-text-lastfoot part">
              Lorem
           </div>
        </div>
      </div>
      <div class="second-section-lastfoot">
        <div class="title">
           Api
        </div>
        <div class="text">
           <div class="second-text-lastfoot part">
              Lorem
           </div>
           <div class="second-text-lastfoot part">
              Lorem
           </div>
           <div class="second-text-lastfoot part">
              Lorem
           </div>
           <div class="second-text-lastfoot part">
              Lorem
           </div>
           <div class="second-text-lastfoot part">
              Lorem
           </div>
           <div class="second-text-lastfoot part">
              Lorem
           </div>
        </div>
      </div>
      <div class="third-section-lastfoot">
        <div class="title">
           For developers
        </div>
        <div class="text">
           <div class="third-text-lastfoot part">
              Lorem
           </div>
           <div class="third-text-lastfoot part">
              Lorem
           </div>
           <div class="third-text-lastfoot part">
              Lorem
           </div>
           <div class="third-text-lastfoot part">
              Lorem
           </div>
           <div class="third-text-lastfoot part">
              Lorem
           </div>
           <div class="third-text-lastfoot part">
              Lorem
           </div>
        </div>
      </div>
      <div class="fourth-section-lastfoot">
        <div class="title">
           Follow us
        </div>
        <div class="text">
           <div class="fourth-text-lastfoot part">
              Lorem
           </div>
           <div class="fourth-text-lastfoot part">
              Lorem
           </div>
           <div class="fourth-text-lastfoot part">
              Lorem
           </div>
           <div class="fourth-text-lastfoot part">
              Lorem
           </div>
           <div class="fourth-text-lastfoot part">
              Lorem
           </div>
           <div class="fourth-text-lastfoot part">
              Lorem
           </div>
        </div>
      </div>
      <div class="fifth-section-lastfoot">
        <div class="title">
           More
        </div>
        <div class="text">
           <div class="fifth-text-lastfoot part">
              Lorem
           </div>
           <div class="fifth-text-lastfoot part">
              Lorem
           </div>
           <div class="fifth-text-lastfoot part">
              Lorem
           </div>
           <div class="fifth-text-lastfoot part">
              Lorem
           </div>
           <div class="fifth-text-lastfoot part">
              Lorem
           </div>
           <div class="fifth-text-lastfoot part">
              Lorem
           </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
