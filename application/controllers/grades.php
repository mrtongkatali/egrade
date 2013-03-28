<?php 
class Grades extends CI_Controller {
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
		Jquery::jq_datatable();

		$data['page_title'] = 'E-grade :: Grades';
		$data['selected']   = 'grades';
		$this->load->view('grades/index.php', $data);	
	}
}
?>