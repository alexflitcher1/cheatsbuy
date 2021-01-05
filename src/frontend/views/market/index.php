<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
$this->title = "Маркет";
?>
<div class="market-index">
    <div class="market-title">
        МАРКЕТ
    </div>
    <div class="market-menu">

    </div>
    <div class="market-sell">
       <?php foreach ($res as $key => $value): ?>
         <a class="market-link" href="/market/hack?id=<?=$value['id']?>">
            <div class="market-position">
              <div class="market-prepos">

              <div class="market-upper">
                <div class="market-name">
                  <?=$value['label']?>
                </div>
                <div class="market-price">
                  <?=$value['price']?>р.
                </div>
              </div>
              <div class="market-img">
                <img src="<?=Url::to(["/user_gallary/{$value['img']}"])?>"
                alt="Hack image">
              </div>
              <div class="market-desc">
              <?=$value['descr']?>
              </div>
            </div>
          </div>
        </a>
       <?php endforeach; ?>
    </div>
    <p class="market-pagination"><?= LinkPager::widget(['pagination' => $pagination]) ?></p>
</div>
