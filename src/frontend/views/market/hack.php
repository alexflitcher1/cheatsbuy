<?php
use yii\helpers\Html;
use yii\helpers\Url;
$id = $data['id'];
$label = $data['label'];
$describe = $data['desc_full'];
$img = $data['img'];
$author_id = $data['author_id'];
$category_id = $data['category_id'];
$sale = $data['sale'];
$price = $data['price'];
$img_arr = explode(",", $data['img_arr']);
$this->title = $label;
?>
<div class="market-hack">
  <div class="market-hack-title">
    <?=$label?>
  </div>
  <div class="market-hack-uni">
  <div class="market-hack-author">
    Автор <b><a class="market-hack-author-link" href="/user/show?id=<?=$author_id?>"><?=$author['username']?></a></b>
  </div>
  <div class="market-hack-category">
    Категория <b><?=$category['game_name']?></b>
  </div>
  <div class="market-hack-price">
    Цена <b><?=$price?>р.</b>
  </div>
</div>
  <div class="market-hack-img">
    <img src="<?=Url::to(["/user_gallary/$img"])?>" alt="Image hack">
  </div>
  <div class="market-hack-slider-img">
    <div class="container">

      <div class="slider">
        <div class="slider__wrapper">

          <?php for ($i = 0; $i < count($img_arr); $i++): ?>
            <div class="slider__item">
              <div class="slider__content">
                <img class="market-hack-img-slide" src="<?=Url::to(["/user_gallary/$img_arr[$i]"])?>" alt="Hack image">
              </div>
            </div>
          <?php endfor; ?>
        </div>
        <a class="slider__control slider__control_left" href="#" role="button"></a>
        <a class="slider__control slider__control_right" href="#" role="button"></a>
      </div>

    </div>
  </div>
  <div class="market-hack-desc">
    <div class="market-hack-fulldesc">
      Полное описание:
    </div>
    <?=$describe?>
  </div>
  <div class="market-hack-rates">
    <div class="market-rate">
      Отзывы
    </div>
    <div class="all-rates">
      <?php for ($i = 0; $i < count($rates); $i++): ?>
        <div class="rate-block">
          <div class="rate-block-f">
            <div class="rate-avatar">
              <img class="rate-ava" src="<?=Url::to("/user_gallary/users_avatar/{$users_rate[$i]['img']}")?>" alt="Picture">
            </div>
          </div>
          <div class="rate-blocks">
          <div class="rate-block-s">
            <div class="rate-name">
              <?=$users_rate[$i]['username']?>
            </div>
            <div class="rate-time">
              <?=$rates[$i]['time_published']?>
            </div>
            <div class="ch-rate-click rate-time">
              <?php
                if ($users_rate[$i]['username'] ==
                !empty(\Yii::$app->request->cookies->getValue("username"))):
              ?>
                <a href="#openModal" class="ch-rate-a" data-id="<?=$rates[$i]['id']?>">Изменить</a>
              <?php
                endif;
              ?>
            </div>
          </div>
          <div class="rate-block-t">
            <div class="rate-stars">
              <?php for($j = 0; $j < $rates[$i]['stars']; $j++): ?>
                  &#9733;
              <?php endfor; ?>
            </div>
          </div>
         </div>
       </div>
          <div class="rate-message">
            <?=$rates[$i]['message']?>
          </div>
    <?php endfor; ?>
    <?php if (!empty(\Yii::$app->request->cookies->getValue("username"))): ?>
          <div class="market-put-rate">
            <div class="market-made-rate">

            </div>
            <div class="market-title-rate">
              Оставить отзыв
            </div>
            <div class="market-input-rate">
              <form class="market-inp-r">
                <input class="market-inp-name market-inp" type="text" placeholder="Введите ваше имя" required>
                <div class="count-stars" data-count=3>
                  ★★★
                </div>
                <input type="range" min="1" max="5" class="market-inp slider_inp market-inp-range">
                <textarea required class="market-inp-rate market-inp" placeholder="Введите ваш отзыв" rows="8" cols="80"></textarea>
                <input type="submit" class="market-inp" value="Опубликовать">
              </form>
            </div>
          </div>
    <?php else: ?>
          <div class="market-title-rate">
            Чтобы оставить отзыв, сначала
            <a href="<?=Url::to(["/user/singin"])?>">регистрация</a>
            /
            <a href="<?=Url::to(["/user/login"])?>">войдите</a>
          </div>
    <?php endif; ?>
        </div>
      </div>
        <?php
        $js = <<<JS
        $('.ch-rate-a').click(function(e) {
          $('.modal-title').html("Изменить отзыв");
          $('.input-will-change').html("<form class='change-your-comment'></form>");
        });
        $('.market-inp-range').mousemove(function(e) {
          var a = "";
          for(i = 0; i < $('.market-inp-range').val(); i++) a += "★";
          $('.count-stars').text(a);
          a = "";
        });
        $('.market-inp-r').submit(function(e) {
          e.preventDefault();
          var name = $('.market-inp-name').val();
          var rate = $('.market-inp-rate').val();
          var productId = $id;
          var stars = $('.market-inp-range').val();
          $.ajax({
              url: '/cheats/rateadd',
              method: 'GET',
              data: {
                name: name,
                message: rate,
                stars: stars,
                productid: productId,
              },
          }).done(function(data) {
            $('.market-made-rate').html(data);
            $('.market-inp-name').val("");
            $('.market-inp-rate').val("");
            setTimeout("document.location = document.location", 1000);
          });
        });
        var multiItemSlider = (function () {

           function _isElementVisible(element) {
             var rect = element.getBoundingClientRect(),
               vWidth = window.innerWidth || doc.documentElement.clientWidth,
               vHeight = window.innerHeight || doc.documentElement.clientHeight,
               elemFromPoint = function (x, y) { return document.elementFromPoint(x, y) };
             if (rect.right < 0 || rect.bottom < 0
               || rect.left > vWidth || rect.top > vHeight)
               return false;
             return (
               element.contains(elemFromPoint(rect.left, rect.top))
               || element.contains(elemFromPoint(rect.right, rect.top))
               || element.contains(elemFromPoint(rect.right, rect.bottom))
               || element.contains(elemFromPoint(rect.left, rect.bottom))
             );
           }

           return function (selector, config) {
             var
               _mainElement = document.querySelector(selector),
               _sliderWrapper = _mainElement.querySelector('.slider__wrapper'),
               _sliderItems = _mainElement.querySelectorAll('.slider__item'),
               _sliderControls = _mainElement.querySelectorAll('.slider__control'),
               _sliderControlLeft = _mainElement.querySelector('.slider__control_left'),
               _sliderControlRight = _mainElement.querySelector('.slider__control_right'),
               _wrapperWidth = parseFloat(getComputedStyle(_sliderWrapper).width),
               _itemWidth = parseFloat(getComputedStyle(_sliderItems[0]).width),
               _html = _mainElement.innerHTML,
               _indexIndicator = 0,
               _maxIndexIndicator = _sliderItems.length - 1,
               _indicatorItems,
               _positionLeftItem = 0,
               _transform = 0,
               _step = _itemWidth / _wrapperWidth * 100,
               _items = [],
               _interval = 0,
               _states = [
                 { active: false, minWidth: 0, count: 1 },
                 { active: false, minWidth: 576, count: 2 },
                 { active: false, minWidth: 992, count: 3 },
                 { active: false, minWidth: 1200, count: 4 },
               ],
               _config = {
                 isCycling: false,
                 direction: 'right',
                 interval: 5000,
                 pause: true
               };

             for (var key in config) {
               if (key in _config) {
                 _config[key] = config[key];
               }
             }

             _sliderItems.forEach(function (item, index) {
               _items.push({ item: item, position: index, transform: 0 });
             });

             var _setActive = function () {
               var _index = 0;
               var width = parseFloat(document.body.clientWidth);
               _states.forEach(function (item, index, arr) {
                 _states[index].active = false;
                 if (width >= _states[index].minWidth)
                   _index = index;
               });
               _states[_index].active = true;
             }

             var _getActive = function () {
               var _index;
               _states.forEach(function (item, index, arr) {
                 if (_states[index].active) {
                   _index = index;
                 }
               });
               return _index;
             }

             var position = {
               getItemMin: function () {
                 var indexItem = 0;
                 _items.forEach(function (item, index) {
                   if (item.position < _items[indexItem].position) {
                     indexItem = index;
                   }
                 });
                 return indexItem;
               },
               getItemMax: function () {
                 var indexItem = 0;
                 _items.forEach(function (item, index) {
                   if (item.position > _items[indexItem].position) {
                     indexItem = index;
                   }
                 });
                 return indexItem;
               },
               getMin: function () {
                 return _items[position.getItemMin()].position;
               },
               getMax: function () {
                 return _items[position.getItemMax()].position;
               }
             }

             var _transformItem = function (direction) {
               var nextItem, currentIndicator = _indexIndicator;
               if (!_isElementVisible(_mainElement)) {
                 return;
               }
               if (direction === 'right') {
                 _positionLeftItem++;
                 if ((_positionLeftItem + _wrapperWidth / _itemWidth - 1) > position.getMax()) {
                   nextItem = position.getItemMin();
                   _items[nextItem].position = position.getMax() + 1;
                   _items[nextItem].transform += _items.length * 100;
                   _items[nextItem].item.style.transform = 'translateX(' + _items[nextItem].transform + '%)';
                 }
                 _transform -= _step;
                 _indexIndicator = _indexIndicator + 1;
                 if (_indexIndicator > _maxIndexIndicator) {
                   _indexIndicator = 0;
                 }
               }
               if (direction === 'left') {
                 _positionLeftItem--;
                 if (_positionLeftItem < position.getMin()) {
                   nextItem = position.getItemMax();
                   _items[nextItem].position = position.getMin() - 1;
                   _items[nextItem].transform -= _items.length * 100;
                   _items[nextItem].item.style.transform = 'translateX(' + _items[nextItem].transform + '%)';
                 }
                 _transform += _step;
                 _indexIndicator = _indexIndicator - 1;
                 if (_indexIndicator < 0) {
                   _indexIndicator = _maxIndexIndicator;
                 }
               }
               _sliderWrapper.style.transform = 'translateX(' + _transform + '%)';
               _indicatorItems[currentIndicator].classList.remove('active');
               _indicatorItems[_indexIndicator].classList.add('active');
             }

             var _slideTo = function (to) {
               var i = 0, direction = (to > _indexIndicator) ? 'right' : 'left';
               while (to !== _indexIndicator && i <= _maxIndexIndicator) {
                 _transformItem(direction);
                 i++;
               }
             }

             var _cycle = function (direction) {
               if (!_config.isCycling) {
                 return;
               }
               _interval = setInterval(function () {
                 _transformItem(direction);
               }, _config.interval);
             }

             var _controlClick = function (e) {
               if (e.target.classList.contains('slider__control')) {
                 e.preventDefault();
                 var direction = e.target.classList.contains('slider__control_right') ? 'right' : 'left';
                 _transformItem(direction);
                 clearInterval(_interval);
                 _cycle(_config.direction);
               }
               if (e.target.getAttribute('data-slide-to')) {
                 e.preventDefault();
                 _slideTo(parseInt(e.target.getAttribute('data-slide-to')));
                 clearInterval(_interval);
                 _cycle(_config.direction);
               }
             };

             var _handleVisibilityChange = function () {
               if (document.visibilityState === "hidden") {
                 clearInterval(_interval);
               } else {
                 clearInterval(_interval);
                 _cycle(_config.direction);
               }
             }

             var _refresh = function () {
               clearInterval(_interval);
               _mainElement.innerHTML = _html;
               _sliderWrapper = _mainElement.querySelector('.slider__wrapper');
               _sliderItems = _mainElement.querySelectorAll('.slider__item');
               _sliderControls = _mainElement.querySelectorAll('.slider__control');
               _sliderControlLeft = _mainElement.querySelector('.slider__control_left');
               _sliderControlRight = _mainElement.querySelector('.slider__control_right');
               _wrapperWidth = parseFloat(getComputedStyle(_sliderWrapper).width);
               _itemWidth = parseFloat(getComputedStyle(_sliderItems[0]).width);
               _positionLeftItem = 0;
               _transform = 0;
               _indexIndicator = 0;
               _maxIndexIndicator = _sliderItems.length - 1;
               _step = _itemWidth / _wrapperWidth * 100;
               _items = [];
               _sliderItems.forEach(function (item, index) {
                 _items.push({ item: item, position: index, transform: 0 });
               });
               _addIndicators();
             }

             var _setUpListeners = function () {
               _mainElement.addEventListener('click', _controlClick);
               if (_config.pause && _config.isCycling) {
                 _mainElement.addEventListener('mouseenter', function () {
                   clearInterval(_interval);
                 });
                 _mainElement.addEventListener('mouseleave', function () {
                   clearInterval(_interval);
                   _cycle(_config.direction);
                 });
               }

               document.addEventListener('visibilitychange', _handleVisibilityChange, false);
               window.addEventListener('resize', function () {
                 var
                   _index = 0,
                   width = parseFloat(document.body.clientWidth);
                 _states.forEach(function (item, index, arr) {
                   if (width >= _states[index].minWidth)
                     _index = index;
                 });
                 if (_index !== _getActive()) {
                   _setActive();
                   _refresh();
                 }
               });
             }

             var _addIndicators = function () {
               var sliderIndicators = document.createElement('ol');
               sliderIndicators.classList.add('slider__indicators');
               for (var i = 0; i < _sliderItems.length; i++) {
                 var sliderIndicatorsItem = document.createElement('li');
                 if (i === 0) {
                   sliderIndicatorsItem.classList.add('active');
                 }
                 sliderIndicatorsItem.setAttribute("data-slide-to", i);
                 sliderIndicators.appendChild(sliderIndicatorsItem);
               }
               _mainElement.appendChild(sliderIndicators);
               _indicatorItems = _mainElement.querySelectorAll('.slider__indicators > li')
             }

             // добавляем индикаторы
             _addIndicators();
             // инициализация
             _setUpListeners();

             if (document.visibilityState === "visible") {
               _cycle(_config.direction);
             }
             _setActive();

             return {
               right: function () {
                 _transformItem('right');
               },
               left: function () {
                 _transformItem('left');
               },
               stop: function () {
                 _config.isCycling = false;
                 clearInterval(_interval);
               },
               cycle: function () {
                 _config.isCycling = true;
                 clearInterval(_interval);
                 _cycle();
               }
             }

           }
         }());

         var slider = multiItemSlider('.slider', {
           isCycling: true
         });

JS;
          $this->registerJs($js);
         ?>
</div>
