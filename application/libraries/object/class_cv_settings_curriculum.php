<?php 

class CV_Settings_Curriculum {
	
	public $id;
	public $school_id;
	public $program_id;
	public $course_id;
	public $batch_year;
	public $year_level;
	public $semester;
	public $is_active;
	public $is_archive;
	
	const YES 	= 'Yes';
	const NO	= 'No';
	
	public function setId($value) {$this->id = $value;}
	public function getId() {return $this->id;}
	
	public function setSchoolId($value) {$this->school_id = $value;}
	public function getSchoolId() {return $this->school_id;}
	
	public function setProgramId($value) {$this->program_id = $value;}
	public function getProgramId() {return $this->program_id;}
	
	public function setCourseId($value) {$this->course_id = $value;}
	public function getCourseId() {return $this->course_id;}
	
	public function setBatchYear($value) {$this->batch_year = $value;}
	public function getBatchYear() {return $this->batch_year;}
	
	public function setYearLevel($value) {$this->year_level = $value;}
	public function getYearLevel() {return $this->year_level;}
	
	public function setSemester($value) {$this->semester = $value;}
	public function getSemester() {return $this->semester;}
		
	public function setIsActive($value) {$this->is_active = $value;}
	public function getIsActive() {return $this->is_active;}
	
	public function setIsArchive($value) {$this->is_archive = $value;}
	public function getIsArchive() {return $this->is_archive;}

	
	public function save(C_Events $ce) {
		return CV_Settings_Curriculum_Manager::save($this);
	}

	public function delete() {
		return CV_Settings_Curriculum_Manager::delete($this);
	}
	
	

}
?>
