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

require_once("./ModelLocal.php");
require_once("./CommonFunc.php");
/**
* 
*/
class ShowPicFromLocal
{
    private $xiaoyuan_local;
    function __construct(){
        $this->xiaoyuan_local = new ModelLocal();
    }
    public function get_pic_from_db($board_name = ''){
        if(!empty($board_name)){
            $where = "where board_name = '".$board_name."'";
        }else{
            $where = '';
        }
        $sql = 'select * from pic '.$where.' order by post_time desc';//group by pic_url;
        $res = $this->xiaoyuan_local->query($sql);
        return $res;
    }

    public function show_pic($res){
        if(empty($res)){
            echo "图片数据为空,返回!<br>";
            return;
        }
        foreach ($res as $key => $value) {
            echo "<img src= ".$value['pic_url']." style=width:300px;height:300px;margin-left:10px;  />";
        }

   }
    public function show_pic_by_local_with_db($res){
        if(empty($res)){
            echo "图片数据为空,返回<br>"; 
        }
        foreach ($res as $value) {
            $url = $value['pic_url'];
            $base_dir = '/pic/';
            $url_arr = explode('/', $url);
            $section_dir = $url_arr[4];
            $filename = $url_arr[5].'_'.$url_arr[6].'.jpeg';
            $local_pic_url = $base_dir.$section_dir.'/'.$filename;
            echo "<img src= ".$local_pic_url." style=width:300px;height:300px;margin-left:10px;  />";

        }
    }
   
    /**
     * 遍历获取目录下的指定类型的文件
     * @param $path
     * @param array $files
     * @return array
     */
    public function get_files($path, $allowFiles, &$files = array())
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
                            'pic_url'=> substr($path2, strlen($_SERVER['DOCUMENT_ROOT'])),
                            'mtime'=> filemtime($path2),
                            'date_time' => date("Y-m-d H:i:s.",filemtime($path2)),
                        );
                    }
                }
            }
        }
        // 排序一下
        // multi_array_sort($files, 'mtime',SORT_ASC);
        return $files;
    }

  
}
    $show_pic_from_local = new ShowPicFromLocal();
    $board_name = 'Travel';

    // 获取文件夹中的图片信息
    // $path = $_SERVER['DOCUMENT_ROOT'].'/pic/'.$board_name.'/';
    // $allowFiles = 'jpeg';
    // $files = $show_pic_from_local->get_files($path,$allowFiles);
    // $show_pic_from_local->show_pic($files);
    // p('<hr>');

    // 获取数据库中的图片信息
    // $res = $show_pic_from_local->get_pic_from_db($board_name);
    // $show_pic_from_local->show_pic($res);
    
    // 应为数据库中的数据和本地保存的文件的路径有对应关系 所以可以直接读取数据库数据 然后获取本地文件路径
    $res = $show_pic_from_local->get_pic_from_db($board_name);
    $show_pic_from_local->show_pic_by_local_with_db($res);
    


    
























