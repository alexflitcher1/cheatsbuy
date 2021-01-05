<?php
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = "Главная";
?>

<div class="sections-main">
<div class="main-section">
  <div class="content-main">
  <div class="title-main">
    Немного о нас
  </div>
  <div class="text-main">
    Мы, группа разработчиков читов, создали удобный сайт для
    продажи/приобретения софта, сделали это на совершенно новом уровне.
    Два клика и готово!
  </div>
  <div class="buttons-main">
    <div class="button-main-join">
	  <a class="button-link-join btn-2" href="/user/singin">Зарегистрироваться</a>
    </div>
    <div class="button-main-buy">
	  <a class="button-link-buy btn-2" href="/market/index">Магазин</a>
    </div>
  </div>
  </div>
  <div class="img-main-div">
    <img src="../img/main-gif.gif" alt="Main gif" class="img-main">
  </div>
</div>

<div class="for-background-second">
	<div class="background-second"><img src="../img/background.jpg" alt="Background" class="background-img-second"></div>
<div class="main-section-second">
  <div class="content-second">
     <div class="title-second">
	   Для начала, раслабьтесь
	 </div>
	 <div class="text-second">
	   Наш сервис предлагает множество продуктов, от самых простых, до тех,
     которые не находят даже самые лучшие античиты, огромный функционал
     софта не может не радовать.
	 </div>
	    <div class="img-second-div">
    <img src="../img/magicheskie-gory.jpg" alt="Second photo" class="img-second">
  </div>
  <div class="columns-second">
    <div class="first-column-second section">
	  <div class="title-first-column title">
	     Удобный интерфейс
	  </div>
	  <div class="text-first-column text">
		 Наши дизайнеры старались над простотой и понятностью интерфейса магазина,
     вы можете это проверить, перейдя по ссылке ниже.
	  </div>
	</div>
    <div class="second-column-second section">
	  <div class="title-second-column title">
	     Лёгкая покупка
	  </div>
	  <div class="text-second-column text">
		  От вас не требуется никаких действий, кроме как, открыть страницу магазина,
      подобрать нужный чит, выбрать необходимый срок использования, оплатить товар.
      Далее, вы получите на почту письмо со всеми необходимыми данными.
	  </div>
	</div>
    <div class="third-column-second section">
	  <div class="third-first-column title">
	     Никаких мошенников!
	  </div>
	  <div class="text-third-column text">
		 Наша система проверяет программу на наличие вирусов и не пропускает её
     на страницы магазина. Вы можете поделиться своим опытом использования
     чита в отзыве, софт с плохим рейтингом удаляются с прилавков в течении 14
     дней.
	  </div>
	</div>
  </div>
  <div class="market-second">
    <a href="/market/index" class="market-second-link btn-2">Перейти в магазин &#8594;</a>
  </div>
  </div>
  </div>
 </div>

 <div class="third-section">
   <div class="content-third">
   <div class="method_pay-third">
     Вы можете оплачивать товары разными способами
   </div>
   <div class="method-icons-third">
     <img src="../img/mastercard-icon.png" alt="Marstercard" class="mastercard icon-pay-third">
	 <img src="../img/webmoney-icon.png" alt="Webmoney" class="webmoney icon-pay-third">
	 <img src="../img/visa-icon.png" alt="Visa" class="visa icon-pay-third">
	 <img src="../img/bitcoin-pay.png" alt="Bitcoin" class="bitcoin icon-pay-third"><span class="secret-third"><a href="#openModal">*</a></span>
    <?php
      $url = Url::to(['/user_gallary/lawbitcoin.png']);
      $js = <<<JS
      $('.modal-title').html("Законопроект № 419059-7 О цифровых финансовых активах, цифровой валюте и о внесении изменений в отдельные законодательные акты Российской Федерации");
      $('.input-will-change').html("<img src='$url'>");
