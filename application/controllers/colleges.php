<?php 
class Colleges extends CI_Controller {
	function __construct() {
		 parent::__construct();
		 $this->load->library('session');
		 $this->load->library('loader.php');
 		 $this->load->database();

		 Loader::style('style.css');
		 
		 $this->member_session_check();
		 
		 $h_school_id 		= Utilities::encrypt(1);
		 $this->school_id 	= Utilities::decrypt($h_school_id);
		 
		 $this->user_access = Utilities::decrypt($_SESSION['egrade']['account_type']);
		 Utilities::verifyAccess($this->user_access,'colleges');
	}
	
	function index() {
		Loader::style('template.css');
		Loader::script('colleges.js');
		Twitter_Bootstrap::modal();
		Jquery::jq_datatable();
		Jquery::inline_validation();
		Jquery::form();
		Jquery::tipsy();
		Jquery::textboxlist();
		$data['page_title'] = 'E-grade :: Colleges';
		$data['selected']   = 'colleges';
		
		$this->load->view('colleges/index.php',$data);
	}
	
	function load_college_list_dt() {
		$data['colleges'] = $colleges = CV_Settings_College_Finder::findAllActiveCollegeBySchoolId($this->school_id);
		$this->load->view('colleges/college_list_dt.php',$data);
	}
	
	function ajax_add_college_form() {
		$this->load->view('colleges/forms/add_college.php',$data);
	}
	
	function ajax_edit_college_form() {
		if(!empty($_POST)) {
			$id = Utilities::decrypt($_POST['h_id']);
			$data['c'] = $college = CV_Settings_College_Finder::findById($id);
			$this->load->view('colleges/forms/edit_college.php',$data);
		}
	}
	
	function ajax_insert_update_college() {
		if(!empty($_POST)) {
			$dean_id = Utilities::decrypt($_POST['h_dean_id']);
			if(!empty($_POST['h_id'])) {
				$id = Utilities::decrypt($_POST['h_id']);
				$pt = CV_Settings_College_Finder::findById($id);
			} else { 
				$pt = new CV_Settings_College();
			}
		
			$pt->setSchoolId($this->school_id);
			$pt->setMemberId($dean_id);
			$pt->setCollegeName($_POST['college_name']);
			$pt->setCollegeCode($_POST['college_code']);
			$pt->setIsActive(CV_Settings_College::YES);
			$pt->save();
		}
	}
	
	
	function ajax_delete_college_form() {
		if(!empty($_POST)) {
			$data['c'] = $college = CV_Settings_College_Finder::findById(Utilities::decrypt($_POST['h_id']));
			$this->load->view('colleges/forms/delete_college.php',$data);
		}
	}
	
	function ajax_delete_college() {
		if(!empty($_POST)) {
			$college = CV_Settings_College_Finder::findById(Utilities::decrypt($_POST['h_id']));
			$college->setIsActive(CV_Courses::NO);
			$college->save();
		}
	}
}
?>