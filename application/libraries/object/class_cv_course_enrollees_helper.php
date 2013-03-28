<?php
class CV_Course_Enrollees_Helper {
	public static function isIdExist(CV_Course_Enrollees $pt) {
		$sql = "
			SELECT COUNT(id) as total
			FROM  " . CV_COURSE_ENROLLEES . "
			WHERE id = ". Model::safeSql($pt->getId()) ."
		";

		$result = Model::runSql($sql);
		$row = Model::fetchAssoc($result);
		return $row['total'];
	}
	
	public static function getAllStudentSchoolYear($school_id,$member_id) {
		$sql = "
			SELECT ce.id, cd.school_year, cd.semester
			FROM  " . CV_COURSE_ENROLLEES . " ce
			LEFT JOIN " . CV_COURSE_DESIGNATION . " cd
			ON ce.course_designation_id = cd.id
			WHERE 
				ce.student_id = ". Model::safeSql($member_id) ." AND
				ce.is_archive = ". Model::safeSql(CV_Course_Enrollees::NO) ." AND
				cd.is_archive = ". Model::safeSql(CV_Course_Enrollees::NO) ." AND
				cd.school_id = ". Model::safeSql($school_id) ."
				GROUP BY cd.school_year
				ORDER BY cd.school_year ASC
		";
		$record = Model::runSql($sql,true,true);
		return $record;
	}
	
	public static function getTotalNumberEnrolleesByCourseDesignationId($course_designation_id) {
		$sql = "
			SELECT COUNT(id) as total
			FROM  " . CV_COURSE_ENROLLEES . "
			WHERE course_designation_id = ". Model::safeSql($course_designation_id) ."
		";
		$result = Model::runSql($sql);
		$row = Model::fetchAssoc($result);
		return $row['total'];
	}
	
	public static function updateCourse($course_id,$course_code) {
		$sql = "
			UPDATE " . CV_COURSE_ENROLLEES . " SET
			course_code = " . Model::safeSql($course_code) . "
			WHERE
				course_id = " . Model::safeSql($course_id) . "
		";
		Model::runSql($sql);
	}
}

?>