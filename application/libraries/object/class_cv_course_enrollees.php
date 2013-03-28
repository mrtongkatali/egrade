<?php
class CV_Course_Enrollees {

	public $id;
	public $school_id;
	public $course_desgination_id;
	public $program_id;
	public $program_code;
	public $student_id;
	public $student_code;
	public $student_name;
	public $course_id;
	public $course_code;
	public $professor_id;
	public $professor_name;
	public $pre_final_grade;
	public $final_exam_grade;
	public $final_grade;
	public $remarks;
	public $is_currently_enrolled;
	public $is_passed;
	public $enrolled_by;
	public $date_added;
	public $is_archive;

	const YES 	= 'Yes';
	const NO	= 'No';
	
	const PASSED 	= 'Passed';
	const FAILED 	= 'Failed';
	const DROPPED 	= 'Dropped';
	const INC 		= 'Incomplete';
	const ABSENT 	= 'Absent';
	const CONT 		= 'Continuing';

	public function setId($value) { $this->id = $value; }
	public function getId() { return $this->id; }
	
	public function setSchoolId($value) {$this->school_id = $value;}
	public function getSchoolId() {return $this->school_id;}
	
	public function setCourseDesignationId($value) {$this->course_desgination_id = $value;}
	public function getCourseDesignationId() {return $this->course_desgination_id;}
	
	public function setProgramId($value) {$this->program_id = $value;}
	public function getProgramId() {return $this->program_id;}
	
	public function setProgramCode($value) {$this->program_code = $value;}
	public function getProgramCode() {return $this->program_code;}
	
	public function setStudentId($value) {$this->student_id = $value;}
	public function getStudentId() {return $this->student_id;}
	
	public function setStudentCode($value) {$this->student_code = $value;}
	public function getStudentCode() {return $this->student_code;}
	
	public function setStudentName($value) {$this->student_name = $value;}
	public function getStudentName() {return $this->student_name;}
	
	public function setCourseId($value) {$this->course_id = $value;}
	public function getCourseId() {return $this->course_id;}
	
	public function setCourseCode($value) {$this->course_code = $value;}
	public function getCourseCode() {return $this->course_code;}
	
	public function setProfessorId($value) {$this->professor_id = $value;}
	public function getProfessorId() {return $this->professor_id;}
	
	public function setProfessorName($value) {$this->professor_name = $value;}
	public function getProfessorName() {return $this->professor_name;}

	public function setPreFinalGrade($value) {$this->pre_final_grade = $value;}
	public function getPreFinalGrade() {return $this->pre_final_grade;}
	
	public function setFinalExamGrade($value) {$this->final_exam_grade = $value;}
	public function getFinalExamGrade() {return $this->final_exam_grade;}
	
	public function setFinalGrade($value) {$this->final_grade = $value;}
	public function getFinalGrade() {return $this->final_grade;}
	
	public function setRemarks($value) {$this->remarks = $value;}
	public function getRemarks() {return $this->remarks;}
	
	public function setIsCurrentlyEnrolled($value) {$this->is_currently_enrolled = $value;}
	public function getIsCurrentlyEnrolled() {return $this->is_currently_enrolled;}
	
	public function setIsPassed($value) {$this->is_passed = $value;}
	public function getIsPassed() {return $this->is_passed;}
	
	public function setEnrolledBy($value) {$this->enrolled_by = $value;}
	public function getEnrolledBy() {return $this->enrolled_by;}
	
	public function setDateAdded($value) {$this->date_added = $value;}
	public function getDateAdded() {return $this->date_added;}
	
	public function setIsArchive($value) {$this->is_archive = $value;}
	public function getIsArchive() {return $this->is_archive;}
	
	public function setAsNotArchive() {$this->is_archive = self::NO;	}
	public function setAsArchive() {$this->is_archive = self::YES;}
	
	public function setAsPassed() {$this->is_passed = self::PASSED;	}
	public function setAsFailed() {$this->is_passed = self::FAILED;}
	public function setAsDropped() {$this->is_passed = self::DROPPED;	}
	public function setAsINC() {$this->is_passed = self::INC;}
	public function setAsAbsent() {$this->is_passed = self::ABSENT;	}
	public function setAsCont() {$this->is_passed = self::CONT;}
	
	public function setAsCurrentlyEnrolled() {$this->is_currently_enrolled = self::YES;}
	public function setAsNotEnrolled() {$this->is_currently_enrolled = self::NO;}

	public function save(CV_Course_Enrollees $cm) {
		return CV_Course_Enrollees_Manager::save($this);
	}

	public function delete() {
		return CV_Course_Enrollees_Manager::delete($this);
	}
}

?>