<?php
class CV_Members {

	public $id;
	public $school_id;
	public $firstname;
	public $middlename;
	public $lastname;
	public $fullname;
	public $gender;
	public $birthdate;
	public $email_address;
	public $address;
	public $phone_number;
	public $mobile_number;
	public $student_employee_code;
	public $program_id;
	public $program_code;
	public $year_level;
	public $semester;
	public $college_id;
	public $is_enrolled;
	public $is_active;
	public $member_type;
	public $display_image;
	public $date_added;
	
	const YES 	= 'Yes';
	const NO	= 'No';
	
	const ADMIN			= 'Admin';
	const REGISTRAR 	= 'Registrar';
	const DEAN			= 'Dean';
	const PROFESSOR		= 'Professor';
	const STUDENT		= 'Student';
	
	const MALE			= 'Male';
	const FEMALE		= 'Female';
	
	public function setId($value) { $this->id = $value; }
	public function getId() { return $this->id; }
	
	public function setSchoolId($value) {$this->school_id = $value;}
	public function getSchoolId() {return $this->school_id;}
	
	public function setFirstName($value) {$this->firstname = $value;}
	public function getFirstName() {return $this->firstname;}
	
	public function setMiddleName($value) {$this->middlename = $value;}
	public function getMiddleName() {return $this->middlename;}
	
	public function setLastName($value) {$this->lastname = $value;}
	public function getLastName() {return $this->lastname;}
	
	public function setFullName($value) {$this->fullname = $this->firstname . ' ' . $this->lastname;}
	public function getFullName() {return $this->fullname;}
	
	public function setGender($value) {$this->gender = $value;}
	public function getGender() {return $this->gender;}
	
	public function setBirthDate($value) {$this->birthdate = $value;}
	public function getBirthDate() {return $this->birthdate;}
	
	public function setEmailAddress($value) {$this->email_address = $value;}
	public function getEmailAddress() {return $this->email_address;}
	
	public function setAddress($value) {$this->address = $value;}
	public function getAddress() {return $this->address;}
	
	public function setPhoneNumber($value) {$this->phone_number = $value;}
	public function getPhoneNumber() {return $this->phone_number;}
	
	public function setMobileNumber($value) {$this->mobile_number = $value;}
	public function getMobileNumber() {return $this->mobile_number;}
	
	public function setStudentEmployeeCode($value) {$this->student_employee_code = $value;}
	public function getStudentEmployeeCode() {return $this->student_employee_code;}
	
	public function setProgramId($value) {$this->program_id = $value;}
	public function getProgramId() {return $this->program_id;}
	
	public function setProgramCode($value) {$this->program_code = $value;}
	public function getProgramCode() {return $this->program_code;}
	
	public function setYearLevel($value) {$this->year_level = $value;}
	public function getYearLevel() {return $this->year_level;}
	
	public function setSemester($value) {$this->semester = $value;}
	public function getSemester() {return $this->semester;}
	
	public function setCollegeId($value) {$this->college_id = $value;}
	public function getCollegeId() {return $this->college_id;}
	
	public function setIsEnrolled($value) {$this->is_enrolled = $value;}
	public function getIsEnrolled() {return $this->is_enrolled;}
	
	public function setIsActive($value) {$this->is_active = $value;}
	public function getIsActive() {return $this->is_active;}
	
	public function setMemberType($value) {$this->member_type = $value;}
	public function getMemberType() {return $this->member_type;}
	
	public function setDisplayImage($value) {$this->display_image = $value;}
	public function getDisplayImage() {return $this->display_image;}
	
	public function setDateAdded($value) {$this->date_added = $value;}
	public function getDateAdded() {return $this->date_added;}
	
	public function save(CV_Members $cm) {
		return CV_Members_Manager::save($this);
	}

	public function delete() {
		return CV_Members_Manager::delete($this);
	}
}

?>