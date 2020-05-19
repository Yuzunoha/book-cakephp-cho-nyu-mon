<?php

namespace App\Controller;

use App\Controller\AppController;

class PeopleController extends AppController
{
  public function index()
  {
    if ($this->request->isPost()) {
      $find = $this->request->data['People']['find']; // '  20  ,  40 '
      $a = explode(',', $find);
      $min = intval(trim($a[0])); // 20
      $max = intval(trim($a[1])); // 40
      $condition = [
        'conditions' => [
          'and' => [
            'age >=' => $min,
            'age <=' => $max,
          ],
        ],
      ];
      $data = $this->People->find('all', $condition);
    } else {
      $data = $this->People->find('all');
    }
    $debugData = 'find : ' . $find;
    $this->set('dataArr', [
      'data' => $data,
      'debugData' => $debugData,
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
