<?php
require_once('./helpers/common_helper.php');
require_once('./helpers/db_helper.php');

$err = [];
session_start();

//データベース接続
$dbh = get_db_connect();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $name = get_trim_post('name');
    $mail = get_trim_post('mail');
    $mail_check = get_trim_post('mail_check');
    $pass = get_trim_post('pass');
    
    $name_len = mb_strlen($name);
    $mail_len = mb_strlen($mail);
    $mail_check_len = mb_strlen($mail_check);
    $pass_len = mb_strlen($pass);



if($mail !== $mail_check){
    $err[] =  'メールアドレスが異なります。2つとも同じメールアドレスをご入力下さい。';
}




include_once('./views/register_view.php');

?>
