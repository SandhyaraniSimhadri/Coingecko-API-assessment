Coingecko API Data Laravel/Lumen Artisan Command
This Laravel/Lumen project includes a simple Artisan command that retrieves data from the Coingecko API endpoint and stores it in a database.

Requirements:
PHP
composer

Installation:

Step 1 :
Command to create the laravel project.
composer create-project --prefer-dist laravel/laravel coingecko-fastway_assessment

Step 2: 
Command to develop the artisan command
php artisan make:command CoingeckoAPIData

write necessary code to fetch data from api and insert into databse, handling errors

Step 3:
Command to create the database schema
php artisan make:migration coingecko_data_table --create=coingecko_coins

write the schema to create the table

Command to apply the changes to the database
php artisan migrate

I used local database
set the DataBase credentails in .env file as follows.
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=coingecko_data
DB_USERNAME=root
DB_PASSWORD=

Step 4:
Command to create the Model
php artisan make:model Models/CoingeckoCoin

write necessary code to check the table strcture and data

Step 5:
To register the artisan command
Added following to kernel.php

protected $commands = [
    \App\Console\Commands\CoingeckoAPIData::class,
];

Step 6:
Command to fetch and insert the CoingeckoCoin API data to database
php artisan coingecko:fetch