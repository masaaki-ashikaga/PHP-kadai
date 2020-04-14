<?php

//XSS対策関数
function html_escape($word){
  return htmlspecialchars($word, ENT_QUOTES, 'UTF-8');
}

//前後のスペースを削除する関数
function get_post($key){
  if(isset($_POST[$key])){
    $var = trim($_POST[$key]);
    return $var;
  }
}

//入力文字数のバリデーション関数
//　→細かいバリデーションができないので関数はしようせず。
// function check_words($word, $length){
//   if(mb_strlen($word) === 0){
//     return FALSE;
//   }elseif(mb_strlen($word) > $length){
//     return FALSE;
//   }else{
//     return TRUE;
//   }
// }

// DB接続関数
function get_db_connect(){
  $dsn = 'mysql:dbname=php_kadai;host=localhost;charset=utf8';
  $user='root';
  $password='root';
  try{

    $dbh=new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  }catch (PDOException $e){
    echo 'データベースの接続に失敗しました。';
    echo ($e->getMessage());
    die();
  }
  return $dbh;

}

// データ挿入の関数
function insert_data($dbh, $title, $user, $comment){
  $date = date('Y-m-d H:i:s');
$sql = "INSERT INTO keiziban(title, user, comment, created) VALUE(:title, :user, :comment, '{date}')";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':user', $user, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
if(!$stmt->execute()){
  return 'データの書き込みに失敗しました。';
}
}

//データの取得関数
function select_data($dbh){
  $data = [];
  $sql = "SELECT title, user, comment, created FROM keiziban";
  $stmt = $dbh->prepare($sql);
  $stmt->execute();
  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $data[] = $row;
  }
  return $data;
}

?>