## My Base Application for Laravel 5.1 with User roles

This base application will be a starting point in creating a web app from scratch but fully loaded with User Authentication and Authorization (roles).
The package used for authorization on this project is not yet compatible with 5.2.*. 

Requirements:
- [Laravel 5.1 requirements](https://laravel.com/docs/5.1/installation#installation)
- [NodeJs](https://nodejs.org/en/download/)
- [Bower](http://bower.io/#install-bower)
- [Gulp](https://github.com/gulpjs/gulp/blob/master/docs/getting-started.md)
- [Composer](https://getcomposer.org/download/)

How to install
- Clone this project. `git clone git@github.com:jsdecena/baseapp.git`
- Run `composer install`
- Copy .env.example and save as .env on the same directory
- Run `php artisan key:generate`
- [IMPORTANT] Create you local DB and change the database settings in the .env with your database settings
- Run `php artisan migrate --seed`
- Run `npm install`
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
