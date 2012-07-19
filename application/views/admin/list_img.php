<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>

<link href="<?php echo base_url() ?>css/skin.css" rel="stylesheet" type="text/css" />
<script type=text/javascript src="<?php echo base_url() ?>js/jquery.min.js"></script>

</head>

<body bgcolor="#EEF2FB">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17" valign="top" background="<?php echo base_url() ?>images/mail_leftbg.gif"><img src="<?php echo base_url() ?>images/left-top-right.gif" width="17" height="29" /></td>
    <td valign="top" background="<?php echo base_url() ?>images/content-bg.gif"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
        <tr>
          <td height="31"><div class="titlebt">列表</div></td>
        </tr>
      </table></td>
    <td width="16" valign="top" background="<?php echo base_url() ?>images/mail_rightbg.gif"><img src="<?php echo base_url() ?>images/nav-right-bg.gif" width="16" height="29" /></td>
  </tr>
  <tr>
    <td valign="middle" background="<?php echo base_url() ?>images/mail_leftbg.gif">&nbsp;</td>
    <td valign="top" bgcolor="#F7F8F9">
		<table width="90%">
			<tr style="color:#48882D;">
				<td width="30%">名 称 </td>
				<td width="30%">链 接 </td>
				<td>图片缩略图</td>
				<td>操作</td>
			</tr>
			<?php
				foreach ($upload_list as $row):
					echo form_open('chome/change_img/'.$row['id']);
			?>
			<tr height="100">
				<td><input type="text" value="<?php echo $row['imgname']?>" name="imgname" /></td>
				<td><input type="text" value="<?php echo $row['imglink']?>" name="imglink" /></td>
				<td ><img src='<?php echo base_url() ?>uploads/img/<?php echo $row['userfile']?>' width="100" height="75"/></td>
				<td>
					<span class="submit"><input id="baoc" type="submit"  value="&nbsp;"/></span> | 
					<?php echo anchor('chome/del_img/'.$row['userfile'],'删除')?>
				</td>
			</tr>
			<?php
				echo form_close();
				endforeach;
			?>
		</table>
    </td>
    <td background="<?php echo base_url() ?>images/mail_rightbg.gif">&nbsp;</td>
  </tr>
  <tr>
    <td valign="bottom" background="<?php echo base_url() ?>images/mail_leftbg.gif"><img src="<?php echo base_url() ?>images/buttom_left2.gif" width="17" height="17" /></td>
    <td background="<?php echo base_url() ?>images/buttom_bgs.gif"><img src="<?php echo base_url() ?>images/buttom_bgs.gif" width="17" height="17"></td>
    <td valign="bottom" background="<?php echo base_url() ?>images/mail_rightbg.gif"><img src="<?php echo base_url() ?>images/buttom_right2.gif" width="16" height="17" /></td>
  </tr>
</table>
</body>
</html>

