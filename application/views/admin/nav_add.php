<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html mlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加导航</title>
<base href="<?php echo base_url() ?>"></base>
<link href="css/skin.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/base.css" />
<script src="js/jquery.js"></script>
<script src="js/vanadium.js"></script>
<script src="js/check_form.js"></script>
</head>

<body bgcolor="#EEF2FB">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17" valign="top" background="images/mail_leftbg.gif"><img src="images/left-top-right.gif" width="17" height="29" /></td>
    <td valign="top" background="images/content-bg.gif"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
        <tr>
          <td height="31"><div class="titlebt">添加导航</div></td>
        </tr>
      </table></td>
    <td width="16" valign="top" background="images/mail_rightbg.gif"><img src="images/nav-right-bg.gif" width="16" height="29" /></td>
  </tr>
  <tr>
    <td valign="middle" background="images/mail_leftbg.gif">&nbsp;</td>
    <td valign="top" bgcolor="#F7F8F9">
    <div id="nav">
    <form action="<?php echo site_url('chome/nav_ok')?>" method="post">
		<dl>
			<dt>导航父级：</dt>
			<dd>
            	<select name="nav">
                	<option selected="selected" value="1@0">无</option>
                	<?php foreach ($nav as $row): 
						if ($row['nav_id']==1) {
							echo ' <option value="'.$row['nav_name']."@".$row['nav_id'].'">'.$row['nav_name'].'</option>';
						} 
                   endforeach;?>
                </select>
            </dd>
			<dt>导航名称：</dt>
			<dd><input type="text" name="nav_name" id="nav_name" class=":required" /></dd>
            <dt></dt>
            <dd class="submit"><input type="submit" value="&nbsp;" /></dd>
	  </dl>
	</form>
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
