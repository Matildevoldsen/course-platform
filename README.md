# Course Platform

Course platform built with Laravel 7 and NuxtJS. This is the official repo for [How to build a course platform with NuxtJS, Laravel 7 and Stripe](https://www.youtube.com/watch?v=xS4Om2ZSu2o&list=PLjCZ5YN4Hlacehn798-qep4yXDcL4oF-x).

## Getting Started
To get started please ensure you have the following installed:

- Composer
- NPM and NODEJS
- PHP 7.2.5 or newer.

### Installing

#### Backend
In order to install it please clone the repo. Then in the backend directory run these commands and ensure to have set up database configuration in .env file:

```
composer install
php artisan migrate
```

To run the backend code please use Laravel's in-built ``php artisan serve`` function to run it locally.

#### Frontend

In order to setup the frontend code please install the dependinces using ``npm install``. To run the frontend please use ``npm run dev``

### Built With

- [Laravel 7](https://laravel.com/docs/7.x) - backend framework.
- [NuxtJS](http://nuxtjs.org/) - frontend framework.
- Designed with [Ant Design Vue](https://www.antdv.com/).

### Authors

*Matilde Wittrup* - Initial Work - Wimm Media and coding tutorials on [YouTube](youtube.com/c/matildewittrup).

### License

This project is licensed under the MIT license - see the [LICENSE.MD](https://github.com/Matildevoldsen/course-platform/blob/master/LICENSE.md) for details.