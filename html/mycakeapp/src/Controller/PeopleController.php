<?php

namespace App\Controller;

use App\Controller\AppController;

class PeopleController extends AppController
{
  public function index()
  {
    $id = $this->request->query('id');
    $data = $this->People->get($id);
    // $data = $this->People->find('all');
    // $data = $this->People->find('list');
    $this->set('data', $data);
  }
}
