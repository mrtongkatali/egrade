<?php 

class CV_Settings_College {
	
	public $id;
	public $school_id;
	public $member_id;
	public $college_name;
	public $college_code;
	public $is_active;
	
	const YES 	= 'Yes';
	const NO	= 'No';
	
	public function setId($value) {$this->id = $value;}
	public function getId() {return $this->id;}
	
	public function setSchoolId($value) {$this->school_id = $value;}
	public function getSchoolId() {return $this->school_id;}
	
	public function setMemberId($value) {$this->member_id = $value;}
	public function getMemberId() {return $this->member_id;}
	
	public function setCollegeName($value) {$this->college_name = $value;}
	public function getCollegeName() {return $this->college_name;}
	
	public function setCollegeCode($value) {$this->college_code = $value;}
	public function getCollegeCode() {return $this->college_code;}
	
	public function setIsActive($value) {$this->is_active = $value;}
	public function getIsActive() {return $this->is_active;}

	
	public function save(C_Events $ce) {
		return CV_Settings_College_Manager::save($this);
	}

	public function delete() {
		return CV_Settings_College_Manager::delete($this);
	}
	
	

}
?>
