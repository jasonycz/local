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


$str ='{"files":[{"name":"f12e4c9110d1057b49226bf53c3e7bca.jpg","size":487771,"type":"image\/jpeg","url":"http:\/\/0.0.0.0:8080\/jquery_pc\/server\/php\/files\/f12e4c9110d1057b49226bf53c3e7bca.jpg","thumbnailUrl":"http:\/\/0.0.0.0:8080\/jquery_pc\/server\/php\/files\/thumbnail\/f12e4c9110d1057b49226bf53c3e7bca.jpg","deleteUrl":"http:\/\/0.0.0.0:8080\/jquery_pc\/server\/php\/index.php?file=f12e4c9110d1057b49226bf53c3e7bca.jpg","deleteType":"DELETE"}]}
';

p(json_decode($str));

p(json_decode($str,ture));

$i = json_decode($str,ture);
p($i['files']['0']['name']);