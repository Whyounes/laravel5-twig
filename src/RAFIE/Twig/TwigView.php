<?php

namespace RAFIE\Twig;

use Illuminate\Contracts\View\Factory as FactoryContract;
use Illuminate\Contracts\View\View as ViewContract;
use Illuminate\Foundation\Application;
use Illuminate\Http\Response;

class TwigView implements ViewContract
{
  /*
   * View to render
   * @var string
   * */
  private $view;

  /*
   * Data to pass to the view
   * @var array
   * */
  private $data;

  /*
   * Twig factory
   * @var RAFIE\Twig\TwigFactory
   * */
  private $factory;


  public function __construct(TwigFactory $factory, $view, $data = [])
  {
    $this->factory = $factory;
    $this->view = $view;
    $this->data = $data;
  }

  public function render()
  {
    return $this->factory->render($this->view, $this->data);
  }

  public function name()
  {
    return $this->view;
  }

  public function with($key, $value = null)
  {
    $this->data[$key] = $value;

    return $this;
  }

  public function __toString()
  {
    return $this->render();
  }

}