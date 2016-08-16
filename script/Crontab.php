<!DOCTYPE html>
<html>
<head>
    <title>获取线上数据到xiaoyuan_local</title>
</head>
<style >
html{
    width:100%;
}
body{
    width:100%;
}    
</style>
    <body>
    <div style="width:100%;word-wrap:break-word;">

<?php
    set_time_limit(0);
	require_once("ModelXiaoYuan.php");
	require_once("ModelLocal.php");
	require_once("GetDataFromOnlineToLocal.php");
	require_once("Log.php");
    $get_data = new GetDataFromOnlineToLocal();
    $log = new Log();

    // 获取线上数据库数据
    $res = $get_data->get_data_from_online();
    $log->createLog("获取线上数据库数据!");

    // 存储线上数据到本地数据库
    $get_data->post_online_data_to_local($res);
    $log->createLog("存储线上数据到本地数据库！");

    // 下载数据到本地文件夹
    $pic_num = $get_data->download_pic_file($res);
    $log->createLog("文件下载成功,一共下载".$pic_num."张图片!");




?>
    </div>
    </body>
    </html>