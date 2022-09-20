## Installation
```
git clone https://github.com/rightWayCoding/knowbase

cd knowbase/

composer install

yarn

cp .env.example .env

php artisan key:generate
```
В .env файле на 11 строке (DB_CONNECTION) изменить базу данных с mysql на sqlite

`php artisan migrate`
