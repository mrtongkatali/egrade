<?php 
class Courses extends CI_Controller {
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
		 Utilities::verifyAccess($this->user_access,'courses');
	}
	
	function index1(){
		Loader::style('template.css');
		//Loader::script('bootstrap/modal.js');
		Loader::script('bootstrap/tooltip.js');
		Loader::script('courses.js');
		Jquery::jq_datatable();
		
		//$data['page_title'] = 'eGrade | Courses';
		$data['page_title'] = 'E-grade :: Courses';
		$data['selected']   = 'courses';
		$this->load->view('courses/index.php', $data);	
	}
	
	function index() {
		Loader::style('template.css');
		Loader::script('courses.js');
		Twitter_Bootstrap::modal();
		Jquery::jq_datatable();
		Jquery::inline_validation();
		Jquery::form();
		Jquery::tipsy();
		$data['page_title'] = 'E-grade :: Courses';
		$data['selected']   = 'courses';
		
		$this->load->view('courses/index.php',$data);
	}
	
	function load_course_list_dt() {
		$this->load->view('courses/course_list_dt.php');
	}
	
	function load_server_course_list_dt() {
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
	
	function ajax_add_course_form() {
		$data['action_url'] = 'courses/ajax_insert_update_course';
		$this->load->view('courses/forms/add_course.php',$data);
	}
	
	function ajax_edit_course_form() {
		if(!empty($_POST)) {
			$data['action_url'] = 'courses/ajax_insert_update_course';
			$data['course']		= $course = CV_Courses_Finder::findById(Utilities::decrypt($_POST['h_id']));
			$this->load->view('courses/forms/edit_course.php',$data);
		}
	}
	
	function ajax_insert_update_course() {
		if(!empty($_POST)) {
			if(!empty($_POST['h_id'])) {
				$c =  CV_Courses_Finder::findById(Utilities::decrypt($_POST['h_id']));
			} else {
				$c =  new CV_Courses();
			}
			
			$c->setSchoolId($this->school_id);
			$c->setCourseCode($_POST['course_code']);
			$c->setTitle($_POST['title']);
			$c->setDescription($_POST['description']);
			$c->setUnits($_POST['units']);
			$c->setHasLaboratory(CV_Courses::NO);
			$c->setIsActive(CV_Courses::YES);
			$c->save();
			
			$course_id 		= Utilities::decrypt($_POST['h_id']);
			$course_code 	= $_POST['course_code'];
			$course_title	= $_POST['title'];
			
			CV_Course_Designation_Helper::updateCourse($course_id,$course_code,$course_title);
			CV_Course_Enrollees_Helper::updateCourse($course_id,$course_code);
		}
	}
	
	function ajax_delete_course_form() {
		if(!empty($_POST)) {
			$data['action_url'] = 'courses/ajax_delete_course';
			$data['course']		= $course = CV_Courses_Finder::findById(Utilities::decrypt($_POST['h_id']));
			$this->load->view('courses/forms/delete_course.php',$data);
		}
	}
	
	function ajax_delete_course() {
		if(!empty($_POST)) {
			$course = CV_Courses_Finder::findById(Utilities::decrypt($_POST['h_id']));
			$course->setIsActive(CV_Courses::NO);
			$course->save();
		}
	}
}
?>