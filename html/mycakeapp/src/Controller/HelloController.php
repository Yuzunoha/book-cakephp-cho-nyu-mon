<?php

namespace App\Controller;

use App\Controller\AppController;

class HelloController extends AppController
{
  public $autoRender = false;

  private function p($a)
  {
    echo $a . '<br>';
  }

  public function index()
  {
    $id = $this->request->query['id'];
    $pass = $this->request->query['pass'];

    $this->p('HelloControllerのindexアクションです');
    $this->p('id : ' . $id);
    $this->p('pass : ' . $pass);
  }
}
