<?php

  function p($str){
    echo "<pre>";
    print_r($str);
    echo "</pre>";
  }
  function ps($str){
    p($str);
    die();
  }
 // date_default_timezone_set('PRC');
 // ini_set('date.timezone','Asia/Shanghai');


p($_COOKIE);
if(empty($_COOKIE)){
	$_COOKIE['access_token'] = 'hello';
}

p($_COOKIE);