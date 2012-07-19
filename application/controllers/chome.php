<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Chome extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->library('pagination');
		$this->load->model('mhome');
		$this->load->helper(array('form', 'url'));
		$this->load->helper('download');
		$this->load->library('session');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('admin/login');
	}
	function main() {
		if (!$this->session->userdata('username')) {
			$this->load->view('admin/login');
		}else{
			$this->load->view('admin/index.html');
		}
	}
	
	function top() {
		$this->load->view('admin/top');
	}
	
	function left() {
		$this->load->model('mhome');
		$data['nav'] = $this->mhome->nav();
		$this->load->view('admin/left',$data);
	}
	
	function right() {
		$this->load->view('admin/right');
	}
	
	//登陆
	function login(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run()!= false) {
			$this->load->model('mhome');
			$res = $this->mhome->login_admin(
					$this->input->post('username'),
					$this->input->post('password')
			);
			if ($res!="") {
				$this->session->set_userdata('username',$this->input->post('username'));
				redirect('chome/main');
			}
		}
		$this->load->view('admin/login');
	}
	//退出
	function logout() {
		$this->session->sess_destroy();
		$this->load->view('admin/login');
	}
	
	//修改密码
	function change_pwd() { 
		$this->load->view('admin/change_pwd');
	}
	function change_pwd_ok() { 
		$username = $_SESSION['username'];
		$query = $this->mhome->admin_pwd($username);
		//提示
		$data['succ'] = $query;
		$data['su1'] = "密码修改成功";
		$data['su0'] = "密码修改失败,请重新输入原密码";
		$this->load->view('admin/success', $data);
	}
	
	
	
	function nav_add() {
		if (!$this->session->userdata('username')) {
			redirect('chome/login');
		}
		
		$this->load->model('mhome');
		$data['nav'] = $this->mhome->nav();
		$this->load->view('admin/nav_add',$data);
	}
	
	function nav_list() {
		$this->load->model('mhome');
		$data['nav'] = $this->mhome->nav();
		//print_r($data);
		$this->load->view('admin/nav_list',$data);
	}
	
	//添加导航
	function nav_ok() {
			$this->load->model('mhome');
			$query = $this->mhome->insert_nav();
			//提示
			$data['succ'] = $query;
			$data['su1'] = "添加成功";
			$data['su0'] = "添加失败，你导航名称，是否已经被创建";
			$this->load->view('admin/success', $data);
	}
	function nav_del() {
		$this->load->model('mhome');
		$nav_sel = $this->mhome->sel_nav($this->uri->segment(3));
		$data['succ'] = $nav_sel;
		$data['su0'] = "对不起，删除失败，存在子栏目，需要先删除该栏目下面的所有子栏目，请重新删除";
		$data['su1']= "删除成功";
		$this->load->view('admin/success',$data);
		//redirect('chome/nav_list');
	}
	
	
	//添加新闻
	function add_news() {
		$this->load->model('mhome');
		$keyword = rawurldecode($this->uri->segment(3));
		$data['nav_type'] = $keyword;
		$data['nav'] = $this->mhome->nav();
		$this->load->view('admin/add_news',$data);
	}
	
	function news_ok() {
		if ($this->input->post('submit')) {
			$this->load->model('mhome');
			$query = $this->mhome->inster_news();
			if ($query) {
				redirect('chome/list_news/'.$query);
			}
		}
	}
	//新闻列表
	function list_news($offset='') {
		$this->load->model('mhome');

		
		$keyword = rawurldecode($this->uri->segment(3));
		$data['nav_type'] = $keyword;
		
		$limit = 2;// 每页显示数量
		$offset = $this->uri->segment(4);
		$total = $this->mhome->count_news($keyword);// 统计数量
		$data['sel_news'] = $this->mhome->sel_news($limit,$offset,$keyword);
		
		
		$config['base_url'] = base_url().'chome/list_news/'.$keyword;// 分页的基础 URL
		$config['total_rows'] = $total;//记录总数
		$config['uri_segment'] = 4;
		$config['per_page'] = $limit; //每页条数
		
		//几行可选设置
		$config['full_tag_open'] = '<div class="pagination">'; // 分页开始样式
        $config['full_tag_close'] = '</div>'; // 分页结束样式
        $config['first_link'] = '首页'; // 第一页显示
        $config['last_link'] = '末页'; // 最后一页显示
        $config['next_link'] = '下一页 >'; // 下一页显示
        $config['prev_link'] = '< 上一页'; // 上一页显示
        $config['cur_tag_open'] = ' <a class="current">'; // 当前页开始样式
        $config['cur_tag_close'] = '</a>'; // 当前页结束样式
		$config['num_links'] = 2;// 当前连接前后显示页码个数
		
		$this->pagination->initialize($config); // 配置分页
		
		$data['pag_links'] =  $this->pagination->create_links();//显示分页
		foreach ($data['sel_news'] as $row)
		{
		   $row['content'];
		}
		
		preg_match_all ("/<(img|IMG)(.*)(src|SRC)=[\"|'|]{0,}([h|\/].*(jpg|JPG|gif|GIF|png|PNG))[\"|'|\s]{0,}/isU",@$row['content'],$out);
		$data['get_image'] =  $out[4];

		$this->load->view('admin/list_news',$data);
	}
	
	//修改
	function change_news($id){
		$data['nav_type'] = rawurldecode($this->uri->segment(3));
		$data['sel_news'] = $this->mhome->change_news($this->uri->segment(4));
		$data['nav'] = $this->mhome->nav();
		$this->load->view('admin/change_news',$data);
	}
	function change_news_ok() {
		if ($this->input->post('submit')) {
			$this->load->model('mhome');
			$query = $this->mhome->update_news($this->uri->segment(4));
			if ($query) {
				$data['succ'] = $query;
				$data['su1']= "提交成功";
			 	$data['su0']= "提交失败";
				$this->load->view('admin/success',$data);
			}
		}
	}
	//删除
	function del_news() {
		$news_list = implode(",",$_POST['range']);
		//echo $news_list;
		$query = $this->mhome->del_news($news_list);
		$data['succ'] = $query;
		$data['su1'] = "删除成功";
		$this->load->view('admin/success',$data);
		//$this->load->view('admin/right');
		
	}
	//上传文件
	function upload() {
		$this->load->view('admin/upload');
	}
	
	function do_upload(){
		$config['upload_path'] = './uploads/';//绝对路径
		$config['allowed_types'] = 'txt|php|cdr|gif|jpg|png';//文件支持类型
		$config['max_size'] = '0';
		$config['encrypt_name'] = true;//重命名文件
		$this->load->library('upload',$config);
		
		if ($this->upload->do_upload()) {
			$upload_data = $this->upload->data();
			$query = 1; 
			//调用模型，写入数据库
			$this->mhome->upload($upload_data['file_name']);
		}
		else {
			$this->upload->display_errors();
			$query = 0; 
		}
		//提示
		$data['succ'] = $query;
		$data['su1'] = "提交成功";
		$data['su0'] = "文件上传失败,请检查文件再重新上传";
		$this->load->view('admin/success', $data);

	} 
	//文件列表
	function upload_list() {
		$data['upload_list'] = $this->mhome->sel_upload();
		$this->load->view('admin/upload_list',$data);
	}
	
	//修改上传文件名

	function change_upload() {
		$query = $this->mhome->change_upload($this->uri->segment(3));
		//提示
		$data['succ'] = $query;
		$data['su1'] = "修改成功";
		$data['su0'] = "对不起，修改失败";
		$this->load->view('admin/success', $data);
	}
	//下载文件
	function downfile() {
		$file_path = 'uploads/'.$this->uri->segment(3);
		$data = file_get_contents($file_path); // 读文件内容
		force_download($this->uri->segment(3), $data); 
	}
	//删除文件
	function delfile() {
		$file_path = 'uploads/'.$this->uri->segment(3);
		unlink($file_path);
		$query = $this->mhome->delfile($this->uri->segment(3));
		//提示
		$data['succ'] = $query;
		$data['su1'] = "删除成功";
		$data['su0'] = "对不起，删除失败";
		$this->load->view('admin/success', $data);
	}
	
	
	//图片效果
	
	function add_img() {
		$this->load->view('admin/add_img');
	}
	//添加图片
	function add_img_ok() {
		$config['upload_path'] = './uploads/img/';//绝对路径
		$config['allowed_types'] = 'cdr|gif|jpg|png';//文件支持类型
		$config['max_size'] = '2000';
		$config['encrypt_name'] = true;//重命名文件
		$this->load->library('upload',$config);
		
		if ($this->upload->do_upload()) {
			$upload_data = $this->upload->data();
			$query = 1; 
			//调用模型，写入数据库
			$this->mhome->add_img_ok($upload_data['file_name']);
		}
		else {
			$this->upload->display_errors();
			$query = 0; 
		}
		//提示
		$data['succ'] = $query;
		$data['su1'] = "提交成功";
		$data['su0'] = "文件上传失败,请检查文件再重新上传";
		$this->load->view('admin/success', $data);		
	}

	//文件列表
	function list_img() {
		$data['upload_list'] = $this->mhome->sel_img();
		$this->load->view('admin/list_img',$data);
	}
	
	//修改上传文件名
	function change_img() {
		$query = $this->mhome->change_img($this->uri->segment(3));
		//提示
		$data['succ'] = $query;
		$data['su1'] = "修改成功";
		$data['su0'] = "对不起，修改失败";
		$this->load->view('admin/success', $data);
	}

	//删除文件
	function del_img() {
		$file_path = 'uploads/img/'.$this->uri->segment(3);
		unlink($file_path);
		$query = $this->mhome->del_img($this->uri->segment(3));
		//提示
		$data['succ'] = $query;
		$data['su1'] = "删除成功";
		$data['su0'] = "对不起，删除失败";
		$this->load->view('admin/success', $data);
	}
	
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */