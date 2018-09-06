# fbook_api
Fbook - for sharing and discussing about book

## Required

 - Git
 - Composer
 - PHP v.7.x
 - Mysql v.5.7.x
 - Node
 - Npm

## Setup

 - Clone project:
```git clone```
 - Install composer in project folder:
```composer install --no-scripts```
 - Make ```.env``` file:
```cp .env.example .env```
 - Generate application key:
```php artisan key:generate```
 - Create an empty database and fill out in .env file:
`DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<empty database name>
DB_USERNAME=<username for phpMyAdmin/etc >
DB_PASSWORD=<password for user>`
 - Migrate database:
```php artisan migrate```
 - Create test database:
```php artisan db:seed```

## Configs

**Creating A Password Grant Client**

`php artisan passport:client --password`

Config API_CLIENT_SECRET and API_CLIENT_id in .env

## Testing
**Prepare database**
- php artisan migrate --database=mysql_test
- php artisan db:seed --database=mysql_test

**Run**
```
$ ./vendor/bin/phpunit
```
