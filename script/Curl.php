<?php

/**
* 
*/
class Curl
{
	
	function __construct()
	{
		
	}
	/**
	 * [curlPost description]
	 * @param  [type] $url       [要访问的地址]
	 * @param  [type] $post_data [要提交的数据]
	 * @return [type]            [返回$url页面的数据]
	 */
	public function curlGet($url){
		if(empty($url)){
			return '参数不合法<br>';
		}
		// 1.初始化 创建一个新curl资源
		$ch =  curl_init();
		// 2.设置URL和相应选项
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		// CURLOPT_RETURNTRANSFER 设置为1才能返回实际数据否则是bool类型
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// 3.抓取URL并把它传递给浏览器
		$res_json = curl_exec($ch);
		// 4.关闭cURL资源，释放系统资源
		curl_close($ch);
		// file_put_contents'1.log', $res_json);
		if(empty($res_json)){
			return "没有获取到数据<br>";
		}
		return $res_json;

	}
	/**
	 * [curlPost description]
	 * @param  [type] $url       [要访问的地址]
	 * @param  [type] $post_data [要提交的数据]
	 * @return [type]            [返回$url页面的数据]
	 */
	public function curlPost($url,$post_data){
		if(empty($url) || empty($post_data)){
			return '参数不合法<br>';
		}
		$post_data = http_build_query($post_data);
		// 1.初始化 创建一个新curl资源
		$ch =  curl_init();
		// 2.设置URL和相应选项
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		// CURLOPT_RETURNTRANSFER 设置为1才能返回实际数据否则是bool类型
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// 3.抓取URL并把它传递给浏览器
		$res_json = curl_exec($ch);
		// 4.关闭cURL资源，释放系统资源
		curl_close($ch);
		$res_arr = json_decode($res_json,true);
		if(empty($res_arr)){
			return "没有获取到数据<br>";
		}
		return $res_arr;

	}

}