<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>导航管理</title>
 <base href="<?php echo base_url() ?>"></base>
<link href="css/skin.css" rel="stylesheet" type="text/css" />
</head>

<body bgcolor="#EEF2FB">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17" valign="top" background="images/mail_leftbg.gif"><img src="images/left-top-right.gif" width="17" height="29" /></td>
    <td valign="top" background="images/content-bg.gif"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
        <tr>
          <td height="31"><div class="titlebt">导航管理</div></td>
        </tr>
      </table></td>
    <td width="16" valign="top" background="images/mail_rightbg.gif"><img src="images/nav-right-bg.gif" width="16" height="29" /></td>
  </tr>
  <tr>
    <td valign="middle" background="images/mail_leftbg.gif">&nbsp;</td>
    <td valign="top" bgcolor="#F7F8F9">
    <?php // echo $suss;?>
    	<table width="100%">
    		<tr style="color:#48882D;">
    			<td>排序</td>
    			<td>ID</td>
    			<td>导航名称</td>
    			<td>导航类型</td>
    			<td>操作</td>
    		</tr>
    		<?php foreach($nav as $row):?>
    		<tr>
    			<td><input type="text" size="2" value="<?php echo $row['nav_sort']?>"></input></td>
    			<td><?php echo $row['id'];?></td>
    			<td>
    			<?php
	    			switch ($row['nav_id']) {
	    				case 2:
	    				echo '&nbsp;&nbsp;&nbsp;--';;
	    				break;
	    			}
    				echo $row['nav_name'];
    			?></td>
    			<td><?php echo $row['nav_type']?></td>
    			<td><a href="<?php echo site_url('chome/nav_del')."/".$row['id']?>">删除</a></td>
    		</tr>
    		<?php endforeach;?>
    	</table>
    </td>
    <td background="images/mail_rightbg.gif">&nbsp;</td>
  </tr>
  <tr>
    <td valign="bottom" background="images/mail_leftbg.gif"><img src="images/buttom_left2.gif" width="17" height="17" /></td>
    <td background="images/buttom_bgs.gif"><img src="images/buttom_bgs.gif" width="17" height="17"></td>
    <td valign="bottom" background="images/mail_rightbg.gif"><img src="images/buttom_right2.gif" width="16" height="17" /></td>
  </tr>
</table>
</body>
</html>
