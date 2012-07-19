<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<base href="<?php echo base_url() ?>"></base>
<link href="css/index.css" rel="stylesheet" type="text/css" />
<title>PHP学习网站</title>
<link href="css/untitleds.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript">
function $(id) { return document.getElementById(id); }
function addLoadEvent(func){
var oldonload = window.onload;
if (typeof window.onload != 'function') {
window.onload = func;
} else {
window.onload = function(){
oldonload();
func();
}
}
}
function addBtn() {
if(!$('ibanner')||!$('ibanner_pic')) return;
var picList = $('ibanner_pic').getElementsByTagName('a');
if(picList.length==0) return;
var btnBox = document.createElement('div');
btnBox.setAttribute('id','ibanner_btn');
var SpanBox ='';
for(var i=1; i<=picList.length; i++ ) {
var spanList = '<span class="normal">'+i+'</span>';
SpanBox += spanList;
}
btnBox.innerHTML = SpanBox;
$('ibanner').appendChild(btnBox);
$('ibanner_btn').getElementsByTagName('span')[0].className = 'current';
for (var m=0; m<picList.length; m++){
var attributeValue = 'picLi_'+m
picList[m].setAttribute('id',attributeValue);
}
}
function moveElement(elementID,final_x,final_y,interval) {
if (!document.getElementById) return false;
if (!document.getElementById(elementID)) return false;
var elem = document.getElementById(elementID);
if (elem.movement) {
clearTimeout(elem.movement);
}
if (!elem.style.left) {
elem.style.left = "0px";
}
if (!elem.style.top) {
elem.style.top = "0px";
}
var xpos = parseInt(elem.style.left);
var ypos = parseInt(elem.style.top);
if (xpos == final_x && ypos == final_y) {
moveing = false;
return true;
}
if (xpos < final_x) {
var dist = Math.ceil((final_x - xpos)/10);
xpos = xpos + dist;
}
if (xpos > final_x) {
var dist = Math.ceil((xpos - final_x)/10);
xpos = xpos - dist;
}
if (ypos < final_y) {
var dist = Math.ceil((final_y - ypos)/10);
ypos = ypos + dist;
}
if (ypos > final_y) {
var dist = Math.ceil((ypos - final_y)/10);
ypos = ypos - dist;
}
elem.style.left = xpos + "px";
elem.style.top = ypos + "px";
var repeat = "moveElement('"+elementID+"',"+final_x+","+final_y+","+interval+")";
elem.movement = setTimeout(repeat,interval);
}
function classNormal() {
var btnList = $('ibanner_btn').getElementsByTagName('span');
for (var i=0; i<btnList.length; i++){
btnList[i].className='normal';
}
}
function picZ() {
var picList = $('ibanner_pic').getElementsByTagName('a');
for (var i=0; i<picList.length; i++){
picList[i].style.zIndex='1';
}
}
var autoKey = false;
function iBanner() {
if(!$('ibanner')||!$('ibanner_pic')||!$('ibanner_btn')) return;
$('ibanner').onmouseover = function(){autoKey = true};
$('ibanner').onmouseout = function(){autoKey = false};

var btnList = $('ibanner_btn').getElementsByTagName('span');
var picList = $('ibanner_pic').getElementsByTagName('a');
if (picList.length==1) return;
picList[0].style.zIndex='2';
for (var m=0; m<btnList.length; m++){
btnList[m].onmouseover = function() {
for(var n=0; n<btnList.length; n++) {
if (btnList[n].className == 'current') {
var currentNum = n;
}
}
classNormal();
picZ();
this.className='current';
picList[currentNum].style.zIndex='2';
var z = this.childNodes[0].nodeValue-1;
picList[z].style.zIndex='3';
if (currentNum!=z){
picList[z].style.left='650px';
moveElement('picLi_'+z,0,0,10);
}
}
}
}
setInterval('autoBanner()', 5000);
function autoBanner() {
if(!$('ibanner')||!$('ibanner_pic')||!$('ibanner_btn')||autoKey) return;
var btnList = $('ibanner_btn').getElementsByTagName('span');
var picList = $('ibanner_pic').getElementsByTagName('a');
if (picList.length==1) return;
for(var i=0; i<btnList.length; i++) {
if (btnList[i].className == 'current') {
var currentNum = i;
}
}
if (currentNum==(picList.length-1) ){
classNormal();
picZ();
btnList[0].className='current';
picList[currentNum].style.zIndex='2';
picList[0].style.zIndex='3';
picList[0].style.left='650px';
moveElement('picLi_0',0,0,10);
} else {
classNormal();
picZ();
var nextNum = currentNum+1;
btnList[nextNum].className='current';
picList[currentNum].style.zIndex='2';
picList[nextNum].style.zIndex='3';
picList[nextNum].style.left='650px';
moveElement('picLi_'+nextNum,0,0,10);
}
}
addLoadEvent(addBtn);
addLoadEvent(iBanner);
</script>

<body>
<?php echo $this->load->view('header');?>
<div id="content">
	<div id="con-z">
		<div class="wrap">
          <div class="screenshot">
            <div class="main_mid">
				<div id="ibanner">
					<div id="ibanner_pic"> <a href="#"><img src="images/01.jpg" /></a> <a href="#"><img src="images/02.jpg" alt="" /></a> <a href="#"><img src="images/03.jpg" alt="" /></a> <a href="#"><img src="images/04.jpg" alt="" /></a> </div>
				</div>
            </div>
          </div>
		</div>
		<div class="con1">
			<div id="dh"><span class="dh1"><b>PHP基础教程</b></span><span class="dh2"><b><a href="#">more</a></b></span></div>
			<div class="conn">
				<div class="img1"><img src="images/11.png" /></div>
				<div class="bt1">
					<ul>
					<?php foreach ($title0 as $row0):?>
						<li><a href="cindex/subpage/PHP基础教程/<?php echo $row0['id']?>"><?php echo $row0['title']?></a></li>
					<?php endforeach;?>              
					</ul>
				</div>
			</div>
		</div>
		<div class="con1">
			<div id="dh"><span class="dh1"><b>PHP面向对象</b></span><span class="dh2"><b><a href="#">more</a></b></span></div>
			<div class="conn">
				<div class="img1"><img src="images/12.png" /></div>
				<div class="bt1">
					<ul>
					<?php foreach ($title1 as $row1):?>
						<li><a href="cindex/subpage/PHP面向对象/<?php echo $row1['id']?>"><?php echo $row1['title']?></a></li>
					<?php endforeach;?>              
					</ul>
				</div>
			</div>
		</div>
		<div class="con1">
			<div id="dh"><span class="dh1"><b>MySQL数据库教程</b></span><span class="dh2"><b><a href="#">more</a></b></span></div>
			<div class="conn">
				<div class="img1"><img src="images/13.png" /></div>
				<div class="bt1">
					<ul>
					<?php foreach ($title2 as $row2):?>
						<li><a href="cindex/subpage/MySQL数据库教程/<?php echo $row2['id']?>"><?php echo $row2['title']?></a></li>
					<?php endforeach;?>              
					</ul>
				</div>
			</div>
		</div>
		<div class="con1">
			<div id="dh"><span class="dh1"><b>网络教程</b></span><span class="dh2"><b><a href="#">more</a></b></span></div>
			<div class="conn">
				<div class="img1"><img src="images/14.png" /></div>
				<div class="bt1">
					<ul>
					<?php foreach ($title3 as $row3):?>
						<li><a href="cindex/subpage/网络教程/<?php echo $row3['id']?>"><?php echo $row3['title']?></a></li>
					<?php endforeach;?>                
					</ul>
				</div>
			</div>
		</div>
		<div class="con1">
			<div id="dh"><span class="dh1"><b>SEO基础教程</b></span><span class="dh2"><b><a href="#">more</a></b></span></div>
			<div class="conn">
				<div class="img1"><img src="images/15.png" /></div>
				<div class="bt1">
					<ul>
					<?php foreach ($title4 as $row4):?>
						<li><a href="cindex/subpage/SEO基础教程/<?php echo $row4['id']?>"><?php echo $row4['title']?></a></li>
					<?php endforeach;?>                 
					</ul>
				</div>
			</div>
		</div>
		

	</div>
	<div id="con-y">
		<div id="con-y1">
			<div id="dh-y"><span id="dh-y1"><b>PHP视频</b></span></div>
			<div class="bt1">
				<ul>
					<?php foreach ($title5 as $row5):?>
						<li><a href="cindex/subpage/PHP视频/<?php echo $row5['id']?>"><?php echo $row5['title']?></a></li>
					<?php endforeach;?>  
			   </ul>
			</div>
		</div>
		<div id="con-y1">
			<div id="dh-y"><span id="dh-y1"><b>PHP产品</b></span></div>
			<div class="bt1">
				<ul>
					<?php foreach ($title6 as $row6):?>
						<li><a href="cindex/subpage/PHP产品/<?php echo $row6['id']?>"><?php echo $row6['title']?></a></li>
					<?php endforeach;?>  
			   </ul>
			</div>
		</div>
		<div id="con-y1">
			<div id="dh-y"><span id="dh-y1"><b>PHP下载专区</b></span></div>
			<div class="bt1">
				<ul>
					<?php foreach ($title7 as $row7):?>
						<li><a href="cindex/subpage/PHP下载专区/<?php echo $row7['id']?>"><?php echo $row7['title']?></a></li>
					<?php endforeach;?>  
			   </ul>
			</div>
		</div>
			<div id="con-y2">
			<div id="dh-y"><span id="dh-y1"><b>友情链接</b></span></div>
			<div class="bt1">
				<ul>
					<li>网站建设与维护</li>
					<li>省级精品课程申报</li>
					<li>精品课程网</li>
					<li>院级精品课程网</li>
					<li>2011年精品课程申报网</li>
					<li>计算机应用基础</li>
					<li>计算机应用基础</li>
			   </ul>
			</div>
		</div>
	</div>
	
