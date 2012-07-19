<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<base href="<?php echo base_url() ?>"></base>
<link href="css/index.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script style="text/javascript">
$(function(){
	var nextL;
	var prevL;
	$("#nextL").click(function(){
		
		nextL=$(".bt2").scrollTop()+450;
		$(".bt2").animate({"scrollTop":nextL},450);
	});
	$("#prevL").click(function(){
		prevL=$(".bt2").scrollTop()-450;
		$(".bt2").animate({"scrollTop":prevL},450);
	});

	$("#firstL").click(function(){
		$(".bt2").scrollTop(0);
	});
	
	$(".bt2 a").hover(function(){
		$(this).stop().animate({marginLeft:"8px"},400);
	},function(){
		$(this).stop().animate({marginLeft:"0px"},400);
	});	
	
	
});
</script>

<title>PHP学习网站</title>
</head>
<body>
<?php echo $this->load->view('header');?>
<div id="content">
	<div id="subleft">
		<div id="dh-y"><span id="dh-y1"><b><?php echo $nav_type;?></b></span></div>
		<div class="bt2" style="overflow:hidden">
			<ul>
			<?php foreach ($sel_title as $row):?>
				<li><a href="cindex/subpage/<?php echo $nav_type,'/',$row['id']?>"><?php echo $row['title']?></a></li>
			<?php endforeach;?>
			</ul>
		</div>
		
		<div id="liuyan002xia" onMouseOver="this.className='liuyan10'" onMouseOut="this.className='liuyan20'">
			<input id="firstL" type="button" name="" value="首页">
			<input id="prevL" type="button" name="" value="上一页">
			<input id="nextL" type="button" name="" value="下一页">
	    </div>
		
	</div>
	<div id="subcontent">
		<div id="content00"><?php echo @$sel_news->content;?></div>
	</div>
<?php echo $this->load->view('footer');?>
</div>
</body>
</html>