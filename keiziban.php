<?php


?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/base.css">
  <link rel="stylesheet" href="/css/index.css">
  <title>PHP｜課題掲示板</title>
</head>
<body>
  <div class="post-list">
  <h1>掲示板一覧</h1>
  <p>新着順</p>
    <p>投稿タイトル：</p>
    <p>投稿内容：</p>
    <p>投稿者：</p>
    <p>投稿時間：</p>
    <hr>
  </div>

  <div class="post-form">
    <form>
      <div class="form-group">
        <label for="title">投稿タイトル</label>
        <input type="text" class="form-control-sm" id="title">
      </div>
      <div class="form-group">
        <label for="user">投稿者</label>
        <input type="text" class="form-control-sm" id="user">
      </div>
      <div class="form-group">
        <label for="title">投稿内容</label>
        <textarea class="form-control-lg" id="content"></textarea>
      </div>

      <input type="submit" class="btn btn-primary" value="投稿">
    </form>
  </div>
  


</body>
</html>