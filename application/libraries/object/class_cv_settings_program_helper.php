<?php

class CV_Settings_Program_Helper {
	public static function isIdExist(CV_Settings_Program $pt) {
		$sql = "
			SELECT COUNT(*) as total
			FROM  " . CV_SETTINGS_PROGRAM . "
			WHERE id = ". Model::safeSql($pt->getId()) ."
		";

		$result = Model::runSql($sql);
		$row = Model::fetchAssoc($result);
		return $row['total'];
	}
	
	public static function getProgramCodeById($id) {
		$sql = "
			SELECT id,program_code
			FROM  " . CV_SETTINGS_PROGRAM . "
			WHERE 
				id = ". Model::safeSql($id) ."
		";

		return Model::runSql($sql,true,false);
	}
	
	public static function updateProgramInCourseDesignation(CV_Settings_Program $m) {
		$sql = "
			UPDATE " . CV_COURSE_DESIGNATION . " SET
			program_code = " . Model::safeSql($m->getProgramCode()) . "
			WHERE
				program_id = " . Model::safeSql($m->getId()) . "
		";
		Model::runSql($sql);
	}
	
	public static function updateProgramInCourseEnrollees(CV_Settings_Program $m) {
		$sql = "
			UPDATE " . CV_COURSE_ENROLLEES . " SET
			program_code = " . Model::safeSql($m->getProgramCode()) . "
			WHERE
				program_id = " . Model::safeSql($m->getId()) . "
		";
		Model::runSql($sql);
	}
}

?>