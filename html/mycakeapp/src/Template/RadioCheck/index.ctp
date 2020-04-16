<!DOCTYPE html>
<html>

<head>
  <title><?= $title ?></title>
  <style>
    h1 {
      font-size: 48pt;
      margin: 0px 0px 10px 0px;
      padding: 0px 20px;
      color: white;
      background: linear-gradient(to right, #aaa, #fff);
    }

    p {
      font-size: 14pt;
      color: #666;
    }
  </style>
</head>

<body>
  <header class="row">
    <h1><?= $title ?></h1>
  </header>
  </a>
  <div class="row">
    <pre><?php print_r($data); ?></pre>
  </div>
  <div>
    <p>
      <?php
      //Formの作成
      echo $this->Form->create(
        null,
        [
          'type' => 'post',
          'url' => [
            'controller' => 'RadioCheck',
            'action' => 'index',
          ],
        ]
      );

      echo '<h1>ラジオボタンとチェックボックスの練習</h1>';

      //radioボタン:性別
      echo '<h2>性別を選択してください</h2>';
      $options = [
        'other' => 'その他',
        'male' => '男性',
        'female' => '女性',
      ];
      $attributes = [
        'value' => 'other',
      ];
      echo $this->Form->radio('sex', $options, $attributes);

      // checkbox:好きな果物
      echo '<h2>好きな果物を全て選択してください</h2>';
      echo $this->Form->input('apple', [
        'type' => 'checkbox',
        'label' => 'リンゴ',
      ]);
      echo $this->Form->input('banana', [
        'type' => 'checkbox',
        'label' => 'バナナ',
      ]);
      echo $this->Form->input('lemon', [
        'type' => 'checkbox',
        'label' => 'レモン',
      ]);

      //フォームの送信
      echo $this->Form->submit('送信');

      //フォームの終了
      echo $this->Form->end();
      ?>
    </p>
  </div>
</body>

</html>