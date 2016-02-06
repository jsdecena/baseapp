## My Base Application for Laravel >=5.1 with User roles

This base application will be a starting point in creating a web app from scratch but fully loaded with User Authentication and User Roles.
User Roles are not applicable in >5.2 since that caters already with the multi auth.

Requirements:
- [Laravel 5 requirements](https://laravel.com/docs/5.1/installation#installation)
- NodeJs
- Bower
- Gulp
- Composer

How to install
- Clone this project in your local machine
- Run `composer install`
- Copy .env.example and save as .env on the same directory
- [IMPORTANT] Change the database settings in the .env with your database settings
- Run `php artisan migrate --seed`
- Run `npm install --global gulp`
- Run `npm install`
- Run `bower install`
- Run `gulp`
- Run `php artisan serve` and go to [localhost:8000](http://localhost:8000)