<?php 
class Course_Management extends CI_Controller {
	function __construct() {
		 parent::__construct();
		 $this->load->library('session');
		 $this->load->library('loader.php');
 		 $this->load->database();

		 Loader::style('style.css');
		 
		 $this->member_session_check();
		 
		 $h_school_id 		= Utilities::encrypt(1);
		 $this->school_id 	= Utilities::decrypt($h_school_id);
		 $this->c_date		= Tools::getCurrentDateTime();
		 $this->c_user	= Utilities::decrypt($_SESSION['egrade']['member_id']);
		 
		 $this->user_access = Utilities::decrypt($_SESSION['egrade']['account_type']);
		 Utilities::verifyAccess($this->user_access,'course_management');
	}
	
	function index() {
		Loader::style('template.css');
		Loader::script('course_management.js');
		Twitter_Bootstrap::modal();
		Jquery::jq_datatable();
		Jquery::inline_validation();
		Jquery::form();
		Jquery::tipsy();
		Jquery::textboxlist();
		$data['page_title'] = 'E-grade :: Course Management';
		$data['selected']   = 'course_management';
		$data['programs'] 	= $programs = CV_Settings_Program_Finder::findAllActiveOfferedProgramsBySchoolId($this->school_id);
		
		$data['opened_course'] = $opened_course = CV_Course_Designation_Finder::findAllGroupOpenedCourse();
		$this->load->view('course_management/index.php',$data);
	}
	
	function load_open_course_form() {
		$data['programs'] = $programs = CV_Settings_Program_Finder::findAllActiveOfferedProgramsBySchoolId($this->school_id);
		$this->load->view('course_management/forms/open_course.php',$data);
	}
	
	function ajax_get_course_autocomplete() {
		$q = Model::safeSql(strtolower($_GET["search"]), false);
		
		if ($q != '') {
			$courses = CV_Courses_Finder::searchByTitleOrCourseCode($q);
			
			foreach ($courses as $c) {
				$response[] = array(Utilities::encrypt($c->getId()), $c->getCourseCode(), null);
			}
		}
		
		if(count($response) == 0) {
			$response = '';
		}
		header('Content-type: application/json');
		echo json_encode($response);		
	}
	
	function ajax_get_professor_autocomplete() {
		$q = Model::safeSql(strtolower($_GET["search"]), false);
		
		if ($q != '') {
			$members = CV_Members_Finder::searchActiveProfessorByFullName($q);
			
			foreach ($members as $m) {
				$response[] = array(Utilities::encrypt($m->getId()), $m->getFullName(), null);
			}
		}
		
		if(count($response) == 0) {
			$response = '';
		}
		header('Content-type: application/json');
		echo json_encode($response);		
	}
	
	function insert_update_open_course() {
		if(!empty($_POST)) {
		
			$program_id 	= Utilities::decrypt($_POST['h_program_id']);
			$course_id 		= Utilities::decrypt($_POST['h_course_id']);
			$professor_id	= Utilities::decrypt($_POST['h_professor_id']);
			$school_year 	= $_POST['school_year'];
			$semester		= $_POST['semester'];
			$section		= $_POST['section'];
			
			if(!$_POST['h_id']) {
				$cd = CV_Course_Designation_Finder::findDuplicateOpenedCourse($this->school_id,$program_id,$course_id,$school_year,$semester,$section);
				if(!$cd) {
					$cd = new CV_Course_Designation;
					$current_date 	= $this->c_date;
				}
			} else {
				$cd = 	CV_Course_Designation_Finder::findById(Utilities::decrypt($_POST['h_id']));
			}
			
			$program	= CV_Settings_Program_Finder::findById($program_id);
			$course 	= CV_Courses_Finder::findById(Utilities::decrypt($_POST['h_course_id']));
			$professor 	= CV_Members_Finder::findById($professor_id); 
			
			if($course) {
				$course_name = $course->getTitle();
				$course_code = $course->getCourseCode();
			}
			if($professor) {$professor_name = $professor->getFullName(); }
			if($program) {
				$program_code 	= $program->getProgramCode();
				$college_id		= $program->getCollegeId();
			}
			
			$cd->setSchoolId($this->school_id);
			$cd->setCollegeId($college_id);
			$cd->setProgramId(Utilities::decrypt($_POST['h_program_id']));
			$cd->setProgramCode($program_code);
			$cd->setCourseId(Utilities::decrypt($_POST['h_course_id']));
			$cd->setCourseCode($course_code);
			$cd->setCourseTitle($course_name);
			$cd->setSchoolYear($_POST['school_year']);
			$cd->setSemester($_POST['semester']);
			$cd->setSection($_POST['section']);
			$cd->setProfessorId($professor_id);
			$cd->setProfessorName($professor_name);
			$cd->setRemarks($_POST['remarks']);
			$cd->setSubmissionDate($_POST['submission_date']);
			$cd->setAddedBy(Utilities::decrypt($_SESSION['egrade']['member_id']));
			$cd->setIsActive(CV_Course_Designation::YES);
			$cd->setIsArchive(CV_Course_Designation::NO);
			$cd->setDateAdded($current_date);
			$cd->save();
		}
	}
	
