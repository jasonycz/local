<?php
require_once('script/Curl.php');
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

$curl =  new Curl();
// $url = 'https://www.baidu.com/';
$url = 'http://www.baidu.com/dianping/';

$res = $curl->curlGet($url);
p($res);
file_put_contents('1.log', $res);
