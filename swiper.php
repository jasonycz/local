<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/idangerous.swiper.css">
</head>
<style>
/* Demo Styles */
html {
  height: 100%;
}
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 13px;
  line-height: 1.5;
  position: relative;
  height: 100%;
}
.swiper-container {
  width: 100%;
  height: 100%;
  color: #fff;
  text-align: center;
}

.swiper-slide .title {
  font-style: italic;
  font-size: 42px;
  margin-top: 80px;
  margin-bottom: 0;
  line-height: 45px;
}
.pagination {
  position: absolute;
  z-index: 20;
  left: 10px;
  bottom: 10px;
}
.swiper-pagination-switch {
  display: inline-block;
  width: 8px;
  height: 8px;
  border-radius: 8px;
  background: #222;
  margin-right: 5px;
  opacity: 0.8;
  border: 1px solid #fff;
  cursor: pointer;
}
.swiper-visible-switch {
  background: #aaa;
}
.swiper-active-switch {
  background: #fff;
}
</style>
<body>

<div class="swiper-container">
  <div class="swiper-wrapper">
<?php 
	for ($i =1 ;$i<5;$i++) {
?>		
	<div class="swiper-slide"> 
		<img src="<?php echo '/pic/'.$i.'.jpg' ?>" >
	</div>
<?php
}
?>
  	</div>
</div>


<div>
<?php 
	for ($i =1 ;$i<5;$i++) {
?>		
	<video src="<?php echo "./vedio/".$i.'.mp4' ?>" controls="controls" width="500px" height="500px">
	</video>
<?php
}
?>
</div> 

    <div class="pagination"></div>
 	<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.js"></script>
  	<script src="js/idangerous.swiper.js"></script>
<script >
$(function(){
  var mySwiper = $('.swiper-container').swiper({
    loop: true,
    pagination: '.pagination',
    paginationClickable: true,
    //其他设置
  });
})
</script>
	
</body>
</html>