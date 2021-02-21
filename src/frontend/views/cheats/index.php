<?php
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = "Главная";
?>

<div class="sections-main">
<div class="main-section">
  <div class="content-main">
  <div class="title-main">
    Lorem Ipsum
  </div>
  <div class="text-main">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
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
	   Lorem Ipsum
	 </div>
	 <div class="text-second">
	   Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	 </div>
	    <div class="img-second-div">
    <img src="../img/magicheskie-gory.jpg" alt="Second photo" class="img-second">
  </div>
  <div class="columns-second">
    <div class="first-column-second section">
	  <div class="title-first-column title">
	     Lorem
	  </div>
	  <div class="text-first-column text">
		 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	  </div>
	</div>
    <div class="second-column-second section">
	  <div class="title-second-column title">
	     Lorem
	  </div>
	  <div class="text-second-column text">
		  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	  </div>
	</div>
    <div class="third-column-second section">
	  <div class="third-first-column title">
	     Lorem
	  </div>
	  <div class="text-third-column text">
		 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
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
     Lorem
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
       Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
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
         Lorem
       </div>
       <div class="text first-fourth-text">
         Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
       </div>
     </div>
     <div class="second-fourth-column section">
       <div class="second-fourth-icon icon">
         <img src="../img/closedownload.png" alt="Without updates" class="second-fourth-img">
       </div>
       <div class="title second-fourth-title">
         Lorem
       </div>
       <div class="text second-fourth-text">
         Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
       </div>
     </div>
     <div class="third-fourth-column section">
       <div class="third-fourth-icon icon">
         <img src="../img/closeinternet.png" alt="Without updates" class="second-fourth-img">
       </div>
       <div class="title third-fourth-title">
         Lorem
       </div>
       <div class="text third-fourth-text">
         Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
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
       Lorem
     </div>
     <div class="fifth-content-title">
       Lorem Ipsum
     </div>
     <div class="fifth-content-text">
       Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
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
      Lorem
    </div>
    <div class="sixth-desc">
      Lorem Ipsum
    </div>
    <div class="sixth-button">
      <a href="/user/singin" class="sixth-more-link btn-2"><n>Learn more</n></a>
    </div>
  </div>
</div>
</div>
