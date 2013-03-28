<?php 
class Programs extends CI_Controller {
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
		 Utilities::verifyAccess($this->user_access,'programs');
	}
	
	function index() {
		Loader::style('template.css');
		Loader::script('programs.js');
		Twitter_Bootstrap::modal();
		Jquery::jq_datatable();
		Jquery::inline_validation();
		Jquery::form();
		Jquery::tipsy();
		$data['page_title'] = 'E-grade :: Programs';
		$data['selected']   = 'programs';
		
		$this->load->view('programs/index.php',$data);
	}
	
	function load_program_list_dt() {
		$this->load->view('programs/program_list_dt.php');
	}
	
	function load_server_program_list_dt() {
		Utilities::ajaxRequest();
		
		$condition = ' is_active = ' . Model::safeSql(CV_Settings_Program::YES);
		
		$dt = new Datatable();
		$c  = $_GET['iDisplayStart'];
		$dt->setPagination(1);
		$dt->setStart(1);
		$dt->setStartIndex(0);
		$dt->setDbTable(CV_SETTINGS_PROGRAM);
		$dt->setCustomField();
		$dt->setJoinTable();			
		$dt->setJoinFields();
		$dt->setCondition($condition);
		$dt->setColumns('program_code,title,is_offered');
		$dt->setOrder('ASC');
		$dt->setStartIndex(0);
		$dt->setSort(0);		
		$dt->setNumCustomColumn(1);
		$dt->setCustomColumn(	
		array(
		'1' => '<div class=\"i_container\"><ul class=\"dt_icons\"><li><a title=\"Edit\" id=\"edit\" class=\"ui-icon ui-icon-pencil g_icon\" href=\"javascript:void(0);\" onclick=\"javascript:_showEditProgramForm(\'e_id\');\"></a></li><li><a title=\"Delete\" id=\"delete\" class=\"ui-icon ui-icon-trash g_icon\" href=\"javascript:void(0);\" onclick=\"javascript:_deleteProgramDialog(\'e_id\')\"></a></li></ul></div>'));
		echo $dt->constructDataTable();
	}
	
	function ajax_add_program_form() {
		$data['colleges'] = $colleges = CV_Settings_College_Finder::findAllActiveCollegeBySchoolId($this->school_id);
		$this->load->view('programs/forms/add_program.php',$data);
	}
	
	function ajax_edit_program_form() {
		if(!empty($_POST)) {
			$data['colleges'] 	= $colleges = CV_Settings_College_Finder::findAllActiveCollegeBySchoolId($this->school_id);
			$data['program']	= $program = CV_Settings_Program_Finder::findById(Utilities::decrypt($_POST['h_id']));
			$this->load->view('programs/forms/edit_program.php',$data);
		}
	}
	
	function ajax_insert_update_program() {
		if(!empty($_POST)) {
			$college_id = Utilities::decrypt($_POST['h_college_id']);
			if(!empty($_POST['h_id'])) {
				$id = Utilities::decrypt($_POST['h_id']);
				$pg = CV_Settings_Program_Finder::findById($id);
			} else { 
				$pg = new CV_Settings_Program();
			}
			
			$pg->setSchoolId($this->school_id);
			$pg->setCollegeId($college_id);
			$pg->setProgramCode($_POST['program_code']);
			$pg->setProgramName($_POST['program_name']);
			$pg->setTitle($_POST['full_title']);
			$pg->setDescription($_POST['description']);
			$pg->setDegreeType(CV_Settings_Program::BACHELOR);
			$pg->setIsOffered($_POST['is_offered']);	
			$pg->setIsActive(CV_Settings_Program::YES);
			$pg->save();
			
			CV_Settings_Program_Helper::updateProgramInCourseDesignation($pg);
			CV_Settings_Program_Helper::updateProgramInCourseEnrollees($pg);
		}
	}
	
	
	function ajax_delete_program_form() {
		if(!empty($_POST)) {
			$data['program']= $program = CV_Settings_Program_Finder::findById(Utilities::decrypt($_POST['h_id']));
			$this->load->view('programs/forms/delete_program.php',$data);
		}
	}
	
	function ajax_delete_program() {
		if(!empty($_POST)) {
			$program = CV_Settings_Program_Finder::findById(Utilities::decrypt($_POST['h_id']));
			$program->setIsActive(CV_Courses::NO);
			$program->save();
		}
	}
}
?>