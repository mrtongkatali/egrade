<?php 
class Professors extends CI_Controller {
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
		 Utilities::verifyAccess($this->user_access,'professors');
	}
	
	function index() {
		Loader::style('template.css');
		Loader::script('professors.js');
		Twitter_Bootstrap::modal();
		Jquery::jq_datatable();
		Jquery::inline_validation();
		Jquery::form();
		Jquery::tipsy();
		$data['page_title'] = 'E-grade :: Professors';
		$data['selected']   = 'professors';
		
		$this->load->view('professors/index.php',$data);
	}
	
	function load_professor_list_dt() {
		$this->load->view('professors/professor_list_dt.php');
	}
	
	function load_server_pofessor_list_dt() {
		Utilities::ajaxRequest();
		
		$condition =  ' ' . CV_MEMBERS.'.is_active 			= ' . Model::safeSql(CV_Members::YES);
		$condition .= ' AND ' . CV_MEMBERS . '.member_type 	= ' . Model::safeSql(CV_Members::PROFESSOR);
		$condition .= ' AND ' . CV_MEMBERS . '.school_id 	= ' . Model::safeSql($this->school_id);
		$condition .= ' AND c.school_id = ' . Model::safeSql($this->school_id);
		
		//$join = " LEFT JOIN " . CV_SETTINGS_COLLEGE . " c ON m.id = " . CV_MEMBERS . ".college_id ";
		
		$dt = new Datatable();
		$c  = $_GET['iDisplayStart'];
		$dt->setPagination(1);
		$dt->setStart(1);
		$dt->setStartIndex(0);
		$dt->setDbTable(CV_MEMBERS);
		$dt->setJoinTable("LEFT JOIN " . CV_SETTINGS_COLLEGE . " c");
		$dt->setJoinFields(CV_MEMBERS . ".college_id = c.id");
		$dt->setCustomField();
		$dt->setCondition($condition);
		$dt->setColumns('student_employee_code,college_code,fullname,gender,email_address,mobile_number');
		$dt->setOrder('ASC');
		$dt->setStartIndex(0);
		$dt->setSort(0);		
		$dt->setNumCustomColumn(1);
		$dt->setCustomColumn(	
		array(
		'1' => '<div class=\"i_container\"><ul class=\"dt_icons\"><li><a title=\"Edit\" id=\"edit\" class=\"ui-icon ui-icon-pencil g_icon\" href=\"javascript:void(0);\" onclick=\"javascript:_showEditProfessorForm(\'e_id\');\"></a></li><li><a title=\"Delete\" id=\"delete\" class=\"ui-icon ui-icon-trash g_icon\" href=\"javascript:void(0);\" onclick=\"javascript:_deleteProfessorDialog(\'e_id\')\"></a></li></ul></div>'));
		echo $dt->constructDataTable();
	}
	
	function ajax_add_professor_form() {
		$next_id 	= CV_Members_Helper::getNextId();
		$data['colleges']		= $c = CV_Settings_College_Finder::findAllActiveCollegeBySchoolId($this->school_id);
		$data['student_number']	= date('Ym') .str_pad($next_id, 3, "00", STR_PAD_LEFT);
		$this->load->view('professors/forms/add_professor.php',$data);
	}
	
	function ajax_edit_professor_form() {
		if(!empty($_POST)) {
			$data['professor']	= CV_Members_Finder::findById(Utilities::decrypt($_POST['h_id']));
			$data['colleges']	= $c = CV_Settings_College_Finder::findAllActiveCollegeBySchoolId($this->school_id);
			$data['action_url'] = 'students/ajax_insert_update_professor';
			$data['course']		= $course = CV_Courses_Finder::findById(Utilities::decrypt($_POST['h_id']));
			$this->load->view('professors/forms/edit_professor.php',$data);
		}
	}
	
	function ajax_insert_update_professor() {
		if(!empty($_POST)) {
			if(!empty($_POST['h_id'])) {
				$m =  CV_Members_Finder::findById(Utilities::decrypt($_POST['h_id']));
			} else {
				$m =  new CV_Members();
				
				$m->setStudentEmployeeCode($_POST['professor_number']);
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
			$m->setCollegeId(Utilities::decrypt($_POST['h_college_id']));
			$m->setMemberType(CV_Members::PROFESSOR);
			$m->save();
			
			CV_Members_Helper::updateProfessorInCourseDesignation($m);
			CV_Members_Helper::updateProfessorInCourseEnrollees($m);
			CV_Members_Helper::updateMemberInLogin($m);

		}
	}
	
	function ajax_delete_professor_form() {
		if(!empty($_POST)) {
			$data['student'] 	=  CV_Members_Finder::findById(Utilities::decrypt($_POST['h_id']));
			$this->load->view('professors/forms/delete_professor.php',$data);
		}
	}
	
	function ajax_delete_professors() {
		if(!empty($_POST)) {
			$member = CV_Members_Finder::findById(Utilities::decrypt($_POST['h_id']));
			$member->setIsActive(CV_Members::NO);
			$member->save();
		}
	}
}
?>