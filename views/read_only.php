<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/index.css">
  <title>PHP｜課題掲示板</title>
</head>
<body>
  <div class="post-list">
    <p>こんにちはゲストさん</p>
    <p><a href ="./login/login.php">ログアウト</a></p>
    <h1>掲示板一覧</h1>
    <p>新着順</p>
        <?php 
            if(!empty($data)):
            $data = array_reverse($data);  //新着順に並び替え（配列の要素を逆ならびにする。）
            foreach($data as $row): 
        ?>
                <p>投稿タイトル：<?php echo html_escape($row['title']); ?></p>
                <p>投稿者：<?php echo html_escape($row['user']); ?></p>
                <p>投稿内容：<?php echo nl2br(html_escape($row['comment'])); ?></p>
                <p>投稿時間：<?php echo $row['created']; ?></p>
                <hr>
        <?php 
            endforeach;
            endif; 
            ?>
  </div>
</body>
</html>