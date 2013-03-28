<?php 
class Report extends CI_Controller {
	function __construct() {
		 parent::__construct();
		 $this->load->library('session');
		 $this->load->library('loader.php');
 		 $this->load->database();

		 Loader::style('style.css');
		 
		  $this->member_session_check();
	}
	
	function index(){
		Loader::style('template.css');
		Loader::script('bootstrap-modal.js');
		
		$data['page_title'] = 'E-grade :: Reports';
		$data['selected']   = 'report';
		$this->load->view('report/index.php', $data);	
	}
}
?>