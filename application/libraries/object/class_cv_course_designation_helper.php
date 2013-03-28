<?php
class CV_Course_Designation_Helper {
	public static function isIdExist(CV_Course_Designation $pt) {
		$sql = "
			SELECT COUNT(id) as total
			FROM  " . CV_COURSE_DESIGNATION . "
			WHERE id = ". Model::safeSql($pt->getId()) ."
		";

		$result = Model::runSql($sql);
		$row = Model::fetchAssoc($result);
		return $row['total'];
	}
	
	public static function updateCourse($course_id,$course_code,$course_title) {
		$sql = "
			UPDATE " . CV_COURSE_DESIGNATION . " SET
			course_code = " . Model::safeSql($course_code) . ",
			course_title = " . Model::safeSql($course_title) . "
			WHERE
				course_id = " . Model::safeSql($course_id) . "
		";
		Model::runSql($sql);
	}
}

?>