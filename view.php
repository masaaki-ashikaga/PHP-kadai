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
  <?php if(isset($errs)){
    foreach($errs as $err){
      echo '<p style="color: red">'.$err.'</p>';
    }
  }?>

  <p>新着順</p>
    <?php if(isset($data)):
    foreach($data as $row): ?>
    <p>投稿タイトル：<?php echo html_escape($row['title']); ?></p>
    <p>投稿者：<?php echo html_escape($row['user']); ?></p>
    <p>投稿内容：<?php echo html_escape($row['comment']); ?></p>
    <p>投稿時間：<?php echo $row['created']; ?></p>
    <hr>
    <?php endforeach;
          endif; ?>

  </div>

  <div class="post-form">
    <form action="" method="POST">
      <div class="form-group">
        <p><label for="title">投稿タイトル</label></p>
        <p><input type="text" class="form-control-sm" id="title" name="title"></p>
      </div>
      <div class="form-group">
        <p><label for="user">投稿者</label></p>
        <p><input type="text" class="form-control-sm" id="user" name="user"></p>
      </div>
      <div class="form-group">
        <p><label for="comment">投稿内容</label></p>
        <p><textarea class="form-control" id="comment" name="comment" rows="4" cols="40"></textarea></p>
      </div>

      <input type="submit" class="btn btn-primary" value="投稿">
    </form>
  </div>
  


</body>
</html>