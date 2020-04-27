<?php

//XSS対策関数
function html_escape($word){
  return htmlspecialchars($word, ENT_QUOTES, 'UTF-8');
}

//前後のスペースを削除する関数
function get_trim_post($key){
  if(isset($_POST[$key])){
    $var = trim($_POST[$key]);
    return $var;
  }
}

?>