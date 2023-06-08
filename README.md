
## Coingecko integration with Laravel

Coingecko API Data Laravel/Lumen Artisan Command This Laravel/Lumen project includes a simple Artisan command that retrieves data from the Coingecko API endpoint and stores it in a database.

### Requirements

- [PHP](https://www.php.net/downloads.php)

- [Composer](https://getcomposer.org/download/)

- Laravel installation command ($ composer global require laravel/installer)
- Need Apache , MySQL server
- Need Database
### For new project
```bash
$ composer create-project --prefer-dist laravel/laravel coingecko-fastway_assessment
```
### To develop the artisan command
```bash
$ php artisan make:command CoingeckoAPIData

```
### Register
- To register the artisan command Added following to kernel.php
```bash
protected $commands = [ \App\Console\Commands\CoingeckoAPIData::class];
```

### To create the database schema
```bash
$ php artisan make:migration coingecko_data_table --create=coingecko_coins

```

### To create a model
```bash
$ php artisan make:model Models/CoingeckoCoin
```

## Installation

```bash
$ git clone git@github.com:SandhyaraniSimhadri/Coingecko-API-assessment.git
$ cd Coingecko-API-assessment
$ composer install
```

### Create .env file
- Required to connect with database
```bash
DB_CONNECTION=mysql
DB_HOST=x.x.x.x
DB_PORT=xxxx
DB_DATABASE=coingecko_data
DB_USERNAME=username
DB_PASSWORD=******
```

### After env creating, run this to automatically create the table in the database which is mentioned in .env file
```bash
$ php artisan migrate

```

### Fetch data from API and store in DB
```bash
$ php artisan coingecko:fetch
```



