<?php 
require_once('config.php');
require_once('../helper/common.php');
require_once('../helper/db_helper.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = get_trim_post('name');
    $email = get_trim_post('email');
    $password = get_trim_post('password');

    $dbh = get_db_connect();
    $errs = array();

    if(!check_words($name, 50)){
        $errs['name'] = 'お名前欄は必須、50文字以内です。';
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errs['email'] = 'メールアドレスの形式が正しくないです。';
    } elseif(email_exists($dbh, $email)){
        $errs['email'] = 'このメールアドレスはすでに登録されています。';
    } elseif(!check_words($email, 100)){
        $errs['email'] = 'メールアドレスは必須、100文字以内です。';
    }

    if(!check_words($password, 50)){
        $errs['password'] = 'パスワードは必須、50文字以内です。';
    }

    if(empty($errs)){
        insert_member_data($dbh, $name, $email, $password);
        header('Location: http://localhost/php-kadai/keiziban/login/login.php');
        exit;
    } else{
        $errs['password'] = '登録に失敗しました。';
    }
}
include_once('../views/signup_view.php');

?>