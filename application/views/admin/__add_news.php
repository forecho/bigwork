<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script language="javascript" type="text/javascript" src="<?php echo base_url() ?>My97DatePicker/WdatePicker.js"></script>
<link href="<?php echo base_url() ?>css/skin.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url() ?>kindeditor/themes/default/default.css" />
<script charset="utf-8" src="<?php echo base_url() ?>kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="<?php echo base_url() ?>kindeditor/lang/zh_CN.js"></script>
	<script charset="utf-8" src="<?php echo base_url() ?>kindeditor/plugins/code/prettify.js"></script>
	<link rel="stylesheet" href="<?php echo base_url() ?>kindeditor/plugins/code/prettify.css" />
	<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content"]', {
				cssPath : '<?php echo base_url() ?>kindeditor/plugins/code/prettify.css',
				uploadJson : '<?php echo base_url() ?>kindeditor/php/upload_json.php',
				fileManagerJson : '<?php echo base_url() ?>kindeditor/php/file_manager_json.php',
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
				}
			});
			prettyPrint();
		});
	</script>
<script language="javascript">
	function chkinput(form)
	{
	  if(form.title.value=="")
	   {
	     alert("请输入新闻标题!");
		 form.title.select();
		 return(false);
	   }
	  
	var content=editor.hasContents()
	if(!content)
	{
		alert("你的输入为空");
		return(false);
	}
	
	   return(true);
	}
</script>

</head>

<body bgcolor="#EEF2FB">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="17" valign="top" background="<?php echo base_url() ?>images/mail_leftbg.gif"><img src="<?php echo base_url() ?>images/left-top-right.gif" width="17" height="29" /></td>
    <td valign="top" background="<?php echo base_url() ?>images/content-bg.gif"><table width="100%" height="31" border="0" cellpadding="0" cellspacing="0" class="left_topbg" id="table2">
        <tr>
          <td height="31"><div class="titlebt">添加<?php echo $nav_type?></div></td>
        </tr>
      </table></td>
    <td width="16" valign="top" background="<?php echo base_url() ?>images/mail_rightbg.gif"><img src="<?php echo base_url() ?>images/nav-right-bg.gif" width="16" height="29" /></td>
  </tr>
  <tr>
    <td valign="middle" background="<?php echo base_url() ?>images/mail_leftbg.gif">&nbsp;</td>
    <td valign="top" bgcolor="#F7F8F9">
    <form action="<?php echo site_url('chome/news_ok')?>" method="post" onSubmit="return chkinput(this)" name="example">
	    <dl>
	    	<dt>标题：</dt>
	        <dd><input type="text" name="title" /></dd>
	     	<dt>分类：</dt>
	        <dd>
	        	<input type="hidden" name="nav_type" value="<?php echo $nav_type?>" />
	          <select name="navid">
	          	<?php foreach ($nav as $row){
						
	          		if ($row['nav_id']!=1 && $row['nav_type']==$nav_type) {
	          			echo '<option value='.$row['nav_name'].'>'.$row['nav_name'].'</option>';
	          		};
	          	}?>
	          </select>
	        </dd>        
	    	<dt>时间：</dt>
	        <dd><input id="d11" type="text" onClick="WdatePicker()" name="addtime" value="<?php echo date("Y-m-d");?>" autocomplete="off"/></dd>
	    	<dt></dt>
	        <dd>
	 		<textarea id="editor_id" name="content" style="width:60%;height:560px;;visibility:hidden;">
			</textarea>
	        </dd>
	        <dt></dt>
	        <dd class="submit"><input type="submit" name="submit" value="&nbsp;"  /></dd>
	    </dl>
	</form>
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
