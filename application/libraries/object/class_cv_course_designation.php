<?php
class CV_Course_Designation {

	protected $id;
	protected $school_id;
	protected $college_id;
	protected $program_id;
	protected $program_code;
	protected $course_id;
	protected $course_code;
	protected $course_title;
	protected $school_year;
	protected $semester;
	protected $section;
	protected $max_size;
	protected $professor_id;
	protected $professor_name;
	protected $remarks;
	protected $schedule;
	protected $is_lock;
	protected $submission_date;
	protected $added_by;
	protected $is_active;
	protected $is_archive;
	protected $date_added;
	
	const YES 	= 'Yes';
	const NO	= 'No';
	
	public function setId($value) { $this->id = $value; }
	public function getId() { return $this->id; }
	
	public function setSchoolId($value) {$this->school_id = $value;}
	public function getSchoolId() {return $this->school_id;}
	
	public function setCollegeId($value) {$this->college_id = $value;}
	public function getCollegeId() {return $this->college_id;}
	
	public function setProgramId($value) {$this->program_id = $value;}
	public function getProgramId() {return $this->program_id;}
	
	public function setProgramCode($value) {$this->program_code = $value;}
	public function getProgramCode() {return $this->program_code;}
	
	public function setCourseId($value) {$this->course_id = $value;}
	public function getCourseId() {return $this->course_id;}
	
	public function setCourseCode($value) {$this->course_code = $value;}
	public function getCourseCode() {return $this->course_code;}
	
	public function setCourseTitle($value) {$this->course_title = $value;}
	public function getCourseTitle() {return $this->course_title;}
	
	public function setSchoolYear($value) {$this->school_year = $value;}
	public function getSchoolYear() {return $this->school_year;}
	
	public function setSemester($value) {$this->semester = $value;}
	public function getSemester() {return $this->semester;}
	
	public function setSection($value) {$this->section = $value;}
	public function getSection() {return $this->section;}
	
	public function setMaxSize($value) {$this->max_size = $value;}
	public function getMaxSize() {return $this->max_size;}
	
	public function setProfessorId($value) {$this->professor_id = $value;}
	public function getProfessorId() {return $this->professor_id;}
	
	public function setProfessorName($value) {$this->professor_name = $value;}
	public function getProfessorName() {return $this->professor_name;}
	
	public function setRemarks($value) {$this->remarks = $value;}
	public function getRemarks() {return $this->remarks;}
	
	public function setSchedule($value) {$this->schedule = $value;}
	public function getSchedule() {return $this->schedule;}
	
	public function setIsLock($value) {$this->is_lock = $value;}
	public function getIsLock() {return $this->is_lock;}
	
	public function setSubmissionDate($value) {$this->submission_date = $value;}
	public function getSubmissionDate() {return $this->submission_date;}
	
	public function setAddedBy($value) {$this->added_by = $value;}
	public function getAddedBy() {return $this->added_by;}
	
	public function setIsActive($value) {$this->is_active = $value;}
	public function getIsActive() {return $this->is_active;}
	
	public function setIsArchive($value) {$this->is_archive = $value;}
	public function getIsArchive() {return $this->is_archive;}
	
	public function setDateAdded($value) {$this->date_added = $value;}
	public function getDateAdded() {return $this->date_added;}

	public function save(CV_Course_Designation $cm) {
		return CV_Course_Designation_Manager::save($this);
	}

	public function delete() {
		return CV_Course_Designation_Manager::delete($this);
	}
}

?>