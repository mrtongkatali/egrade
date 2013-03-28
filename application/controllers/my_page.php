<?php 
class My_Page extends CI_Controller {
	function __construct() {
		 parent::__construct();
		 $this->load->library('session');
		 $this->load->library('loader.php');
 		 $this->load->database();
		 Loader::style('style.css');
	}

	function index(){
		Loader::style('template.css');
		Loader::script('my_page.js');
	
		Jquery::jq_datatable();
		
		if(!empty($_GET)) {
			if($_GET['tab'] == 'my_grades') { $data['tab_selected'] = 0; }
			else if($_GET['tab'] == 'my_profile') { $data['tab_selected'] = 1; }
			else if($_GET['tab'] == 'my_curriculum') { $data['tab_selected'] = 2; }
			else if($_GET['tab'] == 'my_account') { $data['tab_selected'] = 3; }
			else {$data['tab'] = 0; }
		}
		
		Twitter_Bootstrap::modal();
		$data['page_title'] = 'E-grades :: My Page';
		$data['selected']   = 'my_page';
		$this->load->view('my_page/index.php', $data);	
	}
	
	function load_server_curriculum_dt() { 
		$this->load->view('my_page/curriculum_dt.php');	
	}
	
	function load_server_grades_dt() {
		$this->load->view('my_page/grades_dt.php');	
	}
	
	function load_server_account_form() {
		$this->load->view('my_page/account_form.php');	
	}
}
?>