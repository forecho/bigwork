<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <base href="<?php echo base_url() ?>"></base>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理页面</title>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.accordion.js" type="text/javascript"></script>
<style>
body {
	margin:0px;
	padding:0px;
	font-size: 12px;
	color:#000;
	background-color: #EEF2FB;
	margin: 0px;
}
#navigation {
	margin:0px;
	padding:0px;
	width:182px;
}
#navigation a.head {
	cursor:pointer;
	background:url(images/menu_bgs.gif) no-repeat;
	display:block;
	line-height: 30px;
	text-align: center;
	text-decoration:none;
	height: 30px;
	width: 182px;
	font-weight:bold;
}
#navigation ul {
	list-style:none;
	margin: 0px;
	padding: 0px;
	display: block;
}
#navigation li {
	color: #333;
	display: block;
	text-decoration: none;
	width: 182px;
	padding-left: 0px;
}
#navigation li li a {
	line-height: 26px;
	color: #333;
	background-image: url(images/menu_bg1.gif);
	background-repeat: no-repeat;
	display: block;
	text-align: center;
	margin: 0px;
	padding: 0px;
	height: 26px;
	width: 182px;
	text-decoration: none;
}
#navigation li li.img{
	#margin-top:-10px;
	_margin-top:0;
	width:182px;
	height:5px;
	background:url(images/menu_topline.gif) no-repeat;
	display:block;
}
#navigation li li a:hover {
	color: #006600;
	background-image: url(images/menu_bg2.gif);
	background-repeat: no-repeat;
}
</style>
<script type="text/javascript">
$(function(){
	$('#navigation').accordion({
			header: '.head',
			event: 'click',
			autoheight:false
	});
});
</script>
</head>
<body>
<ul id="navigation">
  <li> <a class="head">管理员管理</a>
    <ul>
      <li class="img"></li>
      <li><a href="chome/change_pwd" target="mainFrame">修改密码</a></li>
    </ul>
  </li>
  <li> <a class="head">管理导航</a>
    <ul>
      <li class="img"></li>
      <li><a href="chome/nav_add" target="mainFrame">添加导航</a></li>
      <li><a href="chome/nav_list" target="mainFrame">导航列表</a></li>
    </ul>
  </li>
  <?php foreach ($nav as $row):
	if ($row['nav_id']==1) {
  ?>
  <li> <a class="head">管理<?php echo  $row['nav_name']?></a>
    <ul>
      <li class="img"></li>
      <li><a href="chome/add_news/<?php echo $row['nav_name']?>" target="mainFrame">添加<?php echo  $row['nav_name']?></a></li>
      <li><a href="chome/list_news/<?php echo $row['nav_name']?>" target="mainFrame"><?php echo $row['nav_name']?>列表</a></li>
    </ul>
  </li>
  <?php 
	}endforeach;
  ?>
  <li> <a class="head">文件管理</a>
    <ul>
      <li class="img"></li>
      <li><a href="chome/upload" target="mainFrame">上传文件</a></li>
      <li><a href="chome/upload_list" target="mainFrame">文件列表</a></li>
    </ul>
  </li>
  <li> <a class="head">首页切换图管理</a>
    <ul>
      <li class="img"></li>
      <li><a href="chome/add_img" target="mainFrame">添加图片</a></li>
      <li><a href="chome/list_img" target="mainFrame">切换图列表</a></li>
    </ul>
  </li>
  
<!--  <li> <a class="head">版本信息</a>-->
<!--    <ul>-->
<!--      <li class="img"></li>-->
<!--      <li><a href="http://Www.Skiyo.Cn" target="_blank">by Jessica(Skiyo.Cn)</a></li>-->
<!--    </ul>-->
<!--  </li>-->
</ul>
</body>
</html>
