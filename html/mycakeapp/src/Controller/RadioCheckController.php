<?php

namespace App\Controller;

use App\Controller\AppController;

class RadioCheckController extends AppController
{
  public function index()
  {
    $this->viewBuilder()->autoLayout(false);
    $this->set('title', 'Hello!');

    $data = [];
    if ($this->request->isPost()) {
      /* POSTメソッドである */
      $data = $this->request->data;
    }
    $this->set('data', $data);
  }
}
