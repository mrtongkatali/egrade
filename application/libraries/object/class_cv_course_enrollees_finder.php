<?php
class CV_Course_Enrollees_Finder {
	public static function findById($id) {
		$sql = "
			SELECT * 
			FROM " . CV_COURSE_ENROLLEES . "
			WHERE id = ". Model::safeSql($id) ."
			LIMIT 1
		";
		return self::getRecord($sql);
	}
	
	public static function findAll($sort = "", $limit = "") {
		$sql = "
			SELECT * 
			FROM " . CV_COURSE_ENROLLEES . "
			$sort
			$limit
		";
		return self::getRecords($sql);
	}
	
	public static function checkIfAlreadyEnrolled($course_designation_id,$student_id) {
		$sql = "
			SELECT * 
			FROM " . CV_COURSE_ENROLLEES . "
			WHERE
				course_designation_id 	= " . Model::safeSql($course_designation_id) . " AND
				student_id 				= " . Model::safeSql($student_id) . "
		";
		return self::getRecord($sql);
	}
	
	public static function findAllCoursesEnrolledByStudentId($student_id, $sort = "", $limit = "") {
		$sql = "
			SELECT id,course_designation_id 
			FROM " . CV_COURSE_ENROLLEES . "
			WHERE
				student_id = " . Model::safeSql($student_id) . " AND
				is_archive = " . Model::safeSql(CV_Course_Enrollees::NO) . "
				$sort
				$limit
		";
		return self::getRecords($sql);
	}
	
	public static function findAllCurrentlyEnrolledByCourseDesignationId($course_designation_id, $school_id, $sort = "", $limit = "") {
		$sql = "
			SELECT cd.id,cd.program_code,cd.student_code,cd.student_name,cd.pre_final_grade,cd.final_exam_grade,cd.final_grade,cd.is_passed
			FROM " . CV_COURSE_ENROLLEES . " cd
			LEFT JOIN " . CV_MEMBERS . " m
			ON cd.student_id = m.id
			WHERE
				cd.school_id 				= " . Model::safeSql($school_id) . " AND
				cd.course_designation_id 	= " . Model::safeSql($course_designation_id) . " AND
				cd.is_archive 				= " . Model::safeSql(CV_Course_Enrollees::NO) . " AND
				cd.is_currently_enrolled 	= " . Model::safeSql(CV_Course_Enrollees::YES) . "
				$sort
				$limit
		";
		return self::getRecords($sql);
	}
	
	public static function findAllByCourseDesignationId($course_designation_id, $school_id, $sort = "", $limit = "") {
		$sql = "
			SELECT *
			FROM " . CV_COURSE_ENROLLEES . "
			WHERE
				school_id 				= " . Model::safeSql($school_id) . " AND
				course_designation_id 	= " . Model::safeSql($course_designation_id) . " AND
				is_archive 				= " . Model::safeSql(CV_Course_Enrollees::NO) . " AND
				is_currently_enrolled 	= " . Model::safeSql(CV_Course_Enrollees::YES) . "
				$sort
				$limit
		";
		return self::getRecords($sql);
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
		$var = new CV_Course_Enrollees($row['id']);
		$var->setId($row['id']);
		$var->setSchoolId($row['school_id']);	
		$var->setCourseDesignationId($row['course_designation_id']);
		$var->setProgramId($row['program_id']);
		$var->setProgramCode($row['program_code']);
		$var->setStudentId($row['student_id']);
		$var->setStudentCode($row['student_code']);
		$var->setStudentName($row['student_name']);
		$var->setCourseId($row['course_id']);
		$var->setCourseCode($row['course_code']);
		$var->setProfessorId($row['professor_id']);
		$var->setProfessorName($row['professor_name']);
		$var->setPreFinalGrade($row['pre_final_grade']);
		$var->setFinalExamGrade($row['final_exam_grade']);
		$var->setFinalGrade($row['final_grade']);
		$var->setRemarks($row['remarks']);
		$var->setIsCurrentlyEnrolled($row['is_currently_enrolled']);
		$var->setIsPassed($row['is_passed']);
		$var->setEnrolledBy($row['enrolled_by']);
		$var->setIsArchive($row['is_archive']);
		$var->setDateAdded($row['date_added']);
		return $var;
	}
}
?>