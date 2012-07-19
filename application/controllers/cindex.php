<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cindex extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->library('pagination');
		$this->load->model('mhome');
		$this->load->helper(array('form', 'url'));
		$this->load->helper('download');
	}
	
	//首页
	public function index(){
		$data['subtitle'] = $this->mhome->subtitle();
		
		$data['title0'] = $this->mhome->selnews0('PHP基础教程',7,0);
		$data['title1'] = $this->mhome->selnews1('PHP面向对象',7,0);
		$data['title2'] = $this->mhome->selnews2('MySQL数据库教程',7,0);
		$data['title3'] = $this->mhome->selnews3('网络教程',7,0);
		$data['title4'] = $this->mhome->selnews4('SEO基础教程',7,0);
		$data['title5'] = $this->mhome->selnews5('PHP视频',7,0);
		$data['title6'] = $this->mhome->selnews6('PHP产品',7,0);
		$data['title7'] = $this->mhome->selnews7('PHP下载专区',7,0);
		
		$data['img']= $this->mhome->sel_img();

		$this->load->view('index',$data);
	}
	
	//新闻
	function subpage() {
		$data['subtitle'] = $this->mhome->subtitle();
		$data['nav_type'] = rawurldecode($this->uri->segment(3));
		$data['sel_title'] = $this->mhome->sel_title($data['nav_type']);
		$data['seltitle'] = $this->mhome->seltitle();
		//print_r($data['seltitle']);
		//echo $data['seltitle']->id;
		
		$data['sel_news'] = $this->mhome->change_news($this->uri->segment(4));
		$data['nav'] = $this->mhome->nav();
		
		$this->load->view('subpage',$data);
	}
	
}

?>