<?php 
class Mhome extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	//登陆
	function login_admin($username,$password) {
		$query = $this
				->db
				->where('username',$username)
				->where('password',$password)
				//->where('password',md5($password))
				->limit(1)
				->get('admin');
		if ($query->num_rows() > 0) {
			return $query->row();
		}
	}
	
	//修改密码
	function admin_pwd($username) {
		$pwd = $this->input->post('pwd');
		$pwd1 = $this->input->post('pwd1');
		$query = $this
				->db
				->where('username',$username)
				->where('password',$pwd)
				//->where('password',md5($password))
				->limit(1)
				->get('admin');		
		if ($query->num_rows() > 0) {
			$this->db->update('admin',array('password'=>$pwd1));
			return 1;
		}
		return 0;
	}
	
	
	//添加导航
	function insert_nav() {
		$nav = $this->input->post('nav');
		$nav_array = explode("@", $nav);
		$nav_type = $nav_array[0];
		$nav_id = $nav_array[1]+1;
		$nav_name = $this->input->post('nav_name');
		
		//查询是否重复
		$selnav = $this->db->get_where('nav',array('nav_name'=>$nav_name));
		//echo $selnav->row()->nav_id;
		if ($selnav->num_rows() > 0 && $selnav->row()->nav_id != 1){
			 return  0;//失败
		}else {
			if ($nav_type==1) {
				$nav_type=$nav_name;
			}
			$date = array('nav_type'=>$nav_type,'nav_name'=>$nav_name,'nav_id'=>$nav_id);
			$query = $this->db->insert('nav',$date);
			 return  1;//成功
		}
	}
	function nav(){
		$this->db->order_by("id", "asc"); 
		$query = $this->db->get('nav');
		return $query->result_array();
	}
	
	function sel_nav($id){
		$query = $this->db->get_where('nav',array('id'=>$id));
		$row = $query->row('nav_type');
		//echo $row;
		$query1=$this->db->get_where('nav',array('nav_type'=>$row));
		//return $row->nav_type;
		//echo $query1->num_rows();
		//echo $query->row('nav_id');
		//数量大于1或者
		if ($query1->num_rows() > 1 && $query->row('nav_id')==1){
			return 0;//失败
		}
		else {
			$query=$this->db->delete('nav',array('id'=>$id));
			return 1;//成功
		}
	}
	
	//添加新闻
	function inster_news() {
		$title = $this->input->post('title');
		$navid = $this->input->post('navid');
		$addtime = $this->input->post('addtime');
		$content = $this->input->post('content');
		$nav_type = $this->input->post('nav_type');
		$data = array('title'=>$title,'navid'=>$navid,'addtime'=>$addtime,'content'=>$content,'nav_type'=>$nav_type);
		$query = $this->db->insert('news',$data);
		return $nav_type;;
	}
	
	//读取新闻
	function sel_news($limit,$offset,$nav_type) {
		//$this->db->limit($limit,$offset);
		$query = $this->db->get_where('news',array('nav_type'=>$nav_type),$limit,$offset);
		//print_r($query->result_array()) ;
		return $query->result_array();
	}
	//总数
	function count_news($nav_type) {
		$query = $this->db->get_where('news',array('nav_type'=>$nav_type));
		return $query->num_rows();
	}
	function change_news($id){
		$query = $this->db->get_where('news',array('id'=>$id));
		return $query->row();
	}
	//更新新闻
	function update_news($id) {
		$title = $this->input->post('title');
		$navid = $this->input->post('navid');
		$addtime = $this->input->post('addtime');
		$content = $this->input->post('content');
		
		$data = array('title' => $title,'content' => $content,'navid' => $navid);
		$this->db->where('id',$id);
		$query = $this->db->update('news',$data);
		if ($query) {
			return 1;//成功;
		}else {
			return 0;//成功;
		}
	}
	//删除新闻
	function del_news($id) {
		$query1 = $this->db->query("select * from news where id in (".$id.");");
		//删除图片
		foreach ($query1->result_array() as $row){
			$row['content'];
			$get_image = preg_match_all ("/<(img|IMG)(.*)(src|SRC)=[\"|'|]{0,}([h|\/].*(jpg|JPG|gif|GIF|png|PNG))[\"|'|\s]{0,}/isU",$row['content'],$out);
			if ($get_image!="") {
					foreach ($out[4] as $row1){
					$row1 = substr($row1,strlen(base_url()));//转相对路径
					unlink($row1);
				}
			}
		}
		$query=$this->db->query("delete from news where id in (".$id.");");
		if ($query) {
			return 1;
		}
	}
	
	//上传文件
	function upload($file_name) {
		$filename = $this->input->post('filename');
		$data = array('filename'=>$filename,'path'=>$file_name);
		$query = $this->db->insert('upload',$data);
		//return $this->db->affected_rows();
	}
	//查询上传文件
	function sel_upload() {
		$query = $this->db->get('upload');
		return $query->result_array();
	}
	//更新上传文件
	function change_upload($id) {
		$filename = $this->input->post('filename');
		$data = array('filename' => $filename);
		$this->db->where('id',$id);
		$query = $this->db->update('upload',$data);
		return 1;
	}
	//删除数据库 文件
	function delfile($path) {
		$query = $this->db->delete('upload', array('path' => $path)); 
		if ($query){
			return 1;
		}else {
			return 0;
		}
	}
	
	
	//首页图片
	function add_img_ok($file_name) {
		$imgname = $this->input->post('imgname');
		$imglink = $this->input->post('imglink');
		$data = array('imglink'=>$imglink,'imgname'=>$imgname,'userfile'=>$file_name);
		$query = $this->db->insert('index_img',$data);
	}
	//查询上传文件
	function sel_img() {
		$query = $this->db->get('index_img');
		return $query->result_array();
	}
	//更新上传文件
	function change_img($id) {
		$imgname = $this->input->post('imgname');
		$imglink = $this->input->post('imglink');
		$data = array('imglink'=>$imglink,'imgname'=>$imgname);
		$this->db->where('id',$id);
		$query = $this->db->update('index_img',$data);
		return 1;
	}
	//删除数据库 文件
	function del_img($userfile) {
		$query = $this->db->delete('index_img', array('userfile' => $userfile)); 
		if ($query){
			return 1;
		}else {
			return 0;
		}
	}
	
	
	
	
	
	//前台首页
	function subtitle(){
		$this->db->order_by("id", "asc"); 
		$query = $this->db->get_where('nav',array('nav_id'=>1));
		return $query->result_array();
	}
	
	
	function selnews0($type,$limit,$offset) {
		$this->db->order_by("addtime", "asc"); 
		$this->db->limit($limit,$offset);
		$query = $this->db->get_where('news',array('navid'=>$type));
		return $query->result_array();
	}
	function selnews1($type,$limit,$offset) {
		$this->db->order_by("addtime", "asc"); 
		$this->db->limit($limit,$offset);
		$query = $this->db->get_where('news',array('navid'=>$type));
		return $query->result_array();
	}
	function selnews2($type,$limit,$offset) {
		$this->db->order_by("addtime", "asc"); 
		$this->db->limit($limit,$offset);
		$query = $this->db->get_where('news',array('navid'=>$type));
		return $query->result_array();
	}
	function selnews3($type,$limit,$offset) {
		$this->db->order_by("addtime", "asc"); 
		$this->db->limit($limit,$offset);
		$query = $this->db->get_where('news',array('navid'=>$type));
		return $query->result_array();
	}
	function selnews4($type,$limit,$offset) {
		$this->db->order_by("addtime", "asc"); 
		$this->db->limit($limit,$offset);
		$query = $this->db->get_where('news',array('navid'=>$type));
		return $query->result_array();
	}
	function selnews5($type,$limit,$offset) {
		$this->db->order_by("addtime", "asc"); 
		$this->db->limit($limit,$offset);
		$query = $this->db->get_where('news',array('navid'=>$type));
		return $query->result_array();
	}
	function selnews6($type,$limit,$offset) {
		$this->db->order_by("addtime", "asc"); 
		$this->db->limit($limit,$offset);
		$query = $this->db->get_where('news',array('navid'=>$type));
		return $query->result_array();
	}
	function selnews7($type,$limit,$offset) {
		$this->db->order_by("addtime", "asc"); 
		$this->db->limit($limit,$offset);
		$query = $this->db->get_where('news',array('navid'=>$type));
		return $query->result_array();
	}
	function sel_title($type) {
		$this->db->order_by("addtime", "asc"); 
		$query = $this->db->get_where('news',array('navid'=>$type));
		return $query->result_array();
	}
	
	function seltitle() {
		$this->db->order_by("id", "asc"); 
		$query = $this->db->get_where('nav',array('nav_id'=>1));
		foreach ($query->result_array() as $row){
			//echo $row['nav_type'];
			$this->db->limit(1);
			$this->db->order_by("id", "asc"); 
		   	$query1 = $this->db->get_where('news',array('navid'=>$row['nav_type']));
		   	$info = $query1->result();
			//print_r($query1->result()) ;
	
		}
		
		return $query1->row();
	}
	
	
	
	function selnav() {
//		$this->db->order_by("nav_type", "asc"); 
//		$this->db->order_by("nav_id", "asc"); 
		$query = $this->db->get_where('nav',array('nav_id'=>2));
		return $query->result_array();
	}
	
		
}

?>