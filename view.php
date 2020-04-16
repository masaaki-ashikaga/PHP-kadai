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
  <h1>掲示板一覧</h1>
  <?php if(!empty($errs)){
    foreach($errs as $err){
      echo '<p style="color: red">'.$err.'</p>';
    }
  }?>

  <p>新着順</p>
    <?php if(!empty($data)):
    $data = array_reverse($data);  //新着順に並び替え（配列の要素を逆ならびにする。）
    foreach($data as $row): ?>
    <p>投稿タイトル：<?php echo html_escape($row['title']); ?></p>
    <p>投稿者：<?php echo html_escape($row['user']); ?></p>
    <p>投稿内容：<?php echo nl2br(html_escape($row['comment'])); ?></p>
    <p>投稿時間：<?php echo $row['created']; ?></p>
    <form action="" method="POST">
      <input type="hidden" name="eventid" value="delete">
      <input type="hidden" name="id" value="<?php echo $row['id'] ; ?>">
      <input type="submit" name="delete" value="削除">
    </form>
    <hr>
    <?php endforeach;
          endif; ?>
  </div>

  <div class="post-form">
    <form action="" method="POST">
        <p>投稿タイトル</p>
        <p><input type="text" name="title" class="form-control-sm"></p>
        <p>投稿者</p>
        <p><input type="text" name="user" class="form-control-sm"></p>
        <p>投稿内容</p>
        <p><textarea name="comment" class="form-control" rows="4" cols="40"></textarea></p>
      <input type="submit" class="btn btn-primary" value="投稿">
    </form>
  </div>
</body>
</html>