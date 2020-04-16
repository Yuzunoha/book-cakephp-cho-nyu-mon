<?php

namespace App\Controller;

use App\Controller\AppController;

class HelloController extends AppController
{
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
    $this->viewBuilder()->autoLayout(false);
    $this->set('title', 'Hello!');

    if ($this->request->isPost()) {
    } else {
    }
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

  public function form()
  {
    $this->viewBuilder()->autoLayout(false);
    $name = $this->request->data['name'];
    $mail = $this->request->data['mail'];
    $age = $this->request->data['age'];
    $res = 'こんにちは、 ' . $name . '（' . $age .
      '）さん。メールアドレスは、' . $mail . ' ですね？';
    $values = [
      'title' => 'Result',
      'message' => $res
    ];
    $this->set($values);
  }
}
