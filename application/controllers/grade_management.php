<?php 
class Grade_Management extends CI_Controller {
	function __construct() {
		 parent::__construct();
		 $this->load->library('session');
		 $this->load->library('loader.php');
 		 $this->load->database();

		 Loader::style('style.css');
		 
		 $this->member_session_check();
		 
		 $h_school_id 			= Utilities::encrypt(1);
		 $this->school_id 		= Utilities::decrypt($h_school_id);
		 $this->c_date			= Tools::getCurrentDateTime();
		 $this->c_user			= Utilities::decrypt($_SESSION['egrade']['member_id']); 
		 $this->account_type	= Utilities::decrypt($_SESSION['egrade']['account_type']);
		 
		 $this->user_access = Utilities::decrypt($_SESSION['egrade']['account_type']);
		 Utilities::verifyAccess($this->user_access,'grade_management');
	}
	
	function index() {
		Loader::style('template.css');
		Loader::script('grade_management.js');
		Jquery::tipsy();
		Jquery::jq_datatable();
		/*Twitter_Bootstrap::modal();
		Jquery::inline_validation();
		Jquery::form();
		
		Jquery::textboxlist();*/
		
		$data['page_title'] = 'E-grade :: Grade Management';
		$data['selected']   = 'grade_management';
		
		if($this->account_type == ADMIN) {
			$data['is_exact'] = 'on';
			$this->load->view('grade_management/index.php',$data);	
		} else if($this->account_type == PROFESSOR) {
			$data['courses'] = $courses = CV_Course_Designation_Finder::findAllActiveCourseAssignedToProfessor($this->school_id,$this->c_user);
			$this->load->view('grade_management/professor/index.php',$data);	
		} else if($this->account_type == REGISTRAR) {
			$data['is_exact'] = 'on';
			$this->load->view('grade_management/index.php',$data);
		} else if($this->account_type == STUDENT) {
			$data['school_year'] = $school_year =  CV_Course_Enrollees_Helper::getAllStudentSchoolYear($this->school_id,$this->c_user);
			$this->load->view('grade_management/student/index.php',$data);
		} else if($this->account_type == DEAN) {
			#$this->load->view('grade_management/dean/index.php',$data);
		}
	}
	
	function search_student() {
		if(!empty($_GET)) {
			Loader::style('template.css');
			Loader::script('grade_management.js');

			$data['page_title'] = 'E-grade :: Grade Management';
			$data['selected']   = 'grade_management';
			
			$sql = "
				SELECT id,firstname,middlename,lastname,student_employee_code,program_code,year_level,is_enrolled
				FROM " . CV_MEMBERS . "
				WHERE 
			";
			
			if($_GET['is_exact'] == 'on') {
				$query = Model::safeSql($_GET['query']);
				$sql .= " 
					(
						firstname = {$query} OR
						lastname = {$query} OR
						fullname = {$query} OR
						student_employee_code = {$query}
					) AND
					member_type = " . Model::safeSql(CV_Members::STUDENT) . "
				";
			} else {
				$query = $_GET['query'];
				$sql .= " 
					(
						firstname LIKE '%{$query}%' OR
						lastname LIKE '%{$query}%' OR
						fullname LIKE '%{$query}%' OR
						student_employee_code LIKE '%{$query}%'
					) AND
					member_type = " . Model::safeSql(CV_Members::STUDENT) . "
				";	
			}
			$sql .= " ORDER BY lastname ASC";
			
			$data['is_exact'] = $_GET['is_exact'];
			$data['query'] = $_GET['query'];
			$data['students'] = $students = Model::runSql($sql,true,true);
			$this->load->view('grade_management/index.php',$data);
		} else {
			redirect('grade_management');	
		}
		
	}
	
	function search_course_section() {
		if(!empty($_GET)) {
			Loader::style('template.css');
			Loader::script('grade_management.js');
			Jquery::jq_datatable();
			Jquery::inline_validation();
			Jquery::form();
			Jquery::tipsy();

			$data['page_title'] = 'E-grade :: Grade Management';
			$data['selected']   = 'grade_management';
			
			$sql = "
				SELECT id,course_id,course_code,course_title,section,professor_name,submission_date
				FROM " . CV_COURSE_DESIGNATION . "
				WHERE 
			";
			
			if($_GET['is_exact_course'] == 'on') {
				$query = Model::safeSql($_GET['query']);
				$sql .= " 
					(
						course_code = {$query} OR
						course_title = {$query} OR
						section = {$query}
					)
				";
			} else {
				$query = $_GET['query'];
				$sql .= " 
					(
						course_code LIKE '%{$query}%' OR
						course_title LIKE '%{$query}%' OR
						section LIKE '%{$query}%'
					)
				";	
			}
			$sql .= " AND school_id	 = " . Model::safeSql($this->school_id);
			$sql .= " AND is_archive = " . Model::safeSql(CV_Course_Designation::NO);
			$sql .= " AND is_active = " . Model::safeSql(CV_Course_Designation::YES);
			$sql .= " ORDER BY course_title ASC";

			$data['is_exact_course'] = $_GET['is_exact_course'];
			$data['section_query'] = $_GET['query'];
			$data['courses'] = $courses = Model::runSql($sql,true,true);
			$this->load->view('grade_management/index.php',$data);
			
		} else {
			redirect('grade_management');	
		}
	}
	
