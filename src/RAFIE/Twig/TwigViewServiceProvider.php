<?php

namespace RAFIE\Twig;

use Illuminate\Support\ServiceProvider;

class TwigViewServiceProvider extends ServiceProvider
{
  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register()
  {
    $this->registerLoader();
    $this->registerTwig();

    $this->app->bind('view', function ($app) {
      return new TwigFactory($app);
    });
  }

  public function registerLoader()
  {
    $this->app->singleton('twig.loader', function ($app) {
      $view_paths = $app['config']['view.paths'];
      $loader = new \Twig_Loader_Filesystem($view_paths);

      return $loader;
    });
  }

  public function registerTwig()
  {
    $this->app->singleton('twig', function ($app) {
      $options = [
          'debug' => $app['config']['app.debug'],
          'cache' => $app['config']['view.compiled'],
      ];

      $twig = new \Twig_Environment($app['twig.loader'], $options);

      // register Twig Extensions
      $twig->addExtension(new \Twig_Extension_Debug());

      // register Twig globals
      $twig->addGlobal('app', $app);

      return $twig;
    });
  }

}

 