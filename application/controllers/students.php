<?php 
class Students extends CI_Controller {
	function __construct() {
		 parent::__construct();
		 $this->load->library('session');
		 $this->load->library('loader.php');
 		 $this->load->database();

		 Loader::style('style.css');
		 
		 $this->member_session_check();
		 
		 $h_school_id 		= Utilities::encrypt(1);
		 $this->school_id 	= Utilities::decrypt($h_school_id);
		 $this->c_date 		= Tools::getCurrentDateTime('Y-m-d H:i:s');
		 
		 $this->user_access = Utilities::decrypt($_SESSION['egrade']['account_type']);
		 Utilities::verifyAccess($this->user_access,'students');
	}
	
	function index() {
		Loader::style('template.css');
		Loader::script('students.js');
		Twitter_Bootstrap::modal();
		Jquery::jq_datatable();
		Jquery::inline_validation();
		Jquery::form();
		Jquery::tipsy();
		$data['page_title'] = 'E-grade :: Students';
		$data['selected']   = 'students';
		
		$this->load->view('students/index.php',$data);
	}
	
	function load_student_list_dt() {
		$this->load->view('students/student_list_dt.php');
	}
	
	function load_server_student_list_dt() {
		Utilities::ajaxRequest();
		
		$condition =  ' is_active 		= ' . Model::safeSql(CV_Members::YES);
		$condition .= ' AND member_type = ' . Model::safeSql(CV_Members::STUDENT);
		$condition .= ' AND school_id 	= ' . Model::safeSql($this->school_id);
		
		$dt = new Datatable();
		$c  = $_GET['iDisplayStart'];
		$dt->setPagination(1);
		$dt->setStart(1);
		$dt->setStartIndex(0);
		$dt->setDbTable(CV_MEMBERS);
		$dt->setCustomField();
		$dt->setJoinTable();			
		$dt->setJoinFields();
		$dt->setCondition($condition);
		$dt->setColumns('student_employee_code,fullname,gender,email_address,mobile_number,program_code,year_level');
		$dt->setOrder('ASC');
		$dt->setStartIndex(0);
		$dt->setSort(0);		
		$dt->setNumCustomColumn(1);
		$dt->setCustomColumn(	
		array(
		'1' => '<div class=\"i_container\"><ul class=\"dt_icons\"><li><a title=\"Edit\" id=\"edit\" class=\"ui-icon ui-icon-pencil g_icon\" href=\"javascript:void(0);\" onclick=\"javascript:_showEditStudentForm(\'e_id\');\"></a></li><li><a title=\"Delete\" id=\"delete\" class=\"ui-icon ui-icon-trash g_icon\" href=\"javascript:void(0);\" onclick=\"javascript:_deleteStudentDialog(\'e_id\')\"></a></li></ul></div>'));
		echo $dt->constructDataTable();
	}
	
	function ajax_add_student_form() {
		$next_id 	= CV_Members_Helper::getNextId();
		
		$data['programs']		= $p = CV_Settings_Program_Finder::findAllActiveOfferedProgramsBySchoolId($this->school_id);
		$data['student_number']	= date('Ym') .str_pad($next_id, 4, "00", STR_PAD_LEFT);
		$data['action_url'] 	= 'students/ajax_insert_update_student';
		$this->load->view('students/forms/add_student.php',$data);
	}
	
	function ajax_edit_student_form() {
		if(!empty($_POST)) {
			$data['student']	= CV_Members_Finder::findById(Utilities::decrypt($_POST['h_id']));
			$data['programs']	= CV_Settings_Program_Finder::findAllActiveOfferedProgramsBySchoolId($this->school_id);
			$data['action_url'] = 'students/ajax_insert_update_student';
			$data['course']		= $course = CV_Courses_Finder::findById(Utilities::decrypt($_POST['h_id']));
			$this->load->view('students/forms/edit_student.php',$data);
		}
	}
	
	function ajax_insert_update_student() {
		if(!empty($_POST)) {
			if(!empty($_POST['h_id'])) {
				$m =  CV_Members_Finder::findById(Utilities::decrypt($_POST['h_id']));
			} else {
				$m =  new CV_Members();
				
				$m->setStudentEmployeeCode($_POST['student_number']);
				$m->setIsEnrolled(CV_Members::YES);
				$m->setIsActive(CV_Members::YES);
				$m->setDisplayImage($_FILES['display_image']['type']);
				$m->setDateAdded($this->c_date);
			}
			
			$program = CV_Settings_Program_Finder::getProgramCodeById(Utilities::decrypt($_POST['h_program_id']));
			
			$m->setSchoolId($this->school_id);
			$m->setFirstName($_POST['firstname']);
			$m->setMiddleName($_POST['middlename']);
			$m->setLastName($_POST['lastname']);
			$m->setFullName();
			$m->setGender($_POST['gender']);
			$m->setBirthDate($_POST['birthdate']);
			$m->setEmailAddress($_POST['email_address']);
			$m->setAddress($_POST['address']);
			$m->setPhoneNumber($_POST['phone_number']);
			$m->setMobileNumber($_POST['mobile_number']);
			$m->setProgramId($program->getId());
			$m->setProgramCode($program->getProgramCode());
			$m->setYearLevel($_POST['year_level']);
			$m->setMemberType(CV_Members::STUDENT);
			
			$m->save();
			
			CV_Members_Helper::updateStudentInCourseEnrollees($m);
			CV_Members_Helper::updateMemberInLogin($m);
		}
	}
	
	function ajax_delete_student_form() {
		if(!empty($_POST)) {
			$data['action_url'] = 'students/ajax_delete_student';
			$data['student'] 	=  CV_Members_Finder::findById(Utilities::decrypt($_POST['h_id']));
			$this->load->view('students/forms/delete_student.php',$data);
		}
	}
	
	function ajax_delete_student() {
		if(!empty($_POST)) {
			$member = CV_Members_Finder::findById(Utilities::decrypt($_POST['h_id']));
			$member->setIsActive(CV_Members::NO);
			$member->save();
		}
	}
}
?>