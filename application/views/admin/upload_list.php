<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
 <base href="<?php echo base_url() ?>"></base>
<link href="css/skin.css" rel="stylesheet" type="text/css" />
<script type=text/javascript src="<?php echo base_url() ?>js/jquery.min.js"></script>
</head>

<body bgcolor="#EEF2FB">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17" valign="top" background="images/mail_leftbg.gif"><img src="images/left-top-right.gif" width="17" height="29" /></td>
    <td valign="top" background="images/content-bg.gif"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
        <tr>
          <td height="31"><div class="titlebt">上传列表</div></td>
        </tr>
      </table></td>
    <td width="16" valign="top" background="images/mail_rightbg.gif"><img src="images/nav-right-bg.gif" width="16" height="29" /></td>
  </tr>
  <tr>
    <td valign="middle" background="images/mail_leftbg.gif">&nbsp;</td>
    <td valign="top" bgcolor="#F7F8F9">
		<table width="60%">
			<tr style="color:#48882D;">
				<td width="40%">文件名称</td>
				<td>操作</td>
			</tr>
			
			<?php
				foreach ($upload_list as $row):
			?>
			<form action="<?php echo base_url()?>chome/change_upload/<?php echo $row['id']?>" method="post">	
			<tr>

				<td style="float:left">
					<input type="text" value="<?php echo $row['filename']?>" name="filename" />
				<td>
					<span class="submit"><input id="baoc" type="submit"  value="&nbsp;"/></span> | 
					<?php echo anchor('chome/downfile/'.$row['path'],'下载'),"  |  ",anchor('chome/delfile/'.$row['path'],'删除')?>
				</td>
			</tr>
			</form>
			<?php
				endforeach;
			?>
			
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
