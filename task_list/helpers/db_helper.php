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

?>