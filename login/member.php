<?php
require_once('config.php');
require_once('../helper/db_helper.php');
require_once('../function.php');

session_start();

if(empty($_SESSION['member'])){
    header('Location:' .SITE_URL. 'login/login.php');
    exit;
}

$member = $_SESSION['member'];
$dbh = get_db_connect();
$members = array();
$members = select_members($dbh);

include_once('../views/member_view.php');

?>