	function load_opened_course_list_dt() {
		$this->load->view('course_management/_opened_course_list_dt.php');
	}
	
	function load_server_opened_course_list_dt() {
		Utilities::ajaxRequest();
		$condition = ' is_active = ' . Model::safeSql(CV_Courses::YES) . ' AND is_archive = '. Model::safeSql(CV_Courses::NO);
		
		$dt = new Datatable();
		$c  = $_GET['iDisplayStart'];
		$dt->setPagination(1);
		$dt->setStart(1);
		$dt->setStartIndex(0);
		$dt->setDbTable(CV_COURSE_DESIGNATION);
		$dt->setCustomField();
		$dt->setJoinTable();			
		$dt->setJoinFields();
		$dt->setCondition($condition);
		$dt->setColumns('program_code,course_title,school_year,semester,section,professor_name');
		$dt->setOrder('ASC');
		$dt->setStartIndex(0);
		$dt->setSort(0);		
		$dt->setNumCustomColumn(1);
		$dt->setCustomColumn(	
		array(
		'1' => '<div class=\"i_container\"><ul class=\"dt_icons\"><li><a title=\"Edit\" id=\"edit\" class=\"ui-icon ui-icon-pencil g_icon\" href=\"javascript:void(0);\" onclick=\"javascript:_editOpenedCourseDialog(\'e_id\');\"></a></li><li><a title=\"Delete\" id=\"delete\" class=\"ui-icon ui-icon-trash g_icon\" href=\"javascript:void(0);\" onclick=\"javascript:_deleteOpenedCourseDialog(\'e_id\')\"></a></li></ul></div>'));
		echo $dt->constructDataTable();
	}
	
	function load_edit_opened_course_form() {
		if(!empty($_POST)) {
			$data['cd'] = $cd = CV_Course_Designation_Finder::findById(Utilities::decrypt($_POST['h_id']));
			$this->load->view('course_management/forms/edit_opened_course.php',$data);
		}
	}
	
	function load_delete_opened_course_form() {
		if(!empty($_POST)) {
			$data['cd'] = $cd = CV_Course_Designation_Finder::findById(Utilities::decrypt($_POST['h_id']));
			$this->load->view('course_management/forms/delete_opened_course.php',$data);
		}
	}
	
	function load_delete_opened_course() {
		if(!empty($_POST)) {
			$cd = CV_Course_Designation_Finder::findById(Utilities::decrypt($_POST['h_id']));
			$cd->setIsArchive(CV_Course_Designation::YES);
			$cd->save();
		}
	}
	
	function load_curriculum_list() {
		if(!empty($_POST)) {
			$program_id = Utilities::decrypt($_POST['h_program_id']);
			$curriculum = CV_Settings_Curriculum_Finder::findAllBySchoolProgramBatchYear($this->school_id,$program_id,$_POST['batch_year']);
			
			$data['curriculum'] = $curriculum;
			$this->load->view('course_management/_curriculum_list.php',$data);
		}
	}
	
	function load_open_course_modal_form() {
		if(!empty($_POST)) {
			$data['h_program_id'] 	= $program_id = $_POST['h_program_id'];
			$data['course'] 		= $course = CV_Courses_Finder::findById(Utilities::decrypt($_POST['h_course_id']));
			$this->load->view('course_management/forms/open_course_via_curriculum.php',$data);
		}
	}
	
	function load_add_enrollees_form() {
		$data['programs'] = $programs = CV_Settings_Program_Finder::findAllActiveOfferedProgramsBySchoolId($this->school_id);
		$this->load->view('course_management/enrollees/forms/add_enrollees_form.php',$data);
	}
	
	function load_dropdown_opened_course_list() {
		if(!empty($_POST)) {
			$program_id = Utilities::decrypt($_POST['h_enrollee_program_id']);
			$data['designated_course'] = $designated_course =  CV_Course_Designation_Finder::findAllActiveOpenedCourse($this->school_id,$program_id);
			$this->load->view('course_management/enrollees/opened_course_dropdown_list.php',$data);
		}
	}
	
	function ajax_get_student_autocomplete() {
		$q = Model::safeSql(strtolower($_GET["search"]), false);
		
		if ($q != '') {
			$members = CV_Members_Finder::searchActiveStudentByFullName($q);
			
			foreach ($members as $m) {
				$response[] = array(Utilities::encrypt($m->getId()), $m->getFullName(), null);
			}
		}
		
		if(count($response) == 0) {
			$response = '';
		}
		header('Content-type: application/json');
		echo json_encode($response);		
	}
	
