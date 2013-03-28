<?php 
class Curriculum extends CI_Controller {
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
		 Utilities::verifyAccess($this->user_access,'curriculum');
	}
	
	function index() {
		Loader::style('template.css');
		Loader::script('curriculum.js');
		Twitter_Bootstrap::modal();
		Jquery::jq_datatable();
		Jquery::inline_validation();
		Jquery::form();
		Jquery::tipsy();
		Jquery::textboxlist();
		$data['page_title'] = 'E-grade :: Curriculum';
		$data['selected']   = 'curriculum';
		
		$data['programs'] = $programs = CV_Settings_Program_Finder::findAllActiveOfferedProgramsBySchoolId($this->school_id);
		
		$this->load->view('curriculum/index.php',$data);
	}
	
	function ajax_add_curriculum_form() {
		$data['programs'] = $programs = CV_Settings_Program_Finder::findAllActiveOfferedProgramsBySchoolId($this->school_id);
		$this->load->view('curriculum/forms/add_curriculum.php',$data);
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
	
	function ajax_insert_update_curriculum() {
		if(!empty($_POST)) {
			$h_courses = explode(',',$_POST['h_course_id']);
			
			foreach($h_courses as $row=>$value):
				$program_id = Utilities::decrypt($_POST['h_program_id']);
				$course_id	= Utilities::decrypt($value);
				$batch_year	= $_POST['batch_year'];
				$year_level	= $_POST['year_level'];
				$semester	= $_POST['semester'];
			
				$c = CV_Settings_Curriculum_Finder::findById(Utilities::decrypt($_POST['h_id']));
				if(!$c) {
					$c = CV_Settings_Curriculum_Finder::checkIfCurriculumAlreadyExist($this->school_id,$program_id,$course_id,$batch_year,$year_level,$semester);
					if(!$c) {
						$c = new CV_Settings_Curriculum;	
					}
				}
				
				$c->setSchoolId($this->school_id);
				$c->setProgramId($program_id);
				$c->setCourseId($course_id);
				$c->setBatchYear($batch_year);
				$c->setYearLevel($year_level);
				$c->setSemester($semester);
				$c->setIsActive(CV_Settings_Curriculum::YES);
				$c->setIsArchive(CV_Settings_Curriculum::NO);
				$c->save();
			endforeach;
		}
	}
	
	function load_curriculum_list() {
		if(!empty($_POST)) {
			$program_id = Utilities::decrypt($_POST['h_program_id']);
	
			if(!empty($_POST['year_level']) && !empty($_POST['semester'])) {
				$curriculum = CV_Settings_Curriculum_Finder::findAllActiveBySchoolProgramBatchYearFilterByYearLevelSemester($this->school_id,$program_id,$_POST['batch_year'],$_POST['year_level'],$_POST['semester']);
			} else if(!empty($_POST['year_level'])) {
				$curriculum = CV_Settings_Curriculum_Finder::findAllActiveBySchoolProgramBatchYearFilterByYearLevel($this->school_id,$program_id,$_POST['batch_year'],$_POST['year_level']);
			} else if(!empty($_POST['semester'])) {
				$curriculum = CV_Settings_Curriculum_Finder::findAllActiveBySchoolProgramBatchYearFilterBySemester($this->school_id,$program_id,$_POST['batch_year'],$_POST['semester']);
			} else {
				$curriculum = CV_Settings_Curriculum_Finder::findAllBySchoolProgramBatchYear($this->school_id,$program_id,$_POST['batch_year']);
			}
			$data['curriculum'] = $curriculum;
			$this->load->view('curriculum/_curriculum_list.php',$data);
		}
	}
	
	function ajax_delete_course_form() {
		if(!empty($_POST)) {
			$data['curriculum'] =  CV_Settings_Curriculum_Finder::findById(Utilities::decrypt($_POST['h_id']));
			$this->load->view('curriculum/forms/delete_course.php',$data);
		}
	}
	
	function ajax_delete_course() {
		if(!empty($_POST)) {
			$course = CV_Settings_Curriculum_Finder::findById(Utilities::decrypt($_POST['h_id']));
			$course->setIsArchive(CV_Members::NO);
			$course->save();
		}
	}
	
	function ajax_view_course_description() {
		if(!empty($_POST)) {
			$curriculum 	= CV_Settings_Curriculum_Finder::findById(Utilities::decrypt($_POST['h_id']));
			$data['course'] = $a = CV_Courses_Finder::findById($curriculum->getCourseId());
			$this->load->view('curriculum/forms/view_course_description.php',$data);
		}	
	}

}

?>