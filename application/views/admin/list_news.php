<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="<?php echo base_url() ?>css/skin.css" rel="stylesheet" type="text/css" />
<script type=text/javascript src="<?php echo base_url() ?>js/jquery.min.js"></script>


<script type="text/javascript">
function $(id){
return document.getElementById(id);
}
window.onload=function(){
	var pan;
	var conf;
	var selectAll = $("selectAll"),
	unSelect = $("unSelect"),
	del = $("del"),
	inputs=document.getElementsByName('range[]'),
	len = inputs.length;
	selectAll.onclick=function(){
		for(var i=0; i<len;i++){
			inputs[i].checked=true;
		}
	}
	unSelect.onclick=function(){
		for(var i=0; i<len;i++){
			var o = inputs[i];
			o.checked?o.checked=false:o.checked=true;
		}
	}

	$("form1").onsubmit=function(){
		for(var i=0; i<len;i++){
			var o = inputs[i];
			if(o.checked){
				pan=1;
				break;
			}else{
				pan=0;
			}
		}
		
		if(!pan){
			alert("请选择");
			return false;
		}else{
			conf=confirm("确定删除");
		}

		if(conf){
			return true;
			}else{
				return false;
				}
	}
}
</script>

</head>

<body bgcolor="#EEF2FB">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17" valign="top" background="<?php echo base_url() ?>images/mail_leftbg.gif"><img src="<?php echo base_url() ?>images/left-top-right.gif" width="17" height="29" /></td>
    <td valign="top" background="<?php echo base_url() ?>images/content-bg.gif"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
        <tr>
          <td height="31"><div class="titlebt"><?php echo $nav_type?>列表</div></td>
        </tr>
      </table></td>
    <td width="16" valign="top" background="<?php echo base_url() ?>images/mail_rightbg.gif"><img src="<?php echo base_url() ?>images/nav-right-bg.gif" width="16" height="29" /></td>
  </tr>
  <tr>
    <td valign="middle" background="<?php echo base_url() ?>images/mail_leftbg.gif">&nbsp;</td>
    <td valign="top" bgcolor="#F7F8F9">
        <table id="user_list" width="98%" border="0" cellpadding="0" cellspacing="0">
         <form name="form1" action="<?php echo site_url('chome/del_news')?>" method="post" id="form1">
            <tr style="color:#48882D;">
                <td></td>
                <td>标题</td>
                <td>新闻分类</td>
                <td>内容简略</td>
                <td>发表时间</td>
                <td>操作</td>
            </tr>
            <?php foreach ($sel_news as $row):?>	
            <tr>
                <td><input class="xx" type="checkbox" name="range[]" value="<?php echo $row['id'];?>"/></td>
                <td><?php echo $row['title'];?></td>
                <td><?php echo $row['navid'];?></td>
                <td><?php
					$content=strip_tags("$row[content]");
					echo mb_substr($content, 0,50)."...";?>
                </td>
                <td><?php echo $row['addtime'];?></td>
<!--              <td id="get_image"><img src='<?php echo $get_image[0];?>'  /></td>-->
                <td><?php echo anchor('chome/change_news/'.$nav_type.'/'.$row['id'],'修改')?></td>
            </tr> 
			<?php endforeach;?>
		
            <tr>
                <td colspan="7" align="left" style="padding:5px 0; border-bottom:none;">
                    <input type="button" value="全选" id="selectAll">
                    <input type="button" value="反选" id="unSelect">
                    <input type="submit" value="删除" id="del" />
                     
                    <div id="page">
						<?php echo $pag_links; ?>
					</div>
                </td>
            </tr>
            </form>
        </table>
    <td background="<?php echo base_url() ?>images/mail_rightbg.gif">&nbsp;</td>
  </tr>
  <tr>
    <td valign="bottom" background="<?php echo base_url() ?>images/mail_leftbg.gif"><img src="<?php echo base_url() ?>images/buttom_left2.gif" width="17" height="17" /></td>
    <td background="<?php echo base_url() ?>images/buttom_bgs.gif"><img src="<?php echo base_url() ?>images/buttom_bgs.gif" width="17" height="17"></td>
    <td valign="bottom" background="images/mail_rightbg.gif"><img src="<?php echo base_url() ?>images/buttom_right2.gif" width="16" height="17" /></td>
  </tr>
</table>




</body>
</html>