JS;
    $this->registerJS($js);
    ?>
	 <img src="../img/paypal-icon.png" alt="Paypay" class="paypal icon-pay-third">
	 <img src="../img/googlepay-icon.png" alt="Google Pay" class="googlepay icon-pay-third">
   </div>
  </div>
 </div>
 <div class="fourth-section">
   <div class="fourth-content">
     <div class="pwa-fourth-little">
       PWA
     </div>
     <div class="pwa-fourth-title">
       Progressive Web Applications
     </div>
     <div class="pwa-fourth-text">
       PWA или Progressive Web Application – технология, которая позволяет
       клиентам установить ваш сайт на смартфон как приложение. На русский язык
       переводиться как «прогрессивное веб-приложение».

       Теперь не нужно разрабатывать отдельно сайт, приложение под iOS и приложение под
       Android. Достаточно иметь и поддерживать только сайт.

       Приложения на базе PWA мы используем чаще, чем кажется на первый взгляд.
     </div>
     <div class="pwa-fourth-buttons">
       <a href="https://ru.wikipedia.org/wiki/%D0%9F%D1%80%D0%BE%D0%B3%D1%80%D0%B5%D1%81%D1%81%D0%B8%D0%B2%D0%BD%D0%BE%D0%B5_%D0%B2%D0%B5%D0%B1-%D0%BF%D1%80%D0%B8%D0%BB%D0%BE%D0%B6%D0%B5%D0%BD%D0%B8%D0%B5" class="fourth-more-link btn-2">Подробнее</a>
     </div>
   </div>
   <div class="fourth-image">
     <div class="fourth-image-cont">
       <img src="../img/what-is-pwa-img.png" alt="pwa image" class="pwa-image-img">
     </div>
   </div>
   <div class="fourth-columns">
     <div class="first-fourth-column section">
       <div class="first-fourth-icon icon">
        <img src="../img/closeupdate.png" alt="Without updates" class="second-fourth-img">
       </div>
       <div class="title first-fourth-title">
         Никаких загрузок!
       </div>
       <div class="text first-fourth-text">
         Вам не потребуется ждать загрузки страницы, она будет загружена по умолчанию.
       </div>
     </div>
     <div class="second-fourth-column section">
       <div class="second-fourth-icon icon">
         <img src="../img/closedownload.png" alt="Without updates" class="second-fourth-img">
       </div>
       <div class="title second-fourth-title">
         Никаких обновлений!
       </div>
       <div class="text second-fourth-text">
         Вам не требуется обновлять приложение, оно обновится само!
       </div>
     </div>
     <div class="third-fourth-column section">
       <div class="third-fourth-icon icon">
         <img src="../img/closeinternet.png" alt="Without updates" class="second-fourth-img">
       </div>
       <div class="title third-fourth-title">
         Никакого интернета!
       </div>
       <div class="text third-fourth-text">
         Чтобы пользоваться нашим приложением вам ненужен интернет! Если надо, что-нибудь
         купить, просто нажмите кнопку "Купить" и при появлении интернета он оплатится сам.
       </div>
     </div>
   </div>
 </div>
 <div class="fifth-for-background-second">
 	<div class="fifth-background-second"><img src="../img/background.jpg" alt="Background" class="fifth-background-img-second"></div>
 <div class="fifth-section">
   <div class="fifth-image">
     <img src="../img/lowpricingimg.png" alt="Low price" class="fifth-lowprice-img">
   </div>
   <div class="fifth-content">
     <div class="fifth-content-little">
       Цены
     </div>
     <div class="fifth-content-title">
       Сверх низкие цены на весь ассортимент
     </div>
     <div class="fifth-content-text">
       Мы - единственные кто имеет самые низкие цены на рынке. У нас всегда
       высокие скидки.
     </div>
     <div class="fifth-content-button">
       <a href="/market/index" class="fifth-more-link btn-2">Подробнее</a>
     </div>
   </div>
 </div>
</div>
<div class="sixth-section">
  <div class="sixth-content">
    <div class="sixth-title">
      Присоединяйтесь!
    </div>
    <div class="sixth-desc">
      Вы можете творить всё, что хотите!
    </div>
    <div class="sixth-button">
      <a href="/user/singin" class="sixth-more-link btn-2"><n>Learn more</n></a>
    </div>
  </div>
</div>
</div>
