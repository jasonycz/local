<?php

require_once("./ModelLocal.php");
$xiaoyuan_local = new ModelLocal();

/*//灰度数据 参考例子
$plugin_dev_sql = "CREATE TABLE `plugin_dev` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plugin_id` int(11) NOT NULL COMMENT '所属插件',
  `version_id` int(11) NOT NULL COMMENT '对应版本ID',
  `run_system` varchar(50) NOT NULL COMMENT '插件平台',
  `package_name` varchar(50) NOT NULL COMMENT '插件包名',
  `plugin_version` varchar(50) NOT NULL COMMENT '灰度版本',
  `dev_result` varchar(20) NOT NULL COMMENT '灰度结果（PASS/FAIL/DEVING）',
  `dev_user` varchar(50) NOT NULL COMMENT '灰度量级',
  `dev_side` varchar(50) NOT NULL COMMENT '灰度区间',
  `dev_rom` varchar(50) NOT NULL COMMENT '灰度ROM',
  `dev_brand` text NOT NULL COMMENT '灰度机型',
  `dev_resolution` text NOT NULL COMMENT '灰度机型分辨率',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `plugin_dev_data_on_plugin_id` (`plugin_id`),
  KEY `plugin_dev_data_on_version_id` (`version_id`),
  KEY `plugin_dev_data_on_run_system` (`run_system`),
  KEY `plugin_dev_data_on_package_name` (`package_name`),
  KEY `plugin_dev_data_on_plugin_version` (`plugin_version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='灰度数据'";
$dao_base->query($plugin_dev_sql);
*/
  
// 创建图片表
$pic_sql = "CREATE TABLE IF NOT EXISTS `pic` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`board_name` varchar(50) NOT NULL COMMENT '图片所属板块',
	`pic_url` varchar(50) NOT NULL COMMENT '图片所在地址',
	`post_time` datetime NOT NULL COMMENT '该文章的提交时间',
	PRIMARY KEY (`id`),
	UNIQUE KEY `id_UNIQUE` (`id`),
	KEY `pic_board_name` (`board_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='图片数据'";

$xiaoyuan_local->exec($pic_sql);
echo "初始化pic表成功!<br>";
echo "<a href='index.php'>返回主界面</a>";