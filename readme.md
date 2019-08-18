# Laravel

## Installation

```bash
composer install
```

## Create a copy of your .env file
```bash
cp .env.example .env
```
## Generate an app encryption key
```bash
php artisan key:generate
```
##  Create an empty database for our application

## In the .env file, add database information to allow Laravel to connect to the database

In the .env file fill in the DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD

## Migrate the database
```bash
php artisan migrate
```
## Seed the database
```bash
php artisan db:seed
```

## Start project
```bash
php artisan serve
```
## Import csv file is in address : /csv_file


