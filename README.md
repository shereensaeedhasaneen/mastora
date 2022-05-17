# Laravel Admin Panel Starter Kit (Laravel 8.x & Core-UI)

### Links
1. [Laravel Development using PhpStorm](https://confluence.jetbrains.com/display/PhpStorm/Laravel+Development+using+PhpStorm).
2. [Coding style](https://laravel.com/docs/5.5/contributions#coding-style).
3. [Laravel Debugger](https://github.com/barryvdh/laravel-debugbar).


### Perquisites
1. PHP 8.x
2. MySQL 8.x
3. Apache 2.x OR Nginx
4. Node 14.x

### Installed Packages
1. [laravel-debugbar](https://github.com/barryvdh/laravel-debugbar)
2. [laravel-ide-helper](https://packagist.org/packages/barryvdh/laravel-ide-helper) (IDE helper for PHP Storm)
3. [laravel-permission](https://github.com/spatie/laravel-permission) (This package allows you to manage user permissions and roles in a database.)
4. [laravel-enum](https://github.com/BenSampo/laravel-enum)
5. [laravel-excel-exporter](https://github.com/Maatwebsite/Laravel-Excel)
6. [laravel-view-model](https://github.com/spatie/laravel-view-models)
7. [laravel-activity-log](https://spatie.be/docs/laravel-activitylog/v4/installation-and-setup)
8. [laravel-recaptcha](https://github.com/biscolab/laravel-recaptcha)
9. [mcamara/laravel-localization](https://github.com/mcamara/laravel-localization)

### Fresh Installation:
  * Connect to mysql and create empty database.
  * Create new virtual host for project with host name ``admin-panel.localhost`` ->{/site/public/}
  * Copy ``.env.example`` file to ``.env`` file
  * Change database access from ``.env`` file.
  * Run the following commands on a root folder:
  	* ``composer install`` to install all packages.
  	* ``composer dump-autoload`` to generate or update the autoloader.php
  	* ``php artisan key:generate`` to generate App key.
  	* ``php artisan migrate:refresh --seed``  create default setup seeders data.
  	* ``php artisan db:seed --class=DataSeeder`` (development mode only) to create a table and seed data.
  * For extra of helpful commands that can assist you while you build your application using [php artisan](https://laravel.com/docs/5.5/artisan)

### Frontend packages:
* [core-ui-bootstrap-v4-free](https://coreui.io/bootstrap/)
  
### Unit Testing:
  * Run this command ``./vendor/bin/phpunit`` on a root folder to run unit testing.

### Required Updates After Cloning for New Project
1. Add the new project logos in `resources/assets/brand`, add two logos `logo.png` and `logo.png`.
2. Update the favicon icons and `browserconfig.xml` located in `resources/assets/favicon`.
3. Update the favicons as well in the theme base layout.

### Notes
* The entire site crawling is disabled in `robots.txt`
* Authentication module follow the implementations of [laravel-breeze](https://github.com/laravel/breeze) auth module.
* Don't forgot to disable the activity logging in App seeders.   
