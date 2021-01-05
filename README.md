# CheatsBuy
**CheatsBuy** - это интернет-магазин попродаже/покупке программ для получения преимущества в видео играх. Удобный интерфейс и покупка в два клика буквально не оставит Вам выбора: Вы точно купите что-нибудь в нашем магазине. Весь ассортимент проходит через VirusTotal, Вы можете не беспокояться за ваши данные. Широкий диапазон игр порадует каждого любителя запретного.

## Доп. Информация
**Версия** v0.1aa
**Файл инициализации** init.php
**Файл MySQL-дампа**  /sql/cheatsdump.sql
Исходники хранятся в директории "/src"

## Инициализация
1. Распаковать папку src
2. Создать в MySQL БД cheats(CREATE DATABASE cheats;)
3. Выгрузить дамп
4. Выполнить следующие команды:
```bash
composer install
php init
cd frontend/web
php -S localhost:8080
```

*Последний команду можно не выполнять, если Вы используете свой веб-сервер*
*В файле frontend/config/db.php установите свои параметры*

## Скриншот
[![Screenshot](https://github.com/alexflitcher1/cheatsbuy/screenshot.png "Screenshot")](http://github.com/alexflitcher1/cheatsbuy/screenshot.png "Screenshot")
