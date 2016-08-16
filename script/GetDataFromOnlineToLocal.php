<?php

require_once("ModelXiaoYuan.php");
require_once("ModelLocal.php");
/**
* 
*/
class GetDataFromOnlineToLocal
{
    private $xiaoyuan_online;
    private $xiaoyuan_local;
    function __construct(){
        $this->xiaoyuan_online = new ModelXiaoYuan();
        $this->xiaoyuan_local = new ModelLocal();
    }
   
    public  function get_data_from_online(){
        $sql = "select board_name,pic_url,post_time from pic ";//order by post_time desc
        $res = $this->xiaoyuan_online->query($sql);
        return $res;
      }

    public  function post_online_data_to_local($res){
        if(empty($res)){
          return;
        }
        $sql = 'INSERT INTO pic(board_name,pic_url,post_time) values';
        foreach ($res as $value) {
           $sql .= '("' .$value['board_name']. '","' .$value['pic_url']. '","' .$value['post_time']. '"),';
        }
        $sql = substr($sql, 0,-1);
        $this->xiaoyuan_local->exec($sql);
        echo "本地pic表 数据更新完成。";
      }
    /**
     * @param  [type]
     * @param  string
     * @param  string
     * @param  string
     * @return 将$url地址的图片抓取到指定地址
     */
    public function grab_image($url, $base_dir='',$section_dir='', $filename='', &$i = 0){
        if(empty($url)){
          return false;
        }

        // 为空就当前目录
        if(empty($base_dir)){
            $base_dir = '../pic/';
        }
        $dir = $base_dir.$section_dir;
        
        // 判断是否是文件夹 不是则创建
        if(!is_dir($dir)){
            echo "目录".$dir."不存在，将创建目录".$dir."<br>";
            $mode = 0777; //创建目录的模式
            $res = mkdir($dir,$mode,true);
            if($res){
                echo "目录".$dir."创建成功<br>";
            }else{
                echo "目录".$dir."创建失败,请注意<br>";
                return;
            }
        }

        $dir = realpath($dir);
        // 目录+文件
        $filename = $dir . (empty($filename) ? '/'.time().'.jpeg' : '/'.$filename);

        // 开始捕捉 
        ob_start(); 
        readfile($url); 
        $img = ob_get_contents(); 
        ob_end_clean(); 
        $size = strlen($img); 
        $fp2 = fopen($filename , "a"); 
        fwrite($fp2, $img); 
        fclose($fp2); 

        echo ++$i.'|';
        return $filename; 
    } 


    public function download_pic_file($res){
        if(empty($res)){
                echo "下载到本地时,数据为空";
                return;
            }
        $i = 0;
        foreach ($res as  $value) {
            $url = $value['pic_url'];
            $base_dir = '../pic/';
            $url_arr = explode('/', $url);
            $section_dir = $url_arr[4];
            $filename = $url_arr[5].'_'.$url_arr[6].'.jpeg';

            $this->grab_image($url,$base_dir,$section_dir,$filename,$i);
        }
        echo "<br>文件下载成功,一共".$i."张图片!<br>";

        return $i;
    }


  
}


















