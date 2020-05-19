<?php

namespace App\Controller;

use App\Controller\AppController;

class PeopleController extends AppController
{
  public function index()
  {
    if ($this->request->isPost()) {
      $find = $this->request->data['People']['find']; // '  20  ,  40 '
      $condition = ['name like' => $find];
    } else {
      $condition = [];
    }
    $data = $this->People->find('all', [
      'conditions' => $condition,
      'order' => ['People.age' => 'desc']
    ]);
    $this->set('dataArr', [
      'data' => $data,
      'debugData' => 'デバッグ用',
    ]);
  }

  public function add()
  {
    $entity = $this->People->newEntity();
    $this->set('entity', $entity);
  }

  public function create()
  {
    if ($this->request->is('post')) {
      $data = $this->request->data['People'];
      $entity = $this->People->newEntity($data);
      $this->People->save($entity);
    }
    return $this->redirect([
      'action' => 'index',
    ]);
  }

  public function edit()
  {
    $id = $this->request->query['id'];
    $entity = $this->People->get($id);
    $this->set('entity', $entity);
  }

  public function update()
  {
    if ($this->request->is('post')) {
      $data = $this->request->data['People'];
      $entity = $this->People->get($data['id']);
      $this->People->patchEntity($entity, $data);
      $this->People->save($entity);
    }
    return $this->redirect([
      'action' => 'index',
    ]);
  }

  public function delete()
  {
    $id = $this->request->query['id'];
    $entity = $this->People->get($id);
    $this->set('entity', $entity);
  }

  public function destroy()
  {
    if ($this->request->is('post')) {
      $data = $this->request->data['People'];
      $entity = $this->People->get($data['id']);
      $this->People->delete($entity);
    }
    return $this->redirect([
      'action' => 'index',
    ]);
  }
}
