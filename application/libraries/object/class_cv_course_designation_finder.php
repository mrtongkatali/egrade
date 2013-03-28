<?php
class CV_Course_Designation_Finder {
	public static function findById($id) {
		$sql = "
			SELECT * 
			FROM " . CV_COURSE_DESIGNATION . "
			WHERE id = ". Model::safeSql($id) ."
			LIMIT 1
		";
		return self::getRecord($sql);
	}
	
	public static function findAll($sort = "", $limit = "") {
		$sql = "
			SELECT * 
			FROM " . CV_COURSE_DESIGNATION . "
			$sort
			$limit
		";
		return self::getRecords($sql);
	}
	
	public static function findAllGroupOpenedCourse() {
		$sql = "
			SELECT id,course_id,course_code 
			FROM " . CV_COURSE_DESIGNATION . "
			WHERE
				is_active 	= " . Model::safeSql(CV_Course_Designation::YES) . " AND
				is_archive 	= " . Model::safeSql(CV_Course_Designation::NO) . "
			GROUP BY course_id
		";
		return self::getRecords($sql);
	}
	
	public static function findAllAvailableSectionByCourseId($course_id) {
		$sql = "
			SELECT id,course_id,section
			FROM " . CV_COURSE_DESIGNATION . "
			WHERE
				course_id 	= " . Model::safeSql($course_id) . " AND
				is_active 	= " . Model::safeSql(CV_Course_Designation::YES) . " AND
				is_archive 	= " . Model::safeSql(CV_Course_Designation::NO) . "
		";
		return self::getRecords($sql);
	}
	
	public static function findDuplicateOpenedCourse($school_id,$program_id,$course_id,$school_year,$semester,$section) {
		$sql = "
			SELECT id 
			FROM " . CV_COURSE_DESIGNATION . "
			WHERE
				school_id = " . Model::safeSql($school_id) . " AND
				program_id = " . Model::safeSql($program_id) . " AND
				course_id = " . Model::safeSql($course_id) . " AND
				school_year = " . Model::safeSql($school_year) . " AND
				semester = " . Model::safeSql($semester) . " AND
				section = " . Model::safeSql($section) . "
				LIMIT 1
		";
		return self::getRecord($sql);
	}
	
	public static function findAllActiveOpenedCourse($school_id,$program_id) {
		$sql = "
			SELECT id,course_id,course_title,section 
			FROM " . CV_COURSE_DESIGNATION . "
			WHERE
				school_id 	= " . Model::safeSql($school_id) . " AND
				program_id	= " . Model::safeSql($program_id) . " AND
				is_active 	= " . Model::safeSql(CV_Course_Designation::YES) . " AND
				is_archive 	= " . Model::safeSql(CV_Course_Designation::NO) . "
				
		";
		return self::getRecords($sql);
	}
	
	public static function findAllActiveCourseAssignedToProfessor($school_id,$professor_id) {
		$sql = "
			SELECT id,course_code,course_title,section,submission_date,is_lock
			FROM " . CV_COURSE_DESIGNATION . "
			WHERE
				school_id 	= " . Model::safeSql($school_id) . " AND
				professor_id	= " . Model::safeSql($professor_id) . " AND
				is_active 	= " . Model::safeSql(CV_Course_Designation::YES) . " AND
				is_archive 	= " . Model::safeSql(CV_Course_Designation::NO) . "
				
		";
		return self::getRecords($sql);
	}
	
	public static function findAllStudentGradeBySchoolYearSemester($school_id,$member_id,$school_year,$semester) {
		$sql = "
			SELECT ce.id,cd.course_code,cd.course_title,ce.professor_name,ce.final_grade,ce.is_passed
			FROM  " . CV_COURSE_ENROLLEES . " ce
			LEFT JOIN " . CV_COURSE_DESIGNATION . " cd
			ON ce.course_designation_id = cd.id
			WHERE 
				ce.student_id = ". Model::safeSql($member_id) ." AND
				ce.is_archive = ". Model::safeSql(CV_Course_Enrollees::NO) ." AND
				cd.is_archive = ". Model::safeSql(CV_Course_Enrollees::NO) ." AND
				cd.school_year = ". Model::safeSql($school_year) ." AND
				cd.semester = ". Model::safeSql($semester) ." AND
				cd.school_id = ". Model::safeSql($school_id) ."
		";
		$record = Model::runSql($sql,true,true);
		return $record;
	}
	
	private static function getRecord($sql) {

		$result = Model::runSql($sql);
		$total = mysql_num_rows($result);
		if ($total == 0) {return false;}		
	
		$row = Model::fetchAssoc($result);
		$records = self::newObject($row);	
		return $records;
	}
	
	private static function getRecords($sql) {
		$result = Model::runSql($sql);
		$total = mysql_num_rows($result);
	
		if ($total == 0) {return false;}
		while ($row = Model::fetchAssoc($result)) {
			$records[$row['id']] = self::newObject($row);
		}
		return $records;
	}

	private static function newObject($row) {
		$var = new CV_Course_Designation($row['id']);
		$var->setId($row['id']);
		$var->setSchoolId($row['school_id']);
		$var->setCollegeId($row['college_id']);	
		$var->setProgramId($row['program_id']);
		$var->setProgramCode($row['program_code']);
		$var->setCourseId($row['course_id']);
		$var->setCourseCode($row['course_code']);
		$var->setCourseTitle($row['course_title']);
		$var->setSchoolYear($row['school_year']);
		$var->setSemester($row['semester']);
		$var->setSection($row['section']);
		$var->setMaxSize($row['max_size']);
		$var->setProfessorId($row['professor_id']);
		$var->setProfessorName($row['professor_name']);
		$var->setRemarks($row['remarks']);
		$var->setSchedule($row['schedule']);
		$var->setIsLock($row['is_lock']);
		$var->setSubmissionDate($row['submission_date']);
		$var->setAddedBy($row['added_by']);
		$var->setIsActive($row['is_active']);
		$var->setIsArchive($row['is_archive']);
		$var->setDateAdded($row['date_added']);
		return $var;
	}
}
?>