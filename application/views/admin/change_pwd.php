<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
 <base href="<?php echo base_url() ?>"></base>
<link href="css/skin.css" rel="stylesheet" type="text/css" />
</head>
<link rel="stylesheet" href="css/base.css" />
<script src="js/jquery.js"></script>
<script src="js/vanadium.js"></script>
<script src="js/check_form.js"></script>

<body bgcolor="#EEF2FB">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17" valign="top" background="images/mail_leftbg.gif"><img src="images/left-top-right.gif" width="17" height="29" /></td>
    <td valign="top" background="images/content-bg.gif"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
        <tr>
          <td height="31"><div class="titlebt">修改密码</td>
        </tr>
      </table></td>
    <td width="16" valign="top" background="images/mail_rightbg.gif"><img src="images/nav-right-bg.gif" width="16" height="29" /></td>
  </tr>
  <tr>
    <td valign="middle" background="images/mail_leftbg.gif">&nbsp;</td>
    <td valign="top" bgcolor="#F7F8F9">
    	<div id="nav">
	    <?php echo form_open('chome/change_pwd_ok')?>
			<dl>
				<dt>原 密 码：</dt>
				<dd><?php $class = 'class=":required"'; echo form_password('pwd','',$class);?></dd>
				<dt>新 密 码：</dt>
				<dd><?php $class = 'class=":required" id="pwd0"'; echo form_password('pwd0','',$class);?></dd>
				<dt>确认新密码：</dt>
				<dd><?php $class = 'class=":same_as;pwd0"'; echo form_password('pwd1','',$class);?></dd>
				<dt></dt>
				<dd><?php echo form_submit('','确认')?></dd>
			</dl>
		<?php form_close();?>
		</div>
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
