## Install Laravel
```
composer create-project laravel/laravel api-test-proj
```

## Create database
```
mysql -h localhost -P 3306 -u root -p
create database api_test_proj
```

## Add database to .env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=api_test_proj
DB_USERNAME=root
DB_PASSWORD=password
```

## Migrate database
```
php artisan migrate
```

## Add Blink details to .env
```
BLINK_SERVER=
BLINK_API_KEY=
BLINK_SECRET_KEY=
BLINK_RETURN_URL="${APP_URL}/return"
BLINK_NOTIFICATION_URL="${APP_URL}/notification"
```

## Install Guzzle
```
composer require guzzlehttp/guzzle
```