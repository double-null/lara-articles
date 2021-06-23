# Articles Listing

### Requirements
 - PHP >= 7.4 
 - PDO

### Установка

1. Клонируйте данный репозиторий.

2. Установите зависимости композера:
```sh
$ composer install
```

3. Скопируйте файл .env.example в .env и внесите в него соответствующие настройки.

4. Сгенерируйте ключ приложения:
```sh
$ php artisan key:generate
```
 
5. Запустите выполнение миграций: 
```sh
$ php artisan migrate
```

6. Запустите выполнение сидеров:
```sh
$ php artisan db:seed
```

7. Установите зависимости npm:
```sh
$ npm install
```

8. Соберите frontend приложения: 
```sh
$ npm run prod
```

9. Для тестирования функционала с высоконагруженными комментариями выполните команду:
```sh
$ php artisan queue:work
```
