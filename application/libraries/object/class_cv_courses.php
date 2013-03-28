<?php 

class CV_Courses {
	
	public $id;
	public $school_id;
	public $course_code;
	public $title;
	public $description;
	public $units;
	public $has_laboratory;
	public $is_active;
	
	const YES 	= 'Yes';
	const NO	= 'No';
	
	public function setId($value) {$this->id = $value;}
	public function getId() {return $this->id;}
	
	public function setSchoolId($value) {$this->school_id = $value;}
	public function getSchoolId() {return $this->school_id;}
	
	public function setCourseCode($value) {$this->course_code = $value;}
	public function getCourseCode() {return $this->course_code;}
	
	public function setTitle($value) {$this->title = $value;}
	public function getTitle() {return $this->title;}
	
	public function setDescription($value) {$this->description = $value;}
	public function getDescription() {return $this->description;}
	
	public function setUnits($value) {$this->units = $value;}
	public function getUnits() {return $this->units;}
	
	public function setHasLaboratory($value) {$this->has_laboratory = $value;}
	public function getHasLaboratory() {return $this->has_laboratory;}

	
	public function setIsActive($value) {$this->is_active = $value;}
	public function getIsActive() {return $this->is_active;}

	
	public function save(C_Events $ce) {
		return CV_Courses_Manager::save($this);
	}

	public function delete() {
		return CV_Courses_Manager::delete($this);
	}
	
	

}
?>