	function insert_update_enrollees() {
		if(!empty($_POST)) {
			
			$enrollee_program_id	= Utilities::decrypt($_POST['h_enrollee_program_id']);
			$course_desgination_id 	= Utilities::decrypt($_POST['h_course_designated_id']);
			$arr_enrollees_id		= explode(',',$_POST['h_enrollees_id']);
			
			$cd 		= CV_Course_Designation_Finder::findById($course_desgination_id);
			$program	= CV_Settings_Program_Finder::findById($enrollee_program_id);
			
			if($program) {
				$program_id		= $program->getId();
				$program_code 	= $program->getProgramCode(); 
			}
			if($cd) {
				$course_id		= $cd->getCourseId();
				$course_code	= $cd->getCourseCode();
				$professor_id 	= $cd->getProfessorId();
				$professor_name	= $cd->getProfessorName();
			}
			
			foreach($arr_enrollees_id as $h_id):
				if($_POST['h_id']) {
					
				} else {
					$ce = CV_Course_Enrollees_Finder::checkIfAlreadyEnrolled($course_desgination_id,Utilities::decrypt($h_id));
					if(!$ce) {
						$ce = new CV_Course_Enrollees($row['id']);
					}
				}
				
				$ce->setSchoolId($this->school_id);	
				$ce->setCourseDesignationId($course_desgination_id);
				$ce->setProgramId($program_id);
				$ce->setProgramCode($program_code);
				$ce->setCourseId($course_id);
				$ce->setCourseCode($course_code);
				$ce->setProfessorId($professor_id);
				$ce->setProfessorName($professor_name);
				
				$student = CV_Members_Finder::findById(Utilities::decrypt($h_id));
				if($student) {
					$student_id		= $student->getId();
					$student_name 	= $student->getFullName();
					$student_code 	= $student->getStudentEmployeeCode();
				}
				
				$ce->setStudentId($student_id);
				$ce->setStudentCode($student_code);
				$ce->setStudentName($student_name);
				$ce->setAsFailed();
				$ce->setAsNotArchive();
				$ce->setDateAdded($this->c_date);
				$ce->setEnrolledBy($this->c_user);
				$ce->setAsCurrentlyEnrolled();
				$ce->save();
			
			endforeach;
		}
	}
	
	function load_course_available_section_dropdown() {	
		if(!empty($_POST)) {
			$course_id = Utilities::decrypt($_POST['h_opened_course_id']);
			$data['available_sections'] = $available_sections = CV_Course_Designation_Finder::findAllAvailableSectionByCourseId($course_id);
			if($available_sections) {
				$this->load->view('course_management/enrollees/course_available_section_dropdown.php',$data);
			}
		}
	}
	
	function load_enrollee_list_dt() {
		$this->load->view('course_management/enrollees/_enrollee_list_dt.php');
	}
	
	function load_server_enrollee_list_dt() {
		Utilities::ajaxRequest();
		$condition = ' is_archive = '. Model::safeSql(CV_Courses::NO);
		$condition .= ' AND course_designation_id = ' . Utilities::decrypt($_GET['h_section_id']);
		
		$dt = new Datatable();
		$c  = $_GET['iDisplayStart'];
		$dt->setPagination(1);
		$dt->setStart(1);
		$dt->setStartIndex(0);
		$dt->setDbTable(CV_COURSE_ENROLLEES);
		$dt->setCustomField();
		$dt->setJoinTable();			
		$dt->setJoinFields();
		$dt->setCondition($condition);
		$dt->setColumns('program_code,student_code,student_name,is_passed');
		$dt->setOrder('ASC');
		$dt->setStartIndex(0);
		$dt->setSort(0);		
		$dt->setNumCustomColumn(1);
		$dt->setCustomColumn(	
		array(
		'1' => '<div class=\"i_container\"><ul class=\"dt_icons\"><li><a title=\"Delete\" id=\"delete\" class=\"ui-icon ui-icon-trash g_icon\" href=\"javascript:void(0);\" onclick=\"javascript:_deleteEnrolleeDialog(\'e_id\')\"></a></li></ul></div>'));
		echo $dt->constructDataTable();
	}
	
	function load_delete_enrollee_form() {
		if(!empty($_POST)) {
			$id = Utilities::decrypt($_POST['h_id']);
			$data['ce'] = $ce = CV_Course_Enrollees_Finder::findById($id);
			$this->load->view('course_management/enrollees/forms/delete_enrollee.php',$data);
		}
	}
	
	function load_delete_enrollee() {
		if(!empty($_POST)) {
			$cd = CV_Course_Enrollees_Finder::findById(Utilities::decrypt($_POST['h_id']));
			$cd->delete();
		}
	}
}
?>