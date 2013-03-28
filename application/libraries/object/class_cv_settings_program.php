<?php 

class CV_Settings_Program {
	
	public $id;
	public $school_id;
	public $college_id;
	public $program_code;
	public $program_name;
	public $title;
	public $description;
	public $degree_type;
	public $is_offered;
	public $is_active;
	
	const YES 	= 'Yes';
	const NO	= 'No';
	
	const BACHELOR = 'Bachelor';
	
	public function setId($value) {$this->id = $value;}
	public function getId() {return $this->id;}
	
	public function setSchoolId($value) {$this->school_id = $value;}
	public function getSchoolId() {return $this->school_id;}
	
	public function setCollegeId($value) {$this->college_id = $value;}
	public function getCollegeId() {return $this->college_id;}
	
	public function setProgramCode($value) {$this->program_code = $value;}
	public function getProgramCode() {return $this->program_code;}
	
	public function setProgramName($value) {$this->program_name = $value;}
	public function getProgramName() {return $this->program_name;}
	
	public function setTitle($value) {$this->title = $value;}
	public function getTitle() {return $this->title;}
	
	public function setDescription($value) {$this->description = $value;}
	public function getDescription() {return $this->description;}
	
	public function setDegreeType($value) {$this->degree_type = $value;}
	public function getDegreeType() {return $this->degree_type;}
	
	public function setIsOffered($value) {$this->is_offered = $value;}
	public function getIsOffered() {return $this->is_offered;}
	
	public function setIsActive($value) {$this->is_active = $value;}
	public function getIsActive() {return $this->is_active;}

	
	public function save(C_Events $ce) {
		return CV_Settings_Program_Manager::save($this);
	}

	public function delete() {
		return CV_Settings_Program_Manager::delete($this);
	}
	
	

}
?>
