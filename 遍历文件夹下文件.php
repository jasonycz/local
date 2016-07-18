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
/**
 * 遍历获取目录下的指定类型的文件
 * @param $path
 * @param array $files
 * @return array
 */
function getfiles($path, $allowFiles, &$files = array())
{
    if (!is_dir($path)) return null;
    if(substr($path, strlen($path) - 1) != '/') $path .= '/';
    $handle = opendir($path);
    while (false !== ($file = readdir($handle))) {
        if ($file != '.' && $file != '..') {
            $path2 = $path . $file;
            if (is_dir($path2)) {
                getfiles($path2, $allowFiles, $files);
            } else {
                if (preg_match("/\.(".$allowFiles.")$/i", $file)) {
                    $files[] = array(
                        'url'=> substr($path2, strlen($_SERVER['DOCUMENT_ROOT'])),
                        'mtime'=> filemtime($path2),
                        'date_time' => date("Y-m-d H:i:s.",filemtime($path2)),
                    );
                }
            }
        }
    }
    return $files;
}



$path = $_SERVER['DOCUMENT_ROOT']."/pic/";
$allowFiles = "jpg";
$files = getfiles($path,$allowFiles,$files);

p($files);






