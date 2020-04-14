<?php

namespace App\Controller;

use App\Controller\AppController;

class HelloController extends AppController
{
  public $autoRender = false;

  private $data = [
    ['name' => 'エラー', 'mail' => 'エラー', 'tel' => 'エラー'],
    ['name' => '1人目', 'mail' => '1人目のemail', 'tel' => '080-0000-0001'],
    ['name' => '2人目', 'mail' => '2人目のemail', 'tel' => '080-0000-0002'],
    ['name' => '3人目', 'mail' => '3人目のemail', 'tel' => '080-0000-0003'],
  ];

  private function p($a)
  {
    echo $a . '<br>';
  }

  public function index()
  {
    $id = $this->request->query['id'] ?? 'no id';
    $pass = $this->request->query['pass'] ?? 'no pass';

    $this->p('HelloControllerのindexアクションです');
    $this->p('id : ' . $id);
    $this->p('pass : ' . $pass);
  }

  public function data()
  {
    $data = $this->data;
    $retObj = $data[0];
    $idStr = $this->request->query['id'] ?? null;
    if ($idStr) {
      /* 少なくともクエリパラメタがある */
      $id = intval($idStr);
      if (1 <= $id and $id < count($data)) {
        /* idが有効範囲である */
        $retObj = $data[$id];
      }
    }
    echo json_encode($retObj, JSON_UNESCAPED_UNICODE);
  }
}
