<div class="top">
<img src="images/top.png" style="width:960px;"/>
	<div id="menu">
		<ul>
			<li><a href="cindex/index">首页</a></li>
			<?php
				foreach ($subtitle as $row): 
			?>
			<li><a href="cindex/subpage/<?php echo $row['nav_name'],'/'?>"><?php echo $row['nav_name']?></a></li>
			<?php
				endforeach;
			?>
		</ul>
	</div>
</div>