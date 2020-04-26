<?php

//DB関連機能の関数ファイル

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
  function insert_data($dbh, $user, $title, $comment){  
      $date = date('Y-m-d H:i:s');
      $sql = "INSERT INTO keiziban(user, title, comment, created) VALUE(:user, :title, :comment, '{$date}')";
      $stmt = $dbh->prepare($sql);
      $stmt->bindValue(':user', $user, PDO::PARAM_STR);
      $stmt->bindValue(':title', $title, PDO::PARAM_STR);
      $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
        if(!$stmt->execute()){
          return 'データの書き込みに失敗しました。';
        }
  }
  
  //データの取得関数
  function select_data($dbh){
    $sql = "SELECT  id, user, title, comment, created FROM keiziban";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    //$row = $stmt->fetchAll(PDO::FETCH_ASSIC); でもOK！（１行で書けるからこっちの方が楽）
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $data[] = $row;
      }
      return $data;
  }
  //データ削除関数
  function delete_data($dbh, $id){
    $sql = "DELETE FROM keiziban WHERE id = :id";
    $stmt = $dbh->prepare($sql);
    $params = array(':id' => $id);
    $stmt->execute($params);
  }
  

//メールアドレス重複調べ関数
function email_exists($dbh, $email){
    $sql = "SELECT COUNT(id) FROM members where email = :email";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->fetch(PDO::FETCH_ASSOC);
    if($count['COUNT(id)'] > 0){
      return TRUE;
    }else{
      return FALSE;
    }
  }

//INSERT機能関数
function insert_member_data($dbh, $name, $email, $password){
    $password = password_hash($password, PASSWORD_DEFAULT);
    $date = date('Y-m-d H:i:s');
    $sql = "INSERT INTO members(name, email, password, created) VALUE(:name, :email, :password, '{$date}')";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    if(!$stmt->execute()){
        return 'データの書き込みに失敗しました。';
    }

}

//文字数チェック関数
function check_words($word, $length){
    if(mb_strlen($word) ===0){
        return FALSE;
    } elseif(mb_strlen($word) > $length){
        return FALSE;
    } else{
        return TRUE;
    }
}

//メンバーデータを取得
function select_member($dbh, $email, $password){
    $sql = 'SELECT * FROM members WHERE email = :email LIMIT 1';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if(password_verify($password, $data['password'])){
            return $data;
        } else{
            return FALSE;
        }
    }
}

function select_members($dbh){

    $sql = "SELECT name FROM members";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $data[] = $row;
    }
    return $data;
}


?>