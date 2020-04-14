<?php

namespace App\Controller;

use App\Controller\AppController;

class HelloController extends AppController
{
  public $autoRender = false;

  public function index()
  {
    echo 'HelloControllerのindexアクションです';
  }
}
