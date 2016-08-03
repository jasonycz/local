<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>

        <link rel="stylesheet" type="text/css" href="styles/lightbox.css" />
        <link rel="stylesheet" type="text/css" href="./styles/font-awesome.min.css" />
        <link href="./styles/myPhoto.css" rel="stylesheet" type="text/css" />
        <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.js"></script>
        <script src="./js/jquery.lightbox.js"></script>
        <script src="./js/myPhoto.js"></script>
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
    </head> 
    <body>
    <div class="myPhoto">
    <div class="myPhotos">
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
 date_default_timezone_set('PRC');
 ini_set('date.timezone','Asia/Shanghai');
$variable[0] = array(
    'board_name' => 'Travel',
    'pic_url' => 'https://bbs.byr.cn/att/Travel/127173/1126514',
    'post_time' => '2016-01-05 23:28:48',
);
$variable[1] = array(
    'board_name' => 'Travel',
    'pic_url' => 'https://bbs.byr.cn/att/Travel/127173/1126514',
    'post_time' => '2016-01-05 23:28:48',
);
p($variable);

$_html='';
foreach ($variable as $key => $value) {

    $_html .= '<div class="photoOuterMostDiv" style="background-image:url('.$value['pic_url'].'");>';
    $_html .= "<div class='overlay'>";
    $_html .= '<a href='.$value['pic_url'].' data-rel="lightbox" class="fa fa-expand" descript="类别:'.$value['board_name'].'创建时间:'.$value['post_time'].'"></a>';
    $_html .= "</div>";
    $_html .= "</div>";

}
echo $_html;

?>
    </div>
    </div>
    </body>
    </html>