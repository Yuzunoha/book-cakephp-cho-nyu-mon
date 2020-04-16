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
  <a target="_blank" href='https://www.sejuku.net/blog/30046'>【CakePHP入門】radioボタンの作り方をわかりやすく解説！
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
            'controller' => 'SampleRadio',
            'action' => 'index',
          ],
        ]
      );

      //labelの生成
      echo $this->Form->label('性別を選択してください');
      echo '<br>';

      //radioボタンの作成
      $options = [
        'other' => 'その他',
        'male' => '男性',
        'female' => '女性',
      ];

      $attributes = [
        'value' => 'other',
      ];

      echo $this->Form->radio('radioSex', $options, $attributes);

      //フォームの送信
      echo $this->Form->submit('送信');

      //フォームの終了
      echo $this->Form->end();
      ?>
    </p>
  </div>
</body>

</html>