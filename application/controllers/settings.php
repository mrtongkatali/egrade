<?php 
class Settings extends CI_Controller {
	function __construct() {
		 parent::__construct();
		 $this->load->library('session');
		 $this->load->library('loader.php');
 		 $this->load->database();

		 Loader::style('style.css');
		 
		  $this->member_session_check();
	}
	
	function index() {
		Loader::style('template.css');
		//Loader::script('bootstrap-modal.js');
		Loader::script('settings.js');
		Jquery::jq_datatable();
		
		if(!empty($_GET)) {
			if($_GET['tab'] == 'my_grades') { $data['tab_selected'] = 0; }
			else if($_GET['tab'] == 'users') { $data['tab_selected'] = 1; }
			else if($_GET['tab'] == 'curriculum') { $data['tab_selected'] = 2; }
			else if($_GET['tab'] == 'school_year') { $data['tab_selected'] = 3; }
			else if($_GET['tab'] == 'semester') { $data['tab_selected'] = 4; }
			else if($_GET['tab'] == 'section') { $data['tab_selected'] = 5; }
			else {$data['tab'] = 0; }
		}
		
		$data['page_title'] = 'E-grade :: Settings';
		$data['selected']   = 'settings';
		$this->load->view('settings/index.php', $data);	
	}

	function load_curriculum_list_dt() {
		$this->load->view('settings/curriculum_list_dt.php');
	}

	function load_add_curriculum() {
		$this->load->view('settings/forms/add_curriculum.php');
	}
}
?>