<?php

/**
 * 对多位数组进行排序
 * @param $multi_array 数组
 * @param $sort_key需要传入的键名
 * @param $sort排序类型
 */
function multi_array_sort($multi_array, $sort_key, $sort = SORT_DESC) {
	if (is_array($multi_array)) {
		foreach ($multi_array as $row_array) {
			if (is_array($row_array)) {
				$key_array[] = $row_array[$sort_key];
			} else {
				return false;
			}
		}
	} else {
		return false;
	}
	array_multisort($key_array, $sort, $multi_array);
	return $multi_array;
}


/**
 * @access   public
 * @return   bool 手机端为1 PC端为空
 * 判断手机使用用户
 */
 // check if wap 
  function check_wap(){
      $agen = $_SERVER['HTTP_USER_AGENT'];
      //$keywords = array("Android", "iPhone", "iPod", "iPad", "Windows Phone", "MQQBrowser");
      $mobile_os_list=array('Google Wireless Transcoder','Windows CE','WindowsCE','Symbian','Android','armv6l','armv5','Mobile','CentOS','mowser','AvantGo','Opera Mobi','J2ME/MIDP','Smartphone','Go.Web','Palm','iPAQ');
      $mobile_token_list=array('Profile/MIDP','Configuration/CLDC-','160×160','176×220','240×240','240×320','320×240','UP.Browser','UP.Link','SymbianOS','PalmOS','PocketPC','SonyEricsson','Nokia','BlackBerry','Vodafone','BenQ','Novarra-Vision','Iris','NetFront','HTC_','Xda_','SAMSUNG-SGH','Wapaka','DoCoMo','iPhone','iPod');
      $mobile_list = array_merge($mobile_token_list, $mobile_os_list);
      //排除Windows
      if (!$this->contains($agen, "Windows NT") || ($this->contains($agen, "Windows NT") && $this->contains($agen, "compatible; MSIE"))) {
       //排除Mac
         if (!$this->contains($agen, "Windows NT") && !$this->contains($agen, "Macintosh")) {
              foreach ($mobile_list as $k => $item) {
                  if ($this->contains($agen, $item)) {
                      return $item;
                  }
              }
         }
      }

    return false;
   }

function contains($str = '', $search_str){
    return strpos($str, $search_str) === FALSE ? FALSE : TRUE;
 }





