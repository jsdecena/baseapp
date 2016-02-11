## My Base Application for Laravel 5.1 with User roles

This base application will be a starting point in creating a web app from scratch but fully loaded with User Authentication and Authorization (roles).
The package used for authorization on this project is not yet compatible with 5.2.*. 

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
- Run `php artisan key:generate`
- [IMPORTANT] Change the database settings in the .env with your database settings
- Run `php artisan migrate --seed`
- Run `npm install --global gulp`
- Run `npm install`
- Run `bower install`
- Run `gulp`
- Run `php artisan serve` and go to [localhost:8000](http://localhost:8000)

Admin credentials:

- email: admin@admin.com
- pass: Testing123

Employee credentials:

- email: employee@employee.com
- pass: Testing123

API calls: [Now protected by JWT Authentication](https://github.com/jsdecena/baseapp/wiki)

Todo:

- Thinking of using soft delete instead to prevent orphaned records
