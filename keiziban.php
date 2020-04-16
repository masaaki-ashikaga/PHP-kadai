<?php
require_once('./function.php');

//データベース接続
$dbh = get_db_connect();
$errs = [];

// POSTの取得とバリデーション
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $title = get_post('title');
  $user = get_post('user');
  $comment = get_post('comment');
  $title_length = mb_strlen($title);
  $user_length = mb_strlen($user);
  $comment_length = mb_strlen($comment);
  
  if($user_length === 0){
    $user = '匿名';
  }
  
  if($title_length === 0 | $comment_length === 0){
    $errs[] = '投稿に失敗しました。タイトルと内容は必須項目です。';
  }elseif($title_length > 30){
    $errs[] = '投稿に失敗しました。タイトルは30文字以内でご入力下さい。';
  }elseif($user_length > 10){
    $errs[] = 'お名前は10文字以内でご入力下さい。';
  }elseif(empty($errs)){
    $result = insert_data($dbh, $user, $title, $comment);
    $errs[] = '投稿に成功しました。';
  }
}

$data = select_data($dbh);


include_once('./view.php');

?>