	function manage() {
		if(!empty($_GET)) {
			Twitter_Bootstrap::modal();
			Jquery::jq_datatable();
			Jquery::tipsy();
			Jquery::inline_validation();
			Jquery::form();
			
			$id 	= Utilities::decrypt($_GET['h_id']);
			$hash 	= $_GET['access_token'];
			
			Utilities::verifyHash($id,$hash);
			
			Loader::style('template.css');
			Loader::script('grade_management.js');
			
			$data['page_title'] = 'E-grade :: Grade Management';
			$data['selected']   = 'grade_management';
			
			$data['account_type'] = $this->account_type;
			$data['h_course_designation_id'] = $_GET['h_id'];
			$data['cd'] 	= CV_Course_Designation_Finder::findById($id);
			$data['grades'] = $grades = CV_Course_Enrollees_Finder::findAllCurrentlyEnrolledByCourseDesignationId($id,$this->school_id,"ORDER BY m.lastname ASC");
			$this->load->view('grade_management/manage.php',$data);
		}
	}
	
	function load_update_grading_sheet() {
		
		if(!empty($_POST)) {
			$course_designation_id = Utilities::decrypt($_POST['h_course_designation_id']);
			$enrollees = CV_Course_Enrollees_Finder::findAllByCourseDesignationId($course_designation_id,$this->school_id);
			foreach($enrollees as $e):
				$feg 	= 'feg_'.Utilities::encrypt($e->getId());
				$pfg 	= 'pfg_'.Utilities::encrypt($e->getId());
				$fg 	= 'fg_'.Utilities::encrypt($e->getId());
				$is_p 	= 'is_passed_'.Utilities::encrypt($e->getId());
				$e->setFinalExamGrade($_POST[$feg]);
				$e->setPreFinalGrade($_POST[$pfg]);
				$e->setFinalGrade($_POST[$fg]);
				$e->setIsPassed($_POST[$is_p]);
				$e->save();
			endforeach;	
		}
	}

	function load_grading_sheet_form() {
		if(!empty($_POST)) {
			$id = Utilities::decrypt($_POST['h_id']);
			$data['enrollee'] = $enrollee = CV_Course_Enrollees_Finder::findById($id);
			$this->load->view('grade_management/forms/grading_sheet.php',$data);
		}
	}
	
	function load_enrollee_list_dt() {
		$data['h_course_designation_id'] = $_POST['h_course_designation_id'];
		$this->load->view('grade_management/_enrollee_list_dt.php',$data);
	}
	
	function load_server_enrollee_list_dt() {
		Utilities::ajaxRequest();
		
		$condition = ' is_active = ' . Model::safeSql(CV_Courses::YES);
		
		$dt = new Datatable();
		$c  = $_GET['iDisplayStart'];
		$dt->setPagination(1);
		$dt->setStart(1);
		$dt->setStartIndex(0);
		$dt->setDbTable(CV_COURSES);
		$dt->setCustomField();
		$dt->setJoinTable();			
		$dt->setJoinFields();
		$dt->setCondition($condition);
		$dt->setColumns('course_code,title,units');
		$dt->setOrder('ASC');
		$dt->setStartIndex(0);
		$dt->setSort(0);		
		$dt->setNumCustomColumn(1);
		$dt->setCustomColumn(	
		array(
		'1' => '<div class=\"i_container\"><ul class=\"dt_icons\"><li><a title=\"Edit\" id=\"edit\" class=\"ui-icon ui-icon-pencil g_icon\" href=\"javascript:void(0);\" onclick=\"javascript:_showEditCourseForm(\'e_id\');\"></a></li><li><a title=\"Delete\" id=\"delete\" class=\"ui-icon ui-icon-trash g_icon\" href=\"javascript:void(0);\" onclick=\"javascript:_deleteCourseDialog(\'e_id\')\"></a></li></ul></div>'));
		echo $dt->constructDataTable();
	}
	
