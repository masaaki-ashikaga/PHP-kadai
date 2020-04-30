<?php
require_once('./helpers/common_helper.php');
require_once('./helpers/db_helper.php');

$err = [];
session_start();

//データベース接続

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $name = get_trim_post('name');
    $mail = get_trim_post('mail');
    $mail_check = get_trim_post('mail_check');
    $pass = get_trim_post('pass');
    
    $dbh = get_db_connect();
    $errs = array();

    if(!check_words($name, 100)){
        $errs['name'] = 'お名前は必須、100文字以内です。';
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errs['email'] = 'メールアドレスの形式が正しくないです。';
    } elseif(email_exists($dbh, $email)){
        
    }

    
    



if($mail !== $mail_check){
    $err[] =  'メールアドレスが異なります。2つとも同じメールアドレスをご入力下さい。';
}

}




include_once('./views/register_view.php');

?>
