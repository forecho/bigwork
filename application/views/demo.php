<script style="text/javascript">
	$(function(){	
		var nextL;
		var prevL;
		$("#nextL").click(function(){
			
			nextL=$("#liuyan002main").scrollTop()+450;
			$("#liuyan002main").animate({"scrollTop":nextL},450);
		});
		$("#prevL").click(function(){
			prevL=$("#liuyan002main").scrollTop()-450;
			$("#liuyan002main").animate({"scrollTop":prevL},450);
		});

		$("#firstL").click(function(){
			$("#liuyan002main").scrollTop(0);
		});
	});
		
</script>  
  
  
<div id="liuyan002" >
    <div id="liuyan002top"><strong>最新活动留言</strong><span class="STYLE3">  </span></div>
    <div id="liuyan002main" style="overflow:hidden">
		<div style="width:690px">
        <?php 
        	include 'conn.php';
        	if($get=@$_GET['id']){
				}else {
				echo "失败！";
				}
        	$sql = "SELECT * FROM liuyan where hdid=$get order by id desc";
  			$ly_result=mysql_query($sql);
  			while ($row=mysql_fetch_array($ly_result)) {
            $sq_lu="select * from user where id=$row[user_id]";
            $re_lu=mysql_query($sq_lu,$conn);
            $row_lu=mysql_fetch_array($re_lu);
             
  				
  				
        	echo "<div class=\"ly\">";
            	echo "<div class=\"ly01\"><a href=\"#\"><img width=50px; height=50px; src=\"".$row_lu[image]."\" /></a></div>";
				
               echo "<div class=\"ly02\">";
               echo "  <p class=\"STYLE1\"><span class=\"STYLE36\"><a href=\"#\">".$row_lu[nicheng]."</a>  <a href=\"#\"><strong></strong></a></span>";
                echo "  <br />";
                echo " <span class=\"STYLE1 STYLE5\">".$row[content]."</span>";
                echo " <br />" ;
                    echo "<span class=\"STYLE35\">".$row[time]."</span>  </p>";
               echo " </div>";
           echo " </div>";
  			}
        ?>
		</div>
	</div>
	<div id="liuyan002xia" onMouseOver="this.className='liuyan10'" onMouseOut="this.className='liuyan20'">
		<input id="firstL" type="button" name="" value="首页">
		<input id="prevL" type="button" name="" value="上一页">
		<input id="nextL" type="button" name="" value="下一页">
    </div>
</div>