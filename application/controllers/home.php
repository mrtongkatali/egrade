<?php 
class Home extends CI_Controller {
	function __construct() {
		 parent::__construct();
		 $this->load->library('session');
		 $this->load->library('loader.php');
 		 $this->load->database();
		 
		 Loader::engineLoader();
		 Loader::style('style.css');
		 
		 $this->member_session_check();
	}
	
	function index(){
		Loader::style('template.css');
		
		$data['page_title'] = 'E-Grade :: Home';
		$data['selected']   = 'home';
		$this->load->view('home/index.php', $data);	
	}
}
?>