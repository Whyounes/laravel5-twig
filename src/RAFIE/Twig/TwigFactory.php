<?php

namespace RAFIE\Twig;

use Illuminate\Contracts\View\Factory as FactoryContract;
use Illuminate\Foundation\Application;

class TwigFactory implements FactoryContract
{

  /*
   * Twig environment
   *
   * @var Twig_Environment
   * */
  private $twig;

  public function __construct(Application $app)
  {
    $this->twig = $app['twig'];
  }

  public function exists($view)
  {
    return $this->twig->getLoader()->exists($view);
  }

  /**
   * Get the evaluated view contents for the given path.
   *
   * @param  string $path
   * @param  array $data
   * @param  array $mergeData
   * @return \Illuminate\Contracts\View\View
   */
  public function file($path, $data = [], $mergeData = [])
  {
    // or maybe use the String loader
    if (!file_exists($path)) {
      return false;
    }

    $filePath = dirname($path);
    $fileName = basename($path);

    $this->twig->getLoader()->addPath($filePath);

    return new TwigView($this, $fileName, $data);
  }

  public function make($view, $data = [], $mergeData = [])
  {
    $data = array_merge($mergeData, $data);

    return new TwigView($this, $view, $data);
  }

  public function share($key, $value = null)
  {
    $this->twig->addGlobal($key, $value);
  }

  public function render($view, $data)
  {
    return $this->twig->render($view, $data);
  }

  /**
   * Register a view composer event.
   *
   * @param  array|string $views
   * @param  \Closure|string $callback
   * @param  int|null $priority
   * @return array
   */
  public function composer($views, $callback, $priority = null)
  {

  }

  /**
   * Register a view creator event.
   *
   * @param  array|string $views
   * @param  \Closure|string $callback
   * @return array
   */
  public function creator($views, $callback)
  {

  }

  /**
   * Add a new namespace to the loader.
   *
   * @param  string $namespace
   * @param  string|array $hints
   * @return void
   */
  public function addNamespace($namespace, $hints)
  {

  }

}