<?php echo $this->load->view('footer');?>
</div>
</body>
</html>
<script type="text/javascript">
	var titles = '<?php foreach ($img as $row){ echo $row['imgname']."|";}?>芝加哥举城庆祝奥巴马胜选|麦凯恩经历凤凰城伤心一夜';
	var imgs='images/01.jpg|images/02.jpg|images/03.jpg|images/04.jpg';
	var urls='';
	var pw = 650;
	var ph = 279;
	var sizes = 14;
	var Times = 4000;
	var umcolor = 0xFFFFFF;
	var btnbg =0xFF7E00;
	var txtcolor =0xFFFFFF;
	var txtoutcolor = 0x000000;
	var flash = new SWFObject('flash/focus1.swf', 'mymovie', pw, ph, '7', '');
	flash.addParam('allowFullScreen', 'true');
	flash.addParam('allowScriptAccess', 'always');
	flash.addParam('quality', 'high');
	flash.addParam('wmode', 'Transparent');
	flash.addVariable('pw', pw);
	flash.addVariable('ph', ph);
	flash.addVariable('sizes', sizes);
	flash.addVariable('umcolor', umcolor);
	flash.addVariable('btnbg', btnbg);
	flash.addVariable('txtcolor', txtcolor);
	flash.addVariable('txtoutcolor', txtoutcolor);
	flash.addVariable('urls', urls);
	flash.addVariable('Times', Times);
	flash.addVariable('titles', titles);
	flash.addVariable('imgs', imgs);
	flash.write('dplayer2');
</script>