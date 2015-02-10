# LaravelTwig

Bringing [Twig](http://twig.sensiolabs.org/doc/) to Laravel 5 using the new [Contracts Package](https://github.com/illuminate/contracts).

##Installation
- Add `"whyounes/laravel5-twig": "dev-master"` to your `composer.json` file and run `composer update`.
- Add `'RAFIE\Twig\TwigViewServiceProvider'` to your `config/app.php` providers array, and comment the `'Illuminate\View\ViewServiceProvider'` provider.

##TODO
- Laravel [View composers](http://laravel.com/docs/master/views#view-composers)