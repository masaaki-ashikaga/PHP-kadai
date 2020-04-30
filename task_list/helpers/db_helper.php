<?php

function get_db_connect(){
    $dsn = 'mysql:dbname=task_list;host=localhost;charset=utf8';
    $user='root';
    $password='root';
    try{
        $dbh=new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'データベースの接続に成功しました。';
    }catch (PDOException $e){
        echo 'データベースの接続に失敗しました。';
        echo($e->getMessage());
        die();
    }
    return $dbh;
}

function email_exists($dbh, $email){
    $sql = "SELECT COUNT(id) FROM users where email = :email";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->fetch(PDO::FETCH_ASSOC);
    if($count['COUNT(id)'] > 0){
        return TRUE;
    } else{
        return FALSE;
    }
}

?>