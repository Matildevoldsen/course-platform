# Course Platform

Course platform built with Laravel 8 and NuxtJS. This is the official repo for [How to build a course platform with NuxtJS, Laravel 8 and Stripe](https://www.youtube.com/watch?v=xS4Om2ZSu2o&list=PLjCZ5YN4Hlacehn798-qep4yXDcL4oF-x).

## Getting Started
To get started please ensure you have the following installed:

- Composer
- NPM and NodeJS
- PHP 7.2.5 or newer.

# Installing

## Backend
In order to install it please clone the repo. Then in the backend directory run these commands and ensure to have set up database configuration in .env file:

```
composer install
php artisan migrate
```

To run the backend code please use Laravel's in-built ``php artisan serve`` function to run it locally.

### .env File
Please ensure that you copy .env.example and configure the database and email settings to your preference. Additionally, you should add ``SESSION_DOMAIN=localhost`` for local hosting and change it to your backend domain name when published.

### Are you upgrading from Laravel 7 to 8?

I'm aware certain subscribers of my channel might not have upgraded to Laravel 8, and while composer.json reflects the upgrades in here you might not want to clone the project to disrupt changes you have made. Therefore, I am providing a step-by-step guide on YouTube as well as in the README file:

- 1st) Follow all these steps in here https://laravel.com/docs/8.x/upgrade, perhaps copy and paste composer.json file from here.
- 2nd) If you haven't already installed jetstream please run this command ``composer require laravel/jetstream``
- 3rd) Install livewire ``php artisan jetstream:install livewire``
- 4th) You might encounter a bug if you don't add the following code to ``App/Providers/AppServiceProvider.php``:
Inside the file add:
```php
    use Illuminate\Support\Facades\Schema; //Add below namespace

    public function boot()
    {
        Schema::defaultstringLength(191);
    }
```
- 5th) Migrate changes to reflect on your database ``php artisan migrate``


## Frontend

In order to setup the frontend code please install the dependinces using ``npm install``. To run the frontend please use ``npm run dev``
### Built With

- [Laravel 8](https://laravel.com/docs/8.x) - backend framework.
- [NuxtJS](http://nuxtjs.org/) - frontend framework.
- Designed with [Ant Design Vue](https://www.antdv.com/).

### Authors

*Matilde Wittrup* - Initial Work - Wimm Media and coding tutorials on [YouTube](youtube.com/c/matildewittrup).

### License

This project is licensed under the MIT license - see the [LICENSE.MD](https://github.com/Matildevoldsen/course-platform/blob/master/LICENSE.md) for details.