	function manage_student(){
		if(!empty($_GET)) {
			Twitter_Bootstrap::modal();
			Jquery::tipsy();
			Jquery::inline_validation();
			Jquery::form();
			
			$id 	= Utilities::decrypt($_GET['h_id']);
			$hash 	= $_GET['access_token'];
			
			Utilities::verifyHash($id,$hash);
			Loader::style('template.css');
			Loader::script('grade_management.js');
			
			$data['page_title'] = 'E-grade :: Grade Management';
			$data['selected']   = 'grade_management';
			
			$data['student'] = $student = CV_Members_Finder::findById($id);
			$data['courses'] = $courses = CV_Course_Enrollees_Finder::findAllCoursesEnrolledByStudentId($id,'ORDER BY id DESC');
			$this->load->view('grade_management/manage.php',$data);
				
		} else {
			redirect('grade_management');	
		}
	}
	
	function load_student_grade() {
		if(!empty($_POST)) {
			$school_year 	= $_POST['school_year'];
			$semester 		= $_POST['semester'];
			
			$data['school_year'] = $school_year;
			$data['semester'] = $semester;
			$data['grades'] = $grades = CV_Course_Designation_Finder::findAllStudentGradeBySchoolYearSemester($this->school_id,$this->c_user,$school_year,$semester);
			$this->load->view('grade_management/student/grade_list.php',$data);
		}
	}
	
	function download_student_grade() {
		if(!empty($_POST)) {
			ini_set("memory_limit", "999M");
			set_time_limit(999999999999999999999);
	
			$school_year 	= $_POST['school_year'];
			$semester 		= $_POST['semester'];
			$member = CV_Members_Finder::findById($this->c_user);
			$data['grades'] = $grades = CV_Course_Designation_Finder::findAllStudentGradeBySchoolYearSemester($this->school_id,$this->c_user,$school_year,$semester);
			$data['filename'] = $member->getLastName()."-grade_{$school_year}.xls";
			$this->load->view('grade_management/student/grade_list_excel.php',$data);
		}
	}
	
	function load_course_list_dt() {
		$this->load->view('grade_management/professor/dean/course_list_dt.php');
	}
	
	function load_server_course_list_dt() {
		Utilities::ajaxRequest();
		$college_id = CV_Settings_College_Helper::getCollegeByMemberId($this->c_user);
		
		$condition = " is_active = " . Model::safeSql("Yes"); 
		$condition .= " AND is_archive = " . Model::safeSql("No");
		$condition .= " AND school_id = " . Model::safeSql($this->school_id);
		$condition .= " AND college_id = " . Model::safeSql($college_id);
		
		$dt = new Datatable();
		$c  = $_GET['iDisplayStart'];
		$dt->setPagination(1);
		$dt->setStart(1);
		$dt->setStartIndex(0);
		$dt->setDbTable(CV_COURSE_DESIGNATION);
		$dt->setCustomField();
		$dt->setCondition($condition);
		$dt->setColumns('course_code,course_title,section,professor_name');
		$dt->setOrder('ASC');
		$dt->setStartIndex(0);
		$dt->setSort(0);		
		$dt->setNumCustomColumn(1);
		$dt->setCustomColumn(	
		array(
		'1' => '<div class=\"i_container\"><ul class=\"dt_icons\"><li><a title=\"View\" id=\"view\" class=\"ui-icon ui-icon-search g_icon\" href=\"' . url('grade_management/view_list?h_id=id') . '\"></a></li></ul></div>'));
		echo $dt->constructDataTable();
	}
	
	function view_list() {
		if(!empty($_GET)) {
			Twitter_Bootstrap::modal();
			Jquery::jq_datatable();
			Jquery::tipsy();
			Jquery::inline_validation();
			Jquery::form();
			
			$id 	= Utilities::decrypt($_GET['h_id']);
			$hash 	= $_GET['access_token'];
			
			Utilities::verifyHash($id,$hash);
			
			Loader::style('template.css');
			Loader::script('grade_management.js');
			
			$data['page_title'] = 'E-grade :: Grade Management';
			$data['selected']   = 'grade_management';
			
			$data['account_type'] = $this->account_type;
			$data['h_course_designation_id'] = $_GET['h_id'];
			$data['cd'] 	= CV_Course_Designation_Finder::findById($id);
			$data['grades'] = $grades = CV_Course_Enrollees_Finder::findAllCurrentlyEnrolledByCourseDesignationId($id,$this->school_id,"ORDER BY m.lastname ASC");
			$this->load->view('grade_management/professor/dean/view_list.php',$data);
		}
	}
}
?>