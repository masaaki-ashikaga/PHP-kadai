<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/index.css">

  <title>会員専用ページ</title>
</head>
<body>
  <p>こんにちは<?php echo html_escape($member['name']); ?>さん</p>
  <p>Email：<?php echo html_escape($member['email']); ?></p>
  <p><a href ="logout.php">ログアウト</a></p>
  <h1>会員専用ページ</h1>
  <hr width="300px" align="left">
  <p style="font-size:small">こちらはログイン後の画面です。</p>
  <h2>会員一覧</h2>
  <ul>
    <?php foreach($members as $member): ?>
      <li><?php echo html_escape($member['name']); ?></li>
    <?php endforeach; ?>
  </ul>
</body>
</html>